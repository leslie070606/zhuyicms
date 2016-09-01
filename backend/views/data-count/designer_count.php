<script src="/My97DatePicker/WdatePicker.js"></script>
<div class="box box-info">
    <form action="" method="get">
        <div class="box-body">
            <div class="row">
                <?php if (!empty($pageList)): foreach ($pageList as $k => $v): ?>
                        <div class="col-xs-2">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="<?= $k; ?>" name="s[]" <?= !empty($md) && in_array($k, $md) ? 'checked' : ''; ?>>
                                    <?= $v; ?>
                                </label>
                            </div>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
            <div class="box-header"><h3 class="box-title"></h3></div>
            <div class="row">
                <div class="col-xs-2">
                    <label>设计师ID：</label><input value="<?= empty($dsId) ? '' : $dsId; ?>" class="form-control pull-right" name="dsId" type="text"placeholder="请输入设计师ID">
                </div>
                <div class="col-xs-2">
                    <label>起始时间：</label><input id="d4311" value="<?= empty($st) ? '' : $st; ?>" class="form-control pull-right" name="sTime" type="text" onFocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm', maxDate: '#F{$dp.$D(\'d4312\')||\'2020-10-01 00:00:00\'}'})" placeholder="请选择开始时间">
                </div>
                <div class="col-xs-2">
                    <label>结束时间：</label><input id="d4312" value="<?= empty($et) ? '' : $et; ?>" class="form-control pull-right" name="eTime" type="text" onFocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm', minDate: '#F{$dp.$D(\'d4311\')}', maxDate: '2020-10-01 00:00:00'})" placeholder="请选择结束时间">
                </div>
            </div>
            <div class="box-header"></div>
            <button type="submit" class="btn btn-block btn-info btn-lg">筛选</button>
        </div>
    </form>
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">筛选结果</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6"></div>

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid">
                        <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">设计师ID</th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">统计项</th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">结果</th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" >开始时间</th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">结束时间</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $k => $v): ?>
                                <tr role="row" class="odd">
                                    <td><?= empty($dsId) ||  in_array($v['dKey'], $unsetArr) ? '' : $dsId; ?></td>
                                    <td><?= $v['name']; ?></td>
                                    <td><?= $v['num']; ?></td>
                                    <td><?= empty($st) ? '无' : $st; ?></td>
                                    <td><?= empty($et) ? '无' : $et; ?></td>
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
    <!-- /.box-body -->
</div>