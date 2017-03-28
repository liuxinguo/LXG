<?php if (!defined('THINK_PATH')) exit();?><!doctype html><!--[if lt IE 7 ]><html lang="zh" class="ie6"><![endif]--><!--[if IE 7 ]><html lang="zh" class="ie7"><![endif]--><!--[if IE 8 ]><html lang="zh" class="ie8"><![endif]--><!--[if IE 9 ]><html lang="zh" class="ie9"><![endif]--><!--[if (gt IE 9)|!(IE)]><!--><html lang="zh"><!--<![endif]--><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><meta name="viewport" content="width=1200,initial-scale=1"><meta name="renderer" content="webkit"><meta name="keywords" content="仙境物语,仙境物语官网,752G-游戏仙境物语,仙境物语网页游戏"><meta name="description" content="仙境物语,仙境物语官网,752G-游戏仙境物语,仙境物语网页游戏"><title><?php echo ($game["gamename"]); ?>开服列表 - <?php echo ($ai["title"]); ?></title><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/global.css"><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/roxj_main.css"><script type="text/javascript" src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery.min.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script></head><body><div class="s-body"><div class="s-wrap"><div class="s-header"><a class="s-logo" href="/" target="_blank" title="仙境物语">仙境物语</a><div class="s-nav"><a href="/" target="_blank" title="进入官网">进入官网</a><a href="HTTP://libao.<?php echo ($ai["url"]); ?>" target="_blank" title="领取礼包">领取礼包</a><a href="HTTP://pay.<?php echo ($ai["url"]); ?>" target="_blank" title="用户充值" rel="nofollow">用户充值</a><a href="HTTP://bbs.<?php echo ($ai["url"]); ?>" target="_blank" title="游戏论坛">游戏论坛</a></div><div id="loginframe" class="s-loginframe"><ul class="log" id="login"><li class="s-user"><input placeholder="请输入帐号" type="text" name="username" id="username" class="s-text"></li><li class="s-psw"><input type="password" name="userpass" id="userpass"  placeholder="请输入密码" class="s-text"></li><li class="s-log-btn"><input class="in02" type="hidden" name="rls"  checked="checked" id="rls" value="sl" /><a rel="nofollow" class="block-a" title="登录" href="#" onclick="login();return false;"></a></li><li class="s-remember"><input type="checkbox" checked id="remember">&nbsp;<label for="remember">记住用户名（慎用）</label></li><li class="s-get-psw"><a rel="nofollow" href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" target="_blank" title="忘记密码">忘记密码</a></li><li class="s-reg-btn"><a rel="nofollow" id="btn-reg" href="http://reg.<?php echo ($ai["url"]); ?>/" target="_blank" title="马上注册">马上注册</a></li></ul><div class="loged" id="se_list" style="display:none;"><div class="loged-panel"><ul><li>您好，<a class="colored" id="uname"></a></li><li>最近玩过：</li><li id="last_game_info"></li><li><a target="_blank" href="http://user.<?php echo ($ai["url"]); ?>/">用户中心</a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="exit();return false;">注销</a></li></ul></div></div></div></div><div class="s-content"><div class="s-server-list rec-server"><p class="s-name">					推荐服务器
				</p><ul class="cls" id="rec-server"><?php if(is_array($server1)): $i = 0; $__LIST__ = array_slice($server1,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($v['gid']); ?>&sid=<?php echo ($v['sid']); ?>" >双线<?php echo ($v["sid"]); ?>服&nbsp;&nbsp;<strong class="server-tip-2">火爆开启</strong></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><div id="quick-ingame" class="quick-ingame">				立即选择 <input type="text" id="quick-enter-input" value="1" class="fastin-input"> 服 
				<a id="quick-enter-click" target="_blank" href="#" class="fastin-btn">快速进入</a></div><div class="s-server-list all"><div id="sp" class="sp" data-kid="CE5A9B0A-21C8-4427-935B-39417A6F7D59"><ul id="server_ban" class="sp-pager f-cf all_server_title clearfix"></ul><div class="sp-panel-wrap all_server_list" id="server_all"><ul class="clearfix server_icon" ><?php if(is_array($server1)): $i = 0; $__LIST__ = $server1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="unblok fl"><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($vo['gid']); ?>&sid=<?php echo ($vo['sid']); ?>" t="/server_id=<?php echo ($vo['sid']); ?>" target="_blank" ><span></span><?php echo ($vo["servername"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div></div></div></div></body><script type="text/javascript" src="/js/home/jquery.pages.js"></script><script type="text/javascript" >var gid=<?php echo ($gameid); ?>;
</script><script src="/js/home/login.js"></script><script type="text/javascript">        $(document).ready(function(){
          
          	//手工输入进入游戏
          	$("#btn_ss").mouseover(function(){
            	$(this).attr('href', 'http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid='+gid+'&sid=' + $("#val_ss").val());
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
    </script></html>