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
		$this->load->model('Students');
        $this->load->model('Nutrition_records');
    }

    public function index()
    {
        $this->load->view('doctor/index');
	}
	
	public function viewStudents()
	{
		$data['students'] = $this->Students->getAllStudents();
		$this->load->view('doctor/students_list',$data);
	}

	public function viewStudent($id)
	{
		$data['student'] = $this->Nutrition_records->getNutritionRecordById($id);
		$this->load->view('doctor/view_student',$data);
	}

	public function editProfile()
	{
		$this->load->view('doctor/edit_profile');
	}

	public function viewEditStudent($id)
	{
		$data['record'] = $this->Nutrition_records->getNutritionRecordById($id);
		if ($data['record'] !== null) {
			$this->load->view('doctor/edit_student',$data);
		} else {
			$data['student'] = $this->Students->getStudentById($id);
			$this->load->view('doctor/add_nutrition_rec',$data);
		}
	}

	public function updateNutritionRecord($id)
	{
		//TODO: update monitoring data
		$data = array(
			'id_record' => 0,
			'id_student' => $id,
			'bb' => $this->input->post('bb'),
			'tb' => $this->input->post('tb'),
			'lila' => $this->input->post('lila'),
			'imt' => $this->input->post('imt'),
			'bbi' => $this->input->post('bbi'),
			'status' => $this->input->post('status'),
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
			'energi' => $this->input->post('energi'), 
			'persen_karbohidrat' => $this->input->post('persen_karbohidrat'),
			'gram_karbohidrat' => $this->input->post('gram_karbohidrat'), 
			'persen_protein' => $this->input->post('persen_protein'), 
			'gram_protein' => $this->input->post('gram_protein'), 
			'persen_lemak' => $this->input->post('persen_lemak'),
			'gram_lemak' => $this->input->post('gram_lemak'),
			'mon_date' => $this->input->post('mon_date'),
			'result' => $this->input->post('result')
		);
		$this->Nutrition_records->addNutritionRecord($data);
		echo("<script>alert('Data profil gizi siswa berhasil diubah!')</script>");
		redirect(base_url('Doctor/viewEditStudent/' . $id),'refresh');
	}

	public function exportToExcel()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'ID_Student');
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

		
		$data = $this->Students->getAllStudents();
		foreach($data as $student) {
			$sheet->setCellValue('A'.$i, $student['id_student']);
			$sheet->setCellValue('B'.$i, $student['fullname']);
			$sheet->setCellValue('C'.$i, $student['age']);
			$sheet->setCellValue('D'.$i, $student['gender']);
			$sheet->setCellValue('E'.$i, $student['address']);
			$sheet->setCellValue('F'.$i, $student['phone_number']);
			$sheet->setCellValue('G'.$i, $student['email']);
			$sheet->setCellValue('H'.$i, $student['birthdate']);
			$sheet->setCellValue('I'.$i, $student['education']);
			$sheet->setCellValue('J'.$i, $student['job']);
			$sheet->setCellValue('K'.$i, $student['religion']);
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

	public function getStudent()
	{
		$fullname = $this->input->post('student_name');
		$data['students'] = $this->Students->getStudentByName($fullname);
		$this->load->view('doctor/students_result',$data);
	}
}