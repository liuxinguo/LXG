<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>【<?php echo ($game["gamename"]); ?>官网】- <?php echo ($ai["title"]); ?></title><meta name="keywords" content="守卫雅典娜,守卫雅典娜官网,守卫雅典娜网页游戏,守卫雅典娜微端下载,守卫雅典娜职业"><meta name="description" content="<?php echo ($ai["title"]); ?>守卫雅典娜是一款西方暗黑写实类APRG网页游戏，守卫雅典娜以追寻圣衣，保护女神雅典娜对抗邪魔，守卫世界为主题。来守卫雅典娜官网下载客户端，一起保护女神雅典娜吧！"><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/jquery.lightbox.css?20160408102708"/><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/style.css?20160408102708"/><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/common_new_top.css?20160408102708" /><script src="/images/home/<?php echo ($gamezhuti); ?>/js/ajax.js?20160329105503" type="text/javascript"></script><script src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery.lightbox.min.js?20160329105503" type="text/javascript"></script><script src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery.SuperSlide.2.1.1.js?20160329105503" type="text/javascript"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script></head><body><div class="content"><div class="wrap"><div class="header"><a href="<?php if((__URL__) == "/"): else: echo ($gametag); endif; ?>" class="logo"></a><ul class="menu f16"><li><a href="<?php if((__URL__) == "/"): else: echo ($gametag); endif; ?>">                守卫官网
                <p>HOME</p></a></li><li class="m2"><a href="<?php if((__URL__) == "/"): else: echo ($gametag); endif; ?>news">                守卫新闻
                <p>NEWS</p></a></li><li><a href="<?php if((__URL__) == "/"): else: echo ($gametag); endif; ?>ziliao">                守卫资料
                <p>GAMEDATA</p></a></li><li><a href="http://pay.<?php echo ($ai["url"]); ?>" target="_blank" rel="nofollow">                守卫充值
                <p>PAY</p></a></li><li><a href="http://bbs.<?php echo ($ai["url"]); ?>" target="_blank" rel="nofollow">                守卫论坛
                <p>BBS</p></a></li></ul><dl class="server f14"><dt class="f_l"><div class="__data__" data_id="__data__[48913]" page="article" postfix="category_12511" style="display: none; "><div></div><span>首页服务器列表调用</span></div><?php if(is_array($server)): $i = 0; $__LIST__ = array_slice($server,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p><a target="_blank" class="f_r" href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($v['gid']); ?>&sid=<?php echo ($v['sid']); ?>"><?php echo ($v["servername"]); ?></a><span><label style="color:#d00606;">火爆</label></span></p><?php endforeach; endif; else: echo "" ;endif; ?></dt><dd class="f_l"><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>server_list" target="_blank" class="all"><em class="indent">+</em>更多服务器>></a><p><span>双线</span><input name="" type="text" id="sid" onkeyup="if(event.keyCode == 13){ enter_server(); }" class="input" /><span>服</span><a href="javascript:enter_server();" class="btn">进入</a></p></dd></dl><script type="text/javascript">		//快速进入服务器
		function enter_server(){
			var sid = $('#sid').val();
			if(sid){
				window.location.href = 'http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($gameid); ?>&sid='+ sid;
			}
		}
	</script></div><div class="clearfix"><div class="main_right f_r"><div class="clearfix"><div class="slide f_l pic_show"><div class="__data__" data_id="__data__[48928]" page="article" postfix="category_12511" style="display: none; "><div></div><span>首页幻灯</span></div><div class="bd"><ul><?php if(is_array($vopic_banner)): $i = 0; $__LIST__ = array_slice($vopic_banner,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($v["url"]); ?>" target="_blank" rel="nofollow"><img src="<?php echo ($v["img"]); ?>" width="600" height="250"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><ul class="hd"></ul></div><div class="news f_r issue"><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>news" class="more" rel="nofollow">more+</a><ul class="tit f14 hd"><li><a>综合</a><div class="__data__" data_id="__data__[48916]" page="article" postfix="category_12511" style="display: none; "><div></div><span>最新</span></div></li><li><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>news">新闻</a><div class="__data__" data_id="__data__[48919]" page="article" postfix="category_12511" style="display: none; "><div></div><span>新闻</span></div></li><li><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>gonggao">媒体</a><div class="__data__" data_id="__data__[48922]" page="article" postfix="category_12511" style="display: none; "><div></div><span>媒体</span></div></li><li><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>huodong">活动</a><div class="__data__" data_id="__data__[48925]" page="article" postfix="category_12511" style="display: none; "><div></div><span>活动</span></div></li></ul><div class="hot f16"><div class="__data__" data_id="__data__[49042]" page="article" postfix="category_12511" style="display: none; "><div></div><span>守卫雅典娜热点新闻</span></div><?php if(is_array($news)): $i = 0; $__LIST__ = array_slice($news,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" target="_blank" ><span style="color:#00ff00;"><strong><?php echo ($v["title"]); ?></strong></span></a><?php endforeach; endif; else: echo "" ;endif; ?></div><div class="txt bd"><ul><?php if(is_array($zonghe)): $i = 0; $__LIST__ = $zonghe;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span><?php echo (date('m-d',$v["time"])); ?></span><em>[综合]</em><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" title="<?php echo ($v["title"]); ?>" target="_blank" style=" color:#ff0000;  font-weight:bold; "/><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><ul><?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span><?php echo (date('m-d',$v["time"])); ?></span><em>[新闻]</em><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" title="<?php echo ($v["title"]); ?>" target="_blank" style=" color:#ff0000;  font-weight:bold; "/><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><ul><?php if(is_array($mtzx)): $i = 0; $__LIST__ = $mtzx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span><?php echo (date('m-d',$v["time"])); ?></span><em>[媒体]</em><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" title="<?php echo ($v["title"]); ?>" target="_blank" style=" color:#ff0000;  font-weight:bold; "/><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><ul><?php if(is_array($active)): $i = 0; $__LIST__ = $active;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span><?php echo (date('m-d',$v["time"])); ?></span><em>[活动]</em><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" title="<?php echo ($v["title"]); ?>" target="_blank" style=" color:#ff0000;  font-weight:bold; "/><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div><div class="con_tit f14"><strong class="f32">游戏特色</strong><em>Game Features</em></div><div class="feature"><div class="__data__" data_id="__data__[48949]" page="article" postfix="category_12511" style="display: none; "><div></div><span>游戏特色</span></div><?php if(is_array($vopic_nav)): $i = 0; $__LIST__ = $vopic_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo ($v["url"]); ?>" title="<?php echo ($game["gamename"]); ?>" target="_blank"><img src="<?php echo ($v["img"]); ?>" alt="<?php echo ($game["gamename"]); ?>" width="310" height="135"/></a><?php endforeach; endif; else: echo "" ;endif; ?></div><div class="clearfix"><dl class="roles f_l issue"><dt class="con_tit f14"><strong class="f32">角色介绍</strong><em>Roles</em></dt><dd><ul class="hd f14"><li>战士</li><li>弓手</li><li>法师</li></ul><ul class="bd"><li class="bg1"><div class="__data__" data_id="__data__[49027]" page="article" postfix="category_12511" style="display: none; "><div></div><span>守卫雅典娜战士</span></div><div class="role_item role1" style="display: block;"><div class="role_item_text"><p><span>武器：</span>大剑</p><p><span>上手难度：★</span></p><p><span>职业特征：</span></p><p class="role_p">			身负斩龙大剑，铭刻烙印战纹的狂战士<br />			大剑所向，神魔避让！</p></div></div></li><li class="bg2"><div class="__data__" data_id="__data__[49033]" page="article" postfix="category_12511" style="display: none; "><div></div><span>守卫雅典娜弓手</span></div><div class="role_item role2" style="display: block;"><div class="role_item_text"><p><span>武器：</span>弓箭</p><p><span>上手难度：★</span><span>★<span>★</span></span></p><p><span>职业特征：</span></p><p class="role_p">			绿野深处的夺命猎手，没人能躲过精灵的箭<br />			诸神也不能！</p></div></div></li><li class="bg3"><div class="__data__" data_id="__data__[49036]" page="article" postfix="category_12511" style="display: none; "><div></div><span>守卫雅典娜法师</span></div><div class="role_item role3" style="display: block;"><div class="role_item_text"><p><span>武器：</span>魔杖</p><p><span>上手难度：★</span><span>★<span>★</span></span></p><p><span>职业特征：</span></p><p class="role_p">			龙裔的法术炫丽而致命，施法是神赐礼物？<br />			神也要在龙裔法师前低头！</p></div></div></li></ul></dd></dl><dl class="data f_r"><dt class="con_tit f14"><strong class="f32">游戏资料</strong><em>Gamedata</em></dt><dd><div class="__data__" data_id="__data__[48931]" page="article" postfix="category_12511" style="display: none; "><div></div><span>游戏资料</span></div><?php if(is_array($gsjj)): $i = 0; $__LIST__ = array_slice($gsjj,0,12,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>" class="b<?php echo ($k); ?>"><?php echo ($v["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></dd></dl></div><div class="clearfix"><div class="infor f_l"><div class="con_tit f14"><strong class="f32">游戏攻略</strong><em>Roles</em></div><div class="issue"><ul class="tit f14 hd"><li><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>gonglve">游戏攻略</a><div class="__data__" data_id="__data__[48937]" page="article" postfix="category_12511" style="display: none; "><div></div><span>攻略</span></div></li></ul><div class="txt bd"><ul><?php if(is_array($guide)): $i = 0; $__LIST__ = array_slice($guide,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span><?php echo (date('m-d',$v["time"])); ?></span><em>[攻略]</em><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" title="<?php echo ($v["title"]); ?>" target="_blank" style=" color:#ff0000;  font-weight:bold; "/><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><ul></ul></div></div></div><div class="pics f_r"><div class="con_tit f14"><strong class="f32">原画欣赏</strong><em>Original painting</em><div class="__data__" data_id="__data__[48934]" page="article" postfix="category_12511" style="display: none; "><div></div><span>原画欣赏</span></div></div><div class="pic_show"><div class="bd"><ul id="pic"><?php if(is_array($activepic)): $i = 0; $__LIST__ = $activepic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($v["pic"]); ?>" target="_blank" rel="nofollow"><img src="<?php echo ($v["pic"]); ?>" alt="<?php echo ($v["title"]); ?>" width="384" height="190"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><a class="prev f_l">〈</a><a class="next f_r">〉</a></div></div></div></div><div class="main_left f_l"><a href="<?php if((__URL__) == "/"): else: echo ($gametag); endif; echo U('/server_list');?>" target="_blank" class="start indent">开始游戏</a><div class="user_box"><div id="login"><h3 class="f18">用户登录</h3><form method="get" onsubmit="login();return false;"><input class="in02" type="hidden" name="rls"  checked="checked" id="rls" value="sl" /><input name="username" type="text" id="username" class="input" /><input  name="userpass" id="userpass" type="password" class="input" /><input type="submit" value="" class="btn" /><p class="links"><a href="http://reg.<?php echo ($ai["url"]); ?>/" target="_blank" class="register-btn">注册账号</a><a href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" target="_blank">忘记密码？</a></p></form></div><div id="se_list" style="display:none;"><p class="username"><a href="javascript:void(0);" onclick="exit();return false;" style="color:#a89d99; margin-right:0px; float:right;">[退出]</a>欢迎您：<strong id="uname"></strong></p><p><a href="http://user.<?php echo ($ai["url"]); ?>/" target="_blank">个人中心</a><a href="http://pay.<?php echo ($ai["url"]); ?>/" target="_blank">游戏充值</a></p><ul><li>最近玩过：</li><li id="last_game_info"></li></ul></div></div><div class="con_tit f14"><strong class="f32">自助服务</strong><em>Self Service</em></div><div class="self_link clearfix"><div class="__data__" data_id="__data__[48946]" page="article" postfix="category_12511" style="display: none; "><div></div><span>快速链接</span></div><a href="http://libao.<?php echo ($ai["url"]); ?>" title="新手礼包" target="_blank"><em class="b1"></em><span>新手礼包</span></a><a href="#" title="VIP特权" target="_blank"><em class="b2"></em><span>VIP特权</span></a><a href="<?php if((__URL__) == "/"): else: echo ($gametag); endif; ?>gonglve" title="官方攻略" target="_blank"><em class="b3"></em><span>官方攻略</span></a><a href="http://GM.<?php echo ($ai["url"]); ?>" title="在线客服" target="_blank"><em class="b4"></em><span>在线客服</span></a><a href="<?php if((__URL__) == "/"): else: echo ($gametag); endif; ?>huodong" title="活动详情" target="_blank"><em class="b5"></em><span>活动详情</span></a></div><div class="con_tit f14"><strong class="f32">新手上路</strong><em>Beginner's Guide</em></div><dl class="novice"><dt class="f20">新手指南</dt><dd class="clearfix"><div class="__data__" data_id="__data__[48943]" page="article" postfix="category_12511" style="display: none; "><div></div><span>新手指南</span></div><?php if(is_array($xszd)): $i = 0; $__LIST__ = $xszd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>" class="b<?php echo ($k); ?>"><?php echo ($v["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></dd></dl><div class="con_tit f14"><strong class="f32">客服中心</strong><em>Service Center</em></div><dl class="kefu"><dt><div class="__data__" data_id="__data__[48991]" page="article" postfix="category_12511" style="display: none; "><div></div><span>守卫雅典娜交流群</span></div><span class="icon f_l"><em></em>客服中心</span><span class="phone f_l"><p>客服电话：<?php echo ($ai["tel"]); ?></p><p>充值客服QQ：<a href="tencent://message/?uin=<?php echo ($ai["qq"]); ?>"><?php echo ($ai["qq"]); ?></a></p><p>客服论坛：<a href="HTTP://<?php echo ($ai["bbs"]); ?>" target="_blank" rel="nofollow" class="red">点击进入»</a></p></span></dt><dd><a href="HTTP://gm.<?php echo ($ai["url"]); ?>" target="_blank"><em class="b1"></em>在线客服</a><a href="HTTP://pay.<?php echo ($ai["url"]); ?>" target="_blank"><em class="b2"></em>充值中心</a><a href="HTTP://user.<?php echo ($ai["url"]); ?>" target="_blank"><em class="b3"></em>用户中心</a></dd></dl><dl class="media"><dt>合作媒体<i></i><div class="__data__" data_id="__data__[49006]" page="article" postfix="category_12511" style="display: none; "><div></div><span>合作媒体</span></div></dt><dd><ul><?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="<?php echo ($vo["website"]); ?>" title="<?php echo ($vo["webname"]); ?>" ><?php echo ($vo["webname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></dd></dl></div></div></div></div></div><script type="text/javascript" src="/images/home/<?php echo ($gamezhuti); ?>/js/news.js"></script><script type="text/javascript" >var gid=<?php echo ($gameid); ?>;
</script><script src="/js/home/login.js"></script></body></html>