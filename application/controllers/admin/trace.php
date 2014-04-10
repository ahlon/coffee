<?php
require_once dirname(__FILE__) . '/admin.php';
require_once APPPATH. 'libraries/mute.php';
/**
 * @author ahlon
 */
class Trace extends Admin_Controller implements Mute {
    
    function __construct() {
        parent::__construct();
        $this->load->service('trace_service');
    }
    
    function index() {
        $get = $this->input->get();
        $this->data = $get;
        $this->data['obj_type'] = 'trace';
        $conditions = array();
        if (!empty($get['id'])) {
            $conditions['id'] = $get['id'];
        }
        if (!empty($get['uid'])) {
            $conditions['uid'] = $get['uid'];
        }
        if (!empty($get['ccid'])) {
            $conditions['ccid'] = $get['ccid'];
        }
        if (!empty($get['url'])) {
            $conditions['url like '] = $get['url'];
        }
        if (!empty($get['referer'])) {
            $conditions['referer like '] = $get['referer'];
        }
        if (!empty($get['controller'])) {
            $conditions['controller'] = $get['controller'];
        }
        if (!empty($get['session_id'])) {
            $conditions['session_id'] = $get['session_id'];
        }
        if (empty($this->data['time'])) {
            $this->data['time'] = date('Y-m-d');
        } else {
            unset($conditions['time']);
        }

        $this->data['list'] = $this->trace_service->get_trace_data($conditions, $this->data['time'], $this->page_size, $this->p);
        $this->data['count'] = $this->trace_service->get_trace_data_count($conditions, $this->data['time']);
        $this->data['pager'] = array('page'=>$this->p, 'total_page'=>ceil($this->data['count']/$this->page_size));
        // $this->widgets['content'][] = new Widget('trace/search_form', $this->data);
        $this->widgets['content'][] = new Widget('common/pager', $this->data);
        $this->widgets['content'][] = new Widget('common/list', $this->data);
        $this->render();
    }

    function get_detail() {
        $get = $this->input->get();
        if (!empty($get['id']) && !empty($get['time'])) {
            $conditions = array();
            $conditions['id'] = $get['id'];
            $table_time = $get['time'];
            print_r(json_encode($this->trace_service->get_one_trace_data($conditions,$table_time)));
        }
    }
}
