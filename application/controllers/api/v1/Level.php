<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Level extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Table','table');
	}

	public function index()
	{
		$json = json_decode(file_get_contents('php://input'));
		if(!isset($json->m) || !isset($json->platfrom)){
			$this->response(204, "ERROR");
			return;
		}
		$allowedMethods = array(
			'add',
			'edit',
			'del',
			'getLevel'
			);
		$methodName = isset($json->m) ? $json->m : '';
		$this->run($methodName, $allowedMethods, $json);
	}

	private function getLevel($json)
	{
		if(!isset($json->uid)){
			$this->response(204, "ERROR");
			return;
		}
		$item = $this->table->getSelectedData("*",array("uid"=>$json->uid),"distributor_grup")->row();
		if(!$item){
			$this->response(204,"Error");
			return;
		}
		$this->response(200,"",$item);
	}

	private function add($json)
	{
		if(!isset($json->nama) || !isset($json->persentasi_jual)){
			$this->response(204, "ERROR");
			return;
		}
		$level=array(
			"nama"=>$json->nama,
			"persentasi_jual"=>$json->persentasi_jual
			);
		$result=$this->table->add($level, "distributor_grup");
		if(!$result['status']){
			$this->response(204, "ERROR");
			return;
		}
		$uid = $this->table->getSelectedData("*", $level, "distributor_grup")->row()->uid;
		$item=$this->table->getAll("barang")->result();
		foreach ($item as $i) {
			$result = $this->table->add(array("uid_barang"=>$i->uid, "uid_dgrup"=>$uid, "harga"=>($i->beli*$level['persentasi_jual']/100)+$i->beli), "harga_barang");
			if(!$result['status']){
				$this->table->del(array("uid_dgrup"=>$uid), "harga_level");
				$this->table->del(array("uid"=>$uid), "distributor_grup");
				$this->response(204, "ERROR");
				return;
			}
		}
		$this->response(200, "OK");
	}

	private function edit($json)
	{
		if(!isset($json->uid)|| !isset($json->nama) || !isset($json->persentasi_jual)){
			$this->response(204, "ERROR");
			return;
		}
		$before = $this->table->getSelectedData("*", array("uid"=>$json->uid), "distributor_grup")->row();
		if(!$before){
			$this->response(204,"ERROR");
			return;
		}
		if($before->persentasi_jual!=$json->persentasi_jual){
			$ganti = true;
		}else{
			$ganti = false;
		}
		$level=array(
			"uid"=>$json->uid,
			"nama"=>$json->nama,
			"persentasi_jual"=>$json->persentasi_jual,
			);
		$result=$this->table->update($level, array("uid"=>$json->uid), "distributor_grup");
		if(!$result['status']){
			$this->response(204, "ERROR");
			return;
		}
		if($ganti){
			$item=$this->table->getAll("barang")->result();
			foreach ($item as $i) {
				$result = $this->table->update(array("harga"=>($i->beli*$level['persentasi_jual']/100)+$i->beli), array("uid_dgrup"=>$json->uid, "uid_barang"=>$i->uid) ,"harga_barang");
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
		$result=$this->table->del(array("uid_dgrup"=>$json->uid),"harga_barang");
		if(!$result['status']){
			$this->response(204, "ERROR");
			return;
		}
		$result=$this->table->del(array("uid"=>$json->uid),"distributor_grup");
		if(!$result['status']){
			$this->response(204, "ERROR");
			return;
		}
		$this->response(200, "OK");
	}

	private function run($method, array $allowedMethods, $data=null)
	{
		$allowed = array_search($method, $allowedMethods);
		if($allowed !== false){
			$this->{$method}($data);
		}else{
			$this->response(204, "Cannot found method");
		}
	}

	public function datatable()
	{
		$this->load->model('Level_m','level');
		header("Content-Type: application/json");
		echo $this->level->data();
	}

}

/* End of file Level.php */
/* Location: ./application/controllers/Level.php */