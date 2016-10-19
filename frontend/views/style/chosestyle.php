
<?php

use yii\helpers\Url;

$xianshi = 1;
$titile = '风格匹配度';
if (count($styleArr) > 0) {
    
} else {
    $xianshi = 0;
    $titile = '风格选择';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title><?= $titile ?></title>
        <link rel="stylesheet" type="text/css" href="css/gloaba.css" />
        <link rel="stylesheet" type="text/css" href="css/problem.css"  />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
    </head>
    <script >
        $(function () {
            var xianshi = <?= $xianshi ?>;
            if (xianshi == 0) {
                $(".match_nuber").remove();
            }
        });

    </script>
    <body>
        <div class="chose_box chose_boxa">
            <a class="chose_here" href="<?php echo Url::to(['style/report', 'flash' => 'a']); ?>"><div><img src="img/fenggejieguo/boximiya.png" /><span>波西米亚<i class="match_nuber"><?php if (isset($styleArr['a'])) {
    echo $styleArr['a'] * 3;
} else {
    echo '0';
} ?><span>%</span></i></span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report', 'flash' => 'b']); ?>"><div><img src="img/fenggejieguo/zhonggu.png" /><span>复古混搭<i class="match_nuber"><?php if (isset($styleArr['b'])) {
    echo $styleArr['b'] * 3;
} else {
    echo '0';
} ?><span>%</span></i></span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report', 'flash' => 'c']); ?>"><div><img src="img/fenggejieguo/fashigudian.png" /><span>法式古典<i class="match_nuber"><?php if (isset($styleArr['c'])) {
    echo $styleArr['c'] * 3;
} else {
    echo '0';
} ?><span>%</span></i></span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report', 'flash' => 'd']); ?>"><div><img src="img/fenggejieguo/gongye.png" /><span>工业<i class="match_nuber"><?php if (isset($styleArr['d'])) {
    echo $styleArr['d'] * 3;
} else {
    echo '0';
} ?><span>%</span></i></span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report', 'flash' => 'e']); ?>"><div><img src="img/fenggejieguo/meishi.png" /><span>美式<i class="match_nuber"><?php if (isset($styleArr['e'])) {
    echo $styleArr['e'] * 3;
} else {
    echo '0';
} ?><span>%</span></i></span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report', 'flash' => 'f']); ?>"><div><img src="img/fenggejieguo/heshi.png" /><span>和式<i class="match_nuber"><?php if (isset($styleArr['f'])) {
    echo $styleArr['f'] * 3;
} else {
    echo '0';
} ?><span>%</span></i></span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report', 'flash' => 'g']); ?>"><div><img src="img/fenggejieguo/xiandaijianyue.png" /><span>现代简约<i class="match_nuber"><?php if (isset($styleArr['g'])) {
    echo $styleArr['g'] * 3;
} else {
    echo '0';
} ?><span>%</span></i></span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report', 'flash' => 'h']); ?>"><div><img src="img/fenggejieguo/xinzhongshi.png" /><span>中式<i class="match_nuber"><?php if (isset($styleArr['h'])) {
    echo $styleArr['h'] * 3;
} else {
    echo '0';
} ?><span>%</span></i></span></div></a>
        </div>
        <div class="chose_sylt_btn"><a href="javascript:js_back();">返回我的风格结果</a></div>
    </body>
</html>
<script type="text/javascript">
    function js_back() {
        window.history.back(-1);
    }
</script>
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

