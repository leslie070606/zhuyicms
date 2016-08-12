<?php

use yii\helpers\Url;

$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
}
?>
<!DOCTYPE html>
<html style="background: #000000;">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>设计师所有作品</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/home_page.css" />
        <!--   <link rel="stylesheet" href="css/video-js.min.css" />-->
        <link rel="stylesheet" href="css/iconfont.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/touch-0.2.14.min.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js"></script>
        <!--<script type="text/javascript" src="js/video.min.js" ></script>-->
        <script type="text/javascript" src="js/gloab.js"></script>
    </head>

    <body style="background: #000000;">

        <div class="page_box" style="background: #ffffff;">
            <header class="header_top iconfont icon-logo">
                    <!--<input id="ipt" type="text" value="0" />-->
                <span class="top_right iconfont icon-gongneng"></span>
            </header>
            <section class="down_right">
                <ul>
                    <li><a href="<?php echo Url::toRoute('/index/index'); ?>">首页</a></li>
                    <li><a href="<?php echo Url::toRoute('/designer/list'); ?>">住艺设计师</a></li>
                    <li><a href="<?php echo Url::toRoute('/zyzhinan/guide'); ?>">设计指南</a></li>
                    <li><a href="<?php echo Url::toRoute('/order/list'); ?>">我的住艺</a></li>
                    <li><a href="<?php echo Url::toRoute('/user/feedback'); ?>">更多建议</a></li>
                    <li>   <?php if ($session->get('user_id')) { ?>
                            <a abc="<?php echo Url::toRoute('/user/loginout'); ?>">暂时登出</a>

                        <?php } else { ?>

                            <a href = "<?php echo Url::toRoute('/user/login'); ?>">立即登录</a>

                        <?php }; ?>

                    </li>
                </ul>
            </section>
            <div class="down_right_zd"></div>
			
			<div class="out_true_box">
				<div class="out_true">
					<div class="out_true_top">确认退出登录？</div>
					<div class="out_true_bott">
						<span class="quxiao">取消</span>
						<a href="<?php echo Url::toRoute('/user/loginout'); ?>"><span class="queding">确定</span></a>

					</div>
				</div>
			</div>
            <div class="pro_box" style="top: 0;">
            </div>
            <!--pro_box end-->
        </div>
    </div>
    <div class="pro_img_box" style="display: none;">
        <div class="pro_img_zd"></div>
        <span class="pro_img_title"><i id="title_ida">1</i>/<i id="title_idb">7</i></span>
        <ul class="bxslider">

        </ul>
    </div>
</body>

</html>
<script>
    $(function () {
        var designer_id = getUrlParam('params');
        $.ajax({
            type: "get",
            url: "<?php echo Yii::getAlias('@web') . '/index.php?r=designer/arts'; ?>" + "&&params=" + designer_id,
            async: true,
            success: function (data) {
                var html_box = "";
                data = eval('(' + decodeURI(data) + ')');
                for (var i = 0; i < data.length; i++) {
                    var type = data[i].type;
                    if (type == 0) {
                        var html = '<div class="pro_here pro_img iconfont" art_id="' + data[i].art_id + '">'
                                + '<img class="here_img" src="' + data[i].background + '" />'
                                + '<div class="here_botaa"></div>'
                                + '<div class="here_bottom line_center">' + data[i].topic + '</div></div>'

                        html_box += html;
                    } else if (type == 1) {
                        var htmla = '<div class="pro_here"><div class="pro_here_bcimg iconfont icon-bofang1"><img class="" src="' + data[i].background + '" /></div>'
                                + '<video id="example_video1" class="video-js vjs-default-skin" preload="none" poster="' + data[i].background + '"><source src="' + data[i].video_url + '" /></video>'
                                + '<div class="here_botaa"></div>'
                                + '<div class="here_bottom line_center">' + data[i].topic + '</div>'
                                + '</div>'
                        html_box += htmla;
                    }

                }
                $(".pro_box").html(html_box);
                 var widthaa = $("body").width();
                 $(".here_img,.pro_here").css("height", widthaa * .56);
                            
                var img_height = $(".pro_here_bcimg").height();
                touch.on(".pro_here_bcimg", "tap", function (ev) {
                    $(this).next(".video-js").get(0).play();
                    $(".video-js").css("height", img_height);
                });
                var nubeee = 0;
                var htmllll = $(".pro_img_box").html();
                touch.on(".pro_img", "tap", function (ev) {
                    $(".pro_img_box").show();
                    var html = "";
                    var art_id = $(ev.currentTarget).attr("art_id");

                    $.ajax({
                        type: "get",
                        url: "<?php echo Yii::getAlias('@web') . '/index.php?r=designer/artsets'; ?>" + "&&params=" + art_id,
                        async: true,
                        success: function (data) {
                            data = eval('(' + decodeURI(data) + ')');
                            console.log(data);
                            var length = data.length;
                            $("#title_idb").html(length);
                            for (var i = 0; i < length; i++) {
                                html += '<li><img src="' + data[i] + '"  /></li>';
                            }
                            $(".bxslider").html(html);
                            setTimeout(function () {
                                $('.bxslider').bxSlider({controls: false, auto: false, pause: 4000, speed: 600});
                            }, 100);
                            $("#title_idb").html(length);
                            
                           
                        }
                    });

                });
                touch.on(".pro_img_box", "tap", function (ev) {

                    $(ev.currentTarget).hide();
                    $(ev.currentTarget).html(htmllll);
                });
            }
        });
    })
    function getUrlParam(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);  //匹配目标参数
        if (r != null)
            return unescape(r[2]);
        return null; //返回参数值
    }
</script>
