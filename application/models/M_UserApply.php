<?php

class M_UserApply extends CI_Model {

    private $ap_id = 0;
    private $ap_rg_id = "";
    private $ap_rg_name = "";
    private $ap_le_name = "";
    private $ap_rg_money = "";
    private $ap_us_id = "";
    private $ap_us_name = "";
    private $ap_us_ename = "";
    private $ap_us_no = "";
    private $ap_us_sex = "";
    private $ap_us_cdept = "";
    private $ap_us_grade = "";
    private $ap_us_class = "";
    private $ap_us_phone = "";
    private $ap_us_email = "";
    private $ap_us_memo = "";
    private $ap_is_regi = "";
    private $ap_is_del = 0;
    private $ap_score = -1;
    private $ap_is_pay = 0;


    public function __construct() {
        parent::__construct();
    }

    public function setValue($data) {
        foreach($data as $key => $val) {
            $this->$key = $val;
        }
    }

    public function getApplyList($rg_id) {
        $sql = "SELECT * FROM [Registration].[dbo].[Apply] LEFT JOIN [Registration].[dbo].[Registration] ON [ap_rg_id] = [rg_id] WHERE ap_rg_id = ? AND ap_is_del = 0";
        $param = array($rg_id);
        $query = $this->db->query($sql,$param);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } 
    }

    public function getUserApplyList($us_no) {
        $sql = "SELECT * FROM [Registration].[dbo].[Apply] LEFT JOIN [Registration].[dbo].[Registration] ON [ap_rg_id] = [rg_id] WHERE ap_us_no = ? AND ap_is_del = 0";
        $param = array($us_no);
        $query = $this->db->query($sql,$param);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } 
    }

    public function getEditData($rg_id,$std_no) {
        $sql = "SELECT * FROM [Registration].[dbo].[Apply] WHERE ap_rg_id = ? AND ap_us_no = ?";
        $param = array($rg_id,$std_no);
        $query = $this->db->query($sql,$param);
        
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $this->setValue($result);
            return $result;
        } 
    }

    public function getData($aid) {
        $query = $this->db->get_where('Apply', array('ap_id' => $aid));
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $this->setValue($result);
            return $result;
        } 
    }

    public function getApplyNum($rg_id) {
        $sql = 'SELECT count(ap_id) AS countNum FROM [Registration].[dbo].[Apply] WHERE ap_rg_id = ? AND ap_is_del = 0';
        $param = array($rg_id);

        $query = $this->db->query($sql,$param);
        $result = $query->row_array();
        return $result;
    }

    public function checkApply() {
        $sql = "SELECT count([ap_id]) AS 'rows' FROM [Registration].[dbo].[Apply] WHERE ap_rg_id = ? AND ap_us_no = ? AND ap_is_del = 0";
        $param = array($this->ap_rg_id,$this->ap_us_no);
        $query = $this->db->query($sql,$param);
        $result = $query->row_array();
        return $result["rows"];
    }


    public function update() {
        if($this->ap_id === 0) {
            $sql = "INSERT INTO [dbo].[Apply]([ap_rg_id],[ap_rg_name],[ap_le_name],[ap_rg_money],[ap_us_no],[ap_us_name],[ap_us_ename],[ap_us_id],[ap_us_sex],[ap_us_cdept],[ap_us_phone],[ap_us_email],[ap_us_memo],[ap_is_regi],[ap_score],[ap_is_pay]) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $param = array(
                        $this->ap_rg_id,
                        $this->ap_rg_name,
                        $this->ap_le_name,
                        $this->ap_rg_money,
                        $this->ap_us_no,
                        $this->ap_us_name,
                        $this->ap_us_ename,
                        $this->ap_us_id,
                        $this->ap_us_sex,
                        $this->ap_us_cdept,
                        $this->ap_us_phone,
                        $this->ap_us_email,
                        $this->ap_us_memo,
                        $this->ap_is_regi,
                        $this->ap_score,
                        $this->ap_is_pay
                        );
            $this->db->query($sql,$param);
            return $this->db->affected_rows();
        }  

        $sql = "UPDATE [dbo].[Apply] SET 
                ap_rg_id = ?,
                ap_rg_name = ?,
                ap_le_name = ?,
                ap_rg_money = ?,
                ap_us_id = ?,
                ap_us_name = ?,
                ap_us_ename = ?,
                ap_us_no = ?,
                ap_us_sex = ?,
                ap_us_cdept = ?,
                ap_us_phone = ?,
                ap_us_email = ?,
                ap_us_memo = ?,
                ap_is_regi = ?,
                ap_is_del = ?,
                ap_score = ? ,
                ap_is_pay = ? WHERE ap_id = ?";

        $param = array(
                $this->ap_rg_id ,
                $this->ap_rg_name ,
                $this->ap_le_name ,
                $this->ap_rg_money ,
                $this->ap_us_id ,
                $this->ap_us_name ,
                $this->ap_us_ename ,
                $this->ap_us_no ,
                $this->ap_us_sex ,
                $this->ap_us_cdept ,
                $this->ap_us_phone ,
                $this->ap_us_email ,
                $this->ap_us_memo ,
                $this->ap_is_regi ,
                $this->ap_is_del ,
                $this->ap_score ,
                $this->ap_is_pay,
                $this->ap_id
                );
        $this->db->query($sql,$param);
        return $this->db->affected_rows();
    }
}