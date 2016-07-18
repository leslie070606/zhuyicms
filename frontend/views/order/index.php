<!DOCTYPE html>
<html>
	<head>
	 	<meta charset="utf-8">
	    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	    <title>个人中心</title>
	    <link rel="stylesheet" href="css/gloab.css" />
	    <link rel="stylesheet" href="css/user.css" />
	    <link rel="stylesheet"  href="//at.alicdn.com/t/font_1467361951_3606887.css" />
	    <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
	    <script type="text/javascript" src="js/jquery.bxslider.js" ></script>	
		<script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
		<script type="text/javascript" src="js/jquery.easy-pie-chart.js" ></script>
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
					<span class="head_name">蔡英烈</span>
					<span class="head_more">免费预约一次</span>
				</div>
				
				
				<ul class="bxslidera" id="nav_box">
					<div>
						<?php
							foreach($final_data as $f){
								$designerId = $f['designer_id'];

								$designerModel = new \frontend\models\DesignerBasic();
								$ret = $designerModel->getDesignerById($designerId);
								if(!empty($ret)){
									$name = $ret->name;
									$tag  = $ret->tag;
								}else{
									$name = "Keiji Ashizawa";
									$tag  = "艺术大咖";
								}

								$zyImage = new \frontend\models\Images();
								$ret = $zyImage->getImage(\frontend\models\Images::IMAGE_DESIGNER_HEAD_PORTRAIT,$designerId);
								if(!empty($ret)){
									$headPortrait = $ret->url;
								}else{
									$headPortrait = "/img/home_page/banner_head.jpg";
								}
								$status = isset($f['status'])? $f['status'] : '-1';
								$statusMessage = \frontend\models\Order::$ORDER_STATUS_DICT["$status"];
								
								$orderType = 0;
								//$orderType = $f['order_type'];
								if($orderType == 0){//用户生成的订单
									switch($status){
										case \frontend\models\Order::STATUS_WAITING_DESIGNER_TO_CONFIRM:
											$html = <<<HTML
                            				<div class="dd_here">
								  				<div class="here_bottom line_center">
													<div class="here_head"><img src="<?= $headPortrait ?>" /></div>
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
								  					24小时内确认
								  				</div>
								  			</div>
HTML;
											break;
										case \frontend\models\Order::STATUS_WAITING_USER_TO_CONFIRM_TIME:
											$html = <<<HTML
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
								  					24小时内确认
								  				</div>
								  			</div>
HTML;
											break;
										case \frontend\models\Order::STATUS_CANCEL_MEETING:
											$html = <<<HTML
                            				<div class="zy_pp dd_here">
													<div class="here_botaa"></div>
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
								  					<span class="tj_spb">非常抱歉，我最近1个月的档期已满，感谢你的支持 你可以考虑住艺根据私人匹配，推荐你的设计师 拷贝</span>
								  				</div>
								  				
												<span class="jm_time">见面2小时</span>
												<span class="jm_money"><a>￥800</a>(首次免费约见)</span>
								  			</div>
HTML;
											break;
										default:
											$html = '';
											break;

									}

								}else{//客服来协助操作的订单
									switch($status){
										case \frontend\models\Order::STATUS_WAITING_USER_TO_CONFIRM_TIME:
										$html = <<<HTML
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
							  					<span class="true_btn">确定时间</span>
							  				</div>
							  			</div>
HTML;
											break;
										case \frontend\models\Order::STATUS_MET_NOT_DEEP_COOPERATION:
											$html = <<<HTML
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
HTML;
											break;
										case \frontend\models\Order::STATUS_WAITING_CONTRACT:
											$html = <<<HTML
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
												<div class="true_time queren_btn">
													<span class="true_btnb hetong">上传合同，住艺法务免费服务</span>
												</div>
											</div>	
HTML;
											break;
										default:
											$html = '';
											break;
									}
								}
								echo $html;
							}
						?>
					</div>
					
				</ul>
				
			</section>
		</section>
	</body>
</html>
