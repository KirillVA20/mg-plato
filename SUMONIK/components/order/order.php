<?php
mgAddMeta('lib/jquery.maskedinput.min.js');
mgAddMeta('components/order/form/form.js');

mgAddMeta('lib/datepicker.css');
?> 
<div class="l-row min-0--12 order-page__order-form order-page__section js-order-page__section order-page__section--active"
     data-order-section="form">
    <div class="form-panel__panel form-panel"
          style="display:<?php echo $data['isEmpty'] ? 'flex' : 'none'; ?>">
        <div class="form-panel__switch js-form-switch C"
             data-section="delivery"
             data-order="1"
        >
            <span onclick="return false">1</span> <?php echo lang('orderFinalDeliv'); ?>
        </div>
        <div class="form-panel__switch js-form-switch form-panel__switch--disable"
             data-section="date-delivery"
             data-order="2"
        >
            <span onclick="return false">2</span> <?php echo lang('contacts'); ?>
        </div>
        <div class="form-panel__switch js-form-switch form-panel__switch--disable"
             data-section="payment-method"
             data-order="3"
        >
            <span onclick="return false">3</span> <?php echo lang('payment'); ?>
        </div>
        <div class="form-panel__switch js-form-switch form-panel__switch--disable"
             data-section="paymentTotal"
             data-order="4"
        >
            <span onclick="return false">4</span> <?php echo lang('orderFinalTotal'); ?>
        </div>    
    </div>

    <div class="c-order checkout-form-wrapper"
         style="display:<?php echo $data['isEmpty'] ? 'block' : 'none'; ?>">

        <?php
        // Ошибка
        if ($data['msg']): ?>
            <div class="l-col min-0--12">
                <div class="c-alert c-alert--red mg-error">
                    <?php echo $data['msg'] ?>
                </div>
            </div>
        <?php endif; ?>

        <!--    Форма оформления заказа    -->
        <div class="l-col min-0--12">
            <div class="payment-option">
                <form class="c-form js-orderForm order-form"
                      action="<?php echo SITE ?>/order?creation=1"
                      method="post">
                    <div class="l-row form__list order-form__list">
                        <div class="order-form__delivery order-form__item js-order-form__item order-form__item order-form__item--active"
                             data-section="delivery"
                             data-order="1"
                        >
                            <div class="c-order__title order-form__title">
                                <?php echo lang('orderDelivery'); ?>
                            </div>

                            <?php
                            // Способы доставки
                            if ('' != $data['delivery']): ?>
                                <ul class="c-order__payment delivery-details-list">
                                    <?php foreach ($data['delivery'] as $delivery): ?>
                                        <li <?php echo ($delivery['checked']) ? 'class = "active"' : 'class = "noneactive"' ?>>
                                            <label data-delivery-date="<?php echo $delivery['date']; ?>"
                                                   data-delivery-intervals='<?php echo $delivery["interval"]; ?>'
                                                   data-delivery-address='<?php echo $delivery["address_parts"]; ?>'>
                                                <input type="radio"
                                                       name="delivery" <?php if ($delivery['checked']) echo 'checked' ?>
                                                       value="<?php echo $delivery['id'] ?>">
                                                <span class="checkmark"></span>
                                                <span class="order-form__deliveryName"><?php echo $delivery['description'] ?></span>
                                                <?php
                                                if ($delivery['cost'] != 0 || DELIVERY_ZERO == 1) {
                                                    $deliveryCostShow = true;
                                                } else {
                                                    $deliveryCostShow = false;
                                                }
                                                ?>
                                                <span class="deliveryPrice"
                                                      style="<?php echo $deliveryCostShow ? '' : 'display:none;'; ?>">&nbsp;
                                                    <?php echo MG::numberFormat($delivery['cost']); ?>
                                                </span>

                                                <span class="deliveryCurrency"
                                                      style="<?php echo $deliveryCostShow ? '' : 'display:none;'; ?>">
                                                    <?php echo  $data['currency']; ?>
                                                </span>
                                            </label>

                                            <!--
                                            Для способов доставки с автоматическим расчетом стоимости, добавленных из плагинов.
                                            Проверяем наличие шорткода у способа доставки и выводим его в специальный блок при наличии
                                            -->
                                            <?php if (!empty($delivery['plugin'])): ?>
                                                <?php echo '[' . $delivery['plugin'] . ']'; ?>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <!--  Выбор даты доставки -->
                            <div class="delivery-date order-form__delivery-date" style="display:none;">
                                <div class="c-order__title--small order-form__subtitle">
                                    <?php echo lang('orderDeliveryDate'); ?>:
                                </div>
                                <input class = "order-form__text-input"
                                       type="text"
                                       aria-label="<?php echo lang('orderDeliveryDate'); ?>"
                                       name="date_delivery"
                                       placeholder="<?php echo lang('orderDeliveryDate'); ?>"
                                       value="<?php echo $_POST['date_delivery'] ?>"
                                       validate
                                       autocomplete="off"
                                >
                            </div>

                            <!-- Выбор времени доставки -->
                            <div class="delivery-interval" style="display:none; margin-bottom: 20px;">
                                <div class="c-order__title--small">
                                    <?php echo lang('orderDeliveryInterval'); ?>:
                                </div>
                                <select name="delivery_interval"
                                        aria-label="<?php echo lang('orderDeliveryInterval'); ?>"></select>
                            </div>

                            <!-- Выбор склада -->
                            <?php MG::checkProductOnStorage(); ?>

                            <button class="order-form__next-button js-next-button"
                                    onclick="return false"
                            >Далее</button>
                        </div>

                        <div class="l-col min-0--12 min-990--6 order-form__item js-order-form__item"
                             data-section="date-delivery"
                             data-order="2"
                        >
                            <div class="c-order__title order-form__title">
                                <?php echo lang('orderContactData'); ?>
                            </div>
                            <?php
                            if (EDITION == 'gipermarket') {
                                // Форма заказа, настраиваемая в панели управления Moguta.CMS «Гипермаркет» в разделе Настройки/Форма заказа
                                component('order/form/custom');
                            }
                            else {
                                // статичная форма заказа для остальных редакций
                                component('order/form/static');
                            } ?>
                            <button class="order-form__next-button js-next-button"
                                    onclick="return false" 
                            >Далее</button>
                        </div>

                        <!-- Выбор способа оплаты -->
                        <div class="l-col min-0--12 min-768--6 min-990--3 order-form__item js-order-form__item"
                             data-section="payment-method"
                             data-order="3"
                        >
                            <div class="c-order__title order-form__title">
                                <?php echo lang('orderPaymentMethod'); ?>
                            </div>
                            <ul class="c-order__payment payment-details-list">
                                <?php if (count($data['delivery']) > 1 && !$_POST['payment']): ?>
                                    <li>
                                        <div class="c-alert c-alert--blue">
                                            <?php echo lang('orderPaymentNoDeliv'); ?>
                                        </div>
                                    </li>
                                <?php elseif ('' != $data['paymentArray']): ?>
                                    <?php echo $data['paymentArray'] ?>
                                <?php else:
                                    ?>
                                    <li>
                                        <div class="c-alert c-alert--orange">
                                            <?php echo lang('orderPaymentNone'); ?>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            </ul>
                            <button class="order-form__next-button js-next-button"
                                    onclick="return false"
                            >Далее</button>
                        </div>

                        <!-- Полная цена, соглашения на обработку и кнопка оформить -->
                        <div class="l-col min-0--12 order-form__item js-order-form__item order-form__total-sum order-form__item"
                             data-section="paymentTotal"
                             data-order="4"
                        >
                            <div class="total-price-block total">
                                <div class="c-order__title c-order__title--last order-form__title">
                                    <?php echo lang('orderPaymentTotal'); ?></div>
                                <div class="c-order__total">
                                    <div class="c-order__total--row order-form__total--row">
                                        <div class="c-order__total--amount summ-info">
                                            <span class="order-summ total-sum"><span><?php echo $data['summOrder'] ?></span></span>
                                            <span class="delivery-summ"><?php echo $data['deliveryInfo'] ?></span>
                                        </div>
                                    </div>

                                    <div class="c-order__total--row">
                                        <?php if (class_exists('PersonalData')): ?>
                                            <div class="PersonalData">
                                                [personal-data]
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="agreement-wrap">
                                         <?php
                                    echo MG::addAgreementCheckbox(
                                        'checkout-btn',
                                        array(
                                            'text' => 'Я даю согласие на обработку моих ',
                                            'textLink' => 'персональных данных.'
                                        ),
                                        'addInlineScript'
                                    );
                                    ?>
                                    </div>

                                    <?php if ($data['captcha'] && !$data['recaptcha']) { ?>
                                        <div class="checkCapcha" style="display:inline-block">
                                            <img src="captcha.html"
                                                 width="140"
                                                 height="36">
                                            <div class="capcha-text">
                                                <?php echo lang('captcha'); ?>
                                                <span class="red-star">*</span>
                                            </div>
                                            <input type="text"
                                                   aria-label="capcha"
                                                   name="capcha"
                                                   class="captcha">
                                        </div>
                                    <?php } ?>
                                    <?php if ($data['recaptcha']) { ?>
                                        <div class="checkCapcha" style="display:inline-block">
                                            <?php echo MG::printReCaptcha(); ?>
                                        </div>
                                    <?php } ?>

                                    <div class="c-order__total--row">
                                        <form action="<?php echo SITE ?>/order"
                                              method="post"
                                              class="checkout-form">
                                            <input class = "order-form__success-button"
                                                   type="submit"
                                                   name="toOrder"
                                                   class="checkout-btn default-btn success"
                                                   value="<?php echo lang('checkout'); ?>"
                                                   disabled>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
