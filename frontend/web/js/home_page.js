$(function(){
	touch.on(".sc_bot","tap",function(ev){
		console.log(ev.currentTarget)
		if($(this).hasClass("active")){
			$(this).html("收藏");
			$(this).removeClass("active");
		}else{
			$(this).html("已收藏");
			$(this).addClass("active");
		}
	});

})