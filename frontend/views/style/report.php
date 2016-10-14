<div>
    <?php echo $userInfo['nickname']; ?>
    <img src="<?php echo $userInfo['headimgurl']; ?>" style="width: 200px; height: 200px;" />你的风格是:日式
</div>
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
            title: '测测你的风格吧二货!', // 分享标题
            desc: '测测你的风格吧二货!', // 分享描述
            link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=style/report&link_id=' + "<?= $link_id ?>", // 分享链接

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
            title: '测测你的风格吧二货', // 分享标题
            link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=style/report&link_id=' + "<?= $link_id ?>", // 分享链接

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

