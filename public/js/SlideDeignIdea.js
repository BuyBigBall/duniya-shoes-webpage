$(document).ready(function () {
    $(document).click(function (e) {
        if (e.target.className !== "btnDesignSlide" || !e.target.className) {
            var w = $('#DesignSlide').css('marginRight').replace('px', '');
            if (w == 185) {
                $('#DesignSlide').animate({
                    'marginRight': 0
                }, 700)
            }
        }
    });
    $.getJSON('elements/LoadPreDesignArr', function (D) {
        PD.Arr = D;
        PD.ArrLength = getLength(PD.Arr)
    });
    var H = $(window).height() - 100;
    var C = parseInt(H / PD.liHeight);
    $('#chkHeight').css('height', C * PD.liHeight);
    $('.btnDesignSlide').DesignIdeaSlide();
    $('.brnChooseDesign').ChooseDesign();
    $('.btnDesignDetailSlide').btnDesignDetailSlide();
    $('#DesignSlide li').PopUpDesignDetail()
});
var PD = {
    CountClick: 0,
    Arr: [],
    Length: '',
    liHeight: 123.5,
    CountList: '',
    SunList: 0,
    SrcS: "images/preorder/3D/S/",
    SrcM: "images/preorder/3D/M/",
    SlideMargin: '',
    Select: '',
    LeatherGUP: '',
    BeforeType: '',
    BeforeGUP: ''
};
$.fn.btnDesignDetailSlide = function () {
    $(this).live('mouseout', function () {
        var w = $('#DesignSlide').css('marginRight').replace('px', '');
        if (w == (185)) {
            $('#DesignSlide').stop().animate({
                'marginRight': 0
            }, 500)
        } else {
            GetGroupLeather();
            CreateTagList(function () {
                $('#DesignSlide').stop().animate({
                    'marginRight': 185
                }, 200)
            })
        }
    })
};
$.fn.DesignIdeaSlide = function () {
    $(this).live('click', function () {
        var B = $(this).attr('id');
        var a = $(this).parents('#DesignSlide');
        var b = parseInt($(a).find('.ListItem').css('margin-top').replace('px', ''));
        PD.SunList = $('#' + $(a).attr('id') + ' li').length;
        PD.ArrLength = getLength(PD.Arr);
        PD.CountList = getHeightWindow();
        if (B === 'btnDesignSlideUp') {
            if (PD.CountClick > 0) {
                --PD.CountClick;
                b = b + PD.SlideMargin;
                $(a).find('.ListItem').stop().animate({
                    'margin-top': (PD.CountClick * (PD.SlideMargin * -1))
                }, 500)
            }
        } else {
            CreateTagList(function () {
                if (PD.CountClick < parseInt((PD.liHeight * PD.SunList) / (PD.CountList * PD.liHeight))) {
                    ++PD.CountClick;
                    $(a).find('.ListItem').stop().animate({
                        'margin-top': (PD.CountClick * (PD.SlideMargin * -1))
                    }, 500)
                }
            })
        }
    })
};
$.fn.ChooseDesign = function () {
    $(this).live('click', function () {
        var i = $(this).attr('id');
        var a = $.trim((PD.Arr[i]['NO']).replace(' ', ''));
        document.location = 'index.php?t=preorder&n=' + a + '#/menu-main-special-design'
    })
};
$.fn.PopUpDesignDetail = function () {
    $(this).live('click', function () {
        PD.Select = parseInt($(this).attr('id'));
        loadPopUp('PopUpDesignDetail', 'divDesignDetail')
    })
};

function getLength(a) {
    var b = [];
    var i = 0;
    b = a;
    for (var c in b) {
        ++i
    }
    return i
}

function getHeightWindow() {
    var H = $(window).height() - 100;
    var C = parseInt(H / PD.liHeight);
    PD.SlideMargin = PD.liHeight * C;
    $('#chkHeight').css('height', C * PD.liHeight);
    return C
}

function CreateTagList(c) {
    if ((PD.BeforeType !== shoeObject.shoeType) || (PD.BeforeGUP !== PD.LeatherGUP)) {
        $('.DesignIdeaSlide').empty();
        PD.BeforeType = shoeObject.shoeType;
        PD.BeforeGUP = PD.LeatherGUP;
        PD.CountClick = 0;
        $('.ListItem').css('margin-top', 0)
    }
    var d = false;
    var e = PD.Arr;
    for (var k in e) {
        if ((PD.LeatherGUP === e[k]['GROUP']) && (e[k]['MODEL'] === shoeObject.shoeType)) {
            d = true
        }
    }
    if (!d) {
        CreatrType()
    } else {
        CreatrTypeOrGroup()
    }

    function CreatrTypeOrGroup() {

        if (PD.SunList < PD.ArrLength) {
            var j = 0;
            var t = '';
            for (var a in e) {
                if ($('.DesignIdeaSlide #' + a).length <= 0) {
                    if ((PD.LeatherGUP === e[a]['GROUP']) && (e[a]['MODEL'] === shoeObject.shoeType)) {
                        var b = ($('.DesignIdeaSlide li').length <= 0) ? (-1) : $('.DesignIdeaSlide li:last').attr('id');
                        if (a > b) {
                            if (j++ < 10) {
                                t += '<li id="' + a + '"style="position: relative;text-align: center;">';
                                t += '<img src="' + PD.SrcS + PD.Arr[a]['IMG'] + '">';
                                t += '</li>'
                            }
                        }
                    }
                }
            }
            $('.DesignIdeaSlide').append(t)
        }
    }

    function CreatrType() {
        if (PD.SunList < PD.ArrLength) {
            var j = 0;
            var t = '';
            for (var a in e) {
                if ($('.DesignIdeaSlide #' + a).length <= 0) {
                    if ((e[a]['MODEL'] === shoeObject.shoeType)) {
                        var b = ($('.DesignIdeaSlide li').length <= 0) ? (-1) : $('.DesignIdeaSlide li:last').attr('id');
                        if (a > b) {
                            if (j++ < 10) {
                                t += '<li id="' + a + '"style="position: relative;text-align: center;">';
                                if (PD.Arr[a]['SELECTS'] === "PCT") {
                                    t += '<img src="images/preorder/' + PD.Arr[a]['SELECTS'] + '/S/' + PD.Arr[a]['DESIGN'] + '">'
                                } else {
                                    t += '<img src="images/preorder/' + PD.Arr[a]['SELECTS'] + '/S/' + PD.Arr[a]['IMG'] + '">'
                                }
                                t += '</li>'
                            }
                        }
                    }
                }
            }
            $('.DesignIdeaSlide').append(t)
        }
    }
    c()
}

function GetGroupLeather() {
    var a = MixMatch.Leather.Leather;
    var b = [];
    for (c in a) {
        var c = a[c]['COLOR'];
        for (Key in c) {
            if (c[Key]['ID'] === shoeObject.getLeatherNo) {
                var d = c[Key]['COLOR_GROUP'];
                PD.LeatherGUP = d;
                return d
            }
        }
    }
}
