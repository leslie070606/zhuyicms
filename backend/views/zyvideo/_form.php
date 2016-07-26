<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\ZyVideo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zy-video-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]);?>

    <?= $form->field($model, 'video_url')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'video_image')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, "video_image")->fileInput() ?>(根据视频比例上传)

    <?= $form->field($model, 'designer_id')->textInput() ?>

    <?php // $form->field($model, 'create_time')->textInput() ?>

    <?php // $form->field($model, 'update_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<!--    <form action="<?php //echo Yii::$app->request->hostInfo.Yii::getAlias('@web') . '/zyvideo/create' ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="aa" id="qq"/>
            <button type="submit">123123123</button>
    </form>-->
</div>
