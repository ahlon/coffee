<?php
require_once dirname(__FILE__).'/base.php';
/**
 * @author ahlon
 */
class Job extends Base_Controller {
    
    function xmpp_server() {
        require_once JAXL_CWD.'/http/http_server.php';
        $http = new HTTPServer();
        $http->start('on_request');
    }
    
    function client() {
    }
    
}

function on_request($request) {
    if($request->method == 'GET') {
        $body = json_encode($request);
        $request->ok($body, array('Content-Type'=>'application:json'));
    }
    else {
        $request->not_found();
    }
}