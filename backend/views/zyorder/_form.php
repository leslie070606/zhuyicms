<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ZyOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zy-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'project_id')->textInput() ?>

    <?= $form->field($model, 'designer_id')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([0 => '待设计师确认',1 => '待用户确认时间',2 => '待见面',3 => '预约已取消',5 => '待确认见面完成',6 => '已见面',7 => '已见面未深度合作', 8 => '已深度合作未上传合同']) ?>

   <?= $form->field($model, 'appointment_time',['inputOptions'=>['type'=>'date']])->textInput() ?>
    <?= $form->field($model, 'appointment_location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'designer_spare_time')->textInput([ 'placeholder' => '三个时间，请按照格式（2000-1-1）填写，并以英文逗号分隔开三个时间！']) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_type')->dropDownList([0 => '客服创建',1 => '用户创建']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
