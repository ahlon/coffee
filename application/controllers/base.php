<?php
require_once APPPATH.'libraries/service_proxy.php';
require_once APPPATH.'libraries/base_service.php';
/**
 * @author ahlon
 */
abstract class Base_Controller extends CI_Controller {
    // request的后缀
    var $url_suffix;
    
    // 页面要素
	var $layout;
	var $widgets;
	var $data;
	
	// 分页排序参数
	var $page_size = 10;
	var $page;
	var $orderby;
	
	// 用户session
	var $mct_user;
	
    public function __construct() {
        parent::__construct();
        $this->load->library('widget');
        $this->load->helper('utils_helper');
        
        $this->p = $this->input->get('p') ? $this->input->get('p') : 1;
        $this->order_by = $this->input->get('o') ? $this->input->get('o') : null;
        
        if ($this->input->get('mode') == 'debug') {
            $this->output->enable_profiler(TRUE);
        }
        
        $dotpos = strpos($this->uri->uri_string, '.');
        $this->url_suffix = $dotpos > 0 ? substr($this->uri->uri_string, $dotpos + 1) : '';
        
        $this->layout = 'layouts/simple_layout';
        $this->widgets['_assets'] = new Widget('head/common_head');
    }
    
    function render($_config = null) {
        if ($_config) {
            $config = $_config;
        } else {
            $config = array('content_type'=>$this->url_suffix, 'layout'=>$this->layout,
                    'widgets'=>$this->widgets, 'data'=>$this->data);
        }
        $this->load->library('page', $config);
        $this->page->render();
    }
    
//     public function __get($name) {
//         if (in_array($name, array('load', 'input', 'uri', 'benchmark', 'hooks', 'config', 'log', 'utf8', 'router', 'output', 'security', 'lang'))) {
//             return $this->$name = $this->ci->$name;
//         }
//         if ($name) {
//             echo 'sss';
//             $service = substr($name, 0, -8);
//             return $this->$name = new Service_proxy($service);
//             if (end_with($name, '_service') && is_file($service_file = APPPATH . 'services/' . $name . '.php')) {
//                 $service = substr($name, 0, -8);
//                 return $this->$name = new Service_proxy($service);
//             }
//             $class = get_class($this);
//             log_message('error', $name.' not found in service['.$class.'], pls check the code');
//         }
//     }
}