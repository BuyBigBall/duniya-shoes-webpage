precessDesignShoes = {
    defaults: {
        rootBody: "../images/MainBody/",
        imgMiss: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QUNCNkQ4MTc1NkU2MTFFMkE1REVDQUVBRkI3NDM3ODEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QUNCNkQ4MTg1NkU2MTFFMkE1REVDQUVBRkI3NDM3ODEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpBQ0I2RDgxNTU2RTYxMUUyQTVERUNBRUFGQjc0Mzc4MSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpBQ0I2RDgxNjU2RTYxMUUyQTVERUNBRUFGQjc0Mzc4MSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PvJr9QQAAAAVSURBVHjaYvz//z8DOmCkgSBAgAEAkT4O92fZjVIAAAAASUVORK5CYII=",
        width: 440,
        height: 412,
        view: "Right",
        objDesign: [],
        ele: ""
    },
    callDesign: function (option, callback) {
        var self = this;
        console.log("pressDesignShoes callDesign = ", self);
        self.defaults = $.extend(self.defaults, option);
        var imgArr = self.condition(self.defaults.objDesign);
        self.canvasDrawImage(self.defaults.ele, imgArr, function (src) { /*if return data src ele == empy*/
            callback(src);
        });
    },
    condition: function (obj) {
        var self = this;
        console.log("pressDesignShoes condition = ", self);
        var rootBody = self.defaults.rootBody;
        var objView = self.defaults.view;
        var objFolderBack = null;
        var objFoldergetFront = null;
        var objFoldergetSide = null;
        var objFolderBorder = null;

        var objImgSide = null;
        var objImgBorder = null;
        var objImgFront = null;
        var objImgLaces = null;
        var objImgLining = null;
        var objImgBack = null;
        var objImgSole = null;
        var objImgAccessory = null;
        var imgError = null;
        var objPath = null;
        var objMain = null;

        var objSlide = null;
        var objBorder = 'none';
        var objlaces = null;
        var objlining = null;
        var objSole = null;
        var objMain = null;
        var objBack = null;
        var objFront = null;
        var objAccessory = 'none';

        objFolderBack = obj.getBack;
        objFoldergetFront = obj.getFront;
        objFoldergetSide = obj.getSide;
        objAccessory = obj.getAccessory;

        objImgSide = (obj.getSideNo !== '' && obj.getSideNo !== 'none') ? obj.getSideNo : obj.getLeatherNo;
        objImgBorder = (obj.getSideNo !== '' && obj.getSideNo !== 'none') ? obj.getSideNo : obj.getLeatherNo;
        objImgFront = (obj.getFrontNo !== '' && obj.getFrontNo !== 'none') ? obj.getFrontNo : obj.getLeatherNo;
        objImgLaces = (obj.getLacesNo !== '' && obj.getLacesNo !== 'none') ? obj.getLacesNo : 'none';
        objImgLining = (obj.getLiningNo !== '' && obj.getLiningNo !== 'none') ? obj.getLiningNo : 'none';
        //objImgBrogue = (obj.getBrogueNo=='none')?obj.getLeatherNo:obj.getBrogueNo;*/
        objImgBack = (obj.getBackNo !== '' && obj.getBackNo !== 'none') ? obj.getBackNo : obj.getLeatherNo;
        objImgAccessory = (obj.getAccessoryNo !== '' && obj.getAccessoryNo !== 'none') ? obj.getAccessoryNo : obj.getLeatherNo;
        imgError = self.defaults.imgMiss;

        /*CONDITION BORDER SOLE*/
        if (obj.getSole === "RBB-22") {
            objImgSole = "RBB-22";
        } else if (obj.getSole === "RBD") {
            objImgSole = "RBD";
        } else {
            objImgSole = "LE2";
        }

        /*################ CONDITION OPTION ################*/
        objPath = rootBody + obj.folderType + '/' + obj.getShape + '/MainMix/' + objView;
        objMain = rootBody + obj.folderType + '/' + obj.getShape + '/' + objView + '/' + obj.getLeatherNo + '.png';
        objBack = objPath + '/Back/' + objFolderBack + '/' + objImgBack + '.png';
        objFront = (objView !== 'Back') ? objPath + '/Front/' + objFoldergetFront + '/' + objImgFront + '.png' : '';
        objSlide = (objView === 'Back') ? objSlide = objPath + '/Side/' + objImgSide + '.png' : objPath + '/Side/' + objFoldergetSide + '/' + objImgSide + '.png';
        objlaces = objPath + '/Shoeslace/' + objImgLaces + '.png';
        objlining = objPath + '/Lining/' + objImgLining + '.png';
        objSole = objPath + '/Sole/' + objImgSole + '.png';

        /*################ OPTION MIX ################*/
        if (obj.shoeType === 'loafers') {
            var Status = obj.optionBorderSlim;// Y = Select , N = Defalut
            objFolderBorder = (objView !== 'Left') ? (Status === 'Y' ? 'Borderslim' : 'BorderRegular') : (Status === 'Y' ? 'BorderslimL' : 'BorderRegularL');
            objBorder = rootBody + 'Loafers/' + objFolderBorder + '/' + objImgBorder + '.png';
            objAccessory = objPath + '/Accessory/' + objAccessory + '/' + objImgAccessory + '.png';
        }

        /*condition fd*/
        objBack = objFolderBack !== 'none' ? objBack : imgError;
        objFront = objFoldergetFront !== 'none' || objFoldergetFront !== 'None' ? objFront : imgError;
        objSlide = objFoldergetSide !== 'none' || objFoldergetSide !== 'None' ? objSlide : imgError;

        /*condition laces*/
        if (obj.shoeType === 'loafers' || obj.shoeType === 'fashion' || obj.shoeType === 'monk') {
            objlaces = imgError;
        }

        if (obj.shoeType === 'boot')
            objBack = imgError;

        /*CONDTION INDEX ARRAY*/
        var arr = [];
        arr['Main'] = objMain;
        arr['Front'] = objFront;
        arr['Slide'] = objSlide;
        arr['Back'] = objBack;
        arr['Border'] = objBorder;
        arr['Accessory'] = objAccessory;
        arr['lining'] = objlining;
        arr['laces'] = objlaces;
        arr['Sole'] = objSole;

        /*CONDTION SWITCH INDEX ARRAY SHOE TYPE OXFORD [FRONT } SlIDE]*/
        if (obj.shoeType === 'oxford') {
            var front = arr['Front'];
            var Slide = arr['Slide'];

            arr['Front'] = Slide;
            arr['Slide'] = front;
        }
        return arr;
    },
    canvasDrawImage: function (ele, imgArr, callback) {

        var self = this;
        console.log("pressDesignShoes canvasDrawImage = ", self);

        var x = "design-";
        var _random = 'design-' + parseInt(Math.random(10000000) * 100000);

        $('.' + x).remove();
        $('<canvas>').attr({ 'id': _random, 'class': x, 'width': self.defaults.width, 'height': self.defaults.height }).css('display', 'none').appendTo('body');
        var canvas = document.getElementById(_random);
        var context = canvas.getContext('2d');
        self.cavasLoad(_random, imgArr, function (images) {
            for (var i in images) {
                context.drawImage(images[i], 0, 0, self.defaults.width, self.defaults.height);
            }
            var dataURL = canvas.toDataURL();
            if (ele) {
                var img = $('<img>').attr({ src: dataURL });
                ele.empty();
                $(img).appendTo(ele);
            } else {
                callback(dataURL);
            }
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


