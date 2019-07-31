<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->helper('url'); 		
		
		$this->load->library('form_validation');
		$this->load->library('session');

		$this->load->model('Users');
	}

	public function index()
	{
		$this->load->view('main/index');
	}
	
	public function login()
	{
		$this->load->view('main/login');
	}

	public function register()
	{
		$this->load->view('main/register');
	}

	function decrypt($string)
	{
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_key = 'This is my secret key';
		$secret_iv = 'This is my secret iv';
		$key = hash('sha256', $secret_key);
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		return $output;
	}

	public function createPassword($passwd) 
	{
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_key = 'This is my secret key';
		$secret_iv = 'This is my secret iv'; 
		$key = hash('sha256', $secret_key);
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		$output = openssl_encrypt($passwd, $encrypt_method, $key, 0, $iv);
		$output = base64_encode($output);
		return $output;
	}
	public function new_user_registration() {
		$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('birthdate', 'Tanggal Lahir', 'callback_checkDateFormat');
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('age', 'Umur', 'trim|required');
		$this->form_validation->set_rules('phone_number', 'Nomor ponsel yang dapat dihubungi', 'trim|required');
		$this->form_validation->set_rules('email', 'Alamat Email', 'trim|required');
		$this->form_validation->set_rules('address', 'Alamat Tempat Tinggal', 'trim|required');
		$this->form_validation->set_rules('id_number', 'Nomor Kartu Identitas', 'trim|required');
		$this->form_validation->set_rules('id_type', 'Jenis Kartu Identitas', 'trim|required');
		$this->form_validation->set_message('checkDateFormat', 'Format tanggal salah (gunakan format:dd/mm/yyyy)');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('main/register'); 
		} else {
			$data = array(
			'id' => 0,
			'role' => 'user',
			'fullname' => $this->input->post('fullname'),
			'username' => $this->input->post('username'),
			'password' => $this->createPassword($this->input->post('password')),
			'birthdate' => $this->input->post('birthdate'),
			'gender' => $this->input->post('gender'),
			'age' => $this->input->post('age'),
			'phone_number' => $this->input->post('phone_number'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'id_number' => $this->input->post('id_number'),
			'id_type' => $this->input->post('id_type'),
			'profile_picture' => "default.png"
		);
		$data['birthdate'] = date('Y-m-d');
		if ($data['id_type'] == 'nip') {
			$data['role'] = 'admin';
			$result = $this->Users->registration($data);
		} else {
			$result = $this->Users->registration($data);
		}

		if ($result == TRUE) {
			$this->load->view('main/login', $data);
		} else {
			$data['message_display'] = 'Username telah digunakan, silahkan pilih username yang lain!';
			$this->load->view('main/register', $data);
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

	public function user_login_process() {

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('user/index');
		}	else{
				$this->load->view('main/login');
		}
		} else {
		$data = array(
		'username' => $this->input->post('username'),
		'password' => $this->createPassword($this->input->post('password'))
		);
		$result = $this->Users->login($data);
		if ($result == TRUE) {

		$username = $this->input->post('username');
		$result = $this->Users->getUser($username);
		if ($result != false) {

		$session_data = array(
		'username' => $result[0]->username,
		'id' => $result[0]->id,
		'password' => $this->decrypt($result[0]->password),
		'profile_picture' => $result[0]->profile_picture,
		'role' => $result[0]->role
		);
		// Add user data in session
		$this->session->set_userdata('logged_in', $session_data);
		if ($result[0]->role == 'admin') {
			$this->load->view('admin/index');
		} else {
			$this->load->view('user/index');
		}
		}
		} else {
		$data = array(
		'error_message' => 'Username atau password Anda Salah'
		);
		$this->load->view('login', $data);
		}
		}
		}
		
		// Logout from admin page
		public function logout() {
		
		// Removing session data
		$sess_array = array(
		'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('main/login', $data);
		}

}