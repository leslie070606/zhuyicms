<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ZyUser */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Zy Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->user_id], [
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
            'user_id',
            'project_id',
            'style_id',
            'favored_designer_ids',
            'name',
            'openid',
            'nickname',
            'phone',
            'email:email',
            'status',
            'profession',
            'sex',
            'city',
            'language',
            'country',
            'headimgurl:url',
            'unionid',
            'privilege',
            'address',
            'create_time:datetime',
            'update_time:datetime',
        ],
    ]) ?>

</div>
