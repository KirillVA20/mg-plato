$(document).ready(function() {

    // показать содержимое заказа
    // ------------------------------------------------------------
    $('body').on('click', '.c-history__header', function () {
        $(this).parent().toggleClass('c-history__item--active');
    });

    // показать форму закрытия заказов
    // ------------------------------------------------------------
    $('.close-order, .change-payment').click(function () {
        var a = $(this).parents('.order-history').find('.paymen-name-to-history').text();

        $('select.order-changer-pay option:contains("' + a + '")').prop('selected', true);
        $('.reason-text').val('');
        $('strong.orderId').attr('data-id-order', $(this).attr('id'));
        $('strong[class=orderId]').text($(this).attr('data-number'));
        $('span[class=orderDate]').text($(this).attr('date'));
    });


    // закрытие заказа из личного кабинета
    // ------------------------------------------------------------
    $('.close-order-btn').click(function () {
        var id = $(this).parents('#openModal').find('strong[name=orderId]').data('id-order');
        var comm = $('.reason-text').val();

        $.ajax({
            type: "POST",
            url: mgBaseDir + "/personal",
            data: {
                delOK: "OK",
                delID: id,
                comment: comm
            },
            cache: false,
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    $('#openModal').hide();
                    $('#successModal').show();
                    $('.order-history#' + id + ' .order-number .order-status span').text(response.orderStatus);
                    $('.order-history#' + id + ' .order-number .order-status span').attr('class', 'dont-paid').addClass('c-history__status');
                    $('.order-history#' + id + ' .order-settings').remove();
                }
            }
        });
    });


    // смена способа оплаты
    // ------------------------------------------------------------
    $('body').on('click', '.change-payment-btn', function () {
        var paymetId = $(this).parents('#changePayment').find('.order-changer-pay').val();
        var paymetName = $(this).parents('#changePayment').find('.order-changer-pay option:selected').text();
        var id = $(this).parents('#changePayment').find('strong.orderId').attr('data-id-order');

        $('.order-history#' + id).find('input[name=paymentId]').val(paymetId);
        $('.order-history#' + id).find('.paymen-name-to-history').text(paymetName);

        $.ajax({
            type: "POST",
            url: mgBaseDir + "/personal",
            data: {
                changePaymentId: paymetId,
                orderId: id,
            },
            cache: false,
            dataType: 'json',
            success: function (response) {
                location.reload();
                var deliveryPrice = $('.order-history#' + id).find('.delivery-price').text();
                deliveryPrice.replace(' <?php echo addslashes($perCurrencyShort);?>');
                $('.order-history#' + id).find('.total-summ').text(response.summ + ' <?php echo addslashes($perCurrencyShort);?>');
                var orderSumm = response.summ;
                if (deliveryPrice) {
                    orderSumm += parseFloat(deliveryPrice);
                }
                $('.order-history#' + id).find('.total-order-summ').text(orderSumm + ' <?php echo addslashes($perCurrencyShort);?>');
                $('.c-modal').removeClass('c-modal--open');
                $('html').removeClass('c-modal--scroll');
            }
        });
    });
});