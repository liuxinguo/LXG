



$(function(){
	//综合新闻
	function compreNews(){
		$("#newsTab a").on("mouseover",function(){
			var i = $(this).index();
			$(this).addClass("cur").siblings().removeClass("cur");
			$(".news-ul").eq(i).show().siblings().not($("#newsTab")).hide();
		})
	}
	compreNews();
	// 职业介绍
	function gamesPro(){
		$("#jobsTab span").on("mouseover",function(){
			var i = $(this).index();
			$(this).addClass("cur").siblings().removeClass("cur");
			$(".item").eq(i).addClass("cur").siblings().filter(".item").removeClass("cur");
		})
	}

	gamesPro();


	function gamesData(){
		$("#gameSkill dd").on("mouseover",function(){
			$(this).addClass("cur").siblings().removeClass("cur");
		})
	}
	gamesData();



	//图片轮播
	
	//图片轮播
	$("#focusList li:not(:first-child)").hide();
	$("#focusDot em").on("mouseover",function(){
		index = $(this).index();
		n = index;
		$(this).addClass("cur").siblings().removeClass("cur");
		$("#focusList li").filter(":visible").fadeOut(500).parent().children().eq(index).fadeIn(1000);
	})

	timer = setInterval(autoplay,interval);

	$("#focusList li").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(autoplay,interval);
	})

})

	var index,n = 0,interval = 3000,timer;
	function autoplay(){
		var count = $("#focusDot em").length - 1;
		n = n >= count ? 0 : ++n;
		$("#focusDot em").eq(n).trigger("mouseover");
	}