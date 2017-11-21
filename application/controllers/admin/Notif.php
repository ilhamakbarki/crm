<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notif extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Session','session_s');
		$this->load->library('session');
		if($this->session_s->check_login()){
			if($this->session->userdata("level")!=1){
				redirect('login','refresh');
			}
		}else{
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$this->load->model('Table','table');
		$atr = array(
			"judul_menu"=>"Kirim notifikasi email",
			"desk_menu"=>"Untuk mengirim notifikasi",
			"content"=>"admin/notif"
		);
		$this->load->view('admin/template', $atr);
	}

}

/* End of file Notif.php */
/* Location: ./application/controllers/Notif.php */