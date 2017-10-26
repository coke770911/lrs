<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //載入M_Registration
        $this->load->model("M_Registration");
        $this->load->model("M_UserData");
    }

    public function index()
    {
        $data["list"] =  $this->M_Registration->getList();
        if($this->session->us_logid == null || $this->session->us_logid != "STAFF") {
            $this->load->view('V_header');
            $this->load->view('V_registrationList',$data);
        } else {
            $this->load->view('V_header_manage');
        }
        $this->load->view('V_footer');
    }

    public function historyList() {
        $this->load->view('V_header');
        $this->load->view('V_historyList');
        $this->load->view('V_footer');
    }
}
