<?php
/*
Plugin Name: Front label for stock info with using metaboxes
Plugin URI: https://github.com/TarasDrobotko/MyPortfolio/tree/master/front-label-for-stock-info-3
Description: user friendly front label for stock info from admin panel with using metaboxes
Author: Drobotko Taras
Author URI: http://m662449k.beget.tech
Version: 1.0.0
 */

/**
 * Check if WooCommerce is active
 */
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    if (!class_exists('WC_Stock_Info_LabelAdmin')) {

        class WC_Stock_Info_LabelAdmin
        {
            public function __construct()
            {

                add_action('admin_menu', 'wpfl_admin_submenu');
                add_action('add_meta_boxes', 'wpfl_add_custom_box');
                add_action('admin_init', 'wpfl_admin_scripts');

                function wpfl_admin_scripts()
                {
                    wp_register_script('wpfl_scripts', plugins_url('scripts/wpfl-scripts.js', __FILE__), array('jquery'));
                    wp_register_style('wpfl-style', plugins_url('css/style.css', __FILE__));
                    wp_enqueue_script('wpfl_scripts', '', array(), false, true);
                    wp_enqueue_style('wpfl-style');
                }

                function wpfl_add_custom_box()
                {

                    $screen = get_current_screen();
                    if (is_string($screen)) {
                        $screen = convert_to_screen($screen);
                    }

                    add_meta_box(
                        'wpfl_box_id', // Unique ID
                        'Front label for stock info', // Box title
                        'wpfl_box_html', // Content callback, must be of type callable
                        $screen, //  screen
                        'normal',
                        'high'
                    );

                }

                function wpfl_admin_submenu()
                {
                    add_submenu_page('woocommerce',
                        'Front label for stock info with metaboxes',
                        'Front label for stock info (with metaboxes)',
                        'manage_options',
                        'wpfl-stock-info-label',
                        'wpfl_submenu'
                    );
                }

                function wpfl_submenu()
                {
                    ?>
                    <div class="wrap">
                    <h2>Front label for stock info</h2>
                    <?php
                    do_action('add_meta_boxes', "woocommerce_page_wpfl-stock-info-label");
                    do_meta_boxes("woocommerce_page_wpfl-stock-info-label",
                        "normal", null);
                    ?>
                </div>

                <?php
}

                function wpfl_box_html()
                {
                    wp_nonce_field(plugin_basename(__FILE__), 'Front label for stock info with using metaboxes');

                    ?>
   <?php if ($_GET['settings-updated'] == true): ?>
        <div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
        <p><strong><?php echo __('Settings saved'); ?></strong></p>
        <button type="button" class="notice-dismiss">
            <span class="screen-reader-text">
                <?php echo __('Dismiss this notice.'); ?>
            </span>
        </button></div>
    <?php endif;?>
    <form action="options.php" method="post"> 
    <div class="wpfl-container">
    <div class="label_num">
        <h3>Label 1</h3>
         <table class="form-table">
        <tbody>
            <tr>
                <th scope="row">
        <label for="fl_stock_info_count1">
            Count of products not less then:</label></th>
            <td><input type="number" name="label_stockinfo[count1]"
            class="regular-text" id="fl_stock_info_count1"></td></tr>
        <tr> <th scope="row">
            <label for="fl_stock_info_count2">
            Count of products not more then:</label></th>
            <td><input type="number" name="label_stockinfo[count2]"
            class="regular-text" id="fl_stock_info_count2"></td></tr>
        <tr><th scope="row"><label for="fl_stock_info_text">
            Text for stock info label:</label></th>
            <td><input type="text" name="label_stockinfo[text]"
            class="regular-text" id="fl_stock_info_text"></td></tr>
            </tbody>
    </table>
    </div>
    </div>
    <input type="button" name="btn_add_label" 
        class="button-add" value="Add stock info label" >
        <?php submit_button();?>
    </form>
    <?php
}

            }
        }

        // finally instantiate our plugin class and add it to the set of globals
        $GLOBALS['wc_stock_info_label_admin'] = new WC_Stock_Info_LabelAdmin();
    }
}
