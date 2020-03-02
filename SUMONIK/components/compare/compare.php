<!-- compare - start -->
<?php
mgAddMeta('components/compare/compare.js');
mgAddMeta('components/compare/compare.css');
mgAddMeta('components/item/item.css');
?>
<?php
if (!empty($data['catalogItems'])) { ?>
    <div class="c-compare mg-compare-products js-compare-page">
        <!-- top - start -->
        <div class="c-compare__top   mg-compare-left-side">
            <?php if (!empty($_SESSION['compareList'])) { ?>

                <div class="c-compare__top__select   mg-category-list-compare">
                    <?php if (MG::getSetting('compareCategory') != 'true') { ?>
                        <form class="c-form c-form--width">
                            <select name="viewCategory" 
                                    onChange="this.form.submit()"
                                    class="input-button"
                            >
                                <?php 
                                foreach ($data['arrCategoryTitle'] as $id => $value): ?>
                                    <option value='<?php echo $id ?>' <?php
                                    if ($_GET['viewCategory'] == $id) {
                                        echo "selected=selected";
                                    }
                                    ?> ><?php echo $value ?></option>
                                <?php endforeach; ?>
                            </select>
                        </form>
                    <?php } ?>
                </div>

                <div class="c-compare__top__buttons">
                    <a class="c-button c-compare__clear mg-clear-compared-products input-button"
                       href="<?php echo SITE ?>/compare?delCompare=1">
                        <i class="fas fa-trash-alt"></i>
                        <?php echo lang('compareClean'); ?>
                    </a>
                    <a class="c-button input-button" href="<?php echo SITE ?>">
                        <i class="fas fa-chevron-left"></i>
                        <?php echo lang('compareBack'); ?>
                    </a>
                </div>

            <?php } ?>
        </div>
        <!-- top - end -->


        <!-- right block - start -->
        <div class="c-compare__right js-scroll-container">

            <!-- items - start -->
            <div class="c-compare__wrapper mg-compare-product-wrapper">

                <?php if (!empty($data['catalogItems'])) {
                    foreach ($data['catalogItems'] as $item) { ?>
                        <div class="c-goods__item mg-compare-product js-compare-item" itemscope
                             itemtype="http://schema.org/Product">
                            <div class="c-goods__left">
                                <a class="c-compare__remove mp-remove-compared-product"
                                   href="<?php echo SITE ?>/compare?delCompareProductId=<?php echo $item['id'] ?>">
                                    <i class="fas fa-times"></i>
                                </a>
                                <a class="c-goods__img" href="<?php echo $item['link'] ?>">
                                    <?php echo mgImageProduct($item); ?>
                                </a>
                            </div>
                            <div class="c-goods__right">
                                <div class="c-goods__price mg-compare-product-list product-status-list">
                                    <div class="price">
                                        <?php echo $item['price'] ?> <?php echo $item['currency']; ?>
                                    </div>
                                    <?php if ($item["old_price"] != ""): ?>
                                        <s class="c-goods__price--old old-price" <?php echo (!$item['old_price']) ? 'style="display:none"' : '' ?>>
                                            <?php echo MG::numberFormat($item['old_price']); ?>
                                        </s>
                                    <?php endif; ?>
                                </div>
                                <a class="c-goods__title" 
                                   href="<?php echo $item['link'] ?>" 
                                   itemprop="name"
                                   content="<?php echo $item["title"] ?>"
                                   alt="<?php echo $item['title']; ?>"
                                   title="<?php echo $item['title']; ?>"
                                >
                                    <?php echo $item['title']; ?>
                                </a>
                                <div class="c-compare__property">
                                    <?php echo $item['propertyForm'] ?>
                                </div>
                                <?php foreach ($item['stringsProperties'] as $key => $val) {
                                    $propTable[$key][$item['id']] = $val;
                                } ?>
                            </div>
                        </div>

                        <?php $prodIds[] = $item['id'];
                    }
                } ?>
            </div>
            <!-- items - end -->

            <?php foreach ($propTable as $key => $prop) {
                foreach ($prodIds as $id) {
                    if (empty($prop[$id])) {
                        $propTable[$key][$id] = '-';
                        ksort($propTable[$key]);
                    }
                }
            } ?>

            <!-- right table - start -->
            <div class="c-compare__table c-compare__table__right  mg-compare-fake-table-right ">
                <?php foreach ($propTable as $key => $prop) { ?>
                    <div class="c-compare__row   mg-compare-fake-table-row">
                        <?php foreach ($prop as $prodId => $val) { ?>
                            <div class="c-compare__column   mg-compare-fake-table-cell">
                                <?php echo $val ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <!-- right table - start -->
        </div>
        <!-- right block - end -->


        <!-- left block - start -->
        <div class="c-compare__left">
            <!-- left table - start -->
            <div class="c-compare__table c-compare__table__left  mg-compare-fake-table">
                <div class="c-compare__row   mg-compare-fake-table-left <?php echo $data['moreThanThree'] ?>">
                    <?php foreach ($propTable as $key => $prop) { ?>
                        <div class="c-compare__column   mg-compare-fake-table-cell <?php if (trim($data['property'][$key]) !== '') : ?>with-tooltip<?php endif; ?>">

                            <div class="compare-text" title="<?php echo $key ?>">
                                <?php echo $key ?>
                            </div>
                            <?php if (trim($data['property'][$key]) !== '') : ?>
                                <div class="mg-tooltip">?
                                    <div class="mg-tooltip-content"
                                         style="display:none;"><?php echo $data['property'][$key] ?></div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- left table - end -->
        </div>
        <!-- left block - end -->
    </div>
<?php } else { ?>
    <div class="empty-wrap">
        <div class="empty-compare">
            Нет товаров для сравнения
        </div>
        <div>
            <button class="input-button">
                В каталог товаров
            </button>
        </div>
    </div>
<?php } ?>
<!-- compare - end -->