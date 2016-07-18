<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ZyVideo */

$this->title = $model->video_id;
$this->params['breadcrumbs'][] = ['label' => 'Zy Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-video-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->video_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->video_id], [
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
            'video_id',
            'video_url:url',
            'video_image',
            'designer_id',
            'create_time:datetime',
            'update_time:datetime',
        ],
    ]) ?>

</div>
