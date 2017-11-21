<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_m extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function form_login()
	{
		$config = array(
			array(
				'field' => 'usr',
				'label' => 'Username',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'pwd',
				'label' => 'Password',
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

/* End of file Login_m.php */
/* Location: ./application/models/Login_m.php */