<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usergroup extends CI_Controller {

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
		$this->load->library('grocery_CRUD');
		$c = new grocery_CRUD();
		$c->set_theme('datatables');
		$c->set_table('user_level');
		$c->display_as('nama','Level');
		$output = $c->render();
		$atr = (array)$output;
		$atr["judul_menu"] ="Level Pengguna";
		$atr["desk_menu"] ="Semua data level pengguna disini";
		$atr["content"] ="admin/distributor/distributor-list-coba";
		$this->load->view('admin/template', $atr);
	}

}

/* End of file Usergroup.php */
/* Location: ./application/controllers/Usergroup.php */