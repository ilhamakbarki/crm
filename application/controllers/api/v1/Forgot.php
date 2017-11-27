<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
		$this->load->model("Forgot_m");
		if(!$this->Forgot_m->f_m_plat()){
			$this->response(204, "ERROR");
			return;
		}
		$allowedMethods = array(
			'change'
		);
		$methodName = $this->input->post('m', TRUE);
		$this->run($methodName, $allowedMethods);
	}

	private function change()
	{
		$this->load->model("Forgot_m");
		if(!$this->Forgot_m->f_change()){
			$this->response(204, "ERROR Params");
			return;
		}
		$this->load->model('Table');
		$result = $this->Table->update(array("pwd"=>crypt($this->input->post('pwd', TRUE), '$6$3h2aNvRm&shGWEsaWeo42iqILsiPowjUjskKkli9koitJkl$')), array("uid"=>$this->input->post('uid', TRUE), "token_forgot"=>$this->input->post('token', TRUE)), "user");
		if(!$result['status']){
			$this->response(204,"ERROR UPDATE PASSWORD");
			return;
		}
		$this->Table->update(array("token_forgot"=>NULl, "forgot_time"=>NULl),array("token_forgot"=>$this->input->post('token', TRUE)),"user");
		$this->response(200, "OK");
	}

	private function run($method, array $allowedMethods)
	{
		$allowed = array_search($method, $allowedMethods);
		if($allowed !== false){
			$this->{$method}();
		}else{
			$this->response(204, "Cannot found method");
		}
	}
}

/* End of file Forgot.php */
/* Location: ./application/controllers/Forgot.php */