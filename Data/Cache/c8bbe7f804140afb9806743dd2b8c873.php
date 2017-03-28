<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title><?php echo ($game["gamename"]); ?>开服列表 - <?php echo ($ai["title"]); ?></title><meta name="description" content="开服列表,<?php echo ($game["gamename"]); ?>是一款仙侠题材的回合制角色扮演类网页游戏，玩家在游戏中扮演一位前朝皇族的后人，肩负着复兴祖国的重任，在师傅的指引下，开始闯荡江湖，寻找能帮助复国的上古十大神器。" /><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/list/css/list.css"/><link rel="icon" href="/favicon.ico" type="image/x-icon" /><script src="http://<?php echo ($ai["domain"]); ?>/js/home/jquery.js" type="text/javascript"></script><!--jquery--><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script></head><body><div class="warp" style="background: url(<?php echo ($vopic_list[3][img]); ?>) top center no-repeat; height:auto;"><div class="content"><div class="head1 rel"><div class="btn_box1 abs"><a href="http://<?php echo ($ai["domain"]); echo U('shortcut/game');?>?title=<?php echo ($game["gamename"]); ?>官网&url=<?php echo ($gametag); ?>" class="btn_xztb">下载桌面图标</a><a class="btn_sc tc" title="<?php echo ($ai["title"]); echo ($game["gamename"]); ?>开服列表" onclick="return add_favorite(this,'<?php echo ($game["gamename"]); ?>开服列表- <?php echo ($ai["title"]); ?>');" href="http://<?php echo ($ai["domain"]); echo U('server_list');?>" >加入收藏</a></div><div class="back b fr"><p class="xsk fl"><a href="HTTP://<?php echo ($ai["domain"]); echo U('/card');?>" target="_blank">领取新手卡</a></p><p class="zc fl"><a href="HTTP://<?php echo ($ai["domain"]); echo U('/member/register');?>" target="_blank">注&nbsp;&nbsp;册</a></p><p class="cz fl"><a href="HTTP://<?php echo ($ai["domain"]); echo U('/pay');?>" target="_blank">充值中心</a></p><p class="cz fl"><a href="<?php if((__URL__) == "/"): ?>/<?php else: ?>/<?php echo ($gametag); endif; ?>" rel="nofollow">返回官网</a></p></div></div><a href="<?php if((__URL__) == "/"): ?>/<?php else: ?>/<?php echo ($gametag); endif; ?>" class="logo abs pbtn" title="<?php echo ($game["gamename"]); ?>"><?php echo ($game["gamename"]); ?></a><div class="head2 rel"><div class="box"><div class="left"><div class="lbg"><div class="title st"><a href="<?php if((__URL__) == "/"): else: ?>/<?php echo ($gametag); endif; echo U('/gonggao');?>" target="_blank">更多&raquo;</a></div><div class="newslist"><ul><?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span class="fr">[<?php echo (date('m-d',$v["time"])); ?>]</span><a href="<?php if((__URL__) == "/"): ?>/<?php else: ?>/<?php echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" target="_blank"><em>·</em><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><div class="but"><a href="<?php if((__URL__) == "/"): else: ?>/<?php echo ($gametag); endif; echo U('/gonglve');?>" target="_blank" class="but1">游戏攻略</a><a href="http://<?php echo ($ai["bbs"]); ?>/" target="_blank" class="but2">游戏论坛</a></div><div class="gg_box"><div class="gg"><a href="#" target="_blank"><img src="http://image.91wan.com/yjxy/resource/list_pic/h003/h48/img201307271707530.jpg" width="140" height="170"/></a><a href="#" target="_blank"><img src="http://image.91wan.com/yjxy/resource/list_pic/h003/h69/img201309091024520.jpg" width="140" height="170"/></a></div></div><p><span>抵制不良游戏</span><span>拒绝盗版游戏</span><span>注意自我保护</span><span>谨防受骗上当</span></p><p><span>适度游戏益脑</span><span>沉迷游戏伤身</span><span>合理安排时间</span><span>享受健康生活</span></p></div></div><div class="right"><div class="rbg"><div class="tj"><div class="login"><span class="tjfwq">推荐服务器</span><div class="xs" id="login"><!--登录前与登录后隐藏的切换：引用样式xs为显示，引用样式yc为隐藏--><form method="get" onSubmit="login();return false;"><table width="445" cellpadding="0" cellspacing="0" border="0"><tr><td width="55">用户名：</td><td width="100"><div class="i_c"><input type="text" name="username" id="username" value="" tabindex="1" /></div></td><td width="45">密码：</td><td width="100"><div class="i_c"><input type="password" name="userpass" id="userpass" onKeyPress="InputKeyPress('frmLogin',event);" value="" tabindex="2" /></div></td><td width="50"><input class="dl pbtn" type="hidden" name="rls"  checked="checked" id="rls" value="sl" /><a href="javascript:void(0);" onclick="login();return false;" tabindex="3" class="dl pbtn">登录</a></td><td width="100"><a href="#" target="_blank" class="qq">使用QQ登录</a></td></tr></table></form></div><div class="dlh tr yc" id="se_list" style="display:none;"><table width="445" cellpadding="0" cellspacing="0" border="0"><tr><td width="150"></td><td align="right" width="300"><span id="username"><?php echo ($userinfo['uname']); ?></span> 欢迎您登录<?php echo ($ai["title"]); ?>平台! <a href="javascript:void(0);" onclick="exit();return false;">注销</a></td></tr></table></div><!--登录前与登录后隐藏的切换：引用样式xs为显示，引用样式yc为隐藏--></div><div class="tjbg"><div class="hot"><div class="hot1 b"><?php if(is_array($server1)): $i = 0; $__LIST__ = array_slice($server1,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($v['gid']); ?>&sid=<?php echo ($v['sid']); ?>" title="<?php echo ($v["line"]); echo ($v["sid"]); ?>服　<?php echo ($v["servername"]); ?>" target="_blank" style="cursor:pointer"><?php echo ($v["sid"]); ?>服-<?php echo ($v["servername"]); ?><span>火爆</span></a></p><?php endforeach; endif; else: echo "" ;endif; ?></div></div></div></div><div class="mine"><div class="search"><span>我的服务器</span><ul><li>输入服务器：</li><li class="i_s"><input type="text" name="val_ss" id="val_ss"/></li><li><a id="btn_ss" href="javascript:">进入</a></li></ul></div><div class="s" ><ul class="lbox" id="last_game_info"></ul></div></div><div class="all"><div class="state"><span>所有服务器</span><label><img src="http://image.91wan.com/yjxy/list/images/f.png" width="11" height="11" /> 畅通 <img src="http://image.91wan.com/yjxy/list/images/c.png" width="11" height="11" /> 拥挤 <img src="http://image.91wan.com/yjxy/list/images/h.png" width="11" height="11" /> 繁忙 <img src="http://image.91wan.com/yjxy/list/images/m.png" width="11" height="11" /> 维护 </label></div><div class="fw_tab"><ul class="tab_list" id="server_ban"></ul></div><div class="alllist" id="server_all"><ul class="lbox"><?php if(is_array($server1)): $i = 0; $__LIST__ = $server1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li ><a  href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($vo['gid']); ?>&sid=<?php echo ($vo['sid']); ?>" t="/server_id=<?php echo ($vo['sid']); ?>" target="_blank"><i></i><?php echo ($vo["sid"]); ?>服-<?php echo ($vo["servername"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div></div></div></div></div></div></div><!--all foot--><script type="text/javascript" >
var gid=<?php echo ($gameid); ?>;
</script><script src="/js/home/login.js"></script><script type="text/javascript" src="/js/home/jquery-1.7.2.min.js"></script><script type="text/javascript" src="/js/home/jquery.pages.js"></script><script type="text/javascript">$(document).ready(function(){
	

	//手工输入进入游戏
	$("#btn_ss").mouseover(function(){
		$(this).attr('href', 'gameplay.<?php echo ($ai["url"]); ?>/game_add.html??gid='+gid+'&sid=' + $("#val_ss").val());

	});
	$("#btn_ss").click(function(){
		var s = $.trim($("#val_ss").val());
		if ( !s || isNaN(s)) {
		  alert('请输入数字');
		  return false;
		}
	});
			
	//分页
	var Maxpage = 7;
	var GameTotal = '';
	GameTotal = $("#server_all li a:first").attr('t');
	GameTotal = GameTotal.substr(GameTotal.indexOf('server_id=') + 10);
	$("#server_all").pages('li', {
		size:35,class_on:'tab_item',page_event:'hover'
	}, "#server_ban", function(c, l, s){
		var str = '', r, x, y;
		for (var i = 1; i <=c; i ++) {
			r = $.fn.pages.prototype.get_range(i, c, s);
			x = $("#server_all li a"+r[1]+":first").attr('t');
			x = x.substr(x.indexOf('server_id=') + 10);
			y = $("#server_all li a"+r[1]+":last").attr('t');
			y = y.substr(y.indexOf('server_id=') + 10);
			str += '<li><a href="javascript:void(0)" class="pm_a" pages_number="'+i+'" style="cursor:pointer;">'+x+'-'+y+'服</a></li>';
			if(i>=Maxpage-1)break;
		}
	//str += '<li><a href="javascript:void(0)" pages_number="'+Maxpage+'" class="pm_a" id="lastpage" style="cursor:pointer;">'+(y-1)+'-'+'1服</a></li>';
		return str;
	});
			
	$("#lastpage").mouseover(function(){
		$(this).addClass('pm_a tab_item');
		$('#server_all ul li').hide().slice((Maxpage-1)*35,((Maxpage-1)*35+30)).show();
		var LeftGame = GameTotal - (Maxpage-1)*35;
		var leftpageNum = Math.ceil(LeftGame/30);
		
		var leftpagehtml = '';
		for(i=0; i<leftpageNum; i++){
			if(i==0){
				leftpagehtml +='<li><a href="javascript:void(0);" class="active">1</a></li>'
			}else{
				leftpagehtml +='<li><a href="javascript:void(0);">'+(i+1)+'</a></li>';
			}
		}
	    $("#page").html(leftpagehtml);$("#page").show();
	}).mouseout(function(){
		$('#server_all ul li').hide().slice((Maxpage-1)*35,((Maxpage-1)*35+30)).show();
		$("#page").show();
		$("#page li a").mouseover(function(){
			var $page_a = $("#page li a");
			var index = $page_a.index(this);
			$('#server_all ul li').hide().slice(((Maxpage-1)*35+index*30),((Maxpage-1)*35+(index+1)*30)).show();
			$("#page li a").removeClass().eq(index).addClass('active');
	    });
	});
	
	$('#server_ban li:lt('+(Maxpage-1)+')').mouseover(function(){
		$("#page").hide();
	});
    	
})
</script></body></html>