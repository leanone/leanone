<section class="quote">
	<div class="section-container clearfix">
		<span class="post-date"><?php the_time('d,'); echo date('M',get_the_time('U'));?></span>
		<p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 340,"……"); ?></p>
			<span class="author"><?php the_title(); ?></span>
	</div>
</section>