<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"><HTML><HEAD><!--
--><title><?php echo ($data["sitename"]); ?>-csp系统后台管理 </title><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><link rel="stylesheet" href="[!CSS]logincps.css" type="text/css"><script src="[!JS]jquery-1.4.2.js"></script><script src="[!JS]jquery.artDialog.js?skin=idialog" type="text/javascript"></script><script src="[!JS]dialog/plugins/iframeTools.js" type="text/javascript"></script><script>$(document).ready(function(){
	 $('#form1').submit(function(){
		 var $username = $('#username').val();
		 var $password = $('#password').val();
		 if($username==""||$password==""){
			 $.dialog.tips('用户名或者密码不能为空,请检查输入!');
			 return false;
			 }
	 })
	 
})
</script></HEAD><BODY><div class="LoginCont"><table width="100%" border="0" cellspacing="0" cellpadding="0"><form action="/cps/checklogin" method="post" id="login_form"><tr><td class="left"><div><span class="word">帐号：</span><span><input type="text" name="username" class="input" id="username"></span></div><div><span class="word">密码：</span><span><input type="password" name="password" class="input" id="password"></span></div><!----></td><td class="right"><input class="submit" type="image" src="[!IMG]Cps/login.gif"></td></tr></form></table></div></BODY></HTML><!---->