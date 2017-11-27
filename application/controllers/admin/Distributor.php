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
		$atr["judul_menu"] ="Distributor";
		$atr["desk_menu"] ="Semua data distributor disini";	
		$atr['content']="admin/distributor/list-distributor";
		$this->load->view('admin/template', $atr);
	}

	public function edit($id=null)
	{
		$atr = array(
			"judul_menu"=>"Edit Distributor ",
			"desk_menu"=>"Untuk merubah data distributor",
			"content"=>"admin/distributor/distributor-edit"
		);
		$atr["distributor"]=$id;
		$this->load->model('Table','table');
		$atr['level']=$this->table->getAll("distributor_grup")->result();
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
		$this->load->model('Table','table');
		$atr = array(
			"judul_menu"=>"Tambah Distributor",
			"desk_menu"=>"Untuk menambahkan distributor baru kedalam sistem"
		);
		$atr['level']=$this->table->getAll("distributor_grup")->result();
		$atr['content']="admin/distributor/distributor-add";
		$this->load->view('admin/template', $atr);
	}

	public function list_selectize(){
		$this->load->model('Selectize','selectize');
		$result = $this->selectize->getUserDistributor(array("level"=>$this->input->post('key', TRUE)))->result();
		if($result){
			foreach ($result as $i) {
				$data[] = array("value"=>$i->uid,"text"=>$i->user);
			}
			echo json_encode($data);
		}
	}

	public function list_selectize_distributor($value='')
	{
		$this->load->model('Selectize','selectize');
		$result = $this->selectize->getSelectize(array("uid"=>$this->input->post('key', TRUE)), "distributor")->result();
		if($result){
			foreach ($result as $i) {
				$data[] = array("value"=>$i->uid,"text"=>$i->nama);
			}
			echo json_encode($data);
		}
	}
}

/* End of file Distributor.php */
/* Location: ./application/controllers/admin/Distributor.php */ ?>