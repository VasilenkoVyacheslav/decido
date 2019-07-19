<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shapely
 */

?>

</div><!-- #main -->
</section><!-- section -->

<div class="footer-callout">
	<?php shapely_footer_callout(); ?>
</div>


<footer id="colophon" class="site-footer footer bg-dark" role="contentinfo">
	
    	<?php get_sidebar( 'footer' ); ?>

		<div id="bottom-footer">
                       <div class="container footer-inner">
                    <div  class="row">
			<div class="col-sm-6 col-sm-6 col-12 col-xs-6 col-mini-12 ">

					<?php echo wp_kses_post( get_theme_mod( 'shapely_footer_copyright' ) ); ?>
				
			</div><!-- .site-info -->
			<div class="col-sm-6 col-sm-6 col-12 col-xs-6 col-mini-12 text-right">
                            Дизайн и проектирование <a href="https://promodo.ua" target="_blank"><img src="/wp-content/themes/shapely/images/Promodo-logo.png" alt="promodo" /></a>
			</div>
		</div>
    	</div>
	</div>

	<a class="btn btn-sm fade-half back-to-top inner-link" href="#top"><i class="fa fa-angle-up"></i></a>
</footer><!-- #colophon -->

<!--POPUP-->
<div id="popup-wrapper">
    <div class="popup-inner">
        <div class="popup-cooperation popup">
            <span class="close-popup"></span>
            <div class="title-30">Заявка на сотрудничество</div>
            <p class="text16">Отправьте нам свое предложение и наш менеджер свяжется с вами в ближайшее время для уточнения деталей</p>
            <form name="popup-cooperation">
                <div>
                    <input type="text" name="name" placeholder="Ваше имя*">
                </div>
                <div>
                    <input type="tel" name="phone" placeholder="Номер телефона *" required="required">
                </div>
                <div>
                    <textarea name="comment"></textarea>
                </div>
                <div>
                    <button type="submit" class="button" name="send_callback">оставить заявку</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
</div><!-- #page inner -->
</div><!-- #page -->
</div>
<?php wp_footer(); ?>
<!--   Only for cooperation page!!!   -->
<div class="cooperation-circle">
    <img src="<?php echo get_template_directory_uri() ?>/images/cooperation.png" alt="cooperation">
</div>
</div>
</body>
</html>
