<?php
/*
Template Name: form-flowers
*/

get_header(); ?>

<div class="text-flowers">
    <div class="container">
        <div class="row">
            <div class="flower-text col-xs-9 col-md-6">
                <h4 class="title-30">Давайте развивать индустрию гостеепреимства вместе</h4>
                <p class="text16">
                    Мы строим систему сервиса для наших клиентов и партнеров.
                    В основе создания Decido заложено редкое сочетание профессиональных компетенций и знаний – десятилетнего опыта
                    в изготовления мебели и пятнадцатилетнего практического опыта работы в индустрии гостеприимства. Когда мы создаем новый продукт, мы прекрасно понимаем какой формат заведения будет использовать эту модель и уделяем максимальное внимание необходимым характеристикам.
                </p>
            </div>
        </div>
    </div>
    <img class="flowers-bg" src="<?php echo get_template_directory_uri() ?>/images/flowers.svg" alt="flowers bg">
</div>
<div class="callback-form">
    <div class="container">
        <div class="title-30">
            Обратная связь
        </div>
        <p class="text16">Заполните форму обратной связи ниже и мы вам перезвоним</p>
        <form class="row" id="callback">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <input type="text" name="name" placeholder="Ваше имя *" required="required">
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <input type="tel" name="phone" placeholder="Номер телефона *" required="required">
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <button type="submit" class="button" name="send_callback" value="связаться со мной">связаться со мной</button>
            </div>
        </form>
    </div>
</div>


<?php  get_footer(); ?>