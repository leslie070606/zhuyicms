<?php

use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>风格结果</title>
                <link rel="stylesheet" href="http://at.alicdn.com/t/font_1476711409_6625533.css" />

        <link rel="stylesheet" href="css/jg.css" />
        <link rel="stylesheet" href="css/flash_h.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script src="js/gloaba.js" async="async"></script>
    </head>
    <body>
        <div id="desib" class="desib_box">
            <div class="miaoshu">
                <span class="miaoshu_name"><?php echo $userInfo['nickname'] ?></span>
                <span>你清雅含蓄，</span>
                <span>是中国传统文化的研习者，</span>
                <span>是东方智慧的传承人，</span>
                <span>你最喜爱的风格是——</span>
                <span class="text_big">新中式风格</span>
            </div>
            <span class="logo iconfont icon-chusheng01"></span>
            <div class="desi_top"></div>
            <div class="desi_bottom"></div>
            <img class="des_img des_imga" src="img/flash_h/1.png" />
            <img class="des_img des_imgb" src="img/flash_h/2.png" />
            <img class="des_img des_imgc" src="img/flash_h/3.png" />
            <img class="des_img des_imgd" src="img/flash_h/4.png" />
            <img class="des_img des_imge" src="img/flash_h/5.png" />
            <img class="des_img des_imgf" src="img/flash_h/6.png" />
            <img class="des_img des_imgg des_imggb" src="img/flash_h/7.png" />
            <img class="des_img des_imgg des_imgga" src="img/flash_h/7.png" />
            <img class="des_img des_imgi des_imgib" src="img/flash_h/9.png" />
            <img class="des_img des_imgi des_imgia" src="img/flash_h/9.png" />
            <img class="des_img des_imgk" src="img/flash_h/11.png" />
            <img class="des_img des_imgl" src="img/flash_h/12.png" />
            <img class="des_img des_imgm" src="img/flash_h/13.png" />
            <img class="des_img des_imgn" src="img/flash_h/14.png" />
            <div class="miaodian_mesng miaodiana_a">
                <div class="sanjiao_box">
                    <span class="iconfont maodian_icon icon-sibianxing"></span>

                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">温暖色调</span>
                    欢快的色调会在空间中产生温暖的感觉，一些略带夸张的色彩彼此映衬，甚至还可以造成出乎意料的迷人效果。
                </div>
            </div>


            <div class="miaodian_mesng miaodiana_b">
                <div class="sanjiao_box">
                    <span class="iconfont maodian_icon icon-sibianxing"></span>
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">明式家具</span>
                    在新中式风格的家具配饰上多以造型凝炼、线条优雅的明式家具为主，而空间也因它们的存在而即刻生出端正清雅之感。
                </div>
            </div>


            <div class="miaodian_mesng miaodiana_c">
                <div class="sanjiao_box">
                    <span class="iconfont maodian_icon icon-sibianxing"></span>
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">中式屏风</span>
                    传承了传统居室里对于空间层次的讲究，中间用棂子、雕花做成古朴图案的屏风常常在新中式风格的家居环境里被用来分隔空间。
                </div>
            </div>

            <div class="miaodian_mesng miaodiana_d">
                <div class="sanjiao_box">
                    <span class="iconfont maodian_icon icon-sibianxing"></span>
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">新中式家具</span>
                    兼具中式传统家具文化内涵的同时，又满足了你对舒适度的追求，简约化了的新中式家具融入了科学的人体工学，具有严谨的结构和线条。
                </div>
            </div>

            <div class="miaodian_mesng miaodiana_e">
                <div class="sanjiao_box">
                    <span class="iconfont maodian_icon icon-sibianxing"></span>
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">文人格调的装饰</span>
                    新中式意味着在装饰细节上也充分体现崇尚自然情趣的传统美学精神，所以空间里常常穿插着文人画中山水、花鸟的形象。
                </div>
            </div>
        </div>
        <?php
        if (isset($frindf) && !empty($frindf)) {
            
            ?>
            <div class="share_box share_box_b share_box_active">
                <a href="<?php echo Url::toRoute(['/style/index','link_id'=>$link_id]);?>"><span class="share_btn">开始自己的风格测试</span></a>
            </div>

        <?php } else { ?>
            <div class="share_box share_box_active">
                <span class="share_btn">分享给你的小伙伴，看看谁跟你有一样的品味</span>
                <div class="cs_more"><a href="<?php echo Url::toRoute('/style/index'); ?>"><span class="more_a">再测一次</span></a><a href="<?php echo Url::toRoute('/style/chosestyle'); ?>"><span class="more_b">查看其它风格</span></a></div>
            </div>
        <?php } ?>
         <div class="gloab_bottm">
            <img class="erweima" src="img/ewm/8.png"  />
            <div class="bottm_mesg">想观看和你风格类似的住艺家吗？<br>请扫描上方二维码进入我们的公众号</div>

            <span class="by_ad iconfont icon-logo01"></span>
        </div>
    </body>
</html>
<?php
//var_dump($mystyle['style']);exit;
$sharelogo = '';
switch ($mystyle['style']){
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
            title: '这个测试说我很<?=$mystyle['style']?>', // 分享标题
            desc: '在某种意义上,「家」就等于你,可是你真的懂自己?1分钟完成这14道测试题,找到最适合 你的家居风格。', // 分享描述
            link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=style/report&link_id=' + "<?= $link_id ?>", // 分享链接

            imgUrl: "<?php echo Yii::$app->params['frontDomain'] ?>" + '<?=$sharelogo ?>', // 分享图标
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
            title: '这个测试说我的品位很<?=$mystyle['style']?>...1分钟14道题,看看你对「家」的态度', // 分享标题
            link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=style/report&link_id=' + "<?= $link_id ?>", // 分享链接

            imgUrl: "<?php echo Yii::$app->params['frontDomain'] ?>" + '<?=$sharelogo ?>', // 分享图标

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
