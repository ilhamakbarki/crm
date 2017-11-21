<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Session','session_s');
		$this->load->library('session');
		if($this->session_s->check_login()){
			if($this->session->userdata("level")!=2){
				redirect('login','refresh');
			}
		}else{
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$atr=array(
			"judul_menu"=>"Profile Anda",
			"desk_menu"=>"Untuk mengedit profile"
		);
		$atr['uid']=$this->session->userdata("uid_detail");
		$atr['uid_user']=$this->session->userdata("uid_user");
		$atr['level']="distributor";
		$atr['content']="distributor/profile";
		$this->load->view('distributor/template', $atr);
	}

	public function change()
	{
		$atr=array(
			"judul_menu"=>"Profile Anda",
			"desk_menu"=>"Untuk mengedit profile"
		);
		$atr['uid']=$this->session->userdata("uid_detail");
		$atr['uid_user']=$this->session->userdata("uid_user");
		$atr['level']="distributor";
		$atr['content']="distributor/profile-change";
		$this->load->view('distributor/template', $atr);
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */