$(function () {
    img_height_auto();
    touch.on(".list_spa", "tap", function (ev) {
        var project_tags="";
        var get = $(ev.currentTarget).find("i");
        if (get.hasClass("icon-weixuanzhong")) {
            get.removeClass("icon-weixuanzhong").addClass("icon-xuanzhong");
        } else {
            get.addClass("icon-weixuanzhong").removeClass("icon-xuanzhong");
        };
        auto_click();
        $(".type_list .icon-xuanzhong").each(function(index){
            var length=$(".type_list .icon-xuanzhong").length;
            var text=$(this).parent().text();
            if(index>length-2){
                project_tags+=text;
            }else{
                project_tags+=text+"$";
            }
            
        })
        $("#project_tags").val(project_tags);
        
    });

     touch.on(".here_img_box li","tap",function(ev){
                        
                              if($(ev.currentTarget).hasClass("abc")||$(ev.currentTarget).hasClass("add_img")){
                                  if($(ev.currentTarget).hasClass("abc")){
                                   var _this=$(ev.currentTarget);
                                      var key=$(ev.currentTarget).attr("_v");
                                    var url=$(ev.currentTarget).attr("_durl");
                                    $.post(url,'key='+key,function(data){
                                       _this.remove();
                                       auto_click()
                                    });
                                }
                            }else{
                                    var ull=$(ev.currentTarget).parent("ul");
                                            $(ev.currentTarget).remove();
                                            var gettt="";
                                           
                                             $("#ula li").each(function(){
                                                if($(this).hasClass("add_img")||$(this).hasClass("abc")){

                                                }else{
                                                    var srcc=$(this).find("img").attr("src");
                                                    gettt+=srcc+",";
                                                }
                                            });
                                            ull.prev("input").val(gettt);
                                            //alert(ull.prev("input").val());
                                            auto_click();
                                            
                            }
                     });

    $(".dema_ipt,.text_box").blur(function () {
        auto_click();
    });
})
function img_height_auto() {
   
    var width = $(".here_img_box li img").width();
    $(".here_img_box li img").css("height", width);
    $(".add_img").css({"width": width, "height": width})

}
function auto_click() {
    var ipta = $(".dema_ipt").val();
    var imga = $("#ula li").length;
    var imgb = $("#ulb li").length;
    var checked = $(".type_list .icon-xuanzhong").length;
    var textea = $(".text_box").val();
    if (ipta == "" && textea == "" && imga == 1 && imgb == 1 && checked == 0) {
        $(".chose_btn").addClass("zhihui");
        $(".chose_btn").attr("disabled",true);
    } else {
        $(".chose_btn").removeClass("zhihui");
        $(".chose_btn").attr("disabled",false);
    }
}