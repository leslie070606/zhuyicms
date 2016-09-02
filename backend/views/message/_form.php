<?php
	use yii\helpers\Html;
?>
<style>
.error{color:red;}
</style>
<?=Html::beginForm('' , 'post' , ['class' => 'form-horizontal']);?>

<div class="form-group">
	<?=Html::label('内容：' , 'contents' , ['class' => 'control-label col-sm-2'])?>
	<div class="col-sm-10">
		<?=Html::activeInput('text' , $model , 'contents' , ['class' => 'form-control'])?>
		<?=Html::error($model , 'contents' , ['class' => 'error']);?>
	</div>
</div>
<div class="form-group">
	<?=Html::label('link：' , 'link' , ['class' => 'control-label col-sm-2'])?>
	<div class="col-sm-10">
		<?=Html::activeTextArea($model , 'link' , ['class' => 'form-control'])?>
		<?=Html::error($model , 'link' , ['class' => 'error']);?>
	</div>
</div>

<div class="form-group">
	<?=Html::label('类型：' , 'type' , ['class' => 'control-label col-sm-2'])?>
	<div class="col-sm-10">
    	<?=Html::activeInput('text' , $model , 'type' , ['class' => 'form-control'])?>
		<?=Html::error($model , 'type' , ['class' => 'error']);?>
	</div>
</div>

<div class="form-group">
	<?=Html::label('状态：' , 'status' , ['class' => 'control-label col-sm-2'])?>
	<div class="col-sm-10">
		<?=Html::activeTextArea($model , 'status' , ['class' => 'form-control'])?>
		<?=Html::error($model , 'status' , ['class' => 'error']);?>
	</div>
</div>

<div class="form-group">
	<?=Html::label('通知时间：' , 'create_time' , ['class' => 'control-label col-sm-2'])?>
	<div class="col-sm-10">
		<?=Html::activeTextArea($model , 'create_time' , ['class' => 'form-control'])?>
		<?=Html::error($model , 'create_time' , ['class' => 'error']);?>
	</div>
</div>

<div class="form-group">
	<?=Html::label('阅读时间：' , 'update_time' , ['class' => 'control-label col-sm-2'])?>
	<div class="col-sm-10">
		<?=Html::activeTextArea($model , 'update_time' , ['class' => 'form-control'])?>
		<?=Html::error($model , 'update_time' , ['class' => 'error']);?>
	</div>
</div>

<div class="form-group">
	<?=Html::submitButton("提交" , ['class' => 'btn btn-primary col-sm-offset-2']);?>
	<a href="<?=\yii\helpers\Url::to(['index'])?>" class="btn btn-default">返回</a>
</div>

<?=Html::endForm();?>
