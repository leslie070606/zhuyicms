$(function(){
	var widthaa = $(".here_img").width();
	$(".here_img,.pro_here").css("height", widthaa * .56);

	touch.on(".top_right","tap",function(ev){
		var right=parseInt($(".down_right").css("right"));
		if(right<0){
			$(".down_right_zd").show();
			$(".down_right").animate({right:'0rem'},300);
			$(".down_right_zd").animate({opacity:.5},200);
		}else {
			
			$(".down_right").animate({right:'-2.3rem'},300);
			$(".down_right_zd").animate({opacity:0},200,function(){
				$(".down_right_zd").hide();
			});
		}
		});
	touch.on(".down_right_zd","tap",function(){
		$(".down_right").animate({right:'-2.3rem'},300);
		$(".down_right_zd").animate({opacity:0},200,function(){
				$(".down_right_zd").hide();
			});
	});
//		var width=parseInt($("body").width())*90/165;
//		$(".pro_here").css("height",width);
//		$(window).resize(function(){
//			var width=parseInt($("body").width())*90/165;
//			$(".pro_here").css("height",width);
//		});
	//input 校验
	$(".dema_ipt").change(function(){
		if($(this).val()!=""){
			$(this).addClass("red_border");
		}else{
			$(this).removeClass("red_border");	
		}
	});
});
