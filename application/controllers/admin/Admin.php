<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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
		$atr["judul_menu"] ="Admin";
		$atr["desk_menu"] ="Semua data admin pengguna disini";
		$atr["content"] ="admin/admin/list";
		$this->load->view('admin/template', $atr);
	}

	public function edit($id=null)
	{
		$this->load->model('Table','table');
		$atr = array(
			"judul_menu"=>"Edit Data Admin",
			"desk_menu"=>"Untuk merubah data admin",
			'content'=>"admin/admin/edit",
			"id"=>$id
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
			"judul_menu"=>"Hapus data admin ".$id,
			"desk_menu"=>"Untuk menghapus data admin dari sistem"
		);
		$atr['content']="admin/admin/del";
		$atr['user']=$id;
		$this->load->view('admin/template', $atr);
	}

	public function add()
	{
		$atr = array(
			"judul_menu"=>"Tambah Data Admin",
			"desk_menu"=>"Untuk menambahkan data Admin kedalam sistem"
		);
		$atr['content']="admin/admin/add";
		$this->load->view('admin/template', $atr);
	}

	public function list_selectize()
	{
		$this->load->model('Selectize','selectize');
		$result = $this->selectize->getSelectize(array("nama"=>$this->input->post('key', TRUE)),"admin")->result();
		if($result){
			foreach ($result as $i) {
				$data[] = array("value"=>$i->uid,"text"=>$i->nama);
			}
			echo json_encode($data);
		}
	}

	public function list_selectize_admin()
	{
		$this->load->model('Selectize','selectize');
		$result = $this->selectize->getUserAdmin(array("user"=>$this->input->post('key', TRUE)),"user")->result();
		if($result){
			foreach ($result as $i) {
				$data[] = array("value"=>$i->uid,"text"=>$i->user);
			}
			echo json_encode($data);
		}
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */