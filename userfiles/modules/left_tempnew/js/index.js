// 清除右边帮助中心，动画还原复位
var clearRightAnimate = function () {
    $(".assistContent1").animate({
        "margin-left": "0px"
    }, 100, "linear");
    $(".assistContent1").siblings().animate({
        "margin-left": "0px"
    }, 100, "linear");
    // 
    $("#rightBox").stop().animate({
        "margin-left": "0px"
    }, 100, "linear")

    $("#rightBtn").removeClass("is-active");
	$('#rightBtn i').removeClass("icon-ziyuan1").addClass("icon-ziyuan");
    $(" .rightBoxContent .content ul li ").removeClass("animate");
	$('#rightBtn i').css('color','rgb(255, 255, 255)');
}


var condition = 0;
// 中间左按钮
$("#btnLeft").click(function () {
    // 清除右边帮助中心，动画还原复位
    clearRightAnimate()

    if (condition == 0) {
        condition = 1;

        if ($("#btnLeft").hasClass("animate")) {
            // 改变页面的宽度
            $(".pageFrame").addClass("pageFrameW100");

            $("#main-content-holder").stop().animate({
                "margin-left": "0px"
            }, 50, "linear");
            $(".exterior").stop().animate({
                "left": "0px"
            }, 70, "linear")
            $(".leftBox").stop().animate({
                "left": "-270px"
            }, 70, "linear");

            $("#btnLeft").stop().animate({
                "left": "0px"
            }, 70, "linear");


            $("#btnLeft i").removeClass("icon-leftarrow").addClass("icon-rightarrow");

            $("#btnLeft").removeClass("animate");

        } else {
            // 延迟页面还原*
            setTimeout(function () {
                $(".pageFrame").removeClass("pageFrameW100");
            }, 50)

            $(".exterior").stop().animate({
                "left": "270px"
            }, 50, "linear");
            $("#main-content-holder").stop().animate({
                "margin-left": "270px"
            }, 50, "linear");
            $(".leftBox").stop().animate({
                "left": "0px"
            }, 50, "linear");
            $("#btnLeft").stop().animate({
                "left": "270px"
            }, 50, "linear")


            $("#btnLeft i").removeClass("icon-rightarrow").addClass("icon-leftarrow");

            $("#btnLeft").addClass("animate");

        }
        setTimeout(() => {
            condition = 0;
        }, 50);
    }


});


// 中间右按钮
$("#rightBtn").click(function () {

    // 清除右边帮助中心，动画还原复位
    $(".assistContent1").animate({
        "margin-left": "0px"
    }, 100, "linear");
    $(".assistContent1").siblings().animate({
        "margin-left": "0px"
    }, 100, "linear");
    $(".rightBoxContent .content ul li").removeClass("animate");
	$('#rightBtn i').css('color','rgb(255, 255, 255)');


    if (condition == 0) {
        condition = 1;

        if ($(this).hasClass("is-active")) {
            $("#rightBox").stop().animate({
                "margin-left": "0px"
            }, 100, "linear")
            $(this).removeClass("is-active");
            $(this).find('.iconfont').removeClass("icon-ziyuan1");
            $(this).find('.iconfont').addClass("icon-ziyuan");
        } else {
            $("#rightBox").stop().animate({
                "margin-left": "-265px"
            }, 100, "linear")
            $(this).addClass("is-active");
            $(this).find('.iconfont').removeClass("icon-ziyuan");
            $(this).find('.iconfont').addClass("icon-ziyuan1");
        }
        setTimeout(() => {
            condition = 0;
        }, 100);
    }

});


// 右边帮助中心动画
$(" .rightBoxContent .content ul li ").click(function () {

    // 清除右边帮助中心，动画还原复位
    $("#rightBox").stop().animate({
        "margin-left": "0px"
    }, 100, "linear")
    $("#rightBtn").removeClass("is-active");


    // 右边帮助中心动画
    var assistContent = function (clickName, assistContentClass, distance, time) {
        $(assistContentClass).siblings().animate({
            "margin-left": "0px"
        }, time, "linear")
        $(clickName).siblings().removeClass("animate")

        if (condition == 0) {
            condition = 1;
            if ($(clickName).hasClass("animate")) {
                $(assistContentClass).animate({
                    "margin-left": "0px"
                }, time, "linear");
	$('#rightBtn i').css('color','rgb(255, 255, 255)');
                $(clickName).removeClass("animate");
                console.log("222222")
            } else {
	$('#rightBtn i').css('color','rgb(0, 0, 0)');

                $(assistContentClass).animate({
                    "margin-left": distance
                }, time, "linear");
                $(clickName).addClass("animate")

                console.log("1111111")
            }
            setTimeout(() => {
                condition = 0;
            }, time);
        }
    }
    // 点击的元素
    var $this = $(this);
    // 获取索引
    var index = $(this).index();
    // 获取被动画元素
    var assistContentClass = $this.parent("ul").parent(".content").parent(".rightBoxContent").siblings(".assist").children("iframe:eq(" + index + ")");

    // 点击元素 被动画元素  距离  时间
    assistContent($this, assistContentClass, -1000, 200)

})





//  左侧边栏 一级导航  点击事件盒子动画
var middleAnimate = function (target, animateTime) {
    // 获取索引
    //var index = target.index();
    var data_id = target.attr('data-item-id');
    if (condition == 0) {
        condition = 1;
 
        // 获取当前动画元素的父级
		
		var iframeindex = '[data-id='+data_id+']';
        var $this = $(iframeindex);

        // 移除所有兄弟元素的标记
        $(target).siblings().removeClass("active");
        if (!$(target).hasClass("active")) {

            // 给元素添加动画
            $this.animate({
                "margin-left": "-100vw"
            }, animateTime)

            // 兄弟元素的样式还原
            $this.siblings().css({
                "margin-left": "0vw"
            });

            // 给点击事件添加标记
            $(target).addClass("active");

            // 显示右边的按钮
            $("#rightBtn").css({
                "display": "none"
            });

            // 点击隐藏当前导航的二级导航,把所有的兄弟元素的二级导航隐藏
            target.children(".cbp-hrsub").css({
                "display": "block"
            }).parent("li").siblings("li").children(".cbp-hrsub").css({
                "display": "none"
            });

        } else {

            // 动画元素位置还原
            $this.animate({
                "margin-left": "0vw"
            }, animateTime)
            $(target).removeClass("active");

            // 显示右边的按钮
            $("#rightBtn").css({
                "display": "block"
            });

            // 点击隐藏当前导航的二级导航
            target.children(".cbp-hrsub").css({
                "display": "none"
            })

        }
    }
    // 禁止事件多次触发
    setTimeout(function () {
        condition = 0
    }, animateTime)
}




//  侧边栏导航点击事件盒子动画
$(".leftBox>ul>li>.title").click(function (e) {
	e.stopPropagation()
    // 清除二级导航的iframe的所有动画
    $(".leftIframe").children("div").children("div").children("iframe").animate({
        "margin-left": "0px"
    }, 300)
    // 清除二级导航点击的所有标记
    $(".leftBox>ul>li>.cbp-hrsub li").removeClass("active");


    // 清除右边的动画
    clearRightAnimate()

    var target = $(this).parent("li");
    // 设置的动画时间
    var animateTime = 300;
    middleAnimate(target, animateTime)
	return false;
});






//  左侧边栏二级导航     点击事件盒子动画
var middleAnimateTwo = function (target, animateTime) {

    // 获取点击目标的索引
    //var index = target.index();

    // 获取当前元素的一级导航父元素
    //var parentIndex = target.parent(".liNav").parent("li").index();

    // 获取一级iframe的父元素
   //var $this = target.parent(".liNav").parent("li").parent(".leftContent").siblings(".leftIframe").children("div:eq(" + parentIndex + ")");

    // 二级iframediv
    //var iframe = $this.children("div").children("iframe:eq(" + index + ")");
    var data_id = target.attr('data-item-id');
	var iframeindex = '[data-id='+data_id+']';
	var iframe = $(iframeindex);
    // 兄弟元素的动画还原
    iframe.siblings().animate({
        "margin-left": "0vw"
    }, animateTime)

    // 清除所有兄弟元素的点击标记
    target.siblings().removeClass("active");
    console.log(target.hasClass("active"))
    if (target.hasClass("active")) {

        // 动画元素
        iframe.animate({
            "margin-left": "0vw"
        }, animateTime)

        // 元素删除点击标记
        target.removeClass("active");

    } else {

        // 动画元素
        iframe.animate({
            "margin-left": "-100vw"
        }, animateTime);
        // 清除兄弟元素动画
        setTimeout(function () {
            iframe.siblings().css({
                "margin-left": "0vw"
            });
        }, animateTime)
        // 元素添加点击标记
        target.addClass("active");

    }
}

//  侧边栏导航点击事件盒子动画

$(".leftBox>ul>li>.cbp-hrsub li").click(function () {
    // 清除右边的动画
    clearRightAnimate()
    // 清除父元素的选中事件
    $(".leftContent li .title").removeClass("active");

    // 清除所有父级iframe动画
    $(".leftIframe").children("div").children("div").children("iframe").animate({
        "margin-left": "0px"
    }, 300)


    // 设置的时间
    var animateTime = 300;
    // 传入的this
    var target = $(this);

    // 设置的动画时间
    middleAnimateTwo(target, animateTime)
});