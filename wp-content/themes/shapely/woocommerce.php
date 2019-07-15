<?php

get_header(); ?>
<?php
$slug = $_SERVER['REQUEST_URI'];
$slug = trim(str_replace('/', '', $slug)); ?>
<?php if (stripos($slug, 'shop') !== false) { ?>
    <div id="filter-swither" class="closed-filters"><i class="fa fa-filter"></i> <span class="link to-close"><span
                    class="xs-hide">Скрыть </span>фильтры</span><span class="link to-show"><span class="xs-hide">Показать </span>фильтры</span>
    </div>
<?php } ?>
<?php if (is_search() && $wp_query->post_count > 0) { ?>
<div class="search-page">
    <h3 class="page_title"><?php echo $wp_query->post_count; ?> результатов по запросу «<?php echo $_GET['s']; ?>»</h3>
</div>

<?php

} ?>
    <div class="row">

        <?php if (stripos($slug, 'shop') !== false) {
            $col_class = 'col-md-9 col-sm-8 mb-xs-24 ';
            ?>

            <aside id="secondary" class="widget-area col-md-3 col-sm-4" role="complementary">

                <div id="filters-wrapp">
                    <div id="close-filter"><i class="fa fa-long-arrow-left"></i><span>Скрыть фильтры</span></div>
                    <?php dynamic_sidebar('shop-sidebar'); ?>
                </div>
                <div id="overlay-filter"></div>
            </aside><!-- #secondary -->
        <?php } else {
            $col_class = 'col-md-12 mb-xs-24';
            ?>

        <?php } ?>
        <div id="primary" class="<?php print $col_class; ?>">

            <?php woocommerce_content(); ?>
        </div><!-- #primary -->
    </div>
<?php
    if (is_search() ) {
        if($wp_query->post_count > 0 ){
            //project
            get_template_part('template-parts/content', 'project-search');
        }

        ?>
        </div><!-- #main -->
        </section><!-- section -->

        <div class="footer-callout">
            <?php shapely_footer_callout(); ?>
        </div>


        <footer id="colophon" class="site-footer footer bg-dark" role="contentinfo">

            <?php get_template_part('template-parts/search', 'footer'); ?>

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
<?php
    }else{
        get_footer();
    }
?>

