<?php
$data['meta_title'] = lang('orderPayment');
mgSEO($data); ?>
<div class="l-row order-page__order-payment">
    <?php if ($data['msg']): ?>
        <div class="l-col min-0--12">
            <div class="c-alert c-alert--red errorSend">
                <?php echo $data['msg'] ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="l-col min-0--12">
        <div class="c-title">
            <?php echo lang('orderPayment'); ?>
        </div>
    </div>

    <?php if (!$data['pay'] && $data['payment'] == 'fail'): ?>
        <div class="l-col min-0--12">
            <div class="c-alert c-alert--red payment-form-block">
                <?php echo $data['message']; ?>
            </div>
        </div>
    <?php else: ?>

    <div class="payment-form-block">
        <div class="l-col min-0--12">
            <div class="c-alert c-alert--green">
                <?php echo lang('orderPaymentForm1'); ?>
                <strong>№ <?php echo $data['orderNumber'] ?></strong> <?php echo lang('orderPaymentForm2'); ?>
            </div>
        </div>
        <?php if ($data['pay'] !== '4'): ?>
            <div class="l-col min-0--12">
                <div class="c-alert c-alert--blue 6">
                    <p><?php echo lang('orderPaymentForm4'); ?>
                        <b>№ <?php echo $data['orderNumber'] ?></b>
                        <?php echo lang('orderPaymentForm5'); ?>
                        <b><?php echo MG::numberFormat($data['summ']) ?></b>
                        <?php echo $data['currency']; ?>
                    </p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="l-col min-0--12">
        <?php endif;

        if ($data['paymentViewFile']) {
            // Вставляем необходимый компонент страницы оплаты
            component(
                'payment',
                $data,
                'payment_' . $data['paymentViewFile']
            );
        } elseif ($data['pay'] == 12 || $data['pay'] == 13) { ?>
            <div class="c-alert c-alert--blue">
                <?php echo lang('orderPaymentView1'); ?>
                <b><?php echo $data['paramArray'][0]['name'] ?></b>:
                <b><?php echo $data['paramArray'][0]['value'] ?></b>
                <?php echo lang('orderPaymentView2'); ?>
            </div>
        <?php } ?>
    </div>
</div>
