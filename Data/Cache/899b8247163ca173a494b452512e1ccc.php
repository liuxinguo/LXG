<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><title>【<?php echo ($game["gamename"]); ?>官网】- <?php echo ($ai["title"]); ?></title><meta name="keywords" content="<?php echo ($game["gamename"]); ?>官网,752g<?php echo ($game["gamename"]); ?>,<?php echo ($game["gamename"]); ?>攻略"/><meta name="description" content="
        《主宰》是一款2D回合制角色扮演网游。游戏以西方奇幻世界观为依托，结合东方审美，开创新的神话体系，新的神话故事。游戏的剧情围绕着救助精灵，屠戮巨龙，诛杀魔神，肩负拯救大陆展开。" /><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/style.css" /><script src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery-1.7.2.min.js"></script><script type="text/javascript" src="/images/home/<?php echo ($gamezhuti); ?>/js/index.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script></head><body><div class="nav"><ul><li><a href="/">官网首页</a></li><li><a href="/news">新闻资料</a></li><li><a href="/ziliao">游戏资料</a></li><li><a href="javascript:;"></a></li><li><a href="javascript:;"></a></li><li><a href="/gonglve">游戏攻略</a></li><li><a href="HTTP://pay.<?php echo ($ai["url"]); ?>">充值中心</a></li><li><a href="HTTP://bbs.<?php echo ($ai["url"]); ?>">玩家论坛</a></li></ul><div class="logo"><a href="/"><img src="/images/home/<?php echo ($gamezhuti); ?>/img/logo.png" /></a></div></div><div class="main-top"><div class="bg"></div></div><div class="main"><div class="main-left"><div class="game"><a href="/server_list"></a></div><div class="game-up"><div class="zhuce"><a href="http://reg.<?php echo ($ai["url"]); ?>/"></a></div><div class="libao"><a href="http://libao.<?php echo ($ai["url"]); ?>/"></a></div></div><div class="sign"><!-- 登录前 --><div class="sign-before" id="login"><ul><li class="zh-mm"><label>账号</label><input type="text" name="username" id="username" /></li><li class="zh-mm"><label>密码</label><input type="password" name="userpass" id="userpass" /></li><li class="get-psw"><input type="checkbox" name="rls" id="rls"/><label for="remember">记住账号</label><a href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html">忘记密码</a></li><li class="log-btn"><a href="#" onclick="login();return false;"></a></li></ul></div><!-- 登录后 --><div class="sign-later" id="se_list" style="display:none;"><ul><li>
                                您好，<a id="uname">q10234562</a></li><li>您上次进入的服是：</li><li id="last_game_info"></li><li class="usercenter"><a href="http://user.<?php echo ($ai["url"]); ?>/">用户中心</a><a href="javascript:void(0);" onclick="exit();return false;">注销</a></li></ul></div></div><div class="xinfu"><ul><?php if(is_array($server)): $i = 0; $__LIST__ = array_slice($server,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($gameid); ?>&sid=<?php echo ($v['sid']); ?>" target="_blank">双线<?php echo ($v["sid"]); ?>服</a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><div class="xinfuadd"><a href="/server_list">+</a></div></div><div class="gamedata"><span>游戏资料</span><a href="/jietu"><img src="/images/home/<?php echo ($gamezhuti); ?>/img/gd-02.png" alt="" /></a></div><div class="gamegl g guide g-w"><ul><li class="gamegl-t g-t"><span>高手进阶</span><a href="/ziliao" class="add">+</a></li><?php if(is_array($gsjj)): $i = 0; $__LIST__ = $gsjj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="article/tid/<?php echo ($v["id"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div><div class="main-right"><div class="banner"><ul class="kv-cnt"><?php if(is_array($vopic_banner)): $i = 0; $__LIST__ = $vopic_banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($v["url"]); ?>" target="_blank" rel="nofollow"><img src="<?php echo ($v["img"]); ?>" ></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><ol class="kv-nav"><li class="cur">●</li><li>●</li><li>●</li><li>●</li></ol></div><div class="gamebox"><a href="http://www.<?php echo ($ai["url"]); ?>/dlq/setup.exe" class="gameup"><em class="gameb1 f"></em><h2>游戏盒子</h2><i>立即下载</i></a><a href="HTTP://libao.<?php echo ($ai["url"]); ?>" class="gamelibao"><em class="gamelq f"></em><h2>游戏礼包</h2><i target="_blank">立即领取</i></a></div><div class="news"><div class="news-tab"><ul><li class="current"><a href="#" title="综合">综合</a><b class="line"></b></li><li><a href="#" title="新闻">新闻</a><b class="line"></b></li><li><a href="#" title="公告">活动</a><b class="line"></b></li></ul><div class="more"><a href="#">+</a></div></div><div class="news-top"><?php if(is_array($news)): $i = 0; $__LIST__ = array_slice($news,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a title="<?php echo ($v["title"]); ?>" href="/article/tid/<?php echo ($v[id]); ?>" target="_blank"><?php echo (mysubstr(0,26,$v["title"])); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></div><div class="news-list"><!-- 综合 --><ul class="hidden" style="display:block;"><?php if(is_array($zonghe)): $i = 0; $__LIST__ = $zonghe;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/article/tid/<?php echo ($v["id"]); ?>" class="a-link" target="_blank">【综合】<?php echo ($v["title"]); ?></a><span><?php echo (date('m.d',$v["time"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><!-- 新闻 --><ul class="hidden"><?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/article/tid/<?php echo ($v["id"]); ?>" class="a-link" target="_blank">【新闻】<?php echo ($v["title"]); ?></a><span><?php echo (date('m.d',$v["time"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><!-- 活动 --><ul class="hidden"><?php if(is_array($active)): $i = 0; $__LIST__ = $active;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/article/tid/<?php echo ($v["id"]); ?>" class="a-link" target="_blank">【活动】<?php echo ($v["title"]); ?></a><span><?php echo (date('m.d',$v["time"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div><div class="xinshou"><ul><li class="xinshou2"><span class="xsgame">游戏攻略</span><a href="#" class="add">+</a></li><?php if(is_array($guide)): $i = 0; $__LIST__ = array_slice($guide,0,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span>[攻略]</span><a href="/article/tid/<?php echo ($v["id"]); ?>" title="<?php echo ($v["title"]); ?>" target="_blank"><span><?php echo ($v["title"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><div class="guide g"><ul><li class="g-t"><span>新手指南</span><a href="/ziliao" class="add">+</a></li><?php if(is_array($xszd)): $i = 0; $__LIST__ = $xszd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="article/tid/<?php echo ($v["id"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><div class="g tese guide"><ul><li class="g-t"><span>特色系统</span><a href="/ziliao" class="add">+</a></li><?php if(is_array($tswf)): $i = 0; $__LIST__ = $tswf;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="article/tid/<?php echo ($v["id"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div><div class="cls"></div><div class="footer"><div class="kefucenter"><h1>客服中心</h1><div class="phone"><span>客服电话：<?php echo ($ai["tel"]); ?></span><span class="time">咨询时间：7*24小时</span></div><div class="ask"><span>客服论坛：<a href="HTTP://<?php echo ($ai["bbs"]); ?>" target="_blank" rel="nofollow" >点击进入</a></span><span class="time2">充值咨询：<a href="tencent://message/?uin=<?php echo ($ai["qq"]); ?>" target="_blank">在线客服</a></span></div></div><div class="youli"><h1>扫码有礼</h1><img src="/images/home/<?php echo ($gamezhuti); ?>/img/footer-02.png" alt="" /></div><div class="lianjie"><h1>友情链接</h1><?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a target="_blank" href="<?php echo ($vo["website"]); ?>" title="<?php echo ($vo["webname"]); ?>" ><?php echo ($vo["webname"]); ?></a> |<?php endforeach; endif; else: echo "" ;endif; ?></div></div></div><script type="text/javascript" >
var gid=<?php echo ($gameid); ?>;
</script><script src="/js/home/login.js"></script></body></html>