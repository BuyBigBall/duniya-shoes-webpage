
/* ----------------------------------------------------------------
 * jQuery Animation CSS 3 plugin v1.0
 * update Last 15/3/57
 * by komsun.online
 * ---------------------------------------------------------------*/

$.fn.Animation = function(option)
{
    var _this = $(this);
    var defaults = {
        effect: ""
    };
    defaults = $.extend(defaults, option);
    for (var i in defaults)
    {
        Effect(i, defaults[i]);
    }
    function Effect(type, val)
    {
        switch (type) {
            case "translateX":
                _this.css({
                    '-webkit-transform': 'translateX(' + val + ')',
                    '-ms-transform': 'translateX(' + val + ')',
                    '-o-transform': 'translateX(' + val + ')',
                    '-moz-transform': 'translateX(' + val + ')',
                    'transform': 'translateX(' + val + ')'
                });
                break;
            case "translateY":
                _this.css({
                    '-webkit-transform': 'translateY(' + val + ')',
                    '-ms-transform': 'translateY(' + val + ')',
                    '-o-transform': 'translateY(' + val + ')',
                    '-moz-transform': 'translateY(' + val + ')',
                    'transform': 'translateY(' + val + ')'
                });
            case "transition":
                _this.css({
                    'transition': 'all ' + val + 's ease',
                    '-webkit-transition': 'all ' + val + 's ease',
                    '-moz-transition': 'all ' + val + 's ease',
                    '-ms-transform': 'all ' + val + 's ease',
                    '-o-transition': 'all ' + val + 's ease'
                });
                break;
            case "opacity":
                _this.css({
                    'opacity': val
                });
                break;
            case "scale":
                _this.css({
                    '-webkit-transform': 'scale(' + val + ')',
                    '-ms-transform': 'scale(' + val + ')',
                    '-o-transform': 'scale(' + val + ')',
                    '-moz-transform': 'scale(' + val + ')',
                    'transform': 'scale(' + val + ')'
                });
                break;
        }
    }
};