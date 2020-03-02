'use strict'

let body = document.querySelector('.js-body');
let menu_active = "menu-mobile--active";

window.addEventListener("resize", () => {
	if (window.matchMedia("(min-width: 768px)") && body.classList.contains(menu_active)) {
		body.classList.remove(menu_active);
	}
})
