<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
}
$_cookieSts = \common\controllers\BaseController::checkLoginCookie();
?>
<div class="project-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-3\">{error}</div>",
            //'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>
    

    <?= $form->field($model, 'house_type')->dropDownList(Yii::$app->params['dictionary']['project']['house_type'], ['class' => 'form-control', 'prompt' => '点击选择房子类型']) ?>

    <?= $form->field($model, 'completion_time')->dropDownList(Yii::$app->params['dictionary']['project']['completion_time'], ['class' => 'form-control', 'prompt' => '点击选择期望完成工时']) ?>

    <?= $form->field($model, 'room_area')->textInput(['placeholder' => '请填写房间使用面积（设计费按使用面积收费）']) ?>

    <?= $form->field($model, 'budget_ceiling')->textInput(['placeholder' => '请填写预算上线']) ?>

    <?= $form->field($model, 'service_item',[
        'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-5\">{error}</div>",
        //'labelOptions' => ['class' => 'col-lg-2 control-label'],
    ])->checkboxList(Yii::$app->params['dictionary']['project']['service_item'])->label("请选择所需要服务项目") ?>

    <?= $form->field($model, 'generic_require',[
        'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-5\">{error}</div>",
    ])->checkboxList(Yii::$app->params['dictionary']['project']['generic_require'])->label("共性要求") ?>

    <?= $form->field($model, 'description')->textarea(['placeholder' => '更详细的描述，更精准的匹配！（不超过2000字）']) ?>

    <?= $form->field($model, 'residential_district')->textInput(['placeholder' => '请填写居住的小区名称']) ?>


    <div class="form-group">
        <?= Html::submitButton('提交并保存' , ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>