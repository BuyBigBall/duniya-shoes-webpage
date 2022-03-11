$('#FrmCheckout').FrmValidationEngine();
var stateLoad = {
    chkOut: 0
}
$(document).ready(function () {
    Scrollbar();
    $('#FrmCheckout').FrmValidationEngine();
    $('#country').live('change', function () {
        $this = $(this);
        if ($this.val() === 'United States') {
            $('.state').slideDown();
        } else {
            $('.state').slideUp();
            $('.state').find('#state').val('');
        }
        toggleCountry($this.val());
    });

    if (!$.browser.webkit) {
        $('#buttonCheckPayPal,#buttonCheckout').glow({
            active: true,
            radius: "3",
            color: "white"
        });
    }

    $('.save-design').click(function () {
        i = $(this).attr('id');
        saveDesign(i);
    });

    $('.deleteItem').click(function () {
        $id = $(this).attr('id');
        loadPopUp('PopUpQuestionDeleteItem', 'divQuestionDeleteItem');
        $('#btnRemoveItemProductYes').live('click', function () {
            $.getJSON("elements/cart/del?id=" + $id, function (data) {

                /*Remove tag tr list product*/
                $('.' + data['TAGID']).remove();

                /*add tag condition tr <3*/
                var lengthTr = $('#t-body tr').length;
                while (lengthTr < 3) {
                    lengthTr++
                    var tr = "<tr><td> </td><td width='220'> </td><td  width='90'> </td><td width='50'> </td><td width='25'> </td><td  width='40'> </td><td> </td></tr>";
                    $(tr).appendTo($('#t-body tbody '));
                }
                changVelLogin(data);
                $('.Popup').fadeOut('slow', function () {
                    $('.Popup').remove();
                });
            });
        })
    });
});
function loadChkOutForm() {
    if (stateLoad.chkOut < 1) {
        stateLoad.chkOut++;
    } else {
        //closeModal('plp','modal-paypal');
        $('#eleFrmdatacheckOut,#eleFrmCheckOut').fadeIn(function () {
            stateLoad.chkOut = 0;
        });
    }
}
function saveDesign(i) {
    $.getJSON('elements/popUp/proDesign/checkSessionPreDesign.php?id=' + i, function (d) {
        var ststus = d['STATUS'];
        var id = d['ID'];
        if (ststus === 'true') {
            loadPopUp('PopUpCompleted', 'divPopUpCompleted');
            $('#' + id).attr('data-lang', 'save');
            setLanguage();
        } else if (ststus === 'login') {
            $('.link-login').trigger('click');
        } else if (ststus === 'count') {
            loadPopUp('PopUpLimitProDesign', 'divPopUpLimit');
        }
    });
}
function Scrollbar() {
    $('.list-chkout').mCustomScrollbar({
        scrollButtons: { enable: false },
        advanced: { updateOnContentResize: true }
    });
}