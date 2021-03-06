<?php

if( ! class_exists('BeRocket_selector_wizard_woocommerce') ) {
    class BeRocket_selector_wizard_woocommerce{
        function __construct() {
            add_action('BeRocket_wizard_start', array($this, 'import_products'));
            add_action('BeRocket_wizard_javascript', array($this, 'javascript'));
            add_action('BeRocket_wizard_end', array($this, 'remove_products'));
            add_action('BeRocket_wizard_ended_check', array($this, 'remove_products_ended'));
            add_filter('BeRocket_wizard_category_link', array($this, 'category_link'));
            add_action( 'wp_ajax_berocket_wizard_selector_start', array( $this, 'wizard_selector_start' ) );
            add_action( 'wp_ajax_berocket_wizard_selector_end', array( $this, 'remove_products' ) );
            add_action( 'wp_ajax_berocket_wizard_selector_ended', array( $this, 'remove_products_ended_check' ) );
            $status = get_option('BeRocket_selector_wizard_status');
            if( $status == 'started' ) {
                add_filter('loop_shop_per_page', array($this, 'loop_shop_per_page'), 999999999999999 );
                add_action('pre_get_posts', array($this, 'products_per_page'), 999999999999999);
            }
        }
        
        public function products_per_page($query) {
            $query->set( 'posts_per_page', 3 );
        }
        public function products_per_page_more($query) {
            $query->set( 'posts_per_page', 100 );
        }
        function loop_shop_per_page($cols) {
            return 3;
        }
        public function javascript() {
            wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'berocket_wizard_autoselect', plugins_url( 'wizard.js', __FILE__ ), array( 'jquery' ) );
            wp_localize_script(
                'berocket_wizard_autoselect',
                'berocket_wizard_autoselect',
                array(
                    'creating_products' => __('Creating products', 'BeRocket_domain'),
                    'getting_selectors' => __('Gettings selectors', 'BeRocket_domain'),
                    'removing_products' => __('Removing products', 'BeRocket_domain'),
                    'stopping_text' => __('Stopping. Wait', 'BeRocket_domain'),
                    'stop_text' => __('Stop', 'BeRocket_domain'),
                    'error' => __('Error:', 'BeRocket_domain'),
                    'ajaxurl' => admin_url('admin-ajax.php')
                )
            );
            wp_register_style( 'berocket_wizard_autoselect', plugins_url( 'wizard.css', __FILE__ ) );
            wp_enqueue_style( 'berocket_wizard_autoselect' );
        }
        
        public function category_link($link) {
            $term = get_term_by('name', 'BeRocketSelectors', 'product_cat');
            return get_term_link($term);
        }
        
        public function wizard_selector_start() {
            $this->import_products();
            echo $this->category_link('');
            wp_die();
        }
        
        public function import_products($position = 0) {
            $status = get_option('BeRocket_selector_wizard_status');
            if( $status != 'started' ) {
                update_option('BeRocket_selector_wizard_status', 'started');
                global $wpdb;
                include_once( WC_ABSPATH . 'includes/admin/importers/class-wc-product-csv-importer-controller.php' );
                include_once( WC_ABSPATH . 'includes/import/class-wc-product-csv-importer.php' );
                $file   = dirname( __FILE__ ) . '/products.csv';
                $params = array(
                    'delimiter'       => ',',
                    'mapping'         => array(
                        "ID" => "id", 
                        "Type" => "type", 
                        "SKU" => "sku", 
                        "Name" => "name", 
                        "Published" => "published", 
                        "Is featured?" => "featured", 
                        "Visibility in catalog" => "catalog_visibility", 
                        "Short description" => "short_description", 
                        "Description" => "description", 
                        "Date sale price starts" => "date_on_sale_from", 
                        "Date sale price ends" => "date_on_sale_to", 
                        "Tax status" => "tax_status", 
                        "Tax class" => "tax_class", 
                        "In stock?" => "stock_status", 
                        "Stock" => "stock_quantity", 
                        "Backorders allowed?" => "backorders", 
                        "Sold individually?" => "sold_individually", 
                        "Weight (kg)" => "weight", 
                        "Length (cm)" => "length", 
                        "Width (cm)" => "width", 
                        "Height (cm)" => "height", 
                        "Allow customer reviews?" => "reviews_allowed", 
                        "Purchase note" => "purchase_note", 
                        "Sale price" => "sale_price", 
                        "Regular price" => "regular_price", 
                        "Categories" => "category_ids", 
                        "Tags" => "tag_ids", 
                        "Shipping class" => "shipping_class_id", 
                        "Images" => "images", 
                        "Download limit" => "download_limit", 
                        "Download expiry days" => "download_expiry", 
                        "Parent" => "parent_id", 
                        "Grouped products" => "grouped_products", 
                        "Upsells" => "upsell_ids", 
                        "Cross-sells" => "cross_sell_ids", 
                        "External URL" => "product_url", 
                        "Button text" => "button_text", 
                        "Position" => "menu_order"
                    ),
                    'update_existing' => false,
                    'lines'           => 100,
                    'parse'           => true,
                );

                $importer         = WC_Product_CSV_Importer_Controller::get_importer( $file, $params );
                $results          = $importer->import();
                $percent_complete = $importer->get_percent_complete();

                if ( 100 === $percent_complete ) {
                    // Clear temp meta.
                    $wpdb->delete( $wpdb->postmeta, array( 'meta_key' => '_original_id' ) );
                    $wpdb->delete( $wpdb->posts, array( 'post_status' => 'importing', 'post_type' => 'product' ) );
                    $wpdb->delete( $wpdb->posts, array( 'post_status' => 'importing', 'post_type' => 'product_variation' ) );

                    $blog_id_var = get_current_blog_id();
                    do_action('berocket_multisite_import_done', $blog_id_var);
                    update_option('berocket_multisite_import_ready', '1');
                    // Send success.
                    return 'done';
                } else {
                    return $this->import_products($importer->get_file_position());
                }
            }
        }
        
        public function remove_products_ended() {
            add_action('pre_get_posts', array($this, 'products_per_page_more'), 999999999999999);
            $args = array("post_type" => "product", "s" => 'BeRocketSelectorsTest', 'posts_per_page'   => 100);
            $query = get_posts( $args );
            if( is_array($query) ) {
                echo count($query);
                foreach($query as $product) {
                    wp_delete_post($product->ID, true);
                }
            }
            $term = get_term_by('name', 'BeRocketSelectors', 'product_cat');
            if( $term !== FALSE ) {
                wp_delete_term($term->term_id, $term->taxonomy);
            }
            remove_action('pre_get_posts', array($this, 'products_per_page_more'), 999999999999999);
        }
        function remove_products_ended_check() {
            $status = get_option('BeRocket_selector_wizard_status');
            if( $status == 'ended' ) {
                do_action('BeRocket_wizard_ended_check');
            }
            wp_die();
        }
        function remove_products() {
            remove_filter('loop_shop_per_page', array($this, 'loop_shop_per_page'), 999999999999999 );
            remove_action('pre_get_posts', array($this, 'products_per_page'), 999999999999999);
            $this->remove_products_ended();
            update_option('BeRocket_selector_wizard_status', 'ended');
            wp_die();
        }
    }
    new BeRocket_selector_wizard_woocommerce();
    function BeRocket_wizard_generate_autoselectors($input_classes = array(), $js_functions = array()) {
        $status = get_option('BeRocket_selector_wizard_status');
        $status = $status == 'started';
        $js_functions = array_merge(
            array(
                'any' => '',
                'success' => '',
                'error' => '',
                'percent' => '',
            ), $js_functions);
        $input_classes = array_merge(
            array(
                'products' => '',
                'product' => '',
                'pagination' => '',
                'next_page' => '',
                'prev_page' => '',
                'result_count' => '',
            ), $input_classes);
        $html = '<div class="berocket_wizard_autoselectors" data-functions=\'' . json_encode($js_functions) . '\' data-inputs=\'' . json_encode($input_classes) . '\'>
            '.($status ? '<div class="berocket_selectors_was_runned"><strong style="color: red;">'.__('Script was runned, but page closed until end. Please stop it to prevent any problems on your site', 'BeRocket_domain').'</strong></div>' : '').'
            <button class="berocket_autoselector button" type="button"'.($status ? ' disabled' : '').'>Auto-Selectors</button>
            <span class="berocket_autoselect_spin"'.($status ? '' : 'style="display:none;').'"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><button class="berocket_autoselector_stop button" type="button">Stop</button></span>
            <span class="berocket_autoselect_ready" style="display:none;"><i class="fa fa-check fa-3x fa-fw"></i></span>
            <span class="berocket_autoselect_error" style="display:none;"><i class="fa fa-times fa-3x fa-fw"></i></span>
            <div class="berocket_autoselector_load" style="display:none;"><div class="berocket_line"></div><div class="berocket_autoselector_action"></div></div>
            <h4>' . __('Steps:', 'BeRocket_domain') . '</h4>
            <ol>
                <li><span>' . __('Creating products', 'BeRocket_domain') . '</span> <i class="fa"></i></li>
                <li><span>' . __('Gettings selectors', 'BeRocket_domain') . '</span> <i class="fa"></i></li>
                <li><span>' . __('Removing products', 'BeRocket_domain') . '</span> <i class="fa"></i></li>
            </ol>
        </div>
        <script>jQuery(document).ready(function(){
            jQuery.get(berocket_wizard_autoselect.ajaxurl, {action:"berocket_wizard_selector_ended"});
        });</script>';
        return $html;
    }
}
