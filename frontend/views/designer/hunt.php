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
                    <li><a href="<?php echo Url::toRoute('/zyzhinan/guide'); ?>">设计指南</a></li>
                    <li><a href="<?php echo Url::toRoute('/order/list'); ?>">我的住艺</a></li>
                    <li><a href="<?php echo Url::toRoute('/user/feedback'); ?>">更多建议</a></li>
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
                    <input class="ipu" type="text"  placeholder="试试输入设计师姓名或关键字" />
                    <span class="iconfont icon-sousuo" onclick="search()"></span>
                </div>

                <div class="hunt_here_box">
                    <!-- 设计师 -->

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
                                <span class="here_name">Keiji Ashizawa</span><span class="here_namea">北京</span>
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
<script type="text/javascript">

    function search() {
        var search_key = $(".ipu").val();
        $.ajax({
            url: '<?php echo Yii::getAlias('@web') . '/index.php?r=designer/hunt' ?>' + "&&search_key=" + search_key,
            type: 'get',
            //dataType: 'json',
            data: '',
            success: function (data) {
                if (data) {
                   // alert(data);
                    $(".hunt_here_box").html(data);
                }
                else{
                    $(".hunt_here_box").html(data);

                }

            }
        });
    }
</script>