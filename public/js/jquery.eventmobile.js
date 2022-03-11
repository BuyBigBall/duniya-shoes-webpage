
/* ----------------------------------------------------------------
 * jQuery jQuery.EventMobile plugin v2.0
 * update Last 2014-08-09
 * by komsun.online
 * ---------------------------------------------------------------*/

$.fn.EventTouchMobile = function(callback) {
    var _this = $(this);
    var df = {started: false, mousemove: false, startX: 0, startY: 0, EndX: 0, EndY: 0};
    _this.on('touchstart', function(e) {
        df.startX = e.originalEvent.pageX;
        df.startY = e.originalEvent.pageY;
        if (!df.started) {
            df.started = true;
        } else {
            return false;
        }
    });
//    _this.bind('touchend touchcancel', function(event) {
    _this.on('touchend touchcancel', function(event) {
        if (df.mousemove) {
//                event.preventDefault();
            checkPointer(function(event) {
                df.started = false;
                callback(event);
            });
        }
    });
    _this.on('touchmove', function(event) {
        //event.preventDefault();
        var pointer = getPointerEvent(event);
        df.EndX = event.originalEvent.pageX;
        df.EndY = event.originalEvent.pageY;
        setTimeout(function() {
            df.mousemove = true;
        }, 100);
    });
    var getPointerEvent = function(event) {
        return event.originalEvent.targetTouches;
    };
    function checkPointer(callback) {
        var str = "";
        var numbers = 300;
        var sumX = (df.startX - df.EndX);
        var sumY = (df.startY - df.EndY);

        if (df.mousemove && ((sumX > numbers || sumX < numbers) || (sumY > numbers || sumY < numbers))) {
            var _sumX = (sumX < 0) ? sumX * -1 : sumX;
            var _sumY = (sumY < 0) ? sumY * -1 : sumY;
            if (_sumX > _sumY) {
                if (df.startX > df.EndX) {
                    str = "left";
                } else {
                    str = "right";
                }
            } else {
                if (df.startY > df.EndY) {
                    str = "up";
                } else {
                    str = "down";
                }
            }
        } else {
            str = "click";
        }
        df.started = false;
        df.mousemove = false;
        callback(str);
    }}
;