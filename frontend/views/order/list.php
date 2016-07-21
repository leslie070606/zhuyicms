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
        <!--<script type="text/javascript" src="js/jquery.easy-pie-chart.js" ></script>-->
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

            <section id="user_box" class="custom">
                <div class="user_top">
                    <span class="head_img"><img src="img/home_page/banner_head.jpg"/></span>
                    <span class="head_name">张三</span>
                    <span class="head_more">免费预约一次</span>
                </div>


                <ul class="bxslidera" id="nav_box">
                    <li>
                        <div class="dingdan">
                            <?php
                            if (empty($data) || !is_array($data)) {
                                echo("暂无订单\n");
                            } else {
                                foreach ($data as $d) {
                                    $orderId = $d['order_id'];
                                    //var_dump($orderId);

                                    //获取设计师的头像，标签等信息。
                                    $designerId = $d['designer_id'];
                                    $designerM = new \frontend\models\DesignerBasic();
                                    $ret = $designerM->getDesignerById($designerId);
                                    //根据此订单查到的设计师ID，如果是找不到数据，接着下一次循环
                                    if (empty($ret)) {
                                        continue;
                                    }
                                    $name = $ret->name;
                                    $tagStr = $ret->tag;
                                    $tagStr = "hongkong,台湾小屌丝,设计小生";
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

                                    $zyImage = new \frontend\models\Images();
                                    $img = $zyImage->getImage(\frontend\models\Images::IMAGE_DESIGNER_HEAD_PORTRAIT, $designerId);
                                    if (!empty($img)) {
                                        $headPortrait = $img->url;
                                    } else {
                                        $headPortrait = "/img/home_page/banner_head.jpg";
                                    }

                                    //订单状态
                                    $status = $d['status'];
                                    $statusMsg = \frontend\models\Order::$ORDER_STATUS_DICT["$status"];
                                    //订单类型，用户自动创建还是客服创建。
                                    $orderType = 0;
                                    //$orderType	= $d['service_type'];
                                    //用户创建并且待设计师确认
                                    if ($orderType == 0 &&
                                            $status == \frontend\models\Order::STATUS_WAITING_DESIGNER_TO_CONFIRM) {
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
								  					24小时内确认
								  				</div>
HTML;
                                    } elseif ($orderType == 0 &&
                                            $status == \frontend\models\Order::STATUS_WAITING_USER_TO_CONFIRM_TIME) {
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
				  									<span class="tj_spb">我6月10日上午；6月11日上午；6月12日上午有时间。 请在12小时内确认时间。</span>
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
				  						24小时内确认（住艺君提示：时间限量<br> 如未尽快确认则此时间段可能被其他客户抢走）
				  						<input value="确定时间" class="true_btn" readonly="" name="appTime" id="appTimea" type="text">
				  					</div>
				  				</div>
HTML;
                                    } elseif ($orderType == 0 && $status == \frontend\models\Order::STATUS_WAITING_MEETING) {
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
				  				<div class="tj_box">
				  					<span class="tj_spa">住艺君推荐设计师</span>
				  					<span class="tj_spb"><a>推荐理由：</a>匹配客服后台编辑</span>
				  				</div>
				  				<span class="jm_time">见面时间：8月24日 3:00PM</span>
								<span class="jm_money">见面地点：北京市光华路2号9层1003室</span>
				  				
								<span class="jm_time">见面2小时</span>
								<span class="jm_money"><a>￥800</a>(首次免费约见)</span>
				  				
				  			</div>
HTML;
                                    } elseif ($orderType == 1 && $status == \frontend\models\Order::STATUS_WAITING_MEETING) {
                                        $html = <<<HTML
<div class="zy_pp">
					  				<div class="pro_here iconfont">
										<a href="home_page.html"><img class="here_img" src="img/home_page/prob.jpg"></a>
										<div class="here_zhe"></div>
										<div class="here_botaa"></div>
										<div class="here_bottom line_center">
											<div class="here_head">
												<img src="img/home_page/proa.jpg">
											</div>
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
										<div class="right_type">
											$statusMsg
										</div>
									</div>
				  				<div class="tj_box leave_word">
				  					<span class="tj_spa">设计师留言：</span>
				  					<span class="tj_spb">非常抱歉，我最近1个月的档期已满，感谢你的支持 你可以考虑住艺根据私人匹配，推荐你的设计师</span>
				  				</div>
				  				
				  			</div>
HTML;
                                    } elseif ($orderType == 0 &&
                                            $status == \frontend\models\Order::STATUS_WAITING_MET_DONE) {
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
				  				<div class="tj_box">
				  					<span class="tj_spa">住艺君推荐设计师</span>
				  					<span class="tj_spb"><a>推荐理由：</a>匹配客服后台编辑</span>
				  				</div>
				  				<span class="jm_time">见面时间：8月24日 3:00PM</span>
								<span class="jm_money">见面地点：北京市光华路2号9层1003室</span>
				  				
								<span class="jm_time">见面2小时</span>
								<span class="jm_money"><a>￥800</a>(首次免费约见)</span>
				  				
				  			</div>
HTML;
                                    } elseif ($orderType == 1 && $status == \frontend\models\Order::STATUS_WAITING_MET_DONE) {
                                        $html = <<<HTML
<div class="zy_pp">
					  				<div class="pro_here iconfont">
										<a href="home_page.html"><img class="here_img" src="img/home_page/prob.jpg"></a>
										<div class="here_zhe"></div>
										<div class="here_botaa"></div>
										<div class="here_bottom line_center">
											<div class="here_head">
												<img src="img/home_page/proa.jpg">
											</div>
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
HTML;
                                    } elseif ($orderType == 0 && $status == \frontend\models\Order::STATUS_MET_DONE) {
                                        $yesUrl = Yii::getAlias('@web') . '/index.php?r=order/cooperation';
                                        $noUrl = Yii::getAlias('@web') . '/index.php?r=order/cooperation';
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
				  				<span class="jm_time">见面时间：8月24日 3:00PM</span>
								<span class="jm_money">见面地点：北京市光华路2号9层1003室</span>
				  				
								<span class="jm_time">见面2小时</span>
								<span class="jm_money"><a>￥800</a>(首次免费约见)</span>
								<div class="true_time queren_btn">
					  					<span class="true_btnb true_btnaa" yes_url="$yesUrl">确认深度合作</span>
					  					<span class="true_btna" no_url="$noUrl">不要深度合作</span>
				  					</div>
				  				
				  			</div>
HTML;
                                    } elseif ($orderType == 1 && $status == \frontend\models\Order::STATUS_MET_DONE) {
                                        $html = <<<HTML
<div class="zy_pp">
					  				<div class="pro_here iconfont">
										<a href="home_page.html"><img class="here_img" src="img/home_page/prob.jpg"></a>
										<div class="here_zhe"></div>
										<div class="here_botaa"></div>
										<div class="here_bottom line_center">
											<div class="here_head">
												<img src="img/home_page/proa.jpg">
											</div>
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
									<div class="true_time queren_btn">
					  					<span class="true_btnb">确认深度合作</span>
					  					<span class="true_btna">不要深度合作</span>
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
				  				
				  				<span class="jm_time">见面时间：8月24日 3:00PM</span>
								<span class="jm_money">见面地点：北京市光华路2号9层1003室</span>
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
				  				
								<span class="jm_time">见面2小时</span>
								<span class="jm_money"><a>￥800</a>(首次免费约见)</span>
								<div class="hetong_box">
											<div class="hetong_here"><img src="img/home_page/prob.jpg"> <i class="iconfont icon-shanchu1"></i></div>
											<div class="hetong_here"><img src="img/home_page/prob.jpg"> <i class="iconfont icon-shanchu1"></i></div>
											<div class="hetong_here"><img src="img/home_page/prob.jpg"> <i class="iconfont icon-shanchu1"></i></div>
									</div>
									<div class="true_time queren_btn hetong_btn">
					  					<span class="true_btnb hetong">上传合同</span>
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
                </ul>

            </section>
        </section>
    </body>
</html>
