$(function(){
	  img_height_auto();
	touch.on(".list_spa","tap",function(ev){
	 	var get=$(ev.currentTarget).find("i");
		 	if(get.hasClass("icon-weixuanzhong")){
	 		get.removeClass("icon-weixuanzhong").addClass("icon-xuanzhong");
	 	}else{
	 		get.addClass("icon-weixuanzhong").removeClass("icon-xuanzhong");
	 	};
                auto_click();
	 });

	 $("body").on("click",".here_img_box li",function(ev){
	 		$(ev.currentTarget).remove();
                        auto_click();
	 });
         
         $(".dema_ipt,.text_box").blur(function(){
		auto_click();
	});
})
function img_height_auto(){
    var width=$(".here_img_box li img").width();
     $(".here_img_box li img").css("height",width);
     $(".add_img").css({"width":width,"height":width})
        
}
function auto_click(){
	var ipta=$(".dema_ipt").val();
	var imga=$("#ula li").length;
	var imgb=$("#ulb li").length;
	var checked=$(".type_list .icon-xuanzhong").length;
	var textea=$(".text_box").val();
	if(ipta==""&&textea==""&&imga==1&&imgb==1&&checked==0){
		$(".chose_btn").addClass("zhihui");
	}else{
		$(".chose_btn").removeClass("zhihui");
	}
}