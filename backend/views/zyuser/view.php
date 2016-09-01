<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ZyUser */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Zy Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('删除', ['delete', 'id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <div class="row">        
        <div class="col-md-6">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                    <h3 class="widget-user-username"><?= Html::encode($model->nickname); ?></h3>
                    <h5 class="widget-user-desc"></h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="<?= $model->headimgurl; ?>" alt="">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">用户编号</h5>
                                <span class="description-text"><?= $model->user_id; ?></span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">手机号</h5>
                                <span class="description-text"><?= $model->phone; ?></span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">性别</h5>
                                <span class="description-text"><?= $model->sex == '1' ? '男' : '女'; ?></span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <ul class="nav nav-stacked">
                        <li><a href="javascript:void(0);"><?= $model->openid; ?>&nbsp;<span class="pull-right badge bg-blue">微信</span></a></li>
                        <li><a href="javascript:void(0);"><?= $model->city; ?>&nbsp;<span class="pull-right badge bg-aqua">城市</span></a></li>
                        <li><a href="javascript:void(0);"><?= $model->language; ?>&nbsp;<span class="pull-right badge bg-green">语言</span></a></li>
                        <li><a href="javascript:void(0);"><?= $model->email; ?>&nbsp;<span class="pull-right badge bg-red">邮箱</span></a></li>
                        <li><a href="javascript:void(0);"><?= $model->unionid; ?>&nbsp;<span class="pull-right badge bg-blue">关联</span></a></li>
                        <li><a href="javascript:void(0);"><?= date('Y-m-d H:i:s', $model->create_time); ?> <span class="pull-right badge bg-aqua">注册时间</span></a></li>

                    </ul>
                    <div class="box-body">
                        <p><?= $model->address; ?></p>
                    </div>
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">用户需求</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6"></div>

                        </div>
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">需求编号</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">地点</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" >用户</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">备注</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($uDemand as $v): ?>
                                        <tr role="row" class="odd">
                                            <td><a href="<?= yii\helpers\Url::to(['zyproject/'.$v->project_id]);?>"><?= $v->project_id; ?></a></td>
                                            <td><?= $v->city; ?></td>
                                            <td><?= $model->nickname; ?></td>
                                            <td>无</td>
                                        </tr>
                                        <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">用户订单</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6"></div>

                        </div>
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">订单编号</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">订单用户</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" >下次见面时间</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">订单地点</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($order as $v): ?>
                                        <tr role="row" class="odd">
                                            <td><a href="<?= yii\helpers\Url::to(['zyorder/'.$v->order_id]);?>"><?= $v->order_id; ?></a></td>
                                            <td><?= $model->nickname; ?></td>
                                            <td><?= date('Y-m-d H:i:s',$v->appointment_time); ?></td>
                                            <td><?= $v->appointment_location; ?></td>
                                        </tr>
                                        <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

    <?php
//    DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'user_id',
//            'project_id',
//            'style_id',
//            'favored_designer_ids',
//            'name',
//            'openid',
//            'nickname',
//            'phone',
//            'email:email',
//            'status',
//            'profession',
//            'sex',
//            'city',
//            'language',
//            'country',
//            'headimgurl:url',
//            'unionid',
//            'privilege',
//            'address',
//            'create_time:datetime',
//            'update_time:datetime',
//        ],
//    ]) 
    ?>

</div>
