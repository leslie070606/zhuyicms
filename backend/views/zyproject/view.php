<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ZyProject */

$this->title = $model->project_id;
$this->params['breadcrumbs'][] = ['label' => 'Zy Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->project_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->project_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'project_id',
            'user_id',
            'project_num',
            'city',
            'address',
            'compound',
            'decoration_type',
            'covered_area',
            'use_area',
            'budget_design_work',
            'budget_design',
            'budget_ruan',
            'budget_ying',
            'budget_yuanlin',
            'work_time',
            'home_type',
            'project_status',
            'service_type',
            [
                'label' => '家的照片',
                'format' => 'raw',
                'value' => $model->getHomeImage(),
        
            ],
            [
                'label' => '喜欢的照片',
                'format' => 'raw',
                'value' => $model->getFavoriteImage(),
        
            ],
            'designer_level',
            'match_json',
            'description:ntext',
            'project_tags',
			[
				'label'		=> '是否人工匹配',
				'format' 	=> 'raw',
				'value'		=> $model->getRengong($model->project_id),
			],
        ],
    ])
    ?>

</div>
