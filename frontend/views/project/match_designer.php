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
    </head>
    <body>
        <div class="demand_box">
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

            <div class="first_box here_0">
                <span class="dem_title">你需要的服务类型？</span>
                <div class="boxa_box">
                    <span class="box_soa">装修设计</span>
                    <span class="box_sob">新房，二手房重新装修</span>
                </div>
                <a href="http://www.baidu.com"><div class="boxa_box">
                        <span class="box_soa">园林设计</span>
                        <span class="box_sob">花园规划设计</span>
                    </div></a>
                <a href="http://www.baidu.com"><div class="boxa_box">
                        <span class="box_soa">软装咨询</span>
                        <span class="box_sob">效果提升  统一风格</span>
                    </div></a>
                <a href="http://www.baidu.com"><div class="boxa_box">
                        <span class="box_soa">工装设计</span>
                        <span class="box_sob">办公室 商铺 会所 艺术馆</span>
                    </div></a>
            </div>

            <div class="demand_big">
                <div class="demand_here active here_1">
                    <span class="dem_title">你要装修的家在哪里？</span>
                    <span class="dem_list">第<a class="red">1</a>题/7题</span>
                    <span class="list_title">主要服务城市</span>
                    <div class="dem_where">
                        <span class="">北京</span>
                        <span>上海</span>
                    </div>
                    <span class="list_title">其他城市</span>
                    <input class="dema_ipt" type="text" placeholder="输入城市名称" />
                </div>

                <div class="demand_here here_2">
                    <span class="dem_title">你的房型是什么？</span>
                    <span>第<a class="red">2</a>题/7题</span>
                    <div class="fx_box">
                        <div class="fx_here">
                            <img class="here_bc" src="img/home_page/1.jpg" />
                            <span>平层公寓</span>
                        </div>
                        <div class="fx_here">
                            <img class="here_bc" src="img/home_page/1.jpg" />
                            <span>复式</span>
                        </div>
                        <div class="fx_here">
                            <img class="here_bc" src="img/home_page/1.jpg" />
                            <span>别墅</span>
                        </div>
                        <div class="fx_here">
                            <img class="here_bc" src="img/home_page/1.jpg" />
                            <span>平房</span>
                        </div>
                    </div>
                    <input class="dema_ipt" type="text" placeholder="其他房型" />
                </div>

                <div class="demand_here  here_3">
                    <span class="dem_title">你的房型多少平米？</span>
                    <span>第<a class="red">3</a>题/7题</span>

                    <input class="dema_ipt three_ipt" type="text" placeholder="建筑面积" />
                    <input class="dema_ipt three_ipta" type="text" placeholder="使用面积" />
                </div>

                <div class="demand_here here_4">
                    <span class="dem_title">你想什么时候开始装修？</span>
                    <span>第<a class="red">4</a>题/7题</span>
                    <div class="four_box">
                        <div>我想尽快开始</div>
                        <div>3个月以后</div>
                        <div>我不是很着急</div>
                    </div>
                    <span class="other_box">
                        <span>+</span> 添加具体时间
                    </span>
                    <section class="other_box2">
                        <input class="dema_ipt" type="text" placeholder="具体时间" />
                    </section>
                </div>

                <div class="demand_here here_5">
                    <span class="dem_title">你需要的服务类型？</span>
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
                    <span class="dem_title">请填写你的项目预算？</span>
                    <span>第<a class="red">6</a>题/7题</span>
                    <div class="six_box">
                        <input class="dema_ipt" type="text" placeholder="硬装预算" />
                        <div class="dema_explain">
                            <span class="explain_title">硬装设计<i id="sgdj">+施工对接</i>：</span>
                            <div class="explain_mesg">
                                住艺改造家的项目装修费用平均在每平米3000元以上（包括 主材+施工）。这个价格能保证设计师有足够的空间发挥以及 最终作品的质量。
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
                            <span class="seven_spb">有多项接触设计作品</span>
                            <span class="seven_spc">并获得国际大奖，享有广泛声誉</span>
                            <span class="seven_spd">设计费平均每平米1200元+</span>
                        </div>

                        <div class="seven_here">
                            <span class="seven_spa">资深设计师</span>
                            <span class="seven_spb">知名设计事务所背景</span>
                            <span class="seven_spc">设计作品在行业内有几号的口碑</span>
                            <span class="seven_spd">设计费平均每平米800元+</span>
                        </div>

                        <div class="seven_here">
                            <span class="seven_spa">新秀设计师</span>
                            <span class="seven_spb">业内新生代设计师</span>
                            <span class="seven_spc">有很好的设计理念和客户服务意识</span>
                            <span class="seven_spd">设计费平均每平米400元+</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="bot_btn_box first_btn">
                <span class="prev_btn">上一步</span>
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
            if (index == 1) {
                $(".first_box").hide();
            }
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
                        if (data){
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
                $(".demand_big>div:eq(" + index + ")").addClass("active").siblings().removeClass("active");
                if (index >= nuber) {
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
        touch.on(".bot_btn_box .prev_btn", "tap", function () {
            var index = $(".demand_big>.active").index() - 1;
            if (nuber < index + 1) {
                nuber = index + 1;

            }
            if ($(".bot_btn_box").hasClass("true_btn")) {
                nuber += 1;
            }

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
                b = $(ev.currentTarget).find(">span").html();
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
