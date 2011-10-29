<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Upload file</title>
    </head>
    <body>
        <?php 
            echo isset ($error) ? $error : '';
            echo form_open_multipart('upload/doupload');
            echo form_upload('userfile');
            echo form_submit("submit", "อัปโหลด!");
            echo form_close();
        ?>
    </body>
</html> 
