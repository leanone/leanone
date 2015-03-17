    <footer id="footer" class="new-footer" >
        <div class="new-footer-nav new-center">
        	<div style="width:650px;float:left;">
        		<a href="#">关于我们</a>|
        		<a href="#">加入我们</a>|
        		<a href="#">联系我们</a>|
        		<a href="#">寻求报道</a>|
        		<a href="#">投稿通道</a>|
        		<a href="###">QQ: 1795413891</a>
        	

        <p class="new-copyright new-center" style="margin-left:5px;">
        	Copyright © 2011-2013 <a target="_blank" href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a>. All Rights Reserved. 京ICP备12345678号											
		</p>
        	</div>
         	<div style="float:left;padding-top:8px;">
						<a href="http://www.mao01.com/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/css/logo.png" alt="" title="猫猫建站" height="40" /></a>
	        </div>
        </div>
      
    </footer>

<script type="text/javascript">
/* <![CDATA[ */
jQuery(document).ready( function($) {
	$("ul.menu").not(":has(li)").closest('div').prev('h3.widget-title').hide();
});
/* ]]> */
</script>
	
<div id="shangxia">
	<div id="shang" title="返回顶部" ></div>
		<div id="xia" title="转到底部" ></div>
</div>

<script type="text/javascript">
$(".blog_loading").animate({width:"100%"},function(){
	setTimeout(function(){
		$(".blog_loading").fadeOut(800);
		},800);
	setTimeout(function() {
		$("#topnav li a").fadeIn("slow");
	},1300)
	setTimeout(function() {
		$("#topnav li a").css("display","block")
	},1300)
});
</script>
</body>
</html>