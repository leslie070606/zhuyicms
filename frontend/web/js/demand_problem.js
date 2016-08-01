$(function(){
	var a,b,c,d,e,f,g="";
	//首页选择入口
	touch.on(".first_box .boxa_box","tap",function(ev){
		var index=$(ev.currentTarget).index();
		$(ev.currentTarget).addClass("activeaa");
		if(index==1){
			$(".first_box").hide();
		}
	});
	
	var nuber=0;
	//点击展开
	touch.on(".other_box","tap",function(ev){
		if($(ev.currentTarget).next(".other_box2").css("display")=="none"){
		$(ev.currentTarget).next(".other_box2").show();
		$(ev.currentTarget).find(">span").html("-");
		}else{
			$(ev.currentTarget).next(".other_box2").hide();
			$(ev.currentTarget).find(">span").html("+");
		}
	});
	//提交按钮
	touch.on(".tj_btn","tap",function(ev){
		if($(ev.currentTarget).parent().hasClass("true_btn")){
			var demand={dem1:a,dem2:b,dem3:c,dem4:d,dem5:e,dem6:f,dem7:g};
			var gerr=JSON.stringify(demand); 
			localStorage.usermesg=gerr;
//			localStorage.removeItem("c")
			window.location.href="submit.html?id=aaaa";	
//			$.ajax({
//				type:"post",
//				data:demand,
//				url:"",
//				async:true,
//				success:function(data){
//					window.location.href="submit.html;	
//				}
//			});
		}else{
			 return false;
		}
		
	});
	
	//下一步点击事件
	touch.on(".bot_btn_box .next_btn","tap",function(){
		if($(".bot_btn_box").hasClass("true_btn")){
			var index=$(".demand_big>.active").index()+1;
			$(".demand_big>div:eq("+index+")").addClass("active").siblings().removeClass("active");
			if(index>=nuber){
				$(".bot_btn_box").removeClass("true_btn");
			}else{
				$(".bot_btn_box").addClass("true_btn");
			}
//			if(index==4){
//				$(".bot_btn_box").addClass("true_btn");
//			}
			if(index>=1&&index<6){
				
				$(".bot_btn_box").addClass("center_btn").removeClass("first_btn");
			}else{
				$(".bot_btn_box").addClass("last_btn").removeClass("center_btn");
			};
		}
	});
	//上一步点击事件
	var grttt=true;
	touch.on(".bot_btn_box .prev_btn","tap",function(){
		var index=$(".demand_big>.active").index()-1;
		if(nuber<=index+1&&$(".bot_btn_box").hasClass("true_btn")){
			grttt=true;
		}
		if(nuber<=index){
			nuber=index+1;
		}
		
		if($(".bot_btn_box").hasClass("true_btn")&&grttt){
				nuber+=1;
				grttt=false;
			}
	
		$(".demand_big>div:eq("+index+")").addClass("active").siblings().removeClass("active");
		$(".bot_btn_box").addClass("true_btn");
		if(index==0){
			$(".bot_btn_box").addClass("first_btn").removeClass("center_btn last_btn")
		}
		if(index>1&&index<6){
				$(".bot_btn_box").addClass("center_btn").removeClass("first_btn last_btn");
			}else if(index>=6){
				$(".bot_btn_box").addClass("last_btn").removeClass("center_btn first_btn");
			};
	});
	
	
	//第一题逻辑	
	touch.on(".here_1 .dem_where>span","tap",function(ev){
		if($(ev.currentTarget).hasClass("active")){
			$(ev.currentTarget).removeClass("active");
			$(".bot_btn_box").removeClass("true_btn");
		}else{
			$(ev.currentTarget).addClass("active").siblings().removeClass("active");
			$(".bot_btn_box").addClass("true_btn");
			$(".here_1 .dema_ipt").val("");
			a=$(ev.currentTarget).html();
		}
	});
	$(".here_1 .dema_ipt").change(function(){
		if($(this).val()!=''){
		$(".here_1 .dem_where .active").removeClass("active");
		$(".bot_btn_box").addClass("true_btn");
		a=$(this).val();
		}else if($(this).val()==''&&$(".here_1 .dem_where .active").length==0){
			$(".bot_btn_box").removeClass("true_btn");
		}
	});
	
	
	//第2题逻辑	
	touch.on(".here_2 .fx_here","tap",function(ev){
		if($(ev.currentTarget).hasClass("active")){
			$(ev.currentTarget).removeClass("active");
			$(".bot_btn_box").removeClass("true_btn");
		}else{
			$(ev.currentTarget).addClass("active").siblings().removeClass("active");
			$(".bot_btn_box").addClass("true_btn");
			$(".here_2 .dema_ipt").val("");
			b=$(ev.currentTarget).find(">span").html();
		}
		
		
	});
	$(".here_2 .dema_ipt").change(function(){
		if($(this).val()!=''){
		$(".here_2 .fx_box .active").removeClass("active");
		$(".bot_btn_box").addClass("true_btn");
		b=$(this).val();
		}else if($(this).val()==''&&$(".here_2 .dem_where .active").length==0){
			$(".bot_btn_box").removeClass("true_btn");
		}
	});
	//第三题逻辑
	$(".here_3 .dema_ipt").change(function(){
		var val1=$(".here_3 .three_ipt").val();
		var val2=$(".here_3 .three_ipta").val();
		if(val1!=""&&val2!=""){
			$(".bot_btn_box").addClass("true_btn");
			c=val1+"#"+val2;
		}else{
			$(".bot_btn_box").removeClass("true_btn");
		}
	});
	//第四题逻辑
	touch.on(".here_4 .four_box>div","tap",function(ev){
		if($(ev.currentTarget).hasClass("active")){
			$(ev.currentTarget).removeClass("active");
			$(".bot_btn_box").removeClass("true_btn");
		}else{
			$(ev.currentTarget).addClass("active").siblings().removeClass("active");
			$(".bot_btn_box").addClass("true_btn");
			$(".here_4 .dema_ipt").val("");
			d=$(ev.currentTarget).html();
		}
	});
	$(".here_4 .dema_ipt").change(function(){
		if($(this).val()!=''){
			$(".here_4 .four_box .active").removeClass("active");
			$(".bot_btn_box").addClass("true_btn");
			d=$(this).val();
		}else if($(this).val()==''&&$(".here_4 .four_box .active").length==0){
			$(".bot_btn_box").removeClass("true_btn");
		}
	});
	//第5题逻辑


	touch.on(".last_five","tap",function(ev){
		if($(ev.currentTarget).hasClass("active")){
			$(ev.currentTarget).removeClass("active");
			if($(".five_box>.active").length==0){
				$(".bot_btn_box").removeClass("true_btn");
			}else{
				$(".bot_btn_box").addClass("true_btn");
				
			}
			if($(".five_box .active").index()==1){
				$("#sgdj").show();
			}else{
				$("#sgdj").hide();
			}
		}else{
			$(ev.currentTarget).addClass("active").siblings().removeClass("active");
			e=$(ev.currentTarget).find(">span").html();
			if($(".five_box>.active").length==0){
				$(".bot_btn_box").removeClass("true_btn");
			}else{
				$(".bot_btn_box").addClass("true_btn");
			}
			if($(".five_box .active").index()==1){
				$("#sgdj").show();
			}else{
				$("#sgdj").hide();
			}
		}
		
	});
	//第六页逻辑
	$(".here_6 .dema_ipt").focus(function(){
		$(".bot_btn_box").addClass("true_btn");
	}).blur(function(){
		if($(this).val()==""){
			$(".bot_btn_box").removeClass("true_btn");
		}else{
			f=$(this).val();
		}
		
	})

	//第7页逻辑
	touch.on(".seven_box .seven_here","tap",function(ev){
		if($(ev.currentTarget).hasClass("active")){
			$(ev.currentTarget).removeClass("active");
			$(".bot_btn_box").removeClass("true_btn");
		}else{
			$(ev.currentTarget).addClass("active").siblings().removeClass("active");
			$(".bot_btn_box").addClass("true_btn");
			g=$(ev.currentTarget).find(".seven_spa").html();
			
		}
		
	})
	
	//时间选择器逻辑
	touch.on(".select_box_a .time_here","tap",function(ev){
		if($(ev.currentTarget).hasClass("active")){
			$(ev.currentTarget).removeClass("active");
			var length=$(".select_box_a .active").length;
			if(length==0&&$(".select_box_a .dema_ipt").val()==""){
				$(".chose_btn").removeClass("yes_btn");
			}
		}else{
				$(ev.currentTarget).addClass("active");
			var length=$(".select_box_a .active").length;
				if(length>0||$(".select_box_a .dema_ipt").val()!=""){
					$(".chose_btn").addClass("yes_btn");
				}else if(length==0&&$(".select_box_a .dema_ipt").val()==""){
					$(".chose_btn").removeClass("yes_btn");
				}
		}
		
	});
	$(".select_box_a .dema_ipt").change(function(){
		var length=$(".select_box_a .active").length;
				if(length==0&&$(".select_box_a .dema_ipt").val()==""){
					$(".chose_btn").removeClass("yes_btn");
				}else{
					$(".chose_btn").addClass("yes_btn");
				}
	});
});
