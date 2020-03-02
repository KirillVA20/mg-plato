<section class="page__product product-container ">
  <div class="product-container__box">
       <div class="product-container__head">
          <h3>
            Рекомендуемые
          </h3>
       </div>

      <div class="product-container__list product-container__list--grid product-container__list--main-column ">
        <?php foreach ($data as $saleProduct) {
            component(
                        'product/product-element',
                        $saleProduct
                    );
          };
        ?>
      </div>
  </div>
</section>