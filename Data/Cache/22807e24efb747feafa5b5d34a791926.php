<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title><?php echo ($game["gamename"]); ?>新闻中心-- <?php echo ($ai["title"]); ?></title><meta name="description" content="游戏攻略<?php echo ($ai["title"]); ?>《女神联盟》是一款西方神话题材网页游戏，为玩家构建的是一个解救女神、万族混战的时空。家将解救受困的女神并和她们一起抵御诸神黄昏的游戏场景到来。" /><link href="/images/home/<?php echo ($gamezhuti); ?>/css/css.css" rel="stylesheet" type="text/css" /><link rel="icon" href="/favicon.ico" type="image/x-icon" /><script type="text/javascript" src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery-1.8.1.min.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script><body><div class="hread"><div class="top_nva"><a class="nav_a" href="/"><?php echo ($game["gamename"]); ?></a><a class="nav_b" href="/news" target="_blank">新闻公告</a><a class="nav_c" href="/ziliao" target="_blank">游戏资料</a><a class="nav_d" href="/gonglve" target="_blank">游戏攻略</a><a class="nav_e" href="HTTP://bbs.<?php echo ($ai["url"]); ?>" target="_blank"><?php echo ($game["gamename"]); ?>论坛</a><a class="nav_f" href="HTTP://gm.<?php echo ($ai["url"]); ?>" rel="nofollow" target="_blank">客服中心</a></div><div class="top_fla"><!--样式增加22行--><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="980" height="414"><param name="movie" value="http://image.91wan.com/fyws/images/top_fla.swf"><param name="quality" value="high"><embed src="http://image.91wan.com/fyws/images/top_fla.swf" wmode="transparent" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="980" height="414"><param name="wmode" value="transparent"></object><a class="down" href="/fyws.exe" target="_blank" title="微端下载">微端下载</a></div></div><div class="main clear"><div class="m_l"><div class="start"><a href="/server_list" class="start ht">开始游戏</a></div><div class="signIn"><div class="signBox"><div id="login"><div class="clear"><a class="in_sub ht" href="javascript:void(0);" onClick="login();return false;" tabindex="3">登录</a><input class="in02" type="hidden" name="rls"  checked="checked" id="rls" value="sl" /><input type="text" value="帐号：" name="username" id="username" onBlur="if (value ==''){value='帐号：';}" onClick="if(this.value=='帐号：'){this.value='';}" tabindex="1" class="in_txt" /><input type="text" name="login_pwdTxt" id="login_pwdTxt" tabindex="2" class="in_txt" value="- 请输入密码" title="- 请输入密码" onfocus="if(this.value == '- 请输入密码'){document.getElementById('userpass').style.display = 'block';document.getElementById('userpass').focus();document.getElementById('login_pwdTxt').style.display = 'none';}"/><input type="password" class="in_txt" name="userpass" id="userpass" onKeyPress="InputKeyPress('frmLogin',event);" tabindex="2" style="display:none" onBlur="if(this.value == ''){document.getElementById('userpass').style.display = 'none';document.getElementById('login_pwdTxt').style.display = 'block';}"/></div><div class="login_txt"><a class="reg" target="_blank" href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html">忘记密码</a><a href="http://reg.<?php echo ($ai["url"]); ?>/" >立即注册新用户</a></div></div><div id="se_list" style="display:none;" class="siginBox"><ul class="user_info"><li>尊敬的：<strong id="user_info">lonelytree</strong></li><li>上次玩过游戏：</li><li id="last_game_info"></li><li class="tc"><a target="_blank" href="/">[用户中心]</a><a href="javascript:logout();">[退出]</a></li></ul></div><div class="login_but"><a href="http://libao.<?php echo ($ai["url"]); ?>/" class="xsk">领取新手卡</a><a href="http://pay.<?php echo ($ai["url"]); ?>/" class="zc">游戏充值</a></div></div></div><div class="server mt10 b"><h3 class="l_tit">推荐服务器
                <div class="t_s"><a href="javascript:void(0);" onclick="window.open('game/login?gid=51&amp;sid='+document.getElementById('leftServer').value);" class="s_s fr ht">进入</a><input id="leftServer" type="text" class="s_t fl" /></div></h3><ul class="serverList"><?php if(is_array($server)): $i = 0; $__LIST__ = array_slice($server,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span>火爆</span><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($v['gid']); ?>&sid=<?php echo ($v['sid']); ?>" target="_blank"><?php echo ($v["servername"]); ?>-双线<?php echo ($v["sid"]); ?>服</a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><a class="s_more" href="/server_list">查看全部服务器</a></div><div class="client mt10 b"><h3 class="l_tit">客服中心</h3><p class="client_list">                客服热线：<?php echo ($ai["tel"]); ?><br>                充值客服QQ：<a href="tencent://message/?uin=<?php echo ($ai["qq"]); ?>"><?php echo ($ai["qq"]); ?></a><br>                客服论坛：<a target="_blank" href="HTTP://<?php echo ($ai["bbs"]); ?>" class="green">点击进入&gt;&gt;&gt;&gt;</a><br>                玩家交流群：            </p><a class="s_more" href="HTTP://gm.<?php echo ($ai["url"]); ?>" target="_blank">进放客服中心</a></div></div><div class="m_r"><div class="titile"><div class="where"><span>您所在的位置：<?php echo ($ai["title"]); ?><a href="/">网页游戏</a><span>&gt;</span><a href="/"><?php echo ($game["gamename"]); ?></a><span>&gt;</span><a href="/<?php echo ($mulu); ?>"><?php echo ($cace); ?></a></span></div><h3 class="inT"><?php echo ($cace); ?></h3></div><div class="inside b"><div class="inbox"><div class="new_top mt10"><h2>[<?php echo ($game["gamename"]); ?>]&nbsp;-&nbsp;<?php echo ($title["title"]); ?></h2><div class="new_top_txt"><p>发布时间：<?php echo (date('Y-m-d',$title["time"])); ?> 来源：<?php echo ($game["gamename"]); ?><a target="_blank" href="http://www.baidu.com/s?wd=<?php echo ($game["gamename"]); ?>">在百度上搜索<?php echo ($game["gamename"]); ?></a> TAG标签：<a href="/"><?php echo ($game["gamename"]); ?></a></p><p><!-- Baidu Button BEGIN --><div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare"><span class="bds_more">分享到：</span><a class="bds_qzone"></a><a class="bds_tsina"></a><a class="bds_tqq"></a><a class="bds_renren"></a><a class="bds_t163"></a><a class="shareCount"></a></div><script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=482422" ></script><script type="text/javascript" id="bdshell_js"></script><script type="text/javascript">                            document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
                            </script><!-- Baidu Button END --></p></div></div><div class="news_txt"><?php echo ($content); ?></div><div class="clear mt10"><p class="fr"><?php echo ($ai["title"]); echo ($game["gamename"]); ?><br /><?php echo (date('Y-m-d',$title["time"])); ?></p></div></div></div></div></div><div style="clear:both;height:28px;"></div><!--all foot--><script type="text/javascript" src="/images/home/<?php echo ($gamezhuti); ?>js/jquery-1.7.2.min.js"></script><script type="text/javascript" src="/js/home/function.js"></script><script type="text/javascript" >var gid=<?php echo ($gameid); ?>;
</script><script src="/js/home/login.js"></script><script type="text/javascript">    $(function(){
        if(document.getElementById('regLogTab0')!=null){
            chkAccStatus('regLogTab',2);
            if(document.getElementById('login_game_info')!=null){
                var login_game_info = unescape(getCookie('login_game_info'));
                $('#login_game_info').html(login_game_info);
            }
        }

        
        
              });
</script></body></html>