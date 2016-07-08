$(function(){
	var ipta,btn,iptb=false;
	var ico=true;
	$("#phone").blur(function(){
		var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
		if(!myreg.test($("#phone").val())) 
		{ 
		    $("#worry").show();
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
		 $("#code").attr("placeholder","验证码")
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
		}else{
			$(".btnn").removeClass("btn_true");
		}
	};

});


