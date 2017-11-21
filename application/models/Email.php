<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function send_mail($subject, $to, $message)
	{
		$this->load->library('email');
		$this->load->model('setting');
		$config = $this->setting->config_mail();
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->to($to);
		$this->email->from($config["smtp_user"],'Trading Kusuma');
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
	}

}

/* End of file Email.php */
/* Location: ./application/models/Email.php */