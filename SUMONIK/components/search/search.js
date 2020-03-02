'use strict'

const ITEM_TEMPLATE = document.querySelector('.js-search-item-template').content.querySelector('.js-search-item-template-inner');
let fragment = document.createDocumentFragment();
let searchResults = document.querySelector('.js-add-search-results');
let choseResult = -1;

document.querySelector(".header-menu__search").addEventListener('keyup', function(e) {
	e.preventDefault();
	e.stopPropagation();

	if (e.keyCode === 38 && searchResults.firstChild && choseResult > 0) {
		choseResult -= 1;
		searchResults.childNodes[choseResult].childNodes[1].focus();
	} else if (
			e.keyCode === 40 &&
		 	searchResults.firstChild && 
		 	choseResult < searchResults.childNodes.length - 1
	 	) {
		choseResult++;
		searchResults.childNodes[choseResult].childNodes[1].focus();
	} 
});

document.querySelector('input[name=search]').addEventListener('keyup', searchFunc);

window.addEventListener('focusin', (e) => {
	if (!document.querySelector(".header-menu__search").contains(e.target)) {
		searchResults.innerHTML = "";
	}
})

window.addEventListener('click', (e) => {
	if (!document.querySelector(".header-menu__search").contains(e.target)) {
		searchResults.innerHTML = "";
	}
})

function searchFunc(e) {
	choseResult = -1;

	let text = e.target.value;

	if (text.length < 2 && searchResults.firstChild) {
		searchResults.innerHTML = "";	
	}

	if (text.length >= 2 && e.keyCode >= 49 && e.keyCode <= 90) {
		let dataObj = {
		    fastsearch: "true",
	        text: text
		};

		let data = Object.keys(dataObj).map(function (k) {
		    return encodeURIComponent(k) + '=' + encodeURIComponent(dataObj[k])
		}).join('&');

		fetch(`${mgBaseDir}/catalog`, {
			method: 'POST',
			headers: {
		      'Content-Type': 'application/x-www-form-urlencoded'
		    },
			body: data
		}).then(response => {
			return response.json();
		}).then(result => {
			createSearchItem(result.item.items.catalogItems);
		}).catch(error => {
			console.log(error);
		})
	}
}

function createSearchItem(results) {

    results.forEach((result, index) => {
    	let itemHtml = ITEM_TEMPLATE.cloneNode(true);
    	itemHtml.setAttribute('id', index);
    	itemHtml.querySelector(".search-results__link").setAttribute('href', result.link);
    	itemHtml.querySelector('.js-search-item-title').innerHTML = result.title;
    	itemHtml.querySelector('.js-search-item-price').innerHTML = `${result.price} ${result.currency}`;
    	itemHtml.querySelector(".js-search-item-img").setAttribute('src', result.image_url);
    	itemHtml.querySelector(".search-results__link").setAttribute('title', result.title);
    	fragment.append(itemHtml);
    });
    searchResults.innerHTML = "";
    searchResults.appendChild(fragment);
}
