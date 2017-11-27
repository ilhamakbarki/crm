<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	private $table_name = "admin";

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$json = json_decode(file_get_contents('php://input'));
		if(isset($json->platfrom)||isset($json->m)){
			if($json->platfrom=="web"){
				$this->load->model('Session');
				if(!$this->Session->check_login()){
					return;
				}
			}else{
				return;
			}
		}else{
			$this->response(204, "Params");
			return;
		}
		$allowedMethods = array(
			'add',
			'edit',
			'del',
			'getAdmin'
		);
		$methodName = isset($json->m) ? $json->m : '';
		$this->run($methodName, $allowedMethods, $json);
	}

	private function add($json)
	{
		if(!isset($json->nama)||!isset($json->alamat)||!isset($json->email)||!isset($json->telp)||!isset($json->id_u)){
			$this->response(204, "ERROR PARAM");
			return;
		}
		$data = array(
			"nama"=>$json->nama,
			"alamat"=>$json->alamat,
			"email"=>$json->email,
			"telp"=>$json->telp,
			"id_u"=>$json->id_u
		);
		$this->load->model('Table','table');
		$result=$this->table->add($data, $this->table_name);
		if(!$result['status']){
			$this->response(204, "ERROR ADD");
			return;
		}
		$this->response(200, "OK");
	}

	private function getAdmin($json)
	{
		$this->load->model('Table','table');
		if(!isset($json->uid)){
			$this->response(204, "ERROR PARAM");
			return;
		}
		$result = $this->table->getSelectedData("*", array("uid"=>$json->uid), $this->table_name)->row();
		if(!$result){
			$this->response(204, "DATA ERORR");
			return;
		}
		$this->response(200, "OK", $result);
	}

	private function del($json)
	{
		$this->load->model('Table','table');
		if(!isset($json->uid)){
			$this->response(204, "ERROR PARAM");
			return;
		}
		$result = $this->table->del(array("uid"=>$json->uid), $this->table_name);
		if(!$result['status']){
			$this->response(204, "ERROR DELETE");
			return;
		}
		$this->response(200, "OK");
	}

	private function edit($json)
	{
		$this->load->model('Table','table');
		if(!isset($json->uid)||!isset($json->nama)){
			$this->response(204, "ERROR PARAM");
			return;
		}
		$set = array(
			"nama"=>$json->nama,
			"alamat"=>$json->alamat,
			"email"=>$json->email,
			"telp"=>$json->telp,
			"id_u"=>$json->id_u
		);
		$result=$this->table->update($set, array("uid"=>$json->uid), $this->table_name);
		if(!$result['status']){
			$this->response(204, "UPDATE FAIL");
			return;
		}
		$this->response(200, "OK");
	}

	public function datatable()
	{
		header("Content-Type: application/json");
		$this->load->model('Admin_m');
		echo $this->Admin_m->data();
	}

	private function run($method, array $allowedMethods, $data=null){
		$allowed = array_search($method, $allowedMethods);
		if($allowed !== false){
			$this->{$method}($data);
		}else{
			$this->response(204, "Cannot found method");
		}
	}
}

/* End of file Usergroup.php */
/* Location: ./application/controllers/Usergroup.php */