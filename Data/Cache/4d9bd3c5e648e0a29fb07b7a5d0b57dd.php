<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>活动专区-<?php echo ($ai["title"]); ?>-<?php echo ($ai["sitename"]); ?></title><meta name="keywords" content="<?php echo ($ai["keywords"]); ?>,活动专区"><meta name="description" content="<?php echo ($ai["description"]); ?>"><link href="http://<?php echo ($ai["domain"]); ?>/css/style.css" rel="stylesheet" type="text/css" /><link rel="stylesheet" type="text/css" href="http://<?php echo ($ai["domain"]); ?>/css/action_style.css"/><link rel="stylesheet" type="text/css" href="http://<?php echo ($ai["domain"]); ?>/css/base.css?v=34"><link rel="stylesheet" type="text/css" href="http://<?php echo ($ai["domain"]); ?>/css/fuli.css"><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/tab.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/jquery.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/index_v1.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/jquery.easing.1.3.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/jquery.SuperSlide.js"></script><style type="text/css"><style type="text/css">
body{
behavior:url(css/iehoverfix.htc);   /*文件路径为htc文件相对于该网页文件的路径*/
}
</style><!--[if IE 6]><script src="http://<?php echo ($ai["domain"]); ?>/js/DD_belatedPNG.js"></script><script>
  DD_belatedPNG.fix('.logo,.act');
</script><![endif]--></head><body class="bg"><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/scrolltop.js"></script><div id="scrolltop"><div id="yijian"><a href="http://gm.<?php echo ($ai["url"]); ?>" target="_blank" class="yjfk"></a></div><div id="backwords"><a href="javascript:;" class="fhdb"></a></div></div><div class="top"><div class="top_main"><!-- box--><div class="Layer02"><div class="game_box1"><div id="game_box_con" style="display: none;"></div></div></div><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/youxi_box.js"></script><!-- box --><span class="top_right" id="login_before"><a href="http://user.<?php echo ($ai["url"]); ?>/login" class="login">登录</a>|&nbsp;<a href="http://reg.<?php echo ($ai["url"]); ?>" class="regist">注册</a><a href="#" class="sele_game"><img src="/images/select_game.jpg" /></a></span><span class="top_right" id="login_after"  style="display:none;"></a></span><span class="top_left"><a href="http://<?php echo ($ai["domain"]); ?>/shortcut" class="ico desk">把<?php echo ($ai["title"]); ?>放在桌面上</a><a href="###" onclick="SetHome(this,'http://<?php echo ($ai["domain"]); ?>');" class="ico home">设为首页</a><a href="###" onclick="AddFavorite('http://<?php echo ($ai["domain"]); ?>','<?php echo ($ai["title"]); ?>');" class="ico collect">加入收藏</a></span></div></div><div class="B_bg"><div class="header"><div class="Layer01"><a href="http://<?php echo ($ai["domain"]); ?>"><img class="logo" src="/images/logo.png" width="330" height="81" alt="<?php echo ($ai["title"]); ?>" /></a><div class="t_flash"><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/h_i_top_flash.js"></script></div></div></div><div class="nav1"><ul><li class="t1"><a href="http://<?php echo ($ai["domain"]); ?>">首页</a></li><li class="t2"><a href="http://daquan.<?php echo ($ai["url"]); ?>">游戏大全</a></li><li class="t3"><a href="http://user.<?php echo ($ai["url"]); ?>">用户中心</a></li><li class="t4 t4_h"><a href="http://www.<?php echo ($ai["url"]); ?>/huodong.html">活动专区</a></li><li class="t5"><a href="http://pay.<?php echo ($ai["url"]); ?>">充值中心</a></li><li class="t6"><a href="http://zixun.<?php echo ($ai["url"]); ?>">游戏资讯</a></li><li class="t7"><a href="http://gm.<?php echo ($ai["url"]); ?>">客服中心</a></li><li class="t8"><a href="http://<?php echo ($ai["domain"]); ?>/youxihe" target="_blank">游戏盒子</a></li><li class="t9"><a href="http://fuli.<?php echo ($ai["url"]); ?>">福利中心</a></li></ul></div><!--活动专区左边  开始 --><div class="fuli-content-list"><h3 class="fuli-title">福利中心_高返利!送首充!送充值!送返利!</h3><dl class="game-list fn-clear"><?php if(is_array($game)): $i = 0; $__LIST__ = $game;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$game): $mod = ($i % 2 );++$i;?><dd class="game-single fn-left"><a href="/fuli/<?php echo ($game["tag"]); ?>/"><img src="<?php echo ($game["pic"]["pay_ad"]); ?>" width="140" height="99" alt="<?php echo ($game["gamename"]); ?>" class="fn-left game-single-img" /></a><div class="game-single-info"><strong><a href="/fuli/<?php echo ($game["tag"]); ?>/"><?php echo ($game["gamename"]); ?></a></strong><em>| 送福利</em><div class="price-type fn-clear"><!-- <span class="disabled-option">无</span>--><a href="/fuli/<?php echo ($game["tag"]); ?>/#sc">首充福利</a><a href="/fuli/<?php echo ($game["tag"]); ?>/#lb">礼包福利</a><a href="/fuli/<?php echo ($game["tag"]); ?>/#cz">等级奖励</a><!-- if game.interface_name!='hazg' --><a href="/fuli/<?php echo ($game["tag"]); ?>/#czfl">充值返利</a></div></div></dd><?php endforeach; endif; else: echo "" ;endif; ?></dl></div><div class="yqlj fl"><div class="yqlj_t fl"><h1>友情链接</h1><div class="yqlj1 fl"><a href="#" style="color:#0f8dc4">友情链接互换请联系QQ:<?php echo ($ai["qq"]); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#" style="color:#0f8dc4">友链交换说明</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">更多></a></div><div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a></d
    ></div></div><div id="footer-c_c"><div id="footer-c_c_c"><div style="/**height:88px;**/padding:3px 0;overflow:hidden;" id="footer-link"><?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a target="_blank" href="<?php echo ($vo["website"]); ?>" title="<?php echo ($vo["webname"]); ?>" ><?php echo ($vo["webname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></div></div></div></div><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/flink.js"></script></div></div><!-- 页脚信息 --><!-- 页脚信息end --></body></html>