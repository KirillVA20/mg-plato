<?php
mgAddMeta('components/cart/cart.css');
mgAddMeta('components/cart/cart.js');
?>
  

  <?php if (class_exists('MinOrder')): ?>
      <div class="l-col min-0--12">
          [min-order]
      </div>
  <?php endif; ?>

  <div class="l-col min-0--12 cart-page order-page__section js-order-page__section"
       data-order-section="basket"
  >
      <div class="cart-page__product-list js-cart-page__product-list"
           style="display:<?php echo $data['isEmpty'] ? 'block' : 'none'; ?>">
          <div class="c-form cart-wrapper cart-page__cart-wrap">
              <form class="cart-form js-cart-form cart-page__form"
                    method="post"
                    action="<?php echo SITE ?>/cart">
                  <div class="c-table">
                      <table class="cart-table cart-page__table">
                        <?php $i = 1;
                        foreach ($data['productPositions'] as $product): ?>
                            <tr class = "cart-page__product">
                                <td class="c-table__img img-cell cart-page__image cart-page__image">
                                    <a href="<?php echo $product["link"] ?>"
                                       title="<?php echo $product["title"] ?>"
                                       target="_blank"
                                       class="cart-img">

                                        <img src="<?php echo mgImageProductPath($product["image_url"], $product['id'], 'small') ?>"
                                             title="<?php echo $product["title"] ?>"
                                             alt="<?php echo $product["title"] ?>">

                                    </a>
                                </td>
                                <td class="c-table__name name-cell cart-page__product-name">
                                    <a class="c-table__link"
                                       title="<?php echo $product["title"] ?>"
                                       href="<?php echo $product["link"] ?>"
                                       target="_blank">
                                      <span><?php echo $product['title'] ?></span>
                                    </a>
                                    <br>
                                  <?php echo $product['property_html'] ?>
                                </td>
                                <td class="c-table__count count-cell cart-page__count-cell">

                                  <?php
                                  // Компонент выбора количества товара
                                  component(
                                    'product/amount',
                                    [
                                      'id' => $product['id'],
                                      'maxCount' => $data['maxCount'],
                                      'count' => $product['countInCart'],
                                      'type' => 'cart'
                                    ]
                                  ); ?>


                                    <input type="hidden"
                                           name="property_<?php echo $product['id'] ?>[]"
                                           value="<?php echo $product['property'] ?>"/>
                                </td>
                                <td class="c-table__price price-cell js-cartPrice cart-page__product-price">
                                  <?php echo MG::numberFormat($product['countInCart'] * $product['price']) ?>
                                  <?php echo $data['currency']; ?>
                                </td>
                                <td class="c-table__remove remove-cell cart-page__product-remove">
                                    <a class="deleteItemFromCart delete-btn js-delete-from-cart"
                                       href="<?php echo SITE ?>/cart"
                                       data-delete-item-id="<?php echo $product['id'] ?>"
                                       data-property="<?php echo $product['property'] ?>"
                                       data-variant="<?php echo(!empty($product['variantId']) ? $product['variantId'] : 0); ?>"
                                       title="<?php echo lang('deleteProduct'); ?>">
                                        <div class="icon__cart">
                                            <i class="fas fa-trash-alt"></i>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                      </table>
                  </div>
              </form>

            <?php if ((class_exists('OikDisountCoupon')) ||
              (class_exists('PromoCode'))): ?>
                <div class="c-promo-code">
                    [promo-code]
                </div>
            <?php endif; ?>

              <div class="c-table__footer total-price-block cart-page__footer">
                  <div class="c-table__total cart-page__sum-list cart-page__total-sum">
                      <span class="title">
                          <?php echo lang('toPayment'); ?>:
                      </span>
                      <span class="total-sum">
                          <strong>
                              <?php echo priceFormat($data['totalSumm']) ?>&nbsp;
                              <?php echo $data['currency']; ?>
                          </strong>
                      </span>
                  </div>
                
                  <div class="cart-page__chekout-buttons">
                    <?php if (!URL::isSection('order')): ?>
                        <form action="<?php echo SITE ?>/order"
                              method="post"
                              class="checkout-form">
                            <button type="submit"
                                    class="checkout-btn default-btn success cart-page__checkout-btn input-button"
                                    name="order"
                                    title="Оформить заказ"
                                    value="<?php echo lang('checkout'); ?>">
                              <?php echo lang('checkout'); ?>
                            </button>
                        </form>
                    <?php endif; ?>
                  </div>
              </div>
          </div>
      </div>
      <div class="c-alert c-alert--blue empty-cart-block alert-info"
           style="display:<?php echo !$data['isEmpty'] ? 'block' : 'none'; ?>">
        <?php echo lang('cartIsEmpty'); ?>
      </div>
  </div>

