<?php
mgAddMeta('components/cart/cart.js');
//mgAddMeta('components/cart/cart.amount.js');

mgAddMeta('components/cart/small/small.css');
mgAddMeta('components/cart/cart.css');

$smallCartRow = function (
  $item = array(
    'product_url' => 0,
    'image_url_new' => 0,
    'title' => 0,
    'property_html' => 0,
    'countInCart' => 0,
    'priceInCart' => 0,
    'id' => 0,
    'property' => 0,
    'variantId' => 0)
) {
  // Получаем массив миниатюр изображений
  $thumbsArr = getThumbsFromUrl($item['image_url_new'], $item['id']);
  ?>
    <tr class = "popup__product" >
        <td class="c-table__img small-cart-img">
            <a class="js-smallCartImgAnchor"
               href="<?php echo SITE . "/" . (isset($item['category_url']) ? $item['category_url'] : 'catalog/') . $item['product_url'] ?>">
                <img class="js-smallCartImg"
                     src="<?php echo $thumbsArr[30]['main'] ?>"
                     srcset="<?php echo $thumbsArr[30]['2x'] ?> 2x"
                     alt="<?php echo $item['title'] ?>"/>
            </a>
        </td>
        <td class="c-table__name small-cart-name popup__product-info">
            <ul class="small-cart-list">
                <li>
                    <a class="c-table__link js-smallCartProdAnchor popup__product-name"
                       href="<?php echo SITE . "/" . (isset($item['category_url']) ? $item['category_url'] : 'catalog/') . $item['product_url'] ?>"><?php echo $item['title'] ?></a>
                    <span class="property js-smallCartProperty"><?php echo $item['property_html'] ?></span>
                </li>
                <li class="c-table__quantity qty popup__product-price">
                    x
                    <span class="js-smallCartAmount"><?php echo $item['countInCart'] ?></span>
                    <span class="js-cartPrice"><?php echo $item['priceInCart'] ?></span>
                </li>
            </ul>
        </td>
        <td class="c-table__remove small-cart-remove popup__product-remove">
            <a href="javascript: void(0);"
               class="deleteItemFromCart js-delete-from-cart"
               title="<?php echo lang('delete'); ?>"
               data-delete-item-id="<?php echo $item['id'] ?>"
               data-property="<?php echo $item['property'] ?>"
               data-variant="<?php echo(!empty($item['variantId']) ? $item['variantId'] : 0); ?>">
                <div class="icon__cart-remove">
                    <i aria-hidden="true"
                       class="fas fa-trash-alt"></i>
                </div>
            </a>
        </td>
    </tr>
<?php } ?>

<div class="c-cart mg-desktop-cart">
    <a class="c-cart__small cart"
       href="<?php echo SITE ?>/cart">
        <span class="small-cart-icon"></span>
        <div class="mini-basket js-mini-basket">

            <i aria-hidden="true" 
               class="fas fa-shopping-basket"></i>
            <span class="countsht"><?php if($data['cartData']['cart_count'] > 0) : ?><?php echo $data['cartData']['cart_count'] ? $data['cartData']['cart_count'] : 0 ?><?php endif; ?></span>
        </div>
    </a>
    <textarea class="smallCartRowTemplate"
              style="display:none;">
              <?php $smallCartRow(); ?>
                c-cart__small
              </textarea>
    <?php if($data['cartData']['cart_count'] > 0) : ?>
      <div class="c-cart__dropdown small-cart">
          <div class="l-row">
              <div class="l-col min-0--12">
                  <div class="popup__title"><?php echo lang('cartTitle'); ?></div>
              </div>
              <div class="l-col min-0--12">
                  <div class="c-table c-table--scroll popup-body">
                      <table class="small-cart-table popup__table">
                        <?php
                        if (!empty($data['cartData']['dataCart'])) {
                          foreach ($data['cartData']['dataCart'] as $item) {
                            $smallCartRow($item);
                          }
                        }
                        ?>
                      </table>
                  </div>
                  <ul class="c-table__footer total popup__sum-list">
                      <li class="c-table__total total-sum popup__total-sum"><?php echo lang('cartPay'); ?>
                          <span>
                              <?php
                              if (!empty($data['cartPrice'])) {
                                echo $data['cartPrice'] . " " . $data['currency'];
                              }
                              ?>
                          </span>
                      </li>
                      <li class="checkout-buttons popup__chekout-buttons">
                          <a href="<?php echo SITE ?>/cart"
                             class="c-button c-button--link input-button">
                            <?php echo lang('cartLink'); ?>
                          </a>
                          <a href="<?php echo SITE ?>/order"
                             class="c-button">
                            <?php echo lang('cartCheckout'); ?>
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
    <?php endif; ?>
</div>