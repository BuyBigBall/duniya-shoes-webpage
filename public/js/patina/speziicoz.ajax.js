(function() {

    (function(Spz) {

        var SPZ_DEFAULT, SPZ_MIME_TYPES, SPZ_JSONP_ID, Spz_isJsonP,
                Spz_parseResponse, Spz_xhrError, Spz_xhrForm, Spz_xhrHeaders,
                Spz_xhrStatus, Spz_xhrSuccess, Spz_xhrTimeout;

        SPZ_DEFAULT = {
            TYPE: "GET",
            MIME: "json"
        };
        SPZ_MIME_TYPES = {
            script: "text/javascript, application/javascript",
            json: "application/json",
            xml: "application/xml, text/xml",
            html: "text/html",
            text: "text/plain"
        };
        SPZ_JSONP_ID = 0;

        Spz.ajaxSettings = {
            type: SPZ_DEFAULT.TYPE,
            async: true,
            success: {},
            error: {},
            context: null,
            dataType: SPZ_DEFAULT.MIME,
            headers: {},
            xhr: function() {
                return new window.XMLHttpRequest();
            },
            crossDomain: false,
            timeout: 0
        };

        Spz.serializeParameters = function(parameters, character)
        {
            var parameter, serialize;

            if (character === null)
            {
                character = "";
            }

            serialize = character;

            for (parameter in parameters)
            {
                if (parameters.hasOwnProperty(parameter))
                {
                    if (serialize !== character)
                    {
                        serialize += "&";
                    }
                    serialize += "" + (encodeURIComponent(parameter)) + "=" + (encodeURIComponent(parameters[parameter]));
                }
            }

            if (serialize === character)
            {
                return "";
            }
            else
            {
                return serialize;
            }
        };

        Spz_isJsonP = function(url)
        {
            return RegExp("=\\?").test(url);
        };

        Spz_parseResponse = function(xhr, settings)
        {
            var error, response;

            response = xhr.responseText;

            if (response)
            {
                if (settings.dataType === SPZ_DEFAULT.MIME)
                {
                    try
                    {
                        response = JSON.parse(response);
                    }
                    catch (e)
                    {
                        error = e;
                        response = error;
                        Spz_xhrError("Spz.ajax: Parse Error", xhr, settings);
                    }
                }
                else
                {
                    if (settings.dataType === "xml")
                    {
                        response = xhr.responseXML;
                    }
                }
            }

            return response;
        };

        Spz_xhrStatus = function(xhr, settings)
        {
            if ((xhr.status >= 200 && xhr.status < 300) || xhr.status === 0)
            {
                if (settings.async)
                {
                    Spz_xhrSuccess(Spz_parseResponse(xhr, settings), xhr, settings);
                }
            }
            else
            {
                Spz_xhrError("Spz.ajax: Unsuccesful request", xhr, settings);
            }
        };

        Spz_xhrHeaders = function(xhr, settings)
        {
            var header;

            if (settings.contentType)
            {
                settings.headers["Content-Type"] = settings.contentType;
            }

            if (settings.dataType)
            {
                settings.headers["Accept"] = SPZ_MIME_TYPES[settings.dataType];
            }

            for (header in settings.headers)
            {
                xhr.setRequestHeader(header, settings.headers[header]);
            }
        };

        Spz.ajax = function(options)
        {
            var abortTimeout, error, settings, xhr;

            settings = Spz.mix(Spz.ajaxSettings, options);
            
            if (settings.type === SPZ_DEFAULT.TYPE)
            {
                settings.url += Spz.serializeParameters(settings.data, "?");
            }
            else
            {
                settings.data = Spz.serializeParameters(settings.data);
            }
            
            // FIXED UNDEFINED
            if (settings.data && !Spz.isEmpty(settings.data)) {
                if (Spz.toType(settings.data) === "string")
                {
                    settings.data = settings.data.replace("undefined", "");
                }
            }
            
            if (Spz_isJsonP(settings.url))
            {
                return Spz.jsonp(settings);
            }

            xhr = settings.xhr();

            xhr.onreadystatechange = function()
            {
                if (xhr.readyState === 4)
                {
                    clearTimeout(abortTimeout);
                    return Spz_xhrStatus(xhr, settings);
                }
            };

            xhr.open(settings.type, settings.url, settings.async);
            Spz_xhrHeaders(xhr, settings);

            if (settings.timeout > 0)
            {
                abortTimeout = setTimeout((function() {
                    return Spz_xhrTimeout(xhr, settings);
                }), settings.timeout);
            }

            try
            {
                xhr.send(settings.data);
            }
            catch (e)
            {
                error = e;
                xhr = error;
                Spz_xhrError("Resource not found", xhr, settings);
            }

            if (settings.async)
            {
                return xhr;
            }
            else
            {
                return Spz_parseResponse(xhr, settings);
            }
        };

        Spz_xhrSuccess = function(response, xhr, settings)
        {
            settings.success.call(settings.context, response, xhr);
        };

        Spz_xhrError = function(type, xhr, settings)
        {
            settings.error.call(settings.context, type, xhr, settings);
        };

        Spz_xhrTimeout = function(xhr, settings)
        {
            xhr.onreadystatechange = {};
            xhr.abort();
            Spz_xhrError("Spz.ajax: Timeout exceeded", xhr, settings);
        };

        Spz.jsonp = function(settings)
        {
            var abortTimeout, callbackName, script, xhr;

            if (settings.async)
            {
                callbackName = "jsonp" + (++SPZ_JSONP_ID);
                script = document.createElement("script");

                xhr = {
                    abort: function()
                    {
                        Spz(script).remove();

                        if (callbackName in window)
                        {
                            return window[callbackName] = {};
                        }
                    }
                };

                abortTimeout = void 0;

                window[callbackName] = function(response)
                {
                    clearTimeout(abortTimeout);
                    Spz(script).remove();
                    delete window[callbackName];
                    return Spz_xhrSuccess(response, xhr, settings);
                };

                script.src = settings.url.replace(RegExp("=\\?"), "=" + callbackName);
                Spz("head").append(script);

                if (settings.timeout > 0)
                {
                    abortTimeout = setTimeout((function() {
                        return Spz_xhrTimeout(xhr, settings);
                    }), settings.timeout);
                }

                return xhr;
            }
            else
            {
                return console.error("Spz.ajax: Unable to make jsonp synchronous call.");
            }
        };

        Spz.get = function(url, data, success, dataType)
        {
            return Spz.ajax({
                url: url,
                data: data,
                success: success,
                dataType: dataType
            });
        };

        Spz_xhrForm = function(method, url, data, success, dataType)
        {
            return Spz.ajax({
                type: method,
                url: url,
                data: data,
                success: success,
                dataType: dataType,
                contentType: "application/x-www-form-urlencoded"
            });
        };

        Spz.post = function(url, data, success, dataType)
        {
            return Spz_xhrForm("POST", url, data, success, dataType);
        };

        Spz.put = function(url, data, success, dataType)
        {
            return Spz_xhrForm("PUT", url, data, success, dataType);
        };

        Spz["delete"] = function(url, data, success, dataType)
        {
            return Spz_xhrForm("DELETE", url, data, success, dataType);
        };

        Spz.json = function(url, data, success)
        {
            return Spz.ajax({
                url: url,
                data: data,
                success: success,
                dataType: SPZ_DEFAULT.MIME
            });
        };

    })(Speziicoz);

}).call(this);