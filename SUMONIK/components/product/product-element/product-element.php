
<div class="product-container__element product-element product-element--grid">
  <div class="product-element__container">
    <div class="product-element__image-box">
      <a href="#" 
        class="product-element__text-link js-product-element__fast-view" 
        title=""
        data-item-id="<?php echo $data['id']; ?>"
        data-product-url="<?php echo $data['link']; ?>"
      > 
        <i class="fas fa-eye"></i>
      </a>
      <a href="<?php echo $data['link']; ?>" 
        class="product-element__picture-link" 
        title=""
      >
        <?php
            // Получаем массив миниатюр
            $thumbsArr = getThumbsFromUrl(explode('|', $data['image_url'])[0], $data['id']); ?>

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
      <form action="<?php echo SITE . $data['liteFormData']['action'] ?>"
              method="<?php echo $data['liteFormData']['method'] ?>"
              class="property-form js-product-form <?php echo $data['liteFormData']['catalogAction'] ?>"
              data-product-id='<?php echo $data['liteFormData']['id'] ?>'>
      <?php if (MG::getSetting(printVariantsInMini) !== "false") : ?>
              <div class="product-element__variants">
                <?php component(
                      'product/variants',
                      $data
                    ); 
                ?>
              </div>
            <?php endif; ?>
      </form>
    </div>
    
    <div class="product-element__buy-info">
      <div class="product-element__caption">
        <div class="product-element__new-prise">
          <?php 
          echo $data['price']; ?>
          <span>
            <?php 
            echo $data['currency']; ?>
          </span>
        </div>
        <?php if(!empty($data['old_price'])) { ?>
          <div class="product-element__old-prise">
            <?php echo $data['old_price']; ?>
          </div>
        <?php }; ?>  

        <a class="product-element__name"
           href="<?php echo $data['link']; ?>">       
          <?php echo $data['title']; ?>
        </a>

        <div class="product-element__description">
          <?php         
          echo $data["description"]; ?>
        </div>

        <div class="product-element__rating">
           <?php
           echo !(class_exists('Rating')) ?: "[mg-product-rating id=". $data['id'] ."]" ?>
        </div>

      </div>

      <div class="product-element__button-box">
        <form action="<?php echo SITE . $data['liteFormData']['action'] ?>"
              method="<?php echo $data['liteFormData']['method'] ?>"
              class="property-form js-product-form <?php echo $data['liteFormData']['catalogAction'] ?>"
              data-product-id='<?php echo $data['liteFormData']['id'] ?>'>
        
                  <?php
                  if (MG::getSetting('printQuantityInMini') == 'true') {
                    component(
                      'product/amount',
                      [
                        'id' => $data['id'],
                        'maxCount' => $data['liteFormData']['maxCount'],
                        'count' => '1',
                      ]
                    );
                  }
                  ?>

            <div class="buy-container">
                <div class="c-buy js-product-controls c-buy--product-element">
                      <?php
                      if (
                        (EDITION == 'gipermarket' || EDITION == 'market') &&
                        ($data['liteFormData']['printCompareButton'] == 'true')
                      ) {
                        component(
                          'cart/btn/add',
                          $data
                        );
                      }
                      ?>
                </div>
            </div>
        </form>
        

        <div class="product-element__button-wrap">
          <?php if (MG::getSetting('useFavorites') !== 'false') : ?>
            <div class="product-element__button-marker">
              <?php component('favorites/btns', $data); ?>
            </div>
          <?php endif; ?>
          
          <?php if (MG::getSetting('printCompareButton') !== 'false') : ?>
            <div class="product-element__button-compare">
              <?php component('compare/btn/add', $data); ?>
            </div>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>