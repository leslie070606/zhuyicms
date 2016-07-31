<?php
use yii\helpers\Url;
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
        <div class="guide_boxa">
            <header class="header_top iconfont icon-logo">
                <!--<input id="ipt" type="text" value="0" />-->
                <span class="top_right iconfont icon-gongneng"></span>
            </header>
            <section class="down_right">
                <ul>
                    <li><a href="index.html">首页</a></li>
                    <li><a href="designer_list.html">住艺设计师</a></li>
                    <li><a href="style_test.html">风格测试</a></li>
                    <li><a href="designer_list.html">使用指南</a></li>
                    <li><a href="user.html">我的住艺</a></li>
                    <li><a href="feedback.html">意见反馈</a></li>
                    <li><a href="login.html">退出登录</a></li>
                </ul>
            </section> 
            <div class="down_right_zd"></div>  
            <div class="guide_box_here">
                <a class="here_a_a" href="<?php echo Url::toRoute('/zyzhinan/guidea'); ?>"><img src="img/index/zhinana.jpg" /></a>
                <a class="here_a_a" href="<?php echo Url::toRoute('/zyzhinan/guideb'); ?>"><img src="img/index/zhinanb.jpg" /></a>
                <a class="here_a_a" href="<?php echo Url::toRoute('/zyzhinan/guidec'); ?>"><img src="img/index/zhinanc.jpg" /></a>
            </div>

        </div>	
    </body>
</html>