<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ZyIndex */

$this->title = 'Create Zy Index';
$this->params['breadcrumbs'][] = ['label' => 'Zy Indices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-index-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
