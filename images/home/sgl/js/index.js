$(function(){
	
	// 轮播图
	$(".bd li:not(:first-child)").hide();
	$(".hd li").on("click",function(){
		i = $(this).index();
		n = i;
		$(this).addClass("on").siblings().removeClass("on");
		$(".bd li").filter(":visible").fadeOut(200).parent().children().eq(i).fadeIn(500);
	})

	timer = setInterval(autoPlay,interval);
	$(".bd li").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(autoPlay,interval);
	})

	// 综合新闻
	$(".title-list li").on("mouseover",function(){
		var index = $(this).index();
		$(this).addClass("on").siblings().removeClass("on");
		$(".product-wrap div").eq(index).show().siblings().hide();
	})

	//职业介绍
	$(".sb-tt li").on("click",function(){
		var index = $(this).index();
		$(this).addClass("active").siblings().removeClass("active");
		$(".sb-con").eq(index).show().siblings().not('.sb-tt').hide();
	}) 

	// 合作媒体
	$(".tt-list li").on("mouseover",function(){
		var index = $(this).index();
		$(this).addClass("on").siblings().removeClass("on");
		$(".ballot-wrap div").eq(index).show().siblings().hide();
	})
})


	// 轮播图
	var i,n=0,timer,interval=3000;
	function autoPlay(){
		var count = $(".hd li").length - 1;
		n = n >= count ? 0 :++n;
		$(".hd li").eq(n).trigger("click");
	}