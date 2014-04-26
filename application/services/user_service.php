<?php
/**
 * @author ahlon
 */
class User_service extends Common_service {
    
    function __construct() {
        parent::__construct($this->user_model);
    }
    
    function register_by_email($email, $password) {

    }

    function register_by_mobile($mobile, $password) {

    }
}