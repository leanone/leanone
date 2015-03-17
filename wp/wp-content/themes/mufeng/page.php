<?php get_header();?>
<div class="container">
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
        <div class="row">
			<?php if (get_option('strive_breadcrumb') == 'Display') { ?>
            <?php } else {} ?>
        </div>
<?php get_sidebar();?>
    <div class="mainleft" id="content">
		<div class="article_container row  box">
			<h1 class="page_title"><?php the_title();?></h1>
        <div class="context">
        	<div id="post_content"><?php the_content('Read more...');?></div>
        	   <?php 
                	wp_link_pages('before=<div class="pagelist">分页阅读：&after=&next_or_number=next&previouspagelink=上一页&nextpagelink=&nbsp');
                	wp_link_pages('before=&after=&next_or_number=number&link_before=<span>&link_after=</span>');
                	wp_link_pages('before=&after=</div>&next_or_number=next&previouspagelink=&nbsp&nextpagelink=下一页');
                ?>
         </div>       
	</div>
    <div id="comments_box">
		<?php comments_template();?>
    </div>    
	<?php endwhile;else: ;endif;?>
</div>
</div>
<?php get_footer();?>