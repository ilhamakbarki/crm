<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distributor_m extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	function data() {
		$this->load->library('Datatables');
		$this->datatables->select('distributor.uid, distributor.nama, distributor.pt, distributor.alamat, distributor.email, distributor.telp, user.user, distributor_grup.nama as grup');
		$this->datatables->from('distributor');
		$this->datatables->join('distributor_grup','distributor_grup.uid=distributor.grup');
		$this->datatables->join('user','user.uid=distributor.id_u');
		$this->datatables->add_column('action', "<a href=".base_url('admin/distributor/edit/$1')." class='btn btn-default'>Edit</a><a href=".base_url('admin/distributor/delete/$1')." class='btn btn-danger'>Delete</a>", 'uid');
		return $this->datatables->generate();
	}

	public function f_distributor_add()
	{
		$config = array(
			array(
				'field' => 'nama',
				'label' => 'Nama',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'pt',
				'label' => 'PT',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'alamat',
				'label' => 'Alamat',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'email',
				'label' => 'email',
				'rules' => 'trim|required|valid_email'
			),
			array(
				'field' => 'telp',
				'label' => 'Telp',
				'rules' => 'trim|required|integer'
			),
			array(
				'field' => 'grup',
				'label' => 'Grup',
				'rules' => 'trim|required'
			)
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == TRUE) {
			return true;
		} else {
			return false;
		}
	}

	public function f_distributor_get()
	{
		$config = array(
			array(
				'field' => 'uid',
				'label' => 'UID',
				'rules' => 'trim|required|integer'
			)
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == TRUE) {
			return true;
		} else {
			return false;
		}
	}

	public function f_distributor_edit()
	{
		$config = array(
			array(
				'field' => 'uid',
				'label' => 'UID',
				'rules' => 'trim|required|integer'
			),
			array(
				'field' => 'nama',
				'label' => 'Nama',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'pt',
				'label' => 'PT',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'alamat',
				'label' => 'Alamat',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'email',
				'label' => 'email',
				'rules' => 'trim|required|valid_email'
			),
			array(
				'field' => 'telp',
				'label' => 'Telp',
				'rules' => 'trim|required|integer'
			),
			array(
				'field' => 'grup',
				'label' => 'Grup',
				'rules' => 'trim|required'
			)
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == TRUE) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file Distributor_m.php */
/* Location: ./application/models/Distributor_m.php */