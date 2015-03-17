<?php get_header(); ?>
<section class="new-contentBox new-center">

	<div id="breadcrumbs">
		<span style="display:inline; float:left;">
			当前位置&nbsp;:&nbsp;<a href="<?php bloginfo('url'); ?>" title="首页">首页</a>&nbsp;
		</span>
		<span style="display:inline; float:right;">
			热门：<?php echo get_option('mao10_hottags'); ?>

		</span>
	<div class="clearfix"></div>
	</div>

<script type="text/javascript">
$(".blog_loading").animate({width:"5%"})
</script>	
	
    <section class="new-leftBox">
    	<STYLE>
h1 {
  display:block;
	width:604px;
	height:auto;
	overflow:hidden;
	margin-bottom:10px;
	font-size:22px;
	color:#636f76;
}

.zy {
    color: #999;
    font-size:12px;
    line-height:150%;
    margin-bottom:10px;
    float:left;   
}
.top-info{
	float:right;
	padding-top:5px;
	}
.top-info a{
	color:#308ddb;
	}
.rec {
	width: 604px;
}
.QQnav {
	WIDTH: 100%;
	LINE-HEIGHT: 28px;
	HEIGHT: 28px;
	text-align: center
}
.QQnav H2 {
	FONT-SIZE: 13px;
	font-weight:none;
	TEXT-INDENT: 17px;
	FLOAT: left;
	margin-top: 0;
}
.QQnavbar {
	OVERFLOW: hidden;
	WIDTH: 30px;
	margin: 0 auto;
	ZOOM: 1;
	HEIGHT: 22px;
	_display: inline
}
.QQnavbar LI {
	list-style: none;
	MARGIN-TOP: 5px;
	FLOAT: left;
	MARGIN-LEFT: 3px;
	WIDTH: 6px;
	CURSOR: pointer;
	HEIGHT: 6px;
	_display: inline
}
.QQnavbar LI.active {

}
.QQbed {
	PADDING-BOTTOM: 0px;
	WIDTH: 604px;
	PADDING-TOP: 5px
}
.QQbed LI {
	FLOAT: left;
	WIDTH: 190px;
	position: relative;
	padding: 0 10px
}

#QQMarquee {
	OVERFLOW: hidden;
	WIDTH: 604px;	
	ZOOM: 1;
	HEIGHT:auto;
	POSITION: relative;
	margin: 0 auto;
}
#QQMarqueeCoutent li img {width: 190px; height: 100px;}
/*** #QQMarqueeCoutent a span { position: absolute; bottom:0; left:10px; width:180px;  padding:2px 5px;    font-size:12px;     line-height:18px; overflow:hidden; color: #FFF;     text-align:left;    background-color:#000;  background-color:rgba(0,0,0,0.5); *background-color:#000;filter:Alpha(opacity=60);    }
**/
#QQMarqueeCoutent a span {
	float:left;
	width:180px;
	height:40px;
	overflow:hidden;
	font-size:13px;
	font-weight:bold;
	line-height:18px;
	margin-top:5px;
	}
.pl{
	margin:0px 0px;
	text-align:right;
	font-size:12px;
	color:#999;
	position:relative;
  left:0px;
  top:25px;
  height:0px;
	}
</STYLE>


	<div class="new-headline new-borderRadius">
	  <ul>
	    	<?php if (have_posts()) : ?>
						<?php 
						$toutiao = get_option( 'mao10_toutiao');
						$args=array(
							'showposts'=>'1','cat'=>''. $toutiao .'','caller_get_posts' => 1
						);
						$my_query=new WP_Query(
							$args
						); 
						while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
						?>
						<?php $fmimg = get_post_meta($post->ID, "fmimg_value", true); ?>
	    	<li>
	    	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	    	<?php the_excerpt(); ?>
				<a class="headlineImg" href="<?php the_permalink(); ?>" ><?php if($fmimg) { ?><img align="center" alt="<?php the_title(); ?>" src="<?php echo $fmimg; ?>" /><?php } else { ?><img align="center" alt="<?php the_title(); ?>" src="<?php echo catch_that_image(); ?>" /><?php } ?></a>
	
	      <div class="new-info">
          		    		<span>评论: （<a href="<?php the_permalink(); ?>#comments" ><?php comments_number('0', '1', '%' );?></a>）
	    		</span> &nbsp;<span><?php the_time('Y年m月d日H:i'); ?></span>
	    		 &nbsp;<span><a href="<?php echo get_category_link(''. $toutiao .''); ?>"><b>【往日头条】</b></a></a></span>
	    	</div>
	    
	    	</li>
	    	<?php endwhile;?><?php endif; ?>
	  </ul>
	</div>


<div class="new-topNews new-borderRadius" style="padding-left:10px;padding-right:33px;height:auto;">
	<div class=rec>
		<DIV class="QQbed">
			  <div id="QQMarquee">
			    <uL id="QQMarqueeCoutent">
			      			     	<?php if (have_posts()) : ?>
						<?php 
						$toutiao = get_option( 'mao10_toutiao');
						$args=array(
							'showposts'=>'9','offset' => 1, 'cat'=>''. $toutiao .'','caller_get_posts' => 1
						);
						$my_query=new WP_Query(
							$args
						); 
						while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
						?>
						<?php $fmimg = get_post_meta($post->ID, "fmimg_value", true); ?>
			      			     	<li><a href="<?php the_permalink(); ?>"><?php if($fmimg) { ?><img align="center" alt="<?php the_title(); ?>" src="<?php echo $fmimg; ?>" /><?php } else { ?><img align="center" alt="<?php the_title(); ?>" src="<?php echo catch_that_image(); ?>" /><?php } ?><span><?php the_title(); ?></span></a></li>
			      			     	<?php endwhile;?><?php endif; ?>
			      			    </ul>
			  </div>
		</div>
			<DIV class="QQnav">
			  <DIV class="QQnavbar">
			    <UL id="QQTab">
			      <li class="active"></li>
			      <li></li>
			      <li></li>
			    </UL>
			  </DIV>
			</DIV>		
	</div>
</div>
	


<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/nivo-slider/MSClass.js"></script> 
<script type="text/javascript">
var QQMarqueeControl=new Marquee(["QQMarquee","QQMarqueeCoutent","QQTab","onclick"],2,0.5,630,150,20,5000,5000)
</script>		
  					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  					<?php $fmimg = get_post_meta($post->ID, "fmimg_value", true); ?>
  					<div class="new-articleItem new-borderRadius"> 
					
					<div id="post_meta_c" class="new-thumb">
				 	<div class="intro" style="width:206px;padding:0px;margin:0px;">
				 		<div class="thumb">
<a href="<?php the_permalink(); ?>" target="_blank" rel="bookmark" title="<?php the_title(); ?>"><?php if($fmimg) { ?><img class="alignleft" alt="<?php the_title(); ?>" src="<?php echo $fmimg; ?>" /><?php } else { ?><img class="alignleft" alt="<?php the_title(); ?>" src="<?php echo catch_that_image(); ?>" /><?php } ?></a>
</div><!-- 给首页每个文章增加一个随机图 -->
					</div>
					</div>
					
					<div class="new-intro">
						<!-- 标题   -->
								
						<h3><a href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>			
							<p>
								<p class="new-info">
								<?php the_tags('<span>标签:&nbsp;',', ','</span>'); ?>
								<span><?php the_time('Y/m/d H:i'); ?></span> <span></span></p>
							</p>					
							
							<?php the_excerpt(); ?>
					
											<p class="new-readmore">
								<span>
									作者: <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a>
								</span>&nbsp;					
								<span>评论数:<a href="<?php the_permalink(); ?>#respond" title="《<?php the_title(); ?>》上的评论"><?php comments_number('0', '1', '%' );?></a>条</span>
															</p>
						
					</div>				
					<div class="clearfix"></div>
				</div><!-- post_meta_c end -->
			    <?php endwhile;?><?php endif; ?>
								
			<!-- post entry end -->

			<div class="clearfix"></div>
	    			<div class="pagenavi_badoo">
<?php par_pagenavi(9);  ?> <div class="clearfix"></div>
</div>	    
		</section>

<script type="text/javascript">
$(".blog_loading").animate({width:"45%"})
</script>

<?php get_sidebar(); ?>

<script type="text/javascript">
$(".blog_loading").animate({width:"85%"})
</script></section>

<div class="clearfix" style="height:10px;"></div>

</div><!-- container end -->

<?php get_footer(); ?>