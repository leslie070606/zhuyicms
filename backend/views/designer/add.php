<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<div class="row">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">设计师基本信息</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= Html::beginForm('', 'post', ['id' => 'form-basic']); ?>
            <div class="box-body">
                <div class="form-group has-warning">
                    <label for="name">姓名</label> <!--<span class="label label-danger">UI Design</span>-->
                    <?= Html::activeInput('text', $model, 'name', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'name']) ?>

                    <?= Html::error($model, 'name', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="sex">性别</label>
                    <?= Html::activeRadioList($model, 'sex', [1 => '男', 0 => '女'], ['class' => 'fav-list', 'id' => "sex"]) ?>
                    <?= Html::error($model, 'sex', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="name">出生日期</label>
                    <?= Html::activeInput('text', $model, 'birth', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'birth']) ?>
                    <?= Html::error($model, 'birth', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="job_year">从业年限</label>
                    <?= Html::activeInput('text', $model, 'job_year', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'job_year']) ?>
                    <?= Html::error($model, 'job_year', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="tag">标签</label>
                    <?= Html::activeInput('text', $model, 'tag', ['class' => 'form-control', 'placeholder' => '多标签以逗号隔开', 'id' => 'tag']) ?>
                    <?= Html::error($model, 'tag', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="sign">签约状态</label>
                    <?= Html::activeRadioList($model, 'sign', [1 => '已签约', 0 => '未签约'], ['class' => 'fav-list', 'id' => "sign"]) ?>
                </div>

                <div class="form-group">
                    <label for="status">接洽状态</label>
                    <?= Html::activeInput('text', $model, 'status', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'status']) ?>
                    <?= Html::error($model, 'status', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="service_pre">洽谈人员</label>
                    <?= Html::activeInput('text', $model, 'service_pre', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'service_pre']) ?>
                    <?= Html::error($model, 'service_pre', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="company">所属机构</label>
                    <?= Html::activeInput('text', $model, 'company', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'company']) ?>
                    <?= Html::error($model, 'company', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="ever_office">服务的大事务所</label>
                    <?= Html::activeInput('text', $model, 'ever_office', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'ever_office']) ?>
                    <?= Html::error($model, 'ever_office', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="alma_mater">毕业院校</label>
                    <?= Html::activeInput('text', $model, 'alma_mater', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'alma_mater']) ?>
                    <?= Html::error($model, 'alma_mater', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="winning">获奖经历</label>
                    <?= Html::activeTextarea($model, 'winning', ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'Enter...', 'id' => 'winning']) ?>
                    <?= Html::error($model, 'winning', ['class' => 'error']); ?>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer"style='text-align: center;'>
                <button class="btn btn-primary pull-left" type="reset"  onclick="ajaxBasic()">提交</button>
                <label class="control-label" id="secuss" style="color:#00a65a;margin-top: 5px; display: none;"><i class="fa fa-check"></i> Input with success</label>
                <button class="btn btn-default pull-right" type="reset" onclick="jixu()">继续添加</button>
            </div>
            <?= Html::endForm(); ?>
        </div>

        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">设计师附加信息表</h3>
            </div>
            <?= Html::beginForm('', 'post', ['id' => 'form-additional']); ?>
            <?= Html::activeHiddenInput($modeladditional, 'designer_id', ['id' => 'id-additional', 'value' => '0']) ?>
            <div class="box-body">
                <div class="form-group">
                    <label for="ideal_customer">理想的服务对象</label>
                    <?= Html::activeInput('text', $modeladditional, 'ideal_customer', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'ideal_customer']) ?>
                    <?= Html::error($modeladditional, 'ideal_customer', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="ideal_process">理想的服务流程</label>
                    <?= Html::activeInput('text', $modeladditional, 'ideal_process', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'ideal_process']) ?>
                    <?= Html::error($modeladditional, 'ideal_process', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="pain_point">现有痛点</label>
                    <?= Html::activeInput('text', $modeladditional, 'pain_point', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'pain_point']) ?>
                    <?= Html::error($modeladditional, 'pain_point', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="source">设计师推荐来源</label>
                    <?= Html::activeInput('text', $modeladditional, 'source', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'source']) ?>
                    <?= Html::error($modeladditional, 'source', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="custom_service">设计师内部对接人员</label>
                    <?= Html::activeInput('text', $modeladditional, 'custom_service', ['class' => 'form-control', 'placeholder' => '客服', 'id' => 'custom_service']) ?>
                    <?= Html::error($modeladditional, 'custom_service', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="recommend">设计师推荐的其它设计师</label>
                    <?= Html::activeInput('text', $modeladditional, 'recommend', ['class' => 'form-control', 'placeholder' => '最多5名', 'id' => 'recommend']) ?>
                    <?= Html::error($modeladditional, 'recommend', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="ideas">设计理念</label>
                    <?= Html::activeTextarea($modeladditional, 'ideas', ['class' => 'form-control', 'rows' => '3', 'placeholder' => '三句话', 'id' => 'ideas']) ?>
                    <?= Html::error($modeladditional, 'ideas', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="works">代表作品</label>
                    <?= Html::activeTextarea($modeladditional, 'works', ['class' => 'form-control', 'rows' => '3', 'placeholder' => '三句话', 'id' => 'works']) ?>
                    <?= Html::error($modeladditional, 'works', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="share_video">设计师可以分享的视频内容</label>
                    <?= Html::activeTextarea($modeladditional, 'share_video', ['class' => 'form-control', 'rows' => '3', 'placeholder' => '三条', 'id' => 'share_video']) ?>
                    <?= Html::error($modeladditional, 'share_video', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="shared_video">设计师已经分享的视频内容</label>
                    <?= Html::activeTextarea($modeladditional, 'shared_video', ['class' => 'form-control', 'rows' => '3', 'placeholder' => '三条', 'id' => 'shared_video']) ?>
                    <?= Html::error($modeladditional, 'shared_video', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="share_text">设计师可以分享的文字内容</label>
                    <?= Html::activeTextarea($modeladditional, 'share_text', ['class' => 'form-control', 'rows' => '3', 'placeholder' => '三条', 'id' => 'share_text']) ?>
                    <?= Html::error($modeladditional, 'share_text', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="shared_text">设计师已经分享的文字内容</label>
                    <?= Html::activeTextarea($modeladditional, 'shared_text', ['class' => 'form-control', 'rows' => '3', 'placeholder' => '三条', 'id' => 'shared_text']) ?>
                    <?= Html::error($modeladditional, 'shared_text', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="phone">设计师电话</label>
                    <?= Html::activeInput('text', $modeladditional, 'phone', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'phone']) ?>
                    <?= Html::error($modeladditional, 'phone', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="wechat">设计师微信</label>
                    <?= Html::activeInput('text', $modeladditional, 'wechat', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'wechat']) ?>
                    <?= Html::error($modeladditional, 'wechat', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="email">设计师邮箱</label>
                    <?= Html::activeInput('email', $modeladditional, 'email', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'email']) ?>
                    <?= Html::error($modeladditional, 'email', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="address">设计师住址</label>
                    <?= Html::activeInput('text', $modeladditional, 'address', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'address']) ?>
                    <?= Html::error($modeladditional, 'address', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="card_no">设计师银行账号</label>
                    <?= Html::activeInput('text', $modeladditional, 'card_no', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'card_no']) ?>
                    <?= Html::error($modeladditional, 'card_no', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="bank">设计师开户银行</label>
                    <?= Html::activeInput('text', $modeladditional, 'bank', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'bank']) ?>
                    <?= Html::error($modeladditional, 'bank', ['class' => 'error']); ?>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer"style='text-align: center;'>
                <button class="btn btn-primary pull-left" type="reset"  onclick="ajaxAdditional()">提交</button>
                <label class="control-label" id="secussadditional" style="color:#00a65a;margin-top: 5px; display: none;"><i class="fa fa-check"></i> Input with success</label>
                <button class="btn btn-default pull-right" type="reset" onclick="jixua()">重置</button>
            </div>
            <?= Html::endForm(); ?>
            <!-- /.box-body -->
        </div>
    </div>

    <div class="col-md-6">

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">设计师业务信息</h3>
            </div>
            <?php
            $form = ActiveForm::begin(
                            ['action' => [''],
                                'method' => 'post',
                                'options' => ['id' => 'form-work']]);
            ?>
            <?= Html::activeHiddenInput($modelwork, 'designer_id', ['id' => 'id-work', 'value' => '0']) ?>
            <div class="box-body">
                <div class="form-group">
                    <label for="category">设计师类别</label>
                    <?= Html::activeInput('text', $modelwork, 'category', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'category']) ?>
                    <?= Html::error($modelwork, 'category', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="city">所在城市</label>
                    <?= Html::activeInput('text', $modelwork, 'city', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'city']) ?>
                    <?= Html::error($modelwork, 'city', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="customer">设计师客户对象</label>
                    <?= Html::activeInput('text', $modelwork, 'customer', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'customer']) ?>
                    <?= Html::error($modelwork, 'customer', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="work_domain">业务领域</label>
                    <?= Html::activeInput('text', $modelwork, 'work_domain', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'work_domain']) ?>
                    <?= Html::error($modelwork, 'work_domain', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="service_type">服务类型</label>
                    <?= Html::activeInput('text', $modelwork, 'service_type', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'service_type']) ?>
                    <?= Html::error($modelwork, 'service_type', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="butt_joint">施工对接</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <?= Html::activeDropDownList($modelwork, 'butt_joint', [0 => '无', 1 => '自带', 2 => '合作'], ['class' => 'btn-group-lg', 'id' => 'butt_joint']) ?>
                    <?= Html::error($modelwork, 'butt_joint', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="docking_area">配套服务区域</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <?= Html::activeDropDownList($modelwork, 'docking_area', [0 => '本地', 1 => '全国', 2 => '加价全国'], ['class' => 'btn-group-lg', 'id' => 'docking_area']) ?>
                    <?= Html::error($modelwork, 'docking_area', ['class' => 'error']); ?>
                </div>

                <style type="text/css">
                    .checkbox{

                    }
                </style>
                <div class="form-group">
                    <label for="include_project">设计费包含项目</label>
                    <?= Html::activeCheckboxList($modelwork, 'include_project', [1 => '咨询', 2 => '硬装平面设计图', 3 => '硬装效果图', 4 => '硬装施工图', 5 => '建材（主材）清单', 6 => '陪买建材（地板 瓷砖）', 7 => '施工对接', 8 => '施工巡查（监理）', 9 => '软装设计图（带家具清单）', 10 => '陪买家具', 11 => '代买家具'], ['class' => 'checkbox', 'id' => 'include_project']) ?>
                    <?= Html::error($modelwork, 'include_project', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="pay_extra">提供额外付费项目</label>
                    <?= Html::activeCheckboxList($modelwork, 'pay_extra', [1 => '建材（主材）清单', 2 => '家具清单', 3 => '陪买建材', 4 => '陪买家具', 5 => '代买家具', 6 => '施工巡查', 7 => '施工监理'], ['class' => 'checkbox', 'id' => 'pay_extra']) ?>
                    <?= Html::error($modelwork, 'pay_extra', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="lower_price">能接受的最低设计费总额</label>
                    <?= Html::activeInput('text', $modelwork, 'lower_price', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'lower_price']) ?>
                    <?= Html::error($modelwork, 'lower_price', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="accept_area">能接受的面积范围</label>
                    <?= Html::activeInput('text', $modelwork, 'accept_area', ['class' => 'form-control', 'placeholder' => '范围', 'id' => 'accept_area']) ?>
                    <?= Html::error($modelwork, 'accept_area', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="accept_area">每平米设计费最低要求</label>
                    <?= Html::activeInput('text', $modelwork, 'lower_centiare', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'lower_centiare']) ?>
                    <?= Html::error($modelwork, 'lower_centiare', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="charge">设计费收费标准</label>
                    <?= Html::activeInput('text', $modelwork, 'charge', ['class' => 'form-control', 'placeholder' => '范围', 'id' => 'charge']) ?>
                    <?= Html::error($modelwork, 'charge', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="charge_ls100">设计费收费标准1</label>
                    <?= Html::activeInput('text', $modelwork, 'charge_ls100', ['class' => 'form-control', 'placeholder' => '100平米以下', 'id' => 'charge_ls100']) ?>
                    <?= Html::error($modelwork, 'charge_ls100', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="charge_ls300">设计费收费标准2</label>
                    <?= Html::activeInput('text', $modelwork, 'charge_ls300', ['class' => 'form-control', 'placeholder' => '100平米-300平米', 'id' => 'charge_ls300']) ?>
                    <?= Html::error($modelwork, 'charge_ls300', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="charge_gt300">设计费收费标准3</label>
                    <?= Html::activeInput('text', $modelwork, 'charge_gt300', ['class' => 'form-control', 'placeholder' => '300平米以上', 'id' => 'charge_gt300']) ?>
                    <?= Html::error($modelwork, 'charge_gt300', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="mtc">收费方式</label>
                    <?= Html::activeInput('text', $modelwork, 'mtc', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'mtc']) ?>
                    <?= Html::error($modelwork, 'mtc', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="style">擅长的设计风格</label>
                    <?= Html::activeInput('text', $modelwork, 'style', ['class' => 'form-control', 'placeholder' => '从30种风格中选择3种', 'id' => 'style']) ?>
                    <?= Html::error($modelwork, 'style', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="month_iswork">本月是否能接活</label>
                    <?= Html::activeRadioList($modelwork, 'month_iswork', [1 => '是', 0 => '否'], ['class' => 'fav-list', 'id' => "month_iswork"]) ?>
                    <?= Html::error($modelwork, 'month_iswork', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="nextm_iswork">下个月是否能接活</label>
                    <?= Html::activeRadioList($modelwork, 'nextm_iswork', [1 => '是', 0 => '否'], ['class' => 'fav-list', 'id' => "nextm_iswork"]) ?>
                    <?= Html::error($modelwork, 'nextm_iswork', ['class' => 'error']); ?>
                </div>

                <div class="form-group has-warning">
                    <label for="nowork_time">不能接活时段</label>
                    <?= Html::activeInput('text', $modelwork, 'nowork_time', ['class' => 'form-control', 'placeholder' => '时段', 'id' => 'nowork_time']) ?>
                    <?= Html::error($modelwork, 'nowork_time', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="now_customer">正在接洽的客户</label>
                    <?= Html::activeInput('text', $modelwork, 'now_customer', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'now_customer']) ?>
                    <?= Html::error($modelwork, 'now_customer', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="service_customer">正在服务的客户</label>
                    <?= Html::activeInput('text', $modelwork, 'service_customer', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'service_customer']) ?>
                    <?= Html::error($modelwork, 'service_customer', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="level">设计师的档次</label>
                    <?= Html::activeInput('text', $modelwork, 'level', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'level']) ?>
                    <?= Html::error($modelwork, 'level', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="description1">设计师个性描述1</label>
                    <?= Html::activeTextarea($modelwork, 'description1', ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'Enter...', 'id' => 'description1']) ?>
                    <?= Html::error($modelwork, 'description1', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="description2">设计师个性描述2</label>
                    <?= Html::activeTextarea($modelwork, 'description2', ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'Enter...', 'id' => 'description2']) ?>
                    <?= Html::error($modelwork, 'description2', ['class' => 'error']); ?>
                </div>
            </div>
            <div class="box-footer"style='text-align: center;'>
                <button class="btn btn-primary pull-left" type="reset"  onclick="ajaxWork();">提交</button>
                <label class="control-label" id="secusswork" style="color:#00a65a;margin-top: 5px; display: none;"><i class="fa fa-check"></i> Input with success</label>
                <button class="btn btn-default pull-right" type="reset" onclick="jixuw()">重置</button>
            </div>
            <?php ActiveForm::end(); ?>
            <!-- /.box-body -->
        </div>
    </div>
</div>    
<script type="text/javascript">
    function ajaxBasic() {
        var $form = $('#form-basic');
        $.ajax({
            url: $form.attr('action'),
            type: 'post',
            dataType: 'json',
            data: $form.serialize(),
            success: function (data) {
                alert(data.msg);
                $("#secuss").show();
                //$("#id-additional").val("5");
                $("#id-work").val(data.designerID);
                $("#id-additional").val(data.designerID);
            }
        });
    }

    function jixu() {
        $("#secuss").hide();
    }
     function jixuw() {
        $("#secusswork").hide();
    }
     function jixua() {
        $("#secussadditional").hide();
    }
    // work表单提交
    function ajaxWork() {
        var $form = $('#form-work');
        if ($("#id-work").val() != 0) {
            $.ajax({
                url: $form.attr('action'),
                type: 'post',
                //dataType: 'json',
                data: $form.serialize(),
                success: function (data) {
                    alert(data);
                    $("#secusswork").show();
                    $("#id-work").val('0');
                  
                }
            });
        } else {
            alert("未找到设计师!");
        }
    }
    //提交Additional表单
    function ajaxAdditional() {
        var $form = $('#form-additional');
        if ($("#id-additional").val() != 0) {
            $.ajax({
                url: $form.attr('action'),
                type: 'post',
                //dataType: 'json',
                data: $form.serialize(),
                success: function (data) {
                    alert(data);
                    $("#secussadditional").show();
                    $("#id-additional").val('0');
                   
                }
            });
        } else {
            alert("未找到设计师!");
        }
    }
</script>
