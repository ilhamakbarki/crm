<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usergroup extends CI_Controller {
	private $table_name = "user_level";

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
			'getUsergroup'
		);
		$methodName = isset($json->m) ? $json->m : '';
		$this->run($methodName, $allowedMethods, $json);
	}

	private function add($json)
	{
		if(!isset($json->nama) ){
			$this->response(204, "ERROR PARAM");
			return;
		}
		$data = array(
			"nama"=>$json->nama
		);
		$this->load->model('Table','table');
		$result=$this->table->add($data, $this->table_name);
		if(!$result['status']){
			$this->response(204, "ERROR ADD");
			return;
		}
		$this->response(200, "OK");
	}

	private function getUsergroup($json)
	{
		$this->load->model('Table','table');
		if(!isset($json->uid)){
			$this->response(204, "ERROR PARAM");
			return;
		}
		$result = $this->table->getSelectedData("uid, nama", array("uid"=>$json->uid), $this->table_name)->row();
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
			"nama"=>$json->nama
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
		$this->load->model('Usergroup_m','usergroup');
		echo $this->usergroup->data();
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