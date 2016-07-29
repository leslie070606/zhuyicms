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
        <title>搜索</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/hunt.css" />
        <link rel="stylesheet"  href="css/iconfont.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js" ></script>	
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script type="text/javascript" src="js/hunt.js" ></script>
    </head>
    <body>

        <div class="hunt_box">
            <header class="header_top">
                <span class="hunt_title">搜索</span>
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
            <div class="down_right_zd"></div>  
            <div class="hunt_here">
                <div class="hunt_input">
                    <input class="ipu" type="text"  placeholder="请输入设计师姓名或设计师作品" />
                    <span class="iconfont icon-sousuo"></span>
                </div>
                <div class="history">
                    <span class="his_title">
                        历史搜索
                    </span>
                    <ul class="his_ul">
                        <li class=""><a href="designer_list.html">设计</a></li>
                        <li><a href="designer_list.html">软装</a></li>
                        <li><a href="designer_list.html">硬装</a></li>
                    </ul>
                </div>
                <div class="choose">
                    <span class="his_title">
                        热门推荐
                    </span>
                    <a href="Choose_designer.html">
                        <div class="here_bottom line_center">
                            <div class="here_head">
                                <img src="img/home_page/proa.jpg" />
                            </div>

                            <div class="bottom_name">
                                <span class="here_name">Keiji Ashizawa</span>
                            </div>
                            <div class="bottom_label bottom_referral">
                                <span>台湾暖男</span><span>设计大咖</span>
                            </div>


                        </div>
                    </a>

                    <a href="Choose_designer.html">
                        <div class="here_bottom line_center">
                            <div class="here_head">
                                <img src="img/home_page/proa.jpg" />
                            </div>

                            <div class="bottom_name">
                                <span class="here_name">Keiji Ashizawa</span>
                            </div>
                            <div class="bottom_label bottom_referral">
                                <span>台湾暖男</span><span>设计大咖</span>
                            </div>


                        </div>
                    </a>

                    <a href="Choose_designer.html">
                        <div class="here_bottom line_center">
                            <div class="here_head">
                                <img src="img/home_page/proa.jpg" />
                            </div>

                            <div class="bottom_name">
                                <span class="here_name">Keiji Ashizawa</span>
                            </div>
                            <div class="bottom_label bottom_referral">
                                <span>台湾暖男</span><span>设计大咖</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
