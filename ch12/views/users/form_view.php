<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ล๊อกอิน</title>
</head>
<body>
 	<?php
    	if($this->session->flashdata('msg_error'))
		{
			echo '<p><font color=red>';
			echo $this->session->flashdata('msg_error');
			echo '</font></p>';	
		}
		echo form_open('users/dologin');
		echo form_label('ผู้ใช้งาน:','username').'<br />';
		echo form_error('username','<font color=red>','</font><br />');
		echo form_input('username', set_value('username')).'<br />';
		echo form_label('รหัสผ่าน: ','password').'<br />';
		echo form_error('password','<font color=red>','</font><br />');
		echo form_password('password', set_value('password')).'<br />';
		echo form_submit('submit','เข้าสู่ระบบ');
	?>
</body>
</html>
