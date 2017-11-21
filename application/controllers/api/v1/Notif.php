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

			}else{

			}
		}else{
			$this->response(204, "Params");
			return;
		}
		$allowedMethods = array(
			'sendUpdateHarga'
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
		if($json->receipt=="all"){
			$distributor = $this->notif->getAll()->result();
			foreach ($distributor as $d) 
			{
				$message = "<p>Selamat sore ".$d->nama."</p>
				<p>Kami sampaikan update harga terbaru dari kusuma agro, silahkan cek harga di link berikut ini :</p>
				<p>&nbsp;</p><p><a title='Distributor Kusuma Trading' href='http://127.0.0.1/crm/' target='_blank' rel='noopener'>http://127.0.0.1/crm/</a></p>
				<p><strong>Username : ".$d->user."</strong></p>
				<p><strong>Password : kusumaagro</strong></p>
				<p>&nbsp;</p>
				<p>Terimakasih atas bantuan dan kerjasamanya</p>
				<p>&nbsp;</p>
				<p>Salam</p>
				<p>Rudyanto</p>";
				$this->email_m->send_mail("UPDATE HARGA TANGGAL ".date("h/m/y"), $d->email, $message);
			}	
		}else{
			$d = $this->notif->getUser($json->receipt)->row();
			$message = "<p>Selamat sore ".$d->nama."</p>
			<p>Kami sampaikan update harga terbaru dari kusuma agro, silahkan cek harga di link berikut ini :</p>
			<p>&nbsp;</p><p><a title='Distributor Kusuma Trading' href='http://127.0.0.1/crm/' target='_blank' rel='noopener'>http://127.0.0.1/crm/</a></p>
			<p><strong>Username : ".$d->user."</strong></p>
			<p><strong>Password : kusumaagro</strong></p>
			<p>&nbsp;</p>
			<p>Terimakasih atas bantuan dan kerjasamanya</p>
			<p>&nbsp;</p>
			<p>Salam</p>
			<p>Rudyanto</p>";
			$this->email_m->send_mail("UPDATE HARGA TANGGAL ".date("h/m/y"), $d->email, $message);
		}
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