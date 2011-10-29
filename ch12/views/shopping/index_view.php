<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>ยินดีต้อนรับ</title>
    </head>
    <body>
        <?php 
		 	if(! $this->cart->total_items())
			{
				echo heading('ไม่พบรายการสินค้า', '1');	
				echo anchor('shopping', 'เลือกสินค้า');	
			}else{
				echo anchor('shopping', 'เลือกสินค้า') . ' | ';
				echo anchor('shopping/checkout', 'ยืนยันการสั่งซื้อ') . ' | '; 
				echo anchor('shopping/destroy', 'ยกเลิกการสั่งซื้อ');
		?>
          <table border=0 width=460>
            <tr bgcolor=#eeeeee align=center>
                <td>รหัสสินค้า</td>
                <td>ชื่อสินค้า</td>
                <td>จำนวน</td>
                <td>ราคา</td>
                <td>รวม</td>
            </tr>
        <?php 
            foreach ($cart as $items):
        ?>
            <tr>
                    <td><?php echo $items['id']; ?></td>
                    <td><?php echo anchor('shopping/detail/'.$items['id'],$items['name']); ?></td>
                    <td><?php echo $items['qty']; ?></td>
                    <td align="right"><?php echo number_format($items['price'], 2); ?></td>
                    <td align="right"><?php echo number_format($items['subtotal'], 2); ?></td>
                    <td><?php echo anchor('shopping/detail/'.$items['id'], 'แก้ไข'); ?></td>
                    <td><?php echo anchor('shopping/remove/'.$items['rowid'], 'ลบ'); ?></td>
                  </tr>
        <?php 
            endforeach;
        ?>
                  <tr>
                      <td align="right" colspan="4">รวมเป็นเงิน:</td>
                      <td align="right"><b><?php echo number_format($this->cart->total()); ?></b></td>
                  </tr>
        </table>
      <?php } ?>
    </body>
</html>
