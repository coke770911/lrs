<?php

class M_UserApply extends CI_Model {

    private $ap_id = 0;
    private $ap_rg_id = "";
    private $ap_le_name = "";
    private $ap_rg_money = "";
    private $ap_us_id = "";
    private $ap_us_no = "";
    private $ap_us_sex = "";
    private $ap_us_dept = "";
    private $ap_us_grade = "";
    private $ap_us_class = "";
    private $ap_us_phone = "";
    private $ap_us_email = "";
    private $ap_us_memo = "";
    private $ap_is_regi = "";
    private $ap_is_del = "";
    private $ap_score = 0;


    public function __construct() {
        parent::__construct();
    }

    private function setValue($data) {
        foreach($data as $key => $val) {
            $this->$key = $val;
        }
    }

    public function getData() {
       
    }

}