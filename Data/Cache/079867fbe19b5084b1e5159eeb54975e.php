<?php if (!defined('THINK_PATH')) exit();?><!doctype html><!--[if lt IE 7 ]><html lang="zh" class="ie6"><![endif]--><!--[if IE 7 ]><html lang="zh" class="ie7"><![endif]--><!--[if IE 8 ]><html lang="zh" class="ie8"><![endif]--><!--[if IE 9 ]><html lang="zh" class="ie9"><![endif]--><!--[if (gt IE 9)|!(IE)]><!--><html lang="zh"><!--<![endif]--><head><meta charset="utf-8"/><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><meta name="viewport" content="width=1200, initial-scale=1"><meta name="renderer" content="webkit"><meta name="keywords" content="仙境物语"/><meta name="frontend" content="szc"/><title><?php echo ($title["title"]); ?>- <?php echo ($ai["title"]); ?></title><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/global.css"/><link href="/images/home/<?php echo ($gamezhuti); ?>/css/roxj_main.css" rel="stylesheet" type="text/css"/><script type="text/javascript" src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery.min.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script></head><body><div class="body"><!--header--><div class="nav"><div class="nav-bg"></div><ul class="nav-top cls"><li id="li1" class="nav-on"><a href="/" target="_blank"><i>◆</i><em>官网首页</em><i>◆</i></a></li><li id="li2"><a href="/news" target="_blank"><i>◆</i><em>新闻中心</em><i>◆</i></a></li><li id="li3"><a href="/ziliao" target="_blank" rel="nofollow"><i>◆</i><em>游戏资料</em><i>◆</i></a></li><li id="li4"><a href="HTTP://pay.<?php echo ($ai["url"]); ?>" target="_blank" rel="nofollow"><i>◆</i><em>游戏充值</em><i>◆</i></a></li><li id="li5"><a href="HTTP://gm.<?php echo ($ai["url"]); ?>" target="_blank" rel="nofollow"><i>◆</i><em>客服中心</em><i>◆</i></a></li><li id="li6"><a href="HTTP://bbs.<?php echo ($ai["url"]); ?>" target="_blank" rel="nofollow"><i>◆</i><em>玩家论坛</em><i>◆</i></a></li></ul><a class="logo" href="/" title="仙境物语" target="_blank">仙境物语官网首页</a></div><div class="header"><p class="tips18">            本游戏适合18岁以上玩家进入
        </p></div><!--wrap--><div class="wrap c-wrap cls"><div class="inner cls"><!--side--><div class="side"><!-- 开始游戏 --><a class="start" href="<?php echo U('/server_list');?>" target="_blank" title="752G-仙境物语"><span></span></a><div class="quick-links cls"><a class="block-a reg-btn" id="btn-reg" target="_blank" title="帐号注册" href="http://reg.<?php echo ($ai["url"]); ?>/" rel="nofollow">帐号注册</a><a class="block-a charge-btn" target="_blank" title="游戏充值" href="HTTP://pay.<?php echo ($ai["url"]); ?>" rel="nofollow">游戏充值</a></div><!-- 登录 --><div id="loginframe" class="login"><div class="log" id="login"><ul><li class="user"><label>帐号:</label><input type="text" name="username" id="username"  class="text" placeholder="用户名: "/></li><li class="psw"><label>密码:</label><input type="password" name="userpass" id="userpass" class="text" placeholder="密&nbsp;&nbsp;码: "/></li><li class="remember"><input type="checkbox" checked="checked" id="remember"/><input class="in02" type="hidden" name="rls"  checked="checked" id="rls" value="sl" /><label for="remember">记住帐号</label></li><li class="get-psw"><a target="_blank" title="找回密码" href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" rel="nofollow">忘记密码？</a></li><li class="log-btn"><a class="block-a" title="登录"  rel="nofollow" href="#" onclick="login();return false;"></a></li></ul></div><div class="loged" id="se_list" style="display:none;"><div class="loged-panel"><ul><li>您好，<a class="colored" id="uname"></a></li><li>最近玩过：</li><li id="last_game_info"></li><li><a target="_blank" href="http://user.<?php echo ($ai["url"]); ?>/">用户中心</a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="exit();return false;">注销</a></li></ul></div></div></div><!--服务器--><div class="server"><div id="quick-ingame" class="quick-ingame"><em>开服列表:</em> 选服:
                        <input type="text" id="quick-enter-input" value="1" class="fastin-input"> 服 <a class="btn-small" id="quick-enter-click" target="_blank" href="#">进入游戏</a></div><ul id="sidebar-server"><?php if(is_array($server)): $i = 0; $__LIST__ = array_slice($server,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($gameid); ?>&sid=<?php echo ($v['sid']); ?>" target="_blank"><span>火爆开启</span>双线<?php echo ($v["sid"]); ?>服</a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><div class="server-more"><a target="_blank" href="<?php echo U('/server_list');?>">查看更多服务器列表+</a></div></div><!--客服中心--><div class="service"><em>客服中心:</em><p>                        客服热线：<?php echo ($ai["tel"]); ?><br>                        充值客服QQ：<a href="tencent://message/?uin=<?php echo ($ai["qq"]); ?>"><?php echo ($ai["qq"]); ?></a><br>                        客服论坛：<a href="HTTP://<?php echo ($ai["bbs"]); ?>" target="_blank" rel="nofollow"class="btn-small bs1">点击进入»</a><br>                        充值咨询：<a class="btn-small" href="HTTP://gm.<?php echo ($ai["url"]); ?>" target="_blank" title="在线客服" rel="nofollow">在线客服</a></p></div></div><!--main--><div class="main"><div class="article"><div class="article-top"><span><?php echo ($cace); ?></span><div class="bread-nav">                            当前位置：<a href="/"><?php echo ($game["gamename"]); ?></a> &gt; <a href="/<?php echo ($mulu); ?>"><?php echo ($cace); ?></a></div></div><div class="article-main"><div class="article-title"><h1><?php echo ($title["title"]); ?></h1></div><div class="article-detail">                            作者：<?php echo ($ai["title"]); ?>&nbsp;&nbsp;&nbsp;时间：<?php echo (date('Y-m-d',$title["time"])); ?></div><div class="article-content"><?php echo ($content); ?><div class="article-content-pager"></div></div></div></div></div></div></div><!-- end wrap --><div class="backstretch"></div></div><script type="text/javascript" >var gid=<?php echo ($gameid); ?>;
</script><script src="/js/home/login.js"></script></body></html>