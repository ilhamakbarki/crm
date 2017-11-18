<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_m extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	function data() {
		$this->load->library('Datatables');
		$this->datatables->select('user.uid, user.user as username, user_level.nama as level');
		$this->datatables->from('user');
		$this->datatables->join('user_level','user.level=user_level.uid');
		$this->datatables->add_column('action', "<a href=".base_url('admin/user/edit/$1')." class='btn btn-default'>Edit</a><a href=".base_url('admin/user/delete/$1')." class='btn btn-danger'>Delete</a>", 'uid');
		return $this->datatables->generate();
	}

	function generateRandomString($length = 20) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}

/* End of file User_m.php */
/* Location: ./application/models/User_m.php */