$(function(){
//	$('.bxslidera').bxSlider({controls:false,auto:false,pause:5000,speed:800,gett:"user_tab",gettt:["订单","需求","收藏"]});
	widtha=$("body").width();
	var top=$(".nac_boxa").offset().top;
	var topa=$(".header_top").height();
	touch.on("body","touchmove",function(){
		auto();
	});
//	//统计圆环
//	var size=parseInt(parseInt($("html").css("font-size"))*1.2);
//		var widtht=parseInt($("html").css("font-size"))*.08;
//		$('.percentage-light').easyPieChart({
//				 barColor: '#ff4e38',
//	      		trackColor: '#eeefef',
//	      		scaleColor: '#ffffef',
//				scaleColor: false,
//				size:size,
//				lineCap: 'butt',
//				lineWidth: 4,
//				animate: 1000
//	});	
	
	//标题点击事件
	var indexaa;
	var index=7;
	var htmll="";
	function duang(){
		$("#nav_box").animate({left:-widtha*indexaa},400,function(){
				if(indexaa==2&&index==7){
				$.ajax({
				type:"get",
				url:"",
				async:true,
				success:function(data){
					data=[{"designer_id":"11","name":"lelly","tag":"hongkong,111","head_portrait":"img\/home_page\/banner_head.jpg","background":"img\/home_page\/1.jpg","redirect_url":"\/index.php?r=disigner\/index&&params=11"},{"designer_id":"11","name":"lelly","tag":"hongkong","head_portrait":"img\/home_page\/banner_head.jpg","background":"img\/home_page\/1.jpg","redirect_url":"\/index.php?r=disigner\/index&&params=11"}];
					var htmlaa='';
					for(var i=0;i<data.length;i++){
						var gett=data[i].tag;
						if(gett.indexOf(",")<0){
							htmlaa='<span>'+data[i].tag+'</span>';
						}else{
							gett=gett.split(",");
							for(var a=0;a<gett.length;a++){
								var hah='<span>'+gett[a]+'</span>'
								htmlaa+=hah;
							}
						}
						var html='<div class="pro_here iconfont">'
							+'<a href="'+data[i].redirect_url+'"><img class="here_img" src="'+data[i].background+'" /></a>'
							+'<span class="shanchu_box"><i class="iconfont icon-shanchu1"></i></span>'
							+'<div class="here_zhe"></div>'
							+'<div class="here_botaa"></div>'
							+'<div class="here_bottom line_center">'
								+'<div class="here_head">'
									+'<img src="'+data[i].head_portrait+'" />'
								+'</div>'
								+'<div class="bottom_name">'
									+'<span class="here_name">'+data[i].name+'</span>'
									+'<span class="here_namea">暂缺数据</span>'
								+'</div>'
								+'<div class="bottom_label bottom_referral">'+htmlaa+'</div>'
							+'</div>'
						+'</div>'
						$(".collect").append(html);
						index++;
					}
					$(".loading_box").hide();
				}
				});
			}
			
			
		});
		$(".nac_boxa>span:eq("+indexaa+")").addClass("active").siblings().removeClass("active");
	}
	
	touch.on(".nac_boxa>span","tap",function(ev){
		indexaa=$(ev.currentTarget).index();
		duang();
		
		
	});
	
	
//	$(".collect").ajaxStop(function(){
//		alert("22222")
// 	
// 	setTimeout(function(){
// 		var heighttt=$("#nav_box>li:eq("+indexaa+")").css("height");
//			$("#nav_box").css("height",heighttt);
// 	},10)
//	});


//	//左右滑动事件
//	touch.on("#nav_box","swipeleft",function(){
//		if(indexaa<2){
//			indexaa++;
//			duang();
//		}
//	});
//	touch.on("#nav_box","swiperight",function(){
//		if(indexaa>0){
//			indexaa--;
//			duang();
//		}
//	});
	
	//帮助按钮
	$(document).on("click",".shanchu_box",function(){
		var _this=$(this);
			_this.parents(".iconfont").remove();
		$.ajax({
				type:"get",
				url:"",
				async:true,
				success:function(data){
					
				
				}
		});
	});
	touch.on(".help_btn","tap",function(ev){
		if($(".help_bot_zd").css("display")=="none"){
			$(".help_bot_zd").show().animate({opacity:.5},300);
			$(".iphone_btn").show().animate({top:"-1.68rem"},300);
			$(".bot_btn").show().animate({top:"-2.96rem"},300);
		}else{
			$(".iphone_btn").animate({top:0},300);
			$(".bot_btn").animate({top:0},300);
			$(".help_bot_zd").animate({opacity:.5},300,function(){
				$(".help_bot_zd,.bot_btn,.iphone_btn").hide();
			});
		}
		
	})
	touch.on(".help_bot_zd","tap",function(ev){
		$(".iphone_btn").animate({top:0},300);
			$(".bot_btn").animate({top:0},300);
			$(".help_bot_zd").animate({opacity:.5},300,function(){
				$(".help_bot_zd,.bot_btn,.iphone_btn").hide();
			});
		
	});
	
	function auto(){
		var scrtop=document.body.scrollTop;
		if(scrtop>=top-topa){
			$(".nac_boxa").addClass("fixed_top");
		}else{
			$(".nac_boxa").removeClass("fixed_top");
		}
	}
	//已見面后選擇是否深度合作
	touch.on(".queren_btn .true_btnaa","tap",function(ev){
		var _this=$(this).parents(".zy_pp");
		$.ajax({
			type: "get",
			url: "",
			async: true,
			success: function(data) {
				_this.find(".right_type").html("已深度合作");
				_this.find(".jm_money,.time").remove();
				_this.find(".queren_btn").html('<span class="true_btnb hetong">上传合同</span>').addClass(".hetong_btn")
			}
		});
	});
	
	touch.on(".queren_btn .true_btna","tap",function(ev){
		var _this=$(this).parents(".zy_pp");
		$.ajax({
			type: "get",
			url: "",
			async: true,
			success: function(data) {
				var html='<span class="ooo_spa ">已见面</span><span class="ooo_spb">未深度合作</span>'
				_this.find(".right_type").html(html).addClass("color_ccca");
				_this.find(".tj_box").remove();
				_this.find(".queren_btn").remove();
			}
		});
	});
	
	//空白页面居中
		$(".Blank_Page").each(function(){
			var tishia=$(this).parent().siblings(".tishi").height();
		var height=$(window).height()-$("#user_box").height()-tishia-$(".header_top").height()*2;
		var heighta=(height-$(this).find(">span").height())/2;
		$(this).css("height",height);
		$(this).find(">span").css("marginTop",heighta)
	});
//	 document.body.addEventListener('touchmove', function(event) {
//      event.preventDefault();
//   }, false);
 touch.on(".true_btn","tap",function(ev){
 	$(ev.currentTarget).parents(".zy_pp").addClass("foin_zy").siblings().removeClass("foin_zy");
 });

var currYear = (new Date()).getFullYear();	
			var opt={};
			opt.date = {preset : 'date'};
			opt.datetime = {preset : 'datetime'};
			opt.time = {preset : 'time'};
			opt.default = {
				theme: 'android-ics light', //皮肤样式
		        display: 'modal', //显示方式 
		        mode: 'scroller', //日期选择模式
				dateFormat: 'yyyy-mm-dd',
				lang: 'zh',
				showNow: true,
				nowText: "今天",
				stepMinute: 30,
		        startYear: currYear - 10, //开始年份
		        endYear: currYear + 10, //结束年份
		        get:["7月4号","7月2号","7月3号"]
			};
		  	var optTime = $.extend(opt['time'], opt['default'],{get:["7月6号","7月2号","7月3号"]});
		    $(".true_btn").mobiscroll(optTime).time(optTime);
		    
});
