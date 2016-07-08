<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ZyOrder */

$this->title = 'Create Zy Order';
$this->params['breadcrumbs'][] = ['label' => 'Zy Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
