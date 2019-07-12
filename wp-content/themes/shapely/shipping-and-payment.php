<?php
/*
Template Name: Shipping
*/

get_header(); ?>

    <div class="shipping">
        <h3 class="page_title">Доставка и оплата</h3>
        <div class="hasSidebar row">
            <aside class="sidebar col-sm-3">
                <div class="product-menu-wrap sidebar__inner">
                    <ul class="product-menu fixed-menu">
                        <li class="menu-item"><a href="#section1" class="smooth-scroll active">Способы доставки</a></li>
                        <li class="menu-item"><a href="#section2" class="smooth-scroll">Способы оплаты</a></li>
                        <li class="menu-item"><a href="#section3" class="smooth-scroll">Процесс оплаты</a></li>
                    </ul>
                </div>
            </aside>
            <main class="main-content col-12 col-sm-9">
                <section id="section1">
                    <h4 class="title-30">Способы доставки</h4>
                    <ul class="big-circle">
                        <li>
                            <div class="circle"><img src="<?php echo get_template_directory_uri()?>/images/s1.svg" alt="image name"></div>
                            <div class="shipping-method">
                                <h5 class="title20">Самовывоз</h5>
                                <ul class="data">
                                    <li><span class="time-ico">1 - 3 дня</span></li>
                                    <li><span class="price-ico">Бесплатно</span></li>
                                    <li><span class="location-ico">г. Одесса, ул. Дерибасовская 34/2</span></li>
                                </ul>
                                <p class="text16">При самовывозе своего заказа, вы получаете скидку 5%. Забрать свой заказ можно с 10:00 до 19:00 с пн по пт.</p>
                            </div>
                        </li>
                        <li>
                            <div class="circle"><img src="<?php echo get_template_directory_uri()?>/images/s2.svg" alt="image name"></div>
                            <div class="shipping-method">
                                <h5 class="title20">Доставка по Украине</h5>
                                <ul class="data">
                                    <li><span class="time-ico">1 - 3 дня</span></li>
                                    <li><span class="price-ico">Бесплатно</span></li>
                                    <li><span class="location-ico">вся Украина</span></li>
                                </ul>
                                <p class="text16">При самовывозе своего заказа, вы получаете скидку 5%. Забрать свой заказ можно с 10:00 до 19:00 с пн по пт.</p>
                            </div>
                        </li>
                        <li>
                            <div class="circle"><img src="<?php echo get_template_directory_uri()?>/images/s3.svg" alt="image name"></div>
                            <div class="shipping-method">
                                <h5 class="title20">Доставка в отделение «Нова пошта»</h5>
                                <ul class="data">
                                    <li><span class="time-ico">1 - 3 дня</span></li>
                                    <li><span class="price-ico">Согласно тарифам НП</span></li>
                                    <li><span class="location-ico">вся Украина</span></li>
                                </ul>
                                <p class="text16">При самовывозе своего заказа, вы получаете скидку 5%. Забрать свой заказ можно с 10:00 до 19:00 с пн по пт.</p>
                            </div>
                        </li>
                        <li>
                            <div class="circle"><img src="<?php echo get_template_directory_uri()?>/images/s4.svg" alt="image name"></div>
                            <div class="shipping-method">
                                <h5 class="title20">Адресная доставка Новая почта</h5>
                                <ul class="data">
                                    <li><span class="time-ico">1 - 3 дня</span></li>
                                    <li><span class="price-ico">Согласно тарифам НП</span></li>
                                    <li><span class="location-ico">вся Украина</span></li>
                                </ul>
                                <p class="text16">При самовывозе своего заказа, вы получаете скидку 5%. Забрать свой заказ можно с 10:00 до 19:00 с пн по пт.</p>
                            </div>
                        </li>
                    </ul>
                </section>
                <section id="section2">
                    <h4 class="title-30">Способы оплаты</h4>
                    <ul class="small-circle">
                        <li>
                            <div class="circle"><img src="<?php echo get_template_directory_uri()?>/images/s5.svg" alt="image name"></div>
                            <div class="shipping-method">
                                <h5 class="title16">Наложенный платеж</h5>
                                <p>Оплата наложенного платежа производится при получении товара</p>
                            </div>
                        </li>
                        <li>
                            <div class="circle"><img src="<?php echo get_template_directory_uri()?>/images/s6.svg" alt="image name"></div>
                            <div class="shipping-method">
                                <h5 class="title16">Безналичный расчет (НДС и без)</h5>
                                <p>Безналичный расчет производится в кассе любого банка или с расчетного счета Вашей фирмы.</p>
                            </div>
                        </li>
                        <li>
                            <div class="circle"><img src="<?php echo get_template_directory_uri()?>/images/s7.svg" alt="image name"></div>
                            <div class="shipping-method">
                                <h5 class="title16">Visa / Mastercard</h5>
                                <p>Оплата заказа банковской картой Visa и MasterCard</p>
                            </div>
                        </li>
                        <li>
                            <div class="circle"><img src="<?php echo get_template_directory_uri()?>/images/s8.svg" alt="image name"></div>
                            <div class="shipping-method">
                                <h5 class="title16">Оплата наличными</h5>
                                <p>Вы можете оплатить свой заказ наличными при получении товара</p>
                            </div>
                        </li>

                    </ul>
                </section>
                <section id="section3">
                    <h4 class="title-30">Процесс оплаты</h4>
                    <div class="payment-process">
                        <h5 class="title16">Серийная продукция</h5>
                        <p>При заказе серийной продукции вы сразу оплачиваете стоимость заказа 100% предоплаты
                        </p>
                    </div>
                    <div class="payment-process">
                        <h5 class="title16">Индивидуальные проекты</h5>
                        <p>При заказе индивидуальных проектов оплата вносится поэтапно:</p>
                        <p>• 70% предоплата</p>
                        <p>• 20% перед отгрузкой со склада</p>
                        <p>• 10% в течении трех банковских дней после акта приема передачи</p>
                    </div>
                </section>
            </main>
        </div>
        <div class="sticky-stopper"></div>
    </div>

<?php
get_footer();
