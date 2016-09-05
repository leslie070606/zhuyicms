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
        <title>个人中心</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/user.css" />
        <link rel="stylesheet"  href="css/iconfont.css" />
        <link rel="stylesheet"  href="css/time/mobiscroll.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script src="js/time/mobiscroll_002.js" type="text/javascript"></script>
        <script src="js/time/mobiscroll_004.js" type="text/javascript"></script>
        <link href="css/time/mobiscroll_002.css" rel="stylesheet" type="text/css">
        <link href="css/time/mobiscroll.css" rel="stylesheet" type="text/css">
        <script src="js/time/mobiscroll.js" type="text/javascript"></script>
        <script src="js/time/mobiscroll_003.js" type="text/javascript"></script>
        <script src="js/time/mobiscroll_005.js" type="text/javascript"></script>
        <link href="css/time/mobiscroll_003.css" rel="stylesheet" type="text/css">
   <!-- <script type="text/javascript" src="js/jquery.bxslider.js" ></script>-->	
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/jquery.easy-pie-chart.js" ></script>
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script type="text/javascript" src="js/user.js" ></script>

    </head>
    <body>
        <section class="user_box">
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
            <div class="help_bot_zd"></div>
            <div class="help_bot_btn">
                <span class="iphone_btn">
                    <a href="tel:18201321593">
                        <i class="iconfont icon-kefu"></i>
                    </a>
                </span>
                <span class="bot_btn">
                    <a href="index.html">
                        <i class="iconfont icon-bot"></i>
                    </a>
                </span>
                <span class="help_btn">
                    <a class="zy_btn_ux">
                        <i class="iconfont icon-bangzhu"></i>
                    </a>
                </span>
            </div>
            <section id="user_box" class="custom">
                <div class="user_top">
                    <span class="head_img"><img src="img/home_page/banner_head.jpg"/></span>
                    <span class="head_name">蔡英烈</span>
                    <span class="head_more">已获得一次免费约见！</span>
                </div>


                <div class="nac_boxa">
                    <span class="active">订单</span>
                    <span>需求</span>
                    <span>收藏</span>
                </div>	
                <ul class="bxslidera" id="nav_box">
                    <li class="active">
                        <div class="dingdan">

                            <div class="Blank_Page">
                                <span>
                                    您还没有产生订单<br/>
                                    可以先浏览  <a href="designer_list.html" class="red">住艺的设计师</a>
                                </span>

                            </div>
                            <div class="Blank_Page">
                                <span>
                                    非常抱歉，由于住艺设计师有限<br/>
                                    暂未能帮您匹配到设计师
                                </span>
                            </div>
                            <div class="Blank_Page">
                                <span>
                                    您还没有订单哦<br/>
                                    预约设计师后会出现在这里<br />
                                    <a href="" class="red">立即约见</a>
                                </span>
                            </div>

                            <!--正常待设计师确认-->
                            <div class="dd_here">
                                <div class="here_bottom line_center">
                                    <div class="here_head"><img src="img/home_page/banner_head.jpg" /></div>
                                    <div class="bottom_name"><span class="here_name">Keiji Ashizawa</span><span class="here_namea" id="city">北京</span></div>
                                    <div class="bottom_label bottom_referral">
                                        <span>艺术大咖</span><span>设计大师</span>
                                    </div>
                                    <div class="right_type">
                                        待设计师确认
                                    </div>
                                </div>
                                <span class="jm_time">见面2小时</span>
                                <span class="jm_money"><a>￥800</a>(首次免费约见)</span>
                                <div class="true_time">
                                    住艺管家正在协调设计师的意向和时间 <br/> 订单状态 将在6月19日 20：00 前更新
                                </div>
                            </div>
                            <!--正常待确认见面时间-->
                            <div class="zy_pp dd_here">
                                <div class="here_bottom line_center">
                                    <div class="here_head"><img src="img/home_page/banner_head.jpg" /></div>
                                    <div class="bottom_name"><span class="here_name">Keiji Ashizawa</span><span class="here_namea" id="city">北京</span></div>
                                    <div class="bottom_label bottom_referral">
                                        <span>艺术大咖</span><span>设计大师</span>
                                    </div>
                                    <div class="right_type">
                                        待确认见面时间
                                    </div>
                                </div>
                                <div class="tj_box">
                                    <span class="tj_spa">住艺君推荐设计师</span>
                                    <span class="tj_spb"><a>推荐理由：</a>匹配客服后台编辑</span>
                                </div>
                                <div class="tj_box leave_word">
                                    <span class="tj_spa">设计师留言：</span>
                                    <span class="tj_spb">我6月10日上午；6月11日上午；6月12日上午有时间。 请在12小时内确认时间。</span>
                                </div>

                                <span class="jm_time">见面2小时</span>
                                <span class="jm_money"><a>￥800</a>(首次免费约见)</span>
                                <div class="true_time">
                                    24小时内确认（住艺君提示：时间限量<br/> 如未尽快确认则此时间段可能被其他客户抢走）
                                    <input value="确定时间" class="true_btn" readonly="readonly" name="appTime" id="appTime" type="text">
                                </div>
                            </div>

                            <!--正常待已取消-->
                            <div class="zy_pp dd_here">
                                <div class="here_bottom line_center">
                                    <div class="here_head"><img src="img/home_page/banner_head.jpg" /></div>
                                    <div class="bottom_name"><span class="here_name">Keiji Ashizawa</span><span class="here_namea" id="city">北京</span></div>
                                    <div class="bottom_label bottom_referral">
                                        <span>艺术大咖</span><span>设计大师</span>
                                    </div>
                                    <div class="right_type color_ccc">
                                        预约已取消
                                    </div>
                                </div>
                                <div class="tj_box">
                                    <span class="tj_spa">住艺君推荐设计师</span>
                                    <span class="tj_spb"><a>推荐理由：</a>匹配客服后台编辑</span>
                                </div>
                                <div class="tj_box leave_word">
                                    <span class="tj_spa">设计师留言：</span>
                                    <span class="tj_spb">非常抱歉，我最近1个月的档期已满，感谢您的支持 您可以考虑住艺根据私人匹配，推荐您的设计师 拷贝</span>
                                </div>

                                <span class="jm_time">见面2小时</span>
                                <span class="jm_money"><a>￥800</a>(首次免费约见)</span>
                            </div>


                            <!--后台匹配待确认见面时间-->
                            <div class="zy_pp">
                                <div class="pro_here iconfont">
                                    <a href="home_page.html"><img class="here_img" src="img/home_page/prob.jpg" /></a>
                                    <div class="here_zhe"></div>
                                    <div class="here_botaa"></div>

                                    <div class="here_bottom line_center">
                                        <div class="here_head"><img src="img/home_page/banner_head.jpg" /></div>
                                        <div class="bottom_name"><span class="here_name">Keiji Ashizawa</span><span class="here_namea" id="city">北京</span></div>
                                        <div class="bottom_label bottom_referral">
                                            <span>艺术大咖</span><span>设计大师</span>
                                        </div>
                                        <div class="right_type">
                                            待确认见面时间
                                        </div>
                                    </div>
                                </div>
                                <div class="tj_box">
                                    <span class="tj_spa">住艺君推荐设计师</span>
                                    <span class="tj_spb"><a>推荐理由：</a>匹配客服后台编辑</span>
                                </div>
                                <div class="tj_box leave_word">
                                    <span class="tj_spa">设计师留言：</span>
                                    <span class="tj_spb">我6月10日上午；6月11日上午；6月12日上午有时间。 请在12小时内确认时间。</span>
                                </div>

                                <span class="jm_time">见面2小时</span>
                                <span class="jm_money"><a>￥800</a>(首次免费约见)</span>
                                <div class="true_time">
                                    24小时内确认（住艺君提示：时间限量<br/> 如未尽快确认则此时间段可能被其他客户抢走）
                                    <input value="确定时间" class="true_btn" readonly="readonly" name="appTime" id="appTimea" type="text">
                                </div>
                            </div>

                            <!--后台匹配未见面-->
                            <div class="zy_pp">
                                <div class="pro_here iconfont">
                                    <a href="home_page.html"><img class="here_img" src="img/home_page/prob.jpg" /></a>
                                    <div class="here_zhe"></div>
                                    <div class="here_botaa"></div>
                                    <div class="here_bottom line_center">
                                        <div class="here_head"><img src="img/home_page/banner_head.jpg" /></div>
                                        <div class="bottom_name"><span class="here_name">Keiji Ashizawa</span><span class="here_namea" id="city">北京</span></div>
                                        <div class="bottom_label bottom_referral">
                                            <span>艺术大咖</span><span>设计大师</span>
                                        </div>
                                        <div class="right_type color_ccc">
                                            未见面
                                        </div>
                                    </div>
                                </div>
                                <div class="tj_box">
                                    <span class="tj_spa">住艺君推荐设计师</span>
                                    <span class="tj_spb"><a>推荐理由：</a>匹配客服后台编辑</span>
                                </div>
                            </div>

                            <!--后台匹配待确认见面完成-->
                            <div class="zy_pp">
                                <div class="pro_here iconfont">
                                    <a href="home_page.html"><img class="here_img" src="img/home_page/prob.jpg" /></a>
                                    <div class="here_zhe"></div>
                                    <div class="here_botaa"></div>
                                    <div class="here_bottom line_center">
                                        <div class="here_head">
                                            <img src="img/home_page/proa.jpg" />
                                        </div>
                                        <div class="here_bottom line_center">
                                            <div class="here_head"><img src="img/home_page/banner_head.jpg" /></div>
                                            <div class="bottom_name"><span class="here_name">Keiji Ashizawa</span><span class="here_namea" id="city">北京</span></div>
                                            <div class="bottom_label bottom_referral">
                                                <span>艺术大咖</span><span>设计大师</span>
                                            </div>
                                            <div class="right_type">
                                                待确认见面完成
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tj_box">
                                    <span class="tj_spa">住艺君推荐设计师</span>
                                    <span class="tj_spb"><a>推荐理由：</a>匹配客服后台编辑</span>
                                </div>
                                <span class="jm_time">见面时间：8月24日 3:00PM</span>
                                <span class="jm_money">见面地点：北京市光华路2号9层1003室</span>
                                <span class="jm_time">见面2小时</span>
                                <span class="jm_money"><a>￥800</a>(首次免费约见)</span>
                            </div>
                            <!--后台匹配已见面-->
                            <div class="zy_pp">
                                <div class="pro_here iconfont">
                                    <a href="home_page.html"><img class="here_img" src="img/home_page/prob.jpg" /></a>
                                    <div class="here_zhe"></div>
                                    <div class="here_botaa"></div>
                                    <div class="here_bottom line_center">
                                        <div class="here_head">
                                            <img src="img/home_page/proa.jpg" />
                                        </div>
                                        <div class="here_bottom line_center">
                                            <div class="here_head"><img src="img/home_page/banner_head.jpg" /></div>
                                            <div class="bottom_name"><span class="here_name">Keiji Ashizawa</span><span class="here_namea" id="city">北京</span></div>
                                            <div class="bottom_label bottom_referral">
                                                <span>艺术大咖</span><span>设计大师</span>
                                            </div>
                                            <div class="right_type color_ooo">
                                                已见面
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tj_box">
                                    <span class="tj_spa">住艺君推荐设计师</span>
                                    <span class="tj_spb"><a>推荐理由：</a>匹配客服后台编辑</span>
                                </div>

                                <span class="jm_time">见面2小时</span>
                                <span class="jm_money"><a>￥800</a>(首次免费约见)</span>
                                <div class="true_time queren_btn">
                                    <span class="true_btnb">确认深度合作</span>
                                    <span class="true_btna">不要深度合作</span>
                                </div>
                            </div>

                            <!--后台匹配已见面未深度合作-->
                            <div class="zy_pp">
                                <div class="pro_here iconfont">
                                    <a href="home_page.html"><img class="here_img" src="img/home_page/prob.jpg" /></a>
                                    <div class="here_zhe"></div>
                                    <div class="here_botaa"></div>
                                    <div class="here_bottom line_center">
                                        <div class="here_head">
                                            <img src="img/home_page/proa.jpg" />
                                        </div>
                                        <div class="here_bottom line_center">
                                            <div class="here_head"><img src="img/home_page/banner_head.jpg" /></div>
                                            <div class="bottom_name"><span class="here_name">Keiji Ashizawa</span><span class="here_namea" id="city">北京</span></div>
                                            <div class="bottom_label bottom_referral">
                                                <span>艺术大咖</span><span>设计大师</span>
                                            </div>
                                            <div class="right_type color_ccca">
                                                <span class="ooo_spa">已见面</span>
                                                <span class="ooo_spb">未深度合作</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tj_box">
                                    <span class="tj_spa">住艺君推荐设计师</span>
                                    <span class="tj_spb"><a>推荐理由：</a>匹配客服后台编辑</span>
                                </div>
                            </div>
                            <!--后台匹配已深度合作-->
                            <div class="zy_pp">
                                <div class="pro_here iconfont">
                                    <a href="home_page.html"><img class="here_img" src="img/home_page/prob.jpg" /></a>
                                    <div class="here_zhe"></div>
                                    <div class="here_botaa"></div>
                                    <div class="here_bottom line_center">
                                        <div class="here_head">
                                            <img src="img/home_page/proa.jpg" />
                                        </div>
                                        <div class="here_bottom line_center">
                                            <div class="here_head"><img src="img/home_page/banner_head.jpg" /></div>
                                            <div class="bottom_name"><span class="here_name">Keiji Ashizawa</span><span class="here_namea" id="city">北京</span></div>
                                            <div class="bottom_label bottom_referral">
                                                <span>艺术大咖</span><span>设计大师</span>
                                            </div>
                                            <div class="right_type red">
                                                已深度合作
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tj_box">
                                    <span class="tj_spa">住艺君推荐设计师</span>
                                    <span class="tj_spb"><a>推荐理由：</a>匹配客服后台编辑</span>
                                </div>

                                <span class="jm_time">见面2小时</span>
                                <span class="jm_money"><a>￥800</a>(首次免费约见)</span>
                                <div class="hetong_box">
                                    <div class="hetong_here"><img src="img/home_page/prob.jpg" /> <i class="iconfont icon-shanchu1"></i></div>
                                    <div class="hetong_here"><img src="img/home_page/prob.jpg" /> <i class="iconfont icon-shanchu1"></i></div>
                                    <div class="hetong_here"><img src="img/home_page/prob.jpg" /> <i class="iconfont icon-shanchu1"></i></div>
                                </div>
                                <div class="true_time queren_btn hetong_btn">
                                    <span class="true_btnb hetong">上传合同，住艺法务免费服务</span>
                                </div>
                            </div>		

                        </div>
                    </li>
                    <li class="xuqiu_box">
                        <div class="xuqiu">
                            <div class="xuqiu_here">
                                <div class="xq_here_top">
                                    <span class="xq_top_left">需求单：4235</span><a href="edit_demand.html"><span class="xq_top_btn">编辑</span></a>
                                </div>
                                <div class="xuqiu_center">
                                    <img class="center_img" src="img/home_page/proa.jpg" />
                                    <div class="center_here">
                                        <span class="here_left">城市：</span>
                                        <span class="here_right">北京</span>
                                    </div>
                                    <div class="center_here">
                                        <span class="here_left">房型：</span>
                                        <span class="here_right">公寓平层</span>
                                    </div>
                                    <div class="center_here">
                                        <span class="here_left">平米数：</span>
                                        <span class="here_right">100平米</span>
                                    </div>
                                    <div class="center_here">
                                        <span class="here_left">装修时间：</span>
                                        <span class="here_right">半年内施工</span>
                                    </div>
                                    <div class="here_bott">
                                        硬装  预算上限50万 <br/>（包括设计费；施工人工费；辅助／主材费）
                                    </div>
                                </div>
                            </div>

                            <div class="xuqiu_here">
                                <div class="xq_here_top">
                                    <span class="xq_top_left">需求单：4235</span><a href="edit_demand.html"><span class="xq_top_btn">编辑</span></a>
                                </div>
                                <div class="xuqiu_center">
                                    <img class="center_img" src="img/home_page/proa.jpg" />
                                    <div class="center_here">
                                        <span class="here_left">城市：</span>
                                        <span class="here_right">北京</span>
                                    </div>
                                    <div class="center_here">
                                        <span class="here_left">房型：</span>
                                        <span class="here_right">公寓平层</span>
                                    </div>
                                    <div class="center_here">
                                        <span class="here_left">平米数：</span>
                                        <span class="here_right">100平米</span>
                                    </div>
                                    <div class="center_here">
                                        <span class="here_left">装修时间：</span>
                                        <span class="here_right">半年内施工</span>
                                    </div>
                                    <div class="here_bott">
                                        硬装  预算上限50万 <br/>（包括设计费；施工人工费；辅助／主材费）
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="">
                        <div class="collect">

                            <div class="loading_box">
                                <img src="img/loading.gif"  />
                            </div>
                        </div>
                    </li>
                </ul>

            </section>
        </section>
    </body>
</html>

