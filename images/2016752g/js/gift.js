

// 礼包中心

$(function(){
	//热门礼包
	$(".gift-hot-name li").hover(function(){
		$(this).find("ol").css("top","0");
	},function(){
		$(this).find("ol").css("top","200px");
	})

	//游戏列表
	$(".all-games-icon ul li").hover(function(){
		$(this).find("div").css("top","0");
	},function(){
		$(this).find("div").css("top","150px");
	})

	// 倒计时的制作
	// function countDown(times,selected){
	// 	var nowTime = new Date();  //获取当前的日期
	// 	var times = new Date(times);  //设定结束的时间	
	// 	var getTime = parseInt((times.getTime() - nowTime.getTime())/1000); //获取相差的秒数
	// 	if(times.getTime() < nowTime.getTime()){
	// 		$(selected).parent().html("活动已结束");
	// 	}else{
	// 		var day = Math.floor(getTime/(60*60*24)); //获取相差多少天
	// 		var house = Math.floor((getTime - day*24*3600)/3600);  //获取相差的小时
	// 		var minutes = Math.floor((getTime - day*24*3600 -house*3600)/60); //获取相差分钟
	// 		var seconds= Math.floor(getTime - day*24*3600 -house*3600-minutes*60);
	// 		day = day>9?day:"0" + day;  //day大于9吗，大于为day，不大于为 0 +day;
	// 		house = house>9?house:"0" + house;
	// 		minutes = minutes>9?minutes:"0" + minutes;
	// 		seconds = seconds>9?seconds:"0" + seconds;
	// 		$(selected).html(day + "天" + house + ":" + minutes + ":" + seconds);
	// 	}
		
	// }

	// function colok1(){  //第一个倒计时
	// 	countDown("8/18/2016 17:46:00",".daojishi1 span");
	// 	timer = setTimeout(colok1,1000);
		
	// }
	// colok1();



	$(".gift-hot-name li").hover(function(){
		$(".all-games-icon-hide").eq($(this).index()).css("top","0");
	},function(){
		$(".all-games-icon-hide").eq($(this).index()).css("top","159px");
	})


})



















