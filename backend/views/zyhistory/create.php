<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ZyHistory */

$this->title = Yii::t('app', 'Create Zy History');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Zy Histories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
