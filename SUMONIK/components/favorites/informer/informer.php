<?php mgAddMeta('components/favorites/informer/informer.css'); ?>

<?php
if (in_array(EDITION, array('market', 'gipermarket')) && MG::getSetting('useFavorites') == 'true') {
    $showFavorite = $_COOKIE['favorites'] ? 'favourite--open' : '';
    ?>
    <a href="<?php echo SITE ?>/favorites"
       class="js-favorites-informer favourite favourite <?php echo $showFavorite ?>">
            <i class="fas fa-heart"></i>
                
                <?php if($_COOKIE['favorites'] > 0) : ?>
                    <span class="favourite__count js-favourite-count">
                        <?php echo substr_count($_COOKIE['favorites'], ',') + 1; ?>
                    </span>
                <?php else: ?>
                    <span class="favourite__count js-favourite-count"></span>
                <?php endif; ?>
    </a>
<?php } ?>