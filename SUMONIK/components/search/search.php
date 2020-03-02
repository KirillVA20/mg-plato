<?php mgAddMeta('components/search/search.js'); ?>
<?php mgAddMeta('components/search/search.css'); ?>

<form 
	class="header-menu__search search"
	aria-label="<?php echo lang('searchAriaLabel'); ?>"
	 role="search"
	  method="GET"
	  action="<?php echo SITE ?>/catalog"
	>

    <input 
    	class="search__field"
    	type="search"
               autocomplete="off"
               aria-label="<?php echo lang('searchPh'); ?>"
               name="search"
               placeholder="<?php echo lang('searchPh'); ?>"
               value="<?php if (isset($_GET['search'])) {echo $_GET['search'];} ?>" 
    />

    <button 
    	type="submit" 
    	class="search__button"
    	title="<?php echo lang('search'); ?>"
    ><i class="fas fa-search icon-blue"></i></button>

    <nav class="search__results search-results">
    	<ul class="search-results__list js-add-search-results">

    	</ul>
    </nav>
</form>

<template class="js-search-item-template">
	<li class="search-results__item search-result js-search-item-template-inner"
		id = ""
		tabindex = "-1"
	>
		<a href="" class="search-results__link">
			<img class ="search-results__img js-search-item-img" 
				 src =""
				 alt=""
			> 
			<div class="search-results__info">
				<div class="search-results__title js-search-item-title"></div>
				<div class="search-results__price js-search-item-price"></div> 
		
			</div>  				
		</a>
	</li>
</template>