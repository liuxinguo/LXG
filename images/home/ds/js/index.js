


$(function(){
	lunbo();
	zhiye();
	xinshou();
	hezuo();
	gonggao();
})


// 轮播图
function lunbo(){
	var  index = 0;
	var  timer;
	// 控制小图标按钮
	$(".kv-num li").mouseover(function(){
		$(this).addClass("current").siblings().removeClass("current");
		$(".kv-img li").eq($(this).index()).show().siblings().hide();
		index = $(this).index();

	})
	// 自动轮播
	function autoPlay(){
		if(index>1){
			index = 0;
		}
		timer = setTimeout(autoPlay,3000);
		$(".kv-img li").eq(index).show().siblings().hide();
		$(".kv-num li").eq(index).addClass("current").siblings().removeClass("current");
		index++;
	}
	autoPlay();

	$(".kv-img li").hover(function(){
		clearTimeout(timer);
		index = $(this).index();
	},function(){
		autoPlay();
	})
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
	var index = 1;
	var next = $(".but-hezuo-next");
	var list = $(".media-scroll ul");
	var len = 7;
	function animate(offset){
		var left = parseInt(list.css("left")) + offset;
	
		if(offset < 0){
			offset = "-=" +Math.abs(offset);
		}

		list.animate({"left":offset},300,function(){
			if(left < (-150 *len)){
				list.css("left",-150); 
			}
		})
	}
	next.bind("click",function(){
		if(index == 7){
			index = 1;
		}else{
			index += 1;
		}
		animate(-150);
	})

	function play(){
		timer = setTimeout(function(){
			next.trigger("click");
			play();
		},2000)
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
























