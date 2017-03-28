// libao
$(document).ready(function() {
    getGameListForLibao(api_url, 1);
    //page
    $('a.we-ajax-page').live('click', function() {
        var page = $(this).attr('rev');
        getGameListForLibao(api_url, page);
    });
    
    function getGameListForLibao(api_host, page) {
        $('#we-libao-g-list').html('loading...');
        $.ajax({
            type: "get",
            async: true,
            url: api_host+"/getGameListForLibao",
            data:{'p': page},
            dataType: "jsonp",
            jsonp: "callback",
            jsonpCallback:"apiLibaoGameList",
            success: function(json) {
                $('#we-libao-g-list').html(json.game_list);
                $('#we-libao-g-page').html(json.page);
            },
            error: function() {}
        });
    }
});