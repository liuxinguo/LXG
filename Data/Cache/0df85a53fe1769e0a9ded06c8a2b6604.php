<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html><head><title>752g - 用户中心</title><meta charset="UTF-8"><!-- 导航条样式 --><link rel="stylesheet" href="/images/2016752g/css/bar.css"><!-- 首页样式 --><link rel="stylesheet" href="/images/2016752g/css/index.css"><link rel="stylesheet" href="/images/2016752g/css/register.css"><script src="/images/2016752g/js/jquery-1.7.2.min.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script src="/images/2016752g/js/register.js"></script></head><body><!-- 导航栏 --><div id="header"><!-- 导航条顶部 --><div class="header"><div class="header-hd"><!-- 导航栏顶部左边 --><ul class="header-hd-left"><li><a href="http://<?php echo ($ai["domain"]); ?>/shortcut" class="to-desk">把<?php echo ($ai["title"]); ?>放在桌面桌面</a></li><li><a href="#" onclick="SetHome(this,'http://<?php echo ($ai["domain"]); ?>');" class="home-page">设为首页</a></li><li><a href="#" onclick="AddFavorite('http://<?php echo ($ai["domain"]); ?>','<?php echo ($ai["title"]); ?>');"  class="on-home">加入收藏</a></li></ul><!-- 导航栏顶部搜索框 --><!-- <form action="" method="post"><div class="header-hd-middle"><p>游戏</p><input type="text" placeholder="请输入搜索内容"><i></i></div></form> --><!-- 导航栏顶部右边 --><div class="header-hd-right"><!-- 登录前 --><ul class="register-prev" style="margin-left:40%;" id="reg"><li class="prev-denglu"><a href="javascript:;">登录</a>|</li><li><a href="http://reg.<?php echo ($ai["url"]); ?>" style="margin-left:5px;">注册</a></li></ul><!-- 登录后 --><ul class="register-next" id="loginok" style="display:none;"><li class="register-next-a"><a href="http://user.<?php echo ($ai["url"]); ?>" id="topname"></a><!-- 我的个人资料 --><!-- <ol class="game-platform" style="display:none"><li ><a class="active" href="#"><p>游戏平台hkjhkjkj</p><i></i></a></li><li class="game-platform-2"><a href="#"><span></span>账号安全</a></li><li class="game-platform-3"><a href="#"><span></span>VIP特权</a></li><li class="game-platform-4"><a href="#"><span></span>我的礼包</a></li><li class="game-platform-5"><a href="#"><span></span>我的积分</a></li><li class="game-platform-6"><a href="#"><span></span>退出登录</a></li></ol> --></li><li><a href="#"><span></span></a></li><li class="u-msg has-msg"><a href="http://user.<?php echo ($ai["url"]); ?>/user_message">消息 <span></span></a><!-- 消息内容 --><!--<div class="my-news" style="display:none;"><p>共有 <a>2条</a> 新消息</p><ul class="my-news-matter"><li class="news-matter-1"><div class="news-matter-nav">激情夏日,欧洲杯半决赛竞猜火热开启<a>2016-07-06 15:12:00</a></div><div class="news-matter-tit">猜半决赛比赛胜者，赢海量积分和阿迪耐克！...　<a href="register-xinxi.html">详细>></a></div></li></ul></div>--></li><li class="exit"><a href="javascript:void(0);" onclick="exit();return false;">[退出]</a></li></ul><!-- 所有游戏 --><div class="all-games"><span>所有游戏</span><i></i><div class="games-nav" style="display:none;"><ul style="margin-top:3px;"><?php if(is_array($loaddh_game)): $i = 0; $__LIST__ = $loaddh_game;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>"><label class="nav<?php echo ($i); ?>"><?php echo (mysubstr(0,4,$vo["gamename"])); ?></label><?php echo ($vo["gamename"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?><li><a href="http://gameplay.<?php echo ($ai["url"]); ?>/">更多>></a></li></ul></div></div></div></div></div><!-- 导航条 --><div class="header-nav"><!-- logo --><div class="logo"><img src="/images/2016752g/img/logo.png" alt=""></div><ul class="nav-navi"><li><a href="http://<?php echo ($ai["domain"]); ?>/">首页</a></li><?php if(empty($userinfo['uname'])): ?><li class="nav-active"><a href="http://user.<?php echo ($ai["url"]); ?>/login">用户中心</a></li><?php else: ?><li class="nav-active"><a href="http://user.<?php echo ($ai["url"]); ?>">用户中心</a></li><?php endif; ?><li><a href="http://daquan.<?php echo ($ai["url"]); ?>">游戏中心</a></li><li><a href="http://pay.<?php echo ($ai["url"]); ?>/">充值中心</a></li><li><a href="#" onClick="return confirm('敬请期待！');">积分商城</a></li><li><a href="http://libao.<?php echo ($ai["url"]); ?>">礼包中心</a></li><li><a href="http://gm.<?php echo ($ai["url"]); ?>/">客服中心</a></li><li><a href="http://zixun.<?php echo ($ai["url"]); ?>">游戏资讯</a></li><li><a href="http://bbs.<?php echo ($ai["url"]); ?>">官方论坛</a></li><li><a href="http://<?php echo ($ai["domain"]); ?>/youxihe">游戏盒子</a></li></ul></div></div><!-- 主体内容 --><div id="content"><div class="content"><div class="cont-head"><div class="head-left"><div class="user-infor-left"><a href="#" class="btn-img"><img src="/images/2016752g/img/touxiang/user1.jpg" alt=""></a><div href="javascript:;" class="btn-a"><label>修改头像</label><span><i></i><a href="javascript:;"><img src="/images/2016752g/img/touxiang/user1.jpg"  data-src="user1" alt=""></a><a href="javascript:;"><img src="/images/2016752g/img/touxiang/user2.jpg"  data-src="user2" alt=""></a><a href="javascript:;"><img src="/images/2016752g/img/touxiang/user3.jpg"  data-src="user3" alt=""></a><a href="javascript:;"><img src="/images/2016752g/img/touxiang/user4.jpg"  data-src="user4" alt=""></a><a href="javascript:;"><img src="/images/2016752g/img/touxiang/user5.jpg"  data-src="user5" alt=""></a><a href="javascript:;"><img src="/images/2016752g/img/touxiang/user6.jpg"  data-src="user6" alt=""></a><a href="javascript:;"><img src="/images/2016752g/img/touxiang/user7.jpg"  data-src="user7" alt=""></a><a href="javascript:;"><img src="/images/2016752g/img/touxiang/user8.jpg"  data-src="user8" alt=""></a><a href="javascript:;"><img src="/images/2016752g/img/touxiang/user9.jpg"  data-src="user9" alt=""></a></span></div></div><div class="user-infor-right"><ul><li><span class="db">您好,</span><span class="user-infor-name db"><?php echo ($userinfo["nickname"]); ?></span><a href="javascript:void(0);" onclick="exit();return false;" class="quit db">退出</a></li><li>								账号 : <span class="user-infor-name"><?php echo ($userinfo["uname"]); ?></span></li><li>								上次登陆时间 :
								<span><?php echo (date('Y-m-d H:i:s',$userinfo['stime'])); ?></span></li><li class="user_reg">								平台币：<?php echo ($userinfo["money"]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;
								积分：<?php echo ($userinfo["jifen"]); ?><a class="c_get_card" href="http://libao.<?php echo ($ai["url"]); ?>" target="_blank">领取新手礼包</a></li><li class="hot-game"><span>热门游戏推荐 : </span><?php if(is_array($loaddh_game)): $i = 0; $__LIST__ = array_slice($loaddh_game,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a target="_blank" href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>" title="<?php echo ($vo["gamename"]); ?>" ><?php echo ($vo["gamename"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></li></ul></div></div><div class="head-right"><h3>热门游戏推荐</h3><ul class="last-name"><?php if(is_array($yk_server)): $i = 0; $__LIST__ = array_slice($yk_server,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($vo["gid"]); ?>&sid=<?php echo ($vo["sid"]); ?>" class="game-name"><img src="<?php echo ($vo["pic"]["icon"]); ?>" target="_blank"><?php echo ($vo["gamename"]); ?></a><span class="serv"><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($vo["gid"]); ?>&sid=<?php echo ($vo["sid"]); ?>" target="_blank">双线<?php echo ($vo["sid"]); ?>服</a></span><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($vo["gid"]); ?>&sid=<?php echo ($vo["sid"]); ?>" class="btns" target="_blank">立即进入</a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div><div class="cont-body"><!-- 左边 --><div class="user-sidebar"><ul><li><div class="hd"><i class="icon_menu_data"></i><span>账号资料</span><i class="icon_menu_status"></i></div><ol class="fen-db" style="display:none;"><li><a href="/index.html">我的账号</a></li><li><a href="/user_info_zl.html">个人资料</a></li><li><a href="/mytask.html">我的任务</a></li><li><a href="/mygame.html">我的游戏</a></li></ol></li><li><div class="hd"><i class="icon_menu_safe"></i><span>账号安全</span><i class="icon_menu_status"></i></div><ol class="fen-db" style="display:none;"><li><a href="/user_info_cm.html">防沉迷设置</a></li><li><a href="/user_renzheng_ph.html">手机认证</a></li><li><a href="/user_renzheng_eml.html">邮箱认证</a></li><li><a href="/user_renzheng_psd.html">修改密码</a></li><li><a href="/user_renzheng_ask.html">密保问题</a></li></ol></li><li class="active"><div class="hd" ><i class="icon_menu_manage"></i><span>充值记录</span><i class="icon_menu_status"></i></div><ol class="fen-db"><li><a href="/trans_record.html">游戏充值记录</a></li><li><a href="/trans_ptrecord.html" class="db-active">平台币充值记录</a></li><li><a href="/trans_platform.html">平台币消费记录</a></li></ol></li><li><div class="hd"><i class="icon_menu_info"></i><span>信息管理</span><i class="icon_menu_status"></i></div><ol class="fen-db" style="display:none;"><li><a href="/user_message.html">我的信息</a></li></ol></li></ul></div><!-- 右边 --><div class="user-main_area"><p class="user_main_area_tit">游戏充值记录</p><table border="1" cellspacing="0" cellpadding="0" width="700px" style="border:1px solid #d7d7d7;margin-top:10px;border-collapse:collapse;"><thead><tr style="font-weight:bold;height: 36px;color:#333;"><th>时间</th><th>订单号</th><th>充值金额</th><th>平台币</th><th>充值方式</th><th>状态</th></tr></thead><tbody><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align="center" height="32px"><td><?php echo (date('Y-m-d',$vo["paytime"])); ?></td><td><?php echo ($vo["paysn"]); ?></td><td><?php echo ($vo["payamount"]); ?></td><td><?php echo ($vo["money"]); ?></td><td><?php echo ($vo["payname"]); ?></td><td><?php if(($vo['process']) == "1,1,1"): ?><font color="red">成功</font><?php else: if(($vo['process']) == "2,2,2"): ?>内充
									    <?php else: ?> 失败<?php endif; endif; ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?></tbody></table><div class="fy_nav"><?php echo ($ShowPage); ?></div></div></div></div></div><!-- 尾部 --><div id="footer"><div class="ft-nav"><div class="rec-game tc"><label>推荐游戏:</label><?php if(is_array($loaddh_game)): $i = 0; $__LIST__ = array_slice($loaddh_game,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a target="_blank" href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>" title="<?php echo ($vo["gamename"]); ?>" ><?php echo ($vo["gamename"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></div><p class="ft-company tc"><a href='http://daquan.<?php echo ($ai["url"]); ?>' target='_blank'>游戏大厅</a>|
                        <a href='http://zixun.<?php echo ($ai["url"]); ?>/news/298' target='_blank'>联系我们</a>|
                        <a href='http://zixun.<?php echo ($ai["url"]); ?>/news/297' target='_blank'>公司简介</a></p><p class="ft_feiyang tc">Copyright &copy;2016 <?php echo ($ai["title"]); ?><a target="_blank" href="http://<?php echo ($ai["domain"]); ?>" ><?php echo ($ai["domain"]); ?></a><a href="/images/zizhi/icp.jpg" target="_blank">京ICP证120137号</a><a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010702001414" target="_blank">京公网安备11010702001414号</a><a href="/images/zizhi/ww.jpg" target="_blank">京网文【2014】2008-258号</a><p class="ft-zquan tc">北京飞扬天下网络科技股份有限公司(证券代码：831302)<a href="http://www.miibeian.gov.cn/">京ICP备11049124-2号 </a></p><ul class="ft-wj"><li><a class="wj-01" href="http://www.bjeit.gov.cn/">公共信息安全网络检查</a></li><li><a class="wj-02" href="http://www.cyberpolice.cn/wfjb/html/index.shtml">不良信息举报中心</a></li><li><a class="wj-03" href="#">企业信用评级证书</a></li><li><a class="wj-04" href="/images/zizhi/ww.jpg">互联网文化经营单位</a></li><li><a class="wj-05" href="http://www.hd315.gov.cn/">北京市工商行政管理局</a></li><li><a class="wj-06" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010702001414">京公网安备 <br>11010702001414</a></li><li><a  key ="583eb069efbfb014cd56a0b7"  logo_size="124x47"  logo_type="business"  href="http://www.anquan.org" ><script src="//static.anquan.org/static/outer/js/aq_auth.js"></script></a></li><div style="display: none;"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1256269989'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1256269989%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script><!-- QiDianDA --><script>
(function(w, a, m){m='__qq_qidian_da';w[m]=a;w[a]=w[a]||function(){(w[a][m]=w[a][m]||[]).push(arguments);};})(window,'qidianDA');
qidianDA('create', '2852137359', 'a6654f76bf839e8dddbfc43a2bb45034', {
    mtaId: '500381538'
});
qidianDA('set', 't1', new Date());
</script><script async src="//bqq.gtimg.com/da/i.js"></script><!-- End QiDianDA --></div><!-- WPA start --><script src="//wp.qiye.qq.com/qidian/2852137359/c547bb4b7be187c45bfeba5e740fac6a" charset="utf-8"></script><!-- WPA end --></ul><p class="miaoshu tc">抵制不良网页游戏，拒绝盗版游戏。 注意自我保护，谨防受骗上当。 适度游戏益脑，沉迷游戏伤身。 合理安排时间，享受健康生活。</p></div></div><!-- 固定返回顶部按钮 --><div id="guding"><div class="erweima" title="微信二维码"><div class="weima" style=""><div class="weima-tu"><img src="/images/2016752g/img/bg-top-erwei.jpg" alt=""><i></i></div></div></div><div class="kefu" title="客服服务"><a href="http://gm.<?php echo ($ai["rul"]); ?>"></a></div><div style="margin-top:2px;" id="rtt"><img src="/images/2016752g/img/fhdb_off.jpg" title="返回顶部"></div></div><script src="/images/2016752g/js/header.js"></script><script type="text/javascript" >var gid=0;
</script><script src="/images/2016752g/js/login.js"></script></body></html>