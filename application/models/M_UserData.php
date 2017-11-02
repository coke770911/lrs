<?php

class M_UserData extends CI_Model {

    private $us_uid = 0;
    private $us_name = "";
    private $us_logid = "";
    private $us_title = "";
    private $us_ename = "";
    private $us_id = "";
    private $us_no = "";
    private $us_sex = "";
    private $us_yy = "";
    private $us_mm = "";
    private $us_dd = "";
    private $us_dept = "";
    private $us_grade = "";
    private $us_class = "";
    private $us_phone = "";
    private $us_email = "";

    public function __construct() {
        parent::__construct();
    }

    private function setValue($data) {
        foreach($data as $key => $val) {
            $this->$key = $val;
        }
    }



    public function getUserData($uid) {
        $query = $this->db->get_where('UserData', array('us_no' => $uid));
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $this->setValue($result);
            return $result;
        } 

        $query = $this->db->get_where('v_UserData', array('us_no' => $uid));
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $this->setValue($result);
            $this->update();
            return $result;
        } else {
            return "";
        } 
    }

    public function update() {
        if($this->us_uid === 0) {
            $sql = "INSERT INTO [UserData] ([us_no],[us_name],[us_logid],[us_title],[us_ename],[us_id],[us_sex],[us_yy],[us_mm],[us_dd],[us_dept],[us_grade],[us_class],[us_phone],[us_email]) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $param = array($this->us_no
                           ,$this->us_name
                           ,$this->us_logid
                           ,$this->us_title
                           ,$this->us_ename
                           ,$this->us_id
                           ,$this->us_sex
                           ,$this->us_yy
                           ,$this->us_mm
                           ,$this->us_dd
                           ,$this->us_dept
                           ,$this->us_grade
                           ,$this->us_class
                           ,$this->us_phone
                           ,$this->us_email
                        );
            $this->db->query($sql,$param);
            return $this->db->affected_rows();
        }  
    }

}
