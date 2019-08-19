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

	public function editProfile()
	{
		$this->load->view('doctor/edit_profile');
	}

	public function viewEditStudent($id)
	{
		$data['student'] = $this->Nutrition_records->getNutritionRecordById($id);
		$this->load->view('doctor/edit_student',$data);
	}

	public function updateNutritionRecord($id)
	{
		//TODO: update nutrition record data (Antropometri ONLY)
		$data = array(
			'id_record' => 0,
			'id_student' => $id,
			'bb' => $this->input->post('bb'),
			'tb' => $this->input->post('tb'),
			'lila' => $this->input->post('lila'),
			'imt' => $this->input->post('imt'),
			'bbi' => $this->input->post('bbi'),
			'status' => $this->input->post('status'),
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
		$sheet->setCellValue('H1', 'Status');
		$sheet->setCellValue('I1', 'Tanggal Lahir');
		$sheet->setCellValue('J1', 'Pendidikan');
		$sheet->setCellValue('K1', 'Pekerjaan');
		$sheet->setCellValue('L1', 'Agama / suku');
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
			$sheet->setCellValue('H'.$i, $student['status']);
			$sheet->setCellValue('I'.$i, $student['birthdate']);
			$sheet->setCellValue('J'.$i, $student['education']);
			$sheet->setCellValue('K'.$i, $student['job']);
			$sheet->setCellValue('L'.$i, $student['religion']);
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