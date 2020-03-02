
<div class="catalog-page__title">
  <h1 class ="page-title">
    <?php echo $data['titleCategory'] ?>
  </h1>
</div>

<?php  
component('catalog/catalog-description', $data); ?>

<hr>


<?php if(MG::getSetting('picturesCategory') !== 'false') : ?>
	<?php 
	component('catalog/categories', $data['cat_id']); ?>
<?php endif; ?>


<?php  
component('catalog/filter'); ?>


<?php  
component('filter/applied', $data['applyFilter']); ?>

<?php 
component('catalog/product-container', $data); ?>

<div class="catalog-page__second-description">
	<span class="catalog-description__text-element">
		<?php echo $data['cat_desc_seo']; ?>
	</span>
</div>
