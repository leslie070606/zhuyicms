<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ZyFeedback */

$this->title = $model->feedback_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Zy Feedbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h3>反馈详情</h3>
<div class="alert alert-success" role="alert">
    <?php
    if (empty($umodel)) {
        
    } else {
        ?>
        用户编号：<?= $umodel->user_id;?><br><br>
        用户手机：<?= $umodel->phone;?><br><br>
        用户昵称：<?= $umodel->nickname;?><br><br>
        <?php
    }
    ?>

    <hr>
    反馈编号：<?= $model->feedback_id;?><br><br>
    反馈内容：<br><br>
    <?= Html::encode($model->feedback);?>

</div>

