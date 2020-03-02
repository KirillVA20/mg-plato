'use strict'

let list = document.querySelectorAll(".js-list-link");

let openList = (e) => {
	console.log(e.target.parentNode);
	let item = e.target.parentNode;
	let list = e.target.nextElementSibling;
	let list_active = "catalog__list--active"; 
	let item_active = "catalog__item--active";

	if (!item.classList.contains(item_active)) {
		item.classList.add(item_active);
		list.classList.add(list_active);
	} else {
		item.classList.remove(item_active);
		list.classList.remove(list_active);
	}
}

for (let i = 0; i < list.length; i++) {
	list[i].addEventListener("click", openList);
}