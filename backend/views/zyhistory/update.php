<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ZyHistory */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Zy History',
]) . $model->history_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Zy Histories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->history_id, 'url' => ['view', 'id' => $model->history_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="zy-history-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
