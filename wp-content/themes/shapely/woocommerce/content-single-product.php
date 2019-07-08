<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */
defined('ABSPATH') || exit;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>


<div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>
    <div  id="product-outer" class="row">
        <div class="col-12 col-md-12">
            <div id="product-title-wrapp">
                <div id="product-title">
                    <?php global $product; ?>
                    <?php the_title('<h1 class="product_title entry-title">', '</h1>'); ?>

                    <?php $new = get_field('новинка');
                    if (isset($new[0])) {
                        ?>
                        <div class="new-label">
                            <?php print ($new[0]); ?>
                        </div>
                    <?php } ?>
                </div>         

                <div class="product_meta">

                    <?php do_action('woocommerce_product_meta_start'); ?>
                    <?php echo wc_get_product_category_list($product->get_id(), ', ', '<span class="posted_in">' . _n(count($product->get_category_ids()), null, null) . ' ', '</span>'); ?>

                    <div class="product_meta-bottom">
                        <span class="showroom-link"><a href="#">Образец в шоуруме</a></span>
                        <?php if (wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type('variable') )) : ?>
                         <span class="sku_wrapper"><?php esc_html_e('Код', 'woocommerce'); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span></span>
                        <?php endif; ?>
                    </div>
                    <?php do_action('woocommerce_product_meta_end'); ?>
                </div>	
            </div>	
        </div>
    </div>
    
    
    <div id="obzor" class="row">

        <div id="product-menu-wr" class="col-md-2 col-sm-2 col-xs-12" >
            <ul class="product-menu fixed-menu">
                <li class="menu-item"><a href="#obzor" class="smooth-scroll active">Обзор</a></li>
                <li class="menu-item"><a href="#details" class="smooth-scroll">Детали</a></li>
                <li class="menu-item"><a href="#materials" class="smooth-scroll">Материалы</a></li>
                <li class="menu-item"><a href="#sizes" class="smooth-scroll">Размеры</a></li>
            </ul>
        </div>

        


        <div class="col-md-7 col-lg-7 col-sm-10">
            <?php
            /**
             * Hook: woocommerce_before_single_product_summary.
             *
             * @hooked woocommerce_show_product_sale_flash - 10
             * @hooked woocommerce_show_product_images - 20
             */
            do_action('woocommerce_before_single_product_summary');
            ?>
          <span class="showroom-link mobile-link-vis"><a href="#">Образец в шоуруме</a></span>
        </div>
        
        <div class="col-md-3 col-lg-3  col-sm-9 col-xs-12  pull-right">
            
               <div class="price-wr">
                <?php
                /**
                 * Hook: woocommerce_single_product_summary.
                 *
                 * @hooked woocommerce_template_single_title - 5
                 * @hooked woocommerce_template_single_rating - 10
                 * @hooked woocommerce_template_single_price - 10
                 * @hooked woocommerce_template_single_excerpt - 20
                 * @hooked woocommerce_template_single_add_to_cart - 30
                 * @hooked woocommerce_template_single_meta - 40
                 * @hooked woocommerce_template_single_sharing - 50
                 * @hooked WC_Structured_Data::generate_product_data() - 60
                 */
                do_action('woocommerce_single_product_summary');
                ?>
            
<button class="add-to-cart" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>">Заказать</button>
       </div>
            
            <div id="info-box">
                <ul>
                    <li><i class="fa fa-save"></i> <a href="#" class="link">Доставка и оплата</a></li>
                    <li><i class="fa fa-download"></i> <a href="#" class="link"> спецификация</a><span class="md-hide"><span class="separator"></span> <a href="#" class="link"> 3D модель</a></span></li>
                    <li><i class="fa fa-clone"></i> Заказать <span class="obrasci-obbivki"><a href="#" class="link">образцы оббивки</a></span></li>
                </ul>
            </div>
               </div>
        
        <div  class="col-md-10 col-lg-10 col-sm-10 col-xs-12  col-12 pull-right">
                    <div id="gallery-imgs">
                    <?php do_action('woocommerce_product_thumbnails'); ?>
            </div>
            </div>
        
   </div>
    
       
   
                <?php
                /**
                 * Hook: woocommerce_after_single_product_summary.
                 *
                 * @hooked woocommerce_output_product_data_tabs - 10
                 * @hooked woocommerce_upsell_display - 15
                 * @hooked woocommerce_output_related_products - 20
                 */
                do_action('woocommerce_after_single_product_summary');
                ?>

</div>
<?php do_action('woocommerce_after_single_product'); ?>
