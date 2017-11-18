<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Level_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	function data() {
		$this->load->library('Datatables');
		$this->datatables->select('uid, nama, persentasi_jual');
		$this->datatables->from('distributor_grup');
		$this->datatables->add_column('action', "<a href=".base_url('admin/distributorgroup/edit/$1')." class='btn btn-default'>Edit</a><a href=".base_url('admin/distributorgroup/delete/$1')." class='btn btn-danger'>Delete</a>", 'uid');
		return $this->datatables->generate();
	}
}

/* End of file Level_m.php */
/* Location: ./application/models/Level_m.php */