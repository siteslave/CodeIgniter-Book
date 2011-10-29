<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model', 'Users'); //โหลดคลาส Users_model
		$this->load->library(array( 'session', 'form_validation')); //โหลดไลบารี session และ form_validation
		$this->load->helper(array('url', 'html', 'form'));
	}
	function index(){ //หน้าหลัก
		if(! $this->session->userdata('logged')) //ยังไม่มีการล๊อกอิน
		{
			redirect('users/login'); //กลับไปหน้าล๊อกอิน
		}else{ //ผ่านการล๊อกอินแล้ว
			$this->load->view('users/index_view'); //แสดงหน้าหลัก
		}
	}
	function login() //ล๊อกอิน
	{
		$this->load->view('users/form_view'); //แสดงฟอร์มสำหรับล๊อกอิน
	}
	function dologin() //ตรวจสอบการล๊อกอินโดยรับค่าจากฟอร์ม
	{
		$this->form_validation->set_rules('username', 'Username', 'required'); //สร้างกฎสำหรับ username
		$this->form_validation->set_rules('password', 'Password', 'required'); //สร้างกฎสำหรับ password
		$this->form_validation->set_error_delimiters('<font color=red>', '</font>'); 
		if($this->input->post('submit'))	//มีการคลิกปุ่ม เข้าสู่ระบบ
		{
			$username = $this->input->post('username'); //รับค่า username จากฟอร์ม
			$password = $this->input->post('password'); //รับค่า password จากฟอร์ม
			if($this->form_validation->run()) //ตรวจสอบฟอร์มแล้วถูกต้องตามรูปแบบ
			{
 				//ตรวจสอบชื่อผู้ใช้งานและรหัสผ่าน
				$check = $this->Users->_checkuser($username, $password); 
				if($check) //ชื่อผู้ใช้งานและรหัสผ่านถูกต้อง
				{
					$data = array(
							'username' 	=> $username,
							'logged'	=> TRUE
				 		       );
					$this->session->set_userdata($data); //สร้างตัวแปร Session
					redirect('users');	//กลับไปหน้าหลัก
				}else{
 					//รหัสผ่านไม่ถูกต้อง
					$this->session->set_flashdata('msg_error',												      'รหัสผ่านไม่ถูกต้องกรุณาตรวจสอบ');					$this->load->view('users/form_view'); //แสดงหน้าล๊อกอิน
				}
			}else{ //กรอกข้อมูลไม่ถูกต้องตามรูปแบบ
				$this->session->set_flashdata('msg_error', 'กรุณากรอกข้อมูลให้ครบ');	
				$this->load->view('users/form_view');
			}	
		}else{ //ไม่มีการล๊อกอิน
			redirect('users/login');	//กลับไปหน้าล๊อกอิน
		}
	}
	function logout() //ออกจากระบบ
	{
		$this->session->sess_destroy(); //ล้างค่าตัวแปร Session
		redirect('users/login'); //กลับไปหน้าล๊อกอิน
	}
}
