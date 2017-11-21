<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Session','session_s');
		$this->load->library('session');
		if($this->session_s->check_login()){
			if($this->session->userdata("level")!=2){
				redirect('login','refresh');
			}
		}else{
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$atr['judul_menu']="Data Barang";
		$atr['desk_menu']="Semua data barang disini";
		$atr['content']="distributor/item/item-list";
		$this->load->view('distributor/template', $atr);
	}

	public function datatable()
	{
		header("Content-Type: application/json");
		$this->load->model('Item_m','barang');
		echo $this->barang->data_distributor();
	}
}

/* End of file Item.php */
/* Location: ./application/controllers/distributor/Item.php */ ?>