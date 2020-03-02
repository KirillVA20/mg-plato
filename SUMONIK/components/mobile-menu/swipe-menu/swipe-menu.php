<div class="mobile-menu__swipe-menu swipe-menu">
    <ul class="swipe-menu__list">
        <li class="swipe-menu__item">
          <a class="swipe-menu__link" 
            href="<?php echo SITE ?>" 
            title="<?php echo $page['meta_title']; ?>"
          >
            <i  aria-hidden="true"
                class="fas fa-home"></i>
            <span><?php echo lang('mainPage') ?></span>
          </a>
        </li>
        <li class="swipe-menu__item">
          <a class="swipe-menu__link" 
            href="<?php echo SITE ?>/personal" 
            title="<?php echo $page['meta_title']; ?>"
          >
            <i  aria-hidden="true"
                class="fas fa-user-circle"></i>
            <span><?php echo lang('personalArea') ?></span>
          </a>
        </li>

        <li class="swipe-menu__item">
          <a class="swipe-menu__link" 
            href="<?php echo SITE ?>/cart" 
            title="<?php echo $page['meta_title']; ?>"
          >
            <i  aria-hidden="true"
              class="fas fa-shopping-cart"></i>
            <span><?php echo lang('cartCart') ?></span>
          </a>
        </li>

        <li class="swipe-menu__item">
          <a class="swipe-menu__link" 
            href="<?php echo SITE ?>/order" 
            title="<?php echo $page['meta_title']; ?>"
          >
            <i  aria-hidden="true"
              class="fas fa-money-check-alt"></i>
            <span><?php echo lang('orderCheckout') ?></span>
          </a>
        </li>
        
        <?php if(empty($data['thisUser'])) : ?>
          <li class="swipe-menu__item">
            <a class="swipe-menu__link" 
              href="<?php echo SITE ?>/enter" 
              title="<?php echo $page['meta_title']; ?>"
            >
              <i aria-hidden="true"
               class="fa fa-check-circle"
              ></i>
              <span><?php echo lang('login'); ?></span>
            </a>
          </li>

          <li class="swipe-menu__item">
            <a class="swipe-menu__link" 
              href="<?php echo SITE ?>/registration" 
              title="<?php echo $page['meta_title']; ?>"
            >
              <i  aria-hidden="true"
                class="fas fa-clipboard-list"></i>
              <span><?php echo lang('registration'); ?></span>
            </a>
          </li>
        <?php endif; ?>

    </ul>
</div>