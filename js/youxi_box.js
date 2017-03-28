$(document).ready(function() {
    $('.sele_game').myYouxiBox('game_box_con');
    getBoxList();
});

$.fn.myYouxiBox = function(divId) {
    var div = $("#" + divId);
    var self = $(this);
    self.live('mouseenter', function() {
        div.show();
    });
    div.live('mouseleave', function() {
        setTimeout(function() {
            div.hide();
        }, 0);
    });
    return this;
}

function getBoxList() {
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/headerBoxGameList",
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback:"apiHeaderBoxGameList",
        success: function(json) {
            $('#game_box_con').html(json.bl);
        },
        error: function() {}
    });
}