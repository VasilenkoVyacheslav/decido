<?php
/**
 * The Sidebar widget area for footer.
 *
 * @package shapely
 */
?>

<?php if ( is_front_page() ) :?>
    <?php if (is_active_sidebar('footer-widget-2')) : ?>
        <div id="middle-footer" class="front-footer">
            <div class="container footer-inner">
                <div  class="row">
                    <h2 class="widget-title front-title">Мы создаем</h2>
                    <?php dynamic_sidebar('footer-widget-2'); ?>
                </div>
            </div>
            </div>
        </div><!-- .widget-area .second -->
    <?php endif; ?>

        
        <?php if(is_active_sidebar( 'home-banner' )){?>
        <div id="home-banner" class="container">
<div class="row">
    <div class="col-12 col-lg-12">
        <div id="home-banner-inner">
        <?php dynamic_sidebar( 'home-banner' ); ?>
    </div>        
    </div>
</div>
            </div>
<?php }?>
        
         <?php endif; ?>



<?php
// If footer sidebars do not have widget let's bail.

if (!is_active_sidebar('footer-widget-1') && !is_active_sidebar('footer-widget-2') && !is_active_sidebar('footer-widget-3') && !is_active_sidebar('footer-widget-4')) {
    return;
}
// If we made it this far we must have widgets.
?>

<?php if (!is_front_page() ) :?>
<div id="expert-section">
    <?php if (is_active_sidebar('expert-carousel')) : ?>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12  col-12 pull-right">
                 <?php dynamic_sidebar('expert-carousel'); ?>
            </div>
        </div>
    </div>
    <?php endif;?>
       <?php
              
                global $post;
                $args = array(
                    'numberposts' => 0,
                    'post_type' => 'expert',
                    'order' => 'DESC',
                  
                );
                $reports = get_posts($args);
                ?>
  <div class="clearfix expert-wrapp">
    <?php foreach ($reports as $post): ?>

                    <?php setup_postdata($post); ?>

                        <div class="expert-item">
                        <span class="expert-link">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('expert');
                            }
                            ?>
                        </span>
                            </div>
                    
<?php endforeach; ?>
      </div>
                <?php wp_reset_postdata(); ?>
</div>
        <?php endif;?>

<div class="footer-widget-area">
    <?php if (is_active_sidebar('footer-widget-1')) : ?>
        <div id="top-footer">
            <div class="container footer-inner">
                <div id='top-footer-block'  class="row">
                    <div class="col-lg-5 col-sm-6 col-xs-12 col-12">
                    <?php dynamic_sidebar('footer-widget-1'); ?>
                    </div>
                </div>
                
                <div id='top-footer-promo' class="row">
                     <?php if (is_active_sidebar('footer-widget-11')) : ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6  ">
                            <?php dynamic_sidebar('footer-widget-11'); ?>
                        </div>
                    <?php endif; ?>
                                         <?php if (is_active_sidebar('footer-widget-12')) : ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6  ">
                            <?php dynamic_sidebar('footer-widget-12'); ?>
                        </div>
                    <?php endif; ?>
                                         <?php if (is_active_sidebar('footer-widget-13')) : ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6  ">
                            <?php dynamic_sidebar('footer-widget-13'); ?>
                        </div>
                    <?php endif; ?>
                                         <?php if (is_active_sidebar('footer-widget-14')) : ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6  ">
                            <?php dynamic_sidebar('footer-widget-14'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            
           
            <div id='mounts-img'>
            <img id='mounts' src='<?php echo get_template_directory_uri(); ?>/images/Mountains_1.svg' alt='' />
             <img id='seed' src='<?php echo get_template_directory_uri(); ?>/images/Seed.svg' alt='' />
            <!--<div id="sun-wr" class="container">
                <div class="row">
            <img id='sun' src='<?php echo get_template_directory_uri(); ?>/images/Sun.svg' alt='' />
                </div>
            </div>-->
            </div>
                
        </div><!-- .widget-area .first -->
    <?php endif; ?>
<?php if ( !is_front_page() ) :?>
    <?php if (is_active_sidebar('footer-widget-2')) : ?>
        <div id="middle-footer">
            <div class="container footer-inner">
                <div  class="row">
                    <?php dynamic_sidebar('footer-widget-2'); ?>
                </div></div></div></div><!-- .widget-area .second -->
    <?php endif; ?>
          
<!-- .widget-area .second -->
             
 <?php endif; ?>

<?php if ( is_front_page() ) :?>
       <?php if ( (is_active_sidebar('footer-showrooms') ) && (is_active_sidebar('footer-map')) ) : ?>
                <div id="map-footer">
                    <div class="container footer-inner">
                <div id="map-wrapp"  class="row ">
                      <?php if (is_active_sidebar('footer-showrooms')) : ?>
                    <div id="rooms-wrapp" class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                        <h3>Наши шоурумы</h3>
                        <?php dynamic_sidebar('footer-showrooms'); ?>
                    </div>
                      <?php endif; ?>
                     <?php if (is_active_sidebar('footer-map')) : ?>
                    <div id="maps-wrapp"  class="col-lg-8 col-md-8 col-sm-7 col-sm-push-0 col-xs-10 col-xs-push-2">
                        <?php dynamic_sidebar('footer-map'); ?>
                    </div>
                    <?php endif; ?>
                    </div></div></div>
                    <?php endif; ?>
 <?php endif; ?>

    <?php if (is_active_sidebar('footer-widget-31')) : ?>
        <div id="middle-2-footer">
            <div class="container footer-inner">
                <div  class="row row-1">
                    <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12"></div>
                    <div id="maps-wrapp-bottom"  class="col-lg-8 col-md-8 col-sm-7 col-sm-push-0 col-xs-10 col-xs-push-2"></div>
                </div>
                     <div  class="row row-2">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-mini-12">
                        <?php dynamic_sidebar('footer-widget-31'); ?>
                    </div>
                    <?php if (is_active_sidebar('footer-widget-32')) : ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-mini-6">
                            <?php dynamic_sidebar('footer-widget-32'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('footer-widget-33')) : ?>
                        <div class="col-lg-3 col-md-2 col-sm-6 col-xs-6 col-mini-6">
                            <?php dynamic_sidebar('footer-widget-33'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('footer-widget-34')) : ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-mini-12">
                            <?php dynamic_sidebar('footer-widget-34'); ?>
                        </div>
                    <?php endif; ?>	


                </div></div></div><!-- .widget-area .third -->
    <?php endif; ?>

    <?php if (is_active_sidebar('footer-widget-4')) : ?>
        <div class="col-md-3 col-sm-6 footer-widget" role="complementary">
            <?php dynamic_sidebar('footer-widget-4'); ?>
        </div><!-- .widget-area .third -->
    <?php endif; ?>
</div>
