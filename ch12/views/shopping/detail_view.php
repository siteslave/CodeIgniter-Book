<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>รายละเอียดสินค้า</title>
    </head>
    <body>
        <br /><br />
        <div align="center"><h3><?php echo $products->name; ?></h3></div>
        <table width="430" align="center">
            <tr>
                <td valign="top">
                    <b>รหัส</b>: <?php echo $products->code; ?> <br />
                    <b>ชื่อสินค้า</b>: <?php echo $products->name; ?> <br />
                    <b>ราคา</b>: <?php echo number_format($products->price, 2); ?> 
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                        echo form_open("shopping/addcart");
                        echo form_hidden("code", $products->code);
                        echo form_hidden("name", $products->name);
                        echo form_hidden("price", $products->price);
                        echo "<b>จำนวน</b>: ".form_dropdown('qty', array('1'=>'1','2'=>'2','3'=>'3','4'=>'4', '5'=>'5'));
                        echo form_submit("submit", "เพิ่มสินค้า");
                        echo form_close();
                    ?>
                </td>
            </tr>
        </table>
    </body>
</html>
