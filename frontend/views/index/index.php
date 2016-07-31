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
            <ul class="bxslider bxslideraa">
                <li>
                    <img src="img/index/banner_a.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/banner_b.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/banner_c.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/banner_d.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/banner_e.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/banner_f.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/banner_g.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/banner_h.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/banner_i.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/banner_j.jpg" title="" />
                </li>

            </ul>

            <span class="mesg_spb"><a href="<?php echo Url::toRoute('project/match_designer'); ?>" style="top: 2.4rem;">找设计师</a></span>
        </div>
        <div class="fingerpost">
            <div class="post_title">
                <span class=" iconfont icon-lingxing"><a>设计指南</a></span>
            </div>
            <ul class="bxslider bxsliderbb">
                <li>
                    <img src="img/index/zhinana.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/zhinanb.jpg" title="" />
                </li>
                <li>
                    <img src="img/index/zhinanc.jpg" title="" />
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
                            <img class="here_img" src="<?php
                            $video = $videoModel::findOne($value['video_id']);
                            echo Yii::getAlias('@web') . $video['video_image'];
                            ?>" />
                        </div>
                        <video id="example_video1" class="video-js vjs-default-skin"  preload="none" height="4.2rem" poster="<?php
                               $video = $videoModel::findOne($value['video_id']);
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
            <div class="see_more"><a href="<?php echo Url::toRoute('designer/list'); ?>">认识更多设计师</a></div>

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
            <span class="btn_bot"><a href="<?php echo Url::toRoute('project/match_designer'); ?>">找设计师</a></span>
        </section><!--use_zy end-->

        <section class="nav_bot">

            <span><a href="http://mp.weixin.qq.com/s?__biz=MzI1OTIxNjA2OA==&mid=100000133&idx=1&sn=02f76c4f29b32ea4dfd442b83c2ddf06&scene=1&srcid=0719nZGFjUf0jqEav6uGUFTF#rd">关于住艺</a></span>
            <span><a href="http://form.mikecrm.com/Dlvnng">设计师入驻</a></span>
            <span><a href="http://mp.weixin.qq.com/s?__biz=MzI1OTIxNjA2OA==&mid=100000488&idx=2&sn=a74c70e75e22df2ada22991f71ea7db5&scene=1&srcid=0719WSPBkdkd80QnSiKBzKgl#rd">住艺招聘</a></span>
            <span><a href="<?php echo Url::toRoute('index/toolsdesign'); ?>">公装项目</a></span>
        </section>
        <!--nav_bot end-->


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