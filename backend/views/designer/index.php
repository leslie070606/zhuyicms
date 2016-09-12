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
                        <div class="col-sm-6"></div>
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
                                    <tr>
                                        <th width="5%">编号</th>
                                        <th width="5%">姓名</th>
                                        <th width="3%">性别</th>
                                        <th width="5%">签约状态</th>
                                        <th width="5%">从业年限</th>
                                        <th>所属机构</th>
                                        <th>毕业院校</th>
                                        <th width="8%">标签</th>
                                        <th width="5%">接洽状态</th>
                                        <th width="5%">洽谈人员</th>
                                        <th width="8%">操作</th>
                                    </tr>
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
                                                ?>
                                            </td>
                                            <td><?php
                                                if ($designer->sign == 1) {
                                                    echo '已签约';
                                                } else {
                                                    echo '未签约';
                                                }
                                                ?>
                                            </td>
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
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">总计：<?= $pagination->totalCount; ?> </div>
                        </div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </div>
    <!-- /.col -->
</div>

