//login
$(document).ready(function() {
    $("#we-ajax-s-list").html('<img src="'+site_url+'/images/loading.gif" style="margin: 60px auto 0px 117px;">');
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/serverlist",
        data:{},
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback:"apiGetServerList",
        success: function(json) {
            $("#we-ajax-s-list").html(json.serverlist);
        },
        error: function() {}
    });
});