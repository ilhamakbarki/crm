<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller {

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
		$atr = array(
			"judul_menu"=>"Data Transaksi",
			"desk_menu"=>"Semua data transaksi disini"
			);
		$atr['content']="admin/transaction/transaction-list";
		$this->load->view('admin/template', $atr);
	}

	public function add()
	{
		$atr = array(
			"judul_menu"=>"Tambah Invoice",
			"desk_menu"=>"Untuk menambahkan data invoice baru"
			);
		$atr['content']="admin/transaction/transaction-add";
		$this->load->view('admin/template', $atr);
	}

	public function detail($in=null)
	{
		if($in==null){
			redirect('error','refresh');
			return;
		}
		$atr = array(
			"judul_menu"=>"Detail No. Invoice",
			"desk_menu"=>"Untuk melihat dan merubah detail invoice",
			"in"=>$in,
			'content'=>"admin/transaction/transaction-pay-list"
			);
		$this->load->view('admin/template', $atr);
	}

	public function item($in=null)
	{
		if($in!=null){
			$atr["in"]=$in;
		}
		$atr = array(
			"judul_menu"=>"Ubah Barang",
			"desk_menu"=>"Untuk merubah data barang pada Invoice",
			"content"=>"admin/transaction/transaction-item-edit"
			);
		$this->load->view('admin/template', $atr);
	}

	public function pay($in=null)
	{
		if($in!=null){
			$atr["in"]=$in;
		}
		$atr = array(
			"judul_menu"=>"Ubah Pembayaran",
			"desk_menu"=>"Untuk merubah data pembayaran pada Invoice",
			"content"=>"admin/transaction/transaction-pay-edit"
			);
		$this->load->view('admin/template', $atr);
	}

}

/* End of file Transaction.php */
/* Location: ./application/controllers/Transaction.php */ ?>