<section class="gallery-post-type">
	<div class="flexslider">
		<ul class="slides">
			<?php postformat_gallery();?>
		</ul>
	</div>
	<div class="section-container">

		<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<span class="post-date"><?php the_time('d,'); echo date('M',get_the_time('U'));?></span>
		<?php the_content_nopic(); ?>

		<div class="section-footer clearfix">
			<span><i class="fa fa-folder-open"></i><?php the_category(',');?></span>
			<span class="tags"><?php if ( get_the_tags() ) { echo '<i class="fa fa-tags"></i>';the_tags('', ', ', ' '); }?></span>
			<span class="float-right"><i class="fa fa-eye"></i><a><?php pure_views('&nbsp;Views'); ?></a></span>
		</div>
		<?php comments_template('', true); ?>
	</div>
</section>