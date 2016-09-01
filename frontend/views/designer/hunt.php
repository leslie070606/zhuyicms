<?php

use yii\helpers\Url;

$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
}
$_cookieSts = \common\controllers\BaseController::checkLoginCookie();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>搜索</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/hunt.css" />
        <link rel="stylesheet"  href="css/iconfont.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js" ></script>	
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script type="text/javascript" src="js/hunt.js" ></script>
    </head>
    <body>

        <div class="hunt_box">
            <header class="header_top">
                <span class="hunt_title">搜索</span>
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
                        <a href="<?php echo Url::toRoute('/user/loginout'); ?>"><a href="<?php echo Url::toRoute('/user/loginout'); ?>"><span class="queding">确定</span></a>
                        </a>
                    </div>
                </div>
            </div>  
            <div class="hunt_here">
                <div class="hunt_input">
                    <form action="" onsubmit="return false;">
                        <input class="ipu" type="text"  placeholder="请输入设计师姓名" />
                    </form>
                    <span class="iconfont icon-sousuo" onclick="search()"></span>
                </div>
                <div class="hunt_here_box">
                    <!-- 设计师 -->
                    <?php if ($history) { ?>

                        <div class="history">
                            <span class="his_title">
                                历史搜索
                            </span>
                            <ul class="his_ul">
                                <?php foreach ($history as $value) { ?>
                                    <li class=""><a><?php echo $value['content']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                </div>


                <div class="choose">
                    <span class="his_title">
                        热门推荐
                    </span>

                </div>
            </div>
        </div>
        <div class="out_Capacity">
            <div class="zdang"></div>
            <div class="mengs">未找到设计师!</div>
        </div>
    </body>
</html>
<script type="text/javascript">
    var _hotDesignerUrl = '<?= Url::to(['zysearchhot/get-search-hot']); ?>';
    var _designerDetailUrl = '<?= Url::to(['designer/detail']); ?>';
    $.ajax({
        type: "get",
        url: _hotDesignerUrl,
        async: true,
        success: function (data) {
            data = eval('(' + decodeURI(data) + ')');
            if (data.code == 1) {
                var html = '';
                var length = data.msg.length;
                for (var i = 0; i < length; i++) {
                    var tag = data.msg[i].dTag.split(",")[0];
                    var htmla = '<a href="' + _designerDetailUrl + "&params=" + data.msg[i].dId + '"><div class="here_bottom line_center">'
                            + '<div class="here_head"><img src="' + data.msg[i].dImg + '" /></div>'
                            + '<div class="bottom_name"><span class="here_name">' + data.msg[i].dName + '</span><span class="here_namea">' + data.msg[i].dCity + '</span></div>'
                            + '<div class="bottom_label bottom_referral"><span>' + tag + '</span></div></div></a >'
                    html += htmla;
                }
                $(".choose").append(html);
            }
        }
    });

    touch.on(".his_ul li a", "tap", function (ev) {
        var htm = $(ev.currentTarget).html();
        $(".ipu").val(htm);
        search();
    });
    function search() {
        var search_key = $(".ipu").val();
        $.ajax({
            url: '<?php echo Yii::getAlias('@web') . '/index.php?r=designer/hunt' ?>' + "&&search_key=" + search_key,
            type: 'get',
            //dataType: 'json',
            data: '',
            success: function (data) {
                if (data) {
                    // alert(data);
                    $(".hunt_here_box").html(data);
                } else {
                    out_line();

                }

            }
        });
    }

    $(window).keydown(function (event) {
        switch (event.which) {
            case(13):
                search();
                break;
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

</script>