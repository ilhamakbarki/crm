<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$atr=$this->getAttr();
		$atr['content']="distributor/profile";
		$this->load->view('distributor/template', $atr);
	}

	public function change()
	{
		$atr=$this->getAttr();
		$atr['content']="distributor/profile-change";
		$this->load->view('distributor/template', $atr);
	}

	private function getAttr()
	{
		$t = array(
			"judul_menu"=>"Profile Anda",
			"desk_menu"=>"Untuk mengedit profile"
			);
		return $t;
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */