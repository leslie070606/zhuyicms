<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ZyArtsets */

$this->title = 'Update Zy Artsets: ' . $model->art_id;
$this->params['breadcrumbs'][] = ['label' => 'Zy Artsets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->art_id, 'url' => ['view', 'id' => $model->art_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zy-artsets-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
