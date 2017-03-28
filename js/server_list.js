$(document).ready(function() {
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/kfserverList",
        data:{},
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback:"apiServerList",
        success: function(json) {
            $('#we-a-s-l-c').html(json.msg);
        },
        error: function() {}
    });

    $('a.we-ajax-page').live('click', function() {
        var page = $(this).attr('rev');
        $('#we-a-s-l-c').html('loading...');
        $.ajax({
            type: "get",
            async: true,
            url: api_url+"/kfserverList",
            data:{'p': page},
            dataType: "jsonp",
            jsonp: "callback",
            jsonpCallback:"apiServerList",
            success: function(json) {
                $('#we-a-s-l-c').html(json.msg);
            },
            error: function() {}
        });
    });
});