</div>

<footer class="site-footer with-top-line">
    <div class="footer-container clearfix">

        <ul class="social-icons">
            <li class="facebook"><a href="#facebook"><i class="fa fa-facebook"></i></a></li>
            <li class="twitter"><a href="#twitter"><i class="fa fa-twitter"></i></a></li>
            <li class="dribbble"><a href="#dribbble"><i class="fa fa-dribbble"></i></a></li>
            <li class="github"><a href="#github"><i class="fa fa-github"></i></a></li>
            <li class="skype"><a href="#skype"><i class="fa fa-skype"></i></a></li>
            <li class="stackoverfollow"><a href="#stackoverfollow"><i class="fa fa-stack-overflow"></i></a></li>
            <li class="linkedin"><a href="#yahoo"><i class="fa fa-linkedin"></i></a></li>
            <li class="googleplus"><a href="#googleplus"><i class="fa fa-google-plus"></i></a></li>
            <li class="mail"><a href="#mail"><i class="fa fa-envelope"></i></a></li>
            <li class="rss"><a href="#rss"><i class="fa fa-rss"></i></a></li>
        </ul>

        <div class="copy-right">
            <p>Copyright &copy 2014 <?php bloginfo(); ?> - Code by <a href="http://ironow.com">ironow!</a> </p>
        </div>

    </div>
</footer>

<script src="<?php bloginfo('template_directory');?>/js/jquery.flexslider-min.js"></script>
<script src="<?php bloginfo('template_directory');?>/js/jquery.fitvids.js"></script>
<script src="<?php bloginfo('template_directory');?>/js/scripts.js"></script>
<script>
$(document).ready(function(){
	var random_bg=Math.floor(Math.random()*6+1);
	var bg='url(<?php bloginfo('template_directory');?>/images/bg_'+random_bg+'.jpg)';
	$("body").css("background-image",bg);
});
</script>

<?php wp_footer();?>  

</body>
</html>