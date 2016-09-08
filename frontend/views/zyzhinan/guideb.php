<?php

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
        <title>住艺指南</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet"  href="css/iconfont.css" />
        <link rel="stylesheet"  href="css/zy_guide.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/gloab.js" ></script>
    </head>
    <body>
        <div class="guide_box">
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
            <div class="guide_box_here">
                <span class="guide_box_title">选择设计师之前<br/>你必须要了解的三件事情 </span>
                <div class="here_b_box">
                    <span class="box_spa"><i></i>硬装与软装，设计师术业有专攻</span>
                    <span class="box_spb">硬装设计指的是对于空间利用，结构改造，主材使用等需要施工环节的设计。<span style="color: #221814; font-weight: bold;">软装通俗的说，就是您把房子倒过来，掉下来的都属于软装，</span>如窗帘、沙发、靠垫、壁挂、地毯、床上用品、灯具等以及装饰工艺品、植物等。简单地说，如果您需要任何施工，那么您就需要一名硬装设计师；如果只是家具或陈列品的更换，则需要一名软装设计师。有一些造诣高的硬装设计师也可以在完成硬装设计的同时完成软装设计，但普遍来说两者都是分开的。</span>
                </div>
                <div class="here_b_box">
                    <span class="box_spa"><i></i>了解这几点再找设计师，更高效</span>
                    <span class="box_spb">好的设计不可能一天完成，<span style="color: #221814; font-weight: bold;">要给设计师预留充分的设计时间（一般在30-45天左右），</span>这样才能确保设计以及施工质量。</span>
                    <span class="box_spb">装修的费用一般包括设计，施工，材料和家具四大部分，每一项都不可轻视。因此，在装修之前需要做好预算分配，合理预期。</span>
                    <span class="box_spb">家是我们居住和生活的空间，家的设计决定了生活的形态。因此，在设计装修之前，需要了解自己和家庭成员的生活需求和习惯，并且明确告诉设计师<i class="guide_red">*</i>，这样才能拥有理想的家。</span>

                    </span>
                </div>
                <div class="here_b_box">
                    <span class="box_spa"><i></i>和设计师无间合作，有诀窍</span>
                    <span class="box_spb">设计师不是绘图员，设计也不仅仅是几张效果图。好的设计师能够用空间来展现您的个性，用设计来改变您的生活。不仅如此，您会发现，在装修过程中，好的设计师还是您最值得信赖的专家、以及最了解您想要什么的挚友。</span>
                    <span class="box_spb">因此，与设计师的沟通尤为重要。设计签约前的面谈中，应该尽可能多的表达自己的诉求，并且倾听设计师的反馈；也可以与设计师聊聊设计之外的理念和趣事，判断两人的风格是否合拍；对设计师正在进行的项目，如果有条件，也可以去参观。</span>
                    <span class="box_spb">当然，一旦决定请某位设计师之后，信任和保持沟通就是最关键的！一次成功的设计，不仅是结果，过程也会充满惊喜。</span>
                </div>
            </div>
            <div class="bott_zc"><i class="guide_red" style="margin-right: .05rem;">*</i>在此阶段，住艺客服团队将为用户提供各种咨询服务，帮助大家轻松高效地梳理需求。</div>
            <span class="foot_a">
                <a href="http://www.sobot.com/chat/h5/index.html?sysNum=d816da1bbc6b4814a0929661a3c7dfbc">在线客服</a><span class="foot_a_sp">|</span><a href="tel:4000600636">客服电话</a>
            </span>
        </div>	
    </body>
</html>