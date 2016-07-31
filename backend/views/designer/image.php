<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<div class="row">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">设计师头像管理</h3>
            </div>
            <?= Html::beginForm('', 'post', ['id' => 'form-head','enctype' =>'multipart/form-data']); ?>
            <div class="box-body">
                <div class="form-group">
                    <label for="id">设计师ID</label>
                    <?= Html::activeInput('text', $model, 'id', ['class' => 'form-control', 'id' => 'id']) ?>
                    <?= Html::error($model, 'id', ['class' => 'error']); ?>
                </div>
                
                <div class="form-group">
                    <label for="image_id">头像</label>
                    <?= Html::activeFileInput($model, 'image_id', ['class' => '', 'id' => 'image_id']) ?>
                    <?= Html::error($model, 'image_id', ['class' => 'error']); ?>
                </div>
                
            </div>
            <!-- /.box-body -->
            <div class="box-footer"style='text-align: center;'>
                <button class="btn btn-primary pull-left" type="submit" >提交</button>
                <label class="control-label" id="secuss" style="color:#00a65a;margin-top: 5px; display: none;"><i class="fa fa-check"></i> Input with success</label>
            </div>
            <?= Html::endForm(); ?>
        </div>
    </div>
</div> 
