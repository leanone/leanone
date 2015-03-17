<?php 
/*
Template Name: 存档模板
*/
get_header(); 
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<section>
	<div class="section-container">
		<h1 class="post-title">Archive</h1>
		<?php the_content();?>
		<hr class="large double-line">
		<div class="archive-section clearfix">
			<div class="column-1">
				<div class="ordered-list">
					<h3>Latest posts</h3>
					<ol>
					<?php
						$myposts = get_posts('numberposts=20&orderby=post_date&order=DESC');

						foreach($myposts as $post) :
							setup_postdata($post);
					?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php
						endforeach;
					?>
					</ol>
				</div>
			</div>

			<div class="column-2" style="height: 266px;">
				<div class="ordered-list">
					<h3>Posts by month</h3>
					<ol>
						<?php wp_get_archives(apply_filters('widget_archives_args', array('type' => 'monthly', 'limit' => 24))); ?>
					</ol>
				</div>

				<div class="ordered-list">
					<h3>Posts by year</h3>
					<ul>
						<?php wp_get_archives(apply_filters('widget_archives_args', array('type' => 'yearly', 'limit' => 10))); ?>
					</ul>
				</div>
			</div>

			<div class="column-3">
				<div class="ordered-list">
					<h3>Categories</h3>
					<ul>
					<?php
						// 获取分类
						$terms = get_terms('category', 'orderby=name&hide_empty=0' );
						// 获取到的分类数量
						$count = count($terms);
						if($count > 0){
							// 循环输出所有分类信息
							foreach ($terms as $term) {
								echo '<li><a href="'.get_term_link($term, $term->slug).'" title="'.$term->name.'">'.$term->name.'</a></li>';
							}
						}
					?>
					</ul>					
				</div>

				<div class="ordered-list">
					<h3>All pages</h3>
					<ul>
					<?php
						$myposts = get_posts('numberposts=-1&orderby=post_date&order=DESC&post_type=page');

						foreach($myposts as $post) :
							setup_postdata($post);
					?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php
						endforeach;
					?>                      
					</ul>
				</div>
			</div>
		</div>

	</div>
</section>
	
<?php endwhile; endif;?>

<?php get_footer(); ?>