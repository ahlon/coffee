<?php
require_once dirname(__FILE__) . '/admin.php';
/**
 * @author ahlon
 */
class User extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->service('user_service');
        $this->data['obj_type'] = 'user';
    }

    function index() {
        $params = array();
        
        $users = $this->user_service->get_all();
        $this->data['list'] = $users;
        
        $count = $this->user_service->count();
        $this->data['count'] = $count;
        
        $this->data['pager'] = array('page'=>$this->p, 'total_page'=>ceil($this->data['count']/$this->page_size));
        // $this->widgets['content'][] = new Widget('trace/search_form', $this->data);
        $this->widgets['content'][] = new Widget('common/pager', $this->data);
        $this->widgets['content'][] = new Widget('common/list', $this->data);
        $this->render();
    }
}