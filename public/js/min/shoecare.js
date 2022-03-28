$(function () {
    var e = {
        ListView: 4,
        Cart: {},
        Checkout: {
            url: "/designshoes/elements/cart/addShoeCare",
            //redirect: "/designshoes/checkout",
            redirect: "/cart",
            send: !1
        }
    };

    function t() {
        var t, i;
        return t = {},
            i = $("#shoe-care-products .button.btn-cart"),
            $.Sz.each($.Sz.Datastore.Frontend.Response.rs.collection,
                function (i, n) {
                    $.Sz.isObject(e.Cart[n.id]) && ($.Sz.extend(e.Cart[n.id], {
                        id: n.id,
                        name: n.name,
                        shape: n.shape,
                        style: n.style
                    }), e.Cart[n.id].quantity > 0 && (t[n.id] = e.Cart[n.id]))
                }),
            $.Sz.isEmpty(t) ? i.addClass("btn-disable") : i.removeClass("btn-disable"),
            t
    }
    $.Sz.LazyLoad($("img.sz-preload"), function (e) {
        100 === e && $.Sz.LazyLoad($("img.sz-lazyload").sort(function (e, t) {
            return $(e).data("level") - $(t).data("level")
        }))
    }), $("#patina-shoes .slides").PromoSlide(), $.ListView(e.ListView, function (t) {
        t.handle.on("click", "ul li", function () {
            var i = $(this);
            e.ListView = i.data("view"), i.addClass("clt-view-ac").siblings().removeClass("clt-view-ac"), t.containment.attr("data-colm", e.ListView), $(window).trigger("resize")
        })
    }), $.Sz.Spinner({
        selector: "#shoe-care-products .sz-spinner"
    }, function (i) {
        var n, a;
        n = {
            row: {
                el: this.closest(".clt-item-opt-row")
            }
        }, a = {
            quantity: 0
        }, $.Sz.each($.Sz.Datastore.Spinner.collection[i.id], function (e, t) {
            a.quantity += t.source.value
        }), $.Sz.isFalse($.Sz.isObject(e.Cart[i.id])) && (e.Cart[i.id] = {}), $.Sz.extend(e.Cart[i.id], {
            quantity: a.quantity
        }), n.row.el.length > 0 && ($.Sz.extend(!0, n, {
            row: {
                index: n.row.el.index(),
                device: n.row.el.data("device")
            }
        }), $.Sz.extend(a, {
            quantity: i.value
        }), $.Sz.isFalse($.Sz.isObject(e.Cart[i.id][n.row.device])) && (e.Cart[i.id][n.row.device] = {}), $.Sz.isUndefined(e.Cart[i.id][n.row.device][n.row.index]) ? e.Cart[i.id][n.row.device][n.row.index] = a : $.Sz.extend(e.Cart[i.id][n.row.device][n.row.index], a)), t()
    }), $.Sz.Dropdown({
        selector: "#shoe-care-products .sz-dropdown",
        value: 0,
        create: function (e) {
            var t, i, n, a;
            t = {
                list: null,
                opts: null,
                link: null,
                span: null
            }, this.hasClass("dropdown-type") ? n = $.Sz.Datastore.Frontend.Response.rs.shoesize.list : this.hasClass("dropdown-size") && (i = this.closest(".clt-item-opt-row").find(".dropdown-type").data("sz-dropdown"), $.Sz.isEmpty(i.value) && (i.value = e.value), n = $.Sz.Datastore.Frontend.Response.rs.shoesize.chart[i.value].size), t.list = this.find(".dd-list").empty(), $.Sz.each(n, function (e, i) {
                $.Sz.extend(t, {
                    opts: $("<li>").addClass("dd-opt"),
                    link: $("<a>"),
                    span: $("<span>").addClass("lang")
                }), t.span.html(i), t.link.append(t.span), t.opts.data({
                    key: e,
                    value: i
                }).append(t.link), t.list.append(t.opts)
            }), a = this.data("IScroll"), $.Sz.isUndefined(a) && this.data({
                IScroll: new window.IScroll(this.find(".dd-inn").get(0), {
                    probeType: 3,
                    bounce: !1,
                    freeScroll: !0,
                    scrollX: !1,
                    scrollY: !0,
                    scrollbars: "custom",
                    interactiveScrollbars: !0,
                    mouseWheel: !0,
                    click: !0,
                    eventPassthrough: !1,
                    disablePointer: !0,
                    disableTouch: !1,
                    disableMouse: !1
                })
            }).find(".dd-inn").css({
                overflow: "hidden",
                maxHeight: 8 * this.find(".dd-wp").height()
            })
        }
    }, function (i) {
        var n, a;
        n = {
            row: {
                el: this.closest(".clt-item-opt-row")
            }
        }, this.hasClass("dropdown-type") && $.Sz.Dropdown({
            selector: n.row.el.find(".dropdown-size"),
            value: 0
        }), $.Sz.extend(!0, n, {
            shoesize: $.Sz.Datastore.Frontend.Response.rs.shoesize,
            row: {
                index: n.row.el.index(),
                device: n.row.el.data("device")
            },
            dropdown: {
                type: n.row.el.find(".dropdown-type").data("sz-dropdown"),
                size: n.row.el.find(".dropdown-size").data("sz-dropdown")
            }
        }), a = {
            name: n.shoesize.chart[n.dropdown.type.value].name,
            size: n.shoesize.chart[n.dropdown.type.value].size[n.dropdown.size.value]
        }, $.Sz.isFalse($.Sz.isObject(e.Cart[i.id])) && (e.Cart[i.id] = {}), n.row.el.length > 0 ? ($.Sz.isFalse($.Sz.isObject(e.Cart[i.id][n.row.device])) && (e.Cart[i.id][n.row.device] = {}), $.Sz.isUndefined(e.Cart[i.id][n.row.device][n.row.index]) ? e.Cart[i.id][n.row.device][n.row.index] = a : $.Sz.extend(e.Cart[i.id][n.row.device][n.row.index], a)) : $.Sz.extend(e.Cart[i.id], a), t()
    }), $("#shoe-care-products").on("click", ".btn-cart", function () {
        var i = t();
        $.Sz.isFalse($.Sz.isEmpty(i)) && 
        $.Sz.isFalse(e.Checkout.send) && 
        $.ajax({
            type: "POST",
            url: e.Checkout.url,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: i
        }).done(function () {
            window.location.href = e.Checkout.redirect
        })
    }), $(window).on("resize", function () {
        $.ListView(e.ListView)
    })
}),
    function (e, t) {
        e.extend({
            Sz: t,
            ListView: function (i, n) {
                var a = {
                    current: i || 4,
                    min: 1,
                    max: 4,
                    responsive: {
                        0: 1,
                        768: 2,
                        1024: 4
                    },
                    screenWidth: e(window).outerWidth(),
                    handle: e("#shoe-care-products .clt-view"),
                    containment: e("#shoe-care-products .clt-list"),
                    html: ""
                };
                e.each(a.responsive, function (e, t) {
                    a.screenWidth >= e && (a.max = t)
                });
                for (var d = a.min; d <= a.max; d++) a.html += e("<li>").attr("data-view", d).append(function (t, i) {
                    for (var n = 0; n < 2 * d; n++) i += e("<i>").get(0).outerHTML;
                    return i
                }).get(0).outerHTML;
                a.html = e(a.html), a.handle.find("ul li").length !== a.html.length && (a.handle.find("ul li").remove(), a.html.each(function () {
                    var t, i;
                    t = e(this), i = window.parseInt(t.attr("data-view")), t.data("view", i).removeAttr("data-view"), i === window.Math.max(a.min, window.Math.min(a.current, a.max)) && (t.addClass("clt-view-ac"), a.containment.attr("data-colm", i))
                }), a.handle.find("ul").append(a.html)), t.isFunction(n) && n({
                    handle: a.handle,
                    containment: a.containment
                })
            }
        }), e.fn.extend({
            PromoSlide: function (t) {
                var i = e.extend(!0, {
                    width: 1920,
                    height: 480,
                    start: 1,
                    navigation: {
                        active: !1,
                        effect: "slide"
                    },
                    pagination: {
                        active: !1,
                        effect: "slide"
                    },
                    play: {
                        active: !1,
                        effect: "slide",
                        interval: 5e3,
                        auto: !0,
                        swap: !1,
                        pauseOnHover: !1,
                        restartDelay: 2500
                    },
                    effect: {
                        slide: {
                            speed: 1e3
                        },
                        fade: {
                            speed: 1e3,
                            crossfade: !0
                        }
                    }
                }, t);
                return this.slidesjs(i)
            }
        })
    }(window.$, window.Sz);
