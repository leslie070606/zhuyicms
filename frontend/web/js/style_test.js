$(function () {

//	var height=$(window).height()-$(".header_top").height();
//	$(".style_here>div").css("height",height*0.28);
    var data = [];
    var nuberrr = 1;
    touch.on("#chose_style>div", "tap", function (ev) {
        var length = $("#chose_style .active").length;
        if ($(ev.currentTarget).hasClass("active")) {
            $(ev.currentTarget).removeClass("active")
        } else {

            if (length < 3) {
                $(ev.currentTarget).addClass("active")
            } else {
                return false;
            }


        }
        var lengtha = $("#chose_style .active").length;
        if (lengtha > 0) {
            $(".chose_btn").addClass("checkbox");
        } else {
            $(".chose_btn").removeClass("checkbox");
        }
    });

    touch.on(".style_here>div", "tap", function (ev) {
        var nuber = $(this).parents(".style_here").find(".foin").length;
        var index = $(this).parents(".style_here").index(".style_here") + 1;
        if (nuber <= 0) {
            $(this).parent(".here_div").addClass("foin");
            setTimeout(function () {
                $("body").scrollTop(0);
                $(".style_box>.style_here:eq(" + index + ")").addClass("active").siblings().removeClass("active");
                if (nuberrr <= 9) {
                    nuberrr++;
                } else {
                    $(".style_box .foin").each(function () {
                        var get = $(this).attr("tetel").split("a");
                        data = $.merge(data, get);
                    });
//				console.log(data);
                    get(data);
                }
                ;
            }, 400);

        } else {
            return false;
        }
    });
});
function get(str) {
    var array = str;
    var filter = [];
    var result = [];
    var showbox = [];
    var get = function (str, tar, arr, tmp) {
        if (str.indexOf(tar) >= 0) {
            tmp = str.slice(str.indexOf(tar) + 1);
            arr.push(tar);
            get(tmp, tar, arr, tmp);
        }
        return arr;
    }
    for (i in array) {
        var elm = [];
        var tmp;
        var fstr = filter.join();
        if (fstr.indexOf(array[i]) >= 0)
            continue;
        else {
            var tmp_arr = get(str, array[i], elm, tmp);
            result.push(tmp_arr.length + ':' + tmp_arr[0]);
            filter.push(array[i]);
        }
    }
    result.sort();
    result.reverse();

    for (index in result) {
        var show = result[index].split(':');
//	var gerrt=index==0?show[1]:show[1];
        showbox.push(show)
    }
    var newdata = showbox.slice(0, 3);
    var style_data = ["极简", "工业", "北欧", "折中", "日式", "美式", "Art Deco", "欧式古典", "地中海/乡村", "中式"];
    var style_aaa = [];
    for (var i = 0; i < newdata.length; i++) {
        var bhu = newdata[i][1] - 1;
        var gerr = style_data[bhu];
        newdata[i][1] = gerr;
//			style_aaa.push(gerr);
    }
    console.log(newdata);
    var str = newdata.toString();
    alert(str);
    window.location.href = 'style_report.html?baseline_id=' + str + '';

//	$.ajax({
//		data:newdata,
//		type:"post",
//		url:"",
//		async:true
//	});

}
