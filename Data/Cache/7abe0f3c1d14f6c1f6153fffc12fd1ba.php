<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC ><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><title>【<?php echo ($game["gamename"]); ?>官网】- <?php echo ($ai["title"]); ?></title><meta name="keywords" content="村长征战团,村长征战团官网,村长征战团网页游戏,村长征战团布局图,村长征战团武将"><meta name="description" content="752G村长征战团是一款卡通风格策略经营类网页游戏，村长征战团玩家通过村民、武将、店铺等辅助手段合理布局提高实力，建立帝国！来村长征战团官网告诉全天下：老子是村长！"><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/style.css"/><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/common_new_top.css"/><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/server.css"/><script src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery.min.js"></script><script src="/images/home/<?php echo ($gamezhuti); ?>/js/index.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script></head><body><div id="content"><div class="wrap"><div class="header"><a href="/" class="logo"></a><div class="menu"><a href="/" class="m1">官网首页</a><a href="/news" class="m2">新闻中心</a><a href="/huodong" class="m3">热门活动</a><a href="/ziliao" class="m4">游戏资料</a><a href="HTTP://gm.<?php echo ($ai["url"]); ?>" target="_blank" class="m5">客服中心</a><a href="HTTP://bbs.<?php echo ($ai["url"]); ?>" class="m6">游戏论坛</a></div><div class="tips f20">魔性村长震撼开启</div><div class="flash"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="Mask" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" width="1920" height="614"><param name="allowScriptAccess" value="always"><param name="allowFullScreen" value="true"><param name="loop" value="true"><param name="play" value="true"><param name="menu" value="true"><param name="quality" value="high"><param name="wmode" value="transparent"><param name="flashvars" value="winType=interior&amp;auto_play=0"><param name="movie" value="/images/home/<?php echo ($gamezhuti); ?>/images/topf.swf"><embed name="Mask" allowfullscreen="true" flashvars="winType=interior&amp;auto_play=0" width="1920" height="614" loop="true" menu="true" play="true" pluginspage="http://www.macromedia.com/go/getflashplayer" quality="high" src="/images/home/<?php echo ($gamezhuti); ?>/images/topf.swf" allowscriptaccess="always" type="application/x-shockwave-flash" wmode="transparent"></object><a href="/server_list"></a></div></div><div class="step step1" 

        <!-- 登录注册 --><div class="server f14 f_l"><!--登录--><div id="loginframe" class="blink login" ><!-- 登录前 --><div class="log" id="login" ><ul ><li class="user"><label>帐号</label><input type="text" name="username" id="username" class="text" placeholder="帐号 "></li><li class="psw"><label>密码</label><input type="password" name="userpass" id="userpass" class="text" placeholder="密码"></li><li class="remember"><input class="in02" type="hidden" name="rls"  checked="checked" id="rls" value="sl" /><input type="checkbox" checked="checked" id="remember"><label for="remember">自动登录</label></li><li class="get-psw"><a target="_blank" title="找回密码" href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" rel="nofollow">忘记密码？</a></li><li class="log-btn"><a class="block-a" title="登录" id="log-btn" href="javascript:;" onclick="login();return false;"  ></a></li></ul></div><!-- 登录后 --><div class="loged" id="se_list" style="display:none;"><div class="loged-top">用户信息</div><div class="loged-panel"><ul><li>您好，<a class="loged-highlight" id="uname">888</a></li><li><a target="_blank" href="http://user.<?php echo ($ai["url"]); ?>/">完善密保资料</a></li><li>您上次进入的服是：</li><li id="last_game_info"></li><li class="loged-usercenter f-ar"><a target="_blank" href="#">用户中心</a><a href="javascript:void(0);" onclick="exit();return false;" id="logout">注销</a></li></ul></div><div class="loged-bottom"></div></div></div><a class="btn-red server-more" target="_blank" href="/server_list">全部服务器列表 +</a></div><div class="news_pic f_l"><div id="Slideshow" class="Slideshow"><?php if(is_array($vopic_banner)): $i = 0; $__LIST__ = $vopic_banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo ($v["url"]); ?>" target="_blank"><img src="<?php echo ($v["img"]); ?>" /></a><?php endforeach; endif; else: echo "" ;endif; ?></div><ul class="news_pic_dotted"><?php if(is_array($vopic_banner)): $i = 0; $__LIST__ = $vopic_banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="active"></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><dl class="data f_r"><dt class="f14"><a href="/gonglve" class="f_r">更多+</a>村长征战团攻略 </dt><dd><?php if(is_array($guide)): $i = 0; $__LIST__ = array_slice($guide,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p><em></em><span class="f_r">[<?php echo (date('m-d',$v["time"])); ?>]</span><a href="article/tid/<?php echo ($v["id"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?></dd></dl></div><div class="step step2"><div class="active f_l"><a href="HTTP://libao.<?php echo ($ai["url"]); ?>" target="_blank" class="b1"><h3 class="f24">新手卡</h3><p>            NOVICE CARD
          </p><em class="m1"></em><i></i></a><a href="HTTP://www.<?php echo ($ai["url"]); ?>/dlq/setup.exe" target="_blank" class="b2"><h3 class="f24">游戏盒子</h3><p>            Official website login
          </p><em class="m2 f_r"></em><i></i></a></div><div class="game_news f_l"><a href="#" class="more f16">+</a><ul class="tit f16 hd"><li class="cur on"><a class="m1">综合<em></em></a></li><li><a href="#" class="m2">新闻<em></em></a></li><li><a href="#" class="m3">活动<em></em></a></li><li><a href="#" class="m4">媒体<em></em></a></li></ul><div class="txt f14 bd"><ul><?php if(is_array($zonghe)): $i = 0; $__LIST__ = $zonghe;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span>[<?php echo (date('m.d',$v["time"])); ?>]</span><em>[综合]</em><a href="/article/tid/<?php echo ($v["id"]); ?>" class="a-link" target="_blank"><span><?php echo ($v["title"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><ul style="display:none"><?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span>[<?php echo (date('m.d',$v["time"])); ?>]</span><em>[新闻]</em><a href="/article/tid/<?php echo ($v["id"]); ?>" class="a-link" target="_blank"><span><?php echo ($v["title"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><ul style="display:none"><?php if(is_array($active)): $i = 0; $__LIST__ = $active;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span>[<?php echo (date('m.d',$v["time"])); ?>]</span><em>[活动]</em><a href="/article/tid/<?php echo ($v["id"]); ?>" class="a-link" target="_blank"><span><?php echo ($v["title"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><ul style="display:none"><?php if(is_array($mtzx)): $i = 0; $__LIST__ = $mtzx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span>[<?php echo (date('m.d',$v["time"])); ?>]</span><em>[媒体]</em><a href="/article/tid/<?php echo ($v["id"]); ?>" class="a-link" target="_blank"><span><?php echo ($v["title"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div><div class="active f_r"><a href="HTTP://pay.<?php echo ($ai["url"]); ?>" target="_blank" class="b3"><h3 class="f24">游戏充值</h3><p>            INSTRUCTOR RECRUITMENT
          </p><em class="m1"></em><i></i></a><a href="#" target="_blank" class="b4"><h3 class="f24">VIP专区</h3><p>            VIP AREA
          </p><em class="m2 f_r"></em><i></i></a></div></div><div class="step step3"><dl class="issue f14 f_l"><dt>客服中心</dt><dd><ul class="link clearfix"><li><a href="http://gm.<?php echo ($ai["url"]); ?>" target="_blank"><em class="m1"></em>在线客服</a></li><li><a href="http://pay.<?php echo ($ai["url"]); ?>" target="_blank"><em class="m2"></em>充值中心</a></li><li><a href="http://user.<?php echo ($ai["url"]); ?>" target="_blank"><em class="m3"></em>个人中心</a></li></ul><p style="padding-left:15px;">            客服电话：<?php echo ($ai["tel"]); ?></p><p style="padding-left:15px;margin-top:10px;">            客服邮箱：<?php echo ($ai["mail"]); ?></p></dd></dl><dl class="roles f_l"><dt data-num="1" style="display:none;"><h3 class="f28">01</h3><h4 class="f30">当村长</h4><span>做牛<p>X</p>村长</span><span>建土豪村庄</span></dt><dd ><a href="/ziliao" target="_blank"><img  src="/images/home/<?php echo ($gamezhuti); ?>/images/e56a23015a438c74.jpg" style="width: 313px; height: 216px;"/></a></dd><dt data-num="2"><h3 class="f28">02</h3><h4 class="f30">打天下</h4><span>天下如此大</span><span>我想打打看</span></dt><dd style="display:none;"><a href="/ziliao" target="_blank"><img src="/images/home/<?php echo ($gamezhuti); ?>/images/0635efdad27fa0a1.jpg" style="width: 313px; height: 216px;"/></a></dd><dt data-num="3"><h3 class="f28">03</h3><h4 class="f30">斗武将</h4><span>斗萌斗武</span><span>海量武将</span></dt><dd style="display:none;"><a href="/ziliao" target="_blank"><img src="/images/home/<?php echo ($gamezhuti); ?>/images/2e5a0e9918bae0fd.jpg" style="width: 313px; height: 216px;"/></a></dd><dt data-num="4"><h3 class="f28">04</h3><h4 class="f30">掠资源</h4><span>等我来<p>！ </p></span><span>放开那些资源</span></dt><dd style="display:none;"><a href="/ziliao" target="_blank"><img src="/images/home/<?php echo ($gamezhuti); ?>/images/7311c8b2dfe57fa8.jpg" style="width: 313px; height: 216px;"/></a></dd><dt data-num="5"><h3 class="f28">05</h3><h4 class="f30">抢城池</h4><span>建造城池</span><span>占领名城</span></dt><dd  style="display:none;"><a href="/ziliao" target="_blank"><img src="/images/home/<?php echo ($gamezhuti); ?>/images/bd5729e50e3084ed.jpg" style="width: 313px; height: 216px;"/></a></dd></dl><dl class="data f14 f_r"><dt><a href="/ziliao" class="f_r">更多+</a>游戏资料 </dt><dd><div class="yxzl"><em>新手指南<i></i></em><?php if(is_array($xszd)): $i = 0; $__LIST__ = $xszd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="article/tid/<?php echo ($v["id"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></div><div class="yxzl"><em>高手进阶<i></i></em><?php if(is_array($gsjj)): $i = 0; $__LIST__ = $gsjj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="article/tid/<?php echo ($v["id"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></div><div class="yxzl"><em>游戏特色<i></i></em><?php if(is_array($tswf)): $i = 0; $__LIST__ = $tswf;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="article/tid/<?php echo ($v["id"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></div></dd></dl></div></div></div><script type="text/javascript" >var gid=<?php echo ($gameid); ?>;
</script><script src="/js/home/login.js"></script></body></html>