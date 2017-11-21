<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Session','session_s');
		$this->load->library('session');
		if($this->session_s->check_login()){
			if($this->session->userdata("level")==1){
				redirect('Admin','refresh');
			}elseif($this->session->userdata("level")==2){
				redirect('Distributor/item','refresh');
			}
		}
	}

	public function index()
	{
		$this->load->view('forgot');
	}

}

/* End of file Forgot.php */
/* Location: ./application/controllers/Forgot.php */ ?>