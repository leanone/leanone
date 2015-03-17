
<?php get_header(); ?>

<section class="category-title">
	<div class="section-container">
		<h3 class="post-title"><?php single_cat_title() ?></h3>
		<?php if ( category_description() ) echo '<p>'.category_description().'</p>'; ?>
	</div>
</section>

<?php 

	if( have_posts() ){ 
		while ( have_posts() ){
			the_post(); 
			get_template_part( 'inc/post-format/content', get_post_format() );
		}
	}

?>

    <div class="pagination wp-pagenavi clearfix">
       <?php pagenavi($range = 3);?>
    </div>


<?php get_footer(); ?>