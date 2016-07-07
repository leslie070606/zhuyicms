<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ZyUserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zy-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'project_id') ?>

    <?= $form->field($model, 'style_id') ?>

    <?= $form->field($model, 'favored_designer_ids') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'openid') ?>

    <?php // echo $form->field($model, 'nickname') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'profession') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'language') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'headimgurl') ?>

    <?php // echo $form->field($model, 'unionid') ?>

    <?php // echo $form->field($model, 'privilege') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
