//验证申请帐号
function checkUsername() {
    var username = $("input[name='username']").val();
    var tg_id = $("select[name='tg_id']").val();
    var bol = false;
    if (username === "") {
        $("#sp_username").html("不能为空！").removeClass("routine yes").addClass("wrong");
        return false;
    }
    $.ajaxSetup({async: false});
    $.post("/CpsCommon/ajax_checkUsername", {username: username, tg_id: tg_id}, function(data) {
        if (data.status == 1) {
            $("#sp_username").html("通过验证").removeClass('routine wrong').addClass("yes");
            bol = true;
        } else {
            $("#sp_username").html("该用户名不属于此推广链接").removeClass("routine yes").addClass("wrong");
        }
    });
    return bol;
}
function checkRoleName() {
    var role_name = $("input[name='role_name']").val();
    if (role_name === "") {
        $("#sp_role_name").html("不能为空！").removeClass("routine yes").addClass("wrong");
        return false;
    }
    $("#sp_role_name").html("");
    return true;
}

//验证申请帐号
function checkUsernamea() {
    var username = $("input[name='username']").val();
    var bol = false;
    if (username === "") {
        $("#sp_username").html("不能为空！").removeClass("routine yes").addClass("wrong");
        return false;
    }
    $.ajaxSetup({async: false});
    $.post("/CpsCommon/ajax_checkUsernamea", {username: username}, function(data) {
        if (data.status == 1) {
            $("#sp_username").html("通过验证").removeClass('routine wrong').addClass("yes");
            bol = true;
        } else {
            $("#sp_username").html("该用户名不属于此公会").removeClass("routine yes").addClass("wrong");
        }
    });
    return bol;
}
//验证申请副号帐号
function checkCopyUsernamea() {
    var username = $("input[name='cusername']").val();
    var bol = false;
    if (username === "") {
//        $("#sp_cusername").html("不能为空！").removeClass("routine yes").addClass("wrong");
        return false;
    }
    $.ajaxSetup({async: false});
    $.post("/CpsCommon/ajax_checkUsernamea", {username: username}, function(data) {
        if (data.status == 1) {
            $("#sp_cusername").html("通过验证").removeClass('routine wrong').addClass("yes");
            bol = true;
        } else {
            $("#sp_cusername").html("该用户名不属于此公会").removeClass("routine yes").addClass("wrong");
        }
    });
    return bol;
}
//验证申请帐号
function checkUsernamea_copy() {
    var username_copy = $("input[name='username_copy']").val();
    var bol = false;
    if (username_copy === "") {
        $("#sp_username_copy").html("不能为空！").removeClass("routine yes").addClass("wrong");
        return false;
    }
    $.ajaxSetup({async: false});
    $.post("/CpsCommon/ajax_checkUsernamea_copy", {username_copy: username_copy}, function(data) {
        if (data.status == 1) {
            $("#sp_username_copy").html("通过验证").removeClass('routine wrong').addClass("yes");
            bol = true;
        } else {
            $("#sp_username_copy").html("该用副号不属于此公会").removeClass("routine yes").addClass("wrong");
        }
    });
    return bol;
}

function checkPlayName() {
    var username = $("input[name='play_username']").val();
    var bol = false;
    if (username === "") {
        $("#sp_play_username").html("不能为空！").removeClass("routine yes").addClass("wrong");
        return false;
    }
    $.ajaxSetup({async: false});
    $.post("/CpsCommon/ajax_checkUsernamea", {username: username}, function(data) {
        if (data.status == 1) {
            $("#sp_play_username").html("通过验证").removeClass('routine wrong').addClass("yes");
            bol = true;
        } else {
            $("#sp_play_username").html("该用户名不属于此公会").removeClass("routine yes").addClass("wrong");
        }
    });
    return bol;
}

function checkCoin() {
    var coin = $("input[name='coin']").val();
    if (coin === "") {
        $("#sp_coin").html("不能为空！").removeClass("routine yes").addClass("wrong");
        return false;
    }
    if (coin <= 0 || isNaN(coin)) {
        $("#sp_coin").html("输入错误！").removeClass("routine yes").addClass("wrong");
        return false;
    }
    $("#sp_coin").html("");
    return true;
}

function checkMoney() {
    var bol = false;
    var money = $("input[name='money']").val();

    if (money === "") {
        $("#sp_money").html("不能为空！").removeClass("routine yes").addClass("wrong");
        return false;
    }

    if (money <= 0 || isNaN(money) || money > 1000) {
        $("#sp_money").html("输入错误！").removeClass("routine yes").addClass("wrong");
        return false;
    }

    $.ajaxSetup({async: false});
    $.post("/CpsCommon/ajax_checkMoney", {money: money}, function(data) {
        if (data.status == 1) {
            var mon = money * 10000 * 35 / 10000 / 100;
            $("#sp_money").html("代充成本" + mon).removeClass('routine wrong').addClass("yes");
            bol = true;
        } else {
            $("#sp_money").html("超过可申请金额").removeClass("routine yes").addClass("wrong");
        }
    });
    return bol;

}
//验证二级密码
function checkTwoPwd() {
    var twopassword = $("input[name='twopassword']").val();
    var bol = false;
    if (twopassword === "") {
        $("#sp_twopwd").html("不能为空！").removeClass("routine yes").addClass("wrong");
        return false;
    }
    $.ajaxSetup({async: false});
    $.post("/CpsCommon/ajax_checkTwoPwd", {twopassword: twopassword}, function(data) {
        if (data.status == 1) {
            $("#sp_twopwd").html("通过验证").removeClass('routine wrong').addClass("yes");
            bol = true;
        } else {
            $("#sp_twopwd").html("二级密码错误").removeClass("routine yes").addClass("wrong");
        }
    });
    return bol;
}


//新服扶持申请提交、固定扶持申请提交
function SubmitSupport() {
    if (checkUsernamea() && checkRoleName()) {
        $("#myfrom").submit();
    } else {
        return false;
    }
}
//新服扶持申请修改
function SaveSupport() {
    if(confirm("确定修改?")){
    }else{
        return false;
    }
    if ((checkUsernamea() || checkUsernamea_copy())&& checkRoleName()) {
        $("#myfrom").submit();
    } else {
        return false;
    }
}

//消费扶持提交
function SubmitConsume() {
    if (checkUsernamea() && checkRoleName() && checkPlayName() && checkCoin()) {
        $("#myfrom").submit();
    } else {
        return false;
    }
}

//首充提交
function SubmitFirst() {
    if (checkTwoPwd()) {
        $("#myfrom").submit();
    } else {
        return false;
    }
}

//内充提交
function SubmitGamePay() {
    if (checkUsernamea() && checkMoney()) {
        $("#myfrom").submit();
    } else {
        return false;
    }
}
//二级密码验证
function SubmitTpwSession() {
    if (checkTwoPwd()) {
        $("#myfrom").submit();
    } else {
        return false;
    }
}

