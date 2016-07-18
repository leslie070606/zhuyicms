$(function(){
	var get=0;
	var height=$(window).height();
	var heighta=$(window).height()-$(".header_top").height()
	$(".sousuo_box").css({"height":heighta,"marginTop":-height});
	touch.on(".top_lefta","tap",function(ev){
		if($(".sousuo_box").hasClass("down")){
			$(".sousuo_box").removeClass("down");
			$(".sousuo_box").animate({marginTop:-height},400);
			
		}else{
			$(".sousuo_box").animate({marginTop:0},400);
			$(".sousuo_box").addClass("down");
			$('body').css("overflow","hidden")
		}
	})
	
	touch.on(".xiala_sp","tap",function(ev){
		if(get==0){
			$(".xiala_ul").animate({height:"2.64rem"},400);
			get++;
		}else{
			$(".xiala_ul").animate({height:"0rem"},400);
			get--;
		}
	})
	touch.on(".xiala_ul li","tap",function(ev){
		var html=$(this).html();
//		$(this).addClass("active").siblings().removeClass("active");
		$(".xiala_ul").animate({height:"0rem"},400);
		$(".xiala_sp").val(html);
		get--;
	})
	touch.on(".sousuo_tab span","tap",function(ev){
		if($(this).hasClass("active")){
			$(this).removeClass("active");
			
		}else{
				$(this).addClass("active").siblings().removeClass("active");
		}
	});
	$(window).on("scroll",function(){
				var scrrol =document.body.scrollTop;
		var heighta=$(".des_box").height();	
		var get=heighta-height-scrrol;
		var newdata=[11,10]
		if(get<300){
			$.ajax({
				type:"get",
				data:newdata,
				url:"",
				async:true,
				success:function(data){
					alert("111")
					jiazai(data);
				}
			});
			
										
		}
	})
//		touch.on("body","swipeup",function(ev){
//		var scrrol =document.body.scrollTop;
//		var heighta=$(".des_box").height();	
//		var get=heighta-height-scrrol;
//		if(get<200){
//			alert("我要刷新了哦")
//		}
//		
//	});	
//		touch.on("body","swipedown",function(ev){
//		var scrrol =document.body.scrollTop;
//
//		 $("#ipt").val(scrrol);
//		});	
});
var yyyy=0
function jiazai(data){
	var data=[{name:"www",biaoqian:["牛逼1","厉害1"]},{name:"www2",biaoqian:["牛逼2","厉害2"]},{name:"www3",biaoqian:["牛逼3","厉害3"]}]
	
	for(var i=0;i<data.length;i++){
		var html='<div class="pro_here iconfont">'
						+'<a href="home_page.html">'
						+'<img class="here_img" src="img/home_page/1.jpg" />'
						+'</a>'
						+'<div class="here_zhe"></div>'
						+'<div class="here_botaa"></div>'
						+'<div class="here_bottom line_center">'
							+'<div class="here_head">'
								+'<img src="img/home_page/1.jpg" />'
							+'</div>'
			
							+'<div class="bottom_name">'
								+'<span class="here_name">'+data[i].name+'</span>'
							+'</div>'
							+'<div class="bottom_label bottom_referral">'
								+'<span>'+data[i].biaoqian[0]+'</span>'
								+'<span>'+data[i].biaoqian[1]+'</span>'
							+'</div>'
							
							
						+'</div>'
					+'</div>'
		console.log(yyyy)
		$(".designer_box").append(html);
		yyyy++;
		
	}
}
