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

function ShowMsg(IdStr, ErrNum, ErrStr) {
    var ClrArr = new Array("#f00", "#33f", "#339900");
    $("#" + IdStr).css({
        fontWeight: "bold",
        fontSize: "9pt",
        color: ClrArr[ErrNum]
    });
    $("#" + IdStr).html(ErrStr);
}

function urldecode(str) {
  return decodeURIComponent((str + '')
    .replace(/%(?![\da-f]{2})/gi, function () {
      // PHP tolerates poorly formed escape sequences
      return '%25';
    })
    .replace(/\+/g, '%20'));
}

function validate() {
    var code = hex_md5($("#yz_code").val());
    var re_code = getCookie('mob_code');
    if (code != '' && code == re_code) {
        ShowMsg("msgyz", 1, "验证码输入正确！");
        $("#control").val("true");
    } else {
        ShowMsg("msgyz", 0, "验证码输入错误！");
        $("#control").val("false");
    }
}

function getCookie(name) {
    var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
    if (arr = document.cookie.match(reg)) return unescape(arr[2]);
    else return null;
}

function delCookie(name) {
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval = getCookie(name);
    if (cval != null) document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString();
}

var bValid_usr = false;
var bValid_pwd = false;
var bValid_pwdc = false;
var bValid_email = false;
var bValid_cc = false;
var bValid_rn = false;
var bValid_sfz = false;
var bValid_mob = false;

function isIdCardNo(num) {
    num = num.toUpperCase();
    //身份证号码为15位或者18位，15位时全为数字，18位前17位为数字，最后一位是校验位，可能为数字或字符X。  
    if (!(/(^\d{15}$)|(^\d{17}([0-9]|X)$)/.test(num))) {
        //alert('输入的身份证号长度不对，或者号码不符合规定！\n15位号码应全为数字，18位号码末位可以为数字或X。');
        return false;
    }
    //校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。
    //下面分别分析出生日期和校验位
    var len, re;
    len = num.length;
    if (len == 15) {
        re = new RegExp(/^(\d{6})(\d{2})(\d{2})(\d{2})(\d{3})$/);
        var arrSplit = num.match(re);

        //检查生日日期是否正确
        var dtmBirth = new Date('19' + arrSplit[2] + '/' + arrSplit[3] + '/' + arrSplit[4]);

        var bGoodDay;
        bGoodDay = (dtmBirth.getYear() == Number(arrSplit[2])) && ((dtmBirth.getMonth() + 1) == Number(arrSplit[3])) && (dtmBirth.getDate() == Number(arrSplit[4]));
        if (!bGoodDay) {
            //alert('输入的身份证号里出生日期不对！');  
            return false;
        } else {
            //将15位身份证转成18位
            //校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。
            var arrInt = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
            var arrCh = new Array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
            var nTemp = 0,
                i;
            num = num.substr(0, 6) + '19' + num.substr(6, num.length - 6);
            for (i = 0; i < 17; i++) {
                nTemp += num.substr(i, 1) * arrInt[i];
            }
            num += arrCh[nTemp % 11];
            return num;
        }
    }
    if (len == 18) {
        re = new RegExp(/^(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X)$/);
        var arrSplit = num.match(re);

        //检查生日日期是否正确
        var dtmBirth = new Date(arrSplit[2] + "/" + arrSplit[3] + "/" + arrSplit[4]);

var myDate = new Date(); 
var month = myDate.getMonth() + 1; 
var day = myDate.getDate();
var age = myDate.getFullYear() - arrSplit[2]; 

if (arrSplit[3] < month || arrSplit[3] == month && arrSplit[4] <= day) { 
age++; 
} 
if (age < 18) {
alert('因未成年管理条例限定，未满18岁将启用游戏防沉迷系统！');
}
 
  

        var bGoodDay;
        bGoodDay = (dtmBirth.getFullYear() == Number(arrSplit[2])) && ((dtmBirth.getMonth() + 1) == Number(arrSplit[3])) && (dtmBirth.getDate() == Number(arrSplit[4]));

    
        if (!bGoodDay) {
            alert(dtmBirth.getYear());
            alert(arrSplit[2]);
            alert('输入的身份证号里出生日期不对！');
            return false;
        } else {
            //检验18位身份证的校验码是否正确。
            //校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。
            var valnum;
            var arrInt = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
            var arrCh = new Array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
            var nTemp = 0,
                i;
            for (i = 0; i < 17; i++) {
                nTemp += num.substr(i, 1) * arrInt[i];
            }
            valnum = arrCh[nTemp % 11];
            if (valnum != num.substr(17, 1)) {
                //alert('18位身份证的校验码不正确！应该为：' + valnum);
                return false;
            }
            return num;
        }
    }
    return false;
}

function ChkUserName() {
    var username = $("#loginname").val();
    var chkmb = checkMobile(username);
    if (username == "" || username.length < 6) {
        ShowMsg("msgloginname", 0, "由6-16位字母和数字组成，不区分大小写!");
        bValid_usr = false;
        return;
    }
    if (username.length > 16) {
        ShowMsg("msgloginname", 0, "账号不能超过16位!");
        bValid_usr = false;
        return;
    }
    if (/.*[\u4e00-\u9fa5]+.*$/.test(username)) {
        ShowMsg("msgloginname", 0, "对不起，帐号不能使用中文，请重新输入!");
        bValid_usr = false;
        return;
    }
    var re = new RegExp("#");
    if (re.test(username)) {
        ShowMsg("msgloginname", 0, "您输入的用户名不符合规定，请重新输入!");
        bValid_usr = false;
        return;
    }

    if (chkmb) {
        ShowMsg("msgloginname", 0, "您输入的为手机号，请进入手机注册页面注册！");
        bValid_usr = false;
        return;
    }

    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/regcheckUserName",
        data: {
            'rnd': Math.random(),
            'loginname': $("#loginname").val()
        },
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback: "apiCheckUserName",
        success: function(data) {
            if (data.msg != 1) {
                ShowMsg("msgloginname", 0, "该帐号已被注册，请重新输入!");
                bValid_usr = false;
                return;
            }
            if (data.illegal) {
                ShowMsg("msgloginname", 0, "您输入的用户名不符合规定!");
                bValid_usr = false;
                return;
            }
            ShowMsg("msgloginname", 1, "此帐号可以注册!");
            bValid_usr = true;
        },
        error: function() {}
    });
}

function ChkPasWd() {
    if ($("#psw").val() == "" || $("#psw").val().length < 6) {
        ShowMsg("msgpsw1", 0, "密码必须由6-20位字符组成!");
        bValid_pwd = false;
        return;
    }
    var pattern = /[`~!@#\$%\^\&\*\(\)_\+<>\?:"\{\},\.\\\/;'\[\]]/im;
    if (pattern.test($("#psw").val())) {
        ShowMsg("msgpsw1", 0, "密码中含有限制字符!");
        bValid_pwd = false;
        return;
    }

    ShowMsg("msgpsw1", 1, "密码正确填写!");
    bValid_pwd = true;
    ChkPasWd2();
}

function ChkPasWd2() {
    if ($("#psw").val() != $("#psw2").val()) {
        ShowMsg("msgpsw2", 0, "确认密码未匹配!");
        bValid_pwdc = false;
        return;
    }
    var pattern = /[`~!@#\$%\^\&\*\(\)_\+<>\?:"\{\},\.\\\/;'\[\]]/im;
    if (pattern.test($("#psw2").val())) {
        ShowMsg("msgpsw2", 0, "密码中含有限制字符!");
        bValid_pwdc = false;
        return;
    }
    if ($("#psw2").val() == "" || $("#psw2").val().length < 6) {
        ShowMsg("msgpsw2", 0, "密码必须由6-20位字符组成!!");
        bValid_pwdc = false;
        return;
    }
    ShowMsg("msgpsw2", 1, "确认码正确填写!");
    bValid_pwdc = true;
}

function ChkEmail() {
    bValid_email = false;
    var mail_str = $("#email").val();
    if (mail_str == "") {
        ShowMsg("msgemail", 0, "邮箱不能为空!");
    } else if (mail_str.match(/^[-_.a-z0-9A-Z]+([-_.][a-zA-Z0-9]+)*@([a-zA-Z0-9]+([-_.][a-zA-Z0-9]+))+$/i)) {
        bValid_email = true;
        ShowMsg("msgemail", 1, "邮箱格式正确!");
    } else {
        ShowMsg("msgemail", 0, "邮箱格式不正确!");
    }
}

function chkname() {
    bValid_rn = false;
    var rn_str = $("#truename").val();
    if (rn_str.match(/^[\u4e00-\u9fa5]{2,4}$/g)) {
        ShowMsg("msgname", 1, "可用的真实姓名!");
        bValid_rn = true;
        return;
    }
    ShowMsg("msgname", 0, "请检查姓名是否是2~4汉字! (例如：王五)");
}

function chkidcard() {
    var str_NO = $.trim($("#idcard").val());
    $("#idcard").attr("value", str_NO);
    bValid_sfz = false;
    if (isIdCardNo(str_NO)) {
        ShowMsg("msgsfz", 1, "身份证可用!");
        bValid_sfz = true;
    } else {
        ShowMsg("msgsfz", 0, "身份证号码不符合规定! (例如：320812198011111110)");
        bValid_sfz = false;
    }
}


function form_submit() {
    if ($('#act').val() == 'reg') {
        ChkUserName();
        if (!bValid_usr) {
            return false;
        }
    }
    ChkPasWd();
    if (!bValid_pwd) {
        return false;
    }
    ChkPasWd2();
    if (!bValid_pwdc) {
        return false;
    }
    if ($('#act').val() == 'reg') {
        ChkEmail();
        if (!bValid_email) {
            return false;
        }
    }
    chkname();
    if (!bValid_rn) {
        return false;
    }
    chkidcard();
    if (!bValid_sfz) {
        return false;
    }
    if (!$("#agree_protocol")[0].checked) {
        alert("请先接受用户服务协议!");
        return false;
    }
    
    var returl = '';
    if($_GET['returl']) {
        returl = urldecode($_GET['returl']);
    }
    
    //for box
    var box_ad = '';
    if($_GET['ad']) {
        box_ad = $_GET['ad'];
    }
    
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/register",
        data: {
            'loginname': $("#loginname").val(),
            'email': $("#email").val(),
            'psw': $("#psw").val(),
            'psw2': $("#psw2").val(),
            'truename': $("#truename").val(),
            'idcard': $("#idcard").val(),
            'returl' : returl,
            'ad' : box_ad
        },
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback: "apiRegister",
        success: function(json) {
            alert(json.msg);
            if (json.result == 1) {
                window.location.href = json.returl;
            }
        },
        error: function() {}
    });
}

function form_submit1() {
    var contrl = $("#control").val();
    var code_status = $("#code_status").val();
    if (contrl == "false") {
        return false;
    };
    if (code_status == 'false') {
        alert("验证码已失效，请重新获取！");
    }
    $("#mobname").attr("disabled", false);
    bValid_mob = checkMobile();
    if (!bValid_mob) {
        return false;
    }
    ChkPasWd();
    if (!bValid_pwd) {
        return false;
    }
    chkname();
    if (!bValid_rn) {
        return false;
    }
    chkidcard();
    if (!bValid_sfz) {
        return false;
    }
    if (!$("#agree_protocol")[0].checked) {
        alert("请先接受用户服务协议!");
        return false;
    }
    
    var returl = '';
    if($_GET['returl']) {
        returl = urldecode($_GET['returl']);
    }
    
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/user/reg/registerPhone",
        data: {
            'mobname': $("#mobname").val(),
            'psw': $("#psw").val(),
            'psw2': $("#psw2").val(),
            'truename': $("#truename").val(),
            'idcard': $("#idcard").val(),
            'returl' : returl
        },
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback: "apiRegisterPhone",
        success: function(json) {
            alert(json.msg);
            if (json.result == 1) {
                window.location.href = json.returl;
            }
        },
        error: function() {}
    });
}

var tme = 0;
var MyMar = null;
$(document).ready(function() {
    $(".btn_yz").click(function() {
        var mobile = $('#mobname').val();
        var time = 1393551364;
        var mvalid = "6d6b0811faa7bf512f8a7fe3d8fc226e";
        var bValid_mob = checkMobile(mobile);
        if (!bValid_mob) {
            return false;
        }
        $(".btn_yz").val("发送中,请稍等!");
        $(".btn_yz").attr("disabled", true);
        $.ajax({
            type: "get",
            async: true,
            url: api_url+"/user/reg/regGetPhoneCode",
            data: {
                rnd : Math.random(),
                mobile : mobile,
                mvalid :mvalid,
                time : time
            },
            dataType: "jsonp",
            jsonp: "callback",
            jsonpCallback: "apiRegGetPhoneCode",
            success: function(json) {
                if (json.result != '1') {
                    $("#chk_mob").html("<span style='color:#f00'>" + json.msg + "</span>");
                    $(".btn_yz").attr("disabled", false);
                    if (json.result == '0') {
                        $(".btn_yz").attr("disabled", true);
                    }
                } else {
                    $("#chk_mob").html("<span style='color:#59B200'>" + json.msg + "</span>");
                    $("#mobname").attr("disabled", false);
                    $("#code_status").val("true");
                    $(".btn_yz").val("验证码已发送");
                    tme = 120;
                    MyMar = setInterval(Marquee, 1000);
                    $(".btn_yz").attr("disabled", true);
                    $("#mobname").attr("disabled", true);
                }
            },
            error: function(staus) {
                alert('系统繁忙，请稍后再试!');
            }
        });
        return false;
    });

    $("#mobname").keyup(function() {
        var mobile = $("#mobname").val();
        if (mobile.length >= 11) {
            if (/^.{11,11}$/.test(mobile)) {
                var mobile = $('#mobname').val();
                var bValid_mob = checkMobile(mobile);
                if (!bValid_mob) {
                    $("#chk_mob").html("<span style='color:#f00'>请输入11位数字的手机号码</span>");
                } else {
                    $.ajax({
                        type: "get",
                        async: true,
                        url: api_url+"/user/reg/regCheckUser",
                        data: {
                            rnd : Math.random(),
                            loginname : mobile
                        },
                        dataType: "jsonp",
                        jsonp: "callback",
                        jsonpCallback: "apiRegCheckUser",
                        success: function(json) {
                            if (json.msg != 1) {
                                $("#chk_mob").html("<span style='color:#f00'>手机号码已注册！</span>");
                                $(".btn_yz").attr("disabled", true);
                                $("#control").val("false");
                            } else {
                                $("#chk_mob").html("<span style='color:#f00'></span>");
                                $(".btn_yz").attr("disabled", false);
                                $("#control").val("true");
                            }
                        },
                        error: function(staus) {
                            alert('系统繁忙，请稍后再试!');
                        }
                    });

                }
            } else {
                $("#chk_mob").html("<span style='color:#f00'>请输入11位数字的手机号码</span>");
            }
        } else {
            $("#chk_mob").html("请输入您的手机号码。");
        }
    });
})

function Marquee() {
    tme--;
    $(".btn_yz").val("(" + tme + "秒)重发验证码");
    if (tme < 1) {
        $(".btn_yz").val("重发验证码");
        $(".btn_yz").attr("disabled", false);
        $("#mobname").attr("disabled", false);
        delCookie('mob_code');
        alert("验证码已失效，请重新获取！");
        $("#code_status").val("false");
        clearInterval(MyMar);
    }
}

function checkMobile() {
    var mobile = arguments[0] ? arguments[0] : '';
    var reg0 = /^13\d{5,9}$/; //130--139。至少7位
    var reg1 = /^153\d{8}$/; //联通153。至少7位
    var reg2 = /^159\d{8}$/; //移动159。至少7位
    var reg3 = /^158\d{8}$/;
    var reg4 = /^150\d{8}$/;
    var reg5 = /^188\d{8}$/;
    var reg6 = /^189\d{8}$/;
    var reg7 = /^15\d{5,9}$/; //150--159。至少7位
    var reg8 = /^18\d{5,9}$/; //180--189。至少7位
    var act = $('#act').val();
    if ($('#mobname').val() && mobile == '') {
        mobile = $('#mobname').val();
    }
    var bValid_mob = false;
    if (reg0.test(mobile)) bValid_mob = true;
    if (reg1.test(mobile)) bValid_mob = true;
    if (reg2.test(mobile)) bValid_mob = true;
    if (reg3.test(mobile)) bValid_mob = true;
    if (reg4.test(mobile)) bValid_mob = true;
    if (reg5.test(mobile)) bValid_mob = true;
    if (reg6.test(mobile)) bValid_mob = true;
    if (reg7.test(mobile)) bValid_mob = true;
    if (reg8.test(mobile)) bValid_mob = true;
    if (mobile.length < 11) bValid_mob = false;
    if (act == "reg") {
        if (!bValid_mob) {
            return false;
        } else {
            return true;
        }
    }
    if (!bValid_mob) {
        ShowMsg("chk_mob", 0, "您输入的手机号码有误!");
        bValid_mob = false;
        return bValid_mob;
    } else {
        ShowMsg("chk_mob", 1, "您输入的手机号码正确!");
        bValid_mob = true;
        return bValid_mob;
    }


}