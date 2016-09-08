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
        <title>选择设计师</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/Choose_designer.css" />
        <link rel="stylesheet"  href="css/iconfont.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js" ></script>	
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script type="text/javascript" src="js/Choose_designer.js" ></script>
        <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

    </head>
    <body>
        <div class="choose_box">
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
            <div class="" id="bot_outline">
                <div class="out_true" style="width:5.2rem;">
                    <div class="out_true_top" style="line-height: .3rem; padding-top: .3rem; margin-left: .3rem; margin-right: .3rem; border-bottom: none;">最多选择3位优先约见<br />如想认识更多设计师,请联系住艺客服</div>
                    <div class="out_true_bott" style="font-size: .24rem; border-top: 1px solid #eeefef;; line-height: .8rem; text-align: center;" >
                        确定
                    </div>
                </div>
            </div>

            <div class="choose_top">
                <span class="choose_top_a"></span>

                <?php
                $num = count($model);
                $isredall = false; //是否全是红色
                //红色数量
                $counti = 0;
                foreach ($model as $val) {

                    if (isset($val['red'])) {
                        $counti++;
                    }
                }
                //如果都是红色
                if ($counti == $num) {
                    $isredall = true;
                    echo '<span class="choose_top_b">根据您预算未找到合适的设计师,请参考以下推荐的设计师!</span>';
                } else {
                    $nored = $num - $counti;

                    if ($nored > 0) {
                        if ($nored >= 3) {
                            $numc = 3;
                        } else {
                            $numc = $num;
                        }
                        ?>
                        <span class="choose_top_b">据您的初步信息，甄选出<?= $nored ?>位设计师<br/>从中选择喜欢的优先约见（最多<?= $numc ?>位）</span>
                    <?php } else { ?>

                        <span class="choose_top_b">在您的地区和时间段未匹配到设计师,请联系客服!4000-600-636</span>

                        <?php
                    }
                }
                ?>
            </div>

            <div class="designer_box">
                <?php
                foreach ($model as $value) {

                    //如果不都是红色 不显示红色设计师 跳出本次循环
                    if (!$isredall) {
                        //echo "r";
                        if (isset($value['red'])) {
                            // echo  $value['did'];
                            continue;
                        }
                    }

                    $designerModel = new frontend\models\DesignerBasic();
                    $designers = $designerModel->getDesignerById($value['did']);

                    $imageModel = new \frontend\models\Images();
                    //头图
                    $headimgmodel = $imageModel->findOne($designers['head_imgid']);
                    if (empty($headimgmodel)) {
                        $headimg = 'img/home_page/designer_headimg.jpg';
                    } else {
                        $headimg = $headimgmodel->url;
                    }
                    //获取头像
                    ?>
                    <div class="pro_here iconfont" id="" value_id="<?= $value['did'] ?>">

                        <a href="javascript:"><img class="here_img" src="<?= $headimg ?>" /></a>
                        <div class="here_zhe"></div>
                        <div class="here_botaa"></div>
                        <div class="here_bottom line_center">
                            <div class="here_head">
                                <a href="<?php echo Url::toRoute(['/designer/detail', 'params' => $value['did'], 'checkdesiger' => 1]); ?>">
                                    <img src="<?php
                                    $db = new frontend\models\DesignerBasic();
                                    if ($db->getHeadPortrait($value['did'])) {
                                        echo Yii::$app->params['frontDomain'] . $db->getHeadPortrait($value['did']);
                                    } else {
                                        echo Yii::$app->params['frontDomain'] . '/img/home_page/banner_head.jpg';
                                    }
                                    ?>" />
                                </a>
                            </div>

                            <div class="bottom_name">
                                <span class="here_name"><?= $designers['name'] ?></span> 
                            </div>
                            <div class="bottom_label bottom_referral">
                                <?php
                                $tagArr = explode(',', $designers['tag']);
                                if (count($tagArr) > 1) {
                                    foreach ($tagArr as $v) {
                                        ?>
                                        <span><?= $v ?></span>

                                        <?php
                                    }
                                } else {
                                    ?>
                                    <span><?= $designers['tag'] ?></span>

                                <?php } ?>
                            </div>

                            <span class="bot_input"><i class="input_box iconfont icon-weixuanzhong"></i></span>
                        </div>
                    </div><!--pro_here end-->
                <?php } ?> 
            </div>
            <span class="click_more">查看更多立即匹配出的设计师 </span>
            <div class="bot_navv">
                <ul class="box_sjs">
                        <!--<li><img src="img/home_page/banner_head.jpg"/><i class="iconfont icon-shanchu shanchu"></i></li>
                        <li><img src="img/home_page/banner_head.jpg"/><i class="iconfont icon-shanchu shanchu"></i></li>
                        <li><img src="img/home_page/banner_head.jpg"/><i class="iconfont icon-shanchu shanchu"></i></li>-->
                </ul>
                <span class="navv_tj zhihui">提交</span>
                <span class="rg_pp"><i class="iconfont icon-weixuanzhong rg_ppi"></i><i id="htmll">没有发现喜欢的设计师，请住艺为我甄选</i></span>

            </div>		
        </div>
        <div class="out_Capacity" style="width: 3.5rem; z-index: 10000;">
            <div class="zdang"></div>
            <div class="mengs" style="line-height: .4rem; margin-top: .1rem;">您已经选择过您要见的设计师<br />请在我的住艺中查看</div>
        </div>
    </body>
</html>
<script>
    $(function () {
        touch.on(".here_img", "tap", function (ev) {
            var _this = $(ev.currentTarget);
            var pro_id = "";
            $(".icon-xuanzhong").each(function () {
                var index = $(this).parents(".pro_here").index();
                pro_id += index + ",";
            });
            if (_this.parents(".pro_here").find(".input_box").hasClass("icon-weixuanzhong")) {
                var this_id = _this.parents(".pro_here").index();
                pro_id += this_id;
            } else {
                pro_id = pro_id.substring(0, pro_id.length - 1);
            }

            var value = $(ev.currentTarget).parents(".pro_here").attr("value_id");
            window.location.href = "<?php echo Yii::getAlias('@web') . '/index.php?r=designer/detail'; ?>" + '&params=' + value + '&checkdesiger=1&pro_id=' + pro_id;
        })
        var ckshejishi = "<?php echo Yii::$app->request->get('ckshejishi') ? Yii::$app->request->get('ckshejishi') : ''; ?>";
        var prohere = ckshejishi.split(",");
        var pro_length = prohere.length;
        var last_pro = prohere[pro_length - 1];

        if (last_pro > 3 || last_pro <= 6) {

            $(".designer_box>.pro_here:eq(3),.designer_box>.pro_here:eq(4),.designer_box>.pro_here:eq(5)").show();
            var top = $(".designer_box .pro_here:eq(" + last_pro + ")").offset().top;
            $(window).scrollTop(top)
        }
        ;
        if (last_pro > 6) {
            $(".designer_box>.pro_here").show();
            var top = $(".designer_box .pro_here:eq(" + last_pro + ")").offset().top;
            $(window).scrollTop(top)
        }
        ;
        if (pro_length > 3) {

            pro_length = 3;
            $("#bot_outline,.down_right_zd").show();
            $(".down_right_zd").animate({opacity: .5}, 200);
            touch.on("#bot_outline .out_true_bott", "tap", function () {
                $("#bot_outline").hide();
                $(".down_right_zd").animate({opacity: 0}, 200, function () {
                    $(".down_right_zd").hide();
                });
            })
        }
        ;
        if (ckshejishi) {
            for (var i = 0; i < pro_length; i++) {
                var _this = $(".pro_here:eq(" + prohere[i] + ")").find(".input_box");
                var indexx = prohere[i];
                tapp(_this, indexx);
            }
        }



        function tapp(thiss, index) {

            var index = thiss.parents(".pro_here").index();
            var src = thiss.parents(".here_bottom").find(".here_head img").attr("src");
            thiss.addClass("icon-xuanzhong").removeClass('icon-weixuanzhong');
            var lii = "<li id='li_" + index + "'><img src=" + src + " /><i class='iconfont icon-shanchu shanchu'></i></li>";
            $(".box_sjs").append(lii);
            touch.on(".box_sjs li", "tap", function (ev) {
                var id = $(ev.currentTarget).attr("id");
                var last = parseInt(id.substr(id.length - 1));

                $(".designer_box .pro_here:eq(" + last + ")").find(".input_box").addClass("icon-weixuanzhong").removeClass("icon-xuanzhong");
                $(ev.currentTarget).remove();
            })
            $("#htmll").text("人工匹配");
            $(".navv_tj").removeClass("zhihui");

        }
    });

    touch.on(".navv_tj", "tap", function (ev) {

        if (localStorage.getItem("key") == <?= $user_id ?>) {
            $(".out_Capacity").show().animate({
                opacity: 1
            }, 1000, function () {
                $(".out_Capacity").animate({
                    opacity: 0
                }, 2000, function () {
                    $(".out_Capacity").hide();
                })
            });
        } else {

            var user_id = <?= $user_id ?>;
            var project_id = <?= $project_id ?>;
            var html = "";
            var is_pipei = "";
            var length = $(".pro_here .icon-xuanzhong").length;
            $(".pro_here .icon-xuanzhong").each(function (index) {
                var val = $(this).parents(".pro_here").attr("value_id");
                if (index == length - 1) {
                    html += val;
                } else {
                    html += val + ",";
                }

            })
            if ($(".navv_tj").hasClass("zhihui")) {
                return false;
            } else {
                //alert("111")
            }
            if ($(".rg_pp .iconfont").hasClass("icon-xuanzhong")) {
                is_pipei = 1;
            } else {
                is_pipei = 0;
            }
            ;
            var str = user_id + "$" + project_id + "$" + html + "$" + is_pipei;
            tj_ajax(2, 2004, user_id, "", "稍后再填");
            $.ajax({
                type: "GET",
                url: "<?php echo Yii::getAlias('@web') . '/index.php?r=order/index'; ?>" + "&&params=" + str,
                data: "",
                success: function (data) {
                    // alert(data);
                    if (data = 3) {
                        // 人工服务可以选
                        //跳转人工
                        window.location.href = "<?php echo Yii::getAlias('@web') . '/index.php?r=order/list'; ?>";
                    }
                    if (data = 1) {
                        localStorage.setItem("key", <?= $user_id ?>);
                        window.location.href = "<?php echo Yii::getAlias('@web') . '/index.php?r=order/list'; ?>";
                    }

                }
            });
        }
    })
    function out_line() {

    }

</script>
<script type="text/javascript">
    wx.config({
        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: 'wx8f50ac309b04acf8', // 必填，公众号的唯一标识
        timestamp: <?= $jsarr['timestamp'] ?>, // 必填，生成签名的时间戳
        nonceStr: 'zhuyi', // 必填，生成签名的随机串
        signature: "<?= $jsarr['signature'] ?>", // 必填，签名，见附录1
        jsApiList: ['onMenuShareAppMessage', 'onMenuShareTimeline', 'checkJsApi', 'chooseImage', 'uploadImage', 'downloadImage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });
    wx.ready(function () {

        wx.checkJsApi({
            jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'checkJsApi', 'chooseImage', 'uploadImage', 'downloadImage'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
            success: function (res) {
                // 以键值对的形式返回，可用的api值true，不可用为false
                // 如：{"checkResult":{"chooseImage":true},"errMsg":"checkJsApi:ok"}
            }
        });
        //分享给朋友
        wx.onMenuShareAppMessage({
            title: '想为自己和爱的人定制一个舒服的家？我建议你去住艺看看！', // 分享标题
            desc: '定制一个舒服的家／用钻研装修的600个小时陪伴家人／让家成为宝宝最棒的诞生礼／告别混乱的储物迷局／远离面对3000种优质建材的选择障碍 ／严守预算，只花该花的钱 ／从“坐办公室”到工作的艺术／让你的餐厅和店铺与众不同／为父母布置最美的家宴餐桌／住出真的自己', // 分享描述
            link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=index/index', // 分享链接

            imgUrl: "<?php echo Yii::$app->params['frontDomain'] ?>" + '/img/zhuyilogo.jpg', // 分享图标
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                // 用户确认分享后执行的回调函数
                alert('已分享!');
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            },
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });
        //分享到朋友圈
        wx.onMenuShareTimeline({
            title: '想为自己和爱的人定制一个舒服的家？我建议你去住艺看看！', // 分享标题
            link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=index/index', // 分享链接
            imgUrl: "<?php echo Yii::$app->params['frontDomain'] ?>" + '/img/zhuyilogo.jpg', // 分享图标

            success: function () {
                // 用户确认分享后执行的回调函数
                alert('分享成功!');
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            },
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });
    });
</script>