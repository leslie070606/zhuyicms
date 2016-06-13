<?php

use yii\helpers\Html;
?>
    <?= Html::beginForm('', 'post', ['class' => 'form-horizontal']); ?>
<div class="form-group">
        <?= Html::label('姓名', 'name', ['class' => 'control-label col-sm-2']) ?>
    <div class="col-sm-10">
        <?= Html::activeInput('text', $model, 'name', ['class' => 'form-control']) ?>
<?= Html::error($model, 'name', ['class' => 'error']); ?>
    </div>
</div>

<div class="form-group">
        <?= Html::label('介绍', 'description', ['class' => 'control-label col-sm-2']) ?>
    <div class="col-sm-10">
        <?= Html::activeTextArea($model, 'description', ['class' => 'form-control']) ?>
<?= Html::error($model, 'description', ['class' => 'error']); ?>
    </div>
</div>

<div class="form-group">
<?= Html::submitButton("提交", ['class' => 'btn btn-primary col-sm-offset-2']); ?>
    <a href="<?= \yii\helpers\Url::to(['index']) ?>" class="btn btn-default">返回</a>
</div>

<?= Html::endForm(); ?>