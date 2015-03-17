
jQuery(document).ready(function() {

// 多级导航菜单一
$("#topnav ul").css({display: "none"}); // Opera Fix
$("#topnav li").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(400);
		},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
		});

// 多级导航菜单二
$("#topnav2 ul").css({display: "none"}); // Opera Fix
$("#topnav2 li").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(400);
		},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
		});

//搜索按钮
$('.search_icon').hover(function () { 
	$(this).addClass('hover_icon');
	}
);

$('.search_icon').toggle(function () {
		$('#topsearch').fadeIn('slow');
	}, function () {
		$('#topsearch').fadeOut('slow',function(){
			setTimeout(function() {
			$('.search_icon').removeClass('hover_icon')
			},800)
		});
	}
);

//登录框
$('#topnv_extend_log').toggle(function (){ 
	$('#top_login_gui').fadeIn('slow');
	}, 
	function () { 
	$('#top_login_gui').fadeOut('slow');
	} 
);
//头部小贴标
			$('.header_fd').hover(function() {
				if (window.willhide) clearTimeout(window.willhide);
				$('.header_sticker_panel').fadeIn()
			},function() {
				window.willhide = setTimeout(function() {
					$('.header_sticker_panel').fadeOut()
				},1000)
			});

	
	

	//头部小贴标
	
	/****
	$('.header_fd').mouseover(function() {
		if (window.header_fd_willhide) clearTimeout(window.header_fd_willhide);
		$('.header_sticker_panel').fadeIn()
	});
	$('.header_fd').mouseout(function() {
		window.header_fd_willhide = setTimeout(function() {
			$('.header_sticker_panel').fadeOut()
		},1000)
	});
***/

//社交按钮 
$('.icon1,.icon2,.icon3,.icon4,.icon5,.tqq_share,.sina_share,.xiaonei_share,.qqzone_share,').wrapInner('<span class="hover"></span>').css('textIndent','0').each(function () {
	$('span.hover').css('opacity', 0).hover(function () {
		$(this).stop().fadeTo(300, 1);
	}, function () {
		$(this).stop().fadeTo(300, 0);
	});
});

// 滚屏
$('#shang').click(function(){$('html,body').animate({scrollTop: '0px'}, 800);}); 
$('#comt').click(function(){$('html,body').animate({scrollTop:$('#commentpost').offset().top}, 800);});
$('#xia').click(function(){$('html,body').animate({scrollTop:$('#footer').offset().top}, 800);});

//加载中提示
//$('h2 a').click(function(){
//$(this).html('正在给力加载中...');
//window.location = $(this).attr('href');
//});

/*控制文章中贴图大小*/
/*
$("#post_meta img").css({
    height: ""
}).removeAttr("width").removeAttr("height").each(
function() {
    var $this = $(this).width();
    var maXimg = 590;
    if ($this > maXimg) {
        $this = maXimg
    };
    $(this).width($this);
}); */

// 控制贴图大小
$(".comment-body img").css({
    height: ""
}).removeAttr("width").removeAttr("height").each(
function() {
    var $this = $(this).width();
    var maXimg = 220;
    if ($this > maXimg) {
        $this = maXimg
    };
    $(this).width($this);
});

// 鼠标滑动文字大小提示渐隐渐显效果
$('#post_meta').mouseover(function() {
    if (window.willhide) clearTimeout(window.willhide);
    $('.text_size').fadeIn("normal")
});
$('#post_meta').mouseout(function() {
    window.willhide = setTimeout(function() {
        $('.text_size').fadeOut("normal")
    },
    100)
});

// 字体调整
$(".text_small").click(function(){
	$(".post_content").css("font-size","12px");
	$(".post_content").css("line-height","22px");
});
$(".text_middle").click(function(){
	$(".post_content").css("font-size","13px");
	$(".post_content").css("line-height","22px");
});
$(".text_large").click(function(){
	$(".post_content").css("font-size","16px");
	$(".post_content").css("line-height","26px");
});


// @reply js by zwwooooo 
$('.reply').click(function() {
	var atid = '"#' + $(this).parent().attr("id") + '"';
	var atname = $(this).prevAll().find('cite:first').text();
	$("#comment").attr("value","@" + atname + " ").focus();
});
	$('.cancel-comment-reply a').click(function() {	//点击取消回复评论清空评论框的内容
	$("#comment").attr("value",'');
});

});


//加入收藏夹  
function addFav() {
             if  (document.all) {
                window.external.addFavorite('http://www.qintag.com', '秦唐网');
            }
             else   if  (window.sidebar) {
            window.sidebar.addPanel('秦唐网', 'http://www.qintag.com',  "" );
            }
        }

// 公告滚动		
function AutoScroll(obj){ 
$(obj).find("ul:first").animate({ 
marginTop:"-20px" 
},500,function(){ 
$(this).css({marginTop:"0px"}).find("li:first").appendTo(this); 
}); 
} 
$(document).ready(function(){ 
setInterval('AutoScroll("#scrollDiv_notice,#sidebar_Microblog")',5000) 
}); 



// 链接复制
function copy_code(text) {
  if (window.clipboardData) {
    window.clipboardData.setData("Text", text)
	alert("已经成功将原文链接复制到剪贴板！");
  } else {
	var x=prompt('你的浏览器可能不能正常复制\n请您手动进行：',text);
  }
}


// 评论贴图
function embedImage() {
  var URL = prompt('请输入图片 URL 地址:', 'http://');
  if (URL) {
		document.getElementById('comment').value = document.getElementById('comment').value + '[img]' + URL + '[/img]';
  }
}

//双击滚屏

/*
var currentpos,timer; 
function initialize() 
{ 
timer=setInterval("scrollwindow()",20); 
} 
function sc(){ 
clearInterval(timer); 
} 
function scrollwindow() 
{ 
window.scrollBy(0,1); 
} 
document.onmousedown=sc 
document.ondblclick=initialize
*/

