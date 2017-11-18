<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
	}

	public function index()
	{
		$r = new grocery_CRUD();
		$r->set_theme('datatables');
		$r->set_table('barang');
		$r->unset_add();
		$r->unset_edit();
		$r->unset_delete();
		$output = $r->render();
		$atr= (array) $output;

		$atr['judul_menu']="Data Barang";
		$atr['content']="distributor/item/item-list";
		$atr['desk_menu']="Semua data  barang disini";
		$this->load->view('distributor/template', $atr);
	}
}

/* End of file Item.php */
/* Location: ./application/controllers/distributor/Item.php */ ?>