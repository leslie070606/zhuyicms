<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\file\FileInput;
use yii\widgets\ActiveForm;

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

            <div class="submit_box">
                <span class="submit_true">提交成功！住艺已经收到你的需求！</span>
                <span class="submit_truea">需求可随时在【我的住艺】中修改</span>
                <?php
                $form = ActiveForm::begin([
                            'method' => 'post',
                            'options' => ['enctype' => 'multipart/form-data'],
                ]);
                ?>
                <span class="here_a" style=" float: left; width: 100%; margin-bottom: .3rem;">请告诉我们更多信息,以便住艺为你匹配更适合的设计师</span>
                <input class="dema_ipt" type="text" name="compound" placeholder="请填写居住的小区名称" />
                <div class=" submit_here">
                    <span class="here_a">请上传户型图、房屋照片</span>
                    <span class="here_b">（上传png、jpg格式，不大于4M图片）</span>
                    <div class="here_img_box">
                        <ul id="ula">
                            <?php
                            //使用ActiveForm的表单
                            echo $form->field($model, 'home_img[]')->widget(FileInput::classname(), [
                                'options' => ['multiple' => true],
                                'pluginOptions' => [
                                    'allowedPreviewTypes' => ['image'],
                                    'allowedFileExtensions' => ['jpg', 'gif', 'png', 'jpeg'],
                                    'previewFileType' => 'image',
                                    'initialPreviewAsData' => true, // 是否展示预览图
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
                                    'browseOnZoneClick' => true,
                                    'fileActionSettings' => [
                                        // 设置具体图片的查看属性为false,默认为true
                                        'showZoom' => TRUE,
                                        // 设置具体图片的上传属性为true,默认为true
                                        'showUpload' => FALSE,
                                        // 设置具体图片的移除属性为true,默认为true
                                        'showRemove' => TRUE,
                                    ],
                                ],
                            ]);
                            ?>
                            <?php
//                            echo FileInput::widget([
//                                'model' => $model,
//                                'attribute' => 'home_img[]',
//                                //           'options' => ['multiple' => true],
//                                'name' => 'ImgSelect',
//                                'language' => 'zh-CN',
//                                'options' => ['multiple' => true, 'accept' => 'image/*'],
//                                'pluginOptions' => [
//
//                                    // 'initialPreviewConfig' => $initialPreviewConfig,  
//                                    'allowedPreviewTypes' => ['image'],
//                                    'allowedFileExtensions' => ['jpg', 'gif', 'png', 'jpeg'],
//                                    'previewFileType' => 'image',
//                                    'initialPreviewAsData' => FALSE, // 是否展示预览图
//                                    'overwriteInitial' => false,
//                                    'browseLabel' => '选择图片',
//                                    'msgFilesTooMany' => "选择上传的图片数量({n}) 超过允许的最大图片数{m}！",
//                                    'dropZoneTitle' => '点击上传文件...',
//                                    'maxFileCount' => 12, //允许上传最多的图片5张  
//                                    'maxFileSize' => 10000, //限制图片最大200kB  
//                                    // 是否显示上传按钮，指input上面的上传按钮，非具体图片上的上传按钮
//                                    'showUpload' => false,
//                                    // 展示图片区域是否可点击选择多文件
//                                    'browseOnZoneClick' => true,
//                                    'uploadAsync' => false, //配置异步上传还是同步上传  
//                                    // 如果要设置具体图片上的移除、上传和展示按钮，需要设置该选项
//                                    'fileActionSettings' => [
//                                        // 设置具体图片的查看属性为false,默认为true
//                                        'showZoom' => TRUE,
//                                        // 设置具体图片的上传属性为true,默认为true
//                                        'showUpload' => FALSE,
//                                        // 设置具体图片的移除属性为true,默认为true
//                                        'showRemove' => TRUE,
//                                    ],
//                                ],
//                            ]);
                            ?>
                        </ul>
                    </div>
                </div>

                <div class=" submit_here submit_herea">
                    <span class="here_a">请上传已收集的理想之家</span>
                    <span class="here_b">（上传png、jpg格式，不大于4M图片）</span>
                    <div class="here_img_box">
                        <ul id="ulb">
                            <?php
                            //使用ActiveForm的表单
                            echo $form->field($model, 'favorite_img[]')->widget(FileInput::classname(), [
                                'options' => ['multiple' => true, 'accept' => 'image/*'],
                                'name' => 'ImgSelect2',
                                'language' => 'zh-CN',
                                'pluginOptions' => [
                                    'allowedPreviewTypes' => ['image'],
                                    'allowedFileExtensions' => ['jpg', 'gif', 'png', 'jpeg'],
                                    'previewFileType' => 'image',
                                    'initialPreviewAsData' => false, // 是否展示预览图
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
                                    'browseOnZoneClick' => true,
                                    'fileActionSettings' => [
                                        // 设置具体图片的查看属性为false,默认为true
                                        'showZoom' => TRUE,
                                        // 设置具体图片的上传属性为true,默认为true
                                        'showUpload' => FALSE,
                                        // 设置具体图片的移除属性为true,默认为true
                                        'showRemove' => TRUE,
                                    ],
                                ],
                            ]);
                            ?>
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
                        <span class="right_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>家庭成员拥有相对独立空间</span>
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
                <?php ActiveForm::end(); ?>
                <span class="center_nameaa"><a href="index.php?r=project/choose_designer&&project_id=<?= $project_id ?>">稍后再填</a></span>
            </div>
        </div>	
    </body>
</html>
<script type="text/javascript">

</script>
