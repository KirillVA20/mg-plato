<?php
if (MG::getSetting('printCurrencySelector') == 'true') {
  mgAddMeta('components/select/currency/currency.js');
  mgAddMeta('components/select/select.css');

  $currencyActive = MG::getSetting('currencyActive');
  $currencyShopIso = MG::get('dbCurrency'); ?>

    <label class="select__wrap">
        <i class="fas fa-dollar-sign"></i>

        <select name="userCustomCurrency"
                class="select js-currency-select"
                id="js-currency-select"
                aria-label="Выбор валюты сайта">
          <?php foreach (MG::getSetting('currencyShort') as $k => $v) {
            if (!in_array($k, $currencyActive) && $k != $currencyShopIso) {
              continue;
            } ?>
              <option value="<?php echo $k ?>" <?php echo ($k == $_SESSION['userCurrency']) ? 'selected' : '' ?>>
                <?php echo $v ?>
              </option>
          <?php } ?>
        </select>
    </label>

<?php } ?>