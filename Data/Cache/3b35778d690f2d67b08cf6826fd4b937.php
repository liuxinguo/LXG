<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>游戏活动-<?php echo ($game["gamename"]); ?>- <?php echo ($ai["title"]); ?></title><meta name="keywords" content="<?php echo ($ai["sitename"]); ?>,<?php echo ($game["gamename"]); ?>活动,<?php echo ($game["gamename"]); ?>网页游戏" /><meta name="description" content="<?php echo ($ai["sitename"]); echo ($game["gamename"]); ?>是一款仙侠题材的回合制角色扮演类网页游戏，玩家在游戏中扮演一位前朝皇族的后人，肩负着复兴祖国的重任，在师傅的指引下，开始闯荡江湖，寻找能帮助复国的上古十大神器。" /><link href="/images/home/<?php echo ($gamezhuti); ?>/css/css.css" rel="stylesheet" type="text/css" /><link rel="icon" href="/favicon.ico" type="image/x-icon" /><script src="http://<?php echo ($ai["domain"]); ?>/js/home/jquery.js" type="text/javascript"></script><!--jquery--><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script></head><body style="font:12px/1.2 tahoma,'\5FAE\8F6F\96C5\9ED1',sans-serif;background:url(<?php echo ($vopic_bg[0][img]); ?>) no-repeat center 37px;color: #6c6c6c;min-width:980px;"><div class="header"><div class="top_nva"><a class="nav_a" href="<?php if((__URL__) == "/"): ?>/<?php else: ?>/<?php echo ($gametag); endif; ?>"><?php echo ($game["gamename"]); ?></a><a class="nav_b" href="<?php if((__URL__) == "/"): ?>/<?php else: ?>/<?php echo ($gametag); ?>/<?php endif; ?>news" target="_blank">新闻公告</a><a class="nav_c" href="<?php if((__URL__) == "/"): ?>/<?php else: ?>/<?php echo ($gametag); ?>/<?php endif; ?>ziliao" target="_blank">游戏资料</a><a class="nav_d" href="<?php if((__URL__) == "/"): ?>/<?php else: ?>/<?php echo ($gametag); ?>/<?php endif; ?>gonglve" target="_blank">游戏攻略</a><a class="nav_e" href="HTTP://<?php echo ($ai["bbs"]); ?>" target="_blank"><?php echo ($game["gamename"]); ?>论坛</a><a class="nav_f" href="HTTP://gm.<?php echo ($ai["url"]); ?>" rel="nofollow" target="_blank">客服中心</a></div><div class="h_box"><div class="info"><div class="select"></div><div class="start"><a href="<?php if((__URL__) == "/"): else: ?>/<?php echo ($gametag); endif; echo U('/server_list');?>" rel="nofollow" target="_blank" id="selectButton" class="start ht fl" style="cursor:pointer;">开始游戏</a></div><div class="regist"><div id="login" ><form method="get" onSubmit="login();return false;"><table width="265" border="0" cellpadding="0" cellspacing="0"><tr><td width="53" height="41" >帐号：                  </td><td width="122"><input type="text" class="INPUT" value="账号：" onblur="if (value ==''){value='账号：';}" onclick="if(this.value=='账号：'){this.value='';}" name="username" id="username" tabindex="1" style="color: rgb(0, 0, 0);" /></td><td width="90" rowspan="2"><input type="submit" class="login_btn" value="" ></td></tr><tr><td height="41">密码： </td><td height="41"><input type="text" name="login_pwdTxt" id="login_pwdTxt" tabindex="2" class="INPUT" value="- 请输入密码" title="- 请输入密码" onfocus="if(this.value == '- 请输入密码'){document.getElementById('userpass').style.display = 'block';document.getElementById('userpass').focus();document.getElementById('login_pwdTxt').style.display = 'none';}"/><input type="password" class="INPUT" name="userpass" id="userpass" onKeyPress="InputKeyPress('frmLogin',event);" tabindex="2" style="display:none" onBlur="if(this.value == ''){document.getElementById('userpass').style.display = 'none';document.getElementById('login_pwdTxt').style.display = 'block';}"/></td></tr><tr><td height="5">&nbsp;</td><td align="left"><input class="in02" type="checkbox" name="rls"  checked="checked" id="rls" value="sl" />
                  记住用户</td><td><a href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html">忘记密码</a></td></tr></table></form></div><div id="se_list" style="display:none;"><table width="249" border="0" cellpadding="0" cellspacing="0"><tr><td width="194" height="22" align="left">欢迎您：<span class="STYLE1" id="user_info" >admin</span></td><td width="55" align="right"><a href="javascript:void(0);" onclick="exit();return false;" class="red"><span class="STYLE1">安全退出</span></a></td></tr><tr><td height="41" colspan="2" align="left"><span>最新服务器：</span><?php if(is_array($server)): $i = 0; $__LIST__ = array_slice($server,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($gameid); ?>&sid=<?php echo ($v['sid']); ?>">双线<?php echo ($v["sid"]); ?>服　<?php echo ($v["servername"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></td></tr><tr><td height="38" colspan="2" align="left"><span>最近登陆服：</span><span id="last_game_info"></span></td></tr></table></div></div><div class="top_server"><p class="clear"><a href="<?php if((__URL__) == "/"): else: ?>/<?php echo ($gametag); endif; echo U('/server_list');?>" target="_blank" class="fr"><?php echo ($game["gamename"]); ?>开服列表></a></p><?php if(is_array($server)): $i = 0; $__LIST__ = array_slice($server,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><b class="top_server_name f14"><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($gameid); ?>&sid=<?php echo ($v['sid']); ?>" target="_blank"><?php echo ($v["servername"]); ?>&nbsp;双线<?php echo ($v["sid"]); ?>服&nbsp;<font color="#ffff00">火爆</font></a></b><?php endforeach; endif; else: echo "" ;endif; ?></div></div></div></div><div class="main clear"><div class="right fr"><!--内页--><div class="inside b"><div class="tab_hd"><span class="fr">您现在所在的位置：<a href="HTTP://<?php echo ($ai["domain"]); ?>/"><?php echo ($ai["title"]); ?>网页游戏</a> ><a href="<?php if((__URL__) == "/"): ?>/<?php else: ?>/<?php echo ($gametag); endif; ?>"><?php echo ($game["gamename"]); ?></a> ><a href="__SELF__"><?php echo ($cace); ?></a></span><h3 class="tab_hd_name"><?php echo ($game["gamename"]); ?>_<?php echo ($cace); ?></h3></div><div class="inside_box"><div class="news_list"><ul><?php if(is_array($article)): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><span class="fr"><?php echo (date('m-d',$vo["time"])); ?></span>【<?php echo ($cace); ?>】<a href="article/tid/<?php echo ($vo["id"]); ?>" target="<?php echo ($vo["target"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><div class="page"><?php echo ($ShowPage); ?></div></div></div><!--内页 END--></div><div class="left fl"><a class="xsk ht" title="领新手卡" href="HTTP://libao.<?php echo ($ai["url"]); ?>" target="_blank">领新手卡</a><a class="delta ht" title="帐户冲值" href="HTTP://pay.<?php echo ($ai["url"]); ?>" target="_blank" rel="nofollow">帐户冲值</a><!--游戏简介--><div class="b off_b"><div class="tab_hd"><span class="tab_hd_name"><?php echo ($game["gamename"]); ?>网页游戏</span></div><p class="left_txt" style="text-indent: 2em;"><?php echo (mysubstr(0,200,strip_tags($game["content"]))); ?><a href="<?php if((__URL__) == "/"): else: ?>/<?php echo ($gametag); endif; echo U('/server_list');?>" rel="nofollow" target="_blank" class="red">马上开始游戏->></a></p></div><!--游戏简介END--><!--客服中心--><div class="b off_b"><div class="tab_hd"><span class="tab_hd_name">客服中心</span></div><p class="left_txt">
                客服热线：<?php echo ($ai["tel"]); ?><br/>
                充值客服QQ：<a href="tencent://message/?uin=<?php echo ($ai["qq"]); ?>"><?php echo ($ai["qq"]); ?></a><br/>
                客服论坛：<a href="HTTP://<?php echo ($ai["bbs"]); ?>" target="_blank" rel="nofollow" class="red">点击进入»</a><div class="client_box"><a href="HTTP://gm.<?php echo ($ai["url"]); ?>" rel="nofollow" target="_blank" class="client f14"><b>进入客服中心</b></a></div></p></div><!--客服中心END--><!--友情链接--><div class="b"><div class="tab_hd"><span class="tab_hd_name">友情链接</span></div><p class="left_txt"><a href="/<?php echo ($gametag); ?>/" target="_blank"><?php echo ($game["gamename"]); ?></a> | 
                  </p></div><!--友情链接END--></div></div><br/><br/><!--all foot--><script type="text/javascript" src="[!CSS]../js/jquery-1.7.2.min.js"></script><script type="text/javascript" src="[!CSS]../js/91wan_function.js"></script><script type="text/javascript" >
var gid=<?php echo ($gameid); ?>;
</script><script src="[!CSS]../js/login.js"></script><script type="text/javascript" src="[!CSS]../home/<?php echo ($gametag); ?>/js/jquery.fancybox-1.3.4.pack.js"></script></body></html>