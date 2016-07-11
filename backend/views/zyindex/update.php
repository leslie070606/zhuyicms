<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ZyIndex */

$this->title = 'Update Zy Index: ' . $model->index_id;
$this->params['breadcrumbs'][] = ['label' => 'Zy Indices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->index_id, 'url' => ['view', 'id' => $model->index_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zy-index-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
