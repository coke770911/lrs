<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    //初始化資料庫得來的資料寫進系統資料庫
    public function login() {
        $this->load->model("M_UserData");

        $username = strtolower($this->input->post('username'));
        $password = $this->input->post('password');

        if($username == "") {
            $re = json_encode(array(
            'code' => 0,
            'msg' => '請輸入學號！'
            ));
            die($re);
        }

        if($password == "") {
            $re = json_encode(array(
            'code' => 0,
            'msg' => '請輸入密碼！'
            ));
            die($re);
        }

        $account = "";
        $acc_temp = explode("/",$username);
        if(count($acc_temp) === 1) {
            $account = $username;
            $this->session->admin = 0;
            if(in_array($account, $this->tools->getAdminArr())) { 
                $this->session->manage = 1;
            }
        } else {
            $username = $acc_temp[0];
            $account = $acc_temp[1];
            if(!in_array($account, $this->tools->getAdminArr())) {
                $this->session->sess_destroy();
                die(json_encode(array('code' => 0,'msg' => '請勿使用不合法方式登入系統！！')));
            }
            $this->session->admin = 1;
        }

        $client = new SoapClient("https://info.aeust.edu.tw/authad/auth.asmx?WSDL");
        try
        {
            $result = $client->GetOITAuthenticationConnect(array("Account" => $account,"Password" => $password));
            if($result->GetOITAuthenticationConnectResult == "True 登入成功") {
                $UserData = $this->M_UserData->getUserData($username);
                if($UserData == "") {
                    die(json_encode(array('code' => 0,'msg' => '找不到您的資料！')));
                }
                $this->session->set_userdata($UserData);
                $this->session->login = '1';
                die(json_encode(array('code' => 1,'msg' => '登入成功!')));
            } else {
                die(json_encode(array('code' => 0,'msg' => '帳號或密碼輸入錯誤！')));
            }
            
        }
        catch(SoapFault $err) {
            die(json_encode(array('code' => 0,'msg' => '系統認證出現錯誤，請聯絡圖資中心！')));
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        die(json_encode(array('code' => 1,'msg' => '登出成功!')));
    }
}
