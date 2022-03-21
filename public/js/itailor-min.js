$(document).ready(function () {

    let dollar_this;    //$_this
    $('#buttonCheckPayPal').live('click', function () {
        if ($('#FrmCheckout').FrmValidationEngine()) {
            checkFrmCheckout('Paypal');
        }
    });
    $('#buttonCheckout').live('click', function () {
        //        if ($('#FrmCheckout').FrmValidationEngine()) {
        //            loadPopUp('PopUpCreditCheckout', 'divUpCreditCheckout');
        //        }
        alert('The checkout payment have not ready.'); return;
        checkFrmCheckout('Credit Card Paypal');
    });
    $('#div_image a').live('click', function (e) {
        e.preventDefault();
        $('.Popup').fadeOut('slow', function () {
            $('.Popup').remove();
            checkFrmCheckout('Credit Card Paypal');
        });
    });

    /*Reg Member*/
    $('.RegMember').live('click', function () {
        $('#modal').fadeOut(function () {
            loadPopUp('PopUpRegMember', 'divPopUpRegMember');

        });
    });

    /*Submit Frm Reg member*/
    $('#FrmRegister').live('submit', function (e) {
        e.preventDefault();
        if ($('#FrmRegister').FrmValidationEngine()) {
            $data = $('#FrmRegister').serialize();
            jQuery.ajax({
                url: "elements/popUp/Register/add.php",
                type: 'POST',
                data: $data,
                success: function () {
                    LoadTopMenu();
                    $('.Popup').fadeOut('slow', function () {
                        $('.Popup').remove();
                    });
                }
            });
        }
    });

    /*#########################################################################*/
    /*Popup
     /*#########################################################################*/

    $('#continue-shopping').live('click', function (e) {
        e.preventDefault();
        $('.Popup').remove();
        loadPopUp('PopUpContinueShopping', 'divProduct');
    });
    $('.linkProduct').live('click', function (e) {
        e.preventDefault();
        $('.Popup').remove();
        loadPopUp('PopUpproduct', 'divProduct');
    });
    $('.linkSubscribe').live('click', function (e) {
        e.preventDefault();
        $('.Popup').remove();
        loadPopUp('PopUpSubscribe', 'divSubscribe');
    });
    /*PreOrder*/
    $('#linkAddPreOrder').live('click', function (e) {
        e.preventDefault();
        CreateImg(function () {
            loadPopUp('PopUpPreOrder', 'divProduct');
        });
    });
    $('.BtnSavePreDesign').live('click', function () {
        $("#btnSavePreOrder").prop('disabled', true);
        var options = {
            type: 'post',
            url: 'elements/popUp/preOrder/addPreOrder.php',
            data: {
                code: shoeObject
            },
            success: function () {
                $('.Popup').fadeOut('slow', function () {
                    $('.Popup').remove();
                });
            }
        };
        $('#FrmAddPreOrderIndex').ajaxSubmit(options);
    });
    $('.linkMenu').live('click', function (e) {
        e.preventDefault();
        $('.Popup').remove();
        loadPopUp('PopUpMenu', 'divMenu');
    });
    $('#linkHistory').live('click', function (e) {
        e.preventDefault();
        loadPopUp('PopUpAcc', 'divAcc');
    });
    $('#linkStore').live('click', function (e) {
        e.preventDefault();
        $.getJSON("/designshoes/elements/popUp/proDesign/checkSessionPreDesign?type=check", function (d) {
            var status = d['STATUS'];
            (status === 'true') ? loadPopUp('PopUpPreDesign', 'divPreDesign') : loadPopUp('PopUpEmtyPreDesign', 'divEmtyPreDesign');
        });
    });

    $('.linkRecommend').live('click', function () {
        $('.Popup').remove();
        loadPopUp('PopUpRecommend', 'divRecommend');
        PopUpRecommend();
    });

    $('.linkCheckOut').live('click', function () {
        $.get("elements/cart/chkItem.php", function (d) {
            if (d == 'true') {
                document.location = "checkout.php";
            } else {
                loadPopUp('PopUpCartEmty', 'divCartEmty');
            }
        });
    });

    $('.btnPreDesign').live('click', function () {
        i = $(this).parents('li').attr('id');
        url = "index.php?t=predesign&n=" + i;
        document.location = url;
    });

    /*PreDesign Add / Delete*/
    $('.btn-delete-predesign').live('click', function () {
        t = $(this).parents('li');
        i = t.attr('id');
        //        $('#itemMain'+' #'+i).remove();
        loadPopUp('PopUpQuestionDeletePreDesign', 'divQuestionDeletePreDesign');
        $('.btnstep').live('click', function () {
            if ($(this).attr('id') === 'btnRemoveItemPreDesignYes') {
                $.get('elements/popUp/proDesign/delete?id=' + i, function () {
                    loadPopUp('PopUpPreDesign', 'divPreDesign');
                });
            }
        });
    });

    /*#########################################################################*/
    /* Event remove Popup windows
     /*##########################################################################*/
    $('body').keyup(function (e) {
        if (e.keyCode === 27) {
            $('.Popup').fadeOut('slow', function () {
                $('.Popup').remove();
            });
        }
    });

    $('#btnExitPopupProduct, #btnExitProOrder, .btnExitPopup, .closes').live('click', function (e) {
        e.preventDefault();
        $('.Popup').fadeOut('slow', function () {
            $('.Popup').remove();
        });
    });

    $('.ccc-info .button-ccc-info').click(function () {
        loadPopUp('PopUpCCC', 'divPopUpCCC');
    });

    /*#########################################################################*/
    /* submit Email
     /*#########################################################################*/
    $('#FrmSubmitEmail').live('submit', function (e) {
        e.preventDefault();
        $data = $('#FrmSubmitEmail').serialize();
        $.ajax({
            type: "POST",
            url: "elements/data/submitEmail.php",
            data: $data,
            success: function () {
                loadPopUp('PopUpCompletedSubSkype', 'divPopUpCompletedSubSkype');
            }
        });
    });

    /*set popup windows*/
    $(window).resize(function () {
        var winHeight = $(document).height();
        var winWidth = $(document).width();
        if(dollar_this==undefined)   return;     //added 03.19
        var width = ($(window).width() - dollar_this.find('div:eq(0)').width()) / 2;
        var height = ($(window).height() - dollar_this.find('div:eq(0)').height()) / 2;
        $('#PopUp').css({ width: winWidth, height: winHeight });
        $('#PopUp').find('div:eq(0)').css({
            'position': 'absolute',
            left: width < 0 ? 0 : width,
            top: height < 0 ? 0 : height
        });
    });
});
function loadUserDetail() {
    $('#eleFrmCheckOut').empty().load('elements/data/eleFrmCheckout.php');
}
function loadDataCheckout() {
    $('#eleFrmdatacheckOut').load('elements/data/eleDataCheckout.php?type=Ajax', function () {
        Scrollbar();
    });
}
/*menu*/
function loadPopUp($a, $b, $c) {
    $('.Popup').remove();
    dollar_this = $("<div class='Popup' id='PopUp'>");
    $(dollar_this).appendTo('body').css({
        width: $(document).width(),
        height: $(document).height(),
        'position': 'absolute',
        top: 0,
        left: 0,
        'z-index': 99999,
        'background-color': 'rgba(0,0,0,0.7)'
    });
    if ($a === 'PopUpPreDesign') {
        $(dollar_this).css({
            'background-color': 'rgba(0,0,0,1)',
            'background-image': 'url(images/bg/bg-My-Wish.jpg)',
            'background-size': ' 100% 650px',
            'background-repeat': 'no-repeat'
        });
    }
    
    // http://127.0.0.1:8000/designshoes/elements/popUp/PopUpCompleted
    console.log($a)
    
    dollar_this.load("elements/popUp/" + $a, function (data) {
        if (dollar_this.find('div:eq(0)').is('#divPreDesign') || dollar_this.find('div:eq(0)').is('#PopUpPreOrder')) {
            dollar_this.find('div:eq(0)').css({
                'position': 'absolute',
                left: ($(document).width() - 20 - dollar_this.find('div:eq(0)').width()) / 2,
                top: 0
            });
        } else {
            var width = ($(window).width() - dollar_this.find('div:eq(0)').width()) / 2;
            var height = ($(window).height() - dollar_this.find('div:eq(0)').height()) / 2;
            dollar_this.find('div:eq(0)').css({
                'position': 'absolute',
                left: width < 0 ? 0 : width,
                top: height < 0 ? 0 : height
            });

            if (dollar_this.find('div:eq(0)').is('#divAccount')) {
                dollar_this.find('#cust_inf').empty().load('elements/popUp/account/information.php');
                dollar_this.find('#sizes').empty().load('elements/popUp/account/sizes.php', function () {
                    $("#tabs-s,#tabs-prod-male,#tabs-prod-female").tabs();
                });

                dollar_this.find('#ordering').empty().load('elements/popUp/account/orderHistory.php', function () {
                    $(".main-order-list").mCustomScrollbar({
                        scrollButtons: {
                            enable: false
                        },
                        advanced: {
                            updateOnContentResize: Boolean
                        }
                    });
                    setLanguage();
                });
                dollar_this.find('#gift_card').empty().load('elements/popUp/account/giftcard.php', function () {
                    setLanguage();
                });
            }
        }
        $('#' + $b).find('.errorStatus').text($c);
        $('#' + $b).fadeIn();
    });
    setLanguage();
}

//Submit Coupon
function applyCoupon() {

    $.getJSON("elements/cart/coupon.php?coupon_no=" + $('#coupon_no_input').val(), function (data) {
        var status = data['CUPON']['STATUS'];
        var $this = $('#coupon_no_input');
        if (status === 'N') {
            changVelLogin(data);
            $('#available-coupon').show().fadeOut(2000);
        } else if (status === 'Y') {
            $this.val('');
            changVelLogin(data);
            loadPopUp('PopUpExpireCoupon', 'divPopUpExpireCoupon');
        } else {
            $this.val('');
            changVelLogin(data);
            loadPopUp('PopUpErrorCoupon', 'divPopUpErrorCoupon');
        }
    });
}
function loadScollchkout() {
    $(".list-chkout").mCustomScrollbar({
        scrollButtons: {
            enable: false
        },
        advanced: {
            updateOnContentResize: true
        }
    });
}

/*==============================================================================*/
/*PRICE && COUPON
 /*==============================================================================*/
function load_currency(curr) {
    $.getJSON('elements/loadPrice', {
        curr: curr
    }, function (data) {
        menuObject.setPrice = data;
        $('.sub-menu-leather').empty().html(data['list']);
        toggle_price();
        shiftMenu(menuObject.currentMenu); //toggle submenu when load Leather Menu Complete
        setLanguage();
        if ($(document).find('#eleFrmdatacheckOut').length <= 0) {
        }
    });
}

function checkFrmCheckout($Payment) {
    $data = $('#FrmCheckout').serialize().replace("'", '');
    $('#buttonCheckPayPal').die('click');
    $.ajax({
        type: "POST",
        url: "elements/checkout/add?paymentType=" + $Payment,
        data: $data.replace("'", ''),
        success: function (data) {
            var sdata = JSON.parse(data);
            var status = sdata['STATUS'];
            var page = sdata['PAGE'];
            if (status === "true") {
                closeModal('plp', 'modal-paypal');
                if (page === "thank") {
                    parent.document.location.href = sdata['URL'];
                } else if (page === "paypal") {
                    if (ch == 'ec') {
                        parent.document.location.href = "elements/checkout/paypal?ch=ec";
                    }
                    else if (ch == 'inec') {

                    }
                    else {
                        parent.document.location.href = "elements/checkout/paypal";
                    }
                } else {
                    /****/
                }
            } else if (status === "false") {
                $('#buttonCheckPayPal').live('click');
                loadPopUp('PopUpErrorCheckout', 'divUpErrorCheckout');
            }
        }
    });
}

function LoadTopMenu() {
    $('#top-menu').load('/designshoes/elements/topMenu?load=true', function () {
        setLanguage();
    });
}
function slideMin() {
    slideMinVar.listSlideLength = $('.list-slide').length;
    $('.MainSlide').css({
        'width': slideMinVar.MainSlide,
        'margin': 'auto',
        'overflow': 'hidden'
    });
    $('.MainSlideList').css('width', slideMinVar.listSlideWidth * slideMinVar.listSlideLength);
    $('.list-slide').css({
        'float': 'left',
        'width': slideMinVar.listSlideWidth
    });
    $('.btnSlide').css({
        'overflow': 'hidden',
        'position': 'absolute',
        'top': '50%',
        'cursor': 'pointer'
    });
    $('#btnBack').css('right', '10px');
    $('#btnNext').css('left', '10px');

    $('.btnSlide').live('click', function () {
        $id = $(this).attr('id');
        if ($id == 'btnBack') {
            if (slideMinVar.count < (slideMinVar.listSlideLength - 1)) {
                slideMinVar.count++;
                $('.MainSlideList').animate({
                    'marginLeft': slideMinVar.listSlideWidth * (-slideMinVar.count)
                }, 700);
            }
        } else {
            if (slideMinVar.count > 0) {
                slideMinVar.count--;
                $('.MainSlideList').animate({
                    'marginLeft': slideMinVar.listSlideWidth * (-slideMinVar.count)
                }, 700);
            }
        }
    });
}

//Modal
function closeModal(ele, modal) {
    if(modal==undefined)    modal='modal';
    var $this = $('#' + modal);
    var form = $('#' + ele);
    if ($this.is(':hidden')) {
        $this.children().hide();
        $this.css({
            width: $(window).width(),
            height: $(window).height(),
            'position': 'fixed',
            top: 0,
            left: 0,
            'z-index': 9999
        }).fadeIn(200, function () {
            form.css({
                left: ($(window).width() - 60 - form.width()) / 2,
                top: ($(window).height() - 60 - form.height()) / 2
            }).delay(200).fadeIn(function () {
                form.find('input[type=email]:eq(0)').focus();
            });
        });
    } else {
        $this.children().fadeOut(100, function () {
            $this.delay(180).fadeOut();
        });
    }
}
function CreateImg(callback) {
    shoeObject.img = null;
    var code64 = get_base64_encode(shoeObject);
    $('#CanvasPreOrder').load('lib/canvasImg?code=' + code64 + '&w=440&h=412', function () {
        callback();
    });
}
function get_base64_encode(string) {
    /*fucntion convert array javascript >> string >> base64*/
    var a = string;
    var arr = [];
    $.each(a, function (i, v) {
        var str = '"' + i + '":"' + v + '"';
        arr.push(str);
    });
    var en = Base64.encode('{' + arr + '}');
    return en;
}
function changVelLogin(data) {
    if (data) {
        var listItem = data['PRODUCT']['ITEM'];
        var listSum = data['PRODUCT']['SUM'];
        var user = data['USER'];

        var sumQty = listSum['QTY'];
        var sumPrice = (listSum['PRICE']);//.toFixed(2);

        var sumShipping = (listSum['SHIPPING']);//.toFixed(2);
        var sumDiscount = (listSum['DISCOUNT']);//.toFixed(2);
        var sumCCC = (listSum['CCC']);//.toFixed(2);
        var sumTotal = (listSum['TOTAL']);//.toFixed(2);
        var sign = ' ' + listSum['SIGN'];
        if (user) {
            var sizeUnit = user['TYPE_SHOEMEASURE'];
            var sizeLength = user['LENGTH_SHOE'];
            var sizeWidth = user['WIDTH_SHOE'];
            var sizetype = user['TYPE_SHOESIZE'];
            var sizeNo = user['NO_SHOESIZE'];
        }
        if ($('form#FrmCheckout').length > 0) {
            /*Form chk*/
            if (user) {
                $('form#FrmCheckout').find('input,select').each(function () {
                    var name = $(this).attr('name');
                    var val = user[name];
                    $(this).val(val);
                });
                $('form#FrmCheckout select').change();
            }
            /*list-item product*/
            if (listSum) {
                $('.list-hover').each(function (i) {
                    var price = (listItem[i]['SUMPRICE']);//.toFixed(2);
                    var shipping = (listItem[i]['SHIPPING']);//.toFixed(2);
                    var total = (listItem[i]['TOTAL']);//.toFixed(2);

                    $(this).find('.price').html(price);
                    $(this).find('.shipping').html(shipping);
                    $(this).find('.total').html(total);
                });

                $('#checkout-body').find('.sum-qty').html(sumQty);
                $('#checkout-body').find('.sum-price').html(sumPrice + sign);
                $('#checkout-body').find('.sum-shipping').html(sumShipping + sign);
                $('#checkout-body').find('.sum-discount').html(sumDiscount + sign);
                $('#checkout-body').find('.ccc').html(sumCCC + sign);
                $('#checkout-body').find('.sum-total').html(sumTotal + sign);
            }

            /*set number list item*/
            $('.list-no').each(function (i) {
                $(this).text('No.' + (i + 1));
            });
        }

        /*page index*/
        if ($('#main-layout').length > 0) {
            /*user*/
            $('#measure-form #length').val(sizeLength);
            $('#measure-form #width').val(sizeWidth);
            $('#measure-form #size_type').val(sizetype).change();
            $('#measure-form #size_no').val(sizeNo).change();

            $('#cart-detail').find('.item-count').html(sumQty);
            $('#cart-detail').find('.total-price').html(sumPrice + sign);
            $('#cart-detail').find('.shipping-amount').html(sumShipping + sign);
            $('#cart-detail').find('.sub-price').html(sumTotal + sign);
            designObject.curr = listSum['CURR'];
        }
    }
}
function detectMobile() {
    loadPopUp('PopUpdetectMobile');
}