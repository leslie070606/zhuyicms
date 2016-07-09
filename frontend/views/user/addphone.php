<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>补全信息</title>
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
                <span class="hunt_title">补全信息</span>
                <!--<input id="ipt" type="text" value="0" />-->
                <span class="top_right iconfont icon-gongneng"></span>
            </header>
            <section class="down_right">
                <ul>
                    <li><a href="designer_list.html">住艺设计师</a></li>
                    <li><a href="style_test.htmls">风格测试</a></li>
                    <li><a href="designer_list.html">使用指南</a></li>
                    <li><a href="user.html">我的住艺</a></li>
                    <li><a href="designer_list.html">意见反馈</a></li>
                    <li><a href="designer_list.html">退出登录</a></li>
                </ul>
            </section> 

            <div class="login_title">
                请输入要绑定的手机号码
            </div>
            <?= Html::beginForm('', 'post', ['id' => 'form-addphone']); ?>
            <div class="login_ipt">
                <?= \yii\helpers\Html::input('text', 'phone', '', ['placeholder' => "手机号", 'id' => 'phone']); ?>

            </div>
            <div class="auth_code login_ipt">
                <?= \yii\helpers\Html::input('text', 'code', '', ['id' => 'code']); ?>

                <span class="huoqu djser" onclick="sendmsg()">获取验证码</span>
            </div>
            <div for=""><button class="login_ipt btnn" style="border: none;font-size: .28rem;" type="submit">完成</button><span id="worry">您输入的手机号有误，请重新输入</span></div>
            <?= Html::endForm(); ?>
        </section>

    </body>
</html>
<script type="text/javascript">
    function sendmsg() {
        var $form = $('#form-addphone');
        var phone = $("#phone").val().toString();
        //alert(phone);
        $.ajax({
            url: "<?php echo Yii::getAlias('@web').'/index.php?r=user/sendmsg'?>",
            type: 'post',
            //dataType: 'json',
            data: $form.serialize(),
            success: function (data) {
                alert(data);
            }
        });
    }
</script>