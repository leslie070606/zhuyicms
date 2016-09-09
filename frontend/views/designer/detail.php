<?php

use yii\helpers\Url;

$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
}
$_cookieSts = \common\controllers\BaseController::checkLoginCookie();
$userId = $session->get("user_id");
?>
<!DOCTYPE html>
<html style="background: #000000;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>设计师主页</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/home_page.css" />
        <link rel="stylesheet"  href="css/iconfont.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script type="text/javascript" src="js/home_page.js" ></script>
        <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>


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

            <div class="" id="bot_outline">
                <div class="out_true" style="height: 2.6rem;">
                    <div class="out_true_top" style="line-height: .3rem; padding-top: .3rem; margin-left: .3rem; margin-right: .3rem; line-height: .35rem; height:1.8rem; border-bottom: none;">您将跳转到客服聊天界面，请输入您的姓名和手机号、以及想约见的设计师姓名，住艺客服会协商设计师的时间</div>
                    <div class="out_true_bott" style="border-top: 1px solid #eeefef;">
                        <span class="quxiao" style="color: #9F9FA0;" onclick="quxiao()">取消</span>
                        <a onclick=bot_for("http://www.sobot.com/chat/h5/index.html?sysNum=d816da1bbc6b4814a0929661a3c7dfbc") style="font-size: .24rem; color: #ff4e38; display: block; text-align: center;">继续</a >
                    </div>
                </div>
            </div>

            <input type="hidden" id="user_id" value="<?php echo $data['user_id'] ?>" />
            <!--选择设计师的val-->
            <input type="hidden" id="chose_val" value="<?php echo Yii::$app->request->get('pro_id'); ?>" />
            <section class="page_banner">
                <div class="banner_zd" style=" position:absolute; width:100%; height:100%;top:0; width: 100%;left:0; z-index:1; background:#000000; opacity:0.1;"></div>           
                <img class="banner_img here_img" src="<?= $data['background'] ?>" />
                <div class="banner_mesg">
                    <div class="banner_name"><?= $data['name'] ?></div>
                    <div class="banner_bq"><span><?= $data['tag'] ?></span></div>
                </div>

            </section>
            <span class="banner_head"><img src="<?= $data['head_portrait'] ?>"/></span>
            <section class="production">
                <input type="hidden" id="art_len" value=<?php echo $data['art_cnt'] ?>>
                <div class="pro_title">
                    <span class="titl_span">作品集
                        <a></a>
                    </span>
                </div>
                <div class="pro_box">
                    <?php
                    //此设计师没有作品。
                    if ($data['art_cnt'] == 0 || empty($data['artsets'])) {
                        ;
                    } else {
                        $userId = $data['user_id'];
                        $designerId = $data['designer_id'];
                        $collectStatus = 2; //未收藏。
                        if (isset($userId) && isset($designerId)) {
                            $collectM = new \frontend\models\CollectDesigner();
                            $rows = $collectM->getCollectStatus($userId, $designerId);
                            if (!empty($rows)) {
                                $collectStatus = $rows[0]['status'];
                                //var_dump($collectStatus);
                            }
                        }
                        //2 未收藏，1 已收藏。

                        foreach ($data['artsets'] as $v) {
                            $artId = $v['art_id'];
                            $artType = $v['type'];
                            $topic = $v['topic'];
                            $brief = $v['brief'];

                            $imgBackground = '';
                            $imgCount = 0;
                            //设计师此作品仅有图片。
                            if ($artType == 0) {
                                $imgIds = $v['image_ids'];
                                $imgIdsArr = explode(',', $imgIds);
                                $imgIdsArr = array_filter($imgIdsArr);
                                $imgUrlArr = array();
                                foreach ($imgIdsArr as $id) {
                                    if (!isset($id) || empty($id)) {
                                        continue;
                                    }
                                    $rows = \frontend\models\Images::findOne($id);
                                    if (empty($rows)) {
                                        continue;
                                    }
                                    $url = $rows->url;
                                    $imgUrlArr[] = $url;
                                }
                                $imgBackground = isset($imgUrlArr[0]) ? $imgUrlArr[0] : '';
                                $imgCount = count($imgUrlArr);
                            } elseif ($artType == 1) {
                                $videoId = $v['video_ids']; //目前仅有一个视频。
                                $rows = \common\models\ZyVideo::findOne($videoId);
                                if (!empty($rows)) {
                                    $videoUrl = $rows->video_url;
                                }
                                $videoBackground = isset($rows->video_image) ? $rows->video_image : "/img/home_page/proc.jpg";
                            }


                            $imgBackground = isset($imgBackground) ? $imgBackground : "/img/home_page/prob.jpg";
                            $imgCount = isset($imgCount) ? $imgCount : 0;
                            //图片
                            if ($artType == 0) {
                                $html = <<<HTML
					<div class="pro_here pro_img iconfont" art_id="$artId">
						<img class="here_img" src="$imgBackground" />

						<div class="here_botaa"></div>
						<div class="here_bottom line_center">
							{$topic}	
						</div>
					</div>
HTML;
                            } elseif ($artType == 1) {//视频
                                $html = <<<HTML
					<div class="pro_here">
						<div class="pro_here_bcimg iconfont icon-bofang1">
							<img class="" src="$videoBackground"/>
						</div>
						<video id="example_video1" class="video-js vjs-default-skin" preload="none" poster="$videoBackground">
							<source src="$videoUrl" type='video/mp4' />
						</video>
						<div class="here_botaa"></div>
						<div class="here_bottom line_center">
							{$topic}
						</div>
					</div>
HTML;
                            }
                            echo $html;
                        }
                    }
                    ?>
                    <?php
                    $href = Yii::getAlias('@web') . '/index.php?r=designer/alls&&params=' . $data['designer_id'];
                    ?>
                    <div class="see_more"><a href=<?php echo $href ?>>查看更多作品</a></div>

                    <?php
                    $serveCity = $data['serve_city'];
                    $style = $data['style'];
                    $experience = $data['experience'];
					$interests = $data['interests'];
                    $yingType = $data['service_content']['ying_type'];
                    $gongType = $data['service_content']['gong_type'];
                    $ruanType = $data['service_content']['ruan_type'];
                    $allType = $yingType . ',' . $gongType . ',' . $ruanType;
                    ?>
                    <section class="Basic_Info">
                        <div class="post_title">
                            <span class=" iconfont icon-lingxing"><a>认识设计师</a></span>
                        </div>
                        <div class="Basic_Info_box">
                            <div class="info_here">
                                <div class="info_here_left">
                                    服务范围
                                </div>
                                <div class="info_here_right right_top">
                                    <!--<div class="topa">
                                            <span class="standard">标准服务</span>
                                            <span class="addition">附加服务</span>
                                    </div>-->

                                    <div class="topb" id="topb"  all_type =<?= $allType ?>>
                                        <span >硬装设计</span><span>施工对接</span><span>软装设计</span>

                                    </div><!--topb end-->
                                </div>
                            </div><!--info_here end-->

                            <div class="info_here">
                                <div class="info_here_left">
                                    服务城市
                                </div>
                                <div class="info_here_right cccc">
                                    <?php echo $serveCity ?>
                                </div>
                            </div><!--info_here end-->

                            <div class="info_here">
                                <div class="info_here_left">
                                    风格特点
                                </div>
                                <div class="info_here_right cccc">
                                    <?php echo $style ?>
                                </div>
                            </div><!--info_here end-->

                            <div class="info_here">
                                <div class="info_here_left">
                                    设计师经历
                                </div>
                                <div class="info_here_right cccc">
                                    <?php echo $experience ?>
                                </div>
                            </div><!--info_here end-->
                            <?php if(!empty($interests)): ?>
                            <div class="info_here">
                                <div class="info_here_left">
                                    兴趣爱好
                                </div>
                                <div class="info_here_right cccc">
                                    <?php echo $interests ?>
                                </div>
                            </div><!--info_here end-->
                            <?php endif;?>

                        </div>

                    </section><!--Basic_Info end-->




                </div>

                <div class="page_bottom">
                    <span class="bota" id="check"><a>查看费用</a></span>
                    <?php
                    if ($collectStatus == 2) {
                        $html = <<<HTML
                    	<span class="bota sc_bot"><a>收藏设计师</a></span>
HTML;
                        echo $html;
                    } elseif ($collectStatus == 1) {
                        $html = <<<HTML
                    	<span class="bota sc_bot"><a class="active">已收藏</a></span>
HTML;
                        echo $html;
                    }
                    ?>

                    <?php if (Yii::$app->request->get('checkdesiger') == 1) { ?>
                        <span class="botbb" id="chose_des"><a>选择该设计师</a></span>
                    <?php } else { ?>
                        <span class="botb zy_btn_ux"><a>约见咨询</a></span>
                    <?php } ?>

                </div>
                <div class="charges_zd"></div>
                <div class="check_charges">
                    <?php
                    $charge = isset($data['cost']['charge']) ? $data['cost']['charge'] : 0;
                    $chargeWork = isset($data['cost']['charge_work']) ? $data['cost']['charge_work'] : 0;
                    ?>

                    <!--                        <div class="charges_hui charges_huibbb">含：专业设计+认证施工+主材帮挑+家具选样清单+现场陪买2次（4小时）</div>-->

                    <div>
                        <span class="charges_left charges_title chargesaas">专业设计</span>
                    </div>
                    <div>

                        <span class="charges_left">设计费：</span>
                        <?php
                        if ($charge == 0) {
                            $html = <<<HTML
                            			<span class="charges_right red">面议</span>
HTML;
                        } else {
                            $html = <<<HTML
                                                <span class="charges_right red">{$charge}元/m² 起</span>
HTML;
                        }
                        echo $html;
                        ?>
                    </div>
                    <div class="charges_hui">住艺参考：设计费会根据项目的复杂程度、面积大小、使用材料等具体因素而变更。</div>
                </div>
        </div>
        <div class="pro_img_box" style="display: none;">
            <div class="pro_img_zd"></div>
            <span class="pro_img_title" id="pro_title"></span>
            <span class="pro_img_title"><i id="title_ida">1</i>/<i id="title_idb">7</i></span>
            <ul class="bxslider">
            </ul>
        </div>
    </body>
</html>
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
            title: '在住艺，我找到了一个好设计师，一起来认识TA吧！', // 分享标题
            desc: '<?= $data['name'] ?>，<?php echo $style ?>，服务城市：<?php echo $serveCity ?>', // 分享描述
                        link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=designer/detail&&params=' + "<?php echo $data['designer_id']; ?>", // 分享链接

                        imgUrl: '<?php echo Yii::$app->params['frontDomain'] . $data['head_portrait'] ?>', // 分享图标
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
                        title: '在住艺，我找到了一个好设计师，一起来认识TA吧！', // 分享标题
                        link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=designer/detail&&params=' + "<?php echo $data['designer_id']; ?>", // 分享链接
                        imgUrl: '<?php echo Yii::$app->params['frontDomain'] . $data['head_portrait'] ?>', // 分享图标
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
                function quxiao() {
                    $("#bot_outline").hide();
                    $(".down_right_zd").animate({opacity: .0}, 300, function () {

                        $(".down_right_zd").css("z-index", 99995);
                    })

                }
                ;
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

                    touch.on("#chose_des", "tap", function () {
                        tj_ajax(4, 4001, user_id, "designer_id", "选择该设计师");
                        var ckshejishi = $("#chose_val").val();
                        window.location.href = "<?php echo Yii::getAlias('@web') . '/index.php?r=project/choose_designer'; ?>" + '&ckshejishi=' + ckshejishi;
                    });
                    function GetQueryString(name) {
                        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
                        var r = window.location.search.substr(1).match(reg);
                        if (r != null)
                            return  unescape(r[2]);
                        return null;
                    }
                    var url = window.location.href;
                    var designer_id = GetQueryString("params");

                    var user_id = $("#user_id").val();
                    var params = user_id + "," + designer_id;

                    var collect_status = 0;
                    touch.on(".sc_bot", "tap", function (ev) {
                        if (user_id == "") {
                            //跳转登录页
                            window.location.href = "<?php echo Yii::getAlias('@web') . '/index.php?r=user/login'; ?>";
                        } else {
                            console.log(ev.currentTarget)
                            if ($(this).hasClass("active")) {
                                $(this).html("收藏设计师");
                                $(this).removeClass("active");
                                collect_status = 1;

                            } else {
                                $(this).html("已收藏");
                                $(this).addClass("active");
                                collect_status = 2;
                            }

                            if (collect_status == 1) {
                                $.ajax({
                                    type: "GET",
                                    url: "<?php echo Yii::getAlias('@web') . '/index.php?r=my/uncollect'; ?>" + "&&params=" + params,
                                    data: "",
                                    success: function (data) {
                                    }
                                })
                            } else if (collect_status == 2) {
                                $.ajax({
                                    type: "GET",
                                    url: "<?php echo Yii::getAlias('@web') . '/index.php?r=my/collect'; ?>" + "&&params=" + params,
                                    data: "",
                                    success: function (data) {

                                    }
                                })

                            }
                        }
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


                            }
                        });

                    });
                    touch.on(".pro_img_box", "tap", function (ev) {
                        $(ev.currentTarget).hide();
                        $(ev.currentTarget).html(htmllll);
                    });
                });
                function bot_for(a) {
                    tj_ajax(2, 2006, user_id, "", "人工匹配按钮");
                    window.location.href = a;
                }
</script>
