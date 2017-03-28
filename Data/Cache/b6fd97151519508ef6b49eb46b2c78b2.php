<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><title><?php echo ($game["gamename"]); ?>开服列表 - <?php echo ($ai["title"]); ?></title><meta name="description" content=""><meta name="keywords" content=""><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/><meta name="renderer" content="webkit"><meta http-equiv="Cache-Control" content="no-siteapp"/><meta name="applicable-device" content="pc"><meta name="robots" content="all"/><meta name="viewport" content="width=device-width,user-scalable=yes"><meta name="keywords" content="仙渝,仙渝网页游戏,仙渝网页游戏攻略,仙渝网页游戏最新开服,仙渝网页游戏礼包,萌乐网仙渝官方网站"><meta name="description" content="《仙渝》，是萌乐网首款“玩家定制修仙”网游《仙谕》，根据同名修仙小说改编，首创“MMORPG2.0”核心体系，推出仙盟、天脉、神炼等原创玩法，并以沙盒式开放世界，线性剧情设定，将主动权交还给玩家，让玩家可根据自己的意愿，定制剧情、玩法，缔造心中的完美仙界。"><link rel="stylesheet" href="/images/home/<?php echo ($gamezhuti); ?>/css/reset.css"/><link rel="stylesheet" href="/images/home/<?php echo ($gamezhuti); ?>/css/game.css"/><link rel="stylesheet" href="/images/home/<?php echo ($gamezhuti); ?>/css/server.css"/><link rel="stylesheet" href="/images/home/<?php echo ($gamezhuti); ?>/css/common.css"/><script src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery.min.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script></head><body class="body-bj"><div class="wrapper_html herder-bj1"><div class="container_wrap"><header style="height: 467px;"><div class="nav content"><ul><li class="nav-li1" style="margin-left:388px;"><a href="/" title="首页">官网首页</a></li><li class="nav-li2"><a href="/ziliao" title="游戏资料">游戏资料</a></li><li class="nav-li3"><a href="/news" title="新闻资讯">新闻资讯</a></li><li class="nav-li4"><a href="/gonglve" title="游戏攻略">游戏攻略</a></li><li class="nav-li5"><a target="_blank" href="HTTP://pay.<?php echo ($ai["url"]); ?>" title="充值中心">充值中心</a></li><li class="nav-li6"><a target="_blank" href="HTTP://bbs.<?php echo ($ai["url"]); ?>" title="玩家论坛">玩家论坛</a></li></ul><div class="logo"><a href="/"></a></div></div></header><!--头部 end--><div class="servers"><div class="servermain"><div class="server-title"></div><div class="server-con"><div class="login"><div class="fl btn" id="login"><span class="int in_name"><label>账号：</label><input type="text" value="" name="username" id="username"></span><span class="int in_word"><label>密码：</label><input type="password" value="" name="userpass" id="userpass"></span><p class="check in_check"><span><input value="1" name="rls" id="rls" checked="checked" type="checkbox" style="width:15px;height:15px;margin-top:1px;"><label for="cookietime0">记住账号</label></span><span><a href="#" target="_blank">忘记密码？</a></span></p><input onclick="login();return false;"type="button" class="but in_btn"></div><div class="ser-hy fl" id="se_list" style="display:none">									您好！<span id="uname"></span><span>玩过的游戏：</span><div id="last_game_info" ></div><a href="javascript:void(0);" onclick="exit();return false;">[退出]</a></div></div><div class="clearfix"><div class="inside_right f_r"><div class="news_list"><div class="newplay"><div class="tuijian"><p class="s-name">推荐服务器</p></div><div class="s-server-list rec-server f-cf"><ul class="f-cf" id="history"><?php if(is_array($server1)): $i = 0; $__LIST__ = array_slice($server1,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($v['gid']); ?>&sid=<?php echo ($v['sid']); ?>" >双线<?php echo ($v["sid"]); ?>服</a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><p class="s-name">												选择服务器
											</p><div class="" id="all-xz-server"><div class=" all"><div id="sp" class="sp"><ul id="server_ban" class="sp-pager f-cf all_server_title clearfix"></ul><div class="sp-panel-wrap all_server_list s-server-list" id="server_all"><ul class="clearfix server_icon" ><?php if(is_array($server1)): $i = 0; $__LIST__ = $server1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="unblok fl"><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($vo['gid']); ?>&sid=<?php echo ($vo['sid']); ?>" t="/server_id=<?php echo ($vo['sid']); ?>" target="_blank" ><span></span><?php echo ($vo["servername"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div></div></div></div></div></div></div></div></div></div></div></body><script type="text/javascript" src="http://tmsh.752g.com/js/home/jquery.pages.js"></script><script type="text/javascript">        $(document).ready(function(){
          
 
              
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