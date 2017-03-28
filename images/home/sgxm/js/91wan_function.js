
//添加收藏夹
function addBookmark(url,title){
    url = url || window.location.href;;
    title = title || document.title;
    if (window.sidebar) {
        window.sidebar.addPanel(title, url,"");
    } else if( document.all ) {
        window.external.AddFavorite( url, title);
    } else {
        alert('加入收藏失败，请使用 Ctrl+D 进行添加');
        return true;
    }
}



function setMouse(a, b, c, d, e) {
    if (!document.getElementById(a + "_Clicks")) return;
    $("#" + a + "_Clicks " + b[0]).each(function(g) {
        var h = $(this);
        $(this).bind("mouseover", 
        function() {
            if (typeof e == "object" && e.length > 0) $("#" + a + "_Link").attr("href", e[g]);
            var f = $("#" + a + "_Clicks " + b[0] + "[re-class]")[0];
            if (f) {
                f.className = $(f).attr("re-class");
                $(f).removeAttr("re-class")
            }
            if (h[0].className && h[0].className != "") h.attr("re-class", h[0].className);
            if (d == "replace") {
                h[0].className = c[g]
            } else if (d == "add") {
                h.addClass(c[g])
            }
            if (document.getElementById(a + "_ShowOrHides")) {
                $("#" + a + "_ShowOrHides " + b[1]).hide();
                $($("#" + a + "_ShowOrHides " + b[1]).get(g)).show()
            }
            if (b.length > 2) {
                for (var j = 2; j < b.length; j++) {
                    $(b[j]).hide();
                    $(b[j]).eq(g).show()
                }
            }
        });
    })
}
function flashppt(id, w, h, imgUrl, imgLink, imgtext, imgAlt) {
    var swf_width = w;
    var swf_height = h;
    var files = "";
    var links = "";
    var texts = "";
    var j = 0;
    for (var i in imgUrl) {
        if (j == 0) {
            files = "" + imgUrl[i];
        } else {
            files += "|" + imgUrl[i];
        }
        j++;
    }
    files += "&TitleBgColor=0x393439&TitleBgAlpha=20&TitleBgPosition=2";
    j = 0;
    for (var i in imgLink) {
        if (j == 0) {
            links = imgLink[i];
        } else {
            links += "|" + imgLink[i];
        }
        j++;
    }
    j = 0;
    for (var i in imgAlt) {
        if (j == 0) {
            texts = "";
        } else {
            texts += "";
        }
        j++;
    }
    var str = "";
    str += '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="' + swf_width + '" height="' + swf_height + '">';
    str += '<param name="movie" value="/Template/home/picppt.swf"><param name="quality" value="high">';
    str += '<param name="menu" value="false"><param name=wmode value="opaque">';
    str += '<param name="FlashVars" value="bcastr_file=' + files + '&bcastr_link=' + links + '&bcastr_title=' + texts + '">';
    str += '<embed src="/Template/home/picppt.swf" wmode="opaque" FlashVars="bcastr_file=' + files + '&bcastr_link=' + links + '&bcastr_title=' + texts + '& menu="false" quality="high" width="' + swf_width + '" height="' + swf_height + '" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>';
    document.getElementById(id).innerHTML = str;
}
function htmlSWF(id, swf_url, swf_width, swf_height) {
    if (document.getElementById(id) == null) return;
    var html = '<object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="' + swf_width + '" height="' + swf_height + '">' + '<param name="movie" value="' + swf_url + '">' + '<param name="quality" value="high"> ' + '<param name="wmode" value="transparent"> ' + '<param name="menu" value="false"> ' + '<embed src="' + swf_url + '" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj1" width="' + swf_width + '" height="' + swf_height + '" quality="High" wmode="transparent"></embed>' + '</object>';
    document.getElementById(id).innerHTML = html;
}

 (function(docu) {
    var objxttop = null;
    var xttop = function(topjason) {
        var doc = document,
        win = window,
        docbody = doc.body,
        goto_top_type = -1,
        goto_top_itv = 0,
        isNotIE = -[ - 1, ],
        config = topjason || {};
        var topdiv = doc.createElement("div");
        topdiv.id = config["id"] || "xttop";
        topdiv.style.cssText = "z-index:99999;position:fixed;bottom:" + (config["bottom"] || "10px") + ";right:" + (config["right"] || "10px") + ";display:none;width:" + (config["width"] || "40px") + ";height:" + (config["height"] || "19px") + ";cursor:pointer;_bottom:auto;_position:absolute; display: none;_top:expression(documentElement.scrollTop + documentElement.clientHeight-this.offsetHeight);";
        if (config["img"]) {
            topdiv.style.background = "url(" + (config["img"] == "defaults" ? "http://image.91wan.com/imgCommon/backtotopa.gif": config["img"]) + ") no-repeat";
            if (!window.XMLHttpRequest) {
                var str_css = "html{_background-image:url(about:blank);_background-attachment:fixed;}";
                var style = document.createStyleSheet();
                style.cssText = str_css;
            }
        }
        else {
            topdiv.innerHTML = "<span style='color:#7B8693;font-size:12px;border:1px solid #7B8693;'>↑顶部</span>";
        }
        function overimg() {
            topdiv.style.background = "url(http://image.91wan.com/imgCommon/backtoto_over.gif) no-repeat";
        }
        function leaveimg() {
            topdiv.style.background = "url(http://image.91wan.com/imgCommon/backtotopa.gif) no-repeat";
        }
        function goto_top_timer() {
            var y = docbody.scrollTop || doc.documentElement.scrollTop;
            var moveby = config["speed"] || 35;
            y -= Math.ceil(y * moveby / 100);
            if (y < 0) {
                y = 0;
            }
            if (docbody.scrollTop) {
                docbody.scrollTop = y;
            }
            else {
                doc.documentElement.scrollTop = y;
            }
            if (y == 0) {
                win.onmousewheel = function() {
                    return true;
                };
                clearInterval(goto_top_itv);
                goto_top_itv = 0;
            }
        }
        function goto_top() {
            if (goto_top_itv == 0) {
                win.onmousewheel = function() {
                    return false;
                };
                goto_top_itv = setInterval(goto_top_timer, 50);
            }
        }
        bind(topdiv, "click", goto_top);
        bind(topdiv, "mouseover", overimg);
        bind(topdiv, "mouseout", leaveimg);
        docbody.appendChild(topdiv);
    }
    var bind = function(object, type, fn) {
        if (object.attachEvent) {
            object.attachEvent("on" + type, (function() {
                return function() {
                    window.event.cancelBubble = true;
                    object.attachEvent = fn.apply(object);
                }
            })(object));
        }
        else if (object.addEventListener) {
            object.addEventListener(type, 
            function(event) {
                event.stopPropagation();
                fn.apply(this);
            },
            false);
        }
    }
    var scrollevent = function() {
        objxttop = objxttop || document.getElementById("xttop");
        if (document.documentElement.scrollTop > 120 || document.body.scrollTop > 120) {
            objxttop.style.display = "block";
        }
        else {
            objxttop.style.display = "none";
        }
    }
    window.xttop = xttop;
    window.onscroll = scrollevent;
})();
var mytop = new xttop({
    img: "defaults",
    bottom: "0px",
    right: "0px",
    speed: 50,
    width: "55px",
    height: "55px"
});
function showBottomGame(x) {
    for (var i = 0; i < 6; i++) document.getElementById("all_game_bottom" + i).style.display = 'none';
    document.getElementById("all_game_bottom" + x).style.display = 'block';
    var all_game_index = x;
    var all_game_num = $('#all_game_show' + all_game_index + ' li').size();
    var all_game_pageNum = Math.ceil(all_game_num / 30);
    var all_game_pageHtml = '';
    for (i = 1; i <= all_game_pageNum; i++) all_game_pageHtml += '<a href="javascript:void(0);">' + i + '</a>';
    $('#all_game_page' + all_game_index).html(all_game_pageHtml);
    $('#all_game_page' + all_game_index + ' a').mouseover(function() {
        var index = $('#all_game_page' + all_game_index + ' a').index(this);
        $('#all_game_show' + all_game_index + ' li').hide().slice(index * 30, (index + 1) * 30).show();
        $('#all_game_page' + all_game_index + ' a').removeClass().eq(index).addClass('pvisted');
    });
}
function hiddenBottomGame() {
    for (var i = 0; i < 6; i++) document.getElementById("all_game_bottom" + i).style.display = 'none';
}