<?php
$this->params['breadcrumbs'][] = '风格分享管理';
?>
<h2>
    风格分享管理
    <small>Preview</small>
</h2>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">风格分享列表</h3>

                <div class="box-tools">
                    <div style="width: 150px;" class="input-group input-group-sm">
                        <input type="text" placeholder="Search" class="form-control pull-right" name="table_search">

                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                            <th>ID</th>
                            <th>OpenID</th>
                            <th>昵称</th>
                            <th>有效分享?(分享链接是否被打开)</th>
                            <th>是否有朋友结果相同?</th>
                            <th>时间</th>
                        </tr>

                        <?php
                        foreach ($styleList as $val) {
                            ?>
                            <tr>
                                <td><?= $val['share_id'] ?></td>
                                <td><?= $val['open_id'] ?></td>
                                <td><?= $val['user_name'] ?></td>
                                <td><span class="label label-success">是</span></td>
                                <td><span class="label label-success">有</span></td>
                                <td><?php echo date('Y-m-d', $val['create_time']) ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
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
