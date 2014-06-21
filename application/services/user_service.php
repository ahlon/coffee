<?php
/**
 * @author ahlon
 */
class User_service extends Base_service {
    
    function __construct() {
        parent::__construct($this->user_model);
    }

    /**
     * user register
     * @return [type] [description]
     */
    function register($user) {

    }

    /**
     * check if user registerd
     * @param  [type]  $loginname [description]
     * @return boolean            [description]
     */
    function is_registered($loginname) {

    }

    /**
     * activate user
     * @param  [type] $uid [description]
     * @return [type]      [description]
     */
    function activate($uid) {

    }

    /**
     * user authentication
     * @param  [type] $loginname [description]
     * @param  [type] $password  [description]
     * @return [type]            [description]
     */
    function auth($loginname, $password) {

    }

    function change_pwd() {

    }

    function update($user) {

    }

    function search($params) {

    }

    function count($params) {

    }

    function disable($uid) {

    }

    function enable($uid) {

    }


}