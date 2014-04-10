<?php
require_once dirname(__FILE__).'/../auth.php';
/**
 * @author ahlon
 */
abstract class Admin_Controller extends Auth_Controller {
    var $get = null;
    public function __construct() {
        parent::__construct();
        //1. session验证
        // $this->check_admin_session();
        
        $get = $this->input->get();
        $this->get = $get ? $get : array();
        
        $this->layout = 'layouts/common_layout';
        $this->widgets['header'] = array(
    	    // new Widget('header/admin_header')
    		// new Widget('admin/admin_nav2', $this->data)
		); // Widget::get_instance('admin/admin_nav', $this->data),
        $this->widgets['footer'] = new Widget('admin_footer', $this->data); // Widget::get_instance('footer', $this->data)
    }
    
    // 获取get信息
    function _get_info(){
        $get = $this->input->get();
        if(!empty($get)){
            foreach ($get as $k=>$v){
                if(!$v){
                    unset($get[$k]);
                }
            }
            return $get;
        }else{
            return $get = array();
        }
    }
}