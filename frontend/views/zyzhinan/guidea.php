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
                <span class="guide_box_title">住艺有何不同</span>
                <div class="here_a_box">
                    <span class="box_spa red">家居设计的“高级定制”</span>
                    <span class="box_spb">住艺帮您甄选最值得推荐的设计师，将为您量身定制最合适您家的设计方案</span>
                </div>
                <div class="here_a_box">
                    <span class="box_spa red">每一分钱都花在刀刃上</span>
                    <span class="box_spb">住艺设计师都是材料和工艺的大师，将协助您拟定精细预算</span>
                </div>
                <div class="here_a_box">
                    <span class="box_spa red">管家式的全程服务</span>
                    <span class="box_spb">住艺为您提供一对一的管家服务，将协助您从设计到实施的全流程，解答您在各个环节的疑问</span>
                </div>
                <div class="here_a_box">
                    <span class="box_spa red">能够完美落地的设计方案</span>
                    <span class="box_spb">除了设计方案，住艺设计师还将协助您对接经验丰富的施工团队并监督每一个施工细节</span>
                </div>
                <div class="here_a_box">
                    <span class="box_spa red">摆脱建材选择困难症</span>
                    <span class="box_spb">最后，住艺设计师将努力为您甄选高品质建材，让您摆脱逛建材城这件苦差事</span>
                </div>
            </div>
            <span class="foot_a">
                <a href="http://www.sobot.com/chat/h5/index.html?sysNum=d816da1bbc6b4814a0929661a3c7dfbc">在线客服</a><span class="foot_a_sp">|</span><a href="tel:4000600636">客服电话</a>
            </span>
        </div>	
    </body>
</html>