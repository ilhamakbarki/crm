<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function f_edit_distributor()
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
				'field' => 'alamat',
				'label' => 'Alamat',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|required|valid_email'
			),
			array(
				'field' => 'telp',
				'label' => 'Telpon',
				'rules' => 'trim|integer'
			),
			array(
				'field' => 'pt',
				'label' => 'PT',
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

	public function f_edit_admin()
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
				'field' => 'alamat',
				'label' => 'Alamat',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|required|valid_email'
			),
			array(
				'field' => 'telp',
				'label' => 'Telpon',
				'rules' => 'trim|integer'
			)
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == TRUE) {
			return true;
		} else {
			return false;
		}
	}

	public function f_get_profile()
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

	public function f_m_plat()
	{
		$config = array(
			array(
				'field' => 'm',
				'label' => 'Methode',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'platfrom',
				'label' => 'Platfrom',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'level',
				'label' => 'Level',
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

	public function f_edit_password()
	{
		$config = array(
			array(
				'field' => 'uid',
				'label' => 'UID',
				'rules' => 'trim|required|integer'
			),
			array(
				'field' => 'pwdold',
				'label' => 'Password Old',
				'rules' => array(
					'required',
					array(
						'check_password',
						function ($value)
						{
							$this->load->model('Table','table');
							if($this->table->getSelectedData("*", array("uid"=>$this->input->post('uid', TRUE), "pwd"=>crypt($value,'$6$3h2aNvRm&shGWEsaWeo42iqILsiPowjUjskKkli9koitJkl$')), "user")->row()){
								return true;
							}else{
								$this->form_validation->set_message('check_password', 'Password lama salah');
								return false;
							}
						}
					)
				)
			),
			array(
				'field' => 'pwdnew',
				'label' => 'Password New',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'cpwdnew',
				'label' => 'Confirmation Password',
				'rules' => 'trim|required|matches[pwdnew]'
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

/* End of file Profile_m.php */
/* Location: ./application/models/Profile_m.php */