<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>登录中心_<?php echo ($ai["title"]); ?>_<?php echo ($ai["sitename"]); ?></title><meta name="keywords" content="<?php echo ($ai["keywords"]); ?>"><meta name="description" content="<?php echo ($ai["description"]); ?>"><link href="http://<?php echo ($ai["domain"]); ?>/css/style.css" rel="stylesheet" type="text/css" /><link rel="stylesheet" type="text/css" href="http://<?php echo ($ai["domain"]); ?>/css/login.css" /><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/jquery.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><link rel="stylesheet" href="/images/2016752g/css/bar.css"><!--[if IE 6]><script src="http://<?php echo ($ai["domain"]); ?>/js/DD_belatedPNG.js"></script><script>
  DD_belatedPNG.fix('.logo,.act');
</script><![endif]--></head><body class="bg"><!-- 导航栏 --><div id="header"><!-- 导航条顶部 --><div class="header"><div class="header-hd"><!-- 导航栏顶部左边 --><ul class="header-hd-left"><li><a href="http://<?php echo ($ai["domain"]); ?>/shortcut" class="to-desk">把<?php echo ($ai["title"]); ?>放在桌面桌面</a></li><li><a href="#" onclick="SetHome(this,'http://<?php echo ($ai["domain"]); ?>');" class="home-page">设为首页</a></li><li><a href="#" onclick="AddFavorite('http://<?php echo ($ai["domain"]); ?>','<?php echo ($ai["title"]); ?>');"  class="on-home">加入收藏</a></li></ul><!-- 导航栏顶部搜索框 --><!-- <form action="" method="post"><div class="header-hd-middle"><p>游戏</p><input type="text" placeholder="请输入搜索内容"><i></i></div></form> --><!-- 导航栏顶部右边 --><div class="header-hd-right"><!-- 登录前 --><ul class="register-prev" style="margin-left:40%;" id="reg"><li class="prev-denglu"><a href="javascript:;">登录</a>|</li><li><a href="http://reg.<?php echo ($ai["url"]); ?>" style="margin-left:5px;">注册</a></li></ul><!-- 登录后 --><ul class="register-next" id="loginok" style="display:none;"><li class="register-next-a"><a href="http://user.<?php echo ($ai["url"]); ?>" id="topname"></a><!-- 我的个人资料 --><!-- <ol class="game-platform" style="display:none"><li ><a class="active" href="#"><p>游戏平台hkjhkjkj</p><i></i></a></li><li class="game-platform-2"><a href="#"><span></span>账号安全</a></li><li class="game-platform-3"><a href="#"><span></span>VIP特权</a></li><li class="game-platform-4"><a href="#"><span></span>我的礼包</a></li><li class="game-platform-5"><a href="#"><span></span>我的积分</a></li><li class="game-platform-6"><a href="#"><span></span>退出登录</a></li></ol> --></li><li><a href="#"><span></span></a></li><li class="u-msg has-msg"><a href="http://user.<?php echo ($ai["url"]); ?>/user_message">消息 <span></span></a><!-- 消息内容 --><!--<div class="my-news" style="display:none;"><p>共有 <a>2条</a> 新消息</p><ul class="my-news-matter"><li class="news-matter-1"><div class="news-matter-nav">激情夏日,欧洲杯半决赛竞猜火热开启<a>2016-07-06 15:12:00</a></div><div class="news-matter-tit">猜半决赛比赛胜者，赢海量积分和阿迪耐克！...　<a href="register-xinxi.html">详细>></a></div></li></ul></div>--></li><li class="exit"><a href="javascript:void(0);" onclick="exit();return false;">[退出]</a></li></ul><!-- 所有游戏 --><div class="all-games"><span>所有游戏</span><i></i><div class="games-nav" style="display:none;"><ul style="margin-top:3px;"><?php if(is_array($loaddh_game)): $i = 0; $__LIST__ = $loaddh_game;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>"><label class="nav<?php echo ($i); ?>"><?php echo (mysubstr(0,4,$vo["gamename"])); ?></label><?php echo ($vo["gamename"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?><li><a href="http://gameplay.<?php echo ($ai["url"]); ?>/">更多>></a></li></ul></div></div></div></div></div><!-- 导航条 --><div class="header-nav"><!-- logo --><div class="logo"><img src="/images/2016752g/img/logo.png" alt=""></div><ul class="nav-navi"><li><a href="http://<?php echo ($ai["domain"]); ?>/">首页</a></li><?php if(empty($userinfo['uname'])): ?><li><a href="http://user.<?php echo ($ai["url"]); ?>/login">用户中心</a></li><?php else: ?><li><a href="http://user.<?php echo ($ai["url"]); ?>">用户中心</a></li><?php endif; ?><li><a href="http://daquan.<?php echo ($ai["url"]); ?>">游戏中心</a></li><li><a href="http://pay.<?php echo ($ai["url"]); ?>/">充值中心</a></li><li><a href="#" onClick="return confirm('敬请期待！');">积分商城</a></li><li><a href="http://libao.<?php echo ($ai["url"]); ?>">礼包中心</a></li><li class="nav-active"><a href="http://gm.<?php echo ($ai["url"]); ?>/">客服中心</a></li><li><a href="http://zixun.<?php echo ($ai["url"]); ?>">游戏资讯</a></li><li><a href="http://bbs.<?php echo ($ai["url"]); ?>">官方论坛</a></li><li><a href="http://<?php echo ($ai["domain"]); ?>/youxihe">游戏盒子</a></li></ul></div></div><div class="B_bg"><div class="login_con"><div class="ad"><img src="/images/ad.jpg" width="573" height="427" /></div><div class="login"><h2><a href="http://reg.<?php echo ($ai["url"]); ?>" class="regist">立即注册</a>还没有<?php echo ($ai["title"]); ?>帐号?</h2><p></p><input class="in_txt1 fl mb6" type="text" value="用户名或手机号" onblur="if (value ==''){value='用户名或手机号';}" onclick="if(this.value=='用户名或手机号'){this.value='';}" id="usname" tabindex="1"><input id="login_pwdTxt" class="in_pwd1 fl" type="text" onfocus="if(this.value == '请输入密码'){document.getElementById('uspsd').style.display = 'block';document.getElementById('uspsd').focus();document.getElementById('login_pwdTxt').style.display = 'none';}" value="请输入密码" tabindex="2" name="login_pwdTxt" style="display: block;"><input id="uspsd" class="in_pwd1 fl" type="password" style="display: none;" onblur="if(this.value == ''){document.getElementById('login_pwdTxt').style.display = 'block';document.getElementById('uspsd').style.display = 'none';}" tabindex="2" name="login_pass"><input id="loginCenter" class="in_pwd fl" type="hidden" value="1"><div class="remember fl"><a href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" class="forget A">忘记密码？</a><input type="checkbox" checked="checked" class="checkbox" id="saveid">&nbsp;<label>记住用户名</label></div><a href="#" class="dl" onclick="doLogin();">登录</a><div class="other_login"><span class="fl">其他登录方式：</span><a href="#" onclick="toQzoneLogin()" class="other1"></a><a href="#" onclick="toWeiboLogin()" class="other2"></a></div></div></div></div><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/basic.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/login.js"></script><!-- 尾部 --><div id="footer"><div class="ft-nav"><div class="rec-game tc"><label>推荐游戏:</label><?php if(is_array($loaddh_game)): $i = 0; $__LIST__ = array_slice($loaddh_game,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a target="_blank" href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>" title="<?php echo ($vo["gamename"]); ?>" ><?php echo ($vo["gamename"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></div><p class="ft-company tc"><a href='http://daquan.<?php echo ($ai["url"]); ?>' target='_blank'>游戏大厅</a>|
                        <a href='http://zixun.<?php echo ($ai["url"]); ?>/news/298' target='_blank'>联系我们</a>|
                        <a href='http://zixun.<?php echo ($ai["url"]); ?>/news/297' target='_blank'>公司简介</a></p><p class="ft_feiyang tc">Copyright &copy;2016 <?php echo ($ai["title"]); ?><a target="_blank" href="http://<?php echo ($ai["domain"]); ?>" ><?php echo ($ai["domain"]); ?></a><a href="/images/zizhi/icp.jpg" target="_blank">京ICP证120137号</a><a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010702001414" target="_blank">京公网安备11010702001414号</a><a href="/images/zizhi/ww.jpg" target="_blank">京网文【2014】2008-258号</a><p class="ft-zquan tc">北京飞扬天下网络科技股份有限公司(证券代码：831302)<a href="http://www.miibeian.gov.cn/">京ICP备11049124-2号 </a></p><ul class="ft-wj"><li><a class="wj-01" href="http://www.bjeit.gov.cn/">公共信息安全网络检查</a></li><li><a class="wj-02" href="http://www.cyberpolice.cn/wfjb/html/index.shtml">不良信息举报中心</a></li><li><a class="wj-03" href="#">企业信用评级证书</a></li><li><a class="wj-04" href="/images/zizhi/ww.jpg">互联网文化经营单位</a></li><li><a class="wj-05" href="http://www.hd315.gov.cn/">北京市工商行政管理局</a></li><li><a class="wj-06" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010702001414">京公网安备 <br>11010702001414</a></li><li><a  key ="583eb069efbfb014cd56a0b7"  logo_size="124x47"  logo_type="business"  href="http://www.anquan.org" ><script src="//static.anquan.org/static/outer/js/aq_auth.js"></script></a></li><div style="display: none;"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1256269989'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1256269989%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script><!-- QiDianDA --><script>
(function(w, a, m){m='__qq_qidian_da';w[m]=a;w[a]=w[a]||function(){(w[a][m]=w[a][m]||[]).push(arguments);};})(window,'qidianDA');
qidianDA('create', '2852137359', 'a6654f76bf839e8dddbfc43a2bb45034', {
    mtaId: '500381538'
});
qidianDA('set', 't1', new Date());
</script><script async src="//bqq.gtimg.com/da/i.js"></script><!-- End QiDianDA --></div><!-- WPA start --><script src="//wp.qiye.qq.com/qidian/2852137359/c547bb4b7be187c45bfeba5e740fac6a" charset="utf-8"></script><!-- WPA end --></ul><p class="miaoshu tc">抵制不良网页游戏，拒绝盗版游戏。 注意自我保护，谨防受骗上当。 适度游戏益脑，沉迷游戏伤身。 合理安排时间，享受健康生活。</p></div></div><!-- 固定返回顶部按钮 --><div id="guding"><div class="erweima" title="微信二维码"><div class="weima" style=""><div class="weima-tu"><img src="/images/2016752g/img/bg-top-erwei.jpg" alt=""><i></i></div></div></div><div class="kefu" title="客服服务"><a href="http://gm.<?php echo ($ai["rul"]); ?>"></a></div><div style="margin-top:2px;" id="rtt"><img src="/images/2016752g/img/fhdb_off.jpg" title="返回顶部"></div></div></body></html>