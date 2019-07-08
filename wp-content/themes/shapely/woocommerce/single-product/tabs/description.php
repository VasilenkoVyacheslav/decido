<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
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
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $post;

$heading = esc_html(apply_filters('woocommerce_product_description_heading', __('Description', 'woocommerce')));
$details = get_field_objects();
//var_dump( $details ); 
?>
<div id="details"  class="slide-down-wr">
    <?php if ($heading) : ?>
        <div class="row">
            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12  col-12 pull-right">
                <h3 class="open">О <?php the_title(); ?></h3>
            </div>
        </div>
    <?php endif; ?>
    <div class="row slide-down-bodt" style="display: block">
        <div class="col-md-3 col-sm-3 col-xs-12 col-12"></div>
        <div class="col-md-9 col-lg-5 col-sm-9 col-xs-12  col-12">
            <?php the_content(); ?>      

        </div>
        <div class="col-lg-1"></div>
        <div class="col-md-9 col-md-push-3 col-lg-3 col-lg-push-0 col-sm-9 col-sm-push-3 col-xs-12  col-12">
            <?php if ($details) { ?>
                <table class="shop_attributes">

                    <tbody>

                        <?php
                        foreach ($details as $field_name => $field) {
                            if (($field_name == 'ручки') || ($field_name == 'оббивка') || ($field_name == 'сборка') || ($field_name == 'спинка') || ($field_name == 'ножки')) {
                                ?>

                                <tr>
                                    <th><?php print $field['label']; ?></th>
                                    <td>
                                        <?php echo $field['value']; ?>
                                    </td>
                                </tr>
                            <?php }
                        }
                        ?>

                    </tbody>
                </table>
<?php } ?>

        </div>
    </div>
</div>



<?php
$materials = get_field('материал');
if ($materials) {
    ?>
    <div id="materials" class="slide-down-wr">
        <div class="row">
            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12  col-12 pull-right">
                <h3>Материалы</h3>
            </div>
        </div>
        <div class="row slide-down-bodt">
            <div class="col-md-3 col-sm-3 col-xs-12 col-12"></div>
            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12  col-12 pull-right">
                <div id="materials-wr">
    <?php foreach ($materials as $key => $value) { ?>
                       

                            <div id="mat-<?php print $value->ID; ?>" class="mar-wrapp">
                                <div class="mat-image">
                                    <div class="mat-image-inner">
                                    <?php
                                    $img_url = get_the_post_thumbnail_url($value->ID, '192');
                                    ?>
                                    <img src="<?php print $img_url; ?>" alt="<?php print $value->post_title; ?>" />
                                </div>
                                      </div>
                                <div class="mat-text">
                                <h4><?php print $value->post_title; ?></h4>
                                <div class="mat-descr">
        <?php print $value->post_content; ?>
                                </div>
                                </div>
                            </div>
                     
    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>




<?php if ($details) { ?>

    <div id="sizes"  class="slide-down-wr">
        <div class="row">
            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12  col-12 pull-right">
                <h3>Размеры</h3>
            </div>
        </div>
         <div  class="slide-down-bodt">
        <div  class="row ">

            <div class="col-md-3 col-sm-3 col-xs-12 col-12"></div>
            <div class="col-md-9 col-lg-4 col-sm-9 col-xs-12  col-12">
                <table class="shop_attributes">

                    <tbody>

                        <?php
                        foreach ($details as $field_name => $field) {
                            if (($field_name == 'габариты') || ($field_name == 'высота_ножек') || ($field_name == 'длинна_сидений')) {
                                ?>

                                <tr>
                                    <th><?php print $field['label']; ?></th>
                                    <td>
            <?php echo $field['value']; ?>
                                    </td>
                                </tr>
                            <?php }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <div class="col-lg-1"></div>
            <div class="md-hide  col-md-9 col-md-push-3 col-lg-4 col-lg-push-0 col-sm-9 col-sm-push-3 col-xs-12  col-12">
                <div class="gabaritu-wr">
                    <div class="td-label">Габариты упаковки</div>
                    <div class="td-val">
                        <?php
                        $gabaritu = get_field('габариты_');
                        print $gabaritu;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 col-12"></div>
            <div class="col-md-9 col-sm-9 col-12 col-xs-12">

                <div class="sizes-img">
    <?php $mat_image = get_field('чертеж');
    ?>
                    <img src="<?php print $mat_image['sizes']['large']; ?>" />
                </div>
            </div>
             <div class="lg-hide md-show ecol-md-3 col-sm-3 col-xs-12 col-12"></div>
             <div class="lg-hide md-show col-md-9 col-sm-9 col-12 col-xs-12">
                 <div class="gabaritu-wr">
                    <div class="td-label">Габариты упаковки</div>
                    <div class="td-val">
                        <?php
                        $gabaritu = get_field('габариты_');
                        print $gabaritu;
                        ?>
                    </div>
                </div>
             </div>
        </div>
        </div>
    </div>





<?php } ?>
