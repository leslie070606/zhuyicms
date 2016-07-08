$(function(){
	touch.on(".top_right","tap",function(ev){
		var right=parseInt($(".down_right").css("right"));
		if(right<0){
			$(".down_right").animate({right:'0rem'},300);
		}else {
			$(".down_right").animate({right:'-3rem'},300);
		}
		});
		
		var width=parseInt($(window).width())*90/165;
		$(".pro_here").css("height",width);
	
});