<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome2 extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('file');
	}
 	function file_detail()
	{
	 	$file = 'C:\\Temp\\test.txt';
		$data = read_file($file);
		if($data)
		{
		 	echo $data;		
		}else{
		 	echo 'ไม่สามารถอ่านไฟล์ได้';	
		}
	}
	function dowrite()
	{
		$file = 'C:\\Temp\\test.txt';
	 	$data = 'My name is Satit Rianpit';
		$result = write_file($file, $data, 'r+b');
		if($result)
		{
		 	$data = read_file($file);
			if($data)
			{
				echo $data;	
			}else{
				echo 'ไม่สามารถอ่านไฟล์ได้';	
			}	
		}else{
			echo 'ไม่สามารถเขียนไฟล์ได้';	
		}	
	}
	function dodelete()
	{
	 	$file = 'C:\\Temp\\';
		$result = delete_files($file);
		if($result)
		{
			echo 'ลบไฟล์เรียบร้อยแล้ว';	
		}else{
			echo 'ไม่สามารถลบไฟล์ได้';	
		}	
	}
	function dolist()
	{
		$path = 'C:\\Temp\\PCU\\';
		$files = get_filenames($path);	
		if($files)
		{
			echo 'รายชื่อไฟล์ใน ' . $path . '<br />';
			foreach ($files as $f)
				echo $f . '<br />';	
		}else{
			echo 'ไม่สามารถดูข้อมูลได้';	
		}
	}

	function dodirinfo()
	{
		$path = 'C:\\Temp\\PCU\\';
		$files = get_dir_file_info($path);	
		if($files)
		{
			echo 'รายชื่อไฟล์ใน ' . $path . '<br />';
			echo '
				<table width="100%" border="1">
				 	<tr>
 						<td>ชื่อไฟล์</td>
 						<td>พาธ</td>
 						<td>ขนาด (Byte)</td>
 						<td>วันที่</td>
 					</tr>
				';
			foreach ($files as $f)
			{
				echo '<tr><td>' . $f['name'] . '</td>';
				echo '<td>' . $f['server_path'] . '</td>';
				echo '<td>' . $f['size'] . '</td>';
				echo '<td>' . date('d/m/Y H:i:s' , $f['date']) . '</td></tr>';
			}
			echo '</table>';
		}else{
			echo 'ไม่สามารถดูข้อมูลได้';	
		}
	}

	function doinfo()
	{
		$path = 'C:\\Temp\\PCU\\anc.txt';
		$returned_values = array('name', 'size', 'date', 'fileperms');
		$files = get_file_info($path, $returned_values);			
 		if($files)
		{
			echo 'ชื่อไฟล์ ' . $files['name'] . '<br />';	
			echo 'ขนาด ' . $files['size'] . ' Byte<br />';
			echo 'วันที่แก้ไข ' . date('d/m/Y H:i:s', $files['date']) . '<br />';
			echo 'รหัสสิทธิ์ ' . $files['fileperms'] . '<br />';
		}else{
			echo 'ไม่สามารถดูข้อมูลได้';	
		}
 	}

	
}
