<!DOCTYPE html>
<html>
<head>

	<title>
	<?php
	if(is_front_page() || is_home()) { 
		bloginfo('name');
	} else if(is_single() || is_page()) {
		 wp_title(''); 
	} else if(is_category()) {
		printf('%1$s 类目的文章存档', single_cat_title('', false));
	} else if(is_search()) {
		printf('%1$s 的搜索结果', wp_specialchars($s, 1));
	} else if(is_tag()) {
		printf('%1$s 标签的文章存档', single_tag_title('', false));
	} else if(is_date()) {
		$title = '';
		if(is_day()) {
			$title = get_the_time('Y年n月j日');
		} else if(is_year()) {
			$title = get_the_time('Y年');
		} else {
			$title = get_the_time('Y年n月');
		}
		printf('%1$s的文章存档', $title);
	} else {
		bloginfo('name');
	}
	?>
	</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" media="screen">
    <link href="<?php bloginfo('template_directory');?>/css/font-awesome.min.css" rel="stylesheet" media="screen">

    <!--[if IE 7]>
    <link href="<?php bloginfo('template_directory');?>/css/ie7.css" rel="stylesheet" media="screen">
    <link href="<?php bloginfo('template_directory');?>/css/font-awesome-ie7.min.css" rel="stylesheet" media="screen">
	<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>
    <![endif]-->
    <!--[if lt IE 8]>
    <link href="<?php bloginfo('template_directory');?>/css/ie8.css" rel="stylesheet" media="screen">
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/images/favicon.png" type="image/icon">
    <link rel="icon" href="<?php bloginfo('template_directory');?>/images/favicon.png" type="image/icon">
	
	<script src="<?php bloginfo('template_directory');?>/js/jquery-1.10.2.min.js"></script>
	<?php if(is_singular()) {?>
	<script type='text/javascript' src='<?php bloginfo('template_directory');?>/comments-ajax.js'></script>
	<?php } ?>
<?php wp_head(); ?>
</head>

<body>


<div class="container page-wrap">

    <header class="main-header clearfix">
        <h1 class="logo"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo(); ?>"><?php bloginfo(); ?></a></h1>

        <nav>
            <div class="menu-button"><span class="fa fa-bars"></span></div>
            <ul class="main-menu">
				<?php 
				if(function_exists('wp_nav_menu')){
					wp_nav_menu(array('container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'header-menu'));
				}	
				?>
                <li class="search">
                    <i class="fa fa-search search-handle"></i>
                    <i class="fa fa-times close-handle"></i>

                    <form action="<?php bloginfo('url'); ?>" id="searchform" method="get" class="search-form">
                        <input type="text" id="s" name="s" placeholder="Search...">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>	