<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'vendor\autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as excelWriter;

class Doctor extends CI_Controller {
    public function __construct() {
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->helper('url'); 
		$this->load->helper('download');		
		
		$this->load->library('form_validation');
		$this->load->library('session');

		$this->load->model('Users');
		$this->load->model('Patients');
        $this->load->model('Nutrition_records');
    }

    public function index()
    {
        $this->load->view('doctor/index');
	}
	
	public function viewPatients()
	{
		$data['patients'] = $this->Patients->getAllPatients();
		$this->load->view('doctor/patients_list',$data);
	}

	public function viewPatient($id)
	{
		$data['patient'] = $this->Nutrition_records->getNutritionRecordById($id);
		$this->load->view('doctor/view_patient',$data);
	}

	public function editProfile()
	{
		$this->load->view('doctor/edit_profile');
	}

	public function viewEditPatient($id)
	{
		$data['record'] = $this->Nutrition_records->getNutritionRecordById($id);
		if ($data['record'] !== null) {
			$this->load->view('doctor/edit_patient',$data);
		} else {
			$data['patient'] = $this->Patients->getPatientById($id);
			$this->load->view('doctor/add_nutrition_rec',$data);
		}
	}

	public function checkImt($imt)
	{
		if ($imt < 18.5) {
			return "underweight";
		} else if($imt >= 18.5 && $imt <= 22.9) {
			return "normal";
		} else if($imt >= 23 && $imt <= 29.9) {
			return "overweight";
		} else {
			return "obese";
		}
	}

	public function updateNutritionRecord($id)
	{
		$nut_record = $this->Nutrition_records->getNutritionRecordById($id);
		if (empty($nut_record) !== true) {
			foreach ($nut_record as $rec) {
				$gbr_tb_bb = $rec->gambar_tb_bb;
				$gbr_bb_u = $rec->gambar_bb_u;
				$gbr_tb_u = $rec->gambar_tb_u;
				$gbr_imt_u = $rec->gambar_imt_u;
				$gbr_hc_u = $rec->gambar_hc_u;
			}
		}
		$bb = $this->input->post('bb');
		$tb = $this->input->post('tb');
		$imt = $bb / pow(($tb / 100),2);
		$status = $this->checkImt($imt);
		
		$energi = $this->input->post('energi');
		$persen_karbohidrat = $this->input->post('persen_karbohidrat');
		$gram_karbohidrat = ($persen_karbohidrat / 100) * $energi / 4;

		$persen_protein = $this->input->post('persen_protein');
		$gram_protein = ($persen_protein / 100) * $energi / 4;
		
		$persen_lemak = $this->input->post('persen_lemak');
		$gram_lemak = ($persen_lemak / 100) * $energi / 9;

		$new_name = time().$_FILES['gambar_tb_bb']['name'];
		$config['upload_path'] = FCPATH ."./graph_pictures/";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config); 
		$this->upload->initialize($config);        
		if ( ! $this->upload->do_upload('gambar_tb_bb'))  {
			if ($nut_record !== null) {
				$gambar_tb_bb = $gbr_tb_bb;
			} else {
				$gambar_tb_bb = $this->session->userdata['logged_in']['profile_picture'];
			}
		}
		else
		{ 
			$upload_data = $this->upload->data();
			$gambar_tb_bb = $upload_data['file_name'];
		}

		$new_name2 = time().$_FILES['gambar_bb_u']['name'];
		$config['upload_path'] = FCPATH ."./graph_pictures/";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $new_name2;
		$this->load->library('upload', $config); 
		$this->upload->initialize($config);        
		if ( ! $this->upload->do_upload('gambar_bb_u'))  {
			if ($nut_record !== null) {
				$gambar_bb_u = $gbr_bb_u;
			} else {
				$gambar_bb_u = $this->session->userdata['logged_in']['profile_picture'];
			
			}
		}
		else
		{ 
			$upload_data = $this->upload->data();
			$gambar_bb_u = $upload_data['file_name'];
		}

		$new_name3 = time().$_FILES['gambar_tb_u']['name'];
		$config['upload_path'] = FCPATH ."./graph_pictures/";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $new_name3;
		$this->load->library('upload', $config); 
		$this->upload->initialize($config);        
		if ( ! $this->upload->do_upload('gambar_tb_u'))  {
			if ($nut_record !== null) {
				$gambar_tb_u = $gbr_tb_u;
			} else {
				$gambar_tb_u = $this->session->userdata['logged_in']['profile_picture'];
			
			}
		}
		else
		{ 
			$upload_data = $this->upload->data();
			$gambar_tb_u = $upload_data['file_name'];
		}

		$new_name4 = time().$_FILES['gambar_imt_u']['name'];
		$config['upload_path'] = FCPATH ."./graph_pictures/";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $new_name4;
		$this->load->library('upload', $config); 
		$this->upload->initialize($config);        
		if ( ! $this->upload->do_upload('gambar_imt_u'))  {
			if ($nut_record !== null) {
				$gambar_imt_u = $gbr_imt_u;
			} else {
				$gambar_imt_u = $this->session->userdata['logged_in']['profile_picture'];
			}
		}
		else
		{ 
			$upload_data = $this->upload->data();
			$gambar_imt_u = $upload_data['file_name'];
		}

		$new_name5 = time().$_FILES['gambar_hc_u']['name'];
		$config['upload_path'] = FCPATH ."./graph_pictures/";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $new_name5;
		$this->load->library('upload', $config); 
		$this->upload->initialize($config);        
		if ( ! $this->upload->do_upload('gambar_hc_u'))  {
			if ($nut_record !== null) {
				$gambar_hc_u = $gbr_hc_u;
			} else {
				$gambar_hc_u = $this->session->userdata['logged_in']['profile_picture'];
			}
		}
		else
		{ 
			$upload_data = $this->upload->data();
			$gambar_hc_u = $upload_data['file_name'];
		}

		$data = array(
			'id_record' => 0,
			'id_patient' => $id,
			'bb' => $bb,
			'tb' => $tb,
			'lila' => $this->input->post('lila'),
			'imt' => $imt,
			'bbi' => $this->input->post('bbi'),
			'status' => $status,
			'fat' => $this->input->post('fat'),
			'visceral_fat' => $this->input->post('visceral_fat'),
			'muscle' => $this->input->post('muscle'),
			'body_age' => $this->input->post('body_age'),
			'gda' => $this->input->post('gda'), 
			'gdp' => $this->input->post('gdp'), 
			'gd2jpp' => $this->input->post('gd2jpp'), 
			'asam_urat' => $this->input->post('asam_urat'), 
			'trigliserida' => $this->input->post('trigliserida'), 
			'kolesterol' => $this->input->post('kolesterol'), 
			'ldl' => $this->input->post('ldl'), 
			'hdl' => $this->input->post('hdl'), 
			'ureum' => $this->input->post('ureum'), 
			'kreatinin' => $this->input->post('kreatinin'), 
			'sgot' => $this->input->post('sgot'), 
			'sgpt' => $this->input->post('sgpt'), 
			'tensi' => $this->input->post('tensi'), 
			'rr' => $this->input->post('rr'), 
			'suhu' => $this->input->post('suhu'),
			'lainnya' => $this->input->post('lainnya'), 
			'oedema' => $this->input->post('oedema'), 
			'aktivitas' => $this->input->post('aktivitas'), 
			'durasi_olahraga' => $this->input->post('durasi_olahraga'), 
			'jenis_olahraga' => $this->input->post('jenis_olahraga'), 
			'diagnosa_dahulu' => $this->input->post('diagnosa_dahulu'), 
			'diagnosa_skrg' => $this->input->post('diagnosa_skrg'), 
			'nafsu_makan' => $this->input->post('nafsu_makan'), 
			'frekuensi_makan' => $this->input->post('frekuensi_makan'), 
			'alergi' => $this->input->post('alergi'), 
			'makanan_kesukaan' => $this->input->post('makanan_kesukaan'), 
			'dietary_nasi' => preg_replace('~(?<=\s)\s~', '&nbsp;', $this->input->post('dietary_nasi')) , 
			'dietary_lauk_hewani' => $this->input->post('dietary_lauk_hewani'), 
			'dietary_lauk_nabati' => $this->input->post('dietary_lauk_nabati'), 
			'dietary_sayur' => $this->input->post('dietary_sayur'), 
			'dietary_sumber_minyak' => $this->input->post('dietary_sumber_minyak'), 
			'dietary_minuman' => $this->input->post('dietary_minuman'), 
			'dietary_softdrink' => $this->input->post('dietary_softdrink'), 
			'dietary_jus' => $this->input->post('dietary_jus'), 
			'dietary_suplemen' => $this->input->post('dietary_suplemen'), 
			'dietary_lainnya' => $this->input->post('dietary_lainnya'), 
			'lain_lain' => $this->input->post('lain_lain'), 
			'diagnosa' => $this->input->post('diagnosa'),
			'angka_tb_bb' => $this->input->post('angka_tb_bb'),
			'gambar_tb_bb' => $gambar_tb_bb,
			'keterangan_tb_bb' => $this->input->post('keterangan_tb_bb'),
			'angka_bb_u' => $this->input->post('angka_bb_u'),
			'gambar_bb_u' => $gambar_bb_u,
			'keterangan_bb_u' => $this->input->post('keterangan_bb_u'),
			'angka_tb_u' => $this->input->post('angka_tb_u'),
			'gambar_tb_u' => $gambar_tb_u,
			'keterangan_tb_u' => $this->input->post('keterangan_tb_u'),
			'angka_imt_u' => $this->input->post('angka_imt_u'),
			'gambar_imt_u' => $gambar_imt_u,
			'keterangan_imt_u' => $this->input->post('keterangan_imt_u'),
			'angka_hc_u' => $this->input->post('angka_hc_u'),
			'gambar_hc_u' => $gambar_hc_u,
			'keterangan_hc_u' => $this->input->post('keterangan_hc_u'), 
			'energi' => $energi, 
			'keterangan_inter' => $this->input->post('keterangan_inter'),
			'persen_karbohidrat' => $persen_karbohidrat,
			'gram_karbohidrat' => $gram_karbohidrat, 
			'persen_protein' => $persen_protein, 
			'gram_protein' => $gram_protein, 
			'persen_lemak' => $persen_lemak,
			'gram_lemak' => $gram_lemak,
			'mon_date' => $this->input->post('mon_date'),
			'result' => $this->input->post('result')
		);
		$this->Nutrition_records->addNutritionRecord($data);
		echo("<script>alert('Data gizi pasien berhasil diubah!')</script>");
		redirect(base_url('Doctor/viewEditPatient/' . $id),'refresh');
	}

	public function sendMessage($id)
	{
		$phone_number = "";
		$patient = $this->Patients->getPatientById($id);
		$message = $this->input->post('message');
		foreach ($patient as $ptnt) {
			$phone_number .= $ptnt->phone_number;
		}
		$link = " https://api.whatsapp.com/send?phone=". $phone_number . "&text=" . rawurlencode($message);
		header("location:" . $link);
	}

	public function exportToExcel()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'ID_Patient');
		$sheet->setCellValue('B1', 'Nama Lengkap');
		$sheet->setCellValue('C1', 'Umur');
		$sheet->setCellValue('D1', 'BB (kg)');
		$sheet->setCellValue('E1', 'TB (cm)');
		$sheet->setCellValue('F1', 'HC (cm)');
		$sheet->setCellValue('G1', 'BB/TB');
		$sheet->setCellValue('H1', 'BB/U');
		$sheet->setCellValue('I1', 'TB/U');
		$sheet->setCellValue('J1', 'HC/U');
		$sheet->setCellValue('K1', 'Status Gizi');
		$sheet->setCellValue('L1', 'Evaluasi');
		$i = 2;

		
		$data = $this->Nutrition_records->getAllNutritionRecords();
		foreach($data as $patient) {
			$sheet->setCellValue('A'.$i, $patient->id_patient);
			$sheet->setCellValue('B'.$i, $patient->fullname);
			$sheet->setCellValue('C'.$i, $patient->age);
			$sheet->setCellValue('D'.$i, $patient->bb);
			$sheet->setCellValue('E'.$i, $patient->tb);
			$sheet->setCellValue('F'.$i, $patient->lila);
			$sheet->setCellValue('G'.$i, $patient->angka_tb_bb);
			$sheet->setCellValue('H'.$i, $patient->angka_bb_u);
			$sheet->setCellValue('I'.$i, $patient->angka_tb_u);
			$sheet->setCellValue('J'.$i, $patient->angka_hc_u);
			$sheet->setCellValue('K'.$i, $patient->status);
			$sheet->setCellValue('L'.$i, $patient->result);
			$i++;
		}
		
		$styleArray = [
					'borders' => [
						'allBorders' => [
							'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						],
					],
				];
		$i = $i - 1;
		$sheet->getStyle('A1:L'.$i)->applyFromArray($styleArray);

		$writer = new excelWriter($spreadsheet);
		$writer->save('Report_Data_Pasien.xlsx');
		force_download('Report_Data_Pasien.xlsx', NULL);

	}

	public function getPatient()
	{
		$fullname = $this->input->post('patient_name');
		$data['patients'] = $this->Patients->getPatientByName($fullname);
		$this->load->view('doctor/patients_result',$data);
	}
}