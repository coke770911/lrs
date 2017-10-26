<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //載入M_Registration
        if($this->session->us_logid == null || $this->session->us_logid != "STAFF") {
            die("<script>alert('權限不足！');window.history.go(-1)</script>");
        }       
        $this->load->model("M_Registration");
        $this->load->model("M_UserData");
    }


    public function index()
    {
        $data["list"] =  $this->M_Registration->getList();
        $this->load->view('V_header_manage');
        $this->load->view('V_list_manage',$data);
        $this->load->view('V_footer');
    }

    public function addView() {
        $this->load->view('V_header_manage');
        $this->load->view('V_addRegistration',$data);
        $this->load->view('V_footer');
    }


    public function detailed($id) {
        $a = $this->M_Registration->getData($id);
        print_r($a);
        $this->load->view('V_header_manage');
        //$this->load->view('V_registrationDetailed');
        $this->load->view('V_footer');

    }

    public function historyList() {
       
    }

   

}
