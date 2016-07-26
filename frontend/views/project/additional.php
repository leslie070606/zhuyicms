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
                    <li><a href="designer_list.html">使用指南</a></li>
                    <li><a href="user.html">我的住艺</a></li>
                    <li><a href="designer_list.html">更多意见</a></li>
                    <li><a href="designer_list.html">暂时登出</a></li>
                </ul>
            </section> 
            <div class="down_right_zd"></div>  

            <div class="submit_box">
                <span class="submit_true">提交成功！住艺已经收到你的需求！</span>
                <span class="submit_truea">需求可随时在【我的住艺】中修改</span>
                <?= Html::beginForm('', 'post', ['id' => 'form-additional']); ?>

                <input class="dema_ipt" type="text" name="compound" placeholder="请填写居住的小区名称" />
                <div class=" submit_here">
                    <span class="here_a">请上传户型图、房屋照片</span>
                    <span class="here_b">（上传png、jpg格式，不大于4M图片）</span>
                    <div class="here_img_box">
                        <input type="hidden" value="" name='home' class="home" />
                        <ul id="ula">
                            <li class="add_img iconfont icon-tianjia"></li>
                        </ul>
                    </div>
                </div>

                <div class=" submit_here submit_herea">
                    <span class="here_a">请上传已收集的理想之家</span>
                    <span class="here_b">（上传png、jpg格式，不大于4M图片）</span>
                    <div class="here_img_box">
                        <input type="hidden" value="" name="like" class="like" />
                        <ul id="ulb">
                            <li class="add_img iconfont icon-tianjia"></li>
                        </ul>
                    </div>
                </div>

                <div class="type_list">
                	<span class="here_a" style=" float: left; width: 100%; margin-bottom: .3rem;">对于空间，我尤其注重（可复选）</span>
                    <input type="hidden" name="project_tags" id="project_tags" value="" />
                    <div>
                        <span class="left_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>灯光及光氛围</span>
                        <span class="right_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>儿童房的设计</span>
                    </div>
                    <div>
                        <span class="left_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>施工团队是否可靠</span>
                        <span class="right_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>家具和材料的环保性</span>
                    </div>
                    <div>
                        <span class="left_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>收纳整理空间</span>
                        <span class="right_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>家庭成员彼此拥有相对独立空间</span>
                    </div>
                    <div>
                        <span class="left_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>艺术品、收藏品的巧妙应用</span>
                        <span class="right_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>与众不同的个性化之家</span>
                    </div>
                </div>
                <textarea class="text_box"  name="description" id="answer-for-q-3" rows="10" placeholder="更多个性化需求，在这里告诉住艺吧！"></textarea>
                <button class="chose_btn zhihui" type="submit" disabled="true"  style="border: none;">
                    完成！立刻查看设计师！
                </button>
                <?= Html::endForm(); ?>
                <span class="center_nameaa"><a href="index.php?r=project/choose_designer&&project_id=<?=$project_id ?>">稍后再填</a></span>
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
        var u = navigator.userAgent;
        var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
        var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端

        touch.on(".add_img", "tap", function (ev) {
            var _this = $(ev.currentTarget);
            var index;
            if (_this.parents("ul").attr("id") == "ulb") {
                index = 1;
            } else {
                index = 0;
            }

            var length = $(ev.currentTarget).siblings().length;
            var likestr = '';
            var nuber = 0;

            // 拍照选择图片
            wx.chooseImage({
                count: 9, // 默认9
                sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
                sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
                success: function (res) {
                    images.localId = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片

                    var html = "";
                    // alert(indexx)
                    if (index == 1) {

                        for (var i = 0; i < images.localId.length; i++) {
                            var htmllll = images.localId[i];
                            html += '<li><img src="' + htmllll + '" value=""> <i class="iconfont icon-shanchu"></i></li>';
                            var ge = images.localId.length;
                            // 上传图片
                            wx.uploadImage({
                                localId: images.localId[i], // 需要上传的图片的本地ID，由chooseImage接口获得
                                isShowProgressTips: 1, // 默认为1，显示进度提示
                                success: function (res) {
                                    serverId = res.serverId; // 返回图片的服务器端ID
                                    likestr += serverId + "$";
                                    nuber++;
                                    if (isAndroid) {
                                        if (nuber >= ge) {
                                            var like_val = $(".like").val();
                                            $(".like").val(like_val + likestr);

                                            likestr = likestr.toString().split("$");
                                            for (var i = 0; i < $("#ulb li").length - 1; i++) {
                                                $("#ulb li:eq(" + i + ") ").prop("img_id", likestr[i]);
                                            }
                                        }
                                    } else {
                                        var like_val = $(".like").val();
                                        $(".like").val(like_val + likestr);

                                        likestr = likestr.toString().split("$");
                                        for (var i = 0; i < $("#ulb li").length - 1; i++) {
                                            $("#ulb li:eq(" + i + ") ").prop("img_id", likestr[i]);
                                        }
                                    }

                                }
                            });
                        }

                        $("#ulb").prepend(html);
                        alert($(".home").val());
                        alert($(".like").val());
                        img_height_auto();
                        auto_click();
                    } else {
                        for (var i = 0; i < images.localId.length; i++) {
                            var htmllll = images.localId[i];
                            html += '<li><img src="' + htmllll + '" value=""> <i class="iconfont icon-shanchu"></i></li>';
                            var ge = images.localId.length;
                            // 上传图片
                            wx.uploadImage({
                                localId: images.localId[i], // 需要上传的图片的本地ID，由chooseImage接口获得
                                isShowProgressTips: 1, // 默认为1，显示进度提示
                                success: function (res) {
                                    serverId = res.serverId; // 返回图片的服务器端ID
                                    likestr += serverId + "$";
                                    nuber++;
                                    if (isAndroid) {
                                        if (nuber >= ge) {
                                            var like_val = $(".home").val();
                                            $(".home").val(like_val + likestr);

                                            likestr = likestr.toString().split("$");
                                            for (var i = 0; i < $("#ula li").length - 1; i++) {
                                                $("#ula li:eq(" + i + ") ").prop("img_id", likestr[i]);
                                            }
                                        }
                                    } else {
                                        var like_val = $(".home").val();
                                        $(".home").val(like_val + likestr);
                                                 //alert($(".home").val())
                                        likestr = likestr.toString().split("$");
                                        for (var i = 0; i < $("#ula li").length - 1; i++) {
                                            $("#ula li:eq(" + i + ") ").prop("img_id", likestr[i]);
                                        }
                                    }
                                }
                            });
                        }

                        $("#ula").prepend(html);
                        alert($(".home").val());
                        alert($(".like").val());
                        img_height_auto();
                        auto_click();
                    }

                }

            })
        });

    });

</script>
