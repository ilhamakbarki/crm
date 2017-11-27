<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notif extends CI_Controller {

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
			'sendUpdateHarga',
			'sendForgotP'
		);
		$methodName = isset($json->m) ? $json->m : '';
		$this->run($methodName, $allowedMethods, $json);
	}

	private function sendUpdateHarga($json)
	{
		if(!isset($json->receipt)){
			$this->response(204, "ERROR");
			return;
		}
		$this->load->model('Notif_m','notif');
		$this->load->model('email','email_m');
		$d = $this->notif->getUser(array("distributor.uid"=>$json->receipt))->row();
		if(!$d){
			$this->response(204, "NO USER");
			return;
		}
		$message = "<p>Kepada ".$d->nama."</p>
		<p>Kami sampaikan update harga terbaru dari trading kusuma agro, silahkan cek harga di link berikut ini :</p>
		<p>&nbsp;</p><p><a title='Distributor Kusuma Trading' href='".base_url()."' target='_blank' rel='noopener'>".base_url()."</a></p><br>
		<p>Username : <strong>".$d->user."</strong></p>
		<p>Password<i>(default)</i> : <strong>kusumaagro</strong></p>
		<p>&nbsp;</p>
		<p>Terimakasih atas bantuan dan kerjasamanya</p>
		<p>&nbsp;</p>
		<p>Salam</p>
		<p>Rudyanto</p>";
		if(!$this->email_m->send_mail("UPDATE HARGA TANGGAL ".date("h/m/y"), $d->email, $message)){
			$this->response(204, "ERROR SEND MAIL");
			return;
		}
		$this->response(200, "OK");
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

/* End of file Notif.php */
/* Location: ./application/controllers/Notif.php */