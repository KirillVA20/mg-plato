//пересчет цены товара аяксом (страница товара, миникарточка)
$(document.body).on('change', '.js-onchange-price-recalc', function () {

    var form = '.js-product-form';
    var request = $(form).formSerialize();
    var productId = $(form).data('product-id');

    var priceBlock = '.js-change-product-price';
    var productList = $('.js-product-page');
    var miniProduct = '.js-catalog-item';

    if ($(this).parents(miniProduct).length) {// для вызова из каталога
        productList = $(this).parents(miniProduct);
        form = productList.find(form);
        productId = form.data('product-id');
        request = productList.find(form).formSerialize();
        priceBlock = productList.find(priceBlock);
    }

    if ($(this).parents('.mg-compare-product').length) {// для вызова из сравнений
        priceBlock = $(this).parents('.mg-compare-product').find(priceBlock);
        request = $(this).parents('.mg-compare-product').find('.property-form').formSerialize();
        request += '&remInfo=false';
        productList = $(this).parents('.mg-compare-product');
    }

    var tempThis = $(this);

    // Пересчет цены
    $.ajax({
        type: "POST",
        url: mgBaseDir + "/product/",
        data: "calcPrice=1&inCartProductId=" + productId + "&" + request,
        dataType: "json",
        cache: false,
        success: function (response) {
            if (response.data.wholesalesTable != undefined) {
                $('.wholesales-data').html(response.data.wholesalesTable);
            }

            if (response.data.productOpFields != undefined) {
                tempThis.parents('.property-form')
                    .parents('.product-details-block,.product-wrapper')
                    .find('.product-opfields-data')
                    .html(response.data.productOpFields);
            }

            window.actionInCatalog = response.data.actionInCatalog;

            productList.find('.rem-info').hide();

            productList.find('.buy-container.product .hidder-element').hide();
            if ($('.buy-block .count').length > 0) {
                $('.js-product-controls').hide();
            }

            if (response.status === 'success') {
                if ($(priceBlock).find('.product-default-price').length) {
                    $(priceBlock).find('.product-default-price').html(response.data.price);
                } else {
                    $(priceBlock).html(response.data.price);
                }

                $(priceBlock).find('.product-default-price').html(response.data.price);
                productList.find('.code').text(response.data.code);
                var message = '';

                if (response.data.title) {
                    message = locale.countMsg1 + response.data.title.replace("'", '"') + locale.countMsg2 + response.data.code + locale.countMsg3;
                }

                productList.find('.rem-info a').attr('href', mgBaseDir + '/feedback?message=' + message);
                productList.find('.code-msg').text(response.data.code);

                var val = response.data.count;

                if (val != 0) {

                    $('.depletedLanding').hide();
                    $('.addToOrderLanding').show();

                    productList.find('.rem-info').hide();
                    productList.find('.js-product-controls').show();
                    if ($('.buy-block .count').length > 0) {
                        $('.js-product-controls').show();
                    }
                    productList.find('.buy-container.product').show();
                    if (!productList.find('.js-product-controls a:visible').hasClass('js-add-to-cart')) {
                        if ('false' == window.actionInCatalog) {
                            productList.find('.js-product-more').show();
                            productList.find('.js-add-to-cart').hide();
                        } else {
                            productList.find('.js-product-more').hide();
                            productList.find('.js-add-to-cart').show();
                        }

                        productList.find('.js-product-controls').show();
                    }
                } else {
                    $('.depletedLanding').show();
                    $('.addToOrderLanding').hide();

                    productList.find('.rem-info').show();
                    if ($('.buy-block .count').length > 0) {
                        $('.js-product-controls').hide();
                    }
                    productList.find('.buy-container.product').hide();
                    if (productList.find('.js-product-controls a:visible').hasClass('js-add-to-cart')) {
                        productList.find('.js-product-more').show();
                        productList.find('.js-add-to-cart').hide();
                        // productList.find('.js-product-controls:first').hide();
                    }
                }
                if (response.data.count_layout) {
                    if (productList.find('.count').length > 0) {
                        productList.find('.count').parent().html(response.data.count_layout);
                    } else {
                        productList.find('.in-stock').parent().html(response.data.count_layout);
                    }

                } else {
                    if ((val == '\u221E' || val == '' || parseFloat(val) < 0)) {
                        val = '<span itemprop="availability" class="count"><span class="sign">&#10004;</span>' + locale.countInStock + '</span>';
                        productList.find('.rem-info').hide();
                    } else {
                        val = locale.remaining + ': <span itemprop="availability" class="label-black count">' + val + '</span> ' + locale.pcs;
                    }
                    productList.find('.count').parent().html(val);
                }

                val = response.data.old_price;
                if (val != "0 " + currency && val != ' ' + currency) {
                    productList.find('.old-price').parents('li').show();
                    productList.find('.old-price').parents('.old').show();
                } else {
                    productList.find('.old-price').parents('li').hide();
                }

                if (val != "0 " + currency && val != ' ' + currency) {
                    productList.find('.old-price').text(response.data.old_price);
                }

                productList.find('.amount_input').data('max-count', response.data.count);

                productList.find('.weight').text(response.data.weightCalc);

                if (parseFloat(productList.find('.amount_input').val()) > parseFloat(response.data.count)) {
                    val = response.data.count;
                    if ((val == '\u221E' || val == '' || parseFloat(val) < 0)) {
                        val = productList.find('.amount_input').val();
                    }
                    if (val == 0) {
                        val = 1;
                    }

                    productList.find('.amount_input').val(val);
                }


            }
            if (response.data.storage != undefined) {
                maxStorageCount = 0;
                for (var i in response.data.storage) {
                    $('.count-on-storage[data-id=' + i + ']').html(response.data.storage[i]);
                    if (response.data.storage[i] > maxStorageCount) maxStorageCount = response.data.storage[i];
                }
                $('.actionBuy .amount_input').data('max-count', maxStorageCount);
            }
        }
    });

    return false;
});
