<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\file\FileInput;
use yii\widgets\ActiveForm;

if (isset($model->project_tags)) {
    $project_tags = $model->project_tags;
    $project_tags_arr = explode('$', $model->project_tags);
} else {
    $project_tags = '';
    $project_tags_arr = array();
}
$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
}
$_cookieSts = \common\controllers\BaseController::checkLoginCookie();
?>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>编辑需求</title>
<link rel="stylesheet" href="css/gloab.css" />
<link rel="stylesheet" href="css/edit_demand.css" />
<link rel="stylesheet"  href="css/iconfont.css" />
<link rel="stylesheet"  href="css/submit.css" />
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
<script type="text/javascript" src="js/gloab.js" ></script>
<script type="text/javascript" src="js/submit.js" ></script>
<script type="text/javascript" src="js/ajaxfileupload.js" ></script>
<body>
     <div class="gif_loading"><img src="img/loading_1.gif" /></div>
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
                        <a abc="<?php echo Url::toRoute('/user/loginout'); ?>">暂时登出</a>

                    <?php } else { ?>

                        <a href = "<?php echo Url::toRoute('/user/login'); ?>">立即登录</a>

                    <?php }; ?>

                </li>
            </ul>
        </section> 
        <div class="down_right_zd"></div>

        <div class="out_true_box">
            <div class="out_true">
                <div class="out_true_top">确认退出登录？</div>
                <div class="out_true_bott">
                    <span class="quxiao">取消</span>
                    <a href="<?php echo Url::toRoute('/user/loginout'); ?>"><span class="queding">确定</span></a>

                </div>
            </div>
        </div>  

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
                    <span class="here_title">建筑面积</span>
                    <span class="here_meng"><?= $model->covered_area ?>平米</span>
                </div>

                <div class="edit_here">
                    <span class="here_title">开工时间</span>
                    <span class="here_meng"><?= $model->work_time ?></span>
                </div>

                <div class="edit_here">
                    <span class="here_title">服务类型</span>

                    <?php
                    if ($model->budget_design_work) {
                        ?>
                        <span class="here_meng">设计+施工</span>
                    <?php } else { ?>
                        <span class="here_meng">设计</span>
                    <?php } ?>

                </div>

                <div class="edit_here">
                    <span class="here_title">项目预算</span>
                    <span class="here_meng">
                        <?php
                        if ($model->budget_design_work) {
                            echo $model->budget_design_work . "万";
                        } else {
                            echo $model->budget_design . "万";
                        }
                        ?>
                    </span>
                </div>
                <div class="edit_here">
                    <span class="here_title">设计师类型</span>
                    <span class="here_meng"><?= $model->designer_level ?></span>
                </div>
                <span class="fill_more">填写更多需求清单</span>
                <?php
                $form = ActiveForm::begin([
                            'method' => 'post',
                            'options' => ['enctype' => 'multipart/form-data'],
                ]);
                ?>
                <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                <input class="dema_ipt" type="text"value="<?= $model->compound ?>" name="compound" placeholder="请填写居住的小区名称" />
                <div class=" submit_here">
                    <span class="here_a">请上传户型图、房屋照片</span>
                    <span class="here_b">（上传png、jpg格式，不大于4M图片）</span>
                    <div class="here_img_box">
                        <input type="hidden" name="here_imga" id="here_imga"  value="" />
                        <ul id="ula">
                            <?php
                            if (isset($initialPreview) && !empty($initialPreview)) {

                                foreach ($initialPreview as $ik => $iv):
                                    ?>
                                    <li class="abc" _v="<?php echo $iv['key']; ?>" _durl="<?php echo $iv['url'] ?>">
                                        <img src="<?php echo $iv['imgUrl']; ?>" style="height: 145px;">
                                        <i class="iconfont icon-shanchu1"></i>
                                    </li>
                                    <?php
                                endforeach;
                            }
                            ?>
                            <li class="add_img iconfont icon-tianjia upload_box" id="upload_box" >
                                <input type="file"  accept="image/*" name="upload" id="upload" onchange="ajaxFileUpload('upload')">
                            </li>
                        </ul>
                    </div>
                </div>

                <div class=" submit_here submit_herea">
                    <span class="here_a">请上传已收集的理想之家</span>
                    <span class="here_b">（上传png、jpg格式，不大于4M图片）</span>
                    <div class="here_img_box">
                        <input type="hidden" name="here_imgb" id="here_imgb" value="" />
                        <ul id="ulb">
                            <?php
                            if (isset($favorite_initialPreview) && !empty($favorite_initialPreview)) {
                            foreach ($favorite_initialPreview as $ik => $iv):
                                ?>
                                <li class="abc" _v="<?php echo $iv['key']; ?>" _durl="<?php echo $iv['url'] ?>">
                                    <img src="<?php echo $iv['imgUrl']; ?>" style="height: 145px;">
                                    <i class="iconfont icon-shanchu1"></i>
                                </li>
                                <?php
                            endforeach;
                            }
                            ?>
                            <li class="add_img iconfont icon-tianjia upload_box" id="upload_boxa">
                                <input accept="image/*" type="file" name="uploada" id="uploada" onchange="ajaxFileUpload('uploada')">
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="type_list">
                    <span class="here_a" style=" float: left; width: 100%; margin-bottom: .3rem;">对于空间，我尤其注重（可复选）</span>
                    <input type="hidden" name="project_tags" id="project_tags" value="<?= $project_tags ?>" />
                    <div>
                        <span class="left_sp list_spa"><i class="iconfont <?php
                            if (in_array('灯光及氛围', $project_tags_arr)) {
                                echo "icon-xuanzhong";
                            } else {
                                echo "icon-weixuanzhong";
                            }
                            ?>"></i>灯光及氛围</span>
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
                            if (in_array('相对独立的家庭成员空间', $project_tags_arr)) {
                                echo "icon-xuanzhong";
                            } else {
                                echo "icon-weixuanzhong";
                            }
                            ?>"></i>相对独立的家庭成员空间</span>
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
                <?php ActiveForm::end(); ?>

            </div>

        </div>

    </div>

</body>
<script type="text/javascript">
    var _uploadUrl = "<?php echo Url::to(['index/upload-image']); ?>";

    function ajaxFileUpload(fileName) {
        
        $(".down_right_zd").show().animate({
            opacity: .5
        }, 200, function () {
            $(".gif_loading").show();
        });
        $.ajaxFileUpload({
            url: _uploadUrl, //用于文件上传的服务器端请求地址
            secureuri: false, //是否需要安全协议，一般设置为false
            fileElementId: fileName, //文件上传域的ID
            dataType: 'json', //返回值类型 一般设置为json
            success: function (data, status) //服务器成功响应处理函数
            {

                var src = data.msg;
                var li_html = '<li><img src="' + src + '" /><i class="iconfont icon-shanchu1"></i></li>';
                if (data.code != 1) {
                    alert(data.msg);
                } else {
                    if (fileName == "uploada") {
                        var val_img = "";
                        $("#ulb").find("li:last-child").before(li_html)
                        img_height_auto();
                        $("#ulb li").each(function () {
                            if ($(this).hasClass("add_img") || $(this).hasClass("abc")) {

                            } else {
                                var srcc = $(this).find("img").attr("src");
                                val_img += srcc + ",";
                            }
                        });
                        $("#here_imgb").val(val_img);
                    } else {
                        var val_img = "";
                        $("#ula").find("li:last-child").before(li_html)
                        img_height_auto();
                        $("#ula li").each(function () {
                            if ($(this).hasClass("add_img") || $(this).hasClass("abc")) {

                            } else {
                                var srcc = $(this).find("img").attr("src");
                                val_img += srcc + ",";
                            }
                        });
                        $("#here_imga").val(val_img);
                        
                    }

                    touch.on(".here_img_box li", "tap", function (ev) {

                        if ($(ev.currentTarget).hasClass("abc") || $(ev.currentTarget).hasClass("add_img")) {
                            if ($(ev.currentTarget).hasClass("abc")) {
                                var _this = $(ev.currentTarget);
                                var key = $(ev.currentTarget).attr("_v");
                                var url = $(ev.currentTarget).attr("_durl");
                                $.post(url, 'key=' + key, function (data) {
                                    _this.remove();
                                    auto_click()
                                });
                            }
                        } else {
                            var ull = $(ev.currentTarget).parent("ul");
                            $(ev.currentTarget).remove();
                            var gettt = "";

                            $("#ula li").each(function () {
                                if ($(this).hasClass("add_img") || $(this).hasClass("abc")) {

                                } else {
                                    var srcc = $(this).find("img").attr("src");
                                    gettt += srcc + ",";
                                }
                            });
                            ull.prev("input").val(gettt);
                            //alert(ull.prev("input").val());
                            auto_click();

                        }
                    });
                }
                $(".down_right_zd").animate({
                            opacity: .5
                        }, 200, function () {
                            
                            $(".gif_loading,.down_right_zd").hide();
                        });
                        auto_click();
            },
            error: function (data, status, e) //服务器响应失败处理函数
            {
                alert(e);
            }
        })
        return false;
    }


</script>