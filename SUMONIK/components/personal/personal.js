'use strict'

let sectionButtons = document.querySelectorAll('.js-personal__section-button');
let sections = document.querySelectorAll('.js-personal__section-block');


let buttonActive = 'personal__section-button--active';
let sectionActive = 'personal__section-block--active';

if (sectionButtons) {
	sectionButtons.forEach( button => {
		button.addEventListener('click', openSection);
	})
}

function openSection(e) {
	sectionButtons.forEach( button => (button.classList.contains(buttonActive)) ? button.classList.remove(buttonActive) : ""); 

	let section = e.target;
	section.classList.add(buttonActive);

	sections.forEach( sectionBlock => {
		(sectionBlock.dataset.section == section.dataset.section) ? sectionBlock.classList.add(sectionActive) : sectionBlock.classList.remove(sectionActive);
	})
}

function nextSection(e) {
	e.preventDefault()
}