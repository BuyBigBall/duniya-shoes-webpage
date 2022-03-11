/*
 * ----------------------------------------------------------------------------
 * SPEZIICOZ : MICRO JAVASCRIPT LIBRARY VERSION : 1.0.0
 * ----------------------------------------------------------------------------
 * An open source application development javascript framework
 *
 * @require     Sizzle.js   A javaScript CSS selector engine
 *
 * @package     Speziicoz
 * @handling    base
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

    var initialize, core_version;

    core_version = "1.0.0";

    initialize = (function() {

        var Spz, speziicoz, Spz_detectBrowser, Spz_detectOS, Spz_detectEnvironment,
                SPZ_CURRENT, SPZ_SUPPORTED_OS, SPZ_SUPPORTED_BROWSER,
                SPZ_SUPPORTED_VERSION, SPZ_IS_WEBKIT;

        SPZ_CURRENT = null;
        SPZ_SUPPORTED_OS = {
            Android: /(Android)\s+([\d.]+)/,
            iPad: /(iPad).*OS\s([\d_]+)/,
            iPhone: /(iPhone\sOS)\s([\d_]+)/,
            Blackberry: /(BlackBerry|BB10|Playbook).*Version\/([\d.]+)/,
            FirefoxOS: /(Mozilla).*Mobile[^\/]*\/([\d\.]*)/,
            webOS: /(webOS|hpwOS)[\s\/]([\d.]+)/
        };
        SPZ_SUPPORTED_BROWSER = /(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i;
        SPZ_SUPPORTED_VERSION = /version\/([\.\d]+)/i;
        SPZ_IS_WEBKIT = /WebKit\/([\d.]+)/;

        Spz = function(selector)
        {
            return new speziicoz(selector);
        };

        speziicoz = function(selector)
        {
            this.versions = core_version;

            if (!selector)
            {
                this.elements = [];
                this.selector = "";
            }
            else
            {
                this.elements = Sizzle(selector);
                this.selector = selector;

                if (Spz.isEmpty(this.elements))
                {
                    var elementTypes;

                    elementTypes = [1, 9, 11];

                    if (elementTypes.indexOf(selector.nodeType) >= 0 || selector === window)
                    {
                        this.elements = [selector];
                    }
                    else if (Spz.toType(selector) === "array")
                    {
                        this.elements = selector;
                        delete this.selector;
                    }
                }
            }

            return this;
        };

        Spz_detectBrowser = function()
        {
            var app_name, user_agent, supported_version, supported_browser, is_webkit;

            app_name = navigator.appName;
            user_agent = navigator.userAgent;
            supported_browser = user_agent.match(SPZ_SUPPORTED_BROWSER);
            supported_version = user_agent.match(SPZ_SUPPORTED_VERSION);
            is_webkit = user_agent.match(SPZ_IS_WEBKIT);

            if (supported_browser && supported_version !== null)
            {
                supported_browser[2] = supported_version[1];
            }

            return {
                vendor: is_webkit ? is_webkit[0] : user_agent,
                name: supported_browser ? supported_browser[1] : app_name,
                version: supported_browser ? supported_browser[2] : navigator.appVersion
            };
        };

        Spz_detectOS = function(user_agent)
        {
            var detected_os, name, supported;

            detected_os = null;

            for (name in SPZ_SUPPORTED_OS)
            {
                supported = user_agent.match(SPZ_SUPPORTED_OS[name]);

                if (supported)
                {
                    detected_os = {
                        name: (name === "iPhone" || name === "iPad" ? "iOS" : name),
                        version: supported[2].replace("_", ".")
                    };
                    break;
                }
            }

            return detected_os;
        };

        Spz_detectEnvironment = function()
        {
            var environment, user_agent, browser_env;

            environment = {};
            user_agent = navigator.userAgent;
            browser_env = Spz_detectBrowser();
            environment.browser = {
                vendor: browser_env.vendor,
                name: browser_env.name,
                version: browser_env.version
            };
            environment.os = Spz_detectOS(user_agent);
            environment.isMobile = !!environment.os;

            environment.screen = {
                width: window.innerWidth,
                height: window.innerHeight
            };

            return environment;
        };

        speziicoz.prototype = Spz.fn = {};

        Spz.toType = function(obj)
        {
            return Object.prototype.toString.call(obj).match(/\s([a-z|A-Z]+)/)[1].toLowerCase();
        };

        Spz.trim = function(text)
        {
            return text.replace(/^\s\s*/, "").replace(/\s\s*$/, "");
        };

        Spz.extend = function(target)
        {
            Array.prototype.slice.call(arguments, 1).forEach(function(data) {

                var key, result;

                result = [];

                for (key in data)
                {
                    // event.returnValue is deprecated
                    // disable warning message
                    if (key !== "returnValue" && key !== "keyLocation")
                    {
                        result.push(target[key] = data[key]);
                    }
                }

                return result;
            });

            return target || {};
        };

        Spz.isEmpty = function(obj)
        {
            if (Spz.toType(obj) === "string")
            {
                return (obj.trim() === "");
            }
            else if (Spz.toType(obj) === "object")
            {
                for (var key in obj)
                {
                    if (Object.prototype.hasOwnProperty.call(obj, key))
                    {
                        return false;
                    }
                }
            }
            else if (Spz.toType(obj) === "array")
            {
                return (obj.length === 0);
            }

            return true;
        };

        Spz.addEvent = function(element, event, callback)
        {
            if (element.addEventListener)
            {
                return element.addEventListener(event, callback, false);
            }
            else if (element.attachEvent)
            {
                return element.attachEvent("on" + event, callback);
            }
            else
            {
                return element["on" + event] = callback;
            }
        };

        Spz.ready = function(callback)
        {
            return Spz.addEvent(document, "DOMContentLoaded", function() {
                return callback(Spz);
            });
        };

        Spz.load = function(callback)
        {
            return Spz.addEvent(window, "load", function() {
                return callback(Spz);
            });
        };

        Spz.each = function(element, callback)
        {
            var i, key;

            key = void 0;

            if (Spz.toType(element) === "array")
            {
                i = 0;

                while (i < element.length)
                {
                    if (callback.call(element[i], i, element[i]) === false)
                    {
                        return element;
                    }
                    i++;
                }
            }
            else
            {
                for (key in element)
                {
                    if (callback.call(element[key], key, element[key]) === false)
                    {
                        return element;
                    }
                }
            }

            return element;
        };

        Spz.merge = function(first, second)
        {
            var firstLength, secondLength, i;

            firstLength = first.length;
            secondLength = second.length;
            i = 0;

            if (typeof secondLength === "number")
            {
                for (; i < secondLength; i++)
                {
                    first[firstLength++] = second[i];
                }
            }
            else
            {
                while (second[i] !== undefined)
                {
                    first[firstLength++] = second[i++];
                }
            }

            first.length = firstLength;

            return first;
        };

        Spz.isMobile = function()
        {
            SPZ_CURRENT = SPZ_CURRENT || Spz_detectEnvironment();
            return SPZ_CURRENT.isMobile && SPZ_CURRENT.os.name !== "firefoxOS";
        };

        Spz.environment = function()
        {
            SPZ_CURRENT = SPZ_CURRENT || Spz_detectEnvironment();
            return SPZ_CURRENT;
        };

        Spz.map = function(elem, callback)
        {
            var i, value, values;

            values = [];

            if (Spz.toType(elem.elements) === "array")
            {
                i = 0;

                while (i < elem.elements.length)
                {
                    value = callback(elem.elements[i], i);

                    if (value !== null)
                    {
                        values.push(value);
                    }
                    i++;
                }
            }

            if (values.length > 0)
            {
                return [].concat.apply([], values);
            }
            else
            {
                return values;
            }
        };

        Spz.query = function(domain, selector)
        {
            var elements;

            selector = Spz.trim(selector);

            if (/^\.([\w-]+)$/.test(selector))
            {
                elements = domain.getElementsByClassName(selector.replace(".", ""));
            }
            else if (/^[\w-]+$/.test(selector))
            {
                elements = domain.getElementsByTagName(selector);
            }
            else if (/^#[\w\d-]+$/.test(selector) && domain === document)
            {
                elements = domain.getElementById(selector.replace("#", ""));

                if (!elements)
                {
                    elements = [];
                }
            }
            else
            {
                elements = domain.querySelectorAll(selector);
            }

            if (elements.nodeType)
            {
                return [elements];
            }
            else
            {
                return Array.prototype.slice.call(elements);
            }
        };

        Spz.filtered = function(nodes, selector)
        {
            if (selector === undefined)
            {
                return Spz(nodes);
            }
            else
            {
                return Spz(nodes).filter(selector);
            }
        };

        Spz.doesFileExist = function(url)
        {
            var xhr;

            xhr = new XMLHttpRequest();
            xhr.open('HEAD', url, false);
            xhr.send();

            if (xhr.status === 404)
            {
                return false;
            }
            else
            {
                return true;
            }
        };

        Spz.getURLParameter = function(name)
        {
            return decodeURI((RegExp(name + "=" + "(.+?)(&|$)").exec(location.search) || [, null])[1]);
        };
        
        Spz.isOwnProperty = function(object, property)
        {
            return Object.prototype.hasOwnProperty.call(object, property);
        };

        Spz.mix = function()
        {
            var arg, argument, child, len, prop;

            child = {};
            arg = 0;
            len = arguments.length;

            while (arg < len)
            {
                argument = arguments[arg];
                
                for (prop in argument)
                {
                    if (Spz.isOwnProperty(argument, prop) && argument[prop] !== undefined)
                    {
                        child[prop] = argument[prop];
                    }
                }
                arg++;
            }
            
            return child;
        };

        Spz.fn.constructor = function()
        {
            return Spz();
        };

        Spz.fn.each = function(callback)
        {
            this.elements.forEach(function(element, index) {
                return callback.call(element, index, element);
            });

            return this.elements;
        };

        Spz.fn.pushStack = function(element, inherit)
        {
            var result, stack;

            stack = this.constructor();

            if (inherit)
            {
                stack.elements = this.elements;
            }

            if (Spz.toType(element) !== "array")
            {
                element = [element];
            }

            result = Spz.merge(stack.elements, element);
            stack.elements = result;
            delete stack.selector;

            return stack;
        };

        Spz.fn.closest = function(selector, context)
        {
            var current, node, candidates, i, result;

            if (typeof selector === "object")
            {
                if (!Spz.isEmpty(selector.id))
                {
                    selector = selector.id;
                }
                else if (selector.classList.length > 0)
                {
                    selector = ".".concat(selector.classList[0]);
                }
                else
                {
                    selector = selector.tagName;
                }
            }

            node = Spz(selector);
            candidates = this;

            result = [];
            i = 0;

            if (!candidates.elements.length)
            {
                node = null;
            }

            for (; i < candidates.elements.length; i++)
            {
                current = candidates.elements[i];

                for (current; current && current !== context; current = current.parentNode)
                {
                    if (current.nodeType < 11 && (current.nodeType === 1 && Sizzle.matchesSelector(current, selector)))
                    {
                        current = result.push(current);
                        break;
                    }
                }
            }

            if (result.length > 0)
            {
                result = Sizzle.uniqueSort(result);
            }

            return this.pushStack(result);
        };

        Spz.fn.filter = function(selector)
        {
            return Spz([].filter.call(this.elements, function(element) {
                return element.parentNode && Spz.query(element.parentNode, selector).indexOf(element) >= 0;
            }));
        };

        Spz.fn.map = function(fn)
        {
            return Spz.map(this, function(el, i) {
                return fn.call(el, i, el);
            });
        };

        Spz.fn.remove = function()
        {
            return this.each(function() {
                if (this.parentNode !== null)
                {
                    return this.parentNode.removeChild(this);
                }
            });
        };

        return Spz;
    })();

    window.Speziicoz = initialize;
    "Spz" in window || (window.Spz = initialize);

}).call(this);