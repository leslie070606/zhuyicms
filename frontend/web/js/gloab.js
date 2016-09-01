$(function () {
    user_id = localStorage.getItem("user_id");
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?c2212e69b1418d8a1b6506185b5c8bc3";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
    // 百度统计代码
    var url = window.location.href;
    if (url.indexOf("detail") > 0) {
        localStorage.setItem("zhaosire_sb", "b");
    } else {
        var zhao = localStorage.getItem("zhaosire_sb");
        if (url.indexOf("list") > 0 && zhao == "b") {
            var here_top = localStorage.getItem("here_top");
            var height = $(".pro_here").height();
            setTimeout(function () {
                $(".scroller").css({"transform": "translate(0px, -" + here_top * height + "px) scale(1) translateZ(0px)", "transition-duration": "0ms"})
            }, 100);
        } else {
            localStorage.setItem("zhaosire_sb", "a");
        }

    }
    ;


    touch.on(".down_right li:last-child", "tap", function (ev) {
        if ($(ev.currentTarget).find("a").html() == "暂时登出") {
            $(".out_true_box").show();
        }
    });
    touch.on(".out_true_box .quxiao", "tap", function () {
        $(".out_true_box").hide();
    });


    var widthaa = $("body").width();
    $(".here_img,.pro_here").css("height", widthaa * .56);

    touch.on(".top_right", "tap", function (ev) {
        var right = parseInt($(".down_right").css("right"));
        if (right < 0) {
            $(".down_right_zd").show();
            $(".down_right").animate({right: '0rem'}, 300);
            $(".down_right_zd").animate({opacity: .5}, 200);
        } else {

            $(".down_right").animate({right: '-2.3rem'}, 300);
            $(".down_right_zd").animate({opacity: 0}, 200, function () {
                $(".down_right_zd").hide();
            });
        }
    });
    touch.on(".down_right_zd", "tap", function () {
        $(".down_right").animate({right: '-2.3rem'}, 300);
        $(".down_right_zd").animate({opacity: 0}, 200, function () {
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
    $(".dema_ipt").change(function () {
        if ($(this).val() != "") {
            $(this).addClass("red_border");
        } else {
            $(this).removeClass("red_border");
        }
    });


    function out_line() {
        $(".out_Capacity").show().animate({
            opacity: 1
        }, 1000, function () {
            $(".out_Capacity").animate({
                opacity: 0
            }, 1000, function () {
                $(".out_Capacity").hide();
            })
        });
    }
});
function tj_ajax(a, b, c, d, e) {
    $.ajax({
        url: "http://zhuyihome.com/index.php?r=data-count-api/create&mtId=" + a + "&mdId=" + b + "&userId=" + c + "&designerId=" + d + "&mMark=" + e + "",
        type: "GET",
        dataType: 'jsonp',
        jsonp: 'jsoncallback',
        data: "",
        async: true,
        success: function (data) {}
    });
}

