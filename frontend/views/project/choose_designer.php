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
                    <li><a href="index.html">首页</a></li>
                    <li><a href="designer_list.html">住艺设计师</a></li>
                    <li><a href="style_test.html">风格测试</a></li>
                    <li><a href="designer_list.html">使用指南</a></li>
                    <li><a href="user.html">我的住艺</a></li>
                    <li><a href="designer_list.html">意见反馈</a></li>
                    <li><a href="designer_list.html">退出登录</a></li>
                </ul>
            </section> 
            <div class="down_right_zd"></div> 

            <div class="choose_top">
                <span class="choose_top_a">Hi  Kevin</span>
                <span class="choose_top_b">请选择三位你喜欢的设计师，我们将为您优先匹配</span>
            </div>

            <div class="designer_box">
                <?php
                foreach ($model as $value) {
                    $designerModel = new frontend\models\DesignerBasic();
                    $designers = $designerModel->getDesignerById($value['did']);

                    //获取头像
                    ?>
                    <div class="pro_here iconfont" id="" value_id="<?= $value['did'] ?>">

                        <a href="#"><img class="here_img" src="img/home_page/prob.jpg" /></a>
                        <div class="here_zhe"></div>
                        <div class="here_botaa"></div>
                        <div class="here_bottom line_center">
                            <div class="here_head">
                                <img src="img/home_page/proa.jpg" />
                            </div>

                            <div class="bottom_name">
                                <span class="here_name"><?= $designers['name'] ?></span>
                            </div>
                            <div class="bottom_label bottom_referral">
                                <span><?= $designers['name'] ?></span><span>设计大咖</span>
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
                <span class="rg_pp"><i class="iconfont icon-weixuanzhong rg_ppi"></i><i id="htmll">你可以不选择设计师，我们将为你人工匹配</i></span>

            </div>		
        </div>

    </body>
</html>
<script>
    touch.on(".navv_tj", "tap", function (ev) {
        var user_id = 1;
        var project_id = 2;
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
                
               alert(data);
            }
        })
    })


</script>