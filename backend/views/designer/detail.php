<?php 
$imageId = $model->picture;
echo $imageId;
$imageModel = new \common\models\ZyImages();

$ret = $imageModel->findOne($imageId);
$url = '';
if(empty($ret)){
	$url = '';
}else{
	$url = $ret->url;
}

?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">设计师基本信息</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>

                        <tr>
                            <td>姓名</td>
<!--                             <td><span class='label label-success'></span></td>-->
                            <td><?= $model->name ? $model->name : "<span class='label label-warning'>NULL</span>" ?></td>
							<td>头像</td>
							<td><img src=<?= $url?> /></td>
                            <td>性別</td>
                            <td><?= $model->sex ? "男" : "女" ?></td>
                        </tr>

                        <tr>
                            <td>出生日期</td>
                            <td><?= $model->birth ? $model->birth : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>从业年限</td>
                            <td><?= $model->job_year ? $model->job_year : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>标签</td>
                            <td><?= $model->tag ? $model->tag : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>签约状态</td>
                            <td><?= $model->sign ? $model->sign : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>工作单位</td>
                            <td><?= $model->company ? $model->company : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>毕业院校</td>
                            <td><?= $model->alma_mater ? $model->alma_mater : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>获奖经历</td>
                            <td><?= $model->winning ? $model->winning : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<!--设计师业务表-->
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">设计师业务信息</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>

                        <tr>
                            <td>设计师类别</td>
                            <td><?= $modelwork->category ? $modelwork->category : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>所在城市</td>
                            <td><?= $modelwork->city ? $modelwork->city : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>服务城市</td>
                            <td><?= $modelwork->work_domain ? $modelwork->work_domain : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>施工对接</td>
                            <td><?= $modelwork->butt_joint ? $modelwork->butt_joint : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>设计费包含项目</td>
                            <td><?= $modelwork->include_project ? $modelwork->include_project : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>提供额外付费项目</td>
                            <td><?= $modelwork->pay_extra ? $modelwork->pay_extra : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>最低设计费总额</td>
                            <td><?= $modelwork->lower_price ? $modelwork->lower_price : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>能接受的最小面积</td>
                            <td><?= $modelwork->accept_area ? $modelwork->accept_area : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>每平米设计费最低要求</td>
                            <td><?= $modelwork->lower_centiare ? $modelwork->lower_centiare : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>擅长的设计风格</td>
                            <td><?= $modelwork->style ? $modelwork->style : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>不能接活时段</td>
                            <td><?= $modelwork->nowork_time ? $modelwork->nowork_time : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<!--设计师附加信息表-->
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">设计师附加信息</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>

                        <tr>
                            <td>内部对接客服</td>
                            <td><?= $modeladditional->custom_service ? $modeladditional->custom_service : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>设计理念</td>
                            <td><?= $modeladditional->ideas ? $modeladditional->ideas : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>电话</td>
                            <td><?= $modeladditional->phone ? $modeladditional->phone : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>微信</td>
                            <td><?= $modeladditional->wechat ? $modeladditional->wechat : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>
                        
                        <tr>
                            <td>邮箱</td>
                            <td><?= $modeladditional->email ? $modeladditional->email : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>住址</td>
                            <td><?= $modeladditional->address ? $modeladditional->address : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
