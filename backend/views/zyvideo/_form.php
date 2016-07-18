<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ZyVideo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zy-video-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'video_url')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'video_image')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, "video_image")->fileInput() ?>(根据视频比例上传)

    <?= $form->field($model, 'designer_id')->textInput() ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
