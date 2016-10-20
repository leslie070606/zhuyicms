

<?php
$uc = new \common\util\Guolu();
$myproblemArr = explode('a', $mystyle['problem_data']);
array_pop($myproblemArr);
//echo "<pre>";
//print_r($myproblemArr);exit;
error_reporting(E_ALL^E_NOTICE^E_WARNING);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title><?= $style ?>风格</title>
         <link rel="stylesheet" href="http://at.alicdn.com/t/font_1476873842_9292777.css" />

        <link rel="stylesheet" type="text/css" href="css/gloaba.css" />
        <link rel="stylesheet" type="text/css" href="css/problem.css"  />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script>
            $(function () {

                var _hmt = _hmt || [];
                (function () {
                    var hm = document.createElement("script");
                    hm.src = "//hm.baidu.com/hm.js?c2212e69b1418d8a1b6506185b5c8bc3";
                    var s = document.getElementsByTagName("script")[0];
                    s.parentNode.insertBefore(hm, s);
                })();
                var li_legnth = $(".foin_bottom ul li").length;
                if (li_legnth == 1) {
                    $(".foin_bottom ul").hide();
                    $(".kongbaiyemian").show();
                }
                ;
            });
        </script>
    </head>
    <body>

        <?php
        switch ($style) {
            case '波西米亚' :
                echo '<div class="self_foin" style="background-color: #fff;">
            <div class="foin_top">';
                echo "<img src='img/fenggejieguo/boximiya01.png' />";
                break;
            case '复古混搭' :
                echo '<div class="self_foin" style="background-color: #fff;">
            <div class="foin_top">';
                echo "<img src='img/fenggejieguo/zhonggu01.png' />";
                break;
            case '法式古典' :
                echo '<div class="self_foin" style="background-color: #fff;">
            <div class="foin_top">';
                echo "<img src='img/fenggejieguo/fashigudian01.png' />";
                break;
            case '工业' :
                echo '<div class="self_foin" style="background-color: #fff;">
            <div class="foin_top">';
                echo "<img src='img/fenggejieguo/gongye01.png' />";
                break;
            case '美式' :
                echo '<div class="self_foin" style="background-color: #fff;">
            <div class="foin_top">';
                echo "<img src='img/fenggejieguo/meishi01.png' />";
                break;
            case '和式' :
                echo '<div class="self_foin" style="background-color: #fff;">
            <div class="foin_top">';
                echo "<img src='img/fenggejieguo/heshi01.png' />";
                break;
            case '现代简约' :
                echo '<div class="self_foin" style="background-color: #fff;">
            <div class="foin_top">';
                echo "<img src='img/fenggejieguo/xiandaijianyue01.png' />";
                break;
            case '中式' :
                echo '<div class="self_foin" style="background-color: #fff;">
            <div class="foin_top">';
                echo "<img src='img/fenggejieguo/xinzhongshi01.png' />";
                break;
            default :
            case '波西米亚' :
                echo '<div class="self_foin" style="background-color: #fff;">
            <div class="foin_top">';
                echo "<img src='img/fenggejieguo/boximiya01.png' />";
        }
        ?>
    </div>

    <div class="foin_bottom">
        <ul>
            <li class="foin_bot_title">来看一看谁是你的空间伴侣</li>
            <?php
            foreach ($friendstyle as $fs) {
                $j = 0;
                $frproblemArr = explode('a', $fs['problem_data']);
                array_pop($frproblemArr);
                for ($i = 0; $i < count($frproblemArr); $i++) {
                    if (@$frproblemArr[$i] == $myproblemArr[$i]) {
                        $j++;
                    }
                }
                $mach = $j / 14;
                $mach = number_format($mach, 2, '.', '') * 100;
                ?>
                <li>
                    <img src="<?= $fs['headimgurl'] ?>" />
                    <span class="user_name"><?php echo $uc->userTextDecode($fs['user_name']); ?></span>
                    <span class="match_number">心有灵犀度<i><?= $mach ?>%</i></span>
                </li>
            <?php } ?>
        </ul>

        <div class="kongbaiyemian" style="display: none;">
            <span style="font-size: .24rem; color: #999999;float: left; width: 100%; display: block;text-align: center; margin-top: 2rem;">快去邀请小伙伴来测试吧!</span>
             <span class="logobtn iconfont icon-chusheng01" ></span>
        </div>
    </div>
</div>
</body>

</html>
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
            title: '看看你对「家」的态度 法式?工业风?中古还是波西米亚?', // 分享标题
            desc: '如果你和我的测试结果相同，两人都将有机会得到HAY 的七巧板拼盘一套。', // 分享描述
            link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=style/index', // 分享链接

            imgUrl: "<?php echo Yii::$app->params['frontDomain'] ?>" + '/img/morenfenxiang.png', // 分享图标
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                // 用户确认分享后执行的回调函数
                alert('分享成功！');tj_ajax(6,6037,"","","分享次数");
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
            title: '法式?工业风?中古还是波西米亚? 测测你真的了解自己的家居风格吗？', // 分享标题
            link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=style/index', // 分享链接

            imgUrl: "<?php echo Yii::$app->params['frontDomain'] ?>" + '/img/morenfenxiang.png', // 分享图标

            success: function () {
                // 用户确认分享后执行的回调函数
                alert('分享成功！');tj_ajax(6,6036,"","","分享次数");
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
