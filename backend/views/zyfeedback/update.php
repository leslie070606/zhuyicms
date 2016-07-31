<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ZyFeedback */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Zy Feedback',
]) . $model->feedback_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Zy Feedbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->feedback_id, 'url' => ['view', 'id' => $model->feedback_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="zy-feedback-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
