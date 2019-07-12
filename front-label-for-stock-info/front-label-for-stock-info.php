<?php
/*
Plugin Name: Front label for stock info
Plugin URI: https://github.com/TarasDrobotko/MyPortfolio/tree/master/front-label-for-stock-info
Description: user friendly front label for stock info
Author: Drobotko Taras
Author URI: http://m662449k.beget.tech
Version: 1.0.0
 */

/**
 * Check if WooCommerce is active
 */
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    if (!class_exists('WC_StockInfo_Label')) {

        /**
         * Localisation
         **/
        load_plugin_textdomain('front-label-stock-info', false, dirname(plugin_basename(__FILE__)) . '/lang');

        class WC_StockInfo_Label
        {
            public function __construct()
            {

                // WooCommerce Stock message
                add_filter('woocommerce_get_availability', 'mw_get_availability', 10, 2);

                function mw_get_availability($availability, $_product)
                {
                    global $product;
                    $intro = __('Quantity in the store:', 'front-label-stock-info');

                    if ($_product->is_in_stock() && $product->get_stock_quantity() > 0 && $product->get_stock_quantity() <= 2) {
                        $availability['availability'] = $intro . ' ' . __('few', 'front-label-stock-info');
                        return $availability;
                    }

                    if ($_product->is_in_stock() && $product->get_stock_quantity() > 2 && $product->get_stock_quantity() < 10) {
                        $availability['availability'] = $intro . ' ' . __('middle', 'front-label-stock-info');
                        return $availability;
                    }

                    if ($_product->is_in_stock() && $product->get_stock_quantity() >= 10) {
                        $availability['availability'] = $intro . ' ' . __('many', 'front-label-stock-info');
                        return $availability;
                    } elseif (!$_product->is_in_stock()) {
                        $availability['availability'] = $intro . ' ' . __('no', 'front-label-stock-info');
                        return $availability;
                    }

                }
            }
        }

        // finally instantiate our plugin class and add it to the set of globals
        $GLOBALS['wc_stock_info_label'] = new WC_StockInfo_Label();
    }
}
