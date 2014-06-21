<?php
require_once dirname(__FILE__) . '/base_model.php';
/**
 * @author ahlon
 */
class zone_model extends Common_Model {
    
    public function __construct() {
        parent::__construct('zone');
    }

    public function find_parent($id) {
    	return $this->db->from($this->table_name)->where($params);
        if (!empty($orderby)) {
            $this->db->order_by($orderby);
        }
        $this->db->get()->row_array();
    }
    
}