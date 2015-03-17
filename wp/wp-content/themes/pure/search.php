
<?php get_header();?>



<?php 

	if( have_posts() ){
?>
<section class="category-title">
	<div class="section-container">
		<h3 class="post-title">有关【<?php echo $s; ?>】的内容</h3>
	</div>
</section>
<?php	
		while ( have_posts() ){
			the_post(); 
			get_template_part( 'inc/post-format/content', get_post_format() );
		}
	} else {
?>
<section class="category-title">
	<div class="section-container">
		<h3 class="post-title">没有找到有关【<?php echo $s; ?>】的内容</h3>
	</div>
</section>	
<?php
	}

?>

    <div class="pagination wp-pagenavi clearfix">
       <?php pagenavi($range = 3);?>
    </div>

<?php get_footer(); ?>