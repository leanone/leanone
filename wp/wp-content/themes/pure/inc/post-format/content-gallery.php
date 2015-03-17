<section class="gallery-post-type">
	<div class="flexslider">
		<ul class="slides">
			<?php postformat_gallery();?>
		</ul>
	</div>
	<div class="section-container">

		<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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

		<div class="section-footer clearfix">
			<span><i class="fa fa-folder-open"></i><?php the_category(',');?></span>
			<span class="tags"><?php if ( get_the_tags() ) { echo '<i class="fa fa-tags"></i>';the_tags('', ', ', ' '); }?></span>
			<span class="float-right"><i class="fa fa-comments"></i><?php comments_popup_link('No Reply', '1 Reply', '% Replies'); ?></span>
		</div>
	</div>
</section>