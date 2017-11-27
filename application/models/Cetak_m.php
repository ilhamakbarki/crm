<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cetak_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function barang($g)
	{
		return $this->db
		->select("barang.*, harga_barang.harga, distributor_grup.nama as level")
		->from("harga_barang")
		->join("barang","barang.uid=harga_barang.uid_barang")
		->join("distributor_grup","distributor_grup.uid=harga_barang.uid_dgrup")
		->where(array("harga_barang.uid_dgrup"=>$g))
		->get();		
	}

	public function excel($barang, $judul)
	{
		//Script Cetak
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
		date_default_timezone_set('Asia/Jakarta');

		if (PHP_SAPI == 'cli')
			die('This example should only be run from a Web Browser');

		/** Include PHPExcel */
		require_once APPPATH.'libraries\PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Rudyanto")
		->setTitle("Price List Tanggal ".date('d-m-y'))
		->setSubject("Price List Level ")
		->setDescription("Price List Barang dari Kusuma Agro Trading")
		->setCategory("Price List");


		// Add Header
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('F10', 'Jalan Abdul Gani Atas')
		->setCellValue('F11', 'PO. BOX. 36 BATU - MALANG - JAWA TIMUR')
		->setCellValue('F12', 'Phone       : 0341 - 524 944, 0341 - 59 3333 Ext 5139')
		->setCellValue('F13', 'Fax           : 0341 - 524 944')
		->setCellValue('B14', 'from')
		->setCellValue('B10', 'To')
		->setCellValue('B15', 'Re')
		->setCellValue('B16', 'Fax')
		->setCellValue('B17', 'email')
		->setCellValue('C14', ';Rudi Setiawan')
		->setCellValue('C15', ':  Up Date Price List.')
		->setCellValue('C16', ':  0341-524944')
		->setCellValue('C17', ':  trading.kusuma@gmail.com / trading@ka.co.id')
		->setCellValue('A21', 'UPDATE PRICE LIST TANGGAL '.date('d M y'))
		->setCellValue('A22', 'No')
		->setCellValue('B22', 'Kode')
		->setCellValue('C22', 'Nama')
		->setCellValue('D22', 'Satuan')
		->setCellValue('E22', 'Harga')
		->setCellValue('F22', 'Keterangan');

		//Setting Cell
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('A')->setWidth(5.43);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('B')->setWidth(15);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('C')->setWidth(37);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('D')->setWidth(10);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('E')->setWidth(14);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('F')->setWidth(19.5);
		$a21f21 = array(
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			),
			'font' => array(
				'bold'=>true,
				'size'=>'16'
			)
		);
		$objPHPExcel->getActiveSheet(0)->mergeCells("A21:F21");
		$objPHPExcel->getActiveSheet(0)->getStyle("A21:F21")->applyFromArray($a21f21);

		$a22f22 = array(
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			),
			'font' => array(
				'bold'=>true,
				'size'=>'11'
			)
		);
		$objPHPExcel->getActiveSheet(0)->getStyle("A22:F22")->applyFromArray($a22f22);
		
		//Isi Table
		$total=$barang->num_rows()+22;
		$row = 23;
		$no = 1;
		foreach ($barang->result() as $data) {
			$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A'.$row, $no)
			->setCellValue('B'.$row, $data->kode)
			->setCellValue('C'.$row, $data->nama)
			->setCellValue('D'.$row, $data->satuan)
			->setCellValue('E'.$row, "Rp ".number_format($data->harga, 0));
			$no++;
			$row++;
		}

		$stylebd = array(
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			),
			'font' => array(
				'size'=>'11'
			)
		);
		$objPHPExcel->getActiveSheet(0)->getStyle("B23:B".$total)->applyFromArray($stylebd);
		$objPHPExcel->getActiveSheet(0)->getStyle("D23:D".$total)->applyFromArray($stylebd);

		$stylee = array(
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
			),
			'font' => array(
				'size'=>'11'
			)
		);
		$objPHPExcel->getActiveSheet(0)->getStyle("E23:E".$total)->applyFromArray($stylee);
		
		//Setting Border
		$border = array(
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN
				)
			)
		);
		$objPHPExcel->getActiveSheet(0)->getStyle("A22:F".$total)->applyFromArray($border);

		// Menambah gambar
		$kusuma = imagecreatefromjpeg(base_url('assets/img/kusuma.jpg'));
		$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
		$objDrawing->setName('Kusuma Agrowisata'); 
		$objDrawing->setDescription('Kusuma Agrowisata');
		$objDrawing->setImageResource($kusuma);
		$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
		$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
		$objDrawing->setHeight(120);
		$objDrawing->setCoordinates('B3');
		$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

		$organik = imagecreatefromjpeg(base_url('assets/img/organik.jpg'));
		$objOrganik = new PHPExcel_Worksheet_MemoryDrawing();
		$objOrganik->setName('Organik Indonesia'); 
		$objOrganik->setDescription('Organik Indonesia');
		$objOrganik->setImageResource($organik);
		$objOrganik->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
		$objOrganik->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
		$objOrganik->setHeight(120);
		$objOrganik->setCoordinates('F3');
		$objOrganik->setWorksheet($objPHPExcel->getActiveSheet());

		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Update Price List');

		// Redirect output to a client’s web browser (Excel2007)
		//header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header("Content-Disposition: attachment;filename='$judul'");
		header('Cache-Control: max-age=0');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
		$objWriter->save('php://output');
		exit();
	}

}

/* End of file Cetak_m.php */
/* Location: ./application/models/Cetak_m.php */