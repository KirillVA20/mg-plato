<?php mgAddMeta('components/catalog/item/item.css'); ?>

<div class="c-goods__item product-wrapper js-catalog-item"
  <?php if (MG::get('controller') == "controllers_product"): ?> itemprop="isRelatedTo"<?php endif; ?>
     itemscope
     itemtype="http://schema.org/Product">
    <meta itemprop="sku"
          content="<?php echo $data['item']["code"] ?>">
    <meta itemprop="description"
          content="<?php
          if ($data['item']["short_description"]) {
            echo MG::textMore($data['item']["short_description"], 80);
          } else {
            echo MG::textMore($data['item']["description"], 80);
          }
          ?>">

  <?php
  // Кнопки добавлени товара в избранное
  component(
    'favorites/btns',
    $data['item']
  );
  ?>

    <span itemprop="name"
          class="hidden">
        <?php echo $data['item']["title"] ?>
    </span>

    <div class="c-goods__left">
        <a class="c-goods__img"
           title="<?php echo $data['item']["title"] ?>"
           href="<?php echo $data['item']["link"] ?>">

            <div class="c-ribbon">
              <?php
              if (!empty($data['item']['old_price']) && $oldprice > $price) {
                $price = floatval(MG::numberDeFormat($data['item']['price']));
                $oldprice = floatval(MG::numberDeFormat($data['item']['old_price']));
                $calculate = ($oldprice - $price) / ($oldprice / 100);
                $result = "" . round($calculate) . " %";
                echo '<div class="c-ribbon__sale"> -' . $result . ' </div>';
              }
              echo $data['item']['new'] ? '       <div class="c-ribbon__new">' . lang('stickerNew') . '</div>' : '';
              echo $data['item']['recommend'] ? ' <div class="c-ribbon__hit">' . lang('stickerHit') . '</div>' : '';
              ?>

            </div>


            <!-- Изображение товара -->
          <?php
          // Получаем массив миниатюр
          $thumbsArr = getThumbsFromUrl(explode('|', $data['item']['image_url'])[0], $data['item']['id']); ?>

            <img class="mg-product-image js-catalog-item-image"
                 src="<?php echo $thumbsArr[30]['main'] ?>"
                 srcset="<?php echo $thumbsArr[30]['2x'] ?> 2x"
                 alt="<?php echo $data['item']['images_alt'][0] ?>"
                 title="<?php echo $data['item']['images_title'][0] ?>"
                 data-transfer="true"
                 data-product-id="<?php echo $data['item']['id'] ?>"
                 loading="lazy"
                 width="200"
                 height="200">
            <!--   Изображение товара – конец   -->

        </a>

      <?php if (class_exists('Rating')): ?>
          [rating id = "<?php echo $data['item']['id'] ?>"]
      <?php endif; ?>

    </div>

    <div class="c-goods__right">
        <div class="c-goods__price">
          <?php if ($data['item']["old_price"] != ""): ?>
              <s class="c-goods__price--old product-old-price old-price"
                <?php echo (!$data['item']['old_price']) ? 'style="display:none"' : '' ?>>
                <?php echo $data['item']['old_price'] . $data['item']['currency']; ?>
              </s>
          <?php endif; ?>

            <div class="c-goods__price--current product-price js-change-product-price">
                <span><?php echo priceFormat($data['item']["price"]) ?></span>
                <span><?php echo $data['item']['currency']; ?></span>
            </div>
        </div>

        <a class="c-goods__title"
           title="<?php echo $data['item']["title"] ?>"
           href="<?php echo $data['item']["link"] ?>">
            <span><?php echo $data['item']["title"] ?></span>
        </a>

        <div class="c-goods__description">
          <?php
          if ($data['item']["short_description"]) {
            echo MG::textMore($data['item']["short_description"], 80);
          } else {
            echo MG::textMore($data['item']["description"], 80);
          }
          ?>
        </div>

        <div class="c-goods__footer">
            <form action="<?php echo SITE . $data['item']['liteFormData']['action'] ?>"
                  method="<?php echo $data['item']['liteFormData']['method'] ?>"
                  class="property-form js-product-form <?php echo $data['item']['liteFormData']['catalogAction'] ?>"
                  data-product-id='<?php echo $data['item']['liteFormData']['id'] ?>'>

                <div class="c-form">
                  <?php
                  // Варианты товара, если разрешены в настройках
                  if (MG::getSetting('printVariantsInMini') == 'true') {
                    component(
                      'product/variants',
                      $data['item']
                    );
                  }
                  ?>
                </div>

                <div class="buy-container">
                    <div class="c-buy js-product-controls">
                      <?php
                      if (MG::getSetting('printQuantityInMini') == 'true') {
                        component(
                          'amount',
                          [
                            'id' => $data['item']['id'],
                            'maxCount' => $data['item']['liteFormData']['maxCount'],
                            'count' => '1',
                          ]
                        );
                      }
                      ?>
                        <div class="c-buy__buttons">
                          <?php
                          // Кнопка добавления товара в корзину
                          component(
                            'cart/btn/add',
                            $data['item']
                          );
                          ?>

                          <?php
                          if (
                            (EDITION == 'gipermarket' || EDITION == 'market') &&
                            ($data['item']['liteFormData']['printCompareButton'] == 'true')
                          ) {
                            component(
                              'compare/btn/add',
                              $data['item']
                            );
                          }
                          ?>
                        </div>

                        <!-- Плагин купить одним кликом-->
                      <?php if (class_exists('BuyClick')): ?>
                          [buy-click id="<?php echo $data['item']['id'] ?>"]
                      <?php endif; ?>
                        <!--/ Плагин купить одним кликом-->

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>