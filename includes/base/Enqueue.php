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
        wp_register_script( 'lh-script', $this->plugin_url.'assets/lh-scripts.js', array('jquery'));
        wp_localize_script( 'lh-script', 'check_postcode_ajax', array( 'ajax_url' => admin_url('admin-ajax.php')) );
        wp_enqueue_style('mystyles', $this->plugin_url.'assets/lh-styles.css');
        wp_enqueue_script('lh-script');
        //wp_enqueue_script('myscripts', $this->plugin_url.'assets/lh-scripts.js', array('jquery'));
    }

}
