$(function(){
	
	touch.on(".his_ul li","tap",function(){
		$(this).addClass("active").siblings().removeClass("active");	
	})
});
