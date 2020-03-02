<div class="personal__section-wrap">
    <div class="personal__history js-personal__section-block personal__section-block personal__section-block--active" data-section="orderHistory">
        <?php 
        component('personal/history', $data); ?>
    </div>

    <div class="personal__personal-info js-personal__section-block personal__section-block" data-section="personalInfo">
        <?php 
        component('personal/info', $data); ?>
    </div>

    <div class="personal__password js-personal__section-block personal__section-block" data-section="password">
        <?php 
        component('personal/password', $data); ?>
    </div>
</div>