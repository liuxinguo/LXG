<?php if (!defined('THINK_PATH')) exit();?><!doctype html><!--[if lt IE 7 ]><html lang="zh" class="ie6"><![endif]--><!--[if IE 7 ]><html lang="zh" class="ie7"><![endif]--><!--[if IE 8 ]><html lang="zh" class="ie8"><![endif]--><!--[if IE 9 ]><html lang="zh" class="ie9"><![endif]--><!--[if (gt IE 9)|!(IE)]><!--><html lang="zh"><!--<![endif]--><head><meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><meta name="viewport" content="width=1200, initial-scale=1"><meta name="renderer" content="webkit"><meta name="keywords" content="风暴大陆,风暴大陆官网,752g风暴大陆,风暴大陆网页游戏"/><meta name="description" content="风暴大陆,风暴大陆官网,752g风暴大陆,风暴大陆网页游戏" /><meta name="frontend" content="szc" /><title><?php echo ($game["gamename"]); ?>开服列表 - <?php echo ($ai["title"]); ?></title><script src="http://<?php echo ($ai["domain"]); ?>/js/home/jquery.js" type="text/javascript"></script><!--jquery--><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/37/global.css?t=20160128150757"/><link href="/images/home/<?php echo ($gamezhuti); ?>/css/fbdl_main.css?v=1456109705" rel="stylesheet" type="text/css"/><script type="text/javascript">
    var g_config = {
        id: 336,
        name: "风暴大陆",
        secDir: false,
        key: "fbdl",
        url: "http://fbdl.<?php echo ($ai["url"]); ?>/",
        page: "serverlist"
    };
</script></head><body><div class="s-body"><div class="s-wrap"><div class="s-header"><a class="s-logo" href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>" target="_blank" title="风暴大陆">风暴大陆</a><!-- nav --><div class="s-nav"><a id="s-nav1" href="/" target="_blank" title="进入官网">进入官网</a><a id="s-nav2" href="http://bbs.<?php echo ($ai["url"]); ?>/" target="_blank" title="游戏论坛">游戏论坛</a><a id="s-nav3" href="http://pay.<?php echo ($ai["url"]); ?>/" target="_blank" title="用户充值">用户充值</a><a id="s-nav4" href="javascript:;" target="_self" class="bookmark" id="bookmark" title="收藏本页">收藏本页</a></div><!-- login --><div id="loginframe" class="s-loginframe"><ul id="login" class="log"><li class="s-user"><input placeholder="请输入帐号" type="text" name="username" id="username" class="s-text"></li><li class="s-psw"><input type="password" name="userpass" id="userpass" placeholder="请输入密码" class="s-text"></li><li class="s-log-btn"><a rel="nofollow" href="#" onclick="login();return false;" class="block-a" title="登录">马上登录</a></li><li class="s-remember"><input type="checkbox" checked="checked" id="remember">&nbsp;
						<input class="in02" type="hidden" name="rls"  checked="checked" id="rls" value="sl" /><label for="remember">记住用户名（慎用）</label></li><li class="s-psw-btn"><a rel="nofollow" href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" target="_blank" title="忘记密码">忘记密码</a></li><li class="s-reg-btn"><a rel="nofollow" id="btn-reg" href="http://reg.<?php echo ($ai["url"]); ?>/" target="_blank" title="马上注册">马上注册</a></li></ul><div class="s-loged" id="se_list" style="display:none;"><div class="loged-panel"><ul><li>您好，<a id="uname" ></a></li><li>最近玩过：</li><li id="last_game_info"></li><li><a target="_blank" href="http://user.<?php echo ($ai["url"]); ?>/">用户中心</a>&nbsp;&nbsp;&nbsp;<a  href="javascript:void(0);" onclick="exit();return false;">注销</a></li></ul></div></div></div></div><div class="s-content"><!-- recommend server --><div class="s-server-list rec-server f-cf"><!--<p class="s-name s-name-rec">推荐服务器</p>--><ul class="f-cf" id="rec-server"><?php if(is_array($server1)): $i = 0; $__LIST__ = array_slice($server1,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li data-area="0"><a data-role="server" target="_blank" href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($v['gid']); ?>&sid=<?php echo ($v['sid']); ?>"> 双线<?php echo ($v["sid"]); ?>服&nbsp;&nbsp;<span class="server-tip-2">火爆开启</span></a><span class="get-state-107"></span></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><!-- quick ingame --><div class="s-quick-ingame"><input type="text" name="val_ss" id="val_ss" class="s-fastin-input"/> 服 
                  <a id="btn_ss" href="javascript:" class="s-fastin-btn">快速进入</a></div></div><!-- all server--><div class="s-server-list all"><div class="sp"><ul id="server_ban" class="sp-pager f-cf"></ul><div class="sp-panel-wrap"><ul class="sq-panel f-cf" id="server_all"><?php if(is_array($server1)): $i = 0; $__LIST__ = $server1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-area="0"><a data-role="server" target="_blank" href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($vo['gid']); ?>&sid=<?php echo ($vo['sid']); ?>" t="/server_id=<?php echo ($vo['sid']); ?>"> 双线<?php echo ($vo["sid"]); ?>服&nbsp;&nbsp;<span class="server-tip-2">火爆开启</span></a><span class="get-state-2"></span></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div></div></div></div><script type="text/javascript" src="/images/home/<?php echo ($gamezhuti); ?>/js/sq.core.js?t=20140327115259"></script><script type="text/javascript" id="sq-statis-refer" src="/images/home/<?php echo ($gamezhuti); ?>/js/sq.game.all.js?t=20160202091234"></script><script type="text/javascript" src="/images/home/<?php echo ($gamezhuti); ?>/js/jcarousellite_1.0.1.js"></script><script type="text/javascript" src="/images/home/<?php echo ($gamezhuti); ?>/js/fbdl_main.js?t=1456109705"></script><script type="text/javascript" >
var gid=<?php echo ($gameid); ?>;
</script><script src="/js/home/login.js"></script><script type="text/javascript" src="/js/home/jquery-1.7.2.min.js"></script><script type="text/javascript" src="/js/home/jquery.pages.js"></script><script type="text/javascript">$(document).ready(function(){
	

	//手工输入进入游戏
	$("#btn_ss").mouseover(function(){
		$(this).attr('href', 'http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html??gid='+gid+'&sid=' + $("#val_ss").val());

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
			str += '<li class="on"><a href="javascript:void(0)" class="pm_a" pages_number="'+i+'" style="cursor:pointer;">'+x+'-'+y+'服</a></li>';
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