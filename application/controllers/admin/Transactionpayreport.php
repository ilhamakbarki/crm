<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transactionpayreport extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$atr=$this->getAttr();
		$atr['content']="admin/report/transaction-pay";
		$this->load->view('admin/template', $atr);
	}

	private function getAttr()
	{
		$t = array(
			"judul_menu"=>"Laporan Pembayaran",
			"desk_menu"=>"Semua laporan pembayaran disini"
			);
		return $t;
	}

}

/* End of file Transactionpayreport.php */
/* Location: ./application/controllers/Transactionpayreport.php */ ?>