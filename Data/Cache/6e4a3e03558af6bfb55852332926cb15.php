<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><script type="text/javascript" src="/swf/images/jquery-1.8.1.min.js"></script><script type="text/javascript" src="/swf/images/jquery-1.8.0.min.js"></script><script type="text/javascript" src="/swf/images/jquery.min.js"></script><title><?php echo ($name); ?>---最为玩家着想的平台</title><style type="text/css">
* {margin:0;padding:0;}
body,html {margin:0;padding:0;background:#000;width:100%;height:100%;}
.main {position:bottom;width:100%;left:0px;margin:0px 0px -57px 0px;}
#swf1,#swf2{display:block;margin:0 auto;}
#background {display:none;width:100%;height:100%;position:absolute;top:0;left:0;background:#000;opacity:0.4;filter:alpha(opacity=40);}
#reg_login {display:none;width:423px;height:371px;background:#000 url(/swf/images/background.png) no-repeat;position:absolute;left:50%;top:300px;margin-left:-200px;margin-top:-200px;}
#regist_wrap {display:block;}
#login_wrap {display:none;}
.menu {width:423px;height:100px;}
.menu_regist {position:absolute;top:65px;width:101px;height:29px;background:url(/swf/images/bg_button.jpg) no-repeat;text-align:center;line-height:29px;font-size:14px;font-weight:bold;color:#ffffb8;cursor:pointer;overflow:hidden;}
.menu_login {position:absolute;top:65px;width:101px;height:29px;background:url(/swf/images/bg_button.jpg) no-repeat;text-align:center;line-height:29px;font-size:14px;font-weight:bold;color:#FF0000;cursor:pointer;overflow:hidden;}
.menu_regist:hover {background-position:0 -29px;}
.menu_login:hover {background-position:0 -29px;}
.menu_regist {left:88px;}
.menu_login {left:233px;}
.menu_login {}
.name{width:177px; height:20px;font-weight:bold;padding:4px 0 0 5px; border:#c1c1c1 0px solid; font-size:14px; background:url(/swf/images/tc_xx.png) 0px -50px repeat-x;}
.content {position:relative;width:423px;height:271px;color:#fff;font-size:16px;}
.content .tip {font-size:12px;margin-left:63px;height:25px;line-height:25px;}
.content .true {color:#DEDEAA;}
.content .false{color:#f00;}
.content{width:274px;margin:0 auto;}
.content input {}

.regist_submit,.login_submit {width:155px; height:43px; background:url(/swf/images/tc_xx.png) 0px 0px no-repeat; overflow:hidden; text-align:center; border:none; font-size:20px; font-family: "Microsoft Yahei", "黑体", sans-serif !important; display:block; cursor:pointer; color:#fff;margin-left: 63px;}
.regist_submit:hover,.login_submit:hover{background:url(/swf/images/tc_xx.png) -200px 0px no-repeat; font-weight:bold;}

.hot{ font-family:"黑体"; font-size:18px; color:#FF0000;}
.regist_wrap,.login_wrap {margin:55px auto 0 auto;overflow:hidden;}
.login_buttons {width: 287px;}
.login_submit {margin-right:18px;}
#tip5 {margin-bottom:18px;}
.jianyi{position: absolute; display: none; top: -45px; left: 60px; font-size:12px;}
.tshi{width:160px; height:52px; background:url(/swf/images/tc_xx.png) -200px -100px; padding:5px 10px 0px 10px; line-height:16px;color:#000;}
.tshi span{color:#ef3307;}
</style><script type="text/javascript">
function jian(e)
{
      click();
}

document.onmousedown=jian;
</script></head><body><div class="main"><object id="swf1" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="<?php echo ($tuix); ?>" height="<?php echo ($tuiy); ?>"><param name="movie" value="<?php echo ($swfurl); ?>" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><embed id="swf2" wmode="transparent" src="<?php echo ($swfurl); ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="<?php echo ($tuix); ?>" height="<?php echo ($tuiy); ?>"></embed></object></div><div class="wrap" id="background"></div><div class="wrap" id="reg_login"><div class="menu"><div class="menu_regist" onclick="document.getElementById('regist_wrap').style.display='block';document.getElementById('login_wrap').style.display='none';">新用户注册</div><div class="menu_login"  onclick="document.getElementById('login_wrap').style.display='block';document.getElementById('regist_wrap').style.display='none';">老用户登录</div></div><div class="content"><div class="regist_wrap" id="regist_wrap"><div id=tips class=jianyi><div class="tshi">建议用<span>qq+qq号码</span>注册，好记不重复，例如：<span>qq10000</span></div></div><input type="hidden" name="gid" value="<?php echo ($gid); ?>" /><input type="hidden" name="sid" value="<?php echo ($sid); ?>" /><input type="hidden" name="sc" value="0" /><input type="hidden" name="swfid" value="<?php echo ($swfid); ?>" /><input type="hidden" name="mid" value="<?php echo ($mid); ?>" /><input type="hidden" name="q" value="<?php echo ($q); ?>" /><label><span>用户名：</span><input class="name" type="text" onmousemove=showtips(true) onmouseout=showtips(false) onblur="getHits(this.value,'n_info');"  id="username" name="username"/></label><div id="u_msg" class="tip"></div><label><span>密　码：</span><input class="name" type="password" name="password" id="password"/></label><div id="p_msg" class="tip"></div><input type="submit" value="开始游戏" class="regist_submit" id="reg_form" /></div><div class="login_wrap" id="login_wrap"><label><span>用户名：</span><input class="name" type="text" name="lusername" id="lusername" value=""/></label><div id="ll_msg" class="tip"></div><label><span>密　码：</span><input class="name" type="password" name="lpassword" id="lpassword"  value=""/></label><div id="lm_msg" class="tip"></div><input type="submit" class="login_submit" id="btn-login" value="玩家登录" /></div></div></div><?php if(($mid) == "136"): ?><img src="http://rtb.behe.com/tracker/t.gif?si=1136"/><?php endif; ?><script type="text/javascript" language="javascript">
$(document).keydown(function(event) {
	if (event.keyCode == 13) {
		register();
	}
});

$("input[name='username']").blur(function(){checkUserId()});
$("input[name='password']").blur(function(){checkPassword()});
$("#reg_form").click(function(){register()});
function checkUserId(){ 
    var username = $("input[name='username']").val();
    if (username == ""){
        $("#u_msg").html("<font color=red>填写6-30位字符，英文、数字组合！</font>");
        return false;
    }else if(username.length<6){
        $("#u_msg").html("<font color=red>用户名长度不足6位！</font>");
        return false;
    }else if(username.length>30){
        $("#u_msg").html("<font color=red>用户名长度超过30位！</font>");
        return false;
    }else{
        var patrn=/^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){5,30}$/;
        if(!patrn.exec(username)){
            $("#u_msg").html("<font color=red>用户名只能以字母开头、可带数字！</font>");
            return false;
        }
    }
    var data = 'username='+$("input[name='username']").val();
    $.ajaxSetup({async:false});
        $("#u_msg").html('<font color=red>验证查询中，请稍候...</font>');
    $.post('/public/check_username',data,function(result){
        eval('res =' + result + ';');
     });
    if(res.state == 1){
        $("#u_msg").html("<font color=red>"+res.msg+"</font>");
        return true;
    }else{
        $("#u_msg").html("<font color=red>"+res.msg+"</font>");
        return false;
    }
}
function checkPassword(){
    var password = $("input[name='password']").val();
    if (password == ""){
        $("#p_msg").html("<font color=red>6-20个字符内，推荐使用英文加数字！</font>");
        return false;
    }else if(password.length<6){
        $("#p_msg").html("<font color=red>密码长度不足6位！</font>");
        return false;
    }else if(password.length>20){
        $("#p_msg").html("<font color=red>密码长度超过20位！</font>");
        return false;
    }else{
        $("#p_msg").html("<font color=red>密码可用！</font>");
    }
}

function register(){

	if(checkUserId() == false){
		$("input[name='username']").focus();
		return false;
	}
	if(checkPassword() == false){
		$("input[name='password']").focus();
		return false;
	}

	var data = {};
	data.username = $("input[name='username']").val();
	data.password = $("input[name='password']").val();
	data.gid = $("input[name='gid']").val();
	data.sid = $("input[name='sid']").val();
	data.mid = $("input[name='mid']").val();
	data.q = $("input[name='q']").val();
	data.aid = $("input[name='aid']").val();
	data.sc = $("input[name='sc']").val();
	data.swfid = $("input[name='swfid']").val();
	data.isadshow = 1;
		$.ajaxSetup({async:false});
	$.post('/public/register',data,function(result){
		eval('res =' + result + ';');
		if(res.state == 1){
			gourl();
		}else{
			alert(res.msg);
		}
	});
	return false;
}

function gourl(){
	window.location="<?php echo ($url); ?>";
}
//jianyi
function showtips(on){
    on = on || false;
    if(on){
	document.getElementById('tips').style.display="block";
    }else{
	document.getElementById('tips').style.display="none";
    }
}
$('#btn-login').click(function(){

	var logUser = $('#lusername'), logPsw = $('#lpassword'), remember = $('#liskeepalive');
	   
	if (logUser.val() == '') 
	{
        $("#ll_msg").html("<font color=red>用户名不能为空！</font>");
        $("#lm_msg").html("");
		return false;
    }

	if (logPsw.val() == '')
	{
        $("#lm_msg").html("<font color=red>密码不能为空！</font>");
		 $("#ll_msg").html("");
		return false;
    }

	$.getJSON("/login/login_json_sign?verifyCode=b2d1de878c460b6390c48ca48ae2692d&username="+logUser.val()+"&password="+logPsw.val()+"&login_save="+remember.val()+"&jsoncallback=?",function(data) {
		if(data.err == 0){
			gourl();
		}else if(data.err == 1){
		$("#lm_msg").html("<font color=red>密码错误！</font>");
		$("#ll_msg").html("");
		return false;
		}else if(data.err == 2){
		$("#ll_msg").html("<font color=red>无此用户名！</font>");
		$("#lm_msg").html("");
		return false;
		}else if(data.err == -2){
		$("#lm_msg").html("<font color=red>登录验证地址已过期，请重新！</font>");
		return false;
		}
	})
	return false;
})

var DOC = document;
var timeoutID, c = 0,
flashObj = DOC.getElementById('swf1'),
flashEmbed = DOC.getElementById('swf2');
function over() {
	c |= 1;
};
function out() {
	c = 0;
};
function down() {
	c |= 2;
};
function up() {
	c |= 4;
	if (c === 7) {
		click();
		c |= 8;
		if (!timeoutID) {
			timeoutID = setTimeout(function() {
				c ^= 0; //异或，a ^ b， ab不同则返回1
				timeoutID = undefined;
			},
			100);
		}
	}
};
function click() {
	DOC.getElementById("background").style.display="block";
	DOC.getElementById("reg_login").style.display="block";
};
if (flashObj) {
	flashObj.onmouseover = over;
	flashObj.onmouseout = out;
	flashObj.onmousedown = down;
	flashObj.onmouseup = up;
};
if (flashEmbed) {
	flashEmbed.onmouseover = over;
	flashEmbed.onmouseout = out;
	flashEmbed.onmousedown = down;
	flashEmbed.onmouseup = up;
}

$.extend({
  getUrlVars: function(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  },

  getUrlVar: function(name){
    return $.getUrlVars()[name];
  }
});

$(document).ready(function(){
  var sid = $.getUrlVar('sid');
  $("#canal_id").attr("value",sid);
});
</script><div  style="display:none;"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1256269989'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1256269989%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script></div></body></html>