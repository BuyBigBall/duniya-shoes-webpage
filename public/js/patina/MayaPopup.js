
/*-----------------------------------------------------
 * POPUP OPTION
 *-----------------------------------------------------*/

$.fn.popupProduct = function () {
    var scope = this, Sz = speziicoz;

    if (Sz.components) {
        Sz.components.task("ProductMenu", function (ProductMenu, Task) {
            ProductMenu.load = false;
            ProductMenu.escape = false;
            ProductMenu.scroll = null;

            ProductMenu.close = function () {
                if (!ProductMenu.escape) {
                    Sz.extend(ProductMenu, {
                        escape: true
                    });

                    jQuery("#env-get-prd, #env-nav-get").removeClass("nav-get-open");

                    setTimeout(function () {
                        Sz.extend(ProductMenu, {
                            load: false,
                            escape: false
                        });

                        jQuery("#env-get-prd, #env-nav-get").remove();
                    }, 200);
                }
            };

            ProductMenu.open = function (url) {
                if (ProductMenu.load) {
                    ProductMenu.close();
                }

                Sz.components.animate(function () {
                    if (!ProductMenu.load) {
                        Sz.extend(ProductMenu, {
                            load: true
                        });

                        jQuery("#env-nav-tp").append(jQuery(document.createElement("div")).prop("id", "env-nav-get").get(0));

                        setTimeout(function () {
                            jQuery("#env-nav-get").addClass("nav-get-open");
                        });

                        jQuery.get(url, function (data) {
                            jQuery("body").append(data).find("#env-get-prd .szLazy").each(function () {
                                Sz.components.imagesLoader(this, function (percentage, reference) {
                                    if (reference.element) {
                                        jQuery(reference.collection[reference.id]).closest("li").addClass("szLoaded").find(".spinner").remove();
                                        jQuery(reference.collection[reference.id]).replaceWith(jQuery.clone(reference.element));

                                        if (ProductMenu.scroll) {
                                            ProductMenu.scroll.refresh();
                                        }
                                    }
                                });
                            });

                            jQuery("#env-get-prd").addClass("nav-get-open");

                            ProductMenu.scroll = new IScroll(jQuery(".env-get-prd-inn").get(0), {
                                scrollX: false, scrollY: true, scrollbars: "custom", interactiveScrollbars: true,
                                mouseWheel: true, resize: true, bounce: false, click: true, probeType: 3,
                                disablePointer: true, disableTouch: false, disableMouse: false
                            });

                            setTimeout(function () {
                                jQuery("#env-get-prd .env-get-prd-bd").addClass("get-prd-open");
                            });
                        });

                        return false;
                    }
                });
            };

            (function () {
                jQuery("body").on("click", "#link-product, .btn-continue, #env-get-prd .product-popup a", function (e) {
                    var url = $(this).data('href') || this.getAttribute("href");

                    e.preventDefault();
                    ProductMenu.open(url);
                });

                jQuery("body").on("click", ".area-escape", function () {
                    ProductMenu.close();
                });
            })();
        });
    } else {
        Sz.ft.Services("NavProductMenu", function (NavProductMenu, Services) {
            NavProductMenu.reload = true;
            NavProductMenu.enable = true;
            NavProductMenu.scroll = null;
            NavProductMenu.isLoaded = {};

            NavProductMenu.gender = function (hashTag) {
                if (Sz.isEmpty(hashTag)) {
                    hashTag = Services.Resources.gender || "All";
                }

                if (Sz.isString(hashTag)) {
                    hashTag = hashTag.replace("#", "");
                }

                return hashTag;
            };

            NavProductMenu.url = function (hashTag) {
                var url, gender;

                url = window.String(Services.Resources.routes.envir).concat("Get/Sz/Product.php");
                gender = NavProductMenu.gender(hashTag);

                if (Sz.isString(gender)) {
                    url = window.String(Services.Resources.routes.envir).concat("Get/Sz/", gender, "/Product.php");
                }

                return url;
            };

            NavProductMenu.render = function (target, classList, callback) {
                Sz.ft.Animate(function (animate) {
                    var el = $(target);

                    if ((animate > 0) && (el.length > 0)) {
                        el.addClass(classList);

                        if (Sz.isFunction(callback)) {
                            callback(el);
                        }

                        return false;
                    }
                });
            };

            NavProductMenu.export = function () {
                NavProductMenu.render("#env-get-prd", "get-prd-open", function (containment) {
                    containment.find(".sz-lazy").each(function () {
                        var target, width, height, loader;

                        target = this;
                        width = window.parseFloat(target.getAttribute("width"));
                        height = window.parseFloat(target.getAttribute("height"));

                        loader = Sz.ft.Services("Loader").slack(function (ld) {
                            $(target).closest("li").append(ld);
                        });

                        $(target).css({
                            height: 0,
                            paddingTop: window.String(window.Math.ceil((height / width) * 100)).concat("%")
                        });

                        Sz.ft.LoadImage(target, function (percentage, loadList) {
                            if (loadList.el) {
                                var el = $(loadList.collection[loadList.id]);

                                el.closest("li").addClass("sz-loaded");
                                el.attr("src", loadList.isLoaded[loadList.id].source);
                                el.removeAttr("data-szlazy").removeClass("sz-lazy");

                                el.css({
                                    height: "auto",
                                    paddingTop: ""
                                });

                                if (NavProductMenu.scroll) {
                                    NavProductMenu.scroll.refresh();
                                }

                                loader.remove();
                            }
                        });

                        if (NavProductMenu.scroll) {
                            NavProductMenu.scroll.refresh();
                        }
                    });
                });

                NavProductMenu.scroll = new window.IScroll($(".get-prd-inn").get(0), {
                    scrollX: false,
                    scrollY: true,
                    scrollbars: "custom",
                    interactiveScrollbars: true,
                    mouseWheel: true,
                    resize: true,
                    bounce: false,
                    click: true,
                    probeType: 3,
                    disablePointer: true, 
                    disableTouch: false, 
                    disableMouse: false
                });
            };

            NavProductMenu.open = function (hashTag, url) {
                var gender, language, currency, key;

                if (url) {
                    key = hashTag = url;
                } else {
                    gender = NavProductMenu.gender(hashTag);
                    language = Services.Resources.user.language;
                    currency = Services.Resources.user.currency;
                    key = Sz.lowercase(gender.concat("-", language, "-", currency));
                }

                if (Sz.isFalse(NavProductMenu.reload)) {
                    NavProductMenu.close();
                }

                Sz.ft.Animate(function () {
                    if (NavProductMenu.reload) {
                        NavProductMenu.reload = false;

                        $("#env-nav-tp").append(Sz.ft.DOMElement("div", {
                            id: "env-nav-get"
                        }));

                        NavProductMenu.render("#env-nav-get", "nav-get-open");

                        if (NavProductMenu.isLoaded[key]) {
                            $("#env-nav-get").append(NavProductMenu.isLoaded[key]);
                            NavProductMenu.export();
                        } else {
                            url = url || NavProductMenu.url(hashTag);

                            $.get(url, function (data) {
                                NavProductMenu.isLoaded[key] = data;
                                $("body").append(NavProductMenu.isLoaded[key]);
                                NavProductMenu.export();
                            });
                        }

                        return false;
                    }
                });
            };

            NavProductMenu.close = function () {
                if (Sz.isFalse(NavProductMenu.enable)) {
                    return false;
                }

                NavProductMenu.enable = false;

                setTimeout(function () {
                    NavProductMenu.reload = true;
                    NavProductMenu.enable = true;

                    $("#env-get-prd, #env-nav-get").remove();
                }, 200);

                $("#env-get-prd, #env-nav-get").removeClass("nav-get-open");
            };

            (function () {
                $('#link-product').data('href', '../environment/get/sz/men/product.php');
                $("body").on("click", "#link-product, .btn-continue, #env-get-prd .product-popup a", function (e) {
                    e.preventDefault();
                    NavProductMenu.open(null, $(this).data("href"));
                });

                $("body").on("click", ".area-escape", function () {
                    NavProductMenu.close();
                });
            })();
        });
    }
};

$.fn.popupMaya = function (option, callback) {
    var _this = $(this);
    var defaults = {
        main: "body",
        transparent: false,
        url: "",
        par: "",
        val: "",
        effStart: "top",
        effEnd: "top",
        time: 1000,
        width: 1024,
        height: '',
        position: 'top',
        subEleHeight: '',
        getData: false,
        run: false
    };
    option = $.extend(defaults, option);
    var classEff = "";
    var paddingTop = "";
    var getdata = '';
    if (option.run) {
        paddingTop = positionEle(option.position);
        classEff = effStart(option.effStart);
        popupShow();
    } else {
        _this.click(function () {
            paddingTop = positionEle(option.position);
            classEff = effStart(option.effStart);
            if (option.getData) {
                option.val = $(this).attr('data-par');
                option.par = "d=" + option.val;
            }
            popupShow();
        });
    }
    function popupShow() {
        preloadPopup();
        var _class = "popupMaya " + (!defaults.transparent ? "transparent" : "");
        var ele = $('<div>').addClass(_class);
        var eleData = $('<div>')
                .addClass(classEff + " popupMaya-data transition1s")
                .css({width: option.width, height: option.height, 'padding-top': paddingTop});
        ele.appendTo(option.main);
        eleData.appendTo(ele);
        $.get(getDataUrl(), function (data) {
            preloadPopupHide();
            eleData.html(data);
            eleData.removeClass(classEff);

            /*------------------------------------
             * close
             *-----------------------------------*/
            $('.popupMaya').delegate('.btnClose', 'click', function () {
                var _this = $(this);
                var popupMain = _this.parents('.popupMaya');
                popupMain.find('.popupMaya-data').addClass(classEff);
                setTimeout(function () {
                    popupMain.fadeOut(function () {
                        setTimeout(function () {
                            popupMain.remove();
                        }, option.time / 2);
                    });
                }, option.time / 2);
            });
            if (callback) {
                callback(option, eleData);
            }
            function preloadPopupHide() {
                var tag = $("#preloadPopup");
                setTimeout(function () {
                    tag.css({width: '100%'});
                }, 500);
            }
        });
    }
    $(window).resize(function () {
        /****/
    });
    function effStart(e) {
        var classEff = "";
        switch (e) {
            case "left":
                classEff = "effLeft";
                break;
            case "right":
                classEff = "effRight";
                break;
            case "top":
                classEff = "effTop";
                break;
            case "bottom":
                classEff = "effBottom";
                break;
            case "fadeIn":
                classEff = "effFadeIn";
                break;
            case "fadeOut":
                classEff = "effFadeOut";
                break;
        }
        return classEff;
    }
    function positionEle(e) {
        var winH = $(window).height();
        var padding = '';
        if (e === "middle") {
            padding = (winH - option.subEleHeight) / 2;
        } else if (e === "top") {
            padding = 0;
        } else {
            padding = e;
        }
        return padding;
    }
    function getDataUrl() {
        var data = option.url;
        if (option.par) {
            data += "?" + option.par;
        }
        return data;
    }
    function preloadPopup() {
        var tag = $("#preloadPopup");
        tag.remove();

        /*-------------------------------------------
         * createTag preload popup
         *------------------------------------------*/
        var ele = $('<div>').attr('id', 'preloadPopup').addClass('transition3s');//.css({width: '100%'});
        $('body').append(ele);
        setTimeout(function () {
            ele.css({width: '70%'});
        }, 500);
    }
};

