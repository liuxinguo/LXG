

$(function(){
	

	//开服列表
	$(window).scroll(function(){  //滚动条控制 开服列表的位置
		// alert($(this).scrollTop()); 604px
		scrollTop = $(this).scrollTop();
		xTop = 548-scrollTop;
		if(xTop < 0){
			xTop = 0;
		}
		stop = xTop + "px";
		if(scrollTop >= 548){
			$(".new-listbox").css("position","fixed").css("top",stop);
		}else if(scrollTop < 548){
			$(".new-listbox").css("position","fixed").css("top",xTop + "px");
		}
	})

	$(".listbox-head>ul li").click(function(){ //点击新服预告和最新开服
		$(this).addClass("listbox-active").siblings().removeClass("listbox-active");
		// alert($(this).index());
		if($(this).index() == 0){
			$(".new-herald-one").show();
			$(".new-herald-two").hide();
		}else{
			$(".new-herald-two").show();
			$(".new-herald-one").hide();
		}
	})
	
	$(".tab-change li").click(function(){ //点击新服预告和最新开服下面的蓝色按钮
		$(this).addClass("tab-active").siblings().removeClass("tab-active");
		if($(this).index() == 0){
			$(".tbody_aa").show();
			$(".tbody_bb").hide();
		}else{
			$(".tbody_bb").show();
			$(".tbody_aa").hide();
		}
	})

	$(".tab-change li").click(function(){ //点击新服预告和最新开服下面的蓝色按钮
		$(this).addClass("tab-active").siblings().removeClass("tab-active");
		if($(this).index() == 0){
			$(".tbody_cc").show();
			$(".tbody_dd").hide();
		}else{
			$(".tbody_dd").show();
			$(".tbody_cc").hide();
		}
	})


	$(".all-games-icon li").hover(function(){
		$(".all-games-icon-hide").eq($(this).index()).css("top","0");
	},function(){
		$(".all-games-icon-hide").eq($(this).index()).css("top","150px");
	})





	//轮播图
	$(".price-1:not(:first-child)").hide();

	$(".cont-xiao li").on("click",function(){
		var i = $(this).index();
		n = i;
		$(this).addClass("active").siblings().removeClass("active");
		$(".price-1").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
	})

	timer = setInterval(autoPlay,time);

	$(".cont-price").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(autoPlay,time);
	})

})

	var n=0,timer,time = 3000;

	function autoPlay(){
		n = n >= 4 ? 0 : ++n;
		$(".cont-xiao li").eq(n).trigger("click");
	}
	


















