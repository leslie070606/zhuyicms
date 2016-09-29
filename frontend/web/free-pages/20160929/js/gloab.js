var gettt=true;
$(function(){
	setTimeout(function(){auto_height();},10);
	var gett=0;
	var myVideo = document.getElementsByTagName('video')[0];
	$(".video_box").on("click",function(){
		if(gett==0){
			$(".bg_bc,.btn_bf").hide();
			myVideo.play();
			gett=1;
		}else{
			$(".bg_bc,.btn_bf").show();
			myVideo.pause();
			gett=0;
		}
		
	})
	window.onresize=function(){
		auto_height();
	}
//	window.onscroll=function(){
//		if($("#gloab").hasClass("pc")){
//			BottomJumpPage();
//		    var beforeScrollTop = document.body.scrollTop,  
//		        fn = fn || function() {};  
//		    window.addEventListener("scroll", function() {  
//		        var afterScrollTop = document.body.scrollTop,  
//		            delta = afterScrollTop - beforeScrollTop;  
//		        if( delta === 0 ) return false; 
//		        if(delta>20){
//		        	
//			        	 if(gettt){
//			        	 	var height=$(window).height();
//					        $('body,html').animate({ scrollTop: height }, 300,"linear");
//					        gettt=false;
//					        return false;
//				        }
//		        }else{
//		        	return false;
//		        }
//		        beforeScrollTop = afterScrollTop;  
//		    }, false);  
//		  
//		}
//	}
//	
	var n=0;
	$(".btn_bf").on("click",function(){
		if(n==0){
			$('video').trigger('play');
			n=1;
		}else{
			$('video').trigger('pause');
			n=0;
		}
	})
	var a=[0,1,2,3,4,5,6,7,8,9];
	var get_arr=getArrayItems(a,3);
	var new_json=[
	["img/head_1.png","陈喧1","眼看到陈暄，你很难将眼前这位身材娇小，长发披肩的柔弱女生与建筑师 这个身份联系在一起。 人在选择进入美术馆的那一刹那， 他长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建"],
	["img/head_2.png","陈喧2","眼看到陈暄，你很难将眼前这位身材娇小，长发披肩的柔弱女生与建筑师 这个身份联系在一起。 人在选择进入美术馆的那一刹那， 他长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建"],
	["img/head_3.png","陈喧3","眼看到陈暄，你很难将眼前这位身材娇小，长发披肩的柔弱女生与建筑师 这个身份联系在一起。 人在选择进入美术馆的那一刹那， 他长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建"],
	["img/head_1.png","陈喧4","眼看到陈暄，你很难将眼前这位身材娇小，长发披肩的柔弱女生与建筑师 这个身份联系在一起。 人在选择进入美术馆的那一刹那， 他长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建"],
	["img/head_2.png","陈喧5","眼看到陈暄，你很难将眼前这位身材娇小，长发披肩的柔弱女生与建筑师 这个身份联系在一起。 人在选择进入美术馆的那一刹那， 他长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建"],
	["img/head_3.png","陈喧6","眼看到陈暄，你很难将眼前这位身材娇小，长发披肩的柔弱女生与建筑师 这个身份联系在一起。 人在选择进入美术馆的那一刹那， 他长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建"],
	["img/head_1.png","陈喧7","眼看到陈暄，你很难将眼前这位身材娇小，长发披肩的柔弱女生与建筑师 这个身份联系在一起。 人在选择进入美术馆的那一刹那， 他长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建"],
	["img/head_2.png","陈喧8","眼看到陈暄，你很难将眼前这位身材娇小，长发披肩的柔弱女生与建筑师 这个身份联系在一起。 人在选择进入美术馆的那一刹那， 他长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建"],
	["img/head_2.png","陈喧8","眼看到陈暄，你很难将眼前这位身材娇小，长发披肩的柔弱女生与建筑师 这个身份联系在一起。 人在选择进入美术馆的那一刹那， 他长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建"],
	["img/head_3.png","陈喧9","眼看到陈暄，你很难将眼前这位身材娇小，长发披肩的柔弱女生与建筑师 这个身份联系在一起。 人在选择进入美术馆的那一刹那， 他长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建长发披肩的柔弱女生与建"]]
	var html_box='';
	for(var i=0;i<get_arr.length;i++){
		var desi_html='<div class="designer_here">'
						+'<img class="head_img" src="'+new_json[get_arr[i]][0]+'"  /><span class="desi_name">'+new_json[get_arr[i]][1]+'</span><span class="maohao iconfont icon-yinhao" ></span>'
						+'<div>'+new_json[get_arr[i]][2]+'</div></div>';
		html_box+=desi_html;			
	}
	$(".designer_box").html(html_box);
});

function getArrayItems(arr, num) {
	
    //新建一个数组,将传入的数组复制过来,用于运算,而不要直接操作传入的数组;
    var temp_array = new Array();
    for (var index in arr) {
        temp_array.push(arr[index]);
    }
    //取出的数值项,保存在此数组
    var return_array = new Array();
    for (var i = 0; i<num; i++) {
        //判断如果数组还有可以取出的元素,以防下标越界
        if (temp_array.length>0) {
            //在数组中产生一个随机索引
            var arrIndex = Math.floor(Math.random()*temp_array.length);
            //将此随机索引的对应的数组元素值复制出来
            return_array[i] = temp_array[arrIndex];
            //然后删掉此索引的数组元素,这时候temp_array变为新的数组
            temp_array.splice(arrIndex, 1);
        } else {
            //数组中数据项取完后,退出循环,比如数组本来只有10项,但要求取出20项.
            break;
        }
    }
    return return_array;
  
}

function auto_height(){
	jiance();
	var window_height=$(window).height();
	var window_heighta=document.body.offsetHeight;
	var banner_height=$(".banner_center").height();
	var nav_here=$(".nav_here").height();
	var body_width=$(window).width();
	if(body_width>580){
		var shengyu=(window_height-banner_height-nav_here)/4;
		if(shengyu>0){
	//		$(".banner .language").css("margin-top",-shengyu);
			$(".center_nav,.banner_center").css({"padding-top":shengyu,"padding-bottom":shengyu});
		}
		var bner=$(".banner").height();
		var bg_h=$(".banner_bc").height();
		$(".banner_bc").css("margin-top",-(bg_h-bner)/2);
		
		$(".vedio_box").css("height","8.865rem");
	}else{
		var widtha=$(".vedio_box").width();
		$(".vedio_box").css("height",0.5625*widtha);
	}
}

function jiance(){
	var system ={
		win : false,
		mac : false,
		xll : false
		};
		//检测平台
		var p = navigator.platform;
		system.win = p.indexOf("Win") == 0;
		system.mac = p.indexOf("Mac") == 0;
		system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);
		//跳转语句，如果是手机访问就自动跳转到wap.baidu.com页面
		if(system.win||system.mac||system.xll){
			$("#gloab").addClass("pc").removeClass("iphone");
		}else{
			$("#gloab").addClass("iphone").removeClass("pc");
		}
}

 function BottomJumpPage() {  
            var scrollTop = $(this).scrollTop();  
            if (scrollTop == 0) {  //滚动到头部部执行事件  
  				gettt=true;
            }  
            
            
 }  