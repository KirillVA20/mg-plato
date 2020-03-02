<?php
// Если только одно изображение, то карусель не подключаем
if (count($data["images_product"]) > 1) : ?>
  <?php mgAddMeta('lib/owlcarousel/owl.carousel.min.js'); ?>
  <?php mgAddMeta('lib/owlcarousel/owl.carousel.min.css'); ?>
  <?php mgAddMeta('components/product/images/images.carousel.js'); ?>
<?php endif; ?>

<?php mgAddMeta('lib/fancybox/jquery.fancybox.css'); ?>
<?php mgAddMeta('lib/fancybox/jquery.fancybox.pack.js'); ?>

<?php mgAddMeta('components/product/images/images.css'); ?>
<?php mgAddMeta('components/product/images/images.js'); ?>

<?php
// Подключаем js для увеличения изображения при наведении,
// Если соответствуюшая опция активна в настройках
if (MG::getSetting('connectZoom') == 'true') : ?>
  <?php mgAddMeta('components/product/images/zoom.js'); ?>
<?php endif; ?>

<section class="c-images mg-product-slides">
  <div class="slider-wrap">
    <?php
  // Кнопка добавить-удалить из избранного
  component('favorites/btns', $data);
  ?>

    <ul class="main-product-slide js-main-img-slider <?php echo (count($data["images_product"]) > 1) ? 'owl-carousel' : ''; ?> ">
      <?php foreach ($data["images_product"] as $key => $image) {
        // Получаем массив миниатюр
        $thumbsArr = getThumbsFromUrl($image, $data['id']);
        ?>
          <li class="c-images__big product-details-image js-images-slide <?php echo (count($data["images_product"]) == 1) ? 'active' : ''; ?>">

              <a class="fancy-modal c-images__link js-images-link"
                 href="<?php echo $thumbsArr['orig']; ?>"
                 data-fancybox="mainProduct">

                <?php
                // Блок-обёртка figure отвечает за увеличение изображения при наведении (лупа)
                // Если данная опция включена и у товара есть изображение, то выводим этот блок
                if (MG::getSetting('connectZoom') == 'true' && $image !== 'no-img.jpg'): ?>
                  <figure class="c-main-img__wrap c-main-img__wrap_zoomable js-zoom-img"
                          style="background-image: url(<?php echo $thumbsArr['orig']; ?>)">
                <?php endif; ?>

                      <img class="c-main-img js-product-img"
                           width="674"
                           height="398"
                           alt="<?php echo ($data['image_alt'][$key]) ? $data['image_alt'][$key] : $data['title']; ?>"
                           aria-label="<?php echo ($data['image_title'][$key]) ? $data['image_title'][$key] : $data['title']; ?>"
                           src="<?php echo $thumbsArr[70]['main'] ?>"
                           srcset="<?php echo $thumbsArr[70]['2x'] ?> 2x">

                <?php
                // Закрываем лупу
                if (MG::getSetting('connectZoom') == 'true' && $image !== 'no-img.jpg'): ?>
                  </figure>
                <?php endif; ?>

              </a>

          </li>
      <?php } ?>
    </ul>

  <?php
  // Выводим карусель миниатюр, если у товара больше одного изображения
  if (count($data["images_product"]) > 1) { ?>

      <div class="c-carousel slides-slider">
          <div class="c-carousel__images slides-inner owl-carousel js-secondary-img-slider">
            <?php foreach ($data["images_product"] as $key => $image) {
              // Получаем массив миниатюр
              $thumbsArr = getThumbsFromUrl($image, $data['id']);
              ?>
                <a class="c-images__slider__item slides-item"
                   data-slide-index="<?php echo $key ?>">
                    <img class="c-images__slider__img js-img-preview"
                         width="180"
                         height="100"
                         src="<?php echo $thumbsArr['30']['main'] ?>"
                         srcset="<?php echo $thumbsArr['30']['2x'] ?> 2x"
                         alt="<?php echo !empty($data["images_alt"][$key]) ? $data["images_alt"][$key] : $data["title"]; ?>"
                         title="<?php echo $data["images_title"][$key]; ?>"/>
                </a>

            <?php } ?>
          </div>
      </div>
  <?php } ?>
  </div>
</section>