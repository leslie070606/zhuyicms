<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
$this->title = '需求管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="zy-message-test">
	<div class="table  table-bordered">
		<table class="table table-hover">
		    <caption>
            	<h2>最新通知</h2>
            </caption>
			<tbody>
				<?php
					echo json_encode($data);	
				?>
			</tbody>
		</table>
	</div>
	<div class "table table-bordered">
		<table class="table table-hover">
		<caption>
		</caption>
</div>
