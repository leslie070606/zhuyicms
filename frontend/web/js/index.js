$(function(){
	$('.bxslider').bxSlider({controls:false,auto:true, pause:4000,speed:600,mode:'fade'});

	touch.on(".pro_here_bcimg","tap",function(ev){
		$(this).next(".video-js").get(0).play();
		
	});
});
