var announce = {
    starter: {requestData: '', path: {domainPath: '', projectPath: ''}},
    init: function (object) {
        announce.starter.path = $.extend(announce.starter.path, object.path);
        
        $('.banner-announce').click(function (e) {
            e.preventDefault();
            
            announce.popupAnnounce();
        });
    },
    popupAnnounce: function () {
        var modal = '', modalDialogHtml = '', linkPopup = '';
        linkPopup = announce.starter.path.domainPath + 'datastore/ele/announce.php';
        
        $('body').append('<div class="modal-desc"></div>');
        
        modalDialogHtml = '<div class="modal-dialog">' +
                '<div class="modal-content"></div>' +
            '</div>';

        modal = $('.modal-desc');
        modal.append(modalDialogHtml);
        
        $('.modal-desc .modal-content').load(linkPopup, function () {
            
        });
        
        modal.addClass('modal-desc-active').click(function (e) {
            if (e.target == this || e.target.id == 'btn-close' || $(e.target).is('.cancel')) {
                modal.remove();
            }
        });
    }
};