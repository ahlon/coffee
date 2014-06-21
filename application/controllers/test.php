<?php
require_once dirname(__FILE__).'/base.php';
/**
 * @author ahlon
 */
class Test extends Base_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    function test1() {
        $a=09;
        $b=01;
        $c=$a+$b;
        echo $a.PHP_EOL;
        echo $b.PHP_EOL;
        echo $c.PHP_EOL;
    }

    function cookie() {
        $cookie = json_encode($_COOKIE);
        log_message('error', $cookie);
        echo $cookie;
    }

    function signin_check() {
        $headers = array(); 
        foreach ($_SERVER as $key => $value) { 
            if ('HTTP_' == substr($key, 0, 5)) { 
                $headers[str_replace('_', '-', substr($key, 5))] = $value; 
            } 
        }

        if (isset($_SERVER['PHP_AUTH_DIGEST'])) { 
            $headers['AUTHORIZATION'] = $_SERVER['PHP_AUTH_DIGEST']; 
        } elseif (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) { 
            $headers['AUTHORIZATION'] = base64_encode($_SERVER['PHP_AUTH_USER'] . ':' . $_SERVER['PHP_AUTH_PW']); 
        } 
        if (isset($_SERVER['CONTENT_LENGTH'])) { 
            $headers['CONTENT-LENGTH'] = $_SERVER['CONTENT_LENGTH']; 
        } 
        if (isset($_SERVER['CONTENT_TYPE'])) { 
            $headers['CONTENT-TYPE'] = $_SERVER['CONTENT_TYPE']; 
        }

        $headers['post'] = $_POST;

        echo json_encode($headers);
    }
}