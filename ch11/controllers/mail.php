<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mail extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('email');
	}
    function send()
    {
        $this->email->from('satit@techfocus.in.th'); // ชื่อผู้ส่ง
        $this->email->to('codeigniter@techfocus.in.th'); // ชื่อผู้รับ
        $this->email->subject('Test send mail'); // หัวข้อจดหมาย
        $this->email->message('Test send mail via CodeIgniter'); // ข้อความของจดหมาย
        $this->email->send(); //ส่งอีเมล์
        echo $this->email->print_debugger(); //แสดงข้อความหรือ log การส่งอีเมล์ออกทางเบราเซอร์
    }
	/*******SEND ATTATCH FILE**
	function send()
    {
          	$this->email->from('satit@techfocus.in.th');
         	$this->email->to('codeigniter@techfocus.in.th');
         	$this->email->subject('Test send mail');
         	$this->email->message('Test send mail via CodeIgniter');
 	//attach file
	$file = 'C:\\Temp\\file_test.zip';
	$this->email->attach($file);
	//send mail
         	$this->email->send();
 	echo $this->email->print_debugger();
    }
   *******/
}
