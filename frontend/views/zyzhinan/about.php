<?php

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
                <span class="guide_box_title">一百个字 ，读懂住艺</span>
                <span class="iconfont icon-logo1"></span>
                <div class="here_c_box">
                    <span class="box_sp">“住艺”是康泰纳仕集团(Condé Nast)旗下，与《安邸AD》关联的全新室内设计师平台。</span>
                    <span class="box_sp">住艺集结了国内最优质的设计人才，只为帮你找到最理想的设计师，让空间变成家。</span>
                    <span class="box_sp">住艺还将为你提供从需求梳理、专业咨询、产品推荐，到质量把控的全程无忧管家式服务，让从此你摆脱装修设计的繁琐困难，变得省心舒心。</span>
                    <span class="box_sp">除了家之外，如果你想拥有独一无二的办公室、餐厅或店铺，住艺同样能够帮助你！</span>
                    <span class="box_sp">来住艺，与设计师一起来实现你的梦想空间吧！</span>
                </div>









            </div>

        </div>	
    </body>
</html>