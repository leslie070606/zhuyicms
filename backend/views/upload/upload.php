<?php
use yii\widgets\ActiveForm;
echo $uploadSuccessPath;
$form = ActiveForm::begin(["options" => ["enctype" => "multipart/form-data"]]); ?>


<?= $form->field($model, "name")->fileInput() ?>

<button type="submit">提交</button>
<?php ActiveForm::end(); ?>
<img src="<?= $uploadSuccessPath?>"/>
