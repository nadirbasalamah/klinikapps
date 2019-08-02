<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->helper('url'); 		
		
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
		$data['birthdate'] = date('Y-m-d');
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
}