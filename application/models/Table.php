<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getSelectedData($s, $w, $t)
	{
		return $this->db
		->select($s)
		->from($t)
		->where($w)
		->get();

	}
	
	public function add($data, $table)
	{
		$this->db
		->insert($table, $data);
		return $this->result();
	}

	public function update($s, $w, $t)
	{
		$this->db
		->set($s)
		->where($w)
		->update($t);
		return $this->result();
	}

	public function getAll($table)
	{
		return $this->db->get($table);
	}

	public function getAllOrder($table, $o)
	{
		return $this->db->order_by($o[0], $o[1])->get($table);
	}

	public function del($w, $t)
	{
		$this->db->where($w)->delete($t);
		return $this->result();
	}

}

/* End of file Table.php */
/* Location: ./application/models/Table.php */