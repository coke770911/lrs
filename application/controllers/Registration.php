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
        $this->load->view('V_header');
        $this->load->view('V_registrationList',$data);
        $this->load->view('V_footer');
    }

    public function apply($id) {
        if($this->session->login == NULL) {
            die("<script>alert('請先登入之後再進行報名動作！');window.history.go(-1)</script>");
        }

        $data["rg"] = $this->M_Registration->getData($id);
        $data["item"] = $this->M_Registration->getItem($id);

        $this->load->view('V_header');
        $this->load->view('V_apply',$data);
        $this->load->view('V_footer');
    }

    public function historyList() {
        $this->load->view('V_header');
        $this->load->view('V_historyList');
        $this->load->view('V_footer');
    }


}
