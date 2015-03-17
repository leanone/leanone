<div class="clear"></div>
<div id="footer">
  <?php if (get_option('strive_footnav') == 'Display') { ?>
  <div class="footnav container">
    <?php if(function_exists('wp_nav_menu')) {wp_nav_menu(array('theme_location'=>'footnav','menu_id'=>'footnav','container'=>'ul'));}?>
  </div>
  <?php } else {} ?>
  <?php if (get_option('strive_flinks') == 'Display') { ?>
  <?php wp_reset_query(); if ( is_home() ) { ?> 
  <div class="footnav container">
    <?php if(function_exists('wp_nav_menu')) {wp_nav_menu(array('theme_location'=>'friendlink','menu_id'=>'friendlink','container'=>'ul'));}?>
  </div>
  <?php } ?>
  <?php } else {} ?>
  <div class="copyright">
  <p> Copyright <?php echo comicpress_copyright();?> <a href="<?php bloginfo('siteurl');?>/"><strong>
    <?php bloginfo('name');?>
    </strong></a> Powered by <a href="http://www.2zzt.com/" rel="external">WordPress</a><br />
    <?php if (get_option('strive_beian') == 'Display') { ?>
    <a href="http://www.miitbeian.gov.cn/" rel="external"><?php echo stripslashes(get_option('strive_beianhao')); ?></a>
    <?php { echo '.'; } ?>
    <?php } else {} ?>
    <?php if (get_option('strive_tj') == 'Display') { ?>
    <?php echo stripslashes(get_option('strive_tjcode')); ?>
    <?php { echo ' '; } ?>
    <?php } else {} ?>
  </p>
  </div>
</div>
</div>
<!--gototop-->
<div id="tbox">
  <?php if( is_single() || is_page()){?>
  <a id="home" href="<?php bloginfo('siteurl');?>"></a>
  <?php } ?>
  <?php if( is_single() || is_page() && comments_open() ){ ?>
  <a id="pinglun" href="#comments_box"></a>
  <?php } ?>
  <a id="gotop" href="javascript:void(0)"></a> </div>
<?php if ( is_home() || is_category() || is_tag() || is_search() || is_author() ) {  ?>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/jquery.masonry.js"></script>
<?php } ?>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/loostrive.js"></script>
<?php if ( is_singular() ){?>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/comments-ajax.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/realgravatar.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/images/lightbox/pirobox.js"></script>
<?php } ?>
<?php wp_footer(); ?>
</body></html>