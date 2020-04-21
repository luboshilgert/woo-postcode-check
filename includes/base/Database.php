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
    
    public function getPostcodes(){
        $sql = "SELECT * FROM ".$this->prefix."woocommerce_shipping_zone_locations";
        return $this->db->get_results($sql);
    }
    
    public function getMethodId($zone_id){
        $sql = $this->db->prepare("SELECT instance_id FROM ".$this->prefix."woocommerce_shipping_zone_methods WHERE zone_id = %d AND method_id=%s", $zone_id, 'flat_rate');
        return $this->db->get_var($sql);
    }
    
    public function getDeliveryTaxRate(){
        $sql = $this->db->prepare("SELECT tax_rate FROM ".$this->prefix."woocommerce_tax_rates WHERE tax_rate_shipping = 1 LIMIT 1");
        return $this->db->get_var($sql);
    }
   

}
