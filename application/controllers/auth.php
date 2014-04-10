<?php
require_once dirname(__FILE__) . '/base.php';
/**
 * 认证授权
 * @author ahlon
 */
class Auth_Controller extends Base_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->input->is_cli_request()) {
            $rights = $this->check_rights();
            if (!$rights) {
                header('Location:/errors/show403');
                exit();
            }
        }
    }
    
    
    function check_rights($real_rights = false) {
        return true;
    }
}

class Auth extends Base_Controller {
    
    public function __construct() {
        parent::__construct();
    }

}