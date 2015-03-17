<!DOCTYPE html>
<html xmlns:wb=“http://open.weibo.com/wb”>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php if (is_single() || is_page() || is_archive() || is_search()) { ?><?php wp_title('',true); ?> - <?php } bloginfo('name'); ?><?php if ( is_home() ){ ?> - <?php bloginfo('description'); ?><?php } ?><?php if ( is_paged() ){ ?> - <?php printf( __('Page %1$s of %2$s', ''), intval( get_query_var('paged')), $wp_query->max_num_pages); ?><?php } ?></title>
<?php 
if (is_home()){ 
	$description     = get_option('mao10_description');
	$keywords = get_option('mao10_keywords');
} elseif (is_single() || is_page()){    
	$description1 =  $post->post_excerpt ;
	$description2 = mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200, "…");
	$description = $description1 ? $description1 : $description2;
	$keywords = "";        
	$tags = wp_get_post_tags($post->ID);
	foreach ($tags as $tag ) {
		$keywords = $keywords . $tag->name . ", ";
	}
} elseif(is_category()){
	$description     = strip_tags(category_description());
	$current_category = single_cat_title("", false);
	$keywords =  $current_category;
}
?>
<meta name="keywords" content="<?php echo $keywords ?>" />
<meta name="description" content="<?php echo $description ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
<![endif]-->
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js?ver=3.4.2'></script>

<style type="text/css" media="screen">#wp-admin-bar-user-info .avatar-64 {width:64px}</style>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/new_style.css" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/pirobox.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.pzima.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/lazyload.js"></script>
<script type="text/javascript">
jQuery(document).ready(
function($){
$("#post_meta_c img,#post_meta img").lazyload({
     placeholder : "<?php bloginfo('template_directory'); ?>/js/grey.gif",
     effect      : "fadeIn"
});
});
</script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/tmtScript.js"></script>
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div id="header">
	<div id="container">	
		<div id="siteinfo"><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('name'); ?>"></a></div>		
		<div id="topbanner">
        
        						<a href="<?php bloginfo('url'); ?>/wp-login.php">登录</a><font color="#8c8b8b"> / </font> <li><a href="<?php bloginfo('url'); ?>/wp-login.php?action=register">注册</a></li>                    <font class="new-toolList">
                <a id="rss" href="<?php bloginfo('url'); ?>/?feed=rss2" rel="" title="订阅">订阅</a><a id="favorite" href="#" style="CURSOR: hand" onClick="window.external.addFavorite('<?php bloginfo('url'); ?>/','<?php bloginfo('name'); ?>')" title="收藏本站到你的收藏夹">收藏</a><a id="about" href="#" rel="" title="投稿通道">投稿通道</a>
          </font>
		</div>
		
		<div id=search-lqb>
			<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
				
				<input class=search-lqb-input  type="text" name="s" id="s" value="输入关键字..." onfocus="if (this.value == '输入关键字...') {this.value = '';}" onblur="if (this.value == '') {this.value = '输入关键字...'}" /><input class=search-lqb-button style="cursor:hand;" type="submit" id="searchsubmit" value="" />
				
			</form>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- header end -->
<div id="navigation2">
	<div id="container2">
	<?php wp_nav_menu( array( 'theme_location' => 'header-menu','container' => '','menu_id' => 'topnav2','menu_class' => 'menu','before' => '','after' => '') ); ?>				
		<!--add-->
		<ul id="mytmt">
		<a href="<?php bloginfo('url'); ?>/wp-login.php?redirect_to=<?php bloginfo('url'); ?>">我的钛度</a>
		</ul>
				<!--/add-->
		
		<div class="clearfix"></div>	
	</div><!-- container2 end 作用:定位nav-->
	
</div><!-- navigation2 end -->