<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>选择风格</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/style_test.css" />
        <link rel="stylesheet"  href="css/iconfont.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript"  src="js/style_test.js"></script>
    </head>
    <body>
        <div class="style_text_boxs">

            <header class="header_top iconfont icon-logo">
                    <!--<input id="ipt" type="text" value="0" />-->
                <span class="top_right iconfont icon-gongneng"></span>
            </header>
            <section class="down_right">
                 <ul>
                    <li><a href="index.html">首页</a></li>
                    <li><a href="designer_list.html">住艺设计师</a></li>
                    <li><a href="designer_list.html">使用指南</a></li>
                    <li><a href="<?php echo Url::toRoute('/order/list'); ?>">我的住艺</a></li>
                    <li><a href="<?php echo Url::toRoute('/user/feedback'); ?>">更多建议</a></li>
                    <li><a href="designer_list.html">暂时登出</a></li>
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

            <section class="style_boxa">
                <div class="box_title">请选择3种您最喜欢的风格</div>
                <div class="style_herea" id="chose_style">
                    <div class="here_div"><img src="img/style_test/1.jpg"/><div class="here_div_bota"></div><div class="here_div_botb">极简</div></div>
                    <div class="here_div"><img src="img/style_test/2.jpg"/><div class="here_div_bota"></div><div class="here_div_botb">工业</div></div>
                    <div class="here_div"><img src="img/style_test/3.jpg"/><div class="here_div_bota"></div><div class="here_div_botb">北欧</div></div>
                    <div class="here_div"><img src="img/style_test/3.jpg"/><div class="here_div_bota"></div><div class="here_div_botb">折中</div></div>
                    <div class="here_div"><img src="img/style_test/3.jpg"/><div class="here_div_bota"></div><div class="here_div_botb">日式</div></div>
                    <div class="here_div"><img src="img/style_test/3.jpg"/><div class="here_div_bota"></div><div class="here_div_botb">美式</div></div>
                    <div class="here_div"><img src="img/style_test/3.jpg"/><div class="here_div_bota"></div><div class="here_div_botb">Art Deco</div></div>
                    <div class="here_div"><img src="img/style_test/3.jpg"/><div class="here_div_bota"></div><div class="here_div_botb">欧式古典</div></div>
                    <div class="here_div"><img src="img/style_test/3.jpg"/><div class="here_div_bota"></div><div class="here_div_botb">地中海/乡村</div></div>
                    <div class="here_div"><img src="img/style_test/3.jpg"/><div class="here_div_bota"></div><div class="here_div_botb">中式</div></div>
                </div>
                <a><div class="chose_btn">
                        描述需求，立即匹配设计师
                    </div></a>
            </section>
        </div>
    </body>
</html>
<script type="text/javascript">
    touch.on(".chose_btn", "tap", function (ev) {
        var gerr = '';
        $("#chose_style>.active").each(function (index) {
            var length = $("#chose_style>.active").length;
            var html = $(this).find(".here_div_botb").html();
            if (index == length - 1) {
                gerr = gerr + html;
            } else {

                gerr = gerr + html + "$";
            }


        });
        
        //提交
        $.ajax({
            url: "<?php echo Yii::getAlias('@web') . '/index.php?r=style/choicestyle'; ?>"+"&&g="+gerr,
            type: 'get',
            //dataType: 'json',
            data: '',
            success: function (data) {

                if(data){
                    window.location.href = "<?php echo Yii::getAlias('@web') . '/index.php?r=project/match_designer'; ?>";
                }

            }
        });
        //alert(gerr);
    });
</script>