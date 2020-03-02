<?php if (!empty($data['msgError'])) : ?>
    <div class="l-col min-0--12">
        <div class="c-alert c-alert--red">
            <?php echo $data['msgError'] ?>
        </div>
    </div>
<?php endif; ?>
<div class="authorization__wrap">
    <div class="authorization__title">
      <i class="fas fa-key"></i>
      <?php echo lang('enterTitle') ?>
    </div>
    <form class="authorization__form form"
          action="<?php echo SITE ?>/enter"
          method="POST">

        <div class="authorization__input-wrap">
            <input class = "authorization__input"
                   type="text"
                   name="email"
                   aria-label="Email"
                   placeholder="Email"
                   value="<?php echo !empty($_POST['email']) ? $_POST['email'] : '' ?>"
                   required>
        </div>

        <div class="authorization__input-wrap">
            <input class = "authorization__input"
                   type="password"
                   aria-label="<?php echo lang('enterPass'); ?>"
                   name="pass"
                   placeholder="<?php echo lang('enterPass'); ?>"
                   required>
        </div>

        <?php
          // Подключаем captcha, если reCaptcha отключена в настройках
          if (
              MG::getSetting('useCaptcha') == "true" &&
              MG::getSetting('useReCaptcha') != 'true'
          ): ?>
              <div class="c-form__row">
                  <b><?php echo lang('captcha'); ?></b>
              </div>

              <div class="c-form__row">
                  <img style="background: url('<?php echo PATH_TEMPLATE ?>/images/cap.png');"
                       alt="captcha"
                       src="captcha.html"
                       width="140" height="36">
              </div>

              <div class="c-form__row"> 
                  <input type="text"
                         aria-label="capcha"
                         name="capcha"
                         class="captcha"
                         required>
              </div>
          <?php endif; ?>

          <?php
          // Подключаем ReCaptcha, если включено в настройках
          echo MG::printReCaptcha(); ?>

        <?php if (!empty($_REQUEST['location'])) : ?>
            <input type="hidden"
                   name="location"
                   value="<?php echo $_REQUEST['location']; ?>"/>
        <?php endif; ?>

        <div class="authorization__submit-wrap">
            <button type="submit"
                    title="<?php echo lang('enterEnter'); ?>"
                    class="authorization__submit">
                <?php echo lang('enterEnter'); ?>
            </button>

            <a class="authorization__forgot-password"
               title="<?php echo lang('enterForgot'); ?>"
               href="<?php echo SITE ?>/forgotpass">
                <?php echo lang('enterForgot'); ?>
            </a>
        </div>
    </form>

    <div class="authorization__registration-wrap">
        <a class="authorization__registration"
           title="<?php echo lang('enterRegister'); ?>"
           href="<?php echo SITE ?>/registration">
            <?php echo lang('enterRegister'); ?>
        </a>
    </div>
</div>