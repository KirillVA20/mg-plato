<div class="product__main-block main-block">
    <div class="main-block__head">
        <h1 class="main-block__name"><?php echo $data['title']; ?></h1>

        <div class="main-block__rating">
            <div class="main-block__rating-stars">
                <?php if (class_exists('ProductCommentsRating')): ?>
                    [mg-product-rating id="<?php echo $data["id"]; ?>"] 
                <?php endif; ?>
            </div> 
            <div class="main-block__review-number">
                <a href="">
                    <?php if (class_exists('ProductCommentsRating')): ?>
                    <?php echo lang('productCommentsRating'); ?>:
                    [mg-product-count-comments item="<?php echo (MG::getSetting('shortLink') == 'true' ? '' : $data['category_url']).'/'.$data['url'] ?>"] 
                    <?php endif; ?>
                </a>
            </div>
        </div>

        <div class="main-block__price">
            <div class="main-block__new-price">
                <?php 
                echo $data['price']; ?>
                <?php 
                echo $data['currency']; ?>
            </div>
            <?php if(!empty($data['old_price'])) : ?>
                <div class="main-block__old-price">
                    <?php 
                        echo $data['old_price']; ?>
                    <?php 
                        echo $data['currency']; ?>
                </div>
            <?php endif; ?>
        </div>

        <ul class="main-block__product-avail">
            <li><?php echo lang('model'); ?>: <?php echo $data['code']; ?></li>
            <li>
                <?php  
                component('product/count', $data); ?>
            </li>
            <li>
              <?php 
              component('product/opfields', $data); ?>
              
            </li>
            <li>
              <?php 
              component('product/wholesales', $data['wholesalesData']); ?>
            </li>
            <li>
              <?php 
              component('product/html-properties', $data['propertyForm']['htmlProperty']); ?>
            </li>

            <li>
              <?php 
              component('product/storages', $data['storages']); ?>
            </li>
        </ul>


    </div>
    <div class="main-block__form">
        <h3><?php echo lang('availableOptions'); ?></h3>
        <form action="<?php echo SITE . $data['liteFormData']['action'] ?>"
              method="<?php echo $data['liteFormData']['method'] ?>"
              class="property-form js-product-form <?php echo $data['liteFormData']['catalogAction'] ?>"
              data-product-id='<?php echo $data['liteFormData']['id'] ?>'>

            <div class="c-form">
              <?php

              // Варианты товара, если разрешены в настройках
              if (MG::getSetting('printVariantsInMini') == 'true') {
                component(
                  'product/variants',
                  $data
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
                        'id' => $data['id'],
                        'maxCount' => $data['liteFormData']['maxCount'],
                        'count' => '1',
                      ]
                    );
                  }
                  ?>
                  <?php 
                  component('product/amount'); ?>
                    <div class="c-buy__buttons  c-buy--catalog">
                      <?php
                      // Кнопка добавления товара в корзину
                      component(
                        'cart/btn/add',
                        $data
                      );
                      ?>

                      <?php
                      if (
                        (EDITION == 'gipermarket' || EDITION == 'market') &&
                        ($data['liteFormData']['printCompareButton'] == 'true')
                      ) : ?>
                        <ul class="main-block__button-wrap">
                            <li>
                                <?php component('compare/btn/add', $data); ?>
                            </li>
                        </ul>
                      <?php endif; ?>
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