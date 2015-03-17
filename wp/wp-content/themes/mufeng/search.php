<?php get_header();?>
<div class="container">
        <div class="row">
			<?php if (get_option('strive_breadcrumb') == 'Display') { ?>
                <div class="subsidiary box">
                    <div class="bulletin fourfifth">
                        当前位置：<a href="<?php bloginfo('siteurl');?>/" title="返回首页">首页</a> > “<?php echo htmlspecialchars($s); ?>”的搜索结果
                     </div>
                </div>
            <?php } else {} ?>
        </div>
    <?php get_sidebar();?>
    <div class="mainleft">
    <ul id="post_container" class="masonry clearfix">
	<?php if(have_posts()) : ;while(have_posts()) : the_post();?>
			<li class="post box row <?php if (get_option('strive_waterfall') == 'Hide') { ?>fixed-hight<?php } else {}?>">
            	<div class="post_hover">
                    <div class="thumbnail">
                        <a href="<?php the_permalink()?>" class="zoom" rel="bookmark" title="<?php the_title_attribute();?>">
                         <?php if (get_option('strive_waterfall') == 'Display') { ?>   
								<?php echo post_thumbnail_list()?>
                             <?php } else {?>
                                <?php echo post_thumbnail_img(300,200)?>  
                         <?php  } ?>     
                        </a>
                    </div>
                    <div class="article">
                        <h2><a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title_attribute();?>"><?php echo the_title();?></a></h2>
                         <?php if (get_option('strive_summary') == 'Display') { ?>
                            <div class="entry_post">
                                <p>
                                <?php if (has_excerpt()) {
                                    echo $description = get_the_excerpt();
                                }else {
                                    echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 150,"...","utf-8");
                                } ?>
                                </p>
                            </div>
                        <?php } else {}?>
                        <div class="arrow-catpanel-top">&nbsp;</div>
                    </div>
    				<div class="info">
                        <span class="info_date info_ico"><?php the_time('m-d')?></span>
                    	<span class="info_views info_ico"><?php echo getPostViews(get_the_ID());?></sapn></span>
                        <span class="info_comment info_ico"><?php comments_popup_link('0','1','%');?></span>
                        <span class="info_category info_ico"><?php the_category(', ')?></span> 
    				</div>
               </div>
    		</li>
	<?php endwhile;?>
    </ul>
    <?php else:?>
	</ul>
	<div class="clear"></div>
	<div class="post article article_c box">
		<h3 class="center">非常抱歉，无法搜索到与之相匹配的信息。</h3>
	</div>
	<?php endif;?> 
	</div>
</div>
</div>
	<div class="navigation container"><?php pagination(5);?></div>
<div class="clear"></div>
<?php get_footer();?>