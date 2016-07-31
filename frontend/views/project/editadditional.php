<?php

use yii\helpers\Html;
use yii\helpers\Url;

$project_tags_arr = explode('$', $model->project_tags);

$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>编辑需求</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/edit_demand.css" />
        <link rel="stylesheet"  href="css/iconfont.css" />
        <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/gloab.js" ></script>

    </head>
    <body>
        <div class="edit_box">
            <header class="header_top iconfont icon-logo">
                    <!--<input id="ipt" type="text" value="0" />-->
                <span class="top_right iconfont icon-gongneng"></span>
            </header>
            <section class="down_right">
                <ul>
                    <li><a href="<?php echo Url::toRoute('/index/index'); ?>">首页</a></li>
                    <li><a href="<?php echo Url::toRoute('/designer/list'); ?>">住艺设计师</a></li>
                    <li><a href="<?php echo Url::toRoute('/zyzhinan/guide'); ?>">设计指南</a></li>
                    <li><a href="<?php echo Url::toRoute('/order/list'); ?>">我的住艺</a></li>
                    <li><a href="<?php echo Url::toRoute('/user/feedback'); ?>">更多建议</a></li>
                    <li>   <?php if ($session->get('user_id')) { ?>
                            <a href="<?php echo Url::toRoute('/user/loginout'); ?>">暂时登出</a>

                        <?php } else { ?>

                            <a href = "<?php echo Url::toRoute('/user/login'); ?>">立即登录</a>

                        <?php }; ?>

                    </li>
                </ul>
            </section> 
            <div class="down_right_zd"></div>  

            <div class="edit">

                <div class="submit_box">
                    <div class="edit_top">
                        需求单：<?= $model->project_num ?>
                    </div>
                    <div class="edit_here">
                        <span class="here_title">城市</span>
                        <span class="here_meng"><?= $model->city ?></span>
                    </div>
                    <div class="edit_here">
                        <span class="here_title">住宅类型</span>
                        <span class="here_meng"><?= $model->home_type ?></span>
                    </div>
                    <div class="edit_here">
                        <span class="here_title">住宅面积</span>
                        <span class="here_meng"><?= $model->covered_area ?></span>
                    </div>

                    <div class="edit_here">
                        <span class="here_title">开工时间</span>
                        <span class="here_meng"><?= $model->work_time ?></span>
                    </div>

                    <div class="edit_here">
                        <span class="here_title">项目预算</span>
                        <span class="here_meng">
                            <?php
                            if ($model->budget_design_work) {
                                echo "设计+施工  预算上限" . $model->budget_design_work . "万 <br/>（包括设计费；施工人工费；辅助／主材费）";
                            } else {
                                echo "设计:预算上限" . $model->budget_design . "万 <br/>";
                            }
                            ?>
                        </span>
                    </div>
                    <div class="edit_here">
                        <span class="here_title">设计师类型</span>
                        <span class="here_meng"><?= $model->designer_level ?></span>
                    </div>
                    <span class="fill_more">填写更多需求清单</span>
                    <?= Html::beginForm('', 'post', ['id' => 'form-additional']); ?>

                    <input class="dema_ipt" type="text"value="<?= $model->compound ?>" name="compound" placeholder="请填写居住的小区名称" />
                    <div class=" submit_here">
                        <span class="here_a">请上传户型图、房屋照片</span>
                        <span class="here_b">（上传png、jpg格式，不大于4M图片）</span>
                        <div class="here_img_box">
                            <input type="hidden" value="" name='home' class="home" />
                            <input type="hidden" value="1,2" name='homeImgId' class="imgID" />

                            <ul id="ula">
                                <li><img src="img/home_page/1.jpg" imageId="1"/><i class="iconfont icon-shanchu1"></i></li>
                                <li><img src="img/home_page/1.jpg" imageId="2"/><i class="iconfont icon-shanchu1"></i></li>
                                <li><img src="img/home_page/1.jpg" /><i class="iconfont icon-shanchu1"></i></li>
                                <li><img src="img/home_page/1.jpg" /><i class="iconfont icon-shanchu1"></i></li>
                                <li class="add_img iconfont icon-tianjia"></li>
                            </ul>
                        </div>
                    </div>

                    <div class=" submit_here submit_herea">
                        <span class="here_a">请上传已收集的理想之家</span>
                        <span class="here_b">（上传png、jpg格式，不大于4M图片）</span>
                        <div class="here_img_box">
                            <input type="hidden" value="" name='like' class="home" />
                            <input type="hidden" value="" name='likeImgId' class="imgID" />
                            <ul id="ulb">
                                <li><img src="img/home_page/1.jpg"/><i class="iconfont icon-shanchu1"></i></li>
                                <li><img src="img/home_page/1.jpg"/><i class="iconfont icon-shanchu1"></i></li>
                                <li class="add_img iconfont icon-tianjia"></li>
                            </ul>
                        </div>
                    </div>

                    <div class="type_list">
                        <span class="here_a" style=" float: left; width: 100%; margin-bottom: .3rem;">对于空间，我尤其注重（可复选）</span>
                        <input type="hidden" name="project_tags" id="project_tags" value="" />
                        <div>
                            <span class="left_sp list_spa"><i class="iconfont <?php
                                if (in_array('灯光及光氛围', $project_tags_arr)) {
                                    echo "icon-xuanzhong";
                                } else {
                                    echo "icon-weixuanzhong";
                                }
                                ?>"></i>灯光及光氛围</span>
                            <span class="right_sp list_spa"><i class="iconfont <?php
                                if (in_array('儿童房的设计', $project_tags_arr)) {
                                    echo "icon-xuanzhong";
                                } else {
                                    echo "icon-weixuanzhong";
                                }
                                ?>"></i>儿童房的设计</span>
                        </div>
                        <div>
                            <span class="left_sp list_spa"><i class="iconfont <?php
                                if (in_array('施工团队是否可靠', $project_tags_arr)) {
                                    echo "icon-xuanzhong";
                                } else {
                                    echo "icon-weixuanzhong";
                                }
                                ?>"></i>施工团队是否可靠</span>
                            <span class="right_sp list_spa"><i class="iconfont <?php
                                if (in_array('家具和材料的环保性', $project_tags_arr)) {
                                    echo "icon-xuanzhong";
                                } else {
                                    echo "icon-weixuanzhong";
                                }
                                ?>"></i>家具和材料的环保性</span>
                        </div>
                        <div>
                            <span class="left_sp list_spa"><i class="iconfont <?php
                                if (in_array('收纳整理空间', $project_tags_arr)) {
                                    echo "icon-xuanzhong";
                                } else {
                                    echo "icon-weixuanzhong";
                                }
                                ?>"></i>收纳整理空间</span>
                            <span class="right_sp list_spa"><i class="iconfont <?php
                                if (in_array('家庭成员拥有相对独立空间', $project_tags_arr)) {
                                    echo "icon-xuanzhong";
                                } else {
                                    echo "icon-weixuanzhong";
                                }
                                ?>"></i>家庭成员彼此拥有相对独立空间</span>
                        </div>
                        <div>
                            <span class="left_sp list_spa"><i class="iconfont <?php
                                if (in_array('艺术品、收藏品的巧妙应用', $project_tags_arr)) {
                                    echo "icon-xuanzhong";
                                } else {
                                    echo "icon-weixuanzhong";
                                }
                                ?>"></i>艺术品、收藏品的巧妙应用</span>
                            <span class="right_sp list_spa"><i class="iconfont <?php
                                if (in_array('与众不同的个性化之家', $project_tags_arr)) {
                                    echo "icon-xuanzhong";
                                } else {
                                    echo "icon-weixuanzhong";
                                }
                                ?>"></i>与众不同的个性化之家</span>
                        </div>
                    </div>
                    <textarea class="text_box" name="description" id="answer-for-q-3" rows="10" placeholder="更多个性化需求，在这里告诉住艺吧！"><?= $model->description ?></textarea>
                    <button class="chose_btn zhihui" type="submit"  style="border: none;">
                        保存
                    </button>
                    <?= Html::endForm(); ?>

                </div>

            </div>

        </div>	
    </body>
</html>
<script>

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



    });
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

                                    uploadIOS(images.localId[i], i);
                                    //alert(nuber);

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
                    //alert($(".home").val());
                    //alert($(".like").val());
                    img_height_auto();
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
                    //alert($(".home").val());
                    //alert($(".like").val());
                    img_height_auto();
                }

            }

        })
    });

    function uploadIOS(localId, i) {
        wx.uploadImage({
            localId: localId,
            success: function (res) {
                serverIds.push(res.serverId);
                i++;
                if (i < length) {
                    upload(localId, i);
                } else {
                    alert("serverIds" + serverIds);
                }
            }
        })
    }





    $(function () {
        img_height_auto();
        $(".here_img_box").each(function () {
            var _this = $(this);
            var val = "";
            _this.find("ul li img").each(function () {
                var src = $(this).attr("imageid");
                val += src + ",";
            })
            _this.find(".imgID").val(val);
        });

        $("body").on("click", ".here_img_box li", function (ev) {
            if ($(this).hasClass("add_img")) {
            } else {

                var ull = $(this).parents(".here_img_box");
                var val = "";
                var vala = "";
                $(this).remove();
                ull.find("img").each(function () {
                    if ($(this).attr("imageId")) {
                        vala += $(this).attr("imageId") + ",";
                        ;
                    } else {
                        val += $(this).attr("src") + ",";
                    }
                });
                ull.find(".home").val(val);
                ull.find(".imgID").val(vala);

            }
        });

    });



    function img_height_auto() {
        var width = $(".here_img_box li img").width();
        $(".here_img_box li img").css("height", width);
        $(".add_img").css({"width": width, "height": width});

    }
</script>