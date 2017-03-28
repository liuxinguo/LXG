



$(function(){
	 // 综合、公告、活动、媒体、攻略
 var newsTab = $("#news-tab li");
 var uls = $("#news-list ul");
 var zhIndex = 0;
 var zhTimer;
 newsTab.mouseover(function(){
 	$(this).addClass("current").siblings().removeClass("current");
 	uls.eq($(this).index()).css("display","block").siblings().css("display","none");
 	zhIndex = $(this).index();
 })
 function zhAutoPlay(){
  	newsTab.eq(zhIndex).addClass("current").siblings().removeClass("current");
  	uls.eq(zhIndex).css("display","block").siblings().css("display","none");
  	if(zhIndex >= 4){
  		zhIndex = 0;
  	}else{
  		zhIndex++;
  	}
  	zhTimer = setTimeout(zhAutoPlay,4000);
  }

  zhAutoPlay();



 //职业介绍
  	var roleLis = $(".role-nav li");
  	var imgs = $(".r-img img");
  	var roleP = $(".description p");

  	function adem(){
  		var r = $(".r-cur").attr('data-r'); //获取数字r-cur的自定义属性
  		var sexNum = $(".sex-cur").attr('data-sex'); //获取sex-cur的自定义属性
  		imgs.eq(r).attr("src","img/r"+ r + "-" + sexNum + ".png").addClass("rimg-cur").siblings().removeClass("rimg-cur");
  	}
	roleLis.bind("click",function(){
	  	$(this).addClass("r-cur").siblings().removeClass("r-cur");
	  	roleP.eq($(this).index()).css("display","block").siblings().css("display","none");
	  	adem();
	})

	$(".sex").click(function(){
		$(this).addClass("sex-cur").siblings().removeClass("sex-cur");
		adem();
	})


	//视频、披风、武器

	var jieLis = $(".jietu-tab li");
	var jieTu = $(".jietu-con .f-panel");
	var prev = $(".loadeda .prev");
	var next = $(".loadeda .next"); 
	var loadedLi = $(".loadeda li");
	var videoIndex = 0;
	var odeIndex = 0;
	var loadedLib = $(".loadedb li");
	var prevb = $(".loadedb .prev");
	var nextb = $(".loadedb .next");


	jieLis.bind("mouseover",function(){
		$(this).addClass("j-cur").siblings().removeClass("j-cur");
		jieTu.eq($(this).index()).css("display","block").siblings().css("display","none");
	})

	function nextName(){
		loadedLi.eq(videoIndex).addClass("s-f").siblings().removeClass("s-f");
	}

	next.click(function(){
		videoIndex++;
		if(videoIndex > 0 ){
			prev.css("display","block");
		}
		if(videoIndex >= 9){
			next.css("display","none");
		}
		
		nextName();
	})
	prev.click(function(){
		videoIndex--;
		if(videoIndex <= 0 ){
			prev.css("display","none");
		}
		if(videoIndex < 9){
			next.css("display","block");
		}
		nextName();
	})



	function prevtName(){
		loadedLib.eq(odeIndex).addClass("s-f").siblings().removeClass("s-f");
	}

	nextb.click(function(){
		odeIndex ++;
		if(odeIndex > 0 ){
			prevb.css("display","block");
		}
		if(odeIndex >= 5){
			nextb.css("display","none");
		}
		
		prevtName();
	})
	prevb.click(function(){
		odeIndex --;
		if(odeIndex <= 0 ){
			prevb.css("display","none");
		}
		if(odeIndex < 5){
			nextb.css("display","block");
		}
		prevtName();
	})


	lunbo();
})




var timer,time = 3000,i,n=0;
var picLis = $(".slide-pic li");
var slideLis = $(".slide-li li");
function lunbo(){
	//轮播图
	$(".slide-pic li:not(:first-child)").hide();

	$(".slide-li li").on("click",function(){
		i = $(this).index();
		n = i;
		$(this).addClass("current").siblings().removeClass("current");
		$(".slide-pic li").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
	})

	timer =  setInterval(autoPlay,time);

	$(".slide-pic").hover(function(){
		clearInterval(timer);
	},function(){
		timer =  setInterval(autoPlay,time);
	})
}

function autoPlay(){
	var count = $(".slide-li li").length - 1;
	n = n >= count ? 0 : ++n;
	$(".slide-li li").eq(n).trigger("click");
}




























