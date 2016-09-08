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
			<span class="guide_box_title">设计师能为你做什么?</span>
			<div class="here_b_box"> 
                            <span class="box_spa" style="font-weight: bold;"><i></i>设计的黄金三角</span>
                            <span class="box_spb" style="font-weight: bold; color:#221814;">功能需求，美学需求，和预算需求，是设计价值体现的黄金三角形。设计师所做的工作就是根据用户的需求和偏好，在这个三角中找到完美的平衡点。</span>
				<span class="box_spb">真正的设计，首先是‘量身定制’。好的设计师会主动分析用户个人生习惯，定制解决动线功能、收纳家具功能、结构区域划分，为客户定制一个舒适合理的空间。</span>
				<span class="box_spb">在审美上，设计师可以在充分了解个人品味风格基础上、把控空间整体的线条和色彩和谐、合理搭配软装。</span>
				<span class="box_spb"> 设计师为客户严控预算，把钱花在该花的地方。在对材料产品设备的性价比充分了解和熟悉运用的基础上，设计师能帮用户在控制总预算的同时保证最终效果。</span>
			</div>
			<div class="here_b_box">
				<span class="box_spa"><i></i>精挑细选的住艺设计师</span>
				<span class="box_spb">住艺团队精心挑选出全国最优秀的设计专家，确保每一位设计师都可以为你提供专业的设计。</span>
				<span class="box_spb">行业优秀设计师收费标准一般在每平米300-2000元/之间。住艺设计师收费从每平米500元起。装修整体费用从3000元/平米起。</span>
			</div>
		</div>
		<span class="foot_a">
                <a href="http://www.sobot.com/chat/h5/index.html?sysNum=d816da1bbc6b4814a0929661a3c7dfbc">在线客服</a><span class="foot_a_sp">|</span><a href="tel:4000600636">客服电话</a>
            </span>
	</div>	
</body>
</html>