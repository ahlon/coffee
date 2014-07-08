<?php
/**
 * @author ahlon
 */
class Zone_service extends Base_service {
    
    function __construct() {
        parent::__construct($this->zone_model);
    }
    
    function get_roots() {
    	$params = array('parent_id' => 0);
    	return $this->zone_model->find_all($params);
    }

    function get_children($id) {
		$params = array('parent_id' => $id);
    	return $this->zone_model->find_all($params);
    }

    function get_parent($id) {
		$params = array('parent_id' => $id);
    	return $this->zone_model->find_one($params);
    }

    function get_ancestors($id) {

    }

    function get_descendant($id) {

    }

}
