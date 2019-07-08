<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>

  <?php $availability = get_field('наличие');
   if (isset($availability[0])) { ?>
                    
                        <div class="availability">
                            <?php print ($availability); ?>
                        </div>
                    <?php } ?>
 

