<?php
/**
 *  Файл представления Order - выводит сгенерированную движком страницу оформления заказа.
 *  В этом файле доступны следующие данные:
 *   <code>
 *    $data['delivery'] => 'список доступных способов доставок';
 *    $data['currency'] => 'валюта магазина';
 *    $data['summOrder'] => 'сумма заказа';
 *    $data['meta_title'] => 'Значение meta тега для страницы order';
 *    $data['meta_keywords'] => 'Значение meta_keywords тега для страницы order';
 *    $data['meta_desc'] => 'Значение meta_desc тега для страницы order'
 *   </code>
 *
 *   <b>Внимание!</b> Файл предназначен только для форматированного вывода данных на страницу магазина. Категорически не рекомендуется выполнять в нем запросы к БД сайта или реализовывать сложую программную логику.
 * @author Авдеев Марк <mark-avdeev@mail.ru>
 * @package moguta.cms
 * @subpackage Views
 */
?>

<div class="container">
    <div class="order-page">
        <div class="l-col min-0--12 cart-page__title">
            <div class="c-title">
                <span class="page-title">
                    <?php echo lang('orderCheckout'); ?>
                </span>
            </div>
        </div>
        <div class="order-page__section-buttons">
            <button class="order-page__switch-button js-order-page__switch-button order-page__switch-button--active"
                    data-order-section="form"
                    title="Форма заказа"
            >
                <i aria-hidden="true" class="fas fa-money-check-alt"></i>
            </button>
            <button class="order-page__switch-button js-order-page__switch-button"
                    data-order-section="basket"
                    title="Корзина"
            >
                <i aria-hidden="true" class="fas fa-shopping-basket"></i>
            </button>
        </div>
        <?php if (class_exists('GsSDEC')): ?>
            [sdec_system]
        <?php endif; ?>
        <?php
        // Если электронные товары
        if (!empty($data['fileToOrder'])) {
            component('order/electro', $data);
        } else {
            switch ($data['step']) {

                // Оформление заказа
                case 1:
                    mgSEO($data);

                    $model = new Models_Cart();
                    $cartData = $model->getItemsCart();
                    $data['isEmpty'] = $model->isEmptyCart();
                    $data['productPositions'] = $cartData['items'];
                    $data['totalSumm'] = $cartData['totalSumm'];

                    // Корзина
                    component('cart', $data);

                    // Компонент оформления заказа
                    component('order', $data);
                    break;

                // Оплата заказа
                case 2:
                    component('payment', $data);
                    break;

                // Подтверждение заказа
                case 3:
                    component('order/confirm', $data);
                    break;

                // Оплата заказа из личного кабинета
                case 4:
                    component('payment', $data, 'payment_from_personal');
                    break;

                // Информация о статусе заказа при переходе по ссылке из письма
                case 5:
                    component('order/info', $data);
            }
        } ?>
    </div>
</div>
