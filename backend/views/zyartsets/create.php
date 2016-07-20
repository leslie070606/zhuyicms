<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ZyArtsets */

$this->title = 'Create Zy Artsets';
$this->params['breadcrumbs'][] = ['label' => 'Zy Artsets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-artsets-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
