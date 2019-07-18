<?php
/*
Template Name: Cooperation
*/

get_header(); ?>

<div class="cooperation-page">
    <div id="categories-wr">
        <div class="row">
            <div class="term-item-1 col-md-5 col-lg-5 col-sm-6 col-xs-12  col-6 no-marg">
                <h3 class="page_title">Сотрудничество</h3>
                <p class="text16">
                    Мы заинтересованы в долгосрочном и надежном партнерстве с рестораторами, девелоперами и дизайнерами
                </p>
                <button class="js-popup button">Оставить заявку</button>
            </div>
            <div class="term-item term-item-2 col-md-3 col-lg-3 col-sm-4 col-xs-6  col-6 col-xs-offset-6  col-md-offset-1 col-lg-offset-1  col-sm-offset-0  small-title">
                <a href="http://decido/zavedenie/dlya-detskih-kafe/">
                    <img src="<?php echo get_template_directory_uri() ?>/images/rest.svg" alt="Рестораторам">
                    <div class="text-ww">
                        <h3>Рестораторам</h3>
                        <span>Получите лучший сервис, а так же наиболее выгодные цены на рынке</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="term-item term-item-3 col-md-4 col-lg-4 col-sm-5 col-xs-6 col-6 col-md-offset-1 col-lg-offset-1  col-sm-offset-0 midle-title">
                <a href="http://decido/zavedenie/dlya-barov/">
                    <img src="<?php echo get_template_directory_uri() ?>/images/devs.svg" alt="Девелоперам">
                    <div class="text-ww">
                        <h3>Девелоперам</h3>
                        <span>Специальные цены и лояльные условия оплаты для девелоперов</span>
                    </div>
                </a>
            </div>
            <div class="term-item term-item-4 col-md-3 col-lg-3 col-sm-4 col-xs-6  col-6 col-xs-offset-6 col-md-offset-1 col-lg-offset-1  col-sm-offset-1  small-title">
                <a href="http://decido/zavedenie/mebel-dlya-restoranov/">
                    <img src="<?php echo get_template_directory_uri() ?>/images/arch.svg" alt="Архитекторам">
                    <div class="text-ww">
                        <h3>Архитекторам</h3>
                        <span>Лучшие условия сотрудничества и все необходимые материалы при работе над коммерческими проектами</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();