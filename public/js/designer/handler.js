var initial, ready_made, init, parameter, route, style,
        cache, all_step, finish, setPrice, regularPrice, sidePrice,
        frontPrice, mainPrice, itemList, listPrice,
        leatherPath, solePath, btn_change_leather;

route = "/images/models/iShoes/designershoes/";
leatherPath = "/images/models/iShoes/Menu/Leather/M/";
solePath = "/images/models/iShoes/Menu/Sole/" + data.model_shape + "/";
btn_change_leather = true;
all_step = 3;
cache = [];
finish = false;
setPrice = 0;
regularPrice = 0;

// CALCULATE PRICE
itemList = ["side", "front", "back", "main", "accessory"];
listPrice = {};
listRegularPrice = {};

Spz.each(itemList, function (i, listName) {

    if (data[listName] && data[listName]["item"].length > 0)
    {
        data[listName]["item"].forEach(function (item) {
            listPrice[listName] = item.price;
            setPrice = Math.max(setPrice, listPrice[listName]);

            listRegularPrice[listName] = item.regularPrice;
            regularPrice = Math.max(regularPrice, listRegularPrice[listName]);
        });
    }
});

parameter = {
    model: data.model,
    modelStyle: data.model_style,
    modelShape: data.model_shape,
    modelSeries: data.model_series,
    modelSeriesDefaults: data.model_series || "defaults",
    coupons: data.coupons,
    accessory: data.defaults.accessory,
    accessory_name: data.defaults["accessory_name"] || "",
    main: data.defaults.main,
    main_name: data.defaults["main_name"] || "",
    side: data.defaults.side,
    side_name: data.defaults["side_name"] || "",
    back: data.defaults.back,
    back_name: data.defaults["back_name"] || "",
    front: data.defaults.front,
    front_name: data.defaults["front_name"] || "",
    lining: data.defaults.lining,
    lining_name: data.defaults["lining_name"] || "",
    laces: data.defaults.laces,
    sole: data.defaults.sole,
    sole_name: data.defaults["sole_name"] || "",
    backstitch: false,
    backstitchColor: data.defaults.backstitch,
    monogram: {
        insideLining: false,
        outsideSole: false,
        designBy: ""
    },
    measurement: {
        unit: "cm",
        length: 0,
        width: 0,
        regularSize: "",
        size: 0,
        quantity: 1
    },
    totalPrice: parseInt(setPrice)
};

function addCommas(NumberStr)
{
    var NumberData, Number1, Number2, rgx;

    rgx = /(\d+)(\d{3})/;
    NumberStr += '';
    NumberData = NumberStr.split('.');
    Number1 = NumberData[0];
    Number2 = NumberData.length > 1 ? '.' + NumberData[1] : '';

    while (rgx.test(Number1))
    {
        Number1 = Number1.replace(rgx, '$1' + ',' + '$2');
    }

    return Number1 + Number2;
}

Array.prototype.clean = function (val)
{
    for (var i = 0; i < this.length; i++)
    {
        if (this[i] === val)
        {
            this.splice(i, 1);
            i--;
        }
    }
    return this;
};

initial = (function (fn) {

    var readyMade, step, view, current_step, current_target, step_ready,
            current_view, choose, state_ready;

    readyMade = {};
    step = ["first", "second", "third", "fourth", "fifth"];
    view = ["view1", "view2", "view3"]; // DEFINED FOLDER OF VIEW
    current_step = 0;
    current_view = 0;
    current_target = data.defaults.selector;
    choose = true;
    state_ready = true;
    step_ready = true;

    /* ----------------------------------------------------------------------------
     * GLOBAL :
     * ----------------------------------------------------------------------------
     */
    function showPreloadItem() {
        $("#canvasloader-container").addClass("show");
        setTimeout(function () {
            $("#canvasloader-container").addClass("active");
        }, 100);
    }

    function closePreloadItem() {
        $("#canvasloader-container").removeClass("show");
        setTimeout(function () {
            $("#canvasloader-container").removeClass("active");
        }, 100);
    }
    /* ----------------------------------------------------------------------------
     * CONFIGURATION :
     * ----------------------------------------------------------------------------
     */
    // CONFIG ITEMS
    Spz("#items").addClass("model-" + parameter["model"]);
    /* ----------------------------------------------------------------------------
     * MATHOD :
     * ----------------------------------------------------------------------------
     */
    readyMade.setChoosingItems = function (step, text)
    {
        if (cache["last_step"] !== step)
        {
            var onstate, target;

            // PROCEED
            if (!data.defaults.selector) {
                return false;
            }

            onstate = Spz("#items").children().eq(step).attr("data-step");
            Spz("#choose").removeClass("leather sole").addClass(onstate);
            Spz("#choose-items").empty();
            Spz("#choose-text").empty()[0].innerHTML = text;

            if (onstate === "leather")
            {
                target = current_target || "side";
                // CACHE
                cache["selector"] = target;
            } else if (onstate === "sole")
            {
                target = onstate;
            }

            if (data[target] === undefined)
            {
                return false;
            }

            return data[target]["item"].forEach(function (value, index) {

                var image, list;

                list = document.createElement("li");
                list.setAttribute("data-id", value.id);
                list.setAttribute("data-name", value.name);
                // SET LI PRICE
                list.setAttribute("data-default-price", value.price);
                image = new Image();
                image.onload = function ()
                {
                    list.appendChild(image);

                    var choosing, checkImage;

                    choosing = parameter[target] || data.defaults[target];

                    checkImage = new Image();
                    checkImage.src = "/images/misc/check2.png";
                    checkImage.className = "leather-active";

                    if (choosing === value.pid)
                    {
                        list.appendChild(checkImage);
                    }
                };

                if (onstate === "leather")
                {
                    image.src = leatherPath + value.id + ".png";
                } else if (onstate === "sole")
                {
                    image.src = solePath + value.id + ".png";
                }

                image.alt = value.name;
                image.title = value.name;
                Spz("#choose-items").append(list);
            });
        }
    };

    // LEATHER FUNCTION
    readyMade.leather = function (element)
    {
        var cache_target, cache_key, is_cache, reset;

        reset = {"id": "", "name": "", "price": "", "target": "", "access": false};

        if (Spz.toType(element) === "object")
        {
            Spz.extend(reset, element);
        }

        current_target = reset.target || current_target;
        cache_target = step[current_step] + "-" + current_target;
        cache_key = reset.id || element.getAttribute("data-id");

        if (cache["target"] === cache_target && cache["key"] === cache_key)
        {
            is_cache = true;
            state_ready = true;
        }

        // APPEND LEATHER
        if (reset.access || (choose && state_ready && !is_cache))
        {
            var id, key, name, image, source;

            state_ready = false;
            // DEBUG : use current view instead current step
            id = "#" + step[current_view] + "-" + current_target;
            key = reset.id || element.getAttribute("data-id");
            name = reset.name || element.getAttribute("data-name");
            source = route + parameter["model"] + "/" + view[current_view]
                    + "/" + current_target + "/" + key + ".png";

            // CREATE IMAGE
            showPreloadItem();

            image = new Image();
            image.onload = function ()
            {
                closePreloadItem();
                current_target = reset.target || current_target;
                // REMOVE OLD IMAGE
                setTimeout(function () {
                    image.removeAttribute("class");
                    setTimeout(function () {
                        Spz(id).children().cast(0, true) !== null ? Spz(id).children().cast(0, true).remove() : false;
                        state_ready = true;
                    }, 500);
                }, 64);

                // CHEN VIEW CHANGE.
                var source_chen, view_chen, image_chen, id_chen;

                view_chen = current_view > 0 ? 0 : 1;        //other view replace
                id_chen = "#" + step[view_chen] + "-" + current_target;

                source_chen = route + parameter["model"] + "/" + view[view_chen]
                        + "/" + current_target + "/" + key + ".png";

                image_chen = new Image();
                image_chen.onload = function ()
                {
                    setTimeout(function () {
                        image_chen.removeAttribute("class");
                        setTimeout(function () {
                            Spz(id_chen).children().cast(0, true) !== null ? Spz(id_chen).children().cast(0, true).remove() : false;
                        }, 500);
                    }, 64);
                };
                image_chen.src = source_chen;
                image_chen.setAttribute("class", "loading");
                Spz(id_chen).append(image_chen);
            };
            image.src = source;
            image.setAttribute("class", "loading");
            Spz(id).append(image);

            // UPDATE PRICE
            var default_price, current_price, calc_price;

            calc_price = 0;
            default_price = parseInt(setPrice);
            current_price = parseInt(reset.price || element.getAttribute("data-default-price"));
            listPrice[current_target] = current_price;

            Spz.each(listPrice, function (i, val) {
                calc_price = Math.max(calc_price, val);
            });

            parameter.totalPrice = calc_price;

            if (parameter.backstitch)
            {
                parameter.totalPrice += data.defaults.backstitch_price;
            }
            // ADD PRICE
            Spz("#set-price").text(addCommas("" + parameter.totalPrice));

            // CHANGE COLOR ON SELECTOR
            if (current_step === 0 || current_step === 1)
            {
                Spz(".selector-" + current_target).children(".selector")
                        .attr("style", "background-image:url(" + leatherPath + key + ".png);");
            }

            // UPDATE PARAMETER
            parameter[current_target] = key;
            parameter[current_target + "_name"] = name;

            // CACHE
            cache["target"] = step[current_step] + "-" + current_target;
            cache["key"] = key;

            // GUILD ITEM
            Spz("#choose-items .leather-active").remove();

            var choosing, checkImage;

            choosing = parameter[current_target] || data.defaults[current_target];

            checkImage = new Image();
            checkImage.src = "/images/misc/check2.png";
            checkImage.className = "leather-active";

            if (Spz.toType(element) === "object")
            {
                Spz("#choose-items li").each(function (i, v) {
                    if (v.getAttribute("data-id") === reset.id)
                    {
                        Spz(v).append(checkImage);
                    }
                });
            } else
            {
                Spz(element).append(checkImage);
            }
        }
    };

    readyMade.sole = function (element)
    {
        var cache_target, cache_key, is_cache, reset;

        reset = {"id": "", "name": "", "access": false};

        if (Spz.toType(element) === "object")
        {
            Spz.extend(reset, element);
        }

        cache_target = "snds-sndv-sole";
        cache_key = reset.id || element.getAttribute("data-id");

        if (cache["sole_target"] === cache_target && cache["sole_key"] === cache_key)
        {
            is_cache = true;
            state_ready = true;
        }

        // APPEND SOLE
        if (reset.access || (state_ready && !is_cache))
        {
            var id, name, key, image, source;

            state_ready = false;
            // DEBUG : use current view instead current step
            id = "#snds-sndv-sole";
            key = reset.id || element.getAttribute("data-id");
            name = reset.name || element.getAttribute("data-name");
            source = route + parameter["model"] + "/" + view[2]
                    + "/sole/" + key + ".png";

            // CREATE IMAGE
            showPreloadItem();

            image = new Image();
            image.onload = function ()
            {
                closePreloadItem();
                // REMOVE OLD IMAGE
                setTimeout(function () {
                    image.removeAttribute("class");
                    setTimeout(function () {
                        Spz(id).children().cast(0, true).remove();
                        $(image).clone().appendTo("#snds-sndv-main");
                        Spz("#snds-sndv-main").children().cast(0, true).remove();
                        state_ready = true;
                    }, 500);
                }, 64);

                // WHEN FIRST STEP HAS SOLE
                if (Spz("#first-sole").alive())
                {
                    var fst_sole;

                    fst_sole = new Image();
                    fst_sole.onload = function ()
                    {
                        setTimeout(function () {
                            fst_sole.removeAttribute("class");
                            setTimeout(function () {
                                Spz("#first-sole").children().cast(0, true).remove();
                            }, 500);
                        }, 64);
                    };
                    fst_sole.src = route + parameter["model"] + "/" + view[0]
                            + "/sole/" + key + ".png";
                    fst_sole.setAttribute("class", "loading");
                    Spz("#first-sole").append(fst_sole);
                }

                // WHEN SECOUND STEP HAS SOLE
                if (Spz("#second-sole").alive())
                {
                    var snd_sole;

                    snd_sole = new Image();
                    snd_sole.onload = function ()
                    {
                        setTimeout(function () {
                            snd_sole.removeAttribute("class");
                            setTimeout(function () {
                                Spz("#second-sole").children().cast(0, true).remove();
                            }, 500);
                        }, 64);
                    };
                    snd_sole.src = route + parameter["model"] + "/" + view[1]
                            + "/sole/" + key + ".png";
                    snd_sole.setAttribute("class", "loading");
                    Spz("#second-sole").append(snd_sole);
                }
            };
            image.src = source;
            image.setAttribute("class", "loading");
            Spz(id).append(image);

            // UPDATE PARAMETER
            parameter["sole"] = key;
            parameter["sole_name"] = name;

            // CACHE
            cache["sole_target"] = "snds-sndv-sole";
            cache["sole_key"] = key;

            // GUILD ITEM
            Spz("#choose-items .leather-active").remove();

            var choosing, checkImage;

            choosing = parameter[current_target] || data.defaults[current_target];

            checkImage = new Image();
            checkImage.src = "/images/misc/check2.png";
            checkImage.className = "leather-active";

            if (Spz.toType(element) === "object")
            {
                Spz("#choose-items li").each(function (i, v) {
                    if (v.getAttribute("data-id") === reset.id)
                    {
                        Spz(v).append(checkImage);
                    }
                });
            } else
            {
                Spz(element).append(checkImage);
            }
        }
    };

    readyMade.makeStyles = function ()
    {
        if (current_step === 0)
        {
            return readyMade.leather(this);
        } else if (current_step === 1)
        {
            return readyMade.sole(this);
        }
    };

    // HIGHLIGHT GROUP VIEW THIS CHANGE
    readyMade.highlightGrpView = function (index)
    {
        return Spz("#overview ul").children().removeClass("active").cast(index, true).addClass("active");
    };

    // VIEW ANIMATE SETTING
    readyMade.animateCustom = function (options)
    {
        var defaults, custom, position;

        defaults = {
            id: "",
            key: "",
            view: "",
            direction: "left",
            active: "active",
            inactive: "freeze"
        };

        custom = Spz.extend(defaults, options);

        if (custom.direction === "left")
        {
            position = "right";
        } else if (custom.direction === "right")
        {
            position = "left";
        }

        Spz(custom.id).children().cast(custom.key, true).addClass(position + " " + custom.inactive);
        setTimeout(function () {
            Spz(custom.id).children("." + custom.active).removeClass(custom.active).addClass(custom.direction);
            Spz(custom.id).children().cast(custom.key, true).removeClass(custom.inactive).addClass(custom.active);

            // SET TO DEFAULT
            setTimeout(function () {
                Spz(custom.id).children().removeClass("left right");
                state_ready = true;
            }, 500);
        }, 64);
    };

    // VIEW ANIMATE
    readyMade.viewAnimate = function (id, key, toView)
    {
        if (toView > 0 && key < 2)
        {
            state_ready = false;

            // SLIDE ITEMS
            readyMade.animateCustom({
                id: id,
                key: key,
                direction: "left"
            });

            // UPDATE CURRENT VIEW
            current_view = key;
        } else if (toView < 0 && key < 2)
        {
            state_ready = false;

            // SLIDE ITEMS
            readyMade.animateCustom({
                id: id,
                key: key,
                direction: "right"
            });

            // UPDATE CURRENT VIEW
            current_view = key;
        } else if (key === 2)
        {
            // WHEN SOLE WAS CHANGE, WE NEXT STEP
            state_ready = false;
            readyMade.stepChange(1);
        }
    };

    // VIEW FUNCTION
    readyMade.viewChange = function ()
    {
        var id, key, toView;

        if (state_ready)
        {
            id = "#" + step[current_step] + "-view";
            key = parseInt(this.getAttribute("data-view"));
            toView = key - current_view;

            // CACHE VIEW BEFORE VIEW CHANGE
            cache["last_view"] = current_view;

            if (current_step === 0)
            {
                readyMade.viewAnimate(id, key, toView);
                readyMade.highlightGrpView(key);
                // HIDE OR SHOW LEATHER WHEN VIEW CHANGED
                // ENABLE ITEMS CHOOSE ON VIEW 2
                key === 0 || key === 1 ? readyMade.fadingElement("#choose", "fadeIn")
                        : readyMade.fadingElement("#choose", "fadeOut");
            } else if (current_step > 0)
            {
                // OTHER STEP COMEBACK TO VIEW STEP
                if (key !== 2)
                {
                    id = "#" + step[0] + "-view";
                    readyMade.viewAnimate(id, key, -1);
                    readyMade.stepChange(0);
                    readyMade.highlightGrpView(key);
                }
            }
        }
    };

    readyMade.stepChange = function (callStep)
    {
        var id, toStep;

        readyMade.stepValidation(callStep);

        if (step_ready)
        {
            step_ready = false;
            callStep = Math.min(all_step, Math.max(0, callStep));
            id = "#" + step[callStep] + "-step";
            toStep = callStep - current_step;
            // CACHE
            cache["last_step"] = current_step;
            current_step = callStep;

            // NO NEED BELOW METHOD
            if (callStep === 2)
            {
                return readyMade.stepTrigger(callStep);
            }

            // USE METHOD
            if (toStep > 0)
            {
                // NEXT STEP METHOD
                state_ready = false;

                // SLIDE ITEMS
                readyMade.animateCustom({
                    id: "#items",
                    key: callStep,
                    direction: "left",
                    active: "onstate"
                });

                readyMade.fadingElement("#choose", "fadeOut");
            } else if (toStep < 0)
            {
                // PREVIOUS STEP METHOD
                state_ready = false;

                // SLIDE ITEMS
                readyMade.animateCustom({
                    id: "#items",
                    key: callStep,
                    direction: "right",
                    active: "onstate"
                });

                readyMade.fadingElement("#choose", "fadeOut");

                // FIX VIEW CHANGE ON FIRST STEP
                if (callStep === 0 && current_view < 2)
                {
                    var view, last_view;

                    view = "#" + step[callStep] + "-view";
                    last_view = cache["last_view"] === void 0 ? 0 : cache["last_view"];

                    if (current_view !== last_view)
                    {
                        Spz(view).children().cast(last_view, true).addClass("hide");

                        setTimeout(function () {
                            Spz(view).children().cast(last_view, true).removeClass("hide");
                        }, 500);
                    }
                    readyMade.highlightGrpView(current_view);
                }
            }

            // NEXT STEP WITHOUT VIEW
            callStep > 1 ? readyMade.fadingElement("#overview", "fadeOut", "disappear")
                    : readyMade.fadingElement("#overview", "fadeIn", "disappear");
            // FIX GROUP VIEW
            if (callStep === 1)
            {
                readyMade.highlightGrpView(2);

                // IF YOU WANT TO RESET VIEW TO DEFAULT
                setTimeout(function () {
                    current_view = 0;
                    // CACHE VIEW BEFORE VIEW CHANGE
                    cache["last_view"] = current_view;
                    Spz("#first-view").children().removeClass("active").cast(0, true).addClass("active");
                }, 500);
            }
            // CLEAR STATE EXTENDED
            Spz("#items").children().removeClass("onstate-extend");
            // TRIGGER ON STEP CHANGED
            readyMade.stepTrigger(callStep);
            // COOLDOWN STEP
            setTimeout(function () {
                step_ready = true;
            }, 600);

             // prepare the hidden image source base64 in the iframe
             if (callStep === 3)
             {
                readyMade.RefreshShoesImageRequest();
             }
        }
    };
    
    readyMade.RefreshShoesImageRequest = function() 
    {
        var length, min, max;

        length = window.parseFloat(Spz("#measure-length").val()) || 0;

        // UPDATE PARAMETER
        parameter.measurement.regularSize = Spz("#select-type").val();
        parameter.measurement.size = parseFloat(Spz("#select-size").val());
        parameter.measurement.quantity = parseFloat(Spz("#select-qty").val());

        if (!parameter.monogram.insideLining && !parameter.monogram.outsideSole)
        {
            parameter.monogram.designBy = "";
        }

        var style, i;

        style = [];
        i = 0;

        style[i++] = data.defaults.accessory ? "accessory" : "";
        style[i++] = data.defaults.back ? "back" : "";
        style[i++] = data.defaults.front ? "front" : "";
        style[i++] = data.defaults.main ? "main" : "";
        style[i++] = data.defaults.side ? "side" : "";
        style[i++] = data.defaults.sole ? "sole" : "";
        style = style.clean("");

        Spz.each(style, function (i, v) {

            /* 
            // data.defaults['main'] !== parameter['main']
            // data.defaults['main'] = 33;
            // parameter['main']     = 'Leather-Dye-Black'
            // //////// */
            if (data.defaults[v] !== parameter[v])
            {
                parameter["modelSeries"] = "customize";
            }
        });

        if (parameter["modelSeries"] === "")
        {
            parameter["modelSeries"] = "defaults";
        }
        parameter["productType"]    = "shoe";
        parameter["price"]          = Spz("#set-price").val();
        parameter["_token"]         = $('input[name=_token]').val();
        // SEND PARAMETER HERE
        $.ajax({
            type: "POST",
            url: "/designshoes/elements/cart/addModelshoesToImage",
            data: parameter,
            contentType: "application/x-www-form-urlencoded;charset=UTF-8",
            success: function (response) {
                var json_goods       = response.goods;
                
                frameWindow = $("#iframe_shoes_image_html").contents()[0].defaultView;
                if( frameWindow )
                {
                    frameWindow.make_design_Image( json_goods );
                    //parameter["image_source"]       = frameWindow.$('.imgs1 img').attr('src');
                }                
                // var json_description = response.description;
                // var json_goods       = response.goods;
            } 
        });
    };
    
    readyMade.stepValidation = function (callStep)
    {
        if (callStep === 3)
        {
            if (parameter.monogram.insideLining || parameter.monogram.outsideSole)
            {
                var value;

                value = Spz("#text-monogram").val();

                if (value === "")
                {
                    step_ready = false;
                    Spz("#text-monogram").cast(0).focus();
                    Spz("#alert-text-monogram").text("Please enter your monogram.");
                } else
                {
                    if (/^[A-Za-z0-9]*$/.test(value))
                    {
                        step_ready = true;
                        Spz("#alert-text-monogram").text("");
                    } else
                    {
                        step_ready = false;
                        Spz("#text-monogram").cast(0).focus();
                        Spz("#alert-text-monogram").text("English script only.");
                    }
                }
            } else
            {
                step_ready = step_ready ? true : false;
                Spz("#alert-text-monogram").text("");
            }
        }

        if (callStep === 1)
        {
            step_ready = step_ready ? true : false;

            if (parameter.monogram.insideLining || parameter.monogram.outsideSole)
            {
                value = Spz("#text-monogram").val();

                if (value === "")
                {
                    Spz("#text-monogram").cast(0).focus();
                    Spz("#alert-text-monogram").text("Please enter your monogram.");
                } else
                {
                    if (/^[A-Za-z0-9]*$/.test(value))
                    {
                        Spz("#alert-text-monogram").text("");
                    } else
                    {
                        step_ready = false;
                        Spz("#text-monogram").cast(0).focus();
                        Spz("#alert-text-monogram").text("English script only.");
                    }
                }
            }
        }
    };

    readyMade.stepTrigger = function (callStep)
    {
        if (callStep === 0)
        {
            if (current_view === 0)
            {
                setTimeout(function () {
                    readyMade.setChoosingItems(0, lang["choose-your-leather"]);
                    readyMade.fadingElement("#choose", "fadeIn");
                }, 500);
            } else if (current_view === 1)
            {
                setTimeout(function () {
                    readyMade.setChoosingItems(0, lang["choose-your-leather"]);
                    // ENABLE ITEMS CHOOSE ON VIEW 2
                    readyMade.fadingElement("#choose", "fadeIn");
                }, 500);
            }
        }

        if (callStep === 1)
        {
            readyMade.fadingElement("#snds-sndv-use-backstitch", "fadeIn");

            setTimeout(function () {
                readyMade.setChoosingItems(1, lang["choose-your-sole-style"]);
                readyMade.fadingElement("#choose", "fadeIn");
            }, 500);
        }

        if (callStep === 2)
        {
            readyMade.fadingElement("#overview", "fadeOut", "disappear");
            readyMade.fadingElement("#snds-sndv-use-backstitch", "fadeOut");
            readyMade.fadingElement("#choose", "fadeOut");

            if (cache["last_step"] > current_step)
            {
                Spz("#items").children().cast(1, true).addClass("left freeze");
                Spz("#items").children().cast(3, true).removeClass("onstate").addClass("right");
                setTimeout(function () {
                    Spz("#items").children().cast(3, true).removeClass("right");
                    Spz("#items").children().cast(2, true).addClass("onstate-extend");
                    Spz("#items").children().cast(1, true).removeClass("left");
                }, 500);

                setTimeout(function () {
                    Spz("#items").children().cast(1, true).addClass("onstate");
                    Spz("#items").children().cast(1, true).removeClass("freeze");
                }, 64);
            } else
            {
                setTimeout(function () {
                    Spz("#items").children().cast(2, true).addClass("onstate-extend");
                }, 64);
            }

            // COOLDOWN STEP
            setTimeout(function () {
                step_ready = true;
            }, 600);
        }

        if (callStep === 3)
        {
            Spz("#items").addClass("fix");
            Spz("#items").children().cast(2, true).addClass("left");
            setTimeout(function () {
                Spz("#items").children().cast(2, true).removeClass("left");
            }, 500);

            readyMade.inputSizeWithVideo(false);
        }

        // SET BUTTON STEP
        if (callStep === 0)
        {
            readyMade.fadingElement("#backstep", "fadeOut");

            if (btn_change_leather)
            {
                //Spz("#nextstep").removeClass("slide");
                readyMade.fadingElement("#chooseLeather", "fadeIn");
            }
        } else if (callStep > 0)
        {
            readyMade.fadingElement("#backstep", "fadeIn");

            if (callStep === all_step)
            {
                readyMade.fadingElement("#nextstep", "fadeOut");
                setTimeout(function () {
                    readyMade.fadingElement("#addcart", "fadeIn");
                }, 500);
            } else {
                readyMade.fadingElement("#addcart", "fadeOut");
                setTimeout(function () {
                    readyMade.fadingElement("#nextstep", "fadeIn");


                }, 500);
                //Spz("#nextstep").addClass("slide");
                readyMade.fadingElement("#chooseLeather", "fadeOut");
            }
        }
    };

    readyMade.backstitch = function (status)
    {
        var checked, image, source, id;

        checked = parameter["backstitch"] ? false : true;

        if (Spz.toType(status) === "boolean")
        {
            checked = status;
            Spz("#sole-backstitch").cast(0).checked = checked;
        }

        // UPDATE PARAMATER
        parameter["backstitch"] = checked;
        id = "#snds-sndv-backstitch";

        if (!cache["backstitch"] && checked)
        {
            source = route + parameter["model"] + "/" + view[2] + "/BlakeStitch/" + data.defaults.backstitch + ".png";
            // UPDATE PARAMETER
            parameter["backstitchColor"] = data.defaults.backstitch;
            // CREATE IMAGE
            image = new Image();
            image.onload = function ()
            {
                // REMOVE OLD IMAGE
                setTimeout(function () {
                    image.removeAttribute("class");
                    setTimeout(function () {
                        Spz(id).children().cast(0, true).remove();
                        state_ready = true;
                    }, 500);
                }, 64);

                // WHEN FIRST STEP HAS BACKSTITCH
                if (Spz("#first-blakestitch").alive())
                {
                    var fst_backstitch;

                    fst_backstitch = new Image();
                    fst_backstitch.onload = function ()
                    {
                        setTimeout(function () {
                            fst_backstitch.removeAttribute("class");
                            setTimeout(function () {
                                Spz("#first-blakestitch").children().cast(0, true).remove();
                            }, 500);
                        }, 64);
                    };
                    fst_backstitch.src = route + parameter["model"] + "/" + view[0]
                            + "/blakestitch/" + data.defaults.backstitch + ".png";
                    fst_backstitch.setAttribute("class", "loading");
                    Spz("#first-blakestitch").append(fst_backstitch);
                }
            };
            image.src = source;
            image.setAttribute("class", "loading");
            Spz(id).append(image);

            // CACHE
            cache["backstitch"] = true;
        }

        if (checked)
        {
            Spz(id + ",#first-blakestitch").removeClass("hide");
            // UPDATE PRICE
            parameter.totalPrice += data.defaults.backstitch_price;
            Spz("#set-price").text(addCommas("" + parameter.totalPrice));
        } else
        {
            Spz(id + ",#first-blakestitch").addClass("hide");
            // UPDATE PRICE
            parameter.totalPrice -= data.defaults.backstitch_price;
            Spz("#set-price").text(addCommas("" + parameter.totalPrice));
        }
    };

    readyMade.monogram = function ()
    {
        var name, name_usable;

        name = Spz("#text-monogram").val();

        name_usable = "";

        // VALIDATE MONOGRAM
        if (/^[A-Za-z0-9]*$/.test(name))
        {
            name_usable = name;
            cache["monogram_script"] = name_usable;
        } else
        {
            name_usable = cache["monogram_script"];
            Spz("#text-monogram").val(name_usable);
        }

        // UPDATE PARAMETER
        parameter.monogram.designBy = name_usable;

        Spz("#monogram-design").text(name_usable);
        // USE FOR MONOGRAM INITIALS ON STEP 2
        step_ready = name_usable !== "" ? true : false;
    };

    readyMade.insideLining = function (status)
    {
        var checked;

        checked = parameter.monogram.insideLining ? false : true;

        if (Spz.toType(status) === "boolean")
        {
            checked = status;
            Spz("#inside-lining").cast(0).checked = checked;
        }

        // UPDATE PARAMATER
        parameter.monogram.insideLining = checked;
        // USE FOR MONOGRAM INITIALS ON STEP 2
        if (checked)
        {
            step_ready = false;
            // CHECK MONOGREM
            Spz(".monogram").removeClass("fadeOutUp");
            Spz(".monogram").addClass("animated-normal fadeInDown");
            Spz("#text-monogram").cast(0).removeAttribute("disabled");
        } else
        {
            step_ready = true;

            if (!parameter.monogram.outsideSole)
            {
                Spz("#alert-text-monogram").text("");
                // CHECK MONOGREM
                Spz(".monogram").removeClass("fadeInDown");
                Spz(".monogram").addClass("animated-normal fadeOutUp");
                Spz("#text-monogram").cast(0).setAttribute("disabled", "disabled");
                Spz("#text-monogram").cast(0).value = "";
            } else
            {
                step_ready = false;
            }
        }
    };

    readyMade.outsideSole = function (status)
    {
        var checked;

        checked = parameter.monogram.outsideSole ? false : true;

        if (Spz.toType(status) === "boolean")
        {
            checked = status;
            Spz("#outside-sole").cast(0).checked = checked;
        }

        // UPDATE PARAMATER
        parameter.monogram.outsideSole = checked;

        checked ? Spz("#snds-sndv-monogram").removeClass("hide")
                : Spz("#snds-sndv-monogram").addClass("hide");
        // USE FOR MONOGRAM INITIALS ON STEP 2
        if (checked)
        {
            step_ready = false;
            // CHECK MONOGREM
            Spz(".monogram").removeClass("fadeOutUp");
            Spz(".monogram").addClass("animated-normal fadeInDown");
            Spz("#text-monogram").cast(0).removeAttribute("disabled");
        } else
        {
            step_ready = true;

            if (!parameter.monogram.insideLining)
            {
                Spz("#alert-text-monogram").text("");
                // CHECK MONOGREM
                Spz(".monogram").removeClass("fadeInDown");
                Spz(".monogram").addClass("animated-normal fadeOutUp");
                Spz("#text-monogram").cast(0).setAttribute("disabled", "disabled");
                Spz("#text-monogram").cast(0).value = "";
            } else
            {
                step_ready = false;
            }
        }
    };

    readyMade.nextstep = function ()
    {
        var toStep;

        toStep = current_step + 1;

        if (toStep === 2 && data.monogram.inside === "N" && data.monogram.outside === "N") {
            toStep += 1;
        }

        return readyMade.stepChange(toStep);
    };

    readyMade.prevstep = function ()
    {
        var toStep;

        toStep = current_step - 1;

        if (toStep === 2 && data.monogram.inside === "N" && data.monogram.outside === "N") {
            toStep -= 1;
        }

        return readyMade.stepChange(toStep);
    };

    readyMade.selectorChange = function ()
    {
        current_target = this.getAttribute("data-target");
        Spz("#items .selector").removeClass("target");

        //
        if (Spz(this).hasClass("selector-side"))
        {
            Spz(".selector-side").children(".selector").addClass("target");
        } else if (Spz(this).hasClass("selector-front"))
        {
            Spz(".selector-front").children(".selector").addClass("target");
        } else if (Spz(this).hasClass("selector-back"))
        {
            Spz(".selector-back").children(".selector").addClass("target");
        } else if (Spz(this).hasClass("selector-main"))
        {
            Spz(".selector-main").children(".selector").addClass("target");
        }

        //
        if (cache["selector"] !== current_target)
        {
            // CACHE
            cache["selector"] = current_target;

            readyMade.fadingElement("#choose-items", "fadeOut");

            Spz(".selector-target").removeClass("active");
            Spz(this).addClass("active");

            //
            if (Spz(this).hasClass("selector-side"))
            {
                Spz(".selector-side").addClass("active");
            } else if (Spz(this).hasClass("selector-front"))
            {
                Spz(".selector-front").addClass("active");
            } else if (Spz(this).hasClass("selector-back"))
            {
                Spz(".selector-back").addClass("active");
            } else if (Spz(this).hasClass("selector-main"))
            {
                Spz(".selector-main").addClass("active");
            }

            //
            setTimeout(function () {

                Spz("#choose-items").empty();

                data[current_target]["item"].forEach(function (value, index) {

                    var image, list;

                    list = document.createElement("li");
                    list.setAttribute("data-id", value.id);
                    list.setAttribute("data-name", value.name);
                    // SET LI PRICE
                    list.setAttribute("data-default-price", value.price);
                    image = new Image();
                    image.onload = function ()
                    {
                        list.appendChild(image);

                        var choosing, checkImage;

                        choosing = parameter[current_target] || data.defaults[current_target];

                        checkImage = new Image();
                        checkImage.src = "/images/misc/check2.png";
                        checkImage.className = "leather-active";

                        if (choosing === value.pid)
                        {
                            list.appendChild(checkImage);
                        }
                    };
                    image.src = leatherPath + value.id + ".png";
                    image.alt = value.name;
                    image.title = value.name;
                    Spz("#choose-items").append(list);
                });

                readyMade.fadingElement("#choose-items", "fadeIn");
            }, 500);
        }

        choose = true;
    };

    readyMade.fadingElement = function (id, type, action)
    {
        var anim;

        anim = action || "disable";

        if (type === "fadeOut")
        {
            Spz(id).addClass("hide");
            setTimeout(function () {
                Spz(id).addClass(anim);
            }, 300);
        } else if (type === "fadeIn")
        {
            Spz(id).removeClass(anim);
            setTimeout(function () {
                Spz(id).removeClass("hide");
            }, 64);
        }
    };

    readyMade.regularSize = function (type, autoQty, autoType)
    {
        var name, i, setQty, setType, defaultSize;

        defaultSize = "EURO";
        name = type || parameter.measurement.regularSize;
        i = 0;

        // REMOVED THEN ADD / APPEND QUANTITY
        if (autoQty === undefined)
        {
            setQty = true;
        } else {
            setQty = autoQty === true ? true : false;
        }

        // REMOVED THEN ADD / APPEND TYPE
        if (autoType === undefined)
        {
            setType = true;
        } else
        {
            setType = autoType === true ? true : false;
        }

        if (setType)
        {
            Spz("#select-type").empty();
        }

        Spz("#select-size").empty();

        Spz.each(size, function (val) {

            if (setType)
            {
                if (size[name])
                {
                    if (name === val)
                    {
                        Spz("#select-type").append("<option selected>" + val + "</option>");
                    } else
                    {
                        Spz("#select-type").append("<option>" + val + "</option>");
                    }
                } else
                {
                    if (val === defaultSize)
                    {
                        Spz("#select-type").append("<option selected>" + val + "</option>");
                    } else
                    {
                        Spz("#select-type").append("<option>" + val + "</option>");
                    }

                    // UPDATE PARAMETER
                    parameter.measurement.regularSize = defaultSize;
                }
            }
        });

        if (size[name])
        {
            Spz("#select-size").append("<option value=''>--</option>");
            Spz.each(size[name], function (n) {
                Spz("#select-size").append("<option value='" + size[name][n] + "'>" + size[name][n] + "</option>");
            });
            // UPDATE PARAMATER
            parameter.measurement.size = Spz("#select-size").val();
        } else
        {
            Spz("#select-size").append("<option value=''>--</option>");
            Spz.each(size[defaultSize], function (n) {
                Spz("#select-size").append("<option value='" + size[defaultSize][n] + "'>" + size[defaultSize][n] + "</option>");
            });
            // UPDATE PARAMATER
            parameter.measurement.size = Spz("#select-size").val();
        }

        if (setQty)
        {
            Spz("#select-qty").empty();

            for (; i < 100; )
            {
                Spz("#select-qty").append("<option>" + (++i) + "</option>");
            }
        }
    };

    readyMade.regularSizeChange = function ()
    {
        var value;

        Spz("#measure").observe("change", "#select-type", function () {

            value = Spz(this).val();

            return readyMade.regularSize(value, false, false);
        });
    };

    readyMade.inputSizeWithVideo = function (observe)
    {
        var sizeName, initVideo, htmlVideo;

        initVideo = function (target)
        {
            sizeName = typeof target === "object" ? target.getAttribute("data-size") : target;
            htmlVideo = Spz("#video-" + sizeName).children().cast(0);

            if (sizeName !== cache["video"])
            {
                var image;

                image = new Image();
                image.src = route + "measurement/" + sizeName + ".jpg";
                Spz("#measurement-image").append(image);
                Spz("#measurement-image").children().cast(0, true).remove();

                if (sizeName === "width")
                {
                    Spz("#video-width").removeClass("hide-video");
                    Spz("#video-length").addClass("hide-video");
                } else if (sizeName === "length")
                {
                    Spz("#video-width").addClass("hide-video");
                    Spz("#video-length").removeClass("hide-video");
                }

                if (htmlVideo.currentTime !== 0)
                {
                    htmlVideo.currentTime = 0;
                }

                //CACHE
                cache["video"] = sizeName;
            }
        };

        if (observe === undefined || observe === true)
        {
            Spz("#measure").observe("click", "#measure-length, #measure-width", function (e) {
                initVideo(e.target);
            });
        } else
        {
            initVideo("length");
        }
    };

    readyMade.detectMeasurement = function ()
    {
        Spz("#measure").observe("change", "#measure-size-inch, #measure-size-cm", function (e) {
            parameter.measurement.unit = e.target.value;

            if (parameter.measurement.unit === "inch") {
                $("#measure .measure-info h4").html("<span>Currently, we are only able to accept Feet Length ranging from 10 to 12.5inch.</span> <b>( very soon we will do other sizes. )</b>");
            } else if (parameter.measurement.unit === "cm") {
                $("#measure .measure-info h4").html("<span>Currently, we are only able to accept Feet Length ranging from 25 to 32cm.</span> <b>( very soon we will do other sizes. )</b>");
            }

            $("#measure-length").removeClass("alert");
            $("#alert-measure-length").html("");
        });

        Spz("#measure").observe("keyup", "#measure-length, #measure-width", function (e) {

            var val, dataSize;

            val = parseFloat(e.target.value);
            dataSize = e.target.getAttribute("data-size");

            if (typeof val === "number" && !isNaN(val))
            {
                parameter.measurement[dataSize] = val;
                Spz("#alert-measure-" + dataSize).text("");
                $("#measure-length").removeClass("alert");
            } else
            {
                this.value = "";
            }
        });

        Spz("#measure").observe("change", "#select-type, #select-size, #select-qty", function (e) {

            var dataRegular;

            dataRegular = e.target.getAttribute("data-regular");

            if (dataRegular === "regularSize")
            {
                parameter.measurement[dataRegular] = e.target.value;
            } else
            {
                parameter.measurement[dataRegular] = parseFloat(e.target.value);

                if (dataRegular === "size" && parameter.measurement["size"] !== "")
                {
                    Spz("#select-size").removeClass("focus");
                }
            }
        });
    };

    readyMade.addToCart = function ()
    {
        if (!finish)
        {
            var length, min, max;

            length = window.parseFloat(Spz("#measure-length").val()) || 0;

            if (parameter.measurement.unit === "cm") {
                min = 25;
                max = 32;
            } else if (parameter.measurement.unit === "inch") {
                min = 10;
                max = 12.5;
            }

            if (parameter["modelStyle"] === "Sneaker" && (length < min || length > max))
            {
                $("#measure-length").addClass("alert");
                Spz("#measure-length").cast(0).focus();

                var html;

                if (parameter.measurement.unit === "cm") {
                    html = "For Luxury sneakers, we are currently only offering feet length sizes from 25 to 32cm. ";
                    html += "More sizes will be available shortly after the launch period. We apologise for any inconvenience caused.";
                } else if (parameter.measurement.unit === "inch") {
                    html = "For Luxury sneakers, we are currently only offering feet length sizes from 10 to 12.5inch. ";
                    html += "More sizes will be available shortly after the launch period. We apologise for any inconvenience caused.";
                }

                $("#alert-measure-length").html(html);

                return false;
            } else {
                $("#measure-length").removeClass("alert");
                $("#alert-measure-length").html("");
            }

            if (Spz("#measure-length").val() === "" || Spz("#measure-length").val() === "0")
            {
                Spz("#measure-length").cast(0).focus();
                Spz("#alert-measure-length").text("Please input your length.");
                return false;
            } else if (Spz("#measure-width").val() === "" || Spz("#measure-width").val() === "0")
            {
                Spz("#measure-width").cast(0).focus();
                Spz("#alert-measure-width").text("Please input your width.");
                return false;
            } else if (Spz("#select-size").val() === "")
            {
                Spz("#select-size").addClass("focus");
                return false;
            }
            // ADD CART ALREADY
            finish = true;

            // UPDATE PARAMETER
            parameter.measurement.regularSize = Spz("#select-type").val();
            parameter.measurement.size = parseFloat(Spz("#select-size").val());
            parameter.measurement.quantity = parseFloat(Spz("#select-qty").val());

            if (!parameter.monogram.insideLining && !parameter.monogram.outsideSole)
            {
                parameter.monogram.designBy = "";
            }

            var style, i;

            style = [];
            i = 0;

            style[i++] = data.defaults.accessory ? "accessory" : "";
            style[i++] = data.defaults.back ? "back" : "";
            style[i++] = data.defaults.front ? "front" : "";
            style[i++] = data.defaults.main ? "main" : "";
            style[i++] = data.defaults.side ? "side" : "";
            style[i++] = data.defaults.sole ? "sole" : "";
            style = style.clean("");

            Spz.each(style, function (i, v) {

                if (data.defaults[v] !== parameter[v])
                {
                    parameter["modelSeries"] = "customize";
                }
            });

            if (parameter["modelSeries"] === "")
            {
                parameter["modelSeries"] = "defaults";
            }
            parameter["productType"]    = "shoe";
            parameter["price"]          = Spz("#set-price").val();
            parameter["_token"]         = $('input[name=_token]').val();
            // SEND PARAMETER HERE
            frameWindow = $("#iframe_shoes_image_html").contents()[0].defaultView;
            if( frameWindow )
            {
                //frameWindow.make_design_Image( json_goods );
                parameter["image_source"]       = frameWindow.$('.imgs1 img').attr('src');
            }
            
            $.ajax({
                type: "POST",
                url: "/designshoes/elements/cart/addModelShoesToCart",
                data: parameter,
                contentType: "application/x-www-form-urlencoded;charset=UTF-8",
                success: function (response) 
                {
                    window.location.href = "/designshoes/checkout";
                }
            });
        }
    };

    readyMade.behindScenes = function ()
    {
        Spz.load(function () {

            setTimeout(function () {
                // VIEW 2
                Spz(".second.view img").each(function () {

                    var _this, source, image;

                    _this = this;
                    source = this.getAttribute("data-source");

                    if (source)
                    {
                        image = new Image();
                        image.onload = function ()
                        {
                            _this.removeAttribute("class");
                            _this.removeAttribute("data-source");
                            _this.src = source;
                        };
                        image.src = source;
                        image.setAttribute("class", "behind-loading");
                    }
                });
                // VIEW 3 : SOLE
                Spz("#second-view img").each(function () {

                    var _this, source, image;

                    _this = this;
                    source = this.getAttribute("data-source");

                    if (source)
                    {
                        image = new Image();
                        image.onload = function ()
                        {
                            _this.removeAttribute("class");
                            _this.removeAttribute("data-source");
                            _this.src = source;
                        };
                        image.src = source;
                        _this.setAttribute("class", "behind-loading");
                    }
                });
                // MEASUREMENT
                Spz.each(["length", "width"], function (i, v) {

                    var source, image;

                    source = route + "measurement/" + v + ".jpg";

                    if (source)
                    {
                        image = new Image();
                        image.src = source;
                    }
                });
            }, 500);
        });
    };

    readyMade.debug = function ()
    {
        var span, d;

        span = Spz("#debug ul li span");
        d = 0;

        for (var i in parameter) {

            if (typeof parameter[i] === "object")
            {
                for (var n in parameter[i])
                {
                    if (Spz.toType(parameter[i][n]) === "boolean")
                    {
                        span.cast(d).innerHTML = parameter[i][n] ? "<font color='GREEN'>TRUE</font>"
                                : "<font color='RED'>FALSE</font>";
                    } else
                    {
                        span.cast(d).innerHTML = parameter[i][n] === "" ? "-" : parameter[i][n];
                    }
                    d++;
                }
            } else if (typeof parameter[i] === "boolean")
            {
                span.cast(d).innerHTML = parameter[i] ? "<font color='GREEN'>TRUE</font>"
                        : "<font color='RED'>FALSE</font>";
                d++;
            } else
            {
                span.cast(d).innerHTML = parameter[i] === "" ? "-" : parameter[i];
                d++;
            }
        }
    };

    readyMade.shareDesign = function ()
    {
        var site_url, images, index, back_link;

        site_url = location.protocol + "//" + window.location.host + window.location.pathname;
        back_link = window.location.href;

        images = [];
        index = 0;

        images[0] = route + parameter.model + "/view2/Body.png";

        if (parameter.main && parameter.main !== false)
        {
            images[++index] = route + parameter.model + "/view2/main/" + parameter.main + ".png";
        }

        if (parameter.side && parameter.side !== false)
        {
            images[++index] = route + parameter.model + "/view2/side/" + parameter.side + ".png";
        }

        if (parameter.front && parameter.front !== false)
        {
            images[++index] = route + parameter.model + "/view2/front/" + parameter.front + ".png";
        }

        if (parameter.back && parameter.back !== false)
        {
            images[++index] = route + parameter.model + "/view2/back/" + parameter.back + ".png";
        }

        if (parameter.laces && parameter.laces !== false && parameter.laces !== "")
        {
            images[++index] = route + parameter.model + "/view2/laces/" + parameter.laces + ".png";
        }

        if (parameter.accessory && parameter.accessory !== false && parameter.accessory !== "")
        {
            images[++index] = route + parameter.model + "/view2/accessory/" + parameter.accessory + ".png";
        }

        canvas.call(images, 175, 90, function (res) {

            FB.init({
                appId: "1324487784335078",
                xfbml: true,
                version: "v2.9"
            });

            FB.ui({
                method: "feed",
                name: "LUXURY DESIGNER SHOES",
                link: back_link,
                picture: site_url + "public/upload/" + res.id + ".png",
                caption: "Customized shoes design idea by iTailor",
                description: "Design your own custom dress shoes, iTailor Shoes limitless possibility on state of the art 3D, Custom made Shoes with more than 100 leather choices and millions of style combination!",
                message: ""
            });
        });
    };

    readyMade.selectorHover = function ()
    {
        var target;

        target = Spz(this).closest(".selector-target").cast(0).getAttribute("data-target");

        if (cache["selectorHover_" + target] === undefined || cache["selectorHover_" + target] === true)
        {
            cache["selectorHover_" + target] = false;

            Spz("#" + step[current_view] + "-" + target).addClass("animated brightness");

            setTimeout(function () {
                Spz("#" + step[current_view] + "-" + target).removeClass("animated brightness");
                cache["selectorHover_" + target] = true;
            }, 2500);
        }
    };

    readyMade.getAllElementsWithAttribute = function (attribute)
    {
        var matchingElements = [];
        var allElements = document.getElementsByTagName('*');
        for (var i = 0; i < allElements.length; i++)
        {
            if (allElements[i].getAttribute(attribute))
            {
                // Element exists with attribute. Add to array.
                matchingElements.push(allElements[i]);
            }
        }
        return matchingElements;
    };

    readyMade.setLanguage = function ()
    {
        var dataLang, name;

        dataLang = readyMade.getAllElementsWithAttribute('data-lang');

        dataLang.forEach(function (el) {

            name = el.getAttribute('data-lang');

            if (lang[name] !== undefined)
            {
                el.innerHTML = lang[name];
            }
        });
    };

    readyMade.resetStyle = function ()
    {
        var style, i, target;

        style = [];
        i = 0;
        target = current_target;

        style[i++] = data.defaults.accessory ? "accessory" : "";
        style[i++] = data.defaults.back ? "back" : "";
        style[i++] = data.defaults.front ? "front" : "";
        style[i++] = data.defaults.main ? "main" : "";
        style[i++] = data.defaults.side ? "side" : "";
        style[i++] = data.defaults.sole ? "sole" : "";
        style = style.clean("");

        readyMade.backstitch(false);
        readyMade.insideLining(false);
        readyMade.outsideSole(false);
        parameter.monogram.designBy = "";

        Spz.each(style, function (i, v) {
            if (v === target)
            {
                style.splice(i, 1);
                style.push(v);
            }
        });

        Spz.each(style, function (i, v) {

            if (v === "sole")
            {
                readyMade.sole({
                    "id": data.defaults[v],
                    "name": data.defaults[v + "_name"],
                    "access": true
                });
            } else
            {
                readyMade.leather({
                    "id": data.defaults[v],
                    "name": data.defaults[v + "_name"],
                    "price": setPrice,
                    "target": v,
                    "access": true
                });
            }
        });

        current_target = target;
    };

    return fn(readyMade);
});

// BUILD STRUCTURE
ready_made = function (callback, fn)
{
    Spz.ready(function () {

        //$(document).tooltip();
        $(":checkbox").prop("checked", false);
        $(":input[type='text']").val("");

        if (parameter.totalPrice <= 0)
        {
            Spz("#addcart").remove();
        }

        Spz(".selector-target").each(function (i, v) {

            var target;

            target = v.getAttribute("data-target");

            if (data.defaults.selector === target)
            {
                Spz(v).addClass("active");
            }
        });

        return callback(fn);
    });
};

init = new ready_made(initial, function (fn) {
    /* ----------------------------------------------------------------------------
     * SETUP
     * ----------------------------------------------------------------------------
     */
    // SET SIZE
    fn.regularSize();
    // WHEN SIZE CHANGE
    fn.regularSizeChange();
    // INPUT SIZE
    fn.inputSizeWithVideo();
    // MEASUREMENT
    fn.detectMeasurement();
    // BEHIND SCENES
    fn.behindScenes();
    // BEHIND SCENES
    fn.setLanguage();

    // OTHER SETUP
    Spz("#backstitch-price").text("" + data.defaults["backstitch_price"]);

    if (data.on_sale) {
        $("#set-price-regular").text(addCommas("" + regularPrice));
    } else {
        $("#set-price-regular").text(addCommas("" + setPrice)).parent().hide();
    }

    Spz("#set-price").text(addCommas("" + setPrice));
    Spz("#control").observe("click", "#chooseLeather", function () {
        if (btn_change_leather)
        {
            btn_change_leather = false;
            Spz("#selector, #selector-view2").removeClass("hide").addClass("show");
            fn.fadingElement("#chooseLeather", "fadeOut");
            //Spz("#nextstep").addClass("slide");
        }
    });

    /* ----------------------------------------------------------------------------
     * OBSERVING
     * ----------------------------------------------------------------------------
     */
    Spz("#mastcontainer").observe("click", "#reset-style", fn.resetStyle);
    // OBSERVE EVENT ON CHOOSE STYLE
    Spz("#choose-items").observe("click", "li", fn.makeStyles);
    // OBSERVE EVENT ON SELECTOR
    Spz("#items").observe("click", ".selector-target", fn.selectorChange);
    // SELECTOR HOVER
    Spz("#items").observe("mouseover", ".selector", fn.selectorHover);
    // OBSERVE EVENT ON OVERVIEW
    Spz("#overview").observe("click", "li", fn.viewChange);
    // OBSERV EVENT ON NEXTSTEP
    Spz("#nextstep").observe("click", fn.nextstep);
    Spz("#items").swipeLeft(fn.nextstep);
    // OBSERV EVENT ON BACKSTEP
    Spz("#backstep").observe("click", fn.prevstep);
    Spz("#items").swipeRight(fn.prevstep);
    // OBSERVE EVENT ON BACKSTITCH
    Spz("#snds-sndv-use-backstitch").observe("click", "#use-sole-backstitch", fn.backstitch);
    // OBSERVE EVENT ON KEYPRESS MONOGRAM
    Spz("#items").observe("keyup", "#text-monogram", fn.monogram);
    // MONOGRAM INITIAL
    Spz("#monogram-initial").observe("click", "#use-inside-lining", fn.insideLining);
    Spz("#monogram-initial").observe("click", "#use-outside-sole", fn.outsideSole);
    Spz("#static").observe("click", "#share-design", fn.shareDesign);
    // VIEW DATA
    Spz("#mastcontainer").observe("click", "#addcart", fn.addToCart);
    // SELECTOR EFFECT
    Spz("#selector, #selector-view2").hold(function () {

        var elem;

        elem = this;

        if (Spz(elem).hasClass("hide"))
        {
            Spz(elem).removeClass("hide").addClass("show");
            setTimeout(function () {
                Spz(elem).children(".selector-target").removeClass("visibility");
            }, 64);
        } else
        {
            Spz(elem).removeClass("show").addClass("hide");
            setTimeout(function () {
                Spz(elem).children(".selector-target").addClass("visibility");
            }, 464);
        }
    });

    // FIX OBJECT
    if (data.model === "DS_005")
    {
        var selector;

        $("#desc-shoes").html("Oxford shoe is a style of leather shoe with enclosed lacing. You can customize each area with iShoes 3D Designer from combining 100s of leather/fabric and thousands of styles");
        $("#desc-shoes").attr("title", "Oxford shoe is a style of leather shoe with enclosed lacing. You can customize each area with iShoes 3D Designer from combining 100s of leather/fabric and thousands of styles");
        $("#percent-model").html("100% Wool");
        $("#items").on("click", ".selector-target", function () {

            selector = this.getAttribute("data-target");

            if (selector === "main")
            {
                $("#choose-text").html("Choose Your Fabric");
            } else
            {
                $("#choose-text").html("Choose Your Leather");
            }
        });

        $(".selector-target").each(function (i, v) {
            if (v.getAttribute("data-target") === "main")
            {
                $(v).children("span").html("Click to Change Fabric");
            }
        });

        if (data.defaults.selector === "main") {
            $("#choose-text").html("Choose Your Fabric");
        }
    }

    (function () {
        $(".corona-popup").on("click", function () {
            $("#corona").addClass("active");
        });

        $("#corona").on("click", ".close", function () {
            $("#corona").removeClass("active");
        });
    })();
});