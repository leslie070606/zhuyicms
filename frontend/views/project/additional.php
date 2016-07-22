<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>提交需求</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/submit.css" />
        <link rel="stylesheet"  href="css/iconfont.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script type="text/javascript" src="js/submit.js" ></script>

    </head>
    <body>

        <div class="submit_box">
            <header class="header_top iconfont icon-logo">
                <!--<input id="ipt" type="text" value="0" />-->
                <span class="top_right iconfont icon-gongneng"></span>
            </header>
            <section class="down_right">
                <ul>
                    <li><a href="index.html">首页</a></li>
                    <li><a href="designer_list.html">住艺设计师</a></li>
                    <li><a href="style_test.html">风格测试</a></li>
                    <li><a href="designer_list.html">使用指南</a></li>
                    <li><a href="user.html">我的住艺</a></li>
                    <li><a href="designer_list.html">意见反馈</a></li>
                    <li><a href="designer_list.html">退出登录</a></li>
                </ul>
            </section> 
            <div class="down_right_zd"></div>  

            <div class="submit_box">
                <span class="submit_true">提交成功</span>
                <span class="submit_truea">需求可以在我的住艺里修改</span>
                <?= Html::beginForm('', 'post', ['id' => 'form-additional']); ?>

                <input class="dema_ipt" type="text" placeholder="请填写居住的小区名称" />
                <div class=" submit_here">
                    <span class="here_a">上传户型图、家的照片（最多上传10张）</span>
                    <span class="here_b">（上传png... 不大于＊k图片）</span>
                    <div class="here_img_box">
                        <ul>
<!--                        <li><img src="img/home_page/1.jpg"/><i class="iconfont icon-shanchu"></i></li>
                            <li><img src="img/home_page/1.jpg"/><i class="iconfont icon-shanchu"></i></li>
                            <li><img src="img/home_page/1.jpg"/><i class="iconfont icon-shanchu"></i></li>-->
                            <li class="add_img iconfont icon-tianjia"></li>
                        </ul>
                    </div>
                </div>

                <div class=" submit_here submit_herea">
                    <span class="here_a">上传已收集的喜欢照片（最多上传10张）</span>
                    <span class="here_b">（上传png... 不大于＊k图片）</span>
                    <div class="here_img_box">
                        <ul id="ulb">
                            <li class="add_img iconfont icon-tianjia"></li>
                        </ul>
                    </div>
                </div>

                <div class="type_list">
                    <div>
                        <span class="left_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>注重灯光设计</span>
                        <span class="right_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>注重儿童房设计</span>
                    </div>
                    <div>
                        <span class="left_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>注重施工团队认证</span>
                        <span class="right_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>注重家具极其环保材质</span>
                    </div>
                    <div>
                        <span class="left_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>注重收纳整理设计</span>
                        <span class="right_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>注重各自均有独立空间</span>
                    </div>
                    <div>
                        <span class="left_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>注重收藏品等爱好满足</span>
                        <span class="right_sp list_spa"><i class="iconfont icon-xuanzhong"></i>注重独特创新的亮点</span>
                    </div>
                </div>
                <textarea class="text_box"  name="answer-for-q-3" id="answer-for-q-3" rows="10" placeholder="更详细的描述，更精准的匹配！（不超过2000字）"></textarea>
                <a href="Choose_designer.html"><div class="chose_btn">
                        提交并查看设计师
                    </div></a>
                <?= Html::endForm(); ?>
                <span class="center_nameaa"><a href="index.php?r=project/choose_designer">跳过</a></span>
            </div>
        </div>	
    </body>
</html>
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


        touch.on(".add_img", "tap", function (ev) {
            var _this=$(ev.currentTarget);
            
            var length = $(ev.currentTarget).siblings().length;
            if (length < 10) {


                // 拍照选择图片
                wx.chooseImage({
                    count: 9, // 默认9
                    sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
                    sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
                    success: function (res) {

                        //$("#w").attr("src", res.localIds);
                        //alert(res.localIds);
                        images.localId = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                        //alert(images.localId[0]);
                        var html = "";
                        for (var i = 0; i < images.localId.length; i++) {
                            html += '<li><img src="' + res.localIds[i] + '"> <i class="iconfont icon-shanchu"></i></li>';
                        }
                        alert(html)
                        
                       $("#ulb").prepend(html);
                        img_height_auto();
                        alert($("#ulb").html())
                    }
                });

            } else {
                return false;
            }
            ;
        });


    });
</script>
