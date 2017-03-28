$(document).ready(function() {

    $("#btn_email").live('click', function() {

       ChkEmail();
        if (!bValid_email) {
            return false;
        }
        var email = $("#user_email").val();
        $.ajax({
            type: "get",
            async: true,
            url: "/userEmailBind",
            data: {
                email: email
            },
            dataType: "jsonp",
            jsonp: "callback",
            jsonpCallback: "apiUserEmailBind",
            success: function(json) {
                if (json.result == '1') {
                    $('#eml_msg').html(json.msg);
                }
                if (json.result == '0') {
                    alert(json.msg);
                }
            },
            error: function(staus) {
                alert('系统繁忙，请稍后再试!');
            }
        });

    });

});

function ChkEmail() {
    bValid_email = false;
    var mail_str = $("#user_email").val();
    if (mail_str == "") {
        alert('邮箱不能为空!!');  
    } else if (mail_str.match(/^[-_.a-z0-9A-Z]+([-_.][a-zA-Z0-9]+)*@([a-zA-Z0-9]+([-_.][a-zA-Z0-9]+))+$/i)) { 
         bValid_email = true;
    } else {
        alert('邮箱格式不正确!!');  

    }
}
