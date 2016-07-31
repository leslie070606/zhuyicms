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
        <title>设计师主页</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/home_page.css" />
        <link rel="stylesheet"  href="css/iconfont.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script type="text/javascript" src="js/home_page.js" ></script>

    </head>
    <body>
        <div class="page_box">
            <header class="header_top iconfont icon-logo">
                    <!--<input id="ipt" type="text" value="0" />-->
                <span class="top_right iconfont icon-gongneng"></span>
            </header>
            <section class="down_right">
                <ul>
                    <li><a href="<?php echo Url::toRoute('/index/index'); ?>">首页</a></li>
                    <li><a href="<?php echo Url::toRoute('/designer/list'); ?>">住艺设计师</a></li>
                    <li><a href="designer_list.html">设计指南</a></li>
                    <li><a href="<?php echo Url::toRoute('/order/list'); ?>">我的住艺</a></li>
                    <li><a href="<?php echo Url::toRoute('/user/feedback'); ?>">更多意见</a></li>
                    <li>   <?php if ($session->get('user_id')) { ?>
                        <a href="<?php echo Url::toRoute('/user/loginout'); ?>">暂时登出</a>

                        <?php } else { ?>

                            <a href = "<?php echo Url::toRoute('/user/login'); ?>">立即登录</a>

                        <?php }; ?>

                    </li>
                </ul>
            </section>
            <div class="down_right_zd"></div>  

            <section class="page_banner">
                <img class="banner_img here_img" src="<?= $data['background'] ?>" />
                <div class="banner_mesg">
                    <div class="banner_name"><?= $data['name'] ?></div>
                    <div class="banner_bq"><span><?= $data['tag'] ?></span></div>
                </div>

            </section>
            <span class="banner_head"><img src="<?= $data['head_portrait'] ?>"/></span>
            <section class="production">
                <div class="pro_title">
                    <span class="titl_span">作品集
                        <a></a>
                    </span>
                </div>
                <div class="pro_box">
                    <?php
                    //此设计师没有作品。
                    if ($data['art_cnt'] == 0 || empty($data['artsets'])) {
                        echo "此设计师暂无作品";
                    } else {
                        foreach ($data['artsets'] as $v) {
                            $artId = $v['art_id'];
                            $artType = $v['type'];
                            $topic = $v['topic'];
                            $brief = $v['brief'];

                            $imgBackground = '';
                            $imgCount = 0;
                            //设计师此作品仅有图片。
                            if ($artType == 0) {
                                $imgIds = $v['image_ids'];
                                $imgIdsArr = explode(',', $imgIds);
                                $imgUrlArr = array();
                                foreach ($imgIdsArr as $id) {
                                    $rows = \frontend\models\Images::findOne($id);
                                    if (empty($rows)) {
                                        continue;
                                    }
                                    $url = $rows->url;
                                    $imgUrlArr[] = $url;
                                }
                                $imgBackground = $imgUrlArr[0];
                                $imgCount = count($imgUrlArr);
                            } elseif ($artType == 1) {
                                $videoId = $v['video_ids']; //目前仅有一个视频。
                                $rows = \common\models\ZyVideo::findOne($videoId);
                                if (!empty($rows)) {
                                    $videoUrl = $rows->video_url;
                                }
                                $videoBackground = isset($rows->video_image) ? $rows->video_image : "/img/home_page/proc.jpg";
                            }


                            $imgBackground = isset($imgBackground) ? $imgBackground : "/img/home_page/prob.jpg";
                            $imgCount = isset($imgCount) ? $imgCount : 0;
                            //图片
                            if ($artType == 0) {
                                $html = <<<HTML
					<div class="pro_here pro_img iconfont" art_id="$artId">
						<img class="here_img" src="$imgBackground" />

						<div class="img_icon"><span class=" iconfont icon-tupian">{$imgCount}张图</span></div>
						<div class="here_botaa"></div>
						<div class="here_bottom line_center">
							{$topic}	
						</div>
					</div>
HTML;
                            } elseif ($artType == 1) {//视频
                                $html = <<<HTML
					<div class="pro_here">
						<div class="pro_here_bcimg iconfont icon-bofang1">
							<img class="" src="$videoBackground"/>
						</div>
						<video id="example_video1" class="video-js vjs-default-skin" preload="none" poster="$videoBackground">
							<source src="$videoUrl" type='video/mp4' />
						</video>
						<div class="here_botaa"></div>
						<div class="here_bottom line_center">
							{$topic}
						</div>
					</div>
HTML;
                            }
                            echo $html;
                        }
                    }
                    ?>
                    <div class="see_more"><a href="#">查看更多作品</a></div>

                    <section class="Basic_Info">
                        <div class="post_title">
                            <span class=" iconfont icon-lingxing"><a>认识设计师</a></span>
                        </div>
                        <div class="Basic_Info_box">
                            <div class="info_here">
                                <div class="info_here_left">
                                    服务范围
                                </div>
                                <div class="info_here_right right_top">
                                    <!--<div class="topa">
                                            <span class="standard">标准服务</span>
                                            <span class="addition">附加服务</span>
                                    </div>-->
                                    <div class="topb">
                                        <span>硬装设计</span>
                                        <div class="topb_box">
                                            <span>平面设计图</span>
                                            <span>立面设计图</span>
                                            <span>施工对接图</span>
                                            <span>单次咨询</span>
                                            <span>主材推荐</span>
                                        </div>
                                    </div><!--topb end-->

                                    <div class="topb">
                                        <span>施工对接</span>
                                        <div class="topb_box">
                                            <span>推荐施工队</span>
                                            <span>自有施工队</span>
                                            <span>材料购买陪同</span>
                                            <span>工地现场监理</span>
                                        </div>
                                    </div><!--topb end-->

                                    <div class="topb">
                                        <span>软装设计</span>
                                        <div class="topb_box">
                                            <span>家居平面图</span>
                                            <span>产品推荐</span>
                                            <span>家具定制</span>
                                            <span>家具购买陪同</span>
                                            <span>主材推荐</span>
                                        </div>
                                    </div><!--topb end-->

                                    <div class="topb">
                                        <span>其他</span>
                                        <div class="topb_box">

                                            <span>建筑设计</span>
                                            <span>艺术品陈设咨询</span>
                                            <span>庭院景观设计</span>
                                        </div>
                                    </div><!--topb end-->
                                </div>
                            </div><!--info_here end-->

                            <div class="info_here">
                                <div class="info_here_left">
                                    服务城市
                                </div>
                                <div class="info_here_right cccc">
                                    北京
                                </div>
                            </div><!--info_here end-->

                            <div class="info_here">
                                <div class="info_here_left">
                                    风格特点
                                </div>
                                <div class="info_here_right cccc">
                                    皆可
                                </div>
                            </div><!--info_here end-->

                            <div class="info_here">
                                <div class="info_here_left">
                                    过往经历及奖项
                                </div>
                                <div class="info_here_right cccc">
                                    <?php echo $data['winnings'] ?>
                                </div>
                            </div><!--info_here end-->

                        </div>

                    </section><!--Basic_Info end-->
                    <div class="page_bottom">
                        <span class="bota" id="check"><a>查看费用</a></span>
                        <span class="bota sc_bot"><a>收藏设计师</a></span>
                        <span class="botb"><a>联络客服</a></span>
                    </div>


                    <div class="charges_zd"></div>
                    <div class="check_charges">
                        <div>
                            <span class="charges_left charges_title">设计+施工</span>
                            <span class="charges_right red">￥ 2800+ / ㎡</span>
                        </div>
<!--                        <div class="charges_hui charges_huibbb">含：专业设计+认证施工+主材帮挑+家具选样清单+现场陪买2次（4小时）</div>-->
                        <div class="charges_huia">住艺参考：如果主材、家具由设计师团队全权购买，这部分的价格将由设计师和用户面议确定。</div>

                        <div>
                            <span class="charges_left charges_title chargesaas">设计</span>
                        </div>
                        <div>
                            <span class="charges_left">设计费</span>
                            <span class="charges_right red">￥300+/㎡</span>
                        </div>
                       
                        <div class="charges_hui">含：平面图设计+立面图设计+水电图造型图等施工用途设计+效果图+家具选样清单。</div>
                    </div>


                </div>
        </div>
        <div class="pro_img_box" style="display: none;">
            <div class="pro_img_zd"></div>
            <span class="pro_img_title"><i id="title_ida">1</i>/<i id="title_idb">7</i></span>
            <ul class="bxslider">
            </ul>
        </div>
    </body>
</html>
<script type="text/javascript">

    function GetQueryString(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null)
            return  unescape(r[2]);
        return null;
    }
    var url = window.location.href;
    var designer_id = GetQueryString("params");

    var user_id = 1;
    var params = user_id + "," + designer_id;

    var collect_status = 0;
    touch.on(".sc_bot", "tap", function (ev) {
        console.log(ev.currentTarget)
        if ($(this).hasClass("active")) {
            $(this).html("收藏设计师");
            $(this).removeClass("active");
            collect_status = 1;

        } else {
            $(this).html("已收藏");
            $(this).addClass("active");
            collect_status = 2;
        }

        if (collect_status == 1) {
            $.ajax({
                type: "GET",
                url: "<?php echo Yii::getAlias('@web') . '/index.php?r=my/uncollect'; ?>" + "&&params=" + params,
                data: "",
                success: function (data) {
                    console.log("js output...........11111");
                    console.log(data);
                }
            })
        } else if (collect_status == 2) {
            $.ajax({
                type: "GET",
                url: "<?php echo Yii::getAlias('@web') . '/index.php?r=my/collect'; ?>" + "&&params=" + params,
                data: "",
                success: function (data) {
                    console.log("js output...........2222222222222");
                    console.log(data);
                }
            })

        }

    });
    var nubeee = 0;
    var htmllll = $(".pro_img_box").html();
    touch.on(".pro_img", "tap", function () {
        $(".pro_img_box").show();
        var html = "";
        var art_id = $(this).attr("art_id");
        $.ajax({
            type: "get",
            url: "<?php echo Yii::getAlias('@web') . '/index.php?r=designer/artsets'; ?>" + "&&params=" + art_id,
            async: true,
            success: function (data) {
                data = eval('(' + decodeURI(data) + ')');
                console.log(data);
                var length = data.length;
                $("#title_idb").html(length);
                for (var i = 0; i < length; i++) {
                    html += '<li><img src="' + data[i] + '" title="" /></li>';
                }
                $(".bxslider").html(html);
                $('.bxslider').bxSlider({controls: false, auto: false, pause: 4000, speed: 600});
            }
        });

    });
    touch.on(".pro_img_box", "tap", function () {

        $(this).hide();
        $(this).html(htmllll);
    });
</script>
