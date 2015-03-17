function tab(n){var tabnav="tab"+n;var tabid="tabid"+n;cleardisplay();document.getElementById(tabid).style.display="block";}
function cleardisplay(){for(i=1;i<6;i++)
{var cleartabid="tabid"+i;document.getElementById(cleartabid).style.display="none";}};$(document).ready(function(){$("ul.prosc li:first-child").addClass("current");$("ul.prosc li").click(function(){var c=$("ul.prosc li");var index=c.index(this);var p=idNumber("No");show(c,index,p);});function show(controlMenu,num,prefix){var content=prefix+num;$('#'+content).siblings().hide();$('#'+content).show();controlMenu.eq(num).addClass("current").siblings().removeClass("current");};function idNumber(prefix){var idNum=prefix;return idNum;};});

jQuery(document).ready(function(){
	$('ul.com_List li:nth-child(1)').css('display','block');
	$('ul.com_List li:nth-child(2)').css('display','block');
	$('ul.com_List li:nth-child(3)').css('display','block');
});

jQuery(document).ready(function(){
			$(".prosc").click(function(){
				var prosboh = $('#pro_show').height();
				$('#pro_show').css({'height':prosboh,'overflow':'visible'});
				$(".prosb1").css('display','none');
			});
			$(".prosb1").hover(function(){
				var prosboh = $('#pro_show').height();
				$('#pro_show').css({'height':prosboh,'overflow':'visible'});
			});
});
          
jQuery(document).ready(function(){
	jQuery(".postfm").hover(function(){    	
        $(".posttitle",this).css('display','block');
    }, function(){    
        $(".posttitle",this).css('display','none');
    });   
    jQuery(".two_code").hover(function(){    	
        $("#weixin").css('display','block');
    }, function(){    
        $("#weixin").css('display','none');
    });
    $("#nav a").attr('target','_self');
    $("#pager a").attr('target','_self');
    $("#pager a").attr('rel','nofollow');
});

$(function() {          
          $("img").lazyload({
              event : "sporty"
          });
      });
      $(window).bind("load", function() { 
          var timeout = setTimeout(function() { $("img").trigger("sporty"); }, 5000);
      });