<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML><html lang="zh"><head><meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><meta name="viewport" content="width=1200, initial-scale=1"><meta name="renderer" content="webkit"><title><?php echo ($game["gamename"]); ?>开服列表 - <?php echo ($ai["title"]); ?></title><meta name="keywords" content="热血江湖情传,热血江湖传开服表,热血江湖网页版,热血江湖私发网,热血江湖官方网站"/><meta name="description" content="本站为热血江湖传官方网站,提供最专业的热血江湖传活动资讯,以及最新开热血江湖网页版服务器,同时还提供更多热血江湖传新手卡,礼包领取,如果你喜欢热血江湖网页版的话,就来这里吧.最有利用价值的热血江湖传消息讯息等着你,欢迎你的加入."/><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/global.css"/><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/main.css"/><script src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery.min.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script></head><body><div class="s-body"><div class="s-wrap"><div class="s-header"><a class="s-logo" href="index.html/" target="_blank" title="热血江湖传">热血江湖传</a><!-- nav --><div class="s-nav"><a id="s-nav1" href="index.html" target="_blank" title="进入官网">进入官网</a><a id="s-nav2" href="#" target="_blank" title="游戏论坛">游戏论坛</a><a id="s-nav3" href="#" target="_self" rel="nofollow" title="用户充值">用户充值</a><a id="s-nav4" href="#" target="_blank" title="礼包中心">礼包中心</a></div><!-- login --><div id="loginframe" class="s-loginframe"><div id="login1"></div><ul id="login" class="log"><li class="s-user" style="width:192px; height:31px; position:absolute;"><input placeholder="帐号" type="text" ame="username" id="username" class="s-text"></li><li class="s-psw" style="width:192px; height:31px; position:absolute;"><input type="password" placeholder="密码" name="userpass" id="userpass" class="s-text"></li><li class="s-log-btn" style="width:176px; height:53px; position:absolute;"><a href="#" onclick="login();return false;" class="block-a" title="登录" rel="nofollow"></a></li><li class="s-remember" style="position:absolute;"><input type="hidden" name="rls"  checked="checked" id="rls" value="sl"><input type="checkbox" checked="checked" id="remember">            &nbsp;

            <label for="remember">记住用户名</label></li><li class="s-psw-btn" style="position:absolute;"><a rel="nofollow" href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" target="_blank" title="忘记密码">忘记密码</a></li><li class="s-reg-btn" style="position:absolute;"><a rel="nofollow" id="btn-reg" href="http://reg.<?php echo ($ai["url"]); ?>" target="_blank" title="马上注册">马上注册</a></li></ul><div class="s-login" id="se_list" style="display:none;"><ul class="s-login_a"><li>您好:<a class="s-login_name" id="uname" ></a></li><li class="s-login_zhongxin"><a href="http://user.<?php echo ($ai["url"]); ?>/">用户中心</a><a href="javascript:void(0);" onclick="exit();return false;">[注销]</a></li></ul><ul class="s-login_b" id="last_game_info"></ul></div></div></div><div class="s-content"><!-- recom --><div class="s-server-list rec-server f-cf"><p class="s-name s-name-rec">最新服务器:</p><div class=""><ul class="all_server_list" id="recom_server"><?php if(is_array($server1)): $i = 0; $__LIST__ = array_slice($server1,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($v['gid']); ?>&sid=<?php echo ($v['sid']); ?>" >双线<?php echo ($v["sid"]); ?>服</a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div><!-- all server--><div class=""><div id="sp" class="sp" ><p class="s-name s-name-rec">所有服务器:</p><ul class="all_server_title clearfix" id="server_ban" style="overflow:hidden;"></ul><div class="all_server_list" id="server_all"><ul class="clearfix server_icon" ><?php if(is_array($server1)): $i = 0; $__LIST__ = $server1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="unblok fl"><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($vo['gid']); ?>&sid=<?php echo ($vo['sid']); ?>" t="/server_id=<?php echo ($vo['sid']); ?>" target="_blank"><span></span>双线<?php echo ($vo["sid"]); ?>服</a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div></div></div></div><style type="text/css">    * {margin:0;padding:0;border:0;outline:0;	font-size:12px;font-family:Arial, Helvetica, sans-serif;}
    .s-body .loginframe {position:absolute;padding-top:0;width:615px;height:104px;left:374px;top:153px;display:block;background:0 0;border:0;margin-left:10px;font-size:12px;font-family:Arial, Helvetica, sans-serif;}
    .s-body #login {width:530px;height:74px;padding:2px 5px 0 10px}
    .s-body #login li{width:260px;float:left;line-height:22px;height:22px;overflow:hidden;color:#5c5454;position:inherit;}
    .s-body #login #myname{color:##e75115;}
    .s-body #login #iph{color:#ba800f;}
    .s-body #login #time{color:##e75115;}
    .s-body #login #mpass{color:#ba800f;}
    .s-body #login #mcenter{color:#ba800f;margin-left:0px;}
    .s-body #login .lastgame{color:#f00;height:22px;overflow:hidden;}
    .s-body #login .loged-usercenter{text-align:left;}
  </style><script type="text/javascript" >var gid=<?php echo ($gameid); ?>;
</script><script src="/js/home/login.js"></script><script type="text/javascript" src="http://tmsh.752g.com/js/home/jquery.pages.js"></script><script type="text/javascript">        $(document).ready(function(){
          
          //手工输入进入游戏
          $("#btn_ss").mouseover(function(){
            $(this).attr('href', 'http://www.752g.com/login/'+gid+'/' + $("#val_ss").val());

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
    </script></body></html>