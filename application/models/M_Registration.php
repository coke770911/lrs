<?php

class M_Registration extends CI_Model {
    private $rg_id = 0;
    private $rg_name = '';
    private $rg_startDate = '';
    private $rg_endDate = '';
    private $rg_memo = '';
    private $rg_applyEndDate ='';
    private $rg_money = '';
    private $rg_creator = '';
    private $rg_creatDate = '';
    private $rg_number = '';
    private $rg_is_regi = 0;
    private $rg_is_del = 0;


    public function __construct() {

    }

    public function setValue($data) {
        foreach($data as $key => $val) {
            $this->$key = $val;
        }
    }

    public function getList() {
        $query = $this->db->query('SELECT *,(SELECT count(*) FROM [Registration].[dbo].[Apply] WHERE ap_rg_id = rg_id AND ap_is_del = 0) AS rg_nowNumber FROM [Registration].[dbo].[Registration] WHERE rg_is_del = 0 AND rg_applyEndDate > getdate()');
        return $query->result_array();
    }

    public function getData($id) {
        $sql = 'SELECT *,(SELECT count(*) FROM [Registration].[dbo].[Apply] WHERE ap_rg_id = rg_id AND ap_is_del = 0) AS rg_nowNumber FROM [Registration].[dbo].[Registration] WHERE rg_id = ? AND rg_is_del = 0';
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


    public function update() {
        if($this->rg_id === 0) {
            $sql = '  INSERT INTO [Registration].[dbo].[Registration] ([rg_name],[rg_startDate],[rg_endDate],[rg_memo],[rg_applyEndDate],[rg_money],[rg_creator],[rg_number],[rg_is_regi]) VALUES(?,?,?,?,?,?,?,?,?)';
            $param = array(
                'rg_name' => $this->rg_name,
                'rg_startDate' => $this->rg_startDate,
                'rg_endDate' => $this->rg_endDate,
                'rg_memo' => $this->rg_memo,
                'rg_applyEndDate' => $this->rg_applyEndDate,
                'rg_money' => $this->rg_money,
                'rg_creator' => $this->rg_creator,
                'rg_number' => $this->rg_number,
                'rg_is_regi' => $this->rg_is_regi
            );
            $this->db->query($sql,$param);
            return $this->db->insert_id();
        }
    }

    
    //建立關聯
    public function update_item($id,$item_id) {
      $sql = 'INSERT INTO [Registration].[dbo].[LinkRgLe]([lk_rg_id],[lk_le_id]) VALUES(?,?)';
      $param = array($id,$item_id);
      $this->db->query($sql,$param);
      return $this->db->affected_rows();
    }

}
