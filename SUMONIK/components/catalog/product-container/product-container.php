<div class="catalog-page__list product-container">
  <div class="catalog-page__products catalog__products js-product-container">
    <div class="product-container__list js-product-container__list">
      <?php foreach ($data['items'] as $product) {
        component('product/product-element', $product);
      };?>
    </div>
  </div>
  
  <?php if(MG::getSetting('filterCatalogMain') === "true" || (MG::getSetting('filterCatalogMain') === "false" && $_REQUEST['category_id'] !== 0)) : ?>
	  <?php 
	  component('catalog/product-container/filter-panel', $data); ?>
	<?php endif; ?>
</div>