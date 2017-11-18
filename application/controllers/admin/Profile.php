<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$atr["judul_menu"]="Profile Anda";
		$atr["desk_menu"]="Untuk mengedit profile";
		$atr['content']="admin/profile";
		$atr['uid']="1";
		$atr['uid_user']="1";
		$atr['level']="admin";
		$this->load->view('admin/template', $atr);
	}

	public function change()
	{
		$atr['content']="admin/profile-change";
		$atr["judul_menu"]="Profile Anda";
		$atr["desk_menu"]="Untuk mengedit profile";
		$atr['uid']="1";
		$atr['uid_user']="1";
		$atr['level']="admin";
		$this->load->view('admin/template', $atr);
	}
}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */