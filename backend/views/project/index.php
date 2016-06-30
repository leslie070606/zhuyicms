<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = '项目';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .project-list{
        padding: 15px;
    }
</style>
<div class="project-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Project', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="project-list box box-info">
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],
                'project_id',
                'user_id',
                //'province',
                //'city',
                'house_type',
                'completion_time:datetime',
                // 'room_area',
                // 'budget_ceiling',
                // 'service_item',
                // 'generic_require',
                'description:ntext',
                // 'residential_district',
                // 'photo',
                // 'status',
                // 'createtime:datetime',
                // 'updatetime:datetime',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
    </div>
</div>
