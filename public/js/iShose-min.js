$(document).ready(function () {
    DirectionOn();
    monogram();
    loadLanguage("English");

    var imgSoftTouch = new Image();
    imgSoftTouch.src = '../images/soft-touch.png';  // 20220220
    imgSoftTouch.onload = function () {
        $('#main-design .soft-touch a').append(this);
        setTimeout(function () {
            $('#main-design .soft-touch').find('img').addClass('visible');
            $('.sub-menu ul:first-child, .selectType li').live('click', function () {
                setTimeout(function () {
                    $('#main-design .soft-touch').empty();
                }, 1000);
            });
        }, 50);
    };

    $('#soleOption').soleMixPrice();
    $('.icon-info-blake-strtch').click(function () {
        loadPopUp('PopUpInfoBlakeStitch', 'divPopUpInfoBlakeStitch')
    });
    $('.MixbtnSlide').live('click', function () {
        $(this).Mixslide(Mix = { width: 250 })
    });
    $('#Recfront li canvas , #Recside li canvas').live('click', function () {
        var i = $(this).attr('id').replace('Rec', '');
        var t = $(this).attr('title');
        RecClickStyle(i, t)
    });
    $('#sideBorderOption').click(function () {
        shoeObject.optionBorderSlim = (shoeObject.optionBorderSlim === 'N') ? 'Y' : 'N';
        menuObject.statusPreDesign = false;
        toggle_layout()
    });
    $('#special-back li,#special-side li,#special-front li,#special-laces li,#special-lining li,#special-stitching li,#special-accessory li').live('click', function () {
        objUl = $(this).parents('.colorSty').attr('id').replace('special-', '');
        objId = $(this).attr('id');
        objName = $('#' + objId + ' img').attr('title');
        menuObject.statusPreDesign = false;
        switch (objUl) {
            case 'side':
                objId = $(this).attr('id').replace('side', '');
                shoeObject.getSideNo = objId;
                shoeObject.getSideNoName = objName;
                break;
            case 'front':
                objId = $(this).attr('id').replace('front', '');
                shoeObject.getFrontNo = objId;
                shoeObject.getFrontNoName = objName;
                break;
            case 'laces':
                shoeObject.getLacesNo = objId;
                shoeObject.getLacesName = objId;
                break;
            case 'back':
                objId = $(this).attr('id').replace('back', '');
                shoeObject.getBackNo = objId;
                shoeObject.getBackNoName = objName;
                break;
            case 'lining':
                objId = $(this).attr('id').replace('lining', '');
                shoeObject.getLiningNo = objId;
                shoeObject.getLiningName = objName;
                break;
            case 'stitching':
                shoeObject.getStitchingNo = objId;
                shoeObject.getStitchingName = objName;
                break;
            case 'accessory':
                objId = $(this).attr('id').replace('accessory', '');
                shoeObject.getAccessoryNo = objId;
                shoeObject.getAccessoryName = objName;
                break
        }
        checkItem(objUl);
        CheckMixMatch();
        toggle_layout();
        toggle_price()
    })
});
var MixMatch = { Leather: '', front: '', back: '', side: '', lining: '', accessory: '', laces: '' };
function loadOptionMaxMatch(a) {
    $('#MonogramDetail').hide();
    $T = $('.option-color');
    Path = 'elements/layout-option-color?option=';
    if (a === 'sub-menu-special') {
        shoeObject.currentView = 'Right';
        objSpeci = shoeObject.getSpeci;
        undoFunc(objSpeci === 'mix-match');
        if ($('#main-layout #Right').is(':hidden')) {
            $('#main-layout .main_model').hide();
            $('#main-layout #Right').fadeIn()
        }
        $('.colorSty').fadeOut().remove();
        if (objSpeci === 'mix-match') {
            if (shoeObject.getBack !== 'none' && shoeObject.shoeType != 'boot') {
                $T.hide().append($(LoopMixColor('back'))).fadeIn(function () {
                    setLanguage();
                    checkItem('back')
                })
            }
            if (shoeObject.getSide != 'none') {
                $T.hide().append($(LoopMixColor('side'))).fadeIn(function () {
                    setLanguage();
                    checkItem('side')
                })
            }
            if (shoeObject.getFront != 'none') {
                $T.hide().append($(LoopMixColor('front'))).fadeIn(function () {
                    setLanguage();
                    checkItem('front')
                })
            }
            if (shoeObject.getAccessory != 'none' && shoeObject.shoeType == 'loafers') {
                $T.hide().append($(LoopMixColor('accessory'))).fadeIn(function () {
                    setLanguage();
                    checkItem('accessory')
                })
            }
        } else if (objSpeci === 'laces' && (shoeObject.shoeType === 'derby' || shoeObject.shoeType === 'oxford' || shoeObject.shoeType === 'boot')) {
            type = menuObject.shoeType;
            $T.hide().append($(LoadOptionSpe('laces'))).show(function () {
                $('.colorSty').show(function () {
                    checkItem('laces');
                    setLanguage()
                })
            })
        } else if (objSpeci === 'brogue') {
        } else if (objSpeci === 'lining') {
            $T.hide().append($(LoadOptionSpe('lining'))).show(function () {
                $('.colorSty').show(function () {
                    checkItem('lining');
                    setLanguage()
                })
            })
        } else if (objSpeci === 'monogram') {
            $('#MonogramDetail').show();
            objMonogram = $('<ul class="colorSty" style = "margin:auto;position: relative;margin-top: 20px;width:700px;">');
            objMonogram.load(Path + 'monogram', function () {
                if (shoeObject.shoeType === 'boot') {
                    $('#monogram-box-inside').css('left', '280px')
                }
            });
            $T.hide().append(objMonogram).fadeIn()
        }
    } else {
        undoFunc(a === 'sub-menu-special');
        $T.fadeOut()
    }
}
function LoopMixColor(n) {
    $Tag = '<ul id="special-' + n + '" class="colorSty"><h2 class="text-title"  data-lang="' + n + '-color">' + n + ' color:</h2>';
    var o = MixMatch.Leather.Leather;
    var p = null;
    var q = [];
    for (i in o) {
        var r = o[i]['MIXGROUP'];
        if (shoeObject.getLeatherGroup === r) {
            for (var j in o[i]['COLOR']) {
                var s = o[i]['COLOR'][j]['ID'];
                if (n === 'front') {
                    p = MixMatch.front
                } else if (n === 'side') {
                    p = MixMatch.side
                } else if (n === 'back') {
                    p = MixMatch.back
                } else if (n === 'accessory') {
                    p = MixMatch.accessory
                }
                if (p !== '') {
                    for (var k in p) {
                        var u = p[k]['PATH'];
                        var v = p[k]['NAME'];
                        if (s === u) {
                            q.push("<li id='" + n + s + "'><img data-tagid='" + s + "' title='" + v + "' src = '../images/Menu/Leather/S/" + u + ".png'></li>")
                        }
                    }
                }
            }
        }
    }
    if (n === 'leather') {
        var o = MixMatch.Leather.Leather;
        for (i in o) {
            if (shoeObject.getLeatherGroup === o[i]['MIXGROUP']) {
                var w = o[i]['NAME'];
                var x = o[i]['COLOR'];
                for (j in x) {
                    var s = x[j]['ID'];
                    var v = x[j]['NAME'];
                    q.push("<li id='" + s + "' class='" + w + "'><img title='" + v + "' src = '../images/Menu/Leather/S/" + s + ".png'></li>")
                }
            }
        }
    }
    return $Tag + CreateTag(q, n) + '</ul>';
    function CreateTag(e, h) {
        var t = '';
        var j = 0;
        var a = "<div class='MixslideMain'>" + '\n';
        var f = "<div class='Mixslide'>" + '\n';
        var b = "<div class='MixslideItem'>" + '\n';
        var c = "</div>" + '\n';
        var d = '<li id="' + h + 'none"><img title="None" src = "images/remove.png"></li>' + '\n';
        var g = 0;
        var k = '<span class="MixBtnBack MixbtnSlide" id="btnBack">B</span>';
        var l = '<span class="MixBtnNext MixbtnSlide" id="btnNext">N</span>';
        var m = e.length;
        t += a;
        if (m >= 18) {
            t += k + l
        }
        t += f;
        for (i in e) {
            if (j++ === 0) {
                t += b;
                if (g === 0) {
                    if (h !== 'leather') {
                        t += d;
                        ++j
                    }
                    g = 1
                }
            }
            t += e[i] + '\n';
            if (j === 18 || j === m) {
                t += c;
                j = 0
            }
        }
        t += c + c;
        return t
    }
}
function LeatherColorMixGroup() {
    var a = { ID: [] };
    var c = 0;
    var b = MixMatch.Leather.Leather;
    for (var i in b) {
        if (shoeObject.getLeatherGroup === b[i]['MIXGROUP']) {
            for (var j in b[i]['COLOR']) {
                a.ID.push(b[i]['COLOR'][j]['ID'])
            }
        }
    }
    var d = shoeObject.getFrontNo;
    var e = shoeObject.getSideNo;
    var f = shoeObject.getBackNo;
    var g = shoeObject.getAccessoryNo;
    if (SearchIndex(d)) {
        shoeObject.getFrontNo = 'none';
        shoeObject.getFrontNoName = 'none'
    }
    if (SearchIndex(e)) {
        shoeObject.getSideNo = 'none';
        shoeObject.getSideNoName = 'none'
    }
    if (SearchIndex(f)) {
        shoeObject.getBackNo = 'none';
        shoeObject.getBackNoName = 'none'
    }
    if (SearchIndex(g)) {
        shoeObject.getAccessoryNo = 'none';
        shoeObject.getAccessoryName = 'none'
    }
    function SearchIndex(k) {
        return a.ID.indexOf(k) === (-1) ? true : false
    }
    toggle_layout()
}
function CheckMixMatch() {
    if (shoeObject.getFrontNo !== 'none' || shoeObject.getSideNo !== 'none' || shoeObject.getBackNo !== 'none') {
        shoeObject.setStatusMix = true
    } else {
        shoeObject.setStatusMix = false
    }
}
function monogram() {
    $('#Mono-detail-main input:checkbox').change(function () {
        idCheck = $(this).attr('id');
        if ($(this).attr('checked')) {
            tagMain = $(this).parents('div');
            idInput = $(tagMain).find('input:text').attr('id');
            $('#' + idInput).prop("disabled", false);
            toggle(idCheck)
        } else {
            tagMain = $(this).parents('div');
            idInput = $(tagMain).find('input:text').attr('id');
            $('#' + idInput).prop("disabled", true).val(null);
            if (idCheck === 'checkbox-2-1') {
                shoeObject.getMonoIn = '';
                $('#monoInText').text('');
                $('#monogram-box-inside').fadeOut()
            } else {
                shoeObject.getMonoOut = '';
                $('#monoOutInput').text('');
                $('#monogram-box-outside').fadeOut()
            }
        }
    });
    $('#Mono-detail-main input:text').focus(function () {
        id = $(this).attr('id');
        tag = (id === 'input-inside') ? 'checkbox-2-1' : 'checkbox-2-2';
        toggle(tag);
        $('#monoInText').text(shoeObject.getMonoIn);
        $('#monoOutInput').text(shoeObject.getMonoOut)
    });
    $('#Mono-detail-main input:text').keyup(function () {
        id = $(this).attr('id');
        value = $(this).val();
        var a = /[\0\sa-zA-Z0-9]$/;
        if (a.test(value)) {
            if (id === 'input-inside') {
                shoeObject.getMonoIn = value;
                $('#monoInText').text(shoeObject.getMonoIn);
                $('#measure-form #frm-monoIn').val(shoeObject.getMonoIn)
            } else {
                shoeObject.getMonoOut = value;
                $('#monoOutInput').text(shoeObject.getMonoOut);
                $('#measure-form #frm-monoOut').val(shoeObject.getMonoOut)
            }
        } else {
            if (id === 'input-inside') {
                $('#monoInText').text('');
                $('#measure-form #frm-monoIn').val('');
                $(this).val(shoeObject.getMonoIn)
            } else {
                $('#monoOutInput').text('');
                $('#measure-form #frm-monoOut').val('');
                $(this).val(shoeObject.getMonoOut)
            }
        }
    });
    function toggle(a) {
        $('.monogram-box').hide();
        if (a === 'checkbox-2-1') {
            if (!$('#main-layout #Right').is(':visible')) {
                $('.main_model').hide();
                $('#main-layout #Right').fadeIn().stop('true', 'true')
            }
            (!$('#monogram-box-inside').is(':visible')) ? $('#monogram-box-inside').fadeIn() : $('#monogram-box-inside').fadeOut()
        } else {
            if (!$('#main-layout #Under').is(':visible')) {
                $('.main_model').hide();
                $('#main-layout #Under').fadeIn().stop('true', 'true')
            }
            (!$('#monogram-box-outside').is(':visible')) ? $('#monogram-box-outside').fadeIn() : $('#monogram-box-outside').fadeOut()
        }
    }
}
function checkItem(a) {
    var b = '';
    var c = '';
    switch (a) {
        case 'leather':
            b = shoeObject.getLeatherNo;
            break;
        case 'back':
            b = shoeObject.getBackNo;
            if (!b)
                b = "none";
            break;
        case 'side':
            b = shoeObject.getSideNo;
            if (!b)
                b = "none";
            break;
        case 'front':
            b = shoeObject.getFrontNo;
            if (!b)
                b = "none";
            break;
        case 'laces':
            b = shoeObject.getLacesNo;
            break;
        case 'stitching':
            b = shoeObject.getStitchingNo;
            break;
        case 'brogue':
            b = shoeObject.getBrogueNo;
            break;
        case 'lining':
            b = shoeObject.getLiningNo;
            break;
        case 'accessory':
            b = shoeObject.getAccessoryNo;
            break
    }
    var d = $('<img>').addClass('chkItem').attr('src', '../images/CheckMarkBlue.png');
    if (a === 'laces' || a === 'stitching') {
        c = b;
        $('#special-' + a).find('.chkItem').remove();
        $('#special-' + a).find('#' + c).append(d)
    } else if (a === 'leather') {
        c = b;
        $('#' + c).parents('.colorSty').find('.chkItem').remove();
        $('.option-color').find('#' + c).append(d)
    } else {
        c = a + b;
        $('#' + c).parents('.colorSty').find('.chkItem').remove();
        $('.option-color').find('#' + c).append(d)
    }
}
function LoadOptionSpe(a) {
    var b = '';
    var f = '';
    var g = '<h2 class="text-title"  data-lang="laces-color">Laces color:</h2>';
    var h = '<h2 class="text-title"  data-lang="choose-lining">choose Lining:</h2>';
    var j = '<li id="' + a + "none" + '"><img data-tagid="none" title="None" src = "../images/remove.png"></li>';
    if (a === 'laces') {
        b = MixMatch.laces;
        f += g
    } else {
        b = MixMatch.lining;
        f += h
    }
    for (i in b) {
        var c = b[i]['KEY'];
        var d = b[i]['NAME'];
        var e = b[i]['PATH'];
        f += '<li id="' + c + '"><img title="' + d + '" src = "../images/Menu/' + e + '.png"></li>'
    }
    return '<ul id="special-' + a + '" class="colorSty">' + f + '</ul>'
}
function loadLanguage(b) {
    b = b === null ? 'English' : b;
    $.getJSON('/designshoes/elements/loadDataLang?langth=' + b, function (a) {
        listEle.objLang = a;
        if (menuObject.currentMenu === 'menu-main-type') {
            callOption('sub-menu-type')
        }
        setLanguage()
    })
}
function setLanguage() {
    $('[data-lang]').each(function () {
        objTag = $(this).attr('data-lang');
        objvalue = listEle.objLang[objTag];
        objFind = $('body').find("[data-lang='" + objTag + "']");
        $(objFind).text(objvalue)
    });
    if (menuObject.currentMenu === 'menu-main-color') {
        $('.choose-style-text').html(listEle.objLang['choose-leather'])
    } else if (menuObject.currentMenu === 'menu-main-style') {
        $('.choose-style-text').html(listEle.objLang['choose-' + shoeObject.getStyle])
    }
    setMonk()
}
var objViewx = { currentView: null, ShapeBeFore: null, SoleBorderBeFore: null, SoleBeFore: null };
function toggle_layout() {
    if ($('#gauge-clone').length <= 0)
        return false;
    SetOptionDesign(shoeObject.shoeType);
    chkType();
    CreateValurFrm();
    $('#layout-clone').remove();
    $('body').after('<div id="layout-clone">');
    $('#layout-clone').append('<div id="Right">').hide();
    $('#layout-clone').append('<div id="Left">');
    $('#layout-clone').append('<div id="Under">');
    $('#layout-clone').append('<div id="ImgMissing">');
    var e = $('#main-layout .main_model:visible').attr('id');
    if (e) {
        objViewx.currentView = e
    } else {
        e = shoeObject.currentView;
        objViewx.currentView = shoeObject.currentView
    }
    if (e === 'Under' || (objViewx.ShapeBeFore !== shoeObject.getShape) || (objViewx.SoleBeFore !== shoeObject.getSole)) {
        objViewx.ShapeBeFore = shoeObject.getShape;
        ToggleLayoutSole();
        if (objViewx.SoleBorderBeFore !== shoeObject.getSoleBorder) {
            toggleLayoutOther();
            objViewx.SoleBorderBeFore = shoeObject.getSoleBorder
        }
    }
    if (e != 'Under') {
        create_layout(e);
        var f = document.getElementById('gauge-clone');
        var g = f.getContext('2d');
        var W = f.width;
        var H = f.height;
        $('#gauge-clone').css({ top: $('#main-layout').height() / 2 - (H / 2), left: $('#main-layout').width() / 2 - (W / 2) }).fadeIn();
        drawCanvasBase(g, W, H);
        loaded = $('#layout-clone #' + e).imagesLoaded();
        loaded.progress(function (a, b, c, d) {
            DirectionOff();
            arcIncrement.percent = Math.round(((c.length + d.length) * 100) / b.length);
            if (arcIncrement.percent <= 100) {
                arcIncrement.startCanvas = Math.round(((c.length + d.length) * 100) / b.length) * (2 * Math.PI / 100);
                initCanvasStaff(g, "rgba(255,255,255,0.6)", "#FFF", W, H)
            }
        });
        loaded.always(function () {
            $('#main-layout #' + e).html($('#layout-clone #' + e + ' img'));
            toggleLayoutOther()
        })
    }
}
function toggleLayoutOther() {
    $('#gauge-clone').fadeOut(function () {
        arcIncrement.percent = 0;
        arcIncrement.startCanvas = 0
    });
    $('#main-layout .main_model:hidden').each(function () {
        var v = $(this).attr('id');
        if (objViewx.currentView != v && v != 'Under') {
            create_layout(v);
            $('#main-layout #' + v).html($('#layout-clone #' + v + ' img'))
        }
    });
    loadedDirection = $('#main-layout').imagesLoaded();
    loadedDirection.progress(function (a, b, c, d) {
        arcIncrement.percent = Math.round(((c.length + d.length) * 100) / b.length)
    });
    loadedDirection.always(function () {
        cloneDirection();
        DirectionOn();
        objViewx.currentView = null
    })
}
function create_layout(a) {
    if (a == 'Under') {
        return false
    }
    objAccessory = 'none';
    objImgAccessory = '';
    objFolderBack = shoeObject.getBack;
    objFoldergetFront = shoeObject.getFront;
    objFoldergetSide = shoeObject.getSide;
    objAccessory = shoeObject.getAccessory;
    objBorder = '';
    objImgSide = (shoeObject.getSideNo != '' && shoeObject.getSideNo != 'none') ? shoeObject.getSideNo : shoeObject.getLeatherNo;
    objImgBorder = (shoeObject.getSideNo != '' && shoeObject.getSideNo != 'none') ? shoeObject.getSideNo : shoeObject.getLeatherNo;
    objImgFront = (shoeObject.getFrontNo != '' && shoeObject.getFrontNo != 'none') ? shoeObject.getFrontNo : shoeObject.getLeatherNo;
    objImgLaces = (shoeObject.getLacesNo != '' && shoeObject.getLacesNo != 'none') ? shoeObject.getLacesNo : shoeObject.getLeatherNo;
    objImgLining = (shoeObject.getLiningNo != '' && shoeObject.getLiningNo != 'none') ? shoeObject.getLiningNo : 'none';
    objImgBack = (shoeObject.getBackNo != '' && shoeObject.getBackNo != 'none') ? shoeObject.getBackNo : shoeObject.getLeatherNo;
    objImgSole = (shoeObject.getSole != '' && shoeObject.getSole != 'none') ? shoeObject.getSole : 'none';
    objImgAccessory = (shoeObject.getAccessoryNo != '' && shoeObject.getAccessoryNo != 'none') ? shoeObject.getAccessoryNo : shoeObject.getLeatherNo;
    objImgMissing = 'images/missing.png';
    if (!shoeObject.getSoleBorder) {
        shoeObject.getSoleBorder = "LE2"
    }
    objPath = '../images/MainBody/' + menuObject.folderType + '/' + shoeObject.getShape + '/MainMix/' + a;
    objMain = '../images/MainBody/' + menuObject.folderType + '/' + shoeObject.getShape + '/' + a + '/' + shoeObject.getLeatherNo + '.png';
    objBack = objPath + '/Back/' + objFolderBack + '/' + objImgBack + '.png';
    objFront = (a != 'Back') ? objPath + '/Front/' + objFoldergetFront + '/' + objImgFront + '.png' : '';
    objSlide = (a == 'Back') ? objSlide = objPath + '/Side/' + objImgSide + '.png' : objPath + '/Side/' + objFoldergetSide + '/' + objImgSide + '.png';
    objlaces = objPath + '/Shoeslace/' + objImgLaces + '.png';
    objlining = objPath + '/Lining/' + objImgLining + '.png';
    objSole = objPath + '/Sole/' + objImgSole + '.png';
    objBorderSole = objPath + '/Sole/' + shoeObject.getSoleBorder + '.png';
    if ((a == 'Left' || a == 'Right') && shoeObject.shoeType == 'loafers') {
        var b = shoeObject.optionBorderSlim;
        objBorder = (a != 'Left') ? (b == 'Y' ? 'Borderslim' : 'BorderRegular') : (b == 'Y' ? 'BorderslimL' : 'BorderRegularL');
        objBorder = '../images/MainBody/Loafers/' + objBorder + '/' + objImgBorder + '.png';
        objAccessory = objPath + '/Accessory/' + objAccessory + '/' + objImgAccessory + '.png'
    }
    objMain = (objMain.indexOf('none')) > -1 || objMain == "" ? objImgMissing : objMain;
    objBack = (objBack.indexOf('none')) > -1 || objBack == "" ? objImgMissing : objBack;
    objFront = (objFront.indexOf('none')) > -1 || objFront == "" ? objImgMissing : objFront;
    objSlide = (objSlide.indexOf('none')) > -1 || objSlide == "" ? objImgMissing : objSlide;
    objBorder = (objBorder.indexOf('none')) > -1 || objBorder == "" ? objImgMissing : objBorder;
    objlaces = (objlaces.indexOf('none')) > -1 || objlaces == "" ? objImgMissing : objlaces;
    objlining = (objlining.indexOf('none')) > -1 || objlining == "" ? objImgMissing : objlining;
    objSole = (objSole.indexOf('none')) > -1 || objSole == "" ? objImgMissing : objSole;
    objAccessory = (objAccessory.indexOf('none')) > -1 || objAccessory == "" ? objImgMissing : objAccessory;
    if (a !== 'Under') {
        if (a != 'Back' && objFront && objFoldergetFront)
            $('#layout-clone #' + a).prepend('<img id="front" src="' + objFront + '" />');
        if (objMain)
            $('#layout-clone #' + a).prepend('<img class="main" src="' + objMain + '" />');
        if (a != 'Back') {
            if (objlaces && (shoeObject.shoeType == 'oxford' || shoeObject.shoeType == 'derby' || shoeObject.shoeType == 'boot'))
                $('#layout-clone #' + a).prepend('<img id="laces" src="' + objlaces + '" />');
            if (objSlide && objFoldergetSide)
                $('#layout-clone #' + a).prepend('<img id="side" src="' + objSlide + '" />')
        }
        if (objBack) {
            if (shoeObject.shoeType !== 'boot')
                $('#layout-clone #' + a).prepend('<img id="back" src="' + objBack + '" />')
        }
        if (objlining && (a == 'Left' || a == 'Right'))
            $('#layout-clone #' + a).prepend('<img id="lining" src="' + objlining + '" />');
        if (objBorderSole && a != 'Back')
            $('#layout-clone #' + a).prepend('<img id="BorderSole" src="' + objBorderSole + '" />')
    } else {
        objSoleMain = '../images/MainBody/' + menuObject.folderType + '/Sole/' + shoeObject.getShape + '/' + objImgSole + '.png'
    }
    if (shoeObject.shoeType === 'loafers' && objBorder !== '' && (a === 'Left' || a === 'Right')) {
        $('#layout-clone #' + a).prepend('<img id="optionBorder" src="' + objBorder + '" />');
        if (objAccessory) {
            $('#layout-clone #' + a).prepend('<img id="Accessory" src="' + objAccessory + '" />')
        }
    }
    errorImg();
    if (shoeObject.shoeType === 'oxford') {
        $('#layout-clone #side', '#view-select #side').css('z-index', '15');
        $('#layout-clone #front,#view-select #front').css('z-index', '20')
    }
    if (shoeObject.shoeType === 'derby' || shoeObject.shoeType === 'monk') {
        $('#layout-clone #front,#view-select #front').css('z-index', '15');
        $('#layout-clone #side', '#mview-select #side').css('z-index', '20')
    }
}
function ToggleLayoutSole() {
    var e = '../images/MainBody/' + menuObject.folderType + '/Sole/' + shoeObject.getShape + '/' + shoeObject.getSole + '.png';
    var f = '../images/MainBody/' + menuObject.folderType + '/Sole/BlakeSticht/' + shoeObject.getShape + '/LT-B01.png';
    var g = 'images/missing.png';
    $('#layout-clone #ImgMissing').prepend('<img id="ImgMissing" src="' + g + '" />');
    if (shoeObject.mixSolePriceStatus === "yes") {
        $('#layout-clone #Under').prepend('<img id="soleSticht" src="' + f + '" />')
    }
    $('#layout-clone #Under').prepend('<img id="UnderS" src="' + e + '" />');
    var h = document.getElementById('gauge-clone');
    var i = h.getContext('2d');
    var W = h.width;
    var H = h.height;
    $('#gauge-clone').css({ top: $('#main-layout').height() / 2 - (H / 2), left: $('#main-layout').width() / 2 - (W / 2) }).fadeIn();
    drawCanvasBase(i, W, H);
    var j = $('#layout-clone').imagesLoaded();
    j.progress(function (a, b, c, d) {
        DirectionOff();
        arcIncrement.percent = Math.round(((c.length + d.length) * 100) / b.length);
        if (arcIncrement.percent <= 100) {
            arcIncrement.startCanvas = Math.round(((c.length + d.length) * 100) / b.length) * (2 * Math.PI / 100);
            initCanvasStaff(i, "rgba(255,255,255,0.6)", "#FFF", W, H)
        }
    });
    j.always(function () {
        $('#gauge-clone').fadeOut(function () {
            arcIncrement.percent = 0;
            arcIncrement.startCanvas = 0
        });
        $('#main-layout #Under').html($('#layout-clone #Under img'));
        DirectionOn();
        objUnderview = $('#view-select #Underview');
        $('#view-select #Underview img').remove();
        $('#main-layout #Under img').clone().appendTo(objUnderview).show()
    })
}
function cloneDirection() {
    objRight = $('#view-select #Right');
    objLeft = $('#view-select #Left');
    objUnderview = $('#view-select #Underview');
    $('#view-select #Left img,#view-select #Right img').remove();
    $('#main-layout #Left img').clone().appendTo(objLeft).show();
    $('#main-layout #Right img').clone().appendTo(objRight).show()
}
function DirectionOn() {
    $(".direction").live('click', function () {
        var i = $(this).attr('id');
        if (i === shoeObject.currentView)
            return false;
        if (i === 'Underview') {
            i = 'Under'
        }
        shoeObject.currentView = i;
        ToggleShoeDetail();
        $('.main_model').hide();
        $('#' + i).fadeIn().stop('true', 'true');
        toggleOptionSoleMix()
    }).css('cursor', 'pointer');
    $('#imgPreLoadDirection').fadeOut()
}
function DirectionOff() {
    $(".direction").die('click').css('cursor', 'wait');
    $('#imgPreLoadDirection').fadeIn()
}
function errorImg() {
    $('img').each(function () {
        $(this).error(function () {
            $(this).remove()
        })
    })
}
var arrStyle = { type: null, shape: null, back: null, sole: null, acce: null, side: null };
function load_style_xml() {
    var m = $('.mask');
    var n = '.selectSty';
    Loadxml(function () {
        LoopStyle()
    });
    function Loadxml(b) {
        if (arrStyle.type !== shoeObject.shoeType) {
            $.getJSON('elements/loadXmlStyle_2?type=' + shoeObject.shoeType, function (a) {
                console.log(a);
                arrStyle.type = shoeObject.shoeType;
                arrStyle.shape = a['shape'];
                arrStyle.back = a['back'];
                arrStyle.side = a['side'];
                arrStyle.sole = a['sole'];
                arrStyle.acce = a['accessory'];
                b()
            })
        } else {
            b()
        }
    }
    function LoopStyle() {
        var a = shoeObject.getStyle;
        var b = shoeObject.getLeatherNo;
        var c = shoeObject.folderType;
        var d = shoeObject.getFront;
        var e = null;
        if (a === 'back') {
            e = arrStyle.back;
            b = shoeObject.getBackNo !== 'none' ? shoeObject.getBackNo : b
        } else if (a === 'shape') {
            e = arrStyle.shape
        } else if (a === 'sole') {
            e = arrStyle.sole
        } else if (a === 'accessory') {
            e = arrStyle.acce;
            b = shoeObject.getAccessoryNo !== 'none' ? shoeObject.getAccessoryNo : b
        } else if (a === 'side') {
            e = arrStyle.side;
            b = shoeObject.getSideNo !== 'none' ? shoeObject.getSideNo : b
        } else {
            e = arrStyle.side;
            b = shoeObject.getFrontNo !== 'none' ? shoeObject.getFrontNo : b
        }
        var t = "<ul>";
        // Shape, Back, Sole
        if (a !== 'front' && a !== 'side' && a !== 'accessory') {
            for (var i in e) {
                var f = e[i]['id'];
                var g = e[i]['path'];
                var h = e[i]['name'];

                /*if (a !== 'sole' && f !== 'removenone') {
                    t += '<li id="' + f + '" class="' + a + '"><img class="itemList" src = "../images/Menu/' + g + b + '.png" title="' + h + '"></li>'
                } else if (f === 'removenone') {
                    t += '<li id="' + f + '" class="' + a + '"><img class="itemList" src = "../images/Menu/Style/' + g + '.png" title="' + h + '"></li>'
                } else if (a === 'sole') {
                    if ((c !== "Loafers" && c !== "Fashion") && (f !== "RBB-22" && f !== "RBD")) {
                        t += '<li id="' + f + '" class="' + a + '"><img class="itemList" src = "../images/Menu/Sole/' + shoeObject.getShape + '/' + g + '.png" title="' + h + '"></li>'
                    } else if (c === "Loafers" || c === "Fashion") {
                        t += '<li id="' + f + '" class="' + a + '"><img class="itemList" src = "../images/Menu/Sole/' + shoeObject.getShape + '/' + g + '.png" title="' + h + '"></li>'
                    }
                } else {
                    t += '<li id="' + f + '" class="' + a + '"><img class="itemList" src = "../images/Menu/' + g + '.png" title="' + h + '"></li>'
                }*/
                if (a === 'sole') {
                    if ((c !== "Loafers" && c !== "Fashion") && (f !== "RBB-22" && f !== "RBD")) {
                        t += '<li id="' + f + '" class="' + a + '"><img class="itemList" src = "../images/Menu/Sole/' + shoeObject.getShape + '/' + g + '.png" title="' + h + '"></li>'
                    } else if (c === "Loafers" || c === "Fashion") {
                        t += '<li id="' + f + '" class="' + a + '"><img class="itemList" src = "../images/Menu/Sole/' + shoeObject.getShape + '/' + g + '.png" title="' + h + '"></li>'
                    }
                } else {
                    g = g.slice(0, g.length - 1);
                    t += '<li id="' + f + '" class="' + a + '"><img class="itemList" src = "../images/MenuNew/' + g + '.png" title="' + h + '"></li>'
                }
            }
        } else if (a === 'accessory') {
            for (var i in e) {
                var f = e[i]['id'];
                var g = e[i]['path'];
                var h = e[i]['name'];
                if (f === 'none') {
                    t += '<li id="none" class="accessory"><img class="itemList" src = "../images/Menu/Style/remove.png" title="none"></li>'
                } else {
                    t += '<li id="' + f + '" class="accessory"><img class="itemList" src = "../images/Menu/' + g + '/' + b + '.png" title="' + h + '"></li>'
                }
            }
        } else if (a === 'front') {
            for (i in e) {
                if (i === 'None' || i === 'none') {
                    //t += '<li id="none" class="front"><img class="itemList" src = "../images/Menu/Style/remove.png" title="FRONT STYLE NONE"></li>';
                    t += '<li id="none" class="front"><img class="itemList reflect-a" src = "../images/MenuNew/Style/remove.png" title="FRONT STYLE NONE"></li>';
                } else {
                    /*
                    if (shoeObject.getShape === 'Sharp' && shoeObject.shoeType === 'loafers' && i === 'FT14') {
                    } else if (shoeObject.shoeType === "loafers" && (b === "FN1" || b === "FN2" || b === "FN3" || b === "FN4" || b === "FN5" || b === "FN6" || b === "FN7" || b === "FN8" || b === "FN9" || b === "FN10" || b === "FN11" || b === "FN12" || b === "FN13" || b === "FN14") && (i === "FT14" || i === "FT15")) {
                    } else {
                        t += '<li id="' + i + '" class="front"><img class="itemList" src = "../images/Menu/Front/' + i + '/' + b + '.png" title="FRONT STYLE ' + i + '"></li>'
                    }*/
                    t += '<li id="' + i + '" class="front"><img class="itemList reflect-a" src = "../images/MenuNew/Front/' + i + '.png" title="FRONT STYLE ' + i + '"></li>'
                }
            }
        } else {
            var classList = "itemList";

            if (a === "side") {
                classList += " reflect-a";
            }

            for (i in e) {
                if (d === i) {
                    for (j in e[i]) {
                        if (e[i][j]['id'] === 'None' || e[i][j]['id'] === 'none') {
                            t += '<li id="none" class="side"><img class="' + classList + '" src = "../images/MenuNew/Style/remove.png" title="SIDE STYLE NONE"></li>'
                        } else {
                            //t += '<li id="' + e[i][j]['id'] + '" class="side"><img class="itemList" src = "../images/Menu/Side/' + c + '/' + e[i][j]['id'] + '/' + b + '.png" title="SIDE STYLE ' + e[i][j]['id'] + '"></li>'
                            t += '<li id="' + e[i][j]['id'] + '" class="side"><img class="' + classList + '" src = "../images/MenuNew/Side/' + c + '/' + e[i][j]['id'] + '.png" title="SIDE STYLE ' + e[i][j]['id'] + '"></li>'
                        }
                    }
                }
            }
        }
        t += "</ul>";
        var k = t;
        if (shoeObject.shoeType === "monk" && shoeObject.getStyle === "side") {
            $('.choose-style-text').html(listEle.objLang['choose-side-monk'])
        } else {
            $('.choose-style-text').html(listEle.objLang['choose-' + shoeObject.getStyle])
        }
        if (shoeObject.getStyle !== 'sole') {
            if ($('#Right').is(':hidden')) {
                $('.main_model').hide();
                $('#Right').stop(true, true).fadeIn();
                shoeObject.currentView = 'Right'
            }
        } else {
            $('.main_model').hide();
            $('#Under').fadeIn();
            shoeObject.currentView = 'Under'
        }
        var e = shoeObject.getStyle;
        var l = '';
        if (e === 'shape')
            l = 'shape-' + shoeObject.getShape;
        if (e === 'front')
            l = shoeObject.getFront;
        if (e === 'side')
            l = shoeObject.getSide;
        if (e === 'back')
            l = shoeObject.getBack;
        if (e === 'sole')
            l = shoeObject.getSole;
        if (e === 'accessory')
            l = shoeObject.getAccessory;
        $(n).empty().html(k).slide(6);
        getDimention($(k).find('li').length);
        chkItemMenu(n, l);
        TitleShape()
    }
}
var Rce = { type: null, id: null, title: null };
function PopUpRecommend() {
    Rce.type = null;
    Rce.id = null;
    Rce.title = null;
    var j = 0, a = [], b = [];
    var c = $('.selectSty ul li').attr('class');
    $('.' + c).each(function () {
        var i = $(this).attr('id');
        a.push(i);
        b.push($('#' + i + ' img').attr('title'));
        Rce.id = a;
        Rce.title = b;
        Rce.type = c
    })
}
function Recommend() {
    if ((shoeObject.getStyle === 'front' || shoeObject.getStyle === 'side') && (menuObject.currentMenu === 'menu-main-style')) {
        $('.linkRecommend').fadeIn()
    } else {
        $('.linkRecommend').hide()
    }
}
var Frm = { status: false };
$.fn.FrmValidationEngine = function () {
    $this = $(this).attr('id');
    frm = $('#' + $this);
    frmInput = $('#' + $this + ' input, #' + $this + ' select');
    frmInput.live('keyup focusout', function () {
        i = $(this);
        t = i.attr('data-validation');
        v = i.val();
        m = $(i.parent('p'));
        if (t) {
            if (validationEngine(t, v)) {
                i.removeClass('validation');
                m.removeClass('validation-main')
            } else {
                i.addClass('validation');
                m.addClass('validation-main');
                $('.validation-tooltip').remove();
                $('.validation-arrow').remove()
            }
        }
        Frm.status = false
    });
    frmInput.live('mouseover', function () {
        t = $(this).parent('p');
        if ($(t).children().length === '2' && $(t).hasClass('validation-main')) {
            a = '<span class="validation-tooltip">This Field is required.</span><span class="validation-arrow"></span>';
            $(a).appendTo(t)
        }
    });
    frmInput.live('mouseout', function () {
        t = $(this).parent('p');
        if ($(t).children().length > '2') {
            $('.validation-tooltip').remove();
            $('.validation-arrow').remove()
        }
    });
    frm.live('submit', function () {
        chkAll()
    });
    $('#buttonCheckPayPal,#buttonCheckout').live('click', function () {
        chkAll();
        if (Frm.status) {
            return true
        } else {
            return false
        }
    });
    if (Frm.status) {
        return true
    } else {
        return false
    }
    function chkAll() {
        Frm.status = true;
        $(frmInput).each(function () {
            i = $(this);
            visible = $(this).is(':visible');
            t = $(i).attr('data-validation');
            v = $(i).val();
            m = i.parent('p');
            if (t && visible) {
                if (validationEngine(t, v)) {
                    i.removeClass('validation');
                    m.removeClass('validation-main')
                } else {
                    i.addClass('validation');
                    m.addClass('validation-main');
                    Frm.status = false
                }
            } else {
                i.removeClass('validation');
                m.removeClass('validation-main')
            }
        })
    }
    function validationEngine(t, v) {
        var a = { email: /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/, number: /^[0-9][0-9]*$/ };
        if (t === 'req') {
            return v !== ''
        } else if (t === 'email') {
            return a.email.test(v) && v !== ''
        } else if (t === 'number') {
            return a.number.test(v) && v !== ''
        } else if (t === 'select') {
            return v !== 'Choose country'
        }
    }
}
    ;
$.fn.Mixslide = function (a) {
    var b = $(this).attr('id');
    var c = $(this).parents('.MixslideMain');
    var d = $(c).find('.Mixslide').width();
    var e = $(c).find('.MixslideItem').length;
    var f = parseInt($(c).find('.Mixslide').css('margin-left').replace('px', ''));
    var g = a.width;
    if (b === 'btnBack') {
        if (f < 0) {
            f = f + g;
            $(c).find('.Mixslide').animate({ 'marginLeft': (f) }, 500)
        }
    } else {
        if ((e - 1) * g > f * (-1)) {
            f = f - g;
            $(c).find('.Mixslide').animate({ 'marginLeft': (f) }, 500)
        }
    }
};
function ShoeTypeDetail() {
    var i = null;
    var a = null;
    var b = null;
    i = shoeObject.shoeType;
    if (i === 'oxford') {
        Header = "OXFORD SHOES";
        b = "Oxford shoe is a style of leather shoe with enclosed lacing.You can customize each area with iShoes 3D Designer,from combining 100s of leather and thousands of styles"
    } else if (i === 'derby') {
        Header = "DERBY SHOES";
        b = "Derby shoe(or Gibson) is a style of shoe characterized by shoelace eyelet tabs that are sewn on top of a single-piece vamp.You will be able to customize/design every detail of this Derby Shoes type."
    } else if (i === 'loafers') {
        Header = "LOAFERS SHOES";
        b = "Loafers are typically low, lace-less shoes.there are accessory details that you can customize and create your own design in this loafer shoe type by iShoes."
    } else if (i === 'fashion') {
        Header = "FASHION SHOES";
        b = "Fashion Shoes,are slips on lace-less shoes,it has elastic on the upper and assure high comfort,looks trendy and also smart casual shoe type."
    } else if (i === 'boot') {
        Header = "BOOT SHOES";
        b = "Our iShoes Boot collection is our interpretation of the classic Boot design. Our boots mainly covers the foot and ankle areas. You can customise any part of the Boots with your choice of leather as well as other personalisation options."
    } else if (i === 'monk') {
        Header = "MONK SHOES";
        b = "Our iShoes Monk is our own collection of Monk styled shoes - no laces, closed by a buckle and strap. Monks are smart, casual-wear shoes that can also be worn formally making it the most sought after category of shoes. The design options we provide are truly limitless - you can customise the upper, side, strab, back and sole features of the shoes, as well select contrasts from over 90 leather choices."
    }
    $('#ShoeType-Header').text(Header);
    $('#Shoetype-Detail').text(b)
}
function ToggleShoeDetail() {
    if (shoeObject.currentView === 'Left') {
        $('#ShoeDetails').css({ 'display': 'block', 'position': 'absolute', 'left': 35, 'right': '', 'top': 40 })
    } else if (shoeObject.currentView === 'Under') {
        $('#ShoeDetails').css({ 'display': 'block', 'position': 'absolute', 'left': '', 'right': -100, 'top': 245 })
    } else {
        $('#ShoeDetails').css({ 'display': 'block', 'position': 'absolute', 'right': 160, 'left': '', 'top': 75 })
    }
}
function ToggleShoeDesign() {
    if (menuObject.currentMenu === "menu-main-color" || menuObject.currentMenu === "menu-main-style") {
        $('#ShoeDetails').fadeIn();
        $('#view-select').fadeIn();
        ToggleShoeDetail()
    } else {
        if (menuObject.currentMenu === "menu-main-type") {
            if (shoeObject.currentView !== 'Right') {
                $('#main-layout .main_model').hide();
                $('#main-layout #Right').fadeIn();
                shoeObject.currentView = 'Left'
            }
        }
        $('#ShoeDetails').fadeOut();
        $('#view-select').hide()
    }
    //    CreateTagList(function() {
    //    }); 
    if (menuObject.currentMenu === "menu-main-type") {
        if (menuObject.currentMenu === "menu-main-type") {
            if (shoeObject.shoeType === 'monk') {
                $('.btn-share-fb').css({ 'top': 360, 'right': 155 }).fadeIn()
            } else if (shoeObject.shoeType === 'boot') {
                $('.btn-share-fb').css({ 'top': 300, 'right': 155 }).fadeIn()
            } else {
                $('.btn-share-fb').css({ 'top': 270, 'right': 155 }).fadeIn()
            }
        } else if (menuObject.currentMenu === "menu-main-color" || menuObject.currentMenu === "menu-main-style") {
            $('.btn-share-fb').css({ 'top': 18, 'right': 163 }).fadeIn()
        }
    } else if (menuObject.currentMenu === "menu-main-color" || menuObject.currentMenu === "menu-main-style") {
        $('.btn-share-fb').css({ 'top': 230, 'right': 100 }).fadeIn()
    } else {
        if (menuObject.currentMenu === 'menu-main-special-design') {
            $('.btn-share-fb').css({ 'top': 170, 'right': 360 }).fadeIn()
        } else {
            $('.btn-share-fb').hide()
        }
    }
    $('#Detail-Sole').text(shoeObject.getSoleName)
}
function SetOptionDesign(a) {
    (a === 'oxford' || a === 'derby' || a === 'boot') ? hideLaceMenu() : hideLaceMenu('hide');
    (a === 'boot') ? hideBackMenu('hide') : hideBackMenu();
    (a === 'boot') ? hideBackMenu('hide') : hideBackMenu();
    (a === 'loafers') ? hideAccsMenu() : hideAccsMenu('hide')
}
function TitleShape() {
    $('.shape').each(function () {
        var a = $(this).find('.itemList').attr('title');
        var b = $('<span>');
        b.html(a);
        b.css({ 'bottom': 11, 'color': '#FFFFFF', 'font-weight': 600, 'left': -10, 'position': 'absolute', 'width': 130, 'font-size': 14 });
        b.appendTo(this)
    })
}
function terms() {
    var a = $('#set_Language').val();
    if (a === 'Japan') {
        window.open('terms-ishoes-jap.php', '_blank')
    } else {
        window.open('terms-ishoes-eng.php', '_blank')
    }
}
function CreateValurFrm() {
    shoeObject.img = null;
    var a = get_base64_encode(shoeObject);
    $('input[name=sobj]').val(a);
    $('#frm-statusPreDesign').val(menuObject.statusPreDesign)
}
function OptionSideBorder() {
    if (shoeObject.getStyle === 'side' && shoeObject.shoeType === 'loafers' && menuObject.currentMenu === 'menu-main-style') {
        if (shoeObject.optionBorderSlim === 'Y') {
            $('#sideBorderOption').attr('checked', 'checked')
        }
        $('.sideBorderOption').fadeIn()
    } else {
        $('.sideBorderOption').fadeOut()
    }
}
function SetDefaultSlide() {
    var b = shoeObject.getFront;
    for (i in arrStyle.side) {
        var a = arrStyle.side[b];
        for (var j in a) {
            shoeObject.getSide = j;
            shoeObject.getSideName = j;
            shoeObject.side = j;
            return false
        }
    }
}
function setMonk() {
    if (shoeObject.shoeType === "monk") {
        $('body').find("[data-lang='side-style']").text(listEle.objLang['side-style-monk']);
        if (shoeObject.getStyle === "side") {
            $('.choose-style-text').html(listEle.objLang['choose-side-monk'])
        }
    } else {
        $('body').find("[data-lang='side-style']").text(listEle.objLang['side-style'])
    }
}
var designObject = { mixSolePrice: [], curr: "", soleMixArr: ["RBB-22", "RBD"] };
$.fn.soleMixPrice = function () {
    $(this).click(function () {
        if ($(this).is(':checked')) {
            shoeObject.mixSolePriceStatus = 'yes'
        } else {
            shoeObject.mixSolePriceStatus = 'no'
        }
        toggleOptionSoleMix();
        ToggleLayoutSole()
    })
};
function toggleOptionSoleMix() {
    if ($('#main-layout #Under').is(':visible') && ($.inArray(shoeObject.getSole, designObject.soleMixArr) === -1) && shoeObject.currentView === "Under") {
        $('#tab-soleOption').show()
    } else {
        $('#tab-soleOption').hide()
    }
    if ($.inArray(shoeObject.getSole, designObject.soleMixArr) !== -1 || (shoeObject.mixSolePriceStatus === 'no')) {
        var a = $('#soleOption');
        a.attr('checked', false);
        shoeObject.mixSolePriceStatus = 'no'
    }
    toggle_price();
    CreateValurFrm()
}
function toggleBannerMenuL() {
    var a = menuObject.currentMenu;
    var b = $('.bannerMenuL');
    if (a === "manu-main-measurement" || a === "menu-main-special-design") {
        b.stop().fadeOut()
    } else {
        b.stop().fadeIn()
    }
}