<?php 
class M_LicenseItem extends CI_Model {
    private $le_id = 0;
    private $le_name = '';
    private $le_creatDate = '';
    private $le_order = 0;
    private $le_group = '';
    private $le_is_del = 0;


    public function __construct() {

    }

    public function setValue($data) {
        foreach($data as $key => $val) {
            $this->$key = $val;
        }
    }

    public function getData($id) {
        $sql = "SELECT * FROM [Registration].[dbo].[License] WHERE le_id = ?";
        $param = array($id);
        $query = $this->db->query($sql,$param);
        if($query->num_rows() > 0) {
            $result = $query->row_array(3);
            $this->setValue($result);
            return $result;
        } else {
            return array();
        }
    }

    //清單
    public function getList($le_group = 0) {
        $sql = "SELECT * FROM [Registration].[dbo].[License] WHERE [le_group] = ?";

        $param = array($le_group);
        $query = $this->db->query($sql,$param);
        if($query->num_rows() > 0) {
            
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function update() {
        if($this->le_id === 0) {
            $sql = "INSERT INTO [Registration].[dbo].[License] ([le_name],[le_group]) VALUES(?,?)";
            $param = array(
                    $this->le_name,
                    $this->le_group
                );
            $this->db->query($sql,$param);
            return $this->db->affected_rows();
        }  
    }
}