'use strict'
let gridModeButton = document.querySelector('.js-grid-mode');
let listModeButton = document.querySelector('.js-list-mode');

let activeButton = 'filter__grid-button--active';

let productElement = document.querySelectorAll('.product-element');
let productContainer = document.querySelector('.product-container__list');

let gridContainerClass = 'product-container__list--grid';
let listContainerClass = 'product-container__list--list';

let gridElementClass = 'product-element--grid';
let listElementClass = 'product-element--list';

if (localStorage['activeMode'] === 'grid' && productContainer && gridModeButton && listModeButton) {
	gridModeFunc();	
} else if (localStorage['activeMode'] === 'list' && productContainer && gridModeButton  && listModeButton) {
	listModeFunc();
} else if (productContainer && gridModeButton  && listModeButton){
	gridModeFunc();	
}

function gridModeFunc() {
	localStorage['activeMode'] = 'grid';

	gridModeButton.classList.add(activeButton);
	listModeButton.classList.remove(activeButton);

	productContainer.classList.remove(listContainerClass);
	productContainer.classList.add(gridContainerClass);

	productElement.forEach( element => {
		element.classList.remove(listElementClass);
		element.classList.add(gridElementClass);
	});
}

function listModeFunc() {
	localStorage['activeMode'] = 'list';

	listModeButton.classList.add(activeButton);
	gridModeButton.classList.remove(activeButton);

	productContainer.classList.remove(gridContainerClass);
	productContainer.classList.add(listContainerClass);

	productElement.forEach( element => {
		if (!element.parentNode.classList.contains('sidebar__recomended-product')) {
			element.classList.remove(gridElementClass);
			element.classList.add(listElementClass);
		}
	});
}

if (gridModeButton && listModeButton) {
	gridModeButton.addEventListener('click', gridModeFunc);
	listModeButton.addEventListener('click', listModeFunc);
}

let filterButton = document.querySelectorAll('.js-filter__sidebar-button');
let filterPanel = document.querySelector('.filter-panel');

let productPanel = document.querySelector('.js-product-container');
let clearfixPanel = document.querySelector('.js-catalog-page__clearfix'); 
let productList = document.querySelector('.js-product-container');

let closeFilter = 'filter-panel--close';
let openFilter = 'filter-panel--open';

let catalogColumn = "product-container--filter-open";
let mainColumn = "product-container--filter-close";

let bodyOpenFilter = "body--filter-open";


function openFilterFunc() {
	if (filterPanel.classList.contains(closeFilter)) {
		localStorage['filterPane'] = 'open';

		filterPanel.classList.remove(closeFilter);
		filterPanel.classList.add(openFilter);

		productList.classList.remove(mainColumn);
		productList.classList.add(catalogColumn);

		document.body.classList.add(bodyOpenFilter);

	} else {
		localStorage['filterPane'] = 'close';

		filterPanel.classList.remove(openFilter);
		filterPanel.classList.add(closeFilter);

		productList.classList.remove(catalogColumn);
		productList.classList.add(mainColumn);

		document.body.classList.remove(bodyOpenFilter);
	}
}

if (filterButton && filterPanel) {
	filterButton.forEach(button => button.addEventListener('click', openFilterFunc));

}