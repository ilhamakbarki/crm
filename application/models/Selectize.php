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

}

/* End of file Selectize.php */
/* Location: ./application/models/Selectize.php */