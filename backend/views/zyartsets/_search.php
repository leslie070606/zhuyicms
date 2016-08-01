<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ArtsetsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zy-artsets-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'art_id') ?>

    <?= $form->field($model, 'designer_id') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'image_ids') ?>

    <?= $form->field($model, 'video_ids') ?>

    <?= $form->field($model, 'topic') ?>

    <?php // echo $form->field($model, 'brief') ?>

    <?php // echo $form->field($model, 'art_path') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'design_cost') ?>

    <?php // echo $form->field($model, 'total_cost') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'complete_time') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
