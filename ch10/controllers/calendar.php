<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Calendar extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('calendar');
	}
	function index()
	{
		echo $this->calendar->generate(date('Y'), date('m'));
	}
}
