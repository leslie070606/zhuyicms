<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ZyUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建用户', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user_id',
            //'project_id',
            //'style_id',
            //'favored_designer_ids',
            //'name',
            'openid',
            'phone',
            'nickname',
            // 'email:email',
            // 'status',
            // 'profession',
            //'sex',
            [
                'label' => '性别',
                'filter' => Html::activeTextInput($searchModel, 'sex', ['class' => 'form-control']),
                'format' => 'raw',
                'value' => function ($data) {
            return $data->sex == '1' ? '男' : '女';
        }
            ],
            'city',
            // 'language',
            // 'country',
            // 'headimgurl:url',
            // 'unionid',
            // 'privilege',
            // 'address',
            // 'create_time:datetime',
            // 'update_time:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
