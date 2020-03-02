<?php if(MG::get('isStaticPage')) : ?>
	<div class="container">
<?php endif; ?>

	<?php layout('content', $data); ?>
	
<?php if(MG::get('isStaticPage')) : ?>
	</div>
<?php endif; ?>