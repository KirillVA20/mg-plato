'use strict'

let form = document.querySelector('.mobile-menu__settings');
let form_wrap = document.querySelector('.js-form__wrap');
let form_link = document.querySelector('.js-settings-form__link');

if (form_link && (form || form_wrap)) {
	form_link.addEventListener("click", () => {
		if (!form.classList.contains('mobile-menu__settings--open')) {
			form.classList.add('mobile-menu__settings--open');
			form_wrap.classList.add('settings-form__wrap--open');
		} else {
			form.classList.remove('mobile-menu__settings--open');
			form_wrap.classList.remove('settings-form__wrap--open');
			document.querySelector(".settings-form__list--active").classList.remove("settings-form__list--active");
		}
	});
}

let set_buttons = document.querySelectorAll('.js-settings-form__button');
let list_active = "settings-form__list--active";

let switchList = (e) => {
	let set_list = e.target.nextElementSibling;
	let active_list = document.querySelector(".settings-form__list--active");

	if (!set_list.classList.contains(list_active) && !active_list) {
		set_list.classList.add(list_active);
	} else if (!set_list.classList.contains(list_active) && active_list) {  
		active_list.classList.remove(list_active);
		set_list.classList.add(list_active);
	} else {
		set_list.classList.remove(list_active);
	}
}

if (set_buttons) {
	for (let i = 0; i < set_buttons.length; i++) {
		set_buttons[i].addEventListener("click", switchList);
	}
} 