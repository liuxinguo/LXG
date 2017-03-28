
$(function() {

	// 我的消息
	$(".u-msg").hover(function(){
		$(".my-news").show();
	},function(){
		$(".my-news").hide();
	})

	// 登录
	$(".prev-denglu").click(function(){
		$(".denglu-login").show();
	})
	$(".colse").click(function(){
		$(".denglu-login").hide();
	})

	// 退出登录
	$(".exit").click(function(){
		$(".register-prev").show();
		$(".register-next").hide();
		$(".register_back").hide();
		$(".zhuye_register").show();
	})

	//所有游戏

	$(".all-games").hover(function(){
		$(".games-nav").show();
	},function(){
		$(".games-nav").hide();
	});


	// 签到

	$(".sign-body td").click(function(){
		var mydate = new Date();
		var day = mydate.getDate();
		var jifen = parseInt($(".jifen").html());
		jfen = jifen + 1;
		if(day == $(this).attr("date")){			
			$(this).addClass("yes");
			$(".sign-in span").html("已签到");	
			$(".jifen").html(jfen)		
		}
	})
	$(".sign-data label").click(function(){
		$(".sign-data").hide();
	})
	$(".sign-in span").click(function(){
		$(".sign-data").show();
	})


	//开服列表

	$(".listbox-head>ul li").click(function(){
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
	
	$(".tab-change li").click(function(){
		$(this).addClass("tab-active").siblings().removeClass("tab-active");
		if($(this).index() == 0){
			$(".tbody_aa").show();
			$(".tbody_bb").hide();
		}else{
			$(".tbody_bb").show();
			$(".tbody_aa").hide();
		}
	})

	$(".tab-change li").click(function(){
		$(this).addClass("tab-active").siblings().removeClass("tab-active");
		if($(this).index() == 0){
			$(".tbody_cc").show();
			$(".tbody_dd").hide();
		}else{
			$(".tbody_dd").show();
			$(".tbody_cc").hide();
		}
	});

	

});





	// 返回顶部按钮
	function myEvent(obj,ev,fn){
		if(obj.attachEvent){
			obj.attachEvent('on'+ev,fn);
		}else{
			obj.addEventListener(ev,fn,false);
		}
	}
	myEvent(window,'load',function(){
		var oRTT=document.getElementById('rtt');
		// var guding=document.getElementById('guding');
		// var pH=document.documentElement.clientHeight;
		
		var timer=null;
		var scrollTop;
		window.onscroll=function(){
			scrollTop=document.documentElement.scrollTop||document.body.scrollTop;
			if(scrollTop>= 200){
				oRTT.style.display='block';
			}else{
				oRTT.style.display='none';
			}
			return scrollTop;
		};
		$(".erweima").hover(function(){
			$(".weima").show();
		},function(){
			$(".weima").hide();
		})
		oRTT.onclick=function(){
			clearInterval(timer);
			timer=setInterval(function(){
				var now=scrollTop;
				var speed=(0-now)/10;

				speed=speed>0?Math.ceil(speed):Math.floor(speed);

				if(scrollTop==0){
					clearInterval(timer);
				}
				document.documentElement.scrollTop=scrollTop+speed;

				document.body.scrollTop=scrollTop+speed;

			}, 30);
		}
	});



	// flash动画弹出
	function getCookie(c_name){
		if(document.cookie.length > 0){
			c_start = document.cookie.indexOf(c_name + '=');
			if(c_start != -1){
				c_start = c_start + c_name.length + 1;
				c_end = document.cookie.indexOf(";",c_start);
				if(c_end == -1){
					c_end = document.cookie.length;
				}
				return unescape(document.cookie.substring(c_start,c_end));
			}
		}
		// return "";
	}

	function setCookie(c_name,value,expiredays){
		var exdate = new Date();
		exdate.setDate(exdate.getDate()+expiredays);
		document.cookie=c_name+ "=" +escape(value)+((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
	}
	h4 = 1;
	function checkCookie(){
		swfj = getCookie("swfj");
		if(swfj != null && swfj != ''){
			$(".pop-box").hide();
			$(".up-box").show();
			$(".pop-beiy").hide();
		}else{
			$(".pop-box").show();
			$(".up-box").hide();
			$(".pop-beiy").show();
			if(swfj != null && swfj != ''){
				setCookie('swfj','111','h4');
			}
		}
	}
	checkCookie();
	setCookie('swfj','111','h4');

	
