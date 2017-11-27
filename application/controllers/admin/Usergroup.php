<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usergroup extends CI_Controller {

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
		$atr["judul_menu"] ="Level Pengguna";
		$atr["desk_menu"] ="Semua data level pengguna disini";
		$atr["content"] ="admin/usergroup/list";
		$this->load->view('admin/template', $atr);
	}

	public function edit($id=null)
	{
		$this->load->model('Table','table');
		$atr = array(
			"judul_menu"=>"Edit User Level",
			"desk_menu"=>"Untuk merubah user level",
			'content'=>"admin/usergroup/edit",
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
			"judul_menu"=>"Hapus User level ".$id,
			"desk_menu"=>"Untuk menghapus user level dari sistem"
		);
		$atr['content']="admin/usergroup/del";
		$atr['user']=$id;
		$this->load->view('admin/template', $atr);
	}

	public function add()
	{
		$atr = array(
			"judul_menu"=>"Tambah User Level",
			"desk_menu"=>"Untuk menambahkan user level baru kedalam sistem"
		);
		$atr['content']="admin/usergroup/add";
		$this->load->view('admin/template', $atr);
	}

	public function list_selectize()
	{
		$this->load->model('Selectize','selectize');
		$result = $this->selectize->getSelectize(array("nama"=>$this->input->post('key', TRUE)),"user_level")->result();
		if($result){
			foreach ($result as $i) {
				$data[] = array("value"=>$i->uid,"text"=>$i->nama);
			}
			echo json_encode($data);
		}
	}
}

/* End of file Usergroup.php */
/* Location: ./application/controllers/Usergroup.php */