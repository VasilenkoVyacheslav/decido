<?php
/**
 * Displayed when no products are found matching the current query
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/no-products-found.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<!--<p class="woocommerce-info">--><?php //_e( 'No products were found matching your selection.', 'woocommerce' ); ?><!--</p>-->
<div class="search-page">
    <h3 class="page_title">К сожалению, по запросу «<?php echo $_GET['s']; ?>» мы ничего не нашли</h3>
    <div class="row">
        <div class="search-page-text col col-sm-6">
            <p>Возможно, вы ввели некорректный запрос. Проверьте правильность написания. Старайтесь использовать только ключевые слова.</p>
        </div>
    </div>
    <div class="row search-two-cols">
        <div class="col col-sm-6 search-categories">
            <div class="title-30">Посмотрите в категориях</div>
            <?php
            $args = array( 'type' => 'product', 'taxonomy' => 'product_cat' );
            $categories = get_categories( $args );
            ?>
            <ul class="cats row">
                <?php foreach ($categories as $cat) { ?>
                    <li class="col col-sm-6"><a href="<?php echo get_term_link($cat->slug, 'product_cat') ?>"><?php echo $cat->name; ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <?php $contacts = get_field('contact', 'options'); ?>
        <div class="col col-sm-6 contacts">
            <div class="title-30"><?php echo $contacts['title']; ?></div>
            <div class="contacts__text">
                <a href="tel:<?php echo $contacts['phone']; ?>"><?php echo $contacts['phone']; ?></a>
                <div class="schedule"><?php echo $contacts['graphik']; ?></div>
                <div><a href="#" class="white-button">Обратный звонок</a></div>
            </div>
        </div>
    </div>
</div>