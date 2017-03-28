<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>大战神登录器</title><link type="text/css" rel="stylesheet" href="http://www.game2.cn/special/dzs/client/css/global.css" /><link type="text/css" rel="stylesheet" href="http://www.game2.cn/special/dzs/client/css/home.css?v2" /><script type="text/javascript" src="http://www.game2.cn/special/common/js/md5.js"></script><script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script><script type="text/javascript" src="http://www.game2.cn/special/common/js/J.Devel.js"></script><script type="text/javascript" src="http://www.game2.cn/special/common/js/J.Client.js?v18"></script><script type="text/javascript">
  window.onload=function onLoginLoaded() {
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
	
	
	    var $pWarn = $('#pWarn');		
        var username = $("#username").val();
        var password = $("#password").val();
        var remember_me = $("#remember_me").val();
		
	
		
       if (password == "请输入您的密码") {
            password='';
        }
		
        if(!/^[A-Za-z0-9_@\.]{4,20}$/.test(username)){
		    $pWarn.html('请输入正确的用户名！');
		
         
            return;
        }
        if(!/^.{6,20}$/.test(password)){
	        $pWarn.html('请输入正确的密码！');

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
			 
              $pWarn.html('用户名或密码错误')
            }
            return false;
        });
    }
</script><!--[if IE 6]><script type="text/javascript" src="/special/common/js/fixPNG.js"></script><script>
    DD_belatedPNG.fix('*');
</script><![endif]--><style type="text/css">
html,body{overflow:hidden;background-color:#000000;border:none;}
</style></head><body oncontextmenu="return false;"><div class="wrap commonWrap"><div class="newsDiv" id="tabDivNews"><div class="slideDiv"><div class="imgShow"><div class="imgBox"><a href="javascript:void(0)"><img src="http://www.game2.cn/special/dzs/client/images/slide/img01.jpg" /></a></div></div></div><div class="newsBox"><h3><span>新闻公告</span><a class="more" href="#" target="_blank">MORE</a></h3><ul class="newsList"><?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('article', array('gid'=>$gameid,'tid'=>$v[id]));?>" target="_blank"><?php echo ($v["title"]); ?></a><span><?php echo (date('m-d',$v["time"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div><div class="uc" id="tabDivLog"><form id="login_box"><input type="hidden" name="op" value="login" /><h3><span>用户登录</span><a href="http://reg.<?php echo ($ai["url"]); ?>/" class="tabDivItem" target="_blank"  >还没账号？快速注册</a></h3><div class="login"><p class="pWarn" id="pWarn" style="display:none0;"></p><p class="p1"><label class="user">账&nbsp;号：</label><input class="i ii" id="username" name="username" onblur="J.Client.Ulib.checkFailLogin(this.value);" type="text" data-placeholder="请输入您的账号" /></p><p class="p2"><label class="upwd">密&nbsp;码：</label><input class="i" name="password" id="password" type="password"  data-placeholder="请输入您的密码" /></p><p class="validate"><label>验证码：</label><input class="i" name="vcode" id="vcode" type="text" value="" data-placeholder="无需输入" /></p><p class="chk"><span><input type="checkbox" value="1" name="keep_live" id="rls" class="fxk on">记住帐号</span><a href="http://reg.<?php echo ($ai["url"]); ?>/pwd_find.html" class="forget" target="_blank"><span>找回密码</span></a></p></div><div class="intoBtn"><p class="btn"><button class="into" type="submit" onclick="tologin();return false;">进入游戏</button></p></div></form></div></div></body></html>