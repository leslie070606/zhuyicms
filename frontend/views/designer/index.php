<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>风格测试</title>
    <link rel="stylesheet" href="css/gloab.css" />
    <link rel="stylesheet" href="css/home_page.css" />
    <link rel="stylesheet"  href="//at.alicdn.com/t/font_1467182747_5067458.css" />
    <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
	<script type="text/javascript" src="js/gloab.js" ></script>
   	<script type="text/javascript" src="js/home_page.js" ></script>
    
</head>
<body>
		<header class="header_top iconfont icon-logo">
			<!--<input id="ipt" type="text" value="0" />-->
			<span class="top_right iconfont icon-gongneng"></span>
		</header>
		<section class="down_right">
			
			
		</section> 
		<section class="page_banner">
			<img class="banner_img" src="<?= $data['background'] ?>" />
			<div class="banner_mesg">
				<div class="banner_name"><?= $data['name'] ?></div>
				<div class="banner_bq"><span><?= $data['tag'] ?></span></div>
			</div>
			
		</section>
		<span class="banner_head"><img src="<?= $data['head_portrait'] ?>"/></span>
		<section class="production">
			<div class="pro_title">
				<span class="titl_span">作品集
					<a></a>
				</span>
			</div>
			<div class="pro_box">
				<?php
					foreach($data['artsets'] as $k => $v){
						//标题
						$topic = $v->topic;
						$brief = $v->brief;
						$path  = $v->art_path;

						$html = <<<HTML
							<div class="pro_here pro_img iconfont icon-bofang1">
								<img class="here_img" src="$path" />
								<div class="here_zhe"></div>
								<div class="here_botaa"></div>
								<div class="here_bottom line_center">
									<div class="bottom_name">
										$topic	
									</div>
									<div class="bottom_referral">
										$brief
									</div>
								</div>
							</div>	
HTML;
 
						echo $html;
					}
				?>
		<div class="see_more"><a href="#">查看更多作品</a></div>
		
		<section class="Basic_Info">
			<div class="pro_title">
				<span class="titl_span">基本信息</span>
			</div>
			<div class="Basic_Info_box">
				<div class="info_here">
					<div class="info_here_left">
						服务范围
					</div>
					<div class="info_here_right right_top">
						<div class="topa">
							<span class="standard">标准服务</span>
							<span class="addition">附加服务</span>
						</div>
						<div class="topb">
							<span>硬件设计</span>
							<div class="topb_box">
								<span class="red">平面设计图</span>
								<span class="red">立面设计图</span>
								<span class="red">施工对接图</span>
								<span>单次咨询</span>
								<span>主材推荐</span>
							</div>
						</div><!--topb end-->
						
						<div class="topb">
							<span>施工对接</span>
							<div class="topb_box">
								<span class="red">推荐施工队</span>
								<span>资质施工队</span>
								<span>材料购买陪同</span>
								<span>去工地N次</span>
							</div>
						</div><!--topb end-->
						
						<div class="topb">
							<span>软装设计</span>
							<div class="topb_box">
								<span class="red">家居平面图</span>
								<span class="red">产品推荐</span>
								<span>家具定制</span>
								<span>家居陪买</span>
								<span>主材推荐</span>
							</div>
						</div><!--topb end-->
						
						<div class="topb">
							<span>其他</span>
							<div class="topb_box">
								
								<span>建筑设计</span>
								<span>艺术品咨询</span>
								<span>景观设计</span>
							</div>
						</div><!--topb end-->
					</div>
				</div><!--info_here end-->
				
				<div class="info_here">
					<div class="info_here_left">
						服务城市
					</div>
					<div class="info_here_right cccc">
						北京
					</div>
				</div><!--info_here end-->
				
				<div class="info_here">
					<div class="info_here_left">
						得意作品
					</div>
					<div class="info_here_right cccc">
						<span class="zuop">多伦多梦露大厦</span><span class="zuop">哈尔滨大剧院</span>
					</div>
				</div><!--info_here end-->
				
				<div class="info_here">
					<div class="info_here_left">
						擅长风格
					</div>
					<div class="info_here_right cccc">
						皆可
					</div>
				</div><!--info_here end-->
				
				<div class="info_here">
					<div class="info_here_left">
						荣誉奖项
					</div>
					<div class="info_here_right cccc">
						<?php echo $data['winnings']?>
					</div>
				</div><!--info_here end-->
				
				<div class="info_here">
					<div class="info_here_left">
						兴趣爱好
					</div>
					<div class="info_here_right cccc">
						设计
					</div>
				</div><!--info_here end-->
				
			</div>
		
		</section><!--Basic_Info end-->
		<div class="page_bottom">
				<span class="bota"><a>查看收费</a></span>
				<span class="bota sc_bot"><a>收藏</a></span>
				<span class="botb"><a>立即约见</a></span>
		</div>
</body>
</html>
