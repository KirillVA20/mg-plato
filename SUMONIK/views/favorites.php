<?php
/**
 *  Файл представления Favorites - выводит сгенерированную движком информацию на странице сайта с избранными товарами, который отметил пользователь.
 *  В этом  файле доступны следующие данные:
 *   <code>
 * 'items' => $items['catalogItems'],
 *    $data['items'] => Массив товаров,
 *    $data['titleCategory'] => Название открытой категории,
 *    $data['pager'] => html верстка  для навигации страниц,
 *    $data['meta_title'] => Значение meta тега для страницы,
 *    $data['meta_keywords'] => Значение meta_keywords тега для страницы,
 *    $data['meta_desc'] => Значение meta_desc тега для страницы,
 *    $data['currency'] => Текущая валюта магазина,
 *    $data['actionButton'] => тип кнопки в мини карточке товара
 *   </code>
 *
 *   Получить подробную информацию о каждом элементе массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php viewData($data['items']); ?>
 *   </code>
 *
 *   Вывести содержание элементов массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php echo $data['items']; ?>
 *   </code>
 *
 *   <b>Внимание!</b> Файл предназначен только для форматированного вывода данных на страницу магазина. Категорически не рекомендуется выполнять в нем запросы к БД сайта или реализовывать сложную программную логику логику.
 * @author Гайдис Михаил
 * @package moguta.cms
 * @subpackage Views
 */
// Установка значений в метатеги title, keywords, description.
mgSEO($data);
?>
<div class="container favorites">
	<h1 class="favorites__title page-title" >
	    <?php echo $data['titleCategory'] ?>
	</h1>

	<div class="catalog-page__wrap">
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
		  </div>
		</div>

		<section class="product-container">
			<div class="product-container__box">
				<div class="product-container__list product-container__list--grid product-container__list--main-column">
					<?php
					// Циклом выводим избранные товары
					foreach ($data['items'] as $item) { ?>
					    <?php
					    // Миникарточка товара
					    component(
					      'product/product-element',
					      $item
					    );
					    ?>
					<?php } ?>
				</div>
			</div>
		</section>
	</div>
</div>

