$(document).ready(function() {
    $("#btn_ask").live('click', function() {
        var question1 = $("#question1").val();
        var answer1 = $("#answer1").val();
        var oldanswer = $("#oldanswer").val();
        var new_ask = $("#new_ask").val();
        var newanswer = $("#newanswer").val();
        $.ajax({
            type: "get",
            async: true,
            url: api_url+"/userRenZhengAsk",
            data:{
                question1: question1,
                answer1: answer1,
                oldanswer: oldanswer,
                new_ask: new_ask,
                newanswer: newanswer
            },
            dataType: "jsonp",
            jsonp: "callback",
            jsonpCallback:"apiUserRenZhengAsk",
            success: function(json) {
                if (json.result == '0') {
                    alert(json.msg);
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

    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/userRenZhengAskRes",
        data:{},
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback:"apiUserRenZhengAskRes",
        success: function(json) {
            if (json.result == '1') {
                $('#zl6').html(json.msg);
            }
        },
        error: function(staus) {
            alert('系统繁忙，请稍后再试!');
        }
    });
});