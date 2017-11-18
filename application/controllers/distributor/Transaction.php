<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$atr=$this->getAttr();
		$atr['content']="distributor/transaction/transaction-list";
		$this->load->view('distributor/template', $atr);
	}

	public function transactiond($in=null)
	{
		if($in==null){
			redirect('Error','refresh');
			return;
		}else{	
			$t = array(
				"judul_menu"=>"Detail Transaksi",
				"desk_menu"=>"Detail Transaksi No. Invoice ".$in
				);
			$t['content']="distributor/transaction/transaction-detail";
			$this->load->view('distributor/template', $t);
		}
	}

	private function getAttr()
	{
		$t = array(
			"judul_menu"=>"Data Transaksi",
			"desk_menu"=>"Semua data transaksi anda disini"
			);
		return $t;
	}

}

/* End of file Transaction.php */
/* Location: ./application/controllers/Transaction.php */