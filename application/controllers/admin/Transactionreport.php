<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transactionreport extends CI_Controller {

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
		$atr=$this->getAttr();
		$atr['content']="admin/report/transaction";
		$this->load->view('admin/template', $atr);
	}

	private function getAttr()
	{
		$t = array(
			"judul_menu"=>"Laporan Invoice",
			"desk_menu"=>"Semua laporan invoice disini"
			);
		return $t;
	}

}

/* End of file Transactionreport.php */
/* Location: ./application/controllers/Transactionreport.php */ ?>