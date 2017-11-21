<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Session','session_s');
		$this->load->library('session');
		if(!$this->session_s->check_login()){
			redirect('Login','refresh');
		}
	}

	public function index()
	{
		$this->load->model('Session');
		$this->Session->unset_login();
		redirect('login','refresh');
	}

}

/* End of file Logout.php */
/* Location: ./application/controllers/Logout.php */