
<?php get_header(); ?>

<?php 

	if( have_posts() ){ 
		while ( have_posts() ){
			the_post(); 
			get_template_part( 'inc/post-format/single', get_post_format() );
		}
	}

?>

<?php get_footer(); ?>