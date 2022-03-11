/*
 * ----------------------------------------------------------------------------
 * SPEZIICOZ : MICRO JAVASCRIPT LIBRARY VERSION : 1.0.0
 * ----------------------------------------------------------------------------
 * An open source application development javascript framework
 *
 * @require     Sizzle.js   A javaScript CSS selector engine
 *
 * @package     Speziicoz
 * @handling    events observing
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

        var SPZ_HANDLERS, SPZ_EVENTS_DESKTOP, SPZ_ELEMENT_ID, SPZ_EVENT_METHODS,
                Spz_environmentEvent, Spz_getElementId, Spz_createProxy,
                Spz_createProxyCallback, Spz_subscribe;

        SPZ_HANDLERS = {};
        SPZ_EVENTS_DESKTOP = {
            touchstart: "mousedown",
            touchmove: "mousemove",
            touchend: "mouseup",
            touch: "click",
            doubletap: "dblclick",
            orientationchange: "resize"
        };
        SPZ_ELEMENT_ID = 1;
        SPZ_EVENT_METHODS = {
            preventDefault: "isDefaultPrevented",
            stopImmediatePropagation: "isImmediatePropagationStopped",
            stopPropagation: "isPropagationStopped"
        };

        Spz.createEvent = function(type, touch)
        {
            var event, property;

            event = document.createEvent("Events");
            event.initEvent(type, true, true, null, null, null, null, null, null, null, null, null, null, null, null);

            if (touch)
            {
                for (property in touch)
                {
                    event[property] = touch[property];
                }
            }

            return event;
        };

        Spz_environmentEvent = function(event)
        {
            var environment_event;

            environment_event = (Spz.isMobile() ? event : SPZ_EVENTS_DESKTOP[event]);

            return environment_event || event;
        };

        Spz_getElementId = function(element)
        {
            return element.position || (element.position = SPZ_ELEMENT_ID++);
        };

        Spz_createProxy = function(event)
        {
            var proxy;

            proxy = Spz.extend({
                originalEvent: event
            }, event);

            Spz.each(SPZ_EVENT_METHODS, function(name, method)
            {
                proxy[name] = function()
                {
                    this[method] = function()
                    {
                        return true;
                    };

                    return event[name].apply(event, arguments);
                };

                return proxy[method] = function() {
                    return false;
                };
            });

            return proxy;
        };

        Spz_createProxyCallback = function(delegate, callback, element)
        {
            var proxy;

            callback = delegate || callback;

            proxy = function(event)
            {
                var result;

                result = callback.apply(element, [event].concat(event.data));

                if (result === false)
                {
                    event.preventDefault();
                }

                return result;
            };

            return proxy;
        };

        Spz_subscribe = function(element, event, callback, selector, delegate_callback)
        {
            var delegate, element_handlers, element_position, handler;

            event = Spz_environmentEvent(event);
            element_position = Spz_getElementId(element);
            element_handlers = SPZ_HANDLERS[element_position] || (SPZ_HANDLERS[element_position] = []);
            delegate = delegate_callback && delegate_callback(callback, event);
            handler = {
                event: event,
                callback: callback,
                selector: selector,
                proxy: Spz_createProxyCallback(delegate, callback, element),
                delegate: delegate,
                index: element_handlers.length
            };
            element_handlers.push(handler);

            return Spz.addEvent(element, handler.event, handler.proxy);
        };

        Spz.fn.trigger = function(event, touch, originalEvent)
        {
            if (Spz.toType(event) === "string")
            {
                event = Spz.createEvent(event, touch);
            }

            if (originalEvent !== null)
            {
                event.originalEvent = originalEvent;
            }

            return this.each(function() {
                this.dispatchEvent(event);
            });
        };

        Spz.fn.bind = function(event, callback)
        {
            return this.each(function() {
                Spz_subscribe(this, event, callback);
            });
        };

        Spz.fn.delegate = function(selector, event, callback)
        {
            return this.each(function(i, element) {

                Spz_subscribe(element, event, callback, selector, function(fn) {

                    return function(e) {

                        var evt, match;

                        match = Spz(e.target).closest(selector);
                        match = match.elements[0];

                        if (match)
                        {
                            evt = Spz.extend(Spz_createProxy(e), {
                                currentTarget: match,
                                liveFired: element,
                                selector: selector
                            });

                            return fn.apply(match, [evt].concat([].slice.call(arguments, 1)));
                        }
                    };
                });
            });
        };

        Spz.fn.observe = function(event, selector, callback)
        {
            if (selector === undefined || Spz.toType(selector) === "function")
            {
                return this.bind(event, selector);
            }
            else
            {
                return this.delegate(selector, event, callback);
            }
        };

    })(Speziicoz);
    
}).call(this);