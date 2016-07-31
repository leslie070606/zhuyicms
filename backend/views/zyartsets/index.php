<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ArtsetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '作品页';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-artsets-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加设计师作品', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'art_id',
            'designer_id',
            //'image_ids',
            //'video_ids',
            'topic',
            // 'brief',
            // 'art_path',
            // 'location',
             'city',
             'address',
            // 'design_cost',
            // 'total_cost',
            // 'remark:ntext',
            // 'sort',
            // 'complete_time:datetime',
            // 'create_time:datetime',
            // 'update_time:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
