<?php

use yii\helpers\Url;

$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
}
$_cookieSts = \common\controllers\BaseController::checkLoginCookie();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>设计师列表</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/designer_list.css" />
        <link rel="stylesheet"  href="//at.alicdn.com/t/font_1467361951_3606887.css" />
       
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js" ></script>	
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script type="text/javascript" src="js/designer_list.js" ></script>
        <script src="js/iscroll.js"></script>
	<script src="js/pullToRefresh.js"></script>	
        
    </head>
    <body>
        <div class="des_box">
            <header class="header_top iconfont icon-logo">
                <a href="<?= 'index.php?r=designer/hunt' ?>" style="color: #ffffff;"><span class="top_left iconfont icon-sousuo"></span></a>
<!--                <span class="top_lefta iconfont icon-shaixuan"></span>-->
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
                            <a abc="<?php echo Url::toRoute('/user/loginout'); ?>">暂时登出</a>

                        <?php } else { ?>

                            <a href = "<?php echo Url::toRoute('/user/login'); ?>">立即登录</a>

                        <?php }; ?>

                    </li>
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
<!--            <div class="sousuo_box">
                <div class="sousuo_title">
                    设计师类别
                </div>
                <div class="sousuo_tab">
                    <span>室内设计师</span>
                    <span>建筑设计师</span>
                    <span>景观设计师</span>
                </div>

                <div class="sousuo_title">
                    设计师服务城市
                </div>

                <div class="xiala_box">
                    <input class="xiala_sp" disabled placeholder="请选择服务城市" />
                    <ul class="xiala_ul">
                        <li>北京</li>
                        <li>上海</li>
                        <li>广州</li>
                    </ul>
                </div>

                <div class="sifting">甄选</div>
            </div>-->
            <div class="designer_box" id="wrapper">
                <ul>
                <?php
                foreach ($data as $v) {
                    //获取单个设计师的名字，头像，作品等信息
                    $designerId = $v['designer_id'];
                    $name = $v['name'];
                    $tag = $v['tag'];
                    $headPortrait = Yii::$app->request->hostInfo . $v['head_portrait'];
                    $background = $v['background'];
					$city = $v['city'];
                    $labelSpan = '';
                    if (isset($tag) && !empty($tag)) {
                        $tagArr = explode(',', $tag);
                        if (count($tagArr) == 1) {
                            $labelSpan = "<span>$tagArr[0]</span>";
                        } else {
                            foreach ($tagArr as $t) {
                                $lt = "<span>$t</span>";
                                $labelSpan .= $lt;
                            }
                        }
                    }

                    $html = <<<HTML
						<li><div class="pro_here iconfont">
							<img class="here_img" src="$background" designer_id="$designerId"/>
							<div class="here_zhe"></div>
							<div class="here_botaa"></div>
							<div class="here_bottom line_center">
								<div class="here_head">
									<img src="$headPortrait" />
								</div>
								<div class="bottom_name">
									<span class="here_name">{$name}</span>
									<span class="here_namea">{$city}</span>
								</div>
								<div class="bottom_label bottom_referral">
									{$labelSpan}
								</div>
							</div>
						</div></li>
HTML;
                    echo $html;
                }
                ?>
                    </ul>
            </div>
                        <div id="jiazai_ing" style=" float: left; display: none; width: 100%;color: #777777; text-align: center; margin: .4rem 0;">正在努力加载中...</div>
        </div>
    </body>
</html>

<script type='text/javascript'>
    refresher.init({
	id:"wrapper",//<------------------------------------------------------------------------------------┐
	pullDownAction:Refresh,                                                            
	pullUpAction:Load 																			
	});																																							
function Refresh() {																
	setTimeout(function () {	// <-- Simulate network congestion, remove setTimeout from production!
		var el, li, i;																		
		el =document.querySelector("#wrapper ul");					
		//这里写你的刷新代码				
		document.getElementById("wrapper").querySelector(".pullDownIcon").style.display="none";		
		document.getElementById("wrapper").querySelector(".pullDownLabel").innerHTML="<img src='css/ok.png'/>刷新成功";																					 
		setTimeout(function () {
			wrapper.refresh();
			document.getElementById("wrapper").querySelector(".pullDownLabel").innerHTML="";								
			},1000);//模拟qq下拉刷新显示成功效果
		/****remember to refresh after  action completed！ ---yourId.refresh(); ----| ****/
	}, 1000);
}

function Load() {
            
                    var length=$(".designer_box ul li").length;
                    $.ajax({
                   type: "get",
                   data: "",
                   url: "<?php echo Yii::getAlias('@web') . '/index.php?r=designer/list'; ?>" + "&&params=" + length,
                   async: true,
                   success: function (data) {
                        if(data==""||data==null){
                       $(".pullUpIcon").css("background","none");
                        $(".pullUpLabel").html("还有更多设计师，想认识他们？请联系住艺");
                   }else{
                       data = eval('(' + decodeURI(data) + ')');
                       jiazai(data);
                      wrapper.refresh();
                       var html_box=$(".designer_box ul").html();
                       localStorage.setItem("zhuyi_local",html_box);
                   }
                   }
               });
           
               
}
//以上为下拉刷新代码
    
    
    touch.on(".sifting", "tap", function (ev) {
        var height = $(window).height();
        var get = "室内设计师,beijing";
        $.ajax({
            type: "GET",
            url: "<?php echo Yii::getAlias('@web') . '/index.php?r=designer/list'; ?>" + "&&params=" + get,
            data: "",
            success: function (data) {
                $(".sousuo_box").animate({marginTop: -height}, 400);
            }
        })

    })
    $("body").on("click", ".pro_here", function (ev) {
        var here_top=$(ev.currentTarget).parent("li").index();
        var designer_id = $(ev.currentTarget).find(">img").attr("designer_id");
        $.ajax({
            type: "GET",
            url: "<?php echo Yii::getAlias('@web') . '/index.php?r=designer/detail'; ?>" + "&&params=" + designer_id,
            data: "",
            success: function (data) {
                localStorage.setItem("here_top",here_top);
                window.location.href = "<?php echo Yii::getAlias('@web') . '/index.php?r=designer/detail'; ?>" + "&&params=" + designer_id;
            }
        })
    });

    touch.on(".pro_here", "tap", function (ev) {
    var here_top=$(ev.currentTarget).parent("li").index();
        var designer_id = $(ev.currentTarget).find(">img").attr("designer_id");
        $.ajax({
            type: "GET",
            url: "<?php echo Yii::getAlias('@web') . '/index.php?r=designer/detail'; ?>" + "&&params=" + designer_id,
            data: "",
            success: function (data) {
                 localStorage.setItem("here_top",here_top);
                window.location.href = "<?php echo Yii::getAlias('@web') . '/index.php?r=designer/detail'; ?>" + "&&params=" + designer_id;
            }
        })
    });



    var yyyy = 0
    function jiazai(data) {

        var length = data.length;
       
        for (var i = 0; i < data.length; i++) {
            var vtag = data[i].tag.split(",");
            var htmlabb = '';
            for (var b = 0; b < vtag.length; b++) {
                var html = "<span>" + vtag[b] + "</span>"
                htmlabb += html;
            }
            var html = '<li><div class="pro_here iconfont">'
                    + '<img designer_id="' + data[i].designer_id + '" class="here_img" src="' + data[i].background + '" />'
                    + '<div class="here_zhe"></div>'
                    + '<div class="here_botaa"></div>'
                    + '<div class="here_bottom line_center">'
                    + '<div class="here_head">'
                    + '<img src="' + data[i].head_portrait + '" />'
                    + '</div>'

                    + '<div class="bottom_name">'
                    + '<span class="here_name">' + data[i].name + '</span>'
                    + '<span class="here_namea">' + data[i].city + '</span>'
                    + '</div>'
                    + '<div class="bottom_label bottom_referral">'
                    + htmlabb
                    + '</div>'


                    + '</div>'
                    + '</div></li>'
            $(".designer_box ul").append(html);
            var widthaa = $(".here_img").width();
            $(".here_img").css("height", widthaa * .56);
            yyyy++;
        }
    }
</script>
