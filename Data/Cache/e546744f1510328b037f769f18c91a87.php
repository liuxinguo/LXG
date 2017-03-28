<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html lang="zh"><head><meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><meta name="keywords" content=""/><meta name="description" content="752G剑侠伏魔录开服表大全为您提供最全最新的剑侠伏魔录开服表，剑侠伏魔录新服，剑侠伏魔录新区，让您随时了解剑侠伏魔录最新开服信息。"/><title>剑侠伏魔录新服_剑侠伏魔录最新服|新区_752G剑侠伏魔录开服表-752G剑侠伏魔录官网</title><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/server.css"/><link href="/images/home/<?php echo ($gamezhuti); ?>/css/global_style.css" rel="stylesheet" type="text/css"/><link rel="stylesheet" type="text/css" href="/images/home/<?php echo ($gamezhuti); ?>/css/glpbal.css"/><script src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery.min.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script></head><body><div class="s-body"><div class="s-wrap"><div class="s-header"><a class="s-logo" href="/" target="_blank" title="剑侠伏魔录">剑侠伏魔录</a><!-- nav --><div class="s-nav"><a id="s-nav1" href="/" target="_blank" title="进入官网">进入官网</a><a id="s-nav2" href="HTTP://bbs.<?php echo ($ai["url"]); ?>" target="_blank" title="游戏论坛" style=" margin-left:9px;">游戏论坛</a><a id="s-nav3" href="HTTP://pay.<?php echo ($ai["url"]); ?>" target="_blank" title="用户充值" style=" margin-left:8px;">用户充值</a><a id="s-nav4" href="javascript:;" onclick="try{window.external.addFavorite(document.location.href,document.title);}catch(e){try{window.sidebar.addPanel(document.location.href,document.title, '');}catch(e){alert('加入收藏失败，请使用Ctrl+D进行添加,或手动在浏览器里进行设置.');}}" class="bookmark" style=" margin-left:9px;" title="收藏本页">收藏本页</a></div><div id="loginframe" class="s-loginframe"><!--登录前start--><ul id="log" class="log" style="display:none;"><li class="s-user"><input placeholder="帐号" type="text" name="username" id="username" class="s-text"></li><li class="s-psw"><input type="password" name="userpass" id="userpass" placeholder="密码" class="s-text"></li><li class="s-log-btn"><input class="in02" type="hidden" name="rls"  checked="checked" id="rls" value="sl" /><a rel="nofollow" href="javascript:;" onclick="login();return false;" id="log-btn" class="block-a" title="登录"></a></li><li class="s-remember"><input type="checkbox" checked="checked" id="remember">&nbsp;
                        <label for="remember">记住帐号</label></li><li class="s-psw-btn"><a rel="nofollow" href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" target="_blank" title="忘记密码">忘记密码</a> | 
                        <a rel="nofollow" id="btn-reg" href="http://reg.<?php echo ($ai["url"]); ?>/" target="_blank" title="马上注册">马上注册</a></li></ul><!--登录后start--><div class="s-loged" id="loginframea2"><div class="log2"><p>欢迎你：<span id="uname">295</span><br>                      最新服务器：
                      <a id="last_game_info"></a><br></p><ul class="log2_ul"><li style="padding:0 5px;"><a href="http://user.<?php echo ($ai["url"]); ?>/" target="_blank">用户中心</a></li><li style="margin-right:5;padding:0 5px;"><a href="http://user.<?php echo ($ai["url"]); ?>//trans_record" target="_blank">充值明细</a></li><li style="padding:0 5px;"><a href="javascript:void(0);" onclick="exit();return false;">安全退出</a></li></ul></div></div></div></div><div class="s-content"><div class="s-server-list rec-server"><ul class="cls" id="rec-server"><?php if(is_array($server1)): $i = 0; $__LIST__ = array_slice($server1,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($v['gid']); ?>&sid=<?php echo ($v['sid']); ?>">双线<?php echo ($v["sid"]); ?>服&nbsp;&nbsp;<strong class="server-tip-2">火爆开启</strong></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><div id="quick-ingame" class="quick-ingame"></div><div class="s-server-list all"><div id="sp" class="sp" data-kid="CE5A9B0A-21C8-4427-935B-39417A6F7D59"><ul id="server_ban" class="sp-pager f-cf all_server_title clearfix"></ul><div class="sp-panel-wrap all_server_list" id="server_all"><ul class="clearfix server_icon" ><?php if(is_array($server1)): $i = 0; $__LIST__ = $server1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="unblok fl"><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($vo['gid']); ?>&sid=<?php echo ($vo['sid']); ?>" t="/server_id=<?php echo ($vo['sid']); ?>" target="_blank"><span></span><?php echo ($vo["sid"]); ?>服-<?php echo ($vo["servername"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div></div></div></div></body><script src="js/jquery.min.js"></script><script type="text/javascript" src="http://tmsh.752g.com/js/home/jquery.pages.js"></script><script type="text/javascript">        $(document).ready(function(){
          
            //手工输入进入游戏
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

        // 注销
        $("#logout").click(function(){
          $(".log").show();
          $(".loged").hide();
        })
var gid=<?php echo ($gameid); ?>;
</script><script src="/js/home/login.js"></script></html>