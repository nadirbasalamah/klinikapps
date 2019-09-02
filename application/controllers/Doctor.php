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
		$bb = $this->input->post('bb');
		$tb = $this->input->post('tb');
		$imt = $bb / pow($tb,2);
		$status = $this->checkImt($imt);
		
		$energi = $this->input->post('energi');
		$persen_karbohidrat = $this->input->post('persen_karbohidrat');
		$gram_karbohidrat = ($persen_karbohidrat / 100) * $energi / 4;

		$persen_protein = $this->input->post('persen_protein');
		$gram_protein = ($persen_protein / 100) * $energi / 4;
		
		$persen_lemak = $this->input->post('persen_lemak');
		$gram_lemak = ($persen_lemak / 100) * $energi / 9;

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
		echo("<script>alert('Data profil gizi siswa berhasil diubah!')</script>");
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
		$link = " https://api.whatsapp.com/send?phone=". $phone_number . "&text=" . $message;
		header("location:" . $link);
	}

	public function exportToExcel()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'ID_Patient');
		$sheet->setCellValue('B1', 'Nama Lengkap');
		$sheet->setCellValue('C1', 'Umur');
		$sheet->setCellValue('D1', 'Jenis Kelamin');
		$sheet->setCellValue('E1', 'Alamat');
		$sheet->setCellValue('F1', 'Nomor Telepon');
		$sheet->setCellValue('G1', 'Email');
		$sheet->setCellValue('H1', 'Tanggal Lahir');
		$sheet->setCellValue('I1', 'Pendidikan');
		$sheet->setCellValue('J1', 'Pekerjaan');
		$sheet->setCellValue('K1', 'Agama / suku');
		$i = 2;

		
		$data = $this->Patients->getAllPatients();
		foreach($data as $patient) {
			$sheet->setCellValue('A'.$i, $patient['id_patient']);
			$sheet->setCellValue('B'.$i, $patient['fullname']);
			$sheet->setCellValue('C'.$i, $patient['age']);
			$sheet->setCellValue('D'.$i, $patient['gender']);
			$sheet->setCellValue('E'.$i, $patient['address']);
			$sheet->setCellValue('F'.$i, $patient['phone_number']);
			$sheet->setCellValue('G'.$i, $patient['email']);
			$sheet->setCellValue('H'.$i, $patient['birthdate']);
			$sheet->setCellValue('I'.$i, $patient['education']);
			$sheet->setCellValue('J'.$i, $patient['job']);
			$sheet->setCellValue('K'.$i, $patient['religion']);
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
		$writer->save('Report_Data_Siswa.xlsx');
		force_download('Report_Data_Siswa.xlsx', NULL);

	}

	public function getPatient()
	{
		$fullname = $this->input->post('patient_name');
		$data['patients'] = $this->Patients->getPatientByName($fullname);
		$this->load->view('doctor/patients_result',$data);
	}
}