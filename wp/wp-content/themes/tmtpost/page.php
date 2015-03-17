<?php get_header(); ?>
<section class="new-contentBox new-center">

	<div id="breadcrumbs">
		<span style="display:inline; float:left;">
			当前位置&nbsp;:&nbsp;<a href="<?php bloginfo('url'); ?>" title="首页">首页</a>&nbsp;»<?php the_title(); ?>
		</span>
		<span style="display:inline; float:right;">
			热门：<?php echo get_option('mao10_hottags'); ?>

		</span>
	<div class="clearfix"></div>
	</div>

<div id="fullcontent">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div id="post_entry">
									<div id="post_meta">
					<div style="margin:30px 30px;">
					<div class="post_info">
						<h1 style="margin-bottom:10px;s"><?php the_title(); ?></h1>
					</div><!-- post info end -->
					<div class="post_content"><?php the_content(); ?></div><!-- post content end -->
					<div class="clearfix"></div>
					</div>
				</div><!-- post meta 611 end -->
						
			</div><!-- post entry end -->
	<?php endwhile;?><?php endif;?>
	<div class="pagenavi_badoo">
<div class="clearfix"></div>
</div></div>

</section>

<div class="clearfix" style="height:10px;"></div>

</div><!-- container end -->

<?php get_footer(); ?>