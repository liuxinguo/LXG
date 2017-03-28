<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>【<?php echo ($game["gamename"]); ?>官网】- <?php echo ($ai["title"]); ?></title><meta name="Keywords" content="大战神,大战神官网,Angelababy,大战神游戏,<?php echo ($ai["title"]); ?>大战神,大战神博客,大战神广告,大战神开服表,Angelababy代言游戏" /><meta name="Description" content="<?php echo ($ai["title"]); ?>《大战神》是由Angelababy代言的三国ARPG网页游戏。大战神游戏采用高性能3D引擎，将为玩家呈现360无死角的真3D视觉体验！游戏中收服名将、打造神器，一统中原横扫三界！Angelababy全网直播,与女神同场竞技！" /><link type="text/css" rel="stylesheet" href="/images/home/<?php echo ($gamezhuti); ?>/css/reset.css"/><link type="text/css" rel="stylesheet" href="/images/home/<?php echo ($gamezhuti); ?>/css/common.css"/><link type="text/css" rel="stylesheet" href="/images/home/<?php echo ($gamezhuti); ?>/css/home.css"/><script src="http://<?php echo ($ai["domain"]); ?>/js/home/jquery.js" type="text/javascript"></script><!--jquery--><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script><script type="text/javascript" src="http://dzs.game2.cn/special/g/js/jQuery1.7.2-SuperSlider2.1.js"></script><!--[if IE 6]><script type="text/javascript" src="http://script.game2.cn/fixPNG.js"></script><script>
        DD_belatedPNG.fix('div,h3,img,ul,p,span,button,.png,a,:hover');
    </script><![endif]--></head><body class="home"><div class="bg01"><div><div class="wraper"><div class="header"><ul class="nav clearfix center"><h1 style="display:none">大战神</h1><li class="cur"><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>"><strong style="margin-top: 0px;" class="zxz">官网首页</strong><em>官网首页</em></a></li><li><a href="<?php if((__URL__) == "/"): else: echo ($gametag); endif; echo U('/news');?>"><strong>新闻公告</strong><em>新闻公告</em></a></li><li><a href="<?php if((__URL__) == "/"): else: echo ($gametag); endif; echo U('/ziliao');?>"><strong>游戏资料</strong><em>游戏资料</em></a></li><li class="logo"><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>">大战神</a></li><li><a href="<?php if((__URL__) == "/"): else: echo ($gametag); endif; echo U('/gonglve');?>"><strong>进阶攻略</strong><em>进阶攻略</em></a></li><li><a href="http://pay.<?php echo ($ai["url"]); ?>/" target="_blank"><strong>快速充值</strong><em>快速充值</em></a></li><li><a href="http://bbs.<?php echo ($ai["url"]); ?>/" target="_blank"><strong>玩家论坛</strong><em>玩家论坛</em></a></li></ul><div class="banner"><img src="/images/home/dzs/img/banner.jpg"/></div></div><div class="container container1 clearfix"><div class="main"><div class="newSer"><h3>最新服务器</h3><ul class="newSerUl" id="server_list"><?php if(is_array($server)): $i = 0; $__LIST__ = array_slice($server,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($v['gid']); ?>&sid=<?php echo ($v['sid']); ?>"  target="_blank">双线<?php echo ($v["sid"]); ?>服</a<var class="s1">新服</var></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><div class="quik"><a class="more" href="<?php if((__URL__) == "/"): else: echo ($gametag); endif; echo U('/server_list');?>" target="_blank">更多&gt;</a><label>快速选择：</label><div class="serSel" style="display:none;"><a class="serA serOn" href="javascript:void(0)">选择区服类型</a><div class="selBox" style="display:none;"><div class="selList"><div class="selCon clearfix gtypeDiv"></div></div></div><input type="hidden" id="areatype" class="areatype" name="areatype" value=""/></div><span class="i"><input name="" type="text" class="input"
                       onkeyup="var checkServer=function(event,t){ var e = event || window.event;if(e.keyCode==13){if(!/^[1-9][0-9]{0,4}$/.test(t.value)){t.blur();alert('请输入正确的服务区编号');return false;}else{var _u = 'http://gameplay.{$ai.url}/game_add.html?gid=<?php echo ($gameid); ?>&sid='+t.value;window.location = _u;}}};checkServer(event,this);"
                       value="如:1" onfocus="if (value =='如:1'){value =''}" onblur="if (value ==''){value='如:1'}"
                       id="sno"></span><span>服</span><button class="Mjr" id="gotogame" value="" name=""
                        onclick="var sno = document.getElementById('sno').value;if(!/^[1-9][0-9]{0,4}$/.test(sno)){alert('请输入正确的服务器编号');return false;}var _u = 'http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($gameid); ?>&sid='+sno;this.name=_u;window.open(_u, '_blank');return true;"
                        onfocus="this.blur();">进入
                </button></div></div><div class="focusBanner"><ul class="picList"><?php if(is_array($vopic_banner)): $i = 0; $__LIST__ = $vopic_banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($v["url"]); ?>" target="_blank"><img src="<?php echo ($v["img"]); ?>"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><ul class="ggBtns"><?php if(is_array($vopic_banner)): $i = 0; $__LIST__ = $vopic_banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="javascript:void(0);"><?php echo ($i); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><div class="focusNews"><div class="focusTit"><a class="more" href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>news" target="_blank">更多 ></a><ul><li class="on"><a href="javascript:void(0);">综合</a></li><li><a href="javascript:void(0);">新闻</a></li><li><a href="javascript:void(0);">公告</a></li><li><a href="javascript:void(0);">活动</a></li></ul></div><div class="focusContent"><div class="tab1"><ul class="newsList"><?php if(is_array($zonghe)): $i = 0; $__LIST__ = array_slice($zonghe,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="st"><a  href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a><em class="date"><?php echo (date('m-d',$vo["time"])); ?></em></li><?php endforeach; endif; else: echo "" ;endif; if(is_array($zonghe)): $i = 0; $__LIST__ = array_slice($zonghe,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li  style="height:35px;"><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" target="_blank">[公告]<?php echo ($v["title"]); ?></a><em class="date">11-29</em></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><div class="tab2"><ul class="newsList"><?php if(is_array($zonghe)): $i = 0; $__LIST__ = array_slice($zonghe,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="st"><a  href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a><em class="date"><?php echo (date('m-d',$vo["time"])); ?></em></li><?php endforeach; endif; else: echo "" ;endif; if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li  style="height:35px;"><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" target="_blank">[公告]<?php echo ($v["title"]); ?></a><em class="date"><?php echo (date('m-d',$vo["time"])); ?></em></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><div class="tab3"><ul class="newsList"><?php if(is_array($zonghe)): $i = 0; $__LIST__ = array_slice($zonghe,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="st"><a  href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a><em class="date"><?php echo (date('m-d',$vo["time"])); ?></em></li><?php endforeach; endif; else: echo "" ;endif; if(is_array($active)): $i = 0; $__LIST__ = $active;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li  style="height:35px;"><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" target="_blank">[公告]<?php echo ($v["title"]); ?></a><em class="date"><?php echo (date('m-d',$vo["time"])); ?></em></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><div class="tab4"><ul class="newsList"><?php if(is_array($zonghe)): $i = 0; $__LIST__ = array_slice($zonghe,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="st"><a  href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a><em class="date"><?php echo (date('m-d',$vo["time"])); ?></em></li><?php endforeach; endif; else: echo "" ;endif; if(is_array($mtzx)): $i = 0; $__LIST__ = $mtzx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li  style="height:35px;"><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" target="_blank">[公告]<?php echo ($v["title"]); ?></a><em class="date"><?php echo (date('m-d',$vo["time"])); ?></em></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div></div><div class="side"><h5 class="starGame"><a href="<?php if((__URL__) == "/"): else: echo ($gametag); endif; echo U('/server_list');?>" target="_blank">开始游戏</a></h5><link type="text/css" rel="stylesheet" href="/images/home/<?php echo ($gamezhuti); ?>/css/login.css?v=20151129153341" /><div class="loginField"><div class="logDiv"><div class="wrap"><div class="login" id="login"><form method="get" onSubmit="login();return false;"><p class="pWarn" style="background-image:none;"></p><p class="p1"><label for="">账　号：</label><input class="i" type="text" name="username" id="username" value="" data-placeholder="请输入账号" data-placeholder-type="1" /></p><p class="p2"><label for="">密　码：</label><input class="i" type="password" name="userpass" id="userpass" value="" data-placeholder="请输入密码" data-placeholder-type="1" /></p><p class="chek"><b><input type="checkbox" name="keeplive"  checked="checked" id="rls" value="sl" style="display:none;" /><a href="javascript:void(0);" class="radioItem fxk on" data-name="keeplive" data-checkedCls="on">记住账号</a></b><a class="aGet" target="_blank" href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html">找回密码</a><a class="aReg" target="_blank" href="http://reg.<?php echo ($ai["url"]); ?>/" id="q_b1">快速注册</a></p><p class="btn"><button class="logBtn" value="ok" type="submit">登录</button></p></form></div><div class="logon" id="se_list" style="display:none;"><div class="n"><p class="t_c"><a class="showUserCode" id="user_info" ></a></p><p class="t_c wel">欢迎您登录！</p></div><div class="ser"><h5>推荐最新区服：</h5><span id="last_game_info"></span><!-- <p><a href="#" target="_blank"><span>[100服]专属·百服</span><em>进入游戏</em></a></p>--></div><div class="btn2"><a href="http://user.<?php echo ($ai["url"]); ?>/" target="_blank" class="b2">个人中心</a><a href="javascript:void(0);" onclick="exit();return false;" class="doSigout b3">注销</a></div></div></div></div></div></div></div><div class="container container2 clearfix"><div class="main"><!--gameData STAR--><div class="gameData"><div class="dataGroup dateG1"><dl><dt>新手引导</dt><?php if(is_array($xszd)): $i = 0; $__LIST__ = $xszd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?></dl><span class="dateICO"></span></div><div class="dataGroup dateG2"><dl><dt>特色玩法</dt><?php if(is_array($tswf)): $i = 0; $__LIST__ = $tswf;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?></dl><span class="dateICO"></span></div><div class="dataGroup dateG3"><dl><dt>高手进阶</dt><?php if(is_array($gsjj)): $i = 0; $__LIST__ = $gsjj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v["id"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?></dl><span class="dateICO"></span></div></div></div><div class="side"><div class="quickLink"><ul class="linkList"><li class="downLink"><a href="http://res.dzs.52xiyou.com/752g/client/dzs.exe" target="_blank">登录器下载</a></li><li class="giftLink"><a href="http://libao.<?php echo ($ai["url"]); ?>/" target="_blank">大战神游戏礼包</a></li></ul></div></div></div><div class="container container3 clearfix"><div class="main roleGroup"><ul class="roleName"><li class="on"><a href="javascript:void(0);">媚娘</a></li><li><a href="javascript:void(0);">苍云</a></li><li><a href="javascript:void(0);">邪刃</a></li><li><a href="javascript:void(0);">青萝</a></li></ul><div class="roleContent"><div class="roleInfo role1"><h3>媚娘</h3><div class="roleIntro"><h4>媚眼轻抛一刹那，情花飞尽百花杀。</h4><p>
“四天人”中的媚娘，玩家所扮演的主角之一。她原是离恨天上太虚幻境司主。因仙魔之争旷日持久，仙魔二界元气大伤，又逢人界乱世征伐，魔王封印异动。她主动向上皇天帝请命，下凡组建四天人，挫败魔界的阴谋。在此过程中，她化名媚娘，先后结识苍云、邪刃、青萝等伙伴，她暗中推动，最终使心仪的苍云成为四天人之首。</p><p class="clear"></p><h4>【职业特点】</h4><p>
                        御姐体型，与苍云有暧昧的关系，与邪刃是开得起玩笑的朋友，与青萝是伙伴加姐妹。有多面性格，即有温柔贴心的一面，也有女王冷酷的一面。</p></div></div><div class="roleInfo role2"><h3>苍云</h3><div class="roleIntro"><h4>苍龙抱云吐天地，猛虎狂啸破太极。</h4><p>
“四天人”中的苍云，玩家所扮演的主角之一，他是历经血战洗礼的沧桑刀客。自董卓篡逆以来，四方豪杰并起，天下大乱，乱世英雄无不磨刀利剑，苍云亦在此刻高举大义之旗，凭借自身无以匹敌的武艺，义无反顾踏上乱世征途。</p><p class="clear"></p><h4>【职业特点】</h4><p>
                        稍有大叔范儿，成熟的刀客，识大体，为四天人之首，常常是一个队伍中的队长，他并不专断独权，但可惜有时候不善于与人沟通。与媚娘有暧昧的关系，与邪刃常起争执但每逢战斗又能和好如初，也常容忍调皮捣蛋的青萝。</p></div></div><div class="roleInfo role3"><h3>邪刃</h3><div class="roleIntro"><h4>武逆苍穹天机变，刀挑乱世邪云掀。</h4><p>
“四天人”中的邪刃，玩家所扮演的主角之一。据传，邪刃原本是乱世孤儿，后被一自称陆压的道人所收养。邪刃师成下山后，对于乱世中的战争、阴谋、贪欲，早已司空见惯。而今，他要以血光杀戮证道自身之奥义。</p><p class="clear"></p><h4>【职业特点】</h4><p>
                        略带妖邪的高挑英俊男，善使折枪（一种两头可折可合的长枪形武器），常常与苍云有不同的意见，总爱与媚娘说些机敏的玩笑，不知何时，突然开始对青萝有特别的照顾。</p></div></div><div class="roleInfo role4"><h3>青萝</h3><div class="roleIntro"><h4>青裙薄衫舞白绡，红波弄影吹笙箫。</h4><p>
“四天人”中的青萝，玩家所扮演的主角之一。她来历不明，即使是四天人的发起者媚娘也对她知晓不多，就连青萝这个名字，也是在第一次见面时，邪刃凭感觉临时给她起的。然而有一点大家都看在眼里，那就是青萝在战斗中时不时会爆发出一股神秘的力量，有如苍龙吐天地，亦比玄凤鸣苍穹，不过她自己并没有察觉到。</p><p class="clear"></p><h4>【职业特点】</h4><p>
                        乙女体型（游戏中偏萝莉），与苍云有如同兄妹一般的关系，与邪刃有说不清道不明的关系，与媚娘是伙伴加姐妹，爱调皮捣蛋，是个小机灵鬼，虽偶有不太自信，但受到了大家的鼓励得以成长。爱闯祸，闯完祸后，其他三人完全没理由的自愿帮忙善后。</p></div></div></div></div><div class="side"><div class="gameIntro"><div class="introTit"><h3>游戏简介</h3></div><div class="introContent"><?php echo (mysubstr(0,200,strip_tags($game["content"]))); ?></div></div><div class="gameContact"><h3><?php echo ($ai["tel"]); ?></h3><ul class="contactInfo"><li>充值客服：<a href="tencent://message/?uin=<?php echo ($ai["qq"]); ?>" target="_blank"><?php echo ($ai["qq"]); ?></a></li><li>游戏论坛：http://<?php echo ($ai["bbs"]); ?></li></ul><span class="serOnline"><a href="http://gm.<?php echo ($ai["url"]); ?>" target="_blank">在线客服</a></span></div></div></div><div class="container container4 clearfix"><div class="main"><div class="newsBox newsBox1"><div class="newsTit"><a class="more" href="<?php echo U('/gonglve');?>" target="_blank" id="moreYxgl">更多></a><ul><li class="on"><a href="javascript:void(0);"  class="moreGetYxgl">游戏攻略</a></li><script>
                        $(function () {
                            $(".moreGetYxgl").click(
                                    function(){
                                        if(!$(this).parent().hasClass("on")){
                                            $("#moreYxgl").show();
                                            $("#moreLtjh").hide();
                                        }
                                    }
                            );
                            $(".moreGetLtjh").click(
                                    function(){
                                        if(!$(this).parent().hasClass("on")){
                                            $("#moreLtjh").show();
                                            $("#moreYxgl").hide();
                                        }
                                    }
                            );
                        });
                    </script></ul></div><div class="newsContent"><ul class="newsList"><?php if(is_array($guide)): $i = 0; $__LIST__ = array_slice($guide,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>article/tid/<?php echo ($v[id]); ?>" target="_blank" style="color:<?php echo ($v["color"]); ?>"><?php echo ($v["title"]); ?></a><em><?php echo (date('m-d',$vo["time"])); ?></em></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div><div class="newsBox newsBox2"><div class="newsTit"><ul><li class="on"><a href="javascript:void(0);">265G</a></li><li><a href="javascript:void(0);">07073</a></li><li><a href="javascript:void(0);">页游网</a></li><li><a href="javascript:void(0);">一游网</a></li></ul></div><div class="newsContent"><ul class="newsList"><iframe  width="410" height="165" frameborder="0" marginwidth="0" marginheight="0" allowtransparency="true" src="http://im.265g.com/articlelist/dzs_game2.html" scrolling="no"></iframe></ul><ul class="newsList"><iframe  width="410" height="165" frameborder="0" marginwidth="0" marginheight="0" allowtransparency="true" src="http://www.07073.com/plus/2015_qt_2.php?g=25772&psize=5&tmp=if_2015pt&width=410&height=165&bg=FAFAFA&color=6F6F6F&hv=&hvl=1&sort=40&lh=24&ln=1&fsize=12&mtop=0&mleft=0&mright=0&bbl=dashed&bbc=" scrolling="no"></iframe></ul><ul class="newsList"><iframe  width="410" height="165" frameborder="0" marginwidth="0" marginheight="0" allowtransparency="true"
src="http://article.yeyou.com/embedded/53147/game2.shtml" scrolling="no"></iframe></ul><ul class="newsList"><iframe  width="410" height="165" frameborder="0" marginwidth="0" marginheight="0" allowtransparency="true"
src="http://iframe.eeyy.com/dazs/576.html" scrolling="no"></iframe></ul></div></div></div><div class="side"><div class="activFocus"><div class="pics"><ul><li><a href="http://www.07073.com/dazhanshen/ " target="_blank"><img src="http://dzs.game2.cn/images/toupiao/07073.jpg"alt="上07073为大战神投票"/></a></li><li><a href="http://www.265g.com/dzs/" target="_blank"><img src="http://dzs.game2.cn/images/toupiao/265G.jpg"alt="上265G为大战神投票"/></a></li><li><a href="http://www.juxia.com/webgame/dzsjx/" target="_blank"><img src="http://dzs.game2.cn/images/toupiao/jxw.jpg"alt="上聚侠网为大战神游戏投票"/></a></li><li><a href="http://www.eeyy.com/webgame/dazs/" target="_blank"><img src="http://dzs.game2.cn/images/toupiao/yyw.jpg"alt="上页游网为大战神投票"/></a></li><li><a href="http://www.40407.com/dazs/" target="_blank"><img src="http://dzs.game2.cn/images/toupiao/40407.jpg"alt="上40407为大战神投票"/></a></li></ul></div><span class="preNext"><a href="javascript:void(0);" class="prev">上一页</a><a href="javascript:void(0);" class="next">下一页</a></span></div></div></div><div class="container container5 clearfix"><div class="content"><div class="marquee"><ul class="friendLink clearfix"><?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="<?php echo ($vo["website"]); ?>" ><?php echo ($vo["webname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div><script>
jQuery(".container5").slide({mainCell:".marquee",autoPlay:true,effect:"topMarquee",interTime:60,vis:1});
</script><div id="backTop"><a href="javascript:void(0)" style="display: none;">返回顶部</a></div><script type="text/javascript">
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
</script></div></div></div><script language="javascript" type="text/ecmascript">
    //焦点图
    jQuery(".focusBanner").slide({
        mainCell: "ul.picList",
        effect: "leftLoop",
        autoPlay: true,
        delayTime: 500,
        interTime: 3000,
        mouseOverStop: true
    });
    //焦点新闻
    jQuery(".focusNews").slide({
        titCell: ".focusTit ul li",
        mainCell: ".focusContent",
        defaultIndex: 1,
        effect: "left",
        trigger: "click",
        delayTime: 500,
        prevCell: null,
        nextCell: null
    });
    //角色
    jQuery(".roleGroup").slide({
        titCell: ".roleName li",
        mainCell: ".roleContent",
        defaultIndex: 1,
        effect: "fade",
        trigger: "click",
        delayTime: 500,
        prevCell: null,
        nextCell: null,
        startFun: function (i, c) {
            jQuery(".roleInfo h3").css({"left": "528px", "opacity": 0.1}, 300).eq(i).animate({
                "left": "428px",
                "opacity": 1
            }, 300);
        }
    });
    //网站新闻
    jQuery(".newsBox").slide({
        titCell: ".newsTit ul li",
        mainCell: ".newsContent",
        defaultIndex: 1,
        effect: "fade",
        trigger: "click",
        delayTime: 500,
        prevCell: null,
        nextCell: null
    });
    //活动焦点
    jQuery(".activFocus").slide({
        mainCell: ".pics ul",
        effect: "leftLoop",
        autoPlay: true,
        delayTime: 500,
        interTime: 3000,
        mouseOverStop: true
    });
</script><script type="text/javascript" >
var gid=<?php echo ($gameid); ?>;
</script><script src="/js/home/login.js"></script><script type="text/javascript">
    window.onload = function () {
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
//游戏资料
        $('.dataGroup').hover(function () {
            $('.dateICO', this).stop().animate({left: '182px'}, 300);
        }, function () {
            $('.dateICO', this).stop().animate({left: '192px'}, 300);
        });
//游戏系统
        $('.systemGroup').hover(function () {
            $('.weapon', this).stop().animate({left: '110px'}, 300);
            $('.readMore', this).stop().animate({marginTop: '5px'}, 300);
            $('dt', this).stop().animate({marginTop: '-10px'}, 300);
        }, function () {
            $('.weapon', this).stop().animate({left: '120px'}, 300);
            $('.readMore', this).stop().animate({marginTop: 0}, 300);
            $('dt', this).stop().animate({marginTop: 0}, 300);
        });
//游戏壁纸
        $('.wallLink').hover(function () {
            $('a em', this).stop().animate({top: '52px'}, 300);
            $('a img', this).stop().animate({width: '320px', height: '151px', top: '-5px', left: '-10px'}, 300);
        }, function () {
            $('a em', this).stop().animate({top: '40px'}, 300);
            $('a img', this).stop().animate({width: '300px', height: '141px', top: 0, left: 0}, 300);
        });
    }
    //返回顶部
    var oDiv = $("#backTop");
    $("#backTop").children("a").click(function () {
        var _this = $(this);
        // _this.addClass("topClick");
        $("html").animate({scrollTop: 0}, {duration: 500, easing: "easeInOutQuart"});
        // _this.animate({bottom:"2000px"},{duration:1000,easing:"easeInOutQuart",complete:function(){_this.css("bottom","100px").removeClass("topClick")}});
    })

    $(window).scroll(function () {
        var oDiv = $("#backTop");
        var oDivH = oDiv.outerHeight();
        var winH = $(window).height();
        var docH = $(document).height();
        var scrollTop = $(window).scrollTop();
        var bottom = 0;
        if (scrollTop > winH / 2) {
            oDiv.children("a").fadeIn();
        } else {
            oDiv.children("a").fadeOut();
        }
    });
</script></body></html>