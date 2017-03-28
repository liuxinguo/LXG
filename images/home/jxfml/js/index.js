$(function(){



	// 新闻 热点
	$("#tab-title span").on("mouseover",function(){
		var i = $(this).index();
		$(this).addClass("selected").siblings().removeClass("selected");
		$("#tab-content div").eq(i).show().siblings().hide();
	})

	// 背景轮播
	$(".banner_ul li:not(:first-child)").hide();
	$(".b_page a").on("mouseover",function(){
		index = $(this).index();
		n = index;
		$(this).addClass("current").siblings().removeClass("current");
		$(".banner_ul li").filter(":visible").fadeOut(500).parent().children().eq(index).fadeIn(1000);
	})
	timer = setInterval(backgroundLun,interval);
	$(".banner_ul").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(backgroundLun,interval);
	});


	 gamesPhoto();


})


// 自动轮播大图
var timer,n=0,index,interval = 3000;
 function backgroundLun(){
 	var count = $(".b_page a").length;
 	n = n >= count ? 0 : ++n;
 	$(".b_page a").eq(n).trigger("mouseover");
 }

 // 小轮播图
 function gamesPhoto(){
 	var i,n = 0;
 	var intervals = 2000;
 	var timer;
 	$("#kvContentID li:not(:first-child)").hide();
 	$("#kvNumID li").on("mouseover",function(){
 		$(this).addClass("current").siblings().removeClass("current");
 		i = $(this).index();
 		n = i;
 		$("#kvContentID li").eq(i).show().siblings().hide();
 	})

 	timer = setInterval(gamesLun,intervals);

 	$("#kvContentID").hover(function(){
 		clearInterval(timer);
 	},function(){
		timer = setInterval(gamesLun,intervals);
 	})

 	
 	function gamesLun(){
 		var cot = $("#kvNumID li").length - 1;
 		n = n >= cot ? 0 : ++n;
 		$("#kvNumID li").eq(n).trigger("mouseover");

 	}

 	

 }










