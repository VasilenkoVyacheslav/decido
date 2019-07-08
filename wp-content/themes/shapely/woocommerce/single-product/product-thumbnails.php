<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.2
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$attachment_ids = $product->get_gallery_image_ids();

if ( $attachment_ids && has_post_thumbnail() ) {
	foreach ( $attachment_ids as $attachment_id ) {
    $attachment_title = get_the_title($attachment_id);
    $src = wp_get_attachment_image_src( $attachment_id, $size = 'gallery_images' );
    
		print '<div class="mans-grid"><div class="ing-wwr">';
        print wp_get_attachment_image($attachment_id , $size = 'gallery_images');
        print '<a href="'.$src[0].'"  data-mfp-src="'.$src[0].'" class="mfp-image image-link"><i class="fa fa-search-plus"></i></a></div>';

        if($attachment_title!='Untitled'){
           print '<span>'.$attachment_title.'</span>';
        }
        //print_r($src);
        print '</div>';
//echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_id  ), $attachment_id );
	}
}
