/*
 * ----------------------------------------------------------------------------
 * SPEZIICOZ : MICRO JAVASCRIPT LIBRARY VERSION : 1.0.0
 * ----------------------------------------------------------------------------
 * An open source application development javascript framework
 *
 * @require     Sizzle.js   A javaScript CSS selector engine
 *
 * @package     Speziicoz
 * @handling    events on mobile devices observing
 * @author      Champ N. Jaikaew
 * @copyright   Copyright (c) 2013 - 2014, Champ N. Jaikaew.
 * @license     You may use this code under the terms of the MIT license.
 * @since       Version 1.0.0
 * @filesource
 *
 * ----------------------------------------------------------------------------
 * PERMISSION :
 * ----------------------------------------------------------------------------
 * Permission is hereby granted, free of charge,
 * to any person obtaining a copy of this software and associated documentation,
 * to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software,
 * and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * The software is provided "as is",
 * without warranty of any kind, express or implied,
 * including but not limited to the warranties of merchantability,
 * fitness for a particular purpose and noninfringement.
 * in no event shall the authors or copyright holders be liable for any claim,
 * damages or other liability, whether in an action of contract,
 * tort or otherwise, arising from, out of or in connection with the software
 * or the use or other dealings in the software.
 */
(function() {

    (function(Spz) {

        var SPZ_EVENT, SPZ_GESTURE, SPZ_TOUCH_TIMEOUT, SPZ_FIRST_TOUCH, SPZ_CURRENT_TOUCH,
                SPZ_HOLD_DELAY, SPZ_GESTURES, Spz_listenTouches, Spz_getTouches, Spz_fingersPosition,
                Spz_parentIfText, Spz_trigger, Spz_hold, Spz_angle, Spz_distance, Spz_onTouchStart,
                Spz_isSwipe, Spz_captureRotation, Spz_capturePinch, Spz_cleanGesture,
                Spz_onTouchMove, Spz_swipeDirection, Spz_onTouchEnd;

        SPZ_EVENT = void 0;
        SPZ_GESTURE = {};
        SPZ_TOUCH_TIMEOUT = void 0;
        SPZ_FIRST_TOUCH = [];
        SPZ_CURRENT_TOUCH = [];
        SPZ_HOLD_DELAY = 650;
        SPZ_GESTURES = [
            "touch", "tap", "singleTap", "doubleTap", "hold",
            "swipe", "swiping", "swipeLeft", "swipeRight", "swipeUp", "swipeDown",
            "rotate", "rotating", "rotateLeft", "rotateRight",
            "pinch", "pinching", "pinchIn", "pinchOut",
            "drag", "dragLeft", "dragRight", "dragUp", "dragDown"
        ];

        SPZ_GESTURES.forEach(function(event) {

            Spz.fn[event] = function(callback)
            {
                var event_name;

                event_name = event === "touch" ? "touchend" : event;

                return Spz(document.body).delegate(this.selector, event_name, callback);
            };

            return this;
        });

        Spz_listenTouches = function()
        {
            var environment;

            environment = Spz(document.body);
            environment.bind("touchstart", Spz_onTouchStart);
            environment.bind("touchmove", Spz_onTouchMove);
            environment.bind("touchend", Spz_onTouchEnd);
            return environment.bind("touchcancel", Spz_cleanGesture);
        };

        Spz_getTouches = function(event)
        {
            if (Spz.isMobile())
            {
                return event.touches;
            }
            else
            {
                return [event];
            }
        };

        Spz_fingersPosition = function(touches, fingers)
        {
            var i, result;

            result = [];
            i = 0;
            touches = touches[0].targetTouches ? touches[0].targetTouches : touches;

            while (i < fingers)
            {
                result.push({
                    x: touches[i].pageX,
                    y: touches[i].pageY
                });

                i++;
            }

            return result;
        };

        Spz_parentIfText = function(node)
        {
            if ("tagName" in node)
            {
                return node;
            }
            else
            {
                return node.parentNode;
            }
        };

        Spz_trigger = function(type, params)
        {
            if (SPZ_GESTURE.el)
            {
                params = params || {};

                if (SPZ_CURRENT_TOUCH[0])
                {
                    params.iniTouch = (SPZ_GESTURE.fingers > 1 ? SPZ_FIRST_TOUCH : SPZ_FIRST_TOUCH[0]);
                    params.currentTouch = (SPZ_GESTURE.fingers > 1 ? SPZ_CURRENT_TOUCH : SPZ_CURRENT_TOUCH[0]);
                }

                return SPZ_GESTURE.el.trigger(type, params, SPZ_EVENT);
            }
        };

        Spz_hold = function()
        {
            if (SPZ_GESTURE.last && (Date.now() - SPZ_GESTURE.last >= SPZ_HOLD_DELAY))
            {
                Spz_trigger("hold");
                return SPZ_GESTURE.taps = 0;
            }
        };

        Spz_angle = function(touches_source)
        {
            var aFacet, bFacet, angle, x, y;

            aFacet = touches_source[0];
            bFacet = touches_source[1];
            x = (bFacet.x - aFacet.x);
            y = (bFacet.y - aFacet.y) * -1;
            angle = Math.atan(y / x) * (180 / Math.PI);

            if (angle < 0)
            {
                return angle + 180;
            }
            else
            {
                return angle;
            }
        };

        Spz_distance = function(touches_source)
        {
            var aFacet, bFacet, x, y;

            aFacet = touches_source[0];
            bFacet = touches_source[1];
            x = (bFacet.x - aFacet.x) * (bFacet.x - aFacet.x);
            y = (bFacet.y - aFacet.y) * (bFacet.y - aFacet.y);

            return Math.sqrt(x + y) * -1;
        };

        Spz_onTouchStart = function(event)
        {
            var delta, fingers, now, touches;

            SPZ_EVENT = event;
            now = Date.now();
            delta = now - (SPZ_GESTURE.last || now);

            SPZ_TOUCH_TIMEOUT && clearTimeout(SPZ_TOUCH_TIMEOUT);

            touches = Spz_getTouches(event);
            fingers = touches.length;
            SPZ_FIRST_TOUCH = Spz_fingersPosition(touches, fingers);
            SPZ_GESTURE.el = Spz(Spz_parentIfText(touches[0].target));
            SPZ_GESTURE.fingers = fingers;
            SPZ_GESTURE.last = now;

            if (!SPZ_GESTURE.taps)
            {
                SPZ_GESTURE.taps = 0;
            }

            SPZ_GESTURE.taps++;

            if (fingers === 1)
            {
                if (fingers >= 1)
                {
                    SPZ_GESTURE.gap = delta > 0 && delta <= 250;
                }

                return setTimeout(Spz_hold, SPZ_HOLD_DELAY);
            }
            else if (fingers === 2)
            {
                //** MORE THAN ONE FINGERS **//

                SPZ_GESTURE.initial_angle = parseInt(Spz_angle(SPZ_FIRST_TOUCH), 10);
                SPZ_GESTURE.initial_distance = parseInt(Spz_distance(SPZ_FIRST_TOUCH), 10);
                SPZ_GESTURE.angle_difference = 0;
                return SPZ_GESTURE.distance_difference = 0;
            }
        };

        Spz_isSwipe = function(event)
        {
            var swipe, move_horizontal, move_vertical;

            swipe = false;

            if (SPZ_CURRENT_TOUCH[0])
            {
                move_horizontal = Math.abs(SPZ_FIRST_TOUCH[0].x - SPZ_CURRENT_TOUCH[0].x) > 30;
                move_vertical = Math.abs(SPZ_FIRST_TOUCH[0].y - SPZ_CURRENT_TOUCH[0].y) > 30;
                swipe = SPZ_GESTURE.el && (move_horizontal || move_vertical);
            }

            return swipe;
        };

        Spz_captureRotation = function()
        {
            var angle, diff, i, symbol;

            angle = parseInt(Spz_angle(SPZ_CURRENT_TOUCH), 10);
            diff = parseInt(SPZ_GESTURE.initial_angle - angle, 10);

            if (Math.abs(diff) > 20 || SPZ_GESTURE.angle_difference !== 0)
            {
                i = 0;
                symbol = SPZ_GESTURE.angle_difference < 0 ? "-" : "+";

                while (Math.abs(diff - SPZ_GESTURE.angle_difference) > 90 && i++ < 10)
                {
                    eval("diff " + symbol + "= 180;");
                }

                SPZ_GESTURE.angle_difference = parseInt(diff, 10);

                return Spz_trigger("rotating", {
                    angle: SPZ_GESTURE.angle_difference
                });
            }
        };

        Spz_capturePinch = function()
        {
            var diff, distance;

            distance = parseInt(Spz_distance(SPZ_CURRENT_TOUCH), 10);
            diff = SPZ_GESTURE.initial_distance - distance;

            if (Math.abs(diff) > 10)
            {
                SPZ_GESTURE.distance_difference = diff;

                return Spz_trigger("pinching", {
                    distance: diff
                });
            }
        };

        Spz_cleanGesture = function(event)
        {
            SPZ_FIRST_TOUCH = [];
            SPZ_CURRENT_TOUCH = [];
            SPZ_GESTURE = {};

            return clearTimeout(SPZ_TOUCH_TIMEOUT);
        };

        Spz_onTouchMove = function(event)
        {
            var fingers, is_swipe, touches;

            SPZ_EVENT = event;

            if (SPZ_GESTURE.el)
            {
                touches = Spz_getTouches(event);
                fingers = touches.length;

                if (fingers === SPZ_GESTURE.fingers)
                {

                    SPZ_CURRENT_TOUCH = Spz_fingersPosition(touches, fingers);
                    is_swipe = Spz_isSwipe(event);

                    if (is_swipe)
                    {
                        SPZ_GESTURE.prevSwipe = true;
                    }

                    if (is_swipe || SPZ_GESTURE.prevSwipe === true)
                    {
                        Spz_trigger("swiping");
                    }

                    if (fingers === 2)
                    {
                        //** MORE THAN ONE FINGERS **//

                        Spz_captureRotation();
                        Spz_capturePinch();
                        //event.preventDefault();
                    }
                    // ADD 02/10/2014
                    //event.preventDefault();
                }
                else
                {
                    Spz_cleanGesture();
                }
            }

            return true;
        };

        Spz_swipeDirection = function(x1, x2, y1, y2)
        {
            var xDelta, yDelta;

            xDelta = Math.abs(x1 - x2);
            yDelta = Math.abs(y1 - y2);

            if (xDelta >= yDelta)
            {
                if (x1 - x2 > 0)
                {
                    return "Left";
                }
                else
                {
                    return "Right";
                }
            }
            else
            {
                if (y1 - y2 > 0)
                {
                    return "Up";
                }
                else
                {
                    return "Down";
                }
            }
        };

        Spz_onTouchEnd = function(event)
        {
            var anyevent, drag_direction, pinch_direction, rotation_direction, swipe_direction;

            SPZ_EVENT = event;
            Spz_trigger("touch");

            if (SPZ_GESTURE.fingers === 1)
            {
                if (SPZ_GESTURE.taps === 2 && SPZ_GESTURE.gap)
                {
                    Spz_trigger("doubleTap");
                    Spz_cleanGesture();
                }
                else if (Spz_isSwipe() || SPZ_GESTURE.prevSwipe)
                {
                    Spz_trigger("swipe");
                    swipe_direction = Spz_swipeDirection(SPZ_FIRST_TOUCH[0].x, SPZ_CURRENT_TOUCH[0].x, SPZ_FIRST_TOUCH[0].y, SPZ_CURRENT_TOUCH[0].y);
                    Spz_trigger("swipe".concat(swipe_direction));
                    Spz_cleanGesture();
                }
                else
                {
                    Spz_trigger("tap");

                    if (SPZ_GESTURE.taps === 1)
                    {
                        SPZ_TOUCH_TIMEOUT = setTimeout((function() {
                            Spz_trigger("singleTap");
                            return Spz_cleanGesture();
                        }), 100);
                    }
                }
            }
            else
            {
                //** MORE THAN ONE FINGERS **//

                anyevent = false;

                if (SPZ_GESTURE.angle_difference !== 0)
                {
                    Spz_trigger("rotate", {
                        angle: SPZ_GESTURE.angle_difference
                    });

                    rotation_direction = SPZ_GESTURE.angle_difference > 0 ? "rotateRight" : "rotateLeft";

                    Spz_trigger(rotation_direction, {
                        angle: SPZ_GESTURE.angle_difference
                    });

                    anyevent = true;
                }

                if (SPZ_GESTURE.distance_difference !== 0)
                {
                    Spz_trigger("pinch", {
                        angle: SPZ_GESTURE.distance_difference
                    });

                    pinch_direction = SPZ_GESTURE.distance_difference > 0 ? "pinchOut" : "pinchIn";

                    Spz_trigger(pinch_direction, {
                        distance: SPZ_GESTURE.distance_difference
                    });

                    anyevent = true;
                }

                if (!anyevent && SPZ_CURRENT_TOUCH[0])
                {
                    if (Math.abs(SPZ_FIRST_TOUCH[0].x - SPZ_CURRENT_TOUCH[0].x) > 10 || Math.abs(SPZ_FIRST_TOUCH[0].y - SPZ_CURRENT_TOUCH[0].y) > 10)
                    {
                        Spz_trigger("drag");
                        drag_direction = Spz_swipeDirection(SPZ_FIRST_TOUCH[0].x, SPZ_CURRENT_TOUCH[0].x, SPZ_FIRST_TOUCH[0].y, SPZ_CURRENT_TOUCH[0].y);
                        Spz_trigger("drag".concat(drag_direction));
                    }
                }

                Spz_cleanGesture();
            }

            return SPZ_EVENT = void 0;
        };

        Spz.ready(function() {
            return Spz_listenTouches();
        });

    })(Speziicoz);
    
}).call(this);