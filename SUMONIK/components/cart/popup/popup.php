<?php
mgAddMeta('components/cart/cart.js');

$popupCartRow = function (
  $item = array('product_url' => 0,
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

    <tr class = "popup__product">
        <td class="c-table__img small-cart-img">
            <a class="js-smallCartImgAnchor popup__image"
               href="<?php echo SITE . "/" . (isset($item['category_url']) ? $item['category_url'] : 'catalog/') . $item['product_url'] ?>">
                <img class="js-smallCartImg"
                     src="<?php echo $thumbsArr[30]['main'] ?>"
                     srcset="<?php echo $thumbsArr[30]['2x'] ?> 2x"
                     alt="<?php echo $item['title'] ?>">
            </a>
        </td>
        <td class="c-table__name small-cart-name popup__product-info">
            <ul class="small-cart-list">
                <li>
                    <a class="c-table__link js-smallCartProdAnchor popup__product-name"
                       href="<?php echo SITE . "/" . (isset($item['category_url']) ? $item['category_url'] : 'catalog/') . $item['product_url'] ?>">
                      <?php echo $item['title'] ?>
                    </a>
                    <span class="property js-smallCartProperty">
                        <?php echo $item['property_html'] ?>
                    </span>
                </li>
                <li class=" qty popup__product-price">
                    x
                    <span class="js-smallCartAmount"><?php echo $item['countInCart'] ?></span>
                    <span class="js-cartPrice"><?php echo $item['priceInCart'] ?></span>
                </li>
            </ul>
        </td>
        <td class="c-table__remove small-cart-remove popup__product-remove">
            <a href="#"
               class="deleteItemFromCart js-delete-from-cart"
               title="<?php echo lang('delete'); ?>"
               data-delete-item-id="<?php echo $item['id'] ?>"
               data-property="<?php echo $item['property'] ?>"
               data-variant="<?php echo (!empty($item['variantId']) ? $item['variantId'] : 0); ?>">
                <div class="icon__cart-remove">
                    <i class="fas fa-trash-alt"></i>
                </div>
            </a>
        </td>
    </tr>
<?php } ?>

<div class="popup__title"><?php echo lang('cartTitle'); ?></div>
<div class="c-table popup-body">
    <textarea class="popupCartRowTemplate"
              style="display:none;">
        <?php $popupCartRow(); ?>
    </textarea>
    <table class="small-cart-table js-popup-cart-table popup__table">
      <?php
      if (!empty($data['dataCart'])) {
        foreach ($data['dataCart'] as $item) {
          $popupCartRow($item);
        }
      }
      ?>
    </table>
</div>
<div class="popup-footer popup__footer">
    <ul class="c-table__footer total sum-list popup__sum-list">
        <li class="c-table__total total-sum popup__total-sum">
          <?php echo lang('toPayment') ?>:
            <span class="total-payment">
                <?php
                if (!empty($data['cart_price_wc'])) {
                  echo $data['cart_price_wc'];
                }
                ?>
            </span>
        </li>
        <li class="checkout-buttons popup__chekout-buttons">
            <a class="c-button c-button--link c-modal__cart input-button"
               href="javascript:void(0)">
              <?php echo lang('cartContinue'); ?>
            </a>
            <a class="c-button input-button"
               href="<?php echo SITE ?>/order">
              <?php echo lang('cartCheckout'); ?>
            </a>
        </li>
    </ul>
</div>
