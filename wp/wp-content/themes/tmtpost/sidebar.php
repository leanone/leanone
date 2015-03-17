<section class="new-rightBox">

<div class="new-topAdBox new-borderRadius">
    <div class="new-follow">
	  <a id="weibo" href="javascript:void(0);" title="关注新浪微博"><span><wb:follow-button uid="1403921535" type="red_1" width="67" height="24" ></wb:follow-button></span></a>
	  <a id="weixin" href="javascript:void(0);" title="关注腾讯微信"><span>扫一扫</span></a>
	  <div id="weixin2DC" class="new-weixin2DC" style="display:none;"><span class="new-arrow"></span><img src="<?php echo get_option('mao10_weixin'); ?>" /></div>
	</div>
  <div style="margin-top:5px;">
	  <a href="/category/ti-pai" title="钛媒体火热征稿啦" >
	    <img src="<?php bloginfo('template_directory'); ?>/images/ZG.jpg" width="270" height="266" />
	  </a>
	</div>            
</div>

<div class="new-topAdBox new-borderRadius" style="margin-top:5px;height:auto;">
	<h3 style="font-size:15px;">公 告</h3>
	<?php echo get_option('mao10_gonggao'); ?>
</div>

<ul class="new-hotAuthors new-borderRadius new-marginTop">
<h2>推荐阅读</h2>
<ul>
<?php if (have_posts()) : ?>
						<?php 
						$tuijian = get_option( 'mao10_tuijian');
						$args=array(
							'showposts'=>'10','cat'=>''. $tuijian .'','caller_get_posts' => 1
						);
						$my_query=new WP_Query(
							$args
						); 
						while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
						?>
<div class="new-authorItem">
	<div class="new-intro">
		<a class="new-thumb" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
			<?php echo get_avatar( get_the_author_email(), 48 ); ?>
		</a>
		<p class="new-name">
			<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><b><?php the_author_meta('display_name'); ?></b></a>
		</p>
		<p class="new-desc"><?php the_author_meta('user_description'); ?></p>
	</div>
	<div class=new-authorArticle>
		<h4><a href="<?php the_permalink(); ?>" ><b><?php the_title(); ?></b></a></h4>
		<?php the_excerpt(); ?>
		<div style="white-space:nowrap;overflow:hidden;margin-top:5px;color:#999999;" >
			<?php the_time('Y-m-d'); ?>
			<?php the_tags('标签：',',',''); ?>
		</div>
	</div>
</div>
<?php endwhile;?><?php endif;wp_reset_query(); ?>
</ul>
		<ul align="center" style="padding:10px;font-size:13px;"><a href="<?php echo get_category_link(''. $tuijian .''); ?>">查看全部热门文章</a></ul>
</ul>

            <div id="new-hotArticles" class="new-hotArticles new-borderRadius new-marginTop">
                 <div id="new-left" class="new-hList current">
                     <h2 class="new-borderRadius">热门</h2>
                     <ul>
                         <?php if (have_posts()) : ?>
						<?php 
						// Create a new filtering function that will add our where clause to the query
						function filter_where( $where = '' ) {
							// posts in the last 30 days
							$where .= " AND post_date > '" . date('Y-m-d', strtotime('-360 days')) . "'";
							return $where;
						};
						$args=array(
							'orderby' => 'meta_value_num','meta_key'=> 'post_views_count','order' => 'DESC','showposts'=>'5','caller_get_posts' => 1
						);
						add_filter( 'posts_where', 'filter_where' );
						$my_query=new WP_Query(
							$args
						);
						remove_filter( 'posts_where', 'filter_where' );
						while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
						?>
                         <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
                         <?php endwhile;?><?php endif;wp_reset_query(); ?>
                 </ul>
                 </div>
                 <div id="new-right" class="new-hList">
                     <h2 class="new-borderRadius">近期</h2>
                     <ul>
                        <?php if (have_posts()) : ?>
						<?php 
						$args=array(
							'showposts'=>'5','caller_get_posts' => 1
						);
						$my_query=new WP_Query(
							$args
						); 
						while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
						?>
                         <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
                         <?php endwhile;?><?php endif;wp_reset_query(); ?>
                     </ul>
                     <span id="new-toggleButton" class="new-open"></span>
                 </div>
            </div>



<div class="clearfix" style="height:10px"></div>


	
     <div id="content-right">
          	<div class="side-box">

                                                                

            </div>                                                        

     </div>
  				
		<ul class="sidebar_list">
<div class="clearfix"></div>
<li id="linkcat-2" class="widget widget_links"><h3>合作伙伴</h3>
	<ul class='xoxo blogroll'>
<li><a href="#" target="_blank">新浪科技</a></li>
<li><a href="#" target="_blank">腾讯科技</a></li>
<li><a href="#" target="_blank">网易科技</a></li>
<li><a href="#" target="_blank">搜狐IT</a></li>
<li><a href="#" target="_blank">凤凰科技</a></li>
<li><a href="#" target="_blank">DoNews</a></li>
<li><a href="#" target="_blank">经理人分享</a></li>
<li><a href="#" target="_blank">创业家</a></li>
<li><a href="#" target="_blank">i天下网商</a></li>
<li><a href="#" target="_blank">鲜果网</a></li>
<li><a href="#" target="_blank">中国网科技</a></li>
<li><a href="#" target="_blank">站长之家</a></li>
<li><a href="#" target="_blank">和讯科技</a></li>
<li><a href="#" target="_blank">新华网科技</a></li>
<li><a href="#" target="_blank">电商行业网</a></li>
<li><a href="#" target="_blank">财新网</a></li>
<li><a href="#" target="_blank">网易云阅读</a></li>

	</ul>
</li>
		</ul><!-- sidebarlist end -->
</section><!-- sidebar end -->