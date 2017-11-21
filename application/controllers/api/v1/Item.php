<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Table','table');
	}

	public function index()
	{
		$json = json_decode(file_get_contents('php://input'));
		if(isset($json->platfrom)||isset($json->m)){
			if($json->platfrom=="web"){
				$this->load->model('Session');
				if(!$this->Session->check_login()){
					return;
				}
			}else{
				return;
			}
		}else{
			$this->response(204, "Params");
			return;
		}
		$allowedMethods = array(
			'add',
			'edit',
			'del',
			'getItem'
		);
		$methodName = isset($json->m) ? $json->m : '';
		$this->run($methodName, $allowedMethods, $json);
	}

	private function getItem($json)
	{
		if(!isset($json->uid)){
			$this->response(204, "ERROR");
			return;
		}
		$item = $this->table->getSelectedData("*",array("uid"=>$json->uid),"barang")->row();
		if(!$item){
			$this->response(204,"Error");
			return;
		}
		$pitem = $this->table->getSelectedData("*",array("uid_barang"=>$json->uid),"harga_barang")->result();
		$this->response(200,"",array("item"=>$item, "d_item"=>$pitem));
	}

	private function add($json)
	{
		if(!isset($json->kode)||!isset($json->nama)||!isset($json->satuan)||!isset($json->stok)||!isset($json->beli)){
			$this->response(204, "ERROR");
			return;
		}
		$d_grup = $this->table->getAll("distributor_grup")->result();
		foreach ($d_grup as $grup) {
			if(!isset($json->{"K".$grup->uid})){
				$this->response(204, "ERROR");
				return;
			}
		}
		$barang=array(
			"kode"=>$json->kode,
			"nama"=>$json->nama,
			"satuan"=>$json->satuan,
			"stok"=>$json->stok,
			"beli"=>$json->beli
		);
		$result=$this->table->add($barang, "barang");
		if(!$result['status']){
			$this->response(204, "ERROR");
			return;
		}
		$uid = $this->table->getSelectedData("*", $barang, "barang")->row()->uid;
		foreach ($d_grup as $grup) {
			$t=array(
				"uid_barang"=>$uid,
				"uid_dgrup"=>$grup->uid,
				"harga"=>$json->{"K".$grup->uid}
			);
			$result=$this->table->add($t, "harga_barang");
			if(!$result['status']){
				$this->table->del(array("uid_barang"=>$uid), "harga_barang");
				$this->table->del(array("uid"=>$uid), "barang");
				$this->response(204, "ERROR");
				return;
			}
		}
		$this->response(200, "OK");
	}

	private function edit($json)
	{
		if(!isset($json->kode)||!isset($json->nama)||!isset($json->satuan)||!isset($json->stok)||!isset($json->beli)||!isset($json->uid)){
			$this->response(204, "ERROR");
			return;
		}
		$d_grup = $this->table->getAll("distributor_grup")->result();
		foreach ($d_grup as $grup) {
			if(!isset($json->{"K".$grup->uid})){
				$this->response(204, "ERROR");
				return;
			}
		}
		$barang=array(
			"kode"=>$json->kode,
			"nama"=>$json->nama,
			"satuan"=>$json->satuan,
			"stok"=>$json->stok,
			"beli"=>$json->beli
		);
		$result=$this->table->update($barang, array("uid"=>$json->uid), "barang");
		if(!$result['status']){
			$this->response(204, "ERROR");
			return;
		}
		foreach ($d_grup as $grup) {
			$result=$this->table->update(array("harga"=>$json->{"K".$grup->uid}),array("uid_barang"=>$json->uid, "uid_dgrup"=>$grup->uid), "harga_barang");
			if(!$result['status']){
				$this->table->del(array("uid_barang"=>$uid), "harga_barang");
				$this->table->del(array("uid"=>$uid), "barang");
				$this->response(204, "ERROR");
				return;
			}
		}
		$this->response(200, "OK");
	}

	private function del($json)
	{
		if(!isset($json->uid)){
			$this->response(204, "ERROR");
			return;
		}
		$result=$this->table->del(array("uid_barang"=>$json->uid),"harga_barang");
		if(!$result['status']){
			$this->response(204, "ERROR");
			return;
		}
		$result=$this->table->del(array("uid"=>$json->uid),"barang");
		if(!$result['status']){
			$this->response(204, "ERROR");
			return;
		}
		$this->response(200, "OK");
	}

	function datatable()
	{
		header("Content-Type: application/json");
		$this->load->model('Item_m','barang');
		echo $this->barang->data();
	}

	private function run($method, array $allowedMethods, $data=null){
		$allowed = array_search($method, $allowedMethods);
		if($allowed !== false){
			$this->{$method}($data);
		}else{
			$this->response(204, "Cannot found method");
		}
	}

}

/* End of file Item.php */
/* Location: ./application/controllers/Item.php */