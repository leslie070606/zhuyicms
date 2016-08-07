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
        <title>选择设计师</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/Choose_designer.css" />
        <link rel="stylesheet"  href="css/iconfont.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js" ></script>	
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script type="text/javascript" src="js/Choose_designer.js" ></script>
    </head>
    <body>
        <div class="choose_box">
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
                            <a href="<?php echo Url::toRoute('/user/loginout'); ?>">暂时登出</a>

                        <?php } else { ?>

                            <a href = "<?php echo Url::toRoute('/user/login'); ?>">立即登录</a>

                        <?php }; ?>

                    </li>
                </ul>
            </section> 
            <div class="down_right_zd"></div> 

            <div class="choose_top">
                <span class="choose_top_a"></span>

                <?php
                $num = count($model);
                if ($num > 0) {
                    if ($num >= 3) {
                        $numc = 3;
                    } else {
                        $numc = $num;
                    }
                    ?>
                    <span class="choose_top_b">找到了<?= $num ?>位适合你的设计师，请从中选择<?= $numc ?>位优先约见</span>
                <?php } else { ?>

                    <span class="choose_top_b">未匹配到设计师,请联系客服!</span>

                <?php } ?>
            </div>

            <div class="designer_box">
                <?php
                foreach ($model as $value) {

                    $designerModel = new frontend\models\DesignerBasic();
                    $designers = $designerModel->getDesignerById($value['did']);

                    $imageModel = new \frontend\models\Images();
                    //头图
                    $headimgmodel = $imageModel->findOne($designers['head_imgid']);
                    if (empty($headimgmodel)) {
                        $headimg = 'img/home_page/designer_headimg.jpg';
                    } else {
                        $headimg = $headimgmodel->url;
                    }
                    //获取头像
                    ?>
                    <div class="pro_here iconfont" id="" value_id="<?= $value['did'] ?>">

                        <a href="<?php echo Url::toRoute(['/designer/detail', 'params' => $value['did']]); ?>"><img class="here_img" src="<?= $headimg ?>" /></a>
                        <div class="here_zhe"></div>
                        <div class="here_botaa"></div>
                        <div class="here_bottom line_center">
                            <div class="here_head">
                                <a href="<?php echo Url::toRoute(['/designer/detail', 'params' => $value['did']]); ?>">
                                    <img src="<?php
                                    $db = new frontend\models\DesignerBasic();
                                    if ($db->getHeadPortrait($value['did'])) {
                                        echo Yii::$app->params['frontDomain'] . $db->getHeadPortrait($value['did']);
                                    } else {
                                        echo Yii::$app->params['frontDomain'] . '/img/home_page/banner_head.jpg';
                                    }
                                    ?>" />
                                </a>
                            </div>

                            <div class="bottom_name">
                                <span class="here_name"><?= $designers['name'] ?></span> 
                            </div>
                            <div class="bottom_label bottom_referral">
                                <?php
                                $tagArr = explode(',', $designers['tag']);
                                if (count($tagArr) > 1) {
                                    foreach ($tagArr as $v) {
                                        ?>
                                        <span><?= $v ?></span>

                                        <?php
                                    }
                                } else {
                                    ?>
                                    <span><?= $designers['tag'] ?></span>

                                <?php } ?>
                            </div>

                            <span class="bot_input"><i class="input_box iconfont icon-weixuanzhong"></i></span>
                        </div>
                    </div><!--pro_here end-->
                <?php } ?> 
            </div>
            <span class="click_more">查看更多立即匹配出的设计师 </span>
            <div class="bot_navv">
                <ul class="box_sjs">
                        <!--<li><img src="img/home_page/banner_head.jpg"/><i class="iconfont icon-shanchu shanchu"></i></li>
                        <li><img src="img/home_page/banner_head.jpg"/><i class="iconfont icon-shanchu shanchu"></i></li>
                        <li><img src="img/home_page/banner_head.jpg"/><i class="iconfont icon-shanchu shanchu"></i></li>-->
                </ul>
                <span class="navv_tj zhihui">提交</span>
                <span class="rg_pp"><i class="iconfont icon-weixuanzhong rg_ppi"></i><i id="htmll">没有发现喜欢的设计师，请住艺管家为我再次甄选 </i></span>

            </div>		
        </div>

    </body>
</html>
<script>
    touch.on(".navv_tj", "tap", function (ev) {
        var user_id = <?= $user_id ?>;
        var project_id = <?= $project_id ?>;
        var html = "";
        var is_pipei = "";
        var length = $(".pro_here .icon-xuanzhong").length;
        $(".pro_here .icon-xuanzhong").each(function (index) {
            var val = $(this).parents(".pro_here").attr("value_id");
            if (index == length - 1) {
                html += val;
            } else {
                html += val + ",";
            }

        })
        if ($(".navv_tj").hasClass("zhihui")) {
            return false;
        } else {
            //alert("111")
        }
        if ($(".rg_pp .iconfont").hasClass("icon-xuanzhong")) {
            is_pipei = 1;
        } else {
            is_pipei = 0;
        }
        ;
        var str = user_id + "$" + project_id + "$" + html + "$" + is_pipei;

        $.ajax({
            type: "GET",
            url: "<?php echo Yii::getAlias('@web') . '/index.php?r=order/index'; ?>" + "&&params=" + str,
            data: "",
            success: function (data) {
                // alert(data);
                if (data = 3) {
                    //跳转人工
                    window.location.href = "<?php echo Yii::getAlias('@web') . '/index.php?r=order/list'; ?>";
                }
                if (data = 1) {
                    window.location.href = "<?php echo Yii::getAlias('@web') . '/index.php?r=order/list'; ?>";
                }

            }
        })
    })


</script>