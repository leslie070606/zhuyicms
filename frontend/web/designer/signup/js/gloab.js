var gettt=true;
$(function(){
	document.body.addEventListener('touchstart', function () { }); 
	
		auto_height();
		if($("#gloab").hasClass("pc")){
			$("#banner_vedio").attr("autoplay","autoplay");
		}
	
	var gett=0;
	var myVideo = document.getElementsByTagName('video')[0];
	$(".video_box").on("click",function(){
		if(gett==0){
			$(".bg_bc,.btn_bf").hide();
			myVideo.play();
			gett=1;
		}else{
			
			gett=0;
		}
		
	})
	
//	$(window).on("orientationchange",function(){ 
//		
//	    if(window.orientation == 0)// Portrait
//	
//	    { 
//	        //Portrait相关操作
//	$(".english_for .designer_here>div").css("padding-bottom",".4rem")
//	    }else// Landscape
//	
//	    { 
//	       $(".english_for .designer_here>div").css("padding-bottom","2rem")
//	
//	    }
//	
//	});
	
	
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
	
	var a=[0,1,2];
	var get_arr=getArrayItems(a,3);
	var new_json=[
	["img/head_1.jpg","陈喧","设计是服务业，设计师工作的核心是解决问题：解决功能的合理性，解决视觉的美感，解决心理的需求。最后可以加上一点自己对设计的具有个体性的独特的认知。"],
	["img/head_2.jpg","程艳春","建筑首先是人与环境发生关系的媒介。人，建筑，环境，这三个要素都是不能够被忽视的，所以设计在解决问题的同时，也是在协调这三者之间的关系。"],
	["img/head_3.jpg","于魁",'"住艺"的存在，推动了好的设计在社会上被接纳的效率和可能性，他的话语权和认知度关系着很多真正有水准的设计并能让更多的人享受到，应用到好的设计。']
	]
	var new_json_english=[
	["img/head_1.jpg","Xuan Chen","Design is a service, and the central role of the designer is to solve problems: problems with functionality, problems with aesthetics, and problems with psychological needs. Lastly, the designer can add to the design her own understanding and unique perspective."],
	["img/head_2.jpg","Yanchun Cheng","Architecture is most prominently a form of media between people and their environment. People, architecture, and environment form a trio of factors that cannot be ignored. Thus, when solving design problems, you are also managing the relationship between these three factors."],
	["img/head_3.jpg","Kui Yu",'Zhuyi’s existence has helped to hasten the promotion and the acceptance of truly great design in our society.  Zhuyi’s voice and stature in the design community has allowed more people to enjoy and apply truly great design.']
	]
	var html_box='';
	if($("#gloab").hasClass("english_for")){
		for(var i=0;i<get_arr.length;i++){
			var desi_html='<div class="designer_here">'
							+'<img class="head_img" src="'+new_json_english[get_arr[i]][0]+'"  /><span class="desi_name">'+new_json_english[get_arr[i]][1]+'</span><span class="maohao iconfont icon-yinhao" ></span>'
							+'<div>'+new_json_english[get_arr[i]][2]+'</div></div>';
			html_box+=desi_html;			
		}
	}else{
		for(var i=0;i<get_arr.length;i++){
			var desi_html='<div class="designer_here">'
							+'<img class="head_img" src="'+new_json[get_arr[i]][0]+'"  /><span class="desi_name">'+new_json[get_arr[i]][1]+'</span><span class="maohao iconfont icon-yinhao" ></span>'
							+'<div>'+new_json[get_arr[i]][2]+'</div></div>';
			html_box+=desi_html;			
		}
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
	$(".foin_box .foin_here").height("auto");
	$(".designer_here>div").height("auto");
	var hegitha=0;
	var hegithb=0;
	for(var i=0;i<3;i++){
		var gety=$(".foin_here:eq("+i+")").height();
		var getya=$(".designer_here:eq("+i+")>div").height();
		if(gety>hegitha){
			hegitha=gety;
		};
		if(getya>hegithb){
			hegithb=getya;
		};
		
	}
	$(".foin_box .foin_here").height(hegitha);
	$(".designer_here>div").height(hegithb);
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
		var vedio_h=$("#banner_vedio").height();
		var bcc_h=$(".banner_bc").height();
		$(".banner_bc").css("margin-top",-(bcc_h-bner)/2);
		$("#banner_vedio").css("margin-top",-(vedio_h-bner)/2);

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
			$("#gloab .video_deside").remove();
		}
}

 function BottomJumpPage() {  
            var scrollTop = $(this).scrollTop();  
            if (scrollTop == 0) {  //滚动到头部部执行事件  
  				gettt=true;
            }  
            
            
 }  