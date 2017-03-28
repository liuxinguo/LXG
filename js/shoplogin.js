//login
function user_ul(){
	var nav = document.getElementById("userinfo_ul").childNodes;

	for (var i=0;i<nav.length;i++)
	{
		if (nav[i].className=="menu")
		{
			nav[i].onmouseover = function(){fnNav(this,"block")};
			nav[i].onmouseout = function(){fnNav(this,"none")};
		}
	}
	function fnNav(obj,flag)
	{
		obj.getElementsByTagName("dl")[0].style.display = flag;
	}
}

function urldecode(str) {
  return decodeURIComponent((str + '')
    .replace(/%(?![\da-f]{2})/gi, function () {
      // PHP tolerates poorly formed escape sequences
      return '%25';
    })
    .replace(/\+/g, '%20'));
}

function format(num){
	var num =  num.toString();
	var len = num.length;
	if(len == 1){
		return "0" + num;
	}
	return num;
}

var user_id = '';
var user_name = '';
var img_url = 'http://img.49you.com';
var returl = 'http://shop.5566wan.com';
$(function() {
    var before = $('#login_b').html();
    $.getJSON(api_url+"/checkLogin?rnd=" + Math.random() + "&format=json&jsoncallback=?&type=shop",
        function(data) {
            if (data.status == 1) {
            		var total = 120000+data['user']['sign_total']*3;
            		var cont_day = data['user']['continue_sign_day'];
            	
            		var end_time = new Date(data['user']['end_time']*1000); 
            		var year = end_time.getFullYear();
            		var e_month=end_time.getMonth()+1;     
    	            var e_date=end_time.getDate();     
    	            e_month = format(e_month);
    	            e_date = format(e_date);
    	            var time_str = year+'年'+e_month+"月"+e_date+'日';
    	            
            		user_id = data['user']['member_id'];
            		user_name = data['user']['username'];
                    $('#login_before').hide();
                    $('#login_after').css('padding-top','0').show();
                    var points = data['user']['points']<0 ? 0 : data['user']['points'];
                    var d=new Date();   
    	        	var month=d.getMonth()+1;     
    	            var date=d.getDate();     
    	            month = format(month);
    	            date = format(date);
    	            var dt = month+"-"+date;
    	            var week = "周" + "日一二三四五六".split("")[new Date().getDay()];
                    var div_dhjl = "'div_dhjl'";
                    var html = '';
                    html += '<div class="logindiv02" id="login_after">';
                    html += '<h1 class="logintitle_h1">用户信息</h1>';
                    html += '<div class="logininfowrap_div">';
                    html += '<div class="photo_div fl pr"><img src="' + img_url+data['user']['av_image'] + '" width="95" height="95" /><p class="qd_p pa"><a class="sign_now" href="#">点击签到</a></p></div>';
                    html += '<div class="photoinfo_div fl">';
                
                	html += '<ul id="userinfo_ul">';
                	html += '<li class="menu"><span class="hyname_span">' + data['user']['username'] + '</span>';
                	html += '<dl class="submenu">';
                	html += '<dd>' + data['user']['rank'] + '到期时间：'+time_str+'</dd>';
                	html += '</dl>';
                	html += '</li>';
                	html += '<li class="quit_li"><a href="' + api_url + '/User/Login/loginout?returl='+ returl +'" class="quit_a">[退出]</a></li>';
                	html += '</ul>';
                	html += '<p class="userinfo_p"><span class="username_span">' + data['user']['rank'] + '</span><a href="javascript:;" id="shengji" class="shengji_a">[升级]</a></p>';
                	html += '<p class="userinfo_p">平台币：' + data['user']['money'] + '</p>';
                
                    html += '<p class="userinfo_p">赠宝：' + data['user']['member_coins'] + '</p><p id="login_points" class="userinfo_p">积分：' + points + '</p></div></div>';
                    html += '<div class="qdinfowrap_div">';
                    html += '<p class="qddate_p fl">'+ dt +'<br />' + week + '</p><p id="sign_total" class="qdrs_p fl">已有'+total+'人签到</p><p id="sign_day" class="qdts_p fl">已 签<br />'+cont_day+' 天</p></div>';
                    html += '<a href="http://user.5566wan.com/user_renzheng_ph.html" target="_blank" class="bdsj_a db"></a>';
                    html += '<a href="javascript:void(0);" onclick="get_myRecord('+data['user']['member_id']+',\''+data['user']['username']+'\');" class="mydhjl_a db"></a>';
                    html += '</div>';
                    
                    $('#login_after').html(html);
                    if(data['user']['vip']>1){
                    	user_ul();
                    }
                    /**升级**/
                    $("#shengji").click(function(){
                    	$('html,body').animate({scrollTop:$('#shengji1').offset().top},1);
                    });
                    
            }else{
            	 $('#login_before').show();
                 $('#login_after').hide();
            }
        });
    
});

function dologin() {
    var usname = $('#login_name').val();
    var uspsd = $('#login_pwd').val();
    var saveid = $('#save_id')[0].checked;
    if (usname == '请输入您的帐号' || usname == '') {
        alert('请输入您的用户名！');
        return false;
    }
    if (uspsd == '') {
        alert('请输入您的密码！');
        return false;
    }
    $.getJSON(api_url + "/doLogin?rnd=" + Math.random() + "&username=" + usname + "&password=" + uspsd + "&save_id=" + saveid + "&returl="+returl+"&format=json&jsoncallback=?",
        function(data) {
            if (data.status == 1) {
            		window.location.href = returl;
            }else {
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

document.onkeydown = function(evt){ 
    var evt = window.event?window.event:evt; 
    if (($('#login_name').val().length > 0 && $('#login_name').val() != '请输入您的账号') && (evt.keyCode == 13)) {
        dologin();
    }
}