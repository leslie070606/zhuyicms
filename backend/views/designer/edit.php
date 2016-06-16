<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<div class="row">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">编辑设计师基本信息</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= Html::beginForm('', 'post', ['id' => 'form-basic']); ?>
            <div class="box-body">
                <div class="form-group">
                    <label for="name">姓名</label>
                    <?= Html::activeInput('text', $model, 'name', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'name']) ?>
                    <?= Html::error($model, 'name', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="sex">性别</label>
                    <?= Html::activeRadioList($model, 'sex', [1 => '男', 0 => '女'], ['class' => 'fav-list', 'id' => "sex"]) ?>
                </div>

                <div class="form-group">
                    <label for="name">出生日期</label>
                    <?= Html::activeInput('text', $model, 'birth', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'birth']) ?>
                    <?= Html::error($model, 'birth', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
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
                    <?= Html::activeRadioList($model,'sign',[1 => '已签约', 0 => '未签约'], ['class' => 'fav-list', 'id' => "sign"]) ?>
                </div>

                <div class="form-group">
                    <label for="status">接洽状态</label>
                    <?= Html::activeInput('text', $model, 'status', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'status']) ?>
                    <?= Html::error($model, 'status', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="service_pre">洽谈人员</label>
                    <?= Html::activeInput('text', $model, 'service_pre', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'service_pre']) ?>
                    <?= Html::error($model, 'service_pre', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
                    <label for="company">所属机构</label>
                    <?= Html::activeInput('text', $model, 'company', ['class' => 'form-control', 'placeholder' => 'Enter...', 'id' => 'company']) ?>
                    <?= Html::error($model, 'company', ['class' => 'error']); ?>
                </div>

                <div class="form-group">
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
            <div class="box-footer">
                <button class="btn btn-primary" type="button"  onclick="ajaxBasic()">提交修改</button>
                <button class="btn btn-default pull-right" type="reset">重置</button>
            </div>
            <?= Html::endForm(); ?>
        </div>
        <script>
            function ajaxBasic() {
                var $form = $('#form-basic');
                $.ajax({
                    url: $form.attr('action'),
                    type: 'post',
                    //dataType: 'json',
                    data: $form.serialize(),
                    success: function (data) {
                        alert(data);
                    }
                });
            }
        </script>

