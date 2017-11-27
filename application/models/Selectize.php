<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Selectize extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getSelectize($w, $t)
	{
		return $this->db->or_like($w)->limit(10)->get($t);
	}

	public function getUserAdmin($w)
	{
		return $this->db->or_like($w)->where("level=1")->limit(10)->get("user");
	}

	public function getUserDistributor($w)
	{
		return $this->db->or_like($w)->where("level=2")->limit(10)->get("user");
	}

}

/* End of file Selectize.php */
/* Location: ./application/models/Selectize.php */