Date.now ||
    (Date.now = function () {
        return new Date().getTime();
    }),
    (function () {
        "use strict";
        for (
            var e = ["webkit", "moz"], t = 0;
            t < e.length && !window.requestAnimationFrame;
            ++t
        ) {
            var i = e[t];
            (window.requestAnimationFrame =
                window[i + "RequestAnimationFrame"]),
                (window.cancelAnimationFrame =
                    window[i + "CancelAnimationFrame"] ||
                    window[i + "CancelRequestAnimationFrame"]);
        }
        if (
            /iP(ad|hone|od).*OS 6/.test(window.navigator.userAgent) ||
            !window.requestAnimationFrame ||
            !window.cancelAnimationFrame
        ) {
            var n = 0;
            (window.requestAnimationFrame = function (e) {
                var t = Date.now(),
                    i = Math.max(n + 16, t);
                return setTimeout(function () {
                    e((n = i));
                }, i - t);
            }),
                (window.cancelAnimationFrame = clearTimeout);
        }
    })();
var snowFall = (function () {
    function e() {
        var e = {
                flakeCount: 50,
                flakeColor: "#d3d3d3",
                flakeIndex: 999999,
                minSize: 3,
                maxSize: 3,
                minSpeed: 1,
                maxSpeed: 5,
                round: !1,
                shadow: !1,
                collection: !1,
                image: !1,
                collectionHeight: 40,
            },
            t = [],
            n = {},
            o = 0,
            s = 0,
            a = 0,
            r = 0,
            l = function (e, t) {
                for (var i in t) e.hasOwnProperty(i) && (e[i] = t[i]);
            },
            h = function (e, t) {
                return Math.round(e + Math.random() * (t - e));
            },
            m = function (e, t) {
                for (var i in t)
                    e.style[i] =
                        t[i] + ("width" == i || "height" == i ? "px" : "");
            },
            d = function (t, i, n) {
                (this.x = h(a, s - a)),
                    (this.y = h(0, o)),
                    (this.size = i),
                    (this.speed = n),
                    (this.step = 0),
                    (this.stepSize = h(1, 10) / 100),
                    e.collection &&
                        (this.target =
                            canvasCollection[
                                h(0, canvasCollection.length - 1)
                            ]);
                var r = null;
                e.image
                    ? ((r = new Image()), (r.src = e.image))
                    : ((r = document.createElement("div")),
                      m(r, { background: e.flakeColor })),
                    (r.className = "snowfall-flakes"),
                    m(r, {
                        width: this.size,
                        height: this.size,
                        position: "absolute",
                        top: this.y,
                        left: this.x,
                        fontSize: 0,
                        zIndex: e.flakeIndex,
                    }),
                    e.round &&
                        m(r, {
                            "-moz-border-radius": ~~e.maxSize + "px",
                            "-webkit-border-radius": ~~e.maxSize + "px",
                            borderRadius: ~~e.maxSize + "px",
                        }),
                    e.shadow &&
                        m(r, {
                            "-moz-box-shadow": "1px 1px 1px #555",
                            "-webkit-box-shadow": "1px 1px 1px #555",
                            boxShadow: "1px 1px 1px #555",
                        }),
                    t.tagName === document.body.tagName
                        ? document.body.appendChild(r)
                        : t.appendChild(r),
                    (this.element = r),
                    (this.update = function () {
                        (this.y += this.speed),
                            this.y > o - (this.size + 6) && this.reset(),
                            (this.element.style.top = this.y + "px"),
                            (this.element.style.left = this.x + "px"),
                            (this.step += this.stepSize),
                            (this.x += Math.cos(this.step)),
                            (this.x + this.size > s - a || this.x < a) &&
                                this.reset();
                    }),
                    (this.reset = function () {
                        (this.y = 0),
                            (this.x = h(a, s - a)),
                            (this.stepSize = h(1, 10) / 100),
                            (this.size =
                                h(100 * e.minSize, 100 * e.maxSize) / 100),
                            (this.element.style.width = this.size + "px"),
                            (this.element.style.height = this.size + "px"),
                            (this.speed = h(e.minSpeed, e.maxSpeed));
                    });
            },
            f = function () {
                for (var e = 0; e < t.length; e += 1) t[e].update();
                r = requestAnimationFrame(function () {
                    f();
                });
            };
        return {
            snow: function (r, m) {
                for (
                    l(e, m),
                        n = r,
                        o = n.offsetHeight,
                        s = n.offsetWidth,
                        n.snow = this,
                        "body" === n.tagName.toLowerCase() && (a = 25),
                        window.addEventListener(
                            "resize",
                            function () {
                                (o = n.clientHeight), (s = n.offsetWidth);
                            },
                            !0
                        ),
                        i = 0;
                    i < e.flakeCount;
                    i += 1
                )
                    t.push(
                        new d(
                            n,
                            h(100 * e.minSize, 100 * e.maxSize) / 100,
                            h(e.minSpeed, e.maxSpeed)
                        )
                    );
                f();
            },
            clear: function () {
                var e = null;
                e = n.getElementsByClassName
                    ? n.getElementsByClassName("snowfall-flakes")
                    : n.querySelectorAll(".snowfall-flakes");
                for (var t = e.length; t--; )
                    e[t].parentNode === n && n.removeChild(e[t]);
                cancelAnimationFrame(r);
            },
        };
    }
    return {
        snow: function (t, i) {
            if ("string" == typeof i)
                if (t.length > 0)
                    for (var n = 0; n < t.length; n++)
                        t[n].snow && t[n].snow.clear();
                else t.snow.clear();
            else if (t.length > 0)
                for (var n = 0; n < t.length; n++) new e().snow(t[n], i);
            else new e().snow(t, i);
        },
    };
})();
