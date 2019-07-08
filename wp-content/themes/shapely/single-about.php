<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shapely
 */
get_header();
?>
<?php $layout_class = shapely_get_layout_class(); ?>
<div class="row">

  <div id="primary" class="col-md-12 mb-xs-24">
    <?php
    while (have_posts()) :
      the_post();
     the_title('<h1>', '</h1>');
      get_template_part('template-parts/content', 'about');



    endwhile; // End of the loop.
    ?>
  </div><!-- #primary -->

</div>
</div><!-- #main -->
</section><!-- section -->


<footer id="colophon" class="site-footer footer bg-dark" role="contentinfo">
	
    	<?php  get_template_part('template-parts/footer', 'about');; ?>

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

