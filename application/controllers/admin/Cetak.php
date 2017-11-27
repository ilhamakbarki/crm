<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cetak extends CI_Controller {

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
			"judul_menu"=>"Cetak Produk",
			"desk_menu"=>"Cetak Price List Produk",
			"content"=>"admin/item/print",
			"grup"=>$this->table->getAll("distributor_grup")->result()
		);
		$this->load->view('admin/template', $atr);
	}

	public function excel()
	{
		$level = $this->input->post('level', TRUE);
		$this->load->model('Cetak_m','cetak');
		$result = $this->cetak->barang($level);
		$this->load->model('Table','table');
		$distributor_grup = $this->table->getSelectedData("*", array("uid"=>$level), "distributor_grup")->row();
		$this->cetak->excel($result, "Price List_".$distributor_grup->nama."_Tanggal_".date("d M Y").".xls");		
	}

	public function spreadsheet()
	{
		
	}
}

/* End of file Print.php */
/* Location: ./application/controllers/Print.php */