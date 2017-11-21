<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
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
			)
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == TRUE) {
			return true;
		} else {
			return false;
		}
	}

	public function f_change()
	{
		$config = array(
			array(
				'field' => 'uid',
				'label' => 'UID',
				'rules' => 'trim|required|integer'
			),
			array(
				'field' => 'token',
				'label' => 'Token',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'pwd',
				'label' => 'Password',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'cpwd',
				'label' => 'Konfirmasi Password',
				'rules' => 'trim|required|matches[pwd]'
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

/* End of file Forgot_m.php */
/* Location: ./application/models/Forgot_m.php */