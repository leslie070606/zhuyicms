<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ZyVideo */

$this->title = 'Update Zy Video: ' . $model->video_id;
$this->params['breadcrumbs'][] = ['label' => 'Zy Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->video_id, 'url' => ['view', 'id' => $model->video_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zy-video-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
