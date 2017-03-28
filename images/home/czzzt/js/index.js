$(function(){




	// 轮播图
	$(".Slideshow a:not(:first-child)").hide();

	$(".news_pic_dotted li").on("click",function(){
		i = $(this).index();
		n = i;
		$(this).addClass("active").siblings().removeClass("active");
		$(".Slideshow a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
	})

	timer = setInterval(autoPlay,interval);

	$(".news_pic ").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(autoPlay,interval);
	})

	// 综合 新闻
	$(".tit li").on("mouseover",function(){
		var index = $(this).index();
		$(this).addClass("on").siblings().removeClass("on");
		$(".txt ul").eq(index).show().siblings().hide();
	})

	// 图片
	$(".roles dt").on("mouseover",function(){
		var num = $(this).data("num");
		$(this).hide().siblings().filter(":hidden").not("dd").show();
		$(".roles dd").eq(num -1).show().siblings().not("dt").hide();
	})

	// 谈出登录框
	$(".login-btn").on("click",function(){
		$(".login_register_box").show();
		$(".1479291571618").show();
	})

})


	var timer,i,n = 0,interval = 3000;
	function autoPlay(){
		var count = $(".news_pic_dotted li").length - 1;
		n = n >= count ? 0 : ++n;
		$(".news_pic_dotted li").eq(n).trigger("click")
	}

