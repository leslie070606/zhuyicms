<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ZyArtsets */

$this->title = $model->art_id;
$this->params['breadcrumbs'][] = ['label' => 'Zy Artsets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-artsets-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->art_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->art_id], [
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
            'art_id',
            'designer_id',
            'image_ids',
            'video_ids',
            'topic',
            'brief',
            'art_path',
            'location',
            'city',
            'address',
            'design_cost',
            'total_cost',
            'remark:ntext',
            'sort',
            'complete_time:datetime',
            'create_time:datetime',
            'update_time:datetime',
        ],
    ]) ?>

</div>
