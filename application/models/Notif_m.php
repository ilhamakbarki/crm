<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notif_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll()
	{
		return $this->db->select("distributor.*, user.user")
		->from("distributor")
		->join("user","user.uid=distributor.id_u","left")
		->where("distributor.id_u is not NULL")
		->get();
	}

	public function getUser($id)
	{
		return $this->db->select("distributor.*, user.user, user.uid as uid_user")
		->from("distributor")
		->join("user","user.uid=distributor.id_u")
		->where($id)
		->get();
	}
}

/* End of file Notif_m.php */
/* Location: ./application/models/Notif_m.php */