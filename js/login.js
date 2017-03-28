//login
function urldecode(str) {
  return decodeURIComponent((str + '')
    .replace(/%(?![\da-f]{2})/gi, function () {
      // PHP tolerates poorly formed escape sequences
      return '%25';
    })
    .replace(/\+/g, '%20'));
}

$(document).ready(function() {
    var myUserName=getCookie('Leee_user_name');
    if(myUserName){
        if(/bbs.vnwan.com/i.test($_GET['returl'])) {
            setCookie('web_member_login_status','',"s0",'/','.vnwan.com');
        }
        var bh = $('#userinfo_d').html();
        $('#userinfo_d').html('<img style="margin: 60px auto 0px 100px;" src="'+site_url+'/images/loading.gif">');
        $.getJSON(api_url+"/checkLogin?rnd=" + Math.random() + "&format=json&jsoncallback=?",
            function(data) {
                if (data.status == 1) {
                    var loginCenter = $("#loginCenter").val();
                    if (loginCenter == 1 && loginCenter != undefined) {
                        window.location.href = user_url;
                    } else {
                        if ($_GET['returl'] != '' && $_GET['returl'] != undefined) {
                            var returl = '?returl=' + $_GET['returl'];
                        } else {
                            var returl = '';
                        }
                        //$('#login_name').html(data['user']['username']);
                        $('#login_before').hide();
                        $('#login_after').html(data.header);
                        $('#login_after').show();
                        var html = '';
                        html += ' <div class="login_img"><a href="'+user_url+'"><img width="73" height="75" src="' + img_url+data['user']['av_image'] + '" onerror="'+img_url+'/user_error.jpg" /></a><a href="#" class="sign_now" style="background:#349acb;">点击签到</a></div>'
                        html += '<div class="login_r"><p class="name">' + data['user']['username'] + '</p><p><i>' + data['user']['rank'] + '</i></p><p>平台币：<span class="f_c">' + data['user']['money'] + '</span></p>\n\
                       <p>积分：<span class="f_c">' + data['user']['points'] + '</span></p></div>';
                        html += '<div class="login_r1"><p><a href="' + api_url + '/loginout' + returl + '" class="exit">[退出]</a></p><p></p></div>'
                        html += '<dl class="played"><dt>'+data.t+'</dt>'
                        if (data['mygame'].length > 0) {
                            for (var i = 0; i < data['mygame'].length; i++) {
                                if(i == 2) break;
                                html += '<dd><img src="' + img_url + data['mygame'][i]['pic'] + '" width="20" height="20"/>' + data['mygame'][i]['GameName'] + '&nbsp;&nbsp;<a href="' + gameplay_url + '/game_add.html?gid='+data['mygame'][i]['GameID']+'&sid='+data['mygame'][i]['ServerID']+'" target="_blank" style="color:#ff6c00;">' + data['mygame'][i]['ServerNum'] + '服</a>&nbsp;&nbsp;' + data['mygame'][i]['LoginTime'] + '</dd>';
                            }
                        }
                        html += '</dl>';
                        $('#userinfo_d').remove();
                        $('#userinfo').show();
                        $('#userinfo').html(html);
                        $('#we_login_t').attr('class','login_t1');
                    }
                    if(data.mobile_isvalid == 0) {
                        $('#we-post-msg').show();
                    }
                }else{
                    $('#userinfo_d').html(bh);
                    var my_pt_usname = getCookie('Leee_pt_usname');
                    if(my_pt_usname){
                        $("#usname").val(my_pt_usname);
                    }
                }
            });
    }else{
        var my_pt_usname = getCookie('Leee_pt_usname');
        if(my_pt_usname){
            $("#usname").val(my_pt_usname);
        }
    }
});

function doLogin(u, p, t) {
    var returl = '';
    if($_GET['returl']) {
        returl = urldecode($_GET['returl']);
    }
    var usname = u ? encodeURIComponent($('#'+u).val()) : encodeURIComponent($("#usname").val());
    var uspsd = p ? encodeURIComponent($('#'+p).val()) : encodeURIComponent($("#uspsd").val());
    var ltype = t ? t : '';
    var adv_id = $_GET['adv_id'] ? $_GET['adv_id'] : 0;
    
    var loginCenter = $("#loginCenter").val();
    if($(".l_check").attr("checked")==true){
        setCookie('Leee_pt_usname',usname,"s999999",'/','.vnwan.com');
        var saveid = 1;
    }else{
        setCookie('Leee_pt_usname','',"s0",'/','.vnwan.com');
    }
    if (usname == '用户名或手机号' || usname == '') {
        alert('请输入您的用户名！');
        return false;
    }
    if (uspsd == '') {
        alert('请输入您的密码！');
        return false;
    }
    $.getJSON(api_url+"/doLogin?rnd=" + Math.random() + "&username=" + usname + "&password=" + uspsd + "&save_id=" + saveid + "&returl="+returl+"&ltype="+ltype+"&adv_id="+adv_id+"&format=json&jsoncallback=?",
        function(data) {
            if (data.status == 1) {
                if (returl != '' && returl != undefined) {
                    //bbs
                    if(/bbs/i.test(returl)) {
                        var head = document.getElementsByTagName('head')[0];
                        for(var jsonpd in data['msg']) {
                            var script = document.createElement("script");
                            script.setAttribute('src' , data['msg'][jsonpd]);
                            head.appendChild(script);
                        }
                        setTimeout("window.location.href = '"+returl+"';",2000);
                    }
                    else{
                        window.location.href = returl;
                    }
                } else {
                    if (loginCenter == 1 && loginCenter != undefined) {
                        window.location.href = user_url;
                    } else {
                        window.location.href = site_url;
                    }
                }
            } else {
				if (data.status == -4 && data.stop && data.stop==1) {
					alert("账户被禁用，请联系在线客服！");
				}else{
					alert(data.msg);
				}
            }
        });
}

$(".sign_now").live('click', function() {
    $.getJSON(api_url+"/dailySign?rnd=" + Math.random() + "&format=json&jsoncallback=?",
        function(data) {
            if (data == '1') {
                alert('签到成功!');
                //window.location.reload();
			} else if (data == '2') {
				alert('今天您已经签到过了!');
            } else {
                alert('签到失败!');
            }
        });
});


//for search key up
function submit_search(event) {
    if (event.keyCode == 13) {
        $('#we-yxname-search').click();
    }
}

var childWindow;
//qq login
function toQzoneLogin() {
    childWindow = window.open(index_url+"/opensns/qqlogin", "TencentLogin", "width=600,height=430,menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1");
}

//close win
function closeChildWindow() {
    childWindow.close();
}

//weibo login
function toWeiboLogin() {
    childWindow = window.open(index_url+"/connect/weibo/", "WeiboLogin", "width=450,height=320,toolbar=no,menubar=no, scrollbars=no, resizable=no,location=no, status=no");
}

$('#uspsd').live('keyup',function(event) {
    if (($('#usname').val().length > 0 && $('#usname').val() != '用户名或手机号') && (event.keyCode == 13)) {
        doLogin();
    }
});