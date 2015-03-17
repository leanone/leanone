<?php get_header();?>
<div class="container">
    <div class="mainlefts">
       <?php include('includes/fenlei.php'); ?>
        <ul id="post_container" class="masonry clearfix">
			<?php include('includes/list_post.php'); ?>
    	</ul>
		<div class="clear"></div>
		</div>
	</div>
	<div class="navigation container"><?php pagination(5);?></div>
<div class="clear"></div>
<?php get_footer(); ?>