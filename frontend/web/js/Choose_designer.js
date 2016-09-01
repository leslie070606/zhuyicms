$(function () {
    tj_ajax(3,3002, user_id, "", "匹配设计师列表页加载量");
    var nuber = 0;
//	$(document).on("click",".bot_input",function(ev){
    touch.on(".bot_input", "tap", function (ev) {
        var lengtha = $(".box_sjs li").length;
        var index = $(this).parents(".pro_here").index();
        var src = $(this).parents(".here_bottom").find(".here_head img").attr("src");

        if ($(this).hasClass('icon-weixuanzhong')) {
            if (lengtha < 3) {
                $(this).addClass("icon-xuanzhong").removeClass('icon-weixuanzhong');
                var lii = "<li id='li_" + index + "'><img src=" + src + " /><i class='iconfont icon-shanchu shanchu'></i></li>";
                $(".box_sjs").append(lii);
                $(".navv_tj").removeClass("zhihui");
                touch.on(".box_sjs li", "tap", function (ev) {
                    
                    var id = $(ev.currentTarget).attr("id");
                   
                    var last =parseInt(id.substr(id.length-1));
                    $(".designer_box .pro_here:eq(" + last + ")").find(".input_box").addClass("icon-weixuanzhong").removeClass("icon-xuanzhong");
                    $(ev.currentTarget).remove();
                    var lenfth = $(".box_sjs li").length;
                    if (lenfth == 0) {
                        $("#htmll").text("没有发现喜欢的设计师，请住艺为我甄选");
                    }
                    if ($(".bot_navv .rg_pp .iconfont").hasClass("icon-weixuanzhong") && $(".box_sjs li").length == 0) {
                        $(".navv_tj").addClass("zhihui");
                    }
                })
            } else {
                $("#bot_outline,.down_right_zd").show();
                $(".down_right_zd").animate({opacity: .5}, 200);
                touch.on("#bot_outline .out_true_bott", "tap", function () {
                    $("#bot_outline").hide();
                    $(".down_right_zd").animate({opacity: 0}, 200, function () {
                        $(".down_right_zd").hide();
                    });
                })
            }
        } else {
            $(this).addClass("icon-weixuanzhong").removeClass('icon-xuanzhong');
            $("#li_" + index).remove();
            if ($(".bot_navv .rg_pp .iconfont").hasClass("icon-weixuanzhong") && $(".box_sjs li").length == 0) {
                $(".navv_tj").addClass("zhihui");
            }
        }
        ;


        var length = $(".designer_box .icon-xuanzhong").length;
        if (length > 0) {
            $("#htmll").text("人工匹配");
            $(".navv_tj").removeClass("zhihui");
        } else {
            $("#htmll").text("没有发现喜欢的设计师，请住艺为我甄选");
        }
        ;
    });

   
    touch.on(".rg_pp", "tap", function (ev) {
        
        if ($(ev.currentTarget).find(".iconfont").hasClass("icon-xuanzhong")) {
            $(ev.currentTarget).find(".iconfont").addClass("icon-weixuanzhong").removeClass("icon-xuanzhong");
            if ($(".bot_navv .rg_pp .iconfont").hasClass("icon-weixuanzhong") && $(".box_sjs li").length == 0) {
                $(".navv_tj").addClass("zhihui");
            }
        } else {
            tj_ajax(2,2003, user_id, "", "人工匹配按钮");
            $(ev.currentTarget).find(".iconfont").addClass("icon-xuanzhong").removeClass("icon-weixuanzhong");
            $(".navv_tj").removeClass("zhihui");
            
        }
    });
    touch.on(".navv_tj", "tap", function (ev) {
        if ($(".bot_navv .rg_pp .iconfont").hasClass("icon-weixuanzhong") && $(".box_sjs li").length == 0) {
            $(".navv_tj").addClass("zhihui");
        }
    })

    touch.on(".click_more", "tap", function (ev) {

        if (nuber == 0) {
            setTimeout(function () {
                $(".designer_box>.pro_here:eq(3),.designer_box>.pro_here:eq(4),.designer_box>.pro_here:eq(5)").show();
                nuber++;
                var top = $("#topa").offset().top;
                $(window).scrollTop(top)
            }, 300)

        } else {
            setTimeout(function () {
                $(".designer_box>.pro_here").show();

                $(".click_more").html("更多设计师,住艺会帮您人工甄选")
                var top = $("#topb").offset().top;
                $(window).scrollTop(top);
            }, 300)
        }
    })


});
