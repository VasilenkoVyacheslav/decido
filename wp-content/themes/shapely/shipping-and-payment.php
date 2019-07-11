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
                        <li class="menu-item"><a href="#return" class="smooth-scroll active">Способы доставки</a></li>
                        <li class="menu-item"><a href="#start" class="smooth-scroll">Способы оплаты</a></li>
                        <li class="menu-item"><a href="#allowance" class="smooth-scroll">Процесс оплаты</a></li>
                    </ul>
                </div>
            </aside>
            <main class="main-content col-12 col-sm-9">
                <section id="return">
                    <h4 class="title-30">Способы доставки</h4>
                    <ul class="big-circle">
                        <li>
                            <div class="circle"><img src="images/" alt="image name"></div>
                            <div class="shipping-method">
                                <h5 class="title20">Самовывоз</h5>
                                <ul class="data">
                                    <li><span class="time"></span></li>
                                    <li><span class="price"></span></li>
                                    <li><span class="location"></span></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </section>
                <section id="start">
                    <h4 class="title-30">Способы оплаты</h4>
                    <ul class="exclamation-list">
                        <li>
                            Новое изделие может иметь характерный запах материалов, используемых при изготовлении мебели, который исчезает через некоторое время;
                        </li>
                        <li>
                            Во время транспортировки на мебели могут появиться складки. Для того, чтобы мебель приобрела правильную форму, достаточно, чтобы она постояла при комнатной температуре. Форма приставных подушек восстановится, если их сбить руками;
                        </li>
                        <li>
                            Мебельная обивка при длительной эксплуатации имеет свойство растягиваться, приобретать более интенсивный блеск. На мебели могут проявиться небольшие локальные места постоянного сидения, появиться складки, проявиться мягкость наполнителей, что не является дефектом мебели при изготовлении;
                        </li>
                        <li>
                            В отделочных деревянных элементах возможна незначительная разница в оттенках через такую особенность древесины, как анизотропность (разнородность свойств в направлении вдоль или поперек волокон);
                        </li>
                        <li>
                            Отделочные материалы (ткань, кожа, искусственная кожа) могут отличаться оттенками на разных частях изделия из-за особенностей процесса производства, цветопередачи под различными источниками света, специфические свойства ворса и тому подобное.
                        </li>
                    </ul>
                </section>
                <section id="allowance">
                    <h4 class="title-30">Процесс оплаты</h4>
                    <ul class="top-list">
                        <li>
                            Складки на обивочной ткани, возникающие вследствие снятия нагрузки и исчезающие после легкого разглаживания их рукой;
                        </li>
                        <li>
                            Складки на обивочной ткани, обусловленные художественным решением изделия;
                        </li>
                        <li>
                            Незначительная разнотонность обивочной ткани и несимметричность рисунка и декора;
                        </li>
                    </ul>
                </section>
            </main>
        </div>
        <div class="sticky-stopper"></div>
    </div>

<?php
get_footer();
