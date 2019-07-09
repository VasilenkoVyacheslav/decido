<?php
/*
Template Name: Contacts
*/

get_header(); ?>

<div class="contacts">
    <h3>Контакты</h3>
    <div class="two-cols">
        <div class="col contacts__text">
            <p>Мы ответим на любые ваши вопросы по телефону</p>
            <a href="tel:08005443464">0 800 544 34 64</a>
            <div class="schedule">Понедельние - пятница с 8 до 22</div>
        </div>
        <div class="col">
            <div class="messangers">
                <p>Или в мессенджерах</p>
                <ul class="messangers__wrap">
                    <li>
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/telegram.svg" alt="telegram">
                            Telegram
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/messenger.svg" alt="Facebook messanger">
                            Facebook messanger
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/viber.svg" alt="Viber">
                            Viber
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();