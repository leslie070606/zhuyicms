$(function(){
	  img_height_auto();
	touch.on(".list_spa","tap",function(ev){
	 	var get=$(ev.currentTarget).find("i");
		 	if(get.hasClass("icon-weixuanzhong")){
	 		get.removeClass("icon-weixuanzhong").addClass("icon-xuanzhong");
	 	}else{
	 		get.addClass("icon-weixuanzhong").removeClass("icon-xuanzhong");
	 	};
	 });

	 $("body").on("click",".here_img_box li i",function(ev){
	 		$(this).parents("li").remove();
	 });
})
function img_height_auto(){
    var width=$(".here_img_box li img").width();
     $(".here_img_box li img").css("height",width);
     $(".add_img").css({"width":width,"height":width})
        
}
