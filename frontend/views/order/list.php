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
        <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script type="text/javascript" src="js/user.js" ></script>

    </head>

    <body>
        <section class="user_box">
            <header class="header_top iconfont icon-logo">
                <span class="top_right iconfont icon-gongneng"></span>
            </header>
            <section class="down_right">
                <ul>
                    <li><a href="<?php echo Url::toRoute('/index/index'); ?>">首页</a></li>
                    <li><a href="<?php echo Url::toRoute('/designer/list'); ?>">住艺设计师</a></li>
                    <li><a href="designer_list.html">设计指南</a></li>
                    <li><a href="user.html">我的住艺</a></li>
                    <li><a href="designer_list.html">更多意见</a></li>
                    <li>   <?php if ($session->get('user_id')) { ?>
                            <a href="<?php echo Url::toRoute('/user/loginout'); ?>">暂时登出</a>

                        <?php } else { ?>

                            <a href = "<?php echo Url::toRoute('/user/login'); ?>">立即登录</a>

                        <?php }; ?>

                    </li>
                </ul>
            </section>
            <div class="down_right_zd"></div>

            <section id="user_box" class="custom">
                <div class="user_top">
                    <span class="head_img"><img src="img/home_page/banner_head.jpg"/></span>
                    <span class="head_name">张三</span>
                    <span class="head_more">免费预约一次</span>
                </div>
                <div class="nac_boxa">
                    <span class="active">订单</span>
                    <span>需求</span>
                    <span>收藏</span>
                </div>	
                <ul class="bxslidera" id="nav_box">
                    <li>
                        <div class="dingdan">
                            <?php
                            if (empty($data) || !is_array($data)) {

                                $html = <<<HTML
								<div class="Blank_Page">
				  					<span>目前还没有订单产生<br/>
				  					快 <a href="designer_list.html" class="red">提交需求</a>约见设计师吧
				  					</span>
				  				</div>
HTML;
                                echo $html;
                            } else {
                                foreach ($data as $d) {
                                    $orderId = $d['order_id'];
                                    $userId = $d['user_id'];
                                    $orderType = $d['order_type'];
									$dSpareTime = $d['designer_spare_time'];
                                    $designerId = $d['designer']['designer_id'];
                                    $name = $d['designer']['name'];
                                    $headPortrait = $d['designer']['head_portrait'];
                                    $tagStr = $d['designer']['tag'];
                                    $tagArr = explode(',', $tagStr);
                                    $labelSpan = '';
                                    if (count($tagArr) == 1) {
                                        $labelSpan = "<span>$tagArr[0]</span>";
                                    } else {
                                        foreach ($tagArr as $t) {
                                            $lt = "<span>$t</span>";
                                            $labelSpan .= $lt;
                                        }
                                    }

									$appointmentTime = date("Y-m-d H:i:s",$d['appointment_time']);
									$appointmentLocation = $d['appointment_location'];
                                    //订单状态
                                    $status = $d['status'];
                                    $statusMsg = \frontend\models\Order::$ORDER_STATUS_DICT["$status"];
                                    $orderType = $d['order_type'];
                                    //用户创建并且待设计师确认
                                    if ($status ==
                                            \frontend\models\Order::STATUS_WAITING_DESIGNER_TO_CONFIRM) {
                                        $rows = \frontend\models\Order::findOne($orderId);
										if(!empty($rows)){
                                        	$createTime = $rows->create_time;
										}else{
                                        	$create_time = time();
										}
                                        $timestamp = $create_time + 24 * 3600;
                                        $time = date('Y-m-d H:i:s', $timestamp);
                                        $html = <<<HTML
                            				<div class="dd_here">
								  				<div class="here_bottom line_center">

													<div class="here_head">
														<img src="$headPortrait" />
													</div>

													<div class="bottom_name">
														<span class="here_name">$name</span>
														<span class="here_namea" id="city">北京</span>
													</div>

													<div class="bottom_label bottom_referral">
														$labelSpan
													</div>
													<div class="right_type">
														$statusMsg
													</div>
												</div>
												<span class="jm_time">见面2小时</span>
												<span class="jm_money"><a>￥800</a>(首次免费约见)</span>
								  				<div class="true_time">
								  				住艺管家正在协调设计师的意向和时间订单状态 将在{$time}前更新
								  				</div>
											</div>
HTML;
									//客服创建，订单类型字段为0，状态为待用户确认时间。
                                    } elseif ($orderType == 0 &&
                                            $status == \frontend\models\Order::STATUS_WAITING_USER_TO_CONFIRM_TIME) {
                                        //$rows = \frontend\models\Order::findOne($orderId);
                                        //设计师的空闲时间，以,分隔
                                        //  $timeStr = $rows->designer_rest_time;
                                        //  $timeArr = explode(',',$timeStr);

										$dSpareArr = explode(',',$dSpareTime);
										$time1 = isset($dSpareArr[0])? $dSpareArr[0] : '';
										$time2 = isset($dSpareArr[1])? $dSpareArr[1] : '';
										$time3 = isset($dSpareArr[2])? $dSpareArr[2] : '';

                                        $confirmTime = Yii::getAlias('@web') . '/index.php?r=order/change';
                                        $html = <<<HTML
											<div class="zy_pp dd_here" order_id = "$orderId">
				  								<div class="here_bottom line_center">
													<div class="here_head">
														<img src="$headPortrait">
													</div>
													<div class="bottom_name">
														<span class="here_name">$name</span>
														<span class="here_namea" id="city">北京</span>
													</div>
													<div class="bottom_label bottom_referral">
														$labelSpan
													</div>
													<div class="right_type">
														$statusMsg
													</div>
												</div>
				  								<div class="tj_box leave_word">
				  									<span class="tj_spa">设计师留言：</span>
				  									<span class="tj_spb">我<span class="time_list"><i>{$time1}</i><i>{$time2}</i><i>{$time3}</i></span>有时间。 请在12小时内确认时间。</span>
				  								</div>
				  				
												<span class="jm_time">见面2小时</span>
												<span class="jm_money"><a>￥800</a>(首次免费约见)</span>
				  								<div class="true_time">
													24小时内确认（住艺君提示：时间限量<br>
													如未尽快确认则此时间段可能被其他客户抢走）
				  									<input value="确定时间" class="true_btn" readonly="" name="appTime" id="appTime" type="text" confirm_time="$confirmTime">
												</div>
				  							</div>
HTML;
                                    } elseif ($orderType == 1 &&
                                            $status == \frontend\models\Order::STATUS_WAITING_USER_TO_CONFIRM_TIME) {
							//客服和设计师沟通完毕，需要先更新订单的设计师三个空闲时间段，并且需要把订单状态置成待用户确认时间。
                                        $dSpareArr = explode(',',$dSpareTime);
                                        $time1 = isset($dSpareArr[0])? $dSpareArr[0] : '
';
                                        $time2 = isset($dSpareArr[1])? $dSpareArr[1] : '
';
                                        $time3 = isset($dSpareArr[2])? $dSpareArr[2] : '
';
                                        $confirmTime = Yii::getAlias('@web') . '/index.php?r=order/change';
                                        $html = <<<HTML
									<div class="zy_pp">
				  						<div class="pro_here iconfont">
											<a href="home_page.html">
												<img class="here_img" src="img/home_page/prob.jpg">
											</a>
											<div class="here_zhe"></div>
											<div class="here_botaa"></div>
									
				  							<div class="here_bottom line_center">
												<div class="here_head">
													<img src="$headPortrait">
												</div>
											<div class="bottom_name">
												<span class="here_name">$name</span>
												<span class="here_namea" id="city">北京</span>
											</div>
											<div class="bottom_label bottom_referral">
												$labelSpan
											</div>
											<div class="right_type">
												$statusMsg
											</div>
										</div>
				  					</div>
				  					<div class="tj_box">
				  						<span class="tj_spa">住艺推荐设计师</span>
				  						<span class="tj_spb"><a>推荐理由：</a>匹配客服后台编辑</span>
				  					</div>
				  					<div class="tj_box leave_word">
				  						<span class="tj_spa">设计师留言：</span>
				  						<span class="tj_spb">我<span class="time_list"><i>{$time1}</i><i>{$time2}</i><i>{$time3}</i></span>有时间。 请在12小时内确认时间。</span>
				  					</div>
				  				
									<span class="jm_time">见面2小时</span>
									<span class="jm_money"><a>￥800</a>(首次免费约见)</span>
				  					<div class="true_time">
				  						24小时内确认（住艺君提示：时间限量<br> 如未尽快确认则此时间段可能被其他客户抢走）
				  						<input value="确定时间" class="true_btn" readonly="" name="appTime" id="appTimeA" type="text" confirm_time="$confirmTime">
				  					</div>
				  				</div>
HTML;
                                    } elseif ($status == \frontend\models\Order::STATUS_WAITING_MEETING) {
                                        $html = <<<HTML
<div class="zy_pp dd_here">
				  					<div class="here_bottom line_center">
										<div class="here_head"><img src="$headPortrait"></div>
										<div class="bottom_name"><span class="here_name">$name</span><span class="here_namea" id="city">北京</span></div>

										<div class="bottom_label bottom_referral">
											$labelSpan
										</div>
										<div class="right_type">
											$statusMsg
										</div>
									</div>
				  				<span class="jm_time">见面时间：{$appointmentTime}</span>
								<span class="jm_money">见面地点：{$appointmentLocation}</span>
				  				
								<span class="jm_time">见面2小时</span>
								<span class="jm_money"><a>￥800</a>(首次免费约见)</span>
				  				
				  			</div>
HTML;
                                    } elseif ($status == \frontend\models\Order::STATUS_CANCEL_MEETING) {
                                        $html = <<<HTML
<div class="zy_pp dd_here">
				  					<div class="here_bottom line_center">
										<div class="here_head"><img src="$headPortrait"></div>
										<div class="bottom_name"><span class="here_name">$name</span><span class="here_namea" id="city">北京</span></div>
										<div class="bottom_label bottom_referral">
											$labelSpan
										</div>
										<div class="right_type color_ccc">
											$statusMsg
										</div>
									</div>
				  				<div class="tj_box leave_word">
				  					<span class="tj_spa">设计师留言：</span>
				  					<span class="tj_spb">非常抱歉，我最近1个月的档期已满，感谢你的支持 你可以考虑住艺根据私人匹配，推荐你的设计师</span>
				  				</div>
				  				
				  			</div>
HTML;
                                    } elseif ($status == \frontend\models\Order::STATUS_WAITING_MET_DONE) {
                                        $html = <<<HTML
<div class="zy_pp dd_here">
				  					<div class="here_bottom line_center">
										<div class="here_head"><img src="$headPortrait"></div>
										<div class="bottom_name"><span class="here_name">$name</span><span class="here_namea" id="city">北京</span></div>
										<div class="bottom_label bottom_referral">
											$labelSpan
										</div>
										<div class="right_type">
											$statusMsg
										</div>
									</div>
				  				<span class="jm_time">见面时间：{$appointmentTime}</span>
								<span class="jm_money">见面地点：{$appointmentLocation}</span>
				  				
								<span class="jm_time">见面2小时</span>
								<span class="jm_money"><a>￥800</a>(首次免费约见)</span>
				  				
				  			</div>
HTML;
                                    } elseif ($status == \frontend\models\Order::STATUS_MET_DONE) {
                                        $url = Yii::getAlias('@web') . '/index.php?r=order/change';
                                        $html = <<<HTML
								<div class="zy_pp dd_here" order_id="$orderId">
				  					<div class="here_bottom line_center">
										<div class="here_head"><img src="$headPortrait"></div>
										<div class="bottom_name"><span class="here_name">$name</span><span class="here_namea" id="city">北京</span></div>
										<div class="bottom_label bottom_referral">
											$labelSpan
										</div>
										<div class="right_type">
											$statusMsg
										</div>
									</div>
				  				<span class="jm_time">见面时间：{$appointmentTime}</span>
								<span class="jm_money">见面地点：{$appointmentLocation}</span>
				  				
								<span class="jm_time">见面2小时</span>
								<span class="jm_money"><a>￥800</a>(首次免费约见)</span>
								<div class="true_time queren_btn">
					  					<span class="true_btnb true_btnaa" url="$url">开始深度合作</span>
					  					<span class="true_btna" url="$url">计划有变，暂时先不合作了</span>
				  					</div>
				  				
				  			</div>
HTML;
                                    } elseif ($status == \frontend\models\Order::STATUS_MET_NOT_DEEP_COOPERATION) {
                                        $html = <<<HTML
<div class="zy_pp dd_here">
				  					<div class="here_bottom line_center">
										<div class="here_head"><img src="$headPortrait"></div>
										<div class="bottom_name"><span class="here_name">$name</span><span class="here_namea" id="city">北京</span></div>
										<div class="bottom_label bottom_referral">
											$labelSpan
										</div>
										<div class="right_type">
											$statusMsg
										</div>
									</div>
				  				
				  				<span class="jm_time">见面时间：{$appointmentTime}</span>
								<span class="jm_money">见面地点：{$appointmentLocation}</span>
				  		</div>
HTML;
                                    } elseif ($status == \frontend\models\Order::STATUS_MET_DEEP_COOPERATION) {
                                        $html = <<<HTML
<div class="zy_pp dd_here">
				  					<div class="here_bottom line_center">
										<div class="here_head"><img src="$headPortrait"></div>
										<div class="bottom_name"><span class="here_name">$name</span><span class="here_namea" id="city">北京</span></div>
										<div class="bottom_label bottom_referral">
											$labelSpan
										</div>
										<div class="right_type">
											$statusMsg
										</div>
									</div>
				  				
								<span class="jm_time">见面2小时111</span>
								<span class="jm_money"><a>￥800</a>(111首次免费约见)</span>
								<input type="hidden" value="" name="list_val" class="list_val" />
								<ul class="hetong_box">
											<li class="hetong_here"><img src="img/home_page/prob.jpg"> <i class="iconfont icon-shanchu1"></i></li>
											<li class="hetong_here"><img src="img/home_page/prob.jpg"> <i class="iconfont icon-shanchu1"></i></li>
											<li class="hetong_here"><img src="img/home_page/prob.jpg"> <i class="iconfont icon-shanchu1"></i></li>
								</ul>
									<div class="true_time queren_btn hetong_btn">
					  					<span class="true_btnb hetong">上传合同2</span>
				  					</div>
				  				
				  			</div>
HTML;
                                    }
                                    echo $html;
                                }
                            }
                            ?>
                        </div>

                    </li>
                    <li class="xuqiu_box">
                    </li>
                    <li></li>
                </ul>

            </section>
        </section>
    </body>
</html>

<script type="text/javascript">
    $(function () {
        //标题点击事件
        var indexaa;
        var index = 7;
        var xiuqiu = 8;
        var htmll = "";
        function duang() {
            $("#nav_box").animate({left: -widtha * indexaa}, 400, function () {
                if (indexaa == 2 && index == 7) {
                    $.ajax({
                        type: "get",
                        url: "<?php echo Yii::getAlias('@web') . '/index.php?r=my/show'; ?>",
                        async: true,
                        success: function (data) {
                            if (data == -1) {
                                return false;
                            }
                            data = eval('(' + decodeURI(data) + ')');
                            var htmlaa = '';
                            for (var i = 0; i < data.length; i++) {
                                var gett = data[i].tag;
                                if (gett.indexOf(",") < 0) {
                                    htmlaa = '<span>' + data[i].tag + '</span>';
                                } else {
                                    gett = gett.split(",");
                                    for (var a = 0; a < gett.length; a++) {
                                        var hah = '<span>' + gett[a] + '</span>'
                                        htmlaa += hah;
                                    }
                                }
                                var html = '<div class="pro_here iconfont" designer_id="' + data[i].designer_id + '">'
                                        + '<a href="' + data[i].redirect_url + '"><img class="here_img" src="' + data[i].background + '" /></a>'
                                        + '<span class="shanchu_box"><i class="iconfont icon-shanchu1"></i></span>'
                                        + '<div class="here_zhe"></div>'
                                        + '<div class="here_botaa"></div>'
                                        + '<div class="here_bottom line_center">'
                                        + '<div class="here_head">'
                                        + '<img src="' + data[i].head_portrait + '" />'
                                        + '</div>'
                                        + '<div class="bottom_name">'
                                        + '<span class="here_name">' + data[i].name + '</span>'
                                        + '<span class="here_namea">暂缺数据</span>'
                                        + '</div>'
                                        + '<div class="bottom_label bottom_referral">' + htmlaa + '</div>'
                                        + '</div>'
                                        + '</div>'
                                $(".collect").append(html);
                                index++;
                            }
                            $(".loading_box").hide();
                        }
                    });
                }


                if (indexaa == 1 && xiuqiu == 8) {
                    $.ajax({
                        type: "GET",
                        url: "<?php echo Yii::getAlias('@web') . '/index.php?r=project/updateadditional'; ?>",
                        data: "",
                        success: function (data) {
                           $(".xuqiu_box").html(data);
                           xiuqiu++;
                        
                            var heighttt = $("#nav_box>li:eq(" + indexaa + ")").css("height");
                $("#nav_box").css("height", heighttt);
                            
                        }
                    })
                    
                }
               
            });
            $(".nac_boxa>span:eq(" + indexaa + ")").addClass("active").siblings().removeClass("active");
        }

        touch.on(".nac_boxa>span", "tap", function (ev) {
            indexaa = $(ev.currentTarget).index();
            duang();


        });
        $(document).on("click", ".shanchu_box", function () {
            var _this = $(this);
            //注释写死user_id为1
            var user_id = 1;
            var designer_id = _this.parents(".iconfont").attr("designer_id");
            var params = [user_id, designer_id];
            $.ajax({
                type: "get",
                url: "<?php echo Yii::getAlias('@web') . '/index.php?r=my/uncollect'; ?>" + "&&params=" + params,
                async: true,
                success: function (data) {
                    _this.parents(".iconfont").remove();
                }
            });
        });

    });

//调用微信接口

    wx.config({
        debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: 'wx1344a7a9fac82094', // 必填，公众号的唯一标识
        timestamp: <?= $jsarr['timestamp'] ?>, // 必填，生成签名的时间戳
        nonceStr: 'zhuyi', // 必填，生成签名的随机串
        signature: "<?= $jsarr['signature'] ?>", // 必填，签名，见附录1
        jsApiList: ['onMenuShareAppMessage', 'onMenuShareTimeline', 'checkJsApi', 'chooseImage', 'uploadImage', 'downloadImage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });
    //定义images用来保存选择的本地图片ID，和上传后的服务器图片ID
    var images = {
        localId: [],
        serverId: []
    };
    wx.ready(function () {

        wx.checkJsApi({
            jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'checkJsApi', 'chooseImage', 'uploadImage', 'downloadImage'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
            success: function (res) {
                alert(res);
				alert(res.checkResult.chooseImage);
                // 以键值对的形式返回，可用的api值true，不可用为false
                // 如：{"checkResult":{"chooseImage":true},"errMsg":"checkJsApi:ok"}
            }
        });
        var u = navigator.userAgent;

       touch.on(".hetong", "tap", function (ev) {
			alert("123");
            var _this = $(this);
            var index;
            var likestr = '';
            var nuber = 0;

            // 拍照选择图片
            wx.chooseImage({
                count: 9, // 默认9
                sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
                sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
                success: function (res) {
                    images.localId = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
					alert("222");		
                    var html = "";
                    // alert(indexx)
                    for (var i = 0; i < images.localId.length; i++) {
                        var htmllll = images.localId[i];
                        html += '<li class="hetong_here"><img src="' + htmllll + '" value=""> <i class="iconfont icon-shanchu1"></i></li>';
                        var ge = images.localId.length;
                        // 上传图片
                        wx.uploadImage({
                            localId: images.localId[i], // 需要上传的图片的本地ID，由chooseImage接口获得
                            isShowProgressTips: 1, // 默认为1，显示进度提示
                            success: function (res) {
                                serverId = res.serverId; // 返回图片的服务器端ID
                                likestr += serverId + "$";
                                nuber++;
                              
                                    if (nuber >= ge) {
                                        var like_val = _this.parents(".zy_pp").find(".list_val").val();
                                        _this.parents(".zy_pp").find(".list_val").val(like_val + likestr);

                                        likestr = likestr.toString().split("$");
                                        for (var i = 0; i < $(".hetong_box li").length - 1; i++) {
                                            $(".hetong_box li:eq(" + i + ") ").prop("img_id", likestr[i]);
                                        }
                                    }
                                

                            }
                        });
                    }

                    $(".hetong_box").prepend(html);
                    img_height_auto();
                    var get_val = _this.parents(".zy_pp").find(".list_val").val();
                    $.ajax({
                        type: "get",
                		url: "<?php echo Yii::getAlias('@web') . '/index.php?r=order/contract'; ?>" + "&&params=" + get_val,
                        async: true,
                        success: function () {
                            alert(get_val)
                        }
                    });


                }

            })
        });

    });
    function img_height_auto() {
        var width = $(".here_img_box li img").width();
        $(".here_img_box li img").css("height", width);
        $(".add_img").css({"width": width, "height": width})
    }
</script>
