<?php get_header();?>
<div class="smainmenus ">
			<div class="smainmenu container">
				<div class="stopnav">
<div class="slider">
	<div id="focus">
		<ul>
     		<?php query_posts($query_string . 'tag='. stripslashes(get_option('strive_slidestag')).'&showposts=' . $limit=6)?>        
    		<?php while ( have_posts() ) : the_post();?>
			<li>
                <a href="<?php the_permalink();?>" target="_blank" rel="nofollow" title="<?php the_title_attribute();?>">
                    <?php echo post_thumbnail_img(500,300)?>
                </a>
            	<div class="flex-caption">  
              		<h2><a href="<?php the_permalink(); ?>"  target="_blank" rel="nofollow"><?php the_title(); ?></a></h2>
                    <p class="slides_entry">
						<?php if (has_excerpt()) {
							echo mb_strimwidth(strip_tags(apply_filters('the_excerpt',get_the_excerpt())), 0, 250,"...","utf-8");
						}else {
							echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 250,"...","utf-8");
						} ?>
                     </p>
                     <p class="btns"><a href="<?php the_permalink(); ?>"  target="_blank" rel="nofollow">阅读全部</a></p>
            	</div>  
            </li>
            <?php endwhile; wp_reset_query(); ?>   
		</ul>
	</div>
		</div>
                        </div>
                    </li>
                </ul> 
                 <!-- menus END -->                    
            </div>
				</div>
				<div class="clear"></div>
			</div>
<div class="container">
	<?php if (get_option('strive_gg') == 'Display') { ?>
    <?php } else { echo '<div class="row"></div>';} ?>
    <?php if (get_option('strive_slidebar') == 'Display') { ?>
    	<?php if (get_option('strive_slides') == 'Display'&& $post==$posts[0] && !is_paged()) { ?>
        	<?php include('includes/slides.php'); ?>
            <?php { echo ''; } ?>
    <?php } else { } ?><?php } else { } ?>
   <?php include('includes/fenlei.php'); ?>
        <ul id="post_container" class="masonry clearfix">
        <?php query_posts($query_string.'&cat='.get_option('strive_leiid')); ?>
			<?php include('includes/list_post.php'); ?>
    	</ul>
		<div class="clear"></div>
		</div>
	</div>
	<div class="navigation container"><?php pagination(5);?></div>
<div class="clear"></div>
<?php get_footer()?>
