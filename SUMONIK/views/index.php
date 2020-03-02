<main class="page">              

  <?php
  echo !(class_exists('Slider')) ?:"[mgslider id=" . MG::get('templateParams')['id_slider'] ."]" ?>

  <?php 
  component('index/banner'); ?>
  
  <?php if(MG::getSetting('mainPageIsCatalog') !== 'false') : ?>
    <section class="page__product product-container">
      <div class="product-container__box">
           <div class="product-container__head">
              <h3>
                <?php echo lang('recomendList'); ?>
              </h3>
           </div>

          <div class="product-container__list product-container__list--grid product-container__list--main-column">
            <?php foreach ($data['recommendProducts'] as $recomendProduct) {
                component(
                            'product/product-element',
                            $recomendProduct
                        );
              };
            ?>
          </div>
      </div>
    </section>
  <?php endif; ?>

  <?php if (MG::getSetting('mainPageIsCatalog') !== 'false') : ?>
    <section class="page__product product-container product-container--gray">
      <div class="product-container__box product-container__box--gray">
           <div class="product-container__head">
              <h3>
                <?php echo lang('indexNew'); ?>
              </h3>
           </div>

          <div class="product-container__list product-container__list--grid product-container__list--main-column">
            <?php foreach ($data['newProducts'] as $newProduct) {
                component(
                            'product/product-element',
                            $newProduct
                        );
              };
            ?>
          </div>
      </div>
    </section>
  <?php endif; ?>

  <?php if (MG::getSetting('mainPageIsCatalog') !== 'false') : ?>
    <section class="page__product product-container">
      <div class="product-container__box">
           <div class="product-container__head">
              <h3>
                <?php echo lang('saleList'); ?>
              </h3>
           </div>

          <div class="product-container__list product-container__list--grid product-container__list--main-column">
            <?php foreach ($data['saleProducts'] as $saleProduct) {
                component(
                            'product/product-element',
                            $saleProduct
                        );
              };
            ?>
          </div>
      </div>
    </section>
  <?php endif; ?>
  
  <?php if (class_exists(Brands)) : ?>
    <section class="page__brand-wrap">
      [mg-brand]
    </section>
  <?php endif; ?>
  
</main>
