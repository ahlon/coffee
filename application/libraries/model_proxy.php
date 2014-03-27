<?php
/**
 * @author ahlon
 */
class Model_proxy {
    var $model;
    var $name;
    var $call_stacks;
    
    function __construct($model_name, $table = false) {
        $this->name = $model_name;
        if (is_file($model_file = APPPATH . 'models/' . $model_name . '.php')) {
            log_message('info', 'load model '.$model_name.', by lazy load');
            require_once ($model_file);
            if ($table) {
                return $this->model = new $model_name($table);
            } else {
                return $this->model = new $model_name();
            }
        }
        $this->call_stacks = array();
    }
    
    function __call($method, $args) {
        // $msg = $this->model->level.':'.$this->name.'->'.$method.json_encode($args);
        // log_message('debug', $msg);
        // $this->call_stacks[] = $msg;

        // $this->_before_model();
        
        if ($this->is_cache_configed($this->name, $method)) {
            $key = 'model:'.$this->name.':'.$method.':'.json_encode($args);
            // echo $key;
            $CI = &get_instance();
            $CI->load->driver('cache', array('adapter' => 'redis'));
            $r = $CI->cache->get($key);
            if (empty($r)) {
                // echo $key.'save to cache';
                $return = call_user_func_array(array($this->model, $method), $args);
                $CI->cache->save($key, json_encode($return), 300);
            } else {
                // echo $key.'load from cache';
                $return = json_decode($r, true);
            }
        } else {
            $return = call_user_func_array(array($this->model, $method), $args);
        }
        
        // $this->_after_model();
        return $return;
    }
    
    private function is_cache_configed($model, $method) {
        $CI = &get_instance();
        $CI->config->load('cache', TRUE);
        $models = $CI->config->item('model', 'cache');
        if (!empty($models[$model])) {
            return in_array($method, $models[$model]);
        } else {
            return false;
        }
    }
    
    function set_level($level) {
        $this->model->level = $level;
    }
    
    function _before_model() {
        // do something
    }
    
    function _after_model() {
        // do something
    }
}