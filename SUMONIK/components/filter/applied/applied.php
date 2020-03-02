<?php
mgAddMeta('components/filter/applied/applied.css');

if (empty($data)) {
    $style = ' style="display:none"';
} else {
    $style = '';
} ?>

<div class="l-col min-0--12 apply-filter">

    <div class="c-apply apply-filter-line">
        <form action="?" class="c-apply__form apply-filter-form"
              data-print-res="<?php echo MG::getSetting('printFilterResult') ?>" <?php echo $style ?>>
              <div class="c-apply__title apply-filter-title" <?php echo $style ?>>
                <?php echo lang('filterApplied'); ?>
              </div>
            <ul class="c-apply__tags filter-tags">
                <?php foreach ($data as $property) {
                    $cellCount = 0;
                    ?>
                    <li class="c-apply__tags--item apply-filter-item">
                        <span class="c-apply__tags--name filter-property-name">
                            <?php echo $property['name'] . ": "; ?>
                        </span>

                        <?php if (in_array($property['values'][0], array('slider|easy', 'slider|hard', 'slider'))) {
                            ?>
                            <span class="c-apply__tags--value filter-price-range">
                                <?php echo lang('filterFrom') . " " . $property['values'][1] . " " . lang('filterTo') . " " . $property['values'][2]; ?>
                                <a role="button" href="javascript:void(0);" class="c-apply__tags--remove removeFilter">
                                    <i class="fas fa-times"></i>
                                </a>
                            </span>

                            <?php if ($property['code'] != "price_course"): ?>
                                <input name="<?php echo $property['code'] . "[" . $cellCount . "]" ?>"
                                       value="<?php echo $property['values'][0] ?>" type="hidden"/>
                                <?php $cellCount++; ?>
                            <?php endif; ?>

                            <input name="<?php echo $property['code'] . "[" . $cellCount . "]" ?>"
                                   value="<?php echo $property['values'][1] ?>" type="hidden"/>
                            <input name="<?php echo $property['code'] . "[" . ($cellCount + 1) . "]" ?>"
                                   value="<?php echo $property['values'][2] ?>" type="hidden"/>
                        <?php } else { ?>
                            <ul class="c-apply__tags--values filter-values">
                                <?php foreach ($property['values'] as $cell => $value) {
                                    ?>
                                    <li class="c-apply__tags--value apply-filter-item-value">
                                        <?php echo $value['name']; ?>
                                        <a role="button" href="javascript:void(0);"
                                           class="c-apply__tags--remove removeFilter">
                                            <i class="fas fa-times"></i>
                                        </a>
                                        <input name="<?php echo $property['code'] . "[" . $cell . "]" ?>"
                                               value="<?php echo $property['values'][$cell]['val'] ?>" type="hidden"/>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>

                    </li>
                <?php } ?>
            </ul>
            <div class="c-apply__refresh">
                <a href="<?php echo SITE . URL::getClearUri() ?>"
                   class="c-button refreshFilter input-button"><?php echo lang('filterReset'); ?></a>
            </div>
            <input type="hidden" name="applyFilter" value="1"/>
        </form>
    </div>
</div>