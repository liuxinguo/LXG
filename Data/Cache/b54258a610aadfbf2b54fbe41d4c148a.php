<?php if (!defined('THINK_PATH')) exit();?><!doctype html><!--[if lt IE 7 ]><html lang="zh" class="ie6"><![endif]--><!--[if IE 7 ]><html lang="zh" class="ie7"><![endif]--><!--[if IE 8 ]><html lang="zh" class="ie8"><![endif]--><!--[if IE 9 ]><html lang="zh" class="ie9"><![endif]--><!--[if (gt IE 9)|!(IE)]><!--><html lang="zh"><!--<![endif]--><head><meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><meta name="viewport" content="width=1200, initial-scale=1"><meta name="renderer" content="webkit"><title>【<?php echo ($game["gamename"]); ?>官网】- <?php echo ($ai["title"]); ?></title><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/global.css"/><link href="/images/home/<?php echo ($gamezhuti); ?>/css/zilong_main_2.css" rel="stylesheet" type="text/css"/><script src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery.js"></script><script src="/images/home/<?php echo ($gamezhuti); ?>/js/index.js"></script><script src="/images/home/<?php echo ($gamezhuti); ?>/js/conmon.js"></script><script src="/images/home/<?php echo ($gamezhuti); ?>/js/marquee.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script></head><body><div class="content indexPage"><!-- header s --><div class="header"><div class="wp banner-box"><div class="banner" id="banner"><ul class="kv-top-img"><li><a target="_blank" title="" href="#"><img src="/images/home/<?php echo ($gamezhuti); ?>/images/220932568PAqg.jpg" height="750" width="2000"></a></li><li><a target="_blank" title="" href="#"><img src="/images/home/<?php echo ($gamezhuti); ?>/images/25103314xQ9KQ.jpg" height="750" width="2000"></a></li></ul><ul class="kv-top-nav"><li class="cur"></li><li></li></ul></div></div><div class="main-nav-box"><div class="wp main-nav"><a href="/" class="nav nav-1" target="_blank">官网首页<span>HOME</span></a><a href="/news" class="nav nav-2" target="_blank"> 新闻资讯<span>NEWS</span></a><a href="/ziliao" class="nav nav-3" target="_blank">游戏资料<span>GAME INFO</span></a><a href="HTTP://pay.<?php echo ($ai["url"]); ?>" class="nav nav-4" target="_blank">充值中心<span>PAY</span></a><a href="HTTP://gm.<?php echo ($ai["url"]); ?>" class="nav nav-5" target="_blank">客服中心<span>SERVICE</span></a><a href="HTTP://bbs.<?php echo ($ai["url"]); ?>" class="nav nav-5" target="_blank">玩家论坛<span>BBS</span></a></div></div><div class="logo-box"><div class="wp con"><a href="/" target="_blank" class="logo"></a></div></div><div class="h-main"><div class="wp con"><p class="tip-18">本游戏适合18岁以上玩家进入</p><div class="server-box"><p class="tle">服务器列表</p><div class="server-inner"><ul class="choice-list" id="servers"><?php if(is_array($server)): $i = 0; $__LIST__ = array_slice($server,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($gameid); ?>&sid=<?php echo ($v['sid']); ?>" target="_blank"><span>即将开启</span><?php echo ($v["servername"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><a class="btn-red server-more" target="_blank" href="<?php echo U('/server_list');?>"><span>查看更多<br>服务器&nbsp;&gt;</span></a></div></div></div></div></div><!-- header e --><div class="wp main"><div class="sec-1"><div class="f-l mod-left"><!-- side1 s --><a class="startgame" target="_blank" href="/server_list"><span></span><i></i></a><div class="relat-btn"><a href="http://reg.<?php echo ($ai["url"]); ?>" id="btn-reg" class="r-btn-1" target="_blank" title="帐号注册"><i></i>帐号注册</a><a href="http://pay.<?php echo ($ai["url"]); ?>" class="r-btn-2" target="_blank" title="游戏充值"><i></i>游戏充值</a></div><!--login s--><div class="loginframe" id="loginframe" ><!-- 登录前 --><ul id="login" class="log"><li class="user"><input type="text" name="username" id="username" class="ipt1" placeholder="帐号"></li><li class="psw"><input type="password" name="userpass" id="userpass" class="ipt1" placeholder="密码"></li><li class="remember"><input class="in02" type="hidden" name="rls"  checked="checked" id="rls" value="sl" /><input type="checkbox" checked="checked" id="remember">&nbsp;<label for="remember">自动登录</label></li><li class="psw-btn"><a rel="nofollow" href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" target="_blank" title="忘记密码">忘记密码</a></li><li class="log-btn"><a rel="nofollow" id="log-btn" title="登录" href="#" onclick="login();return false;">登&nbsp;&nbsp;录</a></li></ul><!-- 登录后 --><div class="loged" id="se_list" style="display:none;"><div class="loged-top">用户信息</div><div class="loged-panel"><ul><li>您好，<a class="loged-highlight" id="uname" >8888</a></li><li>您上次进入的服是：</li><li id="last_game_info"></li><li class="loged-usercenter f-ar"><a target="_blank" href="http://user.<?php echo ($ai["url"]); ?>/">用户中心</a><a href="javascript:void(0);" onclick="exit();return false;">注销</a></li></ul></div><div class="loged-bottom"></div></div></div><!-- side1 e --></div><div class="f-l mod-right"><div class="kv-news"><!-- kv s --><div class="kv-contain" id="kv"><div class="kv"><ul class="kv-cnt" id="kvCnt"><?php if(is_array($vopic_banner)): $i = 0; $__LIST__ = $vopic_banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($v["url"]); ?>" target="_blank"><img src="<?php echo ($v["img"]); ?>" >/></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><ul class="kv-nav" id="kvNav"><?php if(is_array($vopic_banner)): $i = 0; $__LIST__ = $vopic_banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div><!-- kv e --><div class="news" id="news"><div class="n-hd"><ul class="cls" id="news-tab"><li data-news-more="xinwen" class="cur"><a title="综合" target="_blank">综合</a></li><li data-news-more="xinwen"><a title="新闻" target="_blank">新闻</a></li><li data-news-more="huodong"><a title="活动" target="_blank">活动</a></li><li data-news-more="meiti"><a title="媒体" target="_blank">媒体</a></li></ul><a href="/news" target="_blank" title="more" class="more news-more">更多<i></i></a></div><div class="news-list" id="news-list"><!--综合--><ul><?php if(is_array($zonghe)): $i = 0; $__LIST__ = $zonghe;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span class="time"><?php echo (date('m.d',$v["time"])); ?></span><a class="n-type" rel="nofollow" target="_blank">综合</a>&nbsp;&nbsp;
      <a class="n-link" href="/article/tid/<?php echo ($v["id"]); ?>" class="a-link" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><!-- 新闻 --><ul class="hidden"><?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span class="time"><?php echo (date('m.d',$v["time"])); ?></span><a class="n-type" rel="nofollow" target="_blank">新闻</a>&nbsp;&nbsp;
      <a class="n-link" href="/article/tid/<?php echo ($v["id"]); ?>" class="a-link" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><!--活动--><ul class="hidden"><?php if(is_array($active)): $i = 0; $__LIST__ = $active;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span class="time"><?php echo (date('m.d',$v["time"])); ?></span><a class="n-type" rel="nofollow" target="_blank">活动</a>&nbsp;&nbsp;
      <a class="n-link" href="/article/tid/<?php echo ($v["id"]); ?>" class="a-link" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><!--媒体--><ul class="hidden"><?php if(is_array($mtzx)): $i = 0; $__LIST__ = $mtzx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span class="time"><?php echo (date('m.d',$v["time"])); ?></span><a class="n-type" rel="nofollow" target="_blank">媒体</a>&nbsp;&nbsp;
      <a class="n-link" href="/article/tid/<?php echo ($v["id"]); ?>" class="a-link" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div><!--news e--></div></div></div><div class="sec-2"><div class="f-l mod-left"><div class="link-list"><div class="con"><a href="http://www.<?php echo ($ai["url"]); ?>/dlq/setup.exe" class="link-1" target="_blank">游戏盒子<i></i></a><a href="http://pay.<?php echo ($ai["url"]); ?>/" class="link-2" target="_blank">游戏充值<i></i></a><a href="http://hxmt.<?php echo ($ai["url"]); ?>/article/tid/5105" class="link-3" target="_blank">VIP特权<i></i></a><a href="http://libao.<?php echo ($ai["url"]); ?>/" class="link-4" target="_blank">新手礼包<i></i></a><a href="http://bbs.<?php echo ($ai["url"]); ?>/forum.php?mod=forumdisplay&fid=107" class="link-5" target="_blank">投稿奖励<i></i></a></div></div></div><div class="f-l mod-mid"><div class="roleWrap"><div class="r-hd"><ul class="cls" id="roleTab"><li class="cur"><a class="rt-1" href="javascript:void(0);">大宝侠<i></i></a></li><li class=""><a class="rt-2" href="javascript:void(0);">小灵儿<i></i></a></li></ul></div><div class="role-con" id="rolePanel"><ul class="role-ul"><li class="role role-1" style="display:block;right: 0"></li><li class="role role-2"></li><li class="role role-3"></li><li class="role role-4"></li></ul></div></div><!-- role e --></div><div class="f-l mod-right"><div class="gonglue"><div class="g-tle"><div class="con"><p>游戏攻略</p><a href="#" target="_blank" title="more" class="more news-more">更多<i></i></a></div></div><div class="gl"><!--攻略--><ul><?php if(is_array($guide)): $i = 0; $__LIST__ = array_slice($guide,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span class="time"><?php echo (date('m.d',$v["time"])); ?></span><a class="n-type" rel="nofollow" target="_blank">攻略</a>&nbsp;&nbsp;
      <a class="n-link" href="/article/tid/<?php echo ($v["id"]); ?>" class="a-link" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div><!-- gonglue e --></div></div><div class="sec-4"><div class="f-l mod-left"><div class="video-area" id="videoArea"><div class="movie-area"><a href="javascript:void(0);" class="play-on" data-src="/images/home/<?php echo ($gamezhuti); ?>/images/flv/05_01.flv"></a><div class="movie-con"><!-- <embed width="100%" height="100%" title="视频鉴赏" wmode="transparent" src="/images/home/<?php echo ($gamezhuti); ?>/images/flvplayer.swf" allowfullscreen="true" flashvars="vcastr_file=images/flv/05_01.flv&amp;LogoText=武神赵子龙&amp;IsAutoPlay=1" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"> --></div></div></div></div><div class="f-l mod-right"><div class="jietu" id="jietu"><div class="con"><i class="t"></i><ul class="cls jt-scroll"><?php if(is_array($activepic)): $i = 0; $__LIST__ = $activepic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="article/tid/<?php echo ($v["id"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>"><img src="<?php echo ($v["pic"]); ?>" alt="<?php echo ($v["title"]); ?>"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><a href="javascript:void(0);" class="j-btn prev" title="上一组">上一组</a><a href="javascript:void(0);" class="j-btn next" title="下一组">下一组</a></div></div><!--jietu e--><div class="rolecard"><dl class="r-list cls"><dt class="tab cur" style="width: 0;" data-tab = "0" ><a class="a-tab-1" href="javascript:void(0);"></a></dt><dd class="panel im" style="width: 267px;" ><a href="#" target="_blank"><img src="/images/home/<?php echo ($gamezhuti); ?>/images/role_1.gif" height="182" width="267" alt=""></a></dd><dt class="tab" data-tab = "1"><a class="a-tab-2" href="javascript:void(0);"></a></dt><dd class="panel"><a href="#" target="_blank"><img src="/images/home/<?php echo ($gamezhuti); ?>/images/role_2.gif" height="182" width="267" alt=""></a></dd><dt class="tab" data-tab = "2"><a class="a-tab-3" href="javascript:void(0);"></a></dt><dd class="panel"><a href="#" target="_blank"><img src="/images/home/<?php echo ($gamezhuti); ?>/images/role_3.gif" height="182" width="267" alt=""></a></dd></dl></div></div></div><div class="sec-5"><div class="kf-wrap f-l"><div class="kefu"><div class="c-hd"><h4>客服中心</h4><span>Service</span></div><div class="kf-con"><p>客服热线：<?php echo ($ai["tel"]); ?></p><p>客服论坛：<a href="HTTP://<?php echo ($ai["bbs"]); ?>" target="_blank" rel="nofollow" class="red">点击进入»</a></p><p>充值咨询：<a href="tencent://message/?uin=<?php echo ($ai["qq"]); ?>" target="_blank" title="在线客服" rel="nofollow">在线客服</a></p></div></div></div><div class="game-data f-l"><ul class="data-ul"><li><dl><dt><span class="cn">新手指南</span><span class="en">Novice guidance</span><span class="line"></span></dt><dd><p class="cls"><?php if(is_array($xszd)): $i = 0; $__LIST__ = $xszd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="article/tid/<?php echo ($v["id"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></p><a href="/ziliao" target="_blank" title="more" class="more news-more">更多<i></i></a></dd></dl></li><li><dl><dt><span class="cn">高手进阶</span><span class="en" >System Introduction</span><span class="line"></span></dt><dd><p class="cls"><?php if(is_array($gsjj)): $i = 0; $__LIST__ = $gsjj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="article/tid/<?php echo ($v["id"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></p></p><a href="/ziliao" target="_blank" title="more" class="more news-more">更多<i></i></a></dd></dl></li><li><dl><dt><span class="cn">特色玩法</span><span class="en" >Characteristic</span><span class="line"></span></dt><dd><p class="cls"><?php if(is_array($tswf)): $i = 0; $__LIST__ = $tswf;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="article/tid/<?php echo ($v["id"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></p><a href="/ziliao" target="_blank" title="more" class="more news-more">更多<i></i></a></dd></dl></li></ul></div></div><div class="sec-6"><div class="toupiao f-sec"><div class="gonggao"><h4>媒体投票</h4><div class="media-scroll"><div class="marqueeCss" id="marquee"><ul class="cs-clear marquee_ul"><?php if(is_array($imlinks)): $i = 0; $__LIST__ = $imlinks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["website"]); ?>" target="_blank" rel="nofollow"><img src="<?php echo ($vo["pic"]); ?>"></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div></div><div class="lianjie f-sec"><div class="gonggao"><h4>友情链接</h4><div class="gg-lian"><?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a target="_blank" href="<?php echo ($vo["website"]); ?>" title="<?php echo ($vo["webname"]); ?>" ><?php echo ($vo["webname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></div></div></div><div class="hezuo f-sec"><div class="gonggao"><h4>媒体合作</h4><ul class="gg-mei"><?php if(is_array($meiti)): $i = 0; $__LIST__ = $meiti;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li <?php if(($i) == "1"): ?>class="active"<?php endif; ?>><?php echo ($v["title"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><div class="gg-he"><?php if(is_array($meiti)): $i = 0; $__LIST__ = $meiti;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="he-img" <?php if(($i) == "1"): else: ?>style="display:none;"<?php endif; ?>><iframe height="140" frameborder="No" width="630" scrolling="No" border="0" allowtransparency="allowtransparency" name="ifram" src="<?php echo ($v["url"]); ?>"></iframe></div><?php endforeach; endif; else: echo "" ;endif; ?><div class="he-img"></div><div class="he-img" style="display:none;"><ul></ul></div></div></div></div></div></div></div><script type="text/javascript" >var gid=<?php echo ($gameid); ?>;
</script><script src="/js/home/login.js"></script></body></html>