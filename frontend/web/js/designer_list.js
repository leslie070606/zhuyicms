$(function(){
      
        var local_box=localStorage.getItem("zhuyi_local");
	if(local_box!=""&&local_box!=null){
		$(".designer_box").html("<ul></ul>");
		$(".designer_box ul").html(local_box);
		refresher.init({
		id:"wrapper",
		pullDownAction:Refresh,                                                            
		pullUpAction:Load 																			
		});
	}
             
        
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
