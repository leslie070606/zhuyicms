<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\VideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '视频管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-video-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加视频', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'video_id',
            [
                'label' => '视频地址',
                'filter' => Html::activeTextInput($searchModel, 'video_url', ['class' => 'form-control']),
                'format' => 'raw',
                'value' => function ($data) {
            return Html::a("视频地址", $data->video_url);
        },
            ],
            [
                'label' => '视频封面图',
                'filter' => Html::activeTextInput($searchModel, 'video_image', ['class' => 'form-control']),
                'format' => 'raw',
                'value' => function ($data) {
            return Html::img("http://www.zhuyihome.com".$data->video_image, ['height'=>'150px','width'=>'200px']);
                      //  return Html::a("图片地址", Yii::$app->request->hostInfo."/zhuyicms/frontend/web".$data->video_image);

        },
            ],
           
            'designer_id',
            'create_time:datetime',
            // 'update_time:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
