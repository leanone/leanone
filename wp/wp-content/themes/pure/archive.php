
<?php get_header(); ?>

<section class="category-title">
	<div class="section-container">
		<h3 class="post-title">
		<?php 
			if(is_day()) echo the_time('Y年m月j日');
			elseif(is_month()) echo the_time('Y年m月');
			elseif(is_year()) echo the_time('Y年'); 
			elseif(is_tag()){ echo single_tag_title(); echo "标签下";}
		?>的存档
		</h3>
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