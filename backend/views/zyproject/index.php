<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '需求管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-project-index">

    <p>
        <?php //echo Html::a('添加需求', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <form>
        <div class="table  table-bordered">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="project_id" 
                                   placeholder="编号" 
                                value="<?= Yii::$app->request->get('project_id');?>">
                        </td>
                        <td><input type="text" class="form-control" name="budget_design_work_x" 
                                   placeholder="总费用下限"
                                   value="<?= Yii::$app->request->get('budget_design_work_x');?>"></td>
                        <td><input type="text" class="form-control" name="budget_design_work_s" 
                                   placeholder="总费用上限"
                                   value="<?= Yii::$app->request->get('budget_design_work_s');?>"></td>
                        <td><input type="text" class="form-control" name="service_type" 
                                   placeholder="需求类型"
                                   value="<?= Yii::$app->request->get('service_type');?>"></td>
                        <td><input type="text" class="form-control" name="designer_level" 
                                   placeholder="选择设计师档次"
                                   value="<?= Yii::$app->request->get('designer_level');?>"></td>
                        <td><input type="text" class="form-control" name="" 
                                   placeholder="客服负责人" readonly=""
                                   value=""></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="city" 
                                   placeholder="需求城市"
                                   value="<?= Yii::$app->request->get('city');?>">
                        </td>
                        <td><input type="text" class="form-control" name="compound" 
                                   placeholder="需求小区"
                                   value="<?= Yii::$app->request->get('compound');?>"></td>
                        <td><input type="text" class="form-control" name="budget_design_x" 
                                   placeholder="设计费下限"
                                   value="<?= Yii::$app->request->get('budget_design_x');?>"></td>
                        <td><input type="text" class="form-control" name="budget_design_s" 
                                   placeholder="设计费上限"
                                   value="<?= Yii::$app->request->get('budget_design_s');?>"></td>
                        <td><input type="text" class="form-control" name="home_type" 
                                   placeholder="需求房型"
                                   value="<?= Yii::$app->request->get('home_type');?>"></td>
                        <td><input type="text" class="form-control" name="" 
                                   placeholder="合作设计师" readonly=""
                                   value=""></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="nickname" 
                                   placeholder="用户姓名"
                                   value="<?= Yii::$app->request->get('nickname');?>">
                        </td>
                        <td><input type="text" class="form-control" name="work_time_x" 
                                   placeholder="开工时间下限"
                                   value="<?= Yii::$app->request->get('work_time_x');?>"></td>
                        <td><input type="text" class="form-control" name="work_time_s" 
                                   placeholder="开工时间上限"
                                   value="<?= Yii::$app->request->get('work_time_s');?>"></td>
                        <td><input type="text" class="form-control" name="project_status" 
                                   placeholder="需求状态"
                                   value="<?= Yii::$app->request->get('project_status');?>"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="covered_area_x" 
                                   placeholder="建筑面积下限"
                                   value="<?= Yii::$app->request->get('covered_area_x');?>">
                        </td>
                        <td><input type="text" class="form-control" name="covered_area_s" 
                                   placeholder="建筑面积上限"
                                   value="<?= Yii::$app->request->get('covered_area_s');?>"></td>
                        <td>
                            是否人工：
                            <input type="radio" name="is_rengong" value="1"
                                   <?php $_is_rengong=Yii::$app->request->get('is_rengong'); echo $_is_rengong=="1"?'checked':'';?>>是
                            <input type="radio" name="is_rengong" value=""
                                   <?=  $_is_rengong==""?'checked':'';?>>否
                        </td>
                        <td></td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" align="center">
                            <button type="submit"class="btn btn-primary">搜索</button> 
                            <button type="resets" class="btn btn-danger">清空</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>

    <div class="table  table-bordered">
        <table class="table table-hover">
            <caption>
                <h2>需求管理</h2>
            </caption>
            <thead>
                <tr>
                    <th>编号</th>
                    <th>城市</th>
                    <th>小区</th>
                    <th>用户</th>
                    <th>总费用</th>
                    <th>设计费</th>
                    <th>开工时间</th>
                    <th>房型</th>
                    <th>设计师档次</th>
                    <th>人工匹配</th>
                    <th>客服合作人</th>
                    <th>合作设计师</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($model as $m):
                    ?>
                    <tr>
                        <td><?= $m->project_id; ?></td>
                        <td><?= $m->city; ?></td>
                        <td><?= $m->compound; ?></td>
                        <td><a href="<?= yii\helpers\Url::to(['zyuser/'.$m->user_id]); ?>"><?= isset($m->zy_user->nickname) ? $m->zy_user->nickname : ''; ?></a></td>
                        <td><?= $m->budget_design_work; ?></td>
                        <td><?= $m->budget_design; ?></td>
                        <td><?= $m->work_time; ?></td>
                        <td><?= $m->home_type; ?></td>                        
                        <td><?= $m->designer_level; ?></td>
                        <td><?= $m->is_rengong == '1' ? '是' : '否'; ?></td>
                        <td>无</td>
                        <td>无</td>
                        <td>
                            <a href="<?= \yii\helpers\Url::to(['/zyproject/' . $m->project_id]); ?>">编辑</a> | 
                            <a href="javascript:del(<?= $m->project_id; ?>);">删除</a>
                        </td>
                    </tr>
                    <?php
                endforeach;
                ?>
            </tbody>
        </table>
        <?= yii\widgets\LinkPager::widget(['pagination' => $pages]); ?>
    </div>
    <form action="" id="delForm" method="post">
        <input type="hidden" value="<?php echo Yii::$app->getRequest()->getCsrfToken(); ?>" name="_csrf" />
    </form>
    <script>
        var _delUrl = '<?= \yii\helpers\Url::to(['/zyproject/delete']); ?>';
        var del = function (i) {
            if (confirm('确定删除该记录吗？')) {
                $('#delForm').attr('action', _delUrl + '?id=' + i);
                $('#delForm').submit();
            } else {

            }
        }
    </script>
