$(function(){
	if(IsPC()){
		autoget();
	}else{
		autogeta();
	}
	
	
	window.onresize=function(){
		if(IsPC()){
		autoget();
		}else{
			autogeta();
		}
	};
	
	
	function autoget(){
	var width=$(".desib_box").width();
	var height=$("body").height();
	var get=(736/414)*width;
	var geta=(414/736)*height;
	$("body").css({"width":geta})
}
	
	function autogeta(){
	var width=$(window).width();
	var height=$(window).height();
	var get=(736/414)*width;
	$(".desib_box").css({"height":get});
	$(".desib_box").css({"margin-top":-(get-height)/2});
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
   setTimeout(function(){ 
		$("#getaa").animate({top:"-10%"},500);
	},3500);
	setTimeout(function(){ 
		$("#des_imga").animate({left:"10.9%"},400);
	},2600);
	setTimeout(function(){ 
		$(".imgtengtiao").animate({ opacity:1},400);
	},3200);
	
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
        },500); // 我这里设置的是500毫秒就扫描一次，可以自己调整
    }
}