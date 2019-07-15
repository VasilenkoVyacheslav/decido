<?php
/*
Template Name: Contacts
*/

get_header(); ?>

<div class="contacts">
    <h3 class="page_title"><?php the_title(); ?></h3>
    <div class="two-cols">
    <?php
        $contacts = get_field('contacts');
    ?>
        <?php if($contacts): ?>
        <div class="col contacts__text">
            <p><?php echo $contacts['title']; ?></p>
            <a href="tel:<?php echo $contacts['']; ?>"><?php echo $contacts['phone']; ?></a>
            <div class="schedule"><?php echo $contacts['graphic']; ?></div>
        </div>
        <?php endif; ?>
        <div class="col">
            <div class="messangers">
                <p>Или в мессенджерах</p>
                <?php $messendgers = get_field('messandgers'); ?>
                <ul class="messangers__wrap">
                   <?php foreach ($messendgers as $messendger): ?>
                        <li>
                            <a href="<?php echo $messendger['link']; ?>">
                                <img src="<?php echo $messendger['img']; ?>" alt="<?php echo $messendger['name']; ?>">
                                <?php echo $messendger['name']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>


</div><!-- #main -->
</section><!-- section -->

<div class="footer-callout">
    <?php shapely_footer_callout(); ?>
</div>


<footer id="colophon" class="site-footer footer bg-dark" role="contentinfo">

    <?php  get_template_part('template-parts/page', 'contact'); ?>

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