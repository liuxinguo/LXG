

// 主页轮播图

$(function(){

	var index= 0;
	var timer;


	
	function autoPlay(){ //自动播放
		$(".kv-img li").eq(index).show().siblings().hide();
		if(index >= 5){
			index = 0;
		}else {
			index++;
		}
		
		timer = setTimeout(autoPlay,2000);
		// alert(index);
	};

	autoPlay();

	$(".kv-img li").hover(function(){
		clearTimeout(timer);
		index = $(this).index();
	},function(){
		autoPlay();
		index = $(this).index();
	});

	//综合 公告 活动
	$(".news-tab li").mouseover(function(){  
		// alert($(this).index());
		$(".news-list ul").eq($(this).index()).show().siblings().hide();
		$(this).addClass("current").siblings().removeClass("current");
	})

	$(".zl-tab li").mouseover(function(){ //新手指南
		$(".zl-con ul").eq($(this).index()).show().siblings().hide();
		$(this).addClass("d-current").siblings().removeClass("d-current");
	})

	//合作媒体
	var sIndex = -1;
	var timers;
	function auto(){
		var times = 3;
		if(sIndex >= 12){
			sIndex = 0;
		}else{
			sIndex++;
		}

		var offsetLeft= sIndex * (-150); 


		$(".media-scroll ul").css({
			"position":"relative",
			"left":offsetLeft
		})

		timers = setTimeout(auto,3000);
	}
	auto();

	// 右键头
	var rightIndex = 0;
	var leftIndex = 0;
	function role(){
		$(".role-info li").eq(rightIndex).show().siblings().hide();
		$(".role-tab li").eq(rightIndex).addClass("r-focus").siblings().removeClass("r-focus");
	}
	$(".right").click(function(){
		if(rightIndex >= 3){
			$(".right").hide();
		}else{
			
			$(".left").show();
		}
		rightIndex++;
		role();
	})

	$(".left").click(function(){
		if(rightIndex < 2){
			$(".left").hide();
		}else{
			
			$(".right").show();
		}
		rightIndex--;
		role();
	})



	var pIndex= 0;
	var timera;
	$(".jt-img li").mouseover(function(){  //大轮播图
		// alert($(this).index());
		$(".jt-img li ").eq($(this).index()).show().siblings().hide();
		pIndex = $(this).index();
	});
	
	function autoPlayp(){ //自动播放
		$(".jt-img li").eq(pIndex).show().siblings().hide();
		if(pIndex >= 5){
			pIndex = 0;
		}else {
			pIndex++;
		}
		
		timera = setTimeout(autoPlayp,3000);
	};

	autoPlayp();


	$(".role-tab li").mouseover(function(){
		$(".role li").eq($(this).index()).show().siblings().hide();
		$(this).addClass("r-focus").siblings().removeClass("r-focus");
	})
});






























