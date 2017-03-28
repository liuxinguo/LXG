$(document).ready(function() {
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/userPhonehasBind",
        data: {},
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback: "apiUserPhonehasBind",
        success: function(json) {
            if (json.result == '1') {
               $('#zl3').html(json.msg);
            }
        },
        error: function(staus) {
            alert('系统繁忙，请稍后再试!');
        }
    });

    $("#btn_mobile").live('click', function() {
        var control = validate();
        var mobile = $('#mobname').val();
        var yz_code = $('#yz_code').val();
        if (mobile == '') {
            $("#mob_msg").html("手机号不能为空！");
            return false;
        }
        if (!control) {
            $("#mob_msg").html("验证码输入错误！");
            return false;
        }

        $.ajax({
            type: "get",
            async: true,
            url: api_url+"/userPhoneBind",
            data: {
                mobile: mobile,
                yz_code: yz_code
            },
            dataType: "jsonp",
            jsonp: "callback",
            jsonpCallback: "apiUserPhoneBind",
            success: function(json) {
                if (json.result == '0') {
                    $("#mob_msg").html(json.msg);
                }
                if (json.result == '1') {
                    alert(json.msg);
                    window.location.reload();
                }
            },
            error: function(staus) {
                alert('系统繁忙，请稍后再试!');
            }
        });

    });

    $(".btn_yz").click(function() {
        var mobile = $('#mobname').val();
        var Valid_mob = checkMobile(mobile);
        if (!Valid_mob) {
            $("#mob_msg").html("手机号输入有误！");
            return false;
        }
        $(".btn_yz").val("发送中");
        $(".btn_yz").attr("disabled", true);

        $.ajax({
            type: "get",
            async: true,
            url: api_url+"/userGetPhoneCode",
            data: {
                mobile: mobile
            },
            dataType: "jsonp",
            jsonp: "callback",
            jsonpCallback: "apiUserGetPhoneCode",
            success: function(json) {
                if (json.result != '1') {
                    $(".btn_yz").val("获取验证码");
                    $("#mob_msg").html(json.msg);
                    $(".btn_yz").attr("disabled", false);
                    if (json.result == '2') {
                        $(".btn_yz").attr("disabled", true);
                    }
                } else {
                    $("#mob_msg").html(json.msg);
                    $("#mobname").attr("disabled", false);
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

});

function validate() {
    var code = hex_md5($("#yz_code").val());
    var re_code = getCookie('Leee_mob_code');
    if (code != '' && code == re_code) {
        $("#code_msg").html("验证码输入正确！");
        return true;
    } else {
        $("#code_msg").html("验证码输入错误！");
        return false;
    }
}

//读取cookies
function getCookie(name) {
    var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
    if (arr = document.cookie.match(reg)) return unescape(arr[2]);
    else return null;
}

//删除cookies
function delCookie(name) {
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval = getCookie(name);
    if (cval != null) document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString();
}

function checkMobile(mobile) {
    var reg0 = /^13\d{5,9}$/; //130--139。至少7位
    var reg1 = /^153\d{8}$/; //联通153。至少7位
    var reg2 = /^159\d{8}$/; //移动159。至少7位
    var reg3 = /^158\d{8}$/;
    var reg4 = /^150\d{8}$/;
    var reg5 = /^188\d{8}$/;
    var reg6 = /^189\d{8}$/;
    var reg7 = /^15\d{5,9}$/; //150--159。至少7位
    var reg8 = /^18\d{5,9}$/; //180--189。至少7位
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
    if (!bValid_mob) {
        bValid_mob = false;
        return bValid_mob;
    } else {
        bValid_mob = true;
        return bValid_mob;
    }
}

function Marquee() {
    tme--;
    $(".btn_yz").val("(" + tme + "秒)重发");
    if (tme < 1) {
        $(".btn_yz").val("重发验证码");
        $(".btn_yz").attr("disabled", false);
        $("#mobname").attr("disabled", false);
        delCookie('Leee_mob_code');
        //$("#code_status").val("false");
        clearInterval(MyMar);
    }
}