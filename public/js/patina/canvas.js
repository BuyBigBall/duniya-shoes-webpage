/* ----------------------------------------------------------------------------
 * CANVAS GENERATE IMAGE
 * ----------------------------------------------------------------------------
 * @param   images  array
 * @param   width   integer 
 * @param   height  integer 
 */
var canvas = {
    
    call: function(images, width, height, callback, upload, compensate) 
    {
        var canvas, id, context, url;
        
        id = "design-" + parseInt(Math.random(10000000) * 10000000);
        
        canvas = document.createElement('canvas');
        canvas.setAttribute("id", id);
        canvas.setAttribute("class", "design-canvas");
        canvas.setAttribute("width", width);
        canvas.setAttribute("height", height);
        document.getElementsByTagName('body')[0].appendChild(canvas);
        
        context = canvas.getContext("2d");
        
        this.load(images, function(items) {
            
            for (var i in items) 
            {
                context.drawImage(items[i], 0, 0, width, height);
            }
            
            url = canvas.toDataURL();
            
            if (upload === undefined || upload === true) {
                $.ajax({
                    type: "POST",
                    url: "upload.php",
                    data: {image: url, name:id},
                    contentType: "application/x-www-form-urlencoded;charset=UTF-8",
                    success: function(response) {
                        document.getElementById(id).remove();
                        callback({
                            "response": response,
                            "id": id
                        });
                    }
                });
            }
            else
            {
                callback({
                    "url": url,
                    "element": canvas
                });
            }
        }, compensate);
    },
    
    load: function(images, callback, compensate) 
    {
        var items, loaded, len;

        items = {};
        loaded = 0;
        len = images.length;
        
        for (var i in images)
        {
            items[i] = new Image();
            items[i].onload = function() 
            {
                if (++loaded >= len)
                {
                    callback(items);
                }
            };
            items[i].src = images[i];
            items[i].onerror = function() 
            {
                compensate = compensate || "public/images/misc/empty.png";
                this.setAttribute("src", compensate);
            };
        }
    }
};