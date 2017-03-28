


$(document).ready(function(){

	backGround();
	smallGround();

	// 新闻 综合
	$("#news-tab li").on("mouseover",function(){
		var i = $(this).index();
		$(this).addClass("cur").siblings().removeClass("cur");
		$(".news-list ul").eq(i).show().siblings().hide();
	})

	// 职业介绍
	$("#roleTab li").on("mouseover",function(){
		var i = $(this).index();
		var n = i-1;
		$(this).addClass("cur").siblings().removeClass("cur");
		$(".role-ul li").eq(i).animate({"right":0,"opacity":1},400).show().siblings().animate({"right":"-50px","opacity":0},400);
		
	})

	//视频播放
	$(".movie-area a").on("click",function(){
		$(this).hide();
		$(".movie-con").append('<embed width="100%" height="100%" title="视频鉴赏" wmode="transparent" src="/images/home/flvplayer.swf" allowfullscreen="true" flashvars="vcastr_file=/images/home/hxmt/images/05_01.flv&amp;LogoText=欢喜密探&amp;IsAutoPlay=1" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash">')
	})

	// 精彩图集 下面
	$(".r-list .tab").bind("mouseover",function(){
		var i = $(this).data("tab");
		var cont = false;
		$(this).addClass("cur").siblings().removeClass("cur");
		$(".panel").eq(i).addClass("im").siblings().removeClass("im")
		switch(i){
			case 0:
			cont = true;
			if($(".r-list .tab").hasClass("cur")){
				$(".r-list .tab").not($(".cur")).animate({"width":"40px"},300);
			}
			$(".r-list .tab").eq(i).css("width","40px");
			if($(".panel").hasClass("im")){
				$(".panel").eq(i).animate({"width":"267px"},500);
				$(".panel").not($(".im")).animate({"width":"0"},500);
			}
			$(this).eq(i).animate({"width":"0"},300);
			break;
			case 1:
			
			if($(".r-list .tab").hasClass("cur")){
				
				$(".r-list .tab").not($(".cur")).animate({"width":"40px"},300);
			}
			$(".r-list .tab").eq(i).css("width","40px");
			if($(".panel").hasClass("im")){
				$(".panel").eq(i).animate({"width":"267px"},500);
				$(".panel").not($(".im")).animate({"width":"0"},500);
			}
			$(this).animate({"width":"0"},300)
			break;
			case 2:
			$(this).animate({"width":"0"},300)
			if($(".r-list .tab").hasClass("cur")){
				$(".r-list .tab").not($(".cur")).animate({"width":"40px"},300);
			}

			if($(".panel").hasClass("im")){
				$(".panel").eq(i).animate({"width":"267px"},500);
				$(".panel").not($(".im")).animate({"width":"0"},500);
			}
			break;
		}

		
		

	})

	
	// 新闻页视频
	$("#vplayBtn").on("click",function(){
		$(".video-alert").show();
		$(".video-code").append('<embed width="100%" height="100%" title="视频鉴赏" wmode="transparent" src="/images/home/flvplayer.swf" allowfullscreen="true" flashvars="vcastr_file=/images/home/hxmt/images/05_01.flv&amp;LogoText=欢喜密探&amp;IsAutoPlay=1" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash">');
	})

	$(".video-close").on("click",function(){
		$(".video-alert").hide();
		$(".video-code").html('');
	})

	// 媒体合作
	$(".gg-mei li").on("click",function(){
		var i = $(this).index();
		$(this).addClass("active").siblings().removeClass("active");
		$(".gg-he .he-img").eq(i).show().siblings().hide();
	})


})


// 大背景图轮播图
var timer,interval = 5000,i ,n = 0;
function backGround(){
	$(".kv-top-img li:not(:first-child)").hide();
	$(".kv-top-nav li").on("click",function(){
		i = $(this).index();
		n = i;
		$(this).addClass("cur").siblings().removeClass("cur");
		$(".kv-top-img li").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
	})

	timer = setInterval(backLunBo,interval);

	$(".kv-top-img").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(backLunBo,interval);
	})
}

// 大图背景轮播
function backLunBo(){
	var count = $(".kv-top-nav li").length - 1;
	n = n >= count ? 0 : ++n;
	$(".kv-top-nav li").eq(n).trigger("click");
}

//小轮播图
var timer2,intervals = 3000,index ,o = 0;

function smallGround(){
	$(".kv-cnt li:not(:first-child)").hide();
	$(".kv-nav li").on("click",function(){
		index = $(this).index();
		o = index;
		$(this).addClass("cur").siblings().removeClass("cur");
		$(".kv-cnt li").filter(":visible").hide().parent().children().eq(index).show();
	})

	timer2 = setInterval(smallLunBo,intervals);

	$(".kv-cnt").hover(function(){
		clearInterval(timer2);
	},function(){
		timer2 = setInterval(smallLunBo,intervals);
	})
}

// // 小图背景轮播
function smallLunBo(){
	var count = $(".kv-nav li").length - 1;
	o = o >= count ? 0 : ++o;
	$(".kv-nav li").eq(o).trigger("click");
}

















