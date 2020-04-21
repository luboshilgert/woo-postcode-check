<?php

namespace Inc\Pages;

use Inc\Base\BaseController;
use Inc\Base\Database;

class Client extends BaseController {
    private $database;

    public function __construct() {
        parent::__construct();
        $this->database = new Database();
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
        $locations = $this->database->getPostcodes();
        $delivery = $this->checkDelivery($code, $locations);
        if($delivery > 0){
            $price = $this->getDeliveryCosts($delivery);
        }
        if (!$this->checkInputFormat($code)) {
            print 'format';
        } else {
            if ($delivery) {
                print $price;
            } else {
                print 'err';
            }
        }
        die();
    }
    
    private function getDeliveryCosts($zone_id){
        $method_id = $this->database->getMethodId($zone_id);
        $option = get_option('woocommerce_flat_rate_'.$method_id.'_settings');
        $price =  floatval(str_replace(',', ".", $option['cost']));
        $delivery_tax = ($this->database->getDeliveryTaxRate()+100)/100;
        $costs = isset($option['cost'])?round($price*$delivery_tax):0; // TODO delivery DPH
        return $costs;
    }

    private function checkDelivery($code, $locations) {
        foreach ($locations as $location) {
            if ($code == $location->location_code) {
                return $location->zone_id;
            }
            if (strpos($location->location_code, '...') !== false) {
                if($this->rangeCheck($code, $location->location_code)){
                    return $location->zone_id;
                }
            }
        }
        return false;
    }
        
        private function rangeCheck($code, $location){
            $locations = explode("...", $location);
            if ($code >= $locations[0] && $code <= $locations[1]){
                return true;
            }
            return false;
        }


        function checkInputFormat($input) {
            if (!is_numeric($input)) {
                return false;
            }
            if (strlen($input) != 5) {
                return false;
            }
            return true;
        }

    }
    