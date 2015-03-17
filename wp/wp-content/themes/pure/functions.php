<?php

remove_action('wp_head','wp_generator');//禁止在head泄露wordpress版本号
remove_action('wp_head','rsd_link');//移除head中的rel="EditURI"
remove_action('wp_head','wlwmanifest_link');//移除head中的rel="wlwmanifest"
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );//rel=pre
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );//rel=shortlink 
//隐藏admin Bar
function hide_admin_bar($flag) {
	return false;
}
add_filter('show_admin_bar','hide_admin_bar'); 

remove_filter ('the_content', 'wpautop');

remove_filter ('comment_text', 'wpautop');

register_nav_menus(array('header-menu' => '顶部导航'));

add_theme_support( 'post-formats', array( 'status', 'quote', 'link', 'gallery', 'audio' ));

function pagenavi($range = 7){
	global $paged, $wp_query;
	if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
	if($max_page > 1){if(!$paged){$paged = 1;}
	if($paged>1) echo '<a href="' . get_pagenum_link($paged-1) .'"><</a>';
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
	if($paged<$max_page) echo '<a href="' . get_pagenum_link($paged+1) .'">></a>';
   }
}

function comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
?>
   <li <?php comment_class(); ?><?php if( $depth > 2){ echo ' style="margin-left:-60px;"';} ?> id="li-comment-<?php comment_ID() ?>">	 

<article id="comment-<?php comment_ID(); ?>" class="comment-body">
	<footer class="comment-meta">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, $size = '50'); ?>
			<b class="fn"><?php printf(__('%s'), get_comment_author_link()) ?></b>
		</div>
		<div class="comment-metadata">
			<time datetime="<?php echo time_ago(); ?>"><?php echo time_ago(); ?></time>
		</div>
	</footer>

	<div class="comment-content">
		<?php comment_text() ?>
	</div>

	<div class="reply">
		<?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply','depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
	</div>
</article>


<?php

}


function time_ago( $type = 'commennt', $day = 30 ) {
	$d = $type == 'post' ? 'get_post_time' : 'get_comment_time';
	$timediff = time() - $d('U');
	if ($timediff <= 60*60*24*$day) {
		echo  human_time_diff($d('U'), strtotime(current_time('mysql', 0))), '前';
	}
	if ($timediff > 60*60*24*$day) {
		echo  date('Y/m/d',get_comment_date('U')), ' ', get_comment_time('H:i');
	};
}

// 新窗口打开评论链接
function hu_popuplinks($text) {
	$text = preg_replace('/<a (.+?)>/i', "<a $1 target='_blank'>", $text);
	return $text;
}
add_filter('get_comment_author_link', 'hu_popuplinks', 6);

function add_nofollow($link, $args, $comment, $post){
	return preg_replace( '/href=\'(.*(\?|&)replytocom=(\d+)#respond)/', 'href=\'#comment-$3', $link );
}
add_filter('comment_reply_link', 'add_nofollow', 420, 4);

function pure_description() {
    global $s, $post;
    $description = '';
    $blog_name = get_bloginfo('name');
    if ( is_singular() ) {
        $ID = $post->ID;
        $title = $post->post_title;
        $author = $post->post_author;
        $user_info = get_userdata($author);
        $post_author = $user_info->display_name;
        if (!get_post_meta($ID, "meta-description", true)) {$description = $title.' - 作者: '.$post_author.',首发于'.$blog_name;}
        else {$description = get_post_meta($ID, "meta-description", true);}
    } elseif ( is_home () )    { $description = '立足现在。'; // 首页要自己加，如果你主题有后台设置可以连接上
    } elseif ( is_tag() )      { $description = single_tag_title('', false) . " - ". trim(strip_tags(tag_description()));
    } elseif ( is_category() ) { $description = single_cat_title('', false) . " - ". trim(strip_tags(category_description()));
    } elseif ( is_archive() )  { $description = $blog_name . "'" . trim( wp_title('', false) ) . "'";
    } elseif ( is_search() )   { $description = $blog_name . ": '" . esc_html( $s, 1 ) . "' 的搜索結果";
    } else { $description = $blog_name . "'" . trim( wp_title('', false) ) . "'";
    }
    $description = mb_substr( $description, 0, 220, 'utf-8' );
    echo "<meta name=\"description\" content=\"$description\">\n";
}
add_action('wp_head','pure_description');

function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];
 
  if(empty($first_img)){ //Defines a default image
    return false;
  }
  return $first_img;
}

//删除内容中的图片
function the_content_nopic($more_link_text = null, $stripteaser = false) {
	$content = get_the_content($more_link_text, $stripteaser);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	$content = preg_replace('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i', "", $content);
	echo $content;
}



function postformat_gallery(){
    global $post;
    ob_start();
    ob_end_clean();
    preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',$post->post_content,$matches ,PREG_SET_ORDER);
    $cnt = count( $matches );
    if($cnt>0){
        $images = "";
        $nav = "";
        for($i=0; $i<$cnt; $i++){
            $src = $matches[$i][1];
            $images .= '<li data-thumb="'.$src.'"><img src="'.$src.'" /></li>';
        }
		echo $images;
    }
}

if ( ! function_exists( 'pure_views' ) ) :
function record_visitors(){
	if (is_singular()) 
	{
	  global $post;
	  $post_ID = $post->ID;
	  if($post_ID) 
	  {
		  $post_views = (int)get_post_meta($post_ID, 'views', true);
		  if(!update_post_meta($post_ID, 'views', ($post_views+1))) 
		  {
			add_post_meta($post_ID, 'views', 1, true);
		  }
	  }
	}
}
add_action('wp_head', 'record_visitors');  

function pure_views($after=''){
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  echo $views, $after;
}
endif;

?>