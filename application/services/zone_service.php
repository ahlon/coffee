<?php
/**
 * @author ahlon
 */
class Zone_service extends Common_service {
    
    function __construct() {
        parent::__construct($this->user_model);
    }
    
    function get_roots() {
    	$params = array('parent_id' => 1);
    	return $this->zone_model->find_all($params);
    }

    function get_children($id) {
		$params = array('parent_id' => $id);
    	return $this->zone_model->find_all($params);
    }

    function get_parent($id) {
		$params = array('parent_id' => $id);
    	return $this->zone_model->find_all($params);
    }

}
