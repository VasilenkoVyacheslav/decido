<?php
/*
Template Name: Warranty
*/

get_header(); ?>
<?php
$warrantly_service = get_field('warrantly_service');
$benefits = get_field('benefits');
$warranty_process = get_field('warranty-process');
$garant_time = get_field('garant_time');
$service = get_field('service');
$stop_garanty = get_field('stop_garanty');

?>
<div class="warranty">
    <h3 class="page_title">Гарантия</h3>
    <div class="hasSidebar row">
        <aside class="sidebar col-sm-3">
            <div class="product-menu-wrap sidebar__inner">
                <ul class="product-menu fixed-menu">
                    <li class="menu-item"><a href="#section1"
                                             class="smooth-scroll active"><?php echo $warrantly_service['menu_name']; ?></a>
                    </li>
                    <li class="menu-item"><a href="#section2"
                                             class="smooth-scroll"><?php echo $benefits['menu_name']; ?></a></li>
                    <li class="menu-item"><a href="#section3"
                                             class="smooth-scroll"><?php echo $warranty_process['menu_name']; ?></a>
                    </li>
                    <li class="menu-item"><a href="#section4"
                                             class="smooth-scroll"><?php echo $garant_time['menu_name']; ?></a></li>
                    <li class="menu-item"><a href="#section5"
                                             class="smooth-scroll"><?php echo $service['menu_name']; ?></a></li>
                    <li class="menu-item"><a href="#section6"
                                             class="smooth-scroll"><?php echo $stop_garanty['menu_name']; ?></a></li>
                </ul>
            </div>
        </aside>
        <main class="main-content col-12 col-sm-9">
            <?php if ($warrantly_service) { ?>
                <section id="section1">
                    <h4 class="title-30"><?php echo $warrantly_service['title']; ?></h4>
                    <p class="text16"><?php echo $warrantly_service['description']; ?></p>
                    <ul class="big-circle row">
                        <?php foreach ($warrantly_service['method'] as $method) { ?>
                            <li class="col-sm-4">
                                <div class="circle"><img src="<?php echo $method['img']; ?>"
                                                         alt="<?php echo $method['title']; ?>"></div>
                                <div class="warranty-method">
                                    <h5 class="title20"><?php echo $method['title']; ?></h5>
                                    <p><?php echo $method['description']; ?></p>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </section>
            <?php } ?>
            <?php if ($benefits) { ?>
                <section id="section2">
                    <h4 class="title-30"><?php echo $benefits['title']; ?></h4>
                    <ul class="small-circle">
                        <?php foreach ($benefits['benefits_list'] as $benefit) { ?>
                            <li>
                                <div class="circle"><img src="<?php echo $benefit['img']; ?>"
                                                         alt="<?php echo $benefit['title']; ?>"></div>
                                <div class="shipping-method">
                                    <h5 class="title16"><?php echo $benefit['title']; ?></h5>
                                    <p><?php echo $benefit['description']; ?></p>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </section>
            <?php } ?>
            <?php if ($warranty_process) { ?>
                <section id="section3">
                    <h4 class="title-30"><?php echo $warranty_process['title']; ?></h4>
                    <div class="warranty-process">
                        <?php echo $warranty_process['description']; ?>
                    </div>
                </section>
            <?php } ?>
            <?php if ($garant_time) { ?>
                <section id="section4">
                    <h4 class="title-30"><?php echo $garant_time['title']; ?></h4>
                    <p class="text16">
                        <?php echo $garant_time['descr1']; ?>
                    </p>
                    <ul class="small-circle">
                        <?php foreach ($garant_time['variants'] as $variant) { ?>
                            <li>
                                <div class="circle"><img src="<?php echo $variant['img']; ?>"
                                                         alt="<?php echo $variant['title']; ?>"></div>
                                <div class="shipping-method">
                                    <h5 class="title16"><?php echo $variant['title']; ?></h5>
                                    <p><?php echo $variant['descriptions']; ?></p>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                    <p><?php echo $garant_time['descr2']; ?>
                    </p>
                </section>
            <?php } ?>
            <?php if ($service) { ?>
                <section id="section5">
                    <h4 class="title-30"><?php echo $service['title']; ?></h4>
                    <p><?php echo $service['description']; ?>
                    </p>
                </section>
            <?php } ?>
            <?php if ($stop_garanty) { ?>
                <section id="section6">
                    <h4 class="title-30"><?php echo $stop_garanty['title']; ?></h4>
                    <p class="text16"><?php echo $stop_garanty['description']; ?></p>
                    <ul class="exclamation-list row">
                        <?php foreach ($stop_garanty['spisok'] as $spisok) { ?>
                            <li class="col col-sm-6"><?php echo $spisok['punkt']; ?></li>
                        <?php } ?>
                    </ul>
                </section>
            <?php } ?>
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

    <?php get_template_part('template-parts/shipping', 'footer'); ?>

    <div id="bottom-footer">
        <div class="container footer-inner">
            <div class="row">
                <div class="col-sm-6 col-sm-6 col-12 col-xs-6 col-mini-12 ">

                    <?php echo wp_kses_post(get_theme_mod('shapely_footer_copyright')); ?>

                </div><!-- .site-info -->
                <div class="col-sm-6 col-sm-6 col-12 col-xs-6 col-mini-12 text-right">
                    Дизайн и проектирование <img src="/wp-content/themes/shapely/images/Promodo-logo.png"
                                                 alt="promodo"/>
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
