$(function() {
    //生成链接
    $(".sc").click(function() {
        if (checkNum()) {
            var game_id = $("select[name='game_id']").val();
            var server_id = $("select[name='server_id']").val();
            var swf_id = $("select[name='swf_id']").val();
            if (game_id == 0) {
                alert("请选择游戏！");
                return;
            }
			if (swf_id == 0) {
                alert("请选择游戏素材！");
                return;
            }
            var num = $("input[name='num']").val();
            var url = "/CpsCommon/ajax_links";
            $.post(url, {game_id: game_id, server_id: server_id, swf_id: swf_id,num: num}, function(datas) {
				
                if (datas.domain) {
					
                    $(".ljsc").find("tbody").empty();
                    $.each(datas.data, function(i, v) {
                        $(".ljsc").find("tbody").append("<tr id='tr" + v.tg_id + "'></tr>");
                        var tr = $(".ljsc").find("tbody").find("tr").eq(i);
                        tr.append("<td>" + v.tg_id + "</td>");
                        tr.append("<td>http://www." + datas.domain + "/u/" + v.short_url + "</td>");
                        if (v.con_name != "") {
                            tr.append("<td><input class='put' type='text' value='" + v.con_name + "' /></td>");
                        } else {
                            tr.append("<td><input class='put' type='text' value='' /></td>");
                        }
                        if (v.server_id == 0) {
                            tr.append("<td>最新服</td>");
                        } else {
                           // var server_name = $("#server_name").val();
                          //  tr.append("<td>"+server_name+"</td>");
						   tr.append("<td>双线"+server_id+"区</td>");
                        }
                        tr.append("<td><a class='del' val='" + v.tg_id + "'>删&nbsp;&nbsp;除</a></td>");
                    });
                   // ck();
                } else if (datas == -1) {
                    alert("请选择游戏！");
                    return;
                } else if (datas == -2) {
                    alert("非法操作！");
                    return;
                } else if (datas == -3) {
                    alert("你没有权限生成链接！");
                    return;
                } else {
                    alert("生成链接失败！");
                    return;
                }
                $(".ljsc").find("tbody").find("tr:odd").addClass("bc");
                $(".ljsc").find("thead").find("span:eq(0)").html("已生成链接数:" + datas.data.length);
            });
        }
    });

    //删除链接
    $(".del").live("click", function() {
        if (confirm("您确定要删除该链接？")) {
            var tg_id = $(this).attr("val");
            var url = "/CpsCommon/ajax_del";
            $.post(url, {tg_id: tg_id}, function(data) {
                $("#tr" + tg_id).remove();
                alert(data.msg);
            });
        }
    });
    //修改公会名称
    $(".put").live("blur", function() {
        var val = $(this).val();
        var tg_id = getNum($(this).parent().parent().attr("id"));
        var url = "/CpsCommon/ajax_edit_con_name";
        $.post(url, {con_name: val, tg_id: tg_id});
    });
});

function checkNum() {
    var val = $("input[name='num']").val();
    if (val == "" || val == 0) {
        alert("请输入生成链接数！");
        return false;
    }
    if (!isNaN(val)) {
        if (val > 10) {
            alert("生成链接数过多！");
            return false;
        }
    } else {
        alert("请输入数字");
        return false;
    }
    return true;
}