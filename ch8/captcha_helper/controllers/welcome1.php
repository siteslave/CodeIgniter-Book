<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome1 extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'captcha', 'form'));
		$this->load->library('session');
		$this->load->model('Captcha_model', 'Captcha');
	}
	function login()
	{
	 		$attr = array(
					'img_path' 	=>  './captcha/',
					'img_url'	 	=>  base_url() . 'captcha/',
					'img_width'	=> 150,
					'img_height'	=> 30
			);
			#create captcha
			$captcha	=  create_captcha($attr);
			$time 		=  $captcha['time'];
			$ip 		=  $this->input->ip_address();
			$word 		=  $captcha['word'];
			#insert data
			$this->Captcha->_insert($time, $ip, $word);
  			#create form
			echo $captcha['image'];
			echo br(2);
			echo form_open('welcome/dologin');
			echo form_input('word');
			echo form_submit('act', 'ตรวจสอบ');
			echo form_close();
	}
	function dologin()
	{
		$act = $this->input->post('act');
	 	if(empty($act))
		{
		 	redirect('welcome/login');	
		}else{
			$word = $this->input->post('word');
			$exp = time() - 7200;
			$ip = $this->input->ip_address();
			#check captcha word
			$result = $this->Captcha->_check($ip, $word, $exp);
			if($result)
			{
				echo 'ข้อมูลถูกต้อง';	
			}else{
				echo 'ข้อมูลไม่ถูกต้อง';
			}
		}	
	}	
}
