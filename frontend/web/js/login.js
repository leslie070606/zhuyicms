$(function(){
    
        if($("#msg").val()!=""){
            var mes=$("#msg").val();
             $("#worry").show().html(mes);
        }
	var ipta,btn,iptb=false;
	var ico=true;
	$("#phone").blur(function(){
		var myreg = /^0?1[3|4|5|7|8][0-9]\d{8}$/;
		if(!myreg.test($("#phone").val())) 
		{ 
		    $("#worry").show().html("您输入的手机号有误，请重新输入");
		    ipta=false;
		}else{
			ipta=true;
			panduan();
			
		}
	}).focus(function(){
		$("#worry").hide();
	})
	$("#code").focus(function(){
			$(".btnn").addClass("btn_true");
			iptb=true;
			panduan();
	}).blur(function(){
		if($(this).val()==""){
			iptb=false;
		}
                panduan();
	});
	
	$(".login_ipt input").on("focus",function(){
		$(this).addClass("activeaa");
		$(".weixin_login").hide();
	})
	$(".login_ipt input").on("blur",function(){
		if($(this).val()==""){
			$(this).removeClass("activeaa");
		}
		$(".weixin_login").show();
	})
	touch.on(".login_talk","tap",function(ev){
		var icon=$(ev.currentTarget).find(".iconfont");
		if(icon.hasClass("icon-xuanzhong")){
			icon.addClass("icon-weixuanzhong").removeClass("icon-xuanzhong");
			ico=false;
			panduan();
		}else{
			icon.addClass("icon-xuanzhong").removeClass("icon-weixuanzhong");
			ico=true;
			panduan();
		}
	});
	
	var obj={};
	var html=$(".djser").html();
	 $(".djser").click(function(){
		if($(this).html()==html&&ipta){
                $(".djser").removeClass("active");
		 $(".djser").html("<a id='djtimer'>59</a>s后重新发送");
		 $("#code").attr("placeholder","验证码");
		 $(".login_title").html("已将验证码发送至此手机号码");
		 	btn=true;
		startMove();
			}
	});
	
	function startMove()//obj要让谁动
	{
	clearInterval(obj.timer);//关的是自己的定时器
	obj.timer=setInterval(function (){//开的也是自己的定时器
		
		
		if(parseInt($("#djtimer").html())<=0)
		{
			clearInterval(startMove);//关闭哪个定时器
			 $(".djser").addClass("active");
			  $(".djser").html(html);
			   $(".login_title").html("输入手机号码用于登录");
		}
		else
		{
			var trr=parseInt($("#djtimer").html());
			$("#djtimer").html(trr-1);
		}
	}, 1000)};
	
	function panduan(){
		if(ipta&&btn&&ico&&iptb){
			$(".btnn").addClass("btn_true");
			$(".btnn").removeAttr("disabled");
		}else{
			$(".btnn").removeClass("btn_true");
			$(".btnn").attr("disabled","disabled");
		}
	};

});
