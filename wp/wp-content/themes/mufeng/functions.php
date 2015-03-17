<?php
//函数开始
include('includes/theme_options.php');//后台设置
include('includes/breadcrumbs.php');//面包屑
//侧边栏
if (function_exists('register_sidebar'))
{
    register_sidebar(array(
	'name'=>'侧边栏',
	'description'   => '以下小工具在页面右边显示',
	'before_widget'=>'<div class="widget box row">',
	'after_widget'=>'</div>',
	'before_title'=>'<h3>',
	'after_title'=>'</h3>',
	));
    register_sidebar(array(
	'name'=>'滚动边栏',
	'description'   => '以下小工具在页面右边显示，可跟随滚动',
	'before_widget'=>'<div class="widget box row">',
	'after_widget'=>'</div>',
	'before_title'=>'<h3>',
	'after_title'=>'</h3>',
	));
    register_sidebar(array(
	'name'=>'首页幻灯区域',
	'description'   => '以下小工具在首页导航栏下显示',
	'before_widget'=>'<div class="inter-top row">',
	'after_widget'=>'</div>',
	'before_title'=>'<h3>',
	'after_title'=>'</h3>',
	));
}
//小工具
include(TEMPLATEPATH . '/widget/loo-comments.php');
include(TEMPLATEPATH . '/widget/loo-tags.php');
include(TEMPLATEPATH . '/widget/loo-tab.php');
include(TEMPLATEPATH . '/widget/loo-imglist.php');
//定义菜单
    if (function_exists('register_nav_menus')){
        register_nav_menus( array(
            'nav' => __('头部主导航'),
            'toolbar' => __('分类页面菜单'),
       	'friendlink' => __('友情链接(仅在首页显示)')
        ) );
    }
//特色图片尺寸
add_theme_support('post-thumbnails');
//开启wordpress3.5友情链接管理
add_filter( 'pre_option_link_manager_enabled', '__return_true' ); 
//修改文本编辑器
add_filter('mce_buttons_3','my_buttons');
function my_buttons($buttons){
	$mces=array(
		'cut',
		'copy',
		'paste',
		'hr',
		'fontselect',
		'fontsizeselect',
		'sub',
		'sup',
		'backcolor',
		'visualaid',
		'anchor',
		'newdocument',
	);
	foreach($mces as $mce){
		$buttons[]=$mce;
	}
	return $buttons;
}
//热评文章列表

function simple_get_most_viewed($posts_num=10,$days=90){
global $wpdb;
$sql = "SELECT ID , post_title , comment_count
            FROM $wpdb->posts
           WHERE post_type = 'post' AND TO_DAYS(now()) - TO_DAYS(post_date) < $days
		   AND ($wpdb->posts.`post_status` = 'publish' OR $wpdb->posts.`post_status` = 'inherit')
           ORDER BY comment_count DESC LIMIT 0 , $posts_num ";
$posts = $wpdb->get_results($sql);
$output = '';
foreach ($posts as $post){
$output .= "\n<li><a href= \"".get_permalink($post->ID)."\" target=\"_blank\" rel=\"bookmark\" title=\"".$post->post_title.' ('.$post->comment_count."条评论)\" >".$post->post_title.'</a></li>';
}
echo $output;
}
//分页导航
function pagination($range = 6){
	global $paged, $wp_query;
	echo "<div class='pagination'>";
	if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
	if($max_page > 1){if(!$paged){$paged = 1;}
	if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'>首页</a>";}
	if($paged>1) echo '<a href="' . get_pagenum_link($paged-1) .'" class="prev">上一页</a>';
    if($max_page > $range){
		if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
    elseif($paged >= ($max_page - ceil(($range/2)))){
		for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
		for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
    else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
    if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	if($paged<$max_page) echo '<a href="' . get_pagenum_link($paged+1) .'" class="next">下一页</a>';
    if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'>尾页</a>";
	}
	}
	echo "</div>";
}
//自动生成版权时间
function comicpress_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
    SELECT
    YEAR(min(post_date_gmt)) AS firstdate,
    YEAR(max(post_date_gmt)) AS lastdate
    FROM
    $wpdb->posts
    WHERE
    post_status = 'publish'
    ");
$output = '';
if($copyright_dates) {
$copyright = '&copy; '.$copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-'.$copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}
//Pirobox暗箱效果自动添加标签属性
add_filter('the_content', 'ATheme_pirobox_gall_replace'); 
function ATheme_pirobox_gall_replace ($content) {
global $post; 
$title = $post->post_title;
$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i"; 
$replacement = '<a$1href=$2$3.$4$5 class="pirobox_gall"$6 title="'.$title.'">$7</a>'; 
$content = preg_replace($pattern, $replacement, $content); 
return $content; 
}
//自动用文章标题为图片添加alt
add_filter( 'the_content', 'image_alt' );
function image_alt($c) {
 global $post;
 $title = $post->post_title;
 $s = array('/src="(.+?.(jpg|bmp|png|jepg|gif))"/i' => 'src="$1" alt="'.$title.'"');
 foreach($s as $p => $r){
  $c = preg_replace($p,$r,$c);
    }
    return $c;
}
/*分类描述*/
function loo_deletehtml($str) {  
    return trim(strip_tags($str)); 
} 
add_filter('category_description', 'loo_deletehtml');
/*显示文章浏览次数*/
function getPostViews($postID){
$count = get_post_meta($postID,'views', true);
if($count==''){
delete_post_meta($postID,'views');
add_post_meta($postID,'views', '0');
return "0";
}
return $count.'';
}
function setPostViews($postID) {
$count = get_post_meta($postID,'views', true);
if($count==''){
$count = 0;
delete_post_meta($postID,'views');
add_post_meta($postID,'views', '0');
}else{
$count++;
update_post_meta($postID,'views', $count);
}
}
// 取消原有jQuery
//if ( !is_admin() ) { 
//    if ( $localhost == 0 ) { 
//        function my_init_method() {
//            wp_deregister_script( 'jquery' );
//        }    
//        add_action('init', 'my_init_method'); 
//    }
//}
function my_scripts_method() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_bloginfo('template_directory').'/js/jquery.min.js');
    wp_enqueue_script( 'jquery' );
}    
add_action('wp_enqueue_scripts', 'my_scripts_method');
//图片默认连接到媒体文件(原始链接)
update_option('image_default_link_type', 'file');
//去除头部冗余代码
remove_action( 'wp_head',   'feed_links_extra', 3 ); 
remove_action( 'wp_head',   'rsd_link' ); 
remove_action( 'wp_head',   'wlwmanifest_link' ); 
remove_action( 'wp_head',   'index_rel_link' ); 
remove_action( 'wp_head',   'start_post_rel_link', 10, 0 ); 
remove_action( 'wp_head',   'wp_generator' ); 
//修改评论表情调用路径
add_filter('smilies_src','custom_smilies_src',1,10);
function custom_smilies_src ($img_src,$img,$siteurl){
return get_bloginfo('template_directory').'/images/smilies/'.$img;
}
function wp_smilies(){
  $a = array( 'mrgreen','razz','sad','smile','oops','grin','eek','???','cool','lol','mad','twisted','roll','wink','idea','arrow','neutral','cry','?','evil','shock','!' );
  $b = array( 'mrgreen','razz','sad','smile','redface','biggrin','surprised','confused','cool','lol','mad','twisted','rolleyes','wink','idea','arrow','neutral','cry','question','evil','eek','exclaim' );
  for( $i=0;$i<22;$i++ ){
    echo '<a title="'.$a[$i].'" href="javascript:grin('."'".$a[$i]."'".')"><img src="'.get_bloginfo('template_directory').'/images/smilies/icon_'.$b[$i].'.gif" /></a>';
  }
}
//自定义头像
add_filter( 'avatar_defaults', 'fb_addgravatar' );
function fb_addgravatar( $avatar_defaults ) {
$myavatar = get_bloginfo('template_directory') . '/images/default.png';
  $avatar_defaults[$myavatar] = '自定义头像';
  return $avatar_defaults;
}
// 评论回复
function weisay_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
global $commentcount,$wpdb, $post;
     if(!$commentcount) { //初始化楼层计数器
          $comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = $post->ID AND comment_type = '' AND comment_approved = '1' AND !comment_parent");
          $cnt = count($comments);//获取主评论总数量
          $page = get_query_var('cpage');//获取当前评论列表页码
          $cpp=get_option('comments_per_page');//获取每页评论显示数量
         if (ceil($cnt / $cpp) == 1 || ($page > 1 && $page  == ceil($cnt / $cpp))) {
             $commentcount = $cnt + 1;//如果评论只有1页或者是最后一页，初始值为主评论总数
         } else {
             $commentcount = $cpp * $page + 1;
         }
     }
?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
   <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
      <?php $add_below = 'div-comment'; ?>
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
					<div class="floor"><?php
 if(!$parent_id = $comment->comment_parent){
   switch ($commentcount){
     case 2 :echo "沙发";--$commentcount;break;
     case 3 :echo "板凳";--$commentcount;break;
     case 4 :echo "地板";--$commentcount;break;
     default:printf('%1$s楼', --$commentcount);
   }
 }
 ?>
         </div><strong><?php comment_author_link() ?></strong>:<?php edit_comment_link('编辑','&nbsp;&nbsp;',''); ?></div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<span style="color:#C00; font-style:inherit">您的评论正在等待审核中...</span>
			<br />			
		<?php endif; ?>
		<?php comment_text() ?>
		<div class="clear"></div><span class="datetime"><?php comment_date('Y-m-d') ?> <?php comment_time() ?> </span> <span class="reply"><?php comment_reply_link(array_merge( $args, array('reply_text' => '[回复]', 'add_below' =>$add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span>
  </div>
<?php
}
function weisay_end_comment() {
		echo '</li>';
}
//登陆显示头像
function weisay_get_avatar($email, $size = 48){
return get_avatar($email, $size);
}
//评论回复邮件通知（所有回复都邮件通知）*（美化版）
function comment_mail_notify($comment_id) {
$comment = get_comment($comment_id);
$parent_id = $comment->comment_parent ? $comment->comment_parent : '';
$spam_confirmed = $comment->comment_approved;
if (($parent_id != '') && ($spam_confirmed != 'spam')) {
$wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])); //e-mail 发出点, no-reply 可改为可用的 e-mail.
$to = trim(get_comment($parent_id)->comment_author_email);
$subject = '您在 [' . get_option("blogname") . '] 的留言有了回复';
$message = '
<div style="background-color:#fff; border:1px solid #666666; color:#111;
-moz-border-radius:8px; -webkit-border-radius:8px; -khtml-border-radius:8px;
border-radius:8px; font-size:12px; width:702px; margin:0 auto; margin-top:10px;
font-family:微软雅黑, Arial;">
<div style="background:#666666; width:100%; height:60px; color:white;
-moz-border-radius:6px 6px 0 0; -webkit-border-radius:6px 6px 0 0;
-khtml-border-radius:6px 6px 0 0; border-radius:6px 6px 0 0; ">
<span style="height:60px; line-height:60px; margin-left:30px; font-size:12px;">
您在<a style="text-decoration:none; color:#00bbff;font-weight:600;"
href="' . get_option('home') . '">' . get_option('blogname') . '
</a>博客上的留言有回复啦！</span></div>
<div style="width:90%; margin:0 auto">
<p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
<p>您曾在 [' . get_option("blogname") . '] 的文章
《' . get_the_title($comment->comment_post_ID) . '》 上发表评论:
<p style="background-color: #EEE;border: 1px solid #DDD;
padding: 20px;margin: 15px 0;">' . nl2br(get_comment($parent_id)->comment_content) . '</p>
<p>' . trim($comment->comment_author) . ' 给您的回复如下:
<p style="background-color: #EEE;border: 1px solid #DDD;padding: 20px;
margin: 15px 0;">' . nl2br($comment->comment_content) . '</p>
<p>您可以点击 <a style="text-decoration:none; color:#00bbff"
href="' . htmlspecialchars(get_comment_link($parent_id)) . '">查看回复的完整內容</a></p>
<p>欢迎再次光临 <a style="text-decoration:none; color:#00bbff"
href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
<p>(此邮件由系统自动发出, 请勿回复.)</p>
</div>
</div>';
$message = convert_smilies($message);
$from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
$headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
wp_mail( $to, $subject, $message, $headers );
//echo 'mail to ', $to, '<br/> ' , $subject, $message; // for testing
}
}
add_action('comment_post', 'comment_mail_notify');
//输出缩略图地址
function post_thumbnail_img($width,$height) {
	global $post;
	$title = $post->post_title;
	if (get_option('strive_timth')=='Display'){
		if ( has_post_thumbnail() ) {
			$timthumb_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID) , 'full');
			$post_timthumb = '<img src="' . get_bloginfo("template_url") . '/timthumb.php?src=' . $timthumb_src[0] . '&amp;h=' . $height . '&amp;w=' . $width . '&amp;zc=1" width="'.$width.'" height="'.$height.'" alt="' . $title . '" />';
			echo $post_timthumb;
		} else {
			$content = $post->post_content;
			preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
			$n = count($strResult[1]);
			if($n > 0){
			echo '<img src="' . get_bloginfo("template_url").'/timthumb.php?src=' . $strResult[1][0] . '&amp;h=' . $height . '&amp;w=' . $width . '&amp;zc=1" width="'.$width.'" height="'.$height.'" alt="'.$title.'" />';
		}else {
			echo '<img src="' . get_bloginfo("template_url").'/images/noimage.gif" width="'.$width.'" height="'.$height.'" alt="暂无图片">';
			}
		}
	}else{
		if ( has_post_thumbnail() ) {
			the_post_thumbnail(array($width,$height));
		} else {
			$content = $post->post_content;
			preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
			$n = count($strResult[1]);
			if($n > 0){
				echo '<img src="'.$strResult[1][0].'" width="'. $width .'" height="'.$height.'" alt="'.$title.'"/>';
			}else {
				echo '<img src="' . get_bloginfo("template_url").'/images/noimage.gif" width="'.$width.'" height="'.$height.'" alt="暂无图片">';
				}
			}
	}
}
//列表图片
function post_thumbnail_list($width=300) {
	global $post;
	$title = $post->post_title;
	if (get_option('strive_timth')=='Display'){
		if ( has_post_thumbnail() ) {
			$timthumb_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID) , 'full');
			$post_timthumb = '<img src="' . get_bloginfo("template_url") . '/timthumb.php?src=' . $timthumb_src[0] . '&amp;w=' . $width . '&amp;zc=1;a=t" alt="' . $title . '" />';
			echo $post_timthumb;
		} else {
			$content = $post->post_content;
			preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
			$n = count($strResult[1]);
			if($n > 0){
				echo '<img src="' . get_bloginfo("template_url").'/timthumb.php?src=' . $strResult[1][0] . '&amp;w=' . $width . '&amp;zc=1" alt="'.$title.'" />';
			}
		}
	}else{
		if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} else {
			$content = $post->post_content;
			preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
			$n = count($strResult[1]);
			if($n > 0){
				echo '<img src="'.$strResult[1][0].'" width="'. $width .'" height="auto" alt="'.$title.'"/>';
				}
			}
	}
}
//修改登录页logo和链接
if ( !function_exists( 'loostrive_login_logo' ) ) {
	function loostrive_login_logo() {
	    echo '<style type="text/css">
	        h1 a { background-image:url('.stripslashes(get_option(strive_mylogo)).') !important; background-size: auto auto !important;width:auto !important; }
	    </style>';
	}
}
add_action('login_head', 'loostrive_login_logo');
if ( !function_exists( 'loostrive_wp_login_url' ) ) {
	function loostrive_wp_login_url() {
		return home_url();
	}
}
add_filter('login_headerurl', 'loostrive_wp_login_url');
if ( !function_exists( 'loostrive_wp_login_title' ) ) {
	function loostrive_wp_login_title() {
		return get_option('blogname');
	}
}
add_filter('login_headertitle', 'loostrive_wp_login_title');
//开启后台自定义背景
add_theme_support('custom-background');
//去除谷歌字体
    if (!function_exists('remove_wp_open_sans')) :
    function remove_wp_open_sans() {
    wp_deregister_style( 'open-sans' );
    wp_register_style( 'open-sans', false );
    }
	// 前台删除Google字体CSS
    add_action('wp_enqueue_scripts', 'remove_wp_open_sans');
	// 后台删除Google字体CSS
    add_action('admin_enqueue_scripts', 'remove_wp_open_sans');
  endif;
// 在 WordPress 编辑器添加“下一页”按钮
add_filter('mce_buttons','add_next_page_button');
function add_next_page_button($mce_buttons) {
	$pos = array_search('wp_more',$mce_buttons,true);
	if ($pos !== false) {
		$tmp_buttons = array_slice($mce_buttons, 0, $pos+1);
		$tmp_buttons[] = 'wp_page';
		$mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos+1));
	}
	return $mce_buttons;
}
//取消内容转义
$qmr_work_tags = array(
  'the_title',             // 标题
  'the_content',           // 内容 *
  'the_excerpt',           // 摘要 *
  'single_post_title',     // 单篇文章标题
  'comment_author',        // 评论作者
  'comment_text',          // 评论内容 *
  'link_description',      // 友链描述（已弃用，但还很常用）
  'bloginfo',              // 博客信息
  'wp_title',              // 网站标题
  'term_description',      // 项目描述
  'category_description',  // 分类描述
  'widget_title',          // 小工具标题
  'widget_text'            // 小工具文本
  );
foreach ( $qmr_work_tags as $qmr_work_tag ) {
  remove_filter ($qmr_work_tag, 'wptexturize');
}
//Loostrive主题函数结束
//~ 2014-11-27 终极版极简代码
//~ 折腾来折腾去，才发现一直折腾的只是鸡肋，无需替换 http 协议（替换 http 协议可能会影响到其他头像设置的地址，如 QQ 头像地址），直接替换域名即可
function dmeng_get_https_avatar($avatar){
$avatar = str_replace(array("www.gravatar.com", "0.gravatar.com", "1.gravatar.com", "2.gravatar.com"), "secure.gravatar.com", $avatar);
return $avatar;
}
add_filter('get_avatar', 'dmeng_get_https_avatar');
function admin_lettering(){
    echo'<style type="text/css">
     body{ font-family: Microsoft YaHei;}
    </style>';
    }
add_action('admin_head', 'admin_lettering');


//Font Awesome必须保留这个下面才能用

add_action( 'wp_enqueue_scripts', 'load_fontawesome_styles' );
function load_fontawesome_styles(){
    global $wp_styles;
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.css' );
    wp_enqueue_style( 'font-awesome-ie7', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css' );
    $wp_styles->add_data( 'font-awesome-ie7', 'conditional', 'lte IE 7' );
}

/** 导航菜单 Walker 对象 icon 字体优化
 *  http://icaoye.com/initial-nav-add-icon-font.html
 */
class description_walker extends Walker_Nav_Menu{
        function start_el(&$output, $item, $depth, $args){
                global $wp_query;
                $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
                $class_names = '';
                $classes = empty( $item->classes ) ? array() : (array) $item->classes;
                $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
                $class_names = ' class="'. esc_attr( $class_names ) . '"';
                $output.= $indent . '
<li' . $class_names .'>';
                $icon = ! empty( $item->attr_title ) ? esc_attr( $item->attr_title ) : '';
                $attributes = ! empty( $item->target )        ? ' target="' . esc_attr( $item->target     ) .'"' : '';    //链接目标
                $attributes.= ! empty( $item->xfn )           ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';    //链接关系网 也就是rel属性
                $attributes.= ! empty( $item->url )           ? ' href="'   . esc_attr( $item->url        ) .'"' : '';    //链接
                $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';   //图像描述
                if($depth != 0) $description = "";    //只在一级菜单输出图像描述，如果全部输出请注释本行
                $item_output = $args->before;
                $item_output.= '<a'. $attributes .'><i class="'. $icon .'"></i>';
                $item_output.= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $description;
                $item_output.= '</a>';
                $item_output.= $args->after;
                $output.= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
}
?>
