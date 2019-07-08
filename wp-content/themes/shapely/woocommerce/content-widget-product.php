<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="product-list">
	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>

	<a class="recomended-product" href="<?php echo esc_url( $product->get_permalink() ); ?>">
	<?php echo $product->get_image(); ?>
            <span class="title-wrapp span-block ">
                <span class="product-title span-block"><?php echo $product->get_name(); ?></span>
                <span class="category span-block"><?php print get_the_category_by_ID($product-> category_ids[0]);?></span>
                          <span class="span-block price-wr">
	 <?php echo $product->get_price_html(); ?>
            </span>
            </span>
	<span class="price-wrapp position-abs  span-block">
  
                <span class="more-link span-block">Подробнее</span>
                </span>
	</a>

	<?php if ( ! empty( $show_rating ) ) : ?>
		<?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
	<?php endif; ?>



	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>

</div>
