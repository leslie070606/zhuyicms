<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>工装设计</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/index.css" />
        <link rel="stylesheet" href="css/video-js.min.css" />
        <link rel="stylesheet"  href="css/iconfont.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js" ></script>	
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/video.min.js" ></script>
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script type="text/javascript" src="js/index.js" ></script>
    </head>
    <body>
        <div class="index_box tools_box">
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
            <div class="banner">
                <img src="img/index/gz_banner.jpg" />
                <div class="banner_mesg">
                    <span class="mesg_spa">好设计在住艺</span>
                    <span class="mesg_spb"><a href="javascript:">匹配设计师</a></span>
                </div>
            </div>
            <div class="fingerpost">
                <div class="post_title">
                    <span class=" iconfont icon-lingxing"><a>住艺指南</a></span>
                </div>
                <ul class="bxslider bxsliderbb">
                    <li>
                        <img src="img/index/gz1_imga.jpg" title="" />
                        <!--<span class="bxs_title">设计师的价值</span>-->
                    </li>
                    <li>
                        <img src="img/index/gz1_imgb.jpg" title="" />
                    </li>
                    <li>
                        <img src="img/index/gz1_imgc.jpg" title="" />
                    </li>
                    <li>
                        <img src="img/index/gz1_imgd.jpg" title="" />
                    </li>
                </ul>

                <ul class="bxslider bxsliderbb">
                    <li>
                        <img src="img/index/gz_imga.jpg" title="" />
                    </li>
                    <li>
                        <img src="img/index/gz_imgb.jpg" title="" />
                    </li>
                    <li>
                        <img src="img/index/gz_imgc.jpg" title="" />
                    </li>
                    <li>
                        <img src="img/index/gz_imgd.jpg" title="" />
                    </li>
                </ul>


            </div>

            <section class="production">
                <div class="pro_title">
                    <span class="titl_span">精品案例
                        <a></a>
                    </span>
                </div>
                <div class="pro_box">
                    <div class="pro_here">
                        <div class="pro_here_bcimg iconfont icon-bofang1">
                            <img class="here_img" src="img/home_page/proc.jpg" />
                        </div>
                        <video id="example_video2" class="video-js vjs-default-skin" preload="none" poster="img/index/indexb.jpg">
                            <source src="img/gaizaojia.mp4" type='video/mp4' />
                        </video>
                        <div class="here_botaa"></div>
                        <div class="here_bottom line_center">
                            <a href="home_page.html">
                                <div class="here_head">
                                    <img src="img/home_page/banner_head.jpg" />
                                </div>
                                <div class="bottom_name">
                                    <span class="here_name">Keiji Ashizawa</span><span class="here_namea">北京</span>
                                </div>
                                <div class="bottom_referral">
                                    奇趣百变的青春魔术，来自西班牙Yono
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--pro_here end-->
                </div><!--pro_box end-->
            </section><!--production end-->
            <div class="bot_btn_aa">
                <span>匹配设计师</span>
            </div>
            <section class="nav_bot">

                <span><a href="http://mp.weixin.qq.com/s?__biz=MzI1OTIxNjA2OA==&mid=100000133&idx=1&sn=02f76c4f29b32ea4dfd442b83c2ddf06&scene=1&srcid=0719nZGFjUf0jqEav6uGUFTF#rd">关于住艺</a></span>
                <span><a href="http://form.mikecrm.com/Dlvnng">设计师入驻</a></span>
                <span><a href="http://mp.weixin.qq.com/s?__biz=MzI1OTIxNjA2OA==&mid=100000488&idx=2&sn=a74c70e75e22df2ada22991f71ea7db5&scene=1&srcid=0719WSPBkdkd80QnSiKBzKgl#rd">住艺招聘</a></span>
                <span><a href="<?php echo Url::toRoute('index/toolsdesign'); ?>">公装项目</a></span>
            </section><!--nav_bot end-->


            <footer class="foot">
                <span class="foot_a">
                    VIP客服  <a href="tel:4000600636">4000-600-636</a>
                </span>
                <span class="foot_b">
                    © zhuyi, Inc.
                </span>
            </footer>




        </div>

    </body>
</html>