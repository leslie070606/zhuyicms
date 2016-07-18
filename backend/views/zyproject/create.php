<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ZyProject */

$this->title = 'Create Zy Project';
$this->params['breadcrumbs'][] = ['label' => 'Zy Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-project-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
