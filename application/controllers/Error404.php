<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error404 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('errors/html/error_404');
	}

}

/* End of file 404.php */
/* Location: ./application/controllers/404.php */ ?>