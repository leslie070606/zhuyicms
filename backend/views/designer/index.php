<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\file\FileInput;
?>
<h2>
    设计师管理
    <small>Preview</small>
</h2>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">设计师列表</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div>
                        </div>
                        <!-- 搜索-->
                        <div class="col-sm-6">
                            <div class="box-tools pull-right">
<?= Html::beginForm('', 'post', ['id' => 'form-search']); ?>
                                <div style="width: 200px;" class="input-group input-group-sm">
                                    <!--<input type="text" placeholder="Search" class="form-control pull-right" name="table_search">-->
<?= Html::input('text', 'table_search', $search_word ? $search_word : '', ['class' => 'form-control pull-right', 'placeholder' => 'Search', 'id' => 'table_search']) ?>
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
<?= Html::endForm(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row" style="background-color: #00c0ef;color: #ffffff;">
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">ID</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">姓名</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">性别</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">签约状态</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">从业年限</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">所属机构</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">毕业院校</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">标签</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">接洽状态</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">洽谈人员</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">操作</th></tr>
                                </thead>
                                <tbody>
<?php foreach ($data as $designer) { ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"><?= $designer->id ?></td>
                                            <td class="sorting_1"><?= $designer->name ?></td>
                                            <td><?php
                                                if ($designer->sex == 1) {
                                                    echo '男';
                                                } else {
                                                    echo '女';
                                                }
                                                ?></td>
                                            <td><?php
                                                if ($designer->sign == 1) {
                                                    echo '已签约';
                                                } else {
                                                    echo '未签约';
                                                }
                                                ?></td>

                                            <td><?= $designer->job_year ?></td>
                                            <td><?= $designer->company ?></td>
                                            <td><?= $designer->alma_mater ?></td>
                                            <td><?= $designer->tag ?></td>
                                            <td><?= $designer->status ?></td>
                                            <td><?= $designer->service_pre ?></td>
                                            <td><a href="<?= Url::to(['detail', 'id' => $designer->id]) ?>">查看</a>|<a href="<?= Url::to(['edit', 'id' => $designer->id]) ?>">编辑</a> | <a href="<?= Url::to(['delete', 'id' => $designer->id]) ?>">删除</a></td>
                                        </tr>

<?php } ?>

                                </tbody>
                                <tfoot>
                                    <tr><th rowspan="1" colspan="1">姓名</th>
                                        <th rowspan="1" colspan="1">性别</th>
                                        <th rowspan="1" colspan="1">签约状态</th>
                                        <th rowspan="1" colspan="1">从业年限</th>
                                        <th rowspan="1" colspan="1">所属机构</th>
                                        <th rowspan="1" colspan="1">毕业院校</th>
                                        <th rowspan="1" colspan="1">标签</th>
                                        <th rowspan="1" colspan="1">接洽状态</th>
                                        <th rowspan="1" colspan="1">洽谈人员</th>
                                        <th rowspan="1" colspan="1">操作</th></tr>
                                </tfoot>
                            </table></div></div>
                    <div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of <?= $pagination->totalCount; ?> entries</div></div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">

                                <?=
                                \yii\widgets\LinkPager::widget([
                                    'pagination' => $pagination,
                                    'options' => [
                                        'class' => 'pagination',
                                    ]
                                ]);
                                ?>
                            </div></div></div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </div>
    <!-- /.col -->
</div>

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a class="small-box-footer" href="#">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a class="small-box-footer" href="#">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a class="small-box-footer" href="#">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a class="small-box-footer" href="#">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>

