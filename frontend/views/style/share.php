
<html>
    <head>
        <meta charset="utf-8">
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>

        <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

    </head>
    <body>
        <script type="text/javascript">

            wx.config({
                debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
                appId: 'wx1344a7a9fac82094', // 必填，公众号的唯一标识
                timestamp: <?= $jsarr['timestamp'] ?>, // 必填，生成签名的时间戳
                nonceStr: 'zhuyi', // 必填，生成签名的随机串
                signature: "<?= $jsarr['signature'] ?>", // 必填，签名，见附录1
                jsApiList: ['onMenuShareAppMessage', 'onMenuShareTimeline', 'checkJsApi', 'chooseImage', 'uploadImage', 'downloadImage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
            });
            //定义images用来保存选择的本地图片ID，和上传后的服务器图片ID
            var images = {
                localId: [],
                serverId: []
            };
            wx.ready(function () {

                wx.checkJsApi({
                    jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'checkJsApi', 'chooseImage', 'uploadImage', 'downloadImage'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
                    success: function (res) {
                        //alert(res);
                        // 以键值对的形式返回，可用的api值true，不可用为false
                        // 如：{"checkResult":{"chooseImage":true},"errMsg":"checkJsApi:ok"}
                    }
                });

                //分享给朋友
                wx.onMenuShareAppMessage({
                    title: '在住艺，测试出我喜欢风格1、风格2、风格3三种室内设计风格，您呢？', // 分享标题
                    desc: '住艺上线！特发明科学又好玩儿的游戏等您来！与5位好朋友一起测试喜好风格并分享，即可获得3次与给高端室内设计师面对面见面的机会。足足省了2400元呢！', // 分享描述
                    link: 'http://puti.kim/index.php?r=style/share', // 分享链接
                    imgUrl: '#', // 分享图标
                    type: '', // 分享类型,music、video或link，不填默认为link
                    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
                    success: function () {
                        // 用户确认分享后执行的回调函数
                        alert('已分享');
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
                    title: '分享给您的朋友', // 分享标题
                    link: 'http://puti.kim/index.php?r=style/share', // 分享链接
                    imgUrl: '#', // 分享图标
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
                //var ;
                // 拍照选择图片
                wx.chooseImage({
                    count: 9, // 默认9
                    sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
                    sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
                    success: function (res) {

                        $("#w").attr("src", res.localIds);
                        alert(res.localIds);
                        //images.localId = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片

                    }
                });
                document.getElementById('upload').onclick = function () {
                    //alert(88888);
                    // 上传图片
                    wx.uploadImage({
                        localId: $("#w").attr("src"), // 需要上传的图片的本地ID，由chooseImage接口获得
                        isShowProgressTips: 1, // 默认为1，显示进度提示
                        success: function (res) {
                            serverId = res.serverId; // 返回图片的服务器端ID
//                        var html = document.getElementById("a");
//                        html.innerHTML = serverId;
                            alert(serverId);

                        }
                    });
                };


                document.getElementById('download').onclick = function () {

                    wx.downloadImage({
                        serverId: serverId, // 需要下载的图片的服务器端ID，由uploadImage接口获得
                        isShowProgressTips: 1, // 默认为1，显示进度提示
                        success: function (res) {
                            var localId = res.localId; // 返回图片下载后的本地ID
                           $("#d").attr("src",localId);
                        }
                    });
                };
            });

        </script>
        <button id="upload" style="display: block;margin: 2em auto; width: 200px; height: 50px;">上传接口测试</button>
        <span style="font-size: 45px; font-weight: 15px;" id="a">登录成功!</span>


        <button id="download" style="display: block;margin: 2em auto; width: 200px; height: 50px;">下载接口测试</button>

        <img src="" id="w"/>**************************************************************

        <img src="" id="d"/>

    </body>
</html>


