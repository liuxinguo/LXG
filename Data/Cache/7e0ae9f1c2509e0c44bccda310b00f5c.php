<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML><html ><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title><?php echo ($ai["title"]); ?>-<?php echo ($ai["sitename"]); ?></title><meta name="keywords" content="<?php echo ($ai["keywords"]); ?>"><meta name="description" content="<?php echo ($ai["description"]); ?>"><!-- 导航条样式 --><link rel="stylesheet" href="/images/2016752g/css/bar.css"><!-- 首页样式 --><link rel="stylesheet" href="/images/2016752g/css/index.css"><link rel="stylesheet" href="/images/2016752g/css/common.css"><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script src="/images/2016752g/js/jquery-1.7.2.min.js"></script><script src="http://www.752g.com/js/basic.js"></script></head><body><!-- 导航栏 --><div id="header"><!-- 导航条顶部 --><div class="header"><div class="header-hd"><!-- 导航栏顶部左边 --><ul class="header-hd-left"><li><a href="http://<?php echo ($ai["domain"]); ?>/shortcut" class="to-desk">把<?php echo ($ai["title"]); ?>放在桌面桌面</a></li><li><a href="#" onclick="SetHome(this,'http://<?php echo ($ai["domain"]); ?>');" class="home-page">设为首页</a></li><li><a href="#" onclick="AddFavorite('http://<?php echo ($ai["domain"]); ?>','<?php echo ($ai["title"]); ?>');"  class="on-home">加入收藏</a></li></ul><!-- 导航栏顶部搜索框 --><!-- <form action="" method="post"><div class="header-hd-middle"><p>游戏</p><input type="text" placeholder="请输入搜索内容"><i></i></div></form> --><!-- 导航栏顶部右边 --><div class="header-hd-right"><!-- 登录前 --><ul class="register-prev" style="margin-left:40%;" id="reg"><li class="prev-denglu"><a href="javascript:;">登录</a>|</li><li><a href="http://reg.<?php echo ($ai["url"]); ?>" style="margin-left:5px;">注册</a></li></ul><!-- 登录后 --><ul class="register-next" id="loginok" style="display:none;"><li class="register-next-a"><a href="http://user.<?php echo ($ai["url"]); ?>" id="topname"></a><!-- 我的个人资料 --><!-- <ol class="game-platform" style="display:none"><li ><a class="active" href="#"><p>游戏平台hkjhkjkj</p><i></i></a></li><li class="game-platform-2"><a href="#"><span></span>账号安全</a></li><li class="game-platform-3"><a href="#"><span></span>VIP特权</a></li><li class="game-platform-4"><a href="#"><span></span>我的礼包</a></li><li class="game-platform-5"><a href="#"><span></span>我的积分</a></li><li class="game-platform-6"><a href="#"><span></span>退出登录</a></li></ol> --></li><li><a href="#"><span></span></a></li><li class="u-msg has-msg"><a href="http://user.<?php echo ($ai["url"]); ?>/user_message">消息 <span></span></a><!-- 消息内容 --><!--<div class="my-news" style="display:none;"><p>共有 <a>2条</a> 新消息</p><ul class="my-news-matter"><li class="news-matter-1"><div class="news-matter-nav">激情夏日,欧洲杯半决赛竞猜火热开启<a>2016-07-06 15:12:00</a></div><div class="news-matter-tit">猜半决赛比赛胜者，赢海量积分和阿迪耐克！...　<a href="register-xinxi.html">详细>></a></div></li></ul></div>--></li><li class="exit"><a href="javascript:void(0);" onclick="exit();return false;">[退出]</a></li></ul><!-- 所有游戏 --><div class="all-games"><span>所有游戏</span><i></i><div class="games-nav" style="display:none;"><ul style="margin-top:3px;"><?php if(is_array($loaddh_game)): $i = 0; $__LIST__ = $loaddh_game;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>"><label class="nav<?php echo ($i); ?>"><?php echo (mysubstr(0,4,$vo["gamename"])); ?></label><?php echo ($vo["gamename"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?><li><a href="http://gameplay.<?php echo ($ai["url"]); ?>/">更多>></a></li></ul></div></div></div></div></div><!-- 导航条 --><div class="header-nav"><!-- logo --><div class="logo"><img src="/images/2016752g/img/logo.png" alt=""></div><ul class="nav-navi"><li class="nav-active"><a href="http://<?php echo ($ai["domain"]); ?>/">首页</a></li><li><a href="http://user.<?php echo ($ai["url"]); ?>">用户中心</a></li><li><a href="http://daquan.<?php echo ($ai["url"]); ?>">游戏中心</a></li><li><a href="http://pay.<?php echo ($ai["url"]); ?>/">充值中心</a></li><li><a href="#" onClick="return confirm('敬请期待！');">积分商城</a></li><li><a href="http://libao.<?php echo ($ai["url"]); ?>">礼包中心</a></li><li><a href="http://gm.<?php echo ($ai["url"]); ?>/">客服中心</a></li><li><a href="http://zixun.<?php echo ($ai["url"]); ?>">游戏资讯</a></li><li><a href="http://bbs.<?php echo ($ai["url"]); ?>">官方论坛</a></li><li><a href="http://<?php echo ($ai["domain"]); ?>/youxihe">游戏盒子</a></li></ul></div></div><!-- 主题内容 --><div id="content"><div style="position: relative;"><!-- 轮播图 --><div id="picarea"><div id="bigpicarea"><?php if(is_array($pub_article_flash)): $i = 0; $__LIST__ = $pub_article_flash;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$flash): $mod = ($i % 2 );++$i;?><div class="image"><a href="http://zixun.<?php echo ($ai["url"]); ?>/news/<?php echo ($flash["id"]); ?>" target="_blank"><img src="<?php echo ($flash["pic"]); ?>"></a></div><?php endforeach; endif; else: echo "" ;endif; ?></div><div id="smallpicarea"><div id="thumbs"><ul><?php if(is_array($pub_article_flash)): $i = 0; $__LIST__ = $pub_article_flash;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$flash): $mod = ($i % 2 );++$i;?><li class="slideshowItem"><?php if(($i) == "1"): ?><a href="javascript:" class="current" target="_blank"></a><?php else: ?><a href="javascript:" target="_blank"></a><?php endif; ?></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div></div><style>				.cont-width{position: absolute;right: 0;top: -375px;}
			</style><!-- 主题 --><div class="cont"><div class="cont-width"><!-- 登录框 登录前 --><div class="zhuye_register register_frame-cont"  id="login"><div class="zhuce-bj"></div><ul class="zhuye_fangshi"><li>账号登录</li><!-- <li>手机登录</li> --></ul><div class="register_ku"><div class="register_ku_label"><label for="username">账号:</label><input type="text" placeholder="请输入用户名" name="username" id="username"></div><div class="register_ku_label"><label for="password">密码:</label><input type="password" placeholder="请输入密码" name="userpass" id="userpass"><input type="hidden" name="rls" id="rls" value="1"></div><div class="register_ku_zidong"><input type="checkbox" checked="checked">自动登录<a href="http://reg.752g.com/pwd_find.html">忘记密码?</a></div><p><a href="javascript:void(0);" onclick="login();return false;"  class="denglu">登录</a></p><a href="http://reg.<?php echo ($ai["url"]); ?>/" class="zhuce">点击注册</a></div></div><!-- 登录框 登录后 --><div class="register_back register_frame-cont" id="se_list" style="display:none;"><div class="register_back_head"><i style="width:78px;height:78px;margin-top:35px;"><img src="/images/2016752g/img/header.png" alt=""></i><ul><li><a href="#" class="register_back_name" id="uname"><?php echo ($userinfo["uname"]); ?></a><a href="javascript:void(0);" onclick="exit();return false;" class="exit" >[退出]</a></li><li class="register_back_money">平台币:<span id="money"><?php echo ($userinfo["money"]); ?></span></li><li class="register_back_money">积&nbsp;分:<span class="jifen" id="jifen"><?php echo ($userinfo["jifen"]); ?></span></li><li class="register_back_cz"><a href="http://pay.<?php echo ($ai["url"]); ?>/">充值</a><!-- <span class="sign-in"><span>签到</span></span> --></li></ul></div><!-- 等级 --><div class="register_grade"><i class="vip1"></i><div class="register_progress"><div class="register_bar"></div></div></div><!-- 推荐游戏 --><div class="register_tuijian"><h6>推荐游戏</h6><ul id="last_game_info"><?php if(is_array($login_game)): $i = 0; $__LIST__ = $login_game;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><i><img src="<?php echo ($vo["pic"]["icon"]); ?>" alt=""></i><ol><li><a href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>"><?php echo ($vo["gamename"]); ?></a></li><li><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($vo["gid"]); ?>&sid=<?php echo ($vo["sid"]); ?>">双线<?php echo ($vo["sid"]); ?>服</a></li><li><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($vo["gid"]); ?>&sid=<?php echo ($vo["sid"]); ?>" style="color:red;">开始游戏</a></li></ol></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div><div style="margin-top:-340px;position:relative;z-index:999;background-color:#fff;overflow:hidden;"><!-- 左边的内容 --><div class="cont-left"><!-- 精品游戏 --><div class="cont-boutique"><p class="cont-title cont-jp"><span></span>推荐游戏</p><ul class="ul-title"><?php if(is_array($game_tuijian)): $i = 0; $__LIST__ = $game_tuijian;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><?php if(($i) == "1"): ?><i class="games-new"></i><?php else: ?><i class="games-tui"></i><?php endif; ?><a href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>"><img src="<?php echo ($vo["pic"]["best"]); ?>" alt="<?php echo ($vo["gamename"]); ?>" title="<?php echo ($vo["gamename"]); ?>"></a><ol class="boutique-title animate"><li class="boutique-name"><a href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>" title="<?php echo ($vo["gamename"]); ?>"><?php echo ($vo["gamename"]); ?></a></li><li class="boutique-come"><a href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>/server_list" title="进入游戏">进入游戏</a></li></ol></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><!-- 最新游戏 --><div class="cont-new " id="cont-new"><p class="cont-title cont-new"><span></span>热门游戏 <a href="http://daquan.<?php echo ($ai["url"]); ?>">更多+</a></p><ul class="cont-new-nr"><?php if(is_array($game_remen)): $i = 0; $__LIST__ = $game_remen;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="new-nr"><a href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>"><img src="<?php echo ($vo["pic"]["index"]); ?>" alt="" title="<?php echo ($vo["gamename"]); ?>"><h4><?php echo ($vo["gamename"]); ?></h4><p><?php echo ($vo["category"]); ?></p></a><ol class="cont-new-by animate"><div></div><li><a href="http://libao.<?php echo ($ai["url"]); ?>/game/<?php echo ($vo["id"]); ?>" title="领取礼包">礼包</a></li><li><a href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>" title="进入官网">官网</a></li><li><a href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>/server_list" title="进入游戏">进入游戏</a></li></ol></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><!-- 游戏礼包 --><div class="cont-gift"><p class="cont-title cont-gift"><span></span>游戏礼包<a href="http://libao.<?php echo ($ai["url"]); ?>">更多+</a></p><ul class="git-detauils"><?php if(is_array($rm_card)): $i = 0; $__LIST__ = $rm_card;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="gift-xiangqing.html" class="git-head"><img src="<?php echo ($vo["pic"]["icon"]); ?>" alt="" title="<?php echo ($vo["gamename"]); ?>"></a><div class="git-describe"><a href="http://libao.<?php echo ($ai["url"]); ?>/game/<?php echo ($vo["gid"]); ?>" title="<?php echo ($vo["gamename"]); ?>礼包"><?php echo ($vo["gamename"]); ?>礼包</a><p>还剩 <span><?php echo ($vo["remain"]); ?></span> 个</p></div><a href="http://libao.<?php echo ($ai["url"]); ?>/game/<?php echo ($vo["gid"]); ?>" class="cont-get">领取</a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div><!-- 右边的内容 --><div class="cont-right"><!-- 活动公告 --><div class="active-bull"><p class="cont-title cont-notice"><span></span>新闻公告</p><div class="active-deatails"><ul><?php if(is_array($article)): $i = 0; $__LIST__ = array_slice($article,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="http://zixun.<?php echo ($ai["url"]); ?>/news/<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>" target="_blank"><?php echo (mysubstr(0,18,$vo["title"])); ?></a><?php echo (date('m-d',$vo["addtime"])); ?></li><?php endforeach; endif; else: echo "" ;endif; if(is_array($game_news)): $i = 0; $__LIST__ = array_slice($game_news,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>/article/tid/<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>" target="_blank"><?php echo (mysubstr(0,18,$vo["title"])); ?></a><?php echo (date('m-d',$vo["time"])); ?></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div><!-- 开服列表 --><div class="new-listbox"><p class="cont-title cont-least"><span></span>开服列表</p><div class="listbox-head"><ul ><li class="listbox-active">已开新服</li><li>新服预告</li></ul><div class="new-herald new-herald-one" ><table border="0" width="100%" cellspacing="0" cellpadding="0" class="server-tab"><tbody class="tbody_a tbody_aa"><tr><td class="bianju" width="35%">游戏</td><td width="30%">服数</td><td width="35%">日期</td></tr><?php if(is_array($yk_server)): $i = 0; $__LIST__ = $yk_server;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="tab-li" title="<?php echo ($vo["gamename"]); ?>"><td><a class="bianju" href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>"><?php echo ($vo["gamename"]); ?></a></td><td><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($vo["gid"]); ?>&sid=<?php echo ($vo["sid"]); ?>">双线<?php echo ($vo["sid"]); ?>服</a></td><td><?php echo (date('m-d H:i',$vo["begintime"])); ?></td></tr><?php if(($i) == "10"): ?></tbody><tbody class="tbody_b tbody_bb"><tr><td class="bianju" width="35%">游戏</td><td width="30%">服数</td><td width="35%">日期</td></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?></tbody></table><ol class="tab-change"><li class="tab-active"></li><li></li></ol></div><div class="new-herald new-herald-two" style="display:none;"><table border="0" width="100%" cellspacing="0" cellpadding="0" class="server-tab" style=""><tbody class="tbody_a tbody_cc"><tr><td class="bianju" width="35%">游戏</td><td width="30%">服数</td><td width="35%">日期</td></tr><?php if(is_array($xf_server)): $i = 0; $__LIST__ = $xf_server;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="tab-li" title="<?php echo ($vo["gamename"]); ?>"><td><a class="bianju" href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>"><?php echo ($vo["gamename"]); ?></a></td><td><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($vo["gid"]); ?>&sid=<?php echo ($vo["sid"]); ?>">双线<?php echo ($vo["sid"]); ?>服</a></td><td><?php echo (date('m-d H:i',$vo["begintime"])); ?></td></tr><?php if(($i) == "10"): ?></tbody><tbody class="tbody_b tbody_bb"><tr><td class="bianju" width="35%">游戏</td><td width="30%">服数</td><td width="35%">日期</td></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?></tbody></table><ol class="tab-change"><li class="tab-active"></li><li></li></ol></div></div></div><!-- <div class="cont-img"><img src="/images/2016752g/img/big/15122258NMlln.jpg" alt="" title="唐门六道"></div> --><!-- 游戏排行 --><div class="game-list "><p class="cont-title cont-num" ><span></span>热游排行</p><div class="game-num"><?php if(is_array($game_hot)): $i = 0; $__LIST__ = $game_hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($i) == "1"): ?><div class="num-one num-dotted" title="<?php echo ($vo["gamename"]); ?>"><img src="<?php echo ($vo["pic"]["icon"]); ?>" alt="<?php echo ($vo["gamename"]); ?>" style="width:52px;"><i></i><ul class="num-one-name"><li><a href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>"><?php echo ($vo["gamename"]); ?></a></li><li><a href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>"><?php echo ($vo["category"]); ?></a></li></ul><p class="num-one-come"><a href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>/server_list">进入游戏</a></p></div><?php else: ?><div class="num-dotted num-two" title="<?php echo ($vo["gamename"]); ?>"><ul><li><span><?php echo ($i); ?></span></li><li class="num-dotted-name"><a href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>"><?php echo ($vo["gamename"]); ?></a></li><li class="num-dotted-leix"><a href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>"><?php echo ($vo["category"]); ?></a></li><li class="num-come"><a href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>/server_list">进入游戏</a></li></ul></div><?php endif; endforeach; endif; else: echo "" ;endif; ?></div></div><!-- 快捷通道 --><div class="fast-track"><p class="cont-title cont-track" ><span></span>快捷通道</p><ul class="track_help"><li><a href="http://pay.<?php echo ($ai["url"]); ?>" title="充值游戏">充值游戏</a></li><li><a href="http://reg.<?php echo ($ai["url"]); ?>/" title="注册帐号">注册帐号</a></li><li><a href="http://user.<?php echo ($ai["url"]); ?>/user_renzheng_psd.html" title="修改密码">修改密码</a></li><li><a href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" title="密码找回">密码找回</a></li><li><a href="http://user.<?php echo ($ai["url"]); ?>/user_renzheng_eml.html" title="绑定邮箱">绑定邮箱</a></li><li><a href="http://user.<?php echo ($ai["url"]); ?>/user_renzheng_ph.html" title="绑定手机">绑定手机</a></li><li><a href="http://www.<?php echo ($ai["url"]); ?>/jzjh/" title="家长监护">家长监护</a></li><li><a href="http://user.<?php echo ($ai["url"]); ?>/user_info_cm.html" title="防沉迷">防沉迷</a></li></ul></div><!-- 客服电话 --><div class="game-tel "><p class="cont-title cont-tel" ><img src="/images/2016752g/img/kf1.png" alt=""></p><ul><li>客服电话: <span><?php echo ($ai["tel"]); ?></span></li><li>客服邮箱:<span><?php echo ($ai["mail"]); ?></span></li></ul></div></div></div><!-- 友情链接 --><div class="friendship"><p>友情链接</p><ul><?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="<?php echo ($vo["website"]); ?>" title="<?php echo ($vo["webname"]); ?>" ><?php echo ($vo["webname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div><!-- 尾部 --><div id="footer"><div class="ft-nav"><div class="rec-game tc"><label>推荐游戏:</label><?php if(is_array($loaddh_game)): $i = 0; $__LIST__ = array_slice($loaddh_game,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a target="_blank" href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>" title="<?php echo ($vo["gamename"]); ?>" ><?php echo ($vo["gamename"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></div><p class="ft-company tc"><a href='http://daquan.<?php echo ($ai["url"]); ?>' target='_blank'>游戏大厅</a>|
                        <a href='http://zixun.<?php echo ($ai["url"]); ?>/news/298' target='_blank'>联系我们</a>|
                        <a href='http://zixun.<?php echo ($ai["url"]); ?>/news/297' target='_blank'>公司简介</a></p><p class="ft_feiyang tc">Copyright &copy;2016 <?php echo ($ai["title"]); ?><a target="_blank" href="http://<?php echo ($ai["domain"]); ?>" ><?php echo ($ai["domain"]); ?></a><a href="/images/zizhi/icp.jpg" target="_blank">京ICP证120137号</a><a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010702001414" target="_blank">京公网安备11010702001414号</a><a href="/images/zizhi/ww.jpg" target="_blank">京网文【2014】2008-258号</a><p class="ft-zquan tc">北京飞扬天下网络科技股份有限公司(证券代码：831302)<a href="http://www.miibeian.gov.cn/">京ICP备11049124-2号 </a></p><ul class="ft-wj"><li><a class="wj-01" href="http://www.bjeit.gov.cn/">公共信息安全网络检查</a></li><li><a class="wj-02" href="http://www.cyberpolice.cn/wfjb/html/index.shtml">不良信息举报中心</a></li><li><a class="wj-03" href="#">企业信用评级证书</a></li><li><a class="wj-04" href="/images/zizhi/ww.jpg">互联网文化经营单位</a></li><li><a class="wj-05" href="http://www.hd315.gov.cn/">北京市工商行政管理局</a></li><li><a class="wj-06" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010702001414">京公网安备 <br>11010702001414</a></li><li><a  key ="583eb069efbfb014cd56a0b7"  logo_size="124x47"  logo_type="business"  href="http://www.anquan.org" ><script src="//static.anquan.org/static/outer/js/aq_auth.js"></script></a></li><div style="display: none;"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1256269989'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1256269989%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script><!-- QiDianDA --><script>
(function(w, a, m){m='__qq_qidian_da';w[m]=a;w[a]=w[a]||function(){(w[a][m]=w[a][m]||[]).push(arguments);};})(window,'qidianDA');
qidianDA('create', '2852137359', 'a6654f76bf839e8dddbfc43a2bb45034', {
    mtaId: '500381538'
});
qidianDA('set', 't1', new Date());
</script><script async src="//bqq.gtimg.com/da/i.js"></script><!-- End QiDianDA --></div><!-- WPA start --><script src="//wp.qiye.qq.com/qidian/2852137359/c547bb4b7be187c45bfeba5e740fac6a" charset="utf-8"></script><!-- WPA end --></ul><p class="miaoshu tc">抵制不良网页游戏，拒绝盗版游戏。 注意自我保护，谨防受骗上当。 适度游戏益脑，沉迷游戏伤身。 合理安排时间，享受健康生活。</p></div></div><!-- 固定返回顶部按钮 --><div id="guding"><div class="erweima" title="微信二维码"><div class="weima" style=""><div class="weima-tu"><img src="/images/2016752g/img/bg-top-erwei.jpg" alt=""><i></i></div></div></div><div class="kefu" title="客服服务"><a href="http://gm.<?php echo ($ai["rul"]); ?>"></a></div><div style="margin-top:2px;" id="rtt"><img src="/images/2016752g/img/fhdb_off.jpg" title="返回顶部"></div></div><div style="width: 160px;height: 200px;position:fixed;left: 0;bottom:0;z-index: 9999;"><img src="/images/2016752g/img/7.png" alt=""></div><div class="up-box" style="width: 160px;height: 200px;position:fixed;left: 0;bottom:510px;z-index: 9999;cursor: pointer;display:none;"><img src="/images/2016752g/img/1.png" alt=""></div><!-- 登录框 --><!-- 弹出框 消失 --><div class="pop-box"><a href="<?php echo ($ai["bgurl"]); ?>"><img src="/images/2016752g/img/touming.jpg" alt=""></a><i title="关闭"><img src="/images/2016752g/img/touming.jpg" alt=""></i><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="Mask" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" width="1000" height="650"><param name="allowScriptAccess" value="always"><param name="allowFullScreen" value="true"><param name="loop" value="true"><param name="play" value="true"><param name="menu" value="true"><param name="quality" value="high"><param name="flashvars" value="winType=interior&amp;auto_play=0"><param name="movie" value="images/swf/huanxi.swf"><param name="wmode" value="transparent"><embed width="1000" height="650" allowscriptaccess="always" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" quality="high" src="images/swf/huanxi.swf" name="background" wmode="transparent"></object></div><div class="pop-beiy"></div><!-- 弹出框 显示 --><style>			/*弹出框 消失*/
            .pop-box{width: 1000px;height:650px;position:fixed;top:50%;left: 50%;margin-top: -325px;margin-left: -500px;z-index: 9998;transition:all 1s;}
			.pop-box a{width: 100%;height: 100%;display: block;position: absolute;top: 0;left: 0;z-index: 90;}
			.pop-box a img{width: 100%;}
			.pop-box i{   
	display: block;
    width: 120px;
    height: 120px;
    background-size: 100% 100%;
    cursor: pointer;
    position: absolute;
    top: -2px;
    right: -6px;
    z-index: 999;
}
			.pop-box i img{width: 100%;height: 100%;}
			.pop-beiy{width: 100%;height: 100%;position: fixed;left: 0;bottom: 0;background-color: #000;opacity: .5;z-index: 9997}
		</style><script>		$(".pop-box i").on("click",function(){
			$(".pop-box").hide();
			$(".up-box").show();
			$(".pop-beiy").hide();

		})
		$(".up-box").on("click",function(){
			$(".pop-box").show();
			$(".up-box").hide();
			$(".pop-beiy").show();
		})

	</script><script src="/images/2016752g/js/header.js"></script><script src="/images/2016752g/js/index.js"></script><script type="text/javascript" >var gid=0;
</script><script src="/images/2016752g/js/login.js"></script></body></html>