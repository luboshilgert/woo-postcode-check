<?php

namespace Inc\Pages;

use Inc\Base\BaseController;
use Inc\Base\Database;

class Client extends BaseController {

    public function __construct() {
        parent::__construct();
        if (isset($_POST['lh_postcode'])) {
            $this->checkPostcode();
        }
    }

    public function register() {
        add_shortcode('lh_postcode', array($this, 'lh_postcode_delivery_check_shortcode'));
        add_action('wp_ajax_postcode_check', array($this, 'checkPostcode'));
        add_action('wp_ajax_nopriv_postcode_check', array($this, 'checkPostcode'));
    }

    public function lh_postcode_delivery_check_shortcode() {
        ob_start();
        require_once $this->plugin_path . 'templates/client.php';
        $output = ob_get_clean();
        return $output;
    }

    private function checkPostcode() {
        $code = filter_input(INPUT_POST, 'lh_postcode', FILTER_SANITIZE_STRING);
        $database = new Database();
        $ids = $database->checkPostcode($code);
        if (!$this->checkInputFormat($code)) {
            print 'format';
        } else {
            if (count($ids) > 0) {
                print 'ok';
            } else {
                print 'err';
            }
        }
        die();
    }

    private function checkInputFormat($input) {
        if (!is_numeric($input)) {
            return false;
        }
        if (strlen($input) != 5) {
            return false;
        }
        return true;
    }

}
