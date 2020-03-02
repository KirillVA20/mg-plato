<div class="container">
    <?php if (class_exists('BreadCrumbs')): ?>
               <div class="bread-crumbs-wrap">
                [brcr]
               </div>
        <?php else: ?>
            <?php 
            component('back'); ?>
        <?php endif; ?>
    <?php component('compare/favorites/add', $data); ?>
    
    <div class="content product">
        <div class="product__main-content">
            <?php component('product/images', $data); ?>

            <?php component('product/main-block', $data); ?>
        </div>

        <?php 
        component('product/product-description', $data); ?>

        <?php 
        component('product/product-specification', $data); ?>
        
        <?php 
        component('product/create-review', $data); ?>
      
        <div class="product__recomended product-recomended">
            <?php 
            component(
                'carousel',
                [
                    'items' => $data['related']['products'],
                    'title' => lang('relatedAdd'),
                    'currency' => $data['related']['currency']
                ]
            );?>
        </div>

    </div>
</div>

