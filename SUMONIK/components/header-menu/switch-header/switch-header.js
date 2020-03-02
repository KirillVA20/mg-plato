'use strict'

var switchHeader = document.querySelector(".js-switch-header");
var sideButtonPanel = document.querySelector(".side-header-buttons");
var switchOpen = "side-header-buttons--open";
var menuOpen = "header-menu--open";

if (switchHeader) {
	switchHeader.addEventListener("click", () => {
	  if (!sideButtonPanel.classList.contains(switchOpen)) {
	    sideButtonPanel.nextElementSibling.classList.add(menuOpen); 
	    sideButtonPanel.classList.add(switchOpen);
	  } else {
	    sideButtonPanel.nextElementSibling.classList.remove(menuOpen); 
	    sideButtonPanel.classList.remove(switchOpen);
	  }
	});
} 

