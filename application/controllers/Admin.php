<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'vendor\autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as excelWriter;

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		/**
		 * Mengimpor berbagai dependensi :
		 * 1. form untuk mengirim form request dari pengguna
		 * 2. url untuk pemetaan alamat url
		 * 3. download untuk mengunduh file excel hasil ekspor data daftar pasien
		 * 4. library session untuk menyimpan session pengguna
		 * 5. library form_validation untuk validasi form
		 */
		$this->load->helper('form');
		$this->load->helper('url'); 
		$this->load->helper('download');		
		
		$this->load->library('form_validation');
		$this->load->library('session');
		/**
		 * Mengimpor berbagai model : Users dan Patients
		 */
		$this->load->model('Users');
		$this->load->model('Patients');
	}
	/**
	 * @function index()
	 * @return menampilkan halaman dashboard untuk admin
	 */
	public function index()
	{
		$this->load->view('admin/index');
	}	
	/**
	 * @function viewPatients()
	 * @return menampilkan halaman daftar pasien
	 */
	public function viewPatients()
	{
		$data['patients'] = $this->Patients->getAllPatients();
		$this->load->view('admin/patients_list',$data);
	}
	/**
	 * @function viewPatient(id)
	 * @param id pasien
	 * @return menampilkan halaman data pasien tertentu
	 */
	public function viewPatient($id)
	{
		$data['patient'] = $this->Patients->getPatientById($id);
		$this->load->view('admin/view_patient',$data);
	}
	/**
	 * @function editProfile()
	 * @return menampilkan halaman edit profil untuk admin
	 */
	public function editProfile()
	{
		$this->load->view('admin/edit_profile');
	}
	/**
	 * @function deletePatient(id)
	 * @param id pasien
	 * @return menghapus data pasien tertentu
	 */
	public function deletePatient($id)
	{
		$result = $this->Patients->deletePatient($id);
		if ($result) {
			echo("<script>alert('Data pasien berhasil dihapus!')</script>");
			redirect(base_url('Admin/viewPatients'),'refresh');
		} else {
			echo("<script>alert('Proses penghapusan data pasien gagal!')</script>");
			redirect(base_url('Admin/viewPatients'),'refresh');
		}
	}
	/**
	 * @function viewEditPatient(id)
	 * @param id pasien
	 * @return menampilkan halaman edit data diri pasien tertentu
	 */
	public function viewEditPatient($id)
	{
		$data['patient'] = $this->Patients->getPatientById($id);
		$this->load->view('admin/edit_patient',$data);
	}
	/**
	 * @function editPatient(id)
	 * @param id pasien
	 * @return menyimpan perubahan data diri pasien
	 */
	public function editPatient($id)
	{
		$data = array(
			'id' => $id,
			'fullname' => $this->input->post('fullname'),
			'address' => $this->input->post('address'),
			'phone_number' => $this->input->post('phone_number'),
			'email' => $this->input->post('email'),
			'education' => $this->input->post('education'),
			'job' => $this->input->post('job'),
			'religion' => $this->input->post('religion')
		);
		$this->Patients->updatePatient($data);
		echo("<script>alert('Data profil pasien berhasil diubah!')</script>");
		redirect(base_url('Admin/viewPatients'),'refresh');
	}
	/**
	 * @function viewAddPatient()
	 * @return menampilkan halaman tambah data pasien baru
	 */
	public function viewAddPatient()
	{
		$this->load->view('admin/add_patient');
	}
	/**
	 * @function addPatient()
	 * @return menambahkan data pasien baru
	 */
	public function addPatient()
	{
		$this->form_validation->set_rules('birthdate', 'Tanggal Lahir', 'callback_checkDateFormat');
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
			$this->load->view('admin/add_patient'); 
		} else {
			$data = array(
			'id_patient' => 0,
			'rm_number' => $this->input->post('rm_number'),
			'rmgizi_number' => $this->input->post('rmgizi_number'),
			'visitdate' => $this->input->post('visitdate'),
			'referral' => $this->input->post('referral'),
			'fullname' => $this->input->post('fullname'),
			'age' => $this->input->post('age'),
			'gender' => $this->input->post('gender'),
			'address' => $this->input->post('address'),
			'phone_number' => $this->input->post('phone_number'),
			'email' => $this->input->post('email'),
			'birthdate' => $this->input->post('birthdate'),
			'profile_picture' => $file_loc,
			'education' => $this->input->post('education'),
			'job' => $this->input->post('job'),
			'religion' => $this->input->post('religion')
		);
		$result = $this->Patients->addPatient($data);

		if ($result == TRUE) {
			echo("<script>alert('Data pasien berhasil ditambahkan!')</script>");
			redirect(base_url('Admin/viewPatients'),'refresh');
		} else {
			echo("<script>alert('Penambahan gagal, data pasien sebelumnya telah tersimpan!')</script>");
			$this->load->view('admin/add_patient', $data);
		}
		}
	}
	/**
	 * @function checkDateFormat(date)
	 * @param date tanggal lahir pasien
	 * @return memeriksa kecocokkan format tanggal lahir
	 */
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
	/**
	 * @function importFromExcel()
	 * @return mengimpor data pasien dari file excel
	 */
	public function importFromExcel()
	{
		if ($this->input->post('submit', TRUE) == 'upload')
        {
            $config['upload_path']      = './imported_excel/'; 
            $config['allowed_types']    = 'xlsx|xls'; 
            $config['file_name']        = 'data_pasien'.time(); 
       
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
						'id_patient' 	=> 0,
						'fullname' 		=> $sheetData[$i]['1'],
						'age' 			=> $sheetData[$i]['2'],
						'gender'        => $sheetData[$i]['3'],
						'address'       => $sheetData[$i]['4'],
						'phone_number'  => $sheetData[$i]['5'],
						'email'         => $sheetData[$i]['6'],
						'birthdate'       => $sheetData[$i]['7'],
						'profile_picture' => 'default.png',
						'education'         => $sheetData[$i]['8'],
						'job'          => $sheetData[$i]['9'],
						'religion'       => $sheetData[$i]['10'],
					);
					array_push($save,$data);
				}
				$this->Patients->addBatchPatients($save);
                    echo    '<script type="text/javascript">alert(\'Data berhasil disimpan\');</script>';
					redirect(base_url('Admin/viewPatients'),'refresh');
                }
            else
            {
				$err = "Error :".$this->upload->display_errors();
				echo '<script type="text/javascript">alert('. $err .');</script>';
            }
        }
        redirect(base_url('Admin/viewPatients'),'refresh');
	}
	/**
	 * @function exportToExcel()
	 * @return mengekspor data pasien dalam file excel
	 */
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
		$sheet->getStyle('A1:K'.$i)->applyFromArray($styleArray);

		$writer = new excelWriter($spreadsheet);
		$writer->save('Report_Data_Pasien.xlsx');
		force_download('Report_Data_Pasien.xlsx', NULL);

	}
	/**
	 * @function getPatient()
	 * @return menampilkan data pasien berdasarkan nama pasien yang dicari
	 */
	public function getPatient()
	{
		$fullname = $this->input->post('patient_name');
		$data['patients'] = $this->Patients->getPatientByName($fullname);
		$this->load->view('admin/patients_result',$data);
	}
}