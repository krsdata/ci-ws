/*
 * AllInOne Banner - Carousel v3.2
 *
 * Copyright 2012-2013, LambertGroup
 * 
 */
(function(c) {
    function H(a, b) {
        b.responsive && (newCss = "", -1 != a.css("font-size").lastIndexOf("px") ? (fontSize = a.css("font-size").substr(0, a.css("font-size").lastIndexOf("px")), newCss += "font-size:" + fontSize / (b.origWidth / b.width) + "px;") : -1 != a.css("font-size").lastIndexOf("em") && (fontSize = a.css("font-size").substr(0, a.css("font-size").lastIndexOf("em")), newCss += "font-size:" + fontSize / (b.origWidth / b.width) + "em;"), -1 != a.css("line-height").lastIndexOf("px") ? (lineHeight = a.css("line-height").substr(0, a.css("line-height").lastIndexOf("px")), newCss += "line-height:" + lineHeight / (b.origWidth / b.width) + "px;") : -1 != a.css("line-height").lastIndexOf("em") && (lineHeight = a.css("line-height").substr(0, a.css("line-height").lastIndexOf("em")), newCss += "line-height:" + lineHeight / (b.origWidth / b.width) + "em;"), a.wrapInner('<div class="newFS" style="' + newCss + '" />'))
    }

    function F(a, b) {
        nowx = (new Date).getTime();
        !a.mouseOverBanner && (!a.effectIsRunning && b.showCircleTimer) && (a.ctx.clearRect(0, 0, a.canvas.width, a.canvas.height), a.ctx.beginPath(), a.ctx.globalAlpha = b.behindCircleAlpha / 100, a.ctx.arc(b.circleRadius + 2 * b.circleLineWidth, b.circleRadius + 2 * b.circleLineWidth, b.circleRadius, 0, 2 * Math.PI, !1), a.ctx.lineWidth = b.circleLineWidth + 2, a.ctx.strokeStyle = b.behindCircleColor, a.ctx.stroke(), a.ctx.beginPath(), a.ctx.globalAlpha = b.circleAlpha / 100, a.ctx.arc(b.circleRadius + 2 * b.circleLineWidth, b.circleRadius + 2 * b.circleLineWidth, b.circleRadius, 0, 2 * ((a.timeElapsed + nowx - a.arcInitialTime) / 1E3) / b.autoPlay * Math.PI, !1), a.ctx.lineWidth = b.circleLineWidth, a.ctx.strokeStyle = b.circleColor, a.ctx.stroke())
    }

    function z(a, b, h, l, f, k, p, u, g) {
        b.showCircleTimer && c(".mycanvas", k).css({
            display: "none"
        });
        var d, j, n, q;
        "true" == c(f[h.current_img_no]).attr("data-video") && (c("#contentHolderUnit_" + h.current_img_no, k).html(c(f[h.current_img_no]).html()), b.responsive && b.width != b.origWidth && E(c("#contentHolderUnit_" + h.current_img_no, k), 0, b, h));
        c(l[h.current_img_no]).removeClass("bottomNavButtonON");
        h.current_img_no = B(h.current_img_no, a, p);
        "true" != c(f[h.current_img_no]).attr("data-video") && u.css("display", "none");
        c(l[h.current_img_no]).addClass("bottomNavButtonON");
        h.currentZ_index = 100;
        h.currentImg = c("#contentHolderUnit_" + h.current_img_no, k);
        d = b.contentHolderUnitOrigWidth / (b.origWidth / b.width);
        j = b.contentHolderUnitOrigHeight / (b.origWidth / b.width);
        n = parseInt((b.width - b.contentHolderUnitOrigWidth / (b.origWidth / b.width)) / 2, 10);
        q = parseInt(b.height - b.contentHolderUnitOrigHeight / (b.origWidth / b.width), 10) - b.verticalAdjustment / (b.origWidth / b.width);
        C(h.currentImg, n, q, d, j, 1, !1, a, h, b, g, f, p, u, l, k);
        v = h.current_img_no;
        for (m = 1; m <= Math.floor(b.numberOfVisibleItems / 2); m++) h.currentZ_index--, v = B(v, -1, p), h.currentImg = c("#contentHolderUnit_" + v, k), h.currentImg.css("z-index", h.currentZ_index), m == Math.floor(b.numberOfVisibleItems / 2) && (1 === a ? (last_aux_img_no = B(v, -1, p), last_currentImg = c("#contentHolderUnit_" + last_aux_img_no, k), j = b.contentHolderUnitOrigHeight / (b.origWidth / b.width) - 2 * (m + 1) * b.elementsVerticalSpacing / (b.origWidth / b.width), d = parseInt(j * h.aspectOrig, 10), n = parseInt((b.width - b.contentHolderUnitOrigWidth / (b.origWidth / b.width)) / 2, 10) - (m + 1) * b.elementsHorizontalSpacing / (b.origWidth / b.width), q = parseInt(b.height - b.contentHolderUnitOrigHeight / (b.origWidth / b.width), 10) - b.verticalAdjustment / (b.origWidth / b.width) + (m + 1) * b.elementsVerticalSpacing / (b.origWidth / b.width), C(last_currentImg, n, q, d, j, 0, !1, a, h, b, g, f, p, u, l, k)) : (j = b.contentHolderUnitOrigHeight / (b.origWidth / b.width) - 2 * (m + 1) * b.elementsVerticalSpacing / (b.origWidth / b.width), parseInt(j * h.aspectOrig, 10), E(h.currentImg, m + 1, b, h), n = parseInt((b.width - b.contentHolderUnitOrigWidth / (b.origWidth / b.width)) / 2, 10) - (m + 1) * b.elementsHorizontalSpacing / (b.origWidth / b.width), q = parseInt(b.height - b.contentHolderUnitOrigHeight / (b.origWidth / b.width), 10) - b.verticalAdjustment / (b.origWidth / b.width) + (m + 1) * b.elementsVerticalSpacing / (b.origWidth / b.width), h.currentImg.css({
            left: n + "px",
            top: q + "px",
            opacity: 0
        }))), h.currentImg.css("display", "block"), j = b.contentHolderUnitOrigHeight / (b.origWidth / b.width) - 2 * m * b.elementsVerticalSpacing / (b.origWidth / b.width), d = parseInt(j * h.aspectOrig, 10), n = parseInt((b.width - b.contentHolderUnitOrigWidth / (b.origWidth / b.width)) / 2, 10) - m * b.elementsHorizontalSpacing / (b.origWidth / b.width), q = parseInt(b.height - b.contentHolderUnitOrigHeight / (b.origWidth / b.width), 10) - b.verticalAdjustment / (b.origWidth / b.width) + m * b.elementsVerticalSpacing / (b.origWidth / b.width), C(h.currentImg, n, q, d, j, 1, !1, a, h, b, g, f, p, u, l, k);
        var v = h.current_img_no;
        for (m = 1; m <= Math.floor(b.numberOfVisibleItems / 2); m++) h.currentZ_index--, v = B(v, 1, p), h.currentImg = c("#contentHolderUnit_" + v, k), h.currentImg.css("z-index", h.currentZ_index), m == Math.floor(b.numberOfVisibleItems / 2) && (1 === a ? (E(h.currentImg, m + 1, b, h), h.currentImg.css({
            left: parseInt((b.width - b.contentHolderUnitOrigWidth / (b.origWidth / b.width)) / 2, 10) + (b.contentHolderUnitOrigWidth / (b.origWidth / b.width) + (m + 1) * b.elementsHorizontalSpacing / (b.origWidth / b.width) - h.currentImg.width()) + "px",
            top: parseInt(b.height - b.contentHolderUnitOrigHeight / (b.origWidth / b.width), 10) - b.verticalAdjustment / (b.origWidth / b.width) + (m + 1) * b.elementsVerticalSpacing / (b.origWidth / b.width) + "px",
            opacity: 0
        })) : (last_aux_img_no = B(v, 1, p), last_currentImg = c("#contentHolderUnit_" + last_aux_img_no, k), j = b.contentHolderUnitOrigHeight / (b.origWidth / b.width) - 2 * (m + 1) * b.elementsVerticalSpacing / (b.origWidth / b.width), d = parseInt(j * h.aspectOrig, 10), n = parseInt((b.width - b.contentHolderUnitOrigWidth / (b.origWidth / b.width)) / 2, 10) + (b.contentHolderUnitOrigWidth / (b.origWidth / b.width) + (m + 1) * b.elementsHorizontalSpacing / (b.origWidth / b.width) - d), q = parseInt(b.height - b.contentHolderUnitOrigHeight / (b.origWidth / b.width), 10) - b.verticalAdjustment / (b.origWidth / b.width) + (m + 1) * b.elementsVerticalSpacing / (b.origWidth / b.width), C(last_currentImg, n, q, d, j, 0, !1, a, h, b, g, f, p, u, l, k))), h.currentImg.css("display", "block"), j = b.contentHolderUnitOrigHeight / (b.origWidth / b.width) - 2 * m * b.elementsVerticalSpacing / (b.origWidth / b.width), d = parseInt(j * h.aspectOrig, 10), n = parseInt((b.width - b.contentHolderUnitOrigWidth / (b.origWidth / b.width)) / 2, 10) + (b.contentHolderUnitOrigWidth / (b.origWidth / b.width) + m * b.elementsHorizontalSpacing / (b.origWidth / b.width) - d), q = parseInt(b.height - b.contentHolderUnitOrigHeight / (b.origWidth / b.width), 10) - b.verticalAdjustment / (b.origWidth / b.width) + m * b.elementsVerticalSpacing / (b.origWidth / b.width), m == Math.floor(b.numberOfVisibleItems / 2) ? C(h.currentImg, n, q, d, j, 1, !0, a, h, b, g, f, p, u, l, k) : C(h.currentImg, n, q, d, j, 1, !1, a, h, b, g, f, p, u, l, k)
    }

    function E(a, b, c, l) {
        b = c.contentHolderUnitOrigHeight / (c.origWidth / c.width) - 2 * b * (c.elementsVerticalSpacing / (c.origWidth / c.width));
        l = parseInt(b * l.aspectOrig, 10);
        a.css({
            height: b + "px",
            width: l + "px"
        });
        c.resizeImages && (imgInside = a.find("img:first"), imgInside.is("img") && imgInside.css({
            height: b + "px",
            width: l + "px"
        }))
    }

    function C(a, b, h, l, f, k, p, u, g, d, j, n, q, v, x, r) {
        g.slideIsRunning = !0;
        j.html(c(n[g.current_img_no]).attr("data-title"));
        d.responsive && H(j, d);
        0 === k ? a.css("z-index", g.currentZ_index - 1) : a.css("z-index", g.currentZ_index);
        a.css("display", "block");
        a.animate({
            left: b + "px",
            top: h + "px",
            width: l + "px",
            height: f + "px",
            opacity: k
        }, 1E3 * d.animationTime, d.easing, function() {
            if (p) {
                g.slideIsRunning = !1;
                g.arcInitialTime = (new Date).getTime();
                g.timeElapsed = 0;
                d.showCircleTimer && (clearInterval(g.intervalID), g.ctx.clearRect(0, 0, g.canvas.width, g.canvas.height), g.ctx.beginPath(), g.ctx.globalAlpha = d.behindCircleAlpha / 100, g.ctx.arc(d.circleRadius + 2 * d.circleLineWidth, d.circleRadius + 2 * d.circleLineWidth, d.circleRadius, 0, 2 * Math.PI, !1), g.ctx.lineWidth = d.circleLineWidth + 2, g.ctx.strokeStyle = d.behindCircleColor, g.ctx.stroke(), g.ctx.beginPath(), g.ctx.globalAlpha = d.circleAlpha / 100, g.ctx.arc(d.circleRadius + 2 * d.circleLineWidth, d.circleRadius + 2 * d.circleLineWidth, d.circleRadius, 0, 0, !1), g.ctx.lineWidth = d.circleLineWidth, g.ctx.strokeStyle = d.circleColor, g.ctx.stroke(), g.intervalID = setInterval(function() {
                    F(g, d)
                }, 125), cLeftPos = c("#contentHolderUnit_" + g.current_img_no, r).css("left"), cTopPos = c("#contentHolderUnit_" + g.current_img_no, r).css("top"), c(".mycanvas", r).css({
                    display: "block",
                    left: parseInt(cLeftPos.substr(0, cLeftPos.lastIndexOf("px")), 10) + parseInt(d.circleLeftPositionCorrection / (d.origWidth / d.width), 10) + "px",
                    top: parseInt(cTopPos.substr(0, cTopPos.lastIndexOf("px")), 10) + parseInt(d.circleTopPositionCorrection / (d.origWidth / d.width), 10) + "px"
                }));
                "true" == c(n[g.current_img_no]).attr("data-video") && v.css("display", "block");
                if (0 < d.autoPlay && 1 < q && !g.mouseOverBanner && !g.fastForwardRunning || g.current_img_no != g.img_no_where_to_stop && g.fastForwardRunning) clearTimeout(g.timeoutID), g.timeoutID = setTimeout(function() {
                    z(u, d, g, x, n, r, q, v, j)
                }, 1E3 * d.autoPlay);
                g.current_img_no == g.img_no_where_to_stop && g.fastForwardRunning && (g.fastForwardRunning = !1, d.animationTime = g.animationTimeOrig, d.autoPlay = g.autoPlayOrig)
            }
        });
        d.resizeImages && (imgInside = a.find("img:first"), imgInside.is("img") && imgInside.animate({
            width: l + "px",
            height: f + "px"
        }, 1E3 * d.animationTime, d.easing, function() {}))
    }

    function B(a, b, c) {
        return a + b >= c ? 0 : 0 > a + b ? c - 1 : a + b
    }

    function I(a, b, c, l, f, k, p, u, g) {
        -1 === c.current_img_no - a ? z(1, b, c, l, f, k, p, u, g) : 1 === c.current_img_no - a ? z(-1, b, c, l, f, k, p, u, g) : (c.fastForwardRunning = !0, b.animationTime = 0.4, b.autoPlay = 0.1, c.img_no_where_to_stop = a, c.current_img_no < a ? a - c.current_img_no < p - a + c.current_img_no ? z(1, b, c, l, f, k, p, u, g) : z(-1, b, c, l, f, k, p, u, g) : c.current_img_no > a && (c.current_img_no - a < p - c.current_img_no + a ? z(-1, b, c, l, f, k, p, u, g) : z(1, b, c, l, f, k, p, u, g)))
    }

    function J() {
        var a = -1;
        "Microsoft Internet Explorer" == navigator.appName && null != /MSIE ([0-9]{1,}[.0-9]{0,})/.exec(navigator.userAgent) && (a = parseFloat(RegExp.$1));
        return parseInt(a, 10)
    }
    var D = !1;
    c.fn.allinone_carousel = function(a) {
        a = c.extend({}, c.fn.allinone_carousel.defaults, a);
        return this.each(function() {
            var b = c(this);
            responsiveWidth = b.parent().width();
            responsiveHeight = b.parent().height();
            a.responsiveRelativeToBrowser && (responsiveWidth = c(window).width(), responsiveHeight = c(window).height());
            a.origWidth = a.width;
            a.width100Proc && (a.width = responsiveWidth);
            a.origHeight = a.height;
            a.height100Proc && (a.height = responsiveHeight);
            if (a.responsive && (a.origWidth != responsiveWidth || a.width100Proc)) a.width = a.origWidth > responsiveWidth || a.width100Proc ? responsiveWidth : a.origWidth, a.height100Proc || (a.height = a.width / (a.origWidth / a.origHeight));
            a.width = parseInt(a.width, 10);
            a.height = parseInt(a.height, 10);
            a.enableTouchScreen && a.responsive && (a.width -= 1);
            var h = c("<div></div>").addClass("allinone_carousel").addClass(a.skin),
                l = c('<div class="bannerControls"> <div class="leftNav"></div> <div class="rightNav"></div> </div> <div class="contentHolder"></div> <div class="elementTitle"></div>\t<div class="playOver"></div> <canvas class="mycanvas"></canvas>');
            b.wrap(h);
            b.after(l);
            var f = b.parent(".allinone_carousel"),
                l = c(".bannerControls", f),
                k = c(".contentHolder", f),
                h = c('<div class="bottomNavLeft"></div>'),
                p = c('<div class="bottomNav"></div>'),
                u = c('<div class="bottomNavRight"></div>');
            b.after(h);
            b.after(p);
            b.after(u);
            a.showAllControllers || l.css("display", "none");
            var g = c(".leftNav", f),
                d = c(".rightNav", f);
            g.css("display", "none");
            d.css("display", "none");
            a.showNavArrows && a.showOnInitNavArrows && (g.css("display", "block"), d.css("display", "block"));
            var j = c(".bottomNav", f),
                n = c(".bottomNavLeft", f),
                q = c(".bottomNavRight", f),
                v;
            j.css("display", "block");
            n.css("display", "block");
            q.css("display", "block");
            j.css({
                bottom: a.bottomNavMarginBottom + "px",
                top: "auto"
            });
            n.css({
                bottom: a.bottomNavMarginBottom + "px",
                top: "auto"
            });
            q.css({
                bottom: a.bottomNavMarginBottom + "px",
                top: "auto"
            });
            a.showBottomNav || (j.css("display", "none"), n.css("display", "none"), q.css("display", "none"));
            a.showOnInitBottomNav || (j.css("left", "-5000px"), n.css("left", "-5000px"), q.css("left", "-5000px"));
            var x = c(".elementTitle", f);
            a.showElementTitle || x.css("display", "none");
            a.elementOrigTop = parseInt(x.css("top").substr(0, x.css("top").lastIndexOf("px")), 10);
            x.css("top", parseInt(a.elementOrigTop / (a.origWidth / a.width), 10));
            var r = c(".playOver", f),
                h = J(),
                s = 0,
                e = {
                    current_img_no: 0,
                    currentImg: 0,
                    currentZ_index: 101,
                    slideIsRunning: !1,
                    mouseOverBanner: !1,
                    fastForwardRunning: !1,
                    isVideoPlaying: !1,
                    img_no_where_to_stop: 0,
                    aspectOrig: 0,
                    timeoutID: "",
                    animationTimeOrig: a.animationTime,
                    autoPlayOrig: a.autoPlay,
                    timeoutID: "",
                    intervalID: "",
                    arcInitialTime: (new Date).getTime(),
                    timeElapsed: 0,
                    windowWidth: 0,
                    canvas: "",
                    ctx: "",
                    bannerRatio: a.origWidth / a.origHeight
                },
                C;
            e.canvas = c(".mycanvas", f)[0];
            e.canvas.width = 2 * a.circleRadius + 4 * a.circleLineWidth;
            e.canvas.height = 2 * a.circleRadius + 4 * a.circleLineWidth; - 1 != h && 9 > h && (a.showCircleTimer = !1);
            a.showCircleTimer && (e.ctx = e.canvas.getContext("2d"));
            f.width(a.width);
            f.height(a.height);
            k.width(a.width);
            k.height(a.height);
            l.css("margin-top", parseInt((a.height - g.height()) / 2, 10) + a.nextPrevMarginTop / (a.origWidth / a.width) + "px");
            var t = b.find("ul:first").children();
            a.numberOfVisibleItems > b.find("ul:first li").length && (a.numberOfVisibleItems = b.find("ul:first li").length);
            a.numberOfVisibleItems % 2 || a.numberOfVisibleItems--;
            var w, A, B = 0,
                K = 0;
            t.each(function() {
                e.currentImg = c(this);
                e.currentImg.is("li") || (e.currentImg = e.currentImg.find("li:first"));
                e.currentImg.is("li") && (s++, w = c('<div class="contentHolderUnit" rel="' + (s - 1) + '" id="contentHolderUnit_' + (s - 1) + '">' + e.currentImg.html() + "</div>"), k.append(w), w.css("display", "none"), 0 === a.contentHolderUnitOrigWidth && (a.contentHolderUnitOrigWidth = w.width(), a.contentHolderUnitOrigHeight = w.height(), e.aspectOrig = a.contentHolderUnitOrigWidth / a.contentHolderUnitOrigHeight), E(w, 0, a, e), w.css({
                    left: parseInt((a.width - w.width()) / 2, 10) + "px",
                    top: parseInt(a.height - w.height(), 10) - a.verticalAdjustment / (a.origWidth / a.width) + "px"
                }), 1 == s ? (w.css({
                    left: parseInt((a.width - w.width()) / 2, 10) + "px",
                    top: parseInt(a.height - w.height(), 10) - a.verticalAdjustment / (a.origWidth / a.width) + "px",
                    "z-index": e.currentZ_index,
                    display: "block"
                }), "true" == c(t[e.current_img_no]).attr("data-video") && r.css("display", "block")) : s <= Math.ceil(a.numberOfVisibleItems / 2) && (e.currentZ_index--, E(w, s - 1, a, e), w.css({
                    left: parseInt((a.width - a.contentHolderUnitOrigWidth / (a.origWidth / a.width)) / 2, 10) + (a.contentHolderUnitOrigWidth / (a.origWidth / a.width) + (s - 1) * a.elementsHorizontalSpacing / (a.origWidth / a.width) - w.width()) + "px",
                    top: parseInt(a.height - a.contentHolderUnitOrigHeight / (a.origWidth / a.width), 10) - a.verticalAdjustment / (a.origWidth / a.width) + (s - 1) * a.elementsVerticalSpacing / (a.origWidth / a.width) + "px",
                    "z-index": e.currentZ_index,
                    display: "block"
                })), A = c('<div class="bottomNavButtonOFF" rel="' + (s - 1) + '"></div>'), j.append(A), B += parseInt(A.css("padding-left").substring(0, A.css("padding-left").length - 2), 10) + A.width(), K = parseInt((j.height() - parseInt(A.css("height").substring(0, A.css("height").length - 2))) / 2, 10), A.css("margin-top", K + "px"))
            });
            r.css({
                left: parseInt((a.width - r.width()) / 2, 10) + "px",
                top: parseInt(a.height - a.contentHolderUnitOrigHeight / (a.origWidth / a.width), 10) + parseInt((a.contentHolderUnitOrigHeight / (a.origWidth / a.width) - r.height()) / 2, 10) - parseInt(a.verticalAdjustment / (a.origWidth / a.width), 10) + "px",
                "margin-top": a.playMovieMarginTop / (a.origWidth / a.width)
            });
            a.showCircleTimer && (cLeftPos = c("#contentHolderUnit_" + e.current_img_no, f).css("left"), cTopPos = c("#contentHolderUnit_" + e.current_img_no, f).css("top"), c(".mycanvas", f).css({
                left: parseInt(cLeftPos.substr(0, cLeftPos.lastIndexOf("px")), 10) + parseInt(a.circleLeftPositionCorrection / (a.origWidth / a.width), 10) + "px",
                top: parseInt(cTopPos.substr(0, cTopPos.lastIndexOf("px")), 10) + parseInt(a.circleTopPositionCorrection / (a.origWidth / a.width), 10) + "px"
            }));
            e.currentZ_index = 100;
            for (m = 1; m <= Math.floor(a.numberOfVisibleItems / 2); m++) e.currentZ_index--, E(c("#contentHolderUnit_" + (s - m), f), m, a, e), c("#contentHolderUnit_" + (s - m), f).css({
                left: parseInt((a.width - a.contentHolderUnitOrigWidth / (a.origWidth / a.width)) / 2, 10) - m * a.elementsHorizontalSpacing / (a.origWidth / a.width) + "px",
                top: parseInt(a.height - a.contentHolderUnitOrigHeight / (a.origWidth / a.width), 10) - a.verticalAdjustment / (a.origWidth / a.width) + m * a.elementsVerticalSpacing / (a.origWidth / a.width) + "px",
                "z-index": e.currentZ_index,
                display: "block"
            });
            x.html(c(t[0]).attr("data-title"));
            a.responsive && H(x, a);
            j.width(B);
            a.showOnInitBottomNav && (j.css("left", parseInt((f.width() - B) / 2, 10) + "px"), n.css("left", parseInt(j.css("left").substring(0, j.css("left").length - 2), 10) - n.width() + "px"), q.css("left", parseInt(j.css("left").substring(0, j.css("left").length - 2), 10) + j.width() + parseInt(A.css("padding-left").substring(0, A.css("padding-left").length - 2), 10) + "px"));
            c("iframe", f).each(function() {
                var a = c(this).attr("src"),
                    b = "?wmode=transparent"; - 1 != a.indexOf("?") && (b = "&wmode=transparent");
                c(this).attr("src", a + b)
            });
            e.current_img_no = 0;
            e.currentImg = c(t[e.current_img_no]);
            f.mouseenter(function() {
                e.mouseOverBanner = !0;
                clearTimeout(e.timeoutID);
                nowx = (new Date).getTime();
                e.timeElapsed += nowx - e.arcInitialTime;
                a.autoHideNavArrows && a.showNavArrows && (g.css("display", "block"), d.css("display", "block"));
                a.autoHideBottomNav && a.showBottomNav && (j.css({
                    display: "block",
                    left: parseInt((f.width() - B) / 2, 10) + "px"
                }), n.css({
                    display: "block",
                    left: parseInt(j.css("left").substring(0, j.css("left").length - 2), 10) - n.width() + "px"
                }), q.css({
                    display: "block",
                    left: parseInt(j.css("left").substring(0, j.css("left").length - 2), 10) + j.width() + parseInt(A.css("padding-left").substring(0, A.css("padding-left").length - 2), 10) + "px"
                }))
            });
            f.mouseleave(function() {
                e.mouseOverBanner = !1;
                nowx = (new Date).getTime();
                a.autoHideNavArrows && a.showNavArrows && (g.css("display", "none"), d.css("display", "none"));
                a.autoHideBottomNav && a.showBottomNav && (j.css("display", "none"), n.css("display", "none"), q.css("display", "none"));
                if (0 < a.autoPlay && 1 < s && !e.fastForwardRunning && !e.isVideoPlaying) {
                    clearTimeout(e.timeoutID);
                    e.arcInitialTime = (new Date).getTime();
                    var b = parseInt(1E3 * a.autoPlay - (e.timeElapsed + nowx - e.arcInitialTime), 10);
                    e.timeoutID = setTimeout(function() {
                        z(1, a, e, y, t, f, s, r, x)
                    }, b)
                }
            });
            w = c(".contentHolderUnit", f);
            w.click(function() {
                if (!e.slideIsRunning && !e.fastForwardRunning) {
                    var b = c(this).attr("rel");
                    b != e.current_img_no ? (e.isVideoPlaying = !1, c(y[e.current_img_no]).removeClass("bottomNavButtonON"), I(parseInt(b, 10), a, e, y, t, f, s, r, x)) : "true" == c(t[e.current_img_no]).attr("data-video") ? (r.css("display", "none"), C = c(this).find("img:first"), C.css("display", "none"), e.isVideoPlaying = !0) : void 0 != c(t[e.current_img_no]).attr("data-link") && ("" != c(t[e.current_img_no]).attr("data-link") && !e.effectIsRunning && !D) && (b = a.target, void 0 != c(t[e.current_img_no]).attr("data-target") && "" != c(t[e.current_img_no]).attr("data-target") && (b = c(t[e.current_img_no]).attr("data-target")), "_blank" == b ? window.open(c(t[e.current_img_no]).attr("data-link")) : window.location = c(t[e.current_img_no]).attr("data-link"))
                }
            });
            r.click(function() {
                a.showCircleTimer && c(".mycanvas", f).css({
                    display: "none"
                });
                r.css("display", "none");
                C = c("#contentHolderUnit_" + e.current_img_no, f).find("img:first");
                C.css("display", "none");
                e.isVideoPlaying = !0
            });
            g.mousedown(function() {
                D = !0;
                !e.slideIsRunning && !e.fastForwardRunning && (e.isVideoPlaying = !1, clearTimeout(e.timeoutID), z(-1, a, e, y, t, f, s, r, x))
            });
            g.mouseup(function() {
                D = !1
            });
            d.mousedown(function() {
                D = !0;
                !e.slideIsRunning && !e.fastForwardRunning && (e.isVideoPlaying = !1, clearTimeout(e.timeoutID), z(1, a, e, y, t, f, s, r, x))
            });
            d.mouseup(function() {
                D = !1
            });
            var y = c(".bottomNavButtonOFF", f);
            y.mousedown(function() {
                D = !0;
                if (!e.slideIsRunning && !e.fastForwardRunning) {
                    var b = c(this).attr("rel");
                    b != e.current_img_no && (e.isVideoPlaying = !1, c(y[e.current_img_no]).removeClass("bottomNavButtonON"), I(parseInt(b, 10), a, e, y, t, f, s, r, x))
                }
            });
            y.mouseup(function() {
                D = !1
            });
            y.mouseenter(function() {
                var b = c(this),
                    e = b.attr("rel");
                a.showPreviewThumbs && (v = c('<div class="bottomOverThumb"></div>'), b.append(v), e = c(t[e]).attr("data-bottom-thumb"), v.html('<img src="' + e + '">'));
                b.addClass("bottomNavButtonON")
            });
            y.mouseleave(function() {
                var b = c(this),
                    f = b.attr("rel");
                a.showPreviewThumbs && v.remove();
                e.current_img_no != f && b.removeClass("bottomNavButtonON")
            });
            a.enableTouchScreen && (h = Math.floor(1E5 * Math.random()), f.wrap('<div id="carouselParent_' + h + '" style="position:relative;" />'), c("#carouselParent_" + h).width(a.width + 1), c("#carouselParent_" + h).height(a.height), f.css({
                cursor: "url(" + a.absUrl + "skins/hand.cur),url(" + a.absUrl + "skins/hand.cur),move",
                left: "0px",
                position: "absolute"
            }), rightVal = parseInt(d.css("right").substring(0, d.css("right").length - 2), 10), f.mousedown(function() {
                rightVal = parseInt(d.css("right").substring(0, d.css("right").length - 2), 10);
                0 > rightVal && !D && (d.css({
                    visibility: "hidden",
                    right: "0"
                }), g.css("visibility", "hidden"))
            }), f.mouseup(function() {
                D = !1;
                0 > rightVal && (d.css({
                    right: rightVal + "px",
                    visibility: "visible"
                }), g.css("visibility", "visible"))
            }), f.draggable({
                axis: "x",
                containment: "parent",
                distance: 10,
                start: function() {
                    origLeft = c(this).css("left")
                },
                stop: function() {
                    e.effectIsRunning || (finalLeft = c(this).css("left"), direction = 1, origLeft < finalLeft && (direction = -1), z(direction, a, e, y, t, f, s, r, x));
                    0 > rightVal && (d.css({
                        right: rightVal + "px",
                        visibility: "visible"
                    }), g.css("visibility", "visible"));
                    c(this).css("left", "0px")
                }
            }));
            var G = !1;
            c(window).resize(function() {
                var d = J();
                doResizeNow = !0; - 1 != navigator.userAgent.indexOf("Android") && (0 == a.windowOrientationScreenSize0 && 0 == window.orientation && (a.windowOrientationScreenSize0 = c(window).width()), 0 == a.windowOrientationScreenSize90 && 90 == window.orientation && (a.windowOrientationScreenSize90 = c(window).height()), 0 == a.windowOrientationScreenSize_90 && -90 == window.orientation && (a.windowOrientationScreenSize_90 = c(window).height()), a.windowOrientationScreenSize0 && (0 == window.orientation && c(window).width() > a.windowOrientationScreenSize0) && (doResizeNow = !1), a.windowOrientationScreenSize90 && (90 == window.orientation && c(window).height() > a.windowOrientationScreenSize90) && (doResizeNow = !1), a.windowOrientationScreenSize_90 && (-90 == window.orientation && c(window).height() > a.windowOrientationScreenSize_90) && (doResizeNow = !1), 0 == e.windowWidth && (doResizeNow = !1, e.windowWidth = c(window).width())); - 1 != d && (9 == d && 0 == e.windowWidth) && (doResizeNow = !1);
                e.windowWidth == c(window).width() ? (doResizeNow = !1, a.windowCurOrientation != window.orientation && -1 != navigator.userAgent.indexOf("Android") && (a.windowCurOrientation = window.orientation, doResizeNow = !0)) : e.windowWidth = c(window).width();
                a.responsive && doResizeNow && (!1 !== G && clearTimeout(G), G = setTimeout(function() {
                    var d = a,
                        h = s,
                        p = l,
                        u = A,
                        v = y,
                        w = c("body").css("overflow");
                    c("body").css("overflow", "hidden");
                    r.css("display", "none");
                    d.enableTouchScreen ? (responsiveWidth = b.parent().parent().parent().width(), responsiveHeight = b.parent().parent().parent().height()) : (responsiveWidth = b.parent().parent().width(), responsiveHeight = b.parent().parent().height());
                    d.responsiveRelativeToBrowser && (responsiveWidth = c(window).width(), responsiveHeight = c(window).height());
                    d.width100Proc && (d.width = responsiveWidth);
                    d.height100Proc && (d.height = responsiveHeight);
                    if (d.origWidth != responsiveWidth || d.width100Proc) d.origWidth > responsiveWidth || d.width100Proc ? d.width = responsiveWidth : d.width100Proc || (d.width = d.origWidth), d.height100Proc || (d.height = d.width / e.bannerRatio), d.width = parseInt(d.width, 10), d.height = parseInt(d.height, 10), d.enableTouchScreen && d.responsive && (d.width -= 1), f.width(d.width), f.height(d.height), k.width(d.width), k.height(d.height), d.enableTouchScreen && (f.parent().width(d.width + 1), f.parent().height(d.height)), p.css("margin-top", parseInt((d.height - g.height()) / 2, 10) + d.nextPrevMarginTop / (d.origWidth / d.width) + "px"), j.css("left", parseInt((f.width() - j.width()) / 2, 10) + "px"), n.css("left", parseInt(j.css("left").substring(0, j.css("left").length - 2), 10) - n.width() + "px"), q.css("left", parseInt(j.css("left").substring(0, j.css("left").length - 2), 10) + j.width() + parseInt(u.css("padding-left").substring(0, u.css("padding-left").length - 2), 10) + "px"), r.css({
                        left: parseInt((d.width - r.width()) / 2, 10) + "px",
                        top: parseInt(d.height - d.contentHolderUnitOrigHeight / (d.origWidth / d.width), 10) + parseInt((d.contentHolderUnitOrigHeight / (d.origWidth / d.width) - r.height()) / 2, 10) - parseInt(d.verticalAdjustment / (d.origWidth / d.width), 10) + "px",
                        "margin-top": d.playMovieMarginTop / (d.origWidth / d.width)
                    }), x.css("top", parseInt(d.elementOrigTop / (d.origWidth / d.width), 10)), clearTimeout(e.timeoutID), clearInterval(e.intervalID), e.timeoutID = setTimeout(function() {
                        z(1, d, e, v, t, f, h, r, x)
                    }, 0.1);
                    c("body").css("overflow", w)
                }, 300))
            });
            c(y[e.current_img_no]).addClass("bottomNavButtonON");
            h = f.find("img:first");
            h[0].complete ? (c(".myloader", f).css("display", "none"), 0 < a.autoPlay && 1 < s && (a.showCircleTimer && (e.arcInitialTime = (new Date).getTime(), e.timeElapsed = 0, e.intervalID = setInterval(function() {
                F(e, a)
            }, 125)), e.timeoutID = setTimeout(function() {
                z(1, a, e, y, t, f, s, r, x)
            }, 1E3 * a.autoPlay))) : h.load(function() {
                c(".myloader", f).css("display", "none");
                0 < a.autoPlay && 1 < s && (a.showCircleTimer && (e.arcInitialTime = (new Date).getTime(), e.timeElapsed = 0, e.intervalID = setInterval(function() {
                    F(e, a)
                }, 125)), e.timeoutID = setTimeout(function() {
                    z(1, a, e, y, t, f, s, r, x)
                }, 1E3 * a.autoPlay))
            })
        })
    };
    c.fn.allinone_carousel.defaults = {
        skin: "attractive",
        width: 1150,
        height: 355,
        width100Proc: !1,
        height100Proc: !1,
        autoPlay: 4,
        numberOfVisibleItems: 7,
        elementsHorizontalSpacing: 330,
        elementsVerticalSpacing: 20,
        verticalAdjustment: 0,
        animationTime: 0.8,
        easing: "easeOutQuad",
        resizeImages: !0,
        target: "_blank",
        showElementTitle: !0,
        showAllControllers: !0,
        showNavArrows: !0,
        showOnInitNavArrows: !0,
        autoHideNavArrows: !0,
        showBottomNav: !0,
        showOnInitBottomNav: !0,
        autoHideBottomNav: !0,
        showPreviewThumbs: !0,
        nextPrevMarginTop: 0,
        playMovieMarginTop: 0,
        enableTouchScreen: !0,
        absUrl: "",
        showCircleTimer: !0,
        showCircleTimerIE8IE7: !1,
        circleRadius: 10,
        circleLineWidth: 4,
        circleColor: "#FF0000",
        circleAlpha: 100,
        behindCircleColor: "#000000",
        behindCircleAlpha: 50,
        circleLeftPositionCorrection: 3,
        circleTopPositionCorrection: 3,
        responsive: !1,
        responsiveRelativeToBrowser: !0,
        bottomNavMarginBottom: 0,
        origWidth: 0,
        origHeight: 0,
        contentHolderUnitOrigWidth: 0,
        contentHolderUnitOrigHeight: 0,
        elementOrigTop: 0,
        origthumbsHolder_MarginTop: 0,
        windowOrientationScreenSize0: 0,
        windowOrientationScreenSize90: 0,
        windowOrientationScreenSize_90: 0,
        windowCurOrientation: 0
    }
})(jQuery);