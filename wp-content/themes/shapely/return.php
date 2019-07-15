<?php
/*
Template Name: Return
*/

get_header(); ?>
<?php
    $return_group = get_field('return_group');
    $start_work = get_field('start_work');
    $dopusheniya = get_field('dopusheniya');
?>
<div class="return">
    <h3 class="page_title"><?php the_title(); ?></h3>
    <div class="hasSidebar row">
        <aside class="sidebar col-sm-3">
            <div class="product-menu-wrap sidebar__inner">
                <ul class="product-menu fixed-menu">
                    <li class="menu-item"><a href="#return" class="smooth-scroll active">Возврат</a></li>
                    <li class="menu-item"><a href="#start" class="smooth-scroll">Начало работы</a></li>
                    <li class="menu-item"><a href="#allowance" class="smooth-scroll">Допущения</a></li>
                </ul>
            </div>
        </aside>
        <main class="main-content col-12 col-sm-9">

            <?php if($return_group){ ?>
                <section id="return">
                    <h4 class="title-30"><?php echo $return_group['title']; ?></h4>
                    <p class="text16">
                        <?php echo $return_group['description']; ?>
                    </p>
                </section>
            <?php } ?>

            <?php if($start_work){ ?>
                <section id="start">
                    <h4 class="title-30"><?php echo $start_work['title']; ?></h4>
                    <ul class="exclamation-list">
                       <?php foreach ($start_work['informations'] as $information){ ?>
                            <li>
                                <?php echo $information['inf']; ?>
                            </li>
                       <?php } ?>
                    </ul>
                </section>
            <?php } ?>

            <?php if($dopusheniya){ ?>
            <section id="allowance">
                <h4 class="title-30"><?php echo $dopusheniya['title']; ?></h4>
                <ul class="top-list">
                    <?php foreach ($dopusheniya['informations'] as $dop){ ?>
                        <li>
                            <?php echo $dop['inf']; ?>
                        </li>
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