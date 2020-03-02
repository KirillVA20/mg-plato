<?php if(MG::getSetting('printCurrencySelector') !== 'false' or MG::getSetting('printMultiLangSelector') !== 'false') : ?>
	<div class="mobile-menu__settings settings-form">
	  <a href="#" class="settings-form__link js-settings-form__link" title="">
	  	<i class="fas fa-cog"></i>
	  </a>
	    <div class="settings-form__wrap settings-form__wrap--close js-form__wrap mobile-menu__settings-form">
	    	<?php component('settings-form'); ?>
	    </div>
	</div>	
<?php endif; ?>