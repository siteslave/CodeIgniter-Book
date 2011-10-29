<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
	echo form_open('validator/login');
	echo form_label('ชื่อผู้ใช้งาน','uname'). '<br />';
	echo form_error('uname','<font color=red>','</font><br />'); 
	echo form_input('uname', set_value('uname')).'<br />';
	echo form_label('รหัสผ่าน','pass').'<br />';
	echo form_error('pass','<font color=red>','</font><br />'); 
	echo form_password('pass', set_value('pass')).'<br />';
	echo form_label('อีเมล์','email').'<br />';
	echo form_error('email','<font color=red>','</font><br />'); 
	echo form_input('email', set_value('email')).'<br />';
	echo '<br /> &nbsp;';
	echo form_submit('submit','เข้าสู่ระบบ');
	echo form_close();
?>
</body>
</html>
