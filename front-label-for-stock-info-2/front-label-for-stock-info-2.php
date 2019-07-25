<?php
/*
Plugin Name: Front label for stock info (variant 2)
Plugin URI: https://github.com/TarasDrobotko/MyPortfolio/tree/master/front-label-for-stock-info-2
Description: user friendly front label for stock info from admin panel
Author: Drobotko Taras
Author URI: http://m662449k.beget.tech
Version: 2.0.0
 */

/**
 * Check if WooCommerce is active
 */
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    if (!class_exists('WC_StockInfo_LabelAdmin')) {

        class WC_StockInfo_LabelAdmin
        {
            public function __construct()
            {
                add_action('admin_menu', 'fl_admin_submenu');
                add_action('admin_init', 'fl_setting');
                add_action('admin_init', 'fl_admin_scripts');
                add_filter('woocommerce_get_availability', 'fl_get_availability', 10, 2);


                function fl_admin_scripts() {
                    wp_register_script('fl_scripts', plugins_url('scripts/fl-scripts.js', __FILE__), array('jquery'));
                    wp_register_style( 'fl-style', plugins_url( 'css/style.css', __FILE__) );
                    wp_enqueue_script('fl_scripts', '', array(), false, true);
                    wp_enqueue_style('fl-style' );
                 }
                 
                function fl_admin_submenu()
                {
                    add_submenu_page('woocommerce', 'Front label for stock info', 'Front label for stock info', 'manage_options', 'fl-stock-info-options', 'fl_options_submenu');
                }

                function fl_setting()
                {
                    register_setting('fl_options_group', 'label_stockinfo_option', 'fl_options_sanitize');

                    add_settings_section('fl_options_section1', 'Section COUNT of products', '', 'options-label-stockinfo');
                    add_settings_section('fl_options_section2', 'Section TEXT for stock info label', '', 'options-label-stockinfo');

                    add_settings_field('fl_stock_info_count1', 'Count of products not less then: ', 'stock_info_count1_html', 'options-label-stockinfo', 'fl_options_section1', array('label_for' => 'fl_stock_info_count1'));
                    add_settings_field('fl_stock_info_count2', 'Count of products not more then:', 'stock_info_count2_html', 'options-label-stockinfo', 'fl_options_section1', array('label_for' => 'fl_stock_info_count2'));
                    add_settings_field('fl_stock_info_text', 'Text for stock info label: ', 'stock_info_text_html', 'options-label-stockinfo', 'fl_options_section2', array('label_for' => 'fl_stock_info_text'));
                }

                function stock_info_count1_html() {
                    $options = get_option('label_stockinfo_option');
                    ?>

                    <input type="number" name="label_stockinfo_option[count1]" class="regular-text" id="fl_stock_info_count1"
                    value="<?php echo esc_attr($options['count1']); ?>">
                        <?php
                }

                function stock_info_count2_html() {
                    $options = get_option('label_stockinfo_option');
                    ?>

                    <input type="number" name="label_stockinfo_option[count2]" class="regular-text" id="fl_stock_info_count2"
                    value="<?php echo esc_attr($options['count2']); ?>">
                        <?php
                }

                function stock_info_text_html()
                {
                    $options = get_option('label_stockinfo_option');
                    ?>

                    <input type="text" name="label_stockinfo_option[text]" class="regular-text" id="fl_stock_info_text"
                    value="<?php echo esc_attr($options['text']); ?>">
                        <?php
}

                function fl_options_submenu()
                {
                    ?>
<div class="wrap">
    <h2>Front label for stock info</h2>
    <?php if($_GET['settings-updated'] == true): ?>
        <div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"> 
        <p><strong><?php echo __('Settings saved'); ?></strong></p>
        <button type="button" class="notice-dismiss">
            <span class="screen-reader-text">
                <?php echo  __('Dismiss this notice.'); ?>
            </span>
        </button></div>
    <?php endif; ?>
    <form action="options.php" method="post">
        <?php settings_fields('fl_options_group');?>
        <h2>Label 1</h2>
        <?php do_settings_sections('options-label-stockinfo');?>
        <input type="button" name="btn_add_label" id="add-stock-info-label"
        class="button-add" value="Add stock info label" >
        <input type="button" name="btn_del_label" id="del-stock-info-label"
        class="button-del" value="Delete stock info label" >
        <?php submit_button();?>
    </form>
</div>
    <?php

                }

                function fl_options_sanitize($options)
                {
                    $clean_options = array();
                    foreach ($options as $k => $v) {
                        $clean_options[$k] = strip_tags($v);
                    }
                    return $clean_options;
                }

                function fl_get_availability($availability, $_product) {
                    global $product;

                    $options = get_option('label_stockinfo_option');

            if ($_product->is_in_stock() && $options['count1'] >= 0 && $options['count2'] >= 0
                && $product->get_stock_quantity() >= $options['count1']
                && $product->get_stock_quantity() <= $options['count2']) {

                   $availability['availability'] =  $options['text'];

                   return $availability;
            }
                }
            }
        }

        // finally instantiate our plugin class and add it to the set of globals
        $GLOBALS['wc_stock_info_label_admin'] = new WC_StockInfo_LabelAdmin();
    }
}
