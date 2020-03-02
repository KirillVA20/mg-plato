$(document).ready(function () {
    var modal = $('.js-agreement-modal');
    var modalOverlay = $('.js-modal-overlay');
    var btnOpenSelector = '.js-open-agreement';
    var btnCloseSelector = '.js-close-agreement';

        // открытие модалки с соглашением на обработку пользовательских данных
        $(document.body).on('click', btnOpenSelector, function (e) {
            e.preventDefault();

            if (modal.length < 1) {
                $.ajax({
                    type: "GET",
                    url: mgBaseDir + "/ajaxrequest",
                    data: {
                        layoutAgreement: 'agreement'
                    },
                    dataType: "HTML",
                    success: function (response) {
                        $('body').append(response);
                    }
                });
            } else {
                modalOverlay.show();
                modal.attr('open', true);
            }
        });

    // закрытие модалки с соглашением на обработку пользовательских данных
    $(document.body).on('click', btnCloseSelector, function (e) {
        e.preventDefault();

        modalOverlay.hide();
        modal.removeAttr('open');
    });
});

