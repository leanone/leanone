<?php $style = get_post_meta($post->ID, 'post-style', true);?>

<?php if($style == 'note') { ?>
<section class="note">
<?php } elseif($style == 'poster') { ?>
<section class="poster">
<?php } else {?>
<section>
<?php } ?>
	<?php if($style == 'bphoto' && catch_that_image() ) {?>
	<a href="<?php the_permalink(); ?>"><img src="<?php echo catch_that_image();?>"></a>
	<?php } ?>
	<div class="section-container">
		<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
		<span class="post-date"><?php the_time('d,'); echo date('M',get_the_time('U'));?></span>
		<?php if($style == 'rphoto' && catch_that_image() ) {?>
		<img src="<?php echo catch_that_image();?>" class="alignright" alt="<?php the_title(); ?>">
		<?php } ?>
		<?php if($style == 'lphoto' && catch_that_image() ) {?>
		<img src="<?php echo catch_that_image();?>" class="alignleft" alt="<?php the_title(); ?>">
		<?php } ?>
		
		<?php
		if($style == 'lphoto' || $style == 'bphoto' || $style == 'rphoto') {
			the_content_nopic('');
		} else {
			$pc=$post->post_content;
			$st=strip_tags(apply_filters('the_content',$pc));
			if(has_excerpt())
				the_excerpt();
			elseif(preg_match('/<!--more.*?-->/',$pc) || mb_strwidth($st)<800)
				the_content_nopic('');
			elseif(function_exists('mb_strimwidth'))
				echo'<p>'.mb_strimwidth($st,0,800,' ...').'</p>';
			else the_content_nopic('');
		}
		?>
		
		<div class="section-footer clearfix">
			<span><i class="fa fa-folder-open"></i><?php the_category(',');?></span>
			<span class="tags"><?php if ( get_the_tags() ) { echo '<i class="fa fa-tags"></i>';the_tags('', ', ', ' '); }?></span>
			<span class="float-right"><i class="fa fa-comments"></i><?php comments_popup_link('No Reply', '1 Reply', '% Replies'); ?></span>
		</div>
	</div>
</section>