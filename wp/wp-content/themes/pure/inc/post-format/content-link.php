<section class="link">
	<div class="section-container clearfix">
		<h3 class="post-title"><a href="<?php echo get_post_meta($post->ID, 'url', true); ?>" target="_blank"><?php the_title(); ?></a></h3>
		<span class="post-date"><?php the_time('d,'); echo date('M',get_the_time('U'));?></span>

		<?php 
			$pc=$post->post_content;
			$st=strip_tags(apply_filters('the_content',$pc));
			if(has_excerpt())
				the_excerpt();
			elseif(preg_match('/<!--more.*?-->/',$pc) || mb_strwidth($st)<800)
				the_content_nopic('');
			elseif(function_exists('mb_strimwidth'))
				echo'<p>'.mb_strimwidth($st,0,800,' ...').'</p>';
			else the_content_nopic('');
		?>
	</div>
</section>