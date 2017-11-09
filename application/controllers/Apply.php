<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apply extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //載入M_Registration
        $this->load->model("M_Registration");
        $this->load->model("M_UserApply");
    }

    public function applyData($id) {
        if($this->session->login == NULL) {
            die("<script>alert('請先登入之後再進行報名動作！');window.history.go(-1)</script>");
        }

        $data["rg"] = $this->M_Registration->getData($id);
        $data["item"] = $this->M_Registration->getItem($id);

        $this->load->view('V_header');
        $this->load->view('V_apply',$data);
        $this->load->view('V_footer');
    }

    public function PrintPay($id) {
        $data["apply_data"] = $this->M_UserApply->getEditData($id,$this->session->us_no);
        #陣列金錢填入
        $numStr = $data["apply_data"]["ap_rg_money"];
        $numArr = array_reverse(preg_split('//', $numStr, -1, PREG_SPLIT_NO_EMPTY));
        $numArr[] = "$";
        for($i = count($numArr); $i <= 10; $i++) {
            $numArr[$i] = "";
        }
        $data["numArr"] = $numArr;
        $data["rg"] = $this->M_Registration->getData($id);
        $this->load->view('V_depositSlip',$data);

    }

    public function editProcess() {
        if($this->session->login == NULL || $this->session->login == '') {
            die(json_encode(array('code' => 0,'msg' => '請先登入之後再進行報名動作！!')));
        }

        if(trim($this->input->post("rg_id")) == "") {
            die(json_encode(array('code' => 0,'msg' => '此考試項目不存在，請洽詢系統管理者!')));
        }

        if(trim($this->input->post("rg_item")) == "") {
            die(json_encode(array('code' => 0,'msg' => '請選擇考試項目!')));
        }

        if(trim($this->input->post("e_name")) == "") {
            die(json_encode(array('code' => 0,'msg' => '請輸入英文姓名!')));
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

        $this->M_UserApply->getEditData(trim($this->input->post("rg_id")),$this->session->us_no);

       
        $data = array(
                    "ap_rg_id" => trim($this->input->post("rg_id")),
                    "ap_le_name" => trim($this->input->post("rg_item")),
                    "ap_us_ename" => trim($this->input->post("e_name")),
                    "ap_us_cdept" => trim($this->input->post("c_dept")),
                    "ap_us_phone" => trim($this->input->post("phone")),
                    "ap_us_email" => trim($this->input->post("email")),
                    "ap_us_memo" => trim($this->input->post("memo"))
                );
        $this->M_UserApply->setValue($data);
        $re = $this->M_UserApply->update();
        if($re > 0) {
            die(json_encode(array('code' => 1,'msg' => '修改成功!')));
        } else {
            die(json_encode(array('code' => 0,'msg' => '修改失敗，請洽尋承辦單位!')));
        }         
    }

    public function detailed($id) {
        $data["rg"] = $this->M_Registration->getData($id);
        $data["item"] = $this->M_Registration->getItem($id);
        $data["userdata"] = $this->M_UserApply->getEditData($id,$this->session->us_no);
        $this->load->view('V_header');
        $this->load->view('V_detailed',$data);
        $this->load->view('V_footer');
    }

    public function cancel() {
        $this->M_UserApply->getData($this->input->post('id'));
        $data = array("ap_is_del" => 1);
        $this->M_UserApply->setValue($data);
        $re = $this->M_UserApply->update();

        if($re > 0) {
            die(json_encode(array('code' => 1,'msg' => '取消報名成功!')));
        } else {
            die(json_encode(array('code' => 0,'msg' => '取消報名失敗，請洽承辦人協助取消!')));
        }

    }

    public function historyList() {
        if($this->session->login == NULL || $this->session->login == '') {
            die("<script>alert('請先登入之後再進行報名動作！');window.history.go(-1)</script>");
        }

        $data["list"] = $this->M_UserApply->getUserApplyList($this->session->us_no);
        $this->load->view('V_header');
        $this->load->view('V_historyList',$data);
        $this->load->view('V_footer');
    }

    public function addProcess() {
        if($this->session->login == NULL || $this->session->login == '') {
            die(json_encode(array('code' => 0,'msg' => '請先登入之後再進行報名動作！!')));
        }
        
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

        $RegiData = $this->M_Registration->getDataIsExpired(trim($this->input->post("rg_id")));

        if(count($RegiData) <= 0) {
            die(json_encode(array('code' => 0,'msg' => '報名時間已過!')));
        }

        $applyData = $this->M_UserApply->getApplyNum(trim($this->input->post("rg_id")));

        if( $applyData["countNum"] > $RegiData["rg_number"]) {
            die(json_encode(array('code' => 0,'msg' => '報名人數已滿!')));
        }
       
        $data = array(
                    "ap_rg_id" => $RegiData["rg_id"],
                    "ap_rg_name" => $RegiData["rg_name"],
                    "ap_le_name" => trim($this->input->post("rg_item")),
                    "ap_rg_money" => $RegiData["rg_money"],
                    "ap_us_name" => trim($this->input->post("c_name")),
                    "ap_us_ename" => trim($this->input->post("e_name")),
                    "ap_us_id" => trim($this->input->post("id")),
                    "ap_us_no" => trim($this->input->post("no")),
                    "ap_us_sex" => trim($this->input->post("sex")),
                    "ap_us_cdept" => trim($this->input->post("c_dept")),
                    "ap_us_phone" => trim($this->input->post("phone")),
                    "ap_us_email" => trim($this->input->post("email")),
                    "ap_is_regi" => trim($this->input->post("is_regi")),
                    "ap_us_memo" => trim($this->input->post("memo"))
                );
        $this->M_UserApply->setValue($data);

        if($this->M_UserApply->checkApply() > 0) {
            die(json_encode(array('code' => 0,'msg' => '您已報名、請勿重複報名!')));
        }

        $re = $this->M_UserApply->update();
        if($re > 0) {
            die(json_encode(array('code' => 1,'msg' => '報名成功!')));
        } else {
            die(json_encode(array('code' => 0,'msg' => '報名失敗，請洽尋承辦單位!')));
        }         
    }
}