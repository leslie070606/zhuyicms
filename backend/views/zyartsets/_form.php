<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\ZyArtsets */
/* @var $form yii\widgets\ActiveForm */
?>

<link rel="stylesheet" type="text/css" href="css/diyUpload.css" />
<link rel="stylesheet" type="text/css" href="css/webuploader.css" />

<!--<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>-->
<!--<script type="text/javascript" src="js/diyUpload.js"></script>-->
<!--<script type="text/javascript" src="js/webuploader.html5only.min.js"></script>-->

<div class="zy-artsets-form">

    <?php
    $form = ActiveForm::begin([
                'method' => 'post',
                'options' => ['enctype' => 'multipart/form-data'],
    ]);
    ?>

    <?= $form->field($model, 'designer_id')->textInput() ?>
    <?= $form->field($model, 'type')->dropDownList([0 => '图片',1 => '视频']) ?>
    <?php
    // 非ActiveForm的表单  图片上传
    echo '<label class="control-label">图片</label>';
    echo FileInput::widget([
        'model' => $model,
        'attribute' => 'image_ids[]',
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
            'maxFileCount' => 10, //允许上传最多的图片5张  
            'maxFileSize' => 2000, //限制图片最大200kB  
            'uploadUrl' => Url::to(['/zyartsets/uploadimage']), //异步上传接口地址
            'uploadExtraData' => ['art_id' => $model->art_id],
            // 是否显示上传按钮，指input上面的上传按钮，非具体图片上的上传按钮
            'showUpload' => FALSE,
            // 展示图片区域是否可点击选择多文件
            //'browseOnZoneClick' => true,
            'uploadAsync' => TRUE, //配置异步上传还是同步上传  
            // 如果要设置具体图片上的移除、上传和展示按钮，需要设置该选项
            'fileActionSettings' => [
                // 设置具体图片的查看属性为false,默认为true
                'showZoom' => true,
                // 设置具体图片的上传属性为true,默认为true
                'showUpload' => true,
                // 设置具体图片的移除属性为true,默认为true
                'showRemove' => true,
            ],
        ],
    ]);


//使用ActiveForm的表单
//    echo $form->field($model, 'image_ids[]')->widget(FileInput::classname(), [
//        'options' => ['multiple' => true,'name'=>'ImgSelect'],
//    ]);
//    
    ?>

    <?= $form->field($model, 'video_ids')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'topic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brief')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'art_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'design_cost')->textInput() ?>

    <?= $form->field($model, 'total_cost')->textInput() ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?php echo $form->field($model, 'complete_time')->textInput() ?>

    <?php //$form->field($model, 'create_time')->textInput() ?>

    <?php //$form->field($model, 'update_time')->textInput() ?>

    <div class="form-group"style="margin-top:100px;" >
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
