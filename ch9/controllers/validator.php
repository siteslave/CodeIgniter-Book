<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Validator extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		//โหลดไลบารี form_validation โดยใช้ alias เป็น F
		$this->load->library('form_validation',NULL, 'F');
	}
	function index(){
		//กลับไปหน้าล๊อกอิน
		redirect('validator/login');
	}
	function login(){
		//สร้างกฎสำหรับ username
		$this->F->set_rules('uname', 'ชื่อผู้ใช้งาน', 'required');
		//สร้างกฎสำหรับ password
		$this->F->set_rules('pass', 'รหัสผ่าน', 'required|min_length[8]');
		//สร้างกฎสำหรับ email
		$this->F->set_rules('email', 'อีเมล์', 'valid_email|required');
		//ตรวจสอบรูปแบบการกรอกข้อมูล
		if($this->F->run() == FALSE){ //ตรวจสอบไม่ผ่าน
			$this->load->view('validator/form_view');
		}else{ //ตรวจสอบผ่าน
			$this->load->view('validator/success_view');
		}
	}
}
