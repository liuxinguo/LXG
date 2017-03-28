<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>游戏盒子</title><meta name="keywords" content=""/><meta name="description" content=""/><link href="http://<?php echo ($ai["domain"]); ?>/images/hezi/css/style.css" rel="stylesheet" type="text/css" /><script language="javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script></head><body><div class="wrap_div"><div class="wrap1_div"><div class="wrap_left2 fl"><p class="jrtj_p"></p><a href="http://directtotab:2"  class="lhzslb_a"><img src="http://gamebox.files.49you.com/gamebox/20140721/53ccd69994935.jpg" width="273" height="190" /></a><p class="lhzs_p"><a href="http://directtotab:2" >国内最贴心游戏盒子</a></p><ul class="jrtjyx_ul"><li style=""><a href="http://directtotab:3" class="jrtjyximg_a"><img src="http://gamebox.files.49you.com/gamebox/20140721/53ccd724dcd56.jpg" width="129" height="99" /></a><p class="jrtjyx_p"><a href="http://gamebox.49you.com/server_list.html?gid=89">热血沙城</a></p></li><li style=" margin-right:0px;"><a href="http://directtotab:3" class="jrtjyximg_a"><img src="http://gamebox.files.49you.com/gamebox/20140721/53ccd73051325.jpg" width="129" height="99" /></a><p class="jrtjyx_p"><a href="http://gamebox.49you.com/server_list.html?gid=47">烈火战神千服盛典</a></p></li><li style=""><a href="http://directtotab:3" class="jrtjyximg_a"><img src="http://gamebox.files.49you.com/gamebox/20140721/53ccd73c4584b.jpg" width="129" height="99" /></a><p class="jrtjyx_p"><a href="http://gamebox.49you.com/server_list.html?gid=96">七杀新传奇世界</a></p></li><li style=" margin-right:0px;"><a href="http://directtotab:3" class="jrtjyximg_a"><img src="http://gamebox.files.49you.com/gamebox/20140721/53ccd77bc2fee.jpg" width="129" height="99" /></a><p class="jrtjyx_p"><a href="http://gamebox.49you.com/server_list.html?gid=89">魔龙诀称霸沙城</a></p></li></ul></div><div class="wrap_right2 fl"><h1 class="head_h1"><img src="http://<?php echo ($ai["domain"]); ?>/images/hezi/images/shoubingicon.png" height="11" /> 最近玩过的游戏</h1><ul class="jrtjyx2_ul"></ul><p class="fenye_p"></p></div></div><script src="http://gamebox.49you.com/js/jquery-1.7.2.js"></script><script type = "text/javascript" >
function logingame(url){
    if(typeof(window.external.logingame) == 'undefined' ){
        window.location.href = url;
    }else{
        window.external.logingame(url);
    }
}
        
function GetQueryString(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
	var r = window.location.search.substr(1).match(reg);
	if (r != null)
		return (r[2]);
	return null;
}
var p = GetQueryString("p");
if (p == null || p < 1) {
	p = 1;
}
$(document).ready(function () {
	$.ajax({
		type : "get",
		async : true,
		url : api_hezi+"/boxgameLog",
		data : {},
		dataType : "jsonp",
		jsonp : "callback",
		jsonpCallback : "_apiGameAll",
		success : function (json) {
			var pagenum = 15; //每页数量
			var page = parseInt(json.length / pagenum) + 1;
			if (p >= page) {
				p = page;
			}
			var count = pagenum * (p * 1 - 1);

			for (var x = count; x < (count + pagenum); x++) {
				if (x < json.length) {
                    var sname = json[x].mg_server_name;
                    var sid = json[x].mg_server_id;
                    var snum = json[x].mg_server_id +"服" ;
                    snum = snum == null ? "测试服" : snum;
                    var gname = json[x].game_name + snum;
					$('.jrtjyx2_ul').append('<li '+((x+1)%5==0 ?  'style="margin-right:0;"' : "")+'><a href="#" class="jrtjyximg2_a" title="'+ gname +'" onclick="logingame(\'http://gameplay.<?php echo ($ai["url"]); ?>/righ.html?gid='+json[x].game_id+'&sid='+sid+'&hezi=1\')"><img src="'+image_url + json[x].ico + '" width="82" height="82"><span>'+ snum +'</span></a><p class="jrtjyx_p2"><a href="#"onclick="logingame(\'http://gameplay.<?php echo ($ai["url"]); ?>/righ?gid='+json[x].game_id+'&sid='+sid+'\')">' + gname + '</a></p></li>');
				}
			}
			if (p >= page) {
				$('.jrtjyx2_ul').append('<li><a href="http://directtotab:3" class="jrtjyximg2_a"><img src="http://<?php echo ($ai["domain"]); ?>/images/hezi/images/addgame.png" width="82" height="82"></a><p class="jrtjyx_p2"><a href="/games_daquan.html">更多游戏</a></p></li>');
			}
			var texts = '';
			for (var i = 1; i <= page; i++) {
				var text = '<a href="?p=' + i + '">' + i + '</a>';
				texts = texts + text;
			}

			$('.fenye_p').html('<a href="?p=' + (p * 1 - 1) + '" class="prev_a"><img src="http://<?php echo ($ai["domain"]); ?>/images/hezi/images/previcon.jpg" width="6" height="7"></a>' + texts + '<a href="?p=' + (p * 1 + 1) + '" class="next_a"><img src="http://<?php echo ($ai["domain"]); ?>/images/hezi/images/nexticon.jpg" width="6" height="7"></a>');
		},
		error : function () {}
	});
});
 </script></body></html>