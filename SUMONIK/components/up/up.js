'use strict'

let buttonUp = document.querySelector('.button-up');

if (buttonUp) {
	buttonUp.addEventListener('click', up);

	window.addEventListener('scroll', () => {
		if (window.pageYOffset >= 500) {
			buttonUp.classList.add('button-up--active');
		} else {
			buttonUp.classList.remove('button-up--active');
		};
	});
}

function up() {
	let pageHeight = window.pageYOffset/100;
	let upAnimation = setInterval(() => {
		window.scrollBy(0, -pageHeight);
		if (window.pageYOffset === 0) {
			clearInterval(upAnimation);
		}
	}, 1)
}