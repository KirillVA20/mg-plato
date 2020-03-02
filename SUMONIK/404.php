<?php
 /**
 *  Файл представления 404  - выводит ошибку '404' в случае если страница не существует.
 * 
 *   @author Авдеев Марк <mark-avdeev@mail.ru>
 *   @package moguta.cms
 *   @subpackage Views
 */

?>

<div class="container error">
	<div class="error__text">
		<?php echo lang('error404'); ?>
	</div>
	<div>
		<a href="<?php echo SITE ;?>" class="input-button">
			<?php echo lang('toMainPage'); ?>
		</a>
	</div>	
</div>
