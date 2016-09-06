$(function(){
//         tj_ajax(3,3003, user_id, "", "首页加载量");
         var user_id=$("#user_id").val();
         
        localStorage.setItem("user_id",user_id);
	$('.banner .bxslideraa').bxSlider({controls:false,auto:true, pause:4000,speed:600,mode:'fade'});
	$('.bxsliderbb').bxSlider({controls:false,auto:true, pause:5000,speed:600,mode:'fade'});
	var length=$(".pro_box .pro_here").length;
	if(length<3){
		$(".see_more").hide();
	}
	if(length==0){
		$(".production").hide();
		$(".use_zy").css("marginTop",".8rem")
	}
	var img_height=$(".pro_here_bcimg").height();
	touch.on(".pro_here_bcimg","tap",function(ev){
		$(ev.currentTarget).next(".video-js").get(0).play();
		$(".video-js").css("height",img_height);
	});
       
	
});
