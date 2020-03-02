'use strict' 

let categories = document.querySelectorAll('.js-category__item');

if (categories) {
	categories.forEach((category) => {
		category.addEventListener('click', openSubCategory);
	})
}

function openSubCategory(e) {
	let openElement = e.target;
	console.log(openElement);
	if (openElement.tagName === "I") {
		openElement.parentNode.querySelector('.js-category-list').classList.toggle('category__list--open');
	};
}