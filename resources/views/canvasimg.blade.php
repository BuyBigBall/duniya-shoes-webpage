<script>
    $(document).ready(function() {
        var w = 0;
        var h = 0;
        var obj = null;

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


        var objView = 'Right';
        var w = 160;
        var h = 160;

        obj = {
            "productType": "shoe",
            "folderType": "OxfordShoes",
            "getShape": "Round",
            "shoeType": "oxford",
            "currentView": "Right",
            "getLeatherNo": "LT-001",
            "getLeather": "premium",
            "getLeatherGroup": "1",
            "getStyle": "front",
            "getFront": "FT1",
            "getSide": "SD1",
            "getBack": "BK1",
            "getSole": "LT-N007",
            "getAccessory": "none",
            "getSpeci": "mix-match",
            "getSideNo": "none",
            "getFrontNo": "none",
            "getLiningNo": "SH-SW08",
            "getStitchingNo": "none",
            "getLacesNo": "HT-Black",
            "getBrogueNo": "none",
            "getBackNo": "none",
            "getAccessoryNo": "none",
            "getSoleBorder": "LE2",
            "getMonoIn": "",
            "getMonoOut": "",
            "getSizeTypeName": "EU",
            "getSizeType": "EURO",
            "getSizeNo": "",
            "getUnit": "",
            "getLength": "0",
            "getWidth": "0",
            "getQty": "1",
            "getShoePrice": "179",
            "getMixPrice": "9.9",
            "getShoeDiscountItem": "0",
            "mixSolePriceStatus": "no",
            "getShoeShipping": "0",
            "setStatusMix": "false",
            "prevLeatherNo": "none",
            "response": "false",
            "shape": "shape-Round",
            "front": "none",
            "side": "SD1",
            "back": "BK1",
            "sole": "Sole-1L",
            "getShapeName": "Sharp",
            "shoeTypeName": "oxford",
            "getLeatherNoName": "none",
            "getLeatherName": "the premium",
            "getStyleName": "none",
            "getFrontName": "FRONT STYLE FT1",
            "getSideName": "SD1",
            "getBackName": "BK1",
            "getSoleName": "Leather",
            "getAccessoryName": "none",
            "getSideNoName": "none",
            "getFrontNoName": "none",
            "getLiningName": "Dark Brown",
            "getStitchingName": "none",
            "getLacesName": "HT-Black",
            "getBrogueName": "none",
            "getBackNoName": "none",
            "optionBorderSlim": "N",
            "setMenuLth": "premium",
            "code64": "",
            "img": ""
        };
        objFolderBack = obj.getBack;
        objFoldergetFront = obj.getFront;
        objFoldergetSide = obj.getSide;
        objAccessory = obj.getAccessory;

        objImgSide = (obj.getSideNo != '' && obj.getSideNo != 'none') ? obj.getSideNo : obj.getLeatherNo;
        objImgBorder = (obj.getSideNo != '' && obj.getSideNo != 'none') ? obj.getSideNo : obj.getLeatherNo;
        objImgFront = (obj.getFrontNo != '' && obj.getFrontNo != 'none') ? obj.getFrontNo : obj.getLeatherNo;
        objImgLaces = (obj.getLacesNo != '' && obj.getLacesNo != 'none') ? obj.getLacesNo : 'none';
        objImgLining = (obj.getLiningNo != '' && obj.getLiningNo != 'none') ? obj.getLiningNo : 'none';
        //objImgBrogue = (obj.getBrogueNo=='none')?obj.getLeatherNo:obj.getBrogueNo;*/
        objImgBack = (obj.getBackNo != '' && obj.getBackNo != 'none') ? obj.getBackNo : obj.getLeatherNo;
        objImgAccessory = (obj.getAccessoryNo != '' && obj.getAccessoryNo != 'none') ? obj.getAccessoryNo : obj.getLeatherNo;
        imgError = 'images/missing.png';

        /*CONDITION BORDER SOLE*/
        if (obj.getSole === "RBB-22") {
            objImgSole = "RBB-22";
        } else if (obj.getSole === "RBD") {
            objImgSole = "RBD";
        } else {
            objImgSole = "LE2";
        }

        /*################ condition Option ################*/
        objPath = '../images/MainBody/' + obj.folderType + '/' + obj.getShape + '/MainMix/' + objView;
        objMain = '../images/MainBody/' + obj.folderType + '/' + obj.getShape + '/' + objView + '/' + obj.getLeatherNo + '.png';
        objBack = objPath + '/Back/' + objFolderBack + '/' + objImgBack + '.png';
        objFront = (objView != 'Back') ? objPath + '/Front/' + objFoldergetFront + '/' + objImgFront + '.png' : '';
        objSlide = (objView == 'Back') ? objSlide = objPath + '/Side/' + objImgSide + '.png' : objPath + '/Side/' + objFoldergetSide + '/' + objImgSide + '.png';
        objlaces = objPath + '/Shoeslace/' + objImgLaces + '.png';
        objlining = objPath + '/Lining/' + objImgLining + '.png';
        objSole = objPath + '/Sole/' + objImgSole + '.png';

        /*################ option Mix ################*/
        if (obj.shoeType == 'loafers') {
            var Status = obj.optionBorderSlim; // Y = Select , N = Defalut
            objFolderBorder = (objView != 'Left') ? (Status == 'Y' ? 'Borderslim' : 'BorderRegular') : (Status == 'Y' ? 'BorderslimL' : 'BorderRegularL');
            objBorder = '../images/MainBody/Loafers/' + objFolderBorder + '/' + objImgBorder + '.png';
            objAccessory = objPath + '/Accessory/' + objAccessory + '/' + objImgAccessory + '.png'
        }
        /*condition fd*/
        objBack = objFolderBack != 'none' ? objBack : imgError;
        objFront = objFoldergetFront != 'none' || objFoldergetFront != 'None' ? objFront : imgError;
        objSlide = objFoldergetSide != 'none' || objFoldergetSide != 'None' ? objSlide : imgError;

        /*condition laces*/
        if (obj.shoeType == 'loafers' || obj.shoeType == 'fashion' || obj.shoeType == 'monk') {
            objlaces = imgError;
        }

        //check img error and null
        objMain = (objMain.indexOf('none')) > -1 || objMain == "" ? imgError : objMain;
        objBack = (objBack.indexOf('none')) > -1 || objBack == "" ? imgError : objBack;
        objFront = (objFront.indexOf('none')) > -1 || objFront == "" ? imgError : objFront;
        objSlide = (objSlide.indexOf('none')) > -1 || objSlide == "" ? imgError : objSlide;
        objBorder = (objBorder.indexOf('none')) > -1 || objBorder == "" ? imgError : objBorder;
        objlaces = (objlaces.indexOf('none')) > -1 || objlaces == "" ? imgError : objlaces;
        objlining = (objlining.indexOf('none')) > -1 || objlining == "" ? imgError : objlining;
        objSole = (objSole.indexOf('none')) > -1 || objSole == "" ? imgError : objSole;
        objAccessory = (objAccessory.indexOf('none')) > -1 || objAccessory == "" ? imgError : objAccessory;

        if (obj.shoeType === 'boot')
            objBack = imgError;

        var canvas = null;
        var context = null;
        var sources = null;
        canvas = document.getElementById('RecFT1');
        context = canvas.getContext('2d');

        /*Condittion Layout z-index*/
        if (obj.shoeType == 'oxford') {
            sources = {
                objMain: objMain,
                objSlide: objSlide,
                objFront: objFront,
                objBack: objBack,
                objBorder: objBorder,
                objAccessory: objAccessory,
                objlining: objlining,
                objlaces: objlaces,
                objSole: objSole
            };
            loadImages(sources, function(images) {
                context.drawImage(images.objMain, 0, 0, w, h);
                context.drawImage(images.objSlide, 0, 0, w, h);
                context.drawImage(images.objFront, 0, 0, w, h);
                context.drawImage(images.objBack, 0, 0, w, h);
                context.drawImage(images.objBorder, 0, 0, w, h);
                context.drawImage(images.objAccessory, 0, 0, w, h);
                context.drawImage(images.objlining, 0, 0, w, h);
                context.drawImage(images.objlaces, 0, 0, w, h);
                context.drawImage(images.objSole, 0, 0, w, h);
            });
        } else if (obj.shoeType === 'derby' || obj.shoeType === 'monk' || obj.shoeType === 'boot') {
            sources = {
                objMain: objMain,
                objFront: objFront,
                objSlide: objSlide,
                objBack: objBack,
                objBorder: objBorder,
                objAccessory: objAccessory,
                objlining: objlining,
                objlaces: objlaces,
                objSole: objSole
            };
            loadImages(sources, function(images) {
                context.drawImage(images.objMain, 0, 0, w, h);
                context.drawImage(images.objFront, 0, 0, w, h);
                context.drawImage(images.objSlide, 0, 0, w, h);
                context.drawImage(images.objBack, 0, 0, w, h);
                context.drawImage(images.objBorder, 0, 0, w, h);
                context.drawImage(images.objAccessory, 0, 0, w, h);
                context.drawImage(images.objlining, 0, 0, w, h);
                context.drawImage(images.objlaces, 0, 0, w, h);
                context.drawImage(images.objSole, 0, 0, w, h);
            });
        } else {
            sources = {
                objMain: objMain,
                objFront: objFront,
                objSlide: objSlide,
                objBack: objBack,
                objBorder: objBorder,
                objAccessory: objAccessory,
                objlining: objlining,
                objlaces: objlaces,
                objSole: objSole
            };
            loadImages(sources, function(images) {
                context.drawImage(images.objMain, 0, 0, w, h);
                context.drawImage(images.objFront, 0, 0, w, h);
                context.drawImage(images.objSlide, 0, 0, w, h);
                context.drawImage(images.objBack, 0, 0, w, h);
                context.drawImage(images.objBorder, 0, 0, w, h);
                context.drawImage(images.objAccessory, 0, 0, w, h);
                context.drawImage(images.objlining, 0, 0, w, h);
                context.drawImage(images.objlaces, 0, 0, w, h);
                context.drawImage(images.objSole, 0, 0, w, h);
            });
        }


        function loadImages(sources, callback) {
            var images = {};
            var loadedImages = 0;
            var numImages = 0;
            // get num of sources
            for (var src in sources) {
                numImages++;
            }
            for (var src in sources) {
                images[src] = new Image();
                images[src].onload = function() {
                    if (++loadedImages >= numImages) {
                        callback(images);
                        var dataURL = canvas.toDataURL();
                        shoeObject.img = dataURL;
                        $('input[name=imgobj]').val(dataURL); // add URLdata to index imgobj tag input
                    }
                };
                images[src].src = sources[src];
            }
        }
    });
</script>
<canvas id="RecFT1" title="FRONT STYLE FT1" width="165" height="165"></canvas>