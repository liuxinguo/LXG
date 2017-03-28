$(function() {
    //查询
    $("#link_select").click(function() {
        var game_id = $("input[name='game_id']").val();
        var con_name = $("input[name='con_name']").val();
        var tg_id = $("input[name='tg_id']").val();
        var server_id = $("input[name='server_id']").val();
        show(game_id,server_id,con_name, tg_id);
    });
    $(".page a").live("click", function() {
        var game_id = $("input[name='game_id']").val();
        var con_name = $("input[name='con_name']").val();
        var tg_id = $("input[name='tg_id']").val();
        var page = $(this).attr("val");
         var server_id = $("input[name='server_id']").val();
        show(game_id,server_id,con_name, tg_id, page);
    });
    $(".page").find("input").live("blur keydown", function(event) {
        if (event.type == "blur") {
            var page = $(this).val();
            if (isNaN(page)) {
                alert("请输入正确的页码");
                $(this).val("").focus();
                return;
            }
            var game_id = $("input[name='game_id']").val();
            var con_name = $("input[name='con_name']").val();
            var tg_id = $("input[name='tg_id']").val();
            var server_id = $("input[name='server_id']").val();
            show(game_id,server_id,con_name, tg_id, page);
        } else {
            if (event.which == "13") {
                $(this).trigger("blur");
            }
        }

    });
    //删除链接
    $(".del").live("click", function() {
        if (confirm("您确定要删除该链接？")) {
            var tg_id = $(this).attr("val");
            var url = "/supplier.php?m=Index&a=ajax_del";
            $.post(url, {tg_id: tg_id}, function(data) {
                $("#tr" + tg_id).remove();
//                alert(data.msg);
            });
        }
    });

    //修改公会名称
    $(".con_name").live("click change blur", function(event) {
        if (event.type == "click") {
            $(this).css({"cursor": "auto", "border-width": "none", "font-family": "Microsoft YaHei,'SimSun',Geneva,sans-serif", "border-style": "solid", "border-color": "gray", "color": "#333333;", "font-size": "14px"});
        } else if (event.type == "change") {
            var val = $(this).val();
            var tg_id = getNum($(this).parent().parent().attr("id"));
            var url = "/CpsCommon/ajax_edit_con_name";
            $.post(url, {con_name: val, tg_id: tg_id});
        } else {
            $(this).css({"border-width": "0px", "border-style": "none", "font-family": "Microsoft YaHei,'SimSun',Geneva,sans-serif", "border-color": "white", "color": "#333333;", "font-size": "14px"});
        }
    });
});
function show(game_id,server_id,con_name, tg_id, page) {
    var url = "/supplier.php?m=Index&a=ajax_link_select";
    $.post(url, {game_id: game_id,server_id:server_id,con_name: con_name, page: page, tg_id: tg_id}, function(data) {
        if (data) {
            if (data.status == 1) {
                alert("请输入正确的页码！");
                return;
            } else if (data.status == -1) {
                $(".ljsc").find("tbody").empty();
                $(".page").empty();
                return;
            } else {
                $(".ljsc").find("tbody").empty();
                $.each(data.data, function(i, v) {
                    $(".ljsc").find("tbody").append("<tr id='tr" + v.tg_id + "'></tr>");
                    var tr = $(".ljsc").find("tbody").find("tr").eq(i);
                    tr.append("<td>" + v.tg_id + "</td>");
                    if(!v.game_name){
                        v.game_name = '平台';
                    }
                    tr.append("<td>" + v.game_name + "</td>");
                    if (v.server_id == 0) {
                            tr.append("<td>新服</td>");
                        } else {
                            tr.append("<td>固定服</td>");
                        }
                     if (v.server_name != null) {
                            tr.append("<td>" + v.server_name + "</td>");
                        } else {
                            tr.append("<td>无</td>");
                        }
                    
                    tr.append("<td><a href='supplier.php?m=Index&a=link_detail&tg_id=" + v.tg_id + "'>http://www." + data.domain + "/u/" + v.short_url + "</a></td>");
                    tr.append("<td><input style='font-family:Microsoft YaHei,SimSun,Geneva,sans-serif; font-size: 14px;' class='game_name con_name' value='" + (v.con_name ? v.con_name : '') + "' /></td>");
                    tr.append("<td class='czrs'>" + v.reg_count.reg_count+"/"+v.reg_count.registe_ip + "</td><td class='czrs'>" + v.money[0].count + "</td><td class='czze'>" + (v.money[0].money) / 100 + "</td>");
                    tr.append("<td class='czze'><a href='supplier.php?m=Index&a=link_detail&tg_id=" + v.tg_id + "'>充值查询</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='supplier.php?m=Index&a=player&tg_id=" + v.tg_id + "'>玩家查询</a></td>");
                    //tr.append("<td class='czrs'><a class='del' val='" + v.tg_id + "'>删&nbsp;&nbsp;除</a></td>");
                });
                $(".page").html(data.page);
            }

        }
    });
}