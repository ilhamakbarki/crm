<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distributor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('Session');
		if(!$this->Session->check_login()){
			return;
		}
		$this->load->model("Forgot_m");
		if(!$this->Forgot_m->f_m_plat()){
			$this->response(204, "ERROR");
			return;
		}
		$allowedMethods = array(
			'add',
			'edit',
			'del',
			'getDistributor'
		);
		$methodName = $this->input->post('m', TRUE);
		$this->run($methodName, $allowedMethods);
	}

	private function add()
	{
		$this->load->model("Distributor_m");
		if(!$this->Distributor_m->f_distributor_add()){
			$this->response(204, "ERROR");
			return;
		}
		$dis = array(
			"nama"=>$this->input->post('nama', TRUE),
			"pt"=>$this->input->post('pt', TRUE),
			"alamat"=>$this->input->post('alamat', TRUE),
			"email"=>$this->input->post('email', TRUE),
			"telp"=>$this->input->post('telp', TRUE),
			"id_u"=>$this->input->post('id_u', TRUE),
			"grup"=>$this->input->post('grup', TRUE)
		);
		$this->load->model('Table','table');
		$result = $this->table->add($dis, "distributor");
		if(!$result['status']){
			$this->response(204, "ERROR ADD");
			return;
		}
		$this->response(200, "OK");
	}

	private function edit()
	{
		$this->load->model("Distributor_m");
		if(!$this->Distributor_m->f_distributor_edit()){
			$this->response(204, "ERROR");
			return;
		}
		$set = array(
			"nama"=>$this->input->post('nama', TRUE),
			"pt"=>$this->input->post('pt', TRUE),
			"alamat"=>$this->input->post('alamat', TRUE),
			"email"=>$this->input->post('email', TRUE),
			"telp"=>$this->input->post('telp', TRUE),
			"id_u"=>$this->input->post('id_u', TRUE),
			"grup"=>$this->input->post('grup', TRUE)
		);
		$this->load->model('Table','table');
		$result = $this->table->update($set, array("uid"=>$this->input->post('uid', TRUE)), "distributor");
		if(!$result['status']){
			$this->response(204, "ERROR ADD");
			return;
		}
		$this->response(200, "OK");
	}

	private function del()
	{
		$this->load->model("Distributor_m");
		if(!$this->Distributor_m->f_distributor_get()){
			$this->response(204, "ERROR");
			return;
		}
		$this->load->model('Table','table');
		$result = $this->table->del(array("uid"=>$this->input->post('uid', TRUE)), "distributor");
		if(!$result['status']){
			$this->response(204, "ERROR DELETE");
			return;
		}
		$this->response(200, "OK");
	}

	private function getDistributor()
	{
		$this->load->model("Distributor_m");
		if(!$this->Distributor_m->f_distributor_get()){
			$this->response(204, "ERROR");
			return;
		}
		$this->load->model('Table','table');
		$result = $this->table->getSelectedData("*", array("uid"=>$this->input->post('uid', TRUE)), "distributor")->row();
		if(!$result){
			$this->response(204, "NO DATA");
			return;
		}
		$this->response(200, "OK", $result);
	}

	public function datatable()
	{
		$this->load->model('Distributor_m','distributor');
		header("Content-Type: application/json");
		echo $this->distributor->data();
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

/* End of file Distributor.php */
/* Location: ./application/controllers/Distributor.php */