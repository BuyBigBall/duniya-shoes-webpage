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
        var img_src = '';
        i = $(this).attr('id');
        var imgArray = $(this).parent().parent().parent().find('img');
        if(imgArray.length>0)
        {
            img_src = $(imgArray).attr("src");
        }
        saveDesign(i, img_src);
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
                if(data['PRODUCT']!==undefined)
                if(data['PRODUCT']['SUM']!==undefined)
                if(data['PRODUCT']['SUM']['QTY']!==undefined)
                {
                    changVelLogin(data);
                }

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
function saveDesign(i, img_src) {


    
    $.getJSON('/designshoes/elements/popUp/proDesign/checkSessionPreDesign?id=' + i,  function (d) {
        var status = d['STATUS'];
        var new_model_id = d['ID'];
        if (status === 'true') {
            loadPopUp('PopUpCompleted', 'divPopUpCompleted');
            $('#' + i).attr('data-lang', 'save');
            setLanguage();

            $.ajax({
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
                url: '/createDesignImages?id=' + new_model_id,
                data: {img: img_src},
                success: function (d) {
                    console.log("design image created successfully.");
                    }
                });

        } else if (status === 'login') {
            $('.link-login').trigger('click');
        } else if (status === 'count') {
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