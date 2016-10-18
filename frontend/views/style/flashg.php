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
        <link rel="stylesheet" href="css/flash_g.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
                <script type="text/javascript" src="js/touch-0.2.14.min.js"></script>

        <script src="js/gloaba.js" async="async"></script>
    </head>
    <body>
      <div id="desib" class="desib_box">
            <div class="miaoshu">
                <span class="miaoshu_name"><?php echo $userInfo['nickname'] ?></span>
                <span>你简单纯粹，</span>
                <span>是“Less is More”的信徒，</span>
                <span>是追寻本质的思想者，</span>
                <span>你最喜爱的风格是——</span>
                <span class="text_big">现代简约风格</span>
            </div>
            <span class="logo iconfont icon-chusheng01"></span>
            <div class="desi_top"></div>
            <div class="desi_bottom"></div>
            <img class="des_img des_imga" src="img/flash_g/1.png" />
            <img class="des_img des_imgb" src="img/flash_g/2.png" />
            <img class="des_img des_imgc" src="img/flash_g/3.png" />
            <img class="des_img des_imgd" src="img/flash_g/4.png" />
            <img class="des_img des_imge" src="img/flash_g/5.png" />
            <img class="des_img des_imgf" src="img/flash_g/6.png" />
            <img class="des_img des_imgg" src="img/flash_g/7.png" />
            <img class="des_img des_imgh" src="img/flash_g/8.png" />
            <img class="des_img des_imgi" src="img/flash_g/9.png" />
            <img class="des_img des_imgj imgtengtiao" src="img/flash_g/10.png" />
            <img class="des_img des_imgk imgtengtiao" src="img/flash_g/11.png" />
            <img class="des_img des_imgl imgtengtiao" src="img/flash_g/12.png" />
            <img class="des_img des_imgm" src="img/flash_g/13.png" />
            <div class="miaodian_mesng miaodiana_a">
                <div class="sanjiao_box">
                    <span class="iconfont maodian_icon icon-sibianxing"></span>

                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">简约风格/极简现代派</span>
                    简约，在你眼中，是最高境界的美，也是纯净的一种本质。这种本质的美，蕴藏在你身上那袭Yoji的黑衣上，也体现在你去除了所有冗赘装饰的家里——动线分明、井然有序的空间规划，功能化的组合沙发与内嵌储物柜，无处不在的抽象几何造型和利落直线，甚至是让人直面大片天空的通透玻璃窗……所有一切都在暗示，平淡素静比华丽繁缛更加崇高。是的，在你眼中，“Less is More”的主张不仅是一种设计风格，而且也是一种生活方式。
                </div>
            </div>


            <div class="miaodian_mesng miaodiana_b">
                <div class="sanjiao_box">
                    <span class="iconfont maodian_icon icon-sibianxing"></span>
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">设计款灯具</span>
                    设计感极强的大型灯具是体现简约风格最有力的手段，造型各异的它担当了使线条灵动的重任，往往成为空间的亮点。
                </div>
            </div>


            <div class="miaodian_mesng miaodiana_c">
                <div class="sanjiao_box">
                    <span class="iconfont maodian_icon icon-sibianxing"></span>
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">强烈色彩比对</span>
                    现代风格中，颜色搭配以明快活力的色彩为主，大胆灵活地使用明黄、宝蓝、白、黑等高饱和度色彩，极易彰显个性。
                </div>
            </div>

            <div class="miaodian_mesng miaodiana_d">
                <div class="sanjiao_box">
                    <span class="iconfont maodian_icon icon-sibianxing"></span>
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">极简派家具</span>
                    简洁、轻便而又充满雕塑美的极简派家具，造型摈弃赘饰，线条流畅，使得设计在视觉上获得一种新的统一和流动性。
                </div>
            </div>

            <div class="miaodian_mesng miaodiana_e">
                <div class="sanjiao_box">
                    <span class="iconfont maodian_icon icon-sibianxing"></span>
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">抽象几何造型</span>
                    在简约风格的家中，富于动感和活力的抽象几何造型无处不在，帮助打破空间的沉闷。
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
            <img class="erweima" src="img/ewm/7.png"  />
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

