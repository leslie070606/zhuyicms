$(function(){
		
	var gettt=0;
	touch.on("#check","tap",function(ev){
		if(gettt==0){
			$(".charges_zd").show();
			$(".check_charges").animate({bottom:0},300);
			$(".charges_zd").animate({opacity:.4},300);
			$("body,html").css("overflow","hidden");
			gettt++;
		}else{
			
			$(".check_charges").animate({bottom:'-8rem'},300);
			$(".charges_zd").animate({opacity:0},300,function(){
				$(".charges_zd").hide();
			});
			$("body,html").css("overflow","auto");
			gettt--;
		}
	});
	touch.on(".charges_zd","tap",function(){
		$(".check_charges").animate({bottom:'-8rem'},300);
			$(".charges_zd").animate({opacity:0},300,function(){
				$(".charges_zd").hide();
			});
			$("body,html").css("overflow","auto");
			gettt--;
	})
	
var img_height=$(".pro_here_bcimg").height();
	touch.on(".pro_here_bcimg","tap",function(ev){
		$(this).next(".video-js").get(0).play();
		$(".video-js").css("height",img_height);
	});

})
