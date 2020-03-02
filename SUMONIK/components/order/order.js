'use strict'

let formSwitchButtons = document.querySelectorAll('.js-form-switch');
let formSections = document.querySelectorAll('.js-order-form__item');
let nextButtons = document.querySelectorAll('.js-next-button');

let buttonActive = 'form-panel__switch--active';
let buttonDisable = 'form-panel__switch--disable';
let buttonEable = 'form-panel__switch--eable';

let formSectionActive = 'order-form__item--active';

if (formSwitchButtons && formSections && nextButtons) {
	formSwitchButtons.forEach( switchButton => {
		switchButton.addEventListener('click', choseSection);
	});
	nextButtons.forEach( nextButton => {
		nextButton.addEventListener('click', nextSectionButton);
	});
}

function choseSection(e) {
	let switchButton = e.target;
	//Нажатие произошло на дочерний элемент - присваиваем переменной значение родительского элемента
	if (switchButton.tagName === "SPAN") { switchButton = switchButton.parentNode };
	//Берем значение order с активного блока формы и нажатой кнопки в панели переключения
	let blockOrder = document.querySelector('.order-form__item--active').dataset.order;
	let buttonOrder = switchButton.dataset.order ;

	// Если блок с формой заполнен или мы хотим перейти на предыдущий блок, то выполняем переход 
    if (formSectionValidate() || buttonOrder < blockOrder) {
    	let section = switchButton;
		if (!section.classList.contains(buttonDisable)) {
			formSwitchButtons.forEach( button => (button.classList.contains(buttonActive)) ? button.classList.remove(buttonActive) : "");
			formSections.forEach( sectionBlock => (sectionBlock.dataset.section === section.dataset.section) 
				? sectionBlock.classList.add(formSectionActive) 
				: sectionBlock.classList.remove(formSectionActive)
			);

			section.classList.add(buttonActive);		
		}
    };
}

function nextSectionButton(e) {
	// Если блок с формой заполнен, то выполняем переход 
	if (formSectionValidate()) {
		let sectionBlock = e.target.parentNode;
		let nextOrder = +sectionBlock.dataset.order + 1;

		sectionBlock.classList.remove(formSectionActive);

		formSwitchButtons.forEach( button => {
			if (+button.dataset.order === nextOrder) {
				button.classList.add(buttonActive);
				(button.classList.contains(buttonDisable)) ? button.classList.remove(buttonDisable) : "";
			} else { 
				button.classList.remove(buttonActive);
			}
		});

		formSections.forEach( sectionBlock => {
			if (+sectionBlock.dataset.order === nextOrder) {
				sectionBlock.classList.add(formSectionActive)
			} else {
				sectionBlock.classList.remove(formSectionActive);
			}
		});
	};
}

function formSectionValidate(e) {
	//Получаем данные об активном элементе
	let section = document.querySelector('.order-form__item--active');
	//Если в блоке формы есть radio-button, то заносим массив полученных элементов в переменную
	let radioButtons = section.querySelectorAll('input[type="radio"]');
	//То же самое, но только с полями, имеющие атрибут validate
	let textInputs = section.querySelectorAll('input[validate]');

	// Если в блоке формы имеются radio кнопки, делаем проверку на заполненость
	if (radioButtons.length) {
		//Переменная для проверки заполненой radio-блока формы 
		let validate = false;

		//Если есть один из radio активен, прерываем цикл и присваем переменной validate значение true
		for (let i = 0, radioLength = radioButtons.length; i < radioLength; i++ ){
			if (radioButtons[i].checked) { 
				validate = true;
				break; 
			}
		}

		//Если блок формы с radio не заполнен, отменяем переход и блокируем ссылки на седующие блоки формы
		if (!validate) {
		    disableSections(section.dataset.order);
			return false;
		}
	}

	// Если в блоке формы имеются поля, для ввода текста, устраиваем проверку на заполненость этих полей
	if (textInputs) {
		let validate = true;
		for (let i = 0, inputsLength = textInputs.length; i < inputsLength; i++ ) {
			// Если блок поля формы не спрятан и его значение пустое, возрваещаем false и блокируем ссылки на седующие блоки формы
			if (textInputs[i].parentNode.style.display !== "none" && textInputs[i].value === "") {
				 disableSections(section.dataset.order);
				 textInputs[i].classList.add("input-text--empty");
				 setTimeout(
				 	function(){ textInputs[i].classList.remove("input-text--empty"); },
				 	2000
				 )
				 validate = false;
			}
		}
		return validate;
	}

	return true;
}

function disableSections(order) {
	//Ссылки на блоки формы, которые находятся дальше выбранной ссылки, перестают быть активными
	for (let i = 0, buttonsLength = formSwitchButtons.length ; i < buttonsLength; i++ ) {
		if (formSwitchButtons[i].dataset.order > order) {
			formSwitchButtons[i].classList.add(buttonDisable);
		}
	}
}

let orderSectionButtons = document.querySelectorAll('.js-order-page__switch-button');
let orderSections = document.querySelectorAll('.js-order-page__section');

if (orderSectionButtons) {
	orderSectionButtons.forEach( button => {
		button.addEventListener('click', openOrderSection);
	})
}

function openOrderSection(e) {
	let buttonClicked = e.target;
	(buttonClicked.tagName === "I") ? buttonClicked = e.target.parentNode : "";

	orderSectionButtons.forEach( button => {
		button.classList.toggle('order-page__switch-button--active');
	})

	orderSections.forEach( section => {
		section.classList.toggle('order-page__section--active');
	})
}
