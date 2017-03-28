//login
$(document).ready(function() {
    $("#we-ajax-g-list").html('<img src="'+site_url+'/images/loading.gif" style="margin: 60px auto 0px 117px;">');
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/getGameList",
        data:{},
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback:"apiGetGameList",
        success: function(json) {
            $("#we-ajax-g-list").html(json.gamelist);
        },
        error: function() {}
    });
});