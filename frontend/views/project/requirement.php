<?php

//use Yii;
use yii\helpers\Html;
?>

<div class="project-form row">

    <?= Html::beginForm(['create'], 'post',['id'=>'project-form', 'onsubmit'=>"return beforeSubmit()"]) ?>

    <div class="box-body">
        <div class="form-group">            
            <?= Html::activeDropDownList($model, 'house_type', Yii::$app->params['dictionary']['project']['house_type'], ['class' => 'form-control', 'prompt' => '点击选择房子类型']) ?>
            <?= Html::error($model, 'house_type', ['class' => 'error']); ?>
        </div>
        <div class="form-group">            
            <?= Html::activeDropDownList($model, 'completion_time', Yii::$app->params['dictionary']['project']['completion_time'], ['class' => 'form-control', 'prompt' => '点击选择期望完成工时']) ?>
            <?= Html::error($model, 'completion_time', ['class' => 'error']); ?>
        </div>
        <div class="form-group">            
            <?= Html::activeInput('text', $model, 'room_area', ['class' => 'form-control', 'placeholder' => '请填写房间使用面积（设计费按使用面积收费）']) ?>
            <?= Html::error($model, 'room_area', ['class' => 'error']); ?>
        </div>
        <div class="form-group">            
            <?= Html::activeInput('text', $model, 'budget_ceiling', ['class' => 'form-control', 'placeholder' => '请填写预算上线']) ?>
            <?= Html::error($model, 'budget_ceiling', ['class' => 'error']); ?>
        </div>
        <div class="form-group">  
            <?= Html::activeLabel($model, 'service_item', ['label' => '请选择所需要服务项目']) ?>
            <?= Html::activeCheckboxList($model, 'service_item', Yii::$app->params['dictionary']['project']['service_item'], ['class' => '']) ?>
            <?= Html::error($model, 'service_item', ['class' => 'error']); ?>
        </div>
        <div class="form-group">  
            <?= Html::activeLabel($model, 'generic_require', ['label' => '共性要求']) ?>
            <?= Html::activeCheckboxList($model, 'generic_require', Yii::$app->params['dictionary']['project']['generic_require'], ['class' => '']) ?>
            <?= Html::error($model, 'generic_require', ['class' => 'error']); ?>
        </div>
        <div class="form-group">            
            <?= Html::activeInput('area', $model, 'description', ['class' => 'form-control', 'placeholder' => '更详细的描述，更精准的匹配！（不超过2000字）']) ?>
            <?= Html::error($model, 'description', ['class' => 'error']); ?>
        </div>
        <div class="form-group">            
            <?= Html::activeInput('text', $model, 'residential_district', ['class' => 'form-control', 'placeholder' => '请填写居住的小区名称']) ?>
            <?= Html::error($model, 'residential_district', ['class' => 'error']); ?>
        </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('提交并保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?= Html::endForm(); ?>

</div>

<script>
function beforeSubmit() {
    var house_typ = $('#project-house_type').val();
    return false;
}
</script>