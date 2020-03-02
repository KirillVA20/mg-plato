<section class="page__banner">
    <div class="page__banner-wrap">
      <div class="page__banner-container banner">
        <div class="banner__box banner__box--left">
          <div class="banner__image" 
             style = <?php echo  !empty(MG::get('templateParams')['b1_show']) ? "background-image:"."url('".PATH_SITE_TEMPLATE.MG::get('templateParams')['b1_img'] ."')" : "" ; ?>
             title="<?php echo lang('b1_title'); ?>" 
             role="img"
          ></div>

          <article class="banner__description-box">
            <div class="banner__description-sector">
              <h2 class="banner__description-title">
                <?php echo lang('b1_title'); ?>
              </h2>
              <p class="banner__description-subtitle">
                <?php echo lang('b1_subtitle'); ?>
              </p>
            </div>
            <a
              href ="<?php echo MG::get('templateParams')['b1_href'] ?>"
              title ="<?php echo MG::get('templateParams')['b2_title'] ?>"  
              class="banner__description-link">
              <?php echo lang('buttonBuy'); ?>
            </a>
          </article>
        </div>

        <div class="banner__box banner__box--right" >
          <div class="banner__image" 
            style = <?php echo !empty(MG::get('templateParams')['b2_show']) ? "background-image:"."url('".PATH_SITE_TEMPLATE.MG::get('templateParams')['b2_img'] ."')" : ""; ?>
            title="<?php echo lang('b2_title'); ?>" 
            role="img"
          ></div>
          <div class="banner__description-sector">
              <h2 class="banner__description-title">
                <?php echo lang('b2_title'); ?>
              </h2>
              <p class="banner__description-subtitle">
                <?php echo lang('b2_subtitle'); ?>
              </p>
          </div>
          <a
            href ="<?php echo MG::get('templateParams')['b2_href'] ?>"
            title ="<?php echo MG::get('templateParams')['b2_title'] ?>" 
            class="banner__description-link">
             <?php echo lang('buttonBuy'); ?>
          </a>
        </div>
      </div>
    </div>
  </section>