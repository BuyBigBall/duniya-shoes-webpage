/*
 * ----------------------------------------------------------------------------
 * SPEZIICOZ : MICRO JAVASCRIPT LIBRARY VERSION : 1.0.0
 * ----------------------------------------------------------------------------
 * An open source application development javascript framework
 *
 * @require     Sizzle.js   A javaScript CSS selector engine
 *
 * @package     Speziicoz
 * @handling    query method
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

        Spz.fn.cast = function(index, inherit)
        {
            var element;

            if (Spz.toType(index) === "number")
            {
                if (this.elements[index])
                {
                    element = this.elements[index];
                }
            }
            else if (Spz.toType(index) === "string")
            {
                if (Spz.trim(index) === "first")
                {
                    element = this.elements[0];
                }
                else if (Spz.trim(index) === "last")
                {
                    element = this.elements[this.elements.length - 1];
                }
            }

            if (element)
            {
                if (inherit === true)
                {
                    return Spz(element);
                }

                return element;
            }
            else
            {
                return null;
            }
        };

        Spz.fn.size = function()
        {
            return this.elements.length;
        };

        Spz.fn.addClass = function(name)
        {
            var classes, value, elLength, i, j, element, current, proceed;

            proceed = typeof name === "string" && name;
            elLength = this.elements.length;
            i = 0;

            if (Spz.toType(name) === "function")
            {
                return this.each(function(n) {
                    Spz(this).addClass(name.call(this, n, this.className));
                });
            }

            if (proceed)
            {
                classes = (name || "").match(/\S+/g) || [];

                for (; i < elLength; i++)
                {
                    element = this.elements[i];

                    if (element.nodeType === 1)
                    {
                        if (element.className) {
                            current = (" " + element.className + " ").replace(/[\t\r\n\f]/g, " ");
                        }
                        else
                        {
                            current = " ";
                        }
                    }

                    if (current)
                    {
                        j = 0;
                        value = classes[j];

                        while (value)
                        {
                            if (current.indexOf(" " + value + " ") < 0)
                            {
                                current += value + " ";
                            }

                            value = classes[++j];
                        }

                        element.className = Spz.trim(current);
                    }
                }
            }

            return this;
        };

        Spz.fn.removeClass = function(name)
        {
            var classes, value, elLength, i, j, element, current, proceed;

            proceed = arguments.length === 0 || typeof name === "string" && name;
            elLength = this.elements.length;
            i = 0;

            if (Spz.toType(name) === "function")
            {
                return this.each(function(n) {
                    Spz(this).removeClass(name.call(this, n, this.className));
                });
            }

            if (proceed)
            {
                classes = (name || "").match(/\S+/g) || [];

                for (; i < elLength; i++)
                {
                    element = this.elements[i];

                    if (element.nodeType === 1)
                    {
                        if (element.className)
                        {
                            current = (" " + element.className + " ").replace(/[\t\r\n\f]/g, " ");
                        }
                        else
                        {
                            current = " ";
                        }
                    }

                    if (current)
                    {
                        j = 0;
                        value = classes[j];

                        while (value)
                        {
                            while (current.indexOf(" " + value + " ") >= 0)
                            {
                                current = current.replace(" " + value + " ", " ");
                            }

                            value = classes[++j];
                        }

                        element.className = name ? Spz.trim(current) : "";
                    }
                }
            }

            return this;
        };

        Spz.fn.hasClass = function(selector)
        {
            var value, i, elLength, element, class_list, proceed;

            value = " " + selector + " ";
            i = 0;
            elLength = this.elements.length;


            for (; i < elLength; i++)
            {
                element = this.elements[i];
                class_list = " " + element.className + " ";
                proceed = class_list.replace(/[\t\r\n\f]/g, " ").indexOf(value) >= 0;

                if (element.nodeType === 1 && proceed)
                {
                    return true;
                }
            }

            return false;
        };

        Spz.fn.toggleClass = function(name, state)
        {
            var proceed, contain, i, classes, value, self;

            proceed = typeof name === "string" && name;
            contain = typeof state === "boolean";

            if (contain && proceed)
            {
                return state ? this.addClass(name) : this.removeClass(name);
            }

            if (Spz.toType(name) === "function")
            {
                return this.each(function(n) {
                    Spz(this).toggleClass(name.call(this, n, this.className, state), state);
                });
            }

            return this.each(function() {

                if (proceed)
                {
                    classes = name.match(/\S+/g) || [];
                    self = Spz(this);
                    i = 0;
                    value = classes[i];

                    while (value)
                    {
                        if (self.hasClass(value))
                        {
                            self.removeClass(value);
                        }
                        else
                        {
                            self.addClass(value);
                        }

                        value = classes[++i];
                    }
                }
            });
        };

        Spz.fn.children = function(selector)
        {
            var children_elements;

            children_elements = this.map(function() {
                return Array.prototype.slice.call(this.children);
            });

            return Spz.filtered(children_elements, selector);
        };

        Spz.fn.append = function(value)
        {
            var type, element;

            type = Spz.toType(value);

            return this.each(function() {

                element = this;

                if (type === "string")
                {
                    return element.insertAdjacentHTML("beforeend", value);
                }
                else if (type === "array")
                {
                    return value.each(function(index, value) {
                        return element.appendChild(value);
                    });
                }
                else
                {
                    return element.appendChild(value);
                }
            });
        };

        Spz.fn.prepend = function(value)
        {
            var type, element;

            type = Spz.toType(value);

            return this.each(function() {

                element = this;

                if (type === "string")
                {
                    return element.insertAdjacentHTML("afterbegin", value);
                }
                else if (type === "array")
                {
                    return value.each(function(index, value) {
                        return element.insertBefore(value, element.firstChild);
                    });
                }
                else
                {
                    return element.insertBefore(value, element.firstChild);
                }
            });
        };

        Spz.fn.attr = function(name, value)
        {
            if (this.elements.length === 0)
            {
                null;
            }

            if (Spz.toType(name) === "string" && value === void 0)
            {
                return this.elements[0].getAttribute(name);
            }
            else
            {
                return this.each(function(i) {
                    return this.setAttribute(name, value);
                });
            }

            return null;
        };

        Spz.fn.index = function(element)
        {
            var hasParent, nodeList;

            hasParent = this.elements[0] && this.elements[0].parentNode;

            if (hasParent)
            {
                nodeList = Array.prototype.slice.call(this.elements[0].parentNode.children);

                if (!element)
                {
                    return nodeList.indexOf(this.elements[0]);
                }

                if (typeof element === "string")
                {
                    return nodeList.indexOf(Spz(element).cast(0));
                }
            }

            return -1;
        };

        Spz.fn.eq = function(index)
        {
            var len, i;

            len = this.elements.length;
            i = index + (index < 0 ? len : 0);

            return this.pushStack(i >= 0 && i < len ? [this.elements[i]] : []);
        };

        Spz.fn.first = function()
        {
            return this.eq(0);
        };

        Spz.fn.last = function()
        {
            return this.eq(-1);
        };

        Spz.fn.empty = function()
        {
            return this.each(function() {
                return this.innerHTML = "";
            });
        };

        Spz.fn.text = function(value)
        {
            if (Spz.toType(value) === "string")
            {
                return this.each(function() {
                    return this.innerHTML = value;
                });
            }

            return null;
        };

        Spz.fn.val = function(value)
        {
            if (Spz.toType(value) === "string")
            {
                return this.each(function() {
                    return this.value = value;
                });
            }
            else
            {
                if (this.elements.length > 0)
                {
                    return this.elements[0].value;
                }
                else
                {
                    return null;
                }
            }
        };
        
        Spz.fn.alive = function()
        {
            return !!this.elements[0];
        };

    })(Speziicoz);

}).call(this);