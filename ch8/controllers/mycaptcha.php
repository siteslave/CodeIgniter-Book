<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mycaptcha extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'captcha', 'form'));
		$this->load->library('session'); 

	}
	function captcha()
	{
	 		$attr = array(
			 	'word' 		=> '1435mL',
				'img_path' 	=>  './captcha/',
				'img_url'		=>  base_url() . 'captcha/',
				'img_width'	=>  150,
				'img_height' 	=>  30,
				'expiration'	=>  7200 
			);
			$captcha = create_captcha($attr);			
			echo $captcha['image'];
	}

	function login()
	{
	 		$attr = array(
					'img_path' 	=>  './captcha/',
					'img_url'		=>  base_url() . 'captcha/',
					'img_width'	=>  150,
					'img_height' 	=>  30
			);
			$captcha = create_captcha($attr);
			setcookie('org_word', $captcha['word'], time() + 3600);
			echo $captcha['image'];
			echo br(2);
			echo form_open('welcome/dologin');
			echo form_input('word');
			echo form_submit('act', 'ตรวจสอบ');
			echo form_close();					
	}
	function dologin()
	{
	 	if(! isset($_COOKIE['org_word']))
		{
		 	redirect('welcome/login');	
		}else{//check chaptcha word
			$capt = $_COOKIE['org_word'];
			$word = $this->input->post('word');
			if($word === $capt)
			{
				echo 'ข้อมูลถูกต้อง';	
			}else{
				echo 'ข้อมูลไม่ถูกต้อง';
			}
		}	
	}

	
}
