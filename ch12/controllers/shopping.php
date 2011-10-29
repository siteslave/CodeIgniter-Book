<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Shopping extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('cart', 'session')); //โหลดไลบารี Session และ Cart
		$this->load->helper(array('url', 'html', 'form')); //โหลด url, html และ form helper
        		$this->load->model('Shopping_model', 'Shop'); //โหลดคลาส Shopping_model
     	}
 	#แสดงหน้าหลักของเว็บเพจ
    	function index()
    	{
		$data['products'] = $this->Shop->_getAll();
        		$this->load->view('shopping/products_view', $data);
  	}
  	#เพิ่มรายการสินค้าในตัวแปร Session ของ Cart
     	function addcart()
 	{
         		$cart = array(
 	            		'id'    => $this->input->post('code'),
 	            		'qty'   => $this->input->post('qty'),
 	            		'price' => $this->input->post('price'),
 	            		'name'  => $this->input->post('name')
 		       	      );
 		$this->cart->insert($cart); //เพิ่มรายการสินค้า
 	        	redirect('shopping/cart'); //กลับไปหน้ารายการสินค้าที่เลือกซื้อ
 	}
 	function destroy() //ลบรายการสินค้าที่เลือกทั้งหมด
 	{
 	        	$this->cart->destroy();
 	   	redirect('shopping');
 	}
 	function remove($rowid) //ลบรายการสินค้า
 	{
 	        $data = array('rowid' => $rowid, 'qty' => 0);
 	        $this->cart->update($data); //ลบรายการสินค้า
 	        redirect('shopping/cart'); //กลับไปหน้ารายการสินค้าที่สั่งซื้อ
 	}
   	function cart() //แสดงรายการสินค้าที่สั่งซื้อ
 	{
		$data['cart'] = $this->cart->contents();
         		$this->load->view('shopping/index_view', $data);
    	}
     	function detail($code) //แสดงรายละเอียดสินค้าที่ต้องการสั่งซื้อ
 	{
 	        $data['products'] = $this->Shop->_getDetail($code);
 	        $this->load->view('shopping/detail_view', $data);
     	}
	function checkout() //เก็บข้อมูลการสั่งซื้อลงฐานข้อมูล
	{
		if($this->cart->total_items()) //พบรายการสินค้า
		{	
			$cart_id = $this->session->userdata('session_id');	//ดึงค่า session id
			$items = $this->cart->contents(); //ดึงค่าตัวแปร Session จาก Cart
			foreach($items as $item) //วนลูปเพื่อดึงข้อมูลสินค้า
			{
 				//เก็บข้อมูลลงฐานข้อมูล
				$this->Shop->_save($cart_id, $item['id'], $item['price'], $item['qty']); 
			}
 			$this->cart->destroy(); //ลบค่าใน Cart
  			echo 'บันทึกการสั่งซื้อเรียบร้อยแล้ว';
		}else{ //ไม่พบรายการสั่งซื้อ
			echo 'ไม่พบรายการสินค้าที่สั่งซื้อ';	
		}
	}
}
