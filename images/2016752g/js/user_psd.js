$(document).ready(function() {
    $("#btn_mod_psd").live('click', function() {
        btn_mod_psd();
    });
});

function btn_mod_psd() {
    var oldpsw = $("#oldpsw").val();
    var psw = $("#psw").val();
    var psw2 = $("#psw2").val();
    if (oldpsw == '' || psw == '' || psw2 == '') {
        alert('密码不能为空！');
        return false;
    }
    if (psw != psw2) {
        alert('两次密码输入不一致，请重新输入！');
        return false;
    }

    $.ajax({
        type: "get",
        async: true,
        url: "/userRenZhengPsd",
        data:{
            oldpsw: oldpsw,
            psw: psw,
            psw2: psw2
        },
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback:"apiUserRenZhengPsd",
        success: function(json) {
            if (json.result == '0') {
                alert(json.msg);
            }
            if (json.result == '1') {
                alert(json.msg);
                exit();
               window.location.href = json.url;
            }
        },
        error: function(staus) {
            alert('系统繁忙，请稍后再试!');
        }
    });
}