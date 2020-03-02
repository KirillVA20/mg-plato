<div class="catalog-page__filter filter">
  <div class="filter__panel">
    <div class="filter__grid">
      <button class="filter__grid-button js-list-mode"
              title="<?php echo lang('viewList'); ?>"
      >
        <i aria-hidden="true"
           class="fa fa-th-list"></i>
      </button>

      <button class="filter__grid-button filter__grid-button--active js-grid-mode"
              title="<?php echo lang('viewNet'); ?>"
      >
        <i aria-hidden="true"
           class="fa fa-th"></i>
      </button>
    </div>

    <?php if(MG::getSetting('filterCatalogMain') === "true" || (MG::getSetting('filterCatalogMain') === "false" && $_REQUEST['category_id'] !== 0)) : ?>
      <div class="filter__sidebar">
        <button title="<?php echo lang('filterText') ?>"
                class="filter__sidebar-button js-filter__sidebar-button">
          <i aria-hidden="true" 
             class="fas fa-sliders-h"></i>
        </button>
      </div>
    <?php endif; ?>
  </div>
</div>
