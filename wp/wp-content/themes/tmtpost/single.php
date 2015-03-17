<?php get_header(); ?>
<section class="new-contentBox new-center">

	<div id="breadcrumbs">
		<span style="display:inline; float:left;">
			当前位置&nbsp;:&nbsp;<a href="<?php bloginfo('url'); ?>" title="首页">首页</a>&nbsp;»<?php $categorys=get_the_category(); $category=$categorys[0]; echo(get_category_parents($category->term_id,true,'&nbsp;»') ); ?><?php the_title(); ?>
		</span>
		<span style="display:inline; float:right;">
			热门：<?php echo get_option('mao10_hottags'); ?>

		</span>
	<div class="clearfix"></div>
	</div>

<script type="text/javascript">
$(".blog_loading").animate({width:"5%"})
</script>	
	
<section class="new-leftBox">
	
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php setPostViews(get_the_ID()); ?>
	<div id="post_entry" class="new-borderRadius" style="background:transparent;">
	
								
			<div id="post_meta" class="new-borderRadius" style="padding:0px;">
				
				<section class="new-aInfo new-borderRadius" style="padding:20px;width:608px;">	
				<div class="post_info">
					<div class="post_comments">
						<a href="<?php the_permalink(); ?>#comments" title="《<?php the_title(); ?>》上的评论"><?php comments_number('0', '1', '%' );?></a>					</div>
					<div class="post_date">
						<div class="day"><?php the_time('d'); ?></div>
						<div class="year_month">
							<span><?php the_time('Y'); ?></span>.<span><?php the_time('m'); ?></span>
						</div>
					</div><!-- post date end -->
					<h1><?php the_title(); ?></h1>
						<div class="post_admin">
							作者:<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" title="由 <?php the_author_meta('display_name'); ?> 发布" rel="author"><?php the_author_meta('display_name'); ?></a> /分类:<?php the_category(', '); ?><?php the_tags(' /Tag:',', ',''); ?> /&nbsp;						</div>
					<div class="text_size" style="display: none;">			
                   字号：<span class="text_large">L</span>
						<span class="text_middle">M</span>
						<span class="text_small">S</span>
					</div><!-- text size end -->
					<div class="clearfix"></div>
				</div><!-- post info end -->
				<span class="new-leftIcon"></span><span class="new-rightIcon"></span>
				</section>	
				
				<section class="new-aContent new-borderRadius">
				
				<!-- 新窗口打开连接 -->
						<script language="javascript" type="text/javascript">
						window.onload = function(){
						        var href = document.getElementById("newwin").getElementsByTagName('a');
						        for(key in href)
						        {
						                href[key].target = "_blank";
						        }
						}
						</script>				
				<!-- 新窗口打开连接end -->
				<div id="newwin" class="post_content" style="font-size: 12px; line-height: 22px;">
					<div class="post_content_top_ads">
																								</div>
					<style>.post_summary_text p {text-indent: 4em!important;}</style>																			
					<div class="post_summary_text"><div style="background:url(<?php bloginfo('template_directory'); ?>/images/tb_zy.png) no-repeat 0 -3px!important;"><?php the_excerpt(); ?></div></div>
					<div class="post_content_text"><?php the_content(); ?></div>
					<!-- post_content_text end -->
					
				</div><!-- newwin end -->


				<div class="clearfix" style="clear:both;"></div>	
				
						<hr size="1" style="color: #aaaaaa;border-style:dashed;width:100%;margin-top:10px;">

				<div class="post_content_bottom_ads">
																							</div>
			</section>				
			</div><!-- post meta end -->
			</div><!-- post entry end -->
<?php endwhile;?><?php endif; ?>
<style type="text/css">
/* The Window's CSS z-index value is respected (takes priority). If none is supplied,
  the Window's z-index value will be set to 3000 by default (in jqModal.js). You
  can change this value by either;
    a) supplying one via CSS
    b) passing the "zIndex" parameter. E.g.  (window).jqm({zIndex: 500}); */
  

.jqmWindow {
	display: none;
	background: url(/wp-content/themes/pzima_srtec/images/login_bg.png);
	position: fixed;
	top: 17%;
	left: 50%;
	margin-left: -166px;
	width: 332px;
	height: 255px;
	color: #333;
	padding: 12px;
}
.jqmOverlay {
	background-color: #000;
}
.jqmWindow form {
	position: relative;
	width: 270px;
	margin: 0 auto
}
.jqmWindow .l {
	float: left;
}
.l a{
	font-size:13px;;
}
.r {
	float: right;
}
.jqmWindow label {
	display: block;
	font-size: 14px;
	color: #777;
	float:left;
}
.jqmWindow .l label {
	display: inline;
	margin-right: 10px;
	float:left;
}
.jqmWindow .button-primary {
	background: url(/wp-content/themes/pzima_srtec/images/btn.png);
	width: 70px;
	height: 28px;
	border: 0
}
.jqmWindow p {
	margin-bottom: 10px
}
.login-close a {
	display: block;
	width: 20px;
	height: 20px;
	position: absolute;
	top: -8px;
	right: -25px
}
.login-username input, .login-password input {
	width: 260px;
	height: 30px;
	border: 1px solid #e5e5e5;
	background: #fbfbfb;
	line-height: 30px;
	padding-left: 8px
}
.login-username label, .login-password label {
	float:left;
}
.htbody span {
	margin: 0 !important;
}
.intxt {
	float: left;
	width: 350px
}
.intxt p {
	color:#666;
	}
.intxt p span {
	display:inline;
}
.red{
	color: red !important;
	}
.inbut {
	float: right
}
.tgnum {
	width: 58px;
	height: 45px;
	padding-top: 20px;
	background: url(/wp-content/themes/pzima_srtec/images/tougaobg.png);
	text-align: center;
	margin-left: 5px;
	margin-bottom: 10px;
	font-size: 12px;
}
.htbtn a {
	background: url(/wp-content/themes/pzima_srtec/images/yaopai.png);
	width: 69px;
	height: 26px;
	display: block;
	text-align: center;
	font-weight: bold;
	font-size: 14px;
	color: #fff;
	line-height: 26px
}
.tgnum b {
	display: block;
	font-size: 22px;
	color: #f60;
	margin-bottom: 3px
}
.tgnum span {
	display: block;
	color: #4f4d4d;
}
.htbody .thumb img {
	width: 160px !important;
	height: 110px !important;
	font-size: 12px !important;
}
.ckall h3 {
	width: 90px;
	height: 24px;
	line-height: 24px;
	background: #f7f7f7 url(/wp-content/themes/pzima_srtec/images/ck.png) 5px center no-repeat;
	padding-left: 20px;
	float: right;
	font-size: 14px;
	cursor: pointer
}
.htlist {
	background: #f7f7f7;
	width: 600px;
	clear: both;
	padding: 10px;
	overflow: hidden
}
.htlist .tglist {
	margin: 0 10px;
	width: 280px;
	overflow: hidden;
	float: left
}
.htlistnum {
	background: url(/wp-content/themes/pzima_srtec/images/numbg.png) no-repeat 2px 4px;
	
}
.htlistnum span {
	color: #ff9900 !important;
	font-size: 12px;
	font-weight:bold;
}
.htlistnum a {
	font-weight: bold;
	font-size:13px;
}
.tglist {
	background: url(/wp-content/themes/pzima_srtec/images/numbg.png) no-repeat 2px 4px;
	}
.tglist a{
	font-size:13px;
	}	
.tglist span {	
	width: 26px;
	font-size:12px;
	font-weight:bold;
	margin-left: 5px;
	text-align: center;
	display: inline-block;	
}
.htlist .hthot {
	background: url(/wp-content/themes/pzima_srtec/images/hot.png) left 0 no-repeat;
	width: 8px;
	height: 18px;
	line-height: 18px;
	padding-left: 35px;
	color: #666;
	font-style: normal;
	margin-left:5px;
	font-size:12px;
}
.tgcon {
	text-align: right;
	overflow: hidden;
	height: 80px;
	width: 280px
}
.tgcon p {
	text-align: left;
	height: 55px
	color:#999;
}
.tgcon u {
	text-decoration: none;
	font-size: 12px;
}
.tgcon a {
	font-size: 12px;
	margin-left: 5px;
	color: #2c5591
	font-weight:normal;
}

.ht_htsm{
	float:left;
	width:620px;
	}
.ht_htsm p{
	float:left;
	}
.ht_htsm p span{
	float:left;
	}

* html .jqmWindow {
	position: absolute;
 top: expression((document.documentElement.scrollTop || document.body.scrollTop) + Math.round(17 * (document.documentElement.offsetHeight || document.body.clientHeight) / 100) + 'px');
}
.randhot{overflow:hidden}
.randhot a{ background:none; width:202px; padding-left:0; float:left; overflow:hidden}
.randhot h3{width:200px}
.randauthor{overflow:hidden; padding-left:15px}
.randauthor li{width:80px; height:auto !important; float:left; border:0 !important; text-align:center}
.randauthor li img{padding:2px;border:1px #cccccc solid;}
.randauthor li b{display:block;line-height:150%;margin-top:10px;}
.postauthor{overflow:hidden;}
.postauthor img{float:left;margin-right:10px;padding:2px;border:1px #cccccc solid;}
.postauthor h4{font-size:14px;font-weight:bold;}
.sidebar_list .user_butt{clear:both;float:left;margin-left:66px;}
.hottop {clear:both;padding:10px;}
.hottop h4{font-size:13px;font-weight:bold;}
.headlineImg img {width: 190px; height: 100px;}
</style>	
	
	<section class="new-aRelated new-borderRadius">
		<span class="new-leftIcon"></span><span class="new-rightIcon"></span>		
		<!-- 调用相关文章 -->
		
		<div class="randhot">
	    	    <?php
				global $post;
				$cats = wp_get_post_categories($post->ID);
				if ($cats) {
				$args = array(
				        'category__in' => array( $cats[0] ),
				        'post__not_in' => array( $post->ID ),
				        'showposts' => 3,
				        'caller_get_posts' => 1
				    );
				query_posts($args);
				
				if (have_posts()) : 
			    while (have_posts()) : the_post(); update_post_caches($posts); ?>
			    <?php $fmimg = get_post_meta($post->ID, "fmimg_value", true); ?>
	    	    <a class="headlineImg" href="<?php the_permalink(); ?>">
	    	    	<?php if($fmimg) { ?><img align="center" alt="<?php the_title(); ?>" src="<?php echo $fmimg; ?>" /><?php } else { ?><img align="center" alt="<?php the_title(); ?>" src="<?php echo catch_that_image(); ?>" /><?php } ?>
	    	    	<h3 style="margin-top:10px;"><?php the_title(); ?></h3>
	    	    </a>
	    	    <?php endwhile; endif; wp_reset_query(); } ?>
	    	  
		</div>
		
	</section>

<style>
#comment{margin: 0 auto;padding:5px 10px 10px;width: auto;background-color: #FFFFFF;border: 1px solid #c9c9c9;-moz-border-radius: 4px!important;-khtml-border-radius: 4px!important;-webkit-border-radius: 4px!important;border-radius: 4px!important;}
</style>
<div id="comment">
			<?php comments_template(); ?>
</div>

</section>

<script type="text/javascript">
$(".blog_loading").animate({width:"45%"})
</script>

<?php get_sidebar(); ?>

<script type="text/javascript">
$(".blog_loading").animate({width:"85%"})
</script></section>

<div class="clearfix" style="height:10px;"></div>

</div><!-- container end -->

<?php get_footer(); ?>