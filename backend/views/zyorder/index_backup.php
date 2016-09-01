<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '订单管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建订单', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'order_id',
            'user_id',
			[
				'attribute' => 'designer_id',
				'format' => 'raw',
				'value' => function($data){
					return Html::a($data->designer_id,['designer/detail','id' => $data->designer_id],['title' => '']);
				}
			],
			[
				'attribute' => 'project_id',
				'format' => 'raw',
				'value' => function($data){
					return Html::a($data->project_id,['zyproject/view','id' => $data->project_id],['title' => '']);
				}
			],
			[
				'attribute' => 'status',
				'label' => '订单状态',
				'value' => function($model){
					return \common\models\ZyOrder::getStatusMessage($model->order_id);
				},
			],
			[
				'attribute' => 'designer_id',
				'label' => '设计师名字',
				'format' => 'raw',
				'value' => function($model){
					return \common\models\ZyOrder::getDesignerName($model->designer_id);
				}
			],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
