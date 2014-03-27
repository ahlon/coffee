<?php
/**
 * @author ahlon
 */
class User_service extends Common_service {
    
    function __construct() {
        parent::__construct($this->user_model);
    }
        
}