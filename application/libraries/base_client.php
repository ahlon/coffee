<?php
class Base_client {
    function __construct() {
        if (!defined('FM_DOMAIN')) {
            define('FM_DOMAIN', 'http://test.freemerce.com');
        }
    }
    
    function get_data_from_api($api_url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data, true);
    }
}
?>