<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<div class="row">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">设计师背景图</h3>
            </div>
            <?= Html::beginForm('', 'post', ['id' => 'form-head','enctype' =>'multipart/form-data']); ?>
            <div class="box-body">
                <div class="form-group">
                    <label for="id">设计师ID</label>
                    <?= Html::activeInput('text', $model, 'id', ['class' => 'form-control', 'id' => 'id']) ?>
                    <?= Html::error($model, 'id', ['class' => 'error']); ?>
                </div>
                
                <div class="form-group">
                    <label for="image_id">背景图</label>
                    <?= Html::activeFileInput($model, 'head_imgid', ['class' => '', 'id' => 'head_imgid']) ?>
                    <?= Html::error($model, 'head_imgid', ['class' => 'error']); ?>
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
    <?php
     if(Yii::$app->getSession()->hasFlash('success')){
  
           // echo Yii::$app->getSession()->getFlash('success');   
  
     }
    ?>
</div> 
<img src="<?= Yii::$app->params['frontDomain'].Yii::$app->getSession()->getFlash('imgurl') ?>" />

