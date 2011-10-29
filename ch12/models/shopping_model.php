<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Shopping_model extends CI_Model{
	function __construct()
	{
		parent:: __construct();	
	}
    function _getAll(){ //ดึงข้อมูลรายการสินค้าทั้งหมด
        $result = $this->db->get('products')
		         ->result();
        return $result; //คืนค่าที่ได้กลับไปให้ Controller
    }
    function _getDetail($code){ //ดึงข้อมูลรายละเอียดของสินค้าอ้างอิงจาก $code
        $result = $this->db->where('code', $code)
 	                     ->get('products')
                                 ->row();
        return $result; //คืนค่าที่ได้กลับไปให้ Controller
  }
  function _save($cart_id, $code, $price, $qty) //บันทึกข้อมูลสินค้าที่เลือกลงฐานข้อมูล
	{
		$result = $this->db->set('cart_id', $cart_id)
				 ->set('code', $code)
				->set('price', $price)
				->set('qty', $qty)
				->insert('cart');	
	}
}
