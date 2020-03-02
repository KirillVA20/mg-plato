<?php
mgAddMeta('components/compare/link/link.css');
mgAddMeta('components/compare/link/link.js');
?>

<a class="c-compare__link mg-product-to-compare js-to-compare-link"
   href="<?php echo SITE ?>/compare"
   title="<?php echo lang('compareToList'); ?>">
    <span class="c-compare__link--icon">
        <i class="fas fa-random"></i>
    </span>
            <?php if (isset($_SESSION['compareCount']) && $_SESSION['compareCount'] > 0) { ?>
               <span class="c-compare__link--count mg-compare-count js-compare-count"><?php echo $_SESSION['compareCount']; ?></span>
            <?php  } else { ?>
                <span class="c-compare__link--count mg-compare-count js-compare-count"></span>
            <?php }; ?>
    </span>
</a>

<?php component('compare/informer'); ?>

