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
        <title>需求问题</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/demand_problem.css" />
        <link rel="stylesheet"  href="css/iconfont.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js" ></script>	
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

    </head>
    <body>
        <div class="demand_box">
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

            <div class="first_box here_0">
                <span class="dem_title">你需要的服务类型？</span>
                <div class="boxa_box">
                    <span class="box_soa">装修设计</span>
                    <span class="box_sob">新房，二手房重新装修</span>
                </div>
                <div class="boxa_box">
                    <span class="box_soa">软装咨询</span>
                    <span class="box_sob">家居配饰  布局摆放</span>
                </div>

                <div class="boxa_box">
                    <span class="box_soa">庭院景观</span>
                    <span class="box_sob">庭院、花园、景观规划</span>
                </div>

                <div class="boxa_box">
                    <span class="box_soa">公装设计</span>
                    <span class="box_sob">办公室 商铺 会所 艺术馆</span>
                </div>
            </div>

            <div class="demand_big">
                <div class="demand_here active here_1">
                    <span class="dem_title">你的家位于？</span>
                    <span class="dem_list">第<a class="red">1</a>题/7题</span>
                    <span class="list_title">主要服务城市</span>
                    <div class="dem_where">
                        <span class="">北京</span>
                        <span>上海</span>
                        <span>成都</span>
                    </div>
                    <span class="list_title">其他城市</span>
                    <input class="dema_ipt" type="text" placeholder="输入城市名称" />
                </div>

                <div class="demand_here here_2">
                    <span class="dem_title">你的住宅类型是？</span>
                    <span>第<a class="red">2</a>题/7题</span>
                    <div class="fx_box four_box">


                        <div class="fx_here">住宅公寓</div>
                        <div class="fx_here">复式/Loft</div>
                        <div class="fx_here">独栋/联排别墅</div>


                    </div>
                    <input class="dema_ipt" type="text" placeholder="其他住宅（例如：旧仓库/厂房/房车/集装箱）" />
                </div>

                <div class="demand_here  here_3">
                    <span class="dem_title">你的家多大？</span>
                    <span>第<a class="red">3</a>题/7题</span>
                    <span class="after_input">
                         <input class="dema_ipt three_ipt" type="tel" placeholder="输入建筑面积" />
                         <i>平米</i>
                    </span>
                   
                    
                </div>

                <div class="demand_here here_4">
                    <span class="dem_title">打算什么时候开工？</span>
                    <span>第<a class="red">4</a>题/7题</span>
                    <div class="four_box">
                        <div>我想尽快开工</div>
                        <div>3个月以后</div>
                        <div>暂时还不急</div>
                    </div>
                    <span class="other_box">
                        <span>+</span> 或告诉住艺你想开工的具体日期
                    </span>
                    <section class="other_box2">
                        <input class="dema_ipt" type="text" placeholder="具体时间" />
                    </section>
                </div>

                <div class="demand_here here_5">
                    <span class="dem_title">你需要哪种服务？</span>
                    <span>第<a class="red">5</a>题/7题</span>
                    <div class="five_box">
                        <div class="last_five">
                            <span>设计</span>

                        </div>
                        <div class="last_five">

                            <span>设计+施工</span>
                        </div>

                    </div>
                </div>

                <div class="demand_here here_6">
                    <span class="dem_title">你的大致预算是？(万元)</span>
                    <span>第<a class="red">6</a>题/7题</span>
                    <div class="six_box">
                        <span class="after_input">
                        <input class="dema_ipt" type="tel" placeholder="输入预算" />
                        <i>万元</i>
                        </span>
                        <div class="dema_explain">
                            <span class="explain_title">设计<i id="sgdj">+施工</i>：</span>
                            <div class="explain_mesg">
                                [住艺参考] 如果你需要设计+施工服务，综合考虑市场价及设计师报价后（依据设计师个人差异，设计费用报价多在400元/㎡~1200元/㎡区间内浮动），住艺建议你为每平米预留约3000元预算（包含设计费，材料，施工等），以确保设计及施工质量。
                            </div>
                        </div>
                    </div>
                </div>

                <div class="demand_here here_7 ">
                    <span class="dem_title">请选择你需要的设计师类型？</span>
                    <span>第<a class="red">7</a>题/7题</span>
                    <div class="seven_box">
                        <div class="seven_here">
                            <span class="seven_spa">设计大师</span>
                            <span class="seven_spb">拥有多项杰出设计作品</span>
                            <span class="seven_spc">屡获国际大奖，享有广泛声誉</span>
                            <span class="seven_spd">设计费平均每平米1200元</span>
                        </div>

                        <div class="seven_here">
                            <span class="seven_spa">资深设计师</span>
                            <span class="seven_spb">知名设计事务所背景</span>
                            <span class="seven_spc">设计作品有极好的行业口碑</span>
                            <span class="seven_spd">设计费平均每平米800元</span>
                        </div>

                        <div class="seven_here">
                            <span class="seven_spa">新秀设计师</span>
                            <span class="seven_spb">业内新生代设计师</span>
                            <span class="seven_spc">设计理念领先,服务意识优秀</span>
                            <span class="seven_spd">设计费平均每平米400元</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="bot_btn_box first_btn">
                <span class="prev_btn zy_btn_ux">上一步</span>
                <span class="next_btn">下一步</span>
                <span class="tj_btn"><a href="javascript:">提交</a></span>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">



    $(function () {
        var a, b, c, d, e, f, g = "";
        //首页选择入口
        touch.on(".first_box .boxa_box", "tap", function (ev) {
            var index = $(ev.currentTarget).index();
            $(ev.currentTarget).addClass("activeaa");
            setTimeout(function () {
                if (index == 1) {
                    tj_ajax(2,2009, user_id, "", "装修设计");
                    $(".first_box").hide();
                } else if (index == 2) {
                    window.location = "https://jinshuju.net/f/uccnkD";
                } else if (index == 3) {
                    tj_ajax(2,2010, user_id, "", "庭院景观");
                    window.location = "https://jinshuju.net/f/gGZI3n";
                } else if (index == 4) {
                    tj_ajax(2,2011, user_id, "", "工装设计");
                    window.location = "https://jinshuju.net/f/WxnP3w";
                }
            }, 500);

        });

        var nuber = 0;
        //点击展开
        touch.on(".other_box", "tap", function (ev) {
            if ($(ev.currentTarget).next(".other_box2").css("display") == "none") {
                $(ev.currentTarget).next(".other_box2").show();
                $(ev.currentTarget).find(">span").html("-");
            } else {
                $(ev.currentTarget).next(".other_box2").hide();
                $(ev.currentTarget).find(">span").html("+");
            }
        });
        //提交按钮
        touch.on(".tj_btn", "tap", function (ev) {
            if ($(ev.currentTarget).parent().hasClass("true_btn")) {
                 tj_ajax(1, 1007, user_id, "", "第7题下一步");
                //var demand = {dem1: a, dem2: b, dem3: c, dem4: d, dem5: e, dem6: f, dem7: g}
                var demand = a + "@" + b + "@" + c + "@" + d + "@" + e + "@" + f + "@" + g;
                var gerr = JSON.stringify(demand);
                localStorage.usermesg = gerr;
                //console.log(demand);
                //window.location.href = "submit.html?id=aaaa";
                $.ajax({
                    type: "get",
                    data: '',
                    //datatype: 'json',
                    url: "<?php echo Yii::getAlias('@web') . '/index.php?r=project/match_designer'; ?>" + "&&g=" + demand,
                    async: true,
                    success: function (data) {
                        if (data) {
                            window.location.href = "<?php echo Yii::getAlias('@web') . '/index.php?r=project/additional'; ?>" + "&&project_id=" + data;
                        }
                        //console.log(data);
                        //alert(data);
                    }
                });
            } else {
                return false;
            }

        });

        //下一步点击事件
        touch.on(".bot_btn_box .next_btn", "tap", function () {
            if ($(".bot_btn_box").hasClass("true_btn")) {
                var index = $(".demand_big>.active").index() + 1;
                switch (index)
                {
                    case 1:
                        tj_ajax(1, 1001, user_id, "", "第1题下一步")
                        break;
                    case 2:
                        tj_ajax(1, 1002, user_id, "", "第2题下一步")
                        break;
                    case 3:
                        tj_ajax(1, 1003, user_id, "", "第3题下一步")
                        break;
                    case 4:
                        tj_ajax(1, 1004, user_id, "", "第4题下一步")
                        break;
                    case 5:
                        tj_ajax(1, 1005, user_id, "", "第5题下一步")
                        break;
                    case 6:
                        tj_ajax(1, 1006, user_id, "", "第6题下一步")
                        break;

                }
                $(".demand_big>div:eq(" + index + ")").addClass("active").siblings().removeClass("active");
                if (index > nuber) {
                    $(".bot_btn_box").removeClass("true_btn");
                } else {
                    $(".bot_btn_box").addClass("true_btn");
                }
//			if(index==4){
//				$(".bot_btn_box").addClass("true_btn");
//			}
                if (index >= 1 && index < 6) {

                    $(".bot_btn_box").addClass("center_btn").removeClass("first_btn");
                } else {
                    $(".bot_btn_box").addClass("last_btn").removeClass("center_btn");
                }
                ;
            }
        });
        //上一步点击事件
        var grttt = false;
        touch.on(".bot_btn_box .prev_btn", "tap", function () {
            var index = $(".demand_big>.active").index() - 1;
            if (nuber <= index && $(".bot_btn_box").hasClass("true_btn")) {
                nuber++;
                grttt = true;

            }
            if (nuber < index) {
                nuber = index;
            }

            console.log(index);
            console.log(nuber);
            $(".demand_big>div:eq(" + index + ")").addClass("active").siblings().removeClass("active");
            $(".bot_btn_box").addClass("true_btn");
            if (index == 0) {
                $(".bot_btn_box").addClass("first_btn").removeClass("center_btn last_btn")
            }
            if (index > 1 && index < 6) {
                $(".bot_btn_box").addClass("center_btn").removeClass("first_btn last_btn");
            } else if (index >= 6) {
                $(".bot_btn_box").addClass("last_btn").removeClass("center_btn first_btn");
            }
            ;
        });



        //第一题逻辑	
        touch.on(".here_1 .dem_where>span", "tap", function (ev) {
            if ($(ev.currentTarget).hasClass("active")) {
                $(ev.currentTarget).removeClass("active");
                $(".bot_btn_box").removeClass("true_btn");
            } else {
                $(ev.currentTarget).addClass("active").siblings().removeClass("active");
                $(".bot_btn_box").addClass("true_btn");
                $(".here_1 .dema_ipt").val("");
                a = $(ev.currentTarget).html();
            }
        });
        $(".here_1 .dema_ipt").change(function () {
            if ($(this).val() != '') {
                $(".here_1 .dem_where .active").removeClass("active");
                $(".bot_btn_box").addClass("true_btn");
                a = $(this).val();
            } else if ($(this).val() == '' && $(".here_1 .dem_where .active").length == 0) {
                $(".bot_btn_box").removeClass("true_btn");
            }
        });


        //第2题逻辑	
        touch.on(".here_2 .fx_here", "tap", function (ev) {
            if ($(ev.currentTarget).hasClass("active")) {
                $(ev.currentTarget).removeClass("active");
                $(".bot_btn_box").removeClass("true_btn");
            } else {
                $(ev.currentTarget).addClass("active").siblings().removeClass("active");
                $(".bot_btn_box").addClass("true_btn");
                $(".here_2 .dema_ipt").val("");
                b = $(ev.currentTarget).html();
            }


        });
        $(".here_2 .dema_ipt").change(function () {
            if ($(this).val() != '') {
                $(".here_2 .fx_box .active").removeClass("active");
                $(".bot_btn_box").addClass("true_btn");
                b = $(this).val();
            } else if ($(this).val() == '' && $(".here_2 .dem_where .active").length == 0) {
                $(".bot_btn_box").removeClass("true_btn");
            }
        });
        //第三题逻辑
        $(".here_3 .dema_ipt").change(function () {
            var val1 = $(".here_3 .three_ipt").val();
            var val2 = $(".here_3 .three_ipta").val();
            if (val1 != "" && val2 != "") {
                $(".bot_btn_box").addClass("true_btn");
                c = val1 + "$" + val2;
            } else {
                $(".bot_btn_box").removeClass("true_btn");
            }
        });
        //第四题逻辑
        touch.on(".here_4 .four_box>div", "tap", function (ev) {
            if ($(ev.currentTarget).hasClass("active")) {
                $(ev.currentTarget).removeClass("active");
                $(".bot_btn_box").removeClass("true_btn");
            } else {
                $(ev.currentTarget).addClass("active").siblings().removeClass("active");
                $(".bot_btn_box").addClass("true_btn");
                $(".here_4 .dema_ipt").val("");
                d = $(ev.currentTarget).html();
            }
        });
        $(".here_4 .dema_ipt").change(function () {
            if ($(this).val() != '') {
                $(".here_4 .four_box .active").removeClass("active");
                $(".bot_btn_box").addClass("true_btn");
                d = $(this).val();
            } else if ($(this).val() == '' && $(".here_4 .four_box .active").length == 0) {
                $(".bot_btn_box").removeClass("true_btn");
            }
        });
        //第5题逻辑


        touch.on(".last_five", "tap", function (ev) {
            if ($(ev.currentTarget).hasClass("active")) {
                $(ev.currentTarget).removeClass("active");
                if ($(".five_box>.active").length == 0) {
                    $(".bot_btn_box").removeClass("true_btn");
                } else {
                    $(".bot_btn_box").addClass("true_btn");

                }
                if ($(".five_box .active").index() == 1) {
                    $("#sgdj").show();
                } else {
                    $("#sgdj").hide();
                }
            } else {
                $(ev.currentTarget).addClass("active").siblings().removeClass("active");
                var text = $(ev.currentTarget).find(">span").html();
                if (text == "设计") {
                    text = "budget_design";
                } else {
                    text = "budget_design_work";
                }
                e = text;
                if ($(".five_box>.active").length == 0) {
                    $(".bot_btn_box").removeClass("true_btn");
                } else {
                    $(".bot_btn_box").addClass("true_btn");
                }
                if ($(".five_box .active").index() == 1) {
                    $("#sgdj").show();
                } else {
                    $("#sgdj").hide();
                }
            }

        });
        //第六页逻辑
        $(".here_6 .dema_ipt").focus(function () {
            $(".bot_btn_box").addClass("true_btn");
        }).blur(function () {
            if ($(this).val() == "") {
                $(".bot_btn_box").removeClass("true_btn");
            } else {
                f = $(this).val();
            }

        })

        //第7页逻辑
        touch.on(".seven_box .seven_here", "tap", function (ev) {
            if ($(ev.currentTarget).hasClass("active")) {
                $(ev.currentTarget).removeClass("active");
                $(".bot_btn_box").removeClass("true_btn");
            } else {
                $(ev.currentTarget).addClass("active").siblings().removeClass("active");
                $(".bot_btn_box").addClass("true_btn");
                g = $(ev.currentTarget).find(".seven_spa").html();

            }

        })

        //时间选择器逻辑
        touch.on(".select_box_a .time_here", "tap", function (ev) {
            if ($(ev.currentTarget).hasClass("active")) {
                $(ev.currentTarget).removeClass("active");
                var length = $(".select_box_a .active").length;
                if (length == 0 && $(".select_box_a .dema_ipt").val() == "") {
                    $(".chose_btn").removeClass("yes_btn");
                }
            } else {
                $(ev.currentTarget).addClass("active");
                var length = $(".select_box_a .active").length;
                if (length > 0 || $(".select_box_a .dema_ipt").val() != "") {
                    $(".chose_btn").addClass("yes_btn");
                } else if (length == 0 && $(".select_box_a .dema_ipt").val() == "") {
                    $(".chose_btn").removeClass("yes_btn");
                }
            }

        });
        $(".select_box_a .dema_ipt").change(function () {
            var length = $(".select_box_a .active").length;
            if (length == 0 && $(".select_box_a .dema_ipt").val() == "") {
                $(".chose_btn").removeClass("yes_btn");
            } else {
                $(".chose_btn").addClass("yes_btn");
            }
        });
    });

</script>
<script type="text/javascript">
    wx.config({
        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: 'wx8f50ac309b04acf8', // 必填，公众号的唯一标识
        timestamp: <?= $jsarr['timestamp'] ?>, // 必填，生成签名的时间戳
        nonceStr: 'zhuyi', // 必填，生成签名的随机串
        signature: "<?= $jsarr['signature'] ?>", // 必填，签名，见附录1
        jsApiList: ['onMenuShareAppMessage', 'onMenuShareTimeline', 'checkJsApi', 'chooseImage', 'uploadImage', 'downloadImage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });

    wx.ready(function () {

        wx.checkJsApi({
            jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'checkJsApi', 'chooseImage', 'uploadImage', 'downloadImage'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
            success: function (res) {
                // 以键值对的形式返回，可用的api值true，不可用为false
                // 如：{"checkResult":{"chooseImage":true},"errMsg":"checkJsApi:ok"}
            }
        });

        //分享给朋友
        wx.onMenuShareAppMessage({
            title: '想为自己和爱的人定制一个舒服的家？我建议你去住艺看看！', // 分享标题
            desc: '定制一个舒服的家／用钻研装修的600个小时陪伴家人／让家成为宝宝最棒的诞生礼／告别混乱的储物迷局／远离面对3000种优质建材的选择障碍 ／严守预算，只花该花的钱 ／从“坐办公室”到工作的艺术／让你的餐厅和店铺与众不同／为父母布置最美的家宴餐桌／住出真的自己', // 分享描述
            link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=index/index', // 分享链接

            imgUrl: "<?php echo Yii::$app->params['frontDomain'] ?>" + '/img/zhuyilogo.jpg', // 分享图标
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                // 用户确认分享后执行的回调函数
                alert('已分享!');
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            },
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });

        //分享到朋友圈
        wx.onMenuShareTimeline({
            title: '想为自己和爱的人定制一个舒服的家？我建议你去住艺看看！', // 分享标题
            link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=index/index', // 分享链接
            imgUrl: "<?php echo Yii::$app->params['frontDomain'] ?>" + '/img/zhuyilogo.jpg', // 分享图标

            success: function () {
                // 用户确认分享后执行的回调函数
                alert('分享成功!');
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            },
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });

    });
</script>
