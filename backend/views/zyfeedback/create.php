<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ZyFeedback */

$this->title = Yii::t('app', 'Create Zy Feedback');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Zy Feedbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-feedback-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
