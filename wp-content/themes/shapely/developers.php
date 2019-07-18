<?php
/*
Template Name: Developers
*/

get_header(); ?>

<div class="to-developers">
    <div class="bg-box">
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-6">
                <h3 class="page_title">Девелоперам</h3>
                <p class="text16 text-top">
                    Предлагаем сотрудничество девелоперами на этапе строительства коммерческих объектов недвижимости. Мы предоставляем специальные цены, а так же лояльные условия по оплате.
                </p>
                <div class="how-we-works">
                    <h4 class="title-30">Как мы работаем</h4>
                    <p>В нашем ассортименте есть как серийные изделия, которые вы можете приобрести на нашем сайте, так и возможность разработать индивидуальный проект для ваших нужд.</p>
                </div>
                <h5 class="title20">Как заказать индивидуальный проект</h5>
                <ul class="small-circle">
                    <li>
                        <div class="circle"><img src="<?php echo get_template_directory_uri() ?>/images/d1.svg" alt="Оставить заявку"></div>
                        <p>Оставьте заявку на нашем сайте или по телефону</p>
                    </li>
                    <li>
                        <div class="circle"><img src="<?php echo get_template_directory_uri() ?>/images/d2.svg" alt=""></div>
                        <div>
                            <p>Наш менеджер связывается чтобы уточняет все делали</p>
                        </div>
                    </li>
                    <li>
                        <div class="circle"><img src="<?php echo get_template_directory_uri() ?>/images/d3.svg" alt=""></div>
                        <div>
                            <p>Составляем коммерческое предложение в течении 5 дней</p>
                        </div>
                    </li>
                    <li>
                        <div class="circle"><img src="<?php echo get_template_directory_uri() ?>/images/d4.svg" alt=""></div>
                        <div>
                            <p>Обсуждаем проект и приступаем к работе</p>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <div class="benefits">
            <h4 class="title-30">Преимущества</h4>
            <div class="row">
                <div class="benefits-item col-xs-12 col-sm-6 col-md-4">
                    <img src="<?php echo get_template_directory_uri() ?>/images/benefit1.svg" alt="Специальные цены">
                    <div>Специальные цены</div>
                </div>
                <div class="benefits-item col-xs-12 col-sm-6 col-md-4">
                    <img src="<?php echo get_template_directory_uri() ?>/images/benefit2.svg" alt="Лояльные условия оплаты">
                    <div>Лояльные условия оплаты</div>
                </div>
            </div>
        </div>
        <div class="callback-form red">
            <div class="title-30">
                Давайте сотрудничать!
            </div>
            <p class="text16">Для работы с нами - оставьте заявку и мы свяжемся с вами, обсудить условия сотрудничества.</p>
            <form class="row" id="callback">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <input type="text" name="name" placeholder="Ваше имя *" required="required">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <input type="tel" name="phone" placeholder="Номер телефона *" required="required">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <button type="submit" class="button" name="send_callback" value="связаться со мной">Оставить заявку</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php  get_footer(); ?>