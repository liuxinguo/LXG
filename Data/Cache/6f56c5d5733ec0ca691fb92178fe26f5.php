<?php if (!defined('THINK_PATH')) exit();?><!doctype html><html><head><meta charset="utf-8"><title>冰封侠_YY冰封侠_YY冰封侠官网_YY游戏</title><meta name="keywords" content="新闻中心,YY冰封侠最新,YY冰封侠新闻,"><meta name="description" content="3月9日11：00 双线19服火爆开启！，，新闻中心,YY冰封侠最新,YY冰封侠新闻,的最新消息，更多新闻中心,YY冰封侠最新,YY冰封侠新闻,资料尽在冰封侠官网。"><link href="/images/home/<?php echo ($gamezhuti); ?>/css/style_news.css" rel="stylesheet" type="text/css"><script src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery_bak.js" type="text/javascript"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script></head><body><div class="wrapbg innerBg2_1"><div class="wrapbg_top innerBg2_2"><div class="wrap_main"><div class="header cs-clear"><a href="frozen_man.html" title="冰封侠官网" class="logo"></a><div class="nav cs-clear"><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>" title="" target="_blank" class="b1"><span class="font1">官网首页</span><span class="font2"></span></a><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>news" title="" target="_blank" class="b2"><span class="font1">新闻公告</span><span class="font2"></span></a><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>ziliao" title="" target="_blank" class="b3"><span class="font1">游戏资料</span><span class="font2"></span></a><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>gonglve" title="" target="_blank" class="b4"><span class="font1">游戏攻略</span><span class="font2"></span></a><a href="http://pay.<?php echo ($ai["url"]); ?>/" target="_blank" class="gw-pay b5"><span class="font1">充值入口</span><span class="font2"></span></a><a href="http://bbs.<?php echo ($ai["url"]); ?>/" title="" target="_blank" class="b6"><span class="font1">游戏论坛</span><span class="font2"></span></a></div></div><div class="content cs-clear"><div class="section sec_side fl"><div class="startBtn cs-clear"><div class="mod mod_login"><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>server_list" class="gw-statNewGame"></a></div><div class="mod_login_link"><a class="dd_register gw-reg">注册帐号</a><a class="gw-pwd">忘记密码</a></div><div class="mod_server_list gw-ser-list"><?php if(is_array($server)): $i = 0; $__LIST__ = array_slice($server,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($v['gid']); ?>&sid=<?php echo ($v['sid']); ?>"  target="_blank">双线<?php echo ($v["sid"]); ?>服 &nbsp; 火爆开启</a><?php endforeach; endif; else: echo "" ;endif; ?></div><div class="mod_server_choose gw-serChoose"><i></i><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>server_list"  target="_blank"><span>更多服务器</span></a></div></div><div class="mod_link cs-clear"><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>ziliao" target="_blank" class="b01"><em></em><span>游戏背景</span></a><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>ziliao" target="_blank" class="b02"><em></em><span>新手礼包</span></a><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>ziliao" target="_blank" class="b03"><em></em><span>会员特权</span></a><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>ziliao" target="_blank" class="b04"><em></em><span>活动专题</span></a><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>ziliao" target="_blank" class="b05"><em></em><span>游戏资料</span></a><a href="http://<?php echo ($ai["domain"]); ?>/dlq/setup.exe" target="_blank" class="b06"><em></em><span>微端下载</span></a></div><div class="mod_kf"><p class="mod_tit">              客服中心
            </p><div class="kf_box cs-clear"><p>○客服电话： <?php echo ($ai["tel"]); ?></p><p>○服务时间： 早9:00-晚24:00</p><p>○在线客服： <a href="tencent://message/?uin=<?php echo ($ai["qq"]); ?>">点击进入</a></p><p>●客服论坛： <a target="_blank" href="HTTP://<?php echo ($ai["bbs"]); ?>">点击进入</a></p></div></div></div><div class="section sec_man fr"><div class="inner mod"><div class="inner_hd cs-clear"><p class="inner_tit inner_tit1"></p><div class="inner_location">                您的位置：  <a href="<?php if((__URL__) == "/"): ?>/<?php else: ?>/<?php echo ($gametag); endif; ?>">首页</a> - <a href="<?php echo ($mulu); ?>"><?php echo ($cace); ?></a></a></span></div></div><div class="inner_main"><div class="inner_article"><h1 style="margin-top:48px;"><?php echo ($title["title"]); ?></h1><p class="posttime"><?php echo (date('Y-m-d',$title["time"])); ?></p><div class="article_content" id="text"><?php echo ($content); ?></div></div></div></div></div></div></div></div></div></body></html>