<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '热门搜索管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="zy-project-index">

    <div class="table  table-bordered">
        <table class="table table-hover">
            <caption>
                <h2>热门搜索推荐管理</h2>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="add()">
                    添加推荐设计师
                </button>
            </caption>
            <thead>
                <tr>
                    <th>搜索排序</th>
                    <th>设计师编号</th>
                    <th>设计师</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($model as $m):
                    ?>
                    <tr>
                        <td><?= $m->hot_sort; ?></td>
                        <td><a href="<?= yii\helpers\Url::to(['designer/detail', 'id' => $m->hot_designer_id]) ?>"><?= $m->hot_designer_id; ?></a></td>
                        <td><?= isset($m->zyj_designer_basic->name) ? $m->zyj_designer_basic->name : ''; ?></td>
                        <td>
                            <a href="javascript:edit(<?= $m->hot_search_id; ?>,<?= $m->hot_designer_id; ?>,<?= $m->hot_sort; ?>)">编辑</a> | 
                            <a href="javascript:del(<?= $m->hot_search_id; ?>);">删除</a>
                        </td>
                    </tr>
                    <?php
                endforeach;
                ?>
            </tbody>
        </table>
        <?= yii\widgets\LinkPager::widget(['pagination' => $pages]); ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">热门设计师排位</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="" onsubmit="return false;">
                        <input type="hidden" id="hot_id" value="">
                        <div class="form-group">
                            <label for="inputSjs" class="col-sm-2 control-label">设计师：</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputSjs" placeholder="设计师的编号">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPw" class="col-sm-2 control-label">排位：</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputPw" placeholder="设计师排位，升序">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary" onclick="save()">保存</button>
                </div>
            </div>
        </div>
    </div>

    <form action="" id="delForm" method="post">
        <input type="hidden" value="<?php echo Yii::$app->getRequest()->getCsrfToken(); ?>" name="_csrf" />
    </form>
    <script>
        var _delUrl = '<?= \yii\helpers\Url::to(['/zysearchhot/delete']); ?>';
        var del = function (i) {
            if (confirm('确定删除该记录吗？')) {
                $('#delForm').attr('action', _delUrl + '?id=' + i);
                $('#delForm').submit();
            } else {

            }
        }
        var _saveUrl = '<?= \yii\helpers\Url::to(['/zysearchhot/add-and-edit']); ?>';
        var save = function () {
            var _params = 'hot_designer_id=' + $('#inputSjs').val() + '&hot_sort=' + $('#inputPw').val() + '&id=' + $('#hot_id').val();
            $.post(_saveUrl, _params, function (data) {
                if (data == '1') {
                    alert('保存成功');
                    window.location.reload();
                } else {
                    alert('保存失败');
                    $('#myModal').modal('hide');
                }
            });
        }
        var add = function () {
            $('#myModal').modal('show');
            $('#inputSjs').val('');
            $('#inputPw').val('');
            $('#hot_id').val('');
        }
        var edit = function (id, sjs, pw) {
            $('#myModal').modal('show');
            $('#inputSjs').val(sjs);
            $('#inputPw').val(pw);
            $('#hot_id').val(id);
        }
    </script>
