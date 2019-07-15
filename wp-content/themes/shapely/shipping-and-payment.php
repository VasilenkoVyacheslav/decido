<?php
/*
Template Name: Shipping
*/

get_header(); ?>
<?php
    $deliverys = get_field('delivery');
    $payment = get_field('payment');
    $payment_process = get_field('payment_process');

?>
    <div class="shipping">
        <h3 class="page_title"><?php the_title(); ?></h3>
        <div class="hasSidebar row">
            <aside class="sidebar col-sm-3">
                <div class="product-menu-wrap sidebar__inner">
                    <ul class="product-menu fixed-menu">
                        <li class="menu-item"><a href="#section1" class="smooth-scroll active"><?php echo $deliverys['title']; ?></a></li>
                        <li class="menu-item"><a href="#section2" class="smooth-scroll"><?php echo $payment['title']; ?></a></li>
                        <li class="menu-item"><a href="#section3" class="smooth-scroll"><?php echo $payment_process['title']; ?></a></li>
                    </ul>
                </div>
            </aside>
            <main class="main-content col-12 col-sm-9">

                <?php if($deliverys): ?>
                <section id="section1">

                    <h4 class="title-30"><?php echo $deliverys['title']; ?></h4>
                    <ul class="big-circle">
                    <?php foreach ($deliverys['sposobi'] as $delivery): ?>
                        <li>
                            <div class="circle"><img src="<?php echo $delivery['image']; ?>" alt="<?php echo $delivery['title']; ?>"></div>
                            <div class="shipping-method">
                                <h5 class="title20"><?php echo $delivery['title']; ?></h5>
                                <ul class="data">
                                    <?php foreach ($delivery['characters'] as $char): ?>
                                        <li><span class="time-ico"><?php echo $char['srok']; ?></span></li>
                                        <li><span class="price-ico"><?php echo $char['price']; ?></span></li>
                                        <li><span class="location-ico"><?php echo $char['geography']; ?></span></li>
                                    <?php endforeach; ?>
                                </ul>
                                <p class="text16"><?php echo $delivery['opisanie']; ?></p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </section>
                <?php endif; ?>


                <section id="section2">
                    <h4 class="title-30"><?php echo $payment['title']; ?></h4>
                    <ul class="small-circle">
                        <?php foreach ($payment['sposobi'] as $pay): ?>
                            <li>
                                <div class="circle"><img src="<?php echo $pay['img']; ?>" alt="<?php echo $pay['name']; ?>"></div>
                                <div class="shipping-method">
                                    <h5 class="title16"><?php echo $pay['name']; ?></h5>
                                    <p><?php echo $pay['description']; ?></p>
                                </div>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </section>
                <section id="section3">
                    <h4 class="title-30"><?php echo $payment_process['title']; ?></h4>
                   <?php foreach ( $payment_process['payment-process'] as $process ): ?>
                        <div class="payment-process">
                            <h5 class="title16"><?php echo $process['title']; ?></h5>
                            <?php echo $process['description']; ?>
                        </div>
                    <?php endforeach; ?>

                </section>
            </main>
        </div>
        <div class="sticky-stopper"></div>
    </div>


</div><!-- #main -->
</section><!-- section -->

<div class="footer-callout">
    <?php shapely_footer_callout(); ?>
</div>


<footer id="colophon" class="site-footer footer bg-dark" role="contentinfo">

    <?php  get_template_part('template-parts/shipping', 'footer'); ?>

    <div id="bottom-footer">
        <div class="container footer-inner">
            <div  class="row">
                <div class="col-sm-6 col-sm-6 col-12 col-xs-6 col-mini-12 ">

                    <?php echo wp_kses_post( get_theme_mod( 'shapely_footer_copyright' ) ); ?>

                </div><!-- .site-info -->
                <div class="col-sm-6 col-sm-6 col-12 col-xs-6 col-mini-12 text-right">
                    Дизайн и проектирование <img src="/wp-content/themes/shapely/images/Promodo-logo.png" alt="promodo" />
                </div>
            </div>
        </div>
    </div>

    <a class="btn btn-sm fade-half back-to-top inner-link" href="#top"><i class="fa fa-angle-up"></i></a>
</footer><!-- #colophon -->
</div>
</div><!-- #page inner -->
</div><!-- #page -->
</div>
<?php wp_footer(); ?>

</body>
</html>
