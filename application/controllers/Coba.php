<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coba extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		//$this->load->model('User');
		//$this->load->model('Messages');

	}
	public function index()
	{
		$this->load->view('coba');
	}
}
?>