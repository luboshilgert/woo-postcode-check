<?php

namespace Inc\Pages;

use Inc\Base\BaseController;

class Admin extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function register() {
        add_action('admin_init', array($this, 'lh_register_settings'));
        add_action('admin_menu', array($this, 'add_admin_menu'));      
    }

    public function lh_register_settings() {
        register_setting( 'lh_postcode_options_group', 'lh_postcode_options');
    }

    public function add_admin_menu() {
        if (apply_filters('manage_options', true)) {
            if (current_user_can('manage_woocommerce')) {
                add_submenu_page('woocommerce', __('LH Postcode Check', 'lh_postcode_check'), __('LH Postcode Check', 'lh_postcode_check'), 'manage_options', 'lh_postcode_check', array($this, 'render_admin_page'));
            }
        }
    }

    public function render_admin_page() {
        require_once $this->plugin_path . 'templates/admin.php';
    }

}
