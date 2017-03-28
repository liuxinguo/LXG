<?php if (!defined('THINK_PATH')) exit();?><!doctype html><!--[if lt IE 7 ]><html lang="zh" class="ie6"><![endif]--><!--[if IE 7 ]><html lang="zh" class="ie7"><![endif]--><!--[if IE 8 ]><html lang="zh" class="ie8"><![endif]--><!--[if IE 9 ]><html lang="zh" class="ie9"><![endif]--><!--[if (gt IE 9)|!(IE)]><!--><html lang="zh"><head><meta charset="utf-8"/><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><meta name="viewport" content="width=1200, initial-scale=1"><meta name="renderer" content="webkit"><meta name="keywords" content="神道官网,752G神道,神道攻略"/><meta name="description" content="752G《神道》是一款根据同名电视剧剧情改编的大型ARPG网页游戏。游戏以修真世界为背景，采用唯美写实画风，真实再现了电视剧的场景与剧情。玩家将以男女主人公的视角进入游戏世界，引领剧情发展，仙魔斗法体验除魔卫道的传奇仙侠人生。"/><meta name="frontend" content="szc"/><title>【<?php echo ($game["gamename"]); ?>官网】- <?php echo ($ai["title"]); ?></title><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/global.css"/><link href="/images/home/<?php echo ($gamezhuti); ?>/css/qyz_main.css" rel="stylesheet" type="text/css"/><script type="text/javascript" src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery.min.js"></script><script type="text/javascript" src="/images/home/<?php echo ($gamezhuti); ?>/js/index.js"></script><script src="/images/home/<?php echo ($gamezhuti); ?>/js/marquee.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script></head><body><div class="body"><div class="bg"><div class="wrap f-cf"><!-- header --><div class="header"><div class="kv-top" id="kv-top"><ul class="kv-top-img"><li style="display: list-item; background: url(/images/home/<?php echo ($gamezhuti); ?>/images/12144502tSQjr.jpg) 50% 0% no-repeat;" class="focus"><a target="_blank" title="神道礼包" href="/"></a></li></ul></div><a class="logo" href="/" title="神道" target="_blank"></a><div class="top-nav"><ul id="nav" class="nav cls"><li class="top-nav-li"><a class="top-nav-a" href="/" target="_blank">HOME <br><b>神道首页</b></a></li><li class="top-nav-li"><a class="top-nav-a" href="/news" target="_blank">GAME INFO <br><b>游戏资料</b></a></li><li class="top-nav-li"><a class="top-nav-a" href="HTTP://libao.<?php echo ($ai["url"]); ?>" target="_blank">GIFTS <br><b>游戏礼包</b></a></li><li class="top-nav-li"><a class="top-nav-a" href="HTTP://pay.<?php echo ($ai["url"]); ?>" target="_blank" >PAY <br><b>充值中心</b></a></li><li class="top-nav-li"><a class="top-nav-a" href="HTTP://GM.<?php echo ($ai["url"]); ?>" target="_blank" >SERVICE <br><b>在线客服</b></a></li><li class="top-nav-li"><a class="top-nav-a" href="HTTP://bbs.<?php echo ($ai["url"]); ?>" target="_blank">BBS <br><b>玩家论坛</b></a></li></ul></div><!--快速进服列表--><p class="top-tips">本游戏适合18岁以上的玩家进入</p></div><div class="side"><!--开始游戏--><a class="start sprite-1" href="/server_list" target="_blank"><span></span></a><div class="login-t cls"><a id="charge" class="sprite-1" target="_blank" title="充值" href="http://pay.<?php echo ($ai["url"]); ?>/" ><b class="pay-icon"></b>充值</a><a id="btn-reg" class="sprite-1" target="_blank" title="注册" href="http://reg.<?php echo ($ai["url"]); ?>/" ><b class="reg-icon"></b>注册</a></div><div id="loginframe" class="login"><!-- 登录前 --><div class="log" id="login"><ul><li class="user"><label for="username" class="login-label">帐号:</label><input type="text" name="username" id="username" class="text" placeholder="帐号"/></li><li class="psw"><label for="password" class="login-label">密码:</label><input type="password" name="userpass" id="userpass" placeholder="密码" class="text"></li><li class="remember"><input type="checkbox" checked="checked" name="rls" id="rls"/><label for="remember">记住用户名</label></li><li class="get-psw"><a target="_blank" href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" >忘记密码？</a></li><li class="log-btn"><a id="log-btn" class="sprite-1"  href="javascript:;" onclick="login();return false;">登录</a></li></ul></div><!-- 登录后 --><div class="loged" id="se_list" style="display:none"><div class="loged-top">用户信息</div><div class="loged-panel"><ul><li>您好，<a class="loged-highlight" id="uname">111</a></li><li><a target="_blank" href="#">完善密保资料</a></li><li>上次进入的区服：</li><li id="last_game_info"></li><li class="loged-usercenter f-ar"><a target="_blank" href="http://user.<?php echo ($ai["url"]); ?>/">用户中心</a><a href="javascript:void(0);" onclick="exit();return false;">注销</a></li></ul></div><div class="loged-bottom"></div></div></div><div class="recom-server"><h3 class="h3-title"><span class="recom-server-text"><em>服务器列表</em>/SERVER LIST</span></h3><div class="recom-server-con"><div class="select-type">                            快速进入 <span id="fastType2"></span>:
                            <input type="text" class="s-fastin" name="val_ss" id="val_ss">区 <a id="btn_ss" href="javascript:">进入</a></div><ul class="choice-list" id="servers"><?php if(is_array($server)): $i = 0; $__LIST__ = array_slice($server,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($gameid); ?>&sid=<?php echo ($v['sid']); ?>" data-sid="<?php echo ($v['sid']); ?>" target="_blank"><span>火爆开启</span>双线<?php echo ($v["sid"]); ?>服</a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><a target="_blank" href="/server_list" id="all-server" class="all-server">更多服务器 <i></i></a></div></div><!-- 客服中心 --><div class="service"><h3 class="h3-title"><span><em>客服中心</em>/SERVICE</span></h3><ul class="service-con f-cf"><li>客服电话：<?php echo ($ai["tel"]); ?></li><li>游戏咨询： <a class="service-btn" href="HTTP://GM.<?php echo ($ai["url"]); ?>" target="_blank" title="在线客服" >在线客服</a></li><li>充值咨询： <a class="service-btn" href="HTTP://GM.<?php echo ($ai["url"]); ?>" target="_blank" title="在线客服" >在线客服</a></li></ul></div><!-- 合作媒体 --><div class="media"><h3 class="h3-title"><span><em>合作媒体</em></span></h3><div class="con"><div class="media-scroll" id="marquee"><ul><?php if(is_array($imlinks)): $i = 0; $__LIST__ = $imlinks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["website"]); ?>" target="_blank" rel="nofollow"><img src="<?php echo ($vo["pic"]); ?>" width="150" height="50"></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div></div><div class="main"><!-- 新闻资讯 --><div id="news"><div class="news-con"><div class="news-tab f-cf" id="news-tab"><a id="news-more" class="more sprite-icon" href="/news" title="更多" target="_blank">更多</a><ul><li id="li_zonghe"><a href="/news" title="综合" target="_blank">综合</a><b class="line"></b></li><li id="li_xinwen"><a href="/news" title="新闻" target="_blank">新闻</a><b class="line"></b></li><li id="li_huodong"><a href="/news" title="活动" target="_blank">活动</a><b class="line"></b></li><li id="li_gonglue"><a href="/news" title="媒体" target="_blank">媒体</a></li></ul></div><div class="headline"><?php if(is_array($news)): $i = 0; $__LIST__ = array_slice($news,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a class="headline-title" href="article/tid/<?php echo ($v["id"]); ?>" target="_blank" ><?php echo ($v["title"]); ?><i></i></a><?php endforeach; endif; else: echo "" ;endif; ?></div><div class="news-list" id="news-list"><!-- 综合 --><ul><?php if(is_array($zonghe)): $i = 0; $__LIST__ = $zonghe;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span class="time"><?php echo (date('m.d',$v["time"])); ?></span><a class="a-link" href="/article/tid/<?php echo ($v["id"]); ?>" class="a-link" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><!-- 新闻 --><ul><?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span class="time"><?php echo (date('m.d',$v["time"])); ?></span><a class="a-link" href="/article/tid/<?php echo ($v["id"]); ?>" class="a-link" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><!-- 活动 --><ul><?php if(is_array($active)): $i = 0; $__LIST__ = $active;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span class="time"><?php echo (date('m.d',$v["time"])); ?></span><a class="a-link" href="/article/tid/<?php echo ($v["id"]); ?>" class="a-link" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><!-- 媒体 --><ul><?php if(is_array($mtzx)): $i = 0; $__LIST__ = $mtzx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span class="time"><?php echo (date('m.d',$v["time"])); ?></span><a class="a-link" href="/article/tid/<?php echo ($v["id"]); ?>" class="a-link" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div><!--kv图--><div class="kv" id="kv"><ul class="kv-img"><?php if(is_array($vopic_banner)): $i = 0; $__LIST__ = $vopic_banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($v["url"]); ?>" target="_blank"><img src="<?php echo ($v["img"]); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><ul class="kv-num"><li class="kv-num-1 current">●</li><li class="kv-num-2">●</li><li class="kv-num-3">●</li><li class="kv-num-4">●</li></ul></div><!-- 职业介绍 --><div class="role"><h3 class="h3-title"><span>角色介绍</span></h3><div class="role-wrap"><div class="role-nav"><ul class="f-cf" id="roleTab"><li class="cur"><a href="javascript:void(0);">贤者组合</a><b class="line2"></b></li><li class=""><a href="javascript:void(0);">祭世组合</a><b class="line2"></b></li><li class=""><a href="javascript:void(0);">梵天组合</a><b class="line2"></b></li><li class=""><a href="javascript:void(0);">巫毒组合</a><b class="line2"></b></li></ul></div><div class="role-con" id="rolePanel"><!-- role0 --><div class="role-detail curElem"><div class="r-desc"><p class="r-desc-p"><b class="r-desc-b">贤者组合：</b><label>攻防兼备</label></p><p class="r-desc-p"><label>初期李靖，既加奶又加攻。这个阵法需要有慈航道人、姜子牙等奶妈，搭配哪吒、广目天王等奶追武将用来输出。</label></p><div class="r-desc-p r-desc-icon"><p><label>生存能力:</label><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star r-desc-star-no"></span></p><p><label>输出能力:</label><span class="sprite-icon r-desc-star"></span></p><p><label>辅助能力:</label><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star r-desc-star-no"></span></p><p><label>综合评价:</label><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span></p></div></div><div class="r-per"><img src="/images/home/<?php echo ($gamezhuti); ?>/images/r0.png" alt=""></div></div><!-- role1 --><div class="role-detail"><div class="r-desc"><p class="r-desc-p"><b class="r-desc-b">祭世组合：</b><label>注重攻击和控制，PK必备</label></p><p class="r-desc-p"><label>核心武将是道行天尊或雨师,负责主动控制，雷震子、云中子等负责暴力输出，可以搭配主角的主动眩晕技能使用效果更好。</label></p><div class="r-desc-p r-desc-icon"><p><label>生存能力:</label><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star r-desc-star-no"></span></p><p><label>输出能力:</label><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star r-desc-star-no"></span></p><p><label>辅助能力:</label><span class="sprite-icon r-desc-star"></span></p><p><label>综合评价:</label><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star r-desc-star-no"></span></p></div></div><div class="r-per"><img src="/images/home/<?php echo ($gamezhuti); ?>/images/r1.png" alt=""></div></div><!-- role2 --><div class="role-detail"><div class="r-desc"><p class="r-desc-p"><b class="r-desc-b">焚天组合：</b><label>注重攻击，刷BOSS必备</label></p><p class="r-desc-p"><label>核心武将后羿、闻仲可在暴击后追加攻击，杨戬、袁洪等触发暴击，目前这个组合是最受欢迎的，确实很带劲。</label></p><div class="r-desc-p r-desc-icon"><p><label>生存能力:</label><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span></p><p><label>输出能力:</label><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span></p><p><label>辅助能力:</label><span class="sprite-icon r-desc-star"></span></p><p><label>综合评价:</label><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star r-desc-star-no"></span></p></div></div><div class="r-per"><img src="/images/home/<?php echo ($gamezhuti); ?>/images/r3.png" alt=""></div></div><!-- role3 --><div class="role-detail"><div class="r-desc"><p class="r-desc-p"><b class="r-desc-b">巫毒组合：</b><label>适用于持久战</label></p><p class="r-desc-p"><label>核心武将有孔宣、祝融、申公犳，毒追有燃灯道人、土行孙等。毒组合的效果实际上非常可怕。</label></p><div class="r-desc-p r-desc-icon"><p><label>生存能力:</label><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star r-desc-star-no"></span></p><p><label>输出能力:</label><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star r-desc-star-no"></span></p><p><label>辅助能力:</label><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star r-desc-star-no"></span></p><p><label>综合评价:</label><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span><span class="sprite-icon r-desc-star"></span></p></div></div><div class="r-per"><img src="/images/home/<?php echo ($gamezhuti); ?>/images/r2.png" alt=""></div></div></div></div></div><!-- 友情链接 --><div class="links"><div class="links-con"><?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a target="_blank" href="<?php echo ($vo["website"]); ?>" title="<?php echo ($vo["webname"]); ?>" ><?php echo ($vo["webname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></div></div><!--游戏资料--><div class="ziliao"><h3 class="h3-title"><span><em>游戏资料</em>/GAME INFO</span></h3><div class="ziliao-con"><ul class="zl-tab f-cf"><li id="zl-li1" class="zl-on"><a href="javascript:;">新</a></li><li id="zl-li2"><a href="javascript:;">高</a></li><li id="zl-li3"><a href="javascript:;">系</a></li></ul><ul class="zl-con"><li style="display:list-item"><?php if(is_array($xszd)): $i = 0; $__LIST__ = $xszd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="article/tid/<?php echo ($v["id"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></li><li style="display:none"><?php if(is_array($gsjj)): $i = 0; $__LIST__ = $gsjj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="article/tid/<?php echo ($v["id"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></li><li style="display:none"><?php if(is_array($tswf)): $i = 0; $__LIST__ = $tswf;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="article/tid/<?php echo ($v["id"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></li></ul></div></div><div class="jietu"><h3 class="h3-title"><span><em>游戏截图</em>/GAME SCREENSHOT</span></h3><div class="jietu_wrap"><div class="jietu_pic"><ul class="picture"><!-- 第一张附属图 --><?php if(is_array($activepic)): $i = 0; $__LIST__ = $activepic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="article/tid/<?php echo ($v["id"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>"><img src="<?php echo ($v["pic"]); ?>" alt="<?php echo ($v["title"]); ?>" width="269" height="172"></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><a href="javascript:;" class="but-game-pic but-game-pic-prev sprite" id="but-game-pic-prev"></a><a href="javascript:;" class="but-game-pic but-game-pic-next sprite" id="but-game-pic-next"></a></div></div></div></div></div></div></div><script type="text/javascript" >            //手工输入进入游戏
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