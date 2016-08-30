<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '订单管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zy-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建订单', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <form>
        <div class="table  table-bordered">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="order_id" 
                                placeholder="订单编号" 
                                value="<?= Yii::$app->request->get('order_id');?>">
                        </td>
                        <td><input type="text" class="form-control" name="apt_time_min" 
                                   placeholder="见面时间"
                                   value="<?= Yii::$app->request->get('apt_time_min');?>"></td>
                        <td><input type="text" class="form-control" name="apt_time_max" 
                                   placeholder="见面时间"
                                   value="<?= Yii::$app->request->get('apt_time_min');?>"></td>
					</tr>
					<tr>
                        <td><input type="text" class="form-control" name="designer_name"
                                   placeholder="设计师姓名"
                                   value="<?= Yii::$app->request->get('designer_name');?>"></td>
                        <td><input type="text" class="form-control" name="user_name" 
                                   placeholder="用户姓名"
                                   value="<?= Yii::$app->request->get('designer_level');?>"></td>
                        <td><input type="text" class="form-control" name="apt_location" 
                                   placeholder="见面地点"
                                   value="<?= Yii::$app->request->get('service_type');?>"></td>
                        <td><input type="text" class="form-control" name="service_type"
                                   placeholder="订单类型"
                                   value="<?= Yii::$app->request->get('service_type');?>"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="status"
                                   placeholder="订单状态"
                                   value="<?= Yii::$app->request->get('status');?>">
                        </td>
                        <td><input type="text" class="form-control" name="remark" 
                                   placeholder="订单备注"
                                   value="<?= Yii::$app->request->get('remark');?>"></td>
                        <td><input type="text" class="form-control" name="project_id" 
                                   placeholder="需求编号"
                                   value="<?= Yii::$app->request->get('project_id');?>">						</td>
                    </tr>
                    <tr>
                        <td colspan="6" align="center">
                            <button type="submit"class="btn btn-primary">筛选</button> 
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
                <h2>订单列表</h2>
            </caption>
            <thead>
                <tr>
                    <th>用户</th>
                    <th>设计师</th>
                    <th>编号</th>
                    <th>见面地点</th>
                    <th>见面时间</th>
                    <th>订单状态</th>
                    <th>订单备注</th>
                    <th>订单类型</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($model as $m):
                    ?>
                    <tr>
                        <td><a href="<?= yii\helpers\Url::to(['zyuser/'.$m->user_id]); ?>"><?= isset($m->zy_user->nickname) ? $m->zy_user->nickname : ''; ?></a></td>
                        <td><a href="<?= yii\helpers\Url::to(['designer/'.$m->designer_id]); ?>"><?= isset($m->zyj_designer_basic->name) ? $m->zyj_designer_basic->name : ''; ?></a></td>
                        <td><a href="<?= yii\helpers\Url::to(['zyproject/'.$m->project_id]); ?>"><?= isset($m->project_id) ? $m->project_id : ''; ?></a></td>
                        <td><?= $m->appointment_location; ?></td>
                        <td><?= isset($m->appointment_time) && !empty($m->appointment_time)? date("Y/m/d H",$m->appointment_time) : ''; ?></td>
                        <td><?= $m->status; ?></td>
                        <td><?= $m->remark; ?></td>                        
                        <td><?= $m->service_type; ?></td>
                        <td>
                            <a href="<?= \yii\helpers\Url::to(['/zyorder/' . $m->order_id]); ?>">编辑</a> | 
                            <a href="javascript:del(<?= $m->order_id; ?>);">删除</a>
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
    var _delUrl = '<?= \yii\helpers\Url::to(['/zyorder/delete']); ?>';
    var del = function (i) {
        if (confirm('确定删除该记录吗？')) {
            $('#delForm').attr('action', _delUrl + '?id=' + i);
            $('#delForm').submit();
        } else {

        }
    }
</script>
