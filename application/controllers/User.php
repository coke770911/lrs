<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index()
    {
        
    }

    public function userdata() {

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
        } else {
            $username = $acc_temp[0];
            $account = $acc_temp[1];
            if(!in_array($account, $this->tools->getAdminArr())) {
                $this->session->sess_destroy();
                die(json_encode(array('code' => 0,'msg' => '請勿使用不合法方式登入系統！！')));
            }
            $this->session->admin = 1;
        }

        $account .= "@acc.ad"; 
        $ad = ldap_connect("120.96.33.15"); 
        ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);
        $user_info = @ldap_bind($ad,$account, $password);
        $code = ldap_errno($ad);

        if ($code == 0) {
            $UserData = $this->M_UserData->getUserData($username);
            if($UserData == "") {
                $re = json_encode(array('code' => 0,'msg' => '找不到您的資料！'));
                die($re);
            }
            $this->session->set_userdata($UserData);
 
            $this->session->login = '1';
            $re = json_encode(array('code' => 1,'msg' => '登入成功!'));
            die($re);
        } else {
            $this->session->sess_destroy();
            die(json_encode(array('code' => 0,'msg' => '登入失敗!請再次檢查的您的學號與密碼，是否輸入錯誤！')));
        }

    }

    public function logout() {
        $this->session->sess_destroy();
        die(json_encode(array('code' => 1,'msg' => '登出成功!')));
    }
}