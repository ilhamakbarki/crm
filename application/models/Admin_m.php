<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_m extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	function data() {
		$this->load->library('Datatables');
		$this->datatables->select('admin.*,user.user as username, admin.uid as uid');
		$this->datatables->from('admin');
		$this->datatables->join("user","admin.id_u=user.uid");
		$this->datatables->add_column('action', "<a href=".base_url('admin/admin/edit/$1')." class='btn btn-default'>Edit</a><a href=".base_url('admin/admin/delete/$1')." class='btn btn-danger'>Delete</a>", 'uid');
		return $this->datatables->generate();
	}

}

/* End of file Admin_m.php */
/* Location: ./application/models/Admin_m.php */