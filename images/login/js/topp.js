
			var sma,sh1
			$("#sh_myinfo_a1").mouseover(function() {
				clearInterval(sma);
				$("#sh_myinfo").show();
				$("#sh_myinfo_li").attr("class", "xiala");
				window.parent.frames["rightFrame"].sh_myinfo(1);
			}).mouseout(function() {
				sma = setTimeout('$("#sh_myinfo").hide();window.parent.frames["rightFrame"].sh_myinfo(2);', 500);
			});
			$("#sh_myinfo_a2").mouseover(function() {
				clearInterval(sma);
				$("#sh_myinfo").show();
				window.parent.frames["rightFrame"].sh_myinfo(1);
			}).mouseout(function() {
				sma = setTimeout('$("#sh_myinfo").hide();$("#sh_myinfo_li").attr("class", "");window.parent.frames["rightFrame"].sh_myinfo(2);', 500);
			});

			$("#stat_homesite1").mouseover(function() {
				clearInterval(sh1);
				$("#sh_gameinfo").show();
				$("#sh_gameinfo_li").attr("class", "xiala");
				window.parent.frames["rightFrame"].sh_gameinfo(1);
			}).mouseout(function() {
				sh1 = setTimeout('$("#sh_gameinfo").hide();window.parent.frames["rightFrame"].sh_gameinfo(2);', 500);
			});
			$("#stat_homesite2").mouseover(function() {
				clearInterval(sh1);
				$("#sh_gameinfo").show();
				window.parent.frames["rightFrame"].sh_gameinfo(1);
			}).mouseout(function() {
				sh1 = setTimeout('$("#sh_gameinfo").hide();$("#sh_gameinfo_li").attr("class", "");window.parent.frames["rightFrame"].sh_gameinfo(2);', 500);
			});
			function div_position(o) {
				return $("#"+o).position();
			}
			function sh_my_game(o,i) {
				if(o == 'sh_gameinfo') {
					if(i == 1) {
						clearInterval(sh1);
					}else {
						sh1 = setTimeout(function() {$("#"+o).hide();$("#"+o+"_li").attr("class", "");window.parent.frames["rightFrame"].sh_gameinfo(2);}, 500);
					}
				}else if(o == 'sh_myinfo') {
					if(i == 1) {
						clearInterval(sma);
					}else {
						sma = setTimeout(function() {$("#"+o).hide();$("#"+o+"_li").attr("class", "");window.parent.frames["rightFrame"].sh_myinfo(2);}, 500);
					}
				}
			}
			//是否存在
			function is_leftbar(i) {
				if(i == 1) {
					$(".tools_top").css('background-position', '');
				}else {
					$(".tools_top").css('background-position', '-60px 0px');
				}
				$('#is_leftbar').val(i);
			}
