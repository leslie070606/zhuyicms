<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
}
$_cookieSts = \common\controllers\BaseController::checkLoginCookie();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>意见反馈</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/submit.css" />
        <link rel="stylesheet"  href="css/iconfont.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script type="text/javascript" src="js/submit.js" ></script>

    </head>
    <body style="padding-top: 0;">
        <div class="submit_box">
            <header class="header_top iconfont icon-logo">
                    <!--<input id="ipt" type="text" value="0" />-->
                <span class="top_right iconfont icon-gongneng"></span>
            </header>
            <section class="down_right">
                <ul>
                    <li><a href="<?php echo Url::toRoute('/index/index'); ?>">首页</a></li>
                    <li><a href="<?php echo Url::toRoute('/designer/list'); ?>">住艺设计师</a></li>
                    <li><a href="<?php echo Url::toRoute('/zyzhinan/guide'); ?>">设计指南</a></li>
                    <li><a href="<?php echo Url::toRoute('/order/list'); ?>">我的住艺</a></li>
                    <li><a href="<?php echo Url::toRoute('/user/feedback'); ?>">更多建议</a></li>
                    <li>   <?php if ($session->get('user_id')) { ?>
                            <a abc="<?php echo Url::toRoute('/user/loginout'); ?>">暂时登出</a>

                        <?php } else { ?>

                            <a href = "<?php echo Url::toRoute('/user/login'); ?>">立即登录</a>

                        <?php }; ?>

                    </li>
                </ul>
            </section>   
            <div class="down_right_zd"></div>
			
			<div class="out_true_box">
				<div class="out_true">
					<div class="out_true_top">确认退出登录？</div>
					<div class="out_true_bott">
						<span class="quxiao">取消</span>
						<a href="<?php echo Url::toRoute('/user/loginout'); ?>"><span class="queding">确定</span></a>

					</div>
				</div>
			</div>  

            <div class="submit_box feedback_box">


                <textarea class="text_box" style="margin-top: 1.28rem; width: 92% !important;"  name="answer-for-q-3" id="answer-for-q-3" rows="10" placeholder="Hi,这里是建议和意见的收集地，住艺时刻准备好听您的所有关于家的故事和倾诉。"></textarea>
                <div class="chose_btn zy_btn_ux">
                    提交
                </div>

            </div>
            <div class="out_Capacity">
                <div class="zdang"></div>
                <div class="mengs">保存成功</div>
            </div>
        </div>	
    </body>
</html>
<script type="text/javascript">

    touch.on(".feedback_box .chose_btn", "tap", function () {
        var html = $(".text_box").val();
        $.ajax({
            url: "<?php echo Yii::getAlias('@web') . '/index.php?r=user/feedback'; ?>" + "&&answer=" + html,
            type: "get",
            success: function (data) {
                //alert(data);
                if (data) {
                    out_line();

                }
            }
        });
    })

    function out_line() {
        $(".out_Capacity").show().animate({
            opacity: 1
        }, 1000, function () {
            $(".out_Capacity").animate({
                opacity: 0
            }, 1000, function () {
                $(".out_Capacity").hide();
            })
        });
    }

</script>
