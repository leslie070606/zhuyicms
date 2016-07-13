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
	 touch.on(".add_img","tap",function(ev){
	 	var length=$(ev.currentTarget).siblings().length;
	 	if(length<10){
	 		var html='<li><img src="img/home_page/proc.jpg"> <i class="iconfont icon-shanchu1"></i></li>';
	 		$(ev.currentTarget).before(html);
	 		img_height_auto();
	 	}else{
	 		return false;
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
