<?php get_header();?>
	<div class="container">
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
        <div class="row">
			<?php if (get_option('strive_breadcrumb') == 'Display') { ?>
            <?php } else {} ?>
        </div>
   	 	<?php get_sidebar();?>
    	<div class="mainleft"  id="content">
			<div class="article_container row">
				<h1><?php the_title();?></h1>
                    <div class="article_info">
                        <span class="info_author">作者：<?php the_author();?>　</span>/
                         <span class="info_date">　时间：<?php the_time('Y-m-d')?>　</span><a href="http://www.izlogo.com/" target="_blank" >/</a>
                        <span class="info_views">　浏览：<?php setPostViews(get_the_ID());;echo getPostViews(get_the_ID());?>　</span><a href="http://www.izlogo.com/" target="_blank" rel="external"></a>/
                        <span class="info_category">　分类：<?php the_category(', ')?>　</span>
                    </div>
            	<div class="clear"></div>
            <div class="context">
            
            <?php if (get_option('strive_logoadc') == 'Display') { ?>
                 	<div class="banner">
                 	<?php echo stripslashes(get_option('strive_logoadccode')); ?>
					</div>
                	<?php } ?>
            
				<div id="post_content"><?php the_content('Read more...');?></div>
                <?php 
                	wp_link_pages('before=<div class="pagelist">分页阅读：&after=&next_or_number=next&previouspagelink=上一页&nextpagelink=&nbsp');
                	wp_link_pages('before=&after=&next_or_number=number&link_before=<span>&link_after=</span>');
                	wp_link_pages('before=&after=</div>&next_or_number=next&previouspagelink=&nbsp&nextpagelink=下一页');
                ?>
                    <?php if (get_option('strive_aboutme') == 'Display') { ?>    
                <div class="ssocial">
                <div id="zans">
                   <?php wp_zan();?></div></div>
                   
                      <?php } else { } ?>
               	<div class="clear"></div>
                <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
             </div><div class="xian"></div>
		</div><div class="article_tags">
                	<div class="tagclouds">
                    	文章关键词：<?php the_tags('',' ','');?>
                    </div>
                </div>
    <?php if (get_option('strive_adc') == 'Display') { ?>
    	<div class="box row">
		<?php echo stripslashes(get_option('strive_adccode')); ?>
		</div>
		<?php { echo ''; } ?><?php } else { } ?>    

		
 
	<div>
		<ul class="post-navigation row">
			<div class="post-previous twofifth">
				<?php previous_post_link('上一篇 <br> %link', '%title', TRUE); ?>
            </div>
            <div class="post-next twofifth">
				<?php next_post_link('下一篇 <br> %link', '%title', TRUE); ?>
            </div>
        </ul>
	</div>
    <?php if (get_option('strive_related') == 'Display') { ?> 
	<div class="article_container row  box article_related">
    	<div class="related">
		<?php include('includes/related.php');?>
       	</div>
	</div>
     <?php } else { } ?>
    	<div class="clear"></div>
	<div id="comments_box">
		<?php comments_template('', true); ?>
    </div>
	<?php endwhile;else: ;endif;?>
</div>
</div>
<?php get_footer();?>