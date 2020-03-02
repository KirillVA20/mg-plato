<?php 
if(!empty($data['rate'])) { 
	$paymentRate = (abs($data['rate'])*100).'%';
	if((float)$data['rate'] > 0) {
		$paymentRate = '('.lang('priceMargin').' '.$paymentRate.')';
	} 
	elseif((float)$data['rate'] < 0) {
		$paymentRate = '('.lang('priceSale').' '.$paymentRate.')';
	}
} else {
	$paymentRate = '';
}
?>
<li class="<?php if($data['active']) {echo 'active';} else{echo 'noneactive';} ?> order-form__radio-item">
	<label class="<?php if($data['active']) {echo 'active';} else{echo 'noneactive';} ?>">
		<input type="radio" name="payment" <?php if($data['active']) {echo 'checked';} else{echo 'rel';} ?> value="<?php echo $data['id']; ?>">
		<span class="checkmark"></span>
		<span class="order-form__payment-name"><?php echo $data['name']; ?></span>
		<span class="icon-payment-<?php echo $data['id']; ?>"></span>
		<span class="rate-payment"><?php echo $paymentRate; ?></span>
	</label>
</li>