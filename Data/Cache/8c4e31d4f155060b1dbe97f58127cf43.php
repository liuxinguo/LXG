<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html><head><meta charset="UTF-8"><title>冰封侠服务器列表</title><meta http-equiv="Content-Type" content="text/html"; charset="UTF-8"><meta name="keywords" content="冰封侠,冰封侠网页游戏,冰封侠官网"><meta name="description" content="《冰封侠》是一款以国内科幻动作爱情3D电影《冰封：重生之门》为题材的网页游戏。65冰封侠带你全新穿越体验，跟随甄子丹的步伐，为国立下不世功勋。冰封重生，等你来战！" /><link href="/images/home/<?php echo ($gamezhuti); ?>/css/style.css" rel="stylesheet" type="text/css" /><script type="text/javascript" src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery.min.js"></script><script type="text/javascript" src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery-1.7.2.min.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script><!--[if lt IE 9]><script src="/images/home/<?php echo ($gamezhuti); ?>/js/respond.js"></script><![endif]--></head><body><div id="server"><div class="serverwarp_t"><div class="server_t mgt clearfix"><h1 class="s_logo fl"><a href="frozen_man.html" title="752G游戏-冰封侠"><img src="/images/home/<?php echo ($gamezhuti); ?>/img/game_logo.png" alt="65游戏-冰封侠" /></a></h1><div class="top_inner fr"><div class="server_nav"><ul class="clearfix"><li class="fl"><a class="db tc" href="<?php if((__URL__) == "/"): ?>/<?php else: echo ($gametag); ?>/<?php endif; ?>" title="进入官网">进入官网</a></li><li class="fl"><a class="db tc" href="http://bbs.<?php echo ($ai["url"]); ?>/#" title="游戏论坛" target="_blank">游戏论坛</a></li><li class="fl"><a class="db tc" href="http://pay.<?php echo ($ai["url"]); ?>/" title="用户充值" target="_blank">用户充值</a></li><li class="fl"><a class="db tc" href="javascript:;" onclick="try{window.external.addFavorite(document.location.href,document.title);}catch(e){try{window.sidebar.addPanel(document.location.href,document.title, '');}catch(e){alert('加入收藏失败，请使用Ctrl+D进行添加,或手动在浏览器里进行设置.');}}">收藏本页</a></li></ul></div><div class="s_login"><h3 class="title tc">用户登录</h3><div class="s_login_before dn clearfix" id="login" ><ul class="clearfix fl form"><li class="fl form"><label for="u">账号：</label><input name="username" id="username" value="" /></li><li class="fl form"><label for="p">密码：</label><input name="userpass" id="userpass" type="password" value="" /></li><li class="fl remober"><input type="hidden" name="rls"  checked="checked" id="rls" value="sl">下次自动登录
								</li><li class="fl remober"><a href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" title="忘记密码" target="_blank">忘记密码</a></li></ul><a class="s_login_btn fr" href="#" onclick="login();return false;" ></a></div><div class="login-h dn" id="se_list" style="display:none;"><p class="lg_hp">欢迎您：<a target="_blank" href="#" id="uname"></a></p><div class="lg_hp fl clearfix"><p class="lg_hp fl">最近登录服：<span id="last_game_info"></span></p></div><p class="lg_hp fl lg_hp3"><a href="http://user.<?php echo ($ai["url"]); ?>/" target="_blank">[用户中心]</a>&nbsp;&nbsp;
		                    	<a rel="nofollow" href="http://pay.<?php echo ($ai["url"]); ?>/" target="_blank">[我要充值]</a>&nbsp;&nbsp;
		                    	<a href="javascript:void(0);" onclick="exit();return false;">[安全退出]</a></p></div></div></div></div></div><div class="serverwarp_b"><div class="server_b mgt clearfix"><div class="server_list fr"><h3 class="title tc">服务器列表</h3><div class="title clearfix"><h4 class="title fl">推荐服务器：</h4><ul class="fr clearfix server_tip server_icon"><li class="fl unblok"><span></span>畅通</li><li class="fl dk"><span></span>待开</li><li class="fl hot"><span></span>火爆</li><li class="fl weih"><span></span>维护</li></ul></div><div class="hige"><ul class="clearfix server_icon" id="recom_server"><?php if(is_array($server1)): $i = 0; $__LIST__ = array_slice($server1,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="unblok fl"><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($v['gid']); ?>&sid=<?php echo ($v['sid']); ?>" ><span></span><i>双线<?php echo ($v["sid"]); ?>服</i></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><div class="all_server"><div class="all_server_top clearfix"><h3 class="title fl">全部服务器：</h3><div class="fr f_server clearfix"><div class="fl">双线<input type="text" value="" id="sunm" onkeyup="value=value.replace(/[^\d]/g,'') " />服</div><a class="fl tc db" href="javascropt:;" onclick="passport('#sunm'); return false;" title="">进入游戏</a></div></div><ul class="all_server_title clearfix" id="server_ban"></ul><div class="all_server_list" id="server_all"><ul class="clearfix server_icon" ><?php if(is_array($server1)): $i = 0; $__LIST__ = $server1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="unblok fl"><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($vo['gid']); ?>&sid=<?php echo ($vo['sid']); ?>" t="/server_id=<?php echo ($vo['sid']); ?>" target="_blank"><span></span>双线<?php echo ($vo["sid"]); ?>服</a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div></div></div></div><script type="text/javascript" >var gid=<?php echo ($gameid); ?>;
</script><script src="/js/home/login.js"></script><script type="text/javascript" src="http://www.752g.com/js/home/jquery.pages.js"></script><script type="text/javascript">$(document).ready(function(){
  

  //手工输入进入游戏
  $("#btn_ss").mouseover(function(){
    $(this).attr('href', 'http://www.5566wan.com/login/'+gid+'/' + $("#val_ss").val());

  });
  $("#btn_ss").click(function(){
    var s = $.trim($("#val_ss").val());
    if ( !s || isNaN(s)) {
      alert('请输入数字');
      return false;
    }
  });
      
  //分页
  var Maxpage = 7;
  var GameTotal = '';
  GameTotal = $("#server_all li a:first").attr('t');
  GameTotal = GameTotal.substr(GameTotal.indexOf('server_id=') + 10);
  $("#server_all").pages('li', {
    size:35,class_on:'tab_item',page_event:'hover'
  }, "#server_ban", function(c, l, s){
    var str = '', r, x, y;
    for (var i = 1; i <=c; i ++) {
      r = $.fn.pages.prototype.get_range(i, c, s);
      x = $("#server_all li a"+r[1]+":first").attr('t');
      x = x.substr(x.indexOf('server_id=') + 10);
      y = $("#server_all li a"+r[1]+":last").attr('t');
      y = y.substr(y.indexOf('server_id=') + 10);
      str += '<li><a href="javascript:void(0)" class="pm_a" pages_number="'+i+'" style="cursor:pointer;">'+x+'-'+y+'服</a></li>';
      if(i>=Maxpage-1)break;
    }
  //str += '<li><a href="javascript:void(0)" pages_number="'+Maxpage+'" class="pm_a" id="lastpage" style="cursor:pointer;">'+(y-1)+'-'+'1服</a></li>';
    return str;
  });
      
  $("#lastpage").mouseover(function(){
    $(this).addClass('pm_a tab_item');
    $('#server_all ul li').hide().slice((Maxpage-1)*35,((Maxpage-1)*35+30)).show();
    var LeftGame = GameTotal - (Maxpage-1)*35;
    var leftpageNum = Math.ceil(LeftGame/30);
    
    var leftpagehtml = '';
    for(i=0; i<leftpageNum; i++){
      if(i==0){
        leftpagehtml +='<li><a href="javascript:void(0);" class="active">1</a></li>'
      }else{
        leftpagehtml +='<li><a href="javascript:void(0);">'+(i+1)+'</a></li>';
      }
    }
      $("#page").html(leftpagehtml);$("#page").show();
  }).mouseout(function(){
    $('#server_all ul li').hide().slice((Maxpage-1)*35,((Maxpage-1)*35+30)).show();
    $("#page").show();
    $("#page li a").mouseover(function(){
      var $page_a = $("#page li a");
      var index = $page_a.index(this);
      $('#server_all ul li').hide().slice(((Maxpage-1)*35+index*30),((Maxpage-1)*35+(index+1)*30)).show();
      $("#page li a").removeClass().eq(index).addClass('active');
      });
  });
  
  $('#server_ban li:lt('+(Maxpage-1)+')').mouseover(function(){
    $("#page").hide();
  });


  
      
})
</script><script src="/images/home/<?php echo ($gamezhuti); ?>/js/base.js"></script><script src="/images/home/<?php echo ($gamezhuti); ?>/js/js.js"></script></body></html>