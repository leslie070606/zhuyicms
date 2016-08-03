<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\file\FileInput;
use yii\widgets\ActiveForm;
if (isset($model->project_tags)) {
    $project_tags_arr = explode('$', $model->project_tags);
} else {
    $project_tags_arr = array();
}
$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
}
?>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>编辑需求</title>
<link rel="stylesheet" href="css/gloab.css" />
<link rel="stylesheet" href="css/edit_demand.css" />
<link rel="stylesheet"  href="css/iconfont.css" />
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
<script type="text/javascript" src="js/gloab.js" ></script>
<script type="text/javascript" src="js/submit.js" ></script>

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
                <?php
                $form = ActiveForm::begin([
                            'method' => 'post',
                            'options' => ['enctype' => 'multipart/form-data'],
                ]);
                ?>

                <input class="dema_ipt" type="text"value="<?= $model->compound ?>" name="compound" placeholder="请填写居住的小区名称" />
                <div class=" submit_here">
                    <span class="here_a">请上传户型图、房屋照片</span>
                    <span class="here_b">（上传png、jpg格式，不大于4M图片）</span>
                    <div class="here_img_box">
                        <ul id="ula">
                            <?php
                            echo FileInput::widget([
                                'model' => $model,
                                'attribute' => 'home_img[]',
                                //           'options' => ['multiple' => true],
                                'name' => 'ImgSelect',
                                'language' => 'zh-CN',
                                'options' => ['multiple' => true, 'accept' => 'image/*'],
                                'pluginOptions' => [

                                    'initialPreview' => $imgurl,
                                    // 'initialPreviewConfig' => $initialPreviewConfig,  
                                    'allowedPreviewTypes' => ['image'],
                                    'allowedFileExtensions' => ['jpg', 'gif', 'png'],
                                    'previewFileType' => 'image',
                                    'initialPreviewAsData' => true, // 是否展示预览图
                                    'initialPreviewConfig' => $initialPreview,
                                    'overwriteInitial' => false,
                                    'browseLabel' => '选择图片',
                                    'msgFilesTooMany' => "选择上传的图片数量({n}) 超过允许的最大图片数{m}！",
                                    'dropZoneTitle' => '点击上传文件...',
                                    'maxFileCount' => 12, //允许上传最多的图片5张  
                                    'maxFileSize' => 10000, //限制图片最大200kB  
                                    'uploadUrl' => Url::to(['/index/uploadimage']), //异步上传接口地址
                                    'uploadExtraData' => ['project_id' => $model->project_id],
                                    // 是否显示上传按钮，指input上面的上传按钮，非具体图片上的上传按钮
                                    'showUpload' => false,
                                    // 展示图片区域是否可点击选择多文件
                                    //'browseOnZoneClick' => true,
                                    'uploadAsync' => TRUE, //配置异步上传还是同步上传  
                                    // 如果要设置具体图片上的移除、上传和展示按钮，需要设置该选项
                                    'fileActionSettings' => [
                                        // 设置具体图片的查看属性为false,默认为true
                                        'showZoom' => TRUE,
                                        // 设置具体图片的上传属性为true,默认为true
                                        'showUpload' => true,
                                        // 设置具体图片的移除属性为true,默认为true
                                        'showRemove' => TRUE,
                                    ],
                                ],
                            ]);
                            ?>
                        </ul>
                    </div>
                </div>

                <div class=" submit_here submit_herea">
                    <span class="here_a">请上传已收集的理想之家</span>
                    <span class="here_b">（上传png、jpg格式，不大于4M图片）</span>
                    <div class="here_img_box">
                        <ul id="ulb">
                     
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
                <?php ActiveForm::end(); ?>

            </div>

        </div>

    </div>

</body>
