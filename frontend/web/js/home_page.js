$(function () {

    function getUrlParam(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);  //匹配目标参数
        if (r != null)
            return unescape(r[2]);
        return null; //返回参数值
    }

    var collect_status = getUrlParam("collect_status");
    designer_id = getUrlParam("params");
    tj_ajax(4, 4002, user_id, designer_id, "设计师被浏览");
    if (collect_status == 1) {
        $(".sc_bot a").addClass("active").html("已收藏");
    }
    var length = $("#art_len").val();
    if (length <= 3) {
        $(".see_more").hide();
    }
    var all_type = $("#topb").attr("all_type");
    all_type = all_type.split(",");
    for (var b = 0; b < all_type.length; b++) {
        if (all_type[b] == 1) {
            $("#topb>span:eq(" + b + ")").show();
        } else {
            $("#topb>span:eq(" + b + ")").hide();
        }
    }
    ;
    touch.on(".botb", "tap", function (ev) {
        if ($("#bot_outline").css("display") == "none") {
            tj_ajax(2, 2005, user_id, designer_id, "立即约见");
            $(".down_right_zd").show().animate({opacity: .5}, 300).css("z-index", 100110);
            $("#bot_outline").show();

        }
    });


    var gettt = 0;
    touch.on("#check", "tap", function (ev) {
        if (gettt == 0) {

            $(".charges_zd").show();
            $(".check_charges").animate({bottom: 0}, 300);
            $(".charges_zd").animate({opacity: .4}, 300, function () {
                $(".page_bottom").css("z-index", 100000);
                $(".charges_zd").css("z-index", 99998);
            });
            $("body,html").css("overflow", "hidden");
            gettt++;

        } else {

            $(".check_charges").animate({bottom: '-8rem'}, 300);
            $(".charges_zd").animate({opacity: 0}, 300, function () {
                $(".charges_zd").hide();
                $(".page_bottom").css("z-index", 99990);
                $(".charges_zd").css("z-index", 99988);
            });
            $("body,html").css("overflow", "auto");
            gettt--;

        }
    });
    touch.on(".charges_zd", "tap", function () {
        $(".check_charges").animate({bottom: '-8rem'}, 300);
        $(".charges_zd").animate({opacity: 0}, 300, function () {
            $(".charges_zd").hide();
            $(".page_bottom").css("z-index", 99990);
            $(".charges_zd").css("z-index", 99988);
        });
        $("body,html").css("overflow", "auto");
        gettt--;

    })

    var img_height = $(".pro_here_bcimg").height();
    touch.on(".pro_here_bcimg", "tap", function (ev) {
        $(ev.currentTarget).next(".video-js").get(0).play();
        $(".video-js").css("height", img_height);
    });



})
