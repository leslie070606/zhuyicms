<?php
use yii\widgets\ActiveForm;
$form = ActiveForm::begin(["options" => ["enctype" => "multipart/form-data"]]); ?>


<?= $form->field($model, "name")->fileInput() ?>


    <button>vvvvvvSubmit</button>
<?php ActiveForm::end(); ?>

