(function ($) {
    $.fn.slide = function ($c) {
        var ele = $(this);
        $item_show = $c; // Count Show Image
        $item_width = 100; // image width
        $item_count = $(this).find('li').length; // count image in slide
        $margin = (600 - ($item_width * $c)) / ($c + 1);
        ele.find('li').css({
            'float': 'left'
        });
        ele.find('ul').css({ width: 100 * $item_count, 'marginLeft': -400, 'opacity': 0 }).stop(false, true).animate({ 'marginLeft': 0, 'opacity': 1 }, 700).parent().show();
    };

})(jQuery);

$(document).ready(function () {
    getDefault();
    chkType();
    var setHistory = menuObject.currentMenu, text = [], $main = $('#over-view');
    $.address.change(function (event) {
        // do something depending on the event.value property, e.g. 
        var menuHistory = $.address.value();
        menuHistory = menuHistory.replace('\/', '');
        (menuHistory !== '') ? $('#' + menuHistory + ' ul:first-child').trigger('click') : $('#' + setHistory + ' ul:first-child').trigger('click');
    });

    //Call Grow Effect Plug-in
    /*$('.bmenu li,#main-type li,.option-color li').find('img').live({
        mouseover:
                function () {
                    $(this).glow({radius: "3", color: "white"});
                },
        mouseleave:
                function () {
                    $(this).glow({radius: "3", disable: true});
                }
    });

    if (!$.browser.webkit) {
        $('#btn-cart,#buttonCheckPayPal,#buttonCheckout').glow({
            active: true,
            radius: "2",
            color: "white"
        });
        $('head').append($('<style>.arrowSlc:after {right:9px!important;top: 0px!important;}.arrowSlcNo:after {top: 0px!important;} </style>'));
    }*/
    //////////////////////////////////////////////////////////

    $('.active').children('ul:eq(1)').slideToggle(); //toggle Slide Submenu 
    $('#set_Language').live('change', function () {
        loadLanguage($(this).val());
    });

    //    $('#size_type').live('change', function() {
    //        $thisType = $(this).val();
    //        var sizename = $(this).find(':selected').text();
    //        prevStatus.getSizeTypeName = shoeObject.getSizeTypeName = sizename;
    //        $('input[name=size_name]').val(sizename); //add sizename to Add cart form
    //        prevStatus.getSizeType = shoeObject.getSizeType = $thisType;
    ////        toggleSizeNo($thisType);
    //    });

    //    $('#qty_body').live('change', function() {
    //        shoeObject.getQty = $(this).val();
    //    });

    //////////////////////////////////////////////////////////////////

    $('.unit').live('click', function () {
        $(this).find('input[type="radio"]').attr('checked', 'checked');
    });

    $('.textsize').live('click', function () {
        $(this).next().focus();
    });

    //Main Menu
    $('.sub-menu ul:first-child').live('click', function (e) {
        $('#main-design .soft-touch img').removeClass('visible');
        e.preventDefault();
        var elem = $(this).parent();
        var elemId = $(this).parent().attr('id');
        if (elem.hasClass('active')) {
            if (!$(this).next().children('.chk').is('li:first-child') && elemId !== 'menu-main-type' && elemId !== 'menu-main-color') {
                elem.find('ul:nth-child(2) li:first-child').trigger('click');
            }
        } else {
            getMain($(this));
            $('.sub-menu').each(function (i) {
                $(this).is('#menu-main-type') ? $(this).removeClass('active').children('ul:eq(2)').slideUp() : $(this).removeClass('active').children('ul:eq(1)').slideUp();
            });
            elem.is('#menu-main-type') ? elem.addClass('active').children('ul:eq(2)').stop(false, true).slideToggle() : elem.addClass('active').children('ul:eq(1)').stop(false, true).slideToggle();
            menuObject.currentMenu = elemId;
            shiftMenu(elemId);
        }
        $.address.value(menuObject.currentMenu);
    });

    //Sub Menu
    $('.sub-menu ul:nth-child(2) li').live('click', function () {
        var $this = $(this);
        var id = $(this).attr('id');
        var thisClass = $(this).parent().attr('class');
        if (!$this.is('.chk')) {
            $this.parent().children().removeClass('chk');
            $this.addClass('chk');
        }
        callMenu(id, thisClass);
    });

    //Type of Shoe Select
    $('.selectType li').live('click', function () {
        $('#main-design .soft-touch img').removeClass('visible');
        var $this = $(this).attr('id');
        $('.sub-menu-type').find('#' + $this).trigger('click');
        ($this === 'oxford' || $this === 'derby' || $this === 'boot') ? hideLaceMenu() : hideLaceMenu('hide');
        ($this === 'boot') ? hideBackMenu('hide') : hideBackMenu();
        ($this === 'loafers') ? hideAccsMenu() : hideAccsMenu('hide');
        menuObject.statusPreDesign = false; // status check  line from predesign 
    });

    //Leather bottom List Select
    $('.selectLth li').live('click', function () {
        var id = $(this).attr('id');
        shoeObject.getLeatherNoName = $(this).find('.itemList').attr('title');
        shoeObject.getLeatherNo = id.replace($(this).attr('class') + "_", '');
        shoeObject.getLeather = $(this).attr('class');
        shoeObject.getLeatherName = 'the ' + $(this).attr('class');
        shoeObject.getLeatherGroup = listEle.listLth[shoeObject.getLeather]['group']; // Value get from load_leather_xml() function
        chkItemMenu('.selectLth', $(this).attr('id'));
        menuObject.statusPreDesign = false; // status check  line from predesign 
        changeLeather(shoeObject.getLeatherNo);
        toggle_price();
        LeatherColorMixGroup();
        //Set DesignIdea Slide
        GetGroupLeather();
        CreateTagList(function () {
            //Function Call Back
        });
    });

    //sub Style menu Event
    $('.selectSty li').live('click', function () {
        var id = $(this).attr('id');
        var style = $(this).attr('class');
        var title = $(this).find('.itemList').attr('title');
        shoeObject[style] = id;
        chkItemMenu('.selectSty', shoeObject[shoeObject.getStyle]);
        menuObject.statusPreDesign = false; // status check  line from predesign 
        switch (style) {
            case 'shape':
                var gid = id;
                shoeObject.getShape = gid.replace('shape-', '');
                shoeObject.getShapeName = title;
                break;
            case 'front':
                shoeObject.getFront = id;
                shoeObject.getFrontName = title;
                SetDefaultSlide();
                break;
            case 'side':
                shoeObject.getSide = id;
                shoeObject.getSideName = title;
                break;
            case 'back':
                shoeObject.getBack = id;
                shoeObject.getBackName = title;
                break;
            case 'sole':
                shoeObject.getSole = id.replace('sole-', '');
                shoeObject.getSoleName = title;

                if (shoeObject.getSole === "RBB-22") {
                    shoeObject.getSoleBorder = "RBB-22";
                } else if (shoeObject.getSole === "RBD") {
                    shoeObject.getSoleBorder = "RBD";
                } else {
                    shoeObject.getSoleBorder = "LE2";
                }

                /*Set Detail*/
                $('#Detail-Sole').text(shoeObject.getSoleName);
                break;
            case 'accessory':
                shoeObject.getAccessory = id;
                shoeObject.getAccessoryName = title;
                break;
        }
        toggleOptionSoleMix();
        toggle_layout();
    });

    //Button Back and Next step
    $('.btnstep').live('click', function () {
        $objBtn = $(this).attr('id');
        $objMenu = $('#' + menuObject.currentMenu);
        $thisMenu = menuObject.currentMenu;
        if ($objBtn === 'next-step') {
            if ($thisMenu !== 'menu-main-style' && $thisMenu !== 'menu-main-special-design') {
                $objMenu.next().find('ul:first-child').trigger('click');
            } else {
                if ($objMenu.find('ul:nth-child(2) .chk').is('li:last-child')) {
                    $objMenu.next().find('ul:first-child').trigger('click');
                } else {
                    $objMenu.find('ul:nth-child(2) .chk').next().trigger('click');
                }
            }
        } else if ($objBtn === 'prev-step') {
            if ($thisMenu !== 'menu-main-style' && $thisMenu !== 'menu-main-special-design') {
                setDefaultMenu($objMenu);
            } else {
                if ($objMenu.find('ul:nth-child(2) .chk').is('li:first-child')) {
                    setDefaultMenu($objMenu);
                } else {
                    $objMenu.find('ul:nth-child(2) .chk').prev().trigger('click');
                }
            }
        }
    });

    //Button Prev And Next item
    $(".btnimg").live('click', function () {
        $objId = $(this).attr('id');
        var count = listEle.count;
        if ($objId === "btn-next") {
            var pageNow;
            if ((count + 1) <= listEle.page) {
                $('#btn-next').parent().prev('.mask').find('.in').children('ul').animate({
                    'marginLeft': (-100 * 6) * listEle.count
                }, 600, function () {
                    pageNow = count + 1;
                    $('.pageItem').html('(' + pageNow + ' &#47; ' + listEle.page + ')');
                });
                listEle.count++;
            }
        } else {

            if ((count - 1) >= 1) {
                $('#btn-prev').parent().next('.mask').find('.in').children('ul').animate({
                    'marginLeft': (100 * 6) * (listEle.count - 2) * (-1)
                }, 600, function () {
                    pageNow = listEle.count;
                    $('.pageItem').html('(' + pageNow + ' &#47; ' + listEle.page + ')');
                });
                listEle.count--;
            }
        }
    });

    //Video
    $('input[name="length"]').focus(function () {
        var t = $('#media-length');
        $sample = $('<img>').attr('src', 'images/Length.jpg');
        $('#measure-sample').html($sample);
        $('#measure-media .video').hide();
        t.fadeIn();
        try {
            var myVideo = document.getElementById("media-length");
            myVideo.currentTime = 0;
            myVideo.play();
        } catch (err) {
            //Handle errors here
        }
        //        }
    });

    $('input[name="width"]').focus(function () {
        var t = $('#media-width');
        $sample = $('<img>').attr('src', 'images/Width.jpg');
        $('#measure-sample').html($sample);
        //        $('#measure-media').html(vdo.vdo_W);
        if (t.is(":hidden")) {
            $('#measure-media .video').hide();
            t.fadeIn();
            try {
                var myVideo = document.getElementById("media-width");
                myVideo.currentTime = 0;
                myVideo.play();
            } catch (err) {
                //Handle errors here
            }
        }
    });
});

//Add Cart
$('#btn-cart').live('click', function (e) {
    e.preventDefault();
    var $this = $('#measure-form');
    var $L = $this.find('input[name="length"]');
    var $W = $this.find('input[name="width"]');

    $this.find('.field input[type="text"]').each(function (i) {
        var _this = $(this);
        var val = $(this).val();
        if ((val === '') || (val == 0) || val.match(/[^0-9.]/)) {
            validate_measurement(_this, true);
        } else {
            validate_measurement(_this, false);
        }
    });

    ($this.find('#size_no').val() === 0 || $this.find('#size_no').val() === "--") ? validate_measurement($('#size_no'), true) : validate_measurement($('#size_no'), false);
    if (($L.hasClass('invalid-box') || $W.hasClass('invalid-box')) || $this.find('#size_no').val() === 0 || $this.find('#size_no').val() === "--") {
        return false;
    } else {
        /*condition check monogram select txt empty*/
        if ((($("#checkbox-2-1").attr('checked') === 'checked') && $('#input-inside').val() === '') || (($("#checkbox-2-2").attr('checked') === 'checked') && $('#input-outside').val() === '')) {
            $('#menu-main-special-design ul:first-child').trigger('click');
            loadPopUp('PopUpErrorMono', 'divErrorMono');
            return false;
        }
        shoeObject.getUnit = $this.find('input[name="unit"]:checked').val();
        shoeObject.getLength = $this.find('input[name="length"]').val();
        shoeObject.getWidth = $this.find('input[name="width"]').val();
        shoeObject.response = true;

        if ($('#size_no').val() !== '--') {
            $('#btn-cart').prop('disabled', true);
            $('#measure-form').submit();
        }
    }
});
$('.monoCls').live('click', function () {
    $('#menu-main-special-design').find('ul:nth-child(2) li:last-child').trigger('click');
});
$('.forgetpass').live('click', function (e) {
    e.preventDefault();
    $('#login-box').fadeOut(function () {
        $('#forgot-box').css({
            left: ($(window).width() - 60 - $(this).width()) / 2,
            top: ($(window).height() - 60 - $(this).height()) / 2
        }).fadeIn(function () {
            $(this).find('input[type=email]:eq(0)').focus();
        });
    });
});

//Login Bar & LoginForm
$('.link-login').live('click', function () {
    closeModal('login-box', 'modal');
});
$('.link-logout').live('click', function () {
    $.get("elements/acc/logout", function () {
        LoadTopMenu();
    });
});
$('#submitform').live('click', function () {
    loginSubmit();
});
$('#login-form input').live('keyup', function (e) {
    if (e.keyCode === 13) {
        loginSubmit();
    }
});

//Forgot Password
$('#submitforgot').live('click', function () {
    var options = {
        url: 'lib/sendmail.php', // override for form's 'action' attribute 
        success: function (formData) {
            if (formData.replace(/\s/g, '').length > 0) {
                loadPopUp('PopUpEmailFail', 'divPopUpEmailFail', formData);
            } else {
                closeModal('', 'modal');
            }
        }
    };

    $('#forgot-form').ajaxSubmit(options);
});

//Toggle Input Coupon
$('#use_coupon a').live('click', function (e) {
    e.preventDefault();
    $this = $('.cou-toggle');
    if ($(this).hasClass('elehide')) {
        $this.animate({
            marginTop: '0px',
            opacity: 'show'
        }, 250, function () {
            $this.removeClass('in');
            $.post('elements/toggleCoupon.php', {
                chkcou: "chk"
            });
        });
        $(this).removeClass('elehide');
    }
});
window.onresize = function () {
    var $this = $('#modal');
    if ($this.is(':visible')) {
        $this.css({
            width: $(window).width(),
            height: $(window).height()
        });
        $this.children().css({
            left: ($(window).width() - 60 - $this.children().not(':hidden').width()) / 2,
            top: ($(window).height() - 60 - $this.children().not(':hidden').height()) / 2
        });
    }

    var $popup = $('.Popup');
    if ($popup.is(':visible')) {
        $popup.css({
            width: $(window).width(),
            height: $(window).height()
        });

        $popup.find('div:eq(0)').css({
            left: ($(window).width() - 20 - $popup.find('div:eq(0)').width()) / 2,
            top: ($(window).height() - $popup.find('div:eq(0)').height()) / 2
        });
    }
};

//======== Main Variable ========//
var vdo = {
    vdo_L: '',
    vdo_W: ''
};
var menuObject = {
    currentMenu: 'menu-main-type',
    shoeType: 'oxford',
    folderType: 'OxfordShoes', //Shoes' Folder Type
    setLang: null,
    setPrice: null,
    setMix: 0,
    shoecurr: null,
    currsign: '',
    shoeqty: 0,
    shoetotal: 0,
    shoeshipping: 0,
    shoetotalnet: 0,
    itemSession: 0,
    statusPreDesign: false // check item checkout before link from design idea
};

var shoeObject = false;

// Variable for compare with Main variable(shoeObject)
var prevStatus = {
    prevMenu: null,
    prevType: null, //compare with (shoeType) 
    prevLeather: null, //compare with (getLeather) 
    prevStyle: null, // compare with (getStyle)
    prevLthSty: null, // Leather on style. use compare with (getLeatherNo) 
    getSizeTypeName: null,
    getSizeType: null,
    getSizeNo: null,
    getUnit: null
};

var dataObjImg = { item: [] };
var listEle = { listLth: [], listSpe: [], item_count: 0, count: 1, page: 1, margin: 0, objLang: [] };

function loginSubmit() {
    var options = {
        url: 'elements/acc/Login',
        dataType: 'json',
        success: function (formData) {
            changVelLogin(formData);
            if (formData) {
                switchUser(formData['CURR']);
                load_currency(formData['CURR']);
            } else {
                loadPopUp('PopUpLoginFail', 'divPopUpLoginFail');
            }
        }
    };
    $('#login-form').ajaxSubmit(options);
}
function switchUser(curr) {
    closeModal('login-box', 'modal');
    LoadTopMenu();
}
function toggleCountry(val) {
    $.getJSON('elements/cart/country.php?country=' + val, function (data) {
        changVelLogin(data);
    });
}
function getDefault() {
    shoeObject = new defaultOption();
    shoeObject.shoeType = menuObject.shoeType;

    /*=======================================================
     * CONDITION TYPE SHOE DEFAUIT
     * ======================================================*/
    if (menuObject.shoeType === 'oxford' || menuObject.shoeType === 'derby' || shoeObject.shoeType === 'monk') {
        shoeObject.side = 'SD1';
        shoeObject.getSide = 'SD1';
        shoeObject.getSideName = 'SD1';
    }
    if (shoeObject.shoeType === 'boot') {
        shoeObject.side = 'SD6';
        shoeObject.getSide = 'SD6';
        shoeObject.getSideName = 'SD6';
    }
    if (shoeObject.shoeType === 'loafers' || shoeObject.shoeType === 'fashion' || shoeObject.shoeType === 'monk') {
        shoeObject.getLacesNo = 'none';
        shoeObject.getLacesName = 'none';

        shoeObject.getStitchingNo = 'none';
        shoeObject.getStitchingName = 'none';
    }
    if (shoeObject.shoeType === 'boot') {
        shoeObject.getBack = 'none';
        shoeObject.getBackName = 'none';
    }
    if (shoeObject.shoeType !== 'fashion') {
        shoeObject.getAccessory = 'none';
        shoeObject.getAccessoryName = 'none';
        shoeObject.getAccessoryNo = 'none';
    }

    /*===========================================
     * Event Re Set Monogram Input And CheckBox = NULL
     *===========================================*/
    $('#checkbox-2-1,#checkbox-2-2').attr('checked', false);
    $('#input-inside,#input-outside').val('');
}

//Main menu call function
function getMain(ele) {
    var $this = ele;
    var mode = $this.next().attr('class');
    if (mode === 'sub-menu-measure') {
        $('#main-design,#main-type').stop(false, true).fadeOut(100, function () {
            callOption(mode);
            $('#main-measure').delay(200).fadeIn(function () {
                $('input[name="length"]').focus();
            });
        });
    } else {
        $('#main-measure,#main-type').stop(false, true).fadeOut(100, function () {
            callOption(mode);
            $('#main-design').delay(200).fadeIn();
        });
    }
}

//Sub menu call function
function callMenu(id, menu) {
    $('.btnimg').stop(false, true).fadeOut();
    switch (menu) {
        case 'sub-menu-type':
            menuObject.shoeType = id;
            if (menuObject.shoeType !== prevStatus.prevType) {
                shoeObject.mixSolePriceStatus = 'no';
                getDefault();
                toggle_price();
            }
            shoeObject.shoeTypeName = id;
            chkType();
            break;

        case 'sub-menu-leather':
            shoeObject.setMenuLth = id;
            //shoeObject.getLeatherName = 'the '+id;
            break;

        case 'sub-menu-style':
            shoeObject.getStyle = id;
            break;

        case 'sub-menu-special':
            shoeObject.getSpeci = id;
            break;

        case 'sub-menu-measure':
            shoeObject.measureMenu = id;
            break;
    }
    toggleBannerMenuL();
    OptionSideBorder();
    Recommend();
    callOption(menu);
    ToggleShoeDesign();
    toggleOptionSoleMix();
}

//Main menu call option
function callOption(ele) {
    var mode = ele;
    load_main_model();
    load_View_Menu(mode);
    load_leather_menu(mode);
    load_style_menu(mode);
    loadOptionMaxMatch(mode);
    setMonk();
}
function shiftMenu(menu) {
    $('.selectType').hide();

    if (menu === 'menu-main-special-design') {
        $('#' + menu).find('ul:nth-child(2) li:last-child').trigger('click');
    } else if (menu === 'menu-main-color') {
        $('#' + menu).find('ul:nth-child(2) li#' + shoeObject.getLeather).trigger('click');
    } else if (menu === 'menu-main-type') {
        if (prevStatus.prevType !== menuObject.shoeType) {
            $('#' + menu).find('ul:nth-child(2) li:first-child').trigger('click');
        } else {
            $('#' + menu).find('ul:nth-child(2) #' + menuObject.shoeType).trigger('click');
        }
    } else {
        $('#' + menu).find('ul:nth-child(2) li:first-child').trigger('click');
    }
}
function chkType() {
    var $chkImg = $('<img>').addClass('chkItem').attr('src', '../images/CheckMarkBlue.png'); //20210220
    $('.selectType').find('.chkItem').remove();
    $('.selectType').find('#' + menuObject.shoeType + ' img').before($chkImg);
}
function chkItemMenu(menu, item) {
    item = (item ? "#" + item : "ul li:first-child");
    var $chkImg = $('<img>').addClass('chkList').attr('src', '../images/CheckMarkBlue.png'); //20210220
    $(menu).find('.chkList').remove();
    $(menu).find(item).prepend($chkImg);
}
function setDefaultMenu(menu) {
    if (menu.prev().attr('id') !== 'menu-main-style' && menu.prev().attr('id') !== 'menu-main-special-design') {
        menu.prev().find('ul:first-child').trigger('click');
    } else {
        $('.sub-menu').each(function (i) {
            $(this).removeClass('active').children('ul:eq(1)').slideUp();
        });
        menu.prev().addClass('active').children('ul:eq(1)').slideToggle();
        menu.prev().find('ul:nth-child(2) li:last-child').trigger('click');
        getMain(menu.prev().find('ul:first-child'));
        menuObject.currentMenu = menu.prev().attr('id');
    }
}

//count item in bottom menu and show page button
function getDimention(countItem) {
    var item_width = $('.mask .in').find('li:first-child img').width();
    listEle.item_count = countItem;
    listEle.page = Math.ceil(listEle.item_count / 6);
    listEle.count = 1;
    listEle.margin = (600 - (item_width * 6)) / 7;
    $('.pageItem').html('(1 / ' + listEle.page + ')');
    //$('.pageItem').html('(Page 1 of ' + listEle.page + ')');
}

function load_main_model() {
    var $this = $('#main-layout');
    if (!$this.children().length > 0 || prevStatus.prevType !== menuObject.shoeType) {
        switch (menuObject.shoeType) {
            case 'oxford':
                menuObject.folderType = 'OxfordShoes';
                break;
            case 'derby':
                menuObject.folderType = 'DerbyShoes';
                break;
            case 'boot':
                menuObject.folderType = 'Boot';
                break;
            case 'monk':
                menuObject.folderType = 'Monk';
                break;
            case 'loafers':
                menuObject.folderType = 'Loafers';
                break;
            case 'fashion':
                menuObject.folderType = 'Fashion';
                break;
        }
        prevStatus.prevType = menuObject.shoeType;
        shoeObject.folderType = menuObject.folderType;

        var createMain = '<div class="main_model" id="Right"  style="display:none"></div>';
        createMain += '<div class="main_model" id="Left"></div>';
        createMain += '<div class="main_model" id="Back" style="display:none"></div>';
        createMain += '<div class="main_model" id="Under" style="display:none"><div id="monoOut"></div></div>';
        toggle_layout();
    }
}

/*===============================================*/
/*=============== LEATHER COLOR =================*/
/*===============================================*/

function load_leather_menu(mode) {
    var $this = $('.mask');
    var listL = '.selectLth';

    if (mode === 'sub-menu-leather' && menuObject.currentMenu === 'menu-main-color' && listEle.listLth.toString().length > 0) {
        $('.btnimg').stop(true, true).fadeIn();
        objView = "#main-layout #Right";//+shoeObject.currentView
        shoeObject.currentView = 'Right';
        if ($(objView).is(':hidden')) {
            $('.main_model').hide();
        }
        $('#' + shoeObject.currentView).fadeIn();

        if (!$(listL).children().length > 0 || prevStatus.prevLeather !== shoeObject.setMenuLth || prevStatus.prevMenu !== menuObject.currentMenu) {
            prevStatus.prevLeather = shoeObject.setMenuLth;
            prevStatus.prevMenu = menuObject.currentMenu;

            $(listL).empty();
        }
        set_leather_Menu();
        $(listL).stop(true, true).fadeIn('slow');
        $(listL).addClass('in');
    } else {
        $(listL).empty().removeClass('in').hide();
    }
}
function set_leather_Menu() {
    var listL = '.selectLth';
    var leather = listEle.listLth[shoeObject.setMenuLth]['leather'];

    $(listL).empty().html(leather).slide(6);

    /*Condition shoe stype LOAFERS AND FRONT  FT14 FT15*/
    if (shoeObject.shoeType === "loafers" && (shoeObject.getFront === "FT14" || shoeObject.getFront === "FT15")) {
        for (var i = 0; i <= 15; i++) {
            $(".selectLth #fashion_FN" + i).remove();
        }
    }

    getDimention($(listL).find('li').length);
    $('.choose-style-text').html(listEle.objLang['choose-leather']);
    //$(listL).find('img').reflect();
    chkItemMenu(listL, shoeObject.getLeather + '_' + shoeObject.getLeatherNo);
}
function changeLeather(lthNo) {
    var $model = $('.main_model img');
    if (shoeObject.prevLeatherNo !== shoeObject.getLeatherNo) {
        shoeObject.prevLeatherNo = shoeObject.getLeatherNo;
    }
}

/*===============================================*/
/*==================== STYLE ====================*/
/*===============================================*/

function load_style_menu(mode) {
    var $this = $('.mask');
    var listS = '.selectSty';
    if (mode === 'sub-menu-style') {
        // console.log(mode, shoeObject, menuObject)
        if (prevStatus.prevLthSty !== shoeObject.getLeatherNo || prevStatus.prevStyle !== shoeObject.getStyle) {
            prevStatus.prevStyle = shoeObject.getStyle;
            prevStatus.prevMenu = menuObject.currentMenu; /*check status menu*/
            prevStatus.prevLthSty = shoeObject.getLeatherNo;
            load_style_xml();
        }
        $('.btnimg').stop(false, true).fadeIn();
        $(listS).stop(true, true).fadeIn('slow');
        $(listS).addClass('in');
    } else {
        prevStatus.prevStyle = '';
        $(listS).empty().removeClass('in').hide();
    }
}
function hideLaceMenu(onOff) {
    $laceItem = (shoeObject.getSpeci === 'laces') ? "<li id='laces' class='chk' data-lang='laces-stitching'>Laces/Stitching</li>" : "<li id='laces' data-lang='laces-stitching'>Laces/Stitching</li>";
    $this = $('.sub-menu-special').find('#laces');
    if (onOff === 'hide') {
        $this.remove();
    } else {
        $this.remove();
        $('.sub-menu-special').find('#mix-match').after($laceItem);
    }
}
function hideBackMenu(onOff) {
    $backItem = (shoeObject.getStyle === 'back') ? '<li id="back" class= "styShoe chk" data-lang="back-style">BACK STYLE</li>' : '<li id="back" class= "styShoe" data-lang="back-style"></li>';
    $this = $('.sub-menu-style').find('#back');
    $view = $('#view-select').find('#Back');
    if (onOff === 'hide') {
        $this.remove();
        $view.stop(false, true).hide();
    } else {
        $view.stop(false, true).show();
        $this.remove();
        $('.sub-menu-style').find('#side').after($backItem);
    }
    setLanguage();
}

function hideAccsMenu(onOff) {
    $accItem = (shoeObject.getStyle === 'accessory') ? '<li id="accessory" class= "styShoe chk" data-lang="accessory-style">ACCESSRY STYLE</li>' : '<li id="accessory" class= "styShoe" data-lang="accessory-style"></li>';
    $this = $('.sub-menu-style').find('#accessory');
    if (onOff === 'hide') {
        $this.remove();
    } else {
        $this.remove();
        $('.sub-menu-style').find('#sole').after($accItem);
    }
    setLanguage();
}
/*===============================================*/
/*================ MEASUREMENT ==================*/
/*===============================================*/

function load_measure_menu(mode) {
    var $mainMeasure = $('#main-measure');
    $mainMeasure.fadeOut();
}

/*===============================================*/
/*===================== VIEW ====================*/
/*===============================================*/

function load_View_Menu(mode) {
    var $this = $('#view-select');
    if (mode === 'sub-menu-leather' || mode === 'sub-menu-style' || mode === 'sub-menu-type') {
        $('.option-color').fadeOut();
        if (!$this.children().length > 0) {
            (menuObject.shoeType === 'boot') ? hideBackMenu('hide') : hideBackMenu();
            //            $this.hide().fadeIn()
        } else {
            //            $this.fadeIn('slow');
        }
        if (mode !== 'sub-menu-type') {
            $('#buttom-menu-header').fadeIn();
            $('.price-tag').show();
        } else {
            $('#buttom-menu-header').hide();
            $('.price-tag').hide();
        }
    } else {
        $('#buttom-menu-header').hide();
    }
    if (mode !== 'sub-menu-type') {
        $('.selectType').hide(function () {
            $('#buttom-menu').fadeIn();
            $('#prev-step').fadeIn();
        });
        $('#ShoeTypeDetail').hide();
        $('#over-view .pretitle').hide();
        $('#over-view .banner-announce').addClass('hidden');
    } else {
        $('#buttom-menu').hide();
        $('#prev-step').hide();
        $('.selectType').fadeIn();
        $('#over-view .pretitle').fadeIn();
        $('#over-view .banner-announce').removeClass('hidden');
        $('#ShoeTypeDetail').fadeIn();
        $('#view-select').hide();
        ShoeTypeDetail();
    }
}

/*===============================================*/
/*============== PRICE && COUPON ================*/
/*===============================================*/

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
//Toggle Price and Currency in Design Page
function toggle_price() {
    /*condition shoe sole min + price*/
    var sumPrice = "";
    try {

    } catch (e) {

    }

    if (!menuObject.setPrice) {
        return false;
    }

    sumPrice = parseFloat(menuObject.setPrice['price'][shoeObject.getLeather]);
    if (shoeObject.mixSolePriceStatus === "yes") {
        sumPrice = parseFloat(designObject.mixSolePrice[designObject.curr]) + sumPrice;
    }
    $('#tab-soleOption b').empty().html('+ ' + designObject.mixSolePrice[designObject.curr] + " " + menuObject.setPrice['sign']);
    $('.price-tag').empty().html(menuObject.setPrice['sign'] + " " + sumPrice);
    $('.price-tag-Shoe-Type').empty().html(menuObject.setPrice['sign'] + " " + sumPrice);
    shoeObject.getShoePrice = menuObject.setPrice['price'][shoeObject.getLeather];
    shoeObject.getMixPrice = menuObject.setPrice['mixprice'][shoeObject.getLeather];
}
function validate_measurement(elem, valid) {
    objId = elem.attr('id');
    if (valid) {
        objTag = '#' + objId + '-validate';
        $(objTag).fadeIn();
        elem.addClass('invalid-box');
    } else {
        objTag = '#' + objId + '-validate';
        $(objTag).fadeOut();
        elem.removeClass('invalid-box');
    }
}

//Default Undo Array
function valUndo() {
    var v = [];
    v[0] = shoeObject.getLeather;
    v[1] = shoeObject.getLeatherNo;
    v[2] = shoeObject.getFrontNo;
    v[3] = shoeObject.getSideNo;
    v[4] = shoeObject.getBackNo;
    v[5] = null; //type of menu
    v[6] = null; //shift array (stackCurrent +/- 2)
    v[7] = shoeObject.getFrontNoName;
    v[8] = shoeObject.getSideNoName;
    v[9] = shoeObject.getBackNoName;
    v[10] = shoeObject.setStatusMix;

    return v;
}

//Toggle status Undo/Redo Button
function toggleUndo(stackCurrent, stackLength) {
    var undo = $("#undo"),
        redo = $("#redo");
    stackCurrent <= 0 ? undo.attr("disabled", true).addClass('btnoff') : undo.attr("disabled", false).removeClass('btnoff');
    (stackCurrent + 1) >= stackLength ? redo.attr("disabled", true).addClass('btnoff') : redo.attr("disabled", false).removeClass('btnoff');
}

//Main Undo Function
function undoFunc(stat) {
    if (stat) {

        //$('.undoRedo').fadeIn();
        var stackCurrent = -1, stackLength = 0;
        var mainStack = []; //Main Array Stack
        var prevUndo = []; //Default value array
        var savetype = []; //Array for check begin stack each type
        toggleUndo(stackCurrent, stackLength);

        prevUndo.push(shoeObject.getLeather);
        prevUndo.push(shoeObject.getLeatherNo);
        prevUndo.push(shoeObject.getFrontNo);
        prevUndo.push(shoeObject.getSideNo);
        prevUndo.push(shoeObject.getBackNo);
        prevUndo.push(null); //type of menu
        prevUndo.push(null); //shift array (stackCurrent +/- 2)
        prevUndo.push(shoeObject.getFrontNoName);
        prevUndo.push(shoeObject.getSideNoName);
        prevUndo.push(shoeObject.getBackNoName);
        prevUndo.push(shoeObject.setStatusMix);

        $('#special-leather li,#special-back li,#special-side li,#special-front li,#special-laces li,#special-lining li,#special-stitching li').live('click', function () {
            var arrUndo = new valUndo();
            var nextUndo = new valUndo();
            var menuId = $(this).parents('.colorSty').attr('id').replace('special-', '');

            switch (menuId) {
                case 'leather':
                    if (jQuery.inArray(menuId, savetype) < 0) {
                        arrUndo[0] = prevUndo[0];
                        arrUndo[1] = prevUndo[1];
                        arrUndo[5] = menuId;
                        arrUndo[6] = 'shift';
                        arrUndo[10] = prevUndo[10];
                        savetype.push(menuId);
                        mainStack.push(arrUndo);
                        stackCurrent++;
                    }
                    break;
                case 'front':
                    if (jQuery.inArray(menuId, savetype) < 0) {
                        arrUndo[2] = prevUndo[2];
                        arrUndo[5] = menuId;
                        arrUndo[6] = 'shift';
                        arrUndo[7] = prevUndo[7];
                        arrUndo[10] = prevUndo[10];
                        savetype.push(menuId);
                        mainStack.push(arrUndo);
                        stackCurrent++;
                    }
                    break;
                case 'side':
                    if (jQuery.inArray(menuId, savetype) < 0) {
                        arrUndo[3] = prevUndo[3];
                        arrUndo[5] = menuId;
                        arrUndo[6] = 'shift';
                        arrUndo[8] = prevUndo[8];
                        arrUndo[10] = prevUndo[10];
                        savetype.push(menuId);
                        mainStack.push(arrUndo);
                        stackCurrent++;
                    }
                    break;
                case 'back':
                    if (jQuery.inArray(menuId, savetype) < 0) {
                        arrUndo[4] = prevUndo[4];
                        arrUndo[5] = menuId;
                        arrUndo[6] = 'shift';
                        arrUndo[9] = prevUndo[9];
                        arrUndo[10] = prevUndo[10];
                        savetype.push(menuId);
                        mainStack.push(arrUndo);
                        stackCurrent++;
                    }
                    break;
            }

            savetype[stackCurrent + 1] = menuId;
            nextUndo[5] = menuId;
            prevUndo = new valUndo();

            stackCurrent++;
            mainStack[stackCurrent] = nextUndo;

            stackLength = mainStack.length;
            mainStack.splice(stackCurrent + 1, stackLength - stackCurrent); //Delete current to end Array when change mainStack
            toggleUndo(stackCurrent, stackLength); //Toggle button status

            return false;
        });

        $("#redo,#undo").live('click', function (e) {
            e.preventDefault();
            var stack = [];

            if ($(this).attr('id') === 'undo') {
                if (mainStack[stackCurrent - 1][6] === 'shift') {
                    stackCurrent -= 2;
                    if (stackCurrent < 0) {
                        stackCurrent = 0;
                        menuTypeStack = mainStack[stackCurrent];
                    } else {
                        menuTypeStack = mainStack[stackCurrent + 1];
                    }
                } else {
                    stackCurrent--;
                    menuTypeStack = mainStack[stackCurrent + 1];
                }
            } else {
                mainStack[stackCurrent + 1][6] === 'shift' ? stackCurrent += 2 : stackCurrent++;
                menuTypeStack = mainStack[stackCurrent];
            }

            stack = mainStack[stackCurrent];
            toggleUndo(stackCurrent, stackLength);

            shoeObject.getLeather = stack[0];
            shoeObject.getLeatherNo = stack[1];
            shoeObject.getFrontNo = stack[2];
            shoeObject.getSideNo = stack[3];
            shoeObject.getBackNo = stack[4];
            shoeObject.getFrontNoName = stack[7];
            shoeObject.getSideNoName = stack[8];
            shoeObject.getBackNoName = stack[9];
            shoeObject.setStatusMix = stack[10];

            if (menuTypeStack[5] !== 'leather') {
                checkItem(menuTypeStack[5]);
            } else {
                checkItem(stack[0] + '_' + stack[1]);
            }
            toggle_layout();
            toggle_price();
        });
    } else {
        $('.undoRedo').fadeOut();
    }
}
