<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distributor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->load->model('Session','session_s');
		$this->load->library('session');
		if($this->session_s->check_login()){
			if($this->session->userdata("level")!=1){
				redirect('login','refresh');
			}
		}else{
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_table('distributor');
		$crud->set_relation('grup','distributor_grup','nama');
		$crud->set_relation('id_u','user','user','level=2');
		$crud->display_as('pt','PT');
		$crud->display_as('id_u','Username');
		$crud->display_as('grup','Level Perusahaan');
		$output = $crud->render();
		$atr = (array)$output;
		$atr["judul_menu"] ="Distributor";
		$atr["desk_menu"] ="Semua data distributor disini";
		$atr["content"] ="admin/distributor/distributor-list-coba";
		$this->load->view('admin/template', $atr);
		/*$atr = array(
			"judul_menu"=>"Distributor",
			"desk_menu"=>"Semua data distributor disini"
			);
		$atr['content']="admin/distributor/list-distributor";
		$this->load->view('admin/template', $atr);*/
	}

	/*public function edit($id=null)
	{
		if($id!=null){
			$atr["distributor"]=$id;			
		}
		$atr = array(
			"judul_menu"=>"Edit Distributor ",
			"desk_menu"=>"Untuk merubah data distributor",
			"content"=>"admin/distributor/distributor-edit"
			);
		$this->load->view('admin/template', $atr);
		
	}

	public function delete($id=null)
	{
		if($id==null){
			redirect('error','refresh');
			return;
		}
		$atr = array(
			"judul_menu"=>"Hapus Distributor ".$id,
			"desk_menu"=>"Untuk menghapus distributor dari sistem"
			);
		$atr['content']="admin/distributor/distributor-del";
		$atr['distributor']=$id;
		$this->load->view('admin/template', $atr);
	}

	public function add()
	{
		$atr = array(
			"judul_menu"=>"Tambah Distributor",
			"desk_menu"=>"Untuk menambahkan distributor baru kedalam sistem"
			);
		$atr['content']="admin/distributor/distributor-add";
		$this->load->view('admin/template', $atr);
	}
*/
}

/* End of file Distributor.php */
/* Location: ./application/controllers/admin/Distributor.php */ ?>