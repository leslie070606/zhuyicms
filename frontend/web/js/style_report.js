$(function(){
	var size=parseInt(parseInt($("html").css("font-size"))*1.2);
	var widtht=parseInt($("html").css("font-size"))*.08;
	$('.percentage-light').easyPieChart({
			 barColor: '#ff4e38',
      		trackColor: '#eeefef',
      		scaleColor: '#ffffef',
			scaleColor: false,
			size:size,
			lineCap: 'butt',
			lineWidth: 4,
			animate: 1000
		});
		
})
