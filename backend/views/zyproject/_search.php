<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zy-project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'project_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'city') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'compound') ?>

    <?php // echo $form->field($model, 'decoration_type') ?>

    <?php // echo $form->field($model, 'covered_area') ?>

    <?php // echo $form->field($model, 'use_area') ?>

    <?php // echo $form->field($model, 'budget_design_work') ?>

    <?php // echo $form->field($model, 'budget_design') ?>

    <?php // echo $form->field($model, 'budget_ruan') ?>

    <?php // echo $form->field($model, 'budget_ying') ?>

    <?php // echo $form->field($model, 'budget_yuanlin') ?>

    <?php // echo $form->field($model, 'work_time') ?>

    <?php // echo $form->field($model, 'home_type') ?>

    <?php // echo $form->field($model, 'project_status') ?>

    <?php // echo $form->field($model, 'service_type') ?>

    <?php // echo $form->field($model, 'home_img') ?>

    <?php // echo $form->field($model, 'favorite_img') ?>

    <?php // echo $form->field($model, 'designer_level') ?>

    <?php // echo $form->field($model, 'match_json') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'project_tags') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
