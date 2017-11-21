<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function set_login($data)
	{
		$this->session->set_userdata($data);
	}

	public function check_login()
	{
		if($this->session->has_userdata('login')&&$this->session->has_userdata('uid_user')&&$this->session->has_userdata('uid_detail')&&$this->session->has_userdata('level')&&$this->session->has_userdata('nama')){
			if($this->session->has_userdata('login')==true){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function unset_login()
	{
		$this->session->sess_destroy();
	}
}

/* End of file Session.php */
/* Location: ./application/models/Session.php */