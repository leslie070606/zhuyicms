<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Style */

$this->title = 'Update Style: ' . $model->style_id;
$this->params['breadcrumbs'][] = ['label' => 'Styles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->style_id, 'url' => ['view', 'id' => $model->style_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="style-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
