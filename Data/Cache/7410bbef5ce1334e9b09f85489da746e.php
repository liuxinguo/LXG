<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html><head><meta charset="UTF-8"><title><?php echo ($game["gamename"]); ?>开服列表 - <?php echo ($ai["title"]); ?></title><link rel="stylesheet" href="/images/home/<?php echo ($gamezhuti); ?>/css/official.css"><link rel="stylesheet" href="/images/home/<?php echo ($gamezhuti); ?>/css/iconfont.css"><script src="/images/home/<?php echo ($gamezhuti); ?>/js/jquery.min.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/game/top?id=<?php echo ($gameid); ?>"></script></head><body class="c1" id="servListBody"><div class="go-serv"><a href="/" class="logo" target="_blank"></a><div class="main"><div class="toplnk" pbflag="toplink"><a target="_blank" pbtag="home" class="sbtn fl s1" href="/">进入官网</a><a target="_blank" pbtag="down" class="sbtn fl s2" href="http://www.<?php echo ($ai["url"]); ?>/dlq/setup.exe">微端下载</a><a target="_blank" pbtag="pay" class="sbtn fl s3" href="HTTP://pay.<?php echo ($ai["url"]); ?>">用户充值</a><a pbtag="fav" class="sbtn fl s4 _addfav" href="javascript:;" onclick="try{window.external.addFavorite(document.location.href,document.title);}catch(e){try{window.sidebar.addPanel(document.location.href,document.title, '');}catch(e){alert('加入收藏失败，请使用Ctrl+D进行添加,或手动在浏览器里进行设置.');}}">收藏本页</a></div><div class="login"><!-- 登录前 --><div class="serv-login" pbflag="servLogin" id="login"><div class="uname b3"><input class="ipt c1" placeholder="请输入用户名" type="text" name="username" id="username" ></div><div class="upwd b3"><input class="ipt c1" placeholder="请输入密码" type="password" name="userpass" id="userpass"></div><a href="#" onclick="login();return false;" pbtag="loginbtn" class="sbtn"></a><div class="func"><input class="in02" type="hidden" name="rls"  checked="checked" id="rls" value="sl" /><input id="remember" type="checkbox" checked="checked"><label for="remember">自动登录</label><em class="sep">|</em><a target="_blank" href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" pbtag="findpwd" class="findpwd c1">忘记密码？</a></div><i id="loginTip" class="tip c3"></i></div><!-- 登录后 --><div class="serv-info" pbflag="servInfo" id="se_list" style="display:none;"><div class="welcome"><a href="javascript:void(0);" onclick="exit();return false;" class="c1 fr _logout" pbtag="logout">退出</a><a href="http://user.<?php echo ($ai["url"]); ?>/" pbtag="ucenter" target="_blank" class="c2 fr">用户中心</a>                    欢迎您，
                    <span id="uname" class="nick c3">--</span></div><div class="enter"><h3 class="fl">最近登陆过的服务器：</h3><ul id="last_game_info" class="fl serv-list"></ul></div></div></div><div class="s-content"><p class="s-name">                推荐服务器
            </p><div class="s-server-list rec-server f-cf"><ul class="f-cf" id="history"><?php if(is_array($server1)): $i = 0; $__LIST__ = array_slice($server1,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($v['gid']); ?>&sid=<?php echo ($v['sid']); ?>">双线<?php echo ($v["sid"]); ?>服</a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div><ul id="server_ban" class="sp-pager f-cf all_server_title clearfix"></ul><div class="" id="all-xz-server"><div id="nameList" class="f-cf" style="display: none;"><a data-name="654" data-type="1" data-nametype="<?php echo ($nametype); ?>">双线</a></div><div class=" all"><div id="sp" class="sp" data-kid="CE5A9B0A-21C8-4427-935B-39417A6F7D59"><div class="sp-panel-wrap all_server_list s-server-list" id="server_all"><ul class="clearfix server_icon" ><?php if(is_array($server1)): $i = 0; $__LIST__ = $server1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="unblok fl"><a href="http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid=<?php echo ($vo['gid']); ?>&sid=<?php echo ($vo['sid']); ?>" t="/server_id=<?php echo ($vo['sid']); ?>" target="_blank"><span></span><?php echo ($vo["sid"]); ?>服-<?php echo ($vo["servername"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div></div></div></div></div></div></body><script type="text/javascript" src="http://tmsh.752g.com/js/home/jquery.pages.js"></script><script type="text/javascript">        $(document).ready(function(){
          
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

        $("#server_ban li").on('mouseover',function(){
          $(this).addClass('server_ban').siblings().removeClass("server_ban");
        })
var gid=<?php echo ($gameid); ?>;
</script><script src="/js/home/login.js"></script></html>