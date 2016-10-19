$(function(){
	$("body").scrollTop(0);
	document.body.addEventListener('touchmove',grrrr, false);
	function grrrr(){
    	event.preventDefault();
	}
	var time=false;
	setTimeout(function(){
		time=true;
		document.body.removeEventListener('touchmove', grrrr,false);
	},4500);
	if(IsPC()){
		autoget();
	}else{
		autogeta();
	}
	$(".logoaa").on("click",function(){
		var height=$(window).height()
		$("body").animate({scrollTop:height},500);
	});
	
	window.onresize=function(){
		if(IsPC()){
		autoget();
		}else{
			autogeta();
		}
	};
	$("body,html").bind("click",function(e){
        if($(e.target).closest(".click_m").length == 0){
           $(".sanjiao,.miaodian_text").fadeOut(200);
        }
   });
   
   touch.on("body,html", "tap", function(ev) {
		  if($(ev.target).closest(".click_m").length == 0){
           $(".sanjiao,.miaodian_text").fadeOut(200);
        }
	});
	
	$(".click_m").on("click",function(){
		if(time){
			if($(this).siblings(".sanjiao").css("display")=="none"){
				$(".sanjiao,.miaodian_text").fadeOut(200);
                                 $(".miaodian_mesng").css("z-index",24);
				$(this).parents(".miaodian_mesng").find(".sanjiao,.miaodian_text").fadeIn(200);
                               $(this).parents(".miaodian_mesng").css("z-index",1000);
			}else{
				$(this).parents(".miaodian_mesng").find(".sanjiao,.miaodian_text").fadeOut(200);
                                  $(".miaodian_mesng").css("z-index",24);
				
			}
		}
	})
	
	$(".share_btn").on("click",function(){
			if($(".btn_miaodian .sanjiao").css("display")=="none"){
				$(".sanjiao,.miaodian_text").fadeOut(200);
                                 $(".miaodian_mesng").css("z-index",24);
				$(".btn_miaodian").find(".sanjiao,.miaodian_text").fadeIn(200);
                                 $(this).parents(".miaodian_mesng").css("z-index",1000);
			}else{
				$(".btn_miaodian").find(".sanjiao,.miaodian_text").fadeOut(200);
                                 $(".miaodian_mesng").css("z-index",24);
				
			}
	})
	
	function autoget(){
	var width=$(window).width();
	var height=$(window).height();
	var get=(736/414)*width;
	var geta=(414/736)*height;
	var big_left=$(".text_big>span").width();
	$("body").css({"width":geta});
	$(".miaodiana_a .sanjiao_box").css("left",big_left+15);
}
	
	
	function autogeta(){
	var width=$(window).width();
	var height=$(window).height();
	var big_left=$(".text_big>span").width();
	var heightaa=parseInt($(".share_box_active").height());
	var heightbb=parseInt($(".gloab_bottm").css("margin-bottom"));
	var get=(736/414)*width;
	$(".desib_box").css({"height":get});
	$(".desib_box").css({"margin-top":-(get-height)/2});
	$(".miaoshu,.logo,.logoaa").css({"margin-top":(get-height)/2});
	$(".gloab_bottm").height(height-2*heightaa);
	$(".miaodiana_a .sanjiao_box").css("left",big_left+15);
}
});

function IsPC()  
		{  
		           var userAgentInfo = navigator.userAgent;  
		           var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod");  
		           var flag = true;  
		           for (var v = 0; v < Agents.length; v++) {  
		               if (userAgentInfo.indexOf(Agents[v]) > 0) { flag = false; break; }  
		           }  
		           return flag;  
		} 
		
var t_img; // 定时器
var isLoad = true; // 控制变量
 
// 判断图片加载状况，加载完成后回调
isImgLoad(function(){
   $(".desib_box").addClass("desib_box_play");
   if($("body").attr("id")=="no_flash"){
   setTimeout(function(){ 
		$("#getaa").animate({top:"-10%"},500);
	},200);
	}else{
		setTimeout(function(){ 
		$("#getaa").animate({top:"-10%"},500);
	},3500);
	}
	 if($("body").attr("id")=="no_flash"){
	 	setTimeout(function(){ 
		$("#des_imga").animate({left:"10.9%"},100);
	},100);
	 }else{
	 	setTimeout(function(){ 
		$("#des_imga").animate({left:"10.9%"},400);
	},2600);
	 }
	 if($("body").attr("id")=="no_flash"){
	 	setTimeout(function(){ 
		$(".imgtengtiao").animate({ opacity:1},100);
	},100);
	 }else{
	 	setTimeout(function(){ 
		$(".imgtengtiao").animate({ opacity:1},400);
	},3200);
	 }
	
	
});
 
// 判断图片加载的函数
function isImgLoad(callback){
    // 注意我的图片类名都是cover，因为我只需要处理cover。其它图片可以不管。
    // 查找所有封面图，迭代处理
    $('.cover').each(function(){
        // 找到为0就将isLoad设为false，并退出each
        if(this.height === 0){
            isLoad = false;
            return false;
        }
    });
    // 为true，没有发现为0的。加载完毕
    if(isLoad){
        clearTimeout(t_img); // 清除定时器
        // 回调函数
        callback();
    // 为false，因为找到了没有加载完成的图，将调用定时器递归
    }else{
        isLoad = true;
        t_img = setTimeout(function(){
            isImgLoad(callback); // 递归扫描
        },100); // 我这里设置的是500毫秒就扫描一次，可以自己调整
    }
}


function tj_ajax(a,b,c,d,e){
		$.ajax({
		type: "get",
		data: "",
		url: "http://zhuyihome.com/index.php?r=data-count-api/create/create&mtId="+a+"&mdId="+b+"&userId="+c+"&designerId="+d+"&mMark="+e+"",
		async: true,
		success: function(data) {}
	});
}