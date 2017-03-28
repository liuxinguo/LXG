$(document).ready(function() {
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/userInfo",
        data: {},
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback: "apiGetUserInfo",
        success: function(json) {
            $('#we-aj-u-info').html(json.info);
            $('#we-a-u-n').html(json.username);
            $('#we-a-u-i-c').html(json.idcard);
            $('#we-a-a-saft').html(json.safe);
            $('#we-a-a-w-s').html(json.safe_list);
        },
        error: function() {}
    });

   
        return false;
    });
