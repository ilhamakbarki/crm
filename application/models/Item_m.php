<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item_m extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	function data() {
		$this->load->library('Datatables');
		$this->datatables->select('uid, kode, nama, satuan, FORMAT(stok,0) as stok, FORMAT(beli, 0) as beli');
		$this->datatables->from('barang');
		$this->datatables->add_column("beli","Rp $1","beli");
		$this->datatables->add_column('action', "<a href=".base_url('admin/item/edit/$1')." class='btn btn-default'>Edit</a>
			<a href=".base_url('admin/item/delete/$1')." class='btn btn-danger'>Delete</a>", 'uid');
		return $this->datatables->generate();
	}

	function data_distributor()
	{
		$this->load->library('session');
		$this->load->library('Datatables');
		$this->datatables->select("kode, nama, satuan, FORMAT(stok,0) as stok, FORMAT(harga_barang.harga, 0) as harga");
		$this->datatables->from('barang');
		$this->datatables->join("harga_barang","harga_barang.uid_barang=barang.uid");
		$this->datatables->where(array("harga_barang.uid_dgrup"=>$this->session->userdata("level_distributor")));
		return $this->datatables->generate();
	}
}

/* End of file Item_m.php */
/* Location: ./application/models/Item_m.php */