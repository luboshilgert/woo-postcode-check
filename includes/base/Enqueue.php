<?php

namespace Inc\Base;
use \Inc\Base\BaseController;

/**
 * Description of Enqueue
 *
 * @author Lubos Hilgert <luboshilgert@gmail.com>
 */
class Enqueue extends BaseController {

    public function register() {  
        add_action('wp_enqueue_scripts', array($this, 'enqueue'));
    }

    public function enqueue() {
        wp_register_script( 'lh-postcode-script', $this->plugin_url.'assets/lh-postcode-scripts.js', array('jquery'));
        wp_localize_script( 'lh-postcode-script', 'check_postcode_ajax', array( 'ajax_url' => admin_url('admin-ajax.php')) );
        wp_enqueue_style('lh-postcode-styles', $this->plugin_url.'assets/lh-postcode-styles.css');
        wp_enqueue_script('lh-postcode-script');
    }

}
