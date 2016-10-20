
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
                var truee = true;
                var index = 0;
                var foin_data = "";
                $(".pro_here").on("click", function () {
                    if (truee) {
                        truee = false;
                        var nuber = $(this).parents(".pro_box").find(".foin").length;
                        index++;
                        $(this).addClass("foin_a");
                        //var nubera = parseInt("600" + index) + 1;
                        var nubera = 6000 + index + 1;
                        if (nubera == 6002) {
                            tj_ajax(6, nubera - 1);
                        }
                        tj_ajax(6, nubera, "", "", "答题");


                        if (nuber <= 0) {
                            $(this).addClass("foin");
                            setTimeout(function () {
                                $("body").scrollTop(0);
                                $(".gloab:eq(" + index + ")").addClass("active").siblings().removeClass("active");
                                $(window).scrollTop(0);
                                if (nuberrr <= 13) {
                                    nuberrr++;
                                } else {
                                    $(".foin").each(function () {
                                        var get = $(this).attr("tetel").split("a");
                                        var foin_index = $(this).index();
                                        data = $.merge(data, get);
                                        foin_data += foin_index + "a";
//                                        console.log(get)
                                    });

//                                    console.log(data)
                                    getMax(data, foin_data);
                                }
                                ;
                                truee = true;
                            }, 200);
                        } else {
                            return false;
                        }

                    }
                });



            });


            function getMax(arr, foin_data) {
                 var obj = {},
                    l = arr.length,
                    key = [],
                    val = [],
                    new_obj=0,
                    new_html="";

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

                var htmll = ["", "g", "d", "", "b", "f", "e", "", "c", "a", "h"];
                //alert(htmll[key[pos]]);
                
                   for(var i=0;i<key.length-1;i++){
                        key[i]=htmll[key[i]];
                        new_obj+=val[i];
                     }
                   for(var i=0;i<key.length-1;i++){
                        new_html+=key[i]+"*"+parseInt(val[i]/new_obj*100)+","
                     }
                     console.log(new_html)

                var _uploadUrl = "<?php echo Url::to(['style/report', 'link_id' => $link_id]); ?>" + '&flash=' + key[pos] + '&problem=' + foin_data+ '&match=' + new_html;

                window.location = _uploadUrl;

                // console.log("出现最多的项是："+key[pos]+"，出现次数为："+val[pos])
            }


            function tj_ajax(a, b, c, d, e) {
                $.ajax({
                    type: "get",
                    data: "",
                    url: "http://zhuyihome.com/index.php?r=data-count-api/create&mtId=" + a + "&mdId=" + b + "&userId=" + c + "&designerId=" + d + "&mMark=" + e + "",
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
                <div class="top_bottom"><span class="top_bottom_title">风格</span>
                    关于自己日日相伴的家，<br> 应该没有人会比你更清楚自己想要什么吧。那么， <span>你希望你的家装在风格上更接近下面哪张图片呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="8a8a6a9">
                        <div class="here_bg"></div>
                        <img src="img/problem/1-1.jpg" />
                        <div class="here_text">经典</div>
                    </div>
                    <div class="pro_here here_div" tetel="4a4a9a10a6a6a1a2a8">
                        <div class="here_bg"></div>
                        <img src="img/problem/1-2.jpg" />
                        <div class="here_text">融合</div>
                    </div>
                    <div class="pro_here here_div" tetel="1a1a2a5a10a4">
                        <div class="here_bg"></div>
                        <img src="img/problem/1-3.jpg" />
                        <div class="here_text">当代</div>
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
                <div class="top_bottom"><span class="top_bottom_title">色彩多少</span>
                    不可否认，色彩帮助我们奠定了家的基调，<br>它既可以冷静地安抚我们的焦虑，<br>亦能够热情地激发我们的活力。 <span>关于空间的色彩，你更心仪的会是以下哪一种呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="2a5">
                        <div class="here_bg"></div>
                        <img src="img/problem/2-1.jpg" />
                        <div class="here_text">素颜</div>
                    </div>
                    <div class="pro_here here_div" tetel="1a6a10">
                        <div class="here_bg"></div>
                        <img src="img/problem/2-2.jpg" />
                        <div class="here_text">适中</div>
                    </div>
                    <div class="pro_here here_div" tetel="4a8a9">
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
                <div class="top_bottom"><span class="top_bottom_title">空间</span>
                    爱收藏的恋物癖？<br> 还是“断舍离”的拥趸者？<br> 你对“物”的态度决定了你的空间状态。 <span>从“填满”到“留白”，你的选择会是什么？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="8a9">
                        <div class="here_bg"></div>
                        <img src="img/problem/3-1.jpg" />
                        <div class="here_text">填满</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a6a4">
                        <div class="here_bg"></div>
                        <img src="img/problem/3-2.jpg" />
                        <div class="here_text">适中</div>
                    </div>
                    <div class="pro_here here_div" tetel="1a5a10">
                        <div class="here_bg"></div>
                        <img src="img/problem/3-3.jpg" />
                        <div class="here_text">留白</div>
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
                <div class="top_bottom"><span class="top_bottom_title">饰品图案</span>
                    图纹、花样还有肌理常常是软装为家赋予的“表情"， <span>而你喜欢的表情会是以下哪种？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a5a10">
                        <div class="here_bg"></div>
                        <img src="img/problem/4-1.jpg" />
                        <div class="here_text">纯色块</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a4a6">
                        <div class="here_bg"></div>
                        <img src="img/problem/4-2.jpg" />
                        <div class="here_text">两者兼具</div>
                    </div>
                    <div class="pro_here here_div" tetel="8a9">
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
                <div class="top_bottom"><span class="top_bottom_title">线条</span>
                    家具的线条是勾勒空间的重要“笔触”，<br> 可以表现出一个家的风骨。 <span>而你钟意的家具轮廓是以直线为主，还是以曲线为主？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a2a5a10">
                        <div class="here_bg"></div>
                        <img src="img/problem/5-1.jpg" />
                        <div class="here_text">直线</div>
                    </div>
                    <div class="pro_here here_div" tetel="4a6a9">
                        <div class="here_bg"></div>
                        <img src="img/problem/5-2.jpg" />
                        <div class="here_text">柔曲线</div>
                    </div>
                    <div class="pro_here here_div" tetel="8">
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
                <div class="top_bottom"><span class="top_bottom_title">色彩搭配</span>
                    我们猜测，着装时偏好的色彩搭配，<br> 你大概也会沿用到你的家里吧。 <span>而以下哪一种色彩搭配的空间才会入你的"法眼"呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a5a6a10">
                        <div class="here_bg"></div>
                        <img src="img/problem/6-1.jpg" />
                        <div class="here_text">同色系</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a6a1">
                        <div class="here_bg"></div>
                        <img src="img/problem/6-2.jpg" />
                        <div class="here_text">适中</div>
                    </div>
                    <div class="pro_here here_div" tetel="4a8a9">
                        <div class="here_bg"></div>
                        <img src="img/problem/6-3.jpg" />
                        <div class="here_text">鲜明对比</div>
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
                <div class="top_bottom"><span class="top_bottom_title">照明</span>
                    在家装过程中常会被人忽略的照明设计，<br> 却是建筑师、室内设计师们最关注的问题之一。<br> 不夸张的说，照明是空间的“底妆”。<span>那么，以下哪一种照明方式最接近你期待中的空间“底妆”呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="">
                        <div class="here_bg"></div>
                        <img src="img/problem/7-1.jpg" />
                        <div class="here_text">直接照明</div>
                    </div>
                    <div class="pro_here here_div" tetel="">
                        <div class="here_bg"></div>
                        <img src="img/problem/7-2.jpg" />
                        <div class="here_text">适中</div>
                    </div>
                    <div class="pro_here here_div" tetel="">
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
                <div class="top_bottom"><span class="top_bottom_title">主要材质</span>
                    你无法否认，从不同材料身上，你常常可以捕捉到许多不同的情绪。<br> 材料甚至是设计师表达创作的一种语言。<span>那么，你最喜欢的材料是哪些呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="5a10a9">
                        <div class="here_bg"></div>
                        <img src="img/problem/8-1.jpg" />
                        <div class="here_text">自然（毛，木，石子）</div>
                    </div>
                    <div class="pro_here here_div" tetel="6a4a8">
                        <div class="here_bg"></div>
                        <img src="img/problem/8-2.jpg" />
                        <div class="here_text">适度加工（皮，大理石，编织物）</div>
                    </div>
                    <div class="pro_here here_div" tetel="1a2">
                        <div class="here_bg"></div>
                        <img src="img/problem/8-3.jpg" />
                        <div class="here_text">人造合成（钢，玻璃，水泥）</div>
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
                <div class="top_bottom"><span class="top_bottom_title">布料</span>
                    家装需要“看”，更需要“摸”。 <span>在软装材料上，你会喜欢哪种手感的材质？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="2a5a9">
                        <div class="here_bg"></div>
                        <img src="img/problem/9-1.jpg" />
                        <div class="here_text">粗质（稻草编织，粗毛）</div>
                    </div>
                    <div class="pro_here here_div" tetel="1a4a10">
                        <div class="here_bg"></div>
                        <img src="img/problem/9-2.jpg" />
                        <div class="here_text">适中（棉等纺织物）</div>
                    </div>
                    <div class="pro_here here_div" tetel="8a6">
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
                <div class="top_bottom"><span class="top_bottom_title">度假地点</span>
                    旅行改变了我们的视野。 <span>在你心目中最理想的假期目的地会是哪里呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="">
                        <div class="here_bg"></div>
                        <img src="img/problem/10-1.jpg" />
                        <div class="here_text">郊游</div>
                    </div>
                    <div class="pro_here here_div" tetel="">
                        <div class="here_bg"></div>
                        <img src="img/problem/10-2.jpg" />
                        <div class="here_text">探索都市</div>
                    </div>
                    <div class="pro_here here_div" tetel="">
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
                <div class="top_bottom"><span class="top_bottom_title">理想住所</span>
                    家，接受我们的肉身，安放我们的灵魂。<span>假若可以自由选择，你会希望这个令你得以栖居的住所坐落何处？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a4a2a5a8">
                        <div class="here_bg"></div>
                        <img src="img/problem/11-1.jpg" />
                        <div class="here_text">大都市</div>
                    </div>
                    <div class="pro_here here_div" tetel="10a8a6a1">
                        <div class="here_bg"></div>
                        <img src="img/problem/11-2.jpg" />
                        <div class="here_text">小镇</div>
                    </div>
                    <div class="pro_here here_div" tetel="9a5a6a10a4a2">
                        <div class="here_bg"></div>
                        <img src="img/problem/11-3.jpg" />
                        <div class="here_text">乡村</div>
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
                <div class="top_bottom"><span class="top_bottom_title">墙壁画</span>
                    <span>如果你的家里有一面空白的墙壁，你会在上面挂以下哪一幅画呢？</span>
                </div>
            </div>
            <div class="pro_box_big no_bottom">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="">
                        <div class="here_bg"></div>
                        <img src="img/problem/12-1.jpg" />
                    </div>
                    <div class="pro_here here_div" tetel="">
                        <div class="here_bg"></div>
                        <img src="img/problem/12-2.jpg" />
                    </div>
                    <div class="pro_here here_div" tetel="">
                        <div class="here_bg"></div>
                        <img src="img/problem/12-3.jpg" />
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
                <div class="top_bottom"><span class="top_bottom_title">植物</span>
                    植物花卉为家带来清新，注入活力。 <span>哪种植物会是你用来装点家居环境的最爱？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="">
                        <img src="img/problem/13-1.jpg" />
                        <div class="here_bg"></div>
                        <div class="here_text">鲜花</div>
                    </div>
                    <div class="pro_here here_div" tetel="">
                        <img src="img/problem/13-2.jpg" />
                        <div class="here_bg"></div>
                        <div class="here_text">装饰花</div>
                    </div>
                    <div class="pro_here here_div" tetel="">
                        <img src="img/problem/13-3.jpg" />
                        <div class="here_bg"></div>
                        <div class="here_text">盆景</div>
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
                <div class="top_bottom"><span class="top_bottom_title">宠物</span>
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
                        <div class="here_text">不喜欢养宠物，要不来只金鱼吧</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->
    </body>
</html>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

<script type="text/javascript">

    wx.config({
        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: 'wx8f50ac309b04acf8', // 必填，公众号的唯一标识
        timestamp: <?= $jsarr['timestamp'] ?>, // 必填，生成签名的时间戳
        nonceStr: 'zhuyi', // 必填，生成签名的随机串
        signature: "<?= $jsarr['signature'] ?>", // 必填，签名，见附录1
        jsApiList: ['onMenuShareAppMessage', 'onMenuShareTimeline', 'checkJsApi', 'chooseImage', 'uploadImage', 'downloadImage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });
    //定义images用来保存选择的本地图片ID，和上传后的服务器图片ID

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
            title: '看看你对「家」的态度 法式?工业风?中古还是波西米亚?', // 分享标题
            desc: '如果你和我的测试结果相同，两人都将有机会得到HAY 的七巧板拼盘一套。', // 分享描述
            link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=style/index', // 分享链接

            imgUrl: "<?php echo Yii::$app->params['frontDomain'] ?>" + '/img/morenfenxiang.png', // 分享图标
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                // 用户确认分享后执行的回调函数
                alert('分享成功！');tj_ajax(6,6037,"","","分享次数");
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
            title: '法式?工业风?中古还是波西米亚? 测测你真的了解自己的家居风格吗？', // 分享标题
            link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=style/index', // 分享链接

            imgUrl: "<?php echo Yii::$app->params['frontDomain'] ?>" + '/img/morenfenxiang.png', // 分享图标

            success: function () {
                // 用户确认分享后执行的回调函数
                alert('分享成功！');tj_ajax(6,6036,"","","分享次数");
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
