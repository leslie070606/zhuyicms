<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = '登录';
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b><?= Yii::$app->name ?></b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg" style="font-size:16px;">登录</p>

        <?= Html::beginForm('', 'post', ['id' => 'form']); ?>

        <div class="form-group has-feedback">
<!--            <input type="email" class="form-control" placeholder="Email">-->
            <?= Html::activeInput('text', $model, 'username', ['class' => 'form-control', 'id' => 'loginform-username', 'placeholder' => '用户名']) ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
<!--            <input type="password" class="form-control" placeholder="Password">-->
            <?= Html::activeInput('password', $model, 'password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => '密码']) ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="form-group field-loginform-rememberme">
                    <div class="checkbox">
                        <label for="loginform-rememberme">
                            <input type="hidden" value="0" name="LoginForm[rememberMe]"><input type="checkbox" checked="" value="1" name="LoginForm[rememberMe]" id="loginform-rememberme">
                            Remember Me
                        </label>
                        <p class="help-block help-block-error"></p>

                    </div>
                </div>            </div>

            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
        </div>

        <?= Html::endForm(); ?>
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->

