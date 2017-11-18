<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$atr=$this->getAttr();
		$atr['content']="admin/item/list-item";
		$this->load->view('admin/template', $atr);
	}

	public function edit($id=null)
	{
		$this->load->model('Table','table');
		$atr = array(
			"judul_menu"=>"Edit Barang",
			"desk_menu"=>"Untuk merubah data barang",
			"content"=>"admin/item/item-edit",
			"id_item"=>$id,
			"d_grup"=>$this->table->getAllOrder("distributor_grup", array("nama", "asc"))->result()
			);
		$this->load->view('admin/template', $atr);
	}

	public function list_selectize(){
		$this->load->model('Selectize','selectize');
		$result = $this->selectize->getSelectize(array("kode"=>$this->input->post('key', TRUE),"nama"=>$this->input->post('key', TRUE)),"barang")->result();
		if($result){
			foreach ($result as $i) {
				$data[] = array("value"=>$i->uid,"text"=>$i->kode." | ".$i->nama);
			}
			echo json_encode($data);
		}
	}

	public function delete($id=null)
	{
		if($id==null){
			redirect('error','refresh');
			return;
		}
		$atr = array(
			"judul_menu"=>"Hapus Barang ".$id,
			"desk_menu"=>"Untuk menghapus barang dari sistem"
			);
		$atr['content']="admin/item/item-del";
		$atr['item']=$id;
		$this->load->view('admin/template', $atr);
	}

	public function add()
	{
		$this->load->model('Table','table');
		$atr = array(
			"judul_menu"=>"Tambah Barang",
			"desk_menu"=>"Untuk menambahkan barang baru kedalam sistem",
			"content"=>"admin/item/item-add",
			"d_grup"=>$this->table->getAll("distributor_grup")->result()
			);
		$this->load->view('admin/template', $atr);
	}

	private function getAttr()
	{
		$t = array(
			"judul_menu"=>"Data Barang",
			"desk_menu"=>"Semua data barang produk disini"
			);
		return $t;
	}

}

/* End of file Item.php */
/* Location: ./application/controllers/Item.php */ ?>