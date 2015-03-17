var nowKvID=0, pageWidth=0,pageHeight=0,isKvMoving=false
var timer
var toRF=false

$(window).resize(function(){
	
	iniPage()
	$(".kvBox #kv").css({"top":-nowKvID*pageHeight})
	if(toRF){
	$(".iBox").css({"top":-pageHeight})
	}

})

$(function() {
  //自适应
 iniPage()
 $(".main").hide()
	

	
	
	$('.m_nav li').click( function (){
		var j=$(this).index();
		for(i=0;i<2;i++){
			if(i==j){
				$('.m_nav li').eq(i).addClass("on")
				$(".box_"+(i+1)).show()	
			}else{
				$(".box_"+(i+1)).hide()	
				$('.m_nav li').eq(i).removeClass("on")
			}
		}
			
	})
	
		
	
});
var utm_source
function reloadMethod(){
	alert("reloadMethod")	
}


$(function() {
  //自适应

	utm_source=request("utm_source")
	utm_content=request("utm_content")

	getCid()  //cookie用户ID

	var data={}
	var isSubmit=false

	$(".djBox .subBtn").click(function(){
		if(isSubmit){alert("你已提交过了，亲~");return;}
		data={}
		data.cid=Cid
		data.id=Math.floor($("input[name=ID]").val())
		data.utm_source=utm_source
		data.utm_content=decodeURI(utm_content)
		
		data.realname=$("input[name=realname]").val()
		data.weichat=$("input[name=weichat]").val()
		data.isquan=$("input[name=isquan]:checked").val()
		data.rnum=$("input[name=rnum]").val()
		data.subject=$("input[name=subject]").val()
		data.tel=$("input[name=tel]").val()
		
		if(data.realname=="" || data.weichat=="" || data.isquan=="" || data.rnum=="" || data.subject=="" || data.tel==""){
			alert("请填写全部信息哦，亲~")
			return;
		}
		//电话监测
		
		if(!isPhoneOrMobile(data.tel)){
			alert("亲，你的联系电话有误~，请留下手机号或者座机号呗~");	
			$("input[name=tel]").focus()
			return;
		}
		data.email=$("input[name=email]").val()
		//邮箱监测
		if(!isEmail(data.email)){
			alert("亲，您的邮箱格式有误~");	
			$("input[name=email]").focus()
			return;
		}
	
		$.get(baseUrl+"project/addSave",data,function(d){
			if(d.flag){
				
				if(confirm("信息提交成功，等待我们的联系吧，亲")	){
					location.href="http://leanone.cn/wp/"
				}
			}
		},"jsonp")
		isSubmit=true
	})
	var err=false
	var isRegClick=false
	$(".reg .subBtn").click(function(){
		if(isRegClick){
			
			
			return;	
		}
		checkI=[".reg input[name=username]",".reg input[name=userpass]",".reg input[name=reuserpass]"]
		uname=$(checkI[0]).val()
		upass=$(checkI[1]).val()
		reupass=$(checkI[2]).val()
		err=false
		checkUname(uname)
		
		if(upass==""){
			$(checkI[1]).parent().addClass("err")
			$(checkI[1]).next("p").html("密码不能为空")
			err=true
		}
		if(upass.length<6||upass.length>18){
			$(checkI[1]).parent().addClass("err")
			$(checkI[1]).next("p").html("密码格式不正确")
			err=true
		}else{
			$(checkI[1]).parent().removeClass("err")
		}
		
		if(upass!="" && reupass!=upass){
			$(checkI[2]).parent().addClass("err")
			err=true
		}else{
			$(checkI[2]).parent().removeClass("err")	
		}
		if(err){return;}
		data={}
		data.uname=uname
		data.upass=upass
		data.utm_source=utm_source
		data.utm_content=decodeURI(utm_content)
		if(uname!="" && upass!=""){
			$.get(baseUrl+"user/regSave?t"+Math.random(),data,function(d){
				if(d.flag){
					alert("注册成功，赶紧去提交画布吧")
					location.href=baseUrl+"huabu/add"
				}else{
					alert(d.msg)
				}
			},"jsonp")	

		}
		isRegClick=true;
		setTimeout(function(){
			isRegClick=false;	
		},5000)
		
		
	})
	
	$(".login .subBtn").click(function(){
		
		checkI=[".login input[name=username]",".login input[name=userpass]"]
		uname=$(checkI[0]).val()
		upass=$(checkI[1]).val()
		isauto=$("input[name=auto]").is(":checked")
		
		
		if(uname==""){
			$(checkI[0]).parent().addClass("err")
			$(checkI[0]).next("p").html("用户名不能为空")
		}
		if(upass==""){
			$(checkI[1]).parent().addClass("err")
			$(checkI[1]).next("p").html("密码不能为空")
		}
	
		if(uname!="" && upass!=""){
		
			$.get(baseUrl+"user/getLogin",{"uname":uname,"upass":upass,"auto":isauto},function(d){
				 if(d.flag){
					 $(".navB  .fr").addClass("logined")
					 $(".navB  .fr").html("<a>欢迎您,"+uname+"</a> <a href='"+baseUrl+"huabu/my')\">我的画布</a><a href='"+baseUrl+"user/logout'>注销</a>")
					 //a href='{$base_url}project/my'>我的项目</a ><a href="{$base_url}huabu/my">我的画布</a><a href="{$base_url}user/logout
					 location.href=baseUrl+"huabu/my"
					// $(".regL").hide()
					// $(".regE").show()
				 }else{
					alert(d.msg)	 
				 }
			},"jsonp")	
		}
		
	})
	t=$(document).height()*0.5-230
	l=$(document).width()*0.5-360
	$(".san .qq").click(function(){
		
		window.open (baseUrl+'user/qqLogin','newwindow','height=460,width=720,top='+t+',left='+l+',toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no') 
	})  
    $(".san .sina").click(function(){
		window.open (baseUrl+'user/weiboLogin','newwindow','height=460,width=720,top='+t+',left='+l+',toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no') 
	})    
		
	
});
function checkUname(v){
	
	userInput=".reg input[name=username]"
	if(v==""){
		$(userInput).parent().addClass("err")
		$(userInput).next("p").html("用户名不能为空")
		err=true
	}else if(!isMobile(v) && !isEmail(v) && !isQQ(v)){
		
	    $(userInput).parent().addClass("err")
		$(userInput).next("p").html("用户名格式不正确，手机号或者邮箱哦")
		err=true
	}else{
		$.get(baseUrl+"user/checkUname",{uanme:v},function(d){
			if(d.flag){
				$(userInput).parent().addClass("err")
				$(userInput).next("p").html("该用户名已被注册")
				err=true
			}else{
				$(userInput).parent().removeClass("err")
			}
		},"jsonp")
	}
	
}


var nowPageID=1
function goPage(){
	if(nowPageID==2){return;}
	$(".main").show()
	toRF=true
	$(".iBox").animate({"top":-pageHeight},500,function(){
		$(".kvBox ul").hide()
		
	})	
	$(".navB").css({"top":-80}).show().delay(400).animate({"top":0},500,function(){
		$("body,html").css({"overflow-y":"auto"})
		$(".navB").css({"position":"fixed"})
	})
	nowPageID=2
}
function iniPage(){
	pageWidth=$(window).width()
	pageHeight=$(window).height()
	
	$(".kv,.kvBox,.iBox").css({"width":pageWidth,"height":pageHeight})
	

	bl=Math.floor(100*$(window).height()/1080)/100

	sl=(2560*bl-$(window).width())*0.5
	$(".kv1 .btn").css({"width":450*bl,"height":120*bl,"position":"absolute","top":420*bl,"left":600*bl-sl})
	$(".kv2 .btn").css({"width":450*bl,"height":120*bl,"position":"absolute","top":540*bl,"left":950*bl-sl})
	
	$(".kv3 .btn").css({"width":450*bl,"height":120*bl,"position":"absolute","top":450*bl,"left":1500*bl-sl})
	$(".kv4 .btn").css({"width":450*bl,"height":120*bl,"position":"absolute","top":420*bl,"left":600*bl-sl})
	$(".kv5 .btn").css({"width":450*bl,"height":120*bl,"position":"absolute","top":460*bl,"left":600*bl-sl})	
	$(".kv7 .btn").css({"width":450*bl,"height":120*bl,"position":"absolute","top":360*bl,"left":650*bl-sl})
	$(".kv6 .btn").css({"width":450*bl,"height":120*bl,"position":"absolute","top":500*bl,"left":600*bl-sl})
	
	
}
function iniKv(id){
    
	 kvLen=$(".bir ul li").length
	 if(id<0){id=0}
	 if(id>kvLen-1){id=kvLen-1;}
	// if(id==nowKvID){return;}
	
	 for(i=0;i<kvLen;i++){
		 if(i==id){
			  $(".bir a").eq(i).addClass("pp")
		 }else{
			  $(".bir a").eq(i).removeClass("pp")
		 }
	 }
	 $(".kvBox ul").animate({"top":-id*pageHeight},600,function(){
		// isKvMoving=false
	 })
	 
	 nowKvID=id
	 
}

function reg(){
	$(".djBox").hide()
	$(".reg").show()
	$(".login").hide()
	$(".regL").show()
	$(".san .toLogin").show()
	$(".san .toReg").hide()
	goPage()
}
function login(){
	$(".djBox").hide()
	$(".reg").hide()
	$(".login").show()
	$(".regL").show()
	$(".san .toLogin").hide()
	$(".san .toReg").show()
	goPage()
}

function logout(){
	  $.get(baseUrl+"user/logOut",{"utm_source":utm_source},function(d){
		  Cid=d.cid
		
	  },"jsonp")
}
