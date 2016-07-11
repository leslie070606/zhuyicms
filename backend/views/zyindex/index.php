<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Zy Indices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-index-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Zy Index', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'index_id',
            'designer_id',
            'designer_name',
            'designer_city',
            'description',
            // 'video_id',
            // 'sort',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
