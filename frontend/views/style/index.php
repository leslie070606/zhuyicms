
<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" href="http://at.alicdn.com/t/font_1476711409_6625533.css" />
		<title>风格测试</title>
		<link rel="stylesheet" type="text/css" href="css/gloaba.css" />
		<style>
			.gloab { position: relative; text-align: center; width: 100%; height: 100%;  overflow: hidden;}
			.gloab_btn { background: #ff4e38; font-size: .26rem; position: absolute; width:92% ; left: 4%; bottom:.3rem; height: .88rem;}
			.gloab_btn a { display: block; text-align: center; color: #FFFFFF; line-height: .88rem;}
			.index_bottom_text { text-align: left; position: absolute; left: 0; bottom:1.78rem; font-size: .24rem; color: #999999; width: 92%; margin: 0 4%;}
			.logoa { font-size: 1.6rem; color: #FF4E38;  position: relative; top: .3rem; z-index: 99;}
			.index_img { width: 100%; position: absolute; width: 100%; bottom: 3.5rem; left: 0;}
		</style>
		
	</head>
	<body>
		<div class="gloab desib_box">
			<span class="iconfont logoa icon-logo01"></span>
			<img class="index_img" src="img/fengge/shouye.png"/>
			<div class="index_bottom_text">
                            在某种程度上，家就等于你。然而，工业风、波西米亚、复古混搭、美式... 或许你一直不太清楚这些风格有什么样的意义
<br><br>1分钟，完成这14道测试题 通过住艺的洞察和判断 找到最适合你的家居风格
                        </div>
			<span class="gloab_btn"><a href="<?php echo Url::toRoute(['/style/problem','link_id'=>$link_id]);?>">开始测试</a></span>
		</div>
	</body>
</html>
