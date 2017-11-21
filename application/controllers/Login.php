<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Session','session_s');
		$this->load->library('session');
		if($this->session_s->check_login()){
			if($this->session->userdata("level")==1){
				redirect('Admin','refresh');
			}elseif($this->session->userdata("level")==2){
				redirect('Distributor/profile','refresh');
			}
		}
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function auth(){
		$this->load->model('Login_m','login');
		$this->load->model('Table','table');
		
		if(!$this->login->form_login()){
			$this->response(204, "ERROR",$this->form_validation->error_array());
			return;
		}
		$result = $this->table->getSelectedData("*", array("user"=>$this->input->post('usr', TRUE), "pwd"=>crypt($this->input->post('pwd', TRUE), '$6$3h2aNvRm&shGWEsaWeo42iqILsiPowjUjskKkli9koitJkl$')), "user")->row();
		if(!$result){
			$this->response(204, "ERROR", array("status"=>"Username atau Password Salah"));
			return;
		}
		if($result->level==1){
			$detail = $this->table->getSelectedData("*", array("id_u"=>$result->uid), "admin")->row();
		}else{
			$detail = $this->table->getSelectedData("*", array("id_u"=>$result->uid), "distributor")->row();
		}
		if(!$detail){
			$this->response(204, "ERROR", array("status"=>"Username atau Password Salah"));
			return;
		}
		$session = array(
			"uid_user"=>$result->uid,
			"uid_detail"=>$detail->uid,
			"level"=>$result->level,
			"nama"=>$detail->nama,
			"login"=>true,
		);
		if($result->level==2){
			$session["level_distributor"]=$detail->grup;
		}
		$this->session_s->set_login($session);
		$this->response(200, "OK");
	}
}
/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
?>