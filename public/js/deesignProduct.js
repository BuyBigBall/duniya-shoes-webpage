/* global precessDesignnerShoe, source, precessDesignShoes */

var deesignProduct = {
    defaults: {
        source: "",
        main: "",
        itemArr: {},
        mainStr: ".imgs",
        // root: {
        //     belt: '../../images/models/ibelts/Mainbody/'
        // }
    },
    config: function (option) {
        if (option) {
            $.extend(this.defaults, option);

            /*condition source and itemArr one product or all product loop*/
            var source = this.defaults.source;
            var main = this.defaults.main;
            var mainStr = this.defaults.mainStr;
            var self = this;
            if (source) {
                self.condition(source, $(main));
            } else {
                $.each(this.defaults.itemArr, function (index) {
                    self.condition(this, $(mainStr + index));
                });
            }
        }
    },
    condition: function (data, main) {
        var designType = data["DESIGN_TYPE"] || data["designType"];
        var product = data.productType;
        var base64 = data.base64;
        // var root = this.defaults.root;
        switch (product.toLowerCase()) {
            case "shoecream":
            //same with shoetrees
            case "shoetrees":
                precessDesignnerShoe.callDesign(main, data, { width: 400, height: 400 });
                break;
            case "shoe":
                switch (designType) {
                    case "custom":
                        console.log("deesignProduct custom", data);
                        precessDesignShoes.callDesign({ objDesign: data, ele: main });
                        break;
                    case "designer":
                        if (typeof data.modelVersion != 'undefined' && data.modelVersion.toLowerCase() == 'patina') {
                            precessDesignnerShoe.callDesign(main, data, { width: 440, height: 320 });
                        }
                        else {
                            precessDesignnerShoe.callDesign(main, data, { width: 680, height: 370 });
                        }
                        break;
                }
                break;
            // case "belt":
            //     switch (designType) {
            //         case "custom":
            //             var imgArr = beltDesigner({source: data, route: root.belt});
            //             precessDesignnerShoe.defaults.width = 586;
            //             precessDesignnerShoe.defaults.height = 527;
            //             precessDesignnerShoe.canvasDrawImage(main, imgArr, 586, 527);
            //             break;
            //         case "designer":
            //             precessDesignnerShoe.callDesign(main, data, {width: 680, height: 370});
            //             break;
            //     }
            //     break;
            default:
                if (designType == "designer") {
                    precessDesignnerShoe.callDesign(main, data, { width: 680, height: 370 });
                }
                break;
        }
    }
};