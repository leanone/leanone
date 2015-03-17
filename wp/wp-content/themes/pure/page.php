<?php 
get_header(); 
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<section>
    <div class="section-container">
        <h1 class="post-title"><?php the_title(); ?></h1>
		<hr class="large-icon double-line large heart-o">
		<?php the_content(); ?>
		<?php comments_template('', true); ?>
    </div>
</section>

	
<?php endwhile; endif;?>

<?php get_footer(); ?>