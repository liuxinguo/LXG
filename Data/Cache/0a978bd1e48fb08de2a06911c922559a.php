<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML><html><head><meta charset="UTF-8"><title>唐门六道_游戏盒子</title></head><link rel="stylesheet" href="/images/dlq/tmld/css/login.css"><script src="/images/dlq/tmld/js/5552b17bc0e50a317f8b49f3.js" type="text/javascript"></script><script type="text/javascript">    function toggle_remember_account()
    {
        if($("#remember_account_checkbox").hasClass("on")){
            $("#remember_me").val("");
            $("#remember_account_checkbox").removeClass("on");
        }else{
            //alert("温馨提示，选择此操作有可能会导致帐号安全问题，请谨慎使用！")
            $("#remember_me").val("true");
            $("#remember_account_checkbox").addClass("on");
        }
    }
    $(function(){
        var cookie_username='';
        if(cookie_username){
            document.getElementById('username').value=cookie_username;
            $("#remember_me").val("true");
            $("#remember_account_checkbox").addClass("on");
        }

        $("input").keypress(function(e){
            if(e.keyCode == 13){
                tologin();
            }
        });
    });
    function focus_bg(inp_name){
        inp_name.className='input-on';
        if (inp_name.value == "请输入用户名") {
            inp_name.value='';
        }
    }
    function pwd_focus_bg(inp_name){
        inp_name.style.display='none';
        document.getElementById('password').style.display='block';
        document.getElementById('password').focus();
    }
    function tologin(){
        var username = $("#username").val();
        var password = $("#password").val();
        var remember_me = $("#remember_me").val();

        if(!/^[A-Za-z0-9_@\.]{4,20}$/.test(username)){
            alert("请输入正确的用户名！用户名为4到20位的英文或数字！");
            return;
        }
        if(!/^.{6,20}$/.test(password)){
            alert("请输入正确的密码！密码长度为6到20！");
            return;
        }
        if(remember_me!="true"){
            var date=new Date();
            date.setTime(date.getTime()-10000);
            document.cookie="bajieyx_account=; expire="+date.toGMTString()+"; domain=bajieyx.com; path=/";
        }
        $.post("/public/checklogin",{username:username,password:password},function(data){

		 eval('res =' + data + ';');
		 
			if(res.state == '1'){

			// setTimeout("location.reload()", 1000);
             location.href = 'server';
            }else{
                alert('用户名或密码错误！');
            }
            return false;
        });
    }
</script><body><div id="content"><div class="cont"><div class="cont_a"><div class="cont_a_mg"><img src="/images/dlq/tmld/img/innerAD.jpg" alt=""></div><div class="cont_a_ul"><ul><li>最新</li></ul><ol><?php if(is_array($news)): $i = 0; $__LIST__ = array_slice($news,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('article', array('gid'=>$gameid,'tid'=>$v[id]));?>" target="_blank"><?php echo ($v["title"]); ?></a><span><?php echo (date('m-d',$v["time"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?></ol></div></div><div class="cont-b"><form action=""><div><label for="username">登录</label><input type="text" id="username" name="username" placeholder="请输入用户名"></div><div ><label for="password">密码</label><input type="text" name="password" id="password"  placeholder="请输入用户名"></div><div class="jz-word"><input type="checkbox" name="keep_live" value="1" class="check_L" title="请勿在公共电脑勾选此项"><label for="pass">记住密码</label></div></form><a href="javascript:tologin();" class="start"><img src="/images/dlq/tmld/img/5747cb4dc0e50aaf9e8b4d09.png" alt=""></a></div></div></div></body></html>