<?php
mgAddMeta('components/modal/modal.js');
mgAddMeta('components/modal/modal.css');
?>
<div class="c-modal c-modal--700"
     id="js-modal__fast-view">
    <div class="c-modal__wrap">
        <div class="c-modal__content product-content">
            <div class="c-modal__close">
                <svg class="icon icon--close">
                    <use xlink:href="#icon--close"></use>
                </svg>
            </div>

            <div class="c-modal__photo">
                <img id="c-modal__photo" 
                     src="" 
                     alt=""
                     data-image-path="<?php echo SITE; ?>/uploads/"
                >                
            </div>
            
            <div class="c-modal__info">
                <div class="c-modal__title"></div>
                <div class="c-modal__price">
                    <span class="c-modal__price-title">
                        <?php echo lang('productPrice'); ?>
                    </span>
                    <span class="c-modal__price-new">
                        
                    </span>

                    <span class="c-modal__price-currency">
                        
                    </span>

                    <span class="c-modal__price-old">
                        
                    </span>
                </div>
                <div class="c-modal__descripiton">
                    <span class="c-modal__descripiton-title">
                        <?php echo lang('productDescription'); ?>:
                    </span>
                    <span class="c-modal__description-text">
                        
                    </span>
                </div>
            </div>

            <a class="c-modal__more-button input-button"
                href=""
            >
                <?php echo lang('buttonMore'); ?>
            </a>
        </div>
    </div>
</div>
