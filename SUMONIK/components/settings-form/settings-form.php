	
	<?php if (MG::getSetting('printCurrencySelector') !== 'false') : ?>
		<div class="settings-form__element header-menu__element--left">
	      <?php 
	      component('select/currency', $data['currencys']); ?>
	    </div>
	<?php endif; ?>

	<?php if (MG::getSetting('printMultiLangSelector') !== 'false') : ?>
	    <div class="settings-form__element header-menu__element--right">
	      <?php
	      component('select/lang'); ?>
	    </div>
	<?php endif; ?>

