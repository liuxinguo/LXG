// JavaScript Document
$(function() {

    $('.pay_r_czje ul li a').live('click', function() {
        $('.pay_r_czje ul li a').attr('class', '');
        $(this).addClass('li_je');
        gmoney = $(this).html();
        $('#pay_amount').val(gmoney);
        on_amount_change(gmoney);
    });

    //$('.pay_r .bb').eq(0).show().nextAll().hide();
    //$('.pay_l ul li').eq(0).addClass('li_h').siblings().removeClass('li_h');

});

$(function() {
    $('.pay_r_box .cc').eq(0).show().nextAll().hide();
    //$('.pay_r_czfs ul li').eq(0).addClass('li_s').siblings().removeClass('li_s');
    //$('.pay_r_czfs ul li').click(function() {
        //$('.pay_r_czfs ul li').attr('class', '');
        //$(this).addClass('li_s');
        //$('.pay_r_box .cc').hide().eq($('.pay_r_czfs ul li').index(this)).show().nextAll().css("display", "none");
        //$('.close').click();
   // });
});


$(document).ready(function() {
    $(".yh1").click(function() {
        $(".ycyh").show();
        $(".yh2").show();
        $(this).hide();
    });
    $(".yh2").click(function() {
        $(".ycyh").hide();
        $(".yh1").show();
        $(this).hide();
    }).hide();
});

function showGameList() {
	$.getJSON(api_url + "/getPayGame?rnd=" + Math.random() + "&format=json&jsoncallback=?",
        function(data) {
            $('#pay_game_box').html(data);
        });
    $(".yx_box").css("display", "block");
    $(".yx_box_1").css("display", "none");
}

$(document).ready(function() {
    $('.close').live('click', function() {
        $(".yx_box").css("display", "none");
    });
});

$(document).ready(function() {
    $(".yx2").click(function() {
        showServerList($('#game_id').val(),0);
        //$(".yx_box_1").css("display", "block");
        //$(".yx_box").css("display", "none");
    });
    $('.close').live('click', function() {
        $(".yx_box_1").css("display", "none");
    });
});

$(function() {
    $('.yx_box2 .dd').eq(0).show().nextAll().hide();
    $('.yx_box1 ul li').eq(0).addClass('yx_h').siblings().removeClass('yx_h');
    $('.yx_box1 ul li').live('click', function() {
        $('.yx_box1 ul li').attr('class', '');
        $(this).addClass('yx_h');
        $('.yx_box2 .dd').hide().eq($('.yx_box1 ul li').index(this)).css('display', 'inline').nextAll().css("display", "none");
    });
});

$(function() {
    $('.yx_box4 .ee').eq(0).show().nextAll().hide();
    $('.yx_box3 ul li').eq(0).addClass('yx_h').siblings().removeClass('yx_h');
    $('.yx_box3 ul li').live('click', function() {
        $('.yx_box3 ul li').attr('class', '');
        $(this).addClass('yx_h');
        $('.yx_box4 .ee').hide().eq($('.yx_box3 ul li').index(this)).css('display', 'inline').nextAll().css("display", "none");
    });
});



function showServerList(game_id, server_id) {
    //alert(game_id);
    $('#game_id').val(game_id);
    $(".yx_box").hide();
    $.ajax({
        type: "get",
        async: true,
        url: api_url + "/pay_get_server",
        data: {
            'gid': game_id,
            'rand': Math.random()
        },
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback: "pay_get_server",
        success: function(data) {
            if (data) {
                //var data=eval("("+result+")");
                $('#changeGame').html(data.game.game_name)
                $('#game_rate').val(data.game.game_rate);
                $('#game_paytorole').val(data.game.game_paytorole);
                if (data.game.game_currency == '') data.game.game_currency = "元宝";
                $("span[name='game_curr']").html(data.game.game_currency);
                $("#neiye_pay_page_info").html("");
                $("#neiye_pay_page_info_c").hide();

                if (data.game.game_pagestatus == 1) {
                    if (Trim(data.game.game_pageinfo) != '') {
                        $("#neiye_pay_page_info_c").show();
                        $("#neiye_pay_page_info").html(data.game.game_pageinfo);
                    }
                }
                
                    $('#tip').hide();
                
                    $('#type_tip').hide();
                
                    hide_option("no"); //德州扑克
               

                if ($('#game_paytorole').val() == 1) {
                    //get_role(0);
                    $('#li_game_rname').show();
                } else {
                    $('#li_game_rname').hide();
                }
                on_rate_change();

                //加载服务器框
                $('#pay_server_box').html(data.html);
                if (server_id > 0) {
                    var select_server = $('#server_' + server_id).val();
                    selectServer(server_id, select_server);
                } else {
                    selectServer(0, "选择游戏服务器");
                    $(".yx_box_1").show();
                }

            } else {
                alert('服务器列表为空');
                showGameList();
                return false;
            }
        },
        error: function() {
            showGameList();
            return false;
        }
    });
}

function selectServer(sid, sname) {
    $('#server_id').val(sid);
    $('#changeServer').html(sname);
    $('.yx_box_1').hide();
    get_role(0);
}


function on_amount_change(obj) {
    if (obj == '0') {
        $('#other_amount').show();
    } else {
        $('#other_amount').hide();
    }
    on_rate_change();
}



function hide_select(pay_platform) {
    if (pay_platform == 'platform') {
        closeGameList();
        closeServerList();
        $('.pay_r_czfs ul li').attr('class', '');
        $('#trans_platform').addClass('li_s');
        $('#pay_tye').val('1');
        //$('#game_id').val('');
        //$('#server_id').val('');
	    $('#game_rate').val('1.00');
        $('#pay_platform').val('platform');
        $('#pay_type_desc').html('2.平台币充值');
        $('#change_platform_box').show();
        $('#change_game_box').hide();
        on_rate_change();
    } else {
        $('.pay_r_czfs ul li').attr('class', '');
        $('#trans_game').addClass('li_s');
        $('#pay_tye').val('0');
        $('#pay_msg').html('');
        $('#pay_platform').val('');
        $('#pay_type_desc').html('2.选择游戏');
        $('#change_platform_box').hide();
        $('#change_game_box').show();
        if ($('#game_paytorole').val() == 1) {
            get_role(0);
            $('#li_game_rname').show();
        } else {
            $('#li_game_rname').hide();
        }
    }
}

function get_role(refresh) {
    if ($('#game_paytorole').val() == 1) {
        var gid = $('#game_id').val();
        var sid = $('#server_id').val();
        var mname = encodeURIComponent($('#member_name').val());
        var obj_role = document.getElementById('re_game_rid');
        $('#re_game_rid').html('');
        $("#re_game_rname").val('');
        obj_role.options.add(new Option("", 0)); //  更改角色显示方式 隐藏此行
        $.getJSON(api_url + "/getserverrole?rnd=" + Math.random() + "&gid=" + gid + "&sid=" + sid + "&mname=" + mname + "&refresh="+refresh+"&format=json&jsoncallback=?", function(data) {
            if (data != "") {
                var obj = data;
                for (var i in obj) {
                    obj_role.options.add(new Option(obj[i].role_nickname, obj[i].role_id));
                    $("#re_game_rname").val(obj[i].role_nickname);
                    $("#re_game_rid").val(obj[i].role_id);
                }
            }
        });
    }
}


function blur_other_money(obj){
    if(obj.value==''){
        obj.value='其他金额...'
    }
    $('.pay_r_czje ul li a').attr('class', '');
    gmoney = obj.value;
}

function focus_other_money(obj){
    if(obj.value == '其他金额...'){
        obj.value='';
    }
    $('.pay_r_czje ul li a').attr('class', '');
    gmoney = obj.value;
}

function change_other_money(obj){
    $('.pay_r_czje ul li a').attr('class', '');
    var r = /^\+?[1-9][0-9]*$/;　　//正整数
    if(!r.test(obj.value)){
        alert('请输入正确的金额');
        return false;
    }else{
        if(obj.value<10){
            alert('充值金额不能小于10元');
            return false;
        }else{
            $('#pay_amount').val(obj.value);
            on_rate_change();
        }
    }
    gmoney = obj.value;
}



function closeGameList() {
    $('#pay_game_box').hide();
}

function closeServerList() {
    $('#pay_server_box').hide();
}

function checkedRaido(radioId) {
    document.getElementById(radioId).checked = 'checked';
}

function Trim(str) {
    return str.replace(/(^\s*)|(\s*$)/g, "");
}

function trim(str) {
    return str.replace(/(^\s*)|(\s*$)/g, "");
}

$(document).ready(function() {
    var rmn = $('#re_member_name');
    rmn.keyup(function(){
        if(rmn.val() == $('#member_name').val()) {
            if($('#li_game_rname').is(":visible")) {
                get_role(0);
            }
        }
    });
});