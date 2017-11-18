<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('forgot');
	}

}

/* End of file Forgot.php */
/* Location: ./application/controllers/Forgot.php */ ?>