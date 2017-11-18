<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Createpwd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo crypt('kusumaagro','$6$3h2aNvRm&shGWEsaWeo42iqILsiPowjUjskKkli9koitJkl$');
	}

}

/* End of file Createpwd.php */
/* Location: ./application/controllers/Createpwd.php */