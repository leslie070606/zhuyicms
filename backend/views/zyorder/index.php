<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '订单管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="/My97DatePicker/WdatePicker.js"></script>
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
                        <td colspan="2"><input id="d4311" style="width:45%;float:left;" type="text" class="form-control" name="apt_time_min" onFocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm', maxDate: '#F{$dp.$D(\'d4312\')||\'2020-10-01 00:00:00\'}'})" placeholder="起始见面时间" value="<?= Yii::$app->request->get('apt_time_min');?>"><span style="float:left;width:10%;text-align:center;height:35px;line-height:35px;">~</span><input id="d4312" type="text" style="width:45%;float:left;" class="form-control" name="apt_time_max" onFocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm', minDate: '#F{$dp.$D(\'d4311\')}', maxDate: '2020-10-01 00:00:00'})" placeholder="终止见面时间" value="<?= Yii::$app->request->get('apt_time_max');?>"></td>
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
                                   value="<?= Yii::$app->request->get('apt_location');?>"></td>
                    </tr>
                    <tr>
						<td>
							<select name="status" style="width: 100%;height: 34.8px;border: 1px solid rgb(210, 214, 222);color: rgb(85, 85, 85);">
								<option value=0>待设计师确认</option>
								<option value=1>待用户确认时间</option>
								<option value=2>待见面</option>
								<option value=3>预约已取消</option>
								<option value=6>已见面</option>
								<option value=7>已见面未深度合作</option>
								<option value=9>已深度合作未上传合同</option>
								<option value=10>已深度合作已上传合同</option>
							</select>
						</td>
                        <td><input type="text" class="form-control" name="remark" 
                                   placeholder="订单备注"
                                   value="<?= Yii::$app->request->get('remark');?>"></td>
                        <td><input type="text" class="form-control" name="project_id" 
                                   placeholder="需求编号"
                                   value="<?= Yii::$app->request->get('project_id');?>">						</td>
                    </tr>
					<tr>
						<td>
							<select name="service_type" style="width: 100%;height: 34.8px;border: 1px solid rgb(210, 214, 222);color: rgb(85, 85, 85);">
								<option value=0>客服创建</option>
								<option value=1>用户创建</option>
							</select>
						</td>
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
					<th>订单编号</th>
                    <th>用户</th>
                    <th>设计师</th>
                    <th>项目编号</th>
                    <th>见面地点</th>
                    <th>见面时间</th>
                    <th>订单状态</th>
                    <th>订单备注</th>
                    <th>订单类型</th>
					<th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($model as $m):
                    ?>
                    <tr>
						<td><?= $m->order_id?></td>
                        <td><a href="<?= yii\helpers\Url::to(['zyuser/'.$m->user_id]); ?>"><?= isset($m->zy_user->nickname) ? $m->zy_user->nickname : ''; ?></a></td>
                        <td><a href="<?= yii\helpers\Url::to(['designer/detail','id' => $m->designer_id]); ?>"><?= isset($m->zyj_designer_basic->name) ? $m->zyj_designer_basic->name : ''; ?></a></td>
                        <td><a href="<?= yii\helpers\Url::to(['zyproject/'.$m->project_id]); ?>"><?= isset($m->project_id) ? $m->project_id : ''; ?></a></td>
                        <td><?= $m->appointment_location; ?></td>
                        <td><?= isset($m->appointment_time) && !empty($m->appointment_time)? date("Y/m/d H",$m->appointment_time) : ''; ?></td>
                        <td><?= \common\models\ZyOrder::$ORDER_STATUS_DICT["$m->status"]; ?></td>
                        <td><?= $m->remark; ?></td>
                        <td><?= \common\models\ZyOrder::$SERVICE_TYPE_DICT["$m->service_type"]; ?></td>
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
