/* ----------------------------------------------------------------
 * SET ELEMENT STYLE
 * ----------------------------------------------------------------
 * @access public
 * @param  object   DOM Element or DOM Element array
 * @param  object   the style container
 * @return void
 */
function setElementStyle(elm, css) {
    if (elm.length > 1) {
        elm.forEach(function (item) {
            for (var key in css) {
                item.style[key] = css[key];
            }
        });
    } else {
        for (var key in css) {
            elm.style[key] = css[key];
        }
    }
}

/* ----------------------------------------------------------------
 * REMOVE ATTRIBUTE STYLE
 * ----------------------------------------------------------------
 * @access public
 * @param  object   DOM Element or DOM Element array
 * @return void
 */
function removeAttrStyle(elm) {
    elm.forEach(function (item) {
        item.removeAttribute("style");
    });
}

/* ----------------------------------------------------------------
 * REMOVE ELEMENT BY ID OR CLASSNAME
 * ----------------------------------------------------------------
 * UASGE :
 *  document.getElementById("my-element").remove();
 *  document.getElementsByClassName("my-elements").remove();
 */
Element.prototype.remove = function () {
    this.parentElement.removeChild(this);
};
NodeList.prototype.remove = HTMLCollection.prototype.remove = function () {
    for (var i = 0, len = this.length; i < len; i++) {
        if (this[i] && this[i].parentElement) {
            this[i].parentElement.removeChild(this[i]);
        }
    }
};

/* ----------------------------------------------------------------
 * PAGE LOADING
 * ----------------------------------------------------------------
 */
window.SzPreload || (window.SzPreload = {
    id: null,
    progress: 0
});

window.addEventListener('DOMContentLoaded', function () {

    var images = document.getElementsByTagName('img')
        , html = document.getElementsByTagName("html")[0]
        , body = document.getElementsByTagName("body")[0]
        , preloading_percent = document.getElementById('preloading-percent')
        , preloading = document.getElementById('preloading')
        , percent = 0
        , success = 0
        , len = images.length;

    if (len !== 0) {
        setElementStyle([html, body], {
            width: "100%",
            height: "100%",
            minWidth: "360px",
            minHeight: "100%",
            overflow: "hidden"
        });

        for (var index in images) {
            if (images.hasOwnProperty(index) && index < len) {
                images[index].onload = function () {
                    if (window.SzPreload.progress < 100) {
                        percent = Math.min(100, Math.max(percent, 0, Math.round((100 / len) * ++success)));

                        if (percent === 100) {
                            preloading_percent.innerHTML = '100%';
                            preloading.style.width = '100%';
                        } else {
                            preloading_percent.innerHTML = percent + '%';
                            preloading.style.width = percent + '%';
                        }

                        window.SzPreload.progress = percent;
                    }
                };
            }
        }
    } else {
        // DO STUFF WHEN NOT FOUND IMAGE ON HTML
    }
}, false);

/* ----------------------------------------------------------------
 * PAGE LOADED
 * ----------------------------------------------------------------
 */
window.addEventListener('load', function () {

    var html = document.getElementsByTagName("html")[0]
        , body = document.getElementsByTagName("body")[0]
        , preloading_percent = document.getElementById('preloading-percent')
        , preloading = document.getElementById('preloading')
        , preload = document.getElementById('preload');

    // FAKE LOAD
    window.SzPreload.progress = 100;

    setTimeout(function () {
        // SET PAGE LOADING PERCENTAGE, THEN PRELOAD SUCCESS AFTER 1 SECOND
        preloading_percent.innerHTML = '100%';
        preloading.style.width = '100%';
    }, 1000);

    setTimeout(function () {
        preload.setAttribute('class', 'success');
    }, 2000);

    // BROWSER DETECTION
    if (navigator.userAgent.toLowerCase().match(/msie/i)) {
        setTimeout(function () {
            // REMOVE DOM HTML AND BODY INLINE STYLE
            removeAttrStyle([html, body]);
            // ::
            $("html, body").attr("style", "");
            // REMOVE PRELOAD
            preload.remove();
        }, 2200);
    } else {
        setTimeout(function () {
            // REMOVE DOM HTML AND BODY INLINE STYLE
            removeAttrStyle([html, body]);
            // ::
            $("html, body").attr("style", "");
            // REMOVE PRELOAD
            preload.remove();
        }, 2200);
    }
});