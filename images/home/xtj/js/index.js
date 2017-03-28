$(function(){
	// 公告 新闻
	$(".dt .tab span").on("mouseover",function(){
		var index = $(this).index();
		$(this).addClass("on").siblings().removeClass("on");
		$(".dd .list").eq(index + 1).removeClass("undis").siblings().addClass("undis")
	})

	// 职业介绍
	$(".dd .tab span").on("mouseover",function(){
		var index = $(this).index();
		$(this).addClass("on").siblings().removeClass("on");
		$(".data-con").eq(index).removeClass("undis").siblings().not(".tab").addClass("undis")
	})

	// 轮播图
	$(".slide li:not(:first-child)").hide();
	$(".num .fixpng").on("mouseover",function(){
		i = $(this).index();
		n = 1;
		$(this).addClass("on").siblings().removeClass("on");
		$(".slide li").filter(":visible").fadeOut(200).parent().children().eq(i).fadeIn(500);
	})

	timer= setInterval(autoPlay,interval);
	$(".slide").hover(function(){
		clearInterval(timer);
	},function(){
		timer= setInterval(autoPlay,interval);
	})
})

	var i,n=0,timer,interval=3000;
	function autoPlay(){
		var cont = $(".num .fixpng").length - 1;
		n = n >= cont ? 0 : ++n;
		$(".num .fixpng").eq(n).trigger("mouseover");
	}