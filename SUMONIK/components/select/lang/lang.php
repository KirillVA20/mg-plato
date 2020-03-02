<?php
mgAddMeta('components/select/lang/lang.js');
mgAddMeta('components/select/select.css');

$multiLang = unserialize(stripcslashes(MG::getSetting('multiLang')));
$count = 0;

if (is_array($multiLang) && !empty($multiLang)) {
    foreach ($multiLang as $mLang) {
        if ($mLang['active'] == 'true') $count++;
    }
}

if ($count) { ?>
    <label class="select__wrap">
        <?php $url = str_replace(url::getCutSection(), '', $_SERVER['REQUEST_URI']);?>
        <i class="fas fa-globe-americas"></i>

        <select name="multiLang-selector"
                class="select js-lang-select"
                id="js-lang-select"
                aria-label="Выбор языка сайта">
            <?php echo '<option value="'.SITE.$url.'" '.((LANG == 'LANG' || LANG == '')?'selected="selected"':"").'>'.lang('defaultLanguage').'</option>';
            foreach ($multiLang as $mLang) {
                if ($mLang['active'] != 'true') {continue;}
                echo '<option value="'.SITE.'/'.$mLang['short'].$url.'" '.((LANG == $mLang['short'])?'selected="selected"':"").'>'.$mLang['full'].'</option>';
            } ?>
        </select>
    </label>
<?php } ?>