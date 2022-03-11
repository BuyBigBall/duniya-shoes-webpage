/* 
 * FILE CRATE IMAGE SHOE FROM [DESIGNER SHOES]
 * body 0
 * main 710
 * side 720
 * front 730
 * back 735
 * sole 740
 * laces 740
 */

precessDesignnerShoe = {
    defaults: {
        root: "../images/models/iShoes/designershoes/",
        imgMiss: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QUNCNkQ4MTc1NkU2MTFFMkE1REVDQUVBRkI3NDM3ODEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QUNCNkQ4MTg1NkU2MTFFMkE1REVDQUVBRkI3NDM3ODEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpBQ0I2RDgxNTU2RTYxMUUyQTVERUNBRUFGQjc0Mzc4MSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpBQ0I2RDgxNjU2RTYxMUUyQTVERUNBRUFGQjc0Mzc4MSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PvJr9QQAAAAVSURBVHjaYvz//z8DOmCkgSBAgAEAkT4O92fZjVIAAAAASUVORK5CYII=",
        width: 680,
        height: 370
    },
    callDesign: function (ele, objArr, option) {
        var self = this;
        if (option) {
            $.extend(this.defaults, option);
        }
        var imgArr = self.condition(objArr);
        self.canvasDrawImage(ele, imgArr, precessDesignnerShoe.defaults.width, precessDesignnerShoe.defaults.height);
    },
    condition: function (objArr) {
        var arr = [];
        var modelno = objArr['MODELNO'];
        var sole = objArr['getSole'];
        var front = objArr['getFrontNo'];
        var side = objArr['getSideNo'];
        var back = objArr['getBackNo'];
        var laces = objArr['getLacesNo'];
        var leather = objArr['getLeatherNo'];
        var Accessory = objArr['getAccessoryNo'];
        var r = this.defaults.root;
        arr['body'] = r + modelno + "/view1/Body.png";
        arr['main'] = r + modelno + "/view1/main/" + leather + ".png";
        arr['sole'] = r + modelno + "/view1/sole/" + sole + ".png";
        arr['BlakeStitch'] = r + modelno + "/view1/BlakeStitch/Brown.png";
        arr['getFrontNo'] = r + modelno + "/view1/front/" + front + ".png";
        arr['getSideNo'] = r + modelno + "/view1/side/" + side + ".png";
        arr['getBackNo'] = r + modelno + "/view1/back/" + back + ".png";
        arr['getLacesNo'] = r + modelno + "/view1/laces/" + laces + ".png";
        arr['getAccessoryNo'] = r + modelno + "/view1/Accessory/" + Accessory + ".png";

        /*CONDITION DESIGN*/
        if (objArr['getStitchingNo'] === "none")
            delete(arr['BlakeStitch']);
        if (objArr['getFrontNo'] === "none")
            delete(arr['getFrontNo']);
        if (objArr['getSideNo'] === "none")
            delete(arr['getSideNo']);
        if (objArr['getBackNo'] === "none")
            delete(arr['getBackNo']);
        if (objArr['getLacesNo'] === "none")
            delete(arr['getLacesNo']);
        if (objArr['getAccessoryNo'] === "none")
            delete(arr['getAccessoryNo']);
        return arr;
    },
    canvasDrawImage: function (ele, imgArr, width, height) {
        var self = this;
        var x = "design-";
        var _random = 'design-' + parseInt(Math.random(10000000) * 100000);

        $('.' + x).remove();
        $('<canvas>').attr({'id': _random, 'class': x, 'width': width, 'height': height}).css('display', 'none').appendTo('body');
        var canvas = document.getElementById(_random);
        var context = canvas.getContext('2d');
        self.cavasLoad(_random, imgArr, function (images) {
            for (var i in images) {
                context.drawImage(images[i], 0, 0, width, height);
            }
            var dataURL = canvas.toDataURL();
            var img = $('<img>').attr({src: dataURL});
            ele.empty();
            $(img).appendTo(ele);
        });
    },
    cavasLoad: function (id, sources, callback) {
        var self = this;
        var canvas = document.getElementById(id);
        var context = canvas.getContext('2d');
        var images = {};
        var loadedImages = 0;
        var numImages = 0;
        for (var src in sources) {
            numImages++;
        }
        for (var src in sources) {
            images[src] = new Image();
            images[src].onload = function () {
                if (++loadedImages >= numImages) {
                    callback(images);
                }
            };
            images[src].src = sources[src];
            $(images[src]).error(function () {
                $(this).attr('src', self.defaults.imgMiss);
            });
        }
    }
};


