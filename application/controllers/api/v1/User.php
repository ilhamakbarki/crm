<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Table','table');
	}

	public function index()
	{
		$json = json_decode(file_get_contents('php://input'));
		if(isset($json->platfrom)||isset($json->m)){
			if($json->platfrom=="web"){

			}else{

			}
		}else{
			$this->response(204, "Params");
			return;
		}
		$allowedMethods = array(
			'add',
			'edit',
			'del',
			'getUser'
		);
		$methodName = isset($json->m) ? $json->m : '';
		$this->run($methodName, $allowedMethods, $json);
	}

	private function add($json)
	{

		if(!isset($json->user) || !isset($json->pwd) || !isset($json->level) || !isset($json->cpwd)){
			$this->response(204, "ERROR PARAM");
			return;
		}
		if($json->pwd!=$json->cpwd){
			$this->response(204, "PASSWORD NOT SAME");
			return;
		}
		$this->load->model('User_m','user');
		$data = array(
			"user"=>$json->user,
			"pwd"=>crypt($json->pwd, '$6$3h2aNvRm&shGWEsaWeo42iqILsiPowjUjskKkli9koitJkl$'),
			"level"=>$json->level,
			"token_api"=>$this->user->generateRandomString()
		);
		$result=$this->table->add($data, "user");
		if(!$result['status']){
			$this->response(204, "ERROR DB");
			return;
		}
		$this->response(200, "OK");
	}

	function datatable()
	{
		header("Content-Type: application/json");
		$this->load->model('User_m','user');
		echo $this->user->data();
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

/* End of file User.php */
/* Location: ./application/controllers/User.php */