<?php


namespace Inc\Base;

require_once(ABSPATH.'wp-admin/includes/upgrade.php');

class Database {
    private $db;
    private $prefix;
    public function __construct() {
        global $wpdb;
        $this->db = $wpdb;
        $this->prefix = $this->db->prefix;
    }
    
    public function checkPostcode($code){
        $sql = "SELECT location_id FROM ".$this->prefix."woocommerce_shipping_zone_locations WHERE location_code = ".$code;
        return $this->db->get_results($sql);
    }
   

}
