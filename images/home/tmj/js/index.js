


$(function(){
	lunbo();
	zhiye();
	xinshou();
	
	hezuo();
	gonggao();
})


// 轮播图
var  timer,time = 3000,i, n = 0;
function lunbo(){
	// 控制小图标按钮
	$(".kv-img li:not(:first-child)").hide();
	$(".kv-num li").on("click",function(){
		i = $(this).index();
		n = i;
		$(this).addClass("current").siblings().removeClass("current");
		$(".kv-img li").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
	})
	timer = setInterval(autoPlay,time)
	$(".kv-img").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(autoPlay,time);
	})
}
function autoPlay(){
	var count = $(".kv-img li").length - 1;
	n = n >= count ? 0 : ++n;
	$(".kv-num li").eq(n).trigger("click");
}








// 职业介绍
function zhiye(){
	$("#roleTab li").mouseover(function(){
		$(this).addClass("cur").siblings().removeClass("cur");
		$(".role-con").children().eq($(this).index()).find(".r-desc").show().animate({"left":"22px","opacity":1},150).end().siblings().find(".r-desc").hide().animate({"left":"-350px","opacity":0},150);
		$(".role-con").children().eq($(this).index()).find(".r-per").show().animate({"right":"0","opacity":1},150).end().siblings().find(".r-per").hide().animate({"right":"-415px","opacity":0},150);
	})
}


// 新手指南
function xinshou(){
	$(".ziliao-tt li").mouseover(function(){
		$(this).addClass("on").siblings().removeClass("on");
		$("#game-info-box li").eq($(this).index()).show().siblings().hide();
	})
}



// 合作
function hezuo(){
	var timer;
	function play(){
		Left = parseInt($(".media-scroll ul").css("left")) - 150;
		if(Left <= -1200){
			Left = -150;
		}
		
		$(".media-scroll ul").css("left",Left + "px");
		timer = setTimeout(play,3000);
	}
	play();
}


// 公告栏
function gonggao(){
	$(".news-tab li").mouseover(function(){
		$(this).addClass("current").siblings().removeClass("current");
		$("#news .news-list ul").eq($(this).index()).show().siblings().hide();

	})
}
























