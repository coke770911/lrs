<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Tools {
    #管理陣列
    function __construct() {
        
    }

    public function getAdminArr() {
        $adminArr = array("fz083");
        return $adminArr;

    }

    public function date_f($str,$f = "Y/m/d H:i") {
        return date_format(date_create($str),"Y/m/d H:i");
    }

    function __destruct() {

    }
}