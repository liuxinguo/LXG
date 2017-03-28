$(function(){
	// 轮播图
	$(".kv-img li:not(:first-child)").hide();
	$(".kv-num li").on('mouseover',function(){
		i = $(this).index();
		n = i;
		$(this).addClass('current').siblings().removeClass('current');
		$(".kv-img li").filter(':visible').fadeOut(500).parent().children().eq(i).fadeIn(800);
	})

	timer = setInterval(autoPlay,interval);
	$(".kv-img").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(autoPlay,interval);
	})

	// 综合 新闻
	$(".news-tab li").on('mouseover',function(){
		var index = $(this).index();
		$(this).addClass('current').siblings().removeClass('current');
		$(".news-list ul").eq(index).show().siblings().hide();
	})
	// 游戏资料
	$(".zl-tab li").on('mouseover',function(){
		var index = $(this).index();
		$(this).find('a').addClass('current').parent().siblings().find('a').removeClass('current');

		$(".zl-con li").eq(index).show().siblings().hide();
	})

	// 职业介绍
	$(".role-nav li").on("mouseover",function(){
		var index = $(this).index();
		$(this).addClass('cur').siblings().removeClass('cur');
		$(".role-content").find('.r-desc').eq(index).animate({'left':'22px','opacity':'1'},300).parent().siblings().find('.r-desc').animate({'left':'-350px','opacity':'0'},300);
		$(".role-content").find('.r-per').eq(index).animate({'right':'0','opacity':'1'},300).parent().siblings().find('.r-per').animate({'right':'-415px','opacity':'0'},300);
		$(".role-content").find('.role-detail').eq(index).addClass('curElem').siblings().removeClass('curElem');
	})
})

	var i,n = 0,timer,interval = 3000;
	function autoPlay(){
		var count = $(".kv-num li").length - 1;
		n = n >= count ? 0 : ++n;
		$(".kv-num li").eq(n).trigger('mouseover');
	}