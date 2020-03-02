'use strict'

let secondBanner = document.querySelector('.js-second-banner__image');

if (secondBanner) {
	window.addEventListener('scroll', scrollBackground);
}

function scrollBackground() {
	let windowTop = 100 - parseInt(window.pageYOffset / 10);
	secondBanner.style.backgroundPosition = 'center ' + windowTop*1.5 + 'px';
}