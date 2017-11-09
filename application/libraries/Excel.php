<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
require_once APPATH."/PHPExcel/PHPExcel.php";

class Excel Extends PHPExcel {
    Public function __construct() {
		parent::__construct();
    }
}