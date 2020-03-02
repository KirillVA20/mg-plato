<?php if (!empty($data['stringPropertiesSorted']['unGroupProperty'])) : ?>
  <div class="product__specifications product-specifications">
      <h3 class="product-specifications__title block__title"><?php echo lang('productCharacteristics'); ?></h3>
      <?php foreach ($data['stringPropertiesSorted']['unGroupProperty'] as $specifications) : ?>
          <div class="product-specifications__table">
              <div class="product-specifications__element">
                  <div class="product-specifications__element--left">
                    <span><?php echo $specifications['name_prop']; ?></span>
                  </div>  
                  <div class="product-specifications__element--right">
                    <span><?php echo $specifications['name']; ?></span>
                  </div>   
              </div>
          </div>
      <?php endforeach ;?>
  </div>
<?php endif;?>