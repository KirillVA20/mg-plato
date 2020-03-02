<?php
/**
 *  Файл представления Feedback - выводит сгенерированную движком информацию на странице обратной связи.
 *  В этом файле доступны следующие данные:
 *   <code>
 *    $data['message'] => Сообщение,
 *    $data['dislpayForm'] => Флаг скрывающий форму,
 *    $data['meta_title'] => 'Значение meta тега для страницы '
 *    $data['meta_keywords'] => 'Значение meta_keywords тега для страницы '
 *    $data['meta_desc'] => 'Значение meta_desc тега для страницы '
 *   </code>
 *
 *   Получить подробную информацию о каждом элементе массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php viewData($data['message']); ?>
 *   </code>
 *
 *   Вывести содержание элементов массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php echo $data['message']; ?>
 *   </code>
 *
 *   <b>Внимание!</b> Файл предназначен только для форматированного вывода данных на страницу магазина. Категорически не рекомендуется выполнять в нем запросы к БД сайта или реализовывать сложную программную логику.
 * @author Авдеев Марк <mark-avdeev@mail.ru>
 * @package moguta.cms
 * @subpackage Views
 */

// Установка значений в метатеги title, keywords, description.
mgSEO($data);
?>

<div class="container feedback">
  <div class="feedback__wrap">
    <div class="feedback__title">
      <span>
        <?php echo lang('feedbackTitle'); ?>
      </span>
    </div>
    <?php
    // Если ошибка отправки формы, то выводим эту ошибку
    if (!empty($data['error'])): ?>
        <?php
        // Текст сообщения задаётся в разделе «Настройки/Шаблоны/Уведомления»
        echo $data['error']; ?>
    <?php endif; ?>

    <?php
    // Если форма ещё не отправлена, выводим её
    if ($data['dislpayForm']): ?>

        <?php
        // Если в админке в разделе страниц заполнено описание страницы, то выводим его
        if (!empty($data['html_content']) && $data['html_content'] != '&nbsp;'):?>
            <div class="feedback__description">
              <span>
                <?php echo $data['html_content'] ?>
              </span>
            </div>
        <?php endif; ?>

        <form action=""
              method="post"
              name="feedback"
              class="feedback__form">
            <input class="input-text"
                   type="text"
                   name="fio"
                   placeholder="<?php echo lang('fio'); ?>"
                   value="<?php echo !empty($_POST['fio']) ? $_POST['fio'] : '' ?>">
            <input class="input-text"
                   type="text"
                   name="email"
                   placeholder="Email"
                   value="<?php echo !empty($_POST['email']) ? $_POST['email'] : '' ?>">
            <textarea class="input-text"
                      class="address-area"
                      placeholder="<?php echo lang('feedbackMessage'); ?>"
                      name="message"><?php echo !empty($_REQUEST['message']) ? $_REQUEST['message'] : '' ?></textarea>


            <?php
            // Если включена captcha и выключена ReCaptcha, то выводим капчу
            if (
              MG::getSetting('useCaptcha') == "true"
              && MG::getSetting('useReCaptcha') != 'true'
            ): ?>
                <img src="captcha.html"
                     width="140"
                     height="36">

                <input type="text"
                       name="capcha"
                       class="captcha">

            <?php else: ?>
                <?php
                // А если нет, выводим ReCaptcha
                echo MG::printReCaptcha(); ?>
            <?php endif; ?>

            <input class="input-button"
                   type="submit"
                   name="send"
                   value="<?php echo lang('send'); ?>">
        </form>

        <?php
        // Функция валидации формы
        mgFormValid('feedback', 'feedback'); ?>

    <?php
    // Если форма уже отправлена, то выводим сообщение об успешной отправке
    else: ?>
        <?php
        // Текст сообщения задаётся в разделе «Настройки/Шаблоны/Уведомления»
        echo $data['message'] ?>
    <?php endif; ?>
  </div>
</div>
