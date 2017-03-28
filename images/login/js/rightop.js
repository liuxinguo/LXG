
	//是否存在
	function is_leftbar(i) {
		$('#is_leftbar').val(i);
	}
	var sma,sh1;
	function sh_myinfo(i) {
		if(i == 1) {
			clearInterval(sma);
			$("#sh_myinfo_d").show();
			if($('#is_leftbar').val() == 0) {//无
				$("#sh_myinfo_d").css('left', (window.parent.frames["topFrame"].div_position('sh_myinfo_li').left-0)+"px").css('top', '0px');
			}else if($('#is_leftbar').val() == 1) {//打开
				$("#sh_myinfo_d").css('left', (window.parent.frames["topFrame"].div_position('sh_myinfo_li').left-121)+"px").css('top', '0px');
			}else {//缩起
				$("#sh_myinfo_d").css('left', (window.parent.frames["topFrame"].div_position('sh_myinfo_li').left-51)+"px").css('top', '0px');
			}
		}else {
			$("#sh_myinfo_d").hide();
		}
	}
	function sh_gameinfo(i) {
		if(i == 1) {
			clearInterval(sh1);
			$("#sh_gameinfo_d").show();
			if($('#is_leftbar').val() == 0) {//无
				$("#sh_gameinfo_d").css('left', (window.parent.frames["topFrame"].div_position('sh_gameinfo_li').left-0)+"px").css('top', '0px');
			}else if($('#is_leftbar').val() == 1) {//打开
				$("#sh_gameinfo_d").css('left', (window.parent.frames["topFrame"].div_position('sh_gameinfo_li').left-121)+"px").css('top', '0px');
			}else {//缩起
				$("#sh_gameinfo_d").css('left', (window.parent.frames["topFrame"].div_position('sh_gameinfo_li').left-51)+"px").css('top', '0px');
			}
		}else {
			$("#sh_gameinfo_d").hide();
		}
	}
	function sh_myinfo_d_mouseover() {
		clearInterval(sma);
		window.parent.frames["topFrame"].sh_my_game('sh_myinfo',1);
	}
	function sh_myinfo_d_mouseout() {
		window.parent.frames["topFrame"].sh_my_game('sh_myinfo',2);
		sma = setTimeout('$("#sh_myinfo_d").hide();', 500);
	}
	function sh_gameinfo_d_mouseover() {
		clearInterval(sh1);
		window.parent.frames["topFrame"].sh_my_game('sh_gameinfo',1);
	}
	function sh_gameinfo_d_mouseout() {
		window.parent.frames["topFrame"].sh_my_game('sh_gameinfo',2);
		sh1 = setTimeout('$("#sh_gameinfo_d").hide();', 500);
	}