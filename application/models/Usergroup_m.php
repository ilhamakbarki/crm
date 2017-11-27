<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usergroup_m extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function data()
	{
		$this->load->library('Datatables');
		$this->datatables->select('uid, nama');
		$this->datatables->from('user_level');
		$this->datatables->add_column('action', "<a href=".base_url('admin/usergroup/edit/$1')." class='btn btn-default'>Edit</a><a href=".base_url('admin/usergroup/delete/$1')." class='btn btn-danger'>Delete</a>", 'uid');
		return $this->datatables->generate();
	}
}

/* End of file Usergroup_m.php */
/* Location: ./application/models/Usergroup_m.php */