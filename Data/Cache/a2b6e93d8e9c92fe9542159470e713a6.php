<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>活动专区-<?php echo ($ai["title"]); ?>-<?php echo ($ai["sitename"]); ?></title><meta name="keywords" content="<?php echo ($ai["keywords"]); ?>,活动专区"><meta name="description" content="<?php echo ($ai["description"]); ?>"><link href="http://<?php echo ($ai["domain"]); ?>/css/style.css" rel="stylesheet" type="text/css" /><link rel="stylesheet" type="text/css" href="http://<?php echo ($ai["domain"]); ?>/css/action_style.css"/><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/tab.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/jquery.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/index_v1.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/jquery.easing.1.3.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/jquery.SuperSlide.js"></script><style type="text/css"><style type="text/css">
body{
behavior:url(css/iehoverfix.htc);   /*文件路径为htc文件相对于该网页文件的路径*/
}
</style><!--[if IE 6]><script src="http://<?php echo ($ai["domain"]); ?>/js/DD_belatedPNG.js"></script><script>
  DD_belatedPNG.fix('.logo,.act');
</script><![endif]--></head><body class="bg"><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/scrolltop.js"></script><div id="scrolltop"><div id="yijian"><a href="http://gm.<?php echo ($ai["url"]); ?>" target="_blank" class="yjfk"></a></div><div id="backwords"><a href="javascript:;" class="fhdb"></a></div></div><div class="top"><div class="top_main"><!-- box--><div class="Layer02"><div class="game_box1"><div id="game_box_con" style="display: none;"></div></div></div><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/youxi_box.js"></script><!-- box --><span class="top_right" id="login_before"><a href="http://user.<?php echo ($ai["url"]); ?>/login" class="login">登录</a>|&nbsp;<a href="http://reg.<?php echo ($ai["url"]); ?>" class="regist">注册</a><a href="#" class="sele_game"><img src="/images/select_game.jpg" /></a></span><span class="top_right" id="login_after"  style="display:none;"></a></span><span class="top_left"><a href="http://<?php echo ($ai["domain"]); ?>/shortcut" class="ico desk">把<?php echo ($ai["title"]); ?>放在桌面上</a><a href="###" onclick="SetHome(this,'http://<?php echo ($ai["domain"]); ?>');" class="ico home">设为首页</a><a href="###" onclick="AddFavorite('http://<?php echo ($ai["domain"]); ?>','<?php echo ($ai["title"]); ?>');" class="ico collect">加入收藏</a></span></div></div><div class="B_bg"><div class="header"><div class="Layer01"><a href="http://<?php echo ($ai["domain"]); ?>"><img class="logo" src="/images/logo.png" width="330" height="81" alt="<?php echo ($ai["title"]); ?>" /></a><div class="t_flash"><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/h_i_top_flash.js"></script></div></div></div><div class="nav1"><ul><li class="t1"><a href="http://<?php echo ($ai["domain"]); ?>">首页</a></li><li class="t2"><a href="http://daquan.<?php echo ($ai["url"]); ?>">游戏大全</a></li><li class="t3"><a href="http://user.<?php echo ($ai["url"]); ?>">用户中心</a></li><li class="t4 t4_h"><a href="http://www.<?php echo ($ai["url"]); ?>/huodong.html">活动专区</a></li><li class="t5"><a href="http://pay.<?php echo ($ai["url"]); ?>">充值中心</a></li><li class="t6"><a href="http://zixun.<?php echo ($ai["url"]); ?>">游戏资讯</a></li><li class="t7"><a href="http://gm.<?php echo ($ai["url"]); ?>">客服中心</a></li><li class="t8"><a href="http://<?php echo ($ai["domain"]); ?>/youxihe" target="_blank">游戏盒子</a></li><li class="t9"><a href="http://fuli.<?php echo ($ai["url"]); ?>">福利中心</a></li></ul></div><!--活动专区左边  开始 --><div class="l_box fl"><!--用户登录 --><div class="login_t" id="we_login_t"><div class="Layer01" style="display:none;" id="we-post-msg"><!--消息框 --><script type="text/javascript" language="javascript">
           $(document).ready(function(){
		     $("#pos_msg_close").click(function(){
			 $("#pos_msg").css("display","none");
		   });
	    });
       </script><div id="pos_msg" style="display:block;"><div id="pos_msg_top"><div id="pos_msg_close">×关闭</div>温馨提示
			</div><div id="pos_msg_con">
			您的账号安全系数较低，请尽快<a href="http://user.<?php echo ($ai["url"]); ?>/user_renzheng_ph.html" target="_blank">免费绑定手机</a>（送20积分）			
	    </div></div></div></div><div class="login_b1" id="userinfo_d"><p><input class="l_txt mb10" type="text" value="用户名或手机号" onblur="if (value ==''){value='用户名或手机号';}" onclick="if(this.value=='用户名或手机号'){this.value='';}" id="usname" tabindex="1"></p><p><input id="login_pwdTxt" class="l_pwd" type="text" onfocus="if(this.value == '请输入密码'){document.getElementById('uspsd').style.display = 'block';document.getElementById('uspsd').focus();document.getElementById('login_pwdTxt').style.display = 'none';}" value="请输入密码" tabindex="2" name="login_pwdTxt" style="display: block;"><input id="uspsd" class="l_pwd" type="password" style="display: none;" onblur="if(this.value == ''){document.getElementById('login_pwdTxt').style.display = 'block';document.getElementById('uspsd').style.display = 'none';}" tabindex="2" name="login_pass"></p><p class="l_jz"><input type="checkbox" checked="checked" class="l_check"><label>记住登录账号</label><a href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" class="l_f A">忘记密码？</a></p><p><a href="#" onclick="doLogin();" class="l_dl" title="登录" tabindex="3">登录</a></p><p class="l_dl1"><!--<a href="#" onclick="toQzoneLogin()" class="l_qq" title="选择QQ登录">QQ登录</a><a href="#" onclick="toWeiboLogin()" class="l_wb" title="选择微博登录">微博登录</a> --><a href="http://reg.<?php echo ($ai["url"]); ?>" class="l_zc" title="免费注册送礼包">免费注册送礼包</a></p></div><div class="login_b" id="userinfo" style="display:none;"></div><div class="mb10"></div><!--今日游戏开服 --><div class="jr_t">今日游戏开服</div><div class="jr_b" id="we-ajax-s-list"></div><script type="text/javascript" src="/js/leftseverlist.js"></script><div class="mb10"></div><!--快捷通道 --><div class="kjtd"><div class="kjtd1_t fl">快捷通道</div><div class="kjtd1 fl"><div class="k1 mb7 mr17 fl"><a href="http://user.<?php echo ($ai["url"]); ?>/user_renzheng_psd.html">修改密码</a></div><div class="k2 mb7 fr"><a href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html">密码找回</a></div><div class="k3 mb7 mr17 fl"><a href="http://user.<?php echo ($ai["url"]); ?>/user_renzheng_ph.html">绑定手机</a></div><div class="k4 mb7 fr"><a href="http://user.<?php echo ($ai["url"]); ?>/user_renzheng_eml.html">绑定邮箱</a></div><div class="k5 mb7 mr17 fl"><a href="http://reg.<?php echo ($ai["url"]); ?>/">注册账号</a></div><div class="k6 mb7 fr"><a href="http://pay.<?php echo ($ai["url"]); ?>">充值游戏</a></div><div class="k7 mr17 fl"><a href="http://www.<?php echo ($ai["url"]); ?>/jzjh/">家长监护</a></div><div class="k8 fr"><a href="http://user.<?php echo ($ai["url"]); ?>/user_info_cm.html">防沉迷验证</a></div></div><div class="kjtd2 fl"><a href="http://gm.<?php echo ($ai["url"]); ?>/" class="kf fl" title="进入在线客服">在线客服</a></div><div class="kjtd3 fl"><p>客服热线：<span style=" font-size:16px; color:#0f8dc4; font-style:italic; font-weight:bold; font-family:Arial;"><?php echo ($ai["tel"]); ?></span><br /><span style="font-size:16px; color:#0f8dc4; padding-left:59px; font-style:italic; font-weight:bold; font-family:Arial;"><?php echo ($ai["tel"]); ?></span></p><p>客服邮箱：<span style=" font-family:Arial;"><?php echo ($ai["mail"]); ?></span></p></div></div></div><div id="action_left"><div class="action"><div class="action_title"><h3>平台活动</h3></div><div class="action_con"><?php if(is_array($article)): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="action_con_list"><a href="<?php if(in_array(($j), is_array($vo["flag"])?$vo["flag"]:explode(',',$vo["flag"]))): echo U('huodong/news',array('id'=>$vo['id'])); else: echo ($vo["url"]); endif; ?>" target="_blank"><img src="<?php echo ($vo["pic"]); ?>"  width="332" height="139"/></a><div class="action_con_list_right"><div class="title"><?php echo (mysubstr(0,20,$vo["title"])); ?></div><p><?php echo (mysubstr(0,200,$vo["title"])); ?></p><div class="enter"><a href="<?php if(in_array(($j), is_array($vo["flag"])?$vo["flag"]:explode(',',$vo["flag"]))): echo U('huodong/news',array('id'=>$vo['id'])); else: echo ($vo["url"]); endif; ?>" target="_blank">点击进入</a></div></div></div><?php endforeach; endif; else: echo "" ;endif; ?></div><div class="fy_nav"><?php echo ($ShowPage); ?></div></div></div><div class="yqlj fl"><div class="yqlj_t fl"><h1>友情链接</h1><div class="yqlj1 fl"><a href="#" style="color:#0f8dc4">友情链接互换请联系QQ:<?php echo ($ai["qq"]); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#" style="color:#0f8dc4">友链交换说明</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">更多></a></div><div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a></d
    ></div></div><div id="footer-c_c"><div id="footer-c_c_c"><div style="/**height:88px;**/padding:3px 0;overflow:hidden;" id="footer-link"><?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a target="_blank" href="<?php echo ($vo["website"]); ?>" title="<?php echo ($vo["webname"]); ?>" ><?php echo ($vo["webname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></div></div></div></div><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/flink.js"></script></div></div><!-- 页脚信息 --><!-- 页脚信息end --></body></html>