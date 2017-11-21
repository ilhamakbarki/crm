<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function config_mail()
	{
		$config=array(
			"protocol"=>"smtp",
			"smtp_host"=>"smtp.gmail.com",
			"smtp_user"=>"trading.kusuma@gmail.com",
			"smtp_pass"=>"tradingkusuma12",
			"smtp_port"=>465,
			"smtp_crypto"=>"ssl",
			"mailtype"=>"html",
			"charset"=>"utf-8"
		);
		return $config;
	}

}

/* End of file Setting.php */
/* Location: ./application/models/Setting.php */