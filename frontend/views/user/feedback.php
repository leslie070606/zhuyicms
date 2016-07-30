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
        <title>意见反馈</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/submit.css" />
        <link rel="stylesheet"  href="css/iconfont.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
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
                    <li><a href="designer_list.html">设计指南</a></li>
                    <li><a href="<?php echo Url::toRoute('/order/list'); ?>">我的住艺</a></li>
                    <li><a href="<?php echo Url::toRoute('/user/feedback'); ?>">更多意见</a></li>
                    <li>   <?php if ($session->get('user_id')) { ?>
                            <a href="<?php echo Url::toRoute('/user/loginout'); ?>">暂时登出</a>

                        <?php } else { ?>

                            <a href = "<?php echo Url::toRoute('/user/login'); ?>">立即登录</a>

                        <?php }; ?>

                    </li>
                </ul>
            </section>   
            <div class="down_right_zd"></div>  

            <div class="submit_box feedback_box">


                <textarea class="text_box" style="margin-top: 1.28rem;"  name="answer-for-q-3" id="answer-for-q-3" rows="10" placeholder="聊聊我们的产品"></textarea>
                <div class="chose_btn">
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
	touch.on(".feedback_box .chose_btn","tap",function(){
		var html=$(".text_box").val();
		$.ajax({
			type:"get",
			url:"",
			async:true,
			success:function(data){
					out_line();
			}
		});
	})
	
</script>
