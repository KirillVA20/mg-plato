<?php /*
Template Name: Template name
Author: Name
Version: 1.0.0
*/ ?>

<!DOCTYPE html>
<?php
/**
 *11
 * Функция getHtmlAttributes() вставляет атрибут lang в зависимости от языка сайта,
 * а также атрибут для openGraph
 * */
?>
<html <?php getHtmlAttributes() ?>>
<head>

    <?php
    /**
    * Добавляем предзагрузку файла стилей
    * @link https://developer.mozilla.org/ru/docs/Web/HTML/Preloading_content
    * */
    ?>
    <?php $mainStyleUrl = getMainStyleLink('https://use.fontawesome.com/releases/v5.12.0/css/all.css');
    if ($mainStyleUrl !== '') {
        ?>
        <link rel="stylesheet"
              href="https://use.fontawesome.com/releases/v5.12.0/css/all.css"
              as="style">
    <?php } ?>

    <meta name="format-detection"
          content="telephone=no">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1">


    <?php
    // Выводим все CSS-файлы, подключенные в шаблоне и плагинах
    mgMeta('css', 'jquery') ?> 

</head>

<body class='<?php MG::addBodyClass('l-'); ?> js-body <?php echo User::access('admin_zone') == 1 ? "admin" : '' ?>' <?php backgroundSite(); ?> >

<?php 
mgExcludeMeta('mg-plugins/mg-product-comments-rating/css/style.css'); ?>

<?php 
layout('header', $data); ?>

<div class="shadow-page"></div> 

<?php 
component('select', $data); ?>

<?php if(MG::get('controller')=="controllers_catalog"): ?>                                          
    <main class="catalog-page page-container container">
        <?php if (class_exists('BreadCrumbs')): ?>
                <div class="bread-crumbs-wrap">
                    [brcr]
                </div>
        <?php else: ?>
            <?php 
            component('back'); ?>
        <?php endif; ?>
        
        <div class="catalog-page__content">
            <?php layout('page', $data);  ?> 
        </div>                                                                                   
    </main>
<?php else: ?>  
    <?php layout('page', $data);  ?>   
<?php endif; ?>

<?php if (MG::getSetting('popupCart') !== 'false') : ?>
    <?php 
    component('modal', $data['cartData'], 'modal_cart'); ?>
<?php endif; ?>

<?php 
component('modal', $data['cartData'], 'fast-view'); ?>                                       

<?php 
component('up'); ?>

<?php if (class_exists('YandexMapMarks') && (URL::isSection(null) || URL::isSection('feedback'))): ?>
<div class="map">
    <div class="map-title">
     <span class="page-title">
         <?php echo lang('onMap'); ?>
     </span>
 </div>
 [mg-yandex-map-marks]
</div> 
<?php endif; ?>

<?php                       
layout('footer', $data); ?>

<?php 
component('svg'); ?>

<?php
// Подключение общего скрипта шаблона
mgAddMeta('js/main.js'); ?>

<?php
// Выводим все CSS-файлы, подключенные в шаблоне и плагинах
mgMeta('js') ?> 

</body>

</html>
