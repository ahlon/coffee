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
}