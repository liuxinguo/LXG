<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><title>【<?php echo ($game["gamename"]); ?>官网】- <?php echo ($ai["title"]); ?></title><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/><meta name="renderer" content="webkit"><meta http-equiv="Cache-Control" content="no-siteapp"/><meta name="applicable-device" content="pc"><meta name="robots" content="all"/><meta name="viewport" content="width=device-width,user-scalable=yes"><meta name="keywords" content="仙渝,仙渝网页游戏,仙渝网页游戏攻略,仙渝网页游戏最新开服,仙渝网页游戏礼包,萌乐网仙渝官方网站"><meta name="description" content="《仙渝》，是萌乐网首款“玩家定制修仙”网游《仙谕》，根据同名修仙小说改编，首创“MMORPG2.0”核心体系，推出仙盟、天脉、神炼等原创玩法，并以沙盒式开放世界，线性剧情设定，将主动权交还给玩家，让玩家可根据自己的意愿，定制剧情、玩法，缔造心中的完美仙界。"><link rel="stylesheet" href="/images/home/<?php echo ($gamezhuti); ?>/css/reset.css"/><link rel="stylesheet" href="/images/home/<?php echo ($gamezhuti); ?>/css/index.css"/><link rel="stylesheet" href="/images/home/<?php echo ($gamezhuti); ?>/css/common.css"/><script src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery.min.js"></script><script src="/images/home/<?php echo ($gamezhuti); ?>/js/index.js"></script><script src="/images/home/<?php echo ($gamezhuti); ?>/js/marquee.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script></head><body class="body-bj"><div class="wrapper_html"><div class="container_wrap"><header><!-- 头部信息 --><div class="nav content"><!-- 导航条 --><ul><li class="nav-li1" style="margin-left:388px;"><a href="/" title="首页">官网首页</a></li><li class="nav-li2"><a href="/ziliao" title="游戏资料">游戏资料</a></li><li class="nav-li3"><a href="/news" title="新闻资讯">新闻资讯</a></li><li class="nav-li4"><a href="/gonglve" title="游戏攻略">游戏攻略</a></li><li class="nav-li5"><a target="_blank" href="HTTP://pay.<?php echo ($ai["url"]); ?>" title="充值中心">充值中心</a></li><li class="nav-li6"><a target="_blank" href="HTTP://bbs.<?php echo ($ai["url"]); ?>" title="玩家论坛">玩家论坛</a></li></ul><div class="logo"><a href="/"></a></div></div><div class="game-job content"><div class="ks-game"><a href="/server_list"></a></div><div class="load"><!-- 礼包 --><div class="box-a"><a href="HTTP://bbs.<?php echo ($ai["url"]); ?>/dlq/xy.exe" class="a"><div class="logger"></div><p>登录器下载</p></a></div><div class="box-a"><a target="_blank" href="HTTP://libao.<?php echo ($ai["url"]); ?>"><div class="pack"></div><p>								官方礼包
							</p></a></div><div class="box-b"><div class="cont"><!-- 登录框体 --><div class="log-no" id="login"><dl><dd><label>账号：</label><input type="text" name="username" id="username" placeholder="请输入账号"></dd><dt><input value="1" name="rls" id="rls" checked="checked" type="checkbox"><label>记住账号</label><a target="_blank" href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" style="padding-left:34px">忘记密码？</a></dt></dl><dl><dd><label>密码：</label><input name="userpass" id="userpass"  placeholder="请输入密码" type="password"></dd><dt><a href="http://reg.<?php echo ($ai["url"]); ?>/" style="color:#cfae69">立即注册</a></dt></dl><div class="dr-but"><input value="" type="button" onclick="login();return false;"></div></div><!--log-no end--><div class="log-hv" id="se_list" style="display:none"><div class="tt">									您好！<strong id="uname">khksdhcsdh</strong><a href="javascript:void(0);" onclick="exit();return false;">[注销]</a></div><div class="zj-fu" id="my_server"><span>推荐区服：</span><div id="last_game_info" ></div></div><div class="cz-but"><input value="" type="button"></div></div></div></div></div></div></header><section class="index-mian clearfix content"><section class="sectionA clearfix"><!-- 仙兽坐骑 --><div class="box-1"><div class="a"><a href="/article/tid/5665" target="_blank"><h4>仙兽坐骑</h4><p>							独特时间消耗玩法
						</p><span></span><i></i></a></div><div class="b"><a href="/article/tid/5666" target="_blank"><h4>洛神守护</h4><p>							独特塔防成长玩法
						</p><span></span><i></i></a></div></div><div class="box-2 xy-bn"><div class="banner" id="focus"><!-- 首页轮播图 --><div class="imgs"><ul><?php if(is_array($vopic_banner)): $i = 0; $__LIST__ = $vopic_banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($v["url"]); ?>" target="_blank"><img src="<?php echo ($v["img"]); ?>" height="270" width="620" border=0/></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><div class="ctrl"><a href="javascript:;" class='on'></a><a href="javascript:;"></a><a href="javascript:;"></a><a href="javascript:;"></a></div></div></div><div class="box-3"><div class="con"><div class="tt"><span>最新开服</span><a href="/server_list" class="kf-more"></a></div><ul class="bm" id="server_list"><?php if(is_array($server)): $i = 0; $__LIST__ = array_slice($server,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($gameid); ?>&sid=<?php echo ($v['sid']); ?>" data-sid="<?php echo ($v['sid']); ?>" target="_blank"><span class="ico"></span><strong>火爆开启  双线<?php echo ($v["sid"]); ?>服</strong></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></section><!--sectionA end--><section class="sectionB clearfix"><div class="box-1"><a href="#"><img src="/images/home/<?php echo ($gamezhuti); ?>/images/shijieguan.jpg" height="309" width="260"/></a></div><div class="box-2"><div class="tab"><div class="cont"><a href="/news" class="more-ico"></a><ul class="tabbtn" id="move-animate-left"><li class="current"><a>综合</a></li><li><a>新闻</a></li><li><a>活动</a></li><li><a>媒体</a></li></ul><div class="tabcon" id="leftcon"><div class="subbox"><div class="sublist"><ul id="newscon1"><?php if(is_array($zonghe)): $i = 0; $__LIST__ = $zonghe;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span>[综合]</span><a href="/article/tid/<?php echo ($v["id"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a><strong><?php echo (date('m.d',$v["time"])); ?></strong></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><!--综合 end--><div class="sublist" style="display:none"><ul id="newscon2"><?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span>[新闻]</span><a href="/article/tid/<?php echo ($v["id"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a><strong><?php echo (date('m.d',$v["time"])); ?></strong></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><!--公告 end--><div class="sublist" style="display:none"><ul id="newscon3"><?php if(is_array($active)): $i = 0; $__LIST__ = $active;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span>[活动]</span><a href="/article/tid/<?php echo ($v["id"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a><strong><?php echo (date('m.d',$v["time"])); ?></strong></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><!--活动 end--><div class="sublist" style="display:none"><ul id="newscon4"><?php if(is_array($mtzx)): $i = 0; $__LIST__ = $mtzx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span>[媒体]</span><a href="/article/tid/<?php echo ($v["id"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a><strong><?php echo (date('m.d',$v["time"])); ?></strong></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><!--新闻 end--></div></div></div></div><div class="bm"><!-- 首页三小图 --><?php if(is_array($vopic_nav)): $i = 0; $__LIST__ = array_slice($vopic_nav,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if(($i) == "1"): ?><a href="<?php echo ($v["url"]); ?>" style="margin-left:0px;"><img src="<?php echo ($v["img"]); ?>" height="80" width="200"></a><?php else: ?><a href="<?php echo ($v["url"]); ?>"><img src="<?php echo ($v["img"]); ?>" height="80" width="200"></a><?php endif; endforeach; endif; else: echo "" ;endif; ?></div></div><div class="box-3"><div class="cont"><div class="co-tt"><span>游戏攻略</span><a href="#" class="more-ico"></a></div><ul id="guide"><?php if(is_array($guide)): $i = 0; $__LIST__ = array_slice($guide,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span>[攻略]</span><a target="_blank" href="article/tid/<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></section><!--sectionB end--><section class="sectionC clearfix"><div class="box-1"><div class="cont"><div class="co-tt"><span>游戏资料</span><a href="#" class="more-ico"></a></div><dl><dd>新手资料</dd><dt id="game_data_index_content_1" style="height: 54px;"><?php if(is_array($xszd)): $i = 0; $__LIST__ = $xszd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="article/tid/<?php echo ($v["id"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></dt></dl><dl><dd>系统介绍</dd><dt id="game_data_index_content_2" style="height: 54px;"><?php if(is_array($tswf)): $i = 0; $__LIST__ = $tswf;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="article/tid/<?php echo ($v["id"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></dt></dl><dl><dd>高手进阶</dd><dt id="game_data_index_content_3"><?php if(is_array($gsjj)): $i = 0; $__LIST__ = $gsjj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="article/tid/<?php echo ($v["id"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></dt></dl></div></div><div class="box-2"><div class="profession"><div class="title"><ul><li class="on"><a href="javascript:;">武尊</a></li><li><a href="javascript:;">罗刹</a></li><li><a href="javascript:;">灵术</a></li></ul></div><div class="con"><div class="job on"><div class="role animate"><img src="/images/home/<?php echo ($gamezhuti); ?>/images/job1.gif" height="460" width="467" class="job1"/></div><div class="intro animate"><h4>武尊</h4><p>										武尊血高防厚攻击较低，拥有推拉等技能，能够很好地控制对手的输出节奏，往往能够在众多对手之中出奇制胜，击杀敌方首领。
									</p><p style="padding-top:16px;">										特点：强大的坦克，前锋的肉盾。
									</p><p>										类型：近战
									</p></div></div><div class="job"><div class="role animate"><img src="/images/home/<?php echo ($gamezhuti); ?>/images/job2.gif" height="460" width="394" class="job2"/></div><div class="intro animate"><h4>罗刹</h4><p>										罗刹高攻高爆高闪，防御虽然是弱项，能够在一波爆发之下带走多个敌人的性命，又有瞬间爆发的移动优势和强力的控制技能，往往可以纵横沙场全身而退。
									</p><p style="padding-top:16px;">										特点：一击致命，若不致命，我被致命。
									</p><p>										类型：近战
									</p></div></div><div class="job"><div class="role animate"><img src="/images/home/<?php echo ($gamezhuti); ?>/images/job3.gif" height="460" width="394" class="job3"/></div><div class="intro animate"><h4>灵术</h4><p>										灵术各方面都很均衡，又能套盾加血，攻击稍次一点，但是与人组队之后往往会成为敌方小队的噩梦。
									</p><p style="padding-top:16px;">										特点：强力辅助，团队之中必不可少的职业。
									</p><p>										类型：远程
									</p></div></div></div></div></div><div class="box-3"><div class="view"><div class="cont"><div class="co-tt"><span>精彩视图</span></div><div class="pic"><a href="/jietu"><img src="/images/home/<?php echo ($gamezhuti); ?>/images/xy-index-view.jpg" height="235" width="260"><div></div></div></a></div></div><div class="kf"><div><a target="_blank" href="HTTP://GM.<?php echo ($ai["url"]); ?>" class="a1" style="margin-left:0px;">客服中心</a><a target="_blank" href="http://reg.<?php echo ($ai["url"]); ?>/" class="a1">账号注册</a><a target="_blank" href="HTTP://pay.<?php echo ($ai["url"]); ?>" class="a1" style="margin-left:0px;">游戏充值</a><a target="_blank" href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" class="a1">忘记密码</a><a target="_blank" href="HTTP://GM.<?php echo ($ai["url"]); ?>" class="a2 webCompany">在线客服</a></div></div></div></section><!--sectionC end--><section class="sectionD clearfix"><div class="box-1"><div id="marquee"><!-- 首页媒体图 --><ul><?php if(is_array($imlinks)): $i = 0; $__LIST__ = $imlinks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><div class="vote-box"><a href="<?php echo ($vo["website"]); ?>" target="_blank" rel="nofollow"><img src="<?php echo ($vo["pic"]); ?>" height="100" width="220"></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div><div class="box-2"><div class="tab"><div class="cont"><ul class="tabbtn" id="move-animate-left1"><li class="current"><a style="width:90px;">07073</a></li><li><a style="width:90px;">一游网</a></li><li><a style="width:90px;">聚侠网</a></li></ul><div class="tabcon" id="leftcon1"><div class="sublist"><iframe src="http://www.07073.com/plus/2015_qt_2.php?g=34046&psize=4&tmp=if_2015pt&width=420&height=180&bg=&color=666&hv=584068&hlc=&sort=40&lh=28&ln=1&fsize=12&mtop=0&mleft=0&mright=0&bbc=" width="100%" height="220px" frameborder="0" allowtransparency="true" scrolling="no"></iframe></div><div class="sublist" style="display:none;"><iframe src="http://iframe.eeyy.com/xy/807.html" width="100%" height="220px" frameborder="0" allowtransparency="true" scrolling="no"></iframe></div><div class="sublist" style="display:none;"><iframe src="http://www.juxia.com/webgame/qthezuo/menle/xy.html" width="100%" height="220px" frameborder="0" allowtransparency="true" scrolling="no"></iframe></div></div></div></div></div><div class="box-3"><div class="tab"><div class="cont"><ul class="tabbtn" id="move-animate-left2"><li class="current"><a style="width:90px;">265G</a></li></ul><!--tabbtn end--><div class="tabcon" id="leftcon2"><div class="sublist"><iframe src="http://im.265g.com/articlelist/xianyu_menle.html" width="100%" height="220px" frameborder="0" allowtransparency="true" scrolling="no"></iframe></div></div></div></div></div></section></section></div></div><script type="text/javascript" >var gid=<?php echo ($gameid); ?>;
</script><script src="/js/home/login.js"></script></body></html>