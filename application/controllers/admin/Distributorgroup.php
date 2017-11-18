<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distributorgroup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$atr["judul_menu"] ="Grup Distributor";
		$atr["desk_menu"] ="Semua data grup distributor disini";
		$atr['content']="admin/distributor/list-group-distributor";
		$this->load->view('admin/template', $atr);
	}

	public function edit($id=null)
	{
		$atr = array(
			"judul_menu"=>"Edit Level Distributor ",
			"desk_menu"=>"Untuk merubah level distributor",
			'content'=>"admin/distributor/distributor-group-edit",
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
			"judul_menu"=>"Hapus Level Distributor ".$id,
			"desk_menu"=>"Untuk menghapus level distributor dari sistem"
			);
		$atr['content']="admin/distributor/distributor-group-del";
		$atr['distributor']=$id;
		$this->load->view('admin/template', $atr);
	}

	public function add()
	{
		$atr = array(
			"judul_menu"=>"Tambah Level Distributor",
			"desk_menu"=>"Untuk menambahkan level distributor baru kedalam sistem"
			);
		$atr['content']="admin/distributor/distributor-group-add";
		$this->load->view('admin/template', $atr);
	}

	public function list_selectize()
	{
		$this->load->model('Selectize','selectize');
		$result = $this->selectize->getSelectize(array("nama"=>$this->input->post('key', TRUE)),"distributor_grup")->result();
		if($result){
			foreach ($result as $i) {
				$data[] = array("value"=>$i->uid,"text"=>$i->nama);
			}
			echo json_encode($data);
		}
	}
}

/* End of file Distributorgroup.php */
/* Location: ./application/controllers/Distributorgroup.php */ ?>