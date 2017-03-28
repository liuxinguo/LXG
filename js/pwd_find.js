var $_GET = (function() {
    var url = window.document.location.href.toString();
    var u = url.split("?");
    if (typeof(u[1]) == "string") {
        u = u[1].split("&");
        var get = {};
        for (var i in u) {
            var j = u[i].split("=");
            get[j[0]] = j[1];
        }
        return get;
    } else {
        return {};
    }
})();

function time() {
  return Math.floor(new Date()
    .getTime() / 1000);
}

//send mail
function pwd_find_by_email() {
    var loginname = $('#loginname').val();
    var email = $('#email').val();
    var seccode = $('#seccode').val();
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/checkEmail",
        data: {
            'loginname': loginname,
            'email': email,
            'seccode': seccode
        },
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback: "apiFindpwdCheckEmail",
        success: function(json) {
            if (json.result == 1) {
                window.location.href = json.url;
            } else {
                alert(json.msg);
            }
        },
        error: function() {}
    });
}

//change pwd
function pwd_find_by_email2() {
    var mid = $_GET['mid'];
    var time = $_GET['time'];
    var mac = $_GET['mac'];
    var new_pwd = $('#new_pwd').val();
    var re_new_pwd = $('#re_new_pwd').val();
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/modifyPwdByEmail",
        data: {
            'mid': mid,
            'time': time,
            'mac': mac,
            'new_pwd': new_pwd,
            're_new_pwd': re_new_pwd
        },
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback: "apiModifyPwdByEmail",
        success: function(json) {
            if (json.result == 1) {
                alert(json.msg);
                window.location.href = json.url;
            } else {
                alert(json.msg);
            }
        },
        error: function() {}
    });
}

//send code
function pwd_find_by_mobile() {
    var username = $('#username').val();
    var mobile = $('#mobile').val();
    var seccode = $('#seccode').val();
    var mvalid = $('#mvalid').val();
    var time = $('#time').val();
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/sendPhoneCode",
        data: {
            'username': username,
            'mobile': mobile,
            'seccode': seccode,
            'mvalid' : mvalid,
            'time' : time
        },
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback: "apiFindPwsSendPhoneCode",
        success: function(json) {
            if (json.result == 1) {
                alert(json.msg);
                window.location.href = json.url;
            } else {
                alert(json.msg);
            }
        },
        error: function() {}
    });
}

//set pwd
function pwd_find_by_mobile2() {
    var username = $_GET['username'];
    var mobile = $_GET['mobile'];
    var mobile_code = $('#mobile_code').val();
    var password = $('#password').val();
    var password2 = $('#password2').val();
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/modifyPwdByPhone",
        data: {
            'username': username,
            'mobile': mobile,
            'mobile_code': mobile_code,
            'password' : password,
            'password2' : password2
        },
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback: "apiFindPwsModifyPwdByPhone",
        success: function(json) {
            if (json.result == 1) {
                alert(json.msg);
                window.location.href = json.url;
            } else {
                alert(json.msg);
            }
        },
        error: function() {}
    });
}

//check ask
function pwd_find_by_ask() {
    var loginname = $('#loginname').val();
    var question1 = $('#question1').val();
    var answer = $('#answer').val();
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/checkProtect",
        data: {
            'loginname': loginname,
            'answer': answer,
            'question1': question1
        },
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback: "apiFindPwsCheckProtect",
        success: function(json) {
            if (json.result == 1) {
                window.location.href = json.url;
            } else {
                alert(json.msg);
            }
        },
        error: function() {}
    });
}

//change pwd
function pwd_find_by_ask2() {
    var mid = $_GET['mid'];
    var time = $_GET['time'];
    var mac = $_GET['mac'];
    var new_pwd = $('#new_pwd').val();
    var re_new_pwd = $('#re_new_pwd').val();
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/modifyPwdByAsk",
        data: {
            'mid': mid,
            'time': time,
            'mac': mac,
            'new_pwd': new_pwd,
            're_new_pwd': re_new_pwd
        },
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback: "apiModifyPwdByAsk",
        success: function(json) {
            if (json.result == 1) {
                alert(json.msg);
                window.location.href = json.url;
            } else {
                alert(json.msg);
            }
        },
        error: function() {}
    });
}

function setSeccode() {
    var img_src = api_url + '/verify?rand=' + Math.random();
    document.getElementById("seccode_img").src = img_src;
}