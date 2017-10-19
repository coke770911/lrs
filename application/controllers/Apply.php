<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apply extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //載入M_Registration
        $this->load->model("M_Registration");
    }

    public function index() {
        
        if(trim($this->input->post("rg_id")) == "") {
            die(json_encode(array('code' => 0,'msg' => '此考試項目不存在，請洽詢系統管理者!')));
        }

        if(trim($this->input->post("rg_item")) == "") {
            die(json_encode(array('code' => 0,'msg' => '請選擇考試項目!')));
        }

        if(trim($this->input->post("no")) == "") {
            die(json_encode(array('code' => 0,'msg' => '請輸入學號!')));
        }

        if(trim($this->input->post("c_name")) == "") {
            die(json_encode(array('code' => 0,'msg' => '請輸入姓名!')));
        }

        if(trim($this->input->post("e_name")) == "") {
            die(json_encode(array('code' => 0,'msg' => '請輸入英文姓名!')));
        }

        if(trim($this->input->post("sex")) == "") {
            die(json_encode(array('code' => 0,'msg' => '請選擇性別!')));
        }

        if(trim($this->input->post("id")) == "") {
            die(json_encode(array('code' => 0,'msg' => '請輸入身分證字號!')));
        }

        if(trim($this->input->post("c_dept")) == "") {
            die(json_encode(array('code' => 0,'msg' => '請輸入系年班!')));
        }

        if(trim($this->input->post("phone")) == "") {
            die(json_encode(array('code' => 0,'msg' => '請輸入連絡電話!')));
        }

        if(trim($this->input->post("email")) == "") {
            die(json_encode(array('code' => 0,'msg' => '請輸入電子郵件!')));
        }

    }

}