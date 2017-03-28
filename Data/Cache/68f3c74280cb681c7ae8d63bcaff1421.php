<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=7" /><title>游戏盒子</title><meta name="keywords" content=""/><meta name="description" content=""/><link href="http://gamebox.49you.com/css/style.css" rel="stylesheet" type="text/css" /><script language="javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script></head><body><div class="wrap_div"><div class="wrap1_div"><div class="yxlx_div"><p class="yxlx_p1 n_yxfl2"><a href="#" rev2="class" rev="0" class="we-ajax-game-type we-g-t-class">全部</a>&nbsp;&nbsp;

			<a href="#" rev2="class" rev="1" class="we-ajax-game-type we-g-t-class" >即时战斗</a>&nbsp;&nbsp;

			<a href="#" rev2="class" rev="2" class="we-ajax-game-type we-g-t-class">武侠闯关</a>&nbsp;&nbsp;

			<a href="#" rev2="class" rev="3" class="we-ajax-game-type we-g-t-class">神话修真</a>&nbsp;&nbsp;

			<a href="#" rev2="class" rev="4" class="we-ajax-game-type we-g-t-class">历史题材</a>&nbsp;&nbsp;

			<a href="#" rev2="class" rev="5" class="we-ajax-game-type we-g-t-class">Q版</a>&nbsp;&nbsp;

			<a href="#" rev2="class" rev="6" class="we-ajax-game-type we-g-t-class">其他</a></p><p class="yxlx_p2 n_yxfl2"><a href="#" rev2="zhimu" rev="0" class="we-ajax-game-type we-g-t-zhimu">全部</a>&nbsp;&nbsp;

			<a href="#" rev2="zhimu" rev="1" class="we-ajax-game-type we-g-t-zhimu">ABC</a>&nbsp;&nbsp;

			<a href="#" rev2="zhimu" rev="2" class="we-ajax-game-type we-g-t-zhimu">DEF</a>&nbsp;&nbsp;

			<a href="#" rev2="zhimu" rev="3" class="we-ajax-game-type we-g-t-zhimu">GHI</a>&nbsp;&nbsp;

			<a href="#" rev2="zhimu" rev="4" class="we-ajax-game-type we-g-t-zhimu">JKL</a>&nbsp;&nbsp;

			<a href="#" rev2="zhimu" rev="5" class="we-ajax-game-type we-g-t-zhimu">MNO</a>&nbsp;&nbsp;

			<a href="#" rev2="zhimu" rev="6" class="we-ajax-game-type we-g-t-zhimu">PQR</a>&nbsp;&nbsp;

			<a href="#" rev2="zhimu" rev="7" class="we-ajax-game-type we-g-t-zhimu">STU</a>&nbsp;&nbsp;

			<a href="#" rev2="zhimu" rev="8" class="we-ajax-game-type we-g-t-zhimu">VWXYZ</a></p></div><ul id="we-game-ajax-list" class="r_yxlb yxlist_ul"><div style="display:none;"><span rev="0" id="we-ajax-game-class"></span><span rev="0" id="we-ajax-game-feature"></span><span rev="0" id="we-ajax-game-zhimu"></span></div></ul><div id="we-game-ajax-page" class="yxlistfy_div fy_nav"></div></div></div><script src="http://gamebox.49you.com/js/jquery-1.7.2.js"></script><script type="text/javascript">// youxi daquan

var pnum = 16;

$(document).ready(function() {

    //page

    var page = $(this).attr('rev');

        var class_type = $('#we-ajax-game-class').attr('rev');

        var feature_type = $('#we-ajax-game-feature').attr('rev');

        var zhimu_type = $('#we-ajax-game-zhimu').attr('rev');

        $('#we-game-ajax-list').html('<img src="/images/hezi/images/loading.gif" style="margin: 60px auto 0px 350px;">');

        $.ajax({

            type: "get",

            async: true,

            url: api_hezi+"/boxGameListBySearch",

            data:{'p': page, 'class_type': class_type, 'feature_type' : feature_type, 'zhimu_type' : zhimu_type,"pnum":pnum},

            dataType: "jsonp",

            jsonp: "callback",

            jsonpCallback:"boxGameListBySearch",

            success: function(json) {

                $('#we-game-ajax-list').html(json.game_list);

                $('#we-game-ajax-page').html(json.page);

                $('#we-game-ajax-page a').each(function(i,n){

                    $('#we-game-ajax-page a').eq(i).html("<span>"+$('#we-game-ajax-page a').eq(i).html()+"</span>");

                });

            },

            error: function() {}

        });

    $('a.we-ajax-page').live('click', function() {

        var page = $(this).attr('rev');

        if(page == '') page = 10;

        var class_type = $('#we-ajax-game-class').attr('rev');

        var feature_type = $('#we-ajax-game-feature').attr('rev');

        var zhimu_type = $('#we-ajax-game-zhimu').attr('rev');

        $('#we-game-ajax-list').html('<img src="/images/hezi/images/loading.gif" style="margin: 60px auto 0px 350px;">');

        $.ajax({

            type: "get",

            async: true,

            url: api_hezi+"/boxGameListBySearch",

            data:{'p': page, 'class_type': class_type, 'feature_type' : feature_type, 'zhimu_type' : zhimu_type,"pnum":pnum},

            dataType: "jsonp",

            jsonp: "callback",

            jsonpCallback:"boxGameListBySearch",

            success: function(json) {

                $('#we-game-ajax-list').html(json.game_list);

                $('#we-game-ajax-page').html(json.page);

                $('#we-game-ajax-page a').each(function(i,n){

                    $('#we-game-ajax-page a').eq(i).html("<span>"+$('#we-game-ajax-page a').eq(i).html()+"</span>");

                });

            },

            error: function() {}

        });

    });



    //type

    $('a.we-ajax-game-type').live('click', function() {

        var id = $(this).attr('rev'), types = $(this).attr('rev2');



        //chang style

        $('.we-g-t-'+types).removeAttr('style');

        $(this).attr('style', 'background:#00a5e5; color:#fff; cursor:pointer;');



        $('#we-ajax-game-'+types).attr('rev', id);

        var class_type = $('#we-ajax-game-class').attr('rev');

        var feature_type = $('#we-ajax-game-feature').attr('rev');

        var zhimu_type = $('#we-ajax-game-zhimu').attr('rev');

        $('#we-game-ajax-list').html('<img src="/images/hezi/images/loading.gif" style="margin: 60px auto 0px 350px;">');

        $.ajax({

            type: "get",

            async: true,

            url: api_hezi+"/boxGameListBySearch",

            data:{'class_type': class_type, 'feature_type' : feature_type, 'zhimu_type' : zhimu_type,"pnum":pnum},

            dataType: "jsonp",

            jsonp: "callback",

            jsonpCallback:"boxGameListBySearch",

            success: function(json) {

                $('#we-game-ajax-list').html(json.game_list);

                $('#we-game-ajax-page').html(json.page);

                $('#we-game-ajax-page a').each(function(i,n){

                    $('#we-game-ajax-page a').eq(i).html("<span>"+$('#we-game-ajax-page a').eq(i).html()+"</span>");

                });

            },

            error: function() {}

        });

    });

    

});





 </script></body></html>