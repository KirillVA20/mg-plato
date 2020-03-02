$(document).ready(function() {
    var amountWrap = '.js-amount-wrap',
        amountInput = '.js-amount-input';

    //увеличение количества товара (страница товара, миникарточка, корзина, страница заказа)
    $('body').on('click', '.js-amount-change-up', function () {
        var obj = $(this).parents(amountWrap).find(amountInput);
        var val = obj.data('max-count');
        if ((val == '\u221E' || val == '' || parseFloat(val) < 0)) {
            obj.data('max-count', 99999);
        }
        var i = obj.val();
        i++;
        if (i > obj.data('max-count')) {
            i = obj.data('max-count');
        }
        obj.val(i).trigger('change');
        return false;
    });

    //уменьшение количества товара (страница товара, миникарточка, корзина, страница заказа)
    $(document.body).on('click', '.js-amount-change-down', function () {
        var obj = $(this).parents(amountWrap).find(amountInput);
        var val = obj.val();
        var i = val;
        i--;
        if (i <= 0) {
            i = 1;
        }
        obj.val(i).trigger('change');
        return false;
    });

    // Исключение ввода в поле выбора количества недопустимых значений. (страница товара, миникарточка, корзина, страница заказа)
    $(document.body).on('keyup', amountInput, function() {
        if ($(this).hasClass('zeroToo')) {
            if (isNaN($(this).val()) || $(this).val() < 0) {
                $(this).val('1');
            }
            $(this).val(Math.round($(this).val()));
        } else {
            if (isNaN($(this).val()) || $(this).val() <= 0) {
                $(this).val('1');
            }
            $(this).val($(this).val().replace(/\./g, ''));
        }
        if (parseFloat($(this).val()) > parseFloat($(this).data('max-count')) && parseFloat($(this).data('max-count')) > 0) {
            $(this).val($(this).data('max-count'));
        }
    });
});
