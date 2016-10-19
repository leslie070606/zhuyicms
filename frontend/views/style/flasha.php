<?php

use yii\helpers\Url;

if (isset($frindf) && !empty($frindf)) {
    $renchen = '他';
} else {
    $renchen = '你';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>风格结果</title>
       <link rel="stylesheet" href="http://at.alicdn.com/t/font_1476852969_6403563.css" />
        <link rel="stylesheet" href="css/jg.css" />
        <link rel="stylesheet" href="css/flash_a.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/touch-0.2.14.min.js"></script>
        <script src="js/gloaba.js" async="async"></script>
    </head>
    <body>
        <div class="desib_box">
            <div class="miaoshu">
                <span class="miaoshu_name"><?php echo $userInfo['nickname'] ?></span>
                <span><?= $renchen ?>叛逆不羁，</span>
                <span>是异域风情的制造者，</span>
                <span>是自由不羁的Bobo族，</span>
                <span><?= $renchen ?>最喜爱的风格是——</span>
                <span class="text_big">
                    <span>波西米亚风格</span>
                    <div class="miaodian_mesng miaodiana_a">
                        <div class="sanjiao_box">
                           <div class="maodian_flash maodian_icon"><div class="md_flash_center"></div><div class="md_flash_big"></div></div>

                            <div class="sanjiao"></div>
                            <div class="click_m"></div>
                        </div>
                        <div class="miaodian_text">
                            <span class="text_title">波西米亚风格</span>
                            Bobo一族钟爱的家居，魅力在于暗藏的叛逆和小小的不羁，它和它的主人一样，心仪一种反传统的生活模式，带着游牧民族的奔放和艺术家的自由。就像散落在衣柜里的绣花、流苏和褶皱大摆裙，藤编的餐椅、艳丽的手工装饰、串珠满饰的靠垫、民族风印花的盖毯……也四处散落在空间里，在粗旷中显示柔美，于优雅中表现随性，而浓烈的色彩正好可以用来搭配神秘的异域情调——在这样的家中，你无需正襟危坐，无拘无束的日常才是家的重心。居住，于是，变得更像是一场风格的“流浪”。
                        </div>
                    </div>
                </span>
            </div>
            <span class="logo iconfont icon-chusheng01"></span>
            <div class="desi_top"></div>
            <div class="desi_bottom"></div>
            <img class="des_img des_imga" src="img/flash_a/1.png" />
            <img class="des_img des_imgb" src="img/flash_a/2.png" />
            <img class="des_img des_imgc" src="img/flash_a/3.png" />
            <img class="des_img des_imgd" src="img/flash_a/4.png" />
            <img class="des_img des_imge" src="img/flash_a/5.png" />
            <img class="des_img des_imgf" src="img/flash_a/6.png" />
            <img class="des_img des_imgg" src="img/flash_a/7.png" />
            <img class="des_img des_imgh" src="img/flash_a/8.png" />
            <img class="des_img des_imgj" src="img/flash_a/10.png" />
            <img class="des_img des_imgk" src="img/flash_a/11.png" />
            <img class="des_img des_imgl" src="img/flash_a/12.png" />
            <img class="des_img des_imgp_a" src="img/flash_a/16.png" />
            <img class="des_img des_imgp_b" src="img/flash_a/15.png" />
            <img class="des_img des_imgp_c" src="img/flash_a/14.png" />
            <img class="des_img des_imgp_d" src="img/flash_a/13.png" />


            <div class="miaodian_mesng miaodiana_aa">
                <div class="sanjiao_box">
                   <div class="maodian_flash maodian_icon"><div class="md_flash_center"></div><div class="md_flash_big"></div></div>

                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">浓烈色彩</span>
                    如何自由而聪明地运用各种缤纷浓郁的色彩，是打造波西米亚风格的关键，它们会让家中充满奔放不羁的气息。
                </div>
            </div>


            <div class="miaodian_mesng miaodiana_b">
                <div class="sanjiao_box">
                   <div class="maodian_flash maodian_icon"><div class="md_flash_center"></div><div class="md_flash_big"></div></div>
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">异域情调的饰品</span>
                    正有这些从世界各地收藏来的小物件才能为家中制造各种小惊喜，神秘的异域情调由此而生！
                </div>
            </div>


            <div class="miaodian_mesng miaodiana_c">
                <div class="sanjiao_box">
                   <div class="maodian_flash maodian_icon"><div class="md_flash_center"></div><div class="md_flash_big"></div></div>
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">藤编或木质家具</span>
                    带有手工质感的藤制或木质家具最是自在、优雅、随性，展现日常家居无拘无束的一面，再搭配上皮毛或是绣花织物就更赞了！
                </div>
            </div>


            <div class="miaodian_mesng miaodiana_e">
                <div class="sanjiao_box">
                   <div class="maodian_flash maodian_icon"><div class="md_flash_center"></div><div class="md_flash_big"></div></div>
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">印花织物</span>
                    作为波西米亚风格中的经典因素，印花可以出现在靠枕、盖毯或是地毯上，能带来温暖感触，并制造强烈的视觉冲击。
                </div>
            </div>

        </div>
        <?php
        if (isset($frindf) && !empty($frindf)) {
            ?>
            <div class="share_box share_box_b share_box_active">
                <a href="<?php echo Url::toRoute(['/style/index', 'link_id' => $link_id]); ?>"><span class="share_btn">开始自己的风格测试</span></a>
            </div>

<?php } else { ?>
            <div class="share_box share_box_active">
                <div class="miaodian_mesng meng_top btn_miaodian">

                    <div class="miaodian_text">
                        <span class="text_title">点击右上角菜单键分享给朋友</span>
                        如果你与好友测试结果相同，你们两人都将有机会得到HAY的Kaleido拼盘，Plisse整理架，以及Quilt Sleeve电脑包。 关注「住艺」微信订阅号，10月26日将公布获奖名单。
                        <div class="text_img">
                            <img src="img/fengge/chose_style_1.jpg"  />
                            <img src="img/fengge/chose_style_2.jpg"  />
                            <img src="img/fengge/chose_style_3.jpg"  />
                        </div>					
                    </div>
                    <div class="sanjiao_box">
                        <div class="sanjiao"></div>
                    </div>
                </div>
                <span class="share_btn click_m">分享给你的小伙伴，看看谁跟你有一样的品味</span>
                <div class="cs_more"><a href="<?php echo Url::toRoute('/style/index'); ?>"><span class="more_a">再测一次</span></a><a href="<?php echo Url::toRoute('/style/chosestyle'); ?>"><span class="more_b">查看其它风格</span></a></div>
            </div>
<?php } ?>
        <div class="gloab_bottm">
            <img class="erweima" src="img/ewm/1.png"  />
            <div class="bottm_mesg">想观看和你风格类似的住艺家吗？<br>请长按识别二维码进入我们的公众号</div>

            <span class="by_ad iconfont icon-logo01"></span>
        </div>
    </body>
</html>
<?php
//var_dump($mystyle['style']);exit;
$sharelogo = '';
switch ($mystyle['style']) {
    case '波西米亚':
        $sharelogo = '/img/fenggejieguo/boximiya.png';
        break;
    case '中古':
        $sharelogo = '/img/fenggejieguo/zhonggu.png';
        break;
    case '法式古典':
        $sharelogo = '/img/fenggejieguo/fashigudian.png';
        break;
    case '工业':
        $sharelogo = '/img/fenggejieguo/gongye.png';
        break;
    case '美式':
        $sharelogo = '/img/fenggejieguo/meishi.png';
        break;
    case '和式':
        $sharelogo = '/img/fenggejieguo/heshi.png';
        break;
    case '现代简约':
        $sharelogo = '/img/fenggejieguo/xiandaijianyue.png';
        break;
    case '新中式':
        $sharelogo = '/img/fenggejieguo/xinzhongshi.png';
        break;
    default :
        $sharelogo = '/img/fenggejieguo/xinzhongshi.png';
}
?>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

<script type="text/javascript">

    wx.config({
        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: 'wx8f50ac309b04acf8', // 必填，公众号的唯一标识
        timestamp: <?= $jsarr['timestamp'] ?>, // 必填，生成签名的时间戳
        nonceStr: 'zhuyi', // 必填，生成签名的随机串
        signature: "<?= $jsarr['signature'] ?>", // 必填，签名，见附录1
        jsApiList: ['onMenuShareAppMessage', 'onMenuShareTimeline', 'checkJsApi', 'chooseImage', 'uploadImage', 'downloadImage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });
    //定义images用来保存选择的本地图片ID，和上传后的服务器图片ID

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
            title: '这个测试说我很<?= $mystyle['style'] ?>', // 分享标题
            desc: '在某种意义上,「家」就等于你,可是你真的懂自己?1分钟完成这14道测试题,找到最适合 你的家居风格。', // 分享描述
            link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=style/report&link_id=' + "<?= $link_id ?>", // 分享链接

            imgUrl: "<?php echo Yii::$app->params['frontDomain'] ?>" + '<?= $sharelogo ?>', // 分享图标
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
            title: '这个测试说我的品位很<?= $mystyle['style'] ?>...1分钟14道题,看看你对「家」的态度', // 分享标题
            link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=style/report&link_id=' + "<?= $link_id ?>", // 分享链接

            imgUrl: "<?php echo Yii::$app->params['frontDomain'] ?>" + '<?= $sharelogo ?>', // 分享图标

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

