<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>设计师所有作品</title>
		<link rel="stylesheet" href="css/gloab.css" />
		<link rel="stylesheet" href="css/home_page.css" />
		<!--   <link rel="stylesheet" href="css/video-js.min.css" />-->
		<link rel="stylesheet" href="css/iconfont.css" />
		<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/touch-0.2.14.min.js"></script>
		<script type="text/javascript" src="js/jquery.bxslider.js"></script>
		<!--<script type="text/javascript" src="js/video.min.js" ></script>-->
		<script type="text/javascript" src="js/gloab.js"></script>
		<script type="text/javascript" src="js/home_page.js"></script>
	</head>

	<body>
		
		<div class="page_box">
			<header class="header_top iconfont icon-logo">
				<!--<input id="ipt" type="text" value="0" />-->
				<span class="top_right iconfont icon-gongneng"></span>
			</header>
			<section class="down_right">
				<ul>
					<li>
						<a href="index.html">首页</a>
					</li>
					<li>
						<a href="designer_list.html">住艺设计师</a>
					</li>
					<li>
						<a href="style_test.html">风格测试</a>
					</li>
					<li>
						<a href="designer_list.html">使用指南</a>
					</li>
					<li>
						<a href="user.html">我的住艺</a>
					</li>
					<li>
						<a href="feedback.html">意见反馈</a>
					</li>
					<li>
						<a href="login.html">退出登录</a>
					</li>
				</ul>
			</section>
			<div class="down_right_zd"></div>
				<div class="pro_box" style="top: 0;">
					<div class="pro_here">
						<div class="pro_here_bcimg iconfont icon-bofang1">
							<img class="" src="img/home_page/proc.jpg" />
						</div>
						<video id="example_video1" class="video-js vjs-default-skin" preload="none" poster="img/index/indexb.jpg">
							<source src="http://vjs.zencdn.net/v/oceans.mp4" type='video/mp4' />
						</video>
						<div class="here_botaa"></div>
						<div class="here_bottom line_center">
							软糖沙发
						</div>
					</div>
					<!--pro_here end-->

					<div class="pro_here pro_img iconfont">
						<img class="here_img" src="img/home_page/prob.jpg" />

						<div class="img_icon"><span class=" iconfont icon-tupian">8张图</span></div>
						<div class="here_botaa"></div>
						<div class="here_bottom line_center">
							偶像派质感餐厅
						</div>
					</div>
					<!--pro_here end-->

					<div class="pro_here">
						<div class="pro_here_bcimg iconfont icon-bofang1">
							<img class="" src="img/home_page/proc.jpg" />
						</div>
						<video id="example_video1" class="video-js vjs-default-skin" preload="none" poster="img/index/indexb.jpg">
							<source src="http://vjs.zencdn.net/v/oceans.mp4" type='video/mp4' />
						</video>
						<div class="here_botaa"></div>
						<div class="here_bottom line_center">
							软糖沙发
						</div>
					</div>
					<!--pro_here end-->
					<div class="pro_here">
						<div class="pro_here_bcimg iconfont icon-bofang1">
							<img class="" src="img/home_page/proc.jpg" />
						</div>
						<video id="example_video1" class="video-js vjs-default-skin" preload="none" poster="img/index/indexb.jpg">
							<source src="http://vjs.zencdn.net/v/oceans.mp4" type='video/mp4' />
						</video>
						<div class="here_botaa"></div>
						<div class="here_bottom line_center">
							软糖沙发
						</div>
					</div>
					<!--pro_here end-->
					
					<div class="pro_here">
						<div class="pro_here_bcimg iconfont icon-bofang1">
							<img class="" src="img/home_page/proc.jpg" />
						</div>
						<video id="example_video1" class="video-js vjs-default-skin" preload="none" poster="img/index/indexb.jpg">
							<source src="http://vjs.zencdn.net/v/oceans.mp4" type='video/mp4' />
						</video>
						<div class="here_botaa"></div>
						<div class="here_bottom line_center">
							软糖沙发
						</div>
					</div>
					<!--pro_here end-->
				</div>
				<!--pro_box end-->

			
		
			

		</div>
		</div>
		<!--<div class="pro_img_box">
			<div class="pro_img_zd"></div>
			<span class="pro_img_title">1/7</span>
			<ul class="bxslider">
				<li>
					<img src="img/index/indexa.jpg" title="" />
				</li>
				<li>
					<img src="img/index/indexb.jpg" title="" />
				</li>
				<li>
					<img src="img/index/indexa.jpg" title="" />
				</li>
				<li>
					<img src="img/index/indexb.jpg" title="" />
				</li>
			</ul>
		</div>-->
	</body>

</html>
<script>
$(function(){
	var designer_id = 4;
 	$.ajax({
		type:"get",
		url: "<?php echo Yii::getAlias('@web') . '/index.php?r=designer/arts';?>"+"&&params="+designer_id,
		async:true,
		success:function(data){
			console.log(data);
			var data = eval('('+decodeURI(data)+')'); 
			console.log(data);

		}
 	});
})

</script>
