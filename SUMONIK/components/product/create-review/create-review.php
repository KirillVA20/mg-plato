<?php if (class_exists('ProductCommentsRating')): ?>
  <div class="product__create-review create-review">
      <div class="create-review__open js-create-review__open">
          <h3>
              <?php echo lang('writeReview'); ?>
          </h3>
      </div>
      <div class="create-review__form-wrap create-review__form-wrap--close js-create-review__form-wrap">
          [mg-product-comments-rating id="<?php echo $data['id'] ?>"]
      </div>
  </div>
<?php endif; ?>