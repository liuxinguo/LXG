!function(a, b, c) {
    "use strict";
    var d = (g_config.key, g_config.id);
    g_config.name,
    g_config.url;
    a.gameId = d;
    var e = new a.Game({
       
        gConfig: g_config,
        top: !!b("#gs-top").length,

    }),


    f = window.main = {
        init: function() {
            var c = this;
        
            c.kv(b("#kv")),
            c.newsTab(b("#news")),
            c.gameData(),
            c.medias(),
            c.bookMark(),
            c.coming(),
            c.jietu(),
            c.gamedata(b(".ziliao")),
            c.links(b(".links")),
            c.roleTab(),
            c.roleTab2(),
      
            "wechat" === g_config.page && new a.Game.Card({
                game: e,
                type: "wechat"
            }),
            "getcard" === g_config.page && new a.Game.Card({
                game: e
            })
        },
   

  
        kv: function(b) {
            a.Tab && b && b.length && new a.Tab({
                el: b,
                tabs: ".kv-num li",
                panels: ".kv-img>li",
                eventType: "mouseenter",
                auto: !0,
                interval: 5e3,
                currentClass: "current"
            })
        },
        newsTab: function(c) {
            if (a.Tab && c && c.length) {
                var d = new a.Tab({
                    el: c,
                    tabs: ".news-tab li",
                    panels: ".news-list>ul",
                    eventType: "mouseenter",
                    auto: !1,
                    currentClass: "current",
                    animate: {
                        show: "fadeIn"
                    }
                }),
                e = b("#news-more");
                d.bind("change",
                function(a) {
                    e.attr("href", "http://fbdl.752g.com/" + d.tabs.eq(a).attr("data-news-more") + "/")
                })
            }
        },
        gameData: function() {
            var a = b(".zl");
            a.on("mouseenter",
            function() {
                b(this).addClass("show").siblings().removeClass("show")
            })
        },
        medias: function() {
            var a = b(".media-scroll li");
            a.length && a && a.length > 1 && b(".media-scroll").jCarouselLite({
                auto: 2e3,
                speed: 1e3,
                visible: 1
            })
        },
        bookMark: function(c, d) {
            b(document).on("click", ".bookmark",
            function(b) {
                b.preventDefault();
                var e = c || window.location.href,
                f = d || document.title;
                try {
                    window.external.AddFavorite(e, f)
                } catch(b) {
                    try {
                        window.sidebar.addPanel(f, e, "")
                    } catch(b) {
                        return a.alert("请您尝试同时按下Ctrl和D键收藏本页")
                    }
                }
            })
        },
        
        coming: function() {
            b(document).on("click", ".coming",
            function(c) {
                c.preventDefault();
                var d = b(this).attr("data-coming");
                a.alert(d)
            })
        },
        jietu: function() {
            var a = b(".jietu_pic li");
            a.length && a && a.length > 1 && b(".jietu_pic").jCarouselLite({
                auto: 4e3,
                speed: 500,
                visible: 1,
                verticle: !0,
                btnNext: "#right_click",
                btnPrev: "#left_click"
            })
        },
        gamedata: function(b) {
            a.Tab && b && b.length && new a.Tab({
                el: b,
                tabs: ".info_list li",
                panels: ".info",
                eventType: "mouseenter",
                auto: !0,
                interval: 5e3,
                currentClass: "focus"
            })
        },
        links: function(b) {
            a.Tab && b && b.length && new a.Tab({
                el: b,
                tabs: ".l-tab li",
                panels: ".con",
                eventType: "mouseenter",
                auto: !0,
                interval: 5e3,
                currentClass: "focus"
            })
        },
        roleTab: function() {
            var a, c, d = b("#roleTab li"),
            e = b("#rolePanel .role-detail"),
            f = b("#slideLine i"),
            g = f.width(),
            h = 0;
            d.eq(h).addClass("cur"),
            d.on("mouseenter",
            function(i) {
                i.preventDefault(),
                b(this).hasClass("cur") || (b(this).addClass("cur").siblings().removeClass("cur"), a = e.eq(h), a.find(".r-per").animate({
                    right: -415,
                    opacity: 0
                },
                {
                    queue: !1
                },
                800, "easeInOutCubic"), a.find(".r-desc").animate({
                    left: -350,
                    opacity: 0
                },
                {
                    queue: !1
                },
                800, "easeInOutCubic",
                function() {
                    a.hide()
                }), h = d.index(this), f.css("left", h * g), c = e.eq(h), c.show(), c.find(".r-per").delay(300).animate({
                    right: 0,
                    opacity: 1
                },
                {
                    queue: !1
                },
                800, "easeInOutCubic"), c.find(".r-desc").delay(200).animate({
                    left: 11,
                    opacity: 1
                },
                {
                    queue: !1
                },
                800, "easeInOutCubic"))
            })
        },
        roleTab2: function() {
            var a, c, d = b("#roleTab-2 li"),
            e = b("#rolePanel-2 .role-detail-2"),
            f = b("#slideLine-2 i"),
            g = f.width(),
            h = 0;
            d.eq(h).addClass("cur"),
            d.on("mouseenter",
            function(i) {
                i.preventDefault(),
                b(this).hasClass("cur") || (b(this).addClass("cur").siblings().removeClass("cur"), a = e.eq(h), a.find(".r-per-2").animate({
                    right: -415,
                    opacity: 0
                },
                {
                    queue: !1
                },
                800, "easeInOutCubic"), a.find(".r-desc-2").animate({
                    left: -350,
                    opacity: 0
                },
                {
                    queue: !1
                },
                800, "easeInOutCubic",
                function() {
                    a.hide()
                }), h = d.index(this), f.css("left", h * g), c = e.eq(h), c.show(), c.find(".r-per-2").delay(300).animate({
                    right: 0,
                    opacity: 1
                },
                {
                    queue: !1
                },
                800, "easeInOutCubic"), c.find(".r-desc-2").delay(200).animate({
                    left: 11,
                    opacity: 1
                },
                {
                    queue: !1
                },
                800, "easeInOutCubic"))
            })
        },
       
    };
    b(function() {
        f.init()
    })
} (SQ, jQuery);