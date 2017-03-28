////加载登录消息框js
var head = document.getElementsByTagName("head")[0],
    script  = document.createElement("script");
script.type = "text/javascript";
script.src = 'http://image.91wan.com/jsCommon/login_tips.js';
head.insertBefore(script,head.firstChild);//head.appendChild(css);//后插可能效率差点
////

//检查登录状态
function chkAccStatus(tag,num){
    var login_id_tem=getCookie("login_name");
    if(login_id_tem){
        var login_name=unescape(login_id_tem);
        var qq_nick=unescape(getCookie('qq_nick'));
        if(qq_nick && (login_name.slice(-3)=='@qq')){
            gID('username').innerHTML='<img src="http://image.91wan.com/imgCommon/qqico.gif" width="16" height="16" />'+qq_nick+' - '+login_name;
            $("#username").attr('title',qq_nick+' - '+login_name);
        }else{
            gID('username').innerHTML='尊敬的：'+login_name;
            $("#username").attr('title',login_name);
        }
        showDiv(tag,num,1);
        setCookie('last_name',escape(login_name),86400*30);
    } else {
        if(getCookie('last_name')){
            gID('login_user').value=unescape(getCookie('last_name'));
        }
        showDiv(tag,num,0);
    }
}

//登录表单提交
function checkLogin(theform){

    if(document.getElementById('gourl')){
        var gourl = document.getElementById('gourl').value;
    }else{
        var gourl=document.location.href;
    }

    var tmparr=gourl.split('/');

    if(tmparr[4]=='login.php'){
        gourl=document.referrer;
    }

    if(gourl=='http://www.91wan.com/user/login.php' || gourl==''){
        gourl='http://www.91wan.com/';
    }

    var login_user=gID("login_user");
    var login_pass=gID("login_pass");

    if(login_user.value == ''){
        login_tips.show_msg('帐号不能为空！');
        login_user.focus();
        return false;
    }
    if(login_pass.value == ''){
        login_tips.show_msg('密码不能为空！');
        if(document.getElementById('login_pwdTxt')!=null){
            document.getElementById('login_pwdTxt').focus();
        }else{
            login_pass.focus();
        }
        return false;
    }

    var timeout = 7000; //登陆超时设置
    var params = 'act=login&login_user='+encodeURIComponent(login_user.value)+'&login_pwd='+encodeURIComponent(login_pass.value);
    var requestUrl = 'http://www.91wan.com/api/check_login_user.php?';
    subLogin(gourl,requestUrl + params);
}

function subLogin(gourl,url){
    $.getJSON(url+ '&callback=?',function(data){
        switch(data.code){
            case '01':
                login_tips.show_msg(data.msg);
                break;
            case '02':
                login_tips.show_verify();
                break;
            case '10':
                if(data.pwdStrong==1 && !getCookie("pwdStrong")){
                    setCookie('pwdStrong',1,86400*3);
                    gourl = 'http://my.91wan.com/index.php?act=passwd&pwdStrong=1';
                }
                if(self != top){
                    window.parent.location= gourl;
                }else{
                    window.location.href= gourl;
                }
                break;
        }
    });
}

//退出登录
function logout(){
    var url = 'http://www.91wan.com/api/check_login_user.php?act=logout';
    $.getJSON(url+ '&callback=?',function(result){
        if(result.code=='10'){
            if(self != top){
                window.parent.location= document.location.href;
            }else{
                location.href=document.location.href;
            }
        }
    });
}

if(getCookie("flb")!=''){
    document.title=getCookie("flb");
}

/***** 公用注册和登录 *****
 * 参数：
 * type:      注册/登陆标识,默认login. 可填reg/login
 * game_id:   游戏ID,可为空.
 * server_id: 服务器ID,可为空. 登陆时:同时传game_id,server_id将直接进入相应的服，go_url此时失效
 * go_url:    用户注册完后或登陆后需要跳转的页面,可为空.若为空,则返回当前页面
 *****/
function reg_login_form(type,game_id,server_id,go_url){
    if(!type) type='login';
    if(!game_id) game_id=0;
    if(!server_id) server_id=0;
    if(!go_url) go_url=window.location.href; //动作完成后跳转的地址，登陆时:同时传game_id,server_id将优先
    
    if(type=='reg'){
        var objW = 710;//注册框的宽度
        var objH = 450;//注册框的高度
        var ifr_url = 'http://www.91wan.com/user/game_login_reg.php?act=reg&game_id='+game_id+'&server_id='+server_id+'&go_url='+encodeURIComponent(go_url);
    }else{
        var objW = 476;//登陆框的宽度
        var objH = 272;//登陆框的高度
        var ifr_url = 'http://www.91wan.com/user/game_login_reg.php?act=login&game_id='+game_id+'&server_id='+server_id+'&go_url='+encodeURIComponent(go_url);
    }
    
    var st = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop; //滚动条距顶部的距离
    var sl = document.documentElement.scrollLeft;//滚动条距左边的距离
    var ch = document.documentElement.clientHeight;//屏幕的高度
    var cw = document.documentElement.clientWidth;//屏幕的宽度
    var aw = document.body.clientWidth ;//当前页面的宽度
    var ah = document.body.clientHeight;//当前页面的高度

    var objT = Number(st) + (Number(ch) - Number(objH)) / 2;
    var objL = Number(sl) + (Number(cw) - Number(objW)) / 2;
    
    $('body').append('<div id="reg_login_frame_bg" style="position: absolute; width: '+aw+'px; height: '+ah+'px;  top: 0px; left: 0px; right: 0px; bottom: 0px; z-index: 1001; background-color: black; filter:alpha(opacity=50);opacity: 0.5;-moz-opacity:0.5;"></div>');
    //IE6要加上setTimeout验证码才显示
    setTimeout(function(){$('body').append('<iframe id="reg_login_frame" src="'+ifr_url+'" scrolling="no" frameBorder="0" style="left: '+objL+'px; top: '+objT+'px; width: '+objW+'px; height: '+objH+'px; display: block; position: absolute;  z-index: 9108;">');},1);
    $('body').append('<a style="top:'+(objT+13)+'px;left:'+(objL+objW-39)+'px; height: 25px; width: 25px; cursor: pointer; display: block; position: absolute; z-index: 91000;" id="reg_login_frame_close" onclick="reg_login_close()"></a>');
}
function reg_login_close(){
    $('#reg_login_frame,#reg_login_frame_close,#reg_login_frame_bg').remove();
}
/*** 公用注册和登录 end ***/