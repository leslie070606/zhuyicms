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
	<div class="des_box">
		<header class="header_top iconfont icon-logo">
			<a href="<?= 'index.php?r=designer/hunt' ?>" style="color: #ffffff;"><span class="top_left iconfont icon-sousuo"></span></a>
			<span class="top_lefta iconfont icon-shaixuan"></span>
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
				<span>景观设计师</span>
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
			
			<div class="sifting">甄选</div>
		</div>
		<div class="designer_box">
			<?php
				foreach($data as $v){
					//获取单个设计师的名字，头像，作品等信息
					$designerId		= $v['designer_id'];
					$name 			= $v['name'];
					$tag			= $v['tag'];
					$headPortrait 	= Yii::$app->request->hostInfo . $v['head_portrait'];
					$background		= $v['background'];

					$html = <<<HTML
						<div class="pro_here iconfont">
							<img class="here_img" src="$background" designer_id="$designerId"/>
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
		</div>
	</div>
</body>
</html>

<script type='text/javascript'>
touch.on(".sifting","tap",function(ev){
	var height=$(window).height();
    var get="室内设计师,beijing";
    $.ajax({
   		type: "GET",
        url: "<?php echo Yii::getAlias('@web') . '/index.php?r=designer/list';?>"+"&&params="+get,
        data: "",
        success: function(data){
        	console.log("筛选设计师...");
            console.log(data);
			$(".sousuo_box").animate({marginTop:-height},400);
        }
    })

})
$("body").on("click",".pro_here>img",function(ev){
	var designer_id = $(ev.currentTarget).attr("designer_id");
    $.ajax({
   		type: "GET",
        url: "<?php echo Yii::getAlias('@web') . '/index.php?r=designer/detail';?>"+"&&params="+designer_id,
        data: "",
        success: function(data){
        	console.log("js output...........");
            console.log(data);
			window.location.href="<?php echo Yii::getAlias('@web').'/index.php?r=designer/detail';?>"+"&&params="+designer_id;
        }
    })
});
var truefalse=true;
$(window).on("scroll",function(){
	var height=$(window).height();
	var scrrol =document.body.scrollTop;
	var heighta=$(".des_box").height();	
	var get=heighta-height-scrrol;
	
console.log(get);
	if(get<300&&truefalse){
		truefalse=false;
		var length=$(".designer_box .pro_here").length;
		
		$.ajax({
			type:"get",
			data:"",
        	url: "<?php echo Yii::getAlias('@web') . '/index.php?r=designer/list';?>"+"&&params="+length,
			async:true,
			success:function(data){
				 data = eval('('+decodeURI(data)+')');
				console.log(data);
				jiazai(data);
				truefalse=true;
			}
		});
		
									
	}
})

var yyyy=0
function jiazai(data){
	//var data=[{name:"www",biaoqian:["牛逼1","厉害1"]},{name:"www2",biaoqian:["牛逼2","厉害2"]},{name:"www3",biaoqian:["牛逼3","厉害3"]}]
	
		var length=data.length;
		for(var i=0;i<data.length;i++){
			var vtag=data[i].tag.split(",");
			var htmlabb='';
		for(var b=0;b<vtag.length;b++){
			var html="<span>"+vtag[b]+"</span>"
			htmlabb+=html;
		}
		var html='<div class="pro_here iconfont">'
						+'<img designer_id="'+data[i].designer_id+'" class="here_img" src="'+data[i].background+'" />'
						+'<div class="here_zhe"></div>'
						+'<div class="here_botaa"></div>'
						+'<div class="here_bottom line_center">'
							+'<div class="here_head">'
								+'<img src="'+data[i].head_portrait+'" />'
							+'</div>'
			
							+'<div class="bottom_name">'
								+'<span class="here_name">'+data[i].name+'</span>'
								+'<span class="here_namea">'+data[i].designer_id+'</span>'
							+'</div>'
							+'<div class="bottom_label bottom_referral">'
								+htmlabb
							+'</div>'
							
							
						+'</div>'
					+'</div>'
		$(".designer_box").append(html);
		var widthaa=$(".here_img").width();
		$(".here_img").css("height",widthaa*.56);	
		yyyy++;
	}
}
</script>
