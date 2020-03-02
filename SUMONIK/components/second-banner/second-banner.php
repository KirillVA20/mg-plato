<div class="page__second-banner second-banner">
    <div class="second-banner__wrap">
      <div class="second-banner__image js-second-banner__image" 
             style = <?php echo  !empty(MG::get('templateParams')['b3_show']) ? "background-image:"."url('".PATH_SITE_TEMPLATE.MG::get('templateParams')['b3_img'] ."')" : "" ; ?>
             title="<?php echo lang('b3_title'); ?>" 
             role="img"
          ></div>
    </div>
</div>