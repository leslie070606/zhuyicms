<?php

use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>风格测试</title>
        <link rel="stylesheet" href="http://at.alicdn.com/t/font_1476711409_6625533.css" />
        <link rel="stylesheet" type="text/css" href="css/gloaba.css" />
        <link rel="stylesheet" type="text/css" href="css/problem.css"  />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript">
            $(function () {
                var nuberrr = 1;
                var data = [];
                var index=0;
                $(".pro_here").on("click", function () {
                    var nuber = $(this).parents(".pro_box").find(".foin").length;
                    index++;
                    $(this).addClass("foin_a");
                    var nubera = parseInt("600" + index) + 1;
                    if (nubera == 6002) {
                        tj_ajax(6, nubera - 1);
                    }
                    tj_ajax(6, nubera, "", "", "答题");


                    if (nuber <= 0) {
                        $(this).addClass("foin");
                        setTimeOut(function(){
                            $("body").scrollTop(0);
                            $(".gloab:eq(" + index + ")").addClass("active").siblings().removeClass("active");
                            $(window).scrollTop(0);
                            if (nuberrr <= 13) {
                                nuberrr++;
                            } else {
                                $(".foin").each(function () {
                                    var get = $(this).attr("tetel").split("a");

                                    data = $.merge(data, get);
                                });
                                getMax(data);
                            }
                            ;
                        },200);
                    } else {
                        return false;
                    }
                });



            });


            function getMax(arr) {
                var obj = {},
                        l = arr.length,
                        key = [],
                        val = [];
                for (var i = 0; i < l; i++) {
                    !obj[arr[i]] ? obj[arr[i]] = 1 : obj[arr[i]] += 1;
                }
                for (i in obj) {
                    key.push(i);
                    val.push(obj[i]);
                }
                var max = Math.max.apply("", val);
                var pos = (function () {
                    var j, len = val.length;
                    for (j = 0; j < len; j++) {
                        if (max == val[j]) {
                            return j;
                        }
                    }
                })();

                var htmll = ["", "a", "b", "", "c", "d", "e", "", "f", "g", "h"];
                var _uploadUrl = "<?php echo Url::to(['style/report', 'link_id' => $link_id]); ?>" + '&flash=' + htmll[key[pos]];

                window.location = _uploadUrl;
    //  console.log("出现最多的项是："+key[pos]+"，出现次数为："+val[pos])
            }


            function tj_ajax(a, b, c, d, e) {
                $.ajax({
                    type: "get",
                    data: "",
                    url: "http://zhuyihome.com/index.php?r=data-count-api/create/create&mtId=" + a + "&mdId=" + b + "&userId=" + c + "&designerId=" + d + "&mMark=" + e + "",
                    async: true,
                    success: function (data) {}
                });
            }
        </script>
    </head>
    <body>
        <input type="hidden" id="hidden" />
        <div class="gloab active">
            <div class="gloab_top">
                <div class="top_title">
                    <span class="by_ad iconfont icon-logo01"></span>
                    <span class="top_right"><i class="pro_number">1</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    关于自己日日已对的家，<br> 应该没有人会比你更清楚自己想要什么吧。那么， <span>你希望你的家装在风格上更接近下面那张图片呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a6a8">
                        <div class="here_bg"></div>
                        <img src="img/problem/1-1.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a4a9a10">
                        <div class="here_bg"></div>
                        <img src="img/problem/1-2.jpg" />
                        <div class="here_text">适中</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a1a2a5">
                        <div class="here_bg"></div>
                        <img src="img/problem/1-3.jpg" />
                        <div class="here_text">现代</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->

        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <span class="by_ad iconfont icon-logo01"></span>
                    <span class="top_right"><i class="pro_number">2</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    可否认，色彩帮助我们奠定了家的基调，<br>它既可以冷静地安抚我们的焦虑，<br>亦能够热情地激发我们的活力。 <span>关于空间的色彩，你更心仪的会是以下哪一种呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a2a5">
                        <div class="here_bg"></div>
                        <img src="img/problem/2-1.jpg" />
                        <div class="here_text">素颜</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a1a6a10">
                        <div class="here_bg"></div>
                        <img src="img/problem/2-2.jpg" />
                        <div class="here_text">适中</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a4a8a9">
                        <div class="here_bg"></div>
                        <img src="img/problem/2-3.jpg" />
                        <div class="here_text">色彩缤纷</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->


        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <span class="by_ad iconfont icon-logo01"></span>
                    <span class="top_right"><i class="pro_number">3</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    爱收藏的恋物癖？<br> 还是“断舍离”的拥趸者？<br> 你对“物”的态度决定了你的空间状态。 <span>从“填满”到“留白”，你的选择会是什么？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a4a8a9">
                        <div class="here_bg"></div>
                        <img src="img/problem/3-1.jpg" />
                        <div class="here_text">饱和</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a2a6">
                        <div class="here_bg"></div>
                        <img src="img/problem/3-2.jpg" />
                        <div class="here_text">适中</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a1a5a10">
                        <div class="here_bg"></div>
                        <img src="img/problem/3-3.jpg" />
                        <div class="here_text">极简</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->

        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <span class="by_ad iconfont icon-logo01"></span>
                    <span class="top_right"><i class="pro_number">4</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    图纹、花样还有肌理常常是软装为家赋予的“表情"， <span>而你喜欢的表情会是以下哪种？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a1a5a10">
                        <div class="here_bg"></div>
                        <img src="img/problem/4-1.jpg" />
                        <div class="here_text">纯色块</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a2a4">
                        <div class="here_bg"></div>
                        <img src="img/problem/4-2.jpg" />
                        <div class="here_text">适中</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a6a8a9">
                        <div class="here_bg"></div>
                        <img src="img/problem/4-3.jpg" />
                        <div class="here_text">图案</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->

        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <span class="by_ad iconfont icon-logo01"></span>
                    <span class="top_right"><i class="pro_number">5</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    家具的线条是勾勒空间的重要“笔触”，<br> 可以表现出一个家的风骨。 <span>而你钟意的家具轮廓是以直线为主，还是以曲线为主？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a1a2a5a10">
                        <div class="here_bg"></div>
                        <img src="img/problem/5-1.jpg" />
                        <div class="here_text">直线</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a4a6a9">
                        <div class="here_bg"></div>
                        <img src="img/problem/5-2.jpg" />
                        <div class="here_text">柔曲线</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a8">
                        <div class="here_bg"></div>
                        <img src="img/problem/5-3.jpg" />
                        <div class="here_text">古典曲线</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->

        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <span class="by_ad iconfont icon-logo01"></span>
                    <span class="top_right"><i class="pro_number">6</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    我们猜测，着装时偏好的色彩搭配，<br> 你大概也会沿用到你的家里吧。 <span>而以下哪一种色彩搭配的空间才会入你的"法眼"呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a4a8">
                        <div class="here_bg"></div>
                        <img src="img/problem/6-1.jpg" />
                        <div class="here_text">淡雅</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a9a2">
                        <div class="here_bg"></div>
                        <img src="img/problem/6-2.jpg" />
                        <div class="here_text">适中</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a1a5a6a10">
                        <div class="here_bg"></div>
                        <img src="img/problem/6-3.jpg" />
                        <div class="here_text">对冲</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->

        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <span class="by_ad iconfont icon-logo01"></span>
                    <span class="top_right"><i class="pro_number">7</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    在家装过程中常会被人忽略的照明设计，<br> 却是建筑师、室内设计师们最关注的问题之一。<br> 不夸张的说，照明是空间的“底妆”。<span>那么，以下哪一种照明方式最接近你期待中的空间“底妆”呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a1a6">
                        <div class="here_bg"></div>
                        <img src="img/problem/7-1.jpg" />
                        <div class="here_text">直接照明</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a4a8a9">
                        <div class="here_bg"></div>
                        <img src="img/problem/7-2.jpg" />
                        <div class="here_text">适中</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a2a5a10">
                        <div class="here_bg"></div>
                        <img src="img/problem/7-3.jpg" />
                        <div class="here_text">间接照明</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->

        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <span class="by_ad iconfont icon-logo01"></span>
                    <span class="top_right"><i class="pro_number">8</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    你无法否认，从不同材料身上，你常常可以捕捉到许多不同的情绪。<br> 材料甚至是设计师表达创作的一种语言。<span>住艺的设计师于魁尤其喜欢“沙比利”材质的家具，那么，你呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a5a9a10">
                        <div class="here_bg"></div>
                        <img src="img/problem/8-1.jpg" />
                        <div class="here_text">自然（毛，木，石子）</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a2a6a4a8">
                        <div class="here_bg"></div>
                        <img src="img/problem/8-2.jpg" />
                        <div class="here_text">适中（皮，大理石，编织物）</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a1">
                        <div class="here_bg"></div>
                        <img src="img/problem/8-3.jpg" />
                        <div class="here_text">人工（钢，玻璃，水泥）</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->

        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <span class="by_ad iconfont icon-logo01"></span>
                    <span class="top_right"><i class="pro_number">9</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    家装需要“看”，更需要“摸”。 <span>在软装材料上，你会喜欢哪种手感的材质？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a2a5a9">
                        <div class="here_bg"></div>
                        <img src="img/problem/9-1.jpg" />
                        <div class="here_text">粗糙（稻草编织，粗毛）</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a1a4a6a10">
                        <div class="here_bg"></div>
                        <img src="img/problem/9-2.jpg" />
                        <div class="here_text">适中（棉等纺织物）</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a8">
                        <div class="here_bg"></div>
                        <img src="img/problem/9-3.jpg" />
                        <div class="here_text">细腻（丝绸，绒毛）</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->


        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <span class="by_ad iconfont icon-logo01"></span>
                    <span class="top_right"><i class="pro_number">10</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    旅行改变了我们的视野。 <span>在你心目中最理想的假期目的地会是哪里呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a5a9">
                        <div class="here_bg"></div>
                        <img src="img/problem/10-1.jpg" />
                        <div class="here_text">郊游</div>
                    </div>
                    <div class="pro_here here_div" tetel="1a2a2a4">
                        <div class="here_bg"></div>
                        <img src="img/problem/10-2.jpg" />
                        <div class="here_text">探索都市</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a10a8a6">
                        <div class="here_bg"></div>
                        <img src="img/problem/10-3.jpg" />
                        <div class="here_text">博物馆</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->


        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <span class="by_ad iconfont icon-logo01"></span>
                    <span class="top_right"><i class="pro_number">11</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    家，接受我们的肉身，安放我们的灵魂。<span>假若可以自由选择，你会希望这个令你得以栖居的住所坐落何处？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a4a2">
                        <div class="here_bg"></div>
                        <img src="img/problem/11-1.jpg" />
                        <div class="here_text">CBD高档公寓</div>
                    </div>
                    <div class="pro_here here_div" tetel="6a8a10">
                        <div class="here_bg"></div>
                        <img src="img/problem/11-2.jpg" />
                        <div class="here_text">胡同里</div>
                    </div>
                    <div class="pro_here here_div" tetel="5a9">
                        <div class="here_bg"></div>
                        <img src="img/problem/11-3.jpg" />
                        <div class="here_text">海边别墅</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->


        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <span class="by_ad iconfont icon-logo01"></span>
                    <span class="top_right"><i class="pro_number">12</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    <span>如果你的家里有一面空白的墙壁，你会在上面挂以下哪一幅画呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="8a6">
                        <div class="here_bg"></div>
                        <img src="img/problem/12-1.jpg" />
                        <div class="here_text">布鲁哲尔</div>
                    </div>
                    <div class="pro_here here_div" tetel="9a2a10">
                        <div class="here_bg"></div>
                        <img src="img/problem/12-2.jpg" />
                        <div class="here_text">莫奈</div>
                    </div>
                    <div class="pro_here here_div" tetel="5a1a4">
                        <div class="here_bg"></div>
                        <img src="img/problem/12-3.jpg" />
                        <div class="here_text">赫斯特</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->

        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <span class="by_ad iconfont icon-logo01"></span>
                    <span class="top_right"><i class="pro_number">13</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    植物花卉为家带来清新，注入活力。 <span>哪种植物会是你用来装点家居环境的最爱？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="">
                        <img src="img/problem/13-1.jpg" />
                        <div class="here_bg"></div>
                        <div class="here_text">菊花</div>
                    </div>
                    <div class="pro_here here_div" tetel="">
                        <img src="img/problem/13-2.jpg" />
                        <div class="here_bg"></div>
                        <div class="here_text">百合花</div>
                    </div>
                    <div class="pro_here here_div" tetel="">
                        <img src="img/problem/13-3.jpg" />
                        <div class="here_bg"></div>
                        <div class="here_text">梅花</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->

        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <span class="by_ad iconfont icon-logo01"></span>
                    <span class="top_right"><i class="pro_number">14</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    <span>倘若你需要同某一种动物分享家的空间，你会希望它是？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="">
                        <img src="img/problem/14-1.jpg" />
                        <div class="here_bg"></div>
                        <div class="here_text">猫</div>
                    </div>
                    <div class="pro_here here_div" tetel="">
                        <img src="img/problem/14-2.jpg" />
                        <div class="here_bg"></div>
                        <div class="here_text">狗</div>
                    </div>
                    <div class="pro_here here_div" tetel="">
                        <img src="img/problem/14-3.jpg" />
                        <div class="here_bg"></div>
                        <div class="here_text">金鱼</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->
    </body>
</html>

