'use strict'

let backPageButton = document.querySelector('.js-back-button__link');

if (backPageButton) {
	backPageButton.href = window.location.href.split(/(\/{1,2})/).slice(0, -2).join("");
}
