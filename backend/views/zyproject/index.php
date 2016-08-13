<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '需求管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-project-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加需求', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'project_id',
            'user_id',
            'project_num',
            'city',
            'address',
            'compound',
            // 'decoration_type',
            // 'covered_area',
            // 'use_area',
            // 'budget_design_work',
            // 'budget_design',
            // 'budget_ruan',
            // 'budget_ying',
            // 'budget_yuanlin',
            // 'work_time',
            // 'home_type',
            // 'project_status',
            // 'service_type',
            // 'home_img',
            // 'favorite_img',
            // 'designer_level',
            // 'match_json',
            // 'description:ntext',
            // 'project_tags',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
