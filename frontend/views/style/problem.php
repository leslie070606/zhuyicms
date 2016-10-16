<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>风格测试</title>
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
                if (nuber <= 0) {
                    $(this).addClass("foin");
                    
                        $("body").scrollTop(0);
                        $(".gloab:eq(" + index + ")").addClass("active").siblings().removeClass("active");
                        $(window).scrollTop(0);
                        if (nuberrr <= 13) {
                            //console.log(nuberrr)
                            nuberrr++;
                        } else {
                            $(".foin").each(function () {
                                var get = $(this).attr("tetel").split("a");

                                data = $.merge(data, get);
                            });
                            getMax(data);
                        }
                        ;
                    

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
           // "flash_" + htmll[key[pos]] + ".html";
            var _uploadUrl = "<?php echo Url::to(['style/report','link_id'=>$link_id]); ?>"+'&flash='+htmll[key[pos]];
            
            window.location = _uploadUrl;
        }
    </script>
    </head>
    <body>
        <input type="hidden" id="hidden" />
        <div class="gloab active">
            <div class="gloab_top">
                <div class="top_title">
                    <img class="top_log" src="img/fengge/logo.png" />
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
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a4a9a10">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a1a2a5">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->

        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <img class="top_log" src="img/fengge/logo.png" />
                    <span class="top_right"><i class="pro_number">2</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    关于自己日日已对的家，<br> 应该没有人会比你更清楚自己想要什么吧。那么， <span>你希望你的家装在风格上更接近下面那张图片呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a2a5">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a1a6a10">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a4a8a9">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->


        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <img class="top_log" src="img/fengge/logo.png" />
                    <span class="top_right"><i class="pro_number">3</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    关于自己日日已对的家，<br> 应该没有人会比你更清楚自己想要什么吧。那么， <span>你希望你的家装在风格上更接近下面那张图片呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a4a8a9">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a2a6">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a1a5a10">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->

        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <img class="top_log" src="img/fengge/logo.png" />
                    <span class="top_right"><i class="pro_number">4</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    关于自己日日已对的家，<br> 应该没有人会比你更清楚自己想要什么吧。那么， <span>你希望你的家装在风格上更接近下面那张图片呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a1a5a10">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a2a4">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a6a8a9">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->

        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <img class="top_log" src="img/fengge/logo.png" />
                    <span class="top_right"><i class="pro_number">5</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    关于自己日日已对的家，<br> 应该没有人会比你更清楚自己想要什么吧。那么， <span>你希望你的家装在风格上更接近下面那张图片呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a1a2a5a10">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a4a6a9">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a8">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->

        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <img class="top_log" src="img/fengge/logo.png" />
                    <span class="top_right"><i class="pro_number">6</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    关于自己日日已对的家，<br> 应该没有人会比你更清楚自己想要什么吧。那么， <span>你希望你的家装在风格上更接近下面那张图片呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a4a8">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a9a2">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a1a5a6a10">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->

        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <img class="top_log" src="img/fengge/logo.png" />
                    <span class="top_right"><i class="pro_number">7</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    关于自己日日已对的家，<br> 应该没有人会比你更清楚自己想要什么吧。那么， <span>你希望你的家装在风格上更接近下面那张图片呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a1a6">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a4a8a9">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a2a5a10">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->

        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <img class="top_log" src="img/fengge/logo.png" />
                    <span class="top_right"><i class="pro_number">8</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    关于自己日日已对的家，<br> 应该没有人会比你更清楚自己想要什么吧。那么， <span>你希望你的家装在风格上更接近下面那张图片呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a5a9a10">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a2a6a4a8">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a1">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->

        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <img class="top_log" src="img/fengge/logo.png" />
                    <span class="top_right"><i class="pro_number">9</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    关于自己日日已对的家，<br> 应该没有人会比你更清楚自己想要什么吧。那么， <span>你希望你的家装在风格上更接近下面那张图片呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a2a5a9">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="2a1a4a6a10">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a8">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->


        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <img class="top_log" src="img/fengge/logo.png" />
                    <span class="top_right"><i class="pro_number">10</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    关于自己日日已对的家，<br> 应该没有人会比你更清楚自己想要什么吧。那么， <span>你希望你的家装在风格上更接近下面那张图片呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a5a9">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="1a2a2a4">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="3a10a8a6">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->


        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <img class="top_log" src="img/fengge/logo.png" />
                    <span class="top_right"><i class="pro_number">11</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    关于自己日日已对的家，<br> 应该没有人会比你更清楚自己想要什么吧。那么， <span>你希望你的家装在风格上更接近下面那张图片呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="1a4a2">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="6a8a10">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="5a9">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->


        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <img class="top_log" src="img/fengge/logo.png" />
                    <span class="top_right"><i class="pro_number">12</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    关于自己日日已对的家，<br> 应该没有人会比你更清楚自己想要什么吧。那么， <span>你希望你的家装在风格上更接近下面那张图片呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="8a6">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="9a2a10">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="5a1a4">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->

        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <img class="top_log" src="img/fengge/logo.png" />
                    <span class="top_right"><i class="pro_number">13</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    关于自己日日已对的家，<br> 应该没有人会比你更清楚自己想要什么吧。那么， <span>你希望你的家装在风格上更接近下面那张图片呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->

        <div class="gloab">
            <div class="gloab_top">
                <div class="top_title">
                    <img class="top_log" src="img/fengge/logo.png" />
                    <span class="top_right"><i class="pro_number">14</i><i>/14</i></span>
                </div>
                <div class="top_bottom">
                    关于自己日日已对的家，<br> 应该没有人会比你更清楚自己想要什么吧。那么， <span>你希望你的家装在风格上更接近下面那张图片呢？</span>
                </div>
            </div>
            <div class="pro_box_big">
                <div class="triangle-down"></div>
                <div class="pro_box">
                    <div class="pro_here here_div" tetel="">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                    <div class="pro_here here_div" tetel="">
                        <img src="img/fengge/aaaa.jpg" />
                        <div class="here_text">古典</div>
                    </div>
                </div>
            </div>
        </div><!--gloab end-->

    
    
    </body>
</html>

