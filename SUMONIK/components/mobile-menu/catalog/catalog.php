<div class="page__catalog catalog">
  <div class="catalog__menu">

    <div class="catalog__button material-icons js-list-link" 
      id="category-list"
    >
      КАТЕГОРИИ
    </div>
    <ul class="catalog__list">
      <?php foreach ($data['menuCategories'] as $category) : ?>
          <li class="catalog__item">
            <a href="<?php echo $category['link'] ?>" 
              class="catalog__link" 
              title="<?php echo $category['menu_title']; ?>"
            >
              <?php echo $category['menu_title']; ?>
            </a>
            <?php if(!empty($category['child'])) { ?>
              <i aria-hidden="true"
                 class="material-icons catalog__icon js-list-link"
              ></i>
              <ul class="catalog__list">
                <?php foreach ($category['child'] as $subCategory) : ?>
                  <li class="catalog__item">
                    <a href="#" 
                      class="catalog__link" 
                      title="<?php echo $subCategory['menu_title']; ?>"
                    >
                      <?php echo $subCategory['menu_title']; ?>
                    </a>
                    <?php if(!empty($subCategory['child'])) { ?>
                      <i aria-hidden="true"
                         class="material-icons catalog__icon js-list-link"
                      ></i>
                      <ul class="catalog__list">
                        <?php foreach ($subCategory['child'] as $subCategoryItem) : ?>
                          <li class="catalog__item">
                            <a href="#" 
                              class="catalog__link" 
                              title="<?php echo $subCategoryItem['menu_title']; ?>"
                            >
                              <?php echo $subCategoryItem['menu_title']; ?>
                            </a>
                          </li>
                         <?php endforeach; ?> 
                      </ul>
                    <?php }; ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php }; ?>
          </li>
      <?php endforeach; ?>
    </ul>

  </div>
</div>