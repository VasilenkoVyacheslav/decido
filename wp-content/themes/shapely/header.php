<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shapely
 */
?>
<?php
$shapely_transparent_header = get_theme_mod('shapely_transparent_header', 0);
$shapely_transparent_header_opacity = get_theme_mod('shapely_sticky_header_transparency', 100);

if (1 == $shapely_transparent_header && $shapely_transparent_header_opacity) {
    if ($shapely_transparent_header_opacity < 100) {
        $style = 'style="background: rgba(255, 255, 255, 0.' . esc_attr($shapely_transparent_header_opacity) . ');"';
    } else {
        $style = 'style="background: rgba(255, 255, 255, ' . esc_attr($shapely_transparent_header_opacity) . ');"';
    }
} else {
    $style = '';
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


<?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="main-wr">


            <div id="page" class="site loading closed-page">
                <div id="loader"></div>
                <div id="page-inner" class="">
<?php if (is_front_page()) { ?>
                        <?php if (is_active_sidebar('home-video')) : ?>
                            <div class="home-video">
                            <?php dynamic_sidebar('home-video'); ?>
                                <a href="#popup-video" class="mfp-inline video-start"><i class="fa fa-play"></i></a>
                            </div>
    <?php endif; ?>
                    <?php } ?>
                    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'shapely'); ?></a>
                    <?php if (is_active_sidebar('top-menu')) { ?>
                        <div id="top-menu">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
    <?php dynamic_sidebar('top-menu'); ?>
                                    </div>
                                </div>
                            </div>    
                        </div> 
<?php } ?>
                    <header id="masthead" class="site-header<?php echo get_theme_mod('mobile_menu_on_desktop', false) ? ' mobile-menu' : ''; ?>" role="banner">
                        <div class="nav-container">
                            <nav <?php echo $style; ?> id="site-navigation" class="main-navigation" role="navigation">
                                <div class="container nav-bar">
                                    <div class="flex-row">
                                        <div class="module left site-title-container">
                                            <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
                                                <img class="light-logo" src="<?php echo get_template_directory_uri(); ?>/images/Decido-logo-light.svg" alt="<?php bloginfo('name'); ?>" />
                                                <img class="dark-logo" src="<?php echo get_template_directory_uri(); ?>/images/Decido-logo-dark.svg" alt="<?php bloginfo('name'); ?>" />

                                            </a>
                                        </div>

                                        <div class="module-group right">
                                            <div class="module left">
<?php shapely_header_menu(); ?>
                                            </div>
                                            <!--end of menu module-->
                                            <!--<div class="module widget-handle search-widget-handle hidden-xs hidden-sm">
                                                    <div class="search">
                                                            <i class="fa fa-search"></i>
                                                            <span class="title"><?php esc_html_e('Site Search', 'shapely'); ?></span>
                                                    </div>
                                                    <div class="function">
<?php
get_search_form();
?>
                                                    </div>
                                            </div>-->
                                        </div>
<?php if (is_active_sidebar('menu-sidebar')) { ?>
                                            <div class="menu-sidebar">
                                            <?php dynamic_sidebar('menu-sidebar'); ?>
                                            </div>
                                            <?php } ?>
                                        <?php if (is_active_sidebar('phone-sidebar')) { ?>
                                            <div class="phone-sidebar">
                                            <?php dynamic_sidebar('phone-sidebar'); ?>
                                            </div>
                                            <?php } ?>
                                        <div class="mobile-toggle-in visible-xs">
                                            <i class="fa fa-bars"></i>
                                        </div>
                                        <!--end of module group-->
                                    </div>
                                </div>
                            </nav><!-- #site-navigation -->
                        </div>
                        
                        <div id="mobile-menu" class="">
                            <div id="mobile-menu-inner" class="">
                              <div class="mobile-toggle-out">
                                  <span class="left-ll"></span>
                                  <span class="right-ll"></span>
                                        </div>
         <?php shapely_header_menu(); ?>
                            <?php if (is_active_sidebar('menu-sidebar')) { ?>
                            <?php dynamic_sidebar('menu-sidebar'); ?>
                            <?php }?>
                             <?php if (is_active_sidebar('phone-sidebar')) { ?>
                            <?php dynamic_sidebar('phone-sidebar'); ?>
                              <?php }?>
                            <?php if (is_active_sidebar('top-menu')) { ?>
                            <?php dynamic_sidebar('top-menu'); ?>
                            <?php }?>
                        </div>
                        </div>
                        
                        
                        
                    </header><!-- #masthead -->
                    <div id="content" class="main-container">

<?php if (strpos($_SERVER['REQUEST_URI'], 'shop') !== false) { ?>
                            <div  class="container">
                                <div class="row">
                                    <div class="col-lg-12 col  col-12">
                                        <h1 class="shop-title">Мебель</h1>
                                    </div>
                                </div>
                            </div>
<?php } ?>
                        <?php if (!is_page_template('page-templates/template-home.php') && !is_404() && !is_page_template('page-templates/template-widget.php')) : ?>
                            <div class="header-callout">
                            <?php shapely_top_callout(); ?>
                            </div>
                            <?php endif; ?>

                        <section class="content-area <?php echo ( get_theme_mod('top_callout', true) ) ? '' : ' pt0 '; ?>">
                            <div id="main" class="closed-f <?php echo (!is_page_template('page-templates/template-home.php') && !is_page_template('page-templates/template-widget.php') ) ? 'container' : ''; ?>" role="main">
