$(function(){
	// 轮播图
	$(".imgs li:not(:first-child)").hide();
	$(".ctrl a").on("click",function(){
		i = $(this).index();
		n = i;
		$(this).addClass("on").siblings().removeClass("on");
		$(".imgs li").filter(":visible").fadeOut(200).parent().children().eq(i).fadeIn(500);
	})

	timer = setInterval(autoPlay,interval);
	$(".imgs li").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(autoPlay,interval);
	})

	// 综合新闻
	$("#move-animate-left li").on("mouseover",function(){
		var index = $(this).index();
		$(this).addClass("current").siblings().removeClass("current");
		$(".subbox .sublist").eq(index).show().siblings().hide();
	})

	// 职业介绍
	$(".title li").on("mouseover",function(){
		var index = $(this).index();
		$(this).addClass("on").siblings().removeClass("on");
		$(".con .job").eq(index).addClass("on").siblings().removeClass("on");
	})

	// 合作媒体
	$("#move-animate-left1 li").on("mouseover",function(){
		var index = $(this).index();
		$(this).addClass("current").siblings().removeClass("current");
		$("#leftcon1>.sublist").eq(index).show().siblings().hide();
	})

	$("#move-animate-left2 li").on("mouseover",function(){
		var index = $(this).index();
		$(this).addClass("current").siblings().removeClass("current");
		$("#leftcon2>.sublist").eq(index).show().siblings().hide();
	})
})
	var i,n=0,timer,interval = 3000;
	function autoPlay(){
		var count = $(".ctrl a").length - 1;
		n = n >= count ? 0 : ++n;
		$(".ctrl a").eq(n).trigger("click");
	}