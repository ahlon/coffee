<?php
require_once dirname(__FILE__) . '/base_model.php';
/**
 * @author ahlon
 */
class User_model extends Common_Model {
    
    public function __construct() {
        parent::__construct('user');
    }
    
}