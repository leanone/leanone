
<?php get_header(); 
	global $wp_query;
	$curauth = $wp_query->get_queried_object();?>

<section class="category-title">
	<div class="section-container">
		<h3 class="post-title"><?php echo $curauth->display_name.'的文章' ?></h3>
		<?php if ( $curauth->description ) echo '<p>'.$curauth->description.'</p>'; ?>
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