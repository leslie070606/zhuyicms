<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ZyVideo */

$this->title = '创建视频';
$this->params['breadcrumbs'][] = ['label' => 'Zy Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-video-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
