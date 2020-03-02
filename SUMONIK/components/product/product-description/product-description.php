<?php if(!empty($data['description'])) : ?>
  <div class="product__description product-description">
      <h3 class = "product-description__title block__title"><?php echo lang('productDescription'); ?></h3>
      <div class="product-description__text">
      	<span>
      		<?php echo $data['description']; ?>
      	</span>
      </div>
  </div>
<?php endif; ?>