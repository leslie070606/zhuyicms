<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Zy Feedbacks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table  table-bordered">
    <table class="table table-hover">
        <caption>
            <h2>反馈管理</h2>
        </caption>
        <thead>
            <tr>
                <th>姓名</th>
                <th>反馈编号</th>
                <th>手机号</th>
                <th>内容</th>
                <th>时间</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($model as $m):
                ?>
                <tr>
                    <td><a href="<?= yii\helpers\Url::to(['zyuser/' . $m->user_id]); ?>"><?= isset($m->zy_user->nickname) ? $m->zy_user->nickname : ''; ?></a></td>
                    <td><?= $m->feedback_id; ?></td>
                    <td><?= isset($m->zy_user->phone) ? $m->zy_user->phone : ''; ?></td>
                    <td><?= Html::encode($m->feedback); ?></td>
                    <td><?= date('Y-m-d H:i:s', $m->create_time); ?></td>
                    <td>
                        <a href="<?= \yii\helpers\Url::to(['/zyfeedback/' . $m->feedback_id]); ?>">查看</a>
                    </td>
                </tr>
                <?php
            endforeach;
            ?>
        </tbody>
    </table>
    <center><?= yii\widgets\LinkPager::widget(['pagination' => $pages]); ?></center>

</div>
