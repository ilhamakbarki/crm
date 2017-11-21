<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_m','profile');
	}

	public function index()
	{
		$this->load->model('Session');
		if(!$this->Session->check_login()){
			return;
		}
		if(!$this->profile->f_m_plat()){
			$this->response(204, "ERROR");
			return;
		}
		$allowedMethods = array(
			'edit',
			'getProfile',
			'changePassword'
		);
		$methodName = $this->input->post('m', TRUE);
		$this->run($methodName, $allowedMethods);
	}

	private function changePassword()
	{
		if(!$this->profile->f_edit_password()){
			$this->response(204,"ERROR",array("errors"=>$this->form_validation->error_array()));
			return;
		}
		$this->load->model('Table','table');
		$result=$this->table->update(array("pwd"=>crypt($this->input->post('pwdnew', TRUE), '$6$3h2aNvRm&shGWEsaWeo42iqILsiPowjUjskKkli9koitJkl$')), array("uid"=>$this->input->post('uid', TRUE)), "user");
		if(!$result['status']){
			$this->response(204,"ERROR");
			return;
		}
		$this->response(200,"OK");		
	}

	private function edit()
	{
		$this->load->model('Table','table');
		if($this->profile->f_edit_admin()&&$this->input->post('level', TRUE)=="admin"){
			$result=$this->table->update(array("nama"=>$this->input->post('nama', TRUE), "alamat"=>$this->input->post('alamat', TRUE),"email"=>$this->input->post('email', TRUE),"telp"=>$this->input->post('telp', TRUE)), array("uid"=>$this->input->post('uid', TRUE)), "admin");
		}elseif($this->profile->f_edit_distributor()&&$this->input->post('level', TRUE)=="distributor"){
			$result=$this->table->update(array("nama"=>$this->input->post('nama', TRUE), "alamat"=>$this->input->post('alamat', TRUE),"email"=>$this->input->post('email', TRUE),"telp"=>$this->input->post('telp', TRUE), "pt"=>$this->input->post('pt', TRUE)), array("uid"=>$this->input->post('uid', TRUE)), "distributor");
		}else{
			$result['status']=false;
		}
		if($result['status']){
			$this->response(200,"OK");
		}else{
			$this->response(204,"ERROR");
		}
	}

	private function getProfile()
	{
		if(!$this->profile->f_get_profile()){
			$this->response(204, "ERROR");
			return;
		}
		$this->load->model('Table','table');
		if($this->input->post('level', TRUE)=="admin"){
			$result=$this->table->getSelectedData("*",array("uid"=>$this->input->post('uid', TRUE)),"admin")->row();
		}elseif($this->input->post('level', TRUE)=="distributor"){
			$result=$this->table->getSelectedData("*",array("uid"=>$this->input->post('uid', TRUE)),"distributor")->row();
		}else{
			$result = false;
		}
		if(!$result){
			$this->response(204, "ERROR");
			return;
		}
		$this->response(200,"",$result);
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

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */