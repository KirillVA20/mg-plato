<header class="mobile-menu">
  <a class = "mobile-menu__swipe-button js-mobile-menu__swipe-button" href="#"> 
    <i aria-hidden="true"
       class="material-icons mobile-menu__swipe-icon"></i>
  </a>
  
  <?php 
    component("mobile-menu/swipe-menu", $data); ?> 

  <div class="mobile-menu__button-wrap">
    <div class="mobile-menu__button">
      <?php 
        component('cart/small', $data); ?>
    </div> 

    <?php if (MG::getSetting('useFavorites') !== 'false') : ?>
      <div class="mobile-menu__button">
        <?php 
          component('favorites/informer');?>
      </div>
    <?php endif; ?>

    <?php if (MG::getSetting('printCompareButton') !== 'false') : ?>
      <div class="mobile-menu__button">
        <?php 
          component('compare/link');?>
      </div>
    <?php endif;?>

      <div class="mobile-menu__button">
        <?php 
          component("settings-form/mobile-settings-form", $data);?>
      </div>
    </div>

  <div class="mobile-menu__shadow"></div> 

</header>

<?php 
    component('mobile-menu/catalog', $data); ?>
