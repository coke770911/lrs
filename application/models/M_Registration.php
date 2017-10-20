<?php

class M_Registration extends CI_Model {

    public function __construct() {

    }

    private function setValue($data) {
        foreach($data as $val => $key) {
            $this->$key = $val;
        }
    }

    public function getList() {
        $query = $this->db->query('SELECT * FROM [Registration].[dbo].[Registration] WHERE rg_is_del = 0 AND rg_applyEndDate > getdate()');
        return $query->result_array();
    }

    public function getData($id) {
        $sql = 'SELECT * FROM [Registration].[dbo].[Registration] WHERE rg_id = ?';
        $param = array($id);
        $query = $this->db->query($sql,$param);
        if($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array();
        }
    }

    public function getDataIsExpired($id) {
        $sql = 'SELECT * FROM [Registration].[dbo].[Registration] WHERE rg_id = ? AND rg_applyEndDate > getdate()';
        $param = array($id);
        $query = $this->db->query($sql,$param);
        if($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array();
        }     
    }

    public function getItem($id) {
        $sql = 'SELECT * FROM [Registration].[dbo].[LinkRgLe] LEFT JOIN [Registration].[dbo].[License] ON lk_le_id = le_id WHERE lk_rg_id = ?';
        $param = array($id);
        $query = $this->db->query($sql,$param);
        return $query->result_array();
    }

}
