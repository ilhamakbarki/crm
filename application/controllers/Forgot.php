<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Session','session_s');
		$this->load->library('session');
		if($this->session_s->check_login()){
			if($this->session->userdata("level")==1){
				redirect('Admin','refresh');
			}elseif($this->session->userdata("level")==2){
				redirect('Distributor/item','refresh');
			}
		}
	}

	public function index()
	{
		$this->load->view('forgot');
	}

	public function check($value=null)
	{
		if($value==null){
			redirect('forgot','refresh');
			return;
		}
		$this->load->model('Table','table');
		$result = $this->table->getSelectedData("*",array("token_forgot"=>$value),"user")->row();
		if(!$result){
			redirect('Erorr','refresh');
			return;
		}
		$this->load->model('Setting');
		$now = date('Y-m-d H:i:s');
		if($this->Setting->diff_datetime($result->forgot_time, $now)>10){
			$this->table->update(array("token_forgot"=>NULl, "forgot_time"=>NULl),array("token_forgot"=>$value),"user");
			echo "TOKEN EXPIRED";
			return;
		}
		$data["uid"]=$result->uid;
		$data["token"]=$value;
		$this->load->view('forgot-change', $data);
	}
	
}

/* End of file Forgot.php */
/* Location: ./application/controllers/Forgot.php */ ?>