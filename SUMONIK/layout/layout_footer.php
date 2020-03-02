<footer class="footer-menu">
    <div class="footer-menu__container">

      <div class="footer-menu__info footer-menu__section">
        <nav>
          <ul>
            <li class="footer-menu__info-item">
              <div class="footer-menu__info-icon">
                <i class="fas fa-location-arrow"></i>
              </div>
              <span>
                <?php echo MG::getSetting('shopAddress'); ?>
              </span>
            </li>
            
            <li class="footer-menu__info-item">
              <div class="footer-menu__info-icon">
                <i class="fas fa-at"></i>
              </div>
              <span>
                <a href="mailto:<?php echo MG::get('templateParams')['email']; ?>">
                  <?php echo MG::get('templateParams')['email']; ?> 
                </a>
              </span>
            </li>

            <li class="footer-menu__info-item">
              <div class="footer-menu__info-icon">
                <i class="far fa-clock"></i>
              </div>
              <span>
                <?php echo MG::getSetting('timeWork'); ?> 
              </span>
            </li>

            <li class="footer-menu__info-item">
              <div class="footer-menu__info-icon">
                <i class="fas fa-phone-alt"></i>
              </div>
              <div class="footer-menu__phone-list">
                <?php $phones = explode(', ', MG::getSetting('shopPhone'));
                foreach ($phones as $phone) { ?>
                    <a href="tel:<?php echo str_replace(' ', '', $phone); ?>">
                      <span itemprop="telephone">
                            <?php echo $phone; ?>
                      </span>
                    </a>
                <?php }; ?>
              </div>
            </li>
          </ul>
        </nav>
      </div>

      <div class="footer-menu__about footer-menu__section">
        <div class="footer-menu__logo">
          <a href="<?php echo SITE ?>">
            <img src="<?php echo SITE; ?><?php echo MG::getSetting('shopLogo'); ?>" 
               alt="<?php echo MG::getSetting('shopName'); ?> " 
               title="<?php echo MG::getSetting('shopName'); ?>"
            >
          </a>
        </div>
        <div class="footer-menu__description">
          <span>
            <?php echo MG::get('templateParams')['footer_description'] ?>
          </span>
        </div>

        <div class="footer-menu__social">
          <div class="footer-menu__social-icon">
            <i class="fab fa-facebook-f"></i>
          </div>
          <div class="footer-menu__social-icon">
            <i class="fab fa-instagram"></i>
          </div>
          <div class="footer-menu__social-icon">
            <i class="fab fa-vk"></i>
          </div>
        </div>
        
      </div>

      <div class="footer-menu__user-pages footer-menu__section">
        <nav class="footer-menu__page-list">
          <ul class="user__category-list">
            <li class="user__category">
              <a href="<?php echo SITE ?>" 
                 class="user__link">
                  <span>
                    <?php echo lang('mainPage'); ?>
                  </span>
                  <i  aria-hidden="true"
                      class="fas fa-home"></i>
              </a>
            </li>
            <li class="user__category">
              <a href="<?php echo SITE ?>/catalog" 
                 class="user__link">
                  <span>
                    <?php echo lang('menuCatalog'); ?>
                  </span>
                  <i class="fas fa-list-ul"></i>
              </a>
            </li>
            <li class="user__category">
              <a class="user__link" 
                href="<?php echo SITE ?>/personal" 
                title="Registration"
              >
                <span>
                  <?php echo lang('personalArea'); ?>
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
                    <?php echo lang('registration') ?>
                  </span>
                  <i  aria-hidden="true"
                      class="fas fa-clipboard-list"></i>
                  
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
  </div>
</footer>
