$(document).ready(function () {
    processDesign.setDefault();
    processDesign.callDefault();
})
processDesign = {
    setDefault: function () {
        this.defaults.designObject = designObject;
        this.callDefault();
    },
    callDefault: function () {
        this.measurement.event($('#size_type'), this);
    },
    defaults: {
        designObject: []
    },
    measurement: {
        event: function (ele, self) {
            var _this = this;
            var sizeObj = self.defaults.designObject.sizeShoes;
            var customSize = "";
            try {
                customSize = self.defaults.designObject.customer.NO_SHOESIZE;
            } catch (e) {
                /****/
            }
            /*Event Select Droup Down size type*/
            ele.change(function () {
                var _val = $(this).val();
                _this.createOption(sizeObj, _val);
            });
            _this.createOption(sizeObj, customSize); /*Call function Create Option Tag*/
        },
        createOption: function (arr, select) {
            var val = $('#size_type').val();
            var name = $('#size_type').find(':selected').text();
            var main = $('#size_no');
            var arrOption = arr[val];
            /*create tag option size*/
            main.empty();
            for (var i in arrOption) {
                var option = "";
                option = $('<option>').val(arrOption[i]).text(arrOption[i]);
                option.appendTo(main);
            }
            /*set default option size no from designObj.customer.NO_SHOESIZE*/
            if (select) {
                main.val(select).change();
            }
            /*Set Value*/
            prevStatus.getSizeType = shoeObject.getSizeType = val;
            prevStatus.getSizeTypeName = shoeObject.getSizeTypeName = name;
            $('input[name=size_name]').val(name); //add sizename to Add cart form
        }
    },
    share_faceBook: function () {
        var domain = (document.domain);
        var screenWidth = screen.width;
        var screenHeight = screen.height;
        var top = screenHeight / 2 - (screenHeight / 4);
        var left = screenHeight / 2;

        precessDesignShoes.callDesign({ objDesign: shoeObject, width: 150, height: 140 }, function (src) {
            var code64 = get_base64_encode(shoeObject);
            $.post("elements/share_fb.php", { CODE: code64, IMG: src }, function (data) {
                var url = "https://www.facebook.com/sharer/sharer.php?u=" + domain + "/designshoes/index.php?FB=" + data;
                window.open(url, 'Share Facebook Shoe By iTailor', 'width=626,height=436,scrollbars=no,top=' + top + ',left=' + left + '');
                $('.Popup').fadeOut('slow', function () {
                    $('.Popup').remove();
                });
            });
        });
    }
};