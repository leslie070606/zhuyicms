<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ZyProject */

$this->title = 'Update Zy Project: ' . $model->project_id;
$this->params['breadcrumbs'][] = ['label' => 'Zy Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->project_id, 'url' => ['view', 'id' => $model->project_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zy-project-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
