'use strict'

let fastViewButton = document.querySelectorAll('.js-product-element__fast-view');

if (fastViewButton) {
	fastViewButton.forEach(button => button.addEventListener('click', fastView));
}


function fastView(e) {
	e.preventDefault();
	let showButton = e.target;
	if (showButton.tagName === 'I') { showButton = e.target.parentNode };
	let data = `action=getProduct&actionerClass=Ajaxuser&id=${showButton.dataset.itemId}`;
	let productLink = showButton.dataset.productUrl;

	searchProduct(data).then(response => {
		return JSON.parse(response);
	}).then(product => {
		openModal(product, productLink);
	}).catch(error => {
		console.log(error)
	});
}


function searchProduct(data) {
	return new Promise((resolve,reject) => {
		let request = new XMLHttpRequest();

		request.open('POST', 'ajax', true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

		request.addEventListener("readystatechange", () => {
		    if (request.readyState === 4 && request.status === 200) {
		       resolve(request.response)
		    }
		});

		request.send(data);
	})
}

function openModal(product, productLink) {
	let photo = document.querySelector('#c-modal__photo');
	let src = photo.dataset.imagePath + product.image_url;
	console.log(product);
	document.querySelector('.c-modal__title').innerHTML = product.title;
	document.querySelector('#js-modal__fast-view').classList.add('c-modal--open');
	document.querySelector('#c-modal__photo').src = src;
	document.querySelector('.c-modal__description-text').innerHTML = product.description;
	document.querySelector('.c-modal__price-new').innerHTML = product.price;
	document.querySelector('.c-modal__price-currency').innerHTML = product.currency_iso;
	document.querySelector('.c-modal__more-button').href = productLink;
}
