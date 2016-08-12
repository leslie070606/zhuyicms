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
            'project_id',
            'designer_id',
            //'status',
			[
				'attribute' => 'status',
				'label' => '订单状态',
				'value' => function($model){
					return \common\models\ZyOrder::getStatusMessage($model->order_id);
				},
			],
            // 'appointment_location',
            // 'appointment_time:datetime',
            // 'remark',
            // 'service_type',
            // 'create_time:datetime',
            // 'update_time:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
