<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ZyOrder */

$this->title = "订单" . $model->order_id;
$this->params['breadcrumbs'][] = ['label' => 'Zy Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->order_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->order_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'order_id',
            'user_id',
            'project_id',
            'designer_id',
            'status',
			'designer_spare_time',
            'appointment_location',
            'appointment_time:datetime',
            'remark',
            'service_type',
            'create_time:datetime',
            'update_time:datetime',
        ],
    ]) ?>

</div>
