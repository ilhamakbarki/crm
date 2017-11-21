<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Session','session_s');
		$this->load->library('session');
		if($this->session_s->check_login()){
			if($this->session->userdata("level")!=1){
				redirect('login','refresh');
			}
		}else{
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$atr["judul_menu"]="Profile Anda";
		$atr["desk_menu"]="Untuk mengedit profile";
		$atr['uid']=$this->session->userdata("uid_detail");
		$atr['uid_user']=$this->session->userdata("uid_user");
		$atr['level']="admin";
		$atr['content']="admin/profile";
		$this->load->view('admin/template', $atr);
	}

	public function change()
	{
		$atr['content']="admin/profile-change";
		$atr["judul_menu"]="Profile Anda";
		$atr["desk_menu"]="Untuk mengedit profile";
		$atr['uid']=$this->session->userdata("uid_detail");
		$atr['uid_user']=$this->session->userdata("uid_user");
		$atr['level']="admin";
		$this->load->view('admin/template', $atr);
	}
}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */