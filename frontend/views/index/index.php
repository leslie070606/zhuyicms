<?php

use common\models\ZyVideo;
use yii\helpers\Url;

$videoModel = new ZyVideo();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>住艺</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/index.css" />
        <!--<link rel="stylesheet" href="css/video-js.min.css" />-->
        <link rel="stylesheet"  href="css/iconfont.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js" ></script>	
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <!--<script type="text/javascript" src="js/video.min.js" ></script>-->
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script type="text/javascript" src="js/index.js" ></script>
    </head>
    <body>
        <div class="banner">
            <img src="img/index/indexa.jpg" />
            <div class="banner_mesg">
                <span class="mesg_spa">好设计在住艺</span>
                <span class="mesg_spb"><a href="<?php echo Url::toRoute('project/match_designer'); ?>">找设计师</a></span>
            </div>
        </div>
        <div class="fingerpost">
            <div class="post_title">
                <span class=" iconfont icon-lingxing"><a>设计指南</a></span>
            </div>
            <ul class="bxslider">
                <li>
                    <img src="img/index/indexa.jpg" title="" />
                    <span class="bxs_title">设计师收费标准</span>
                </li>
                <li>
                    <img src="img/index/indexb.jpg" title=""  />
                    <span class="bxs_title">设计师的价值</span>
                </li>
                <li>
                    <img src="img/index/indexa.jpg" title=""  />
                    <span class="bxs_title">如何有效沟通</span>
                </li>
                <li>
                    <img src="img/index/indexb.jpg" title=""  />
                    <span class="bxs_title">小小白的第一课</span>
                </li>
            </ul>


        </div>

        <section class="production">
            <div class="pro_title">
                <span class="titl_span">住艺设计师
                    <a></a>
                </span>
            </div>
            <div class="pro_box">
<?php foreach ($data as $value) { ?>
                    <div class="pro_here">
                        <div class="pro_here_bcimg iconfont icon-bofang1">
                            <img class="" src="<?php $video = $videoModel::findOne($value['video_id']);
    echo Yii::getAlias('@web') . $video['video_image'];
    ?>" />
                        </div>
                        <video id="example_video1" class="video-js vjs-default-skin"  preload="none" height="4.2rem" poster="<?php $video = $videoModel::findOne($value['video_id']);
    echo Yii::getAlias('@web') . $video['video_image'];
    ?>">
                            <source src="<?php echo $video['video_url']; ?>" type='video/mp4' />
                        </video>
                        <div class="here_botaa"></div>
                        <div class="here_bottom line_center">
                            <div class="here_head">
                                <img src="img/home_page/banner_head.jpg" />
                            </div>

                            <div class="bottom_name">
                                <span class="here_name"><?= $value['designer_name'] ?></span><span class="here_namea"><?= $value['designer_city'] ?></span>
                            </div>
                            <div class="bottom_referral">
                    <?= $value['description'] ?>
                            </div>
                        </div>
                    </div><!--pro_here end-->
<?php } ?>
            </div><!--pro_box end-->
            <div class="see_more"><a href="designer_list.html">认识更多设计师</a></div>

        </section><!--production end-->

        <section class="use_zy">
            <div class="use_zy_title">
                <span class="use_zy_a">如何开始</span>
                <span class="use_zy_b"></span>
            </div>
            <div class="use_zy_box">
                <span class=" iconfont icon-ceshi use_one"></span>
                <span class="use_text use_two">提交需求</span>
                <span class=" iconfont icon-jiantou use_three"></span>

                <span class=" iconfont icon-shejishi use_one"></span>
                <span class="use_text use_two">智能匹配设计师</span>
                <span class=" iconfont icon-jiantou use_three"></span>

                <span class=" iconfont icon-hezuo use_one"></span>
                <span class="use_text use_two">约见设计师</span>
                <span class=" iconfont icon-jiantou use_three"></span>

                <span class=" iconfont icon-sheji use_one"></span>
                <span class="use_text use_two">签约 获得方案</span>
                <span class=" iconfont icon-jiantou use_three"></span>
            </div>
            <span class="btn_bot"><a href="<?php echo Url::toRoute('project/match_designer'); ?>">开始设计</a></span>
        </section><!--use_zy end-->
        <section class="nav_bot">

            <span><a href="#">关于住艺</a></span>
            <span><a href="#">设计师入驻</a></span>
            <span><a href="#">住艺招聘</a></span>
            <span><a href="#">公装项目</a></span>


        </section><!--nav_bot end-->


        <footer class="foot">
            <span class="foot_a">
                VIP客服  <a href="tel:4000600636">4000-600-636</a>
            </span>
            <span class="foot_b">
                © zhuyi, Inc.
            </span>
        </footer>

    </body>
</html>