<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<style>
    .project-search {
        padding: 15px;
    }
</style>

<div class="project-search box box-success">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-5\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'project_id')->label("编号") ?>

    <?= $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'province') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?= $form->field($model, 'house_type')->dropDownList(Yii::$app->params['dictionary']['project']['house_type'], ['prompt'=>'请选择']) ?>

    <?php echo $form->field($model, 'completion_time')->dropDownList(Yii::$app->params['dictionary']['project']['completion_time'], ['prompt'=>'请选择']) ?>

    <?php echo $form->field($model, 'room_area') ?>

    <?php echo $form->field($model, 'budget_ceiling') ?>

    <?php // echo $form->field($model, 'service_item') ?>

    <?php // echo $form->field($model, 'generic_require') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php echo $form->field($model, 'residential_district') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'createtime') ?>

    <?php // echo $form->field($model, 'updatetime') ?>

    <div class="form-group">
        <div class="col-sm-offset-2">
        <?= Html::submitButton('筛选', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('清空', ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
