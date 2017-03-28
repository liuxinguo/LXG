



window.onload = function(){

	// 左边

	$(".rechange_way li").bind("click",function(){
		$(this).addClass("rechange_way_active").siblings().removeClass("rechange_way_active");
		var num = $(this).index();
		
		switch(num){
			case 1:
			$(".rechange_card").hide();
			$(".rechange_blank").show();
			$(".rechange_explain_a").show().siblings().hide();
			break;

			case 2:
			$(".rechange_blank").hide();
			$(".rechange_explain_b").show().siblings().hide();
			break;

			case 3:
			$(".rechange_blank").hide();
			$(".rechange_explain ul").hide();
			break;

			case 4:
			$(".rechange_blank").hide();
			$(".rechange_explain_c").show().siblings().hide();
			break;

			case 5:
			$(".rechange_blank").hide();
			$(".rechange_explain_c").show().siblings().hide();
			break;

			case 6:
			$(".rechange_blank").hide();
			$(".rechange_explain_c").show().siblings().hide();
			break;

			case 7:
			$(".rechange_blank").hide();
			$(".rechange_explain_c").show().siblings().hide();
			break;
			case 8:
			$(".rechange_blank").hide();
			$(".rechange_explain_d").show().siblings().hide();
			break;
		}
	})

	// 右边

	$(".rechange_where li").bind("click",function(){
		$(this).addClass("rechange_active").siblings().removeClass("rechange_active");
		if($(this).index() == 1){
			$(".rechange_games").hide();
			$(".rechange_pingt").show();
		}else if($(this).index() == 0){
			$(".rechange_games").show();
			$(".rechange_pingt").hide();
		}
		
	})

	// 选择游戏

	
	$(".games_cont li").bind("click",function(){
		$(this).addClass("games_cont-active").siblings().removeClass("games_cont-active");
		$(".games_cont_detail ol").eq($(this).index()).show().siblings().hide();
	})

	$(".rechange_games_title span").bind("click",function(){
		$(".rechange_games_title").hide();
	})

	$(".games_cont_detail ol li").bind("click",function(){  //点击游戏名字来改变 选择充值游戏的 HTML
		$(".rechange_games_first >span").html($(this).html());
		
	})



	// 选择服数

	$(".games_name li").bind("click",function(){
		$(this).addClass("games_name-active").siblings().removeClass("games_name-active");
		// alert($(this).index());
		$(".games_name_detail ol").eq($(this).index()).show().siblings().hide();
	})
	$(".rechange_games_name span").bind("click",function(){
		$(".rechange_games_name").hide();
	})

	$(".rechange_games_last a").bind("click",function(){ //判断游戏名字为空时，不显示服数
		if($(".rechange_games_first >span").html() == "选择充值的游戏"){
			
			$(".games_name li:first-child").show().siblings().hide();
			$(".games_name_detail").hide();
		}
	})

	$(".games_name_detail ol li").bind("click",function(){  //点击游戏名字来改变 选择充值游戏的 HTML
		$(".rechange_games_last >span").html($(this).html());
	})






	// 封装充值金额和银行的函数
	function blank(second,speed){
		$(second).bind("click",function(){
			$(this).addClass(speed).siblings().removeClass(speed);
		})
	}
	blank('.rechange_money li',"rechange_money_active");//选择充值金额
	blank('.rechange_blank li',"rechange_blank_active");//选择银行






	$(".rechange_games_first a").bind("click",function(){
		$(".rechange_games_title").show();
		$(".rechange_games_name").hide();
	})


	$(".games_cont_detail li").click(function(){
		var gamesName= $(this).data("toggle");
		console.log(gamesName);
		$.ajax({
			type:"GET",
			async:false,
			url:"../json/games.json",
			success:function(games){
				console.log(games);
				var game = [];
				for(var i=0,lit=games.renxuejianghu.length;i<lit;i++){
					//console.log(games.tangmen[i].fuwuqi);
					game.push(games.renxuejianghu[i].fuwuqi);
					var lis = document.createElement("li");
					$(".games_name_detail_a").append(lis);
					$(".games_name_detail_a li").eq(i).html(game[i]);
				}

			}
			
		})

		$(".rechange_games_title").hide();
		$(".rechange_games_name").show();
		$(".games_name_detail li").click(function(){
			$(".rechange_games_name").show();
		})
		$(".games_name_detail_a li").click(function(){
			$(".rechange_games_last>span").html($(this).html());
			$(".rechange_games_name").hide();
		})
	})







	

}