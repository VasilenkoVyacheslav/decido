<?php

/**
 * Shapely functions and definitions.
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Shapely
 */
if ( ! function_exists( 'shapely_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function shapely_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Shapely, use a find and replace
		 * to change 'shapely' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'shapely', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Add support for the custom logo functionality
		 */
		add_theme_support(
			'custom-logo', array(
				'height'      => 55,
				'width'       => 135,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support(
			'custom-header', apply_filters(
				'shapely_custom_header_args', array(
					'default-image'      => '',
					'default-text-color' => '000000',
					'width'              => 1900,
					'height'             => 225,
					'flex-width'         => true,
				)
			)
		);

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary'     => esc_html__( 'Primary', 'shapely' ),
				'social-menu' => esc_html__( 'Social Menu', 'shapely' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background', apply_filters(
				'shapely_custom_background_args', array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'shapely-full', 1110, 530, true );
		add_image_size( 'shapely-featured', 730, 350, true );
		add_image_size( 'shapely-grid', 350, 300, true );

		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		add_theme_support( 'customize-selective-refresh-widgets' );

		// Enable Shortcodes in widgets
		add_filter( 'widget_text', 'do_shortcode' );

	}
endif;
add_action( 'after_setup_theme', 'shapely_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shapely_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'shapely_content_width', 1140 );
}

add_action( 'after_setup_theme', 'shapely_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shapely_widgets_init() {
    
        	register_sidebar( array(
		'name'          => esc_html__( 'Верхнее меню', 'decido' ),
		'id'            => 'top-menu',
		'description'   => esc_html__( 'Add widgets here.', 'storefront' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
                		register_sidebar(
			array(
				'id'            => 'menu-sidebar',
				'name'          => esc_html__( 'Поиск', 'shapely' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
                                
                                                		register_sidebar(
			array(
				'id'            => 'phone-sidebar',
				'name'          => esc_html__( 'Телефоны', 'shapely' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
                                
	register_sidebar(
		array(
			'id'            => 'sidebar-1',
			'name'          => esc_html__( 'Sidebar', 'shapely' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'id'            => 'home-video',
			'name'          => esc_html__( 'Фоновое Видео ', 'shapely' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
        
        	register_sidebar(
		array(
			'id'            => 'home-video-popup',
			'name'          => esc_html__( 'Видео (popup) ', 'shapely' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
        
        	register_sidebar(
		array(
			'id'            => 'home-slider',
			'name'          => esc_html__( 'Слайдер на главной', 'shapely' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
                	register_sidebar(
		array(
			'id'            => 'home-banner',
			'name'          => esc_html__( 'Баннер на главной', 'shapely' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
        
        	register_sidebar(
		array(
			'id'            => 'expert-carousel',
			'name'          => esc_html__( 'Наши Эксперты', 'shapely' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
                
                	register_sidebar(
		array(
			'id'            => 'footer-showrooms',
			'name'          => esc_html__( 'Наши Шоурумы', 'shapely' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
                                        	register_sidebar(
		array(
			'id'            => 'footer-map',
			'name'          => esc_html__( 'Google Maps', 'shapely' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s map-footer">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

               
                for ( $i = 1; $i < 5; $i ++ ) {
		register_sidebar(
			array(
				'id'            => 'footer-widget-1' . $i,
				'name'          => sprintf( esc_html__( 'Top Footer Widget %s', 'shapely' ), $i ),
				'description'   => esc_html__( 'Used for top footer widget area', 'shapely' ),
				'before_widget' => '<div id="top-%1$s" class="widget top-%2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
        
        
	for ( $i = 1; $i < 3; $i ++ ) {
		register_sidebar(
			array(
				'id'            => 'footer-widget-' . $i,
				'name'          => sprintf( esc_html__( 'Footer Widget %s', 'shapely' ), $i ),
				'description'   => esc_html__( 'Used for footer widget area', 'shapely' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
        
  
        
        for ( $i = 1; $i < 5; $i ++ ) {
		register_sidebar(
			array(
				'id'            => 'footer-widget-3' . $i,
				'name'          => sprintf( esc_html__( 'Bottom Footer Widget %s', 'shapely' ), $i ),
				'description'   => esc_html__( 'Used for bottom footer widget area', 'shapely' ),
				'before_widget' => '<div id="bottom-%1$s" class="widget bottom-%2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}

	if ( shapely_is_woocommerce_activated() ) {
		register_sidebar(
			array(
				'id'            => 'shop-sidebar',
				'name'          => esc_html__( 'Shop Sidebar', 'shapely' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
        

	
        

}

add_action( 'widgets_init', 'shapely_widgets_init' );

/**
 * Hides the custom post template for pages on WordPress 4.6 and older
 *
 * @param array $post_templates Array of page templates. Keys are filenames, values are translated names.
 *
 * @return array Filtered array of page templates.
 */
function shapely_exclude_page_templates( $post_templates ) {

	if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
		unset( $post_templates['page-templates/full-width.php'] );
		unset( $post_templates['page-templates/no-sidebar.php'] );
		unset( $post_templates['page-templates/sidebar-left.php'] );
		unset( $post_templates['page-templates/sidebar-right.php'] );
	}

	return $post_templates;
}

add_filter( 'theme_page_templates', 'shapely_exclude_page_templates' );

/**
 * Enqueue scripts and styles.
 */
function shapely_scripts() {

	// Add Bootstrap default CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );

	// Add Font Awesome stylesheet
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );

	// Add Google Fonts
	wp_enqueue_style( 'shapely-fonts', '//fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,700%7COpen+Sans:400,500,600' );

	// Add slider CSS
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/assets/css/flexslider.css' );
        
                wp_enqueue_style( 'customscrollbar', get_template_directory_uri() . '/assets/css/jquery.mCustomScrollbar.min.css' );

	//Add custom theme css
	wp_enqueue_style( 'shapely-style', get_stylesheet_uri() );

	wp_enqueue_script( 'shapely-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20160115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( post_type_exists( 'jetpack-portfolio' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	// Add slider JS
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/assets/js/flexslider.min.js', array( 'jquery' ), '20160222', true );

        	// Add slider JS
	wp_enqueue_script( 'customscrollbar.concat', get_template_directory_uri() . '/assets/js/jquery.mCustomScrollbar.concat.min.js', array( 'jquery' ), '20160222', true );

        	wp_enqueue_script( 'customscrollbar', get_template_directory_uri() . '/assets/js/jquery.mCustomScrollbar.min.js', array( 'jquery' ), '20160222', true );

        
	if ( is_page_template( 'page-templates/template-home.php' ) || is_page_template( 'page-templates/template-widget.php' ) ) {
		wp_enqueue_script( 'shapely-parallax', get_template_directory_uri() . '/assets/js/parallax.min.js', array( 'jquery' ), '20160115', true );
	}
	/**
	 * OwlCarousel Library
	 */
	wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/assets/js/owl-carousel/owl.carousel.min.js', array( 'jquery' ), '20160115', true );
	wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/assets/js/owl-carousel/owl.carousel.min.css' );
	wp_enqueue_style( 'owl.carousel.theme', get_template_directory_uri() . '/assets/js/owl-carousel/owl.theme.default.css' );
  // Add Font Awesome stylesheet
        wp_enqueue_style( 'font-leto', get_template_directory_uri() . '/assets/fonts/font.css' );
	wp_enqueue_style( 'mfp-css', get_template_directory_uri() . '/assets/mfp/magnific-popup.css' );
        
  wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css');
  wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/slick.css');
  wp_enqueue_style('nice-select', get_template_directory_uri() . '/assets/css/nice-select.css');
  wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css');
  wp_enqueue_script('masonry', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array('jquery'), '20160115', true);
  wp_enqueue_script('carouFredSel', get_template_directory_uri() . '/assets/js/jquery.carouFredSel.js', array('jquery'), '20160115', true);
  wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '20160115', true);
  wp_enqueue_script('nice-select-js', get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js', array('jquery'), '20160115', true);
  wp_enqueue_script('mfp-js', get_template_directory_uri() . '/assets/mfp/jquery.magnific-popup.min.js', array('jquery'), '20160115', true);
  wp_enqueue_script('jquery-mask', get_template_directory_uri() . '/assets/js/jquery.mask.js', array('jquery'), '20160115', true);
  wp_enqueue_script('sticky-sidebar', get_template_directory_uri() . '/assets/js/sticky-sidebar.js', array('jquery'), '1', true);
  wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1', true);

  wp_enqueue_script(
          'shapely-scripts', get_template_directory_uri() . '/assets/js/shapely-scripts.js', array(
      'jquery',
      'imagesloaded',
          ), '20180423', true
  );

  /**
	 * @since 1.2.2
	 */
	wp_localize_script(
		'shapely-scripts', 'ShapelyAdminObject',
		array(
			'sticky_header' => get_theme_mod( 'shapely_sticky_header', 1 ),
		)
	);
        
}

add_action( 'wp_enqueue_scripts', 'shapely_scripts' );

function remove_short_description() {

remove_meta_box( 'postexcerpt', 'product', 'normal');

}
add_action('add_meta_boxes', 'remove_short_description', 999);


/**
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom nav walker
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load Social Navition
 */
require get_template_directory() . '/inc/socialnav.php';

/**
 * Load related posts
 */
require get_template_directory() . '/inc/class-shapely-related-posts.php';

/**
 * Load the shapely class
 */
require get_template_directory() . '/inc/class-shapely.php';

/**
 * Load the shapely page builder class
 */
require get_template_directory() . '/inc/class-shapely-builder.php';
Shapely_Builder::get_instance();


function add_my_currency( $currencies ) {
 
     $currencies['UAH'] = __( 'Українська гривня', 'woocommerce' );
 
     return $currencies;
 
}
 
add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
 
function add_my_currency_symbol( $currency_symbol, $currency ) {
 
     switch( $currency ) {
 
         case 'UAH': $currency_symbol = 'грн'; break;
 
     }
 
     return $currency_symbol;
 
}

add_filter( 'woocommerce_get_price_html', 'wpa83368_price_html', 100, 2 );

function wpa83368_price_html( $price,$product ){
   // return $product->price;
    if ( $product->price > 0 ) {
      if ( $product->price && isset( $product->regular_price ) ) {
        $from = $product->regular_price;
        $to = $product->price;
        return '<span class="woocommerce-Price-amount amount"><span class="ot">от </span>'.( ( is_numeric( $to ) ) ? woocommerce_price( $to ) : $to ) .'</span>';
      } else {
        $to = $product->price;
        return '<span class="woocommerce-Price-amount amount"><span class="ot">от </span>' . ( ( is_numeric( $to ) ) ? woocommerce_price( $to ) : $to ) . '</span>';
      }
   } 
}
function wpse240457_add_class($html) {
  $html = '<div class="product_list_widget you-new-class">';
  return $html;
}
add_filter('woocommerce_before_widget_product_list', 'wpse240457_add_class', 1, 15);


/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 16;
  return $cols;
}

flush_rewrite_rules( false );



// Load more pager

add_action( 'wp_enqueue_scripts', 'misha_script_and_styles', 1 );

function misha_script_and_styles() {
	global $wp_query;




	// register our main script but do not enqueue it yet
	wp_register_script( 'misha_scripts', get_template_directory_uri() . '/assets/js/myloadmore.js', array('jquery'), time() );

	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'misha_scripts', 'misha_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => $wp_query->query_vars['paged'] ? $wp_query->query_vars['paged'] : 1,
		'max_page' => $wp_query->max_num_pages,
		'first_page' => get_pagenum_link(1)
	) );

 	wp_enqueue_script( 'misha_scripts' );
}


add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

function misha_loadmore_ajax_handler(){

	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';

	// it is always better to use WP_Query but not here
	query_posts( $args );

	if( have_posts() ) :

		// run the loop
		while( have_posts() ): the_post();
get_template_part('template-parts/content', 'project');
			

		endwhile;
		misha_paginator( $_POST['first_page'] );
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}




function misha_paginator( $first_page_url ){

	// the function works only with $wp_query that's why we must use query_posts() instead of WP_Query()
	global $wp_query;

	// remove the trailing slash if necessary
	$first_page_url = untrailingslashit( $first_page_url );


	// it is time to separate our URL from search query
	$first_page_url_exploded = array(); // set it to empty array
	$first_page_url_exploded = explode("/?", $first_page_url);
	// by default a search query is empty
	$search_query = '';
	// if the second array element exists
	if( isset( $first_page_url_exploded[1] ) ) {
		$search_query = "/?" . $first_page_url_exploded[1];
		$first_page_url = $first_page_url_exploded[0];
	}

	// get parameters from $wp_query object
	// how much posts to display per page (DO NOT SET CUSTOM VALUE HERE!!!)
	$posts_per_page = (int) $wp_query->query_vars['posts_per_page'];
	// current page
	$current_page = (int) $wp_query->query_vars['paged'];
	// the overall amount of pages
	$max_page = $wp_query->max_num_pages;

	// we don't have to display pagination or load more button in this case
	if( $max_page <= 1 ) return;

	// set the current page to 1 if not exists
	if( empty( $current_page ) || $current_page == 0) $current_page = 1;

	// you can play with this parameter - how much links to display in pagination
	$links_in_the_middle = 4;
	$links_in_the_middle_minus_1 = $links_in_the_middle-1;

	// the code below is required to display the pagination properly for large amount of pages
	// I mean 1 ... 10, 12, 13 .. 100
	// $first_link_in_the_middle is 10
	// $last_link_in_the_middle is 13
	$first_link_in_the_middle = $current_page - floor( $links_in_the_middle_minus_1/2 );
	$last_link_in_the_middle = $current_page + ceil( $links_in_the_middle_minus_1/2 );

	// some calculations with $first_link_in_the_middle and $last_link_in_the_middle
	if( $first_link_in_the_middle <= 0 ) $first_link_in_the_middle = 1;
	if( ( $last_link_in_the_middle - $first_link_in_the_middle ) != $links_in_the_middle_minus_1 ) { $last_link_in_the_middle = $first_link_in_the_middle + $links_in_the_middle_minus_1; }
	if( $last_link_in_the_middle > $max_page ) { $first_link_in_the_middle = $max_page - $links_in_the_middle_minus_1; $last_link_in_the_middle = (int) $max_page; }
	if( $first_link_in_the_middle <= 0 ) $first_link_in_the_middle = 1;

	// begin to generate HTML of the pagination
        	// haha, this is our load more posts link
        $pagination='<div class="clear remove-after-load"></div>';
        if( $current_page < $max_page ){
            $pagination.= '<div id="misha_loadmore"><i class="fa fa-sync"></i><span>еще 8 проектов</span></div>';
        }
	$pagination .= '<nav id="misha_pagination" class="navigation pagination" role="navigation"><div class="nav-links">';
// arrow left (previous page)
	if ($current_page != 1)
		$pagination.= '<a href="'. $first_page_url . '/page/' . ($current_page-1) . $search_query . '" class="prev page-numbers"><i class="fa fa-long-arrow-left"></i></a>';

	// when to display "..." and the first page before it
	if ($first_link_in_the_middle >= 2 && $links_in_the_middle < $max_page) {
		$pagination.= '<a href="'. $first_page_url . $search_query . '" class="page-numbers">1</a>'; // first page

		if( $first_link_in_the_middle != 2 )
			$pagination .= '<span class="page-numbers extend">...</span>';

	}

	

	// loop page links in the middle between "..." and "..."
	for($i = $first_link_in_the_middle; $i <= $last_link_in_the_middle; $i++) {
		if($i == $current_page) {
			$pagination.= '<span class="page-numbers current">'.$i.'</span>';
		} else {
			$pagination .= '<a href="'. $first_page_url . '/page/' . $i . $search_query .'" class="page-numbers">'.$i.'</a>';
		}
	}

	

	// when to display "..." and the last page after it
	if ( $last_link_in_the_middle < $max_page ) {

		if( $last_link_in_the_middle != ($max_page-1) )
			$pagination .= '<span class="page-numbers extend">...</span>';

		$pagination .= '<a href="'. $first_page_url . '/page/' . $max_page . $search_query .'" class="page-numbers">'. $max_page .'</a>';
	}
// arrow right (next page)
	if ($current_page != $last_link_in_the_middle )
		$pagination.= '<a href="'. $first_page_url . '/page/' . ($current_page+1) . $search_query .'" class="next page-numbers"><i class="fa fa-long-arrow-right"></i></a>';

	// end HTML
	$pagination.= "</div></nav>\n";


		

	// replace first page before printing it
	echo str_replace(array("/page/1?", "/page/1\""), array("?", "\""), $pagination);
}


/**
 * Control the number of search results
 */
function custom_posts_per_page( $query ) {

     if ( is_post_type_archive( 'project' ) ) {
        // Display 8 posts for a custom post type called 'project'
        $query->set( 'posts_per_page', 8 );
        return;
    }
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Настройка страницы поиска',
        'menu_slug' 	=> 'serch-settings',
    ));


}