$(document).ready(function() {
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/userMessage",
        data:{},
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback:"apiGetUserMessage",
        success: function(json) {
            $('#we-a-m-list').html(json.msg);
            $('#we-u-a-page').html(json.page);
            $('#we-u-a-m-c').html(json.count);
        },
        error: function() {}
    });

    //page
    $('a.we-ajax-page').live('click', function() {
        var page = $(this).attr('rev');
        $('#we-a-m-list').html('loading...');
        $.ajax({
            type: "get",
            async: true,
            url: api_url+"/userMessage",
            data:{'p': page},
            dataType: "jsonp",
            jsonp: "callback",
            jsonpCallback:"apiGetUserMessage",
            success: function(json) {
                $('#we-a-m-list').html(json.msg);
                $('#we-u-a-page').html(json.page);
            },
            error: function() {}
        });
    });

    //read
    $('a.we-a-read').live('click', function() {
        var read = $(this);
        var msg_id = read.attr('msgid');
        var mark = read.attr('mark');
        if(mark != '0') {
            $.ajax({
                type: "get",
                async: true,
                url: api_url+"/userMessageStatus",
                data:{'msg_id':msg_id},
                dataType: "jsonp",
                jsonp: "callback",
                jsonpCallback:"apiUserMessageStatus",
                success: function(json) {
                    $('.we-u-r-'+msg_id).html('已读');
                    read.attr('mark','0')
                },
                error: function() {}
            });
        }
        $('.we-u-m-h-'+msg_id).toggle(50, function(){
            if($(this).is(":visible")) {
                read.html('点击收起');
            }else{
                read.html('点击阅读');
            }
        });
    });
});