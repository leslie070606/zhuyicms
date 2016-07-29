<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>登录</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/login.css" />
        <link rel="stylesheet"  href="http://at.alicdn.com/t/font_1467361951_3606887.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js" ></script>	
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script type="text/javascript" src="js/login.js" ></script>
    </head>
    <body>
        <section class="login_box">
            <header class="header_top">
                <span class="hunt_title">登录</span>
                <!--<input id="ipt" type="text" value="0" />-->
                <span class="top_right iconfont icon-gongneng"></span>
            </header>
            <section class="down_right">
                <ul>
                    <li><a href="<?php echo Url::toRoute('/index/index'); ?>">首页</a></li>
                    <li><a href="<?php echo Url::toRoute('/designer/list'); ?>">住艺设计师</a></li>
                    <li><a href="designer_list.html">设计指南</a></li>
                    <li><a href="<?php echo Url::toRoute('/order/list'); ?>">我的住艺</a></li>
                    <li><a href="designer_list.html">更多意见</a></li>
                    <li>   <?php if ($session->get('user_id')) { ?>
                            <a href="<?php echo Url::toRoute('/user/loginout'); ?>">暂时登出</a>

                        <?php } else { ?>

                            <a href = "<?php echo Url::toRoute('/user/login'); ?>">立即登录</a>

                        <?php }; ?>

                    </li>
                </ul>
            </section>  

            <div class="login_title">
                输入手机号码用于登录
            </div>
            <?= Html::beginForm(Yii::getAlias('@web') . '/index.php?r=user/phone', 'post', ['id' => 'form-phone']); ?>
            <div class="login_ipt">
                <?= \yii\helpers\Html::input('text', 'phone', '', ['placeholder' => "手机号", 'id' => 'phone']); ?>
            </div>
            <div class="auth_code login_ipt">
                <?= \yii\helpers\Html::input('text', 'code', '', ['id' => 'code']); ?>

                <span class="huoqu djser truee" onclick="sendmsg()">获取验证码</span>
            </div>
            <div style="position: relative"><button class="login_ipt btnn" style="border: none;font-size: .28rem;" type="submit">完成</button><span id="worry">您输入的手机号有误，请重新输入</span></div>
            <div class="login_talk">
                <span class="iconfont icon-xuanzhong">注册即表示本人同意<a class="red	">《用户协议》</a></span>
            </div>
            <input type="hidden" value="" id="phonestr" name="phonestr" />

            <?= Html::endForm(); ?>
            <a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx36e36094bd446689&redirect_uri=http://zhuyihome.com/index.php?r=user/wechat_allow&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect"><div class="weixin_login">
                    <i class="iconfont icon-weixin" style="font-size: .44rem;"></i>微信登录
                </div></a>
        </section>

    </body>
</html>
<script type="text/javascript">
    function sendmsg() {
        if ($(".djser").hasClass("truee")) {
            var $form = $('#form-phone');

            $.ajax({
                url: "<?php echo Yii::getAlias('@web') . '/index.php?r=user/sendmsg' ?>",
                type: 'post',
                //dataType: 'json',
                data: $form.serialize(),
                success: function (data) {
                    //alert(data);
                    $('#phonestr').val(data);

                }
            });

        } else {
            return false;
        }
    }
</script>