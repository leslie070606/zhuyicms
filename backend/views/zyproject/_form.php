<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ZyProject */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zy-project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'compound')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'decoration_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'covered_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'use_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'budget_design_work')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'budget_design')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'budget_ruan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'budget_ying')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'budget_yuanlin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'home_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'home_img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'favorite_img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'designer_level')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'match_json')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'project_tags')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
