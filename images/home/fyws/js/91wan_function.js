function gID(getID) {
    return document.getElementById(getID);
}
function setCookie(cookieName, cookieValue, seconds) {
    var expires = new Date();
    expires.setTime(expires.getTime() + parseInt(seconds) * 1000);
    document.cookie = escape(cookieName) + '=' + escape(cookieValue) + (seconds ? ('; expires=' + expires.toGMTString()) : "") + '; path=/; domain=91wan.com;';
}
function getCookie(cname) {
    var cookie_start = document.cookie.indexOf(cname);
    var cookie_end = document.cookie.indexOf(";", cookie_start);
    return cookie_start == -1 ? '': decodeURI(document.cookie.substring(cookie_start + cname.length + 1, (cookie_end > cookie_start ? cookie_end: document.cookie.length)));
}
function showDiv(tag, num, tid) {
    for (var i = 0; i < num; i++) {
        gID(tag + i).style.display = 'none';
    }
    if (tid != null) {
        gID(tag + tid).style.display = "block";
    }
}
function InputKeyPress(aFrmObj) {
    var currKey = 0,
    CapsLock = 0;
    var e = arguments[1];
    e = e || window.event;
    var kCode = e.keyCode || e.which || e.charCode;
    if (kCode == '13') {
        if (document.getElementById(aFrmObj) != null) {
            document.getElementById(aFrmObj).onsubmit = function() {
                return false
            };
        }
        checkLogin(aFrmObj);
    }
}
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
var agentIDArray = Array("160^baidu.com^70", "107^google.com.hk^42", "123^hao123.com^49", "18773^114la.com^16675", "55628^dh818.com^28386", "18778^2345.com^16680", "16090^go2000.cn^28388", "55629^365j.com^28389", "55630^qq5.com^28390", "55633^1616.net^28393", "55635^uusee.net^28395", "55636^9991.com^28397", "55637^v2233.com^28399", "55639^kzdh.com^28403", "55631^46.com^28391", "18046^345ba.com^15948", "18050^zhaodao123.com^15952", "18012^duote.com^15914", "17504^91danji.com^15414", "16515^quxiu.com^14427", "18762^duote.com^16664", "360^360.cn^123", "19221^haouc.com^17122", "53107^17173.com^21051", "53108^86wan.com^21052", "53109^966.com^21053", "53110^yzz.cn^21054", "53111^07073.com^21055", "53112^cwan.com^21056", "53113^2366.com^21057", "53114^766.com^21058", "53115^e3ol.com^21059", "53116^reyoo.net^21060", "53117^ccjoy.com^21061", "53118^265g.com^21062", "53119^duowan.com^21063", "53120^pcgames.com.cn^21064", "53121^maituan.com^21065", "53122^6dan.com^21066", "53123^9u8u.com^21067", "53125^92pk.com^21069", "53126^kkpk.com^21070", "53127^wangye2.com^21071", "53128^popwan.com^21072", "53129^5068.com^21073", "53130^521g.com^21074", "53131^juxia.com^21075", "53132^52kl.net^21076", "53133^131.com^21077", "53134^game.163.com^21078", "53135^e004.com^21079", "53136^173eg.com^21080", "53137^uuu9.com^21081", "53138^games.sina.com.cn^21082", "53139^fm4399.com^21083", "55180^yeyou.com^28404", "55624^cn.bing.com^28373", "55622^jike.com^28371", "55621^youdao.com^28370", "55667^969g.com^28531", "55718^longlieshou.com^28736","59143^qq.com^37668","38^sogou.com^37674");
function getAgentID() {
    lastUrl = document.referrer;
    var agent_id = 0;
    var placeid = 0;
    agent_id = getQueryString("agent_id");
    placeid = getQueryString("placeid");
    var cplaceid = getQueryString("cplaceid");
    if (!agent_id) {
        var agenttmp = "";
        for (var i = 0; i < agentIDArray.length; i++) {
            agenttmp = agentIDArray[i].split("^");
            if (lastUrl.indexOf(agenttmp[1]) != -1) {
                agent_id = agenttmp[0];
                placeid = agenttmp[2];
            }
        }
    }
    if (agent_id > 0) {
        setCookie("agent_id", agent_id, 3600);
        setCookie("placeid", placeid, 3600);
        setCookie("cplaceid", cplaceid, 3600);
    }
    return agent_id;
}
function getQueryString(queryStringName) {
    var returnValue = "";
    var URLString = new String(document.location);
    var serachLocation = -1;
    var queryStringLength = queryStringName.length;
    do {
        serachLocation = URLString.indexOf(queryStringName + "\=");
        if (serachLocation != -1) {
            if ((URLString.charAt(serachLocation - 1) == '?') || (URLString.charAt(serachLocation - 1) == '&')) {
                URLString = URLString.substr(serachLocation);
                break;
            }
            URLString = URLString.substr(serachLocation + queryStringLength + 1);
        }
    }
    while (serachLocation != -1)
    if (serachLocation != -1) {
        var seperatorLocation = URLString.indexOf("&");
        if (seperatorLocation == -1) {
            returnValue = URLString.substr(queryStringLength + 1);
        }
        else {
            returnValue = URLString.substring(queryStringLength + 1, seperatorLocation);
        }
    }
    returnValue = returnValue.replace(/#/g, '');
    return returnValue;
}
getAgentID();
try {
    ref = escape(document.referrer);
} catch(e) {}
if (ref != '' && (ref.indexOf('91wan.com') == -1 || ref.indexOf('e.91wan.com') > -1 || ref.indexOf('91wan.com.cn') > -1)) {
    setCookie("from_url", ref, 3600);
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
    str += '<param name="movie" value="http://image.91wan.com/imgCommon/picppt.swf"><param name="quality" value="high">';
    str += '<param name="menu" value="false"><param name=wmode value="opaque">';
    str += '<param name="FlashVars" value="bcastr_file=' + files + '&bcastr_link=' + links + '&bcastr_title=' + texts + '">';
    str += '<embed src="http://image.91wan.com/imgCommon/picppt.swf" wmode="opaque" FlashVars="bcastr_file=' + files + '&bcastr_link=' + links + '&bcastr_title=' + texts + '& menu="false" quality="high" width="' + swf_width + '" height="' + swf_height + '" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>';
    document.getElementById(id).innerHTML = str;
}
function htmlSWF(id, swf_url, swf_width, swf_height) {
    if (document.getElementById(id) == null) return;
    var html = '<object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="' + swf_width + '" height="' + swf_height + '">' + '<param name="movie" value="' + swf_url + '">' + '<param name="quality" value="high"> ' + '<param name="wmode" value="transparent"> ' + '<param name="menu" value="false"> ' + '<embed src="' + swf_url + '" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj1" width="' + swf_width + '" height="' + swf_height + '" quality="High" wmode="transparent"></embed>' + '</object>';
    document.getElementById(id).innerHTML = html;
}
function get_game_info(gameid) {
    var login_game_info = getCookie('login_game_info');
    login_game_info = unescape(login_game_info);
    gameList = login_game_info.split("|");
    var jsonstr = "[";
    if (login_game_info.indexOf('推荐几款游戏') > -1) {
        for (var i = 0; i < gameList.length; i++) {
            var href = gameList[i].substr(gameList[i].indexOf("http"), gameList[i].indexOf("'>") - gameList[i].indexOf("http"));
            var title = String(gameList[i].match(/\>[\s\S]*?\</));
            jsonstr += "{\"href\"" + ":" + "\"" + href + "\",\"title\"" + ":" + "\"" + title.replace(">", "").replace('<', '') + "\"},";
        }
    } else {
        if (gameid != null) {
            for (var i = 0; i < gameList.length; i++) {
                var href = String(gameList[i].match(/http:\/\/www.91wan.com\/user\/game_login.php\?game_id=[0-9]*\&server_id=[0-9]*/));
                var title = String(gameList[i].match(/\<span\>[\s\S]*?\<\/span\>/));
                if (gameList[i].indexOf('game_id=' + gameid) > -1) {
                    jsonstr += "{\"href\"" + ":" + "\"" + href + "\",\"title\"" + ":" + "\"" + title.replace("<span>", "").replace('</span>', '') + "\"},";
                }
            }
        } else {
            if (login_game_info != '') {
                for (var i = 0; i < gameList.length; i++) {
                    var href = String(gameList[i].match(/http:\/\/www.91wan.com\/user\/game_login.php\?game_id=[0-9]*\&server_id=[0-9]*/));
                    var title = String(gameList[i].match(/\<span\>[\s\S]*?\<\/span\>/));
                    jsonstr += "{\"href\"" + ":" + "\"" + href + "\",\"title\"" + ":" + "\"" + title.replace("<span>", "").replace('</span>', '') + "\"},";
                }
            } else {
                for (var i = 0; i < 3; i++) {
                    var href = '';
                    var title = '';
                    jsonstr += "{\"href\"" + ":" + "\"" + href + "\",\"title\"" + ":" + "\"" + title.replace("<span>", "").replace('</span>', '') + "\"},";
                }
            }
        }
    }
    jsonstr += "]";
    if (jsonstr != '[]') {
        jsonstr = jsonstr.substring(0, jsonstr.lastIndexOf(',]'));
        jsonstr += "]";
    }
    return jsonstr;
}
if(typeof(hide_mytop)=='undefined'){
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
}
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