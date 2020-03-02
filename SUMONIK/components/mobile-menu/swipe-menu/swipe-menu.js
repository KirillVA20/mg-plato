'use strict'

let body = document.querySelector('.js-body');
let menu_active = "menu-mobile--active";
	
document.querySelector('.js-mobile-menu__swipe-button').addEventListener("click", () => {
	if (!body.classList.contains(menu_active)) {
		body.classList.add(menu_active);
	} else {
		body.classList.remove(menu_active);
	}
})