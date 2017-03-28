!
function(a) {
    function b(b, c) {
        return parseInt(a.css(b[0], c)) || 0
    }
    function c(a) {
        return a[0].offsetWidth + b(a, "marginLeft") + b(a, "marginRight")
    }
    function d(a) {
        return a[0].offsetHeight + b(a, "marginTop") + b(a, "marginBottom")
    }
    a.fn.jCarouselLite = function(b) {
        return b = a.extend({
            btnPrev: null,
            btnNext: null,
            btnGo: null,
            mouseWheel: !1,
            auto: null,
            speed: 200,
            easing: null,
            vertical: !1,
            circular: !0,
            visible: 3,
            start: 0,
            scroll: 1,
            beforeStart: null,
            afterEnd: null
        },
        b || {}),
        this.each(function() {
            function s() {
                return m.slice(o).slice(0, l)
            }
            function t(c) {
                if (!e) {
                    if (b.beforeStart && b.beforeStart.call(this, s()), b.circular) c <= b.start - l - 1 ? (i.css(f, -((n - 2 * l) * p) + "px"), o = c == b.start - l - 1 ? n - 2 * l - 1 : n - 2 * l - b.scroll) : c >= n - l + 1 ? (i.css(f, -(l * p) + "px"), o = c == n - l + 1 ? l + 1 : l + b.scroll) : o = c;
                    else {
                        if (0 > c || c > n - l) return;
                        o = c
                    }
                    e = !0,
                    i.animate("left" == f ? {
                        left: -(o * p)
                    }: {
                        top: -(o * p)
                    },
                    b.speed, b.easing,
                    function() {
                        b.afterEnd && b.afterEnd.call(this, s()),
                        e = !1
                    }),
                    b.circular || (a(b.btnPrev + "," + b.btnNext).removeClass("disabled"), a(o - b.scroll < 0 && b.btnPrev || o + b.scroll > n - l && b.btnNext || []).addClass("disabled"))
                }
                return ! 1
            }
            var m, n, o, p, q, r, e = !1,
            f = b.vertical ? "top": "left",
            g = b.vertical ? "height": "width",
            h = a(this),
            i = a("ul", h),
            j = a("li", i),
            k = j.size(),
            l = b.visible;
            b.circular && (i.prepend(j.slice(k - l - 1 + 1).clone()).append(j.slice(0, l).clone()), b.start += l),
            m = a("li", i),
            n = m.size(),
            o = b.start,
            h.css("visibility", "visible"),
            m.css({
                overflow: "hidden",
                "float": b.vertical ? "none": "left"
            }),
            i.css({
                margin: "0",
                padding: "0",
                position: "relative",
                "list-style-type": "none",
                "z-index": "1"
            }),
            h.css({
                overflow: "hidden",
                position: "relative",
                "z-index": "2",
                left: "0px"
            }),
            p = b.vertical ? d(m) : c(m),
            q = p * n,
            r = p * l,
            m.css({
                width: m.width(),
                height: m.height()
            }),
            i.css(g, q + "px").css(f, -(o * p)),
            h.css(g, r + "px"),
            b.btnPrev && a(b.btnPrev).click(function() {
                return t(o - b.scroll)
            }),
            b.btnNext && a(b.btnNext).click(function() {
                return t(o + b.scroll)
            }),
            b.btnGo && a.each(b.btnGo,
            function(c, d) {
                a(d).click(function() {
                    return t(b.circular ? b.visible + c: c)
                })
            }),
            b.mouseWheel && h.mousewheel && h.mousewheel(function(a, c) {
                return c > 0 ? t(o - b.scroll) : t(o + b.scroll)
            }),
            b.auto && setInterval(function() {
                t(o + b.scroll)
            },
            b.auto + b.speed)
        })
    }
} (jQuery);