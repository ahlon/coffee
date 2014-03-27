<?php
require_once dirname(__FILE__) . '/base.php';
/**
 * @author ahlon
 */
class Common extends Base_Controller {
    
    protected $obj_type;
    
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        
        $this->obj_type = $this->uri->segments[1];
        $this->data['obj_type'] = $this->obj_type;
        
        $this->load->service('object_service');
        $object = $this->object_service->get_one(array('name'=>$this->obj_type));
        if (empty($object)) {
            // go to 404 page
            redirect('/');
            return false;            
        }
        $this->load->service($this->obj_type . '_service', $this->obj_type, 'service');
    }
    
    // {object} | {object}/list
    function index() {
        $params = array();
        $this->data['list'] = $this->service->search($params, 'id desc', 10, $this->p);
        $this->data['count'] = $this->service->count($params);
        $this->data['pager'] = array('page'=>$this->p, 'total_page'=>ceil($this->data['count']/$this->page_size));
     
        $this->widgets['content'][] = new Widget('common/pager', $this->data);
        $this->widgets['content'][] = new Widget('common/list', $this->data);
        $this->render();
    }
    
    // {object}/view
    function view($id) {
        $this->data['object'] = $this->service->get($id);
        $view = $this->obj_type.'/view';
        if (file_exists(APPPATH.'views/'.$this->obj_type.'.php')) {
            $this->widgets['content'][] = new Widget($view, $this->data);
        } else {
            $this->widgets['content'][] = new Widget('common/view', $this->data);
        }
        $this->render();
    }
    
    // {object}/new
    function add() {
        $this->data['columns'] = object2array($this->service->columns());
        $this->widgets['content'][] = new Widget('common/new', $this->data);
        $this->render();
    }
    
    // {object}/save
    function save() {
        // post $object
        $object = $this->input->post('obj');
        $this->service->save($object);
        $this->load->helper('url');
        redirect('/'.$this->obj_type);
    }
    
    // {object}/{id}/edit
    function edit($id) {
        $this->data['object'] = $this->service->get($id);
        $this->data['columns'] = object2array($this->service->columns());
        $this->widgets['content'][] = new Widget('common/edit', $this->data);
        $this->render();
    }
    
    // {object}/update
    function update() {
        // post $object
        $object = $this->input->post('obj');
        if (!empty($object['id'])) {
            $this->service->update(intval($object['id']), $object);
        }
        redirect('/'.$this->obj_type);
    }
    
    // {object}/{id}/delete
    function delete($id) {
        $this->service->remove($id);
        redirect($this->obj_type);
    }
    

}