//验证用户名
function checkName() {
    var account = $("input[name='account']").val();
    if (account.length > 20 || account.length < 3 || !(/^[a-z_][a-z_0-9]*$/i.test(account))) {
        $("#sp_account").html("用户名不符合要求！").removeClass("routine yes").addClass("wrong");
        return false;
    }
    $.post("/supplier.php?m=Login&a=ajax_checkName", {account: account}, function(data) {
        if (data.status == 1) {
            $("#sp_account").html("用户名可以注册").removeClass('routine wrong').addClass("yes");
        } else {
            $("#sp_account").html("该用户名已被注册").removeClass("routine yes").addClass("wrong");
            return false;
        }
    });
    return true;
}
//检测二级密码
function checkPassword() {
    var password = $("input[name='password']").val();
    if (password === "") {
        $("#sp_password").html("请输入密码！").removeClass("routine yes").addClass("wrong");
        return false;
    }
    if (password.length < 6 || password.length > 16) {
        $("#sp_password").html("密码长度不符合要求！").removeClass("routine yes").addClass("wrong");
        return false;
    }
    $("#sp_password").html("");
    return true;
}
//检测二级密码
function checkTwoPassword() {
    var onepassword = $("input[name='password']").val();
    var twopassword = $("input[name='twopassword']").val();
    if (twopassword === "") {
        $("#sp_twopassword").html("请输入二级密码！").removeClass("routine yes").addClass("wrong");
        return false;
    }
     if (!onepassword || $("input[name='twopassword']").val() == onepassword) {
        $("#sp_twopassword").html("不能跟登录密码一样").removeClass("routine yes").addClass("wrong");
        return false;
    }
    
    if (twopassword.length < 6 || twopassword.length > 16) {
        $("#sp_twopassword").html("密码长度不符合要求！").removeClass("routine yes").addClass("wrong");
        return false;
    }
    $("#sp_twopassword").html("");
    return true;
}

//验证确认二级密码
function checkReTwoPassword() {
    var repassword = $("input[name='retwopassword']").val();
    if (!repassword || $("input[name='twopassword']").val() !== repassword) {
        $("#sp_tworepeat").html("两次输入的密码不一致").removeClass("routine yes").addClass("wrong");
        return false;
    } else {
        $("#sp_tworepeat").html("");
    }
    return true;
}
//验证二级密码安全级别
function checkTwoSafeLevel() {
    var password = $("input[name='twopassword']").val();
    var length = AnalyzePasswordSecurityLevel(password);
    if (length === 3) {
        $("#safe_twolevel").removeClass().addClass("v3");
    } else if (length === 2) {
        $("#safe_twolevel").removeClass().addClass("v2");
    } else if (length === 1) {
        $("#safe_twolevel").removeClass().addClass("v1");
    } else {
        $("#safe_twolevel").removeClass().addClass("v0");
    }
}

//验证密码安全级别
function checkSafeLevel() {
    var password = $("input[name='password']").val();
    var length = AnalyzePasswordSecurityLevel(password);
    if (length === 3) {
        $("#safe_level").removeClass().addClass("v3");
    } else if (length === 2) {
        $("#safe_level").removeClass().addClass("v2");
    } else if (length === 1) {
        $("#safe_level").removeClass().addClass("v1");
    } else {
        $("#safe_level").removeClass().addClass("v0");
    }
}
//验证确认密码
function checkRePassword() {
    var repassword = $("input[name='repassword']").val();
    if (!repassword || $("input[name='password']").val() !== repassword) {
        $("#sp_repeat").html("两次输入的密码不一致").removeClass("routine yes").addClass("wrong");
        return false;
    } else {
        $("#sp_repeat").html("");
    }
    return true;
}
//验证公会名
function checkConName() {
    var pcon_name = $("input[name='pcon_name']").val();
    if (pcon_name == "") {
        $("#sp_pcon_name").html("请填写公会名称！").removeClass("routine").addClass("wrong");
        return false;
    }
    $("#sp_pcon_name").html("").removeClass("routine wrong");
    return true;
}
//验证手机
/*
 三大运营商最新号段 合作版
 移动号段：
 134 135 136 137 138 139
 147
 150 151 152 157 158 159
 178
 182 183 184 187 188
 联通号段：
 130 131 132
 145
 155 156
 175 176
 185 186
 电信号段：
 133 153
 177
 180 181 189
 虚拟运营商:
 170
 */
function checkPhone() {
    var phone = $("input[name='phone']").val();
    if (/^13\d{9}$/g.test(phone) || /^14[57]\d{8}$/g.test(phone) || /^17[05-8]\d{8}$/g.test(phone) || (/^15[0-35-9]\d{8}$/g.test(phone)) || (/^18[0-9]\d{8}$/g.test(phone))) {
        $("#sp_phone").html("").removeClass("routine wrong").addClass("yes");
        return true;
    } else {
        $("#sp_phone").html("您输入的手机号码有误！").removeClass("routine yes").addClass("wrong");
        return false;
    }
}
//验证QQ
function checkQQ() {
    var qq_no = $("input[name='qq']").val();
    var qq = /(^[1-9]{1}[0-9]{4,10}$)/
    if (!qq.test(qq_no)) {
        $("#sp_qq").html("您输入的QQ号码有误！").removeClass("routine yes").addClass("wrong");
        return false;
    } else {
        $("#sp_qq").html("").removeClass("routine wrong").addClass("yes");
        return true;
    }
}
//验证邮箱
function checkEmail() {
    var email = $("input[name='email']").val();
    var mail_len = email.replace(/[^\x00-\xff]/g, '**').length;
    if (!(/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(email)) || mail_len > 40 || mail_len < 7) {
        $("#sp_email").html("您输入的邮箱不正确！").removeClass("routine yes").addClass("wrong");
        return false;
    } else {
        $("#sp_email").html("");
    }
    return true;
}
//验证收款人真实姓名
function checkTrueName() {
    var TrueName = $("input[name='payee']").val();
    if (!TrueName || !(/^[\u0391-\uFFE5]{2,4}$/.test(TrueName))) {
        $("#sp_payee").html("您输入的姓名有误，请重新输入&nbsp;&nbsp;如：张三").removeClass("routine yes").addClass("wrong");
        return false;
    } else {
        $("#sp_payee").html("");
    }
    return true;
}
//验证开户行信息
function checkBankAccount() {
    //var bank = $("input[name='bankType']:checked").val();
    //if (bank != "bank") {
    //    return true;
    //}
    var bankaccount = $("input[name='bankaccount']").val();
    if (bankaccount == "") {
        $("#sp_bankaccount").html("请填写开户行信息！").removeClass("routine").addClass("wrong");
        return false;
    }
    $("#sp_bankaccount").html("").removeClass("routine wrong");
    return true;
}
//验证银行卡号
function checkCardNo() {
    //var bank = $("input[name='bankType']:checked").val();
    //if (bank != "bank") {
    //    return true;
    //}
    var bankno = $("input[name='cardno']").val();
    var lastNum = bankno.substr(bankno.length - 1, 1);//取出最后一位（与luhm进行比较）

    var first15Num = bankno.substr(0, bankno.length - 1);//前15或18位
    var newArr = new Array();
    for (var i = first15Num.length - 1; i > -1; i--) {    //前15或18位倒序存进数组
        newArr.push(first15Num.substr(i, 1));
    }
    var arrJiShu = new Array();  //奇数位*2的积 <9
    var arrJiShu2 = new Array(); //奇数位*2的积 >9

    var arrOuShu = new Array();  //偶数位数组
    for (var j = 0; j < newArr.length; j++) {
        if ((j + 1) % 2 == 1) {//奇数位
            if (parseInt(newArr[j]) * 2 < 9)
                arrJiShu.push(parseInt(newArr[j]) * 2);
            else
                arrJiShu2.push(parseInt(newArr[j]) * 2);
        }
        else //偶数位
            arrOuShu.push(newArr[j]);
    }

    var jishu_child1 = new Array();//奇数位*2 >9 的分割之后的数组个位数
    var jishu_child2 = new Array();//奇数位*2 >9 的分割之后的数组十位数
    for (var h = 0; h < arrJiShu2.length; h++) {
        jishu_child1.push(parseInt(arrJiShu2[h]) % 10);
        jishu_child2.push(parseInt(arrJiShu2[h]) / 10);
    }

    var sumJiShu = 0; //奇数位*2 < 9 的数组之和
    var sumOuShu = 0; //偶数位数组之和
    var sumJiShuChild1 = 0; //奇数位*2 >9 的分割之后的数组个位数之和
    var sumJiShuChild2 = 0; //奇数位*2 >9 的分割之后的数组十位数之和
    var sumTotal = 0;
    for (var m = 0; m < arrJiShu.length; m++) {
        sumJiShu = sumJiShu + parseInt(arrJiShu[m]);
    }

    for (var n = 0; n < arrOuShu.length; n++) {
        sumOuShu = sumOuShu + parseInt(arrOuShu[n]);
    }

    for (var p = 0; p < jishu_child1.length; p++) {
        sumJiShuChild1 = sumJiShuChild1 + parseInt(jishu_child1[p]);
        sumJiShuChild2 = sumJiShuChild2 + parseInt(jishu_child2[p]);
    }
    //计算总和
    sumTotal = parseInt(sumJiShu) + parseInt(sumOuShu) + parseInt(sumJiShuChild1) + parseInt(sumJiShuChild2);

    //计算Luhm值
    var k = parseInt(sumTotal) % 10 == 0 ? 10 : parseInt(sumTotal) % 10;
    var luhm = 10 - k;
    
    //$.post("/supplier.php?m=Login&a=ajax_checkCardNo", {card_no: bankno}, function(data) {
    //    if (data.status != 1) {
    //        $("#sp_cardno").html("该银行卡号已注册，请联系相关专员").removeClass("routine").addClass("wrong");
    //        return false;
    //    }
    //});

    if (lastNum == luhm) {
        $("#sp_cardno").html("").removeClass("routine wrong");
        return true;
    }else {
        $("#sp_cardno").html("您输入的银行卡号错误！").removeClass("routine").addClass("wrong");
        return false;
    }
}
function SubmitRegister() {
    if (checkName() && checkConName() && checkPassword() && checkRePassword() && checkTwoPassword() && checkReTwoPassword()&&checkPhone() && checkEmail() && checkTrueName() && checkBankAccount() && checkCardNo()) {
        $("#myfrom").submit();
    } else {
        return false;
    }
}

/**
 * 在当前页面进行倒计时
 * @return {[type]} [description]
 */
function time(){
    var cb = $("#cb");
    var left_time = cb.attr("left_time");

    if(left_time == 0 || left_time == ""){
        cb.text("获取验证码");
        cb.attr("left_time",0);
    }else{
        cb.text("重新发送("+left_time+")");
        left_time--;
        cb.attr("left_time",left_time);
    }

}

/**
 * 异步向服务器获取验证码发送倒计时剩余时间
 */
function get_captcha_timer(){
    var cb = $("#cb");
    $.post("/supplier.php?m=login&a=ajax_get_timer",{},function(time){
//        $("#captcha_btn").attr("a",time);
        if(time > 0){
            cb.text("重新发送("+time+")");
            cb.attr("left_time",time);

        }else{
            cb.text("获取验证码");
            cb.attr("left_time",time);

        }

    });
}

/**
 * 异步发送验证码
 * 
 */
function ajax_send_captcha(){
    var cb = $("#cb");
    // var cn = checkName();//验证用户名
    var cp = checkPhone();//验证手机号

    if(!cp){
        return false;
    }

    if(cb.attr("left_time") != "" && cb.attr("left_time") != 0){
        return false;
    }

    // var username = $("input[name='account']").val();
    var phone = $("input[name='phone']").val(); 


    $.post("/supplier.php?m=login&a=ajax_send_captcha",{phone:phone},function(res){
        if(res.status){
            cb.attr("left_time",res.time);
        }else{
            alert(res.msg);
            if(res.time){
                cb.attr("left_time",res.time);
            }
        }
    });
}

function getCookie(sName) {
    var aCookie = document.cookie.split('; ');
    for (var i = 0; i < aCookie.length; i++) {
        var aCrumb = aCookie[i].split('=');
        if (sName == aCrumb[0])
            return unescape(aCrumb[1]);
    }
    return '';
}

$(document).ready(function(){
        get_captcha_timer();
        setInterval("time()",1000);
});
