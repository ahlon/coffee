<?php
require_once dirname(__FILE__).'/common.php';
/**
 * @author ahlon
 */
class User extends Common {
    
    public function __construct() {
        parent::__construct();
        $this->layout = 'layouts/common_layout';
        $this->widgets['header'] = new Widget('header', $this->data);
        $this->widgets['footer'] = new Widget('footer', $this->data);
    }
    

//     public function index() {
//         $this->load->service('user_service');
//         $users = $this->user_service->get_all();
//         $this->widgets['content'] = new Widget('list', array('list'=>$users));
//         $this->render();
//     }
}