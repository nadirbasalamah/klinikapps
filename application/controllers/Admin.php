<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'vendor\autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as excelWriter;

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->helper('url'); 
		$this->load->helper('download');		
		
		$this->load->library('form_validation');
		$this->load->library('session');

		$this->load->model('Users');
		$this->load->model('Students');
	}

	public function index()
	{
		$this->load->view('admin/index');
	}	

	public function viewStudents()
	{
		$data['students'] = $this->Students->getAllStudents();
		$this->load->view('admin/students_list',$data);
	}

	public function editProfile()
	{
		$this->load->view('admin/edit_profile');
	}

	public function deleteStudent($id)
	{
		$result = $this->Students->deleteStudent($id);
		if ($result) {
			echo("<script>alert('Data siswa berhasil dihapus!')</script>");
			redirect(base_url('Admin/viewStudents'),'refresh');
		} else {
			echo("<script>alert('Proses penghapusan data siswa gagal!')</script>");
			redirect(base_url('Admin/viewStudents'),'refresh');
		}
	}

	public function viewEditStudent($id)
	{
		$data['student'] = $this->Students->getStudentById($id);
		$this->load->view('admin/edit_student',$data);
	}

	public function editStudent($id)
	{
		$data = array(
			'id' => $id,
			'fullname' => $this->input->post('fullname'),
			'address' => $this->input->post('address'),
			'phone_number' => $this->input->post('phone_number'),
			'email' => $this->input->post('email'),
			'status' => $this->input->post('status')
		);
		$this->Students->updateStudent($data);
		echo("<script>alert('Data profil siswa berhasil diubah!')</script>");
		redirect(base_url('Admin/viewStudents'),'refresh');
	}

	public function viewAddStudent()
	{
		$this->load->view('admin/add_student');
	}

	public function addStudent()
	{
		$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('birthdate', 'Tanggal Lahir', 'callback_checkDateFormat');
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('age', 'Umur', 'trim|required');
		$this->form_validation->set_rules('phone_number', 'Nomor ponsel', 'trim|required');
		$this->form_validation->set_rules('email', 'Alamat Email', 'trim|required');
		$this->form_validation->set_rules('address', 'Alamat Tempat Tinggal', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_message('checkDateFormat', 'Format tanggal salah (gunakan format:dd/mm/yyyy)');

		$new_name = time().$_FILES["profile_picture"]['name'];
		$config['upload_path'] = FCPATH ."./profile_pictures/";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config); 
		$this->upload->initialize($config);        
		if ( ! $this->upload->do_upload('profile_picture'))  {
			$file_loc = 'default.png';
		}
		else
		{ 
		$upload_data = $this->upload->data();
		$file_loc = $upload_data['file_name'];
		}
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/add_student'); 
		} else {
			$data = array(
			'id_student' => 0,
			'fullname' => $this->input->post('fullname'),
			'age' => $this->input->post('age'),
			'gender' => $this->input->post('gender'),
			'address' => $this->input->post('address'),
			'phone_number' => $this->input->post('phone_number'),
			'email' => $this->input->post('email'),
			'status' => $this->input->post('status'),
			'birthdate' => $this->input->post('birthdate'),
			'profile_picture' => $file_loc
		);
		$result = $this->Students->addStudent($data);

		if ($result == TRUE) {
			echo("<script>alert('Data siswa berhasil ditambahkan!')</script>");
			redirect(base_url('Admin/viewStudents'),'refresh');
		} else {
			echo("<script>alert('Penambahan gagal, data siswa telah tersimpan!')</script>");
			$this->load->view('admin/add_student', $data);
		}
		}
	}

	function checkDateFormat($date) {
		$test_arr  = explode('/', $date);
		if (count($test_arr) == 3) {
			if (checkdate($test_arr[0], $test_arr[1], $test_arr[2])) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	public function importFromExcel()
	{
		if ($this->input->post('submit', TRUE) == 'upload')
        {
            $config['upload_path']      = './imported_excel/'; 
            $config['allowed_types']    = 'xlsx|xls'; 
            $config['file_name']        = 'data_siswa'.time(); 
       
            $this->load->library('upload', $config);
       
            if ($this->upload->do_upload('excel'))
            {               
				$file   = $this->upload->data();
				
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				$spreadsheet = $reader->load('./imported_excel/'.$file['file_name']);
				$sheetData = $spreadsheet->getActiveSheet()->toArray();
				$save   = array();
				for($i = 1;$i < count($sheetData);$i++)
				{
					$data = array (
						'id_student' 	=> 0,
						'fullname' 		=> $sheetData[$i]['1'],
						'age' 			=> $sheetData[$i]['2'],
						'gender'        => $sheetData[$i]['3'],
						'address'       => $sheetData[$i]['4'],
						'phone_number'  => $sheetData[$i]['5'],
						'email'         => $sheetData[$i]['6'],
						'status'          => $sheetData[$i]['7'],
						'birthdate'       => $sheetData[$i]['8'],
						'profile_picture' => 'default.png'		
					);
					array_push($save,$data);
				}
				$this->Students->addBatchStudents($save);
                    echo    '<script type="text/javascript">alert(\'Data berhasil disimpan\');</script>';
					redirect(base_url('Admin/viewStudents'),'refresh');
                }
            else
            {
				$err = "Error :".$this->upload->display_errors();
				echo '<script type="text/javascript">alert('. $err .');</script>';
            }
        }
        redirect(base_url('Admin/viewStudents'),'refresh');
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
		$i = 2;

		
		$data = $this->Students->getAllStudents();
		foreach($data as $student) {
			$sheet->setCellValue('A'.$i, $student->id_student);
			$sheet->setCellValue('B'.$i, $student->fullname);
			$sheet->setCellValue('C'.$i, $student->age);
			$sheet->setCellValue('D'.$i, $student->gender);
			$sheet->setCellValue('E'.$i, $student->address);
			$sheet->setCellValue('F'.$i, $student->phone_number);
			$sheet->setCellValue('G'.$i, $student->email);
			$sheet->setCellValue('H'.$i, $student->status);
			$sheet->setCellValue('I'.$i, $student->birthdate);
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
		$sheet->getStyle('A1:I'.$i)->applyFromArray($styleArray);

		$writer = new excelWriter($spreadsheet);
		$writer->save('Report_Data_Siswa.xlsx');
		force_download('Report_Data_Siswa.xlsx', NULL);

	}
}