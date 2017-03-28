<?php if (!defined('THINK_PATH')) exit();?><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>修改密码</title><script type="text/javascript" src="http://gamebox.49you.com/js/jquery-1.7.2.js"></script><script src="http://gamebox.49you.com/js/json2.min.js"></script><script language="javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><style type="text/css">
*{ margin:0px; padding:0px; border:0; }
body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,form,input,textarea,p,span,img{padding:0;margin:0;}
body{font-size:12px;font-family:"微软雅黑"; background-color:#fafafa}
ul{list-style:none;}

a{text-decoration:none;}
a:hover{text-decoration:none;}
.dn{display:none;}
.db{display:block;}

.fl{float:left;}
.fr{float:right;}
.pr{position:relative;}
.pa{position:absolute;}
.tc{ text-align:center;}
.indent0{ text-indent:0em;}
.cl{clear:both;}
#reg_div{width:376px; height:240px; position:absolute;_position:absolute; left:50%; top:50%; margin-left:-188px; margin-top:-125px;margin-top:-133px; z-index:999;}
.regtophead_p{height:37px; line-height:37px;color:#fff; font-size:12px; font-family:"宋体"; position:relative; padding-left:15px;}
.reg_p{height:22px; margin-top:3px;}
.reg_input{width:263px; height:20px; line-height:20px; border:1px solid #0d9be9; margin-left:51px; color:#a9a9a9; padding:0 5px;}
a.regbtn_a{display:block; width:130px; height:33px; line-height:33px;background:url(http://gamebox.49you.com/images/regbtn.jpg) left top no-repeat; color:#fff; font-size:14px; font-family:"宋体"; text-align:center;position: relative;left:125px;}

.regtips_p{height:18px; line-height:18px; color:#999; font-size:12px; font-family:"宋体"; padding-left:51px; margin-top:3px;}
.regtips_p img{ vertical-align:middle;}
.regtips_p01{height:18px; line-height:18px; color:#f00; font-size:12px; font-family:"宋体"; font-weight:bold; padding-left:51px; margin-top:3px;}
.regtips_p01 img{ vertical-align:middle;}
</style></head><body><div id="reg_div"><!--
-133px\9
    <p class="regtophead_p">49you账号注册<a href="javascript:;" class="regclose_a"></a></p><p class="reg_p"><input type="text" id="user" class="reg_input" value="" /><span>请输入要注册的账号</span></p><p class="reg_p"><input id="psw" type="password" class="reg_input" value="" /><span>请再次输入密码</span></p><p class="reg_p"><input type="password" id="pid" class="reg_input" value="" /><span>请确认您输入的密码</span></p><p class="reg_p" style="padding-left:53px;"><input id="gets" name="gets" type="radio" value="1" style="vertical-align:middle;" /><label for="gets" style="font-size:13px;vertical-align:middle;margin-left: -8px;">我已阅读并同意《用户注册服务协议》</label>
--><p class="regtophead_p">49you账号注册<a href="javascript:;" class="regclose_a"></a></p><form action="" method=""><p class="reg_p"><input type="text" id="user" class="reg_input" value="请输入要注册的账号" /></p><p class="regtips_p">由6-16位字母和数字组成，不区分大小写!</p><p class="reg_p"><input type="password"  id="psw" class="reg_input" value="请输入密码" onfocus="this.value='';" /></p><p class="regtips_p">密码必须由6-20位字符组成!</p><p class="reg_p"><input type="password" class="reg_input"  id="pid" value="请确认您输入的密码" onfocus="this.value='';" /></p><p class="regtips_p"> 请再输入一次密码</p><p class="reg_p" style="padding-left:53px;"><input name="gets" checked="checked" type="radio" value="1" style="vertical-align:middle;" /><label for="gets" style="vertical-align:middle;">我已阅读并同意《用户注册服务协议》</label></p></p><p><a href="javascript:;" onclick="regStart();" class="regbtn_a">马上注册</a></p></div><script type="text/javascript">
var Regx = /^[A-Za-z0-9_]*$/;
var user = $('#user');
var psw = $('#psw');
var pid = $('#pid');
var img_off = '<img src="http://gamebox.49you.com/images/wrong.gif" width="12">';
var img_on = '<img src="http://gamebox.49you.com/images/hy_n6.jpg" width="12">';
$(function()
{
    user.focus(function()
    {
        $(this).parent().next('.regtips_p01').find('img').remove();
        if(user.val().length<6)
        {
            $(this).parent().next().attr('class','regtips_p');
            $(this).parent().next().html('由6-16位字母和数字组成，不区分大小写!');
        }
        if(user.val()=='请输入要注册的账号')
        {
            user.val('');
        }
    });
    user.blur(function()
    {
        $(this).parent().next('.regtips_p01').find('img').remove();
        if(user.val().length<6 || !Regx.test(user.val()))
        {
            $(this).parent().next().prepend(img_off);
            $(this).parent().next().attr('class','regtips_p01');
            return false;
        }
        else
        {
            var loginname = user.val();
            
            $.ajax({
                type: "get",
                async: true,
                url: api_hezi+"/checkUserName",
                data: {
                    'rnd': Math.random(),
                    'loginname': user.val()
                },
                dataType: "jsonp",
                jsonp: "callback",
                jsonpCallback: "apiCheckUserName",
                success: function(data) {
                    if (data.msg != 1) {
                        $('#user').parent().next().prepend(img_off);
                        $('#user').parent().next().attr('class','regtips_p01');
                        $('#user').parent().next().html('该帐号已被注册，请重新输入!');
                        return;
                    }
                    if (data.illegal) {
                        $('#user').parent().next().prepend(img_off);
                        $('#user').parent().next().attr('class','regtips_p01');
                        $('#user').parent().next().html('您输入的用户名不符合规定!');
                        return;
                    }
                    $('#user').parent().next().prepend(img_on);
                    $('#user').parent().next().css('color','green');
                    $('#user').parent().next().html(img_on+'此帐号可以注册!');
                },
                error: function() {}
            });
            
        }
    });
    psw.focus(function()
    {
        $(this).parent().next('.regtips_p01').find('img').remove();
        $(this).parent().next().css('color','');
        if(psw.val().length<6)
        {
            $(this).parent().next().attr('class','regtips_p01');
            $(this).parent().next().html('密码必须由6-20位字符组成!');
            return false;
        }
    });
    psw.blur(function()
    {
        $(this).parent().next('.regtips_p01').find('img').remove();
        if (!Regx.test(psw.val()))
        {
            $(this).parent().next().prepend(img_off);
            $(this).parent().next().attr('class','regtips_p01');
            return false;
        }    
        if(psw.val().length<6)
        {
            $(this).parent().next().prepend(img_off);
            $(this).parent().next().attr('class','regtips_p01');
        }
        else
        {
            $(this).parent().next().css('color','green');
            $(this).parent().next().html(img_on+'密码正确!');
            pid.blur();
        }
    });
    pid.focus(function()
    {
        $(this).parent().next('.regtips_p01').find('img').remove();
        if(pid.val().length<6)
        {
            $(this).parent().next().attr('class','regtips_p01');
            $(this).parent().next().html('请再输入一次密码');
        }
    });
    pid.blur(function()
    {   
        $(this).parent().next('.regtips_p01').find('img').remove();
        if(pid.val() != psw.val())
        {
            $(this).parent().next().prepend(img_off);
            $(this).parent().next().attr('class','regtips_p01');
            $(this).parent().next().html('两次密码不匹配');
            return false;
        }
        if(pid.val().length<6)
        {
            $(this).parent().next().prepend(img_off);
            $(this).parent().next().attr('class','regtips_p01');
            $(this).parent().next().html('请再输入一次密码');
            return false;
        }
        else
        {
            $(this).parent().next().prepend(img_on);
            $(this).parent().next().css('color','green');
            $(this).parent().next().html(img_on+'密码正确!');
        }
    });
});
function regStart() {
    if(user.val() == '请输入要注册的账号' || psw.val() == '' || pid.val() == '')
    {
        user.focus();
        return false;
    }
    if($('input:radio[name="gets"]:checked').val()!=1)
    {
        return false;
    }
    var get_user = user.val();
    var get_psw = psw.val();                
    $.getJSON(api_hezi+"/autoRegFromBox?rnd=" + Math.random() + "&ad=1&loginname="+get_user+"&psw="+get_psw+"&format=json&jsoncallback=?",
        function(data) {
            var str = "";
            str = JSON.stringify(data); 
            window.external.regStart(str);
        });
}
</script></body></html>