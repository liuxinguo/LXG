// youxi daquan
$(document).ready(function() {
    //page
    $('a.we-ajax-page').live('click', function() {
        var page = $(this).attr('rev');
        var class_type = $('#we-ajax-game-class').attr('rev');
        var feature_type = $('#we-ajax-game-feature').attr('rev');
        var zhimu_type = $('#we-ajax-game-zhimu').attr('rev');
        $('#we-game-ajax-list').html('<img src="'+site_url+'/images/loading.gif" style="margin: 60px auto 0px 350px;">');
        $.ajax({
            type: "get",
            async: true,
            url: api_url+"/getGameListBySearch",
            data:{'p': page, 'class_type': class_type, 'feature_type' : feature_type, 'zhimu_type' : zhimu_type},
            dataType: "jsonp",
            jsonp: "callback",
            jsonpCallback:"getGameListBySearch",
            success: function(json) {
                $('#we-game-ajax-list').html(json.game_list);
                $('#we-game-ajax-page').html(json.page);
            },
            error: function() {}
        });
    });

    //type
    $('span.we-ajax-game-type').live('click', function() {
        var id = $(this).attr('rev'), types = $(this).attr('rev2');

        //chang style
        $('.we-g-t-'+types).removeAttr('style');
        $(this).attr('style', 'background:#00a5e5; color:#fff; cursor:pointer;');

        $('#we-ajax-game-'+types).attr('rev', id);
        var class_type = $('#we-ajax-game-class').attr('rev');
        var feature_type = $('#we-ajax-game-feature').attr('rev');
        var zhimu_type = $('#we-ajax-game-zhimu').attr('rev');
        $('#we-game-ajax-list').html('<img src="'+site_url+'/images/loading.gif" style="margin: 60px auto 0px 350px;">');
        $.ajax({
            type: "get",
            async: true,
			url: api_url+"/getGameListBySearch",
            data:{'class_type': class_type, 'feature_type' : feature_type, 'zhimu_type' : zhimu_type},
            dataType: "jsonp",
            jsonp: "callback",
            jsonpCallback:"getGameListBySearch",
            success: function(json) {
                $('#we-game-ajax-list').html(json.game_list);
                $('#we-game-ajax-page').html(json.page);
            },
            error: function() {}
        });
    });
    
});

//for search key up
function submit_search(event) {
    if (event.keyCode == 13) {
        $('#we-yxname-search').click();
    }
}