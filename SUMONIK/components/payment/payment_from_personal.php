<div class="l-row">
    <div class="l-col min-0--12">
        <div class="c-alert c-alert--blue">
            <?php echo lang('orderPay1'); ?>

            <?php echo $data['orderNumber'] ?>

            <?php echo lang('orderPay2'); ?>

            <?php echo MG::numberFormat($data['summ']) ?>

            <?php echo $data['currency'] ?>
        </div>
    </div>

    <div class="l-col min-0--12">
        <?php if ($data['payMentView']) {
            include($data['payMentView']);
        } elseif ($data['pay'] == 12 || $data['pay'] == 13) { ?>
    </div>

    <div class="l-col min-0--12">
        <div class="c-alert c-alert--blue">
            <?php echo lang('orderPay3'); ?>
            <b><?php echo $data['paramArray'][0]['value'] ?></b><?php echo lang('orderPay4'); ?>
        </div>
    </div>

    <?php } else { ?>

        <div class="l-col min-0--12">
            <div class="c-alert c-alert--blue">
                <?php echo lang('orderPay5'); ?>
                <br>
                <?php echo lang('orderPay6'); ?>
            </div>
        </div>

    <?php } ?>
</div>
