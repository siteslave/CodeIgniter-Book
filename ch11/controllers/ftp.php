<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ftp extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('ftp');
	}
	function connect()	{
		$config['hostname'] 	= 'ftp.techfocus.in.th'; //ชื่อ FTP เซิร์ฟเวอร์
		$config['username'] 	= 'webmaster'; //ชื่อผู้ใช้งาน
		$config['password'] 	= '@#sdoeslEsoe'; //รหัสผ่าน
		$config['port']     		= 21; //พอร์ตที่ใช้งาน
		$config['passive']  	= FALSE; //กำหนดการใช้งานโหมด passive 
		$config['debug']    	= TRUE; //กำหนดค่าการแจ้งเตือนข้อผิดพลาด (Error)
		if($this->ftp->connect($config)) //เชื่อมต่อ FTP เซิร์ฟเวอร์
		{
			$file = $this->ftp->list_files('data'); //รายละเอียดไฟล์ในโฟลเดอร์ data
			print_r($file); //แสดงชื่อไฟล์
		}
 		$this->ftp->close(); //ปิดการเชื่อมต่อ FTP เซิร์ฟเวอร์
	}
	
	function upload()
	{
		$config['hostname'] 	= 'ftp.techfocus.in.th'; //ชื่อ FTP เซิร์ฟเวอร์
		$config['username'] 	= 'satit'; //ชื่อผู้ใช้งาน
		$config['password'] 	= '123456'; //รหัสผ่าน
		$config['port']     		= 21; //พอร์ตที่ใช้งาน
		$config['passive']  	= TRUE; //กำหนดการใช้งานโหมด passive 
		$config['debug']    	= TRUE; //กำหนดค่าการแจ้งเตือนข้อผิดพลาด (Error)
		$this->ftp->connect($config); //เชื่อมต่อ FTP เซิร์ฟเวอร์
		$local_file = 'C:\\Temp\\file_test.zip';
		$remote_file = 'data/file_test.zip';
		$this->ftp->upload($local_file, $remote_file);
		$file = $this->ftp->list_files('data');
		echo '<pre>';
		print_r($file);
		echo '</pre>';
   		$this->ftp->close(); //ปิดการเชื่อมต่อ FTP เซิร์ฟเวอร์
	}

	function download()
	{
		$config['hostname'] 	= 'ftp.techfocus.in.th'; //ชื่อ FTP เซิร์ฟเวอร์
		$config['username'] 	= 'satit'; //ชื่อผู้ใช้งาน
		$config['password'] 	= '123456'; //รหัสผ่าน
		$config['port']     		= 21; //พอร์ตที่ใช้งาน
		$config['passive']  	= TRUE; //กำหนดการใช้งานโหมด passive 
		$config['debug']    	= TRUE; //กำหนดค่าการแจ้งเตือนข้อผิดพลาด (Error)
		$this->ftp->connect($config); //เชื่อมต่อ FTP เซิร์ฟเวอร์
		$local_file = 'C:\\AppServ\\www\\downloads\\file_test.zip';
		$remote_file = 'data/file_test.zip';
		$this->ftp->download($remote_file, $local_file);
		echo 'File ' . $remote_file . ' downloaded.';
  		$this->ftp->close(); //ปิดการเชื่อมต่อ FTP เซิร์ฟเวอร์
	}

	
}
