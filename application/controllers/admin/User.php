<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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
		$atr["judul_menu"] ="Daftar User Login";
		$atr["desk_menu"] ="Semua user login disini";
		$atr['content']="admin/user/user-list";
		$this->load->view('admin/template', $atr);
	}

	public function edit($id=null)
	{
		$this->load->model('Table','table');
		$atr = array(
			"judul_menu"=>"Edit User ",
			"desk_menu"=>"Untuk merubah user",
			'content'=>"admin/user/user-edit",
			"id"=>$id,
			"level"=>$this->table->getAll("user_level")->result()
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
			"judul_menu"=>"Hapus User ".$id,
			"desk_menu"=>"Untuk menghapus user dari sistem"
			);
		$atr['content']="admin/user/user-del";
		$atr['user']=$id;
		$this->load->view('admin/template', $atr);
	}

	public function add()
	{
		$this->load->model('Table','table');
		$atr = array(
			"judul_menu"=>"Tambah User",
			"desk_menu"=>"Untuk menambahkan user baru kedalam sistem",
			"level"=>$this->table->getAll("user_level")->result()
			);
		$atr['content']="admin/user/user-add";
		$this->load->view('admin/template', $atr);
	}

	public function list_selectize()
	{
		$this->load->model('Selectize','selectize');
		$result = $this->selectize->getSelectize(array("user"=>$this->input->post('key', TRUE)),"user")->result();
		if($result){
			foreach ($result as $i) {
				$data[] = array("value"=>$i->uid,"text"=>$i->user);
			}
			echo json_encode($data);
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */ ?>