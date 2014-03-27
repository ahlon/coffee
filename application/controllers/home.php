<?php
require_once dirname(__FILE__).'/base.php';
/**
 * @author ahlon
 */
class Home extends Base_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->layout = 'layouts/common_layout';
        $this->widgets['header'] = new Widget('header', $this->data);
        $this->widgets['footer'] = new Widget('footer', $this->data);
    }
    
    function login() {
        $this->widgets['content'] = new Widget('login', $this->data); 
        $this->render();
    }
    
    function auth() {
        $this->load->service('user_service');
        $post = $this->input->post();
        if ($post['email'] && $post['password']) {
            $params = array(
                'email'=>$post['email'],
                'password'=>md5($post['password'])
            );
            $user = $this->user_service->get_one($params);
            if (!empty($user)) {
                echo 'success';
            } else {
                echo 'fail';
            }
        }
    }
    
    function register() {
        $this->load->service('user_service');
        $post = $this->input->post();
        if (empty($post)) {
            $this->widgets['content'] = new Widget('register', $this->data);
            $this->render();
            return;
        } else {
            $user = array(
                'nickname'=>$post['nickname'],      
                'email'=>$post['email'],
                'password'=>md5($post['password'])      
            );
            $user = $this->user_service->save($user);
            print_r($user);
        }
    }
    
    function logout() {
    
    }
}