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

	// 角色介绍
	referral();

	
})
	// 角色介绍
	function referral(){
		var index;
		var n=0;
		var steep = 180;
		$(".game-referral li").on("mouseover",function(){
			index = $(this).index();
			$(this).addClass("active").siblings().removeClass("active");
			$(".img_cont").eq(index).addClass("img_show").siblings().removeClass("img_show");
			$(".referral").css("left","0");
			n = 0
		})
		$(".box1-img .next").on("click",function(){
			var lis = $(".img_show li").length;
			if(lis == 4){
				$(".box1-img .prev").css('opacity',"1");
				$(".box1-img .next").css('opacity',".5");
				n = -1;
			}else if(n == -4){
				$(".box1-img .prev").css('opacity',"1");
				$(".box1-img .next").css('opacity',".5");
				n = -4;
			}else{
				$(".box1-img .prev").css('opacity',"1");
				$(".box1-img .next").css('opacity',"1");
				n--;
			}
			var Left = steep * n + "px";
			$(".referral").animate({"left" : Left},200);

		})
		$(".box1-img .prev").on("click",function(){
			var lis = $(".img_show li").length;
			if(lis == 4){
				$(".box1-img .prev").css('opacity',".5");
				$(".box1-img .next").css('opacity',"1");
				n = 0;
				
			}else if(n == 0){
				$(".box1-img .prev").css('opacity',".5");
				$(".box1-img .next").css('opacity',"1");
				n = 0;
				
			}else{
				
				$(".box1-img .prev").css('opacity',"1");
				$(".box1-img .next").css('opacity',"1");
				n++;
			}
			var Left = steep * n + "px";
			$(".referral").animate({"left" : Left},200);
		})
	}

	// 轮播图
	var i,n=0,timer,interval=3000;
	function autoPlay(){
		var count = $(".hd li").length - 1;
		n = n >= count ? 0 :++n;
		$(".hd li").eq(n).trigger("click");
	}