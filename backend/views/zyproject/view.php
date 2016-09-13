<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ZyProject */

$this->title = $model->project_id;
$this->params['breadcrumbs'][] = ['label' => 'Zy Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-project-view">

    <div class="table-responsive">
        <table class="table">
            <caption>
                <h3>编号：<?= Html::encode($this->title) ?> 详情</h3>
                <?= Html::a('编辑', ['update', 'id' => $model->project_id], ['class' => 'btn btn-primary']) ?>
                <?=
                Html::a('删除', ['delete', 'id' => $model->project_id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ])
                ?>
                
                 <?=
                Html::a('查看匹配设计师', ['matchjson', 'id' => $model->project_id], [
                    'class' => 'btn btn-success',
                    'data' => [
                       // 'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ])
                ?>

            </caption>
            <tbody>
                <tr>
                    <td class="bg-success" style="width: 10%;">创建时间：</td>
                    <td colspan="5"><?= date('Y-m-d H:i:s',$model->create_time); ?></td>
                </tr>
                <tr>
                    <td class="bg-success" style="width: 10%;">更新时间：</td>
                    <td colspan="5"><?= !empty($model->update_time)?date('Y-m-d H:i:s',$model->update_time):'无'; ?></td>
                </tr>
                <tr>
                    <td class="bg-success" style="width: 10%;">用户ID：</td>
                    <td><?= $model->user_id; ?></td>
                    <td class="bg-success" style="width: 10%;">需要单号：</td>
                    <td><?= $model->project_num; ?></td>
                    <td class="bg-success" style="width: 10%;">城市：</td>
                    <td><?= $model->city; ?></td>
                </tr>
                <tr>
                    <td class="bg-success" style="width: 10%;">地址：</td>
                    <td colspan="4"><?= empty($model->address) ? '未设置' : $model->address; ?></td>
                </tr>
                <tr>
                    <td class="bg-success" style="width: 10%;">小区名称：</td>
                    <td colspan="4"><?= empty($model->compound) ? '未设置' : $model->compound; ?></td>
                </tr>
                <tr>
                    <td class="bg-success" style="width: 10%;">工装/家装：</td>
                    <td colspan="4"><?= empty($model->decoration_type) ? '未设置' : $model->decoration_type; ?></td>
                </tr>
                <tr>
                    <td class="bg-success" style="width: 10%;">建筑面积：</td>
                    <td><?= $model->covered_area; ?></td>
                    <td class="bg-success" style="width: 10%;">使用面积：</td>
                    <td  colspan="2"><?= $model->use_area!='undefined'?$model->use_area:''; ?></td>
                </tr>
                <tr>
                    <td class="bg-success" style="width: 10%;">设计+施工费用：</td>
                    <td><?= $model->budget_design_work; ?></td>
                    <td class="bg-success" style="width: 10%;">设计费：</td>
                    <td  colspan="2"><?= $model->budget_design; ?></td>
                </tr>
                <tr>
                    <td class="bg-success" style="width: 10%;">软装预算：</td>
                    <td><?= $model->budget_ruan; ?></td>
                    <td class="bg-success" style="width: 10%;">硬装预算：</td>
                    <td><?= $model->budget_ying; ?></td>
                    <td class="bg-success" style="width: 10%;">园林预算：</td>
                    <td><?= $model->budget_yuanlin; ?></td>
                </tr>
                <tr>
                    <td class="bg-success" style="width: 10%;">开工时间：</td>
                    <td colspan="4"><?= empty($model->work_time) ? '未设置' : $model->work_time; ?></td>
                </tr>
                <tr>
                    <td class="bg-success" style="width: 10%;">房型：</td>
                    <td colspan="4"><?= empty($model->home_type) ? '未设置' : $model->home_type; ?></td>
                </tr>
                <tr>
                    <td class="bg-success" style="width: 10%;">状态：</td>
                    <td><?= $model->project_status; ?></td>
                    <td class="bg-success" style="width: 10%;">服务类型：</td>
                    <td><?= $model->service_type; ?></td>
                    <td class="bg-success" style="width: 10%;">设计师档次：</td>
                    <td><?= $model->designer_level; ?></td>
                </tr>
                <tr>
                    <td class="bg-success" style="width: 10%;">是否人工匹配：</td>
                    <td colspan="4"><?= $model->getRengong($model->project_id); ?></td>
                </tr>
                <tr>
                    <td class="bg-success" style="width: 10%;">客户注重项：</td>
                    <td colspan="4"><?= empty($model->project_tags) ? '未设置' : $model->project_tags; ?></td>
                </tr>
                <tr>
                    <td class="bg-success" style="width: 10%;">描述/备注：</td>
                    <td colspan="4"><?= empty($model->description) ? '未设置' : Html::encode($model->description); ?></td>
                </tr>
                <tr>
                    <td class="bg-success" style="width: 10%;">匹配内容Json：</td>
                    <td colspan="5"><?= empty($model->match_json) ? '未设置' : Html::encode($model->match_json); ?></td>
                </tr>
                <tr>
                    <td class="bg-success" style="width: 10%;">家的照片：</td>
                    <td colspan="5"><?= $model->getHomeImage($model->home_img); ?></td>
                </tr>
                <tr>
                    <td class="bg-success" style="width: 10%;">喜欢的照片：</td>
                    <td colspan="5"><?= $model->getFavoriteImage(); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php $_orderListModel = $model->getProjectOrderList($model->project_id); ?>
    <div class="table table-bordered">
        <table class="table">
            <caption>
                <h3>需求订单</h3>
            </caption>
            <thead>
                <tr>
                    <th>订单编号</th>
                    <th>订单设计师</th>
                    <th>下次见面时间</th>
                    <th>订单状态</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($_orderListModel as $m):
                    ?>
                    <tr>
                        <td><a href="<?= yii\helpers\Url::to(['zyorder/'.$m->order_id]);?>"><?= $m->order_id;?></a></td>
                        <td><a href="<?= yii\helpers\Url::to(['designer/detail?id='.$m->zyj_designer_basic->id]);?>"><?= $m->zyj_designer_basic->name;?></a></td>
                        <td><?= !empty($m->appointment_time)?date('Y-m-d H:i:s',$m->appointment_time):'无';?></td>
                        <td><?= common\models\ZyOrder::$ORDER_STATUS_DICT[$m->status];?></td>
                    </tr>
                    <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

</div>
