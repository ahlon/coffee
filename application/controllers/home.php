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
    
    /**
     * 登录页面
     */
    function login() {
        $this->widgets['content'] = new Widget('login', $this->data); 
        $this->render();
    }
    
    /**
     * 认证，授权
     */
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
    
    /**
     * 注册
     */
    function register() {
        $this->load->service('user_service');
        $post = $this->input->post();
        if (empty($post)) {
            // 提交注册
            $this->widgets['content'] = new Widget('register', $this->data);
            $this->render();
            return;
        } else {
            // 访问注册页面
            $user = array(
                'nickname'=>$post['nickname'],      
                'email'=>$post['email'],
                'password'=>md5($post['password'])      
            );
            $user = $this->user_service->save($user);
            print_r($user);
        }
    }
    
    /**
     * 退出
     */
    function logout() {
    
    }
}