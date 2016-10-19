
<?php

use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" href="http://at.alicdn.com/t/font_1476711409_6625533.css" />
        <title>风格测试</title>
        <link rel="stylesheet" type="text/css" href="css/gloaba.css" />
        <style>
            .gloab { position: relative; text-align: center; width: 100%; height: 100%;  overflow: hidden;}
            .gloab_btn { background: #ff4e38; font-size: .26rem; position: absolute; width:92% ; left: 4%; bottom:.3rem; height: .88rem;}
            .gloab_btn a { display: block; text-align: center; color: #FFFFFF; line-height: .88rem;}
            .index_bottom_text { text-align: left; position: absolute; left: 0; bottom:1.58rem; font-size: .24rem; color: #999999; width: 92%; margin: 0 4%;}
            .logoa { font-size: 1.6rem; color: #FF4E38;  position: relative; top: .3rem; z-index: 99;}
            .index_img { width: 100%; position: absolute; width: 100%; bottom: 3.5rem; left: 0;}
        </style>
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
    </head>
    <body>
        <div class="gloab desib_box">
            <span class="iconfont logoa icon-logo01"></span>
            <img class="index_img" src="img/fengge/shouye.png"/>
            <div class="index_bottom_text">
                在某种程度上，家就等于你。然而，工业风、波西米亚、复古混搭、美式... 或许你一直不太清楚这些风格有什么样的意义。
                <br><br>1分钟，完成这14道测试题，通过住艺的洞察和判断，找到最适合你的家居风格。
            </div>
            <span class="gloab_btn"><a href="javascript:">开始测试</a></span>
        </div>
    </body>
</html>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

<script type="text/javascript">
    
        $(".gloab_btn").on("click",function(){
             tj_ajax(6, 6018, "", "", "答题");
           window.location= "<?php echo Url::toRoute(['/style/problem', 'link_id' => $link_id]); ?>";
        });
        
        function tj_ajax(a, b, c, d, e) {
                $.ajax({
                    type: "get",
                    data: "",
                    url: "http://zhuyihome.com/index.php?r=data-count-api/create&mtId=" + a + "&mdId=" + b + "&userId=" + c + "&designerId=" + d + "&mMark=" + e + "",
                    async: true,
                    success: function (data) {}
                });
            }
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
