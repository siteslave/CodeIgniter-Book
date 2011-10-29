<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style type='text/css'>
            td {font-size: 13px; font-family: "Verdana"}
        </style>
        <title>ยินดีต้อนรับ</title>
    </head>
    <body>
        <?php echo anchor('shopping/cart', 'สินค้าในตะกร้า'); ?> | 
        <?php 
		 	if($this->cart->total_items())
			{
				echo 'จำนวนสินค้า' . $this->cart->total_items() . ' รายการ | ';
				echo 'เป็นเงิน ' . number_format($this->cart->total()) . 'บาท';	
			}else{
				echo 'ไม่พบรายการสินค้า';
			}
			?> 
        <table>
            <tr bgcolor="#eeeeee">
                <td width="60">รหัสสินค้า</td>
                <td width="200">ชื่อสินค้า</td>
                <td>ราคา</td>
            </tr>
            <?php
            foreach ($products as $items) {
                echo "
                    <tr>
                        <td>".$items->code."</td>
                        <td>".$items->name."</td>
                        <td>".$items->price."</td>
		<td>".anchor("shopping/detail/".$items->code, "สั่งซื้อ")."</td>
                    </tr>
                ";
            }
            ?>
        </table>
    </body>
</html>
