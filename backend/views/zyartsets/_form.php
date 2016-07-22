<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
<<<<<<< HEAD
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\ZyArtsets */
/* @var $form yii\widgets\ActiveForm */
?>

<link rel="stylesheet" type="text/css" href="css/diyUpload.css" />
<link rel="stylesheet" type="text/css" href="css/webuploader.css" />

<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="js/diyUpload.js"></script>
<script type="text/javascript" src="js/webuploader.html5only.min.js"></script>

=======

/*
<link href=<?php echo Yii::getAlias('@web')."css/diyUpload.css"?> />
*/?>
<script type="text/javascript" src="js/diyUpload.js"></script>
<script type="text/javascript" src="js/webuploader.html5only.min.js"></script>


<script>
$('#test').diyUpload({
	url:'server/fileupload.php',
	success:function( data ) {
		console.info( data );
	},
	error:function( err ) {
		console.info( err );	
	}
});

</script>
>>>>>>> zhuyimaster
<div class="zy-artsets-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'designer_id')->textInput() ?>
<<<<<<< HEAD
	<label class="control-label" for="test">作品图片</label>
	<div id="test"> </div>
	<script>

	$('#test').diyUpload({
 		url: "<?php echo Yii::getAlias('@web') . '/upimg.php' ?>",
		success:function( data ) {
			console.log( data );
		},
		error:function( err ) {
			console.info( err );
		}
	});
	</script>

	<?php
	/*
    <?= $form->field($model, 'image_ids')->widget(FileInput::classname(),['options' => ['multiple' => true]]) ?>
=======
	<div id="test"></div>
    <?= $form->field($model, 'image_ids')->widget(FileInput::classname(),['options' => ['multiple' => true]]) ?>
	<?php
	/*
>>>>>>> zhuyimaster

    <?= $form->field($model, 'video_ids')->widget(FileInput::classname(),['options' => ['multiple' => true]]) ?>


    <?= $form->field($model, 'topic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brief')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'art_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'design_cost')->textInput() ?>

    <?= $form->field($model, 'total_cost')->textInput() ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'complete_time')->textInput() ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>
	*/
	?>

    <div class="form-group"style="margin-top:100px;" >
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
