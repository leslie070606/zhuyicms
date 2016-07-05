<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>设计师列表</title>
    <link rel="stylesheet" href="css/gloab.css" />
    <link rel="stylesheet" href="css/designer_list.css" />
    <link rel="stylesheet"  href="//at.alicdn.com/t/font_1467361951_3606887.css" />
    <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.bxslider.js" ></script>	
	<script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
	<script type="text/javascript" src="js/gloab.js" ></script>
	<script type="text/javascript" src="js/designer_list.js" ></script>
</head>
<body>
<!--	<input id="ipt" value="0"  style="position: fixed; top: 140px; left: 40px; z-index: 99999;"/>
-->	<div class="des_box">
		<header class="header_top iconfont icon-logo">
			<a href="hunt.html" style="color: #ffffff;"><span class="top_left iconfont icon-sousuo"></span></a>
			<span class="top_lefta iconfont icon-shaixuan"></span>
			<!--<input id="ipt" type="text" value="0" />-->
			<span class="top_right iconfont icon-gongneng"></span>
		</header>
		<section class="down_right">
		</section> 
		<div class="sousuo_box">
			<div class="sousuo_title">
				设计师类别
			</div>
			<div class="sousuo_tab">
				<span>室内设计师</span>
				<span>建筑设计师</span>
				<span>园林设计师</span>
			</div>
			
			<div class="sousuo_title">
				设计师服务城市
			</div>
			
			<div class="xiala_box">
				<input class="xiala_sp" disabled placeholder="请选择服务城市" />
				<ul class="xiala_ul">
					<li>北京</li>
					<li>上海</li>
					<li>广州</li>
				</ul>
			</div>
			
			<div class="sifting">筛选</div>
		</div>
		<div class="designer_box">
			<?php
				foreach($data as $k => $v){
					//var_dump($v);
					//获取单个设计师的名字，头像，作品等信息
					$name 			= $v['name'];
					$tag			= $v['tag'];
					$headPortrait 	= $v['head_portrait'];
					$artPath 		= $v['art']->art_path;
					//var_dump($artPath);
					$html = <<<HTML
						<div class="pro_here iconfont">
							<a href="www.sina.com.cn"><img class="here_img" src="$artPath" />
							</a>
							<div class="here_zhe"></div>
							<div class="here_botaa"></div>
							<div class="here_bottom line_center">
								<div class="here_head">
									<img src="$headPortrait" />
								</div>
								<div class="bottom_name">
									<span class="here_name">$name</span>
								</div>
								<div class="bottom_label bottom_referral">
									<span>$tag</span>
								</div>
							</div>
						</div>
HTML;
					echo $html;	
				}
			?>
					<div class="pro_here iconfont">
						<a href="#"><img class="here_img" src="img/home_page/1.jpg" /></a>
						<div class="here_zhe"></div>
						<div class="here_botaa"></div>
						<div class="here_bottom line_center">
							<div class="here_head">
								<img src="img/home_page/1.jpg" />
							</div>
			
							<div class="bottom_name">
								<span class="here_name">Keiji Ashizawa</span>
							</div>
							<div class="bottom_label bottom_referral">
								<span>台湾暖男</span><span>设计大咖</span>
							</div>
							
							
						</div>
					</div><!--pro_here end-->
		</div>
	</div>
</body>
</html>
