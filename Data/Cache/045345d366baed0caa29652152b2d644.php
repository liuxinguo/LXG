<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html lang="zh"><head><meta charset="utf-8"><meta http-equiv="Content-Language" content="zh-cn"><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><meta name="keywords" content=""><meta name="description" content=""><meta name="renderer" content="webkit"><title><?php echo ($cace); ?>-<?php echo ($game["gamename"]); ?>- <?php echo ($ai["title"]); echo ($game["gamename"]); ?>官网</title><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/home.css"><link href="/images/home/<?php echo ($gamezhuti); ?>/css/global_style.css" rel="stylesheet" type="text/css"><script src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery.min.js"></script><script src="/images/home/<?php echo ($gamezhuti); ?>/js/index.js"></script><script src="/images/home/<?php echo ($gamezhuti); ?>/js/marquee.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script></head><body style="font-size:12px;font-family:微软雅黑,Arial,Helvetica,sans-serif"><div class="container"><div class="content topnav_div pr"><a href="index.html" target="_blank" class="jxfmllogo_a db pa"></a><ul class="topnav cls pa" id="syul"><li><a href="/" target="_blank" id="sy" class="nava cur">官网首页</a></li><li><a href="HTTP://libao.<?php echo ($ai["url"]); ?>" target="_blank" class="nava">新手礼包</a></li><li><a href="/gonglve" target="_blank" class="nava">游戏攻略</a></li><li><a href="HTTP://gm.<?php echo ($ai["url"]); ?>" target="_blank" rel="nofollow" class="nava">客服中心</a></li><li><a href="HTTP://pay.<?php echo ($ai["url"]); ?>" target="_blank" rel="nofollow" class="nava">游戏充值</a></li><li><a href="HTTP://bbs.<?php echo ($ai["url"]); ?>" target="_blank" class="nava">论坛交流</a></li></ul></div><div class="bannerdiv pr"><ul class="banner_ul"><li style="display:list-item"><a href="javascript:;" ><img src="/images/home/<?php echo ($gamezhuti); ?>/images/57ea45eed0c63.jpg" alt=""></a></li><li style="display:none"><a href="javascript:;" ><img src="/images/home/<?php echo ($gamezhuti); ?>/images/574d67b0d74c0.jpg" alt=""></a></li></ul><div class="b_page"><a href="javascript:;" class="page_a page_a1 current"></a><a href="javascript:;" class="page_a page_a1"></a></div></div><div class="content conwrap_div01 pr" style="margin-bottom:20px"><div class="side"><a class="start" href="/server_list" target="_blank"><span></span></a><div id="loginframe" class="login"><div class="log"><!-- 登录前 --><ul class="user-in" id="login"><li class="user"><label>帐号:</label><input type="text" name="username" id="username" class="text" placeholder="帐号: "></li><li class="psw"><label>密码:</label><input type="password" name="userpass" id="userpass" class="text" placeholder="密码: "></li><li class="remember"><input class="in02" type="hidden" name="rls"  checked="checked" id="rls" value="sl" /><input type="checkbox" checked id="remember"><label for="remember">记住账号</label></li><li class="get-psw"><a target="_blank" title="找回密码" href="ttp://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" rel="nofollow">忘记密码</a> | 
              <a target="_blank" title="注册" href="ttp://reg.<?php echo ($ai["url"]); ?>/" rel="nofollow" id="btn-reg">注册账号</a></li><li class="log-btn"><a class="block-a" title="登录" id="log-btn" rel="nofollow" href="javascript:;" onclick="login();return false;">立即登录</a></li></ul><!-- 登录后 --><div class="loged" id="se_list" style="display:none;"><div class="loged-panel" ><div class="log2"><p>欢迎你：<span id="uname">295</span><br>                      最新服务器：<br><a id="last_game_info"></a><br></p><ul class="log2_ul"><li style="padding:0 5px;"><a href="http://user.<?php echo ($ai["url"]); ?>/" target="_blank">用户中心</a></li><li style="margin-right:5;padding:0 5px;"><a href="http://user.<?php echo ($ai["url"]); ?>//trans_record" target="_blank">充值明细</a></li><li style="padding:0 5px;"><a href="javascript:void(0);" onclick="exit();return false;">安全退出</a></li></ul></div></div></div></div></div><div class="recom-server"><div class="quick-ingame"> 快速选择服务器
          <input type="text" class="fastin-input s-fastin-input" name="val_ss" id="val_ss"> 服 
          <a class="fastin-btn s-fastin-btn" target="_blank" id="btn_ss" href="javascript:">进入</a></div><ul id="sidebar-server" class="sidebar-server"><?php if(is_array($server)): $i = 0; $__LIST__ = array_slice($server,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($gameid); ?>&sid=<?php echo ($v['sid']); ?>" target="_blank"><i></i>双线<?php echo ($v["sid"]); ?>服<span> 火爆开启</span></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><a class="server-more" target="_blank" href="/server_list">全部服务器列表 +</a></div><div class="kfwrap_div"><div class="t"></div><div class="kfdiv"><p class="kf_p_left fl" style=" margin:0 11px;">                      客服热线：<?php echo ($ai["tel"]); ?><br>                      客服论坛：<a href="HTTP://<?php echo ($ai["bbs"]); ?>" target="_blank" rel="nofollow" class="red">点击进入»</a><br>                      充值咨询：<a href="tencent://message/?uin=<?php echo ($ai["qq"]); ?>" target="_blank" title="在线客服" rel="nofollow">在线客服</a><br></p></div></div></div><div class="nei-main"><div class="neitop_div"><div class="neitop_l fl"><h1>新闻</h1><span>当前位置：<a href="/"><?php echo ($game["gamename"]); ?></a> &gt; <a href="/<?php echo ($mulu); ?>"><?php echo ($cace); ?></a></div></div><div id="neitab-content"><!-- 新闻 --><div><div class="nnlist"><ul><?php if(is_array($article)): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><span class="news_listTimer"><?php echo (date('m-d',$vo["time"])); ?></span><a href="article/tid/<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><div class="pageNum"><?php echo ($ShowPage); ?><div class="clear"></div></div></div></div></div></div></div></div><script type="text/javascript">            //手工输入进入游戏
            $("#btn_ss").mouseover(function(){
              $(this).attr('href', 'http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid='+gid+'&sid=' + $("#val_ss").val());
           });
            $("#btn_ss").click(function(){
              var s = $.trim($("#val_ss").val());
              if ( !s || isNaN(s)) {
                alert('请输入数字');
                return false;
              }
            });
var gid=<?php echo ($gameid); ?>;
</script><script src="/js/home/login.js"></script></body></html>