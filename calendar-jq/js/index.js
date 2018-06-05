today = new Date();
year = today.getFullYear();
month = today.getMonth() + 1;
day = today.getDate();
weak = today.getDay();
function judge(year, month) {
    //1为31天大月，2为28天或29天平月，3为30天小月；
    if (month == 1 || month == 3 || month == 5 || month == 7 || month == 8 || month == 10 || month == 12) {
        return 31;
    }
    else if (month == 2) {
        if (year % 4 != 0) {
            return 28;
        }
        else {
            if (year % 100 == 0 && year % 400 != 0) {
                return 28;
            }
            else {
                return 29;
            }
        }
    }
    else {
        return 30;
    }
}
function onload(date) {
    date.setDate(1);
    var month = date.getMonth() + 1;
    var firstweak = date.getDay();
    $(".row").children().empty();
    var lastmonth = judge(year, month - 1);
    var nextmonth = judge(year, month + 1);
    var thismonth = judge(year, month);
    for (i = lastmonth, j = firstweak - 1; j >= 0; j-- , i--) {
        $(".row").children().eq(j).append(i);
    }
    for (i = 1, j = firstweak; i <= thismonth; i++ , j++) {
        $(".row").children().eq(j).append(i);
    }
    for (i = 1; j <= 35; j++ , i++) {
        $(".row").children().eq(j).append(i);
    }
    /*$(".right-header").empty();
    $(".right-header").append(year + " 年 " + month + " 月 " + day + " 日 ");*/
}
function thenextyear() {
    $(".thenextyear").click(function () {
        year++;
        today.setFullYear(year);
        onload(today);
        $(".chooseyear").val(year);
        $("td").css("background", "rgb(36, 36, 36)");
        $("td").css("color", "white")
    })
}
function thelastyear() {
    $(".thelastyear").click(function () {
        year--;
        today.setFullYear(year);
        onload(today);
        $(".chooseyear").val(year);
        $("td").css("background", "rgb(36, 36, 36)");
        $("td").css("color", "white")
    })
}
function thenextmonth() {
    $(".thenextmonth").click(function () {
        if ($(".choosemonth").val() == 12) {
            month = 1;
        }
        else {
            month++;
        }
        $(".choosemonth").val(month);
        today.setMonth(month - 1);
        onload(today);
        $("td").css("background", "rgb(36, 36, 36)");
        $("td").css("color", "white")
    })
}
function thelastmonth() {
    $(".thelastmonth").click(function () {
        if ($(".choosemonth").val() == 1) {
            month = 12;
        }
        else {
            month--;
        }
        $(".choosemonth").val(month);
        today.setMonth(month - 1);
        onload(today);
        $("td").css("background", "rgb(36, 36, 36)");
        $("td").css("color", "white")
    })
}
function returntoday() {
    $(".returntoday").click(function () {
        today = new Date();
        year = today.getFullYear();
        month = today.getMonth() + 1;
        onload(today);
        $(".chooseyear").val(year);
        $(".choosemonth").val(month);
        showday(year, month, day);

        for (i = 1; i < 6; i++) {
            for (j = 0; j < 7; j++) {
                if ($("tr").eq(i).children().eq(j).text() == day) {
                    $("td").css("background", "rgb(36, 36, 36)");
                    $("td").css("color", "white");
                    $("tr").eq(i).children().eq(j).css("background", "rgb(239, 68, 119)");
                    $("tr").eq(i).children().eq(j).css("color", "black");
                }
            }
        }
    })
}
function first() {
    $(".chooseyear").val(year);
    $(".choosemonth").val(month);

    for (i = 1; i < 6; i++) {
        for (j = 0; j < 7; j++) {
            if ($("tr").eq(i).children().eq(j).text() == day) {
                $("tr").eq(i).children().eq(j).css("background", "rgb(239, 68, 119)");
                $("tr").eq(i).children().eq(j).css("color", "black");
            }
        }
    }
}
function clickday() {
    $(".row").children().click(function () {
        var thisday = $(this).text();
        var num = $(this).parent().index();
        var thismonth = month;

        if (num == 1 && thisday > 25) {
            thismonth--;
        }
        else if (num == 5 && thisday < 7) {
            thismonth++;
        }
        showday(year, thismonth, thisday);
        $("td").css("background", "rgb(36, 36, 36)");
        $("td").css("color", "white")
        $(this).css("background", "rgb(239, 68, 119)");
        $(this).css("color", "black");
    })
}
function showday(year, month, day) {
    $(".right-header").empty();
    $(".right-day").empty();
    $(".right-header").append(year + " 年 " + month + " 月 " + day + " 日 ");
    var today = new Date();
    today.setFullYear(year, month - 1, day);
    var weak = today.getDay();
    $(".right-day").append(day);
    if (weak == 0) {
        $(".right-header").append("星期日");
    }
    else if (weak == 1) {
        $(".right-header").append("星期一");
    }
    else if (weak == 2) {
        $(".right-header").append("星期二");
    }
    else if (weak == 3) {
        $(".right-header").append("星期三");
    }
    else if (weak == 4) {
        $(".right-header").append("星期四");
    }
    else if (weak == 5) {
        $(".right-header").append("星期五");
    }
    else {
        $(".right-header").append("星期六");
    }
}
function slide() {
    $("body").on('touchstart', function (e) {
        //touchstart事件
        var $tb = $(this);
        var startX = e.touches[0].clientX,//手指触碰屏幕的x坐标
            pullDeltaX = 0;
        $tb.on('touchmove', function (e) {
            //touchmove事件
            var x = e.touches[0].clientX;//手指移动后所在的坐标
            pullDeltaX = x - startX;//移动后的位移
            if (!pullDeltaX) {
                return;
            }
            e.preventDefault();//阻止手机浏览器默认事件
        });
        $tb.on('touchend', function (e) {
            //touchend事件
            $tb.off('touchmove touchend');//解除touchmove和touchend事件
            //所要执行的代码
            e.stopPropagation();

            //判断移动距离是否大于30像素
            if (pullDeltaX > 0) {
                if ($(".choosemonth").val() == 1) {
                    month = 12;
                }
                else {
                    month--;
                }
                $(".choosemonth").val(month);
                today.setMonth(month - 1);
                onload(today);
                $("td").css("background", "rgb(36, 36, 36)");
                $("td").css("color", "white")
                //右滑，往前翻所执行的代码
            }
            //判断当前页面是否为最后一页
            else if (pullDeltaX < 0) {
                if ($(".choosemonth").val() == 12) {
                    month = 1;
                }
                else {
                    month++;
                }
                $(".choosemonth").val(month);
                today.setMonth(month - 1);
                onload(today);
                $("td").css("background", "rgb(36, 36, 36)");
                $("td").css("color", "white")
                //左滑，往后翻所执行的代码
            }
        });
    });
}
