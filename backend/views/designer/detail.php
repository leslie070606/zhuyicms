<?php ?>
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
                            <td>接洽状态</td>
                            <td><?= $model->status ? $model->status : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>洽谈人员</td>
                            <td><?= $model->service_pre ? $model->service_pre : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>所属机构</td>
                            <td><?= $model->company ? $model->company : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>服务的大事务所</td>
                            <td><?= $model->ever_office ? $model->ever_office : "<span class='label label-warning'>NULL</span>" ?></td>
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
                            <td>所在城市</td>
                            <td><?= $modelwork->city ? $modelwork->city : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>设计师客户对象</td>
                            <td><?= $modelwork->customer ? $modelwork->customer : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>业务领域</td>
                            <td><?= $modelwork->work_domain ? $modelwork->work_domain : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>服务类型</td>
                            <td><?= $modelwork->service_type ? $modelwork->service_type : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>施工对接</td>
                            <td><?= $modelwork->butt_joint ? $modelwork->butt_joint : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>配套服务区域</td>
                            <td><?= $modelwork->docking_area ? $modelwork->docking_area : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>设计费包含项目</td>
                            <td><?= $modelwork->include_project ? $modelwork->include_project : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>提供额外付费项目</td>
                            <td><?= $modelwork->pay_extra ? $modelwork->pay_extra : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>能接受的最低设计费总额</td>
                            <td><?= $modelwork->lower_price ? $modelwork->lower_price : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>能接受的面积范围</td>
                            <td><?= $modelwork->accept_area ? $modelwork->accept_area : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>每平米设计费最低要求</td>
                            <td><?= $modelwork->lower_centiare ? $modelwork->lower_centiare : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>设计费收费标准</td>
                            <td><?= $modelwork->charge ? $modelwork->charge : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>100平以下收费</td>
                            <td><?= $modelwork->charge_ls100 ? $modelwork->charge_ls100 : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>100平米-300平米收费</td>
                            <td><?= $modelwork->charge_ls300 ? $modelwork->charge_ls300 : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>300平米以上收费</td>
                            <td><?= $modelwork->charge_gt300 ? $modelwork->charge_gt300 : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>收费方式</td>
                            <td><?= $modelwork->mtc ? $modelwork->mtc : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>擅长的设计风格</td>
                            <td><?= $modelwork->style ? $modelwork->style : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>本月是否能接活</td>
                            <td><?= $modelwork->month_iswork ? $modelwork->month_iswork : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>下个月是否能接活</td>
                            <td><?= $modelwork->nextm_iswork ? $modelwork->nextm_iswork : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>不能接活时段</td>
                            <td><?= $modelwork->nowork_time ? $modelwork->nowork_time : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>正在接洽的客户</td>
                            <td><?= $modelwork->now_customer ? $modelwork->now_customer : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>正在服务的客户</td>
                            <td><?= $modelwork->service_customer ? $modelwork->service_customer : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>设计师的档次</td>
                            <td><?= $modelwork->level ? $modelwork->level : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>设计师个性描述1</td>
                            <td><?= $modelwork->description1 ? $modelwork->description1 : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>设计师个性描述2</td>
                            <td><?= $modelwork->description2 ? $modelwork->description2 : "<span class='label label-warning'>NULL</span>" ?></td>
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
                            <td>理想的服务对象</td>
                            <td><?= $modeladditional->ideal_customer ? $modeladditional->ideal_customer : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>理想的服务流程</td>
                            <td><?= $modeladditional->ideal_process ? $modeladditional->ideal_process : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>现有痛点</td>
                            <td><?= $modeladditional->pain_point ? $modeladditional->pain_point : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>设计师推荐来源</td>
                            <td><?= $modeladditional->source ? $modeladditional->source : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>设计师内部对接人员</td>
                            <td><?= $modeladditional->custom_service ? $modeladditional->custom_service : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>设计师推荐的其它设计师</td>
                            <td><?= $modeladditional->recommend ? $modeladditional->recommend : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>设计理念</td>
                            <td><?= $modeladditional->ideas ? $modeladditional->ideas : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>代表作品</td>
                            <td><?= $modeladditional->works ? $modeladditional->works : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>设计师可以分享的视频内容</td>
                            <td><?= $modeladditional->share_video ? $modeladditional->share_video : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>设计师已经分享的视频内容</td>
                            <td><?= $modeladditional->shared_video ? $modeladditional->shared_video : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>

                        <tr>
                            <td>设计师电话</td>
                            <td><?= $modeladditional->phone ? $modeladditional->phone : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>设计师微信</td>
                            <td><?= $modeladditional->wechat ? $modeladditional->wechat : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>
                        
                        <tr>
                            <td>设计师邮箱</td>
                            <td><?= $modeladditional->email ? $modeladditional->email : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>设计师住址</td>
                            <td><?= $modeladditional->address ? $modeladditional->address : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>
                        
                        <tr>
                            <td>设计师银行账号</td>
                            <td><?= $modeladditional->card_no ? $modeladditional->card_no : "<span class='label label-warning'>NULL</span>" ?></td>
                            <td>设计师开户银行</td>
                            <td><?= $modeladditional->bank ? $modeladditional->bank : "<span class='label label-warning'>NULL</span>" ?></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>