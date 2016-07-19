$(function(){
//	$('.bxslidera').bxSlider({controls:false,auto:false,pause:5000,speed:800,gett:"user_tab",gettt:["订单","需求","收藏"]});
	widtha=$("body").width();
	//var top=$(".nac_boxa").offset().top;
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
	var indexaa;
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
	touch.on(".shanchu_box","tap",function(ev){
		$(ev.currentTarget).parents(".pro_here").remove();
	})
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
