<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Captcha_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	#เพิ่มข้อมูล
	function _insert($time, $ip, $word){
		#ลบข้อมูลเก่าที่หมดอายุไปแล้ว
		$this->_delete($ip, $time);
		#สร้างชุดคำสั่ง Active Record สำหรับเพิ่มข้อมูล
		$result = $this->db->set('captcha_time', $time) //กำหนดเวลา
				   ->set('ip_address', $ip) //กำหนด IP
				   ->set('word', $word) //กำหนดชุดอักษร
				   ->insert('tbl_captcha');
		return $result;	
	}
	#ตรวจสอบค่าที่คีย์
	function _check($ip, $word, $exp){		
		$result = $this->db->where('captcha_time >', $exp)
				   ->where('word', $word) //ตรวจสอบคำหรือ คีย์เวิร์ด
				   ->where('ip_address', $ip) //ตรวจสอบ IP
		    		   ->count_all_results('tbl_captcha');
		if($result > 0) //พบรายการ
		{
		  	return TRUE;		
		}else{ //ไม่พบรายการ
			return FALSE;	
		}
	}
	#ลบข้อมูลเดิมที่หมดอายุ
	function _delete($ip, $exp)
	{
	 	$this->db->where('ip_address', $ip)
			 ->where('captcha_time <', $exp)
			 ->delete('tbl_captcha');	
	}
}
