<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><title>服务器列表_三国令官方网站_萌乐网</title><meta name="keywords" content="三国令,三国令网页游戏,三国令网页游戏攻略,三国令网页游戏最新开服,三国令网页游戏礼包,萌乐网三国令官方网站"><meta name="description" content="《三国令》，是由萌乐网推出，2016年首款“真人NPC定制”网游。该游戏以“真人NPC”玩法为核心，打破时空界限，并通过庞大的智能语音库支持，让玩家以“第一人称视角”与三国名将、美人零距离实时语音交互，触发全新冒险，并且随着主、支线剧情的深入，玩家将可以解锁更多由真人NPC演绎的创新玩法。"><link href="/images/home/<?php echo ($gamezhuti); ?>/css/reset.css" rel="stylesheet"><link href="/images/home/<?php echo ($gamezhuti); ?>/css/common.css" rel="stylesheet"><link href="/images/home/<?php echo ($gamezhuti); ?>/css/sever.css" rel="stylesheet"><script src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery.min.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script></head><body class="bg-col"><div class="wrapper_html" id="con-head"><div class="container_wrap"><header class="top" id="top-bj" style="margin-bottom: 313px;"><div class="top-nav content"><!--上方标题栏--><ul><li class="nav-li1"><a href="/" title="首页"></a></li><li class="nav-li2"><a href="/news" title="新闻资讯"></a></li><li class="nav-li3"><a href="/ziliao" title="游戏资料"></a></li><span class="game-ico"></span><li class="nav-li4"><a href="/gonglve" title="游戏攻略"></a></li><li class="nav-li5"><a href="HTTP://pay.<?php echo ($ai["url"]); ?>" target="_blank" title="充值中心"></a></li><li class="nav-li6"><a href="HTTP://bbs.<?php echo ($ai["url"]); ?>" target="_blank" title="玩家论坛"></a></li></ul></div><!--头部导航 end--></header><!--头部 end--><div class="servers"><div class="servermain"><div class="server-title"></div><div class="server-con"><div class="login"><div class="fl btn" id="login" ><span class="int in_name"><label>账号：</label><input type="text" value="" name="username" id="username"></span><span class="int in_word"><label>密码：</label><input type="password" value="" name="userpass" id="userpass"></span><p class="check in_check"><span><input value="1" name="rls" id="rls"  checked="checked" type="checkbox" style="width:15px;height:15px;margin-top:1px;"><label for="cookietime0">记住账号</label></span><span><a href="#" target="_blank">忘记密码？</a></span></p><input onClick="login();return false;" value="" type="button" class="but in_btn"></div><div id="se_list" style="display:none"><div class="ser-hy fl">									您好！<span id="uname"></span></div><div class="ser-hy fl" >									玩过的游戏：<span id="last_game_info"></span></div><div class="ser-hy fl" ><span></span><a id="exit" href="javascript:void(0);" onclick="exit();return false;">[退出]</a></div></div></div><div class="clearfix"><div class="inside_right f_r"><div class="news_list"><div class="newplay"><div class="tuijian"><h3>推荐服务器</h3></div><div class="s-server-list rec-server f-cf"><ul class="f-cf" id="history"><?php if(is_array($server1)): $i = 0; $__LIST__ = array_slice($server1,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($v['gid']); ?>&sid=<?php echo ($v['sid']); ?>" target="_blank">双线<?php echo ($v["sid"]); ?>服</a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><p class="s-name">												选择服务器
											</p><div class="" id="all-xz-server"><div class=" all"><div id="sp" class="sp"><ul id="server_ban" class="sp-pager f-cf all_server_title clearfix"></ul><div class="sp-panel-wrap all_server_list s-server-list" id="server_all"><ul class="clearfix server_icon" ><?php if(is_array($server1)): $i = 0; $__LIST__ = $server1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="unblok fl"><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($vo['gid']); ?>&sid=<?php echo ($vo['sid']); ?>" t="/server_id=<?php echo ($vo['sid']); ?>" target="_blank"><span></span>双线<?php echo ($vo["sid"]); ?>服</a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div></div></div></div></div></div></div></div></div></div></div></body><script type="text/javascript" src="/js/home/jquery.pages.js"></script><script type="text/javascript">        $(document).ready(function(){
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