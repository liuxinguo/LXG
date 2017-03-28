<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title><?php echo ($cace); ?>-<?php echo ($game["gamename"]); ?>- <?php echo ($ai["title"]); echo ($game["gamename"]); ?>官网</title><meta name="Keywords" content="大战神,大战神官网,大战神游戏,<?php echo ($ai["title"]); ?>大战神,Angelababy网游,大战神攻略,职业介绍" /><meta name="Description" content="大战神攻略有详细的关于大战神游戏所有玩法的进阶攻略技巧说明和玩法秘籍揭迷。<?php echo ($ai["title"]); ?>《大战神》是由Angelababy代言的三国ARPG 网页游戏，想要与女神来一次零距离互动，那就快来加入吧！" /><link type="text/css" rel="stylesheet" href="/images/home/<?php echo ($gamezhuti); ?>/css/reset.css" /><link type="text/css" rel="stylesheet" href="/images/home/<?php echo ($gamezhuti); ?>/css/common.css" /><link type="text/css" rel="stylesheet" href="/images/home/<?php echo ($gamezhuti); ?>/css/data.css" /><script src="http://<?php echo ($ai["domain"]); ?>/js/home/jquery.js" type="text/javascript"></script><!--jquery--><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script><script type="text/javascript" src="http://dzs.game2.cn/special/g/js/jQuery1.7.2-SuperSlider2.1.js"></script><!--[if IE 6]><script type="text/javascript" src="http://script.game2.cn/fixPNG.js"></script><script>
        DD_belatedPNG.fix('div,h3,img,ul,p,span,button,.png,a,:hover');
    </script><![endif]--></head><body class="newsPage"><!--/ bg01 STAR /--><div class="bg01"><div ><div class="wraper"><!--/**********/ header /**********/--><div class="header"><!--/ nav STAR /--><ul class="nav clearfix center"><h1 style="display:none">大战神</h1><li class="cur"><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>"><strong style="margin-top: 0px;" class="zxz">官网首页</strong><em>官网首页</em></a></li><li><a href="<?php if((__URL__) == "/"): else: echo ($gametag); endif; echo U('/news');?>"><strong>新闻公告</strong><em>新闻公告</em></a></li><li><a href="<?php if((__URL__) == "/"): else: echo ($gametag); endif; echo U('/ziliao');?>"><strong>游戏资料</strong><em>游戏资料</em></a></li><li class="logo"><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>">大战神</a></li><li><a href="<?php if((__URL__) == "/"): else: echo ($gametag); endif; echo U('/gonglve');?>"><strong>进阶攻略</strong><em>进阶攻略</em></a></li><li><a href="http://pay.<?php echo ($ai["url"]); ?>/" target="_blank"><strong>快速充值</strong><em>快速充值</em></a></li><li><a href="http://bbs.<?php echo ($ai["url"]); ?>/" target="_blank"><strong>玩家论坛</strong><em>玩家论坛</em></a></li></ul><!--/ banner STAR /--><div class="banner"></div><!--/ banner END /--></div><!--/ header END /--><div class="container container2 clearfix"><div class="main"><div class="breadCrumb"><h3 class="bcStrategy"><?php echo ($cace); ?></h3>
                        您当前的位置：
<a href="/">首页</a> ><?php echo ($cace); ?></div><!--/ breadCrumb END /--><div class="content"><ul class="newsList clearfix"><?php if(is_array($article)): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="article/tid/<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a><em><?php echo (date('m-d',$vo["time"])); ?></em></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><div class="page"><?php echo ($ShowPage); ?></div></div></div><!--/ main END /--><div class="side"><h5 class="starGame"><a href="<?php if((__URL__) == "/"): else: echo ($gametag); endif; echo U('/server_list');?>" target="_blank">开始游戏</a></h5><link type="text/css" rel="stylesheet" href="/images/home/<?php echo ($gamezhuti); ?>/css/login.css?v=20151129153341" /><div class="loginField"><div class="logDiv"><div class="wrap"><div class="login" id="login"><form method="get" onSubmit="login();return false;"><p class="pWarn" style="background-image:none;"></p><p class="p1"><label for="">账　号：</label><input class="i" type="text" name="username" id="username" value="" data-placeholder="请输入账号" data-placeholder-type="1" /></p><p class="p2"><label for="">密　码：</label><input class="i" type="password" name="userpass" id="userpass" value="" data-placeholder="请输入密码" data-placeholder-type="1" /></p><p class="chek"><b><input type="checkbox" name="keeplive"  checked="checked" id="rls" value="sl" style="display:none;" /><a href="javascript:void(0);" class="radioItem fxk on" data-name="keeplive" data-checkedCls="on">记住账号</a></b><a class="aGet" target="_blank" href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html">找回密码</a><a class="aReg" target="_blank" href="http://reg.<?php echo ($ai["url"]); ?>/" id="q_b1">快速注册</a></p><p class="btn"><button class="logBtn" value="ok" type="submit">登录</button></p></form></div><div class="logon" id="se_list" style="display:none;"><div class="n"><p class="t_c"><a class="showUserCode" id="user_info" ></a></p><p class="t_c wel">欢迎您登录！</p></div><div class="ser"><h5>推荐最新区服：</h5><span id="last_game_info"></span><!-- <p><a href="#" target="_blank"><span>[100服]专属·百服</span><em>进入游戏</em></a></p>--></div><div class="btn2"><a href="http://user.<?php echo ($ai["url"]); ?>/" target="_blank" class="b2">个人中心</a><a href="javascript:void(0);" onclick="exit();return false;" class="doSigout b3">注销</a></div></div></div></div></div><div class="quickLink"><ul class="linkList"><li class="downLink"><a href="http://res.dzs.52xiyou.com/752g/client/dzs.exe" target="_blank">登录器下载</a></li><li class="giftLink"><a href="http://libao.<?php echo ($ai["url"]); ?>/" target="_blank">大战神游戏礼包</a></li></ul></div><div class="gameIntro"><div class="introTit"><h3>游戏简介</h3></div><div class="introContent"><?php echo (mysubstr(0,200,strip_tags($game["content"]))); ?></div></div><div class="gameContact"><h3><?php echo ($ai["tel"]); ?></h3><ul class="contactInfo"><li>充值客服：<a href="tencent://message/?uin=<?php echo ($ai["qq"]); ?>" target="_blank"><?php echo ($ai["qq"]); ?></a></li><li>游戏论坛：http://<?php echo ($ai["bbs"]); ?></li></ul><span class="serOnline"><a href="http://gm.<?php echo ($ai["url"]); ?>" target="_blank">在线客服</a></span></div></div><!--/ side END /--></div><!--/ container1 END /--><!--/**********/ container /**********/--></div><!--/ wraper END /--><div id="backTop"><a href="javascript:void(0)" style="display: none;">返回顶部</a></div><script type="text/javascript">
	//返回顶部
	var oDiv=$("#backTop");
	$("#backTop").children("a").click(function(){
		var _this=$(this);
		$("body,html").animate({scrollTop:0},{duration:500,easing:"easeInOutQuart"});
	});
	 
	$(window).bind("scroll resize",function (){
		$winH=$(window).height(),
		$winW=$(window).width(),
		$winH=$(window).height(),
		$docH=$(document).height(),
		$docW=$(document).width(),
		$scrollTop=$(window).scrollTop();

	//显示隐藏返回顶部按钮
		var oDiv=$("#backTop");	
		if ($scrollTop>$winH/2) {
			oDiv.children("a").fadeIn();
		}else{
			oDiv.children("a").fadeOut();
		}
	});
</script><!--this is foot mark--></div><!--/ bg02 END /--></div><!--/ bg01 END /--><script type="text/javascript" >
var gid=<?php echo ($gameid); ?>;
</script><script src="/js/home/login.js"></script><script type="text/javascript">
    window.onload=function(){
//导航效果
        $('.nav li a').hover(function () {
            if($('strong',this).hasClass('zxz')){
                return true;
            }
            $('strong', this).stop().animate({marginTop: '0'}, 300);
        }, function () {
            if($('strong',this).hasClass('zxz')){
                return true;
            }
            $('strong', this).stop().animate({marginTop: '-87px'}, 300);
        });
    }
</script></body></html>