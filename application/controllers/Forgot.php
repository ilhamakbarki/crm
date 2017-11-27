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

	public function sendForgotP()
	{
		$json = json_decode(file_get_contents('php://input'));
		if(!isset($json->email)){
			$this->response(204, "ERROR PARAM");
			return;
		}
		$this->load->model('Notif_m','notif');
		$this->load->model('email','email_m');
		$d = $this->notif->getUser(array("distributor.email"=>$json->email))->row();
		if(!$d){
			$this->response(204, "Email belum terdaftar silahkan hubungi kusuma agro");
			return;
		}
		$this->load->model('User_m');
		$this->load->model('Table','table');
		$token = $this->User_m->generateRandomString(rand(23, 35));
		$this->table->update(array("token_forgot"=>$token, "forgot_time"=>date('Y-m-d H:i:s')), array("uid"=>$d->id_u), "user");
		$message = "<p>Selamat sore ".$d->nama."</p>
		<p>Berikut link lupa password silahkan klik dan ganti password anda :</p>
		<p>&nbsp;</p><p><a title='Lupa Password' href='".base_url('forgot/check/').$token."' target='_blank' rel='noopener'>".base_url('forgot/check/').$token."</a></p>
		<p><strong>Username : ".$d->user."</strong></p>
		<p>Salam</p>
		<p>Trading Kusuma Agro</p>
		";
		if(!$this->email_m->send_mail("Lupa Password Kusuma Trading", $d->email, $message)){
			$this->response(204, "ERROR SEND MAIL");
			return;
		}
		$this->response(200, "OK");
	}
	
}

/* End of file Forgot.php */
/* Location: ./application/controllers/Forgot.php */ ?>