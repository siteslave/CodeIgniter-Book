<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
    function index(){
        $data = array('error' => '');
        $this->load->view('upload/form_view', $data); //แสดงฟอร์มสำหรับอัปโหลดไฟล์
    }
	
	function multifile()
	{
	 	$this->load->view('upload/form_multi_view');		
	}
	function domultifile()
	{
		$config['upload_path']        = './uploads/';
 	           	$config['allowed_types']     = '*';
        		$config['max_size']            = '10000';		
		$this->load->library('upload', $config);
		$y = 0;
		$z = 0;
		for($i = 0; $i < count($_FILES); $i++)
		{
			if(! $this->upload->do_upload('userfile' . $i))
			{
				$y = $y + 1; 
 				echo 'Error message: ' . $this->upload->display_errors() . '<br />';
			}else{
				$z = $z + 1;	
			}
	 	}
		echo 'Upload '. $z .' file(s) success, ' . $y . ' file(s) failed. <br /><br />';
	}

	
    function doupload(){
        $config['upload_path']      	= './uploads/';  //โฟลเดอร์สำหรับอัปโหลดอยู่ที่ C:\AppServ\www\
        $config['allowed_types']    	= '*'; //กำหนดชนิดของไฟล์ที่สามารถอัปโหลดได้ * หมายถึงไม่จำกัดชนิดของไฟล์
        $config['max_size']         	= '10000'; //ขนาดสูงสุดของไฟล์ที่สามารถอัปโหลดได้จากตัวอย่างกำหนด 10 เมกะไบต์
        $this->load->library('upload', $config); //โหลดไลบารี File upload 
        if(! $this->upload->do_upload()) //ไฟล์ที่อัปโหลดมีค่าไม่ถูกต้องตามเงื่อนไขที่กำหนด หรือเกิดข้อผิดพลาดขึ้น
 	{
             	$data = array('error' => $this->upload->display_errors()); //เก็บข้อความผิดพลาด (Error)
          		$this->load->view('upload/form_view', $data); // แสดงข้อความผิดพลาด (Error) ออกทางไฟล์ View
        }else{ //ถูกต้องตามเงื่อนไขที่กำหนด
            $data = array('upload_data' => $this->upload->data()); //เก็บข้อมูลรายละเอียดของไฟล์ที่อัปโหลด
            $this->load->view('upload/success_view', $data); //ส่งค่ารายละเอียดของไฟล์ที่ได้ แสดงออกทางไฟล์ View
        }
    }
}
