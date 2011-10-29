<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Upload file</title>
    </head>
    <body>
        <?php
            echo form_open_multipart('upload/domultifile');
            echo form_upload('userfile0') . '<br />';
	echo form_upload('userfile1') . '<br />';
	echo form_upload('userfile2') . '<br />';
            echo form_submit("submit", "อัปโหลด!");
            echo form_close();
        ?>
    </body>
</html>
