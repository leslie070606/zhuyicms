$(function(){
	$("#phone").blur(function(){
		var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
		if(!myreg.test($("#phone").val())) 
		{ 
		    alert('请输入有效的手机号码！'); 
		    return false; 
		}else{
			alert("号码正确")
		}
	})
	$("#code").focus(function(){
		
	});
	
	var obj={};
	var html=$(".djser").html();
	 $(".djser").click(function(){
		if($(this).html()==html){
			 $(".djser").removeClass("active");
		 $(".djser").html("<a id='djtimer'>59</a>s后重新发送");
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

});

