!
function($, SQ, undefined) {
    if (window.bHTTPSEnabled = 0, !(!SQ || SQ.Login && SQ.Login.version)) {
        $(document).ready(function() {});
        var bHTTPSImg = new Image,
        bProxyLoad = 0;
        bHTTPSImg.src = "https://my.37.com/httpsEnable.gif?t=" + (new Date).getTime(),
        bHTTPSImg.onload = function() {
            window.bHTTPSEnabled = !0,
            bHTTPSImg.onload = null
        },
        bHTTPSImg.onerror = function() {
            window.bHTTPSEnabled = !1
        },
        eval(function(a, b, c, d, e, f) {
            if (e = function(a) {
                return (b > a ? "": e(parseInt(a / b))) + ((a %= b) > 35 ? String.fromCharCode(a + 29) : a.toString(36))
            },
            !"".replace(/^/, String)) {
                for (; c--;) f[e(c)] = d[c] || e(c);
                d = [function(a) {
                    return f[a]
                }],
                e = function() {
                    return "\\w+"
                },
                c = 1
            }
            for (; c--;) d[c] && (a = a.replace(new RegExp("\\b" + e(c) + "\\b", "g"), d[c]));
            return a
        } ('e 5="F+/";m q(d){e 1,i,c;e 9,b,g;c=d.l;i=0;1="";x(i<c){9=d.k(i++)&v;f(i==c){1+=5.8(9>>2);1+=5.8((9&h)<<4);1+="==";r}b=d.k(i++);f(i==c){1+=5.8(9>>2);1+=5.8(((9&h)<<4)|((b&s)>>4));1+=5.8((b&n)<<2);1+="=";r}g=d.k(i++);1+=5.8(9>>2);1+=5.8(((9&h)<<4)|((b&s)>>4));1+=5.8(((b&n)<<2)|((g&y)>>6));1+=5.8(g&z)}p 1}m G(a){e t=5.l-2,w=[];H(i=0;i<E;i++){w.j(5.8(u.B(u.D()*t)));f(i===7){w.j(a.o(0,3))}f(i===C){w.j(a.o(3))}}p q(w.A(""))}', 44, 44, "|out||||ch|||charAt|c1||c2|len|str|var|if|c3|0x3||push|charCodeAt|length|function|0xF|substr|return|__rsa|break|0xF0|maxPos|Math|0xff||while|0xC0|0x3F|join|floor|12|random|15|ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789|td|for".split("|"), 0, {}));
        var L, TL, tl, VC, loc = window.location,
        abrefer = "",
        verifyCode = "",
        isLogin = !1,
        $head = $(document.head || document.getElementsByTagName("head")[0]);
        TL = new SQ.Class,
        TL.include({
            init: function(a) {
                var b = this.options = $.extend(!0, {
                    dialog: !1,
                    dialogOpts: {},
                    adrefer: "",
                    gameid: 0,
                    logBox: null,
                    vcOption: {},
                    lr: $.noop,
                    loged: $.noop,
                    unlog: $.noop,
                    reged: $.noop,
                    unreg: $.noop,
                    out: $.noop,
                    unout: $.noop,
                    fail: $.noop,
                    timeout: $.noop
                },
                a);
                if (b.dialog && (this.dialog = new SQ.Login.Dialog($.extend({},
                b.dialogOpts))), b.gameid && (L.logInfo.gameid = L.regInfo.gameid = b.gameid), (b.abrefer || b.adrefer) && (abrefer = b.abrefer || b.adrefer), b.logBox) {
                    b.vcOption.logBox = b.logBox = $(b.logBox);
                    var c = this.vc = new VC(b.vcOption);
                    L.bind("unlog",
                    function(a, b) {
                        "log" === b && "safe_true" === a.data && (c.isOpen ? c.refreshImg() : c.open())
                    })
                }
                L.bind("loged", b.loged),
                L.bind("loged", b.lr),
                L.bind("unlog", b.unlog),
                L.bind("reged", b.reged),
                L.bind("reged", b.lr),
                L.bind("unreg", b.unreg),
                L.bind("out", b.out),
                L.bind("unout", b.unout),
                L.bind("fail", b.fail),
                L.bind("timeout", b.timeout)
            },
            toLog: function(a, b, c, d) {
                var e, f;
                if (d) {
                    if ((e = SQ.Login.checkUsername(a)) !== !0) return L.alert(e);
                    if ((f = SQ.Login.checkPassword(b, !0)) !== !0) return L.alert(f)
                }
                return L.toLog.call(L, "string" == typeof a ? {
                    login_account: a,
                    password: b,
                    save_state: c
                }: a)
            },
            toReg: function(a, b, c, d) {
                var e, f;
                if (d) {
                    if ((e = SQ.Login.checkUsername(a, !0)) !== !0) return L.alert(e);
                    if ((f = SQ.Login.checkPassword(b)) !== !0) return L.alert(f);
                    if (b !== c) return L.alert("两次输入的密码不一致")
                }
                return L.toReg.call(L, "string" == typeof a ? {
                    login_account: a,
                    password: b,
                    password1: c
                }: a)
            },
            toOut: function() {
                return L.toOut.apply(L, arguments)
            },
            getUserInfo: function() {
                return L.getUserInfo.apply(L, arguments)
            },
            hasLogin: function() {
                return L.hasLogin()
            },
            bind: function(a, b) {
                L.bind(a, b)
            }
        }),
        L = SQ.Login = function(a) {
            return tl || (tl = new TL(a))
        },
        $.extend(L, {
            version: "1.2.2",
      
            regExp: {
                account: /^\w{4,20}$/i,
                password: /^[a-zA-Z0-9`~!-@#$%^&*()_+|{}\[\];':"<>?,.\/]{6,20}$/
            },
            cookie: {
                account: "37wan_account",
                refer: "37wanrefer",
                passport: "passport_37wan_com"
            },
            logInfo: {
                action: "login",
                login_account: "",
                password: "",
                ajax: 0,
                remember_me: 1,
                save_state: 0,
                ltype: 1
            },
            regInfo: {
                action: "save",
                login_account: "",
                password: "",
                password1: "",
                ajax: 0,
                email: "",
                name: "",
                id_card_number: "",
                save_state: 1,
                phone: "",
                verify_code: "",
                refer: "",
                abrefer: "www.37.com"
            },
            userInfo: null,
         
            _action2: function(a, b) {
                var c = {
                    dataType: "jsonp",
                    url: this[a + "Url"]
                };
                if ("function" == typeof b) return SQ.log && SQ.log("sq.login2: " + a + " 请统一绑定事件");
                c.data = b || {},
                c.data.gameid = c.data.gameid || L.logInfo.gameid || 0;
                var d = SQ.cookie(this.cookie.passport),
                e = {
                    msg: "info" === a ? "未曾登录": "还未登录，不能注销",
                    code: "info" === a ? -109 : -108
                };
                return d && "logout" !== d ? $.ajax(c).done(function(b) {
                    0 === b.code ? "info" === a ? (isLogin = !0, L.userInfo = TL.prototype.userInfo = b.data, L.trigger("loged", b.data, "info", b, c)) : (isLogin = !1, L.userInfo = TL.prototype.userInfo = null, L.trigger("out", b)) : "info" === a ? L.trigger("unlog", b, "info", c) : L.trigger("unout", b, c)
                }).fail(function(a, b, c) {
                    L.trigger("fail", a, b, c)
                }) : void setTimeout(function() {
                    L.trigger("unlog", e, a, e)
                },
                0)
            },
            toLog: function(a) {
                return this._action("log", a)
            },
            toReg: function(a) {
                return this._action("reg", a)
            },
            toOut: function(a) {
                return this._action2("out", a)
            },
            getUserInfo: function(a) {
                this._action2("info", a)
            },
            checkUsername: function(a, b) {
                return a = $.trim(a),
                "" === a ? "帐号不能为空": b && !this.regExp.account.test(a) ? "帐号由4~20数字、字母或下划线组成": !b && /<.*\/?>/.test(a) ? "帐号有无效字符": !0
            },
            checkPassword: function(a, b) {
                return a = $.trim(a),
                "" === a ? "密码不能为空": this.regExp.password.test(a) ? !0 : b ? "请输入正确的密码": "密码由6~20位数字、字母或特殊字符组成"
            },

            getUsername: function(a) {
                if (a) {
                    var b = SQ.cookie(this.cookie.account, {
                        path: "/",
                        domain: "37.com"
                    });
                    a = $(a),
                    b && a.val(b)
                }
            },
      
         
         
           
        },
        SQ.Events),
        VC = new SQ.Class,
        VC.include({
           
        });



        var s = null,
        lDialog = new SQ.Class;
    

        SQ.Login.Dialog = function(a) {
            return s && a && $.extend(s.options, a),
            s || (s = new lDialog(a))
        }
    }
} (jQuery, SQ),




function(a, b, c) {
    var d, e = window.location,
    f = {
     
        getDocReferrer: function(a) {
            var b = "",
            c = a || document.referrer;
            return c && (b = c.split("://")[1].split("/"), b = a ? b[0] + "/" + b[1] : b[0]),
            b
        },
      
      


        setReferer: function(a) {
            var c, d, f, g, h, i, j, k, l, m, n = document.referrer,
            o = e.search,
            p = /^https?:\/\/(?:www|search)\.(baidu|soso|sogou|google|so|youdao|jike|panguso).+(?:\?|&)(?:wd|q|query)=([^&]+)/;
            if (/(\?|&)(source|refer(er)?)=\S+/.test(o)) {
                for (h = ["refer", "uid", "ad_param", "wd", "ad_type"], i = 0, j = h.length, g = [], l = b.queryToJson(o), i; j > i; i++) c = l[h[i]],
                0 === i && (c = c || l.referer || l.source, c = this.convertMap[c] || c),
                2 === i && (c = c || l.ab_param),
                4 === i && (c = c || l.ab_type),
                g.push(c || "");
                g = g.join("|")
            } else k = this.getDocReferrer(),
            k ? (f = k.split("."), d = f.length, "37.com" !== f.splice(d - 2, 2).join(".") ? (m = p.exec(n), g = m && m[1] && m[2] ? k + "|||" + m[2] + "|": k) : g = "") : g = a ? this.convertPathToDomain(e.href) : e.host;
           
          
        },
        getReferer: function() {
            return b.cookie(this.referCookie)
        },
     
        hasAdReferer: function(a) {
            var b = this.getReferer();
            return /(\?|&)(source|refer(er)?)=\S+/.test(a || e.href) || b && b.indexOf("|") > -1 && -1 === b.split("|")[0].indexOf(".")
        },
      
        setADcookie: function() {
            a("body").append("<div style='display:none'><img src='http://cm.he2d.com/1/' /></div>")
        }
    };
  
 
 

  
   
 
    b.Statis = f;
    var g = b.byId("sq-statis-refer");
    g && b.Statis.setReferer(g.getAttribute("data-path")),
    a(document).ready(function() {
        b.Statis.setADcookie()
    })
} (jQuery, SQ),

function(a, b, c) {
    var d = new c.Class(c.Widget);
    d.include({
        init: function(b) {
            this.options = {
                el: "body",
                tabs: "li",
                panels: "div",
                eventType: "click",
                index: 0,
                auto: !1,
                interval: 5e3,
                animate: {
                    show: "show",
                    hide: "hide"
                },
                currentClass: "focus"
            },
            a.extend(this.options, b || {}),
            this.el = a(this.options.el),
            this.tabs = a(this.options.tabs, this.el),
            this.panels = a(this.options.panels, this.el),
            this.el.attr("data-kid", this.id),
            this.change(this.options.index),
            this._events(),
            this.options.auto && this.auto()
        },
        change: function(a) {
            var b = this.options.currentClass;
            this.tabs.filter("." + b).removeClass(b),
            this.tabs.eq(a).addClass(b),
            this.panels.hide().eq(a)[this.options.animate.show](),
            this.currentIndex = a,
            this.trigger("change", a, this)
        },
        _events: function() {
            this.tabs.bind(this.options.eventType, this.proxy(this._eventHandler)),
            this.options.auto && (this.tabs.bind("mouseenter", this.proxy(this.stop)), this.tabs.bind("mouseleave", this.proxy(this.auto)), this.panels.bind("mouseenter", this.proxy(this.stop)), this.panels.bind("mouseleave", this.proxy(this.auto)))
        },
        _eventHandler: function(a) {
            var b = a.currentTarget;
            if (! (b.className.indexOf(this.options.currentClass) > -1)) {
                var c = 0;
                return this.tabs.each(function(a) {
                    return b === this ? (c = a, !1) : void 0
                }),
                this.change(c),
                !1
            }
        },
        auto: function() {
            this.timerId = b.setInterval(this.proxy(this._autoHandler), this.options.interval),
            this.trigger("auto", this)
        },
        _autoHandler: function() {
            var a = this.currentIndex + 1;
            a >= this.tabs.size() && (a = 0),
            this.change(a)
        },
        stop: function() {
            this.timerId && (b.clearInterval(this.timerId), this.trigger("stop", this))
        },
        _destroying: function() {
            this.stop(),
            this.el.removeAttr("data-kid"),
            this.tabs.unbind(this.options.eventType),
            this.panels.unbind()
        }
    }),
    c.Tab = d
} (jQuery, window, SQ),
function(a, b, c) {
    var d = new c.Class(c.Widget);
    d.include({
        init: function(b) {
            this.setting = {
                title: null,
                buttons: null,
                mask: !0,
                type: "html",
                content: "",
                width: 600,
                height: 300,
                appendTo: document.body,
                autoShow: !0,
                classStyle: ""
            },
            a.extend(this.setting, b),
            this.render(),
            this.events(),
            this.setting.autoShow && this.show()
        },
        events: function() {
            a(window).resize(this.proxy(this.position)),
            this.el.on("click.sq.dialog", ".sq-dialog-btn[href^=javascript]", this.proxy(this._buttonsHandler)).on("click.sq.dialog", ".sq-dialog-close", this.proxy(this.hide))
        },
        _buttonsHandler: function(b) {
            b.preventDefault();
            var c = a(b.target),
            d = c.attr("data-name"),
            e = this.setting.buttons[d];
            e && ("function" == typeof e && e(b, this, d), e.fn && "function" == typeof e.fn && e.fn(b, this, d))
        },
        render: function() {
            if (!this.el) {
                var b = '<div style="display:none;"></div>';
                this.el = a(b),
                this.el.appendTo(a(this.setting.appendTo)),
                this.el.attr("data-kid", this.id)
            }
            var d = '<div class="sq-dialog-masking" style="height:{$docHeight}px;"></div>',
            e = '<div class="sq-dialog {classStyle}" style="width:{$width}px;left:{$left}px;top:{$top}px;">                                <div class="sq-dialog-avatar"></div>                                <div style="position:relative;">                                    <div class="sq-dialog-body">                                        <div class="sq-dialog-titlebar {$notitle}">                                            <span class="sq-dialog-titlebar-text">{$title}</span>                                            <a href="javascript:void(0);" title="关闭" class="sq-dialog-close">关闭</a>                                        </div>                                        <div class="sq-dialog-client">                                            <div class="sq-dialog-content" style="height:{$contentHeight}px;">                                                {%=content%}                                            </div>                                        </div>                                        <div class="sq-dialog-buttons {$nobutton}">                                           {%=buttons%}                                        </div>                                    </div>                                </div>                            </div>';
            e = e.replace("{classStyle}", this.setting.classStyle);
            var f = c.template((this.setting.mask ? d: "") + e, this._renderObj());
            this.el.html(f),
            this.position()
        },
        position: function() {
            var b = a(".sq-dialog-masking", this.el),
            c = a(".sq-dialog", this.el),
            d = a(".sq-dialog-titlebar", this.el),
            e = a(".sq-dialog-buttons", this.el),
            f = a(window),
            g = c.width(),
            h = this.setting.height + e.outerHeight(!0) + d.outerHeight(!0) + 100,
            i = f.width(),
            j = f.height(),
            k = document.documentElement.scrollTop || document.body.scrollTop;
            b.height(a(document).height()),
            c.css({
                left: Math.abs(i - g) / 2,
                top: Math.abs(j - h) / 2 + k
            })
        },
        _buttons: function() {
            var a = [];
            if (this.setting.buttons && c.isObject(this.setting.buttons)) {
                var b = '<a class="sq-dialog-btn btn btn-s-1 {$cls}" {$target} href="{$href}" data-name="{$name}">{$name}</a>';
                for (var d in this.setting.buttons) {
                    var e = this.setting.buttons[d],
                    f = "javascript:;",
                    g = "";
                    "string" == typeof e && (f = e, g = "target='_blank'"),
                    a.push(c.template(b, {
                        cls: e.cls || "",
                        name: d,
                        href: e.href || f,
                        target: e.target || g
                    }))
                }
            }
            return a.join("")
        },
        _renderObj: function() {
            var b = a(window),
            d = this.setting.width,
            e = this.setting.height || 400,
            f = b.width(),
            g = b.height();
            return {
                docHeight: a(document).height(),
                width: this.setting.width,
                contentHeight: e,
                left: (f - d) / 2,
                top: (g - e) / 2,
                title: this.setting.title || "",
                notitle: this.setting.title ? "": "sq-dialog-notitle",
                nobutton: c.isObject(this.setting.buttons) ? "": "sq-dialog-nobutton",
                content: this._getContent(),
                buttons: this._buttons()
            }
        },
        _getContent: function() {
            var b = this.setting.content,
            c = "";
            switch (this.setting.type) {
            case "html":
                "object" == typeof b ? (c = a(b).html(), a(b).empty()) : c = b;
                break;
            case "iframe":
                c = '<iframe allowtransparency="true" frameborder="0" src="' + b + '" width="100%" height="' + (this.setting.height - 10) + '"></iframe>';
                break;
            case "ajax":
                c = '<div class="sq-dialog-loading"><p>正在努力加载...</p></div>',
                a.get(b, this.proxy(this.setContent))
            }
            return c
        },
        setContent: function(b) {
            var c = a(".sq-dialog-content", this.el);
            c.html(b)
        },
        show: function(a) {
            a && this.el.find(".sq-dialog-titlebar-text").text(a),
            this.el.show(),
            this.position(),
            this.trigger("show", this)
        },
        hide: function() {
            this.el.hide(),
            this.trigger("hide", this)
        },
        _destroying: function() {
            a(".sq-dialog-btn", this.el).unbind(),
            this.el.remove()
        }
    }),
    c.Dialog = d,
    c.alert = function(a, b, d) {
        return new c.Dialog({
            title: d || "提示信息",
            buttons: {
                "确定": function(a, c) {
                    b && b(),
                    c.destroy()
                }
            },
            content: "<div class='sq-dialog-alert'>" + a + "</div>",
            type: "html",
            width: 300,
            height: 70
        })
    },
    c.confirm = function(a, b, d) {
        return new c.Dialog({
            title: "提示信息",
            buttons: {
                "确定": function(a, c) {
                    b && b(),
                    c.destroy()
                },
                "取消": function(a, b) {
                    d && d(),
                    b.destroy()
                }
            },
            content: a,
            type: "html",
            width: 360,
            height: 70
        })
    },
    c.tip = function(a) {
        var b = new c.Dialog({
            title: null,
            buttons: null,
            content: a,
            type: "html",
            width: 400,
            height: 40,
            mask: !1
        });
        return setTimeout(function() {
            b.destroy()
        },
        3e3),
        b
    },
    c.loading = function(b, d) {
        d = d || a.noop,
        b = b || "正在加载数据，请稍后...",
        "function" == typeof b && (d = b, b = "正在加载数据，请稍后...");
        var e = new c.Dialog({
            title: "提示信息",
            buttons: {
                "取消加载": function(a, b) {
                    b.hide()
                }
            },
            content: '<div class="sq-dialog-loading"><span>' + b + "</span></div>",
            type: "html",
            width: 400,
            height: 60
        });
        return e.bind("hide",
        function() {
            d.call(e),
            e.destroy()
        }),
        e
    }
} (jQuery, window, SQ),
function(a, b) {
    var c = new b.Class(b.Widget),
    d = 0;
    c.include({
        version: "1.2.2",
        win: a(window),
        location: {
            rightBottom: {
                right: 0,
                bottom: 0
            },
            leftBottom: {
                left: 0,
                bottom: 0
            },
            centerLeft: {
                top: 0,
                left: "center-500"
            },
            centerRight: {
                top: 0,
                left: "center+500"
            },
            center: {
                top: 0,
                left: "center"
            },
            leftMiddle: {
                top: "center",
                left: 0
            },
            rightMiddle: {
                top: "center",
                right: 0
            },
            centerMiddle: {
                top: "center",
                left: "center"
            }
        },
        init: function(b) {
            var c = this.options = a.extend({},
            {
                location: "rightBottom",
                element: null,
                debug: !1
            },
            b);
            return c.element ? (c.element = a(c.element), c.element.length ? ("string" == typeof c.location && (c.location = a.extend({},
            this.location[c.location])), c.element.data("fixed") ? this: (this._guid = d++, this._parseLocation(c, c.location), this._fixed(c), void(this._supportFixed() || this.win.trigger("scroll")))) : void(c.debug && alert("没有找到元素"))) : void(c.debug && alert("没有需要定位的元素"))
        },
        _parseLocation: function(b, c) {
            var d, e = c.top,
            f = c.left,
            g = b.element.outerWidth(),
            h = b.element.outerHeight();
            if (f && !a.isNumeric(f)) {
                if ( - 1 === f.indexOf("center")) return void(b.debug && alert("位置无效"));
                "center" === f ? (c.left = "50%", c.marginLeft = -g / 2, c.right = "auto") : (d = +/center((?:\+|-)\d+)/.exec(f)[1], 0 > d ? (c.left = "50%", c.marginLeft = d - g, c.right = "auto") : d > 0 && (c.right = "50%", c.marginRight = -d - g, c.left = "auto"))
            }
            if (e && !a.isNumeric(e)) {
                if ( - 1 === e.indexOf("center")) return void(b.debug && alert("位置无效"));
                "center" === e ? (c.top = "50%", c.marginTop = -h / 2, c.bottom = "auto") : (d = +/center((?:\+|-)\d+)/.exec(e)[1], 0 > d ? (c.top = "50%", c.marginTop = d - h, c.bottom = "auto") : d > 0 && (c.bottom = "50%", c.marginBottom = -d - h, c.top = "auto")),
                this._parseLocationIE6(e, c, d, h)
            }
        },
        _parseLocationIE6: function(a, b, c, d) {
            if (!this._supportFixed()) {
                this.t || (this.t = a, this.l = b, this.offset = c, this.height = d),
                a || (a = this.t, b = this.l, c = this.offset, d = this.height);
                var e = this.win.height();
                "center" === a ? (b.top = (e - d) / 2, b.marginTop = "auto") : 0 > c ? (b.top = (e - d) / 2 - c, b.marginTop = "auto") : c > 0 && (b.top = (e - d) / 2 + c, b.marginTop = "auto", b.bottom = "auto")
            }
        },
        _fixed: function(b) {
            var c = this._supportFixed();
            b.element.css(a.extend({},
            b.location, {
                position: c ? "fixed": "absolute"
            })).data("fixed", !0),
            this._hackIE6(b, c)
        },
        _hackIE6: function(b, c) {
            if (!c) {
                var d, e = this,
                f = e.win.height(),
                g = b.element.outerHeight();
                a("<style type='text/css'> * html{overflow-x:hidden;background:url(about:blank) no-repeat fixed;}</style>").appendTo("head"),
                this.win.on("scroll.fixed" + this._guid,
                function() {
                    b.element.css({
                        bottom: "auto",
                        top: document.documentElement.scrollTop + (a.isNumeric(b.location.bottom) ? f - g - b.location.bottom: b.location.top)
                    })
                }).on("resize.fixed" + this._guid,
                function() {
                    clearTimeout(d),
                    setTimeout(function() {
                        b.element.css(b.location),
                        a.isNumeric(b.location.bottom) && b.element.css("top", "auto"),
                        f = e.win.height()
                    },
                    120)
                })
            }
        },
        _destroying: function() {
            this.win.off("resize.fixed" + this._guid)
        },
        _supportFixed: function() {
            return - 1 === (window.navigator.userAgent || "").toLowerCase().indexOf("msie 6")
        }
    }),
    b.Fixed = c
} (jQuery, SQ),
function(a, b, c, d) {
    function e(a, b) {
        return j || (j = new f(a, b))
    }
    function f(b, c) {
        this.$wrap = a("#gs-top"),
        this.gameid = b,
        this._getPubData(),
        c.top = c.top || {},
        c.top.$log = a("#g-top-login"),
        c.top.$loged = a("#g-top-loged"),
        this.login = c,
        this._events(),
        this.shortCut(b)
    }
    var g = null,
    h = window.location,
    i = b.Game = new b.Class;
    i.include({
        init: function(c) {
            var d = this.options = a.extend(!0, {},
            {
                gConfig: {},
                $log: null,
                $loginFrame: null,
                gameid: 0,
                gameName: "",
                dialog: !0,
                regDialog: !0,
                regDialogExc: null,
                regBtn: "#btn-reg",
                outBtn: "#logout",
                top: !0,
                enterGameDialog: !0,
                fixedUrl: "http://www.37.com/html/game_fixed.js"
            },
            c);
            return d.gameid = d.gameid || d.gConfig.id,
            d.gameid ? (d.gameName = d.gameName || d.gConfig.name, d.gameName ? (this.$doc = a(document), d.dialog = d.dialog || d.top || !!this.$doc.find("a[data-role='server']").length, this.gameid = d.gameid, this.gameName = d.gameName, d.$loginFrame && d.$loginFrame.length && (this.$log = d.$log, this.$loginFrame = d.$loginFrame, d.text = ["您上次进入的服是：", "37" + d.gameName + "推荐您进入："]), (d.dialog || d.$loginFrame && d.$loginFrame.length) && this._log(), d.top && (this.top = new e(d.gameid, this.login)), this._statis(d), this._events(d), this.server = {},
            void(d.fixedUrl && "index" === d.gConfig.page && this._getFixed(d.fixedUrl))) : b.log && b.log("SQ.Game： gameName ？")) : b.log && b.log("SQ.Game： gameid ？")
        },
        _events: function(a) {
            var c = this,
            d = function(a) {
                a || (g = null, b.Login.unbind("dialoghide", d))
            };
            this._logEvents(c),
            a.enterGameDialog && c.$doc.on("click", "a[data-role=server]",
            function(a) {
                c.login.hasLogin() || (a.preventDefault(), c.login.dialog.show(0), g = this, c.login.dialog.bind("dialoghide", d))
            })
        },
        _log: function() {
            var a, c = this,
            d = c.options,
            e = b.Statis.hasAdReferer() && d.regDialog;
            a = this.login = new b.Login({
                gameid: d.gameid,
                dialog: d.dialog || e,
                dialogOpts: {
                    hideId: e
                },
               
             
            }),
            a.getUserInfo()
        },
        _logEvents: function(a) {
            a.$doc.on("click", this.options.outBtn,
            function(b) {
                b.preventDefault(),
                a.login.toOut()
            })
        },
        _logToOut: function() {
            this.$loged && (this.$loged.remove(), this.$loged = null, this.$log.show())
        },
        _logParse: function(b) {
            var c, d, e, f = this.options,
            g = b.HISTORY_HOT_GAMESERVER,
            h = "暂未开服，敬请期待",
            i = "javascript:alert('暂未开服，敬请期待')",
            j = "";
            f.$loginFrame && f.$loginFrame.length && (d = f.text[g.length ? g[0].HOTSORT: 1], g.length && (h = g[0].SERVER_NAME, i = g[0].SERVER_URL, j = "target='_blank'"), c = f.logedTpl.replace("{$username}", b.LOGIN_ACCOUNT).replace("{$date}", b.LAST_LOGIN_TIME).replace("{$serverurl}", i).replace("{$servername}", h).replace("{$text}", d).replace("{$serverblank}", j), "function" == typeof f.parseTpl && (e = f.parseTpl.call(this, c)), e && "string" == typeof e && (c = e), this.$loged = a(c).appendTo(f.$loginFrame), this.$log.hide().find(":password").val(""))
        },
        _statis: function(c) {
            var d, e = !0,
            f = this,
            g = c.regDialogExc;
            c.regDialog && (b.Statis.setReferer(c.gConfig.secDir), b.Statis.hasAdReferer() && (d = b.Statis.getReferer(), g && a.each(g,
            function(a, b) {
                return d.indexOf(b) > -1 ? (e = !1, !1) : void 0
            }), e && this.login.bind("unlog",
            function(b, d) {
                "info" === d && a(document).on("click", c.regBtn,
                function(a) {
                    a.preventDefault(),
                    f.login.dialog.show(1)
                })
            })))
        },
        _getFixed: function(b) {
            a.getScript(b)
        },
        getCard: function(a) {
            return i.getCard(this.gameid, a)
        },
        getWechat: function(a) {
            return i.getCard(this.gameid, a, "wechat")
        },
     
      
    }),


    i.extend({
       
    });



} (jQuery, SQ, this)

 