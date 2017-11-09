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
        $this->load->model("M_UserApply");
        
    }


    public function index()
    {
        $data["list"] =  $this->M_Registration->getList();
        $this->load->view('V_header_manage');
        $this->load->view('V_list_manage',$data);
        $this->load->view('V_footer');
    }

    public function exportList($id) {
        $this->load->library('PHPExcel');
        $data = $this->M_UserApply->getApplyList($id);

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex()

        ->setCellValue( 'A1', '日期' ) 
        ->setCellValue( 'B1', '場次' )
        ->setCellValue( 'C1', '考試項目' )
        ->setCellValue( 'D1', '系別班級')
        ->setCellValue( 'E1', '姓名')
        ->setCellValue( 'F1', '英文姓名')
        ->setCellValue( 'G1', '學號')
        ->setCellValue( 'H1', '身分證字號')
        ->setCellValue( 'I1', '性別')
        ->setCellValue( 'J1', '行動電話')
        ->setCellValue( 'K1', '電子郵件')
        ->setCellValue( 'L1', '官網註冊')
        ->setCellValue( 'M1', '是否繳費');
        if(count($data) > 0) {
            $base_row = 2;
            foreach($data AS $key => $val) {
                $row = $base_row + $key;
                $objPHPExcel->setActiveSheetIndex()
                ->setCellValue( 'A'.$row, nice_date($val['rg_startDate'], 'Ymd')) 
                ->setCellValue( 'B'.$row, '')
                ->setCellValue( 'C'.$row, $val['ap_le_name'])
                ->setCellValue( 'D'.$row, $val['ap_us_cdept'])
                ->setCellValue( 'E'.$row, $val['ap_us_name'])
                ->setCellValue( 'F'.$row, $val['ap_us_ename'])
                ->setCellValue( 'G'.$row, $val['ap_us_no'])
                ->setCellValue( 'H'.$row, $val['ap_us_id'])
                ->setCellValue( 'I'.$row, $val['ap_us_sex'] == 'F' ? '女' : '男')
                ->setCellValue( 'J'.$row, $val['ap_us_phone'])
                ->setCellValue( 'K'.$row, $val['ap_us_email'])
                ->setCellValue( 'L'.$row, $val['ap_is_regi'] == '0' ? '否' : '是')
                ->setCellValue( 'M'.$row, $val['ap_is_pay'] == '0' ? '未繳費' : '已繳費');
            }
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . date('Ymd') . '證照報名資料.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');

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
        if(! count($item) > 0)
            echo '<option value="0">--未新增子項目--</option>';

        foreach($item AS $val) {
            echo '<option value="'.$val['le_id'].'">'.$val['le_name'].'</option>';
        }
    }

    public function detailed($id) {
        $data["rg"] = $this->M_Registration->getData($id);
        $data["item"] = $this->M_Registration->getItem($id);
        $this->load->view('V_header_manage');
        $this->load->view('V_detailedTheme',$data);
        $this->load->view('V_footer');
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
