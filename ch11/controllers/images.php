<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Images extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->library('image_lib');
	}
	function resize()
	{
		$config['image_library'] 		= 'gd2'; //กำหนดชนิดของไลบารีที่จะใช้งาน
 		//ที่อยู่ภาพที่ต้องการย่อ (C:\AppServ\www\app\images\ci_logo_flame.jpg)
		$config['source_image'] 		= './images/ci_logo_flame.jpg'; 
		$config['width']			= 100; //ความกว้างของภาพใหม่
		$config['height']			= 100; //ความสูงของภาพใหม่
  		//เปลี่ยนชื่อภาพใหม่หลังจากย่อขนาดแล้ว (C:\AppServ\www\app\images\ci_logo_flame2.jpg)	
		$config['new_image']		= './images/ci_logo_flame2.jpg'; 
 		
 		$this->image_lib->clear(); //เคลียร์ค่าคอนฟิกเดิม
		$this->image_lib->initialize($config); //โหลดค่าคอนฟิกของไลบารี
		if(! $this->image_lib->resize()) //ไม่สามารถทำการย่อขนาดภาพได้
		{
			echo $this->image_lib->display_errors();// แสดงข้อความผิดพลาด (Error)	
		}else{ //ย่อภาพได้
			echo img($config['source_image']);//ภาพต้นฉบับ
			echo img($config['new_image']); //ภาพใหม่หลังจากย่อขนาดแล้ว
		}
	}
	
	function rotate()
	{
	 	$config['image_library'] 	= 'gd2';
		$config['source_image'] 	= './images/ci_logo_flame.jpg'; 
		$config['new_image']	= './images/ci_logo_flame_rotate.jpg';
		$config['rotation_angle'] 	= 90; //กำหนดองศาในการหมุน

 		$this->image_lib->clear(); //เคลียร์ค่าคอนฟิกเดิม
		$this->image_lib->initialize($config); //โหลดค่าคอนฟิกของไลบารี		
		if(! $this->image_lib->rotate()) //ไม่สามารถหมุนภาพได้
		{
			echo $this->image_lib->display_errors(); //แสดงข้อความผิดพลาด (Error)	
		}else{
			echo img($config['source_image']); //แสดงภาพเดิม
			echo img($config['new_image']);//แสดงภาพใหม่
		}
	}

function crop()
	{
	 	$config['image_library'] 	= 'gd2';
		$config['source_image'] 	= './images/ci_logo_flame.jpg';
		$config['new_image']	= './images/ci_logo_flame_crop.jpg';
		$config['x_axis'] 	= '30'; //ขนาดของภาพที่ต้องการตัดออกในแกน x (แนวตั้ง)  
		$config['y_axis'] 	= '30'; //ขนาดของภาพที่ต้องการตัดออกในแกน y (แนวนอน)  
		
		$this->image_lib->clear(); //เคลียร์ค่าคอนฟิก
		$this->image_lib->initialize($config);//โหลดค่าคอนฟิก		
		if(! $this->image_lib->crop()) //ไม่สามารถตัดภาพได้
		{
			echo $this->image_lib->display_errors();//แสดงข้อความผิดพลาด (Error)	
		}else{ //ตัดภาพได้
			echo img($config['source_image']); //แสดงภาพเดิม
			echo img($config['new_image']);//แสดงภาพใหม่
		}
	}


function watermark()
	{
		$config['source_image'] 		= './images/ci_logo_flame.jpg';
		$config['new_image']		= './images/ci_logo_flame_watermark.jpg';
		$config['wm_text'] 		= 'CodeIgniter';
		$config['wm_type'] 		= 'text';
		$config['wm_font_size']		= '16';
		$config['wm_font_color'] 		= 'ff0000';
		$config['wm_vrt_alignment'] 	= 'bottom';
		$config['wm_hor_alignment'] 	= 'center';
		$config['wm_padding'] 		= '10';	
		$this->image_lib->clear(); //เคลียร์ค่าคอนฟิก
		$this->image_lib->initialize($config);//โหลดค่าคอนฟิก			
		if(! $this->image_lib->watermark()) //ไม่สามารถสร้าง Watermark ได้
		{
			echo $this->image_lib->display_errors();	//แสดงข้อความผิดพลาด (Error)
		}else{
			echo img($config['source_image']);//แสดงภาพต้นฉบับ
			echo img($config['new_image']);//แสดงภาพใหม่
		}
	}
	

}
