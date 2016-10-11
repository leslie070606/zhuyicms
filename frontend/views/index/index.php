<?php

use common\models\ZyVideo;
use yii\helpers\Url;

$videoModel = new ZyVideo();


//判断用户是否登录
$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
}
$userId = $session->get("user_id");
if (!isset($userId) || empty($userId)) {
    $_cookieSts = \common\controllers\BaseController::checkLoginCookie();
    if ($_cookieSts) {
        $userId = $session->get("user_id");
    }else{
        $userId = '';
    }
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>住艺</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/index.css" />
        <!--<link rel="stylesheet" href="css/video-js.min.css" />-->
        <link rel="stylesheet"  href="css/iconfont.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js" ></script>	
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <!--<script type="text/javascript" src="js/video.min.js" ></script>-->
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script type="text/javascript" src="js/index.js" ></script>
        <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    </head>
    <body>
        <div class="banner">
            <ul class="bxslider bxslideraa">
                <li>
                    <img src="img/index/banner_a.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/banner_b.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/banner_c.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/banner_d.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/banner_e.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/banner_f.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/banner_g.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/banner_h.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/banner_i.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/banner_j.jpg" title="" />
                </li>

            </ul>

            <span class="mesg_spb"><a class="zy_btn_uxa"  onclick=gongzhuang("<?php echo Url::toRoute('project/match_designer'); ?>",2,2012) style="top: 2.4rem;">找设计师</a></span>
        </div>
        <div class="fingerpost">
            <div class="post_title">
                <span class=" iconfont icon-lingxing"><a>设计指南</a></span>
            </div>
            <ul class="bxslider bxsliderbb">
                <li>
                    <a href="<?php echo Url::toRoute('/zyzhinan/guidea'); ?>"><img src="img/index/zhinana.jpg" title="" /></a>
                </li>

                <li>
                    <a href="<?php echo Url::toRoute('/zyzhinan/guidec'); ?>"><img src="img/index/zhinanc.jpg" title="" /></a>
                </li>
                <li>
                    <a href="<?php echo Url::toRoute('/zyzhinan/guideb'); ?>"><img src="img/index/zhinanb.jpg" title="" /></a>
                </li>
            </ul>

        </div>

        <section class="production">
            <div class="pro_title">
                <span class="titl_span">住艺设计师
                    <a></a>
                </span>
            </div>
            <div class="pro_box">
                <?php foreach ($data as $value) { ?>
                    <div class="pro_here">
                        <div class="pro_here_bcimg iconfont icon-bofang1">
                            <img class="here_img" src="<?php
                            $video = $videoModel::findOne($value['video_id']);
                            echo Yii::getAlias('@web') . $video['video_image'];
                            ?>" />
                        </div>
                        <video id="example_video1" class="video-js vjs-default-skin"  preload="none" height="4.2rem" poster="<?php
                        $video = $videoModel::findOne($value['video_id']);
                        echo Yii::getAlias('@web') . $video['video_image'];
                        ?>">
                            <source src="<?php echo $video['video_url']; ?>" type='video/mp4' />
                        </video>
                        <div class="here_botaa"></div>
                        <div class="here_bottom line_center">
                            <div class="here_head"><a href="<?php echo Url::toRoute(['/designer/detail', 'params' => $value['designer_id']]); ?>">
                                    <img src="<?php
                                    $db = new frontend\models\DesignerBasic();
                                    if ($db->getHeadPortrait($value['designer_id'])) {
                                        echo Yii::$app->params['frontDomain'] . $db->getHeadPortrait($value['designer_id']);
                                    } else {
                                        echo Yii::$app->params['frontDomain'] . '/img/home_page/banner_head.jpg';
                                    }
                                    ?>" />
                                </a>
                            </div>

                            <div class="bottom_name">
                                <span class="here_name"><?= $value['designer_name'] ?></span><span class="here_namea"><?= $value['designer_city'] ?></span>
                            </div>
                            <div class="bottom_referral">
                                <?= $value['description'] ?>
                            </div>
                        </div>
                    </div><!--pro_here end-->
                <?php } ?>
            </div><!--pro_box end-->
            <div class="see_more"><a href="<?php echo Url::toRoute('designer/list'); ?>">认识更多设计师</a></div>

        </section><!--production end-->

        <section class="use_zy">
            <div class="use_zy_title">
                <span class="use_zy_a">如何开始</span>
                <span class="use_zy_b"></span>
            </div>
            <div class="use_zy_box">
                <span class=" iconfont icon-ceshi use_one"></span>
                <span class="use_text use_two">提交需求</span>
                <span class=" iconfont icon-jiantou use_three"></span>

                <span class=" iconfont icon-shejishi use_one"></span>
                <span class="use_text use_two">智能匹配设计师</span>
                <span class=" iconfont icon-jiantou use_three"></span>

                <span class=" iconfont icon-hezuo use_one"></span>
                <span class="use_text use_two">约见设计师</span>
                <span class=" iconfont icon-jiantou use_three"></span>

                <span class=" iconfont icon-sheji use_one"></span>
                <span class="use_text use_two">与设计师签约</span>
                <span class=" iconfont icon-jiantou use_three"></span>
            </div>
            <span class="btn_bot"><a class="zy_btn_ux" onclick=gongzhuang("<?php echo Url::toRoute('project/match_designer'); ?>",2,2012)>找设计师</a></span>
        </section><!--use_zy end-->

        <section class="nav_bot">

            <span><a href="<?php echo Url::toRoute('zyzhinan/about'); ?>">关于住艺</a></span>
            <span><a href="http://zhuyihome.com/designer/signup/">设计师入驻</a></span>
            <span><a href="https://mp.weixin.qq.com/s?__biz=MzI1OTIxNjA2OA==&mid=2247485173&idx=4&sn=5c10b2364bc21a1527e9d133e8cbad30&scene=1&srcid=08112f6yasQXCY7tW0hFeEYf&key=305bc10ec50ec19b02071ea23533e123b67ab587901d9f0b2dc424aca2470b37385ff9d62bfa4b959f8f06479654fc79&ascene=0&uin=MjAwNDIyNzIwMg%3D%3D&devicetype=iMac+MacBookPro12%2C1+OSX+OSX+10.11.6+build(15G31)&version=11020201&pass_ticket=Jvenh%2BfdOHsIBk%2FxXUW3dUY5L4MH6qwgBegvTTPeQQ3Gb5nLIsI1ORiHB3Tj4Im2">住艺招聘</a></span>
            <span><a onclick=gongzhuang("<?php echo Url::toRoute('index/toolsdesign'); ?>",2,2008)>公装项目</a></span>
        </section>
        <!--nav_bot end-->

        <footer class="foot">
            <span class="foot_a">
                <a href="http://www.sobot.com/chat/h5/index.html?sysNum=d816da1bbc6b4814a0929661a3c7dfbc">在线客服</a><span class="foot_a_sp">|</span><a href="tel:4000600636">客服电话</a>
            </span>
            <span class="foot_b">
                京ICP备16029306号
            </span>
        </footer>
        <input type="hidden" id='user_id' value="<?=$userId ?>" />
    </body>
</html>
<script type="text/javascript">
    function gongzhuang(a,b,c){
         tj_ajax(b, c, user_id, "", "公装项目");
         window.location.href=a;
    }
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
