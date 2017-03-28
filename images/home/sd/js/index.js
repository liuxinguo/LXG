$(function(){

	// 综合 新闻
	$(".news-tab ul li").on("mouseover",function(){
		var index = $(this).index();
		$(".news-list ul").eq(index).show().siblings().hide();
	})

	// 轮播图
	$(".kv-img li:not(:first-child)").hide();
	$(".kv-num li").on("mouseover",function(){
		i = $(this).index();
		n = i;
		$(this).addClass("current").siblings().removeClass("current");
		$(".kv-img li").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
	})

	timer = setInterval(lunbo,interval);
	$(".kv-img").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(lunbo,interval);
	})


	// 角色介绍
	$(".role-nav ul li").on("click",function(){
		var index = $(this).index();
		$(this).addClass("cur").siblings().removeClass("cur");
		
		$(".role-detail .r-desc").eq(index).animate({"opacity":1,"left":"30px"},150).parent().siblings().find($(".r-desc:not(index)")).animate({"opacity":0,"left":"-350px"},250);
		$(".role-detail .r-per").eq(index).animate({"opacity":1,"right":"0"},150).parent().siblings().find($(".r-per:not(index)")).animate({"opacity":0,"right":"-415"},250);
		
		
	})

	// 游戏资料
	$(".zl-tab li").on("mouseover",function(){
		var index = $(this).index();
		$(this).addClass("zl-on").siblings().removeClass("zl-on");
		$(".zl-con li").eq(index).show().siblings().hide();
	})


	// 游戏截图
	$(".picture li").hover(function(){
		$(".but-game-pic").show();
		$(".but-game-pic").on("mouseover",function(){
			$(".but-game-pic").show();
		})
	},function(){
		$(".but-game-pic").hide();
	})

	function gamesPhoto(){
		var list = $('.picture');
		var prev = $(".but-game-pic-prev");
		var next = $(".but-game-pic-next");
		var index = 1,len = 3,inter = 3000,timers;

		function animate(offset){
			var left = parseInt(list.css("left") + offset);
			if(offset > 0){
				offset = "+=" + offset;
			}else{
				offset = "-=" + Math.abs(offset);
			}
			list.animate({"left":offset},300,function(){
				if(left > -1){
					list.css("left",-269 * len);
				}
				if(left < (-269 * len)){
					list.css("left",-269);
				}
			})
		}


		// next按钮
		next.on("click",function(){
			if(list.is("animate")){
				return;
			}
			if(index == 3){
				index = 1;
			}else{
				index += 1;
			}

			animate(-269)
		})

		// prev按钮
		prev.on("click",function(){
			if(list.is("animate")){
				return;
			}
			if(index == 1){
				index = 3;
			}else{
				index -= 1;
			}
			animate(269);
		})

		function play(){
			timers = setTimeout(function(){
				play();
				next.trigger("click");
			},inter) 
		}
		play();
		function stop(){
			clearTimeout(timers);
		}

		$(".picture").hover(play.stop);
		


	}

	gamesPhoto();



})

	var i,n=0,timer,interval = 3000;
	function lunbo(){
		var count = $(".kv-num li").length - 1;
		n = n >= count ? 0 : ++n;
		$(".kv-num li").eq(n).trigger("mouseover");
	}
