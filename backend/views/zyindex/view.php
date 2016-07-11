<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ZyIndex */

$this->title = $model->index_id;
$this->params['breadcrumbs'][] = ['label' => 'Zy Indices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-index-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->index_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->index_id], [
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
            'index_id',
            'designer_id',
            'designer_name',
            'designer_city',
            'description',
            'video_id',
            'sort',
        ],
    ]) ?>

</div>
