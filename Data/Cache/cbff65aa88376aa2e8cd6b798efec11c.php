<?php if (!defined('THINK_PATH')) exit();?><!doctype html><!--[if lt IE 7 ]><html lang="zh" class="ie6"><![endif]--><!--[if IE 7 ]><html lang="zh" class="ie7"><![endif]--><!--[if IE 8 ]><html lang="zh" class="ie8"><![endif]--><!--[if IE 9 ]><html lang="zh" class="ie9"><![endif]--><!--[if (gt IE 9)|!(IE)]><!--><html lang="zh"><!--<![endif]--><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><meta name="viewport" content="width=1200,initial-scale=1"><meta name="renderer" content="webkit"><meta name="keywords" content="大圣,大圣官网,37游戏大圣,大圣网页游戏"><meta name="description" content="大圣,大圣官网,37游戏大圣,大圣网页游戏"><meta name="frontend" content="szc"><title><?php echo ($game["gamename"]); ?>开服列表 - <?php echo ($ai["title"]); ?></title><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/global.css"/><link href="/images/home/<?php echo ($gamezhuti); ?>/css/dasheng_main.css" rel="stylesheet" type="text/css"/><script type="text/javascript" src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery.min.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script></head><body><div class="s-body"><div class="s-wrap"><div class="s-header"><a class="logo s-logo" href="/" target="_blank" title="大圣">大圣</a><div class="s-nav"><a id="s-nav1" href="/" target="_blank" title="进入官网">进入官网</a><a id="s-nav2" href="HTTP://bbs.<?php echo ($ai["url"]); ?>" target="_blank" title="游戏论坛">游戏论坛</a><a id="s-nav3" href="HTTP://pay.<?php echo ($ai["url"]); ?>" target="_blank" title="用户充值">用户充值</a><a id="s-nav4" href="javascript:;" onclick="try{window.external.addFavorite(document.location.href,document.title);}catch(e){try{window.sidebar.addPanel(document.location.href,document.title, '');}catch(e){alert('加入收藏失败，请使用Ctrl+D进行添加,或手动在浏览器里进行设置.');}}">收藏本页</a></div><div id="loginframe" class="s-loginframe" ><!-- 登录前 --><ul class="log" id="login"><li class="s-user"><input placeholder="请输入帐号" type="text" name="username" id="username" class="s-text"></li><li class="s-psw"><input type="password" name="userpass" id="userpass" placeholder="请输入密码" class="s-text"></li><li class="s-log-btn"><input class="in02" type="hidden" name="rls"  checked="checked" id="rls" value="sl" /><a rel="nofollow" href="#" onclick="login();return false;" title="登录">立即登录</a></li><li class="s-remember"><input type="checkbox" checked id="remember">&nbsp;
							<label for="remember">记住用户名</label>| 
							<a rel="nofollow" href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" target="_blank" title="忘记密码">忘记密码</a> | 
							<a rel="nofollow" id="btn-reg" href="http://reg.<?php echo ($ai["url"]); ?>/" target="_blank" title="马上注册">马上注册</a></li></ul><!-- 登录后 --><div class="loged" id="se_list" style="display:none;"><div class="loged-top">用户信息</div><div class="loged-panel"><ul><li>您好，<a class="loged-highlight" href="#" id="uname"></a></li><li>您上次进入的服是：</li><li id="last_game_info"></li><li class="loged-usercenter f-ar"><a target="_blank" href="http://user.<?php echo ($ai["url"]); ?>/">用户中心</a><a href="javascript:void(0);" onclick="exit();return false;">注销</a></li></ul></div><div class="loged-bottom"></div></div></div></div><div class="s-content"><p class="s-name">					推荐服务器
				</p><div class="s-server-list rec-server f-cf"><ul class="f-cf" id="history"><?php if(is_array($server1)): $i = 0; $__LIST__ = array_slice($server1,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($v['gid']); ?>&sid=<?php echo ($v['sid']); ?>" target="_blank"><?php echo ($v["sid"]); ?>服-<?php echo ($v["servername"]); ?></a></p></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><p class="s-name">					选择服务器
				</p><div class="" id="all-xz-server"><div id="nameList" class="f-cf" style="display: none;"><a data-name="654" data-type="1" data-nametype="<?php echo ($nametype); ?>">双线</a></div><div class=" all"><div id="sp" class="sp" data-kid="CE5A9B0A-21C8-4427-935B-39417A6F7D59"><ul id="server_ban" class="sp-pager f-cf all_server_title clearfix"></ul><div class="sp-panel-wrap all_server_list s-server-list" id="server_all"><ul class="clearfix server_icon" ><?php if(is_array($server1)): $i = 0; $__LIST__ = $server1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="unblok fl"><a  href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($vo['gid']); ?>&sid=<?php echo ($vo['sid']); ?>" t="/server_id=<?php echo ($vo['sid']); ?>" target="_blank"><span></span><?php echo ($vo["sid"]); ?>服-<?php echo ($vo["servername"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div></div></div></div></div></body><script type="text/javascript" src="/js/home/jquery.pages.js"></script><script type="text/javascript">        $(document).ready(function(){
          
          	//手工输入进入游戏
          	$("#btn_ss").mouseover(function(){
            	$(this).attr('href', 'http://www.752g.com/login/'+gid+'/' + $("#val_ss").val());
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

        
    </script><script type="text/javascript" >var gid=<?php echo ($gameid); ?>;
</script><script src="/js/home/login.js"></script></html>