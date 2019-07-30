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
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('main/register'); 
		} else {
			$data = array(
			'id' => 0,
			'role' => 'user',
			'fullname' => $this->input->post('fullname'),
			'username' => $this->input->post('username'),
			'password' => $this->createPassword($this->input->post('password')),
			'birthday' => $this->input->post('birthday'),
			'gender' => $this->input->post('gender'),
			'age' => $this->input->post('age'),
			'phone_number' => $this->input->post('phone_number'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'id_number' => $this->input->post('id_number'),
			'profile_picture' => "default.png"
		);
			$result = $this->Users->registration($data);
		if ($result == TRUE) {
			$this->load->view('main/login', $data);
		} else {
			$data['message_display'] = 'Username telah digunakan, silahkan pilih username yang lain!';
			$this->load->view('main/register', $data);
		}
		}
	}
	public function user_login_process() {

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
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
		$result = $this->Users->read_user_information($username);
		if ($result != false) {
		$session_data = array(
		'nama' => $result[0]->nama,
		'id' => $result[0]->id,
		'password' => $this->decrypt($result[0]->password),
		'gambar' => $result[0]->gambar
		);
		// Add user data in session
		$this->session->set_userdata('logged_in', $session_data);
		$this->load->view('dasbor');
		}
		} else {
		$data = array(
		'error_message' => 'Invalid Username or Password'
		);
		$this->load->view('login', $data);
		}
		}
		}
		
		// Logout from admin page
		public function logout() {
		
		// Removing session data
		$sess_array = array(
		'nama' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('login', $data);
		}

}