<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //載入M_Registration
        if($this->session->us_logid == null || $this->session->us_logid != "STAFF") {
            die("<script>alert('權限不足！');location.replace('/lrs')</script>");
        }     

        $this->load->model("M_Registration");
        $this->load->model("M_LicenseItem");
        $this->load->model("M_UserData");
    }


    public function index()
    {
        $data["list"] =  $this->M_Registration->getList();
        $this->load->view('V_header_manage');
        $this->load->view('V_list_manage',$data);
        $this->load->view('V_footer');
    }

    public function addThemeProcess() {
        if($this->session->login == NULL || $this->session->login == '') {
            die(json_encode(array('code' => 0,'msg' => '請先登入之後再進行報名動作！!')));
        }

        if(trim($this->input->post("rg_name")) == "") {
            die(json_encode(array('code' => 0,'msg' => '請輸入考試名稱!')));
        }

        if($this->input->post('item') == "" ||  count($this->input->post('item')) === 0) {
            die(json_encode(array('code' => 0,'msg' => '請選擇考試項目!')));
        }
    
        if(trim($this->input->post("rg_number")) == "") {
            die(json_encode(array('code' => 0,'msg' => '請輸入考試限制人數!')));
        }

        if(trim($this->input->post("rg_money")) == "") {
            die(json_encode(array('code' => 0,'msg' => '請輸入考試費用!')));
        }

        if(trim($this->input->post("rg_startDate")) == "") {
            die(json_encode(array('code' => 0,'msg' => '請輸入考試起始時間!')));
        }

        if(trim($this->input->post("rg_endDate")) == "") {
            die(json_encode(array('code' => 0,'msg' => '請輸入考試結束時間!')));
        }

        if(trim($this->input->post("rg_applyEndDate")) == "") {
            die(json_encode(array('code' => 0,'msg' => '請輸入報名截止時間!')));
        }

        if(trim($this->input->post("rg_memo")) == "") {
            die(json_encode(array('code' => 0,'msg' => '請輸入備註!')));
        }


        $data = array(
            'rg_name' => trim($this->input->post("rg_name")), 
            'rg_startDate' => $this->input->post("rg_startDate"), 
            'rg_endDate' => $this->input->post("rg_endDate"), 
            'rg_memo' => trim($this->input->post("rg_memo")), 
            'rg_applyEndDate' => $this->input->post("rg_applyEndDate"),
            'rg_money' => $this->input->post("rg_money"), 
            'rg_creator' => $this->session->us_no, 
            'rg_number' => $this->input->post("rg_number"), 
            'rg_is_regi' => $this->input->post("rg_is_regi")
        );

        $this->M_Registration->setValue($data);
        $theme_id = $this->M_Registration->update();
        foreach($this->input->post('item') AS $val) {
            $this->M_Registration->update_item($theme_id,$val);
        }

        die(json_encode(array('code' => 1,'msg' => '新增成功!')));
    }

    public function addTheme() {
        $this->load->view('V_header_manage');
        $this->load->view('V_addTheme');
        $this->load->view('V_footer');
    }

    //輸出選項
    public function selItem($id) {
        $item = $this->M_LicenseItem->getList($id);
            echo '<option value="0">--請選擇證照--</option>';
        foreach($item AS $val) {
            echo '<option value="'.$val['le_id'].'">'.$val['le_name'].'</option>';
        }
        
    }

    public function detailed($id) {
       

    }


    public function addItemProcess() { 
        if($this->input->post('lg_item') == "") {
            die(json_encode(array('code' => 0,'msg' => '請選擇證照分類！')));
        }              

        if($this->input->post('le_name') == "") {
            die(json_encode(array('code' => 0,'msg' => '請輸入證照名稱！！')));
        }

        
        $data = array(
            "le_name" => $this->input->post('le_name'),
            "le_group" => $this->input->post('lg_item')
        );
        $this->M_LicenseItem->setValue($data);  

        if($this->M_LicenseItem->update() > 0) {
            die(json_encode(array('code' => 1,'msg' => '新增成功！')));
        } else {
            die(json_encode(array('code' => 0,'msg' => '新增失敗！！')));
        }
   
    }


    public function addItem() {
        //$this->M_LicenseItem->getItem();
        $this->load->view('V_header_manage');
        $this->load->view('V_addItem');
        $this->load->view('V_footer');
    }


}
