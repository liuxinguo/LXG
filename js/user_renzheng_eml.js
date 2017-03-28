$(document).ready(function() {
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/userEmailHasBind",
        data: {
        },
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback: "apiUserEmailHasBind",
        success: function(json) {
            if (json.result == '1') {
                $('#zl4').html(json.msg);
            }
        },
        error: function(staus) {
            alert('系统繁忙，请稍后再试!');
        }
    });

    $("#btn_email").live('click', function() {
        var email = $("#user_email").val();
        $.ajax({
            type: "get",
            async: true,
            url: api_url+"/userEmailBind",
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