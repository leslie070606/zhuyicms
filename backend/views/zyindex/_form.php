<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ZyIndex */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zy-index-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'designer_id')->textInput() ?>

    <?= $form->field($model, 'designer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'designer_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video_id')->textInput() ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
