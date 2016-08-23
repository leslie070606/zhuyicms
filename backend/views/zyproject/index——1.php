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
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('添加需求', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="table table-bordered">
        <table class="table">
            <caption>
                <h3>需求订单</h3>
            </caption>
            <thead>
                <tr>
                    <th>编号</th>
                    <th>城市</th>
                    <th>小区</th>
                    <th>用户</th>
                    <th>总费用</th>
                    <th>设计费</th>
                    <th>开工时间</th>
                    <th>房型</th>
                    <th>设计师档次</th>
                    <th>人工匹配</th>
                    <th>客服合作人</th>
                    <th>合作设计师</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($model as $m):
                    ?>
                    <tr>
                        <td><?= 1;?></td>
                        <td>城市</td>
                        <td>小区</td>
                        <td>用户</td>
                        <td>总费用</td>
                        <td>设计费</td>
                        <td>开工时间</td>
                        <td>房型</td>
                        <td>设计师档次</td>
                        <td>人工匹配</td>
                        <td>客服合作人</td>
                        <td>合作设计师</td>
                        <td></td>
                    </tr>
                    <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

    <?php //Pjax::begin(); ?>    <?=
    GridView::widget([
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
    ]);
    ?>
    <?php Pjax::end(); ?></div>
