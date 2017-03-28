<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><title>村长征战团新区_村长征战团开服表_村长征战团今日开服表_村长征战团新开服表_752G村长征战团</title><meta name="keywords" content="村长征战团新开服表,村长征战团今日开服表,村长征战团今日新服,村长征战团开服时间，村长征战团鬼服"><meta name="description" content="752G村长征战团网页游戏服务器列表,包括村长征战团开服表,新开服表,新区,以及今日新开服表。想知道新村长征战团开服时间表，赶快来官网查看吧。"><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/style.css"/><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/server.css"/><script src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery.min.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script></head><body><div id="content"><div class="wrap"><div class="header"><a href="/" class="logo"></a><div class="menu"><a href="/" class="m1">官网首页</a><a href="/news" class="m2">新闻中心</a><a href="/huodong" class="m3">热门活动</a><a href="/ziliao" class="m4">游戏资料</a><a href="HTTP://gm.<?php echo ($ai["url"]); ?>" target="_blank" class="m5">客服中心</a><a href="HTTP://bbs.<?php echo ($ai["url"]); ?>" class="m6">游戏论坛</a></div><div class="tips f20">					魔性村长震撼开启
				</div><div class="flash"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="Mask" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" width="1920" height="614"><param name="allowScriptAccess" value="always"/><param name="allowFullScreen" value="true"><param name="loop" value="true"><param name="play" value="true"><param name="menu" value="true"><param name="quality" value="high"><param name="wmode" value="transparent"><param name="flashvars" value="winType=interior&amp;auto_play=0"><param name="movie" value="/images/home/<?php echo ($gamezhuti); ?>/images/topf.swf"><embed name="Mask" allowfullscreen="true" flashvars="winType=interior&amp;auto_play=0" width="1920" height="614" loop="true" menu="true" play="true" pluginspage="http://www.macromedia.com/go/getflashplayer" quality="high" src="/images/home/<?php echo ($gamezhuti); ?>/images/topf.swf" allowscriptaccess="always" type="application/x-shockwave-flash" wmode="transparent"></embed></object><a href="/server_list"></a></div></div><div class="clearfix"><div class="inside_right f_r"><div class="news_list"><div class="news_list_tit"><h4 class="f18 f_l">服务器列表</h4></div><div class="s-content"><p class="s-name">					推荐服务器
				</p><div class="s-server-list rec-server f-cf"><ul class="f-cf" id="history"><?php if(is_array($server1)): $i = 0; $__LIST__ = array_slice($server1,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($v['gid']); ?>&sid=<?php echo ($v['sid']); ?>">双线<?php echo ($v["sid"]); ?>服</a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><p class="s-name">					选择服务器
				</p><div class="" id="all-xz-server"><div class=" all"><div id="sp" class="sp"><ul id="server_ban" class="sp-pager f-cf all_server_title clearfix"></ul><div class="sp-panel-wrap all_server_list s-server-list" id="server_all"><ul class="clearfix server_icon" ><?php if(is_array($server1)): $i = 0; $__LIST__ = $server1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="unblok fl"><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($vo['gid']); ?>&sid=<?php echo ($vo['sid']); ?>" t="/server_id=<?php echo ($vo['sid']); ?>" target="_blank"><span></span><?php echo ($vo["sid"]); ?>服-<?php echo ($vo["servername"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div></div></div></div></div><div class="inside_left f_l"><div class="server f14 step"><!--登录--><div id="loginframe" class="blink login" ><!-- 登录前 --><div class="log" id="login" ><ul ><li class="user"><label>帐号</label><input type="text" name="username" id="username" class="text" placeholder="帐号 "></li><li class="psw"><label>密码</label><input type="password" name="userpass" id="userpass" class="text" placeholder="密码"></li><li class="remember"><input class="in02" type="hidden" name="rls"  checked="checked" id="rls" value="sl" /><input type="checkbox" checked="checked" id="remember"><label for="remember">自动登录</label></li><li class="get-psw"><a target="_blank" title="找回密码" href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" rel="nofollow">忘记密码？</a></li><li class="log-btn"><a class="block-a" title="登录" id="log-btn" href="javascript:;" onclick="login();return false;"  ></a></li></ul></div><!-- 登录后 --><div class="loged" id="se_list" style="display:none;"><div class="loged-top">用户信息</div><div class="loged-panel"><ul><li>您好，<a class="loged-highlight" id="uname">888</a></li><li><a target="_blank" href="http://user.<?php echo ($ai["url"]); ?>/">完善密保资料</a></li><li>您上次进入的服是：</li><li id="last_game_info"></li><li class="loged-usercenter f-ar"><a target="_blank" href="#">用户中心</a><a href="javascript:void(0);" onclick="exit();return false;" id="logout">注销</a></li></ul></div><div class="loged-bottom"></div></div></div><a class="btn-red server-more" target="_blank" href="/server_list">全部服务器列表 +</a></div><div class="active step"><a href="http://libao.<?php echo ($ai["url"]); ?>" target="_blank" class="b1"><h3 class="f24">新手卡</h3><p>            NOVICE CARD
          </p><em class="m1"></em><i></i></a><a href="HTTP://www.<?php echo ($ai["url"]); ?>/dlq/setup.exe" target="_blank" class="b2"><h3 class="f24">游戏盒子</h3><p>            INSTRUCTOR RECRUITMENT
          </p><em class="m1"></em><i></i></a><a href="http://pay.<?php echo ($ai["url"]); ?>" target="_blank" class="b3"><h3 class="f24">游戏充值</h3><p>            VIP AREA
          </p><em class="m2 f_r"></em><i></i></a></div><dl class="issue f14 step"><dt>客服中心</dt><dd><ul class="link clearfix"><li><a href="http://gm.<?php echo ($ai["url"]); ?>" target="_blank"><em class="m1"></em>在线客服</a></li><li><a href="http://pay.<?php echo ($ai["url"]); ?>" target="_blank"><em class="m2"></em>充值中心</a></li><li><a href="http://user.<?php echo ($ai["url"]); ?>" target="_blank"><em class="m3"></em>个人中心</a></li></ul><p style="padding-left:15px;">            客服电话：<?php echo ($ai["tel"]); ?></p><p style="padding-left:15px;margin-top:10px;">            客服邮箱：<?php echo ($ai["mail"]); ?></p></dd></dl></div></div></div></div></body><script type="text/javascript" src="http://tmsh.752g.com/js/home/jquery.pages.js"></script><script type="text/javascript">        $(document).ready(function(){

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

var gid=<?php echo ($gameid); ?>;
</script><script src="/js/home/login.js"></script></html>