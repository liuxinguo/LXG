<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html style=";color:blue;overflow:hidden;"><head><meta http-equiv="content-type" content="text/html; charset=UTF-8"><title>三国令</title><link href="http://static.menle.com/static/micro_client/sgl/css/style.css" rel="stylesheet"><script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script><script type="text/javascript">  window.onload=function onLoginLoaded() {
    var my_pt_usname = getcookie("Leee_pt_usname");
    if(my_pt_usname){ 
	    document.getElementById("username").value=my_pt_usname;
        document.getElementById('rls').checked=true;
	   
                    }
  
    }
     
 
function getcookie(objname){

  var arrstr = document.cookie.split("; ");

  for(var i = 0;i < arrstr.length;i ++){

    var temp = arrstr[i].split("=");

    if(temp[0] == objname) return unescape(temp[1]);

  }

}
         function tologin(){
		
        var username = $("#username").val();
        var password = $("#password").val();
        var remember_me = $("#remember_me").val();
		
	
		
       if (password == "请输入您的密码") {
            password='';
        }
		
        if(!/^[A-Za-z0-9_@\.]{4,20}$/.test(username)){
		    alert('请输入正确的用户名！');
		
         
            return;
        }
        if(!/^.{6,20}$/.test(password)){
	        alert('请输入正确的密码！');

            return;
        }
	
        if(remember_me!="true"){
          
		   var date=new Date();
		    date.setTime(date.getTime()+10000);
            document.cookie="Leee_pt_usname="+username+"; expire="+date.toGMTString()+"; domain=.752g.com; path=/";
        }
		
        $.post("/public/checklogin",{username:username,password:password},function(data){

		 eval('res =' + data + ';');
		 
			if(res.state == '1'){

			// setTimeout("location.reload()", 1000);
             location.href = 'server';
            }else{
			 
              alert('用户名或密码错误')
            }
            return false;
        });
    }
</script></head><body><div class="container"><div class="sgl-top"><ul class="sgl-title"><li><a href="http://sgl.<?php echo ($ai["url"]); ?>/" target="_blank"></a></li><li><a href="http://pay.<?php echo ($ai["url"]); ?>/" target="_blank"></a></li><li><a href="http://bbs.<?php echo ($ai["url"]); ?>/" target="_blank"></a></li><li><a href="http://GM.<?php echo ($ai["url"]); ?>/" target="_blank"></a></li></ul><div class="close-box"><a onclick="location.href='app://minimize|';return false;" href="javascript:void(0);"></a><a onclick="location.href ='app://exitgame|';return false;" href="javascript:void(0);"></a></div></div><div class="sgl-main clearfix"><!--登录界面--><div class="sgl-log" style="display:block;"><!--sgl-left star--><div class="sgl-left"><div class="banner"><div id="slideBox" class=""><div class="bd"><ul><li><a target="_blank" href="#"><img src="http://static.menle.com/static/micro_client/sgl/images/sgl-banner.jpg" width="100%"></a></li></ul></div><div class="hd" style="display: none;"><ul><li></li><!-- <li></li>  --></ul></div></div></div></div><!--sgl-left end--><div class="sgl-right"><div class="login-box"><!--未登录--><div class="no-log"><div style="height:40px;padding-top: 22px;"><span class="sp-bj"><label>账号 :</label><input type="text" name="username" id="username" value="" style="width:160px;"><input name="keep_live" id="keeplive" type="checkbox" checked="true" style="margin-bottom: 4px;left:210px;"></span></div><div style="height:40px;margin-top: 2px;"><span class="sp-bj"><label>密码 :</label><input  name="password" type="password" id="password" value="" style="width:160px;"></span></div><div class="clearfix"><a target="_blank" href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" style="margin-left: 20px;float:left">忘记密码？</a><span class="no-number">还没有账号？<a target="_blank" href="http://reg.<?php echo ($ai["url"]); ?>/">立即注册</a></span></div><div style="margin-top: 10px;position: relative;width: 270px;height: 86px;" class="clearfix"><input type="submit" onclick="tologin();return false;" class="start-game" style="top:0px;left:50%;" value=""></div></div></div><!--login-box end--><div class="infor clearfix"><div class="tit"><span></span><a href="http://sgl.<?php echo ($ai["url"]); ?>//news" target="_blank">查看更多</a></div><ul class="infor-box"><?php if(is_array($news)): $i = 0; $__LIST__ = array_slice($news,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="http://sgl.<?php echo ($ai["url"]); ?>/<?php echo U('/article', array('gid'=>$gameid,'tid'=>$v[id]));?>" target="_blank"><?php echo ($v["title"]); ?></a><span><?php echo (date('m-d',$v["time"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div><!--sgl-right end--></div><!--登录界面 end--></div><!--sgl-main end--></div></body></html>