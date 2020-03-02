<div class="side-header-buttons">
  <div class="switch-header js-switch-header side-header-buttons__button">
    <i aria-hidden="true" 
      class="fas fa-chevron-right switch-header--icon icon-white"></i>
  </div>

  <?php if (MG::getSetting('printCompareButton') !== 'false') : ?>
    <div class="compare side-header-buttons__button">
      <?php 
      component('compare/link'); ?>
    </div>
  <?php endif; ?>

  <?php if (MG::getSetting('useFavorites') !== 'false') : ?>
    <div class="favorites side-header-buttons__button">
       <?php 
       component('favorites/informer'); ?>
    </div>
  <?php endif; ?>
      <?php 
      component('cart/small', $data); ?>
</div>

<header class="header-menu">
  <div class="js-form__wrap header-menu__settings-form settings-form">
    <?php component('settings-form', $data) ?>
  </div>
  

  <div class="header-menu__logo">
    <a href="<?php echo SITE ?>" 
      title=""
    >
      <img src="<?php echo SITE; ?><?php echo MG::getSetting('shopLogo'); ?>" 
        alt="<?php echo MG::getSetting('shopName'); ?> " 
        title="<?php echo MG::getSetting('shopName'); ?>"
      >
    </a>
  </div>

  <nav class="header-menu__category category">

    <ul class="category__list">   
      <?php foreach ($data['menuCategories'] as $category): ?>

        <?php if($category['activity'] === '1') { ?>

        <li <?php if (!empty($category['child'])) { ?>
              class="category__item category__item--item-list js-category__item" 
            <?php } else {  ?>
              class="category__item" 
            <?php }; ?>
        >
          <a class="category__link" 
            href="<?php echo $category['link']; ?>" 
            title="<?php echo $category['title']; ?>"
          >
            <?php echo $category['title']; ?>
          </a>

          <?php if (!empty($category['child'])) { ?>
            
            <?php
              $active = 0; 
              foreach($category['child'] as $subcategory) {
                if($subcategory['activity'] === '1') {
                  $active = '1';
                  break;
                }
              } 
            ?> 

            <?php if($active === '1') : ?>        

              <i aria-hidden="true"
                 class="fas fa-chevron-right"
              >
              </i>
              <ul class="category-list grid-list js-category-list">

                <?php
                 foreach($category['child'] as $subcategory) : ?>

                  <?php if($subcategory['activity'] === '1') { ?>

                    <li <?php if (!empty($subcategory['child'])) { ?>
                          class="grid-list__item js-category__item" 
                        <?php } else {  ?>
                         class="grid-list__item"
                        <?php }; ?>
                    >
                      <a href="#" 
                        class="grid-list__link" 
                        title=""
                      >
                        <?php echo $subcategory['title'] ?>
                      </a>
                       <?php if (!empty($subcategory['child'])) { ?>

                        <i aria-hidden="true"
                         class="fas fa-chevron-right"
                        >
                        </i>
                        
                          <ul class="grid-list__sub-list js-category-list">

                            <?php foreach($subcategory['child'] as $subcategoryItem) : ?>

                              <?php if($subcategoryItem['activity'] === '1') { ?>
                                <li class="grid-list__sub-item">
                                  <a href="<?php echo $subcategoryItem['link']; ?>" 
                                    class="grid-list__link" 
                                    title=""
                                  >
                                    <?php echo $subcategoryItem['title']; ?>
                                  </a>
                                </li>
                              <?php }; ?>

                            <?php endforeach; ?>

                          </ul>

                       <?php }; ?>
                    </li>

                  <?php }; ?>

                <?php endforeach; ?>

              </ul>

            <?php endif; ?>

          <?php }; ?>

        </li>

        <?php }; ?>

      <?php endforeach; ?>
    </ul>
  </nav>

  <?php 
  component('search'); ?>
  
  <nav class="header-menu__user user">

    <ul class="user__category-list">
      
      <li class="user__category">
        <a class="user__link" 
          href="<?php echo SITE ?>/personal" 
          title="Registration"
        >
          <span>
            <?php echo lang('personalArea') ?>
          </span>
          <i  aria-hidden="true"
              class="fas fa-user-circle"></i>
          
        </a>
      </li>

      <li class="user__category">
        <a class="user__link" 
          href="<?php echo SITE ?>/cart" 
          title=""
        >
          <span>
            <?php echo lang('cartCart') ?>
          </span>
          <i  aria-hidden="true"
              class="fas fa-shopping-cart"></i>
          
        </a>
      </li>

      <li class="user__category">
        <a class="user__link" 
          href="<?php echo SITE ?>/order" 
          title=""
        >
          <span>
            <?php echo lang('orderCheckout') ?>
          </span>
          <i  aria-hidden="true"
              class="fas fa-money-check-alt"></i>
          
        </a>
      </li>
      
      <?php if(empty($data['thisUser'])) : ?>
        <li class="user__category">
          <a class="user__link" 
            href="<?php echo SITE ?>/enter" 
            title=""
          >
            <span>
              <?php echo lang('login') ?>
            </span>
            <i  aria-hidden="true"
                class="fas fa-sign-in-alt"></i>
          </a>
        </li>

        <li class="user__category">
          <a class="user__link" 
            href="<?php echo SITE ?>/registration" 
            title=""
          >
            <span>
              <?php echo lang('registration'); ?>
            </span>
            <i  aria-hidden="true"
                class="fas fa-clipboard-list"></i>
            
          </a>
        </li>
      <?php endif; ?>

      <li class="user__category">
        <a class="user__link" 
          href="<?php echo SITE ?>/feedback" 
          title=""
        >
          <span>
            <?php echo lang('feedbackTitle'); ?>
          </span>
          <i  aria-hidden="true"
              class="fas fa-comments"></i>
          
        </a>
      </li>

    </ul>
  </nav>

  <address class="header-menu__contact">
    <i class="fas fa-phone-alt icon-blue"></i>
    <div class="header-menu__phone-list">
      <?php $phones = explode(', ', MG::getSetting('shopPhone'));
      foreach ($phones as $phone) { ?>
          <a href="tel:<?php echo str_replace(' ', '', $phone); ?>">
            <span itemprop="telephone">
                  <?php echo $phone; ?>
            </span>
          </a>
      <?php }; ?>
    </div>
  </address>

  <div class="header-menu__adress">
    <?php echo MG::getSetting('shopAddress'); ?> 
  </div>
  
  <ul class="header-menu__social social">

    <li class="social__item">
      <a class="social__link" 
        href="//www.youtube.com" 
        title=""
      >
        <i aria-hidden="true"
         class="fab fa-facebook-f"></i>
      </a>
    </li>

    <li class="social__item">
      <a class="social__link" 
        href="//www.youtube.com" 
        title=""
      >
        <i aria-hidden="true"
         class="fab fa-instagram"></i>
      </a>
    </li>

    <li class="social__item">
      <a class="social__link" 
        href="//www.youtube.com" 
        title=""
      >
        <i aria-hidden="true"
         class="fab fa-vk"></i>
      </a>
    </li>
  </ul>

  <nav>
    <ul class="header-menu__footer footer">

      <?php forEach ($data['menuPages'] as $page): ?>
        <?php if($page['invisible'] == 0) : ?>
          <li class="footer__item">
            <a class="footer__link" 
              href="<?php echo $page['link'] ?>" 
              title="<?php echo $page['meta_title']; ?>"
            >
              <?php echo $page['title']; ?>
            </a>
          </li>
        <?php endif; ?>
      <?php endforeach ?>      
    </ul> 
  </nav>

</header>
