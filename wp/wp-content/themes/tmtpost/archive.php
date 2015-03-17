<?php get_header(); ?>
<section class="new-contentBox new-center">

	<div id="breadcrumbs">
		<span style="display:inline; float:left;">
			当前位置&nbsp;:&nbsp;<a href="<?php bloginfo('url'); ?>" title="首页">首页</a>&nbsp;»所有属于" <?php single_cat_title(); ?>" 分类文章
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
<div class="new-articleItem new-borderRadius" style="margin-top:0px"> 		
	<div class="tag_title"> 
	<h2><?php single_cat_title(); ?></h2>
	<?php if(category_description()) { ?><?php echo category_description(); ?><?php } ?>
	</div>
</div>	
<div class="clearfix" style="height:10px;"></div>
<div id="post_entry" style="width:648px;border:1px solid #c9c9c9;" class="new-borderRadius">	
  					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  					<?php $fmimg = get_post_meta($post->ID, "fmimg_value", true); ?>
  					<div class="new-articleItem new-borderRadius" style="border:0px;border-bottom:1px #c9c9c9 dashed;margin-top:0px;"> 
					
					<div id="post_meta_c" class="new-thumb">
				 	<div class="intro" style="width:206px;padding:0px;margin:0px;">
				 		<div class="thumb">
<a href="<?php the_permalink(); ?>" target="_blank" rel="bookmark" title="<?php the_title(); ?>"><?php if($fmimg) { ?><img class="alignleft" alt="<?php the_title(); ?>" src="<?php echo $fmimg; ?>" /><?php } else { ?><img class="alignleft" alt="<?php the_title(); ?>" src="<?php echo catch_that_image(); ?>" /><?php } ?></a>
</div><!-- 给首页每个文章增加一个随机图 -->
					</div>
					</div>
					
					<div class="new-intro">
						<!-- 标题   -->
								
						<h3><a href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>			
							<p>
								<p class="new-info">
								<?php the_tags('<span>标签:&nbsp;',', ','</span>'); ?>
								<span><?php the_time('Y/m/d H:i'); ?></span> <span></span></p>
							</p>					
							
							<?php the_excerpt(); ?>
					
											<p class="new-readmore">
								<span>
									作者: <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a>
								</span>&nbsp;					
								<span>评论数:<a href="<?php the_permalink(); ?>#respond" title="《<?php the_title(); ?>》上的评论"><?php comments_number('0', '1', '%' );?></a>条</span>
															</p>
						
					</div>				
					<div class="clearfix"></div>
				</div><!-- post_meta_c end -->
			    <?php endwhile;?><?php endif; ?>
</div>				
			<!-- post entry end -->

			<div class="clearfix"></div>
	    			<div class="pagenavi_badoo">
<?php par_pagenavi(9);  ?> <div class="clearfix"></div>
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