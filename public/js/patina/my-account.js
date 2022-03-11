var myAccount = {
    starter: {
        requestData: '', 
        path: {domainPath: '', projectPath: ''},
        setting: {
            global: {country: '', currency: '', sign: '', language: ''},
            profile: {firstName: '', lastName: '', email: ''},
            size: {
                shoe: {option: '', unit: '', readySize: '', width: '', length: ''},
                belt: {unit: '', waist: ''}
            }
        }
    },
    init: function (object) {
        myAccount.starter.path = $.extend(myAccount.starter.path, object.path);

        if (typeof object.global != null && object.global != '') {
            var global = (typeof object.global == 'string' ? JSON.parse(object.global) : object.global);
            myAccount.starter.setting.global.country = global.COUNTRY || global.country;
            myAccount.starter.setting.global.currency = global.CURR || global.currency;
            myAccount.starter.setting.global.sign = global.SIGN || global.symbol;
            myAccount.starter.setting.global.language = global.LANGUAGE || global.language;
        }

        if (object.profile != '') {
            var profile = (typeof object.profile == 'string' ? JSON.parse(object.profile) : object.profile);
            myAccount.starter.setting.profile.firstName = profile.FIRSTNAME || profile.fname;
            myAccount.starter.setting.profile.lastName = profile.LASTNAME || profile.lname;
            myAccount.starter.setting.profile.email = profile.EMAIL || profile.email;

            $('.log-in').addClass('hidden');
            $('.log-out').removeClass('hidden');
        }
        
        if (object.size != '') {
            var size = (typeof object.size == 'string' ? JSON.parse(object.size) : object.size);
            myAccount.starter.setting.size.shoe.option = size.Setting.Size.Shoe.Option;
            myAccount.starter.setting.size.shoe.unit = size.Setting.Size.Shoe.Unit;
            myAccount.starter.setting.size.shoe.readySize = size.Setting.Size.Shoe.ReadySize;
            myAccount.starter.setting.size.shoe.width = size.Setting.Size.Shoe.Width;
            myAccount.starter.setting.size.shoe.length = size.Setting.Size.Shoe.Length;
            myAccount.starter.setting.size.belt.unit = size.Setting.Size.Belt.Unit;
            myAccount.starter.setting.size.belt.waist = size.Setting.Size.Belt.Waist;
        }
    },
    popupLogin: function (object, callback) {
        var modal = '', modalDialogHtml = '', modalDialog = '';
        var linkPopup = $(object.target).attr('href');

        $('.wrapper').append('<div class="modal-icebergs"></div>');

        modalDialogHtml = '<div class="modal-dialog">' +
                '<div class="modal-content-icebergs"></div>' +
                '</div>';

        modal = $('.modal-icebergs');
        modal.append(modalDialogHtml);
        modalDialog = $('.modal-dialog');

        $('.modal-content-icebergs').load(linkPopup, function () {
            setTimeout(function () {
                modalDialog.addClass('modal-dialog-active');
                $('.login-panel .login-input[name="email"]').focus();
            }, 100);

            $('#frm-login').submit(function (e) {
                e.preventDefault();

                myAccount.loginProcess(callback);
            });
            
            $('#link-forgot').click(function () {
                myAccount.popupFotgot();
            });
        });

        modal.addClass('modal-icebergs-active').click(function (e) {
            if (e.target == this || $(e.target).is('.exit-login')) {
                modal.removeClass('modal-icebergs-active');
                modalDialog.removeClass('modal-dialog-active');
                modal.remove();
            }
        });
    },
    loginProcess: function (callback) {
        if (myAccount.starter.requestData) {
            return;
        }

        myAccount.starter.requestData = $.ajax({
            url: myAccount.starter.path.domainPath + 'environment/get/icebergs/login/login.php?process=login',
            type: 'POST',
            data: $('#frm-login').serialize(),
            success: function (result) {
                if (result) {
                    $('.modal-icebergs').trigger('click');
                    $('.log-in').addClass('hidden');
                    $('.log-out').removeClass('hidden');

                    var data = JSON.parse(result);

                    myAccount.starter.setting.global.country = data.Setting.Global.Country;
                    myAccount.starter.setting.global.currency = data.Setting.Global.Currency;
                    myAccount.starter.setting.global.sign = data.Setting.Global.Symbol;
                    myAccount.starter.setting.global.language = data.Setting.Global.Language;
                    myAccount.starter.setting.profile.firstName = data.Setting.Profile.FirstName;
                    myAccount.starter.setting.profile.lastName = data.Setting.Profile.LastName;
                    myAccount.starter.setting.profile.email = data.Setting.Profile.Email;
                    myAccount.starter.setting.size.shoe.option = data.Setting.Size.Shoe.Option;
                    myAccount.starter.setting.size.shoe.unit = data.Setting.Size.Shoe.Unit;
                    myAccount.starter.setting.size.shoe.readySize = data.Setting.Size.Shoe.ReadySize;
                    myAccount.starter.setting.size.shoe.width = data.Setting.Size.Shoe.Width;
                    myAccount.starter.setting.size.shoe.length = data.Setting.Size.Shoe.Length;
                    myAccount.starter.setting.size.belt.unit = data.Setting.Size.Belt.Unit;
                    myAccount.starter.setting.size.belt.waist = data.Setting.Size.Belt.Waist;

                    //speziicoz.ft.Services('Language').update(myAccount.starter.setting.global.language);

                    callback();
                }
                else {
                    $('.modal-icebergs .login-panel .login-detail').addClass('hidden');
                    $('.modal-icebergs .login-panel .login-invalid').removeClass('hidden');
                    
                    setTimeout(function() {
                        $('.modal-icebergs .login-panel .login-detail').removeClass('hidden');
                        $('.modal-icebergs .login-panel .login-invalid').addClass('hidden');
                    }, 3000);
                }
                
                myAccount.starter.requestData = '';
            }
        });
    },
    logoutProcess: function () {
        if (myAccount.starter.requestData) {
            return;
        }

        myAccount.starter.requestData = $.ajax({
            url: myAccount.starter.path.domainPath + 'Environment/Get/Icebergs/Login/login.php?process=logout',
            type: 'POST',
            success: function () {
                $('.log-in').removeClass('hidden');
                $('.log-out').addClass('hidden');

                $.each(myAccount.starter.setting.profile, function (key, value) {
                    myAccount.starter.setting.profile[key] = '';
                });

                myAccount.starter.requestData = '';
            }
        });
    },
    updatePassword: function (newPassword) {
        if (myAccount.starter.requestData) {
            return;
        }
        
        myAccount.starter.requestData = $.ajax({
            url: myAccount.starter.path.domainPath + 'Environment/Get/Icebergs/OrderHistory/my-account.php?process=update-password',
            type: 'POST',
            data: {newPassword: newPassword},
            success: function (result) {
                myAccount.popupDialog('Success.');
                
                myAccount.starter.requestData = '';
            }
        });
    },
    popupFotgot: function () {
        $('.login-panel').addClass('hidden');
        $('.forgot-panel').removeClass('hidden');
        $('.forgot-panel .login-input[name="email"]').focus();
        
        $('#frm-forgot').submit(function (e) {
            e.preventDefault();

            myAccount.forgotProcess();
        });
    },
    forgotProcess: function () {
        if (myAccount.starter.requestData) {
            return;
        }
        
        myAccount.starter.requestData = $.ajax({
            url: myAccount.starter.path.domainPath + 'Environment/Get/Icebergs/Login/login.php?process=forgot',
            type: 'POST',
            data: $('#frm-forgot').serialize(),
            success: function (result) {
                if (result != 'false') {
                    $('.forgot-panel .forgot-valid').removeClass('hidden');
                }
                else {
                    $('.forgot-panel .forgot-invalid').removeClass('hidden');
                    
                    setTimeout(function() {
                        $('.forgot-panel .forgot-invalid').addClass('hidden');
                    }, 3000);
                }
                
                myAccount.starter.requestData = '';
            }
        });
    },
    popupMyAccount: function (object) {
        var modal = '', modalDialogHtml = '', modalDialog = '';
        var linkPopup = $(object.target).data('myaccount');

        $('.wrapper').append('<div class="modal-icebergs"></div>');

        modalDialogHtml = '<div class="modal-dialog">' +
                '<div class="modal-content-icebergs"></div>' +
                '</div>';

        modal = $('.modal-icebergs');
        modal.append(modalDialogHtml);
        modalDialog = $('.modal-dialog');

        $('.modal-content-icebergs').load(linkPopup, function () {
            setTimeout(function () {
                modalDialog.addClass('modal-dialog-active');

                $('#block-my-account .block-acc-menu .button-menu').click(function () {
                    $('#block-my-account .block-acc-menu').toggleClass('block-acc-menu-toggled');
                });

                $('#block-my-account .acc-menu').click(function (e) {
                    if (e.target.id != '') {
                        $(this).find('.item-menu').removeClass('active');
                        $(e.target).addClass('active');

                        var content = $(e.target).data('content');
                        $('#block-my-account .acc-content').removeClass('active').filter('.' + content).addClass('active');

                        if ($('#block-my-account .block-acc-menu').is('.block-acc-menu-toggled')) {
                            $('#block-my-account .block-acc-menu').toggleClass('block-acc-menu-toggled');
                        }
                    }
                });
                
                $('.block-my-account .my-info #button-save-password').click(function (e) {
                    myAccount.updatePassword($('.block-my-account input[name=password]').val());
                });

                $('#block-my-account .my-measurement .gender-menu').click(function (e) {
                    if (e.target.id != '') {
                        $(this).find('.item-gender').removeClass('active');
                        $(e.target).addClass('active');

                        var genderMeasurement = $(e.target).data('gender');
                        $('#block-my-account .my-measurement .block-measurement > div').removeClass('active').filter('.' + genderMeasurement).addClass('active');
                    }
                });

                $('#block-my-account .my-measurement .male-measurement .product-menu').click(function (e) {
                    if (e.target.id != '') {
                        $(this).find('a').removeClass('active');
                        $(e.target).addClass('active');

                        var productMale = $(e.target).data('product');
                        $('#block-my-account .my-measurement .male-measurement .product-measurement > div').removeClass('active').filter('.' + productMale).addClass('active');
                    }
                });

                $('#block-my-account .my-measurement .female-measurement .product-menu').click(function (e) {
                    if (e.target.id != '') {
                        $(this).find('a').removeClass('active');
                        $(e.target).addClass('active');

                        var productFemale = $(e.target).data('product');
                        $('#block-my-account .my-measurement .female-measurement .product-measurement > div').removeClass('active').filter('.' + productFemale).addClass('active');
                    }
                });

                $('#block-my-account .block-acc-content .history').mCustomScrollbar({scrollButtons: {enable: false}, advanced: {updateOnContentResize: true}});

                $('#block-my-account .block-acc-content .history .view-detail').click(function (e) {
                    if (myAccount.starter.requestData) {
                        return;
                    }
                    myAccount.starter.requestData = 'true';
                    
                    var index = $(this).data('index');
                    $(this).popupMaya({url: myAccount.starter.path.domainPath + "environment/get/icebergs/orderhistory/order-detail.php?index=" + index, run: true, position: "middle", subEleHeight: 600, effStart: "top"}, function () {
                        myAccount.starter.requestData = '';
                    });
                });
            }, 100);
        });

        modal.addClass('modal-icebergs-active').click(function (e) {
            if (e.target == this || e.target.id == 'btn-close-myaccount') {
                modal.removeClass('modal-icebergs-active');
                modalDialog.removeClass('modal-dialog-active');
                modal.remove();
            }
        });
    },
    popupDialog: function (message, topic) {
        topic = topic || 'Notification';

        $('body').append('<div class="modal"></div>');

        var modal = $('.modal'), modalDialogHtml = '';
        modalDialogHtml = '<div class="modal-dialog">' +
                    '<div class="modal-content">' +
                        '<div class="modal-header">' +
                            '<button id="close-dialog" class="nav-link close" type="button">X</button>' +
                            '<h3>' + topic + '</h3>' +
                        '</div>' +
                        '<div class="modal-body">' +
                            '<p>' + message + '</p>' +
                        '</div>' +
                    '</div>' +
                '</div>';

        modal.append(modalDialogHtml);

        modal.addClass('modal-active').click(function (e) {
            if (e.target == this || e.target.id == 'close-dialog') {
                modal.remove();
            }
        });
    }
};