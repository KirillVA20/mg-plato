'use strict'

var langSelect = document.querySelectorAll('.js-lang-select');

var changeLang = function(event) {
    var select = event.target;
    window.location.href = select.options[select.selectedIndex].value;
};

if (langSelect) {
	langSelect.forEach(select => {
		select.addEventListener('change', changeLang);
	})
}
